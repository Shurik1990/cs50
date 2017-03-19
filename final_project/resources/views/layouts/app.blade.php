<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Photofilters') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body class="background">
    <div class="container">
            <div class="strap">
                <a href="https://github.com/Shurik1990"><img alt="Strap" src="img/strap.png"/></a>
            </div>
            <div class="logo">
                <img alt="Photofilters" src="img/logo.png"/>
            </div>
            <div class="try_now"><img alt="Try now" src="img/try_now.png"/></div>
			@yield('content')
            <div class="pics">
                <div class="pic pic_1"></div>
                <div class="pic pic_2"></div>
                <div class="pic pic_3"></div>
                <div class="pic pic_4"></div>
                <div class="pic pic_5"></div>
            </div>
        </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
