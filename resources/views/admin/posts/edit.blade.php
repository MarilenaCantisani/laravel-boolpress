{{-- Insert the layout of the page --}}
@extends('layouts.app')

{{-- Insert the content of the page --}}
@section('content')
    <div class="container">
        <header>
            <h2>Modifica il post selezionato</h2>
        </header>
        <section>
            @include('includes.admin.posts.form')
        </section>        
    </div>
@endsection