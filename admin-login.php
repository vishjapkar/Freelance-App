
<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Here</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    
    <style>
    	a:hover{
    		font-weight: bold;
    	}
    </style>
</head>
<body class="bg-light">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
        
    </nav>
    <div class="row mt-3 bg-light">
    <div class="col-md-12 text-center">
        <a class="navbar-brand mt-3 ml-3" href="../index.php"><h3>
            <img src="../Images/logo.jpg" height="60px" width="90px">
        <b class="text-danger">FREELANCE<span style="color:blue;">WAVE</span></b></h3></a>
    </div>
</div>
<div class="row mt-3 bg-light">
    <div class="col-md-3"></div>
    <div class="col-md-5 text-center">
        <div class="card bg-white" style="width:500px;">
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="card-header bg-white">
                        <h2 class="font-weight-bold text-center">Admin Login</h2>
                    </div>
                    <div class="form-group mt-5">
                        <label for="exampleInputEmail1" style="font-weight: bold;">Email</label>
                        <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" style="font-weight: bold;">Password</label>
                        <input type="password" name="user_password" class="form-control" id="mypass" placeholder="Enter Password">
                    </div>
                    <input type="checkbox" onclick="myFunction()"> Show Password
                    <div class="text-center mt-3">
                        <button type="submit" name="submit" class="btn btn-primary" id="submit-btn">Login</button>
                        <button type="reset" class="btn btn-secondary" id="cancel-btn">Clear</button>
                    </div>
                </form>
                <a href="../index.php" style="text-decoration:none">
                    <p class="mt-4 mb-1 text-center">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home Page
                    </p>
                </a>
            </div>
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
if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $email = $_POST["user_email"];
        $password = $_POST["user_password"];

        if (empty($email) || empty($password)) {
            echo '<script>alert("Please enter all the information.")</script>';
        }
        else
        {
            if ($email == 'admin@gmail.com' && $password == 'admin') {

                $_SESSION["admin_name"] = $email;
                echo '<script>window.location.href = "admin-panel.php";</script>';
            }

            
			else
			{
                // Invalid credentials
                echo '<script>alert("Invalid username and password.")</script>';
            }
            // Close the statement
            $stmt->close();
        }

        // Close the database connection
        $conn->close();
    }
}
?>
</body>
</html>
