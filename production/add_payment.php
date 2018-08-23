<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Add Payment</h4>
    </div>
    <form method='post' name='myform' onsubmit="CheckForm()">
      <div class="modal-body">
        <label class="control-label">
        Policy #:
        </label>
       <input type="text" readonly="readonly" class="form-control" name="paymentPolicyNo" id="paymentPolicyNo">
       <br>
        <label class="control-label">
        Issue Date:
      </label><input type="date" class="form-control" name="paymentIssueDate" id="paymentIssueDate" readonly>
      <br>
      <label class="control-label">
      Mode of Payment:
    </label>
      <select name="paymentmodeOfPayment" id="paymentmodeOfPayment" class="form-control">
      <option value="Monthly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Monthly</option>
      <option value="Quarterly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Quarterly</option>
      <option value="Semi-Annual" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Semi-Annual</option>
      <option value="Annual" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Annual</option>
      </select>
      <br>
      <label class="control-label">
      Amount:
      </label>
      <input  type="text" class="form-control" id="paymentAmount" name="paymentAmount">
        <hr>
        <label class="control-label">
        Transaction Date:
      </label><input type="date" class="form-control" name="paymentTransDate" id="paymentTransDate"><br>
        <label class="control-label">
        OR #:
      </label><input type="text" class="form-control" name="paymentORNo" id="paymentORNo"><br>
        <label class="control-label">
        APR #:
      </label><input type="text" class="form-control" name="paymentAPR" id="paymentAPR"><br>
        <label class="control-label">
        Next Due Date:
      </label><input type="date" class="form-control" name="paymentNextDue" id="paymentNextDue"><br>
       <br>
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
					$paymentNextDue = $_POST['paymentNextDue'];
					$paymentRemarks = "New";

						$sql = "INSERT INTO payment (payment_policyNo,
							payment_Amount, payment_issueDate,
							payment_MOP, payment_transDate,
							payment_OR, payment_APR,
							payment_nextDue, payment_remarks)
						values ('$paymentPolicyNo','$paymentAmount',
							'$payment_issueDate','$paymentMOP',
							'$paymentTransDate','$paymentORNo',
							'$paymentAPR', '$paymentNextDue',
							'$paymentRemarks')";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
								window.location = "records.php?edit=<?php echo $paymentPolicyNo ?>#Payment";
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

<!--
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
            $policyNo = $_POST['policyNoOwner'];
            $policyMOP = $_POST['policyMOP'];
            $policyIssueDate = $_POST['policyIssueDate'];


						$sql = "UPDATE production
            SET modeOfPayment = '$policyMOP',
            issuedDate = '$policyIssueDate'
            WHERE policyNo = '$policyNo'";

						if($conn->query($sql))
						{
							?>
							<script>
								window.location = "records.php?edit=<?php echo $paymentPolicyNo ?>#secondaryOpen";
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
-->
