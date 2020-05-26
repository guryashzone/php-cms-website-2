<?php 
session_start();
	require_once('connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CMS Website</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- Navbar Starts -->
	<div class="container-fluid text-white">
		<div class="row bg-dark">
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>
			<div class="col-sm-12  col-md-12 col-lg-8">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				  <a class="navbar-brand" href="index.php">CMS</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				    <div class="navbar-nav">
				      <a class="nav-item nav-link active" href="index.php"><span class='fas fa-home'></span> Home <span class="sr-only">(current)</span></a>
				      <?php 
				      	if (isset($_SESSION['login_status'])) {
				      		echo "
								<a class='nav-item nav-link' href='create-post.php'> <span class='far fa-plus-square'></span> Create</a>
								<a class='nav-item nav-link' href='manage-post.php'> <span class='far fa-edit'></span> Manage </a>
								<a class='nav-item nav-link' href='#'>Welcome, {$_SESSION['user_name']}</a>
								<a class='nav-item nav-link' href='logout.php'> <span class='fas fa-lock'></span> Logout </a>
				      		";
				      	} else {
				      		echo "
								<a class='nav-item nav-link' href='register.php'> <span class='fas fa-user-tie'></span> Signup</a>
				      		";
				      	}
				       ?>
				    </div>
				  </div>
				</nav>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-2">
				<br>
			</div>
		</div>
	</div>
	<!-- Navbar Ends -->
