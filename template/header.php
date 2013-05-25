<?php
	if(!isset($db)){
		$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	}
	
	$headerResStmt = $db->prepare('SELECT * FROM resources WHERE id=3');
	$headerResStmt->execute();
	$header_res = $headerResStmt->fetch();
	
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

		$dbWrite = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_write, $mysql_password_write);
		$headerResStmt = $dbWrite->prepare('UPDATE resources SET text=:text lastupdate=:update WHERE id=3');
		$headerResStmt->execute(array(':text' => $header_streams->game, ':update' => $header_date));
	}
	else{
		$header_streams->game = $header_res['text'];
		$header_streams->stream = 'notnull';
	}

	if($_SESSION['account'] > 1){
		include('adminbar.php');
	}
	else if($_SESSION['account'] == 1){
		include('modmenu.php');
	}
?>
<script src='//www.google.com/jsapi' type='text/javascript'></script>
<script type='text/javascript'>
	google.load('search', '1', {language: 'en', style: google.loader.themes.MINIMALIST});
	google.setOnLoadCallback(function(){
		var customSearchOptions = {};
		var customSearchControl = new google.search.CustomSearchControl('011954134038849293733:lw4z0ujey7q', customSearchOptions);
		customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
		var options = new google.search.DrawOptions();
		options.setSearchFormRoot('cse-search-form');
		customSearchControl.draw('cse', options);
	}, true);
</script>
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
			</div>
			<div id='search'>
				<div id='cse-search-form' style='width: 100%;'>Loading</div>
			</div>
		</div>
	</div>
	<div id='hfl' class='piece'></div>
	<div id='hfr' class='piece'></div>
</div>