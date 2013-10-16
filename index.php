<?php
	session_start();
	include('sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$slideStmt = $db->prepare('SELECT * FROM slideshow');
	$blogStmt = $db->prepare('SELECT * FROM blog ORDER BY date DESC LIMIT 3');
	
	$slideStmt->execute();
	$blogStmt->execute();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='/cdn/styles/home.css' type='text/css'>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<meta charset='utf-8'>
		<meta name="description" content="andy rofl's internet ranch"/>
	</head>
	<body>
		<div id='main'>
			<?php include('template/header.php');?>
			<div id='content'>
				<div id='left' class='piece'>
					<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
					<div id='cmid'>
						<div id='cmidrep'>
							<div id='slideshow'>
								<?php
									while($slide = $slideStmt->fetch()){
										echo('<a href="'.$slide['link'].'"><img src="'.$slide['src'].'"/></a>');
									}
								?>
							</div>
							<div id='recentposts'>
								<?php
									while($posts = $blogStmt->fetch()){
										echo("<div class='post'>
												<h1><a href='/blog/".$posts['vanity']."'>".$posts['title']."</a></h1>
												<p class='postcontent'>".$posts['content']."</p>
												<span class='dateposted'>".$posts['date']."</span>
											</div>");
									}
								?>
							</div>
						</div>
						<div id='cmidl'></div>
					</div>
					<div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
					<div id='rightmid'>
						<div id='syndicate'>
							<div class='github icon'></div>
							<div class='rss icon'><a href='/blog/feed/'></a></div>
							<div class='spotify icon'><a href='http://open.spotify.com/user/1218609985/playlist/5o5nzskGU4sjI6UUIQ4M7p'></a></div>
							<div class='steam icon'><a href='https://steamcommunity.com/id/andyrofl'></a></div>
							<div class='twitch icon'><a href='http://twitch.tv/andyrofl'></a></div>
							<a class='twitter-timeline' width="280" href='https://twitter.com/AndyroflZZ' data-widget-id='322008644944269313'>Tweets by @AndyroflZZ</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</div>
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('template/footer.php');?>
		</div>
	</body>
</html>