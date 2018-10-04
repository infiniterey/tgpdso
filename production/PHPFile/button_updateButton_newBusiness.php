<?php
$transDate = filter_input(INPUT_POST, 'transDate');
$clientID = filter_input(INPUT_POST, 'clientIDModal');
$policyNo = filter_input(INPUT_POST, 'policyNo');
$receiptNo = filter_input(INPUT_POST, 'receiptNo');
$faceAmount = filter_input(INPUT_POST, 'faceAmount');
$premium = filter_input(INPUT_POST, 'premium');
$rate = filter_input(INPUT_POST, 'rate');
$modeOfPayment = filter_input(INPUT_POST, 'modeOfPayment');
$agent = filter_input(INPUT_POST, 'agentCode');
$remarks = "New";
$plan = filter_input(INPUT_POST, 'planCodePass');
$fyc = filter_input(INPUT_POST, 'fyc');
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tgpdso_db";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else {
	if(isset($_POST['UpdateButton']))
	{

		$sql = "UPDATE production SET
		transDate='$transDate',
		prodclientID='$clientID',
		policyNo='$policyNo',
		plan='$plan',
		premium='$premium',
		receiptNo='$receiptNo',
		faceAmount='$faceAmount',
		rate='$rate',
		modeOfPayment='$modeOfPayment',
		agent='$agent',
		remarks='$remarks'
		WHERE policyNo = '$policyNo' OR receiptNo = '$receiptNo'";



		if($conn->query($sql))
		{
			?>
			<script>
				alert("Record production successfully updated");
				window.location = 'newBusiness.php';
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
