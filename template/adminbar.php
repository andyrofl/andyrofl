<?php
	error_reporting(E_ALL);ini_set('display_errors',1);
	echo('<div id="adminbar"><a href="/admin/">admin panel</a> <a href="/admin/blog.php">blog post</a></div>');
	/**
	 * 0 user		can view pages and post comments
	 * 1 moderator	can do all above + delete comments and use dev cheats in games
	 * 2 admin		can do all above + make mods and access admin panel
	 * 3 staff		can do all above + make admins
	 */
?>