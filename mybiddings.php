<?php
include "nav.php";
include "dbconfig.php";

if (isset($_GET['project_id']) && isset($_GET['freelancer_id']) && isset($_GET['client_id'])) {
    $project_id = $_GET['project_id'];
    $freelancer_id = $_GET['freelancer_id'];
    $client_id = $_GET['client_id'];

    // Retrieve project details from the database
    $project_query = "SELECT * FROM projects WHERE project_id = '$project_id'";
    $project_result = mysqli_query($conn, $project_query);

    // Retrieve user details from the database
    $user_query = "SELECT * FROM user WHERE user_id = '$freelancer_id'";
    $user_result = mysqli_query($conn, $user_query);

    if ($project_result && $user_result && mysqli_num_rows($project_result) > 0 && mysqli_num_rows($user_result) > 0) {
        // Fetch the project details
        $project = mysqli_fetch_assoc($project_result);

        // Fetch the user details
        $user = mysqli_fetch_assoc($user_result);

        // Access the project information
        $project_title = $project['project_title'];
        $project_skills = $project['project_skills'];
        $project_price = $project['project_price'];
        $project_description = $project['project_description'];
        $project_days = $project['project_days'];

        // Access the user information
        $user_name = $user['user_name'];
        $user_email = $user['user_email'];
        $user_mobile = $user['user_mobile'];

        // Store the variable values in the bidding table
        $query = "INSERT INTO bidding (user_name, user_email, user_mobile, user_rate, days, freelancer_id, project_id, client_id) VALUES ('$user_name', '$user_email', '$user_mobile', '$project_price', '$project_days', '$freelancer_id', '$project_id','$client_id')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Bidding information stored successfully.";
        } else {
            echo "Error storing bidding information: " . mysqli_error($conn);
        }
    } else {
        echo "<p>No project or user found with the provided IDs.</p>";
    }

    mysqli_close($conn);
} else {
    echo "<p>No project ID or user ID provided.</p>";
}

include 'footer.php';
?>
