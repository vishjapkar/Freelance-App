<?php
		session_start();

		include "dbconfig.php";

		if (isset($_GET['project_id'])) {
			$project_id = $_GET['project_id'];

			$deleteQuery = "DELETE FROM projects WHERE project_id='$project_id'";
			$result = mysqli_query($conn, $deleteQuery);

			if ($result) {
				echo '<script>alert("Project deleted successfully")</script>';
				// Redirect or perform any other desired action
			} else {
				echo '<script>alert("Failed to delete the project.")</script>';
				// Handle the error or display an error message
			}
		}
	?>