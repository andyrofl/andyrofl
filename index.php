<?php
	session_start();
	include('sql.php');

	$con = mysql_connect($mysql_host, $mysql_user_read, $mysql_password_read);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
	
	$res = mysql_fetch_array(mysql_query('SELECT * FROM resources WHERE id=1'));
	$post_result = mysql_query('SELECT * FROM blogcache ORDER BY date DESC LIMIT 3');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='styles/home.css' type='text/css'>
		<link rel=StyleSheet href='styles/main.css' type='text/css'>
		<?php include('template/header.php'); if($_SESSION['account'] === 1 || $_SESSION['account'] === 2){include('template/adminbar.php');}?>
			<div id='content'>
				<div id='left'>
					<div id='shortbio'>
						<?php echo($res[1])?>
					</div>
					<div id='recentposts'>
						<?php
							while($posts = mysql_fetch_array($post_result)){
								echo("<div class='post'>
										<h1><a href='/blog/post.php?id=".$posts['archiveid']."'>".$posts['title']."</a></h1>
										<p class='postcontent'>".$posts['content']."</p>
										<span class='dateposted'>".$posts['date']."</span>
									</div>");
							}
							mysql_close($con);
						?>
					</div>
				</div>
				<div id='right'>
					<div id='syndicate'>
						<a class='twitter-timeline' href='https://twitter.com/AndyroflZZ' data-widget-id='322008644944269313'>Tweets by @AndyroflZZ</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
			</div>
		<?php include('template/footer.php');?>
</html>