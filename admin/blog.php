<?php
	include('../sql.php');
	if(!isset($_SESSION['login'])){
		echo('not logged in, redirect to /admin/');
	}
	else if($_POST['postcontent'] != null){
		include('../scripts/validateinput.php');
		include('scripts/blogfunctions.php');
		
		echo(postBlog($_POST['description'], $_POST['category'], $_POST['content'], $_POST['title'], $_POST['tags']));
		//$affected_rows = mysql_query('INSERT INTO blog (description, date, category, content, title, tags) VALUES ('.makesafe($_POST['description']).','.','.makesafe($_POST['category']).','.makesafe($_POST['content']).','.makesafe($_POST['title']).','.makesafe($_POST['tags']).')');
		/*INSERT INTO `a5217791_public`.`blog` (
`id` ,
`description` ,
`date` ,
`category` ,
`content` ,
`title` ,
`tags`
)
VALUES (
'3', 'description', NOW( ) , 'category', 'content', 'title', 'tags'
);*/
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
				<div class='module'>
					<div class='head'>blogpost</div>
					<form method='post'>
						<textarea rows='4' cols='50' name='postcontent'>Post content (html supported)</textarea>
						<textarea rows='2' cols='50' name='description'>Description</textarea>
						<input type='text' name='category' value='category'/>
						<input type='text' name='title' value='title'/>
						<input type='text' name='tags' value='tags'/>
						<input type='submit' value='Post'/>
					</form>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>