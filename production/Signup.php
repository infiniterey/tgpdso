<?php
  $username = filter_input(INPUT_POST, 'username');
  $password = filter_input(INPUT_POST, 'password');
  $cpassword = filter_input(INPUT_POST, 'cpassword');
    $firstname = filter_input(INPUT_POST, 'firstname');
      $lastname = filter_input(INPUT_POST, 'lastname');
        $middlename = filter_input(INPUT_POST, 'middlename');
          $address = filter_input(INPUT_POST, 'address');
            $contactno = filter_input(INPUT_POST, 'contactno');
              $usertype = filter_input(INPUT_POST, 'usertype');
                $teamselect = filter_input(INPUT_POST, 'teamselect');
                $gender = filter_input(INPUT_POST, 'gender');


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
                      if(isset($_POST['confirm']))
                      {


                          $sql = "INSERT INTO users (username, password, ufirstname, ulastname, umiddlename, uaddress, ucontactno, uusertype, uteam, ugender)
                          values ('$username', '$password', '$firstname', '$lastname', '$middlename', '$address', '$contactno', '$usertype', '$teamselect', '$gender')";

                          if($conn->query($sql))
                          {
                            ?>
                            <script>
                              alert("Your account is now registered!");
                              window.location = 'index.php';
                              </script>
                              <?php
                          }
                          else {
                            echo "Error:". $sql."<br>".$conn->error;
                          }
                          $conn->close();
}}
 ?>

<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "tgpdso_db";

  $connect = mysqli_connect($hostname, $username, $password, $databaseName);
  $query = "SELECT * FROM team";

  $result = mysqli_query($connect, $query);
  $options = "";

  while($row = mysqli_fetch_Array($result))
  {
      $options = $options."<option>$row[1]</option>";
  };
?>

<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "tgpdso_db";

  $connect = mysqli_connect($hostname, $username, $password, $databaseName);
  $query = "SELECT * FROM usertype";

  $result = mysqli_query($connect, $query);
  $optionsUserType = "";
  $optionsUserTypeStatus = "";

  while($row = mysqli_fetch_array($result))
  {
      $optionsUserType = $optionsUserType."<option>$row[1]</option>";
  };
?>

<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $databaseName = "tgpdso_db";

  if(isset($_POST['userType']))
  {
  $connect = mysqli_connect($hostname, $username, $password, $databaseName);
  $query = "SELECT usertypeStatus FROM usertype WHERE usertypeName = $userType";

  $result = mysqli_query($connect, $query);
  $optionsUserTypeStatus = "";

  while($row = mysqli_fetch_Array($result))
  {

      echo '<input name="sample" type="text" id="sample" value="sample">';

  };
}
?>


<!--
<?php

  $connect = mysqli_connect("localhost", "root", "", "tgpdso_db");
  $output = '';

  if(isset($_POST["usertype"]))
  {
    if($_POST["usertype"] != '')
    {
        $sql = "SELECT * FROM usertype WHERE usertypeName = '".$_POST["usertype"]."'";
    }
    else
    {
        $sql = "SELECT * FROM usertype";
    }
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($result))
    {
      $output .= '<div class="col-md-3"><div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["usertypeName"].'</div></div>';
    }
    echo $output;
  }


?>

<?php

  $connect = mysqli_connect("localhost", "root", "", "tgpdso_db");
  function fill_usertype($connect)
  {
    $output = '';
    $sql = "SELECT * FROM usertype";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($result))
    {
      $output .= '<option>'.$row["usertypeName"].'</option>';
    }
    return $output;
  }
  function fill_usertype1($connect)
  {
    $output = '';
    $sql = "SELECT * FROM usertype";
    $result = mysqli_query($connect, $sql);
    while($row = mysqli_fetch_array($result))
    {
      $output .= '<div class="col-md-3">';
                 $output .= '<div style="border:1px solid #ccc; padding:20px; margin-bottom:20px;">'.$row["usertypeStatus"].'';
                 $output .=     '</div>';
                 $output .=     '</div>';
    }
    return $output;
  }

?>
-->
<!--
<script>
 $(document).ready(function(){
      $('#show_usertype').change(function(){
           var usertypeFor = $(this).val();
           $.ajax({
                url:"Signup.php",
                method:"POST",
                data:{usertypeName:usertypeName},
                success:function(data){
                     $('#show_usertype1').html(data);
                }
           });
      });
 });
 </script>
-->









<!DOCTYPE html>
<html>
<head>
  <title>TGP - Sign up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="css/signuptheme.css" type="text/css">

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <script type="text/javascript">


      function CheckAdministrator(val)
      {


          var element2=document.getElementById('<?php $optionUserTypeStatus; ?>');
          var element1=document.getElementById('teamselect');
          if(val=='Secretary')
          {
              element1.style.display='block';
            }
          else
          {
              element1.style.display='none';
            }
      }
      function CheckLabel(val)
      {
          var label1=document.getElementById('label1');
          if(val=='Secretary')
          {
              label1.style.display='block';
            }
          else
          {
              label1.style.display='none';
            }
      }
    </script>

    <script>

      function checkPass()
      {
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('cpassword');
        var message = document.getElementById('confirmMessage');
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        var white = "white";


        if(pass2.value == pass1.value)
        {
          pass2.style.backgroundColor = white;
          message.style.color = goodColor;
          message.innerHTML = "Password Match!";
        }
        else if(pass1.value == pass2.value)
        {
          pass2.style.backgroundColor = goodColor;
          message.style.color = goodColor;
          message.innerHTML = "Password Match!";
        }
        else
        {
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML ="Password do not match!";
        }

      }

      function CancelReset()
      {
          window.location="signup.php";
      }

      </script>


</head>

