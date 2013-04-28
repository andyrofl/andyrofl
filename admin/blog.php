<?php
	session_start();
	include('../sql.php');
	include('sql.php');

	$con = mysql_connect($mysql_host, $mysql_user_read, $mysql_password_read);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<?php include('../template/header.php');?>
			<?php
				if($_SESSION['login']){
					echo("<div id='content'>
						<div id='left'>
							<div class='head'>blogpost</div>
								<form method='post'>
									<textarea rows='10' cols='100' name='postcontent'>Post content (html supported)</textarea>
									<textarea rows='3' cols='100' name='description'>Description</textarea><br/>
									<input type='text' name='category' value='category'/>
									<input type='text' name='title' value='title'/>
									<input type='text' name='tags' value='tags'/>
									<input type='hidden' name='submittype' value='blogpost'/>
									<input type='submit' value='Post'/>
								</form>
						</div>
					</div>");
				}
				else{
					echo("invalid credentials. <a href='/admin/'>return to admin panel.</a>");
				}
			?>
		<?php include('../template/footer.php');?>
</html>