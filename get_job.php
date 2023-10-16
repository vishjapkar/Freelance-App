<?php include 'nav.php'; ?>
<?php include 'dbconfig.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $user_info = "SELECT user_id, user_name FROM user WHERE user_email='" . $_SESSION['username'] . "'";
    $user_result = mysqli_query($conn, $user_info);

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        while ($user = mysqli_fetch_assoc($user_result)) {
            $user_id = $user['user_id'];
            $user_name = $user['user_name'];
        }
    }

    include 'dbconfig.php';

    // Create a query to retrieve data from the "projects" table
    $query = "SELECT * FROM projects";

    // Execute the query
    $result = $conn->query($query);
}
?>

<style type="text/css">
    .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
    }

    .job-info:hover{
        cursor: pointer;
        background-color: #f8f9fa;
    }
</style>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mt-3">
                    <div class="card-header text-center bg-white font-weight-bold">Categories</div>
                    <div class="card-body">
                        <?php include 'Admin/category_display.php'; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <?php
                    include 'dbconfig.php';

                    // Check if the "show_all" parameter is set and true
                    if (isset($_GET['show_all']) && $_GET['show_all'] === 'all')
                    {
                        $query = "SELECT * FROM projects";
                    }
                    else
                    {
                        // Check if the "category_id" parameter is set
                        if (isset($_GET['category_id']))
                        {
                            $category_id = $_GET['category_id'];
                    $query = "SELECT * FROM projects WHERE category_id = '$category_id'";
                        }
                        else
                        {
                            // No category or show_all parameter, handle the desired behavior
                            $query = "SELECT * FROM projects";

                        }
                    }

                    $result = $conn->query($query);

                    while ($r = mysqli_fetch_array($result))
                    {
                        extract($r);
                        if ($client_id != $user_id) {
                            $_SESSION['project_id'] = $project_id;
                            $_SESSION['client_id'] = $client_id;

                            // Check if the status in new_bidding table is equal to 0
                            $check_status_query = "SELECT status FROM new_bidding WHERE project_id = '$project_id'";
                            $status_result = $conn->query($check_status_query);
                            if ($status_result && $status_result->num_rows > 0)
                            {
                                $status_row = mysqli_fetch_assoc($status_result);
                                $status = $status_row['status'];

                                if ($status == 1)
                                {
                                    $bidButtonDisabled = "disabled";
                                }
                                else
                                {
                                    $bidButtonDisabled = "";
                                }
                            }
                            else
                            {
                                $bidButtonDisabled = "";
                            }
                        ?>
                        <div class="card job-info mt-3">
                            <div class="card-header bg-white">
                                <h3 class="mt-2 font-weight-bold"><?= $project_title ?></h3>
                                <small style="font-style: italic;">Project ID: <?= $project_id ?></small>&nbsp;&nbsp;
                                <small style="font-style: italic;float: right;">Client ID: <?= $client_id ?></small>
                            </div>
                            <div class="card-body bg-white">
                                <div class="row p-3">
                                    <div class="col-md-6">
                                        <p>
                                            <h6 class="font-weight-bold">Required Skills:</h6>
                                            <span style="color: blue"><?= $project_skills ?></span>
                                        </p>
                                        <p style="float:right;">
                                            <h6 class="font-weight-bold">Within Days:</h6>
                                            <span style="color: blue"><?= $project_days ?></span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <h6 class="font-weight-bold">Project Amount:</h6>
                                            Rs. <span style="color: blue"><?= $project_price ?></span>
                                        </p>
                                        <p>
                                            <h6 class="font-weight-bold">Attachment:</h6>
                                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                                            <a href="<?= $project_file ?>" style="color: blue" target="_blank"><?= $project_file ?></a>
                                        </p>
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col-md-12">
                                        <p class="p-3">
                                            <h6 class="font-weight-bold">Project Details:</h6>
                                            <?= ucwords($project_description) ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <div>
                                    <button type="button" class="ml-3 btn btn-primary" data-toggle="modal" data-target="#bidModal<?= $project_id ?>" <?= $bidButtonDisabled; ?>>Place Bid</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modal for placing bid -->
                        <div class="modal" id="bidModal<?= $project_id ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="font-weight-bold modal-title">Place a Bid on this Project</h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <small style="font-style: italic;float: right;">Project ID: <?= $project_id ?></small>
                                        <small style="font-style: italic;float: right;">&nbsp;Client ID: <?= $client_id ?></small>

                                        <form action="bid-processing.php" method="POST" id="bidFormSubmit">
                                            <div class="form-group">
                                                <label class="mt-2 font-weight-bold" for="bidAmount">Name</label>
                                                <input type="text" id="bidAmount" value="<?php echo $user_name; ?>" name="name" class="form-control" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="mt-2 font-weight-bold" for="bidComment">Describe Your Proposal</label>
                                                <textarea id="bidComment" name="proposal" class="form-control" placeholder="Write Your Proposal ...."></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="bidDays">Days To Complete:</label>
                                                        <input type="number" id="bidDays" name="days" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="bidAmount">Bid Amount:</label>
                                                        <input type="number" id="bidAmount" name="amount" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="project_id" value="<?= $_SESSION['project_id']; ?>">
                                            <input type="hidden" name="client_id" value="<?= $_SESSION['client_id']; ?>">
                                            <button type="submit" name="submit" class="btn btn-primary">Submit Bid</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
       </div>
    </div>

    
    <?php include('footer.php') ?>
</body>
