
<?php
	session_start();

	
?>

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
	<style>
		
		.card{
			border:none;
		}
		.navbar {
			display: flex;
			padding: 10px;
			background-color: #f5f5f5;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			border:none;
			}
			.navbar-logo {
			font-weight: bold;
			color: #333;
			text-decoration: none;
			}

			.navbar-menu {
			list-style-type: none;
			margin: 0;
			padding: 0;
			display: flex;
			}
			.navbar-nav .nav-item .nav-link {
		  position: relative;
		 
		  text-decoration: none;
		  padding-bottom: 4px; /* Set the space for the underline */
		  transition: border-bottom-color 0.3s; /* Transition effect for the underline */
		}

		/* after hover */
		.navbar-nav .nav-item .nav-link:hover {
			font-weight: bold;

		  	border-bottom: 2px solid blue; 
		}

		/*active link */
		.navbar-nav .nav-item a .nav-link:active{
		  border-bottom: 2px solid blue; 
		}
	</style>
</head>

	<?php
		if(isset($_SESSION['username']))
		{
	?>
		<nav class="container-fluid card navbar bg-white navbar-expand-lg navbar-light">
			<div class="row">
				<a class="navbar-brand" href="index.php">
					<h3>
						<img src="Images/logo.jpg" height="60px" width="90px">
						<b class="text-danger">FREELANCE<span style="color:blue;">WAVE</span></b>
					</h3>
				</a> 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav" style="font: 16px;">
						<li class="nav-item">
							<a class="nav-link ml-3" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="postprojects.php">Post Job</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="myprojects.php">My Projects</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="pending-bids.php">Pending Bids</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="confirmbid.php">Confirm Bids</a>
						</li>
						<li class="nav-item">
							<a class="nav-link ml-3" href="logout.php">Logout</a>
						</li>
					</ul>
					<ul>
						<div class="container-fluid">
							<li class="nav-item dropdown" style="list-style: none;">
								<a class="nav-link dropdown-toggle ml-2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php
									  echo '<span style="color:blue;font-size:20px;" class="text-primary font-weight-bold"><i class="fa fa-user-circle-o" aria-hidden="true"></i> ' . $_SESSION['username'] . '</span>';
								?>
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="myprofile.php">Dashboard</a>
									<a class="dropdown-item" href="logout.php">Logout</a>
								</div>
							</li>
						</ul>
					  </div>
				</div>
			</div>
		</nav>	
	<?php	
		}

		else
		{
	?>
	<div class="">
		<nav class="container-fluid navbar bg-white navbar-expand-lg navbar-light mt-3">
			<div class="row">
				<a class="navbar-brand" href="index.php">
					<h3>
						<img src="Images/logo.jpg" height="60px" width="90px">
					<b class="text-danger">FREELANCE<span style="color:blue;">WAVE</span></b></h3></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<a href="register.php">
					<button class="btn btn-outline-dark ml-5" style="width:100px;height: 45px;">Register</button>
				</a>
				<a href="login.php">
					<button class="btn btn-outline-dark ml-2" style="width:70px;height: 45px;">Login</button>
				</a>		
			</div>			
		</nav>
	</div>
		
	<?php
		}
	?>	

</html>
