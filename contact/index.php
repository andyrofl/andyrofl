<?php
	include('../sql.php');
	$res = mysql_fetch_array(mysql_query('SELECT * FROM resources WHERE id=4'));
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>contact</title>
		<link rel=StyleSheet href='../styles/main.css' type='text/css'>
		<?php include('../template/header.php');mysql_close($con);?>
			<div id='content'>
				<p>
					<?php echo($res['text']);?>
				</p>
			</div>
			<?php include('../template/footer.php');?>
		</div>
	</body>
</html>