<?php 
session_start();
require_once('../connection.php');
date_default_timezone_set('Asia/Kolkata');

if (isset($_POST['postObj'])) {

	$postObj = $_POST['postObj'];
	$postObj = json_decode(stripslashes($postObj));

	$postId        = addslashes(htmlspecialchars(strip_tags($postObj->postId)));
	$postName      = addslashes(htmlspecialchars(strip_tags($postObj->postName)));
	$postShortName = addslashes(htmlspecialchars(strip_tags($postObj->postShortName)));
	$postDesc      = addslashes(htmlspecialchars(strip_tags($postObj->postDesc)));
	$postCategory  = addslashes(htmlspecialchars(strip_tags($postObj->postCategory)));
	$postDate      = date('d M, Y h:i:sa', time()); #26 May, 2020 06:01pm

	$query = "UPDATE `post_master` SET `post_name` = '$postName', `post_short_name` = '$postShortName', `post_category` = '$postCategory', `post_description`= '$postDesc', `post_date`='$postDate' WHERE `post_id` = '$postId'";

	if (mysqli_query($conn, $query)) {
		exit('success');
	} else {
		exit('error: Mysql Query Failed!'. mysqli_error($conn));
	}

} else {
	exit('error: Invalid request!');
}

 ?>
