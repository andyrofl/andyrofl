<?php
	session_start();
	include('sql.php');
	include('../sql.php');

	$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_write, $mysql_password_write);
	$dbpri = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database_private.';charset=utf8', $mysql_user_write, $mysql_password_write);

	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin panel</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='piece'>
					<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
					<div id='cmid'>
						<div id='cmidrep'>
							<?php
								if(!$_SESSION['login']){
									echo("invalid credentials. <a href='/admin/'>return to admin panel.</a></div></div><div id='cmidl'></div><div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div></div><div id='right' class='piece'><div id='righttop'></div><div id='rightmid'></div><div id='rightbottom'></div></div></div>");
									include('../template/footer.php');
									echo('</div></body></html>');
									exit;
								}
							?>
							<div class='module'>
								<div class='head'>edit database</div>
								<form method='post'>
									<textarea rows='8' cols='100' name='query'>MySQL query</textarea>
									<input type='radio' name='database' value='pub'> public<br/>
									<input type='radio' name='database' value='pri'> private<br/>
									<input type='submit' value='Post'/>
								</form>
							</div>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
						<div id='rightmid'>
							<?php include('sidebar.php');?>
						</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>