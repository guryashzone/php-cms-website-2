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
			<div class="col-sm-12  col-md-8 col-lg-5">
				<div class="container-fluid">
					<div class="card bg-light">
						<div class="card-body">
							<h3 class="text-center text-info text-monospace font-weight-bold">
								- Manage Posts -
							</h3>
							<hr>
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