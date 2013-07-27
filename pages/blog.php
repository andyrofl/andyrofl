<?php
	session_start();
	include('../sql.php');
	
	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$blogStmt = $db->prepare('SELECT * FROM blog ORDER BY date DESC LIMIT 4');
	$blogStmt->execute();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='/cdn/styles/blog.css' type='text/css'>
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
								while($posts = $blogStmt->fetch()){
									echo('<div id="postcontainer"><div id="title"><a href="/blog/'.$posts['vanity'].'" id="titlelink">'.$posts['title'].'</a></div><div id="postcontent">'.$posts['content'].'</div><div id="timestamp">'.$posts['date'].'</div></div>');
								}
							?>
							<a href='#'>More posts</a>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
					<div id='rightmid'>
						<?php include('../template/sidebar_blog.php');?>
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>