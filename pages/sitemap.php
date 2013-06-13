<?php
	session_start();
	include('../sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$linkStmt = $db->prepare('SELECT * FROM links');
	$linkStmt->execute();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='/styles/home.css' type='text/css'>
		<link rel=StyleSheet href='/styles/main.css' type='text/css'>
		<meta charset='utf-8'>
		<meta name="description" content="links to every page on andyrofl.com"/>
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
								<?php
									while($link = $linkStmt->fetch()){
										echo('<a href="'.$link['link'].'">andyrofl.com'.$link['link'].'</a><br/>');
									}
								?>
							</div>
							<div id='cmidl'></div>
						</div>
						<div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div>
					</div>
					<div id='right' class='piece'>
						<div id='righttop'></div>
						<div id='rightmid'>
							<a href='/about/'>about</a><br/>
							<a href='/blog/'>blog</a>
						</div>
						<div id='rightbottom'></div>
					</div>
				</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>
