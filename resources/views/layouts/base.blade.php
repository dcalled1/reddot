<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title','Home Page')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm text-uppercase">
            <div class="container">
                <a class="navbar-brand color-white" href="{{ route('home.index') }}">
                    Inicio
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="navbar-brand color-white" href="{{ route('community.index') }}">Communities</a>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @if (Auth::user())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="navbar-brand color-white"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </form>
                        @else
                            <a class="navbar-brand color-white" href="{{ route('login') }}">Login</a>
                            <a class="navbar-brand color-white" href="{{ route('register') }}">Register</a>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="animation-area">
            <ul class="box-area">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<!-- Scripts -->


</html>


