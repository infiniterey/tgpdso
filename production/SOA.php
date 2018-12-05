<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<style>
table tr:not(:first-child){
	cursor:pointer;transition: all .25s	ease-in-out;
}
#update{display: none};

table {
		width: 100px;
		table-layout: fixed;
}

td {
		overflow: hidden;
		max-width: 20%;
		width: 20%;
		word-wrap: break-word;
}
<<<<<<< HEAD
=======
.modal {
overflow-y:auto;
}
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5

</style>
</head>
<body class="nav-md footer_fixed modal-open"  style="padding-right: -15px;">

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
				<!-- page content -->
<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->
<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->

				</div>
				<form method="post"  action="<?php $_PHP_SELF ?>" style="margin-top: 40px;">
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
												<div>
													<input type="checkbox" name="soaCheckBox" id="soaCheckBox" onclick="viewCheckbox();" style="margin-top: 10px; margin-left: 20px;">&nbsp;View all SOA history
													<!--<h2><input type="text" name="searchT" id="searchT" placeholder="Policy No."></input>-->
													<!--<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-search btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>-->
													<button  type="button" style='float:right' data-toggle="modal" data-target="#addSOAModal" class="btn btn-primary" name="addThis" id="addThis"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add SOA</button>
													<br	><br>
													<div class="clearfix"></div>
												</div>
											</div>
<<<<<<< HEAD

=======
											<input type="checkbox" name="soaCheckBox" id="soaCheckBox" onclick="viewCheckbox();">&nbsp;View all SOA history
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
											<br><br>
												<div class="col-sm-12">

				<!-- table-striped dataTable-->
<<<<<<< HEAD
												<div id="tableFront" name="tableFront" style="margin-top: -10px;">
													<table id="datatable-fixed-header12" name="datatable-fixed-header10" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
=======

													<table id="datatable-fixed-header10" name="datatable-fixed-header10" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
														<thead>
															<tr role="row">
																<th hidden>SOAID</th>
																<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="TransactionDate" style="width: 25px;text-align:center;">Transaction Date</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyOwner" style="width: 500px;text-align:center;">Policy Owner</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyNo" style="width: 50px;text-align:center;">Policy No.</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PaymentMode" style="width: 20px;text-align:center;">M.O.P</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Premium" style="width: 20px;text-align:center;">Premium</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Rate" style="width: 10px;text-align:center;">Rate</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Commission" style="width: 40px;text-align:center;">Commission</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Agent" style="width: 50px;text-align:center;">Agent</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Action" style="width: 50px;text-align:center;">Action</th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
																<th hidden></th>
<<<<<<< HEAD
																<th hidden></th>
																<th hidden></th>

=======
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
															</tr>
														</thead>

														<tbody>

																<?php

																	$DB_con = Database::connect();
																	$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
<<<<<<< HEAD
																	$teamItSelf = $_SESSION["team"];
																	$userTypeItSelf = $_SESSION["usertype"];
																	if($_SESSION["usertype"] == "Secretary" || $_SESSION["usertype"] == "secretary")
																	{
																		$sql = "SELECT * FROM production, payment, agents, client, team, plans WHERE planID = plan AND agentCode = agent AND agentTeam = teamID AND teamName = '$teamItSelf' AND payment_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND (payment_soaDate IS NULL OR payment_soaDate LIKE '')";
																	}
																	else
																	{
																		$sql = "SELECT * FROM production, payment, agents, client, plans WHERE planID = plan AND payment_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND (payment_soaDate IS NULL OR payment_soaDate LIKE '')";
																	}
=======
																	$sql = "SELECT * FROM production, payment, agents, client WHERE payment_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND (payment_soaDate IS NULL OR payment_soaDate LIKE '')";

