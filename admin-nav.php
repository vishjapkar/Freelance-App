<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup Here</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

	<style type="text/css">
		
	</style>
</head>
<body class="bg-light">
	<div class="row mt-2">
		<nav class="container bg-light navbar bg-white navbar-expand-lg navbar-light">
			<div class="row ml-5">
				<a class="navbar-brand" href="../index.php">
					<h3>
						<b class="text-danger ml-5">FREELANCE<span style="color:blue;">WAVE</span></b>
					</h3>
				</a> 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav ml-3" style="font: 14px;">
						<li class="nav-item">
							<a class="nav-link ml-3" href="admin-panel.php">Panel</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="admin-project.php">Projects</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="admin-users.php">Users</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="admin-bidding.php">Bidding</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="category.php">Category</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="admin-enquiry.php">Enquiry</a>
						</li>
						<li>
							<a class="nav-link ml-3" href="../logout.php">Logout</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</body>
</html>
