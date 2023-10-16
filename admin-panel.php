

<?php include'admin-nav.php' ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Here</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style type="text/css">
        .card{
            width: 250px;
            height: 190px;
            border-radius: 50px;
            margin-top: 15px;
        }
        .card{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.1);
        }
        .card:hover{
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>

<!-- Project Details -->
<?php include '../dbconfig.php';


    $pro_info = "SELECT * FROM projects";
    $pro_result = mysqli_query($conn, $pro_info);
    if ($pro_result && mysqli_num_rows($pro_result) > 0) {
        $total_projects = mysqli_num_rows($pro_result);
    }
    else{
        echo '<h3 class="font-weight-bold text-center"></h3>';
    }

    $cat_info = "SELECT * FROM category";
    $cat_result = mysqli_query($conn, $cat_info);
    if ($cat_result && mysqli_num_rows($cat_result) > 0) {
        $total_categories = mysqli_num_rows($cat_result);
    }
    else{
        echo '<h3 class="font-weight-bold text-center"></h3>';
    }

    $user_info = "SELECT * FROM user";
    $user_result = mysqli_query($conn, $user_info);
    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $total_users = mysqli_num_rows($user_result);
    }
    else{
        echo '<h3 class="font-weight-bold text-center"></h3>';
    }

    $bid_info = "SELECT * FROM user";
    $bid_result = mysqli_query($conn, $bid_info);
    if ($bid_result && mysqli_num_rows($bid_result) > 0) {
        $total_bids = mysqli_num_rows($bid_result);
    }
    else{
        echo '<h3 class="font-weight-bold text-center"></h3>';
    }

?>

<div class="container p-5">
    <div class="row mt-3">
        <div style="">
            <h1 class="col-md-12 font-weight-bold">Welcome,<br><?php echo $_SESSION['admin_name']; ?></h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card bg-danger">
                <div class="card-body text-center text-white">
                    <img src="../Images/layers.png" style="height:60px;width: 60px;">
                    <h3 class="font-weight-bold text-center mt-2">Projects</h3>
                    <h3 class="font-weight-bold text-center"><?= $total_projects;?></h3>
                </div>
            </div> 
        </div>
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body text-center text-white">
                    <img src="../Images/people.png" style="height:60px;width: 60px;">
                    <h3 class="font-weight-bold text-center mt-2">Users</h3>
                    <h3 class="font-weight-bold text-center"><?= $total_users;?></h3>
                </div>
            </div> 
        </div>
        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-body text-center text-white">
                    <img src="../Images/bid.png" style="height:60px;width: 60px;">
                    <h3 class="font-weight-bold text-center mt-2">Bidding</h3>
                    <h3 class="font-weight-bold text-center"><?= $total_bids;?></h3>
                </div>
            </div> 
        </div>
        <div class="col-md-3">
            <div class="card bg-primary">
                <div class="card-body text-center text-white">
                    <img src="../Images/options-lines.png" style="height:60px;width: 60px;">
                    <h3 class="font-weight-bold text-center mt-2">Category</h3>
                    <h3 class="font-weight-bold text-center"><?= $total_categories;?></h3>
                </div>
            </div> 
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="text-center">
            <a href="../index.php" style="text-decoration:none">
            <h5 class="mt-4 mb-1 text-center font-weight-bold"><i class="fa fa-home" aria-hidden="true"></i> Go to Home Page</h5></a>
        </div>
        </div>
    </div>
</div>


  


