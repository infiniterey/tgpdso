<!DOCTYPE html>
<style>
#update{display:none}
</style>
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
                      <h2><b>ADD CLIENT</b></h2>
											<form method="post">
											<?php
											$firstname = "";
											$middlename ="";
											$lastname ="";
											$birthdate ="";
											$address = "";
											$cellno ="";
											?>
										</form>
                      <div class="clearfix"></div>
                    </div>
                      <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
													<div class="col-sm-3">
															<form method="post" action="<?php $_PHP_SELF ?>">
				                          First Name:</br>
				                          <input placeholder="First Name" name="firstname" id="firstname" style="width: 195px;" class="date-picker form-control" type="text" required><br/><br>
				                          Middle Name:</br>
				                          <input placeholder="Middle Name" type="text" id="middlename" style="width: 195px;" placeholder="" name="middlename" required="required" class="form-control" required><br/><br>
																  Last Name:
																</br><input placeholder="Last Name" type="text" id="lastname" style="width: 195px;" placeholder="" name="lastname" required="required" class="form-control" required><br/><br>
																 	Birthdate:</br>
																	<input  type="date" id="birthdate" style="width: 195px;" placeholder="" name="birthdate" required="required" class="form-control" required><br/><br>
																	Address:</br>
																	<input placeholder="Address" type="text" id="address" style="width: 195px;" placeholder="" name="address" required="required" class="form-control" required><br/><br>
																	Cell No.:<br>
																	<input placeholder="Cell No." type="text" id="cellno" style="width: 195px;" placeholder="" name="cellno" required="required" class="form-control" required><br/><br>
																	<input type="text" id="clientID2" name="clientID2" hidden>

																	<br><br>
																	<center>


																		<button style="float:left" type="submit" class="btn btn-primary" id="save" name="save"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
																		<button style="float:left" type="submit" class="btn btn-primary" id="update" name="update"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Update</button>
																		<a style="float:left;height:36px;" type="submit" id="reset" name="reset" value="Reset" class="btn btn-default" href="add_client.php">Cancel</a>

																	</center>
																</form>
														</div>
                          <div class="col-sm-9">

          <!-- table-striped dataTable-->

                            <table style="float:right" id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
                              <thead>
                                <tr role="row">
																	<th hidden class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="clientID" style="width: 25px;text-align:center;">Client ID</th>
                                  <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Firstname" style="width: 25px;text-align:center;">Firstname</th>
	                                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Middlename" style="width: 100px;text-align:center;">Middlename</th>
                                  <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Last Name</th>
																	<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Birthdate" style="width: 25px;text-align:center;">Birtdate</th>
	                                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Address" style="width: 100px;text-align:center;">Address</th>
                                  <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="cellno" style="width: 100px;text-align:center;">Cell No.</th>
																	  <th width="120px" align="center" class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="action" width="100%" align="center" style="width: 100px;text-align:center;">Action</th>
																</tr>
                              </thead>

                              <tbody>

                                  <?php
																	include 'A_Login/PositionAndTeam.php';
                                    $DB_con = Database::connect();
                                    $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $sql = "SELECT * FROM client, production, agents, team WHERE agentCode = agent and clientID = prodclientID and agentTeam = teamID AND teamName = '$teamUser'";
                                    $result = $DB_con->query($sql);
                                    if($result->rowCount()>0){
                                      while($row=$result->fetch(PDO::FETCH_ASSOC)){;
                                        ?>
                                        <tr>
																					<td hidden><?php print($row['clientID']);?></td>
                                          <td><?php print($row['cFirstname']);?></td>
                                          <td><?php print($row['cMiddlename']); ?></td>
																					<td><?php print($row['cLastname']); ?></td>
																					<td><?php print($row['cBirthdate']); ?></td>
																					<td><?php print($row['cAddress']); ?></td>
																					<td><?php print($row['cCellno']); ?></td>
																					<td>
																						<div align="center" class="row">
																								<a title="Edit Data" href="add_client.php?addclient=<?php echo $row['clientID'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_client.php?deleteclient=<?php echo $row['clientID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																						</div>
																					</td>
                                        </tr>
                                        <?php
                                      };
                                    }
                                    else
																		{

																		}
                                  ?>
                                </tbody>
                            </table>
														<script>


															var table = document.getElementById('datatable-fixed-header');
															for(var counter = 1; counter < table.rows.length; counter++)
															{
																table.rows[counter].onclick = function()
																{
																 document.getElementById("clientID").value = this.cells[0].innerHTML;
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
						<input type="text" name="username1" id="username1" hidden>
						<input type="text" id="clientID" name="clientID" hidden><br/>

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



</script>

<script>




</script>



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
	if(isset($_POST['save']))
	{
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$address = $_POST['address'];
		$cellno = $_POST['cellno'];
		$sql = "INSERT INTO client (cFirstname, cLastname , cMiddlename, cBirthdate, cAddress, cCellno)
		VALUES ('$firstname', '$lastname', '$middlename ', '$birthdate' , '$address', '$cellno')";
			?><script>alert('papaw <?php echo $firstname ?>');</script><?php
		if($conn->query($sql)===True)
		{
			?>
			<script>
				alert("Client is succesfully added.");
				window.location="add_client.php";
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

		$clientID = $_POST['clientID2'];

		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$address = $_POST['address'];
		$cellno = $_POST['cellno'];

		$sql = "UPDATE client SET clientID = '$clientID' , cFirstname = '$firstname', cMiddlename = '$middlename', cLastname = '$lastname', cBirthdate = '$birthdate', cAddress = '$address', cCellno = '$cellno' WHERE clientID = '$clientID'";


		if($conn->query($sql))
		{
			?>
			<script>
				alert("Client information is updated.");
				window.location = "add_client.php";
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
	if(isset($_GET['deleteclient']))
	{

		$clientID = $_GET['deleteclient'];

		$sql = "DELETE FROM client WHERE clientID = '$clientID'";

		if($conn->query($sql) === TRUE)
		{
			?>
			<script>
			window.location="add_client.php";
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
		if(isset($_GET['addclient']))
		{

				$clientID = $_GET['addclient'];

					$result=mysqli_query($conn,"SELECT * from client WHERE clientID = '$clientID'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('firstname').value = '<?php echo $row['cFirstname'];?>';</script>
						<script> document.getElementById('middlename').value = '<?php echo $row['cMiddlename'];?>';</script>
						<script> document.getElementById('lastname').value = '<?php echo $row['cLastname'];?>';</script>
						<script> document.getElementById('birthdate').value = '<?php echo $row['cBirthdate'];?>';</script>
						<script> document.getElementById('address').value = '<?php echo $row['cAddress'];?>';</script>
						<script> document.getElementById('cellno').value = '<?php echo $row['cCellno'];?>';</script>
						<script> document.getElementById('clientID2').value = '<?php echo $row['clientID'];?>';</script>
						}

					<?php
				};
				$conn->close();

				?>
				<script>

							$('#save').hide();
							$('#update').show();

				</script>
				<?php
	}
}

?>
