
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
		if(isset($_GET['edit']))
		{
				$edit = $_GET['edit'];

					$result=mysqli_query($conn,"SELECT * from production, client, policystatus WHERE clientID = prodclientID AND policyStat = policyID AND policyNo = '$edit'");

					while($row=mysqli_fetch_Array($result))
					{
						if($row['issuedDate'] == null)
						{
							?>
							<script>document.getElementById('paymentButton').disabled = true;</script>
							<?php
						}
						else
						{
							?>
							<script>document.getElementById('paymentButton').disabled = false;</script>
							<?php
						}
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

						<script> document.getElementById('paymentPolicyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('paymentAmount').value = '<?php echo $row['faceAmount'];?>';</script>
						<script> document.getElementById('paymentIssueDate').value = '<?php echo $row['issuedDate'];?>';</script>
						<script> document.getElementById('paymentmodeOfPayment').value = '<?php echo $row['modeOfPayment'];?>';</script>
						<script> document.getElementById('paymentTransDate').value = '<?php echo $row['transDate'];?>';</script>
						<script> document.getElementById('paymentORNo').value = '<?php echo $row['receiptNo'];?>';</script>
						<script> document.getElementById('policyRate').value = '<?php echo $row['rate'];?>';</script>

						<script> document.getElementById('clientToRetrieve').value = '<?php echo $row['clientID'];?>';</script>
						<script> document.getElementById('policyStatusSelect').value = '<?php echo $row['policyID'];?>';</script>
						<script>document.getElementById("fundButton").disabled = false;</script>

						<script>
						var selectedValue = document.getElementById('policyMOP').value;
						if(selectedValue == "Monthly")
						{
							var datehere = document.getElementById("policyIssueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(1);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						else if(selectedValue == "Quarterly")
						{
							var datehere = document.getElementById("policyIssueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(4);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						else if(selectedValue == "Semi-Annual")
						{
							var datehere = document.getElementById("policyIssueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(6);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						else if(selectedValue == "Annual")
						{
							var datehere = document.getElementById("policyIssueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(12);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						</script>
						<?php
				};

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
		if(isset($_GET['fund']) && isset($_GET['rate']))
		{
				$fund = $_GET['fund'];
				$rate = $_GET['rate'];

					$result=mysqli_query($conn,"SELECT * FROM policyfund, fund WHERE polFund_fund = fundID AND polFund_fund = '$fund' AND polFund_rate = '$rate'");

					while($row=mysqli_fetch_Array($result))
					{
						?>

						<script> document.getElementById('setFundID').value = '<?php echo $row['fundID'];?>';</script>
						<script> document.getElementById('setFundName').value = '<?php echo $row['fundName'];?>';</script>
						<script> document.getElementById('setFundRate').value = '<?php echo $row['polFund_rate'];?>';</script>
						<script>
						</script>
					<?php
				}
				$conn->close();

			?>
			<script>

			</script>
			<?php
	}
}
	?>

<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->
<!--

-->

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
		if(isset($_GET['edit']))
		{
				$edit = $_GET['edit'];

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

<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->


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
			if(isset($_GET['deletePayment']) && (isset($_GET['paymentReceiptNo'])))
			{
				$delete = $_GET['deletePayment'];
				$receiptNo = $_GET['paymentReceiptNo'];

				$sql = "DELETE FROM payment WHERE payment_policyNo = $delete AND payment_OR = $receiptNo";

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

<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->

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
				if(isset($_POST['saveButton']))
				{
					$add = $_POST['policyNoOwner'];

						$sql = "DELETE FROM insuredpolicy WHERE insured_policyNo = '$add'";

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
-->

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

<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->

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

						$sql = "UPDATE production
						SET policyNo = '$policyNo',
						plan = '$plan',
						faceAmount = '$faceAmount',
						modeOfPayment = '$MOP',
						issuedDate = '$issueDate',
						premium = '$premium',
						policyStat = '$policyStatus'
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

<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->

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
				if(isset($_REQUEST['saveThisFund']))
				{

					$add = $_REQUEST['edit'];
					$fundID = $_REQUEST['setFundID'];
					$rate = $_REQUEST['setFundRate'];

					$sql = "INSERT INTO policyFund (polFund_policyNo, polFund_fund, polFund_rate)
					values ('$add','$fundID','$rate')";
					echo "<meta http-equiv='refresh' content='0'>";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
								window.location="records.php?edit=<?php echo $add ?>&#fundModal";
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
				if(isset($_GET['deleteFund']) && isset($_GET['fund']))
				{
					$delete = $_GET['deleteFund'];
					$fund = $_GET['fund'];

					$sql = "DELETE FROM policyFund WHERE polFund_policyNo = '$delete' AND polFund_fund = '$fund'";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("Delete fund successfully");
								window.location="records.php?edit=<?php echo $delete ?>&#fundModal";
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


<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->

<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->
