@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h2>Crea un nuovo post</h2>
        </header>
        <section>
            @include('includes.admin.posts.form')
        </section>          
    </div>
@endsection