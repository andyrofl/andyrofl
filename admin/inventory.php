<?php
	session_start();
	include('sql.php');
	include('../sql.php');
	
	$db = new PDO('mysql:host='.$mysql_host_private.';dbname='.$mysql_database_private.';charset=utf8', $mysql_user_write, $mysql_password_write);
	
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
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
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
							<form action='/admin/inventory' method='post'>
								<input type='text' name='item' value='item'/>
								<input type='text' name='location' value='location'/>
								<input type='text' name='serial' value='serial/cd-key'/>
								<input type='text' name='category' value='category'/>
								<input type='text' name='value' value='value'></input>
								<input type='submit' value='submit'/>
							</form>
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