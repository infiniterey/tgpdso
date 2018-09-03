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

					$result=mysqli_query($conn,"SELECT * from payment, production WHERE dueDate = payment_nextDue AND policyNo = payment_policyNo AND policyNo = '$edit'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('paymentPolicyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('paymentAmount').value = '<?php echo $row['faceAmount'];?>';</script>
						<script> document.getElementById('paymentIssueDate').value = '<?php echo $row['issuedDate'];?>';</script>
						<script> document.getElementById('paymentmodeOfPayment').value = '<?php echo $row['modeOfPayment'];?>';</script>
						<script> document.getElementById('paymentTransDate').value = '<?php echo $row['transDate'];?>';</script>
						<script> document.getElementById('paymentORNo').value = '<?php echo $row['receiptNo'];?>';</script>
						<script> document.getElementById('paymentNextDue').value = '<?php echo $row['payment_nextDue'];?>';</script>
					<?php
				}
				$conn->close();
	}
}
?>
