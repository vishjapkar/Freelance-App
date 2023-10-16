<?php
    include '../dbconfig.php';
    // Add authentication and authorization checks for admin

    // Retrieve the project ID to be deleted
    $user_id = $_GET['user_id'];

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM user WHERE user_id = '$user_id'";

    // Execute the DELETE query
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "User deleted successfully.";
        // Redirect back to the admin page
        header("Location: admin-users.php");
        exit();
    } else {
        echo "Failed to delete the user.";
    }

    // Close the database connection
    mysqli_close($conn);
?>