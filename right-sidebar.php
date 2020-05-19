<div class="card bg-light c1">
	<div class="card-body">
		<h6 class="card-title font-weight-bold" id="blogSearchTitle">
			<i>Blog Search</i>
		</h6>
		<div class="input-group">
			<input type="text" name="searchInput" id="searchInput" class="form-control" placeholder="Search Blogs">
			<div class="input-group-append" id="searchBlogBtn">
			    <span class="input-group-text"><span class="fas fa-search"></span></span>
			</div>
		</div>
		<small class="text-primary float-right" id="clearSearchList">Clear</small>
		<ol id="serachedKeywords"></ol>
	</div>
</div>

<div class="card bg-light mt-4 c2">
	<div class="card-body">
		<h6 class="card-title font-weight-bold">
			Login
		</h6>
		<form action="login.php" method="POST">
			<div class="input-group">
				<input type="text" name="userNameInput" id="userNameInput" class="form-control" placeholder="Username">
			</div>
			<div class="input-group mt-2">
				<div class="input-group-append">
				    <button class="btn btn-outline-dark rounded showPwd"> <span class="fas fa-eye-slash"></span> </button>
				</div>
				<input type="password" name="userPwdInput" id="userPwdInput" class="form-control" placeholder="Password">
				<div class="input-group-append">
				    <button type="submit" name="loginBtn" class="btn btn-primary" id="loginBtn">Login</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="card bg-light mt-4 c3">
	<div class="card-body">
		<h6 class="card-title font-weight-bold">
			Categories
		</h6>
		<div class="font-weight-bold">
			<?php 
				$query = "SELECT * FROM `post_category_master` WHERE `category_status` = 'active' ORDER BY `category_id` DESC LIMIT 5";
				$res = mysqli_query($conn, $query);

				// $row = mysqli_fetch_assoc($res);
				// $row = mysqli_fetch_array($res);
				// echo "<p class='text-primary m-0'>{$row['category_name']}</p>";
				
				while ($row = mysqli_fetch_object($res)) {
					echo "<p class='text-primary m-0'>$row->category_name</p>";
				}
			 ?>

		</div>
	</div>
</div>

<div class="card bg-light mt-4 c4">
	<div class="card-body">
		<h6 class="card-title font-weight-bold">
			Recent Posts
		</h6>
		<div class="font-weight-bold">
			<p class="text-primary m-0 mt-1">
				<b>Javascript</b>
				<img src="https://via.placeholder.com/50x20" class="float-right" alt="">
				<small class="text-muted d-block">By Author</small>
			</p>
			<p class="text-primary m-0 mt-1">
				<b>PHP CMS</b>
				<img src="https://via.placeholder.com/50x20" class="float-right" alt="">
				<small class="text-muted d-block">By Author</small>
			</p>
			<p class="text-primary m-0 mt-1">
				<b>JQuery Framework</b>
				<img src="https://via.placeholder.com/50x20" class="float-right" alt="">
				<small class="text-muted d-block">By Author</small>
			</p>
			<p class="text-primary m-0 mt-1">
				<b>Boostrap 4</b>
				<img src="https://via.placeholder.com/50x20" class="float-right" alt="">
				<small class="text-muted d-block">By Author</small>
			</p>
		</div>
	</div>
</div>