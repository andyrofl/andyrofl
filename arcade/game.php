<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<link rel=StyleSheet href='arcade.css' type='text/css'>
		<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='piece'>
					<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
					<div id='cmid'>
						<div id='cmidrep'>
							<div id='gameetc'>
								<div id='title'>
									<h2>${title}</h2>
								</div>
								<div id='game'>
									%if gamelang=java:
										<object type='applet' src='${dir}'>applet unsupported</object>
									%else if gamelang=flash
										##flash
									%endif
								</div>
								<div id='bottom'>
									<div id='about'>
										${title}
										${controls}
										${dateposted}
									</div>
									<div id='info'>
										${info}
									</div>
									<div id='share'>
										##share to fb wall
										##tweet
										##G+
										##Myspace
									</div>
								</div>
							</div>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
			</div>
		<?php include('../template/footer.php');?>
</html>