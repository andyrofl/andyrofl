<?php
	include('../sql.php');
	session_start();
	if((!isset($_SESSION['login']) || $_SESSION['login']) && $_POST['pass'] == 'Sup3rFuck1ngS3cur3P455W0RD'){
		$_SESSION['login'] = true;
	}
	
	if($_POST['submittype'] == 'uploadpic'){
		
	}
	else if($_POST['submittype'] = 'blogpost' && $_POST['postcontent'] != null){
		include('scripts/blogfunctions.php');
		echo(postBlog($_POST['description'], $_POST['category'], $_POST['content'], $_POST['title'], $_POST['tags']));
	}
	mysql_close($con);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin panel</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
				<?php
					if($_SESSION['login']){
						echo("
<div class='module'>
	<table id='urlchanging'>
		<tr><td><a href='blog.php'>blog</a></td><td><a href='portfolio.php'>portfolio</a></td><td><a href='inventory.php'>inventory</a></td></tr>
	</table>
</div>
<div class='module'>
	<div class='head'>upload picture</div>
		<form>
			<input type='file' value='upload'>
			<select value='type'>
				<option>image</option>
				<option>video</option>
				<option>file</option>
			</select>
			<select value='visibility'>
				<option>public</option>
				<option>private</option>
			</select>
			<input type='hidden' name='submittype' value='uploadpic'/>
			<input type='submit' value='Upload'/>
		</form>
	</div>
<div class='module'>
<div class='head'>blogpost</div>
	<form method='post'>
		<textarea rows='4' cols='50' name='postcontent'>Post content (html supported)</textarea>
		<textarea rows='2' cols='50' name='description'>Description</textarea>
		<input type='text' name='category' value='category'/>
		<input type='text' name='title' value='title'/>
		<input type='text' name='tags' value='tags'/>
		<input type='hidden' name='submittype' value='blogpost'/>
		<input type='submit' value='Post'/>
	</form>
</div>");
					}
					else{
						echo("enter password to continue: <form method='post'><input type='password' name='pass'/><input type='submit' value='Login'/></form>");
					}
				?>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>