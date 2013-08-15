<?php
	session_start();
	include('../sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$projectStmt = $db->prepare('SELECT * FROM portfolio ORDER BY id LIMIT 5');
	$projectStmt->execute();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl's projects</title>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='/cdn/styles/portfolio.css' type='text/css'>
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
							<div id='highlights'>
								<?php
									while($project = $projectStmt->fetch()){
										echo "<div class='project'><img width='60' height='40' src='/cdn/games/".$project['vanity']."_0.png'>".$project['title']."</div>";
									}
								?>
							</div>
							<?php
								if(array_key_exists('sort', $_GET)){
									$projectStmt = $db->prepare('SELECT * FROM portfolio WHERE category=:category LIMIT 5');
									$projectStmt->execute(array(':category' => $_GET['sort']));
								}
								else{
									$projectStmt = $db->prepare('SELECT * FROM portfolio ORDER BY id DESC LIMIT 5');
									$projectStmt->execute();
								}
									while($project = $projectStmt->fetch()){
										echo "<div class='project'><img width='60' height='40' src='/cdn/games/".$project['vanity']."_0.png'>".$project['title']."</div>";
									}
							?>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
				<div id='right' class='piece'>
					<div class='filterselect'><a href='/portfolio/game'>Games</a></div>
					<div class='filterselect'><a href='/portfolio/level'>Maps / Level Sets</a></div>
					<div class='filterselect'><a href='/portfolio/opensource'>Open Source Contributions</a></div>
					<div class='filterselect'><a href='/portfolio/software'>Software</a></div>
					<div class='filterselect'><a href='/portfolio/hardware'>Hardware</a></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>