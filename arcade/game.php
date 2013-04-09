<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='styles/main.css' type='text/css'>
		<link rel=StyleSheet href='styles/home.css' type='text/css'>
		<meta charset='utf-8'>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
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
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>