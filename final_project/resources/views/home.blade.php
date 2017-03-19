<!DOCTYPE html>
<html >
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Photofilters') }}</title>
		<link href="{{ asset('css/filter.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
    </head>
    <body class="keksta">
        <div class="container">
            <div class="left">
                <div class="photos">
                    <div class="photo"></div>
                </div>
                <div class="form-group">
                    <button class="btn btn-default btn-start" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-picture"></span>
                                Upload your photo
                    </button>
                    <button class="btn btn-default btn-end" type="submit">
                        <span aria-hidden="true" class="glyphicon glyphicon-download-alt"></span>
                                Download
                    </button>
                </div>
            </div>
            <div class="middle">
                <div id="share">
                <div class="like">Share</div>
                <div class="social">
                    <a class="push facebook" data-id="fb"><i class="fa fa-facebook"></i> Facebook</a>
                    <a class="push twitter" data-id="tw"><i class="fa fa-twitter"></i> Twitter</a>
                    <a class="push vkontakte" data-id="vk"><i class="fa fa-vk"></i> VK</a>
                    <a class="push google" data-id="gp"><i class="fa fa-google-plus"></i> Google+</a>
                </div>
                </div>
				<form action="{{ route('logout') }}" role="form" method="post">
					<fieldset>
					{{ csrf_field() }}
						<div class="form-group">
							<button class="btn btn-default" type="submit">
								<span aria-hidden="true" class="glyphicon glyphicon-off"></span><br>
									Log out
							</button>
						</div>
					</fieldset>
				</form>
            </div>
            <div class="right">
                <ul class="toggle-controls">
                    <li class="natur" data-filter="natur"></li>
                    <li class="blur" data-filter="blur"></li>
                    <li class="contrast" data-filter="contrast"></li>
                    <li class="negativ" data-filter="negativ"></li>
                    <li class="mono" data-filter="mono"></li>
                    <li class="sepia" data-filter="sepia"></li>
                    <li class="invert" data-filter="invert"></li>
                    <li class="magic" data-filter="magic"></li>
                    <li class="color" data-filter="color"></li>
                    <li class="juicy" data-filter="juicy"></li>
                    <li class="ghost" data-filter="ghost"></li>
                    <li class="art" data-filter="art"></li>
                </ul>
            </div>
        </div>
        <script type="text/javascript" src="js/index.js"></script>
        <script type="text/javascript" src="js/share.js"></script>
    </body>
</html>