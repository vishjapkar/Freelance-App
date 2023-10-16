<?php
    include '../dbconfig.php';
    // Add authentication and authorization checks for admin

    // Retrieve the project ID to be deleted
    $project_id = $_GET['project_id'];

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM projects WHERE project_id = '$project_id'";

    // Execute the DELETE query
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "Project deleted successfully.";
        // Redirect back to the admin page
        header("Location: admin-panel.php");
        exit();
    } else {
        echo "Failed to delete the project.";
    }

    // Close the database connection
    mysqli_close($conn);
?>


