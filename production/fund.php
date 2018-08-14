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
				<form method="POST" >

					<?php
						if(isset($_POST['btn-save'])){
							tgpdso::addFund();
						}
						if(isset($_POST['ButtonUpdate'])){
							tgpdso::updateFund();
						}
					?>
				<div class="right_col" role="main">
					<div class="">
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>Add Fund</b></h2>
										<div class="clearfix"></div>
									</div>
										<div id="datatable-fixed-header_wrapper"  class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<div class="row">
												<div class="col-sm-3">
																Fund ID<span class="required">*</span><br>
																<input type="text" name="fundID" id="fundID" required="required" class="form-control" required><br>
																Fund Name<span class="required">*</span>
																<input type="text" style="margin-bottom:50px" name="fundName" id="fundName" required="required" class="form-control" required><br>
																<center>
			                    	<button type="reset" name="reset" id="reset" class="btn btn-default">Cancel</button>
	                             <button	style="float:left" type="submit" class="btn btn-primary" name="btn-save"><i class="fa fa-check"></i>&nbsp;Save</button>
													</div>
												<div class="col-sm-9">
													<style>

													</style>

													</form>
														<table method ="post" id="datatable-fixed-header" name="datatable-fixed-header" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
														<thead>
															<tr role="row">
																<th class="sorting_asc" style="width:50px;text-align:center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 15px;text-align:center;"hidden>Fund ID</th>
																	<th class="sorting" style="width:50px;text-align:center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Fund Name</th>
																	<th class="sorting" style="width:50px;text-align:center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Action</th>
																</tr>
														</thead>
														<tbody>
															<?php

																$DB_con = Database::connect();
																$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																$sql = "SELECT * FROM fund";

																$result = $DB_con->query($sql);
																if($result->rowCount()>0){
																	while($row=$result->fetch(PDO::FETCH_ASSOC)){
																		?>
																		<tr>
																			<td hidden><?php print($row['fundID']); ?></td>
																			<td><?php print($row['fundName']); ?></td>
																			<td>
																				<div class="row">
																					<center>
																						<form method='post' name='myform' onsubmit="CheckForm()">
																							<button  type="button" id="update" name="update" data-toggle="modal" data-target="#myModal2" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="fund.php?delete=<?php echo $row['fundID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																						</form>
																					</center>
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
													<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
													<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-sm">
															<div class="modal-content">
																<div class="modal-header">
															<h2 class="modal-title">Update Fund</h2>
															<button type="button" class="close" data-dismiss="modal">x</button>
														</div>

															<form method="post" name='myform' onsubmit="CheckForm()">
														<div method="post" class="modal-body">

															New fund ID: <br><input type="text" readonly="readonly" class="form-control" name="newFundID" style="width:195px" id="newFundID" value="" ><br>
															New fund Name: <br><input type="text" class="form-control" name="newFundName" style="width:195px" id="newFundName" value=""><br>

														</div>
														<form method="post" action="<?php $_PHP_SELF ?>">
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-primary" id="ButtonUpdate" name="ButtonUpdate"><i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
														</div>
													</form>
														<div class="modal-footer">
														</div>
															</form>
													</div>
												</div>
											</div>

											<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->

													<script method='post'>
															var table = document.getElementById('datatable-fixed-header');

															for(var counter = 1; counter < table.rows.length; counter++)
															{
																table.rows[counter].onclick = function()
																{;
																 document.getElementById("newFundID").value = this.cells[0].innerHTML;
																 document.getElementById("newFundName").value = this.cells[1].innerHTML;
																	};
																}
																</script>

																<script>
																$("#datatable-fixed-header tr").click(function()
																 {
																	var selected = $(this).hasClass("highlight");
																	$("#datatable-fixed-header tr").removeClass("highlight");

																if(!selected)
																$(this).addClass("highlight");

															});

																function showForm()
															{

															}
															function hideForm()
															{

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
    	</div>
  	</div>

    <footer>
      <div class="pull-right">
        COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
      </div>
      <div class="clearfix"></div>
    </footer>

    <?php include 'java.php';?>
		<script	src="	https://code.jquery.com/jquery-3.3.1.js">	</script>
	<script	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script	src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
  </body>
</html>
	<script>
$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>
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

		$delete= $_GET['delete'];
		$sql = "DELETE FROM fund WHERE fundID = '$delete'";

		if($conn->query($sql) === TRUE)
		{
			echo "Successful";
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		?>
		<script>
		window.location="fund.php";
		</script>
		<?php
		$conn->close();
	}
}
?>
