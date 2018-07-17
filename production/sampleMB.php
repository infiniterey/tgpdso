
<html>
<head>

</head>
<body>
<form action="sampleMB.php" method="get">


  <br>
  <br>
  <input type="text" name="policyNo" id="policyNo" value=""><br>
  <br>
  <script>
  if(!empty('policyNo'))
  {
    return;
  }
  </script>
</form>

<footer>
  <div>
  <input type="text" name="firstName" id="firstName" value=""><br>
  <input type="text" name="lastname" id="lastname" value=""><br>

  <input type="text" name="policyNO" id="policyNO" value=""><br>

  <input type="text" name="receiptNo" id="receiptNo" value=""><br>
  </div>
</footer>

</body>
</html>
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
    if(isset($_GET['policyNo']))
    {
      $policyNo = $_GET['policyNo'];

        $result=mysqli_query($conn,"select * from production WHERE policyNo = '$policyNo'");

        while($row=mysqli_fetch_Array($result))
        {
          ?>
          <script> document.getElementById('firstName').value = '<?php echo $row['firstName'];?>';</script>
          <script> document.getElementById('lastname').value = '<?php echo $row['lastName'];?>';</script>
          <script> document.getElementById('policyNo').value = '<?php echo $row['policyNo'];?>';</script>
          <script> document.getElementById('policyNO').value = '<?php echo $row['policyNo'];?>';</script>
          <script> document.getElementById('receiptNo').value = '<?php echo $row['receiptNo'];?>';</script>
        <?php
      };
  }
}

?>
