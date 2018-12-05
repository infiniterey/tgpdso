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
       <input type="text" readonly="readonly" class="form-control aswidth pressingKey" name="paymentPolicyNo" id="paymentPolicyNo" placeholder="Policy #">
       <br>
        <label class="control-label">
        Issue Date:
      </label><input type="date" class="form-control aswidth pressingKey" name="paymentIssueDate" id="paymentIssueDate" readonly placeholder="Issue Date">
      <br>
      <label class="control-label">
      Mode of Payment:
    </label>
      <select name="paymentmodeOfPayment" id="paymentmodeOfPayment" class="form-control aswidth" required>
<<<<<<< HEAD
      <option value = "na" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Select a MOP</option>
=======
      <option value = "" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Select a MOP</option>
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
      <option value="Monthly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Monthly</option>
      <option value="Quarterly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Quarterly</option>
      <option value="Semi-Annual" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Semi-Annual</option>
      <option value="Annual" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Annual</option>
      </select>
      <br>
      <label class="control-label">
      Amount:
      </label>
      <input  type="text" class="form-control aswidth number pressingKey" id="paymentAmount" name="paymentAmount" placeholder="Amount">
      </div>
      <div class="col-sm-6">
        <label class="control-label">
        Transaction Date:
      </label><input type="date" class="form-control aswidth pressingKey" name="paymentTransDate" id="paymentTransDate" placeholder="Transaction Date"><br>
        <label class="control-label">
        OR #:
      </label><input type="text" class="form-control aswidth pressingKey" name="paymentORNo" id="paymentORNo" placeholder="OR #"><br>
        <label class="control-label">
        APR #:
      </label><input type="text" class="form-control aswidth pressingKey" name="paymentAPR" id="paymentAPR" placeholder="APR #"><br>
        <label class="control-label">
        Due Date:
      </label>
<<<<<<< HEAD
      <input type="date" class="form-control aswidth pressingKey" name="paymentDueDate" id="paymentDueDate" readonly placeholder="Due Date">
      <input type="date" name="paymentNextDue" id="paymentNextDue" hidden>
      <input type="date" name="paymentNextDueADD" id="paymentNextDueADD" hidden>
      <input type="date" name="dateText" id="dateText" hidden>
=======
      <input type="date" class="form-control aswidth" name="paymentDueDate" id="paymentDueDate">
      <input type="date" name="paymentNextDue" id="paymentNextDue" hidden>
      <input type="date" name="paymentNextDueADD" id="paymentNextDueADD" hidden>
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
      <br>
       <br>
     </div>
 </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="width: 100px;" name="paymentSaveButton" id="paymentSaveButton"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
        <!--<button type="button" class="btn btn-default" style="width: 100px;" data-dismiss="modal">Close</button>-->
      </div>
    </form>
  </div>
</div>

<script>


</script>

<?php
include 'PHPFile/Connection_Database.php';
<<<<<<< HEAD

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['paymentSaveButton']))
				{
          $add = $_POST['paymentPolicyNo'];
          $zero = "0";
          $sql = "UPDATE payment SET payment_latest = '$zero' WHERE payment_policyNo = '$add'";
          if($conn->query($sql))
          {

          }
          else {
            echo "Error:". $sql."<br>".$conn->error;
          }
        }
        $conn->close();
      }
