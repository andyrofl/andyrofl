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
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<meta charset='utf-8'>
		<meta name="description" content="links to every page on andyrofl.com"/>
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
