

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
</head>



<?php
include '../dbconfig.php';

// Create a query to retrieve data from the "projects" table
$query = "SELECT * FROM user";

// Execute the query
$result = $conn->query($query);
?>

<div class="container">
	<h3 class="font-weight-bold text-center p-3">User Details</h3>
	<div class="row">
		<div class="table">
			<table class="border" border="1">
				<thead>
					<tr>
						<th>Sr. No</th>
						<th>User Id</th>
						<th>Name</th>
						<th>Email</th>
						<th>Mobile</th>
						<th>Address</th>
						<th>Operation</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n = 1;
					while ($r = mysqli_fetch_array($result)) {
						extract($r);
					?>
						<tr>
							<td><?php echo $n; ?></td>
							<td><?= $user_id ?></td>
							<td><?= $user_name ?></td>
							<td><?= $user_email ?></td>
							<td><?= $user_mobile ?></td>
							<td><?= $user_address ?></td>
							<td>
								<a href="delete-user.php?user_id=<?= $user_id ?>">
									<button class="btn btn-danger" type="submit">Delete User</button>
								</a>
							</td>
						</tr>
					<?php
						$n++;
					}
					// Close the connection (optional)
					$conn->close();
					?>

					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><h4 class="font-weight-bold">Total Users  </h4></td>
						<td class="font-weight-bold"><h4 class="font-weight-bold"><?php echo $n - 1; ?></h4>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
