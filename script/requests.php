<?php 
session_start();
	require_once('../connection.php');
	date_default_timezone_set('Asia/Kolkata');

	if (isset($_POST['POST_TYPE'])) {

		$POST_TYPE = $_POST['POST_TYPE'];

		switch ($POST_TYPE) {
			
			case 'GET_COMMENTS':
				$POST_ID = $_POST['POST_ID'];
				
				$comment  = array("data"=>array(), "error"=>0);
				$query = "SELECT `pcm`.*, `um`.`user_name` FROM `post_comment_master` pcm, `user_master` um WHERE `pcm`.`post_id` = $POST_ID AND `um`.`user_id` = `pcm`.`author_id` ORDER BY `comment_id` DESC";
				$res = mysqli_query($conn, $query);

				if (mysqli_num_rows($res) > 0) {
					while ($row = mysqli_fetch_object($res)) {
						array_push($comment["data"], $row);
					}
				} else {
					$comment["error"] = "No comments found!";
				}

				exit(json_encode($comment));
				break;
			
			case 'ADD_NEW_COMMENT':
				$COM_TEXT = $_POST['COM_TEXT'];
				$POST_ID  = $_POST['POST_ID'];
				$USER_ID  = $_SESSION['user_id'];
				$DATE     = date('d M, Y h:i:sa', time());

				$query = "INSERT INTO `post_comment_master`(`comment_id`, `post_id`, `author_id`, `comment_text`, `comment_date`, `comment_type`, `reply_id`, `comment_status`) VALUES (null, $POST_ID, $USER_ID, '$COM_TEXT', '$DATE', 1, 0, 'active')";

				if ( mysqli_query($conn, $query) ) {
					exit('success');
				} else {
					exit('failure'. mysqli_error($conn));
				}

				break;

			default:
				exit("Invalid post request type!");
		}

	} else {
		exit("Invalid post request!");
	}

 ?>




