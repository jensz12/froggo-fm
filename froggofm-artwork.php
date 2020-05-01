<?php
  $user     = 'jensz12'; // Enter your username here
  $key      = '11e147d14d9a0d1ee6b9acf247e742a0'; // Enter your API Key
  $status   = 'Last Played:'; // default to this, if 'Now Playing' is true, the json will reflect this.
  $endpoint = 'https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=' . $user . '&&limit=1&api_key=' . $key . '&format=json';
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $endpoint);
  curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0); // 0 for indefinite
  curl_setopt($ch, CURLOPT_TIMEOUT, 10); // 10 second attempt before timing out
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
  $response = curl_exec($ch);
  $lastfm[] = json_decode($response, true);
  curl_close($ch);
  $artwork = $lastfm[0]['recenttracks']['track'][0]['image'][3]['#text'];
  $artwork = preg_replace('/300x300/', '600x600', $artwork, 1);
  ?>
  <img src="<?php echo $artwork; ?>" class="card-img-top" alt="Album Cover">
