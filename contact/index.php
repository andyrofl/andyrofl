<?php
	session_start();
	include('../sql.php');
	
	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$resStmt = $db->prepare('SELECT * FROM resources WHERE id=5');
	$resStmt->execute();
	$res = $resStmt->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>contact</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='cpiece'>
					<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
					<div id='cmid'>
						<div id='cmidrep'>
							<?php echo($res[1]);?>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
			</div>
		<?php include('../template/footer.php');?>
</html>