<?php 
 	require('header.php'); 	
 	
 	$error = $success = "";
 	$username = $useremail = $userphone = $useraddress = $usertype = $userpwd = '';
 	if (isset($_POST['registerBtn'])) {

		$username    = isset($_POST['userName']) ? addslashes($_POST['userName']) : exit('Invalid username');
		$useremail   = addslashes($_POST['userEmail']);
		$userphone   = addslashes($_POST['userPhone']);
		$useraddress = addslashes($_POST['userAddress']);
		$usertype    = addslashes($_POST['userType']);
		$userpwd     = addslashes($_POST['userPassword']);

		if (empty($username) )
			$error = "Please enter a username.";

		if (empty($useremail) || !filter_var($useremail, FILTER_VALIDATE_EMAIL))
			$error = "Please enter a valid email.";			

		if (empty($userphone) || strlen($userphone) != 10)
			$error = "Please enter a valid phone number.";

		if (empty($useraddress))
			$error = "Please enter a address.";

		if (empty($usertype))
			$error = "Please select a valid user type.";

		if (empty($userpwd))
			$error = "Please enter a valid password.";

		$userpwd = password_hash($userpwd, PASSWORD_DEFAULT);
		// $str = 'admin@123';
	 	// echo md5($str);
	 	// $encrypted = base64_encode($str);
	 	// echo $encrypted. "<br>";
	 	// echo base64_decode($encrypted);
	 	
	 	$chk_query = "SELECT `user_name` FROM `user_master` WHERE `user_email` = '$useremail'";
		$chk_res = mysqli_query($conn, $chk_query);

		if ( mysqli_num_rows($chk_res) > 0 ) {
			$error = "A user is already registerred with the same email id.";
		}

		if (empty($error)) {

			$query = "INSERT INTO `user_master` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_address`, `user_type`, `user_status`) VALUES (null, '$username', '$useremail', '$userphone', '$userpwd', '$useraddress', $usertype, 'active')";
			$res = mysqli_query($conn, $query);

			if (!$res) {
				$error = "Oops! Some error occurred while processing data. Please try again later.";
			} else {
				$success = "Registration Successfull! Please login to continue.";
				$username = $useremail = $userphone = $useraddress = $usertype = $userpwd = '';
			}

		}

 	}
?>	
	<!-- Main body container -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>
			<!-- Register Div Start-->
			<div class="col-sm-12  col-md-8 col-lg-5">
				<div class="container-fluid">
					<div class="card bg-light">
						<div class="card-body">
							<h3 class="text-center text-info text-monospace font-weight-bold">
								Registration Form
							</h3>
							<hr>
							<?php 
								if (!empty($error)) {
									echo "
										<div class=\"alert alert-danger\" role='alert'>
										  $error
										</div>
									";
								}
								if (!empty($success)) {
									echo "
										<div class=\"alert alert-success\" role='alert'>
										  $success
										</div>
									";
								}

							 ?>
							<form action="" method="POST">
								  <div class="form-group">
								    <label for="userName">User Fullname</label>
								    <input type="text" class="form-control" name="userName" placeholder="Enter full name" value="<?php echo $username;?>" required>
								  </div>
								  <div class="form-group">
								    <label for="userEmail">User Email</label>
								    <input type="email" class="form-control" name="userEmail" placeholder="Enter email address" value="<?php echo $useremail;?>" requried>
								  </div>
								  <div class="form-group">
								    <label for="userPhone">User Phone</label>
								    <input type="number" class="form-control" name="userPhone" placeholder="Enter phone number" value="<?php echo $userphone;?>" required>
								  </div>
								  <div class="form-group">
								    <label for="userAddress">User Address</label>
								    <textarea class="form-control" name="userAddress" name="userAddress" cols="30" rows="5" placeholder="Enter full address" required><?php echo $useraddress;?></textarea>
								  </div>
								  <div class="form-group">
								    <label for="userType">Select Type</label>
								    <select class="form-control" name="userType" required>
									  <option value selected disabled>-- Select User Type --</option>
									  <?php 
									  	$query = "SELECT * FROM `user_type_master` WHERE `user_type_status`='active' AND `user_type_id` NOT IN (1)";
									  	$res = mysqli_query($conn, $query);
									  	while ($row=mysqli_fetch_object($res)) {
									  		echo "<option value='$row->user_type_id'>$row->user_type_name</option>";
									  	}
									   ?>
									</select>
									
								  </div>
								  <div class="form-group">
								    <label for="userPassword">Password</label>
								    <div class="input-group">
								    	<div class="input-group-append">
										    <button type="button" class="btn btn-outline-dark rounded showPwd"> <span class="fas fa-eye-slash"></span> </button>
										</div>
									    <input type="password" class="form-control" name="userPassword" id="userPwdInput" placeholder="Enter password" value="<?php echo $userpwd;?>" required>
								    </div>
								  </div>
								  <hr>
								  <button type="submit" name="registerBtn" class="btn btn-primary btn-block">Register</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Register Div End-->

			<!-- Sidebar Content Start-->
			<div class="col-sm-12  col-md-4 col-lg-3">
				<?php require('right-sidebar.php'); ?>
			</div>
			<!-- Sidebar Content End-->
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>

		</div>
	</div>
	<?php require('footer.php'); ?>
</body>
</html>