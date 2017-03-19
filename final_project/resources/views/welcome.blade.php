<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>
        <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet"/>
        <title>Photofilters</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </body>
</html>