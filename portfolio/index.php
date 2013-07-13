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
		<link rel=StyleSheet href='/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='/styles/portfolio.css' type='text/css'>
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
									if($_GET['sort'] !== 'skills'){
										while($project = $projectStmt->fetch()){
											echo "<div class='project'><img width='60' height='40' src='img/".$project['item'].".png'>".$project['item']."</div>";
										}
									}
								?>
							</div>
							<?php
								if(array_key_exists('sort', $_GET)){
									if($_GET['sort'] === 'game'){
										//$res = mysql_fetch_row(mysql_query('SELECT game FROM resources ORDER BY type'));
										echo('sort by game');
										//games
									}
									else if($_GET['sort'] === 'level'){
										echo('sort by level');
										//maps / level sets
									}
									else if($_GET['sort'] === 'opensource'){
										echo('sort by open source');
										//open source contributions
										header('X-PHP-Response-Code: 404', true, 404); //TODO remove after the page drops
									}
									else if($_GET['sort'] === 'software'){
										echo('sort by software');
										//software
									}
									else if($_GET['sort'] === 'hardware'){
										echo('sort by hardware');
										//hardware
									}
									else if($_GET['sort'] === 'skills'){
										$skillsStmt = $db->prepare('SELECT * FROM resources WHERE id=2');
										$skillsStmt->execute();
										$skills = $skillsStmt->fetch();
										echo($skills[1]);
									}
									else{
										echo('something went wrong. Email me at admin@andyrofl.com');
									}
								}
							?>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
				<div id='right' class='piece'>
					<div class='filterselect'><a href='index.php?sort=game'>Games</a></div>
					<div class='filterselect'><a href='index.php?sort=level'>Maps / Level Sets</a></div>
					<div class='filterselect'><a href='index.php?sort=opensource'>Open Source Contributions</a></div>
					<div class='filterselect'><a href='index.php?sort=software'>Software</a></div>
					<div class='filterselect'><a href='index.php?sort=hardware'>Hardware</a></div>
					<div class='filterselect'><a href='index.php?sort=skills'>My skills</a></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>