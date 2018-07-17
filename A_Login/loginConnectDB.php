<?php

  $transDate = filter_input(INPUT_POST, 'transDate');
  $lastName = filter_input(INPUT_POST, 'firstname');
  $firstName = filter_input(INPUT_POST, 'lastname');

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
        $sql = "INSERT INTO production (transDate, lastName, firstName)
        values ('$transDate', '$lastName', '$firstName')";

        if($conn->query($sql))
        {
          echo "New record is inserted successfully";
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
