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
				if(isset($_REQUEST['saveButton']))
				{
					$clientID = $_REQUEST['clientToRetrieve'];
					$lastname = $_REQUEST['lastname1'];
					$firstname = $_REQUEST['firstname1'];
					$middlename = $_REQUEST['middlename1'];
					$birthdate = $_REQUEST['birthdate1'];
					$address = $_REQUEST['address1'];
					$contactno = $_REQUEST['contactno1'];

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
								alert("New record production successfully added");
								window.location = "records.php?edit=<?php echo $paymentPolicyNo ?>";
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
				if(isset($_REQUEST['saveButton']))
				{
					$policyNo = $_REQUEST['policyNoOwner'];
					$plan = $_REQUEST['policyPlan'];
					$faceAmount = $_REQUEST['policyFaceAmount'];
					$MOP = $_REQUEST['policyMOP'];
					$issueDate = $_REQUEST['policyIssueDate'];
					$premium = $_REQUEST['policyPremium'];
					$policyStatus = $_REQUEST['policyStatusSelect'];
          $policyDueDate = $_REQUEST['policyDueDate'];

						$sql = "UPDATE production
						SET policyNo = '$policyNo',
						plan = '$plan',
						faceAmount = '$faceAmount',
						modeOfPayment = '$MOP',
						issuedDate = '$issueDate',
						premium = '$premium',
						policyStat = '$policyStatus',
            dueDate = '$policyDueDate'
						WHERE policyNo = '$policyNo'";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
								window.location = "records.php?edit=<?php echo $paymentPolicyNo ?>";
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
				if(isset($_REQUEST['saveButton']))
				{
					$insuredLastname = $_REQUEST['insuredLastName'];
					$insuredFirstname = $_REQUEST['insuredFirstName'];
					$insuredMiddlename = $_REQUEST['insuredMiddleName'];
					$insuredBirthdate = $_REQUEST['insuredBirthdate'];
					$insuredAddress = $_REQUEST['insuredAddress'];
					$insuredContact = $_REQUEST['insuredContactno'];
					$add = $_POST['policyNoOwner'];

						$sql = "INSERT INTO insuredpolicy (insured_policyNo, insured_lastName, insured_firstName, insured_middleName, insured_birthDate, insured_address, insured_contactNo)
						values ('$add','$insuredLastname','$insuredFirstname','$insuredMiddlename','$insuredBirthdate','$insuredAddress','$insuredContact')";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
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
