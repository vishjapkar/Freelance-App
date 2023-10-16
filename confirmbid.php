

<?php
error_reporting(error_reporting() & ~E_WARNING); // It does not show the warning messages
include 'client-nav.php';
include 'dbconfig.php';
?>

<body class="bg-light">

    <h3 class="m-5 text-center font-weight-bold">Confirmed Bids</h3>
    <div class="mt -3 container bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class=" mt-3">

                        

                        <div class="bg-white">
                            <table class="table">
                                <thead class="font-weight-bold">
                                    <tr class="p-3">
                                        <th>Project Id</th>
                                        <th>Project Title</th>
                                        <th>Freelancer Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Amount</th>
                                        <th>Delivered Within Days</th>
                                        <th>Project Completed File</th>
                                        <th>Make Payment</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        // Retrieve user bidding information from the database
                                        $bidding_query = "SELECT * FROM new_bidding WHERE status=1 AND client_id='" . $_SESSION['user_id'] . "'";
                                        $bidding_result = mysqli_query($conn, $bidding_query);

                                        if ($bidding_result && mysqli_num_rows($bidding_result) > 0) {
                                            while ($bidding = mysqli_fetch_assoc($bidding_result)) {
                                                $bidding_id = $bidding['bid_id'];
                                                $project_id = $bidding['project_id'];
                                                $user_id = $bidding['freelancer_id'];
                                                $user_name = $bidding['freelancer_name'];
                                                $user_email = $bidding['freelancer_email'];
                                                $user_mobile = $bidding['freelancer_mobile'];
                                                $client_id = $_SESSION['user_id'];
                                                $complete_days = $bidding['complete_days'];
                                                $amount = $bidding['amount'];
                                                $work_file = $bidding['completed_work_file'];

                                                // Retrieve project title from the projects table
                                                $project_info_query = "SELECT project_title FROM projects WHERE project_id='$project_id' AND client_id='$client_id'";
                                                $project_info_result = mysqli_query($conn, $project_info_query);
                                                $project_title = mysqli_fetch_assoc($project_info_result)['project_title'];
                                    ?>

                                                <tr>
                                                    <td><?= $project_id; ?></td>
                                                    <td><?= $project_title; ?></td>
                                                    <td><?= $user_name; ?></td>
                                                    <td><?= $user_email; ?></td>
                                                    <td><?= $user_mobile; ?></td>
                                                    <td><?= $amount; ?></td>
                                                    <td><?= $complete_days; ?></td>
                                                    <td>
                                                        <a href="<?= $work_file ?>" style="color: blue" target="_blank"><?= $work_file ?></a>
                                                    </td>
                                                    <td>
                                                        <a href="payment.php?bid_id=<?= $bidding_id ?>&project_title=<?= $project_title ?>&client_id=<?= $client_id ?>&user_name=<?= $user_name ?>&amount=<?= $amount ?>">
                                                            <button class="btn btn-outline-success" type="submit">Payment</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                    <?php
                                            }
                                        } else {
                                            echo '<tr><td colspan="9" class="text-center font-weight-bold">No bids found yet.</td></tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="9" class="text-center font-weight-bold">User session not found.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
