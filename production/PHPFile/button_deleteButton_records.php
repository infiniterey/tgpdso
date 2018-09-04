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
			if(isset($_GET['deletePayment']))
			{
				$delete = $_GET['deletePayment'];

				$sql = "DELETE FROM payment WHERE payment_policyNo = '$delete'";

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
