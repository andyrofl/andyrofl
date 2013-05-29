<?php
	session_start();
	include('../sql.php');
	
	if(array_key_exists('id', $_GET) && $_GET['id'] != null){
		$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
		$blogStmt = $db->prepare('SELECT * FROM blog WHERE id=:id');
		$blogStmt->execute(array(':id' => $_GET['id']));
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
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='blog.css' type='text/css'>
		<meta charset='utf-8'>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
		<script type="text/javascript"> window.___gcfg = {lang: 'en-US'}; (function(){ var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);})();</script>
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
