<?php
	include('../sql.php');

	//if($_POST['id'] != null){
		//TODO don't trust client input, can't even trust my input
		$res = mysql_fetch_array(mysql_query('SELECT * FROM blog WHERE id='.$_GET['id']));
	//}
?>
<html>
	<head>
		<title><?php echo($res['title']);?></title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='blog.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left'>
					<div id='title'><?php echo($res['title']);?></div>
					<div id='postcontent'><?php echo($res['content']);?></div>
					<div id='timestamp'><?php echo($res['date'])?></div>
				</div>
				<div id='right'>
					<?php include('sidebar.php'); mysql_close($con);?>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>