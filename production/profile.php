<?php
	include 'confg.php';
	include 'pdo.php';
	include_once 'createdb.php';


	session_Start();
?>



<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tgpdso_db";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else {
	if(isset($_POST['update']))
	{

		$userID = $_POST['userid'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];

		$address = $_POST['address'];
		$contactno = $_POST['contactno'];
		$usertype = $_POST['usertype'];

		$team = $_POST['team'];
		$gender = $_POST['gender'];


		$sql = "UPDATE users SET
		username = '$username',
		password = '$password',
		ufirstname = '$firstname',
		umiddlename = '$middlename',
		ulastname = '$lastname',
		uaddress = '$address',
		ucontactno = '$contactno',
		uusertype = '$usertype',
		uteam = '$team',
		ugender = '$gender'
		WHERE userID = '$userID'";


		if($conn->query($sql))
		{

			?>
			<script>
				alert("Profile is updated.");
				window.location="profile.php"
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


		if(isset($_POST['update']))
		{
			if(empty($_POST['username']) || empty($_POST['password']))
			{
				?>
				<script>
							alert('Username or password is invalid');
							window.location="profile.php";
				</script>
				<?php
			}
			else
			{


				$userid = trim(strip_tags($_POST['userid']));





				$conn = mysqli_connect("localhost", "root", "");
				$db = mysqli_select_db($conn, "tgpdso_db");
				$query = mysqli_query($conn, "SELECT * FROM users WHERE userID = '$userid'");



				if(mysqli_num_rows($query) == 1)
				{
					$validation = mysqli_fetch_Array($query);
					$_SESSION["userid"] = strip_tags($validation["userID"]);
					$_SESSION["username"] = strip_tags($validation["username"]);
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
										?><script>alert('here')
											window.location="profile.php";
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
<html lang="en">
	<?php include 'base/header.php'; ?>
  <body class="nav-md footer_fixed">
  	<div class="container body">
  		<div class="main_container">

  			<div class="col-md-3 left_col menu_fixed">
  				<div class="left_col scroll-view">
  					<div class="clearfix"></div>

  					<!-- menu profile quick info -->
						<div class="profile clearfix">
							<div class="profile_pic">
								<img class="img-circle img1 profile_img" src="images/user.png">
							</div>
							<div class="profile_info">
								<a style="font-size: 14px; color: white"><b>Magandang Araw!</b></a>
								<a style="color: white; font-size: 13px;"><b><?php echo $_SESSION['firstname']; ?></b></a> - <a style="color: white; font-size: 13px;"><b><?php echo $_SESSION['usertype']; ?></b></a>
								<br>
								<br>
								<?php
								$usertype1 = $_SESSION['usertype'];
								if($usertype1 == 'secretary' || $usertype1 == 'Secretary')
								{
									?>
										<a style="color: white" name="profile" id="profile" href=""><u>Profile</u></a>
									<?php
								}
								else {
									?>
										<a style="color: white" name="profile" id="profile" href="profile.php"><u>Profile</u></a>
										<?php
								}
								?>
								&nbsp;
								<a style="color: lightgreen" name="logout" id="logout" href="index.php"><u>Logout</u></a>
								<div class="clearfix"></div>
							</div>
						</div>
						<!-- /menu profile quick info -->

  					<br />

  					<!-- sidebar menu -->
						<?php

						$usertype1 = $_SESSION['usertype'];
						if($usertype1 == 'secretary' || $usertype1 == 'Secretary')
						{
							 include 'base/sidebar.php';
						}
						else
						{
							 include 'base/sidebarAdmin.php';
						}
						?>
            <!-- /sidebar menu -->

  				</div>
  			</div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 6026px;">
          <div class="">
            <div class="clearfix"></div>


            <div class="row">
              <form method="post" name="myform" action="<?php $_PHP_SELF ?>"onsubmit="CheckForm()" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><b>USER PROFILE</b></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br>

											<div class="form-group" hidden>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          User ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="userid" value="<?php echo $_SESSION['id']?>"required="required" class="form-control col-md-7 col-xs-12" required readonly>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Full Name <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <input type="text" placeholder="Firstname" name="firstname"  id="firstname" value="<?php echo $_SESSION['firstname']?>" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
												<div class="col-md-2 col-sm-3 col-xs-12">
													<input type="text" placeholder="middlename" name="middlename" id="middlename" value="<?php echo $_SESSION['middlename']?>" required="required" class="form-control col-md-7 col-xs-12" required>
												</div>
                        <div class="col-md-2 col-sm-3 col-xs-12">
                          <input type="text" placeholder="Lastname" name="lastname" id="lastname" value="<?php echo $_SESSION['lastname']?>" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

											<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="address" id="address" value="<?php echo $_SESSION['address']?>"required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

											<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Contact No. <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="contactno" id="contactno" value="<?php echo $_SESSION['contactno']?>"required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">
													Gender <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<select type="text" name="gender" id="gender" value="<?php echo $_SESSION['gender']?>" required="required" class="form-control col-md-7 col-xs-12">
															<option id="gender" name="gender">male</option>
															<option id="gender" name="gender">female</option>
													</select>
												</div>
											</div>

											<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          User type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="usertype" id="usertype" value="<?php echo $_SESSION['usertype']?>"required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

											<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Team <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="team" id="team" value="<?php echo $_SESSION['team']?>"required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

											<br>

											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">
													Username <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="text" name="username" id="username" value="<?php echo $_SESSION['username']?>"required="required" class="form-control col-md-7 col-xs-12" required>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label col-md-3 col-sm-3 col-xs-12">
													Password <span class="required">*</span>
												</label>
												<div class="col-md-6 col-sm-6 col-xs-12">
													<input type="password" name="password" id="password" value="<?php echo $_SESSION['password']?>"required="required" class="form-control col-md-7 col-xs-12" required>
												</div>
											</div>

                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-primary" name="update" id="update"><i class="fa fa-check"></i>&nbsp;Update</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- /page content -->
  		</div>
  	</div>

    <footer>
      <div class="pull-right">
        COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
      </div>
      <div class="clearfix"></div>
    </footer>

    <?php include 'java.php';?>
  </body>
</html>
