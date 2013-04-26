<?php
	session_start();
	include('../sql.php');
	include('sql.php');
	
	$con = mysql_connect($mysql_host, $mysql_user_write, $mysql_password_write);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
	if($_post[item] != null){
		//mysql_query('INSERT INTO private_inv');
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin || inventory</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<?php 	include('../template/header.php');mysql_close($con);?>
			<div id='content'>
				<div id='left'>
					<form action='inventory.php' method='post'>
						<input type='text' name='item' value='item'/>
						<input type='text' name='location' value='location'/>
						<input type='text' name='serial' value='serial/cd-key'/>
						<input type='file' name='invoice' value='invoice'/>
						<input type='text' name='category' value='category'/>
						<input type='text' name='value' value='value'></input>
						<input type='submit' value='submit'/>
					</form>
				</div>
			</div>
		<?php include('../template/footer.php');?>
</html>