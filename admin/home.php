<?php
	session_start();
	include('../sql.php');
	include('sql.php');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>home</title>
		<link rel=StyleSheet href='/styles/main.css' type='text/css'>
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
							//modules
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