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
      <option value = "" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Select a MOP</option>
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
      <input type="date" class="form-control aswidth" name="paymentDueDate" id="paymentDueDate">
      <input type="date" name="paymentNextDue" id="paymentNextDue" hidden>
      <input type="date" name="paymentNextDueADD" id="paymentNextDueADD" hidden>
      <br>
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

          $add = $_POST['paymentPolicyNo'];
<<<<<<< HEAD
          //$query = "SELECT * FROM payment, production WHERE payment_nextDue = dueDate AND payment_policyNo = policyNo AND policyNo = '$add' ORDER BY DESC";
          $query = "SELECT * FROM payment WHERE payment_policyNo = '$add' ORDER BY payment_ID DESC LIMIT 1";
=======
          $query = "SELECT * FROM payment, production WHERE payment_nextDue = dueDate AND payment_policyNo = policyNo AND policyNo = '$add' ORDER BY DESC";
>>>>>>> 2a453f63f6fa32d19ea2c5e05f2ddeeac6319213
          $data = mysqli_query($conn, $query);
          $result = mysqli_num_rows($data);
          if($result == 1)
          {
<<<<<<< HEAD
            while($row=mysqli_fetch_Array($data))
            {
              $paymentYearRemarks = $paymentYearRemarks.$row['payment_remarks_year'];
              $paymentMonthRemarks = $paymentMonthRemarks.$row['payment_remarks_month'];
              $paymentModeOfPayment = $paymentModeOfPayment.$row['payment_MOP'];

              switch($paymentModeOfPayment)
              {
                  case "Monthly":
                    if($paymentMonthRemarks <= '10')
                    {
                      $calculateMonth = $paymentMonthRemarks + "1";
                      $calculateYear = $paymentYearRemarks;
                    }
                    else if($paymentMonthRemarks == '11')
                    {
                      $calculateMonth = ($paymentMonthRemarks + "1") / "12";
                      $calculateYear = $paymentYearRemarks + "1";
                    }

                  break;
                  case "Quarterly":

                  if($paymentMonthRemarks == '3')
                  {
                    $calculateMonth = $paymentMonthRemarks / "3";
                    $calculateYear = $paymentYearRemarks;
                  }
                  if($paymentMonthRemarks == '6')
                  {
                    $calculateMonth = $paymentMonthRemarks / "3";
                    $calculateYear = $paymentYearRemarks;
                  }
                  if($paymentMonthRemarks == '12')
                  {
                    $calculateMonth = $paymentMonthRemarks / "3";
                    $calculateYear = $paymentYearRemarks + "1";
                  }
                  else
                  {
                      ?>
                      <script>alert('Does not allow to use Quarterly within that month');</script>
                      <?php
                  }
                  break;
                  case "Semi-Annual":
                  {
                    if($calculateMonth == "6")
                    {
                      $calculateMonth = $paymentMonthRemarks / "6";
                      $calculateYear = $paymentYearRemarks;
                    }
                    else if($calculateMonth == "12")
                    {
                      $calculateMonth = $paymentMonthRemarks / "6";
                      $calculateYear = $paymentYearRemarks + "1";
                    }

                  }

                  case "Annual":
                    $calculateYear = $paymentYearRemarks + "1";
                    $calculateMonth = "1";
                  break;

                  break;
                  default:
              }




              // switch ($paymentMonthRemarks)
              // {
              //   case "":
              //     $calculateYear = "1";
              //     $calculateMonth = "1";
              //   break;
              //   case "1":
              //     $calculateYear = "1";
              //     $calculateMonth = "1" + "1";
              //   break;
              //
              //   break;
              //   default:
              //
              // }
            }

=======
>>>>>>> 2a453f63f6fa32d19ea2c5e05f2ddeeac6319213
            $sql = "INSERT INTO payment (payment_policyNo,
              payment_Amount, payment_issueDate,
              payment_MOP, payment_transDate,
              payment_OR, payment_APR, payment_dueDate,
<<<<<<< HEAD
              payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
=======
              payment_nextDue, payment_remarks)
>>>>>>> 2a453f63f6fa32d19ea2c5e05f2ddeeac6319213
            values ('$paymentPolicyNo','$paymentAmount',
              '$paymentIssueDate','$paymentMOP',
              '$paymentTransDate','$paymentORNo',
              '$paymentAPR','$paymentDueDate',
               '$paymentNextDue',
<<<<<<< HEAD
              '$paymentRemarks', '$calculateYear', '$calculateMonth')";
=======
              '$paymentRemarks')";
>>>>>>> 2a453f63f6fa32d19ea2c5e05f2ddeeac6319213

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
