<?php include'admin-nav.php';
	  include '../dbconfig.php';

// Create a query to retrieve data from the "projects" table
$query = "SELECT * FROM enquiry";

// Execute the query
$result = $conn->query($query);
?>




<div class="container">

	<h3 class="font-weight-bold text-center p-3">Enquiry Details</h3>
	<div class="row">


		<table class="table">
			
				<tr class="font-weight-bold">
					<td>Enquiry ID</td>
					<td>Name</td>
					<td>Mobile</td>
					<td>Email</td>
					<td>Query</td>
					<td>Operation</td>
				</tr>
			
		<?php
			while ($r = mysqli_fetch_array($result)) {
				extract($r);
		?>
		
		<div class="col-md-1"></div>
		<div class="col-md-10">

			
				<tr>
					<td><?php echo $enquiry_id ?></td>
					<td><?php echo $name ?></td>
					<td><?php echo $mobile ?></td>
					<td><?php echo $email ?></td>
					<td><?php echo $query ?></td>
					<td>
					<a href="delete-enquiry.php?enquiry_id=<?= $enquiry_id ?>">
			            <div>
			                <button class="btn btn-danger" type="submit">Delete Enquiry</button>
			            </div>
				    </a></td>
				</tr>
		</div>
		<div class="col-md-1"></div>
		
		<?php
			
			}

		// Close the connection (optional)
		$conn->close();
	?>	
</table>
	</div>
</div>
