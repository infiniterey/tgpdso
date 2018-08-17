
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
						if($row['issuedDate'] == '0000-00-00')
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
			$conn->close();
	}
	else if(isset($_GET['editBene']) && isset($_GET['number']))
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

			$conn->close();

		?>
		<script>

		</script>
		<?php
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

			?>
			<script>

			</script>
			<?php
	}
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
			else if(isset($_GET['deletePayment']) && (isset($_GET['paymentReceiptNo'])))
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
				if(isset($_POST['addBeneficiaryButton']))
				{
					$beneLastname = $_POST['beneLastName'];
					$beneFirstname = $_POST['beneFirstName'];
					$beneMiddlename = $_POST['beneMiddleName'];
					$beneBirthday = $_POST['beneBirthday'];
					$beneAddress = $_POST['beneAddress'];
					$beneContact = $_POST['beneContact'];
					$beneRelationship = $_POST['beneRelationship'];
					$add = $_POST['policyNoOwner'];


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
				if(isset($_POST['saveButton']))
				{
					$clientID = $_POST['clientToRetrieve'];
					$lastname = $_POST['lastname1'];
					$firstname = $_POST['firstname1'];
					$middlename = $_POST['middlename1'];
					$birthdate = $_POST['birthdate1'];
					$address = $_POST['address1'];
					$contactno = $_POST['contactno1'];

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
				if(isset($_POST['saveButton']))
				{
					$policyNo = $_POST['policyNoOwner'];
					$plan = $_POST['policyPlan'];
					$faceAmount = $_POST['policyFaceAmount'];
					$MOP = $_POST['policyMOP'];
					$issueDate = $_POST['policyIssueDate'];
					$premium = $_POST['policyPremium'];
					$policyStatus = $_POST['policyStatusSelect'];

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
				if(isset($_POST['saveButton']))
				{
					$insuredLastname = $_POST['insuredLastName'];
					$insuredFirstname = $_POST['insuredFirstName'];
					$insuredMiddlename = $_POST['insuredMiddleName'];
					$insuredBirthdate = $_POST['insuredBirthdate'];
					$insuredAddress = $_POST['insuredAddress'];
					$insuredContact = $_POST['insuredContactno'];
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
				if(isset($_POST['saveThisFund']))
				{

					$add = $_GET['edit'];
					$fundID = $_POST['setFundID'];
					$rate = $_POST['setFundRate'];

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



<script>

$(document).ready(function () {
    $('#policyIssueDate').datepicker();
    $('#policyDueDate').datepicker();
});

$(function() {

		$('#paymentmodeOfPayment').change(function()
		{
			var selectPayment = $("#paymentmodeOfPayment").val();
			if(selectPayment == "Monthly")
			{
				document.getElementById("policyMOP").value = selectPayment;
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(1);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
			else if(selectPayment == "Quarterly")
			{
				document.getElementById("policyMOP").value = selectPayment;
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(4);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
			else if(selectPayment == "Semi-Annual")
			{
				document.getElementById("policyMOP").value = selectPayment;
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(6);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
			else if(selectPayment == "Annual")
			{
				document.getElementById("policyMOP").value = selectPayment;
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(12);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
		});
    $('#policyMOP').change(function() {
        var selectedValue = $("#policyMOP").val();
				if(selectedValue == "Monthly")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(1);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Quarterly")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(4);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Semi-Annual")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(6);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Annual")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(12);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
    });

		$('#policyIssueDate').change(function() {
			var getter = document.getElementById("policyIssueDate").value;
			var dat = new Date(getter);
			var copyOf = new Date(dat.valueOf());

			$('#policyDueDate').val(copyof);
    });
				$('#sample').val(selectedValue);

});




window.onload = function () {
								startTab();
							};

function startTab() {
								document.getElementById("defaultOpen").click();
							}

function openPolicy(evt, tabName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the link that opened the tab
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

						function myFunction() {

						  var input, filter, table, tr, td, i;
						  input = document.getElementById("myInput");
						  filter = input.value.toUpperCase();
						  table = document.getElementById("datatable-fixed-header");
						  tr = table.getElementsByTagName("tr");


						  for (i = 0; i < tr.length; i++) {
						    td = tr[i].getElementsByTagName("td")[0];
						    if (td) {
						      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
						        tr[i].style.display = "";
						      } else {
						        tr[i].style.display = "none";
						      }
						    }
						  }
						}

						$(document).ready(function() {
								$('#datatable-fixed-header0').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

						$(document).ready(function() {
								$('#datatable-fixed-header').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );
						$(document).ready(function() {
								$('#datatable-fixed-header1').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );
						$(document).ready(function() {
								$('#datatable-fixed-header-1').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

						$(document).ready(function() {
								$('#datatable-fixed-header10').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

						$(document).ready(function() {

  					if(window.location.href.indexOf('#fundModal') != -1) {
    				$('#fundModal').modal('show');
  					}
					});

					function boxChecked() {
  					var checkBox = document.getElementById("box");
  					var firstname = document.getElementById("firstname1").value;
						var lastname = document.getElementById("lastname1").value;
						var middlename = document.getElementById("middlename1").value;
						var birthdate = document.getElementById("birthdate1").value;
						var address = document.getElementById("address1").value;
						var contactno = document.getElementById("contactno1").value;


  						if (checkBox.checked == true)
								{
									document.getElementById("insuredLastName").value = lastname;
									document.getElementById("insuredFirstName").value = firstname;
									document.getElementById("insuredMiddleName").value = middlename;
									document.getElementById("insuredBirthdate").value = birthdate;
									document.getElementById("insuredAddress").value = address;
									document.getElementById("insuredContactno").value = contactno;
  							}
								else
									{
										document.getElementById("insuredLastName").value = "";
										document.getElementById("insuredFirstName").value = "";
										document.getElementById("insuredMiddleName").value = "";
										document.getElementById("insuredBirthdate").value = "";
										document.getElementById("insuredAddress").value = "";
										document.getElementById("insuredContactno").value = "";
  								}
								}

								$(document).ready(function() {
								    $('#datatable-fixed-header2').DataTable( {
								        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								    } );
								} );


								$(document).ready(function(){
									if(!$('#policyIssuedDate').val()){
									    $('#paymentButton').show();
									}
									else {
									    $('#paymentButton').show();
									}
								});

								document.getElementById("beneLastName").addEventListener("keyup", function() {
    						var nameInput = document.getElementById('beneLastName').value;
    						if (nameInput != "")
								{
        					document.getElementById('addBeneficiaryButton').removeAttribute("disabled");
    						}
								else
								{
        					document.getElementById('addBeneficiaryButton').setAttribute("disabled", null);
    						}
							});

							$('#searchT').on("keypress", function(e) {
        			if (e.keyCode == 13) {
								var searchValue = document.getElementById('searchT').value;
								window.location="records.php?edit="+searchValue+"";
        				}
							});



</script>
