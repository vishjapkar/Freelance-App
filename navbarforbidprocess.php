
<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FREELANCEWAVE</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		
	</style>
</head>
<body>
	<header class="bg-white">
		<div class="container">
		<div class="" style="font-size:14px">
			<nav class="navbar mt-4 navbar-expand-lg navbar-light">
  				<a class="navbar-brand ml-5" href="index.php"><h3><b class="text-danger">FREELANCE<span style="color:blue;">WAVE</span></b></h3></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav" style="font: 14px;">
						
						<?php 
							if (isset($_SESSION['username']))
							{ 
						?>
						<!-- <li class="nav-item">
							<a class="nav-link ml-3" href="postprojects.php">POST PROJECTS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="freelancer-list.php">HIRE FREELANCERS</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="explore-jobs.php">EXPLORE ALL JOBS</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle ml-3" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">WORK BY CATEGORY
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"
							style="font-size:14px">
								<a class="dropdown-item" href="#">DESIGNING</a>
								<a class="dropdown-item" href="#">DEVELOPMENT</a>
								<a class="dropdown-item" href="#">CONTENT WRITING</a>
								<a class="dropdown-item" href="#">DATA PROCESSING</a>
								<a class="dropdown-item" href="#">DATA ENTRY</a>
								<a class="dropdown-item" href="#">ANDROID</a>
							</div>
						</li> -->
						
						<div class="container-fluid">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle ml-2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php 
										echo "Welcome, <br>".$_SESSION['username'];
									?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="myprofile.php">Dashboard</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div>
							</li>
						</div>

						<?php 
							} 
							else
							{ 
						?>
							<div>
							<a href="register.php">
							<button class="btn btn-outline-dark ml-2" style="width:80px;height: 45px;">Register</button></a>
							<a href="login.php">
							<button class="btn btn-outline-dark ml-2" style="width:70px;height: 45px;">Login</button></a>
							</div>

						<?php 
							}
						?>	
  					</div>
  				</div>
					</ul>
					
  				
			</nav>
		</div>
	</div>
</header>

