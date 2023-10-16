<?php include 'client-nav.php'; ?>
<?php include 'dbconfig.php'; ?>

<?php
if (isset($_GET['bid_id']))
{
    $bid_id = $_GET['bid_id'];

    // Update the bid status to 1 (confirmed) in the database
    $update_query = "UPDATE new_bidding SET status = 1 WHERE bid_id = '$bid_id'";
    $update_result = mysqli_query($conn, $update_query);

    if ($update_result) {
        // Bid confirmation successful
        echo "Bid confirmed successfully.";
    } else {
        // Bid confirmation failed
        echo "Failed to confirm bid.";
    }
}

// Retrieve user bidding information from the database
$bidding_query = "SELECT *
                  FROM bidding
                  INNER JOIN projects ON bidding.project_id = projects.project_id
                  INNER JOIN user ON bidding.user_id = user.user_id
                  WHERE bidding.user_id = '" . $_SESSION['user_id'] . "'";
$bidding_result = mysqli_query($conn, $bidding_query);

if ($bidding_result && mysqli_num_rows($bidding_result) > 0) {
    // Display the user bidding list
    while ($bidding = mysqli_fetch_assoc($bidding_result)) {
        // Access the bidding details
        $bidding_id = $bidding['bid_id'];
        $project_id = $bidding['project_id'];
        $project_title = $bidding['project_title'];
        $user_id = $bidding['user_id'];
        $user_name = $bidding['user_name'];
        $user_email = $bidding['user_email'];
        $user_mobile = $bidding['user_mobile'];

        // Display the user and project information
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="mt-2 font-weight-bold">Pending Bids</h3>
                            </div>
                            <div class="card-body bg-light">
                                <p>Project ID: <?= $project_id ?></p>
                                <p>Project Title: <?= $project_title ?></p>
                                <p>User Id: <?= $user_id ?></p>
                                <p>User Name: <?= $user_name ?></p>
                                <p>User Email: <?= $user_email ?></p>
                                <p>User Mobile: <?= $user_mobile ?></p>
                            </div>
                            <div class="card-header">
                                <a href="confirm_biddings.php?bid_id=<?= $bidding_id ?>">
                                    <button class="btn btn-warning">Confirm</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No bids found.</p>";
}
?>
