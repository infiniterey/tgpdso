<?php
	include 'confg.php';
	include 'pdo.php';
	include_once 'createdb.php';

	session_start();
	?>

	<?php
if(isset($_POST['logout']))
{
		session_destroy();
		unset($_SESSION['logout']);
		?>
		<script>
		alert('Successfully logout - TGP');
		window.location="index.php";
		</script>

		<?php
}
	 ?>



<!DOCTYPE html>
<html lang="en">
<head>

</head>

<style type="text/css">

#edit, #deleted, #UpdateButton{ display: none;}

.scrollbar{
	height: 100%;
	width: 100%;
	overflow: auto;
}
::-webkit-scrollbar {
    width: 1px;
}

</style>



	<?php include 'base/header.php'; ?>
  <body class="nav-md footer_fixed">
    <form method="post">
    	<div class="container body">
    		<div class="main_container">

    			<div class="col-md-3 left_col menu_fixed">
    				<div class="left_col scroll-view scrollbar">
    					<div class="clearfix"></div>

    					<!-- menu profile quick info -->
							<?php include 'base/sessionsidebar.php';?>
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
                      <h2><b>ADD PLAN</b></h2>

                      <div class="clearfix"></div>
                    </div>
                      <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
													<div class="col-sm-3">
															<form method="post" action="<?php $_PHP_SELF ?>">
				                          Plan Code: <span class="required">*</span>
				                          <input name="PlanCode" id="PlanCode" style="width: 195px;" class="date-picker form-control" required="required" type="text" required><br>
				                          Plan Description: <span class="required">*</span>
				                          <input type="text" id="PlanDesc" placeholder="" name="PlanDesc" required="required" class="form-control" required><br/>
																  Plan Rate <span class="required">*</span>
				                          <input type="text" id="PlanRate" placeholder="" name="PlanRate" required="required" class="form-control" required><br/>
																	<br><br>
																	<center>
																	<button type="submit" class="btn btn-primary" id="SaveButton" name="SaveButton"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>


																		<button type="submit" class="btn btn-primary" id="UpdateButton" name="UpdateButton"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Update</button>
																		<a href="add_plan.php" class="btn btn-default" onclick="disableUpdateButton()">Cancel</a>

																	</center>
																</form>
														</div>
                          <div class="col-sm-9">

          <!-- table-striped dataTable-->

                            <table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Plan Code" style="width: 50px;text-align:center;">Plan Code</th>
	                                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Plan Description" style="width: 250px;text-align:center;">Plan Description</th>
                                  	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Plan Rate" style="width: 50px;text-align:center;">Plan Rate</th>
																	  <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Action" style="width: 10px;text-align:center;">Action</th>

																</tr>
                              </thead>

                              <tbody>

                                  <?php
                                    $DB_con = Database::connect();
                                    $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $sql = "SELECT * FROM plans";

                                    $result = $DB_con->query($sql);
                                    if($result->rowCount()>0){
                                      while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <tr>
                                          <td><?php print($row['planCode']); ?></td>
                                          <td><?php print($row['planDesc']);?></td>
                                          <td><?php print($row['planRate']); ?></td>
																					<td align="center">
																								<a title="Edit Data" href="add_plan.php?edit=<?php echo $row['planCode'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_plan.php?delete=<?php echo $row['planCode'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

																 document.getElementById("planC").value = this.cells[0].innerHTML;

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

</script>

<script>

		function enableUpdateButton()
		{
				document.getElementById("UpdateButton").disabled = false;
				document.getElementById("SaveButton").disabled = true;

		}
		function disableSaveButton()
		{
				document.getElementById("SaveButton").disabled = true;

		}





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



function disableUpdateButton()
{
				document.getElementById("planC").value = "";

				$('#UpdateButton').hide();
				$('#SaveButton').show();
}

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
	if(isset($_POST['UpdateButton']))
	{

		$plancode = $_POST['PlanCode'];
		$plandesc = $_POST['PlanDesc'];
		$planrate = $_POST['PlanRate'];


		$sql = "UPDATE plans SET planCode = '$plancode', planDesc = '$plandesc', planRate = '$planrate' WHERE planCode = '$plancode'";


		if($conn->query($sql))
		{
			?>
			<script>
				alert("Plan is updated.");
				window.location = 'add_plan.php';
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
		$plancode = $_GET['delete'];

		$sql = "DELETE FROM plans WHERE planCode = '$plancode'";

		if($conn->query($sql) === TRUE)
		{
			?>
			<script>
			window.location="add_plan.php";
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




$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
	if(isset($_POST['SaveButton']))
	{
		$plancode = $_POST['PlanCode'];
		$plandesc = $_POST['PlanDesc'];
		$planrate = $_POST['PlanRate'];

	$sql = "INSERT INTO plans (planCode, planDesc, planRate)
	VALUES ('$plancode', '$plandesc', '$planrate')";

	if ($conn->query($sql) === TRUE) {
		?>
			<script>
			alert ('New record created successfully');
			window.location="add_plan.php";
			</script>
			<?php
	} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}
}

$conn->close();
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


				$plancode = $_GET['edit'];

					$result=mysqli_query($conn,"SELECT * from plans WHERE planCode = '$plancode'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('PlanCode').value = '<?php echo $row['planCode'];?>';</script>
						<script> document.getElementById('PlanDesc').value = '<?php echo $row['planDesc'];?>';</script>
						<script> document.getElementById('PlanRate').value = '<?php echo $row['planRate'];?>';</script>

					<?php
				};

			?>
			<script>
										$('#SaveButton').hide();
										$('#UpdateButton').show();
			</script>
			<?php
	}
}

?>
