<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>


<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-custom shadow-sm">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <div class="d-flex justify-content-center align-items-center p-3">
                    <img src="{{ asset('images/ip-website-favicon-color.png') }}" alt="Logo" style="width: 50px; height: 50px;">
                    <h6 class="m-0 ms-3">Professional-networks</h6>
                </div>
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(auth()->user()->profile()->first())
                                    <img src="{{ asset('storage/profile_photos/' . Auth::user()->profile()->first()->profile_photo)}}"  style="width: 50px; height: 50px"; class="img-fluid rounded-circle" alt="{{ auth()->user()->name }}">
                                    <span>{{ Auth::user()->name }}</span>
                                @else
                                    <img src="{{ asset('storage/profile_photos/default.jpg')}}" class="img-fluid rounded-circle Custom-color"  style="width: 50px; height: 50px"; alt="{{ auth()->user()->name }}">
                                    <span>{{ Auth::user()->name }}</span>
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2  d-md-block bg-light sidebar collapse vh-100" id="sidebarCollapse">
                <div class="sidebar-sticky ">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show') }}">{{ __('Profiles') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.all') }}">{{ __('All Profiles') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.noProfile') }}">{{ __('Show users without profile') }}</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('customers.all') }}">{{ __('Klanten') }}</a>
                        </li>
                </ul>
                <div class="p-3">
                    <p class="text-muted">&copy; Professional-networks 2023</p>
                </div>
            </div>
            </nav>

            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
@vite('resources/js/app.js')

@stack('scripts')
</body>
</html>
