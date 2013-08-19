<?php
	session_start();
	include('../sql.php');
	$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$gameStmt = $dbpub->prepare('SELECT * FROM games WHERE vanity=:vanity');
	$gameStmt->execute(array(':vanity' => $_GET['vanity']));
	$game = $gameStmt->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='/cdn/styles/arcade.css' type='text/css'>
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
							<div id='gameetc'>
								<div id='title'>
									<div id='title'><?php echo($game['title']);?></div>
								</div>
								<div id='game'>
									<?php
										if($game['access'] > $_SESSION['account']){
											echo("<p>This game requires a higher access level.</p>");
										}
										else{
											switch($game['type']){
												case 0:{
													echo('<p>Coming soon</p>');
												}
												case 1:{
													echo('<object type="application/x-java-applet" height="'.$game['height'].'" width="'.$game['width'].'">
														<param name="code" value="'.$game['code'].'" />
														<param name="archive" value="'.$game['filename'].'" />
														Applet failed to run.  No Java plug-in was found.
														</object>');
												}
											}
											/**
											 * 0 Unreleased
											 * 1 Java
											 * 2 Flash
											 * 3 Unity
											 * 4 Silverlight
											 * 5 Shockwave
											 * 6 HTML5
											 * 7 Direct download
											 * 8 External site
											 */
										}
									?>
								</div>
								<div id='bottom'>
									<div id='about'>
										<?php
											echo($game['title'].'<br/>');
											echo($game['date']);
										?>
									</div>
									<div id='info'>
										<?PHP echo($game['description']);?>
									</div>
									<?php echo('<g:plusone href="http://andyrofl.com/arcade/'.$game['vanity'].'"></g:plusone>'); ?>
								</div>
							</div>
						</div>
						<div id='cmidl'></div>
					</div>
					<div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
					<div id='rightmid'>
						<script type='text/javascript'><!--
							google_ad_client = 'ca-pub-0388441960389673';
							/* arcade sidebar */
							google_ad_slot = '1513332590';
							google_ad_width = 300;
							google_ad_height = 250;
						//-->
						</script>
						<script type='text/javascript' src='http://pagead2.googlesyndication.com/pagead/show_ads.js'></script>
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>
