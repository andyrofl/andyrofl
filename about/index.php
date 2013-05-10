<?php
	session_start();
	include('../sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$resStmt = $db->prepare('SELECT * FROM resources WHERE id=4');
	$resStmt->execute();
	$res = $resStmt->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andyrofl.com | bio</title>
		<link rel=StyleSheet href='/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='about.css' type='text/css'>
		<meta charset='utf-8'>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
				<div id='content'>
					<div id='left' class='piece'>
						<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
						<div id='cmid'>
							<div id='cmidrep'>
								<div id='experience'>
									<?php echo($res[1]);?>
								</div>
							</div>
						<div id='cmidl'></div>
						</div>
					</div>
					<div id='right' class='piece'>
						<div id='righttop'></div>
						<div id='rightmid'>
							<div id='namepic'>
								<div id='name'>andy rofl</div>
								<a href='/cdn/content/headshot_full.jpg'><img id='headshot' src='/cdn/content/headshot.jpg'/></a>
							</div>
							<div id='contact'>
								<span>location: Webster, NY</span><br/><br/>
								<span>admin@andyrofl.com</span><br/>
								<a href='https://twitter.com/andyroflZZ'>@andyroflZZ</a><br/>
								<a href='https://github.com/andyrofl'>andyrofl @ github</a>
							</div>
						</div>
						<div id='rightbottom'></div>
					</div>
				</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>