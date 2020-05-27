<?php 
	require_once('../connection.php');
	if (isset($_POST['POST_TYPE'])) {

		$POST_TYPE = $_POST['POST_TYPE'];

		switch ($POST_TYPE) {
			
			case 'GET_COMMENTS':
				$POST_ID = $_POST['POST_ID'];
				$comment  = array("data"=>array(), "error"=>0);
				$query = "SELECT `pcm`.*, `um`.`user_name` FROM `post_comment_master` pcm, `user_master` um WHERE `pcm`.`post_id` = $POST_ID AND `um`.`user_id` = `pcm`.`author_id`";
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
			
			default:
				exit("Invalid post request type!");
		}

	} else {
		exit("Invalid post request!");
	}

 ?>




