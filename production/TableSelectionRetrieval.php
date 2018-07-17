<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "tgpdso_db";

  $con = mysqli_connect($servername, $username, $password, $dbname);
  $receiptNo1 = (isset($_POST['receiptNo']))? $_POST['receiptNo']:null;
  if($receiptNo1)
  {
    $query = mysql_query("SELECT * FROM production WHERE receiptNo = $receiptNo1");
    while($row = mysql_fetch_array($query))
    {
      $lastN = $row['lastName'];
    }
  }

 ?>
