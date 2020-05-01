<?php
$now_playing_api = json_decode(file_get_contents('http://vps.jensz12.com:8000/status-json.xsl'), true);
$now_playing = $now_playing_api['icestats']['source']['artist'].' - '.$now_playing_api['icestats']['source']['title'];

echo $now_playing;
?>
