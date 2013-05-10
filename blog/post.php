<?php
	session_start();
	include('../sql.php');
	
	if(array_key_exists('id', $_GET) && $_GET['id'] != null){
		$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
		$blogStmt = $db->prepare('SELECT * FROM blog WHERE id=:id');
		$blogStmt->execute(array(':id' => $_GET['id']));
		$post = $blogStmt->fetch();

		if($post != null){
			$valid = true;
		}
	}
?>
<html>
	<head>
		<title>andyrofl.com | <?php if($valid){echo($post['title']);}else{echo('post not found');}?></title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='blog.css' type='text/css'>
		<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='cpiece'>
					<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
					<div id='cmid'>
						<div id='cmidrep'>
							<?php
								if($valid){
									echo('<div id="title">'.$post['title'].'</div>
									<div id="postcontent">'.$post['content'].'</div>
									<div id="timestamp">'.$post['date'].'</div>');
								}
								else{
									echo('Error. No parameter or invalid parameter for post id. <a href="/blog/">Click here</a> to return to blog index');
								}
							?>
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