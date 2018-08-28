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
