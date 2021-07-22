<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SHOWROOM</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark text-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/beranda') }}">
                    <h2>SHOWROOM</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @role('admin')
        
                        <a href="{{ url ('users') }}" class="nav-link">User</a>
                        <a href="{{ url ('posts') }}" class="nav-link">Post</a>
                        <a href="{{ url ('news') }}" class="nav-link">News & Event</a>
                        <a href="{{ url ('galeris') }}" class="nav-link">Galeri</a>
                        @endrole

                        @role('petugas')
                        <a href="{{ url ('posts') }}" class="nav-link">Post</a>
                        <a href="{{ url ('news') }}" class="nav-link">News & Event</a>
                        <a href="{{ url ('galeris') }}" class="nav-link">Galeri</a>
                        @endrole

                        @role('customer')
                        <a href="galeri" class="nav-link">Galeri</a>
                        <a href="news_event" class="nav-link">News & Event</a>
                        <a href="about" class="nav-link">About Us</a>
                        @endrole
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-dark text-light" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4 bg-dark text-light">
            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
<!--footer-->
<footer class="footer bg-light text-dark" style="height: 250px; padding: 50px;">
    <div class="row">
        <div class="col">
            <h4>Discover Lexus</h4>
            <br>
            <p><a href="about" class="nav-link text-dark">About Lexus</a></p>
            <p><a href="news_event" class="nav-link text-dark">News & Event</a></p>
        </div>
        <div class="col">
            <h4>Contact Us</h4>
            <br>
            <p><a href="#" class="nav-link text-dark">Find a Dealer</a></p>
            <p><a href="#" class="nav-link text-dark">Book a Test Drive</a></p>
        </div>
        <div class="col">
            <p>Join us on  Facebook,  Instagram,  Twitter,  YouTube</p>
        </div> 
    </div>
    <hr>
    <div class="col">
        <p><center>Copyright © Ghifarel 2021</p>
    </div>  
    </footer>
</html>
