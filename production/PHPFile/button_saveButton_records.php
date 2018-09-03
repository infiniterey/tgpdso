<?php
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
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
						else {
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
