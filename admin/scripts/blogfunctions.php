<?php
	include('../sql.php');
	include('../scripts/validateinput.php');

	/**
	 * Create a new blog post
	 * @param String  $U_description
	 * @param String $U_category
	 * @param String $U_content
	 * @param String $U_title
	 * @param String_type $U_tags
	 * @return String representing success or failure
	 */
	function postBlog($U_description, $U_category, $U_content, $U_title, $U_tags){
		$S_date = NOW();
		$S_description = makesafe($U_description);
		$S_category = makesafe($U_category);
		$S_content = makesafe($U_content);
		$S_title = makesafe($U_title);
		$S_tags = makesafe($U_tags);
		$S_id = mysql_fetch_assoc(mysql_query('SELECT id from blogcache ORDER BY date ASC LIMIT 1'));
		
		$cacheResult = mysql_query("UPDATE blogcache SET description ='$S_description', date='$S_date', category='$S_category', content='$S_content', title='$S_title', tags='$S_tags' WHERE id=$S_id");
		$postResult = mysql_query("INSERT INTO blog (description, date, category, content, title, tags) VALUES ('$S_description', '$S_date', '$S_category', '$S_content', '$S_title', '$S_tags')");
		
		if($cacheResult == 1 && $postResult == 1){
			return 'post success';
		}
		else if($cacheResult == 1){
			return 'blog post returned '.$postResult.' changed rows';
		}
		else if($postResult == 1){
			return 'cache post returned '.$cacheResult.' changed rows';
		}
		return 'blog post returned '.$postResult.' changed rows and cache post returned '.postResult.' changed rows';
	}
	/**
	 * Delete a post with the given title
	 * @param unknown_type $S_title
	 * @param unknown_type $db
	 */
	function deleteByTitle($U_title, $db){
		deletePost(getIdByTitle(makesafe($U_title), $db), $db);
	}
	/**
	 * Get the id of a post with a specific title
	 * @param unknown_type $S_title
	 * @param unknown_type $db
	 */
	function getIdByTitle($U_title){
		return mysql_fetch_array(mysql_query('SELECT id FROM blog WHERE title ='.makesafe($U_title)));
	}
	/**
	 * Delete a post with a specific id
	 * @param unknown_type $S_id
	 * @param unknown_type $db
	 */
	function deletePost($S_id, $db){
		$affected_rows = mysql_query('DELETE FROM'.$db.'WHERE id ='.$S_id);
	}
	/**
	 * Change content of a post
	 * @param unknown_type $id
	 * @param unknown_type $U_content
	 * @return String indicative of success or failure
	 */
	function editContent($id, $U_content){
		
	}
	
?>