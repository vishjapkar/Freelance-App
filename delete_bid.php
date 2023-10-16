<?php
    include '../dbconfig.php';
    // Add authentication and authorization checks for admin

    // Retrieve the project ID to be deleted
    $bid_id = $_GET['bid_id'];

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM new_bidding WHERE bid_id = '$bid_id'";

    // Execute the DELETE query
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "Bid deleted successfully.";
        // Redirect back to the admin page
        header("Location: admin-bidding.php");
        exit();
    } else {
        echo "Failed to delete the Bid.";
    }

    // Close the database connection
    mysqli_close($conn);
?>