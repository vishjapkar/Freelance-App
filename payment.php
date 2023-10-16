<?php 
  include 'client-nav.php';
  include 'dbconfig.php';

  $bid_id = $_GET['bid_id'];
  $project_title = $_GET['project_title'];
  $client_id = $_GET['client_id'];
  $freelancer_name = $_GET['user_name'];
  $amount = $_GET['amount'];
?>

<body class="bg-light">
    <div class="container card mt-2">
        <div class="card-header bg-white">
            <h2 class="p-2 font-weight-bold text-center">Payment Information</h2>
        </div>
        <div style="font-size:24px;" class="card-header font-weight-bold text-dark text-center bg-white">Project Details</div>
        <div class="card-body">
            <table class="table text-center">
                <tr style="line-height: 10px;">
                    <td class="font-weight-bold">Bid Id:</td>
                    <td><?= $bid_id ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Project Title:</td>
                    <td><?= $project_title ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Freelancer Name:</td>
                    <td><?= $freelancer_name ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Amount:</td>
                    <td>₹ <?= $amount ?> INR</td>
                </tr>
            </table>
        </div>
        <div class="card-footer bg-white">
            <a href="confirmbid.php" style="text-decoration:none" class="text-white">
                <button class="btn btn-primary">Go to previous page</button>
            </a>
            <button style="float:right;" type="button" class="btn btn-success" data-toggle="modal" data-target="#paymentModal">Proceed to payment</button>
        </div>
        <!-- Project Details End -->
      </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true" style="height:700px">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="paymentModalLabel">Scan QR Code</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img src="Images/paytm.jpeg" height="450px" width="300px">
            </div>
            <form action="process_payment.php" method="post">
                <div class="form-group">
                    <div class="row">
                        <table class="table">
                            <tr>
                                <td><label for="card_number">Amount</label></td>
                                <td><input type="text" value="₹ <?= $amount ?> INR" class="form-control" id="card_number" name="amount" disabled></td>
                            </tr>
                        </table>
                    </div>
                </div>
              </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" name="submit">Proceed</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script>
    function togglePaymentCard() {
      $('#paymentModal').modal('show');
    }
  </script>
</body>
