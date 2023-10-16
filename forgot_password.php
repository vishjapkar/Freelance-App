<?php include 'dbconfig.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Password</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 mt-5">
				<div class="card card-body bg-white">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="card-header bg-white">
							<h2 class="font-weight-bold">Forgot Password</h2>
						</div>
						<div class="form-group mt-3">
							<label for="exampleInputEmail1" style="font-weight: bold;">Email</label>
							<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1" style="font-weight: bold;">Enter New Password</label>
							<input type="password" name="newpass" class="form-control" id="mypass" placeholder="Enter Password">
						</div>
						<input type="checkbox" onclick="myFunction()"> Show Password
						<div class="mt-3 text-center">
							<button type="submit" name="submit" class="btn btn-primary" id="submit-btn">Reset</button>
							<button type="reset" class="btn btn-secondary" id="cancel-btn">Clear</button>
						</div>
					</form>
					<a href="login.php" class="font-weight-bold mt-3 text-center"><< Login</a>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<script language="javascript">
	function myFunction() {
		var x = document.getElementById("mypass");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
	</script>

	<?php
include 'dbconfig.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpass = $_POST['newpass'];

    if (empty($email) || empty($newpass)) {
        echo '<h3 class="container text-center font-weight-bold bg-warning text-dark p-2 mt-3">Please enter all the information.</h3>';
    } else {
        // Check if the user exists with the given email
        $checkQuery = "SELECT * FROM user WHERE user_email = '$email'";
        $result = $conn->query($checkQuery);

        if ($result->num_rows > 0) {
            // User with the given email exists, update the password
            $sql = "UPDATE user SET user_password = '$newpass' WHERE user_email = '$email'";

            if ($conn->query($sql) === true) {
                echo '<h3 class="container text-center font-weight-bold bg-success text-dark p-2 mt-3">Password updated successfully.</h3>';
            } else {
                echo '<h3 class="container text-center font-weight-bold text-danger mt-3">Oops! Something went wrong. Try again.</h3>';
                echo '<p class="container text-center text-danger mt-1">' . $conn->error . '</p>';
            }
        } else {
            echo '<h3 class="container text-center font-weight-bold bg-warning text-dark p-2 mt-3">User with the provided email does not exist.</h3>';
        }
    }

    // Close the database connection
    $conn->close();
}
?>
</body>
</html>
