<div id='recentposts'>
	<?php
		$recentStmt = $db->prepare('SELECT * FROM blog ORDER BY date DESC LIMIT 3');
		$recentStmt->execute();
		while($recents = $recentStmt->fetch()){
			echo("<div class='recentpost'><span class='rp_title'>".$recents['title']."</span><br/><span class='rp_blurb'>".$recents['description']."</span></div>");
		}
	?>
</div>