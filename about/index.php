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
		<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='cpiece'>
					<div id='experience'>
						<?php echo($res[1]);?>
					</div>
				</div>
				<div id='right' class='cpiece'>
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
		<?php include('../template/footer.php');?>
</html>