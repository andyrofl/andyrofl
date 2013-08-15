<?php
	session_start();
	include('../sql.php');

	$db = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$pageStmt = $db->prepare('SELECT * FROM pages WHERE title=:title');
	$pageStmt->execute(array(':title' => $_GET['title']));
	$pageData = $pageStmt->fetch();

		if($pageData == null){
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

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php if($valid){echo($pageData['2']);}else{echo('page not found');}?></title>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
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
									echo($pageData[0]);
								}
								else{
									echo('That page doesn\'t exist');
								}
							?>
						</div>
					<div id='cmidl'></div>
					</div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
					<div id='rightmid'>
						<?php
							if($valid){
								echo($pageData[1]);
							}
							else{
								echo('<a href="/">home</a><br/><a href="/blog">blog</a><br/><a href="arcade">arcade</a>');
							}
						?>
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>