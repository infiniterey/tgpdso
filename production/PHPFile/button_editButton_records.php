<?php
include 'PHPFile/Connection_Database.php';

if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
		if(isset($_GET['edit']))
		{
				$edit = $_GET['edit'];

					$result=mysqli_query($conn,"SELECT * from payment, production WHERE payment_policyNo = policyNo AND policyNo = '$edit' AND payment_nextDue = dueDate");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('paymentDueDate').value = '<?php echo $row['payment_dueDate'];?>';</script>
						<script>var selectedValue = document.getElementById('policyMOP').value;</script>
						<script> document.getElementById('sampleDueDate').value = '<?php echo $row['payment_nextDue'];?>';</script>
						<script>
						var selectedValue = document.getElementById('policyMOP').value;
						if(selectedValue == "Monthly")
						{
							var datehere = document.getElementById("sampleDueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(1);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						else if(selectedValue == "Quarterly")
						{
							var datehere = document.getElementById("sampleDueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(4);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						else if(selectedValue == "Semi-Annual")
						{
							var datehere = document.getElementById("sampleDueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(6);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						else if(selectedValue == "Annual")
						{
							var datehere = document.getElementById("sampleDueDate").value;
							var dateObj = new Date(datehere);
							var dt = dateObj.addMonths(12);
							var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
							$('#policyDueDate').val(newdate);
							$('#paymentNextDue').val(newdate);
						}
						</script>
						<?php
					}
				}
				$conn->close();
	}
?>



<?php
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_GET['edit']))
				{
					$data = $_GET['edit'];
          $query = "SELECT * FROM insuredpolicy, production WHERE policyNo = insured_policyNo AND policyNo = '$edit'";
          $data = mysqli_query($conn, $query);
          $result = mysqli_num_rows($data);
					?><script>alert('hi <?php echo $data?>');</script><?
          if($result == 1)
          {
						$sql=mysqli_query($conn,"SELECT * from production, client, policystatus, insuredpolicy, plans WHERE insured_policyNo = policyNo AND plan = planID AND clientID = prodclientID AND policyStat = policyID AND policyNo = '$edit'");
						while($row=mysqli_fetch_Array($sql))
						{
							if(!empty((int)$row['issuedDate']))
							{
								?>
								<script>document.getElementById('paymentButton').disabled = false;</script>
								<?php
							}
							else
							{
								?>
								<script>document.getElementById('paymentButton').disabled = true;</script>
								<?php
							}
							?>
							<script> document.getElementById('searchT').value = '<?php echo $row['policyNo'];?>';</script>
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
							<script> document.getElementById('policyDueDate').value = '<?php echo $row['dueDate'];?>';</script>
							<script> document.getElementById('planName').value = '<?php echo $row['planCode'];?>';</script>

							<script> document.getElementById('paymentPolicyNo').value = '<?php echo $row['policyNo'];?>';</script>
							<script> document.getElementById('paymentAmount').value = '<?php echo $row['faceAmount'];?>';</script>
							<script> document.getElementById('paymentIssueDate').value = '<?php echo $row['issuedDate'];?>';</script>

							<script> document.getElementById('paymentTransDate').value = '<?php echo $row['transDate'];?>';</script>
							<script> document.getElementById('paymentORNo').value = '<?php echo $row['receiptNo'];?>';</script>
							<script> document.getElementById('policyRate').value = '<?php echo $row['rate'];?>';</script>
							<script> document.getElementById('sampleDueDate').value = '<?php echo $row['payment_nextDue'];?>';</script>
							<script> document.getElementById('paymentNextDueADD').value = '<?php echo $row['dueDate'];?>';</script>


							<script> document.getElementById('clientToRetrieve').value = '<?php echo $row['clientID'];?>';</script>
							<script> document.getElementById('policyStatusSelect').value = '<?php echo $row['policyID'];?>';</script>
							<script>document.getElementById("fundButton").disabled = false;</script>

							<script> document.getElementById('insuredLastName').value = '<?php echo $row['insured_lastName'];?>';</script>
							<script> document.getElementById('insuredFirstName').value = '<?php echo $row['insured_firstName'];?>';</script>
							<script> document.getElementById('insuredMiddleName').value = '<?php echo $row['insured_middleName'];?>';</script>
							<script> document.getElementById('insuredBirthdate').value = '<?php echo $row['insured_birthdate'];?>';</script>
							<script> document.getElementById('insuredAddress').value = '<?php echo $row['insured_address'];?>';</script>
							<script> document.getElementById('insuredContactno').value = '<?php echo $row['insured_contactNo'];?>';</script>

							<?php
					}
				}
					else if($result == 0)
					{
						$sql=mysqli_query($conn,"SELECT * FROM production, client, policystatus, plans WHERE plan = planID AND clientID = prodclientID AND policyStat = policyID AND policyNo = '$edit'");
						while($row=mysqli_fetch_Array($sql))
						{
						if(!empty((int)$row['issuedDate']))
						{
							?>
							<script>document.getElementById('paymentButton').disabled = false;</script>
							<?php
						}
						else
						{
							?>
							<script>document.getElementById('paymentButton').disabled = true;</script>
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
						<script> document.getElementById('policyDueDate').value = '<?php echo $row['dueDate'];?>';</script>
						<script> document.getElementById('planName').value = '<?php echo $row['planCode'];?>';</script>

						<script> document.getElementById('paymentPolicyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('paymentAmount').value = '<?php echo $row['faceAmount'];?>';</script>
						<script> document.getElementById('paymentIssueDate').value = '<?php echo $row['issuedDate'];?>';</script>
						<script> document.getElementById('paymentmodeOfPayment').value = '<?php echo $row['modeOfPayment'];?>';</script>
						<script> document.getElementById('paymentTransDate').value = '<?php echo $row['transDate'];?>';</script>
						<script> document.getElementById('paymentORNo').value = '<?php echo $row['receiptNo'];?>';</script>
						<script> document.getElementById('policyRate').value = '<?php echo $row['rate'];?>';</script>
						<script> document.getElementById('sampleDueDate').value = '<?php echo $row['payment_nextDue'];?>';</script>
						<script> document.getElementById('paymentNextDue').value = '<?php echo $row['dueDate'];?>';</script>


						<script> document.getElementById('clientToRetrieve').value = '<?php echo $row['clientID'];?>';</script>
						<script> document.getElementById('policyStatusSelect').value = '<?php echo $row['policyID'];?>';</script>
						<script>document.getElementById("fundButton").disabled = false;</script>

						<?php
				}
		}
		$conn->close();
	}
}
