<div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Add Payment</h4>
    </div>
    <form method='post' name='myform' onsubmit="CheckForm()" action="<?php ?>">
      <div class="modal-body">
        <div class="row">
        <div class="col-sm-6">
        <label class="control-label">
        Policy #:
        </label>
       <input type="text" readonly="readonly" class="form-control aswidth" name="paymentPolicyNo" id="paymentPolicyNo">
       <br>
        <label class="control-label">
        Issue Date:
      </label><input type="date" class="form-control aswidth" name="paymentIssueDate" id="paymentIssueDate" readonly>
      <br>
      <label class="control-label">
      Mode of Payment:
    </label>
      <select name="paymentmodeOfPayment" id="paymentmodeOfPayment" class="form-control aswidth" required>
        <option value="" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Select a MOP</option>
      <option value="Monthly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Monthly</option>
      <option value="Quarterly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Quarterly</option>
      <option value="Semi-Annual" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Semi-Annual</option>
      <option value="Annual" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Annual</option>
      </select>
      <br>
      <label class="control-label">
      Amount:
      </label>
      <input  type="text" class="form-control aswidth" id="paymentAmount" name="paymentAmount">
      </div>
      <div class="col-sm-6">
        <label class="control-label">
        Transaction Date:
      </label><input type="date" class="form-control aswidth" name="paymentTransDate" id="paymentTransDate"><br>
        <label class="control-label">
        OR #:
      </label><input type="text" class="form-control aswidth" name="paymentORNo" id="paymentORNo"><br>
        <label class="control-label">
        APR #:
      </label><input type="text" class="form-control aswidth" name="paymentAPR" id="paymentAPR"><br>
        <label class="control-label">
        Due Date:
      </label>
      <input type="date" class="form-control aswidth readonly" name="paymentDueDate" id="paymentDueDate">
      <input type="date" name="paymentNextDue" id="paymentNextDue" hidden>
      <input type="date" class="aswidth" name="paymentNextDueADD" id="paymentNextDueADD" hidden><br>
       <br>
     </div>
 </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="width: 100px;" name="paymentSaveButton" id="paymentSaveButton" onclick="openPolicy(event, 'Payment')"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
        <!--<button type="button" class="btn btn-default" style="width: 100px;" data-dismiss="modal">Close</button>-->
      </div>
    </form>
  </div>
</div>

<?php
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "tgpdso_db";

      $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['paymentSaveButton']))
				{
					$paymentPolicyNo = $_POST['paymentPolicyNo'];
					$paymentAmount = $_POST['paymentAmount'];
					$paymentIssueDate = $_POST['paymentIssueDate'];
					$paymentMOP = $_POST['paymentmodeOfPayment'];
					$paymentTransDate = $_POST['paymentTransDate'];
					$paymentORNo = $_POST['paymentORNo'];
					$paymentAPR = $_POST['paymentAPR'];
          $paymentDueDate = $_POST['paymentNextDueADD'];
					$paymentNextDue = $_POST['paymentNextDue'];
					$paymentRemarks = "New";

						$sql = "INSERT INTO payment (payment_policyNo,
							payment_Amount, payment_issueDate,
							payment_MOP, payment_transDate,
							payment_OR, payment_APR, payment_dueDate,
							payment_nextDue, payment_remarks)
						values ('$paymentPolicyNo','$paymentAmount',
							'$paymentIssueDate','$paymentMOP',
							'$paymentTransDate','$paymentORNo',
							'$paymentAPR', '$paymentDueDate','$paymentNextDue',
							'$paymentRemarks')";

						if($conn->query($sql))
						{
							?>
							<script>
              window.location="dueDate.php";
								</script>
								<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
						$conn->close();
      }
    }
?>

<?php
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "tgpdso_db";

      $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['paymentSaveButton']))
				{
					$paymentPolicyNo = $_POST['paymentPolicyNo'];
					$paymentAmount = $_POST['paymentAmount'];
					$paymentIssueDate = $_POST['paymentIssueDate'];
					$paymentMOP = $_POST['paymentmodeOfPayment'];
					$paymentTransDate = $_POST['paymentTransDate'];
					$paymentORNo = $_POST['paymentORNo'];
					$paymentAPR = $_POST['paymentAPR'];
					$paymentNextDue = $_POST['paymentNextDue'];
					$paymentRemarks = "New";

          $sql = "UPDATE production SET
          transDate='$paymentTransDate',
          policyNo='$paymentPolicyNo',
          receiptNo='$paymentORNo',
          faceAmount='$paymentAmount',
          modeOfPayment='$paymentMOP',
          dueDate='$paymentNextDue',
          remarks='$paymentRemarks'
          WHERE policyNo = '$paymentPolicyNo' OR receiptNo = '$paymentORNo'";


						if($conn->query($sql))
						{
							?>
							<script>

              window.location="dueDate.php"
//              $(document).ready(function() {

  //if(window.location.href.indexOf('#paymentModal') != -1) {
  //  $('#paymentModal').modal('show');
  //}

//});
								</script>
								<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
						$conn->close();
      }
    }
?>
