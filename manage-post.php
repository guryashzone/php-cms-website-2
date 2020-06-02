<?php 
 	require('header.php'); 	
 	
 	$error = $success = "";
 	$postName = $postShortName = $postCategory = $postImage = $postAuthor = $postDesc = $postDate = '';
 	
?>	
	<!-- Main body container -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>
			<!-- Register Div Start-->
			<div class="col-sm-12  col-md-12 col-lg-8">
				<div class="container-fluid">
					<div class="card bg-light">
						<div class="card-body">
							<h3 class="text-center text-info text-monospace font-weight-bold">
								- Manage Posts -
							</h3>
							<hr>
							<div class="container-fluid">
								<table class="table table-sm table-hover table-bordered">
									<tr class="bg-primary text-light">
										<th>Sl</th>
										<th>ID</th>
										<th>Name</th>
										<th>Date</th>
										<th>Status</th>
									</tr>
								<?php 
									$author = $_SESSION['user_id'];
									$query = "SELECT `pm`.* FROM `post_master` pm WHERE `pm`.`post_author_id`=$author ORDER BY `pm`.`post_id` ASC";

									$res = mysqli_query($conn, $query);

									if (!$res) {
										echo mysqli_error($conn);
									}

									if ( mysqli_num_rows($res) == 0 ) {
										echo "
											<tr>
												<td colspan='5'>No posts found.</td>
											</tr>
										";
									} else {
										$i = 1;
										while ($row = mysqli_fetch_object($res)) {
											$json = json_encode($row);
											echo "
												<tr class='post-row' data-json='$json'>
													<td>$i</td>
													<td>$row->post_id</td>
													<td>$row->post_name</td>
													<td>$row->post_date</td>
													<td>$row->post_status</td>
												</tr>
											";
											$i++;
										}	
									}

									
								?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Register Div End-->
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>

		</div>
	</div>

	<!-- Post Edit MOdal -->	
	<div class="modal fade post-edit-modal" tabindex="-1" role="dialog" aria-labelledby="editPostModal" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header bg-primary text-light">
		    <h5 class="modal-title" id="exampleModalLabel"> <span class="fas fa-edit"></span> Edit Post</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		   </div>
		   <div class="modal-body">
			  <div class="form-group">
			    <label for="postName">Post Name</label>
			    <input type="text" class="form-control" id="postName" placeholder="Enter post name" value="<?php echo $postName;?>" required>
			  </div>
			  <div class="form-group">
			    <label for="postShortName">Post Short Name</label>
			    <input type="text" class="form-control" id="postShortName" placeholder="Enter post shortname" value="<?php echo $postShortName;?>" required>
			  </div>
			  <div class="form-group">
			    <label for="postDesc">Post Description</label>
			    <textarea class="form-control" id="postDesc" cols="30" rows="10" placeholder="Enter post description.." required><?php echo $postDesc;?></textarea>
			  </div>
			  <div class="form-group">
			    <label for="postCategory">Select Post Category</label>
			    <select class="form-control" id="postCategory" required>
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
			  <input type="hidden" id="editPostId" value="">
			  <hr>
		   </div>
		   <div class="modal-footer">
		       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		       <button type="button" id="save-post" class="btn btn-primary">Save changes</button>
		   </div>
	    </div>
	  </div>
	</div>

	<?php require('footer.php'); ?>
	<script>
		$(document).on('click', '.post-row', function () {

			var json_data = $(this).attr('data-json');
			var data = JSON.parse(json_data);
			console.log(data);

			$("#editPostId").val(data.post_id);
			$("#postName").val(data.post_name);
			$("#postShortName").val(data.post_short_name);
			$("#postDesc").val(data.post_description);
			$("#postCategory").val(data.post_category);
			$('.post-edit-modal').modal('show'); // hide

		})

		$(document).on('click', '#save-post', function () {

			var postId        = $("#editPostId").val() || 0;
			var postName      = $("#postName").val() || 0;
			var postShortName = $("#postShortName").val() || 0;
			var postDesc      = $("#postDesc").val() || 0;
			var postCategory  = $("#postCategory").val() || 0;

			if (!postName) {
				alert('Please enter a post name!');
				return;
			}

			if (!postShortName) {
				alert('Please enter a post short name!');
				return;
			}

			if (!postDesc) {
				alert('Please enter a post description!');
				return;
			}

			if (!postCategory) {
				alert('Please select a post category!');
				return;
			}

			var postObj =  {
				postId        : postId,
				postName      : postName,
				postShortName : postShortName,
				postDesc      : postDesc,
				postCategory  : postCategory
			}

			$.ajax({
				url: 'script/update-post.php',
				type: 'POST',
				data : {
					postObj: JSON.stringify(postObj)
				},
				success : function (res) {
					console.log(res)
					if (res.trim() == 'success') {
						alert('Data Updated successfully!');
						window.location.reload();
					} else {
						alert(res);
					}
				}
			})



		})
	</script>
</body>
</html>