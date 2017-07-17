<?php
require_once("setup/connect.php");
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function loggedin(){
	if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		return true;
	} else {
		return false;
	}
}


function getuserfield($field){

	global $link;
$query = "SELECT $field FROM admin_tbl WHERE id = ' ".$_SESSION['user_id']."'" ;

if($query_run = mysqli_query($link, $query)){

	$useridrow = mysqli_fetch_assoc($query_run);
   if($userid = $useridrow[$field]){
	return $userid;
	}
}
}

?>