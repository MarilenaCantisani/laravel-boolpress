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
        {{-- Add the form to insert the button 'delete'--}}
        <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}" id="delete-form">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Elimina</button>
        </form>
        <a class="btn btn-primary ml-2" href="{{route('admin.posts.index')}}">Indietro</a>
      </div>        
    </div>
  </div>
</div>   
@endsection

{{-- Insert the scripts of the page --}}
@section('scripts')
  <script>
    // Ask the user for confirmation to delete the post
    const deleteForm = document.getElementById('delete-form');
    deleteForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const deleteConfirmation = confirm('Sei sicuro di voler eliminare questo post?');
      if(confirm) this.submit();
    });
  </script>   
@endsection