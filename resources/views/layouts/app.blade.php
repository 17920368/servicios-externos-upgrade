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
    <script src="{{ asset('js/main.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ asset('img/itvo.ico') }}" sizes="16x16 24x24 36x36 48x48" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1934e005fb.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div style="background-color:#1B3A6D; width=100%; height=50px">
            <img src="{{ asset('img/logo-itvo.png') }}" alt="TecNM/I.T.V.O.">
        </div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/itvo.ico') }}" class="navbar__logo" alt="ITVO">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-building"></i> {{ __('INSTANCIA') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('area.index') }}">
                                        <i class="fa fa-brain"></i> {{ __('ÁREA DE CONOCIMIENTO') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('giro.index') }}">
                                        <i class="fa fa-layer-group"></i> {{ __('GIRO') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('alcance.index') }}">
                                        <i class="fas fa-microscope"></i> {{ __('ALCANCE') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('tipo-sector.index') }}">
                                        <i class="fas fa-bezier-curve"></i> {{ __('SECTOR') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('sector.index') }}">
                                        <i class="fas fa-industry"></i> {{ __('TIPO DE SECTOR') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('tamanio.index') }}">
                                        <i class="fas fa-compress-arrows-alt"></i> {{ __('TAMAÑO') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('instancia.index') }}">
                                        <i class="fas fa-kaaba"></i> {{ __('INSTANCIA') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="far fa-handshake"></i> {{ __('CONVENIOS') }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('tipo-convenio.index') }}">
                                        <i class="fa fa-file-contract"></i> {{ __('TIPO DE CONVENIO') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('indicador.index') }}">
                                        <i class="fa fa-bullseye"></i> {{ __('INDICADOR SYSAD') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('convenio.index') }}">
                                        <i class="fas fa-file-contract"></i> {{ __('CONVENIO') }}
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user-circle" aria-hidden="true"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('SALIR') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<style>
    .card-body {
        background-image: url("{{ asset('img/itvo.ico') }}");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 20%;
    }
</style>

</html>
