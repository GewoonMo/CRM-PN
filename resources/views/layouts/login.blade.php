<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    {{--    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>--}}
    <link href="{{ asset('images/icons/favicon.ico') }}"  type="image/png" rel="stylesheet">


    <!--===============================================================================================-->
    {{--    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">--}}
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--===============================================================================================-->
    {{--    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">--}}
    <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" type="text/css"  rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link href="{{ asset('vendor/animate/animate.css') }}"  type="text/css" rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link href="{{ asset('css/util.css') }}" rel="stylesheet">


    <!--===============================================================================================-->
    {{--    <link href="{{ asset('scss/util.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('scss/mainLogin.css') }}" rel="stylesheet">--}}
    {{--    <link rel="stylesheet" type="text/css" href="mainLogin.css">--}}
    {{--    <link rel="stylesheet" type="text/css" href="main.css">--}}
    @vite(['resources/sass/util.scss', 'resources/js/app.js'])
    @vite(['resources/sass/mainLogin.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/ee9a1e9257.js" crossorigin="anonymous"></script>


    <!--===============================================================================================-->
    {{--    @vite(['resources/sass/login.scss', 'resources/js/app.js'])--}}
</head>
<body>

{{--<div class="container">--}}
{{--    <h1>Welcome to our website</h1>--}}
{{--    <p>Explore our services and discover what we can offer you.</p>--}}
{{--    <div class="btn-container">--}}
{{--        <a href="#" class="btn">Sign up</a>--}}
{{--        <a href="#" class="btn">Learn more</a>--}}
{{--    </div>--}}
@yield('content')
{{--</div>--}}


<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="js/main.js"></script>

</body>
</html>
