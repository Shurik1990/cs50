<!DOCTYPE html>
<html >
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
		<meta name="twitter:image:src" content="http://photofilters.hol.es/img/share_image.png">
		<meta name="twitter:url" content="http://photofilters.hol.es/">
		<meta name="twitter:domain" content="photofilters.hol.es">
		
        <title>{{ config('app.name', 'Photofilters') }}</title>
		<link href="{{ asset('css/filter.css') }}" rel="stylesheet"/>
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"/>
    </head>
    <body class="keksta">
        <div class="container">
            <div class="left">
                <div id="photo-box" class="photo-box">
                    <div class="label">
                        <img src="img/upload.png" alt="Upload icon" width="100" height="100"/>
                        <div>Select photo...</div>
                    </div>
                    <div id="loader" class="loader"></div>
                </div>
                <div class="form-group">
                    <div class="download">
                        <a href="#" id="download-link" class="download-link"><span aria-hidden="true" class="glyphicon glyphicon-download-alt"></span>
                            Download</a>
                    </div>
                </div>
                <input type="file" id="file-picker" class="file-picker"/>
            </div>
            <div class="middle">
                <div id="share">
					<div class="like">Share with friends:</div>
					<div class="share_buttons">
						<input type="button" class="share_btn vk" data-social="vk" data-image="http://photofilters.hol.es/img/share_image.png" data-url="http://photofilters.hol.es/">
						<input type="button" class="share_btn fb" data-social="fb" data-image="http://photofilters.hol.es/img/share_image.png" data-url="http://photofilters.hol.es/">
						<input type="button" class="share_btn tw" data-social="tw" data-image="http://photofilters.hol.es/img/share_image.png" data-url="http://photofilters.hol.es/">
						<input type="button" class="share_btn gp" data-social="gp" data-image="http://photofilters.hol.es/img/share_image.png" data-url="http://photofilters.hol.es/">
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
                <div id="filters" class="filters">
                    <div class="preset preset_original" data-preset="original">
                        <span class="preset-name">Natur</span>
                    </div>
                    <div class="preset preset_vintage" data-preset="vintage">
                        <span class="preset-name">Vintage</span>
                    </div>
                    <div class="preset preset_lomo" data-preset="lomo" class="">
                        <span class="preset-name">Blur</span>
                    </div>
                    <div class="preset preset_clarity" data-preset="clarity" class="">
                        <span class="preset-name">Clarity</span>
                    </div>
                    <div class="preset preset_concentrate" data-preset="concentrate">
                        <span class="preset-name">Concentrate</span>
                    </div>
                    <div class="preset preset_sunrise" data-preset="sunrise">
                        <span class="preset-name">Sunrise</span>
                    </div>
                    <div class="preset preset_crossProcess" data-preset="crossProcess">
                        <span class="preset-name">Contrast</span>
                    </div>
                    <div class="preset preset_orangePeel" data-preset="orangePeel">
                        <span class="preset-name">Sepia</span>
                    </div>
                    <div class="preset preset_love" data-preset="love" class="Active">
                        <span class="preset-name">Love</span>
                    </div>
                    <div class="preset preset_grungy" data-preset="grungy">
                        <span class="preset-name">Grungy</span>
                    </div>
                    <div class="preset preset_jarques" data-preset="jarques">
                        <span class="preset-name">Jarques</span>
                    </div>
                    <div class="preset preset_pinhole" data-preset="pinhole">
                        <span class="preset-name">Mono</span>
                    </div>
                    <div class="preset preset_oldBoot" data-preset="oldBoot">
                        <span class="preset-name">Old Boot</span>
                    </div>
                    <div class="preset preset_glowingSun" data-preset="glowingSun">
                        <span class="preset-name">Glowing Sun</span>
                    </div>
                    <div class="preset preset_hazyDays" data-preset="hazyDays">
                        <span class="preset-name">Hazy Days</span>
                    </div>
                    <div class="preset preset_herMajesty" data-preset="herMajesty">
                        <span class="preset-name">Her Majesty</span>
                    </div>
                    <div class="preset preset_nostalgia" data-preset="nostalgia">
                        <span class="preset-name">Nostalgia</span>
                    </div>
                    <div class="preset preset_hemingway" data-preset="hemingway">
                        <span class="preset-name">Hemingway</span>
                    </div>
                </div>
            </div>
        </div>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="js/caman.full.min.js"></script>
        <script type="text/javascript" src="js/filter.js"></script>
        <script type="text/javascript" src="js/share.js"></script>  
    </body>
</html>