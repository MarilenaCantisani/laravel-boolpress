{{-- Insert the layout of the page --}}
@extends('layouts.app')

{{-- Insert the content of the page --}}
@section('content')
    <div class="container">
        <h1>{{ $category->name }}</h1>
        <h4> Colore: <span>{{ $category->color }}</span></h4>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning ml-2">Modifica</a>
            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" id="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger mx-2">Elimina</button>
            </form>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Indietro</a>
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
