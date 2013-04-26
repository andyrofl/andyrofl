<?php
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
		$idarr = mysql_fetch_assoc(mysql_query('SELECT id from blogcache ORDER BY date ASC LIMIT 1'));
		$S_id = $idarr['id'];
		
		$cacheResult = mysql_query("UPDATE blogcache SET description ='$U_description', date=NOW(), category='$U_category', content='$U_content', title='<a href='/blog/post.php?id='$U_id'>$U_title'</a>, tags='$U_tags' WHERE id=$S_id");
		echo(mysql_error());
		$numc = mysql_affected_rows();
		$postResult = mysql_query("INSERT INTO blog (description, date, category, content, title, tags) VALUES ('$U_description', NOW(), '$U_category', '$U_content', '$U_title', '$U_tags')");
		$nump = mysql_affected_rows();
		
		if($cacheResult && $postResult){
			return 'post success';
		}
		else if($cacheResult){
			return 'blog post returned '.$nump.' changed rows';
		}
		else if($postResult){
			return 'cache post returned '.$munc.' changed rows';
		}
		return 'blog post returned '.$nump.' changed rows and cache post returned '.$numc.' changed rows';
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
		$cacheResult = mysql_query('UPDATE blog SET content=`'.$U_content.'` WHERE id=`'.$id.'`');
		
	}
?>