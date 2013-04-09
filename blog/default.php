<!-- title, date/time, content (raw html,) tags (full string, tags separated by commas, split during render[maybe, evaluate performance,]) relevant picture (image id, not db id,)-->
<?php
	include('../sql.php');
	
	//$res = mysql_fetch_array(mysql_query('SELECT * FROM blog ORDER BY date LIMIT 4'));
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='blog.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left'>
					//get last few posts
				</div>
				<div id='right'>
					<?php include('sidebar.php'); mysql_close($con);?>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>