<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/helper.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jquery-1.11.1.min.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxcore.js') }}" ></script>
  
    <script type="text/javascript"  src="{{ asset('js/jqwidgets/jqxbuttons.js') }}" ></script>
    <script type="text/javascript"  src="{{ asset('js/jqwidgets/jqxscrollbar.js') }}" ></script>
    <script type="text/javascript"  src="{{ asset('js/jqwidgets/jqxmenu.js') }}" ></script>
  
     
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxgrid.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxgrid.pager.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxgrid.sort.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxgrid.filter.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxgrid.selection.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxgrid.columnsresize.js') }}" ></script>
    
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxdropdownlist.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxlistbox.js') }}" ></script>
    <script  type="text/javascript"  src="{{ asset('js/jqwidgets/jqxdata.js') }}"></script>
                           

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/jqwidgets/styles/jqx.base.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/jqwidgets/styles/jqx.classic.css') }}" rel="stylesheet"/>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Czesio') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        {{--
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                            --}}
                        @else
                            <li class="nav-item {{ Request::path()=='getSprzet' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('getSprzet') }}" >Sprzęt</a>
                            </li>
                             <li class="nav-item {{ Request::path()=='getOprogramowanie' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('getOprogramowanie') }}">Oprogramowanie</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-12">
            @yield('content')
        </main>
    </div>
</body>
</html>
