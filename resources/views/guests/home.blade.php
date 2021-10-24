<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        {{-- Link to css file --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">  
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links d-flex justify-content-end">
                    @auth
                        <a class="mt-3 mr-5 text-dark" href="{{ route('admin.home') }}">Dashboard</a>
                    @else
                        <a class="mt-3 text-dark" href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a class="mx-4 mt-3 text-dark" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif    
            <hr>
        </div>
        {{-- Id connected to the Vue App component --}}
        <div id="root">
        </div>
        {{-- Link to js file --}}
        <script src="{{asset('js/front.js')}}"></script>
    </body>
</html>
