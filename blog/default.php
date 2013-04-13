<?php
	include('../sql.php');
	
	$posts[] = '';
	$query = mysql_query('SELECT * FROM blog ORDER BY date LIMIT 4');
	while($post = mysql_fetch_array($query)){
		$posts = $post;
	}
?>
<!-- title, date/time, content (raw html,) tags (full string, tags separated by commas, split during render[maybe, evaluate performance,]) relevant picture (image id, not db id,)-->
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
			<?php include('../template/header.php'); mysql_close($con);?>
			<div id='content'>
				<div id='left'>
					<?php
						for($i = 0; $i < 4; $i++){
							echo('<div id="postcontainer"><div id="title">'.$posts[$i]['title'].'</div><div id="postcontent">'.$posts[$i]['postcontent'].'</div><div id="timestamp">'.$posts[$i]['date'].'</div></div>');
						}
						//postcontainer
						//title
						//postcontent
						//timestamp
					?>
				</div>
				<div id='right'>
					<!-- ?php include('sidebar.php');?-->
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>