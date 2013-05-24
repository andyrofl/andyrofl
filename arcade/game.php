<?php
	session_start();
	include('../sql.php');
	$dbpub = new PDO('mysql:host='.$mysql_host.';dbname='.$mysql_database.';charset=utf8', $mysql_user_read, $mysql_password_read);
	
	$gameStmt = $dbpub->prepare('SELECT * FROM games WHERE id=:id');
	$gameStmt->execute(array(':id' => $_GET['id']));
	$game = $gameStmt->fetch();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='/styles/main.css' type='text/css'>
		<link rel=StyleSheet href='arcade.css' type='text/css'>
		<meta charset='utf-8'>
		<script type="text/javascript"> var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-33659175-1']); _gaq.push(['_trackPageview']); (function(){ var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);})();</script>
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
										if($game['type'] == 1){
											echo('<object type="application/x-java-applet" height="600" width="800">
											<param name="code" value="'.$game['code'].'" />
											<param name="archive" value="'.$game['filename'].'" />
											Applet failed to run.  No Java plug-in was found.
											</object>');
										}
										//TODO flash and unity
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
									<!--div id='share'>
										##share to fb wall
										##tweet
										##G+
										##Myspace
									</div-->
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
						//random games
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>
