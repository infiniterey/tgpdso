<div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Add Payment</h4>
    </div>
    <form method='post' name='myform' onsubmit="CheckForm()">
      <div class="modal-body">
        <div class="row">
        <div class="col-sm-6">
        <label class="control-label">
        Policy #:
        </label>
       <input type="text" readonly="readonly" class="form-control aswidth" name="paymentPolicyNo1" id="paymentPolicyNo1">
       <br>
        <label class="control-label">
        Issue Date:
      </label><input type="date" class="form-control aswidth" name="paymentIssueDate1" id="paymentIssueDate1" readonly>
      <br>
      <label class="control-label">
      Mode of Payment:
    </label>
      <select name="paymentmodeOfPayment1" id="paymentmodeOfPayment1" class="form-control aswidth" required>
      <option value = "" name="paymentmodeOfPayment1" id="paymentmodeOfPayment1">Select a MOP</option>
      <option value="Monthly" name="paymentmodeOfPayment1" id="paymentmodeOfPayment1">Monthly</option>
      <option value="Quarterly" name="paymentmodeOfPayment1" id="paymentmodeOfPayment1">Quarterly</option>
      <option value="Semi-Annual" name="paymentmodeOfPayment1" id="paymentmodeOfPayment1">Semi-Annual</option>
      <option value="Annual" name="paymentmodeOfPayment1" id="paymentmodeOfPayment1">Annual</option>
      </select>
      <br>
      <label class="control-label">
      Amount:
      </label>
      <input  type="text" class="form-control aswidth" id="paymentAmount1" name="paymentAmount1">
      </div>
      <div class="col-sm-6">
        <label class="control-label">
        Transaction Date:
      </label><input type="date" class="form-control aswidth" name="paymentTransDate1" id="paymentTransDate1"><br>
        <label class="control-label">
        OR #:
      </label><input type="text" class="form-control aswidth" name="paymentORNo1" id="paymentORNo1"><br>
        <label class="control-label">
        APR #:
      </label><input type="text" class="form-control aswidth" name="paymentAPR1" id="paymentAPR1"><br>
        <label class="control-label">
        Due Date:
      </label>
      <input type="date" class="form-control aswidth" name="paymentDueDate1" id="paymentDueDate1">
      <input type="date" name="paymentNextDue1" id="paymentNextDue1" hidden>
      <input type="date" name="paymentNextDueADD1" id="paymentNextDueADD1" hidden>
      <br>
       <br>
     </div>
 </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="width: 100px;" name="paymentSaveButton1" id="paymentSaveButton1" onclick="openPolicy(event, 'Payment')"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
        <!--<button type="button" class="btn btn-default" style="width: 100px;" data-dismiss="modal">Close</button>-->
      </div>
    </form>
  </div>
</div>


<?php
if(isset($_REQUEST['edit']))
{
  $policyNo = $_REQUEST['edit'];

  $DB_con = Database::connect();
  $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM production, payment WHERE policyNo = payment_policyNo AND policyNo = '$policyNo'";

  $result = $DB_con->query($sql);
  if($result->rowCount()>0){
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
        ?>
        <script>document.getElementById('paymentNextDueADD').value = '<?php echo $row['dueDate']?>'</script>
        <?php
    }
  }
  else{}
  }
?>

<?php
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['paymentSaveButton1']))
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

          $add = $_POST['paymentPolicyNo'];
          $query = "SELECT * FROM payment, production WHERE payment_nextDue = dueDate AND payment_policyNo = policyNo AND policyNo = '$add' ORDER BY DESC";
          $data = mysqli_query($conn, $query);
          $result = mysqli_num_rows($data);
          if($result == 1)
          {
            $sql = "INSERT INTO payment (payment_policyNo,
              payment_Amount, payment_issueDate,
              payment_MOP, payment_transDate,
              payment_OR, payment_APR, payment_dueDate,
              payment_nextDue, payment_remarks)
            values ('$paymentPolicyNo','$paymentAmount',
              '$paymentIssueDate','$paymentMOP',
              '$paymentTransDate','$paymentORNo',
              '$paymentAPR','$paymentDueDate',
               '$paymentNextDue',
              '$paymentRemarks')";

            if($conn->query($sql))
            {
              ?>
              <script>
              window.location="records.php?edit=<?php echo $paymentPolicyNo ?>";
                </script>
                <?php
            }
            else {
              echo "Error:". $sql."<br>".$conn->error;
            }
            $conn->close();
          }
          else
          {
            ?>
            <script>alert('Failed');</script>
            <?php
          }
      }
    }
?>

<?php
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['paymentSaveButton1']))
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
              window.location="records.php?edit=<?php echo $paymentPolicyNo ?>";
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

<script>

document.getElementById("paymentSaveButton").addEventListener("click", function(){
  if($("#paymentNextDue").datepicker("getDate") === null) {
    alert("Choose first the Mode of Payment");
  }
});

</script>
