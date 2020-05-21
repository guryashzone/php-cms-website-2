 <?php 
 	require('header.php');
  ?>
	<div id="cmsCarouselExample" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#cmsCarouselExample" data-slide-to="0" class="active"></li>
	    <li data-target="#cmsCarouselExample" data-slide-to="1"></li>
	    <li data-target="#cmsCarouselExample" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="https://via.placeholder.com/700x200" alt="First slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="https://via.placeholder.com/700x200" alt="Second slide">
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="https://via.placeholder.com/700x200" alt="Third slide">
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	<!-- Main body container -->
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>
			<!-- Post Div Start-->
			<div class="col-sm-12 col-md-8 col-lg-5">
				<?php 
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
						ORDER BY `pm`.`post_id` DESC;
					";

					$res = mysqli_query($conn, $query);

					if (!$res) {
						echo mysqli_error($conn);
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
										$desc...
									</p>
									<a href='post.php?post_id=$row->post_id' class='btn btn-sm btn-primary text-white' data-toggle='tooltip' data-placement='bottom' title='Read more about this post.'>Read More <span class='fas fa-angle-right'></span> </a>
									<hr>
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
		$('.btn').tooltip();
		$('.carousel').carousel({
		  interval: 20000
		})
	</script>
</body>
</html>