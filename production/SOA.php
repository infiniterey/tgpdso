<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
	<style>
	.modal {
  overflow-y:auto;
}
</style>
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
													<!--<h2><input type="text" name="searchT" id="searchT" placeholder="Policy No."></input>-->
													<!--<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-search btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>-->
													<button  type="button" style='float:right' data-toggle="modal" data-target="#addSOAModal" class="btn btn-primary" name="searchPolicy" id="searchPolicy"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add SOA</button>
													<br	><br>
													<div class="clearfix"></div>
												</div>
											</div>
											<input type="checkbox" name="soaCheckBox" id="soaCheckBox"/>&nbsp;View all SOA history
											<br><br>
												<div class="col-sm-12">

				<!-- table-striped dataTable-->

													<table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
														<thead>
															<tr role="row">
																<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="TransactionDate" style="width: 25px;text-align:center;">Transaction Date</th>
																<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyOwner" style="width: 200px;text-align:center;">Policy Owner</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyNo" style="width: 100px;text-align:center;">Policy No.</th>
																<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PaymentMode" style="width: 100px;text-align:center;">M.O.P</th>
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
																	$sql = "SELECT * FROM production, payment, agents, client WHERE payment_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND dueDate = payment_nextDue AND (SOAdate IS NULL OR SOAdate LIKE '')";

																	$result = $DB_con->query($sql);
																	if($result->rowCount()>0){
																		while($row=$result->fetch(PDO::FETCH_ASSOC)){
																			?>
																			<tr>
																				<td><?php print($row['transDate']); ?></td>
																				<td><?php print($row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename']);?></td>
																				<td><?php print($row['policyNo']); ?></td>
																				<td><?php print($row['modeOfPayment']); ?></td>
																				<td><?php print($row['premium']); ?></td>
																				<td><?php print($row['rate']); ?></td>
																				<td><?php print($row['FYC']); ?></td>
																				<td><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
																				<td>
																					<div class="row">
																						<button  type="button" style='float:right' data-toggle="modal" data-target="#momodal" class="btn btn-danger" name="btn-addPlan" disabled><i class="fa fa-trash"></i></button>
																						<a  href="soa.php?update=<?php print($row['policyNo']); ?>#addSOAModal" style='float:right' class="btn btn-primary" name="btn-addPlan"><i class="fa fa-pencil"></i></a>
																					</div>
																				</td>
																			</tr>
																			<?php
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
<div class="modal fade" name="addSOASearchPolicy" id="addSOASearchPolicy" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<?php include 'PHPFile/button_searchPolicy_addSOA.php'; ?>
</div>
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
