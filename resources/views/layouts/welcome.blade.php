<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZEzIWin593Or5G5W5iq0wM" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZEzIWin593Or5G5W5iq0wM" crossorigin="anonymous"></script>
    @vite(['resources/sass/welcome.scss', 'resources/js/app.js'])
</head>
<body>

<div class="container">
    {{--    <h1>Welcome to our website</h1>--}}
    {{--    <p>Explore our services and discover what we can offer you.</p>--}}
    {{--    <div class="btn-container">--}}
    {{--        <a href="#" class="btn">Sign up</a>--}}
    {{--        <a href="#" class="btn">Learn more</a>--}}
    {{--    </div>--}}
    @yield('content')
</div>
</body>
</html>

