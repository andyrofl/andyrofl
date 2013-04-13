<?php
	$res = mysql_fetch_array(mysql_query('SELECT * FROM resources WHERE id=3'));
	$streams;
	$date = date('Y-m-d H:i:s', time() - 3600);
	if($res['lastupdate'] > $date){
		function get_url_contents($url){
			$crl = curl_init();
			$timeout = 5;
			curl_setopt ($crl, CURLOPT_URL,$url);
			curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
			$ret = curl_exec($crl);
			curl_close($crl);
			return $ret;
		}
		$streams = json_decode(get_url_contents("https://api.twitch.tv/kraken/streams/andyrofl/"));
		mysql_query("UPDATE resources SET text='$streams->game' lastupdate='$date' WHERE id=3");
		echo('not cached');
	}
	else{
		$streams->game = $res['text'];
		$streams->stream = 'notnull';
		echo('cached');
	}
?>
<div id='header'>
	<div id='largelinks'>
		<div class="largelink"><a href="/"><span class='largerText'>andy rofl</span></a></div>
		<div class="largelink"><a href="/blog"><span class='largeText'>blog</span></a></div>
		<div class="largelink">
			<a href="http://www.twitch.tv/andyrofl">
				<?php
					if($streams->stream == null){
						echo("<span class='largeText'>TwitchTV</span> <span class='smallText'>(offline)</span>");
					}
					else{
						echo("<span class='largeText'>TwitchTV</span> <span class='smallText'>(playing $streams->game)</span>");
					}
				?>
			</a>
		</div>
	</div>
	<div id='searchlinkbox'>
		<div id='smalllinks'>
			<div class="smalllink"><h4><a href="/">about</a></h4></div>
			<div class="smalllink"><h4><a href="/contact">contact</a></h4></div>
		</div>
	</div>
</div>