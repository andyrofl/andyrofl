<?php
	include('../sql.php');
	
	$con = mysql_connect($mysql_host, $mysql_user_read, $mysql_password_read);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl's projects</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='portfolio.css' type='text/css'>
		<?php include('../template/header.php'); ?>
			<div id='content'>
				<div id='left'>
					<div class='filterselect'><a href='index.php?sort=game'>Games</a></div>
					<div class='filterselect'><a href='index.php?sort=level'>Maps / Level Sets</a></div>
					<div class='filterselect'><a href='index.php?sort=opensource'>Open Source Contributions</a></div>
					<div class='filterselect'><a href='index.php?sort=software'>Software</a></div>
					<div class='filterselect'><a href='index.php?sort=hardware'>Hardware</a></div>
					<div class='filterselect'><a href='index.php?sort=skills'>My skills</a></div>
				</div>
				<div id='right'>
					<div>
						
					</div>
					<div id='highlights'>
						<?php
							if($_GET['sort'] !== 'skills'){
								$post_result = mysql_query('SELECT * FROM portfolio ORDER BY id LIMIT 5');
								while($project = mysql_fetch_array($post_result)){
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
								$skills = mysql_fetch_array(mysql_query('SELECT * FROM resources WHERE id=2'));
								echo($skills[1]);
							}
							else{
								echo('something went wrong. Email me at admin@andyrofl.com');
							}
						}
					?>
				</div>
			</div>
		<?php include('../template/footer.php'); mysql_close($con);?>
</html>