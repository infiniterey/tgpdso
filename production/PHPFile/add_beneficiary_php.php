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
				if(isset($_REQUEST['addBeneficiaryButton']))
				{
					$beneLastname = $_REQUEST['beneLastName'];
					$beneFirstname = $_REQUEST['beneFirstName'];
					$beneMiddlename = $_REQUEST['beneMiddleName'];
					$beneBirthday = $_REQUEST['beneBirthday'];
					$beneAddress = $_REQUEST['beneAddress'];
					$beneContact = $_REQUEST['beneContact'];
					$beneRelationship = $_REQUEST['beneRelationship'];
					$add = $_REQUEST['policyNoOwner'];


						$sql = "INSERT INTO beneficiary (bene_policyNo, bene_lastName, bene_firstName, bene_middleName, bene_birthDate, bene_address, bene_contactNo, bene_relationShip)
						values ('$add','$beneLastname','$beneFirstname','$beneMiddlename','$beneBirthday','$beneAddress','$beneContact','$beneRelationship')";

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

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgpdso_db";

$conn = new mysqli ($servername, $username, $password, $dbname);

if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
  if(isset($_GET['editBene']) && isset($_GET['number']))
  {
  $edit = $_GET['editBene'];
  $number = $_GET['number'];

    $result=mysqli_query($conn,"SELECT * from production, client, beneficiary, policystatus WHERE policyStat = policyID AND clientID = prodclientID AND bene_policyNo = policyNo AND policyNo = '$edit' AND bene_contactNo = '$number'");

    while($row=mysqli_fetch_Array($result))
    {
      ?>
      <script> document.getElementById('policyNoOwner').value = '<?php echo $row['policyNo'];?>';</script>
      <script> document.getElementById('lastname1').value = '<?php echo $row['cLastname'];?>';</script>
      <script> document.getElementById('firstname1').value = '<?php echo $row['cFirstname'];?>';</script>
      <script> document.getElementById('middlename1').value = '<?php echo $row['cMiddlename'];?>';</script>
      <script> document.getElementById('birthdate1').value = '<?php echo $row['cBirthdate'];?>';</script>
      <script> document.getElementById('address1').value = '<?php echo $row['cAddress'];?>';</script>
      <script> document.getElementById('contactno1').value = '<?php echo $row['cCellno'];?>';</script>

      <script> document.getElementById('policyPlan').value = '<?php echo $row['plan'];?>';</script>
      <script> document.getElementById('policyFaceAmount').value = '<?php echo $row['faceAmount'];?>';</script>
      <script> document.getElementById('policyMOP').value = '<?php echo $row['modeOfPayment'];?>';</script>
      <script> document.getElementById('policyIssueDate').value = '<?php echo $row['issuedDate'];?>';</script>
      <script> document.getElementById('policyPremium').value = '<?php echo $row['premium'];?>';</script>

      <script> document.getElementById('beneLastName').value = '<?php echo $row['bene_lastName'];?>';</script>
      <script> document.getElementById('beneFirstName').value = '<?php echo $row['bene_firstName'];?>';</script>
      <script> document.getElementById('beneMiddleName').value = '<?php echo $row['bene_middleName'];?>';</script>
      <script> document.getElementById('beneBirthday').value = '<?php echo $row['bene_birthDate'];?>';</script>
      <script> document.getElementById('beneAddress').value = '<?php echo $row['bene_address'];?>';</script>
      <script> document.getElementById('beneContact').value = '<?php echo $row['bene_contactNo'];?>';</script>
      <script> document.getElementById('beneRelationship').value = '<?php echo $row['bene_relationShip'];?>';</script>

      <script> document.getElementById('clientToRetrieve').value = '<?php echo $row['clientID'];?>';</script>
      <script> document.getElementById('policyStatusSelect').value = '<?php echo $row['policyID'];?>';</script>
      <script>document.getElementById("fundButton").disabled = false;</script>
      <?php
    }

  ?>
  <script>

  </script>
  <?php
    }
        $conn->close();
  }
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgpdso_db";

$conn = new mysqli ($servername, $username, $password, $dbname);

if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
if(isset($_GET['editBene']) && isset($_GET['number']))
{
    $edit = $_GET['editBene'];

      $result=mysqli_query($conn,"SELECT * from insuredpolicy, production WHERE policyNo = insured_policyNo AND policyNo = '$edit'");

      while($row=mysqli_fetch_Array($result))
      {
        ?>

        <script> document.getElementById('insuredLastName').value = '<?php echo $row['insured_lastName'];?>';</script>
        <script> document.getElementById('insuredFirstName').value = '<?php echo $row['insured_firstName'];?>';</script>
        <script> document.getElementById('insuredMiddleName').value = '<?php echo $row['insured_middleName'];?>';</script>
        <script> document.getElementById('insuredBirthdate').value = '<?php echo $row['insured_birthdate'];?>';</script>
        <script> document.getElementById('insuredAddress').value = '<?php echo $row['insured_address'];?>';</script>
        <script> document.getElementById('insuredContactno').value = '<?php echo $row['insured_contactNo'];?>';</script>

      <?php
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
				if(isset($_GET['deleteBene']) && isset($_GET['number'])&&isset($_GET['name']))
				{
					$delete = $_GET['deleteBene'];
					$number = $_GET['number'];
					$name = $_GET['name'];


						$sql = "DELETE FROM beneficiary WHERE bene_policyNo = '$delete' AND bene_contactNo = '$number' AND bene_lastName = '$name'";

						if($conn->query($sql))
						{
              ?>
							<script>
								alert("delete record production successfully added");
								window.location = "records.php?edit=<?php echo $delete ?>";
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
