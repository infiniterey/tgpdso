<?php
include 'PHPFile/Connection_Database.php'

if(mysqli_connect_error())
{
  die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
  $query = "SELECT * FROM production, payment WHERE policyNo = payment_policyNo";
  $data = mysqli_query($conn, $query);
  $result = mysqli_num_rows($data);
  if($result == 1)
  {

  }
}



?>
