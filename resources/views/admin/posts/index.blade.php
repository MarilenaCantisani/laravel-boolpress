{{-- Insert the layout of the page --}}
@extends('layouts.app')

{{-- Insert the content of the page --}}
@section('content')
<div class="container">
    @if (session('alert-message'))
        <div class="alert alert-{{session('alert-type')}}">
            {{session('alert-message')}}      
        </div>
    @endif
    <header class="d-flex justify-content-between align-items-center">
        <h1 class="text-center my-3">I miei post</h1>
        <a class="btn btn-success" href="{{route('admin.posts.create')}}"> Nuovo post</a>
    </header>
    {{-- Table containing all the posts --}}
    <table class="table my-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Scritto il</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <th class="align-middle" scope="row">{{$post->id}}</th>
                    <td class="align-middle">{{$post->title}}</td>
                    <td class="text-left h6 align-middle"> 
                        @if($post->category)
                        <span class="badge py-1 px-2 badge-{{ $post->category->color ?? 'light' }}">{{  $post->category->name ?? 'Nessuno'  }}</span>
                        @else Nessuna categoria 
                        @endif
                    </td>               
                    <td class="align-middle">{{$post->getFormattedDate('created_at')}}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">Vedi</a>
                        <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-secondary mx-2">Modifica</a>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="post" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </td>
                </tr>               
            @empty
                <tr>
                    <td colspan="3" class="text-center">Nessun post</td>
                </tr>    
            @endforelse
        </tbody>
    </table>
    {{-- Link for pagination --}}
    <div class="d-flex justify-content-end">
        {{$posts->links()}}
    </div> 
</div>  
@endsection

{{-- Insert the scripts of the page --}}
@section('scripts')
<script>
    // Ask the user for confirmation to delete the post
    const deleteForm = document.querySelectorAll('.delete-form');
    deleteForm.forEach(form => {
        form.addEventListener('submit', function(e) {
        e.preventDefault();
        const deleteConfirmation = confirm('Sei sicuro di voler eliminare questo post?');
        if(confirm) this.submit();
    });       
    });
</script>   
@endsection