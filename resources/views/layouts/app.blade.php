<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href=" {{route('posts.index')}}">Bloggy</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="navbar-nav">
                        <a class="nav-link active" href="{{route('posts.index')}}">All Posts</a>
                    </div>
                    <div class="navbar-nav">
                        <a class="nav-link active" href="{{route('users.index')}}">All Users</a>
                    </div>
                </div>

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
                                <img src="data:image/png;base64,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" style="width: 20px; height: 20px; margin:auto 0; border-radius: 50%;" alt="userImage">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <div class="container">
            @yield('content')
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
