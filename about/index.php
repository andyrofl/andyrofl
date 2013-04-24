<?php
	include('../sql.php');
	
	$con = mysql_connect($mysql_host, $mysql_user_read, $mysql_password_read);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
	
	$res = mysql_fetch_array(mysql_query('SELECT * FROM resources WHERE id=2'));
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andyrofl.com | bio</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='about.css' type='text/css'>
		<?php include('../template/header.php');mysql_close($con);?>
			<div id='content'>
				<div id='right'>
					<div id='namepic'>
						<div id='name'>andy rofl</div>
						<a href='../cdn/headshot_full.jpg'><img id='headshot' src='../cdn/headshot.jpg'/></a>
					</div>
					<div id='contact'>
						<span>location: Webster, NY</span><br/><br/>
						<span>admin@andyrofl.com</span><br/>
						<a href='https://twitter.com/andyroflZZ'>@andyroflZZ</a><br/>
						<a href='https://github.com/andyrofl'>andyrofl @ github</a>
					</div>
				</div>
				<div id='left'>
					<div id='experience'>
						<?php echo($res['text']);?>
					</div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>