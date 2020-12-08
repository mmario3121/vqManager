<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        <header>
            <nav class="navbar d-flex justify-content-between" style="background-color: #4a76a8;">
                    @if(Route::has('login'))
                        @auth
                            <a class="nav-link" href="{{ route('home') }}" style="color: white;">My lists</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}" style="color: white;">My lists</a>
                        @endauth
                    @endif
                    <a class="navbar-brand" href="#">
                    <img src="/Images/icon.png" width="30" height="40" class="d-inline-block align-center" alt="">
                    <img src="/Images/vqManager.png" width="100" height="30" class="d-inline-block align-bottom" alt="">
                    </a>
                    @if(Route::has('login'))
                        @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="https://img.icons8.com/cotton/64/000000/name--v2.png" width="30" height="30" class="d-inline-block align-center" alt="">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <a class="dropdown-item" href="">Profile</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>


                        @else
                            <a class="navbar-brand" href="{{ route('login') }}">
                                <img src="https://img.icons8.com/cotton/64/000000/name--v2.png" width="30" height="30" class="d-inline-block align-center" alt="">
                            </a>
                        @endauth
                    @endif
              </nav>
        </header>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="footer border-top">
        <div class="d-flex justify-content-center">
            <a class="navbar-brand" href="#">
                <p class="h3" style="color: #2684ff;">
                <img src="/Images/Atlassian-Logo.png" width="50" height="50" class="d-inline-block align-center" alt="">
                <strong>Assanov</strong></p>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="d-flex justify-content-center pb-3">
            <a class="footer__link pr-5" href="#" style="color: #727272;">Contact</a>
            <a class="footer__link pr-5" href="#" style="color: #727272;">Terms & Conditions</a>
            <a class="footer__link" href="#" style="color: #727272;">Customer service</a>
        </div>
    </div>
</body>
</html>
