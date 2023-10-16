
<?php include 'nav.php';?>

<?php
include 'dbconfig.php';

// Create a query to retrieve data from the "projects" table
$query = "SELECT * FROM projects";

// Execute the query
$result = $conn->query($query);
?>

<html>
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



<div class="container">
    <div class="row">
        <?php
            while ($r = mysqli_fetch_array($result)) {
                extract($r);
        ?>
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="mt-2 font-weight-bold">Title -- <span style="color: black;"><?= $project_title ?></span></h3>
                </div>
                <div class="card-header">
                    <h3 class="mt-2 font-weight-bold">Client ID : <span style="color: black;"><?= $client_id ?></span></h3>
                    
                </div>
                <div class="card-body bg-light">
                    <p>Require Skills -- <span style="color: blue"><?= $project_skills ?></span></p>
                    <p>Price -- <span style="color: blue">Rs.<?= $project_price ?></span></p>
                    <p>Description -- <?= ucwords($project_description) ?></p>
                    <p>Days -- <?= $project_days ?></p>
                </div>
                <div class="card-footer">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <!-- <a href="mybiddings.php?project_id=<?= $project_id ?>&freelancer_id=<?= $_SESSION['user_id'] ?>&client_id=<?= $client_id ?>"> -->
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bidModal">
  Place Bid
</button>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <?php
            
            }

        // Close the connection (optional)
        $conn->close();
    ?>  
    </div>
</div>



<div class="modal" id="bidModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Place Your Bid</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form id="bidFormSubmit">
          <!-- Add your bid form fields here -->
          <div class="form-group">
            <label for="bidAmount">Bid Amount:</label>
            <input type="text" id="bidAmount" name="bidAmount" class="form-control">
          </div>
          <div class="form-group">
            <label for="bidComment">Comment:</label>
            <textarea id="bidComment" name="bidComment" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit Bid</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
  document.getElementById("bidFormSubmit").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submission

    var bidAmount = document.getElementById("bidAmount").value;
    var bidComment = document.getElementById("bidComment").value;

    // Create an AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "process_bid.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    var data = "bidAmount=" + encodeURIComponent(bidAmount) + "&bidComment=" + encodeURIComponent(bidComment);

    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log(xhr.responseText);
        // Add any further actions you want to perform based on the response
        // ...

        // Close the modal
        $("#bidModal").modal("hide");
      }
    };

    xhr.send(data);
    document.getElementById("bidFormSubmit").reset();
  });
</script>
