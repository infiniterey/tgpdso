<!DOCTYPE html>
<html>

<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="theme.css" type="text/css">

  <script type="text/javascript">

      function CheckAdministrator(val)
      {
          var element=document.getElementById('usertype');
          if(val=='secretary')
              element.style.display='block';
          else
              element.style.display='none';
      }
      function CheckLabel(val)
      {
          var label=document.getElementById('label1');
          if(val=='secretary')
              label.style.display='block';
          else
              label.style.display='none';
      }

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
              <h1 class="mb-4">Sign up</h1>
              <form action="" class="p-4 w-100">
                <div class="form-group">
                  <label class="">Username</label>
                  <input name="username" id="username" type="text" class="form-control" placeholder="Enter username"> </div>
                <div class="form-group">
                  <label class="">Password</label>
                  <input name="password" id="password" type="password" class="form-control" placeholder="Enter password"> </div>
                <div class="form-group">
                    <label class="">Confirm Password</label>
                    <input name="cpassword" id="cpassword" type="password" class="form-control" placeholder="Enter confirm password" onkeyup="checkPass(); return false;">
                    <span id="confirmMessage" class="confirmMessage"></span>
                   </div>
                <div style="margin-bottom: 100px;"></div>
                <div class="form-group w-100">
                  <label class="">First Name</label>
                  <input name="firstname" id="firstname" type="text" class="form-control" placeholder="Enter first name"> </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Enter last name">
                 </div>
                 <div class="form-group">
                   <label>Middle Name</label>
                   <input name="middlename" id="middlename" type="text" class="form-control" placeholder="Enter middle name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <div class="input-group">
                      <input type="text" name="address" id="address" class="form-control" placeholder="Enter address"> </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact No.</label>
                    <div class="input-group">
                      <input type="text" name="contactno" id="address" class="form-control" placeholder="Enter contact no."> </div>
                  </div>
                  <div style="margin-bottom: 100px;"></div>
                <div class="form-group">
                  <label for="exampleInputEmail1">User type
                    <br></label>
                  <div class="btn-group w-100" >
                    <select id="usertype" name="usertype" class="btn btn-light" style="width: 320px; overflow: hidden;" onchange="CheckAdministrator(this.value); CheckLabel(this.value);">
                      <option value="none">Select user type</option>
                      <option name="usertype" id="usertype" value="administrator">Administrator</option>
                      <option name="usertype" id="usertype" value="salesmanager">Sales Manager</option>
                      <option name="usertype" id="usertype" value="secretary">Secretary</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label name="label1" id="label1" for="exampleInputEmail1" style="display: none;">Team
                    <br> </label>
                    <div class="btn-group w-100" >
                    <select class="btn btn-light" style="width: 320px; overflow: hidden; display: none;" name="usertype" id="usertype">
                      <option name="label1" id="label1" value="Avengers">Avengers</option>
                      <option name="label1" id="label1" value="Revengers">Revengers</option>
                      <option name="label1" id="label1" value="Defenders">Defenders</option>
                    </select>
                  </div>
                </div>
                <button name="confirm" id="confirm" type="submit" class="btn btn-primary">Submit</button>
                <button name="cancel" id="cancel" type="reset" class="btn btn-info">Cancel</button>
              </div>
            </form>
            <div class="row">
              <h6 class="col-md-10">
                <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already sign up?
                <a href="../A_Login/index.php">Click here!</a>
              </h6>
            </div>
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
      <div class="row">
        <div class="col-md-12 mt-3">
          <p class="text-center text-white">© Copyright 2017 The Great Provider - All rights reserved. </p>
        </div>
      </div>
    </div>
  </div>
  <div class="text-white p-4 bg-warning">
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
