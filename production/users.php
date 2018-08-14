<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
</head>
<body class="nav-md footer_fixed">
	<form method="post">
		<div class="container body">
			<div class="main_container">
				<div class="col-md-3 left_col menu_fixed">
					<div class="left_col scroll-view scrollbar">
						<?php include 'base/sidemenu.php';?>
					</div>
				</div>

	      <!-- top navigation -->
	      <div class="top_nav">
	        <?php include 'base/topNavigation.php';?>
	      </div>
	      <!-- /top navigation -->
          <!-- page content -->
<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->

<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->

					</div>
					<form method="post" style="margin-top: 40px;">
          <div class="right_col" role="main">
            <div class="">
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><b>USERS</b></h2>

                      <div class="clearfix"></div>
                    </div>
                      <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
													<div class="col-sm-3">
															<form method="post" action="<?php $_PHP_SELF ?>">
				                          Username:
				                          <input name="username" id="username" style="width: 195px;" class="date-picker form-control" required="required" type="text" required readonly><br/>
				                          First Name:
				                          <br><input type="text" id="firstname" style="width: 195px;" placeholder="" name="firstname" required="required" class="form-control" required disabled><br/>
																  Last Name:
				                          <br><input type="text" id="lastname" style="width: 195px;" placeholder="" name="lastname" required="required" class="form-control" required disabled><br/>
																	User Type:
																	<br><input type="text" id="usertype" style="width: 195px;" placeholder="" name="usertype" required="required" class="form-control" required disabled><br/>
																	New Password:
																	<input type="text" id="npassword" style="width: 195px;" placeholder="" name="npassword" required="required" class="form-control" value="" maxlength="25" required><br/>
																	<br><br>
																	<center>



																		<button type="submit" class="btn btn-primary" id="update" name="update"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Update</button>
																		<button type="reset" id="reset" name="reset" value="Reset" class="btn btn-default" onclick="disableUpdateButton()">Cancel</button>

																	</center>
																</form>
														</div>
                          <div class="col-sm-9">

          <!-- table-striped dataTable-->

                            <table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username" style="width: 10px;text-align:center;">Username</th>
	                                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Firstname" style="width: 120px;text-align:center;">First Name</th>
                                  <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 120px;text-align:center;">Last Name</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 50px;text-align:center;">User type</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 10px;text-align:center;">Action</th>
																</tr>
                              </thead>

                              <tbody>

                                  <?php
                                    $DB_con = Database::connect();
                                    $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $sql = "SELECT * FROM users";

                                    $result = $DB_con->query($sql);
                                    if($result->rowCount()>0){
                                      while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <tr>
                                          <td><?php print($row['username']); ?></td>
                                          <td><?php print($row['ufirstname']);?></td>
                                          <td><?php print($row['ulastname']); ?></td>
																					<td><?php print($row['uusertype']); ?></td>
																					<td>
																						<div align="center" class="row">
																								<a title="Edit Data" href="users.php?edit=<?php echo $row['username'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="users.php?delete=<?php echo $row['username'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																						</div>
																					</td>
                                        </tr>
                                        <?php
                                      }
                                    }
                                    else{}
                                  ?>
                                </tbody>
                            </table>
														<script>


															var table = document.getElementById('datatable-fixed-header');
															for(var counter = 1; counter < table.rows.length; counter++)
															{
																table.rows[counter].onclick = function()
																{

																 document.getElementById("username1").value = this.cells[0].innerHTML;

																	};
																}

																</script>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
				</form>
          <!-- /page content -->
    		</div>
    	</div>
    </form>
	<form>
	</form>
    <footer style="margin-bottom: -15px;">

				<center>
        COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
			</center>
    </footer>

    <?php include 'java.php'; ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


		<!-- The Modal -->
  </body>
</html>

<script>

function myFunction() {

  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable-fixed-header");
  tr = table.getElementsByTagName("tr");


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );


</script>




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

		$userName = $_POST['username'];
		$password = $_POST['npassword'];



		$sql = "UPDATE users SET password = '$password' WHERE username = '$userName'";


		if($conn->query($sql))
		{
			?>
			<script>
				alert("User is updated.");
				window.location="users.php";
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

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgpdso_db";


$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
		die("Connection failed:" .$conn->connect_error);
}
else {
	if(isset($_GET['delete']))
	{

		$username1 = $_GET['delete'];

		$sql = "DELETE FROM users WHERE username = '$username1'";

		if($conn->query($sql) === TRUE)
		{
			?>
			<script>
			window.location="users.php";
			</script>
			<?php
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		$conn->close();
	}
}
?>


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
		if(isset($_GET['edit']))
		{

				$username1 = $_GET['edit'];

					$result=mysqli_query($conn,"SELECT * from users WHERE username = '$username1'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('username').value = '<?php echo $row['username'];?>';</script>
						<script> document.getElementById('firstname').value = '<?php echo $row['ufirstname'];?>';</script>
						<script> document.getElementById('lastname').value = '<?php echo $row['ulastname'];?>';</script>
						<script> document.getElementById('usertype').value = '<?php echo $row['uusertype'];?>';</script>
						<script> document.getElementById('npassword').value = Math.floor(Math.random() * 10000);</script>
						}

					<?php
				};
				$conn->close();
	}
}

?>
