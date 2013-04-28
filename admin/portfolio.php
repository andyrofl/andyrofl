<?php
	session_start();

	include('../sql.php');
	include('sql.php');

	$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_write, $mysql_password_write);

	if(array_key_exists('item', $_POST) && $_SESSION['login']){
		$portStmt = $dbpub->prepare('INSERT INTO portfolio (item, category, description, status) VALUES (:item, :cat, :desc, :stat)');
		$portStmt->execute(array(':item' =>$_POST['item'], ':cat' => $_POST['category'], ':desc' => $_POST['description'], ':stat' => $_POST['status']));
		$portResult = $portStmt->rowCount();
		if($portResult === 1){
			echo('project successfully added to portfolio');
		}
		else{
			echo('something went wrong. SQL server reporting'.$portResult.'changed rows.');
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin | portfolio</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<?php include('../template/header.php');?>
			<?php
				if($_SESSION['login']){
					echo("<div id='content'>
						<div class='module'>
							<form action='portfolio.php' method='post'>
								<textarea rows='3' cols='100' name='description'>description</textarea><br/>
								<input type='text' name='item' value='project'/>
								<input type='text' name='category' value='category'/>
								<input type='text' name='status' value='development status'/>
								<input type='file' name='image' value='image'/>
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