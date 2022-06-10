<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Index Agro Group') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Index Agro Group') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @foreach($menu_settings as $key=>$menuMap)
                        @if($menuMap->location_id !=1)
                            @continue
                        @endif
                        @if($menuMap->children->count())
                            <li class="nav-item dropdown" id="{{ $menuMap->id }}">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$menuMap->name}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    @foreach($menuMap->children as $child1)
                                        <li class="nav-item" id="{{ $child1->id }}">
                                            <a class="dropdown-item"
                                               href="{{route('contentGateway',$child1->slug)}}">
                                                {{ $child1->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="{{route('contentGateway',$menuMap->slug)}}">
                                    {{ $menuMap->name }}</a>
                            </li>
                        @endif
                    @endforeach
                    <li><a class="nav-item" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-item" href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>

</script>
</body>
</html>
