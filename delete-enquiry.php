<?php
    include '../dbconfig.php';
    // Add authentication and authorization checks for admin

    // Retrieve the project ID to be deleted
    $enquiry_id = $_GET['enquiry_id'];

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM enquiry WHERE enquiry_id = '$enquiry_id'";

    // Execute the DELETE query
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "Enquiry deleted successfully.";
        // Redirect back to the admin page
        header("Location: admin-enquiry.php");
        exit();
    } else {
        echo "Failed to delete the enquiry.";
    }

    // Close the database connection
    mysqli_close($conn);
?>