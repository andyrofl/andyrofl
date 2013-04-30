<?php
	if(!isset($con)){
		$con = mysql_connect($mysql_host, $mysql_user_read, $mysql_password_read);
		if (!$con){
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db($mysql_database, $con);
	}
	
	$header_res = mysql_fetch_array(mysql_query('SELECT * FROM resources WHERE id=3'));
	$header_streams;
	$header_date = date('Y-m-d H:i:s', time() - 3600);
	if($header_res['lastupdate'] > $header_date){
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
		$header_streams = json_decode(get_url_contents("https://api.twitch.tv/kraken/streams/andyrofl/"));
		mysql_query("UPDATE resources SET text='$header_streams->game' lastupdate='$header_date' WHERE id=3");
	}
	else{
		$header_streams->game = $header_res['text'];
		$header_streams->stream = 'notnull';
	}
?>
	<meta charset='utf-8'>
	<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
</head>
<body>
	<?php
		if($_SESSION['account'] == 1 || $_SESSION['account'] == 2){
			include('adminbar.php');
		}
	?>
	<div id='main'>
		<div id='header'>
			<div id='hfrep' class='piece'>
				<div id='largelinks'>
					<div class="largelink"><a href="/"><span class='largerText'>andy rofl</span></a></div>
					<div class="largelink"><a href="/blog"><span class='largeText'>blog</span></a></div>
					<div class="largelink"><a href="https://github.com/andyrofl"><span class='largeText'>code</span></a></div>
					<div class="largelink">
						<a href="http://www.twitch.tv/andyrofl">
							<?php
								if($header_streams->stream == null){
									echo("<span class='largeText'>TwitchTV</span> <span class='smallText'>(offline)</span>");
								}
								else{
									echo("<span class='largeText'>TwitchTV</span> <span class='smallText'>(playing $header_streams->game)</span>");
								}
							?>
						</a>
					</div>
				</div>
				<div id='searchlinkbox'>
					<div id='smalllinks'>
						<div class="smalllink"><h4><a href="/about">about</a></h4></div>
						<div class="smalllink"><h4><a href="/contact">contact</a></h4></div>
						<div class="smalllink"><h4><a href="/portfolio">portfolio</a></h4></div>
					</div>
				</div>
			</div>
			<div id='hfl' class='piece'></div>
			<div id='hfr' class='piece'></div>
		</div>