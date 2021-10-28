<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('post', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //// Validation
        $request->validate(
            [
                'title' => 'required|string|unique:posts|min:4|max:100',
                'tags' => 'nullable|exists:tags,id',

            ],
            [
                'title.required' => "Inserisci un titolo per il post",
                'title.unique' => "Il titolo '$request->title' è già stato utilizzato",
                'title.min' => "Il titolo deve essere composto da almeno :min caratteri",
                'title.max' => "Il titolo deve essere lungo massimo :max caratteri"
            ]
        );
        $data = $request->all();
        $post = new Post();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        $post->save();

        if (array_key_exists('tags', $data)) $post->tags()->attach($data['tags']);

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $tag_ids = $post->tags->pluck('id')->toArray();
        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'tag_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // //// Validation
        $request->validate(
            [
                'title' => ['required', 'string', Rule::unique('posts')->ignore($post->id), 'min:4', 'max:100'],
                'tags' => 'nullable|exists:tags,id',
            ],
            [
                'title.required' => "Inserisci un titolo per il post",
                'title.unique' => "Il titolo '$request->title' è già stato utilizzato",
                'title.min' => "Il titolo deve essere composto da almeno :min caratteri",
                'title.max' => "Il titolo deve essere lungo massimo :max caratteri"
            ]
        );

        $data = $request->all();
        $post->fill($data);
        $post->slug = Str::slug($post->title, '-');

        if (!array_key_exists('tags', $data)) $post->tags()->detach();
        else $post->tags()->sync($data['tags']);

        $post->update($data);

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (count($post->tags)) $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('alert-message', 'Post cancellato con successo!')->with('alert-type', 'success');
    }
}
