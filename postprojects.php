
<?php include 'client-nav.php'; ?>

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

<!-- 

    <div class="container mt-3">
        <h3 class="font-weight-bold mt-3">Tell us what you need done</h3>
        <p class="mt-3">Contact skilled freelancers within minutes. View profiles, ratings, portfolios <br>and chat with them.
        Pay the freelancer only when you are 100% satisfied with their work. </p>
    </div> -->

   <div class="row p-5 mt-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                        <div class="card-header text-center bg-white"><h2 class="font-weight-bold ">Enter Project Details</h2></div>
	                    <div class="row">
	                        <div class="col-md-6">
	                        	<div class="form-group mt-2">
		                            <label for="exampleInputEmail1" style="font-weight: bold;">Project Title</label>
		                            <input type="text" name="pr_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Project Title">
		                        </div>
		                        <div class="form-group mt-2">
		                            <label for="exampleInputPassword1" style="font-weight: bold;">Tell us more about your project- </label>
		                            <textarea type="text" name="pr_about" class="form-control" id="mypass" placeholder="More about project"></textarea>
		                        </div>
		                        <div class="form-group mt-2">
		                            <label for="exampleInputEmail1" style="font-weight: bold;">Upload Files</label>
		                            <input type="file" name="pr_file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
		                        </div>
		                    </div>
                       
	                        <div class="col-md-6">
	                        	<div class="form-group mt-2">
		                            <label for="exampleInputPassword1" style="font-weight: bold;">Skills Required</label>
		                            <input type="text" name="pr_skills" class="form-control" id="mypass" placeholder="Enter skills">
		                        </div>
		                        <div class="form-group mt-2">
		                            <label for="exampleInputEmail1" style="font-weight: bold;">Price</label>
		                            <input type="text" name="pr_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price">
		                        </div>
		                        <div class="form-group mt-2">
		                            <label for="exampleInputPassword1" style="font-weight: bold;">Days</label>
		                            <input type="number" name="pr_days" class="form-control" id="mypass" placeholder="Enter Days">
		                        </div>
		                         <div class="form-group">
    <label for="category" class="font-weight-bold">Select Category of your project:</label>
    <select name="category_id" id="category" class="form-control" required>
        <option value="all">All</option>
        <?php
            include 'dbconfig.php';

            // Query to retrieve all categories
            $query = "SELECT * FROM category";
            $result = mysqli_query($conn, $query);

            // Loop through the result set and generate options
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
                echo "<option value='$category_id'>$category_name</option>";
            }
        ?>
    </select>
</div>
<input type="hidden" name="category_id" value="<?php= echo $_POST['category_id'];?>">

		                    </div>
	                	</div>
	                	<div class="card-footer bg-white text-center">
	                        <button type="submit" name="submit" class="btn btn-primary" id="submit-btn">Post</button>
	                        <button type="reset" class="btn btn-secondary" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        

<?php

	if (isset($_POST['submit']))
	{
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

	        $pr_title = $_POST["pr_title"];
			$pr_about = $_POST["pr_about"];
			$pr_file = $_FILES["pr_file"];

			if (isset($_FILES['pr_file']))
			{
			    // Specify the target directory where you want to store the uploaded file
			    $targetDirectory = 'files/';

			    // Get the name of the uploaded file
			    $fileName = $_FILES['pr_file']['name'];

			    // Generate a unique name for the file to avoid conflicts
			    $uniqueFileName = uniqid() . '_' . $fileName;

			    // Create the full path to the target directory and file
			    $targetFilePath = $targetDirectory . $uniqueFileName;

			    // Move the uploaded file to the target location
			    if (move_uploaded_file($_FILES['pr_file']['tmp_name'], $targetFilePath)) {
			        echo "File uploaded successfully.";
			    } else {
			        echo "Error uploading file.";
			    }
			}

	        $pr_skills = $_POST["pr_skills"];
	        $pr_price = $_POST["pr_price"];
	        $pr_days = $_POST["pr_days"];
	        

	        if (empty($pr_title) || empty($pr_about) || empty($pr_skills) || empty($pr_price) || empty($pr_days))
	        {
	            echo '<script>alert("Please enter all the information.")</script>';
	        } 
	        else 
	        {
	            $username = $_SESSION['username'];

	            $var = "SELECT user_id from user WHERE user_email='$username'";

	            $result = mysqli_query($conn, $var);

	            // Check if the query was successful
	            if ($result && mysqli_num_rows($result) > 0)
	            {
	                $row = mysqli_fetch_assoc($result);
	                $clientId = $row['user_id'];

	                // Store the user ID in a session variable
	                $_SESSION['user_id'] = $clientId;
	                //echo "Client ID: " . $_SESSION['user_id'];

	                // Insert the user's registration data into the database
	                $sql = "INSERT INTO projects (project_title, project_description, project_file, project_skills, project_price, project_days, client_id, category_id) VALUES ('$pr_title', '$pr_about', '$targetFilePath', '$pr_skills', '$pr_price', '$pr_days', '$clientId', '$category_id')";

	                if ($conn->query($sql) === TRUE)
	                {
	                    // Project upload successful
	                    echo '<script>alert("Project Successully Uploaded")</script>';
	                    exit();
	                }
	                else
	                {
	                    // Error occurred
	                    echo "Error: " . $sql . "<br>" . $conn->error;
	                }
	            } 
	            else
	            {
	                echo "User ID not found in the database";
	            }
	        }
	        // Close the database connection
	        $conn->close();
	    }
	}


?>

<?php include('footer.php'); ?>

</body>
</html>