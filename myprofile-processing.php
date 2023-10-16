<?php
include 'dbconfig.php';
include "navbar.php";

if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];

    $user_info = "SELECT user_name, user_id FROM user WHERE user_email='" . $_SESSION['username'] . "'";
    $user_result = mysqli_query($conn, $user_info);

    if ($user_result && mysqli_num_rows($user_result) > 0)
    {
        while ($user = mysqli_fetch_assoc($user_result))
        {
            $_SESSION['user_name'] = $user['user_name']; // Assign value to the session variable
            $user_id = $user['user_id']; // Assign value to $user_id variable

            if (isset($_POST['submit']))
            {
                $user_description = $_POST["user_description"];
                $user_qualification = $_POST["user_qualification"];
                $user_rate = $_POST["user_rate"];
                $user_skills = $_POST["user_skills"];
                $user_experience = $_POST["user_experience"];

                if (empty($user_description) || empty($user_qualification) || empty($user_rate) || empty($user_skills) || empty($user_experience)) {
                    echo '<script>alert("Please enter all the information.")</script>';
                } 
                else
                {
                    // Insert the user's details into the user_details table
                    $sql = "INSERT INTO user_details (user_id, user_description, qualification, skills, rate, experience) VALUES ('$user_id', '$user_description', '$user_qualification', '$user_skills', '$user_rate', '$user_experience')";

                    if ($conn->query($sql) === TRUE)
                    {
                        // Data stored successfully
                        echo '<script>alert("Stored Successfully")</script>';
                        exit();
                    }
                    else {
                        // Error occurred
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
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


