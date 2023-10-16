

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FreelanceWave : Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


	<?php include 'navbar.php'; ?>


	<div class="container-fluid image-contaner">
		<div class="row">
			<img src="Images/choose.png" class="p-2" style="width: 100%;height:500px">
				<div class="container p-5 image-text">	
					<div class="row">			
						<div class="col-md-6">
							<p class="text-white">
								<b class="font-weight-bold" style="text-align: left;">
									<h4>Hire talent</h4>
									<h1 class="font-weight-bold">Find best<br>Freelancers</h1>
									Meet worlds best freelancers you’re excited to work with<br>and take
									your career or business to new heights.
								</b>
							</p>
							<a href="client.php" class="text-white" style="text-decoration:none"><button class="btn btn-outline-success mt-3" style="font-size:18px;width:360px">Hire a Freelancer >></a>
							</button>
						</div>	
						<div class="col-lg-6">
							<p class="text-white">
								<b class="font-weight-bold">
									<h4>Hire work</h4>
									<h1 class="font-weight-bold">Find best<br>work</h1>
									Meet clients you’re excited to work with and take
									your career to new heights.
								</b>
							</p>
							<button class="btn btn-outline-success mt-3" style="font-size:18px;width:360px">
								<a href="freelancer.php" class="text-white" style="text-decoration:none">Earn Money From Freelancing >></a>
							</button>
						</div>
					</div>
				</div>
			</div>
		</br>
	</div>

	<div class="container"><hr></div>
	
	<section class="bg-white mt-5">
		<div class="container">
			<div class="row ml-3 text-justify text-dark">
				<div class="col-md-3">
					
					<h2 class="font-weight-bold" style="font-size:25px"><i class="fa fa-upload" aria-hidden="true" style="color:#7B68EE;"></i>
					<span class="ml-3">Post a Job</span></h2>
					<p class="mt-5" style="font-size: 17px;">It’s free and easy to post a job. Simply fill in a title, description and budget and competitive bids come within minutes.</p>
				</div>
				<div class="col-md-3">
					<h2 class="font-weight-bold" style="font-size:25px"><i class="fa fa-users" aria-hidden="true" style="color:#7B68EE"></i><span class="ml-3">Choose Freelancers</span></h2>
					<p class="mt-3" style="font-size: 17px;">No job is too big or too small. We've got freelancers for jobs of any size or budget, across 1800+ skills. No job is too complex. We can get it done!</p>
				</div>
				<div class="col-md-3">
					<h2 class="font-weight-bold" style="font-size:25px"><i class="fa fa-money" aria-hidden="true" style="color:#7B68EE"></i>
					Pay Safely</h2>
					<p class="mt-5" style="font-size: 17px;">Only pay for work when it has been completed and you're 100% satisfied with the quality using our milestone payment system.</p>
				</div>
				<div class="col-md-3">
					<h2 class="font-weight-bold" style="font-size:25px"><i class="fa fa-question" aria-hidden="true" style="color:#7B68EE"></i>
					 We’re Here To Help</h2>
					<p class="mt-5" style="font-size: 17px;">Our talented team of recruiters can help you find the best freelancer for the job and our technical co-pilots can even manage the project for you.</p>
				</div>
			</div>
		</div>
	</section>
	<div class="container mt-3 mb-3"><hr></div>
	<section class="mt-5">
		<div class="container">
			<img src="Images/find-talent.jpg" style="width:100%;height:auto">
			<div class="col-md-4">
				<div class="find-talent">
					<b class="text-white">For clients</b>
					<h1 class="font-weight-bold">Find talent your way</h1>
					<p style="font-size:20px">Work with the largest network of independent professionals and get things done—from quick turnarounds to big transformations.</p>
				</div>
			</div>
		</div>
	</section>
	
	<?php

		include("footer.php");

	 ?>

	</body>
</html>
