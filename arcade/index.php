<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>andy rofl</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
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
							<div id='arcadehead'>
								<h1>Arcade</h1>
								<div id='search'>
									
								</div>
							</div>
							<div id='featured'>
								##slideshow here
							</div>
						</div>
						<div id='cmidl'></div>
					</div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>
