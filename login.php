<?php 
	require('header.php');
	$error = "";
	if (isset($_POST['loginBtn'])) {

		$username = $_POST['userNameInput'];
		$password = $_POST['userPwdInput'];

		$query = "SELECT * FROM `user_master` WHERE `user_email`='$username'";
		$res   = mysqli_query($conn, $query); 
		$nums  = mysqli_num_rows($res);

		if ( $nums == 1 ) {
			$row = mysqli_fetch_object($res);
			
			if ($row->user_email == $username && password_verify($password, $row->user_password)) {
				$_SESSION['login_status'] = true;
				$_SESSION['user_id']      = $row->user_id;
				$_SESSION['user_name']    = $row->user_name;
			} else {
				$error = "Invalid Credentials!";
			}
		} else {
			$error = "Invalid Credentials!";
		}

	} else {
		$error = "Invalid Request Type!";
	}
 ?>

 <div class="container-fluid">
 	<div class="row mt-5">
 		<div class="col-sm-12 col-lg-2"> <br> </div>
 		<div class="col-sm-12 col-lg-8"> 
			<?php 
				if ($error != "") {
					echo "
							<div class='alert alert-danger' role='alert'>
							  $error. <a href='index.php' class='alert-link'>Try again</a>
							</div>
						";
				} else {
					echo "
							<div class='alert alert-success' role='alert'>
							  Welcome <b>{$_SESSION['user_name']}</b>. Your login is successfull. <a href='index.php' class='alert-link'>Click here</a> to continue.
							</div>
						";
				}
			 ?>
 		</div>
 		<div class="col-sm-12 col-lg-2"> <br> </div>
 	</div>
 </div>


 <?php 
/**
 *
 * Logged In 
 *  - Create Post
 *  - Edit POst
 *  - Comment
 *  - reply
 *  - Full post
 *  - Show him logout btn
 *
 * !logged in
 *  - see front page
 *  - Show him login btn
 *
 *
 * 
 */

  ?>