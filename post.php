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
				<?php 
					if (isset($_SESSION['login_status'])) {
				 ?>
				<div class="container post-container">
					<div class="post">
						<?php 
							if (!isset($_GET['post_id']) || empty($_GET['post_id'])) {
								header('location:index.php');
								exit('Invalid Argument Supplied');
							}
							
							$post_id = mysqli_real_escape_string($conn, htmlspecialchars($_GET['post_id'])); 
							
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
									 AND `pm`.`post_id` = $post_id
							";

							$res = mysqli_query($conn, $query);

							if (!$res) {
								echo mysqli_error($conn);
							}

							while ($row = mysqli_fetch_object($res)) {

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
												$row->post_description
											</p>
										</div>		
										<input type='hidden' id='post-id' value='$row->post_id'>
									";
							}

						 ?>
					</div>
					<hr>
					<div class="card bg-light">
						<div class="card-body">
							<h6>Leave a comment:</h6>
							<textarea class="form-control" cols="30" rows="2" placeholder="Enter you comment..."></textarea>
							<button class="btn btn-sm btn-danger float-right mt-2">COMMENT</button>
						</div>
					</div>
					<hr>
					<div class="container-fluid" id="post-comments">
						<div class="media">
						  <img class="mr-3" src="https://via.placeholder.com/50x50" alt="Generic placeholder image">
						  <div class="media-body">
						    <h5 class="mt-0">Javascript is fun <small class="text-muted"> <span class="far fa-clock"></span> 03 Apr, 2020 at 4:00 pm</small></h5>
						    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
						  </div>
						</div>

						<div class="media mt-4">
						  <img class="mr-3" src="https://via.placeholder.com/50x50" alt="Generic placeholder image">
						  <div class="media-body">
						    <h5 class="mt-0">Javascript is fun <small class="text-muted"> <span class="far fa-clock"></span> 03 Apr, 2020 at 4:00 pm</small></h5>
						    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. 

						    <div class="media mt-4">
							  <img class="mr-3" src="https://via.placeholder.com/50x50" alt="Generic placeholder image">
							  <div class="media-body">
							    <h5 class="mt-0">Javascript is fun <small class="text-muted"> <span class="far fa-clock"></span> 03 Apr, 2020 at 4:00 pm</small></h5>
							    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. 
							 </div>
							</div>
						  </div>
						</div>


					</div>
					<br>
				<br>
				<br>
				<br>
				<br>
				</div>
				<?php 
					} else {
						echo "
							<div class='alert alert-danger' role='alert'>
							  Please login to access this page.
							</div>
						";
					}
				 ?>
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
	<script>
		function getPostComments () {
			var post_id = $("#post-id").val();
			// AJAX - Asynchronous Javascript & XML
			$.ajax({
				url : 'script/requests.php', // action
				type: 'POST', // method
				data : {
					POST_TYPE : 'GET_COMMENTS', // input fields
					POST_ID : post_id
				},
				success :  function (response) {
					console.log("Server response : ", response)

					var comment = JSON.parse(response);
					console.log("Server response : ", comment);

					if ( comment['error'] != 0 ) {
						$("#post-comments").html('<p class="text-danger">'+ comment['error'] + '</p>');	
						return;
					}

					$("#post-comments").html('');

					for ( var i=0; i < comment['data'].length; i++ ) {
						var com = `
							<div class="media mt-3">
							  <img class="mr-3" src="https://via.placeholder.com/50x50" alt="Generic placeholder image">
							  <div class="media-body">
							    <h6 class="mt-0 mb-0 text-primary">${comment['data'][i]['user_name']} <small class="text-muted"> <span class="far fa-clock"></span> ${comment['data'][i]['comment_date']}</small></h6>
							    ${comment['data'][i]['comment_text']}
							  </div>
							</div>
						`;
						$("#post-comments").append(com);
					}
					
				}
			})
		}
		getPostComments();
	</script>
</body>
</html>