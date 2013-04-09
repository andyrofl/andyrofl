<?php
	//session_start();
	//header("Pragma: public");
	//header("Cache-Control: max-age = 604800");
	//header("Expires: ".gmdate("D, d M Y H:i:s", time() + 604800)." GMT");

	function makeSafe($input){
		// Stripslashes
// 		if(get_magic_quotes_gpc()){
// 			$input = stripslashes($input);
// 		}
// 		// Quote if not a number
// 		if(!is_numeric($input)){
// 			$input = "'" . mysqli_real_escape_string($input) . "'";
// 		}
		return $input;
	}
	function isValidEmail($U_email){
		
	}
	function isPassGood($U_password){
		
	}
?>