<?php
	error_reporting(E_ALL);ini_set('display_errors',1);
	
	if(array_key_exists('user', $_POST)){
		echo('promoting'.$_POST['user'].'to admin');
	}
	
	echo('<div id="adminbar"><a href="/admin/">admin panel</a> <a href="/admin/blog.php">blog post</a>');
	if($_SESSION['account'] == 3){
		echo('<form method="post">Promote to Admin<input type="textbox" name="user"/><input type="submit" value="submit"/><input type="invisible" name="promote" value="mod"/></form>');
	}
	else{
		echo('<form method="post">Promote to Moderator<input type="textbox" name="user"/><input type="submit" value="submit"/><input type="radio" name="promote" value="admin"/></form>');
	}
	echo('</div>');
	/**
	 * -1 BANNED
	 * 0 user		can view pages and post comments
	 * 1 moderator	can do all above + delete comments and use dev cheats in games
	 * 2 admin		can do all above + make mods and access admin panel
	 * 3 staff		can do all above + make admins
	 */
?>