?>
<?php
include 'PHPFile/Connection_Database.php';
=======
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5

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
<<<<<<< HEAD
          $paymentDueDateResult = $_POST['paymentDueDate'];
          $paymentDueDate = $_POST['paymentNextDueADD'];
          $paymentNextDue = $_POST['paymentNextDue'];
          $paymentRemarks = "New";
          //$nextDueResulter = $_POST['dateText'];

          $add = $_POST['paymentPolicyNo'];
          //$query = "SELECT * FROM payment, production WHERE payment_nextDue = dueDate AND payment_policyNo = policyNo AND policyNo = '$add' ORDER BY DESC

          $query = "SELECT * FROM payment WHERE payment_policyNo = '$add' ORDER BY payment_ID DESC LIMIT 1";
          $data = mysqli_query($conn, $query);
          $result = mysqli_num_rows($data);
          if($result == 1)
          {
            $paymentYearRemarks = "0";
            $paymentMonthRemarks = "0";
            $nextDueDateResult = "";


            $paymentMOP = $_POST['paymentmodeOfPayment'];

            while($row=mysqli_fetch_Array($data))
            {
              $paymentYearRemarks = $paymentYearRemarks.$row['payment_remarks_year'];
              $paymentMonthRemarks = $paymentMonthRemarks.$row['payment_remarks_month'];

              $nextDueDateResult = $nextDueDateResult.$row['payment_nextDue'];
            }



              switch($paymentMOP)
              {
                  case "Monthly":

                  if($paymentMonthRemarks < "12")
                  {
                    $calculateMonth = $paymentMonthRemarks + "1";
                    $calculateYear = $paymentYearRemarks + "0";
                  }
                  else if($paymentMonthRemarks >= "12")
                  {
                    $calculateMonth = "1";
                    $calculateYear = $paymentYearRemarks + "1";
                  }

                  ?>
                  <script>
                      var month = 1;
                  </script>
                  <?php

                  break;
                  case "Quarterly":
                  if($paymentMonthRemarks == "3" || $paymentMonthRemarks == "6" || $paymentMonthRemarks == "9")
                  {
                    $calculateMonth = $paymentMonthRemarks + "3";
                    $calculateYear = $paymentYearRemarks + "0";
                  }
                  else if($paymentMonthRemarks >= "12")
                  {
                    $calculateMonth = "1";
                    $calculateYear = $paymentYearRemarks + "1";
                  }
                  else
                  {
                    ?>
                    <script>alert('Quarterly does not accept within that month.');</script>
                    <?php
                    return;
                  }



                  ?>
                  <script>
                      var month = 3;
                  </script>
                  <?php

                  break;
                  case "Semi-Annual":
                  if($paymentMonthRemarks == "6")
                  {
                    $calculateMonth = $paymentMonthRemarks + "6";
                    $calculateYear = $paymentYearRemarks;
                  }
                  else if($paymentMonthRemarks >= "12")
                  {
                    $calculateMonth = "1";
                    $calculateYear = $paymentYearRemarks + "1";
                  }
                  else
                  {
                    ?>
                    <script>alert('Semi-Annual does not accept within that month.');</script>
                    <?php
                    return;
                  }


                  ?>
                  <script>
                      var month = 6;
                  </script>
                  <?php

                  break;
                  case "Annual":

                  if($paymentMonthRemarks == "1")
                  {
                    $calculateMonth = "1";
                    $calculateYear = $paymentYearRemarks + "1";
                  }
                  else
                  {
                    ?>
                    <script>alert('Annual does not accept within that month.');</script>
                    <?php
                    return;
                  }

                  ?>
                  <script>
                      var month = 12;
                  </script>
                  <?php

                  break;
                  default:
                  $paymentMOP = $paymentMOP;
              }
              ?>
              <script>

              Date.isLeapYear = function (year) {
              		return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
              };

              Date.getDaysInMonth = function (year, month) {
              		return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
              };

              Date.prototype.isLeapYear = function () {
              		return Date.isLeapYear(this.getFullYear());
              };

              Date.prototype.getDaysInMonth = function () {
              		return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
              };

              Date.prototype.addMonths = function (value) {
              		var n = this.getDate();
              		this.setDate(1);
              		this.setMonth(this.getMonth() + value);
              		this.setDate(Math.min(n, this.getDaysInMonth()));
              		return this;
              };

              </script>
              <script type="text/javascript">

                var resultDate = "<?php echo $nextDueDateResult; ?>";
                var dateObjective = new Date(resultDate);
                var dateTimeObject = dateObjective.addMonths(month);
                var newdateResult= dateTimeObject.getFullYear() + '-' + (((dateTimeObject.getMonth() + 1) < 10) ? '0' : '') + (dateTimeObject.getMonth() + 1) + '-' + ((dateTimeObject.getDate() < 10) ? '0' : '') + dateTimeObject.getDate();

                document.getElementById("dateText").value = newdateResult;
                var valueData = document.getElementById("dateText").value;
              </script>
              <?php
                $nextDueResulter = $_POST['paymentNextDue'];

            $sql = "INSERT INTO payment (payment_policyNo,
              payment_Amount, payment_issueDate,
              payment_MOP, payment_transDate,
              payment_OR, payment_APR, payment_dueDate,
              payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month, payment_latest)
            values ('$paymentPolicyNo','$paymentAmount',
              '$paymentIssueDate','$paymentMOP',
              '$paymentTransDate','$paymentORNo',
              '$paymentAPR','$nextDueDateResult',
               '$nextDueResulter',
              '$paymentRemarks', '$calculateYear', '$calculateMonth', '1')";


            if($conn->query($sql))
            {

=======
          $paymentDueDate = $_POST['paymentNextDueADD'];
          $paymentNextDue = $_POST['paymentNextDue'];
          $paymentRemarks = "New";

          $add = $_POST['paymentPolicyNo'];
          //$query = "SELECT * FROM payment, production WHERE payment_nextDue = dueDate AND payment_policyNo = policyNo AND policyNo = '$add' ORDER BY DESC";
          $query = "SELECT * FROM payment WHERE payment_policyNo = '$add' ORDER BY payment_ID DESC LIMIT 1";
          $data = mysqli_query($conn, $query);
          $result = mysqli_num_rows($data);
          if($result == 1)
          {
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
                      $sql = "INSERT INTO payment (payment_policyNo,
                        payment_Amount, payment_issueDate,
                        payment_MOP, payment_transDate,
                        payment_OR, payment_APR, payment_dueDate,
                        payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                      values ('$paymentPolicyNo','$paymentAmount',
                        '$paymentIssueDate','$paymentMOP',
                        '$paymentTransDate','$paymentORNo',
                        '$paymentAPR','$paymentDueDate',
                         '$paymentNextDue',
                        '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                    }
                    else if($paymentMonthRemarks == '11')
                    {
                      $calculateMonth = ($paymentMonthRemarks + "1") / "12";
                      $calculateYear = $paymentYearRemarks + "1";
                      $sql = "INSERT INTO payment (payment_policyNo,
                        payment_Amount, payment_issueDate,
                        payment_MOP, payment_transDate,
                        payment_OR, payment_APR, payment_dueDate,
                        payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                      values ('$paymentPolicyNo','$paymentAmount',
                        '$paymentIssueDate','$paymentMOP',
                        '$paymentTransDate','$paymentORNo',
                        '$paymentAPR','$paymentDueDate',
                         '$paymentNextDue',
                        '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                    }

                  break;
                  case "Quarterly":

                  if($paymentMonthRemarks == '3')
                  {
                    $calculateMonth = $paymentMonthRemarks / "3";
                    $calculateYear = $paymentYearRemarks;
                    $sql = "INSERT INTO payment (payment_policyNo,
                      payment_Amount, payment_issueDate,
                      payment_MOP, payment_transDate,
                      payment_OR, payment_APR, payment_dueDate,
                      payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                    values ('$paymentPolicyNo','$paymentAmount',
                      '$paymentIssueDate','$paymentMOP',
                      '$paymentTransDate','$paymentORNo',
                      '$paymentAPR','$paymentDueDate',
                       '$paymentNextDue',
                      '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                  }
                  else if($paymentMonthRemarks == '6')
                  {
                    $calculateMonth = $paymentMonthRemarks / "3";
                    $calculateYear = $paymentYearRemarks;
                    $sql = "INSERT INTO payment (payment_policyNo,
                      payment_Amount, payment_issueDate,
                      payment_MOP, payment_transDate,
                      payment_OR, payment_APR, payment_dueDate,
                      payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                    values ('$paymentPolicyNo','$paymentAmount',
                      '$paymentIssueDate','$paymentMOP',
                      '$paymentTransDate','$paymentORNo',
                      '$paymentAPR','$paymentDueDate',
                       '$paymentNextDue',
                      '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                  }
                  else if($paymentMonthRemarks == '12')
                  {
                    $calculateMonth = $paymentMonthRemarks / "3";
                    $calculateYear = $paymentYearRemarks + "1";
                    $sql = "INSERT INTO payment (payment_policyNo,
                      payment_Amount, payment_issueDate,
                      payment_MOP, payment_transDate,
                      payment_OR, payment_APR, payment_dueDate,
                      payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                    values ('$paymentPolicyNo','$paymentAmount',
                      '$paymentIssueDate','$paymentMOP',
                      '$paymentTransDate','$paymentORNo',
                      '$paymentAPR','$paymentDueDate',
                       '$paymentNextDue',
                      '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                  }
                  else
                  {
                      ?>
                      <script>
                        alert('Does not allow to use Quarterly within that month');
                        window.location='records.php?edit=<?php echo $add ?>';
                      </script>
                      <?php
                  }
                  break;
                  case "Semi-Annual":
                  {
                    if($paymentMonthRemarks == "6")
                    {
                      $calculateMonth = $paymentMonthRemarks / "6";
                      $calculateYear = $paymentYearRemarks;
                      $sql = "INSERT INTO payment (payment_policyNo,
                        payment_Amount, payment_issueDate,
                        payment_MOP, payment_transDate,
                        payment_OR, payment_APR, payment_dueDate,
                        payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                      values ('$paymentPolicyNo','$paymentAmount',
                        '$paymentIssueDate','$paymentMOP',
                        '$paymentTransDate','$paymentORNo',
                        '$paymentAPR','$paymentDueDate',
                         '$paymentNextDue',
                        '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                    }
                    else if($paymentMonthRemarks == "12")
                    {
                      $calculateMonth = $paymentMonthRemarks / "6";
                      $calculateYear = $paymentYearRemarks + "1";
                      $sql = "INSERT INTO payment (payment_policyNo,
                        payment_Amount, payment_issueDate,
                        payment_MOP, payment_transDate,
                        payment_OR, payment_APR, payment_dueDate,
                        payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                      values ('$paymentPolicyNo','$paymentAmount',
                        '$paymentIssueDate','$paymentMOP',
                        '$paymentTransDate','$paymentORNo',
                        '$paymentAPR','$paymentDueDate',
                         '$paymentNextDue',
                        '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                    }

                  }

                  case "Annual":
                  if($paymentMonthRemarks == "12")
                  {
                    $calculateYear = $paymentYearRemarks / "12";
                    $calculateMonth = "1";
                    $sql = "INSERT INTO payment (payment_policyNo,
                      payment_Amount, payment_issueDate,
                      payment_MOP, payment_transDate,
                      payment_OR, payment_APR, payment_dueDate,
                      payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                    values ('$paymentPolicyNo','$paymentAmount',
                      '$paymentIssueDate','$paymentMOP',
                      '$paymentTransDate','$paymentORNo',
                      '$paymentAPR','$paymentDueDate',
                       '$paymentNextDue',
                      '$paymentRemarks', '$calculateYear', '$calculateMonth')";

                  }
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

            if($conn->query($sql))
            {
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
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

<<<<<<< HEAD
$(document).ready(function(){
    $('#paymentSaveButton').attr('disabled',true);
    $('input.pressingKey').keyup(function(){
        if($(this).val().length !=0)
            $('#paymentSaveButton').attr('disabled', false);
        else
            $('#paymentSaveButton').attr('disabled',true);
    })

    $('#paymentmodeOfPayment').change(function() {
    var option = $(this).val();
    if(option !='na') {
        $('#paymentSaveButton').attr('disabled', false);
    } else {
        $('#paymentSaveButton').attr('disabled',true);
    }
    });
});


=======
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
</script>
