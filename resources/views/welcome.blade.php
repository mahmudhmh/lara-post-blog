<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body class="container-fluid">

    <div class=" d-flex flex-column justify-content-center align-items-center gap-3" style="height:100vh;">
        <div class="card p-5 bg-light">
            <div class="d-flex justify-content-center align-items-center">
                <img  class="col-md-5 row"
                    src="
                https://media1.giphy.com/media/4N3Mqhl8JRyYLapZgt/source.gif ">
            </div>
            <div class=" d-flex justify-content-center align-items-center">
                @guest
                @if (Route::has('login'))
                <button class="btn btn-primary m-2 px-3 py-0">
                    <a class=" nav-link link-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                </button>
                @endif

                @if (Route::has('register'))
                <button class="btn btn-secondary m-2 py-0">
                    <a class="nav-link link-light" href="{{ route('register') }}">{{ __('Register') }}</a>
                </button>
                @endif

                @endguest
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
