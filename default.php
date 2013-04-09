<?php
	include('sql.php');

	$res = mysql_fetch_array(mysql_query('SELECT * FROM resources WHERE id=1'));
	$post_result = mysql_query('SELECT * FROM blogcache ORDER BY date DESC LIMIT 3');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='styles/main.css' type='text/css'>
		<link rel=StyleSheet href='styles/home.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php include('template/header.php');?>
			<div id='content'>
				<div id='left'>
					<div id='shortbio'>
						<?php echo($res[1])?>
					</div>
					<div id='recentposts'>
						<?php
							while($posts = mysql_fetch_array($post_result)){
								echo("<div class='post'>
										<h1>".$posts['title']."</h1>
										<p class='postcontent'>".$posts['content']."</p>
										<span class='dateposted'>".$posts['date']."</span><hr/>
									</div>");
							}
						?>
					</div>
				</div>
				<div id='right'>
					<div id='syndicate'>
						<!-- rss feed, follow button, link to contact page -->
					</div>
				</div>
			</div>
			<?php include('template/footer.php');?>
		</div>
	</body>
</html>