<?php 
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
?>
<div id='header'>
	<div id='largelinks'>
		<div class="largelink"><a href="/"><span class='largerText'>andy rofl</span></a></div>
		<div class="largelink"><a href="/blog"><span class='largeText'>blog</span></a></div>
		<?php $streams = json_decode(get_url_contents("https://api.twitch.tv/kraken/streams/andyrofl/"));?>
		<div class="largelink">
			<a href="http://www.twitch.tv/andyrofl/new">
				<?php
					//TODO cache this
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
			<div class="smalllink"><a href="/"><h4>about</h4></a></div>
			<div class="smalllink"><a href="/contact"><h4>contact</h4></a></div>
		</div>
	</div>
</div>