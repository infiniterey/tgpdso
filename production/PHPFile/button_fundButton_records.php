<?php
include 'PHPFile/Connection_Database.php';

if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
	if(isset($_REQUEST['saveThisFund']))
	{
		$add = $_REQUEST['edit'];
		$fundID = $_REQUEST['setFundID'];
		$rate = $_REQUEST['setFundRate'];
		$number = $_REQUEST['addText'];

		$add = $_REQUEST['edit'];
		$fundIdentify = $_REQUEST['fund'];
		$rateIdentify = $_REQUEST['rate'];

		$totalRate = $rate + $number;

		$query = "SELECT * FROM policyFund WHERE polFund_policyNo = '$add' AND polFund_fund = '$fundIdentify' AND polFund_rate = '$rateIdentify'";
		$data = mysqli_query($conn, $query);
		$result = mysqli_num_rows($data);
			if($result == 1)
			{
				if($rate > "100")
				{
					?>
					<script>
						alert('Does not accept the rate that less than the value given');
						window.location="records.php?edit=<?php echo $add ?>&#fundModal";
					</script>
					<?php
					return;
				}
				if($totalRate > "100")
				{
					?>
					<script>
						alert('Greater than maximum rate cannot be not accept');
						window.location="records.php?edit=<?php echo $add ?>&#fundModal";
					</script>
					<?php
					return;
				}
				$sql = "UPDATE policyFund SET polFund_policyNo = '$add', polFund_fund = '$fundID', polFund_rate = '$rate' WHERE polFund_policyNo = '$add' AND polFund_fund = '$fundIdentify'";

				if($conn->query($sql))
				{
					?>
					<script>
						alert("Update plan successfully added");
						window.location="records.php?edit=<?php echo $add ?>&#fundModal";
					</script>
						<?php
				}
				else
				{
					echo "Error:". $sql."<br>".$conn->error;
				}
				$conn->close();
			}
			else if($result == 0)
			{
				if($rate > "100")
				{
					?>
					<script>
						alert('Does not accept the rate that less than the value given');
						window.location="records.php?edit=<?php echo $add ?>&#fundModal";
					</script>
					<?php
					return;
				}
				if($totalRate > "100")
				{
					?>
					<script>
						alert('Greater than maximum rate cannot be not accept');
						window.location="records.php?edit=<?php echo $add ?>&#fundModal";
					</script>
					<?php
					return;
				}

				$sql = "INSERT INTO policyFund (polFund_policyNo, polFund_fund, polFund_rate)
				values ('$add','$fundID','$rate')";
				echo "<meta http-equiv='refresh' content='0'>";

					if($conn->query($sql))
					{
						?>
						<script>
							alert("New plan successfully added");
							window.location="records.php?edit=<?php echo $add ?>&#fundModal";
						</script>
							<?php
					}
					else
					{
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
			}
	}
}

?>

<?php
include 'PHPFile/Connection_Database.php';

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
					?>
					<script>
					$(document).ready(function () {
						$('#fundModal').modal('show');
					});</script>
					<?php
				$conn->close();
		}
		else if(isset($_GET['deleteFund']) && isset($_GET['fund']))
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
		else {
		}
}
	?>



	<!--  Automated Save-->
