<?php

		session_Start();
		ob_start();

		if(isset($_POST['confirm']))
		{
			if(empty($_POST['username']) || empty($_POST['password']))
			{
				?>
				<script>
							alert('Username or password is invalid');
							window.location="index.php";
				</script>
				<?php
			}
			else
			{


				$username = trim(strip_tags($_POST['username']));
				$password = trim(strip_tags($_POST['password']));




				$conn = mysqli_connect("localhost", "root", "");
				$db = mysqli_select_db($conn, "tgpdso_db");
				$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");



				if(mysqli_num_rows($query) == 1)
				{
					$validation = mysqli_fetch_Array($query);
					$_SESSION["username"] = $username;
					$_SESSION["password"] = strip_tags($validation["password"]);

					$_SESSION["firstname"] = strip_tags($validation["ufirstname"]);
					$_SESSION["lastname"] = strip_tags($validation["ulastname"]);
					$_SESSION["middlename"] = strip_tags($validation["umiddlename"]);

					$_SESSION["address"] = strip_tags($validation["uaddress"]);
					$_SESSION["contactno"] = strip_tags($validation["ucontactno"]);
					$_SESSION["usertype"] = strip_tags($validation["uusertype"]);

					$_SESSION["team"] = strip_tags($validation["uteam"]);
					$_SESSION["gender"] = strip_tags($validation["ugender"]);
					$_SESSION["id"] = strip_tags($validation["userID"]);


					?><script>
					//alert('Welcome to TGP - Insular Life');
						window.location="production/home.php"
					</script><?php
				}
				else
				{
					?>
						<script>
						alert('Username or Passsword is invalid');
						window.location = "index.php";
						</script>
					<?php
				}
			}
		}
 ?>


<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="production/images/favicon.png" type="image/png" sizes="16x16">
	<title>TMS - TGPDSO Monitoring System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="production/css/logintheme.css" type="text/css">

</head>

<body style="background-image: url('../OJT/Insular-Life-Banner.png');background-size:cover; background-repeat; no-repeat;">
  <nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <!-- <img src="production/images/tgplogo.png" width="50" class="d-inline-block align-top" alt="" height="50"> </a> -->
				  <a class="navbar-brand" href="#">
						<img src="production/images/logowidth.png" height="50"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav text-dark">
          <li class="nav-item text-dark">
            <a class="nav-link" href="#" style="color: black;">
              <i class="fa d-inline fa-lg fa-bookmark-o text-dark"></i> Bookmarks</a>
          </li>
          <li class="nav-item text-dark">
            <a class="nav-link" href="#" style="color: black;">
              <i class="fa d-inline fa-lg fa-envelope-o text-dark"></i> Contacts</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="py-5" style="background-image: url('production/images/InsularBackground1.png');background-size:cover;background-repeat:no-repeat;">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white bg-secondary p-3">
            <div class="card-body bg-secondary">
              <h1 class="mb-4">&nbsp;&nbsp;Login</h1>
              <form action="<?php $_PHP_SELF ?>" method="POST" class="p-3">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username"> </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter password"> </div>
                  <div style="margin-bottom: 20px;"></div>
                  <button  style="padding: 10px; width: 80px;" name="confirm" id="confirm" type="submit" class="btn btn-primary">Login</button>
                  &nbsp;
                  <button  style="padding: 10px; width: 80px;" name="cancel" id="cancel" type="reset" class="btn btn-info">Cancel</button>

							  </form>
              	<h6>
                <br>Forgot to sign up?
                <a href="Signup.php" >Click here!</a>
              </h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="text-primary bg-white">
    <div class="container">
      <div class="row">
        <div class="p-4 col-md-1">
        </div>
        <div class="p-4 col-md-4">
          <h3 class="mb-4 text-dark" contenteditable="true">The Great Provider</h3>
          <p class="text-dark">A company for whatever you may need, from website prototyping to publishing</p>
        </div>
        <div class="p-4 col-md-2">
        </div>
        <div class="p-4 col-md-4">
          <h2 class="mb-4 text-dark">Contact</h2>
          <p class="text-dark">
            <a href="tel:+246 - 542 550 5462" class="text-dark">
              <i class="fa d-inline mr-3 text-secondary fa-phone"></i>+246 - 542 550 5462</a>
          </p>
          <p class="text-dark">
            <a href="https://www.google.com" class="text-dark">
              <i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>thegreatprovider@gmail.com</a>
          </p>
          <p class="text-dark">
            <a href="" class="text-dark" target="_blank">
              <i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>9th Floor, Insular &nbsp;Life Mindanao, Cebu City 600, Cebu</a>
          </p>
        </div>
        <div class="p-4 col-md-3">
        </div>
      </div>
    </div>
  </div>
  <div class="text-white p-2 bg-success">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 the Great Provider - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
