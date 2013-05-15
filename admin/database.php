<?php
	session_start();
	include('sql.php');
	include('../sql.php');

	$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_write, $mysql_password_write);
	$dbpri = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database_private.';charset=utf8', $mysql_user_write, $mysql_password_write);

	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin panel</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
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
							<?php
								if($_SESSION['login']){
									echo("<div class='module'>
					<div class='head'>edit database</div>
						<form method='post'>
							<textarea rows='8' cols='100' name='query'>MySQL query</textarea>
							<input type='radio' name='database' value='pub'> public<br/>
							<input type='radio' name='database' value='pri'> private<br/>
							<input type='submit' value='Post'/>
						</form>
					</div>");
								}
								else{
									echo("invalid credentials. <a href='/admin/'>return to admin panel.</a>");
								}
							?>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
						<div id='rightmid'>
							<a href='blog.php'>blog</a><br/>
							<a href='inventory.php'>inventory</a><br/>
							<a href='portfolio.php'>portfolio</a><br/>
							<a href='users.php'>manage users</a><br/>
							<a href='database.php'>manage database</a>
						</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>