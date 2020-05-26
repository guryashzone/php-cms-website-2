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
		<?php 
			if (!isset($_SESSION['login_status'])) {
		 ?>
		<h6 class="card-title font-weight-bold">
			Login
		</h6>
		<form action="login.php" method="POST">
			<div class="input-group">
				<input type="text" name="userNameInput" id="userNameInput" class="form-control" placeholder="Username">
			</div>
			<div class="input-group mt-2">
				<div class="input-group-append">
				    <button type="button" class="btn btn-outline-dark rounded showPwd"> <span class="fas fa-eye-slash"></span> </button>
				</div>
				<input type="password" name="userPwdInput" id="userPwdInput" class="form-control" placeholder="Password">
				<div class="input-group-append">
				    <button type="submit" name="loginBtn" class="btn btn-primary" id="loginBtn">Login</button>
				</div>
			</div>
		</form>
		<?php
			} else {
		?>
			<a href="logout.php" class="btn btn-sm btn-danger btn-block">Logout</a>
		<?php
			}
		?>
	</div>
</div>

<div class="card bg-light mt-4 c3">
	<div class="card-body">
		<h6 class="card-title font-weight-bold">
			Categories
		</h6>
		<div class="font-weight-bold">
			<?php 
				$query = "SELECT * FROM `post_category_master` WHERE `category_status`='active' ORDER BY `category_id` DESC LIMIT 5";
				$res = mysqli_query($conn, $query);

				// $row = mysqli_fetch_assoc($res);
				// $row = mysqli_fetch_array($res);
				// echo "<p class='text-primary m-0'>{$row['category_name']}</p>";
				
				while ($row = mysqli_fetch_object($res)) {
					echo "<a href='search.php?cat_id=$row->category_id' class='text-primary m-0'>$row->category_name ($row->category_short_name)</a><br>";
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
			<?php 
				$query = "
					SELECT
						`pm`.`post_id`, `pm`.`post_name`, `pm`.`post_image_url`, `um`.`user_name`
					FROM
						`post_master` pm,
						`user_master` um
					WHERE
						`um`.`user_id` = `pm`.`post_author_id`
						 AND `pm`.`post_status` = 'active'
					ORDER BY `pm`.`post_id` DESC LIMIT 5;
				";

				$res = mysqli_query($conn, $query);

				if (!$res) {
					echo mysqli_error($conn);
				}

				while ($row = mysqli_fetch_object($res)) {

					echo "
						<a href='post.php?post_id=$row->post_id'>
							<p class='text-primary m-0 mt-1'>
								<b>$row->post_name</b>
								<img src='images/post/$row->post_image_url' class='float-right' alt='$row->post_name image' height='20' width='50'>
								<small class='text-muted d-block'>By $row->user_name</small>
							</p>
						</a>
						";
				}

			 ?>
		</div>
	</div>
</div>
