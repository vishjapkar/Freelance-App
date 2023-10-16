<?php
include 'client-nav.php'; // Start the session

include 'dbconfig.php';

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo "User not logged in";
    exit;
}

$username = $_SESSION['username'];

// Retrieve user details from the database
$query = "SELECT user_id, user_name FROM user WHERE user_email='$username'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userId = $row['user_id'];
    $userName = $row['user_name'];

    // Store the user ID in a session variable
    $_SESSION['user_id'] = $userId;
    $_SESSION['user_name'] = $userName;

    // Create a query to retrieve projects for the client
    $projectQuery = "SELECT * FROM projects WHERE client_id='$userId'";
    $projectResult = mysqli_query($conn, $projectQuery);

    // Check if projects were found for the client
    if ($projectResult && mysqli_num_rows($projectResult) > 0) {
        ?>
        <body class="bg-light">
        <div class="container">
            <div class="row">
                <?php
                while ($r = mysqli_fetch_array($projectResult)) {
                    extract($r);
                    ?>
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card mt-3">
                            <div class="card-header bg-white">
                    <h3 class="mt-2 font-weight-bold"><?= $project_title ?></h3>
                    <small style="font-style: italic;">Project id : <?php echo $project_id ?></small>&nbsp;&nbsp;
                    <small style="font-style: italic;float: right;">Client id : <?php echo $client_id ?>Me</small>
                </div>
                <!-- <div class="card-header bg-white">
                    <h3 class="mt-2 font-weight-bold">Client ID : <span style="color: black;"><?= $client_id ?></span></h3>
                </div> -->
                <div class="card-body bg-white">
                    <p>
                        <h6 class="font-weight-bold">Require Skills :</h6>
                        <span style="color: blue"><?= $project_skills ?></span>
                    </p>
                    <p style="float:right;">
                        <h6 class="font-weight-bold">Within Days :</h6>
                        <span style="color: blue"><?= $project_days ?></span>
                    </p>
                    <p>
                        <h6 class="font-weight-bold">Project Amount :</h6>
                        Rs. <span style="color: blue"><?= $project_price ?></span>
                    </p>
                    <p>
                        <h6 class="font-weight-bold">Project Details :</h6>
                        <span ><?= ucwords($project_description) ?></span>
                    </p>
                    <p>
                        <h6 class="font-weight-bold">Attachment:</h6>
                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                        <a href="<?= $project_file ?>" style="color: blue" target="_blank"><?= $project_file ?></a>
                    </p>      
                </div>
                <div class="card-footer bg-white">
                    <div>
                        
                        <a href="delete.php?project_id=<?= $project_id ?>">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    } else {
        // No projects found for the client
        echo '<div class="container"><div class="row mt-5 text-center"><div class="col-md-12"><h3 class="font-weight-bold">You have not uploaded any projects yet.</h3></div></div></div>';
    }
}
else
{
    // User ID not found in the database
    echo "User ID not found in the database";
}

// Close the database connection
$conn->close();
?>

<?php include('footer.php'); ?>
