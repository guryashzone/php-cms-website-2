<?php 
 	require('header.php');
?>	
	<!-- Main body container -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>
			<!-- Post Div Start-->
			<div class="col-sm-12  col-md-8 col-lg-5">
				<div class="container post-container">
					<div class="post">
						<?php 
							if (!isset($_GET['cat_id']) || empty($_GET['cat_id'])) {
								header('location:index.php');
								exit('Invalid Argument Supplied');
							}
							
							$cat_id = mysqli_real_escape_string($conn, htmlspecialchars($_GET['cat_id'])); 
							
							$query = "
								SELECT
									`pm`.*,
									`um`.`user_name`
								FROM
									`post_master` pm,
									`user_master` um
								WHERE
									`um`.`user_id` = `pm`.`post_author_id`
									 AND `pm`.`post_status` = 'active'
									 AND `pm`.`post_category` = $cat_id
							";

							$res = mysqli_query($conn, $query);

							if (!$res) {
								echo mysqli_error($conn);
							}

							$num_rows = mysqli_num_rows($res);

							if ($num_rows == 0) {
								echo "
									<div class='alert alert-danger' role='alert'>
									  No post found with related category. <a href='index.php' class='alert-link'>Go back</a>
									</div>
								";
							}

							while ($row = mysqli_fetch_object($res)) {

								$desc = substr($row->post_description, 0, 250);
								echo "
										<div class='container-fluid post-container'>
											<h3 class='text-primary font-weight-bold'>
												$row->post_name
											</h3>
											<div>
												by <span class='text-primary'>$row->user_name</span>
											</div>
											<small class='text-muted mt-1'>
												<span class='far fa-clock'></span> Posted on $row->post_date
											</small>
											<hr>
											<img class='img-fluid' src='images/post/$row->post_image_url' alt='$row->post_name image' >
											<hr>
											<p class='text-justify text-muted'>
												$desc
											</p>
											<a href='post.php?post_id=$row->post_id' class='btn btn-sm btn-primary text-white' data-toggle='tooltip' data-placement='bottom' title='Read more about this post.'>
												Read More <span class='fas fa-angle-right'></span>
											</a>
										<hr>
										</div>		
									
									";
							}

						 ?>
					</div>
					<hr>
			<br>
			<br>
			<br>
			<br>
			</div>
			</div>
			
			<!-- Post Div End-->

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