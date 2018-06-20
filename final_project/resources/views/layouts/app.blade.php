<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Photofilters - web application for change your photos!">
	<meta name="keywords" content="Photofilters, photo, filters, filters for photo">
	
	<!-- For everyone else -->
	<meta property="og:title" content="Photofilters" />
	<meta property="og:description" content="Photofilters - web application for change your photos!" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://photofilters.hol.es/" />
	<meta property="og:image" content="http://photofilters.hol.es/img/share_image.png" />
	<meta property="og:image:type" content="image/png">
	<meta property="og:image:width" content="1092" /> 
	<meta property="og:image:height" content="928" />
		
	<!-- For twitter -->
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="Photofilters">
	<meta name="twitter:description" content="Photofilters - web application for change your photos!">
	<meta name="twitter:image:src" content="http://photofilters.hol.es/img/share/share_image.png">
	<meta name="twitter:url" content="http://photofilters.hol.es/">
	<meta name="twitter:domain" content="photofilters.hol.es">
	
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
