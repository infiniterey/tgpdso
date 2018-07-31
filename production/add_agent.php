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
							tgpdso::addAgent();
						}
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
																Agent Code<span class="required">*</span>
																<input type="text" placeholder="Agent Code" name="agentCode" required="required" class="form-control" required><br>
																Last Name <span class="required">*</span>
																<input type="text" placeholder="Lastname" name="lastname" required="required" class="form-control" required><br>
																First Name <span class="required">*</span>
																<input type="text" name="firstname" placeholder="First Name" required="required" class="form-control " required><br>
																Middle Name<span class="required">*</span>
																<input type="text" name="middlename" placeholder="Middle Name" required="required" class="form-control" required><br>
																Birthdate <span class="required">*</span> <br>
																<input style="width:195px" name="birthdate" placeholder="Birthdate" class="date-picker form-control" required="required" type="date" required><br>
																Application Date<span class="required">*</span> <br>
																<input name="appDate" style="width:195px" placeholder="Application Date" class="date-picker form-control" required="required" type="date" required><br>
																Team<span class="required">*</span> <br>
																<select style = "width:195px" name="team" class="form-control" readonly>
																<?php tgpdso::dropdown_team(); ?>
																</select>
																<br>Position <span class="required">*</span><br>
																<input type="text" name="position" placeholder="Position" style="float:left;margin-bottom:30px" required="required" class="form-control col-md-7 col-xs-12" required>
																<center>
			                          <a href="add_production.php" class="btn btn-primary"><i class="fa fa-close"></i>&nbsp;Cancel</a>
	                             <button type="submit" class="btn btn-success" name="btn-save"><i class="fa fa-check"></i>&nbsp;Save</button>
													</div>
												<div class="col-sm-9">
													<style>

													</style>
														<table id="datatable-fixed-header" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
														<thead>
															<tr role="row">
																<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 15px;text-align:center;">Agent Code</th>
																	<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Name</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending" style="width: 35px;text-align:center;name="PolicyNoCell"">Birthdate</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Application Date</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Premium: activate to sort column ascending" style="width: 15px;text-align:center;">Team</th>
																<th class="sorting" tabin	dex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Mode of Payment: activate to sort column ascending" style="width: 15px;text-align:center;">Position</th>

																</tr>
														</thead>
														<tbody>
															<?php
															if($_SESSION['usertype'] == 'Secretary' || $_SESSION['usertype'] == 'secretary')
															{
																$team = $_SESSION['team'];

																$DB_con = Database::connect();
																$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																$sql = "SELECT * FROM agents, team WHERE agentTeam = teamID AND teamName = '$team'";

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


																		</tr>
																		<?php
																	}
																}
																else{}
																}
																else {
																	$DB_con = Database::connect();
																	$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																	$sql = "SELECT * FROM agents";

																	$result = $DB_con->query($sql);
																	if($result->rowCount()>0){

																		while($row=$result->fetch(PDO::FETCH_ASSOC)){
																			?>
																			<tr>
																				<td><?php print($row['agentCode']); ?></td>
																				<td><?php print($row['agentLastname']. ", " .$row['agentFirstname']. " " .$row['agentMiddlename']); ?></td>
																				<td><?php print($row['agentBirthdate']); ?></td>
																				<td><?php print($row['agentApptDate']); ?></td>
																				<td><?php print($row['agentTeam']); ?></td>
																				<td><?php print($row['agentPosition']); ?></td>
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
