<?php
    include '../dbconfig.php';
    // Add authentication and authorization checks for admin

    // Retrieve the project ID to be deleted
    $category_id = $_GET['category_id'];

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM category WHERE category_id = 'category_id'";

    // Execute the DELETE query
    $result = mysqli_query($conn, $deleteQuery);

    // Check if the deletion was successful
    if ($result) {
        echo "Category deleted successfully.";
        // Redirect back to the admin page
        header("Location: category.php");
        exit();
    } else {
        echo "Failed to delete the category.";
    }

    // Close the database connection
    mysqli_close($conn);
?>