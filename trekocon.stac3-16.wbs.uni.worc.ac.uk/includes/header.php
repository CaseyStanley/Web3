<!DOCTYPE html>
<html lang="en">
	
	<head>
		<!-- Specifying Character Set -->
		<meta charset="utf-8">
		<!-- Ensuring proper mobile rendering and touch zoom -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Trekocon</title>
		
		<!-- Bootstrap1 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		
		<!-- Libarys -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		
		<!-- Bootstrap2 -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
		
		<!-- CSS style sheet -->
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body class="bg-dark">
		<!-- Navagation Bar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<!-- Trekocon -->
			<a class="navbar-brand" href="index.php?p=home"><img src="../img/Logo.png" width="140" height="110"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Primary Navagation Bar -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<!-- Home -->
						<a class="nav-link" href="index.php?p=home">Home <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<!-- Events -->
						<a class="nav-link" href="index.php?p=events">Events <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<!--Nearest Events -->
						<a class="nav-link" href="index.php?p=nearestEvent" id="searchBtn">Nearest Events <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<!-- Latest News -->
						<a class="nav-link" href="index.php?p=news">Latest News <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<!-- About Us -->
						<a class="nav-link" href="index.php?p=about">About Us <span class="sr-only"></span></a>
					</li>
					<li class="nav-item">
						<!-- Contact Us -->
						<a class="nav-link" href="index.php?p=contact">Contact Us <span class="sr-only"></span></a>
					</li>
				</ul>
				
				<!-- Secondary Navagation Bar -->
				<ul class="nav navbar-nav navbar-right" id="SecNavBar">
					<li class="nav-item dropdown">
						<!-- Secondary Navagation Bar whilest logged in --> 	
						<?php
							if($_SESSION['loggedin'])
							{
						?>
						<!-- Your account dropdown -->
						<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Your account</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<!-- Your profile (option) -->
							<a class="dropdown-item" href="index.php?p=myprofile">Your profile</a>
							<!-- Manage profile (option) -->
							<a class="dropdown-item" href="index.php?p=manageprofile">Manage profile</a>
							<!-- My events (option) -->
							<a class="dropdown-item" href="index.php?p=myevents">My events</a>
							<!-- Logout (option) -->
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?p=logout">Logout</a>
						</div>
					</li> 
					<li class="nav-item dropdown">
						<!-- Secondary Navagation Bar whilest logged out --> 
						<?php
							}
							else
							{
						?>
						<!-- Register/Login dropdown -->
						<a class="nav-link dropdown-toggle" href="index.php?p=login" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Your account</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<!-- Login (option) -->
							<a class="dropdown-item" href="index.php?p=login">Login</a>
							<!-- Register (option) -->
							<a class="dropdown-item" href="index.php?p=register">Register</a>
						</div>
					</li>
					<?php
						}
					?>
				</ul>
			</div>
		</nav>