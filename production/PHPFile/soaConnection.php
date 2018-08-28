<script>
$(document).ready(function() {
    $('#datatable-fixed-header0').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

</script>
<script>

$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

</script>

<script>
$(document).ready(function() {
		$('#datatable-fixed-header03').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );
} );
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

					$sql=mysqli_query($conn,"SELECT * from production, client, agents WHERE agentCode = agent AND clientID = prodclientID AND policyNo = '$edit'");

					while($row=mysqli_fetch_Array($sql))
					{
						?>
						<script> document.getElementById('soa_policyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('soa_transDate').value = '<?php echo $row['transDate'];?>';</script>
						<script> document.getElementById('soa_name').value = '<?php echo $row['prodclientID'];?>';</script>
						<script> document.getElementById('soa_issueDate').value = '<?php echo $row['issuedDate'];?>';</script>
            <script> document.getElementById('soaMOP').value = '<?php echo $row['modeOfPayment'];?>';</script>
						<script> document.getElementById('soa_premium').value = '<?php echo $row['premium'];?>';</script>
						<script> document.getElementById('soa_rate').value = '<?php echo $row['rate'];?>';</script>
						<script> document.getElementById('soa_commission').value = '<?php echo $row['FYC'];?>';</script>
            <script> document.getElementById('soa_agent').value = '<?php echo $row['agentCode'];?>';</script>
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
				if(isset($_POST['soaSave']))
				{

          $soaDate = $_POST['soa_soaDate'];
          $soaPolicyNo = $_POST['soa_policyNo'];
          $soaTransDate = $_POST['soa_transDate'];
          $soaName = $_POST['soa_name'];
          $soaIssueDate = $_POST['soa_issueDate'];
          $soaMOP = $_POST['soaMOP'];
          $soaPremium = $_POST['soa_premium'];
          $soaRate = $_POST['soa_rate'];
          $soaCommission = $_POST['soa_commission'];
          $soaAgent = $_POST['soa_agent'];


					$sql = "INSERT INTO soa (SOA_transDate, SOA_policyOwner, SOA_policyNo, SOA_paymentMode, SOA_premium, SOA_rate, SOA_commission,
          SOA_agent, SOA_date)
					values ('$soaTransDate', '$soaName', '$soaPolicyNo', '$soaMOP', '$soaPremium', '$soaRate','$soaCommission', '$soaAgent', '$soaDate')";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
                window.location="soa.php?edit=<?php echo $soaPolicyNo ?>"
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
				if(isset($_POST['soaSave']))
				{

          $soaDate = $_POST['soa_soaDate'];
          $soaPolicyNo = $_POST['soa_policyNo'];
          $soaTransDate = $_POST['soa_transDate'];
          $soaName = $_POST['soa_name'];
          $soaIssueDate = $_POST['soa_issueDate'];
          $soaMOP = $_POST['soaMOP'];
          $soaPremium = $_POST['soa_premium'];
          $soaRate = $_POST['soa_rate'];
          $soaCommission = $_POST['soa_commission'];
          $soaAgent = $_POST['soa_agent'];

          $sql = "UPDATE soa
          SET  SOA_transDate = '$soaTransDate',
          SOA_policyOwner = '$soaName',
          SOA_policyNo = '$soaPolicyNo',
          SOA_paymentMode = '$soaMOP',
          SOA_premium = '$soaPremium',
          SOA_rate = '$soaRate',
          SOA_commission = '$soaCommission',
          SOA_agent = $soaAgent
          SOA_date = $soaDate
          WHERE    SOA_policyNo = '$soaPolicyNo'";
          
						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
                window.location="soa.php?edit=<?php echo $soaPolicyNo ?>"
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