>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
																	$result = $DB_con->query($sql);
																	if($result->rowCount()>0){
																		while($row=$result->fetch(PDO::FETCH_ASSOC)){
																			$originalDate = $row['payment_transDate'];
																			$payTransdate = date("m/d/Y", strtotime($originalDate));
																			?>
																			<tr>
																				<td hidden><?php print($row['payment_ID']); ?></td>
<<<<<<< HEAD
																				<td><?php print($payTransdate); ?></td>
																				<td><?php print($row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename']);?></td>
																				<td><?php print($row['payment_policyNo']); ?></td>
																				<td><?php print($row['payment_MOP']); ?></td>
																				<td>Php&nbsp;<?php print($row['premium']); ?></td>
=======
																				<td><?php print($row['payment_transDate']); ?></td>
																				<td><?php print($row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename']);?></td>
																				<td><?php print($row['payment_policyNo']); ?></td>
																				<td><?php print($row['payment_MOP']); ?></td>
																				<td><?php print($row['premium']); ?></td>
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
																				<td><?php print($row['rate']); ?></td>
																				<td>Php&nbsp;<?php print($row['FYC']); ?></td>
																				<td><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
																				<td>
																					<div class="row">
																						<div class="col-md-6">
																						<button type="button" data-modal="modal" data-toggle="modal" data-target="#updateModal" class="btn btn-primary" style="margin-left: 10px;" name="editSoaButton"><i class="glyphicon glyphicon-copy"></i></a>
																					</div>
																					</div>
																				</td>
																				<td hidden><?php print($row['payment_policyNo']); ?></td>
																				<td hidden><?php print($row['payment_soaDate']); ?></td>
																				<td hidden><?php print($row['payment_transDate']); ?></td>
																				<td hidden><?php print($row['clientID']); ?></td>
																				<td hidden><?php print($row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']); ?></td>
																				<td hidden><?php print($row['payment_issueDate']); ?></td>
																				<td hidden><?php print($row['payment_MOP']); ?></td>
																				<td hidden><?php print($row['premium']); ?></td>
																				<td hidden><?php print($row['rate']); ?></td>
																				<td hidden><?php print($row['FYC']); ?></td>
																				<td hidden><?php print($row['agentCode']); ?></td>
																				<td hidden><?php print($row['agentLastname'].", ".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
																				<td hidden><?php print($row['payment_dueDate']); ?></td>
																				<td hidden><?php print($row['payment_ID']); ?></td>
																				<td hidden><?php print($row['planCode']); ?></td>
																				<td hidden><?php print($row['planID']); ?></td>
																			</tr>
																			<?php
																		}
																	}
																?>
															</tbody>
													</table>
													<script>
													var table = document.getElementById('datatable-fixed-header12');
													for(var counter = 1; counter < table.rows.length; counter++)
													{
														table.rows[counter].onclick = function()
														{
														 document.getElementById("soa_policyNo1").value = this.cells[10].innerHTML;
														 document.getElementById("soa_transDate1").value = this.cells[12].innerHTML;
														 document.getElementById("soa_name1").value = this.cells[13].innerHTML;
														 document.getElementById("soa_client1").value = this.cells[14].innerHTML;
														 document.getElementById("soa_issueDate1").value = this.cells[15].innerHTML;
														 document.getElementById("soaMOP1").value = this.cells[16].innerHTML;
														 document.getElementById("soa_premium1").value = this.cells[17].innerHTML;
														 document.getElementById("soa_rate1").value = this.cells[18].innerHTML;
														 document.getElementById("soa_commission1").value = this.cells[19].innerHTML;
														 document.getElementById("soa_agent1").value = this.cells[20].innerHTML;
														 document.getElementById("soa_agentname1").value = this.cells[21].innerHTML;
														 document.getElementById("soa_dueDate1").value = this.cells[22].innerHTML;
														 document.getElementById("soa_ID1").value = this.cells[23].innerHTML;
														 document.getElementById("soa_plan1").value = this.cells[24].innerHTML;
														 document.getElementById("soa_planID1").value = this.cells[25].innerHTML;
															};
														}
													</script>
												</div>
												<div hidden id="tableView" name="tableView" style="margin-top: -10px;">
													<table id="datatable-fixed-header11" name="datatable-fixed-header11" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
														<thead>
															<tr role="row">
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header11" rowspan="1" colspan="1" aria-label="PolicyNo" style="width: 50px;text-align:center;">Policy No.</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header11" rowspan="1" colspan="1" aria-label="PolicyOwner" style="width: 500px;text-align:center;">Policy Owner</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header11" rowspan="1" colspan="1" aria-label="Agent" style="width: 50px;text-align:center;">Agent</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header11" rowspan="1" colspan="1" aria-label="Action" style="width: 10px;text-align:center;">Action</th>
															</tr>
														</thead>

														<tbody>

																<?php

																	$DB_con = Database::connect();
																	$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																	$teamItSelf = $_SESSION["team"];
																	$userTypeItSelf = $_SESSION["usertype"];
																	if($_SESSION["usertype"] == "Secretary" || $_SESSION["usertype"] == "secretary")
																	{
																		$sql = "SELECT * FROM production, agents, client, team, soa WHERE SOA_policyNo = policyNo AND agentCode = agent AND agentTeam = teamID AND teamName = '$teamItSelf' AND agent = agentCode AND clientID = prodclientID";
																	}
																	else
																	{
																		$sql = "SELECT * FROM production, agents, client, soa WHERE SOA_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID ORDER BY prodID DESC LIMIT 1";
																	}
																	$result = $DB_con->query($sql);
																	if($result->rowCount()>0){
																		while($row=$result->fetch(PDO::FETCH_ASSOC)){
																			?>
																			<tr>
																				<td><?php print($row['policyNo']); ?></td>
																				<td><?php print($row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename']);?></td>
																				<td><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
																				<td>
																					<div class="row">
<<<<<<< HEAD
																						<a type="button" id="buttonPol" href="soa.php?view=<?php echo $row['SOA_policyNo']?>" class="btn btn-primary" style="margin-left:60px;" name="editSoaButton"><i class="glyphicon glyphicon-new-window"></i>&nbsp;View Details</a>
=======
<<<<<<< HEAD
																						<a type="button" id="buttonPol" href="soa.php?view='<?php echo $row['policyNo']?>'" class="btn btn-primary" style="margin-left:60px;" name="editSoaButton"><i class="glyphicon glyphicon-new-window"></i>&nbsp;View Details</a>
=======
																						<div class="col-md-6">
																						<button type="button" data-modal="modal" data-toggle="modal" data-target="#updateModal" class="btn btn-primary" style="margin-left: 10px;" name="editSoaButton"><i class="glyphicon glyphicon-copy"></i></a>
																					</div>
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
>>>>>>> 0d2c8347e3b0e0f23fd32947a121522ef01ca06b
																					</div>

																				</td>
																				<td hidden><?php print($row['payment_policyNo']); ?></td>
																				<td hidden><?php print($row['payment_soaDate']); ?></td>
																				<td hidden><?php print($row['payment_transDate']); ?></td>
																				<td hidden><?php print($row['clientID']); ?></td>
																				<td hidden><?php print($row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']); ?></td>
																				<td hidden><?php print($row['payment_issueDate']); ?></td>
																				<td hidden><?php print($row['payment_MOP']); ?></td>
																				<td hidden><?php print($row['premium']); ?></td>
																				<td hidden><?php print($row['rate']); ?></td>
																				<td hidden><?php print($row['FYC']); ?></td>
																				<td hidden><?php print($row['agentCode']); ?></td>
																				<td hidden><?php print($row['agentLastname'].", ".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
																				<td hidden><?php print($row['payment_dueDate']); ?></td>
																				<td hidden><?php print($row['payment_ID']); ?></td>
																			</tr>
																			<?php
																		}
																	}
																?>
															</tbody>
													</table>

<<<<<<< HEAD
												</div>
=======
													<script>
													var table = document.getElementById('datatable-fixed-header10');
													for(var counter = 1; counter < table.rows.length; counter++)
													{
														table.rows[counter].onclick = function()
														{
														 document.getElementById("soa_policyNo1").value = this.cells[10].innerHTML;
														 document.getElementById("soa_transDate1").value = this.cells[12].innerHTML;
														 document.getElementById("soa_name1").value = this.cells[13].innerHTML;
														 document.getElementById("soa_client1").value = this.cells[14].innerHTML;
														 document.getElementById("soa_issueDate1").value = this.cells[15].innerHTML;
														 document.getElementById("soaMOP1").value = this.cells[16].innerHTML;
														 document.getElementById("soa_premium1").value = this.cells[17].innerHTML;
														 document.getElementById("soa_rate1").value = this.cells[18].innerHTML;
														 document.getElementById("soa_commission1").value = this.cells[19].innerHTML;
														 document.getElementById("soa_agent1").value = this.cells[20].innerHTML;
														 document.getElementById("soa_agentname1").value = this.cells[21].innerHTML;
														 document.getElementById("soa_dueDate1").value = this.cells[22].innerHTML;
														 document.getElementById("soa_ID").value = this.cells[23].innerHTML;
															};
														}
													</script>

>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
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
	<div id="addSOAModal" name="addSOAModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
		<?php include 'PHPFile/button_addSOA.php'?>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
		<?php include 'PHPFile/searchPolicy_SOA.php'; ?>
</div>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<?php include 'PHPFile/button_updateSOA.php'; ?>
</div>
<div class="modal fade" name="addSOASearchPolicy" id="addSOASearchPolicy" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="margin-top: 20px;">
	<?php include 'PHPFile/button_searchPolicy_addSOA.php'; ?>
</div>
<<<<<<< HEAD
<div class="modal fade" name="searchAgent" id="searchAgent" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="margin-top: 20px;">
	<?php include 'PHPFile/button_searchAgent_addSOA.php'; ?>
</div>
<div class="modal fade" name="searchAgentUpdate" id="searchAgentUpdate" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="margin-top: 20px;">
	<?php include 'PHPFile/button_searchAgent_updateSOA.php'; ?>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="clientSearchSOA" name="clientSearchSOA" data-keyboard="false" data-backdrop="static" style="margin-top: 20px;">
	<?php include 'PHPFile/button_searchClient_updateSOA.php'; ?>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="clientSearchAddSOA" name="clientSearchAddSOA" data-keyboard="false" data-backdrop="static" style="margin-top: 20px;">
	<?php include 'PHPFile/button_searchClient_updateSOA.php'; ?>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="planSearchSOA" name="planSearchSOA" data-keyboard="false" data-backdrop="static" style="margin-top: 30px;">
	<?php include 'PHPFile/button_add_plan_SOA.php'; ?>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="planSearchAddSOA" name="planSearchAddSOA" data-keyboard="false" data-backdrop="static" style="margin-top: 30px;">
	<?php include 'PHPFile/button_add_plan_AddSOA.php'; ?>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="viewSOA" name="viewSOA" data-keyboard="false" data-backdrop="static" style="margin-top: 30px;">
	<?php include 'PHPFile/button_ViewDetails_SOA.php'?>
</div>
=======
<div class="modal fade" name="searchAgent" id="searchAgent" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<?php include 'PHPFile/button_searchAgent_addSOA.php'; ?>
</div>
>>>>>>> 9843b792cca4e107b6eabdb16ad5006e4a07e1b5
	<footer style="margin-bottom: -15px;">
		<center>
			COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
		</center>
	</footer>

	<?php include 'java.php'; ?>

	<script	src="	https://code.jquery.com/jquery-3.3.1.js"></script>
	<script	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script	src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!-- The Modal -->
</body>
</html>
<?php include 'PHPFile/soaConnection.php'?>
