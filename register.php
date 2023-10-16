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
		.card{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}
		
	</style>
</head>
<body class="bg-light">
	<div class="container-fluid">
		<nav class="navbar navbar-expand-lg navbar-light">
  				<a class="navbar-brand ml-5" href="index.php"><h3><b class="text-danger">FREELANCE<span style="color:blue;">WAVE</span></b></h3></a>
  		</nav>
		<div class="row">
			<div class="col-md-7">
			<div class="card container mt-5">
				<div class="card-body">
					<form action="register.php" method="post">
						<div class="card-header bg-white">
							<h1 class="font-weight-bold">Signup Now</h1>
							<p class=" mt-3 mb-2 text-right">Already have an account ? <a href="login.php">Login here</a></p>
						</div>
						<div class="form-row mt-4">
							<div class="form-group col-md-8">
								<label for="inputEmail4" class="font-weight-bold">Enter Name</label>
								<input onkeyup="validateFullName()" type="text" name="user_name" class="form-control" id="fullnameinput" placeholder="Enter Your Full Name" required>
								<small id="fullnamewarning" class="form-text text-muted"></small>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="font-weight-bold">Mobile Number</label>
								<input onkeyup="validatePhoneNumber()" type="number" name="user_mobile"  class="form-control" id="inputPassword4" placeholder="Enter Mobile Number" required>
								<small id="phonenumberwarning" class="form-text text-muted"></small>
							</div>
						</div>
						<div class="form-row mt-3">
							<div class="form-group col-md-8">
								<label for="inputEmail4" class="font-weight-bold">Enter Email</label>
								<input onkeyup="validateEmail()" id="emailidcheck" type="email" name="user_email" class="form-control" id="inputEmail4" placeholder="Enter Email" required>
								<small id="emailwarning" class="form-text text-muted"></small>
							</div>
							<div class="form-group col-md-4">
								<label for="inputPassword4" class="font-weight-bold">Create Password</label>
								<input onkeyup="validatePassword()" type="password" name="user_password" class="form-control" id="passwordcheckdata" placeholder="Enter Password" required>
								<input type="checkbox" onclick="myFunction()"> Show Password
								<small id="passwordcheck" class="form-text text-muted"></small>
							</div>
							
						</div>
						<div class="row">
							<div class="col-md-4 form-group">
								<label for="inputAddress2" class="font-weight-bold">Address</label>
								<input type="text"name="user_address" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
							</div>
						</div>
						<div class="form-row">
							<div class="row text-center">
								<div class="col-md-6"><button type="submit" name="submit" class="btn btn-success">Signup</button></div>
								<div class="col-md-6"><button type="reset" name="clear" class="btn btn-danger ml-5">Cancel</button></div>
							</div>
						</div>
					</form>	
					
				</div> 
			</div>
		</div>
		<div class="col-md-5 mt-5">
			<img src="Images/login.jpeg" style="width:100%;height:550px">
		</div>
		</div>
	</div>

	<script>

function validateFullName() {
	var fullName=document.getElementById('fullnameinput').value;
  // Regular expression pattern for full name validation
  const fullNameRegex = /^[a-zA-Z ]+$/;
  
  // Test the full name against the regex pattern
  var a= fullNameRegex.test(fullName);

  if(!a){
	document.getElementById('fullnamewarning').innerHTML = '<mark style="color: red;">Make sure entered name not containing digit or special symbol!</mark>';
	// document.getElementById('phonenumberwarning').innerHTML="Phone number is not valid";

  }
  else{
	document.getElementById('fullnamewarning').innerHTML = '<mark style="color: green;">Entered Name is valid!</mark>';
  }
}


