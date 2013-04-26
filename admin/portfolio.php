<?php
	include('../sql.php');
	$con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
	
	if(array_key_exists('item', $_POST)){
		//mysql_query("INSERT INTO portfolio (item, category, description, status) VALUES (\$_post['item'], \$_post['category'], \$_post['description'], $_POST['status'])");
		//upload and transcode image
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin || portfolio</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<?php include('../template/header.php');mysql_close($con);?>
			<div id='content'>
				<div class='module'>
					<form action='portfolio.php' method='post'>
						<input type='text' name='item' value='project'/>
						<input type='text' name='category' value='category'/>
						<input type='text' name='description' value='description'/>
						<input type='text' name='status' value='development status'/>
						<input type='file' name='image' value='image'/>
						<input type='submit' value='submit'/>
					</form>
				</div>
			</div>
		<?php include('../template/footer.php');?>
</html>