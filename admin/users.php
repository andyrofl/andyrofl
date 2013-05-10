<?php
	session_start();
	include('../sql.php');
	include('sql.php');
	
	if(array_key_exists('useraccount', $_POST) && $_SESSION['login']){
		$dbpri = new PDO('mysql:host='.$mysql_host_private.';dbname='.$mysql_database_private.';charset=utf8', $mysql_user_write, $mysql_password_write);
		$userStmt = $dbpri->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
		$userStmt->execute(array(':username' => $_POST['useraccount'], ':password' =>$_POST['userpw']));
		echo($userStmt->rowCount());
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<meta charset='utf-8'>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
				<?php
					if($_SESSION['login']){
						echo("<div id='content'>
							<div id='left'>
								<div class='head'>manage users</div>
									<form method='post'>
										username: <input type='textbox' name='useraccount'/>
										password: <input type='textbox' name='userpw'/>
										<input type='hidden' name='submittype' value='create'/>
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
		</div>
	</body>
</html>