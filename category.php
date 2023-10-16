<?php include'../dbconfig.php' ?>

<?php include 'admin-nav.php' ?>

<head>
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
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center bg-white">
                        <h2 class="font-weight-bold text-center">Add Category</h2>
                    </div>
                    <div class="card-body form-group">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <label for="cardholder_name">Enter Category Name :</label>
                            <input class="form-control" type="text" id="cardholder_name" name="category_name" placeholder="Enter category name" required><br><br>

                            <button type="submit" class="btn btn-success" name="submit">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <?php
                    include '../dbconfig.php';

                    // Create a query to retrieve data from the "category" table
                    $query = "SELECT * FROM category";

                    // Execute the query
                    $result = $conn->query($query);
                ?>

                <table class="table mt-5 p-5">
                    <tr class="font-weight-bold">
                        <td>Sr.No.</td>
                        <td>Category ID</td>
                        <td>Category Title</td>
                        <td>Operation</td>
                    </tr>
                    <?php
                        $n = 1;
                        while ($r = mysqli_fetch_array($result))
                        {
                            extract($r);
                    ?>
                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?= $category_id ?></td>
                            <td><?= $category_name ?></td>
                            <td> 
                                <a href="delete_category.php?category_id=<?= $category_id ?>">
                                    <div>
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    <?php
                            $n++;
                        }

                        
                    ?>
                    <tr>
                        <td colspan="4" class="text-right font-weight-bold">Total Categories: <?php echo $n - 1; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

<?php
    if (isset($_POST['submit']))
    {
        $category_name = $_POST['category_name'];

        // Construct the SQL query
        $sql = "INSERT INTO category (category_name) VALUES ('$category_name')";

        // Execute the query
        if (mysqli_query($conn, $sql))
        {
            echo "Category inserted successfully.";
        }
        else
        {
            echo "Error: " . mysqli_error($conn);
        }
    }
?>
