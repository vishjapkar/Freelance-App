

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
$query = "SELECT * FROM new_bidding";

// Execute the query
$result = $conn->query($query);
?>


	


<div class="container">
	<h3 class="mt-5 text-center font-weight-bold">Biddding Details</h3>
	<table class="table bg-white mt-5" border="1">

		
			<tr class="font-weight-bold">
				<th>Bid ID</th>
				<th>Project ID</th>
				<th>Client ID</th>
				<th>Freelancer ID</th>
			</tr>
		
	
		<?php
			while ($r = mysqli_fetch_array($result))
			{
				extract($r);
		?>
		

			<tr>
				<td><?= $bid_id ?></td>
				<td><?= $project_id ?></td>
				<td><?= $client_id ?></td>
				<td><?= $freelancer_id ?></td>
				<td>
					<a href="delete_bid.php?bid_id=<?= $bid_id ?>">
			            <div>
			                <button class="btn btn-danger" type="submit">Delete Bidding</button>
			            </div>
			        </a>
			    </td>
			</tr>		
		<?php
			
			}

		// Close the connection (optional)
		$conn->close();
	?>	
	</table>
</div>
