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
		if(isset($_GET['policyNo1']))
		{
			$policyNo = $_GET['policyNo1'];

				$result=mysqli_query($conn,"select * from production WHERE policyNo = '$policyNo'");

				while($row=mysqli_fetch_Array($result))
				{
					?>

					<script> document.getElementById('firstname').value = '<?php echo $row['firstName'];?>';</script>
					<script> document.getElementById('lastname').value = '<?php echo $row['lastName'];?>';</script>
					<script> document.getElementById('policyNo').value = '<?php echo $row['policyNo'];?>';</script>
					<script> document.getElementById('policyNO').value = '<?php echo $row['policyNo'];?>';</script>
					<script> document.getElementById('receiptNo').value = '<?php echo $row['receiptNo'];?>';</script>
					<script> document.getElementById('faceAmount').value = '<?php echo $row['faceAmount'];?>';</script>
					<script> document.getElementById('premium').value = '<?php echo $row['premium'];?>';</script>
					<script> document.getElementById('rate').value = '<?php echo $row['rate'];?>';</script>
					<script> document.getElementById('agent').value = '<?php echo $row['agent'];?>';</script>
					<script> document.getElementById('remarks').value = '<?php echo $row['remarks'];?>';</script>
					<script> document.getElementById('transDate').value = '<?php echo $row['transDate'];?>';</script>
				<?php
			}
	}
}

?>
