<?php
	include('../sql.php');
	include('../scripts/validateinput.php');

	$con = mysql_connect($mysql_host, $mysql_user_read, $mysql_password_read);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
	
	if(array_key_exists('id', $_GET) && $_GET['id'] != null){
		//TODO don't trust client input, can't even trust my input
		$res = mysql_fetch_array(mysql_query('SELECT * FROM blog WHERE id='.makesafe($_GET['id'])));
		if($res != null){
			$valid = true;
		}
	}
?>
<html>
	<head>
		<title>andyrofl.com | <?php if($valid){echo($res['title']);}else{echo('post not found');}?></title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='blog.css' type='text/css'>
		<?php include('../template/header.php');mysql_close($con);?>
			<div id='content'>
				<div id='left'>
					<?php
						if($valid){
							echo('<div id="title">'.$res['title'].'</div>
							<div id="postcontent">'.$res['content'].'</div>
							<div id="timestamp">'.$res['date'].'</div>');
						}
						else{
							echo('Error. No parameter or invalid parameter for post id. <a href="/blog/">Click here</a> to return to blog index');
						}
					?>
					<!-- div id='title'><?php echo($res['title']);?></div>
					<div id='postcontent'><?php echo($res['content']);?></div>
					<div id='timestamp'><?php echo($res['date'])?></div-->
				</div>
				<div id='right'>
					<div id='righttop'></div>
					<div id='rightmid'>
						<!-- ?php include('sidebar.php');?-->
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
		<?php include('../template/footer.php');?>
</html>