{{-- Insert the layout of the page --}}
@extends('layouts.app')

{{-- Insert the content of the page --}}
@section('content')
    <div class="container">
        <header>
            <h2>Crea una nuova categoria</h2>
        </header>
        <section>
            @include('includes.admin.category.form')
        </section>          
    </div>
@endsection