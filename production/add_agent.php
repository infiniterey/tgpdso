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
						if(isset($_POST['ButtonUpdate']))
						{
							tgpdso::updateAgent();
						}
						if(isset($_POST['btn-save'])){
							tgpdso::addAgent();
						}
					?>
					<?php
						$newLast="";
						$newFirst="";
						$newMiddle="";
						$agentcode="";
					?>
				<div class="right_col" role="main">
					<div class="">
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>Add Agent</b></h2>
										<div class="clearfix"></div>
									</div>
										<div id="datatable-fixed-header_wrapper"  class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<div class="row">
												<div class="col-sm-3">
																Agent Code<span class="required">*</span></br>
																<input style="width:195px" type="text" placeholder="Agent Code" name="agentCode" required="required" class="form-control" required><br>
																Last Name <span class="required">*</span></br>
																<input style="width:195px" type="text" placeholder="Lastname" name="lastname" required="required" class="form-control" required><br>
																First Name <span class="required">*</span></br>
																<input style="width:195px" type="text" name="firstname" placeholder="First Name" required="required" class="form-control " required><br>
																Middle Name<span class="required">*</span></br>
																<input style="width:195px" type="text" name="middlename" placeholder="Middle Name" required="required" class="form-control" required><br>
																Birthdate <span class="required">*</span></br>
																<input style="width:195px" name="birthdate" placeholder="Birthdate" class="date-picker form-control" required="required" type="date" required><br>
																Application Date<span class="required">*</span></br>
																<input name="appDate" style="width:195px" placeholder="Application Date" class="date-picker form-control" required="required" type="date" required><br>
																Team<span class="required">*</span></br>
																<select style = "width:195px" name="team" id="team" class="form-control" >
																<?php tgpdso::dropdown_team(); ?>
																</select>
																<br>Position <span class="required">*</span></br>
																<select style = "width:195px" name="position" id="position"class="form-control" >
																<?php tgpdso::dropdown_position(); ?>
																</select><center><br></br>
																<button type="submit" style="float:left"class="btn btn-primary" name="btn-save"><i class="fa fa-check"></i>&nbsp;Save</button>
			                         <button style="float:left;height:36px;" type="reset" name="reset" id="reset" class="btn btn-default">Cancel</button>

													</div>
												<div class="col-sm-9">
														<table id="datatable-fixed-header" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
														<thead>
															<tr role="row">
																<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 15px;text-align:center;">Agent Code</th>
																	<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Name</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending" style="width: 35px;text-align:center;name="PolicyNoCell"">Birthdate</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Application Date</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Premium: activate to sort column ascending" style="width: 15px;text-align:center;">Team</th>
																<th class="sorting" tabin	dex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Mode of Payment: activate to sort column ascending" style="width: 15px;text-align:center;">Position</th>
																<th class="sorting" style="width:50px;text-align:center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Action</th>
																</tr>
														</thead>
														<tbody>
															<?php
																 include 'A_Login/PositionAndTeam.php';

																$DB_con = Database::connect();
																$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																$sql = "SELECT * FROM agents, team WHERE agentTeam = teamID AND teamName = '$teamUser'";

																$result = $DB_con->query($sql);
																if($result->rowCount()>0){

																	while($row=$result->fetch(PDO::FETCH_ASSOC)){
																		?>
																		<tr>
																			<td><?php print($row['agentCode']); ?></td>
																			<td><?php print($row['agentLastname']. ", " .$row['agentFirstname']. " " .$row['agentMiddlename']); ?></td>
																			<td><?php print($row['agentBirthdate']); ?></td>
																			<td><?php print($row['agentApptDate']); ?></td>
																			<td><?php print($row['teamName']); ?></td>
																			<td><?php print($row['agentPosition']); ?></td>
																			<td>
																				<div class="row">
																					<center>
																						<form method='post' name='myform' onsubmit="CheckForm()">
																							<button  type="button" id="update" name="update" data-toggle="modal" data-target="#myModal2" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_agent.php?delete=<?php echo $row['agentCode'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																						</form>
																					</center>
																				</div>
																			</td>

																		</tr>
																		<?php
																	}
																}
															else if($positionUser == 'Administrator' || $positionUser == 'administrator'){
																$DB_con = Database::connect();
																$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																$sql = "SELECT * FROM agents, team where agentTeam = teamID";

																$result = $DB_con->query($sql);
																if($result->rowCount()>0){

																	while($row=$result->fetch(PDO::FETCH_ASSOC)){
																		?>
																		<tr>
																			<td><?php print($row['agentCode']); ?></td>
																			<td><?php print($row['agentLastname']. ", " .$row['agentFirstname']. " " .$row['agentMiddlename']); ?></td>
																			<td><?php print($row['agentBirthdate']); ?></td>
																			<td><?php print($row['agentApptDate']); ?></td>
																			<td><?php print($row['teamName']); ?></td>
																			<td><?php print($row['agentPosition']); ?></td>
																			<td>
																				<div class="row">
																					<center>
																						<form method='post' name='myform' onsubmit="CheckForm()">
																							<button  type="button" id="update" name="update" data-toggle="modal" data-target="#myModal2" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_agent.php?delete=<?php echo $row['agentCode'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																						</form>
																					</center>
																				</div>
																			</td>

																		</tr>
																		<?php
																	}
																}
															}
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
				<!-- The Modal add agent to train	ing--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
				<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addAgentToTrain">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
							</div>
							<form method='post' name='myform' onsubmit="CheckForm()">
								<div class="modal-body">
										<div class="row">
										<div class="col-md-12">
											<table id="myTable" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="">
											<thead>
												<tr role="row">
																<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Position ID</th>
													<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Position Name</th>
													</tr>
											</thead>
											<tbody>
												<?php
													$DB_con = Database::connect();
													$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
													$sql = "SELECT * FROM position";

													$result = $DB_con->query($sql);
													if($result->rowCount()>0){
														while($row=$result->fetch(PDO::FETCH_ASSOC)){
															?>
															<tr>
																<td><?php print($row['positionID']); ?></td>
																<td><?php print($row['positionName']); ?></td>

														</tr>
															<?php
														}
													}
													else{
													}
												?>

												</tbody>
											</table>
											<br><br>
											<button style="float:right" type="button" class="btn btn-primary" data-dismiss="modal" id="ok" name="ok"><span class='fa fa-close'></span>Ok</button>
									</form>

										</div>
								</div>
							</form>
						</div>
					</div>
					</div>
					</div>
					<!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
					<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
					<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
							<h2 class="modal-title">Update Agent</h2>
							<button type="button" class="close" data-dismiss="modal">x</button>
						</div>
							<form method="post" name='myform' onsubmit="CheckForm()">
						<div method="post" class="modal-body">
							<?php
								if(isset($_POST['agentcode'])){$agentcode =  $_POST['agentcode'];}
								$DB_con = Database::connect();
								$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
								$sql = "SELECT * FROM agents where agentCode = '$agentcode'";
								$result = $DB_con->query($sql);
								if($result->rowCount()>0){
									while($row=$result->fetch(PDO::FETCH_ASSOC)){
										?>
										<script>alert('yayo <?php $agentcode ?>');</script>
										<?php
										$newLast = $row['agentLastname'];
										$newFirst = $row['agentFirstname'];
										$newMiddle = $row['agentMiddlename'];
									}
								}
								else{}
							?>
							New agent code<span class="required">*</span><input type="text" readonly='readonly' class="form-control" name="agentcode" style="width:195px" id="agentcode" value=""><br>
							New last name<span class="required">*</span> <br><input type="text" class="form-control" name="newLastName" style="width:195px" id="newLastName" value="<?php echo $newLast ?>"><br>
							New first name<span class="required">*</span> <br><input type="text" class="form-control" name="newFirstName" style="width:195px" id="newFirstName" value="<?php echo $newFirst ?>"><br>
							New middle name<span class="required">*</span> <br><input type="text" class="form-control" name="newMiddleName" style="width:195px" id="newMiddleName" value="<?php echo $newMiddle ?>"><br>
							New birthdate<span class="required">*</span> <br><input type="text" class="form-control" name="newBirthdate" style="width:195px" id="newBirthdate" value=""><br>
							New application date<span class="required">*</span> <br><input type="text" class="form-control" name="newAppDate" style="width:195px" id="newAppDate" value=""><br>
						  New team<span class="required">*</span> <br><select style = "width:195px" name="newTeam" id="newTeam" class="form-control">
							<?php tgpdso::dropdown_team(); ?>
							</select>
							New position<span class="required">*</span> <br>
							<select style = "width:195px" name="newPosition" id="newPosition"class="form-control" >
							<?php tgpdso::dropdown_position(); ?>
							</select>
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
<script method='post'>
		var table = document.getElementById('datatable-fixed-header');

		for(var counter = 1; counter < table.rows.length; counter++)
		{
			table.rows[counter].onclick = function()
			{;
				document.getElementById("agentcode").value = this.cells[0].innerHTML;
			 document.getElementById("newBirthdate").value = this.cells[2].innerHTML;
			 document.getElementById("newAppDate").value = this.cells[3].innerHTML;
			 document.getElementById("newTeam").value = this.cells[4].innerHTML;
			 document.getElementById("newPosition").value = this.cells[5].innerHTML;
				};
			}
			</script>
	<script method="POST">

	var table = document.getElementById('myTable');

for(var counter = 1; counter < table.rows.length; counter++)
{
	table.rows[counter].onclick = function()
	{;
		document.getElementById("position").value =this.cells[1].innerHTML;
		};
	}

$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
$("#myTable tr").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#myTable tr").removeClass("highlight");

	if(!selected)
						$(this).addClass("highlight");
});
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
		?><script>alert('<?php echo $delete?>');</script><?php
		$sql = "DELETE FROM agents WHERE agentCode	 = '$delete'";

		if($conn->query($sql) === TRUE)
		{
			echo "Successful";
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		?>
		<script>
		window.location="add_agent.php";
		</script>
		<?php
		$conn->close();
	}
}
?>
