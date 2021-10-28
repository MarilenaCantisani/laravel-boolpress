{{-- Insert the layout of the page --}}
@extends('layouts.app')

{{-- Insert the content of the page --}}
@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title mb-5 font-weight-bold">{{$post->title}}</h5>
      <section id="card-content" class="d-flex  align-items-center row">
        <div class="col-4 text-center">
          <img  style="height: auto; width=auto" src="{{ $post->url }}" alt="{{$post->title}}">
        </div>
        <div class="col-8">
          <h6 class="font-weight-bold">Categoria: 
            <span class="badge ml-2 align-middle py-1 px-2 badge-{{ $post->category->color ?? 'light' }}">{{  $post->category->name ?? 'Nessuna categoria'  }}</span>
          </h6>  
          <h6 class="font-weight-bold">Tags: 
            @forelse ($post->tags as $tag)
            <span class="badge ml-2 py-1 px-2 align-middle mb-1 text-center" style="border: 2px solid {{ $tag['color'] }}">{{ $tag['name']  }}</span>        
    
            @empty Nessun tag       
            @endforelse
          </h6>
          
          <p class="card-text">{{$post->content}}</p>
          <time><span class="font-weight-bold">Scritto il:</span> {{$post->getFormattedDate('created_at')}}</time>

        </div>


      </section>
      
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