<?php
	session_start();
	include('../sql.php');
	include('sql.php');
	
	if(array_key_exists('postcontent', $_POST) && $_SESSION['login']){
		$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_write, $mysql_password_write);
		include('scripts/blogfunctions.php');
		echo(postBlog($_POST['description'], $_POST['category'], $_POST['postcontent'], $_POST['title'], $_POST['tags'], $dbpub));
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<meta charset='utf-8'>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='piece'>
					<?php
						if($_SESSION['login']){
							echo("<div class='head'>blogpost</div>
										<form method='post'>
											<textarea rows='10' cols='100' name='postcontent'>Post content (html supported)</textarea>
											<textarea rows='3' cols='100' name='description'>Description</textarea><br/>
											<input type='text' name='category' value='category'/>
											<input type='text' name='title' value='title'/>
											<input type='text' name='tags' value='tags'/>
											<input type='submit' value='Post'/>
										</form>");
						}
						else{
							echo("invalid credentials. <a href='/admin/'>return to admin panel.</a>");
						}
					?>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>