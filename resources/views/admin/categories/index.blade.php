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
        <h1 class="text-center my-3">Categorie</h1>
        <a class="btn btn-success" href="{{route('admin.categories.create')}}"> Nuova categoria</a>
    </header>
    {{-- Table containing all the posts --}}
    <table class="table my-4">
        <thead>
          <tr class="text-center">
            <th scope="col">#</th>
            <th class="text-left" scope="col">Nome categoria</th>
            <th class="pl-5" scope="col">Colore</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <th class="align-middle" scope="row">{{$category->id}}</th>
                    <td class="align-middle p5-5">{{$category->name}}</td>
                    <td class="text-center h6 align-middle pl-5"> 
                        @if($category->color)
                        <span class="badge py-1 px-2 d-block badge-{{ $category->color ?? 'light' }}">{{  $category->color ?? 'Nessuno'  }}</span>
                        @else Nessuna categoria 
                        @endif
                    </td>                
                    <td class="d-flex justify-content-end pl-4">
                        <a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-secondary mx-2">Modifica</a>
                        <form action="{{route('admin.categories.destroy', $category->id)}}" method="post" class="delete-form">
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