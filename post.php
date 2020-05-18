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
					<h3 class="text-primary font-weight-bold">
						Post Number 1 Title for CMS Demonstration
					</h3>
					<div>
						by <span class="text-primary">Author</span>
					</div>
					<small class="text-muted mt-1">
						<span class="far fa-clock"></span> Posted on 2 Apr, 2020
					</small>
					<hr>
					<img src="https://via.placeholder.com/700x200" alt="" class="img-fluid">
					<hr>
					<h5 class="text-justify">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea alias nam, impedit, ipsam quisquam voluptate dignissimos sint adipisci esse quia qui quos sit iure. Iusto eaque, in esse ipsum alias!
					</h5>
					<p class="text-justify">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius voluptatibus obcaecati esse quos laboriosam omnis, veritatis autem temporibus, labore repellat fugiat necessitatibus cum accusamus suscipit mollitia beatae culpa natus nisi, facilis nemo. Earum quis id fuga, qui, recusandae iure, aperiam expedita ipsam placeat sit numquam veritatis a cum soluta enim blanditiis iste! Nulla quidem quia aperiam, alias iste adipisci tempora molestiae id, veniam porro nesciunt, perferendis maxime! Sequi qui, nam necessitatibus fugit itaque nulla possimus, at commodi animi voluptates quaerat officiis adipisci quia obcaecati exercitationem tempore? Nemo impedit laborum adipisci nostrum dolores cupiditate assumenda commodi explicabo facere maxime, minima ut.
					</p>
					<hr>
					<div class="card bg-light">
						<div class="card-body">
							<h6>Leave a comment:</h6>
							<textarea class="form-control" cols="30" rows="5"></textarea>
							<button class="btn btn-primary mt-2">Post Comment</button>
						</div>
					</div>
					<hr>
					<div class="container-fluid">
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