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
					$posts = [
						array(
							'postName'    => 'Javascript',
							'description' => 'Javacsript is a powerful language.',
							'postDate'    => '02 Apr, 2020',
							'author'      => 'John'
						),
						array(
							'postName'    => 'PHP Hypertext Preprocessor',
							'description' => 'PHP is a powerful language.',
							'postDate'    => '02 May, 2020',
							'author'      => 'James'
						), 	
						array(
							'postName'    => 'HTML - Hypertext MArkup Language',
							'description' => 'HTML is a markup language.',
							'postDate'    => '21 Jan, 2020',
							'author'      => 'Fredrix'
						) 	
					];

					foreach ($posts as $post) {				
					
						echo "
							<div class='container-fluid post-container'>
								<h3 class='text-primary font-weight-bold'>
									{$post['postName']}
								</h3>
								<div>
									by <span class='text-primary'>{$post['author']}</span>
								</div>
								<small class='text-muted mt-1'>
									<span class='far fa-clock'></span> Posted on {$post['postDate']}
								</small>
								<hr>
								<img id='postOneImg' src='https://via.placeholder.com/700x200' alt='' class='img-fluid'>
								<hr>
								<p id='postOneDescription'>
									{$post['description']}
								</p>
								<a href='post.php' class='btn btn-primary text-white' data-toggle='tooltip' data-placement='bottom' title='Read more about this post.'>Read More <span class='fas fa-angle-right'></span> </a>
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