<body style="background-image: url('../OJT/Insular-Life-Banner.png');background-size:cover; background-repeat; no-repeat;">
  <nav class="navbar navbar-expand-md navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="images/tgplogo.png">
        <img src="images/tgplogo.png" width="50" class="d-inline-block align-top" alt="" height="50"> </a>
      <a class="navbar-brand" href="#">
        <b class="">
          <b> The Great Provider</b>
        </b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav text-white">
          <li class="nav-item text-white">
            <a class="nav-link" href="#">
              <i class="fa d-inline fa-lg fa-bookmark-o text-white"></i> Bookmarks</a>
          </li>
          <li class="nav-item text-light">
            <a class="nav-link" href="#">
              <i class="fa d-inline fa-lg fa-envelope-o text-white"></i> Contacts</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5" style="background-image: url('images/InsularBackground1.png');background-size:cover;background-repeat:no-repeat;">
    <div class="container">
      <div class="row">
        <div class="align-self-center col-md-6 text-white">
          <h1 class="text-center text-md-left display-4">"We help always"</h1>
          <p class="lead">Sign up for more information</p>
        </div>
        <div class="col-md-6">
          <div class="card text-white bg-secondary p-2">
            <div class="card-body bg-secondary">
              <h1 class="mb-4">&nbsp;&nbsp;&nbsp;Sign up</h1>
              <form method="post" action="<?php $_PHP_SELF ?>" class="p-4 w-100">
                <div class="form-group">
                <div class="form-group w-100">
                  <label class="">First Name</label>
                  <input name="firstname" id="firstname" type="text" class="form-control" placeholder="Enter first name" required> </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Enter last name" required>
                 </div>
                 <div class="form-group">
                   <label>Middle Name</label>
                   <input name="middlename" id="middlename" type="text" class="form-control" placeholder="Enter middle name">
                  </div>
                  <div class="form-group">
                    <label name="label2" id="label2" for="exampleInputEmail1">Gender
                      <br> </label>
                      <div class="btn-group w-100" >
                      <select class="form-control" style="width: 320px;" name="gender" id="gender">
                        <option value="none">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <div class="input-group">
                      <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" required> </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <div class="input-group">
                      <input type="text" name="contactno" id="address" class="form-control" placeholder="Enter contact no." required> </div>
                  </div>
                  <div style="margin-bottom: 40px;"><hr style="border: .5px solid white;"></hr></div>
                  <label class="">Username</label>
                  <input name="username" id="username" type="text" class="form-control" placeholder="Enter username" required> </div>
                <div class="form-group">
                  <label class="">Password</label>
                  <input name="password" id="password" type="password" class="form-control" placeholder="Enter password" required> </div>
                <div class="form-group">
                    <label class="">Confirm Password</label>
                    <input name="cpassword" id="cpassword" type="password" class="form-control" placeholder="Enter confirm password" onkeyup="checkPass(); return false;" required>
                    <span id="confirmMessage" class="confirmMessage"></span>
                   </div>
                <div style="margin-bottom: 40px;"><hr style="border: .5px solid white;"></div>
                <div class="form-group">
                  <label for="exampleInputEmail1">User type
                    <br></label>
                  <div class="btn-group w-100" >
                    <select id="usertype" name="usertype" class="form-control" style="width: 320px; overflow: hidden;" onchange="CheckAdministrator(this.value); CheckLabel(this.value);" required>
                      <option value="none">Select user type</option>
                      <?php echo $optionsUserType; ?>
                    </select>
                    <?php echo $optionsUserTypeStatus ?>

<!--
                    <select name="show_usertype" id="show_usertype">
                         <option value="">Show All Product</option>
                         <?php echo fill_usertype($connect); ?>
                    </select>
                    <br /><br />
                    <div class="row" id="show_usertype1">
                         <?php echo fill_usertype1($connect);?>
                    </div>
-->

                  </div>
                </div>
                <div class="form-group">
                  <label name="label1" id="label1" for="exampleInputEmail1" style="display: none;">Team
                    <br> </label>
                    <div class="btn-group w-100" >
                    <select class="form-control" style="width: 320px; overflow: hidden; display: none;" name="teamselect" id="teamselect">
                      <?php echo $options; ?>
                    </select>
                  </div>
                </div>

                <div style="margin-bottom: 30px;"></div>
                <div align="center">
                <button  style="padding: 10px; width: 80px;" name="confirm" id="confirm" type="submit" class="btn btn-primary">Submit</button>
                &nbsp;
                <button  style="padding: 10px; width: 80px;" name="cancel" id="cancel" type="reset" class="btn btn-info" onclick="CancelReset();">Cancel</button>
              </div>
              </div>
            </form>
            <div class="row">
              <h6 class="col-md-10">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already sign up?
                <a href="login.php">Click here!</a>
              </h6>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  <div class="text-primary bg-light">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-4">
          <h3 class="mb-4 text-dark" contenteditable="true">The Great Provider</h3>
          <p class="text-dark">A company for whatever you may need, from website prototyping to publishing</p>
        </div>
        <div class="p-4 col-md-4">
        </div>
        <div class="p-4 col-md-4">
          <h2 class="mb-4 text-dark">Contact</h2>
          <p class="text-dark">
            <a href="tel:+246 - 542 550 5462" class="text-dark">
              <i class="fa d-inline mr-3 text-secondary fa-phone"></i>+246 - 542 550 5462</a>
          </p>
          <p class="text-dark">
            <a href="https://www.google.com" class="text-dark">
              <i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>info@greatprovider.com</a>
          </p>
          <p class="text-dark">
            <a href="" class="text-dark" target="_blank">
              <i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>9th Floor, Insular &nbsp;Life Mindanao, Cebu City 600, Cebu</a>
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="text-white p-2 bg-success">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 the Great Provider - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" ></script>
</body>

</html>
