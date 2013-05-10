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
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='blog.css' type='text/css'>
		<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='cpiece'>
					<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
					<div id='cmid'>
						<div id='cmidrep'>
							<?php
								while($posts = $blogStmt->fetch()){
									echo('<div id="postcontainer"><div id="title"><a href="post.php?id='.$posts['id'].'" id="titlelink">'.$posts['title'].'</a></div><div id="postcontent">'.$posts['content'].'</div><div id="timestamp">'.$posts['date'].'</div></div>');
								}
							?>
							<a href='#'>More posts</a>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
				<div id='right'>
					<div id='righttop'></div>
					<div id='rightmid'>
						<!-- ?php include('sidebar.php');?-->
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
		<?php include('../template/footer.php');?>
</html>