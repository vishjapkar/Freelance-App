<?php
    include 'client-nav.php';
    include 'dbconfig.php';

    if (isset($_SESSION['username']))
    {
        // Retrieve user bidding information from the database
        $bidding_query = "SELECT * FROM new_bidding WHERE client_id='" . $_SESSION['user_id'] . "'";

        $bidding_result = mysqli_query($conn, $bidding_query);

        if ($bidding_result && mysqli_num_rows($bidding_result) > 0)
        {
            while ($bidding = mysqli_fetch_assoc($bidding_result))
            {
                $bidding_id = $bidding['bid_id'];
                $project_id = $bidding['project_id'];
                $user_id = $bidding['freelancer_id'];
                $user_name = $bidding['freelancer_name'];
                $user_email = $bidding['freelancer_email'];
                $user_mobile = $bidding['freelancer_mobile'];
                $client_id = $_SESSION['user_id'];
                $complete_days = $bidding['complete_days'];
                $proposal = $bidding['proposal'];
                $amount = $bidding['amount'];
                $status = $bidding['status'];

                // Retrieve project title from the projects table
                $project_info_query = "SELECT project_title FROM projects WHERE project_id='$project_id' AND client_id='$client_id'";
                $project_info_result = mysqli_query($conn, $project_info_query);

                if ($project_info_result) {
                    if (mysqli_num_rows($project_info_result) > 0) {
                        $project_title = mysqli_fetch_assoc($project_info_result)['project_title'];
                    } else {
                        $project_title = "Not available"; // Set a default value if no rows are returned
                    }
                } else {
                    // Handle the case when the project info query fails
                    $project_title = "Not available"; // Set a default value in case of an error
                    echo "Error executing project_info_query: " . mysqli_error($conn);
                }

            ?>

            <body class="bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-1"></div>

                            <?php if($status==1){ ?>
                                <!-- This is for bid has been confirmed, therefore any information not shown here.-->
                            <?php
                                }
                                else
                                    { 
                            ?>

                            <!-- Project Details Show Start Here -->
                            <div class="col-md-11">
                                <div class="card p-3 mt-3">
                                    <div class="card-header bg-white">
                                        <?php if ($project_title !== null) { ?>
                                            <h3 class="mt-2 font-weight-bold"><?= $project_title ?>
                                            </h3>
                                            <?php } else { ?>
                                                <p>Project Title: Not available</p>
                                            <?php } ?>
                                        <small style="font-style: italic;">Project Id : <?php echo $project_id ?></small>&nbsp;&nbsp;
                                        <small style="float: right;" class="font-weight-bold">Freelancer Id : <?php echo $user_id ?></small>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">           
                                            <p>
                                                <h6 class="font-weight-bold">Freelancer Name :</h6>
                                                <span style="color: blue"><?= $user_name ?></span>
                                            </p>
                                            <p>
                                                <h6 class="font-weight-bold">Freelancer Email :</h6>
                                                <span style="color: blue"><?= $user_email ?></span>
                                            </p>                                       
                                            <p>
                                                <h6 class="font-weight-bold">Freelancer Mobile :</h6>
                                                <span style="color: blue"><?= $user_mobile ?></span>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <h4 class="font-weight-bold">Bid Amount : ₹
                                                <?= $amount ?> INR</h4>
                                            </p>
                                            <p>
                                                <h6 class="font-weight-bold">Delivered Within Days :</h6>
                                                <span style="color: blue"><?= $complete_days ?></span>
                                            </p>
                                            <hr>
                                            <h6>
                                                <p>
                                                    <h6 class="font-weight-bold">Project Proposal :</h6>
                                                    <span><?= ucwords($proposal) ?></span>
                                                </p>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="confirm_biddings.php?bid_id=<?= $bidding_id ?>">
                                            <button class="btn btn-warning">Confirm</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                            <!-- Project Details Show End Here -->
                        </div>
                    </div>
                </div>

    <?php
        }
    }
    else
    {
        echo '<div class="container"><div class="row mt-5 text-center"><div class="col-md-12"><h3 class="font-weight-bold">No bids found yet or No Pending Bids.</h3></div></div></div>';
    }
} else {
    echo "<p>User session not found.</p>";
}
?>



</div>

<?php include 'footer.php'?>

