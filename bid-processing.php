<?php
session_start();
include 'dbconfig.php';

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $user_info = "SELECT * FROM user WHERE user_email='" . $_SESSION['username'] . "'";
    $user_result = mysqli_query($conn, $user_info);

    if ($user_result && mysqli_num_rows($user_result) > 0) {
        while ($user = mysqli_fetch_assoc($user_result)) {
            $freelancer_id = $user['user_id'];
            $freelancer_name = $user['user_name'];
            // After setting $freelancer_name, store it in the session variable
            $_SESSION['freelancer_name'] = $freelancer_name;

            $freelancer_email = $user['user_email'];
            $freelancer_mobile = $user['user_mobile'];
            
        }
    }
}

if (isset($_POST['submit'])) {
    $proposal = $_POST['proposal'];
    $days = $_POST['days'];
    $amount = $_POST['amount'];
    $project_id = $_POST['project_id'];
    $client_id = $_POST['client_id'];

    if (empty($proposal) || empty($amount) || empty($days)) {
        echo '<script>alert("Please enter all the information.")</script>';
    }
    else
    {
        $sql = "INSERT INTO new_bidding (freelancer_id, freelancer_name, freelancer_email, freelancer_mobile, Proposal, amount, complete_days, project_id, client_id) VALUES ('$freelancer_id','$freelancer_name', '$freelancer_email', '$freelancer_mobile', '$proposal', '$amount', '$days','$project_id','$client_id')";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Your bid has been placed Successfully")</script>';
            echo '<script>window.location = "get_job.php";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FREELANCEWAVE : Get Job</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bidModal">Place Bid</button>
    <div class="modal" id="bidModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="font-weight-bold modal-title">Place a Bid on this Project</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <small style="font-style: italic;float: right;">Project ID: <?= $_SESSION['project_id']; ?></small>
                    <small style="font-style: italic;float: right;">&nbsp;Client ID: <?= $_SESSION['client_id']; ?></small>

                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="bidFormSubmit">
                        <div class="form-group">
                            <label class="mt-2 font-weight-bold" for="bidAmount">Name</label>
                            <input type="text" id="bidAmount" value="<?= $freelancer_name; ?>" name="name" class="form-control" disabled>
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
</body>

</html>
