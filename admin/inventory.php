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
		<meta charset='utf-8'>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
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
								if($_SESSION['login']){
									echo("<form action='inventory.php' method='post'>
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
							</div>
						</div>
					<div id='cmidl'></div>
					<div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
						<div id='rightmid'>
							<a href='blog.php'>blog</a><br/>
							<a href='inventory.php'>inventory</a><br/>
							<a href='portfolio.php'>portfolio</a><br/>
							<a href='users.php'>manage users</a>
						</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>