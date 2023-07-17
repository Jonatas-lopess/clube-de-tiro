<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Painel de Controle</title>
    <link rel="icon" type="imagem/png" href="{{asset('images/logo_redonda.png')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('bootstrap-4.5.3-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-free-5.15.1-web/css/all.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/filepond@^4/dist/filepond.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin_styles.css') }}">

</head>
<body>
    <div id="app">
        <header class="main-header">
        <a href="{{ route('painel.home') }}" class="logo">
            <span class="logo-mini"><b>AP</b></span>
            <span class="logo-lg"><b>Admin Painel</b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" id="toggle-menu-button" class="sidebar-toggle text-white" data-toggle="push-menu" role="button">
                <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <div id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto flex-row">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle px-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        </header>

        @yield('content')
    </div>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
    <script src="{{asset('bootstrap-4.5.3-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('js/bootbox.all.js')}}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        var APP_URL = '{{ url("/") }}'
    </script>

    @if (!empty($page) && $page == 'users')
        <script src="{{asset('js/painel/users.js')}}"></script>
    @endif
    @if (!empty($page) && $page == 'service')
        <script src="{{asset('js/painel/service.js')}}"></script>
    @endif
    @if (!empty($page) && $page == 'home')
        <script src="{{asset('js/painel/home.js')}}"></script>
    @endif
    @if (!empty($page) && $page == 'contact')
        <script src="{{asset('js/painel/contact.js')}}"></script>
    @endif
    <script src="{{asset('js/admin.js')}}"></script>
</body>
</html>
