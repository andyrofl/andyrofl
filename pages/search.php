<?php
	session_start();
	include('../sql.php');

	if(donottrack()){
		//301 to DDG results page
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>search</title>
		<link rel=StyleSheet href='/cdn/styles/main.css' type='text/css'>
		<meta charset='utf-8'>
		<meta name='description' content='search results page for andyrofl.com'/>
	</head>
	<body>
		<div id='main'>
			<?php include('../template/header.php');?>
			<div id='content'>
				<div id='left' class='piece'>
					<div id='ctop'><div id='ctoprep' class='piece'></div><div id='ctopl' class='piece'></div></div>
					<div id='cmid'>
						<div id='cmidrep'>
							<gcse:searchresults-only></gcse:searchresults-only>
						</div>
						<div id='cmidl'></div>
					</div>
					<div id='cbot'><div id='cbotrep'></div><div id='cbotl'></div></div>
				</div>
				<div id='right' class='piece'>
					<div id='righttop'></div>
					<div id='rightmid'>
						//something
					</div>
					<div id='rightbottom'></div>
				</div>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>
