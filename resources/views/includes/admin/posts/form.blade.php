{{-- Check if there are errors in the form --}}
@if($errors->any())
  <div>
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif
{{-- Check if there are errors in the form --}}
@if ($post->exists)
<form action="{{route('admin.posts.update', $post->id)}}" method="POST" novalidate>
    @method('PATCH')
    @else
    <form action="{{route('admin.posts.store')}}" method="POST" novalidate>  
@endif
    @csrf
    <div class="form-group">
        <label for="title">Titolo del post:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('name', $post->title)}}" required>
        @error('title')
          <div class="invalid-feedback">{{ $message }}</div>          
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select class="form-control" id="category_id" name="category_id">
          <option value="">Nessuna Categoria</option>
          @foreach ($categories as $category)
            <option @if(old('category_id', $post->category_id) == $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>       
          @endforeach
        </select>
      </div>
    <div class="form-group">
        <label for="url">Url del post:</label>
        <input type="text" class="form-control" id="url" name="url" value="{{old('url', $post->url)}}">
    </div>
    <div class="form-group">
        <label for="content">Testo del post:</label>
        <textarea class="form-control" id="content" name="content" rows="6">{{old('content', $post->content)}}</textarea>
    </div>
    <h6>Tags:</h6>
    @foreach ($tags as $tag)
      <div class="form-check form-check-inline mb-4">
        <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}"  name='tags[]' @if (in_array($tag->id, old('tags', $tagIds ?? []))) checked @endif>
        <label class="form-check-label" for="tag-{{ $tag->id }}">
          {{ $tag->name }}
        </label>
      </div>     
    @endforeach
    <div>
      <button type="button" class="btn btn-dark"><a class="text-white text-decoration-none" href="{{route('admin.posts.index')}}">Indietro</a></button>
      <button type="submit" class="btn btn-primary">Salva post</button>
    </div>   
</form>