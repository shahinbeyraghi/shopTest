<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Shop') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Shop') }}
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
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

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <form class="form-inline multi-range-field" action="search" method="get">
                        @csrf
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input name="title" value="{{$request->title??''}}" type="text" class="form-control mb-2 mr-sm-2"
                               id="inlineFormInputName2" placeholder="Title">

                        <span class="font-weight-bold text-primary ml-2 mt-n3 mr-1 valueSpan1"></span>
                        <input name="priceFrom" type="range" min="1000" max="4999" value="{{$request->priceFrom??'1000'}}"
                               class="custom-range form-control border-0 mb-3" id="customRange11">

                        <input name="priceTo" type="range" min="5000" max="10000" value="{{$request->priceTo??'10000'}}"
                               class="custom-range form-control border-0 mb-3 ml-sm-n1 mr-sm-3" id="customRange12">
                        <span class="font-weight-bold text-primary ml-n2 mt-n3 mr-3 valueSpan2"></span>

                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>
                </div>
            </div>
            @yield('content')
        </main>
    </div>
<script>
    $(document).ready(function() {
        const $valueSpan2 = $('.valueSpan2');
        const $value2 = $('#customRange12');
        $valueSpan2.html($value2.val());
        $value2.on('input change', () => {
            $valueSpan2.html($value2.val());
            $value2.attr('value', $value2.val());
        });
        const $valueSpan = $('.valueSpan1');
        const $value = $('#customRange11');
        $valueSpan.html($value.val());
        $value.on('input change', () => {
            $valueSpan.html($value.val());
            $value.attr('value', $value.val());
    });
    });
</script>
</body>
</html>
