<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', __('Home Page'))</title>
    <!-- Styles -->   
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm text-uppercase">
            <div class="container">
                <a class="navbar-brand color-white" href="{{ route('home.index') }}">
                    {{ __('Home') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="navbar-brand color-white" href="{{ route('community.index') }}">{{ __('Communities') }}</a>
                        <li class="nav-item dropdown">
                                <a class="navbar-brand dropdown-toggle color-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Language') }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="language/en"><img src="{{ asset('img/en.png') }}" width="30px" height="20x"> English</a>
                                    <a class="dropdown-item" href="language/es"><img src="{{ asset('img/es.png') }}" width="30px" height="20x"> Español</a>
                                </div>
                        </li>                     
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
                            <a class="navbar-brand color-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a class="navbar-brand color-white" href="{{ route('register') }}">{{ __('Register') }}</a>
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

<!-- Footer -->
<footer class="page-footer font-small bg-light pt-4 text-white">
<!-- Footer Links -->
<div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Reddot<i class="fas fa-leaf"></i></h5>
        <p></p>

    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">{{ __('Sites') }}</h5>

        <ul class="list-unstyled">
        <li>
            <u>
            <a href="{{ route('home.index') }}" class="text-white">{{ __('Home') }}</a>
        </li>
        <li>
            <a href="#!" class="text-white">{{ __('Comunidades') }}</a>
        </li>
        <li>
            <a href="#!" class="text-white">{{ __('Contact Us') }}</a>
            </u>
        </li>
        </ul>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">{{ __('Group') }}</h5>

        <ul class="list-unstyled">
        <li>
            <p>David Calle Daza - {{ __('Principal Architecture') }}</p>
        </li>
        <li>
            <p>Luis Fernando Posada - {{ __('Usability Architecture') }}</p>
        </li>
        <li>
            <p>Santiago Moreno - {{ _('Developer') }}</p>
        </li>
        </ul>

    </div>
    <!-- Grid column -->

    </div>
    <!-- Grid row -->

</div>
<!-- Footer Links -->

<!-- Copyright -->
<!-- Copyright -->

</footer>

<!-- Scripts -->
<script src="{{ asset('jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>


</html>


