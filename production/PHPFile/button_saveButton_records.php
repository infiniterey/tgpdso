<?php
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else
      {
				if(isset($_POST['saveButton']))
				{
					$insuredLastname = $_POST['insuredLastName'];
					$insuredFirstname = $_POST['insuredFirstName'];
					$insuredMiddlename = $_POST['insuredMiddleName'];
					$insuredBirthdate = $_POST['insuredBirthdate'];
					$insuredAddress = $_POST['insuredAddress'];
					$insuredContact = $_POST['insuredContactno'];
					$add = $_POST['policyNoOwner'];

          $policyNo = $_POST['policyNoOwner'];
          $plan = $_POST['policyPlan'];
          $faceAmount = $_POST['policyFaceAmount'];
          $MOP = $_POST['policyMOP'];
          $issueDate = $_POST['policyIssueDate'];
          $premium = $_POST['policyPremium'];
          $policyStatus = $_POST['policyStatusSelect'];
          $policyDueDate = $_POST['policyDueDate'];

          $clientID = $_POST['clientToRetrieve'];
          $lastname = $_POST['lastname1'];
          $firstname = $_POST['firstname1'];
          $middlename = $_POST['middlename1'];
          $birthdate = $_POST['birthdate1'];
          $address = $_POST['address1'];
          $contactno = $_POST['contactno1'];


          $query = "SELECT * FROM insuredpolicy, client, production WHERE clientID = prodclientID AND policyNo = insured_policyNo AND policyNo = '$add'";
          $data = mysqli_query($conn, $query);
          $result = mysqli_num_rows($data);
          if($result == 1)
          {
            $sql = "UPDATE insuredpolicy JOIN production
            ON insuredpolicy.insured_policyNo = '$add' AND production.policyNo = '$add'
            SET insured_policyNo = '$add',
            insured_lastName = '$insuredLastname',
            insured_firstName = '$insuredFirstname',
            insured_middleName = '$insuredMiddlename',
            insured_birthdate = '$insuredBirthdate',
            insured_address = '$insuredAddress',
            insured_contactNo = '$insuredContact',
            plan = '$plan',
            faceAmount = '$faceAmount',
            modeOfPayment = '$MOP',
            issuedDate = '$issueDate',
            premium = '$premium',
            policyStat = '$policyStatus',
            dueDate = '$policyDueDate'";

            if($conn->query($sql))
            {
              ?>
              <script>
                alert("Updated record successfully added");
                window.location = "records.php?edit=<?php echo $add ?>";
                </script>
                <?php
            }
            else
            {
              echo "Error:". $sql."<br>".$conn->error;
            }
          }
          else if($result == 0)
          {
            $sql = "INSERT INTO insuredpolicy (insured_policyNo, insured_lastName, insured_firstName, insured_middleName, insured_birthDate, insured_address, insured_contactNo)
            values ('$add','$insuredLastname','$insuredFirstname','$insuredMiddlename','$insuredBirthdate','$insuredAddress','$insuredContact')";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record successfully added");
								window.location = "records.php?edit=<?php echo $add ?>";
								</script>
								<?php
						}
						else
            {
							echo "Error:". $sql."<br>".$conn->error;
						}
          }
          else
          {
            ?>
            <script>alert('Maybe does not connect to the database or input is wrong');</script>
              <?php
          }
						$conn->close();
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
				if(isset($_POST['saveButton']))
				{
          $sql = "UPDATE client
          SET clientID = '$clientID',
          cLastname = '$lastname',
          cFirstname = '$firstname',
          cMiddlename = '$middlename',
          cBirthdate = '$birthdate',
          cAddress = '$address',
          cCellno = '$contactno'
          WHERE clientID = '$clientID'";

          if($conn->query($sql))
          {
            ?>
            <script>
              alert("New record successfully added");
              window.location = "records.php?edit=<?php echo $add ?>";
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
      include 'PHPFile/Connection_Database.php';

            if(mysqli_connect_error())
            {
              die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
            }
            else {
              if(isset($_POST['saveButton']))
              {
                $add = $_POST['policyNoOwner'];

                $policyNo = $_POST['policyNoOwner'];
                $plan = $_POST['policyPlan'];
                $faceAmount = $_POST['policyFaceAmount'];
                $MOP = $_POST['policyMOP'];
                $issueDate = $_POST['policyIssueDate'];
                $premium = $_POST['policyPremium'];
                $policyStatus = $_POST['policyStatusSelect'];
                $policyDueDate = $_POST['policyDueDate'];
                $policyIssueDate = $_POST['policyIssueDate'];


<<<<<<< HEAD

                $query1 = "SELECT * FROM production WHERE policyNo = '$add'";
              //  $transdate = payment.transDate;
                $data1 = mysqli_query($conn, $query1);
                $paymentRes = mysqli_num_rows($data1);
                if($paymentRes == 1)
                {
                  while($row=mysqli_fetch_Array($data1))
                  {
                    $transdate = $transdate.$row['transDate'];
                    $productionOR = $productionOR.$row['receiptNo'];
                  }
                  $sql = "INSERT INTO payment (payment_policyNo, payment_Amount, payment_issueDate, payment_MOP, payment_transDate, payment_OR, payment_APR, payment_dueDate, payment_nextDue, payment_remarks, payment_remarks_year, payment_remarks_month)
                  values ('$add', '$faceAmount', '$policyIssueDate', '$MOP', '$transdate', '$productionOR', '', '$policyIssueDate', '$policyDueDate', 'New', '1', '1')";
=======
                $query1 = "SELECT * FROM payment, production WHERE payment_policyNo = policyNo AND policyNo = '$add'";
                $transdate = payment.transDate;
                $data1 = mysqli_query($conn, $query1);
                // while($row = mysql_fetch_assoc($data1))
                // {
                //   $transdate1 = $row['transDate'];
                // }
                $paymentRes = mysqli_num_rows($data1);
                if($paymentRes == 0)
                {
                  $sql = "INSERT INTO payment (payment_policyNo, payment_Amount, payment_issueDate, payment_MOP, payment_transDate, payment_OR, payment_APR, payment_dueDate, payment_nextDue, payment_remarks)
                  values ('$add', '$faceAmount', '$policyIssueDate', '$MOP', now(), '', '', '$policyIssueDate', '$policyDueDate', 'New')";
>>>>>>> 2a453f63f6fa32d19ea2c5e05f2ddeeac6319213

                  if($conn->query($sql))
                  {
                    ?>
                    <script>
                      alert("Updated record successfully added");
                      window.location = "records.php?edit=<?php echo $add ?>";
                      </script>
                      <?php
                  }
                  else
                  {
                    echo "Error:". $sql."<br>".$conn->error;
                  }
                }
                $conn->close();
              }
            }
            ?>
