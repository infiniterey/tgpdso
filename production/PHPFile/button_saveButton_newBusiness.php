<?php

  $edit_state = false;

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

  $policyNo1 = filter_input(INPUT_POST, 'policyNo1');

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "tgpdso_db";


  if(!empty($policyNo))
  {
    if(!empty($receiptNo))
    {

      $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['SaveButton']))
				{
					if($_POST['receiptNo'] == $_POST['receiptNo1'])
					{
						?>
						<script>
						alert('The data is already inserted, kindly submit a non-duplicate data before saving');
						window.location="newBusiness.php";
						</script>
						<?php
					}
					else {

						$sql = "INSERT INTO production (transDate, prodclientID, policyNo, plan, receiptNo, faceAmount, premium, rate, modeOfPayment, agent, remarks, FYC, policyStat)
						values ('$transDate', '$clientID', '$policyNo', '$plan', '$receiptNo', '$faceAmount', '$premium', '$rate', '$modeOfPayment', '$agent', '$remarks', '$fyc', '1')";

						if($conn->query($sql))
						{
							?>
							<script>
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
    }
	}
    else
    {
      echo "Password should not be empty";
      die();
    }
  }
  else
   {
     echo "Username should not be empty";
     die();
   }

?>
