<?php 
 	require('header.php'); 	
 	if ( !isset($_SESSION['login_status']) ) {
 		header('location:index.php');
 		exit();
 	} else {

	date_default_timezone_set('Asia/Kolkata');

 	$error = $success = "";
 	$postName = $postShortName = $postCategory = $postImage = $postAuthor = $postDesc = $postDate = '';
	$allowedExtensions = array('jpeg', 'jpg', 'png', 'webp');

	if (isset($_POST['addPostBtn'])) {
		$postName      = isset($_POST['postName']) ? addslashes(htmlspecialchars(strip_tags($_POST['postName']))) : exit('Invalid Post Name');
		$postShortName = isset($_POST['postShortName']) ? addslashes(htmlspecialchars(strip_tags($_POST['postShortName']))) : exit('Invalid Post Short Name');
		$postCategory  = isset($_POST['postCategory']) ? addslashes(htmlspecialchars(strip_tags($_POST['postCategory']))) : exit('Invalid Post Category');
		$postDesc      = isset($_POST['postDesc']) ? addslashes(htmlspecialchars(strip_tags($_POST['postDesc']))) : exit('Invalid Post Image');

		$postAuthor    = $_SESSION['user_id'];
		// $postDate      = date('Y-m-d h:i:s', time()); #2020-05-21 04:05:00 
		$postDate      = date('d M, Y h:i:sa', time()); #26 May, 2020 06:01pm

		$postImageName = $_FILES['postImage']['name']; # file name
		$postImageTemp = $_FILES['postImage']['tmp_name']; # temperory location
		$postImageSize = $_FILES['postImage']['size']; # file size

		$postImageExt  = pathinfo($postImageName, PATHINFO_EXTENSION); # image extension
		$postImageName = md5(microtime()) . '.' .$postImageExt;

		if ( !in_array($postImageExt, $allowedExtensions) ) {
			$error = "Invalid image extension uploaded!";
		}

		if ( $postImageSize > 16000000 ) { # 2mb
			$error = "File size too large. Please upload a image in less than 2mb.";
		}
		

		if (empty($error)) {

			if (!move_uploaded_file($postImageTemp, 'images/post/'.$postImageName)) { 
				$error = "Unable to upload image file!";
			} else {
				$query = "INSERT INTO `post_master` VALUES(null, '$postName', '$postShortName', '$postCategory', '$postImageName', '$postAuthor', '$postDesc', '$postDate', 'active')";
				if (mysqli_query($conn, $query) ) {
					$success = "Post created successfully!";
					$postName = $postShortName = $postCategory = $postImage = $postAuthor = $postDesc = $postDate = '';
				} else {
					$error = "Unable to create post!". mysqli_error($conn);
				}
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
								- Create Post -
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
							<form action="" method="POST" enctype="multipart/form-data">
								  <div class="form-group">
								    <label for="postName">Post Name</label>
								    <input type="text" class="form-control" name="postName" placeholder="Enter post name" value="<?php echo $postName;?>" required>
								  </div>
								  <div class="form-group">
								    <label for="postShortName">Post Short Name</label>
								    <input type="text" class="form-control" name="postShortName" placeholder="Enter post shortname" value="<?php echo $postShortName;?>" required>
								  </div>
								  <div class="form-group">
								    <label for="postDesc">Post Description</label>
								    <textarea class="form-control" name="postDesc" name="postDesc" cols="30" rows="10" placeholder="Enter post description.." required><?php echo $postDesc;?></textarea>
								  </div>
								  <div class="form-group">
								    <label for="postCategory">Select Post Category</label>
								    <select class="form-control" name="postCategory" required>
									  <option value selected disabled>-- Select Post Category --</option>
									  <?php 
									  	$query = "SELECT * FROM `post_category_master` WHERE `category_status`='active' ORDER BY `category_name`";
									  	$res = mysqli_query($conn, $query);
									  	while ($row=mysqli_fetch_object($res)) {
									  		echo "<option value='$row->category_id'>$row->category_name</option>";
									  	}
									   ?>
									</select>
								  </div>
								  <div class="form-group">
								    <label for="postImage">Post Image</label>
								    <input type="file" class="form-control" name="postImage" placeholder="Select post image" value="<?php echo $postImage;?>" required>
								  </div>
								  <hr>
								  <button type="submit" name="addPostBtn" class="btn btn-primary btn-block">Create Post</button>
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
<?php } ?>