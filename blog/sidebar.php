<div id='recentposts'>
	<?php
		$query = mysql_query('SELECT * FROM blog ORDER BY date LIMIT 3');
		while($recents = mysql_fetch_array($query)){
			echo("<div class='recentpost'><span class='rp_title'>".$recents['title']."</span><br/><span class='rp_blurb'>".$recents['description']."</span>");
		}
	?>
</div>