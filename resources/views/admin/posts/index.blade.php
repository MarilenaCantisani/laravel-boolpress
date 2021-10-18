@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-3">I miei post</h1>
    <table class="table my-4">
        <thead>
          <tr>
            <th scope="col">Titolo</th>
            <th scope="col">Scritto il</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->getFormattedDate('created_at')}}</td>
                    <td>
                        <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Vedi</a>
                    </td>
                </tr>
                
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nessun post</td>
                </tr>

                
            @endforelse
        </tbody>
      </table>

</div>
    
@endsection