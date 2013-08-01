<?php
	session_start();
	include('sql.php');
	include('../sql.php');

	$dbpri = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database_private.';charset=utf8', $mysql_user_write, $mysql_password_write);
	$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_write, $mysql_password_write);

	if(!$_SESSION['login']){ //not in a session
		if(array_key_exists('user', $_POST) && array_key_exists('pass', $_POST)){
			$userStmt = $dbpri->prepare("SELECT * FROM users WHERE username = :user");
			$userStmt->execute(array(':user' => $_POST['user']));
			$userinfo = $userStmt->fetch(PDO::FETCH_ASSOC);
			echo('username: '.$userinfo['username'].' password: '.$userinfo['password']);
			if($userinfo['username'] === $_POST['user']){
				if($userinfo['password'] === $_POST['pass']){
					$_SESSION['login'] = true;
					$_SESSION['account'] = $userinfo['accounttype'];
				}
			}
		}
	}
	if(array_key_exists('postcontent', $_POST) && $_SESSION['login']){
		include('scripts/blogfunctions.php');
		echo(postBlog($_POST['description'], $_POST['category'], $_POST['postcontent'], $_POST['title'], $_POST['tags'], $dbpub));
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>admin panel</title>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='admin.css' type='text/css'>
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
								if(!$_SESSION['login']){
									echo("enter password to continue: <form method='post'><input type='text' name='user'/><input type='password' name='pass'/><input type='submit' value='Login'/></form></div></div><div id='cmidl'></div><div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div></div><div id='right' class='piece'><div id='righttop'></div><div id='rightmid'></div><div id='rightbottom'></div></div></div>");
									include('../template/footer.php');
									echo('</div></body></html>');
									exit;
								}
							?>
							<div class='module'>
								<div class='head'>upload</div>
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
								<div class='head'>blog</div>
								<form method='post'>
									<textarea rows='8' cols='80' name='postcontent'>Post content (html supported)</textarea>
									<textarea rows='3' cols='80' name='description'>Description</textarea><br/>
									<input type='text' name='category' value='category'/>
									<input type='text' name='title' value='title'/>
									<input type='text' name='tags' value='tags'/>
									<input type='hidden' name='submittype' value='blogpost'/>
									<input type='submit' value='Post'/>
								</form>
							</div>
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