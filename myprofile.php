<?php
include 'dbconfig.php';
include "navbar.php";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $user_info = "SELECT user_name, user_id FROM user WHERE user_email='" . $_SESSION['username'] . "'";
    $user_result = mysqli_query($conn, $user_info);

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        while ($user = mysqli_fetch_assoc($user_result)) {
            $_SESSION['user_name'] = $user['user_name']; // Assign value to the session variable
            $user_id = $user['user_id']; // Assign value to $user_id variable

            // Fetch user details from the user_details table
            $user_details_query = "SELECT * FROM user_details WHERE user_id = '$user_id'";
            $user_details_result = mysqli_query($conn, $user_details_query);

            if ($user_details_result && mysqli_num_rows($user_details_result) > 0) {
                $user_details = mysqli_fetch_assoc($user_details_result);
            }

            if (isset($_POST['submit']) || isset($_POST['update'])) {
                $user_description = $_POST["user_description"];
                $user_qualification = $_POST["user_qualification"];
                $user_rate = $_POST["user_rate"];
                $user_skills = $_POST["user_skills"];
                $user_experience = $_POST["user_experience"];

                if (empty($user_description) || empty($user_qualification) || empty($user_rate) || empty($user_skills)) {
                    echo '<script>alert("Please enter all the information.")</script>';
                } else {
                    if (isset($user_details) && !empty($user_details)) {
                        // Update the user's details in the user_details table
                        $sql = "UPDATE user_details SET user_description = '$user_description', qualification = '$user_qualification', skills = '$user_skills', rate = '$user_rate', experience = '$user_experience' WHERE user_id = '$user_id'";
                    } else {
                        // Insert the user's details into the user_details table
                        $sql = "INSERT INTO user_details (user_id, user_description, qualification, skills, rate, experience) VALUES ('$user_id', '$user_description', '$user_qualification', '$user_skills', '$user_rate', '$user_experience')";
                    }

                    if ($conn->query($sql) === TRUE) {
                        // Data stored or updated successfully
                        echo '<script>alert("Stored Successfully")</script>';
                        
                    } else {
                        // Error occurred
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            } else {
                //echo "User ID not found in the database";
            }
        }
        // Close the database connection
        $conn->close();
    }
}
?>

<!-- Remaining HTML code -->

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
</head>
<body>
    <div class="container">
    </div>
    <div class="row mt-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="myprofile.php" method="post">
                        <div class="card-header text-center bg-white">
                            <h2 class="font-weight-bold">User Details</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Name</label>
                                    <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['user_name']; ?>" disabled>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">About</label>
                                    <textarea name="user_description" class="form-control" id="mypass" placeholder="Write About You"><?php echo isset($user_details['user_description']) ? $user_details['user_description'] : ''; ?></textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Qualification</label>
                                    <input type="text" name="user_qualification" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Qualification Details" value="<?php echo isset($user_details['qualification']) ? $user_details['qualification'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mt-2">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Skills</label>
                                    <input type="text" name="user_skills" class="form-control" id="mypass" placeholder="Enter skills" value="<?php echo isset($user_details['skills']) ? $user_details['skills'] : ''; ?>">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="exampleInputEmail1" style="font-weight: bold;">Rate</label>
                                    <input type="text" name="user_rate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Hourly Rate" value="<?php echo isset($user_details['rate']) ? $user_details['rate'] : ''; ?>">
                                </div>
                                <div class="form-group mt-2">
                                    <label for="exampleInputPassword1" style="font-weight: bold;">Experience</label>
                                    <input type="number" name="user_experience" class="form-control" id="mypass" placeholder="Enter Your Experience" value="<?php echo isset($user_details['experience']) ? $user_details['experience'] : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white text-center">
                            <?php if (isset($user_details) && !empty($user_details)) { ?>
                                <button type="submit" name="update" class="btn btn-primary" id="submit-btn">Update</button>
                            <?php } else { ?>
                                <button type="submit" name="submit" class="btn btn-primary" id="submit-btn">Submit</button>
                            <?php } ?>
                            <button type="reset" class="btn btn-secondary" id="cancel-btn">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include'footer.php' ?>
</body>
</html>
