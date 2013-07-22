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
								<form action='portfolio.php' method='post'>
									<textarea rows='3' cols='100' name='description'>description</textarea><br/>
									<input type='text' name='item' value='project'/>
									<input type='text' name='category' value='category'/>
									<input type='text' name='status' value='development status'/>
									<input type='file' name='image' value='image'/>
									<input type='submit' value='submit'/>
								</form>
							</div>
						</div>
					</div>
					<div id='cmidl'></div>
					<div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div>
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