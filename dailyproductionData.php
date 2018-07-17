<?php

  $transDate = filter_input(INPUT_POST, 'transDate');
  $lastName = filter_input(INPUT_POST, 'firstname');
  $firstName = filter_input(INPUT_POST, 'lastname');
  $policyNo = filter_input(INPUT_POST, 'policyNo');
  $receiptNo = filter_input(INPUT_POST, 'receiptNo');
  $faceAmount = filter_input(INPUT_POST, 'faceAmount');
  $premium = filter_input(INPUT_POST, 'premium');
  $rate = filter_input(INPUT_POST, 'rate');
  $modeOfPayment = filter_input(INPUT_POST, 'modeOfPayment');
  $agent = filter_input(INPUT_POST, 'agent');
  $remarks = filter_input(INPUT_POST, 'remarks');
  $plan = filter_input(INPUT_POST, 'plan');


  if(!empty($lastName))
  {
    if(!empty($firstName))
    {
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
        $sql = "INSERT INTO production (transDate, lastName, firstName, policyNo, receiptNo, faceAmount, premium, rate, modeOfPayment, agent, remarks)
        values ('$transDate', '$lastName', '$firstName', '$policyNo', '$receiptNo', '$faceAmount', '$premium', '$rate', '$modeOfPayment', '$agent', '$remarks')";

        if($conn->query($sql))
        {
          ?>
          <script>
            alert("New record production successfully added");
            window.location = 'home.php';
            </script>
            <?php
        }
        else {
          echo "Error:". $sql."<br>".$conn->error;
        }
        $conn->close();
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
