<?php
	include('../template/header.php');
	include('sql.php');
	$con = mysql_connect($mysql_host_pri, $mysql_user_pri, $mysql_password_pri);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	if($_post[item] != null){
		mysql_select_db($mysql_database, $con);
		//mysql_query('INSERT INTO private_inv');

		mysql_close($con);
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin || inventory</title>
		<link rel=StyleSheet href='styles/main.css' type='text/css'>
		<link rel=StyleSheet href='styles/home.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php 	include('../template/header.php');?>
			<div id='content'>
				<div class='module'>
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
		</div>
	</body>
</html>