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

					$result=mysqli_query($conn,"SELECT * from production, agents, plans, client WHERE plan = planID AND clientID = prodclientID AND agentCode = agent AND prodID = '$edit'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('client').value = '<?php echo $row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename'];?>';</script>
						<script> document.getElementById('policyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('policyNo1').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('receiptNo').value = '<?php echo $row['receiptNo'];?>';</script>
						<script> document.getElementById('receiptNo1').value = '<?php echo $row['receiptNo'];?>';</script>
						<script> document.getElementById('faceAmount').value = '<?php echo $row['faceAmount'];?>';</script>
						<script> document.getElementById('premium').value = '<?php echo $row['premium'];?>';</script>
						<script> document.getElementById('rate').value = '<?php echo $row['rate'];?>';</script>
						<script> document.getElementById('agentCode').value = '<?php echo $row['agent'];?>';</script>
						<script> document.getElementById('agent').value = '<?php echo $row['agentLastname'].",".$row['agentFirstname'];?>';</script>
						<script> document.getElementById('remarks').value = '<?php echo $row['remarks'];?>';</script>
						<script> document.getElementById('transDate').value = '<?php echo $row['transDate'];?>';</script>
						<script> document.getElementById('plan').value = '<?php echo $row['planCode'];?>';</script>
						<script> document.getElementById('planCodePass').value = '<?php echo $row['planID'];?>';</script>
						<script> document.getElementById('clientIDModal').value = '<?php echo $row['clientID'];?>';</script>
						<script> document.getElementById('fyc').value = '<?php echo $row['FYC'];?>';</script>


					<?php
				};

			?>
			<script>
										$('#SaveButton').hide();
										$('#UpdateButton').show();
			</script>
			<?php
	}
}

?>
