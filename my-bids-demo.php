<?php include 'nav.php'; ?>
<?php include 'dbconfig.php'; ?>

<?php
// Retrieve bidding information from the database
$bidding_query = "SELECT * FROM new_bidding WHERE freelancer_email = '" . $_SESSION['username'] . "'";
$bidding_result = mysqli_query($conn, $bidding_query);

if ($bidding_result && mysqli_num_rows($bidding_result) > 0) {
    // Display the bidding list
    while ($bidding = mysqli_fetch_assoc($bidding_result)) {
        // Access the bidding details
        $bidding_id = $bidding['bid_id'];
        $project_id = $bidding['project_id'];
        $status = $bidding['status'];
        $work_file = $bidding['completed_work_file'];

        // Retrieve project details from the database
        $project_query = "SELECT * FROM projects WHERE project_id = '$project_id'";
        $project_result = mysqli_query($conn, $project_query);

        if ($project_result && mysqli_num_rows($project_result) > 0) {
            // Fetch the project details
            $project = mysqli_fetch_assoc($project_result);

            // Access the project information
            $project_title = $project['project_title'];
            $project_skills = $project['project_skills'];
            $project_price = $project['project_price'];
            $project_description = $project['project_description'];
            $project_days = $project['project_days'];
            $project_file = $project['project_file'];

            // Display the project information
            ?>


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
            <body class="bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="card mt-3">
                    <?php if($status==1){ ?><!-- To print only those bids that has status = 1 as confirmed bids-->

                    <!-- To check progress of project start -->
                    <?php if(file_exists($work_file)) { ?>
                        <marquee behavior="alternate"><h3 class="mt-2 font-weight-bold text-danger">Project Work is completed</h3></marquee>
                    
                    <?php } else { ?>
                        <marquee behavior="alternate"><h3 class="mt-2 font-weight-bold text-success">Project Work is in progress</h3></marquee>
                    <?php } ?>
                    <!-- To check progress of project end -->

                    <div class="card-header bg-white">
                        <h3 class="font-weight-bold"><?= $project_title ?></h3>
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

                        <hr>
                        <?php if(file_exists($work_file)){ ?>
                            <div class="row">
                                <h5 class="ml-3 font-weight-bold">Uploaded File :&nbsp;</h5><a href="<?= $work_file ?>" style="color: blue" target="_blank"><?= $work_file ?></a>
                            </div>
                        <?php } else { ?>

                        <!-- File upload by freelancer - Start -->
                        <hr>
                        
                        <form action="my-bids-demo.php" method="post" enctype="multipart/form-data">
                            <h5 class="font-weight-bold">Upload Completed Work File</h5>
                            <div class="row">
                                <div class="col-md-10">
                                    <input class="form-control" type="file" name="work_file">
                                    <input type="hidden" name="project_id" value="<?= $pro_id ?>">
                                    <!-- Assuming you have the freelancer_id stored in $freelancer_id -->
                                    <input type="hidden" name="freelancer_id" value="<?= $freelancer_id ?>">
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-outline-success" name="submit" type="submit">Upload File</button>
                                </div>   
                            </div>
                        </form>
                    <?php } ?>

<?php
include('dbconfig.php');

if (isset($_POST['submit'])) {
    $targetDirectory = "uploads/";

    // Assuming you have the freelancer_id stored in $freelancer_id
    $freelancer_id = $_POST['freelancer_id'];
    $pro_id = $_POST['project_id'];
    $work_file = $_FILES['work_file']['name'];
    $work_file_tmp = $_FILES['work_file']['tmp_name'];

    // Check if a file was uploaded
    if (empty($work_file)) {
        echo '<script>alert("Please select a file to upload")</script>';
        echo '<script>window.location = "my-bids-demo.php";</script>';
        exit();
    }

    // Move the uploaded file to the target directory
    $uploadFilePath = $targetDirectory . basename($work_file);

    if (move_uploaded_file($work_file_tmp, $uploadFilePath)) {
        // Update the completed_work_file for the specific project_id and freelancer_id
        $sql = "UPDATE new_bidding SET completed_work_file = '$uploadFilePath' WHERE bid_id = '$bidding_id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Your file has been uploaded successfully")</script>';
            echo '<script>window.location = "my-bids-demo.php";</script>';
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
        echo '<script>window.location = "my-bids-demo.php";</script>';
        exit();
    }
}
?>



                         <!-- File upload by freelancer - End -->

                    </div>
                <?php }  ?>
                </div>
            </div>
            <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
else
{
    echo '<div class="container"><div class="row mt-5 text-center"><div class="col-md-12"><h3 class="font-weight-bold">No work found. Please Place Your Bid.</h3></div></div></div>';
}
?>

<?php include('footer.php'); ?>