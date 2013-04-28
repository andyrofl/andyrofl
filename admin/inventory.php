<?php
	session_start();

	include('../sql.php');
	include('sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database_private.';charset=utf8', $mysql_user_write, $mysql_password_write);
	
	if(array_key_exists('item', $_POST) && $_SESSION['login']){
		$invStmt = $db->prepare('INSERT INTO inventory (item, location, serial, category, value) VALUES (:item, :loc, :serial, :cat, :val)');
		$invStmt->execute(array(':item' =>$_POST['item'], ':loc' => $_POST['location'], ':cat' => $_POST['category'], ':val' => $_POST['value']));
		$invResult = $postStmt->rowCount();
		if($invResult === 1){
			echo('item successfully added to inventory');
		}
		else{
			echo('something went wrong. SQL server reporting'.$invResult.'changed rows.');
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin | inventory</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<?php include('../template/header.php');?>
			<?php
				if($_SESSION['login']){
					echo("<div id='content'>
						<div id='left'>
							<form action='inventory.php' method='post'>
								<input type='text' name='item' value='item'/>
								<input type='text' name='location' value='location'/>
								<input type='text' name='serial' value='serial/cd-key'/>
								<input type='text' name='category' value='category'/>
								<input type='text' name='value' value='value'></input>
								<input type='submit' value='submit'/>
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