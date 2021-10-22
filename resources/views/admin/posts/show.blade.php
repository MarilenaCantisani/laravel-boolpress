{{-- Insert the layout of the page --}}
@extends('layouts.app')

{{-- Insert the content of the page --}}
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <h6>Categoria: @if ($post->category) {{$post->category->name}} @else Nessuna categoria @endif</h6>                    
          <p class="card-text">{{$post->content}}</p>
          <time>{{$post->getFormattedDate('created_at')}}</time>
          <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Indietro</a>
          </div>
        </div>
      </div>

</div>
    
@endsection