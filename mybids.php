<?php
include 'nav.php';
include 'dbconfig.php';

if (isset($_SESSION['username']))
{
    $username = $_SESSION['username'];

    // Retrieve user information from the user table
    $user_query = "SELECT * FROM user WHERE user_email='$username'";
    $user_result = mysqli_query($conn, $user_query);

    if ($user_result && mysqli_num_rows($user_result) > 0)
    {
        $user = mysqli_fetch_assoc($user_result);
        $user_id = $user['user_id'];

        // Retrieve user bidding information from the database using user_id
        $bidding_query = "SELECT * FROM new_bidding WHERE freelancer_id='$user_id'";
        $bidding_result = mysqli_query($conn, $bidding_query);

        if ($bidding_result && mysqli_num_rows($bidding_result) > 0)
        {
            while ($bidding = mysqli_fetch_assoc($bidding_result))
            {
                $bidding_id = $bidding['bid_id'];
                $project_id = $bidding['project_id'];
                $user_name = $bidding['freelancer_name'];
                $user_email = $bidding['freelancer_email'];
                $user_mobile = $bidding['freelancer_mobile'];
                $freelancer_id = $bidding['freelancer_id'];
                $status = $bidding['status'];

                // Retrieve project information from the projects table
                $project_info_query = "SELECT * FROM projects WHERE project_id='$project_id'";
                $project_info_result = mysqli_query($conn, $project_info_query);

                if ($project_info_result && mysqli_num_rows($project_info_result) > 0)
                {
                    $project = mysqli_fetch_assoc($project_info_result);
                    $project_title = $project['project_title'];
                    $project_description = $project['project_description'];
                    $project_skills = $project['project_skills'];
                    $project_days = $project['project_days'];
                    $project_price = $project['project_price'];
                    $project_file = $project['project_file'];
                    ?>
                    <body class="bg-light">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="card bg-white mt-3">
                                        <div class="card-header bg-white">
                                            <h3 class="mt-2 font-weight-bold"><?= $project_title ?></h3>
                                            <small style="font-style: italic;float: right;">Project id : <?php echo $project_id ?></small>
                                        </div>
                                        <div class="card-body bg-white">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p>
                                                        <h6 class="font-weight-bold">Required Skills:</h6>
                                                        <span style="color: blue"><?= $project_skills ?></span>
                                                    </p>
                                                    <p>
                                                        <h6 class="font-weight-bold">Within Days:</h6>
                                                        <span style="color: blue"><?= $project_days ?></span>
                                                    </p>
                                                    <p>
                                                        <h6 class="font-weight-bold">Project Amount:</h6>
                                                        <span style="color: blue"><?= $project_price ?></span>
                                                    </p>
                                                </div>
                                                <div class="col-md-8">
                                                    <p>
                                                        <h6 class="font-weight-bold">Project Description:</h6>
                                                        <span><?= ucwords($project_description) ?></span>
                                                    </p>
                                                    <p>
                                                        <h6 class="font-weight-bold">Attachment:</h6>
                                                        <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                        <a href="<?= $project_file ?>" style="color: blue" target="_blank"><?= $project_file ?></a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php if ($status == 1) { ?>
                                            <div class="card-footer">
                                                <h5 class="font-weight-bold">Your bid has been confirmed by the client.</h5>
                                            </div>
                                        <?php } else { ?>
                                            <div class="card-footer bg-white">
                                                <a href="delete_bid.php?bid_id=<?= $bidding_id ?>">
            <button class="btn btn-danger" type="submit">Delete</button>
        </a>
                                                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>

                    <?php
                    }
                    else
                    {
                        echo "<p>Project information not found.</p>";
                    }
                }
            }
            else
            {
                echo '<div class="container"><div class="row mt-5 text-center"><div class="col-md-12"><h3 class="font-weight-bold">No bid found. Please Place Your Bid</h3></div></div></div>';
            }
        }
        else
        {
            echo "<p>User information not found.</p>";
        }
    }
    else
    {
        echo "<p>User session not found.</p>";
    }
?>

<?php include'footer.php'; ?>
