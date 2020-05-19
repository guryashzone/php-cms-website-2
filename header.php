<?php 
	require_once('connection.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
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
				  <a class="navbar-brand" href="#">CMS</a>
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"></span>
				  </button>
				  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				    <div class="navbar-nav">
				      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
				      <a class="nav-item nav-link php_link" href="php_module.html">PHP Modules</a>
				      <a class="nav-item nav-link" href="#">PHP Applications</a>
				      <a class="nav-item nav-link" id="phpMod" href="#">Web Developement</a>
				      <a class="nav-item nav-link" href="#" id="logoutBtn">Logout</a>
				      <a class="nav-item nav-link" href="#">Register</a>
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
