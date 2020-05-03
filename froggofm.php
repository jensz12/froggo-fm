<?php
$now_playing = file_get_contents('https://jensz12.com/froggofm-playing.php');
$artwork = file_get_contents('https://jensz12.com/froggofm-artwork.php');
?>
<!DOCTYPE html>
<html lang="da">
<head>
<meta name="charset" content="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Froggo FM - Jens Møller</title>
<meta name="description" content="Froggo FM">
<link rel="icon" href="https://jensz12.com/favicon.png">
<meta name="theme-color" content="#A81010">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@jensz12">
<meta name="twitter:creator" content="@jensz12">
<meta name="twitter:title" content="Froggo FM">
<meta name="twitter:description" content="Froggo FM">
<meta name="twitter:image:src" content="https://www.gravatar.com/avatar/5ce60652703ef30780a3cbb1c0eb0317?s=2000">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
<link rel="manifest" href="/manifest-froggo.json">
<link rel="image_src" href="/https://www.gravatar.com/avatar/5ce60652703ef30780a3cbb1c0eb0317?s=2000">
<link href='https://fonts.googleapis.com/css?family=Roboto:100,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="https://design.jensz12.com/css/green-audio-player.css">
<style>
body {
	background-image: url(https://design.jensz12.com/images/screen-back.png);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center center;
	background-attachment: fixed;
	height: 100%;
	font-family: 'Roboto', sans-serif;
	padding-top: 70px;
}
a:link, a:visited {
	color: rgb(102, 102, 102);
	text-decoration: none;
}
a:hover, a:active {
	text-decoration: underline;
}
.player {
    margin-top: 2px;
    margin-bottom: 2px;
    margin-right: 2px;
    margin-left: 2px;
}
</style>
</head>
<body>
<main role="main" id="content" class="container">
	<div class="row justify-content-md-center">
		<article class="col-lg-6 col-md-8 col-sm-12">
			<div class="card">
			<span id="artwork"></span>
			<div class="card-body">
			<h1 class="card-title">Froggo FM</h1>
			<p class="card-subtitle mb-2 text-muted">Spiller nu</p>
			<p class="card-text"><span id="playing"><?php echo $now_playing; ?></span></p>
			<div class="froggo-stream">
        			<audio crossorigin preload="none">
           				<source src="https://icecast.jensz12.com/stream.ogg" type="audio/ogg">
        			</audio>
   			 </div>
			</div>
			</div>
		</article>
	</div>
</main>
<!--<script src="https://static.jensz12.com/script/snowstorm.js"></script>-->
<script src="https://design.jensz12.com/js/green-audio-player.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            new GreenAudioPlayer('.froggo-stream', { showTooltips: true, showDownloadButton: false, enableKeystrokes: true });
        });
    </script>
<script>
$(function () { $('[data-toggle="tooltip"]').tooltip() })
</script>
<script>
function worker(){
	$.ajaxSetup ({
		cache: false
	});

	$("#playing").load('froggofm-playing.php');
	$("#artwork").load('froggofm-artwork.php');
}
$(function(){
	worker();
	setInterval(worker, 3000);
});
</script>
</body>
</html>
