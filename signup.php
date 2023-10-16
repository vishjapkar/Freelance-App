<?php
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

			$username = $_POST["user_name"];
			$mobile = $_POST["user_mobile"];
			$email = $_POST["user_email"];
			$password = $_POST["user_password"];
			$address = $_POST["user_address"];
			$type = $_POST["user_type"];
		
			// Insert the user's registration data into the database
			$sql = "INSERT INTO user (username, mobile, email, password, address, type) VALUES ('$username', '$mobile', '$email', '$password', '$address', '$type')";

			if ($conn->query($sql) === TRUE) {
				// Registration successful
				header("Location: success.php");
				exit();
			} else {
				// Error occurred
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			

			// Close the database connection
			$conn->close();
	}
	?>