function validatePhoneNumber() {
	var mobileNumber=document.getElementById('inputPassword4').value;
  // Remove any non-digit characters from the mobile number
  const cleanedMobileNumber = mobileNumber.replace(/\D/g, '');

  // Regular expression patterns for different types of mobile numbers in India
  const mobileNumberRegexes = [
    /^(\+91)?[6-9]\d{9}$/,             // Indian mobile numbers (10 digits) starting with 6-9
    /^(\+91)?[6789]\d{9}$/,            // Indian mobile numbers (10 digits) starting with 6-9 (without leading 0)
    /^(\+91)?[6789]\d{11}$/,           // Indian mobile numbers (12 digits) starting with 6-9 (without leading 0)
    /^(\+91)?0[6-9]\d{9}$/             // Indian mobile numbers (11 digits) starting with 6-9 (with leading 0)
  ];

  // Test the mobile number against the regex patterns
  var a= mobileNumberRegexes.some(regex => regex.test(cleanedMobileNumber));
  if(!a){
	document.getElementById('phonenumberwarning').innerHTML = '<mark style="color: red;">Entered number is invalid!</mark>';
	// document.getElementById('phonenumberwarning').innerHTML="Phone number is not valid";

  }
  else{
	document.getElementById('phonenumberwarning').innerHTML = '<mark style="color: green;">Phone number is valid!</mark>';
  }

}

function validateEmail() {
  // Regular expression pattern for email validation
  var email=document.getElementById('emailidcheck').value;
  
  const emailRegex = /^[\w.-]+@[a-zA-Z_-]+?\.[a-zA-Z]{2,3}$/;
  // Test the email against the regex pattern
  var a= emailRegex.test(email);
  if(!a){
	document.getElementById('emailwarning').innerHTML = '<mark style="color: red;">Entered email is invalid!</mark>';
	// document.getElementById('phonenumberwarning').innerHTML="Phone number is not valid";

  }
  else{
	document.getElementById('emailwarning').innerHTML = '<mark style="color: green;">Email id is valid!</mark>';
  }
}





function validatePassword() {
	// alert("Hello")
	var password=document.getElementById('passwordcheckdata').value;
  // Check if the password length is at least 8 characters
  if (password.length < 8) {
    document.getElementById('passwordcheck').innerHTML = '<mark style="color: red;">password length is less than 8 characters</mark>';
  }
  else

  // Check if the password contains at least one uppercase letter
  if (!/[A-Z]/.test(password)) {
    document.getElementById('passwordcheck').innerHTML = '<mark style="color: red;">password contains at least one uppercase letter!</mark>';
  }
  else
  // Check if the password contains at least one lowercase letter
  if (!/[a-z]/.test(password)) {
    document.getElementById('passwordcheck').innerHTML = '<mark style="color: red;">password contains at least one lowercase letter!</mark>';
  }
  else
  // Check if the password contains at least one digit
  if (!/\d/.test(password)) {
    document.getElementById('passwordcheck').innerHTML = '<mark style="color: red;">password contains at least one digit!</mark>';
  }
  else
  // Check if the password contains at least one special character
  if (!/[!@#$%^&*()\-=_+[\]{};':"\\|,.<>/?]+/.test(password)) {
    document.getElementById('passwordcheck').innerHTML = '<mark style="color: red;">password contains at least one special character!</mark>';
  }
  else
  // Password is strong
 { document.getElementById('passwordcheck').innerHTML = '<mark style="color: green;">Password is strong</mark>';}
}
	 function myFunction() {
        var x = document.getElementById("passwordcheckdata");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }


	</script>

	<?php

	

	function redirect_to(){
		
		header("Location: login.php");
		exit;
	}
	
	
		if(isset($_POST['submit']))
		{
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				// Database configuration
				$host = "localhost"; // Replace with your database host
				$dbUsername = "root"; // Replace with your database username
				$dbPassword = "root"; // Replace with your database password
				$dbName = "freelancing"; // Replace with your database name

				// Create a database connection
				$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

				// Check the connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$username = $_POST["user_name"];
				$mobile = $_POST["user_mobile"];
				$email = $_POST["user_email"];
				$password = $_POST["user_password"];
				$address = $_POST["user_address"];
				

				if (empty($username) || empty($mobile) || empty($email) || empty($password) ||empty($address)) {
					echo '<script>alert("Please enter all the information.");</script>';
				}

				else {
					// Insert the user's registration data into the database
					$sql = "INSERT INTO user (user_name, user_mobile, user_email, user_password, user_address) VALUES ('$username', '$mobile', '$email', '$password', '$address')";
				
					if ($conn->query($sql) === TRUE) {
						echo '<script>alert("Registration Successful");</script>';
						echo '<script>window.location.href = "login.php";</script>';
						exit;
					} else {
						// Error occurred
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
				
			// Close the database connection
				$conn->close();
				
			}
		}
		
	?>
</body>
</html>