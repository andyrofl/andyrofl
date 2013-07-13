<?php
	session_start();
	include('../sql.php');
	
	if(array_key_exists('vanity', $_GET) && $_GET['vanity'] != null){
		$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
		$blogStmt = $db->prepare('SELECT * FROM blog WHERE vanity=:vanity');
		$blogStmt->execute(array(':vanity' => $_GET['vanity']));
		$post = $blogStmt->fetch();

		if($post == null){
			/**
			 * Compatibility for PHP 4.3 - 5.3
			 */
			if(!function_exists('http_response_code')){
				function http_response_code($newcode = NULL){
					static $code = 200;
					if($newcode !== NULL){
						header('X-PHP-Response-Code: '.$newcode, true, $newcode);
						if(!headers_sent())
							$code = $newcode;
					}
					return $code;
				}
			}
			
			http_response_code(404);
			$valid = false;
		}
		else{
			$valid = true;
		}
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andyrofl.com | <?php if($valid){echo($post['title']);}else{echo('post not found');}?></title>
		<link rel=StyleSheet href='/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='/styles/blog.css' type='text/css'>
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
								if($valid){
									echo('<div id="title">'.$post['title'].'</div>
									<div id="postcontent">'.$post['content'].'</div>
									<div id="timestamp">'.$post['date'].'</div>
									<g:plusone href="http://andyrofl.com/blog/post.php?id='.$post['id'].'"></g:plusone>');
								}
								else{
									echo('Error. No parameter or invalid parameter for post id. <a href="/blog/">Click here</a> to return to blog index');
								}
							?>
						</div>
						<div id='cmidl'></div>
					</div>
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
