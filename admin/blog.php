<?php
	session_start();
	include('../sql.php');
	include('sql.php');
	
	if(array_key_exists('postcontent', $_POST) && $_SESSION['login']){
		$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_write, $mysql_password_write);
		include('scripts/blogfunctions.php');
		echo(postBlog($_POST['description'], $_POST['category'], $_POST['postcontent'], $_POST['title'], $_POST['tags'], $dbpub));
	}
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