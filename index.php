<?php
	session_start();
	include('sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$resStmt = $db->prepare('SELECT * FROM resources WHERE id=1');
	$blogStmt = $db->prepare('SELECT * FROM blogcache ORDER BY date DESC LIMIT 3');
	$resStmt->execute();
	$blogStmt->execute();
	$res = $resStmt->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='/styles/home.css' type='text/css'>
		<link rel=StyleSheet href='/styles/main.css' type='text/css'>
		<meta charset='utf-8'>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
	</head>
	<body>
		<div id='main'>
			<?php include('template/header.php');?>
				<div id='content'>
					<div id='left' class='piece'>
						<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
						<div id='cmid'>
							<div id='cmidrep'>
								<div id='shortbio'>
									<?php echo($res[1])?>
								</div>
								<div id='recentposts'>
									<?php
										while($posts = $blogStmt->fetch()){
											echo("<div class='post'>
													<h1><a href='/blog/post.php?id=".$posts['archiveid']."'>".$posts['title']."</a></h1>
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
								<div class='rss icon'><a href='/blog/rss'></a></div>
								<div class='spotify icon'><a href='spotify'></a></div>
								<div class='steam icon'><a href='steamcommunity.com/id/andyrofl'></a></div>
								<div class='twitch icon'><a href='twitch.tv/andyrofl'></a></div>
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