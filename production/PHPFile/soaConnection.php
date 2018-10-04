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


$(document).ready(function() {
    $('#datatable-fixed-header009').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

$(document).ready(function() {
    $('#datatable-fixed-header087').DataTable( {
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
$(document).ready(function() {
		$('#datatable-fixed-header09').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );
} );

$(document).ready(function() {
		$('#datatable-fixed-header11').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );
} );
$(document).ready(function() {
		$('#datatable-fixed-header12').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
		} );
} );

$(document).ready(function() {
    $('#datatable-fixed-header81').DataTable( {
        "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );


  $(document).ready(function() {
      $('#datatable-fixed-header001').DataTable( {
          "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]]
      } );
  } );

  $(document).ready(function() {
      $('#datatable-fixed-header089').DataTable( {
          "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "All"]]
      } );
  } );
function viewCheckbox() {

  var checkBox = document.getElementById("soaCheckBox");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    document.getElementById("addThis").disabled = true;
    document.getElementById('tableFront').style.display = "none";
    document.getElementById('tableView').style.display = "block";
  } else {
    
    document.getElementById("addThis").disabled = false;
    document.getElementById('tableFront').style.display = "block";
    document.getElementById('tableView').style.display = "none";
  }

}
// function clickClosetos(){
//
//   window.location = "soa.php";
// }
// function clickClose(){
//
//   document.getElementById('tableFront').style.display = "none";
//   document.getElementById('tableView').style.display = "block";
// }



</script>
<?php
include 'PHPFile/Connection_Database.php';

if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
		if(isset($_GET['update']))
		{
				$edit = $_GET['update'];

					$sql=mysqli_query($conn,"SELECT * from production, client, agents WHERE agentCode = agent AND clientID = prodclientID AND policyNo = '$edit'");

					while($row=mysqli_fetch_Array($sql))
					{
						?>
						<script> document.getElementById('soa_policyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('soa_transDate').value = '<?php echo $row['transDate'];?>';</script>
            <script> document.getElementById('soa_client').value = '<?php echo $row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']?>';</script>
						<script> document.getElementById('soa_name').value = '<?php echo $row['prodclientID'];?>';</script>
						<script> document.getElementById('soa_issueDate').value = '<?php echo $row['issuedDate'];?>';</script>
            <script> document.getElementById('soaMOP').value = '<?php echo $row['modeOfPayment'];?>';</script>
						<script> document.getElementById('soa_premium').value = '<?php echo $row['premium'];?>';</script>
						<script> document.getElementById('soa_rate').value = '<?php echo $row['rate'];?>';</script>
						<script> document.getElementById('soa_commission').value = '<?php echo $row['FYC'];?>';</script>
            <script> document.getElementById('soa_agent').value = '<?php echo $row['agentCode'];?>';</script>
            <script> document.getElementById('soa_agentname').value = '<?php echo $row['agentLastname'].", ".$row['agentFirstname']." ".$row['agentMiddlename']?>';</script>

					<?php

				}
        ?>
        <script>
          window.location="soa.php?update=<?php echo $update ?>&#addSOAModal";
        </script>
        <?php
				$conn->close();
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
		if(isset($_REQUEST['edit']))
		{
				$edit = $_REQUEST['edit'];

					$sql=mysqli_query($conn,"SELECT * from production, payment, client, agents, plans WHERE planID = plan AND policyNo = payment_policyNo AND agentCode = agent AND clientID = prodclientID AND policyNo = '$edit'");


					while($row=mysqli_fetch_Array($sql))
					{
						?>
						<script> document.getElementById('soa_policyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('soa_transDate').value = '<?php echo $row['transDate'];?>';</script>
            <script> document.getElementById('soa_client').value = '<?php echo $row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']?>';</script>
						<script> document.getElementById('soa_name').value = '<?php echo $row['prodclientID'];?>';</script>
						<script> document.getElementById('soa_issueDate').value = '<?php echo $row['issuedDate'];?>';</script>
            <script> document.getElementById('soaMOP').value = '<?php echo $row['modeOfPayment'];?>';</script>
						<script> document.getElementById('soa_premium').value = '<?php echo $row['premium'];?>';</script>
						<script> document.getElementById('soa_rate').value = '<?php echo $row['rate'];?>';</script>
						<script> document.getElementById('soa_commission').value = '<?php echo $row['FYC'];?>';</script>
            <script> document.getElementById('soa_agent').value = '<?php echo $row['agentCode'];?>';</script>
            <script> document.getElementById('soa_agentname').value = '<?php echo $row['agentLastname'].", ".$row['agentFirstname']." ".$row['agentMiddlename']?>';</script>
            <script> document.getElementById('soa_dueDate').value = '<?php echo $row['payment_dueDate'];?>';</script>
            <script> document.getElementById('soa_plan').value = '<?php echo $row['planCode'];?>';</script>
            <script> document.getElementById('soa_planID').value = '<?php echo $row['planID'];?>';</script>
					<?php
				}
        ?>
          <script>
          $(document).ready(function () {
            $('#addSOAModal').modal('show');
          });</script>
        <?php
				$conn->close();
	}
}
?>

<?php
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['soaSave']))
				{
          $soaPlan = $_POST['soa_planID'];
          $soaDate = $_POST['soa_date'];
          $soaPolicyNo = $_POST['soa_policyNo'];
          $soaTransDate = $_POST['soa_transDate'];
          $soaName = $_POST['soa_name'];
          $soaIssueDate = $_POST['soa_issueDate'];
          $soaMOP = $_POST['soaMOP'];
          $soaPremium = $_POST['soa_premium'];
          $soaRate = $_POST['soa_rate'];
          $soaCommission = $_POST['soa_commission'];
          $soaAgent = $_POST['soa_agent'];
          $soaSelectMonth = $_POST['soa_select'];
          $soadueDate = $_POST['soa_dueDate'];


					$sql = "INSERT INTO soa (SOA_plan, SOA_transDate, SOA_policyOwner, SOA_policyNo, SOA_paymentMode, SOA_premium, SOA_rate, SOA_commission,
          SOA_agent, SOA_date, SOA_selectMonth, SOA_dueDate)
					values ('$soaPlan', '$soaTransDate', '$soaName', '$soaPolicyNo', '$soaMOP', '$soaPremium', '$soaRate','$soaCommission', '$soaAgent', '$soaDate', '$soaSelectMonth', '$soadueDate')";

						if($conn->query($sql))
						{
							?>
							<script>
                window.location="soa.php";
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
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['soaSave']))
				{

          $soadate = $_POST['soa_date'];

					$sql = "UPDATE production SET
					SOAdate = '$soadate'
          WHERE policyNo = '$soaPolicyNo'";

						if($conn->query($sql))
						{
							?>
							<script>
                window.location="soa.php";
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
include 'PHPFile/Connection_Database.php';

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
