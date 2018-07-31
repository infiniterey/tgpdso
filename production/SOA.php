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

.highlight { background-color: lightgreen; color: green}
.highlightBack { background-color: white; color: gray}

.highlight1 { background-color: lightgreen; color: green}
.disablehighlight { background-color: transparent;}

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
						<?php include 'base/sidebar.php'; ?>
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
<div class="modal fade" tabindex="-1" role="dialog" id="momodal" name="momodal" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog modal-small">
		<div class="modal-content">


			<div class="modal-header">
				<h2 class="modal-title">Search Client <button type="button" class="close" data-dismiss="modal" onclick="cancelDetail();">x</button></h2>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">

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
							if(isset($_POST['saveClient']))
							{
								$firstname = $_POST['firstnameClient'];
								$middlename = $_POST['middlenameClient'];
								$lastname = $_POST['lastnameClient'];
								$birthdate = $_POST['birthdateClient'];
								$address = $_POST['addressClient'];
								$cellno = $_POST['cellnoClient'];


								$sql = "INSERT INTO client (cFirstname, cMiddlename, cLastname, cBirthdate, cAddress, cCellno)
								VALUES ('$firstname', '$middlename', '$lastname', '$birthdate' , '$address', '$cellno')";

								if($conn->query($sql))
								{
									?>
									<script>
										alert("Client is succesfully added.");
										window.location="newBusiness.php";
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


					<form method="post" action="<?php $_PHP_SELF ?>">
						First Name:
						<input name="firstnameClient" id="firstnameClient" class="date-picker form-control" type="text" required><br/>
						Middle Name:
						<input type="text" id="middlenameClient" placeholder="" name="middlenameClient" required="required" class="form-control" required><br/>
						Last Name:
						<input type="text" id="lastnameClient" placeholder="" name="lastnameClient" required="required" class="form-control" required><br/>
						Birthdate:
						<input type="date" id="birthdateClient" placeholder="" name="birthdateClient" required="required" class="form-control" required><br/>
						Address:
						<input type="text" id="addressClient" placeholder="" name="addressClient" required="required" class="form-control" required><br/>
						Cell No.:
						<input type="text" id="cellnoClient" placeholder="" name="cellnoClient" required="required" class="form-control" required><br/>

						<br/>
							<button type="submit" name="saveClient" id="saveClient" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;Add</button>
							<button type="reset" name="reset" id="reset" class="btn btn-default">Cancel</button>

					</form>

				</div>

							</div>
						</div>


			<div class="modal-footer">
				<div class="col-md-3">
					<form method="post">
				</form>

			</div>
			</div>


</div>
</div>
</div>
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
										<h2><b>STATEMENT OF ACCOUNT</b></h2>

										<div class="clearfix"></div>
									</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="row">
												<div class="x_title">
													<h2><input type="text" name="searchT" id="searchT" placeholder="Policy No."></input>
													<button type="submit" name="buttonSearch"  id="buttonSearch" class="fa fa-search" ></button>
													<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-table"	  data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>
													<button  type="button" style='float:right' data-toggle="modal" data-target="#momodal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add SOA</button>
													<br	><br>
													<div class="clearfix"></div>
												</div>
											</div>
												<div class="col-sm-12">

				<!-- table-striped dataTable-->

													<table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
														<thead>
															<tr role="row">
																<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="TransactionDate" style="width: 25px;text-align:center;">Transaction Date</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyOwner" style="width: 200px;text-align:center;">Policy Owner</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyNo" style="width: 100px;text-align:center;">Policy #</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PaymentMode" style="width: 100px;text-align:center;">Payment Mode</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Premium" style="width: 100px;text-align:center;">Premium</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Rate" style="width: 100px;text-align:center;">Rate</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Commission" style="width: 100px;text-align:center;">Commission</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Agent" style="width: 200px;text-align:center;">Agent</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Action" style="width: 100px;text-align:center;">Action</th>
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
																				<td><?php print($row['ulastname']); ?></td>
																				<td><?php print($row['ulastname']); ?></td>
																				<td><?php print($row['ulastname']); ?></td>
																				<td><?php print($row['ulastname']); ?></td>
																				<td><?php print($row['ulastname']); ?></td>
																				<td>
																					<div class="row">
																						<button  type="button" style='float:right' data-toggle="modal" data-target="#momodal" class="btn btn-danger" name="btn-addPlan"><i class="fa fa-trash" hidden></i></button>
																						<button  type="button" style='float:right' data-toggle="modal" data-target="#momodal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-pencil" hidden></i></button>
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
