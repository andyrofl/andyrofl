<?php
	$con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db($mysql_database, $con);
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
		$S_DATE = 'NOW()';
		
		$oldpost = mysql_query('SELECT * FROM blogcache ORDER BY date DESC LIMIT 1');
		$affected_rows = mysql_query('UPDATE blogcache SET description ='.makesafe($U_description).', date=\'\', category='.makesafe($U_category).', content='.makesafe($U_content).', title='.makesafe($U_title).', tags='.makesafe($U_tags).' WHERE id='.$oldpost['id']);
		//save old post to blog archive
		//$affected_rows2 = mysql_query('INSERT INTO blog values() ='.makesafe($U_description).', date=\'\', category='.makesafe($U_category).', content='.makesafe($U_content).', title='.makesafe($U_title).', tags='.makesafe($U_tags).' WHERE id='.$oldpost['id']);
		if($affected_rows == 1){
			return 'post success';
		}
		return 'post failed';
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
		$id_blog = mysql_fetch_array(mysql_query('SELECT id FROM blog WHERE title ='.makesafe($U_title)));
		if($id_blog == 0){
			return 0 - mysql_fetch_array(mysql_query('SELECT id FROM archive WHERE title ='.makesafe($U_title)));
		}
		return $id_blog; 
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