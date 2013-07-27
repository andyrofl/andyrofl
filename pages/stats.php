<?php
	session_start();
	include('../sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andyrofl.com stats</title>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='/cdn/styles/about.css' type='text/css'>
		<meta charset='utf-8'>
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
								$statStmt = $db->query('SELECT * FROM stats');
								while($statData = $statStmt->fetch()){
									echo($statData['stat'].' '.$statData['value'].'<br/>');
								}
							?>
						</div>
					<div id='cmidl'></div>
					</div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
					<div id='rightmid'>
						something should go here
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>