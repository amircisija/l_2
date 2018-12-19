<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">        

        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', Lang::get('titles.app')) }}</title>

        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="/favicon.ico">

        {{-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --}}
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]--> 

        {{-- Fonts --}}
        @yield('template_linked_fonts')

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/css/mdb.min.css" rel="stylesheet">   
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        @yield('template_linked_css')

        <style type="text/css">
            @yield('template_fastload_css')

            @if (Auth::User() && (Auth::User()->profile) && (Auth::User()->profile->avatar_status == 0))
                .user-avatar-nav {
                    background: url({{ Gravatar::get(Auth::user()->email) }}) 50% 50% no-repeat;
                    background-size: auto 100%;
                }
            @endif

        </style>  
        
        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

 

        @yield('head')

    </head>
    <body>
<div  id="app">


{{--     <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <div class="container">
      <a class="navbar-brand" href="#">Fixed navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>

        @if (Route::has('login'))
        <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
            </li>
             @else
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/register') }}">Register</a>  
            </li>           
            @endif
            @endauth
        </ul>
        @endif
      </div>
      </div>
    </nav> --}}

        @include('partials.nav')


{{--     <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif
    </div> --}}
    <section class="bgimage">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 my-auto text-center">
                    <h1>What are you looking for?</h1>
                        <form class="form__home-page form-inline py-4 px-4">
                        <div class="row no-gutters">
                            <div class="col">
                            <input type="text" class="form-control" placeholder="Stadt, Plz">
                            </div>
                            <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                            </div>
                            <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                            </div>
                        </div>
                        </form>
                </div>
            </div>
        </div>
    </section>
    <section>
    <div class="container py-5">
        <div class="row col-md-12 py-5">
                <div class="panel panel-primary">
                <div class="panel-heading">Please type here in text box to get search data</div>
                    <div class="panel-body">
                        <autocomplete></autocomplete>
                    </div>
                </div>      
        </div>
    </div>

    </section>
</div>



        <script src="{{ mix('/js/app.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.16/js/mdb.min.js"></script> 
        
    </body>
</html>
