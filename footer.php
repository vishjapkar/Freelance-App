<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<div class="container mt-3 mb-3"><hr></div>
		<footer>
			<div class="container-fluid p-3 bg-dark">
				<div class="container text-white">
					<div class="row">
						<div class="col-md-4 mt-5" style="line-height:40px">
							<address>
								<h4 class="font-weight-bold text-white ml-4">Quick Links</h4>
								<ul class="footer-menu">
									<li><a href="index.php" class="text-white">Home</a></li>
									<li><a href="about.php" class="text-white">About Us</a></li>
									<li><a href="Admin/admin-login.php" class="text-white">Administration</a></li>
								</ul>
							</address>
						</div>
						<div class="col-md-4 mt-5" style="line-height:40px">
							<address>
								<div class="">
									<h4 class="font-weight-bold text-white">Location</h4>

									<p>
										Pune, Maharashtra, India
										<br>
										Phone : 9359786169
										<br>
										E-Mail :japkarvishal97@gmail.com
										<br>
										Phone : 7058121907
										<br>
										E-Mail :pujaridnyaneshwar@gmail.com

									</p>
								</div>
							</address>
						</div>
						<div class="col-md-4 mt-5" style="line-height:40px">
							
							<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
								
								<div class="card p-3" style="border-radius: 20px;">
									<h4 class="font-weight-bold text-dark text-center">Enquiry Now</h4>
									<input type="text" class="form-control mt-2" name="name" placeholder="Enter Your Name">

									<input type="email" class="form-control mt-2" name="email" placeholder="Enter Your Email">

									<input type="mobile" class="form-control mt-2"  name="mobile" placeholder="Enter Your Mobile">

									<textarea type="text" class="form-control mt-2"  name="query" placeholder="Enter Your Query"></textarea>

									<button type="submit" name="submit" class="btn btn-warning mt-2">Send</button>
									<button type="reset" class="btn btn-outline-warning mt-2">Cancel</button>
								</div>
							</form>

							<?php 
								include 'dbconfig.php'; 

								if(isset($_POST['submit'])){
									$name = $_POST['name'];
									$email = $_POST['email'];
									$mobile = $_POST['mobile'];
									$query = $_POST['query'];

									if (empty($name) || empty($mobile) || empty($email) || empty($query))
									{
										echo '<script>alert("Please enter all the information.")</script>';
									}
									else
									{
										// Insert the user's registration data into the database
										$sql = "INSERT INTO enquiry (name, mobile, email, query) VALUES ('$name', '$mobile', '$email', '$query')";

										if ($conn->query($sql) === TRUE)
										{
											// Registration successful
											'<script>alert("Query submitted succesfully")</script>';
											exit();
										} 
										else
										{
											// Error occurred
											echo "Error: " . $sql . "<br>" . $conn->error;
										}
									}
								// Close the database connection
									$conn->close();
								}
							?>
						</div>
					</div>
					<hr>
					<div class="row mt-3">
						<div class="container ml-3 text-white text-center" style="font-size:20px;">
							<div class="row">Follow Us : 
								<ul style="list-style:none;display:flex;color:white ">
								<li class="">
									<a href="https://www.facebook.com">
									<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li class="ml-3">
									<a href="https://www.instagram.com">
										<i class="fa fa-instagram"></i>
									</a>
								</li>
								<li class="ml-3"><a href="https://www.twitter.com"><i class="fa fa-twitter" style="text-decoration:none" class="text-white"></i></a></li>
								<li class="ml-3"><a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a></li>
							</ul>
							</div>
						</div>
					</div>
				</div>
				
				<hr>
				<p style="height: 1px;" class="text-center text-white">Copyright <i class="fa fa-copyright" aria-hidden="true"></i>
 2023 FreelanceWave</p>
			</div>
		</footer>

	</body>
	</html>