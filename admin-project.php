

<?php 
error_reporting(error_reporting() & ~E_WARNING); // It does not show the warning messages
include'admin-nav.php' ?>

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
</head>
	<?php
		include '../dbconfig.php';

		// Create a query to retrieve data from the "projects" table
		$query = "SELECT * FROM projects";

		// Execute the query
		$result = $conn->query($query);

		if ($result->num_rows > 0)
		{
		    // Fetch the first row from the result set
		    $row = $result->fetch_assoc();

		    // Retrieve the value of the "category_id" column
		    $cat_id = $row['category_id'];

		    // Output the category_id value
		    
		} else {
		    echo 'No Categories found';
		}

		$query = "SELECT category_name FROM category WHERE category_id = $cat_id";

		// Execute the query
		$result1 = $conn->query($query);

		if ($result1->num_rows > 0)
		{
		    // Fetch the first row from the result set
		    $row = $result1->fetch_assoc();

		    // Retrieve the value of the "category_id" column
		    $category_name = $row['category_name'];

		    // Output the category_id value
		    
		} else {
		    echo 'No Categories found';
		}
	?>

<div class="container">
	<h3 class="font-weight-bold text-center p-3">Project Details</h3>
	<div class="row">
		<table class="table">
			<tr class="font-weight-bold">
				<td>Sr.No.</td>
				<td>Project ID</td>
				<td>Project Title</td>
				<td>Project Category</td>
				<td>Client Id</td>
				<td>Required Skills</td>
				<td>Price</td>
				<td>Description</td>
				<td>Days</td>
				<td>Operation</td>
			</tr>
			<?php
			$n = 1;
			while ($r = mysqli_fetch_array($result)) {
				extract($r);

				$query = "SELECT category_name FROM category WHERE category_id = $category_id";
				$resultdemo = $conn->query($query);

				if ($resultdemo->num_rows > 0) {
					$row = $resultdemo->fetch_assoc();
					$category_name = $row['category_name'];
				} else {
					$category_name = 'No Category found';
				}
				?>
				<tr>
					<td><?php echo $n; ?></td>
					<td><?= $project_id ?></td>
					<td><?= $project_title ?></td>
					<td><?= $category_name ?></td>
					<td><?= $client_id ?></td>
					<td><?= $project_skills ?></td>
					<td><?= $project_price ?></td>
					<td><?= ucwords($project_description) ?></td>
					<td><?= $project_days ?></td>
					<td>
						<a href="delete_project.php?project_id=<?= $project_id ?>">
				            <div>
				                <button class="btn btn-danger" type="submit">Delete</button>
				            </div>
					    </a>
					</td>
				</tr>

			<?php
				$n++;
				}
				$conn->close();
			?>
			<tr>
				<td colspan="2" class="text-right font-weight-bold">Total Projects : <?php echo $n - 1; ?></td>
			</tr>
		</table>
	</div>
</div>

