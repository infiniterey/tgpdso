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
				<script>

				$(function () {
				$('#modal-container').on('hidden.bs.modal', function () {
	    	$(this).removeData('bs.modal');
	    	$('#modal-container .modal-content').empty();
					});
				});

					function cancelInfoAgent()
					{
						document.getElementById("planCode").value = "";
						document.getElementById("planCodePass").value = "";
						document.getElementById("planDesc").value = "";
						document.getElementById("planRate").value = "";
						document.getElementById("plan").value = "";
					}

				</script>
				<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addplanmodal" data-keyboard="false" data-backdrop="static">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" onclick="cancelInfoAgent();" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
							</div>
							<form method='post' name='myform' onsubmit="CheckForm()">
								<div class="modal-body">

									<div class="row">
										<div class="col-md-4">

									<?php
										if(isset($_POST['btn-addPlan'])){
											tgpdso::addPlan();
										}
									?>
									Plan Code: <input id="planCode" type="text" class="form-control" name="planCode"><br>
									Plan Description: <input id="planDesc" type="text" class="form-control" name="planDesc">
									Plan Rate: <input id="planRate" type="text" class="form-control" name="planRate">

									<br/><br/>

									<input type="text" name="planC" id="planC" hidden>
									<button type="submit" class="btn btn-primary" id="btn-addPlan" name="btn-addPlan"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
									<button type="reset" class="btn btn-default" name="cancel" id="cancel" onclick="ClickCancel()">Cancel</button>
									&nbsp;

									</div>

									<div class="col-md-6">


										<table id="datatable-fixed-header1" align="center" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
											<thead>
												<tr role="row">
														<th hidden tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="PlanID"></th>
													<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Plan Code" style="width: 50px;text-align:center;">Plan Code</th>
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Description" style="width: 600px;">Plan Description</th>
													<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Rate" style="width: 35px;text-align:center;">Plan Rate</th>
													<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Action" style="width: 35px;text-align:center;">Action</th>

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

																	<td hidden><?php print($row['planID']); ?></td>
																	<td><?php print($row['planCode']); ?></td>
																	<td><?php print($row['planDesc']); ?></td>
																	<td><?php print($row['planRate']); ?></td>
																	<td><button style="width: 100%; height: 100%;" onclick="" type="button" id="retrieveAgent" name="retrieveAgent" data-dismiss="modal" class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button></td>

																</tr>
																<?php
															}
														}
														else{}
													?>
												</tbody>
										</table>


										<script>


											var table = document.getElementById('datatable-fixed-header1');
											for(var counter = 1; counter < table.rows.length; counter++)
											{
												table.rows[counter].onclick = function()
											{;
										//		 document.getElementById("planCode").value = this.cells[0].innerHTML;
												 document.getElementById("planCodePass").value = this.cells[0].innerHTML;
										//		 document.getElementById("planDesc").value = this.cells[1].innerHTML;
										//		 document.getElementById("planRate").value = this.cells[2].innerHTML;
												 document.getElementById("plan").value = this.cells[1].innerHTML;

													};
												}

												</script>

									</div>
								</div>

								</div>
								<div class="modal-footer">
																			<div>
											<div class="row">
												<div class="col-md-3">
											</div>
											<div class="col-md-8">
										</div>
										<form method="post" action="<?php $_PHP_SELF ?>">

										<div class="col-md-6">
											<button type="submit" id="ModalEdit"  name="ModalEdit" class="btn btn-primary" formnovalidate><i class="fa fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;</i>Update Plan</button>
										</div>
									<div class="col-md-1">
											<button type="submit" id="ModalDelete" name="ModalDelete" class="btn btn-primary" onclick="return confirm('Are you sure do you want to delete this plan?')" formnovalidate><i class="fa fa-trash">&nbsp;&nbsp;&nbsp;&nbsp;</i>Delete Plan</button>
									</div>
											</div>
										</div>
									</form>

										</div>
								</div>
							</form>
						</div>
					</div>

	<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->
					<div class="modal fade" id="myModal">
					  <div class="modal-dialog">
					    <div class="modal-content">


					      <div class="modal-header">
					        <h2 class="modal-title">Search agent<button type="button" class="close" data-dismiss="modal" onclick="RemoveTextAgent();">x</button></h2>
					      </div>

								<form style="margin-bottom: 10px;">
					      <div class="modal-body">

									<table id="datatable-fixed-header2" align="center" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Agent Code">Agent Code</th>
												<th style="width:" class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Agent Name">Full Name</th>
												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Birthdate" hidden>Birthdate</th>
												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Appointment Date">Appointment Date</th>
												<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Team">Team</th>
												<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Team" hidden>Team</th>
												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Position" hidden>Position</th>
												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Action">Action</th>
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
																<td hidden><?php print($row['agentBirthdate']); ?></td>
																<td><?php print($row['agentApptDate']); ?></td>
																	<td><?php print($row['teamName']); ?></td>
																<td hidden><?php print($row['teamName']); ?></td>
																<td hidden><?php print($row['agentPosition']); ?></td>
																<td><button style="width: 100%; height: 100%;" onclick="AgentInfo();" type="button" id="retrieveAgentInfo" name="retrieveAgentInfo" data-dismiss="modal" class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button></td>
															</tr>
															<?php
														}
													}
													else{}
													}
													else {
														$DB_con = Database::connect();
														$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
														$sql = "SELECT * FROM agents, team WHERE agentTeam = teamID";

														$result = $DB_con->query($sql);
														if($result->rowCount()>0){

															while($row=$result->fetch(PDO::FETCH_ASSOC)){
																?>
																<tr>
																	<td><?php print($row['agentCode']); ?></td>
																	<td><?php print($row['agentLastname']. ", " .$row['agentFirstname']. " " .$row['agentMiddlename']); ?></td>
																	<td hidden><?php print($row['agentBirthdate']); ?></td>
																	<td><?php print($row['agentApptDate']); ?></td>
																	<td><?php print($row['teamName']); ?></td>
																	<td hidden><?php print($row['agentTeam']); ?></td>
																	<td hidden><?php print($row['agentPosition']); ?></td>
																	<td><button style="width: 100%; height: 100%;" onclick="AgentInfo();" type="button" id="retrieveAgentInfo" name="retrieveAgentInfo" data-dismiss="modal" class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button></td>
																</tr>
																<?php
															}
														}
													}
												?>
											</tbody>
									</table>

									<script>

									function AgentInfo(){
										var table = document.getElementById('datatable-fixed-header2');
										for(var counter = 1; counter < table.rows.length; counter++)
										{
											table.rows[counter].onclick = function()
											{;
											 document.getElementById("agent").value = this.cells[1].innerHTML;
											 document.getElementById("agentCode").value = this.cells[0].innerHTML;
												};
											}
										}

										function RemoveTextAgent()
										{
											document.getElementById("agent").value = "";
											document.getElementById("agentCode").value = "";
										}

											</script>
										</form>
					      </div>


					      <div class="modal-footer">
					      </div>

					    </div>
					  </div>
					</div>
	<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->
	<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->
					<div class="modal fade" tabindex="-1" role="dialog" id="clientSearch" name-"clientSearch" data-keyboard="false" data-backdrop="static">
							<div class="modal-dialog modal-lg">
					    <div class="modal-content">


					      <div class="modal-header">
					        <h2 class="modal-title">Search Client <button type="button" class="close" data-dismiss="modal" onclick="cancelDetail();">x</button></h2>
					      </div>
					      <div class="modal-body">
									<div class="row">
										<div class="col-md-3">

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

									<div class="col-md-9">

									<table id="datatable-fixed-header3" align="center" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ClientID" hidden>ClientID</th>
												<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="FullName" style="width: 200px">Full Name</th>
												<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Birthdate">Birthdate</th>
												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" aria-label="Address">Address</th>
												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" aria-label="CellNo">Cellphone No.</th>
												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" aria-label="Action">Action</th>
											</tr>
										</thead>
										<tbody>



												<?php
														$DB_con = Database::connect();
														$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
														$sql = "SELECT * FROM client";

														$result = $DB_con->query($sql);
														if($result->rowCount()>0){

															while($row=$result->fetch(PDO::FETCH_ASSOC)){
																?>
																<tr>
																	<td hidden><?php print($row['clientID']); ?></td>
																	<td readonly><?php print($row['cLastname']. ", " .$row['cFirstname']. " " .$row['cMiddlename']); ?></td>
																	<td><?php print($row['cBirthdate']); ?></td>
																	<td><?php print($row['cAddress']); ?></td>
																	<td><?php print($row['cCellno']); ?></td>
																	<td>
																				<!--<button data-id="<?php print($row['clientID'])?>" type="button" id="retrieve" data-dismiss="modal" name="retrieve" title="Edit Data" class="buttonHere btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button>-->
																				<button style="width: 100%; height: 100%;" onclick="clickMe();" type="button" id="retrieve" name="retrieve" data-dismiss="modal" class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button>
																				<!--<a title="Edit Data" href="newBusiness.php?client=<?php echo $row['clientID']?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>-->
																	</td>

																</tr>
																<?php
															}
														}
												?>
											</tbody>
									</table>
									<script>

	//								document.getElementById("retrieve").addEventListener("click", clickMe);

								function cancelDetail()
								{
									document.getElementById("client").value = "";
									document.getElementById("clientIDModal").value = "";
								}

								function clickMe() {
									var value = document.getElementById('client');
									var table = document.getElementById('datatable-fixed-header3');
									for(var counter = 1; counter < table.rows.length; counter++)
									{
											table.rows[counter].onclick = function()
											{
											document.getElementById("client").value = this.cells[1].innerHTML;
											document.getElementById("clientIDModal").value = this.cells[0].innerHTML;
										};
									}
								}

										</script>


	<!--											<?php
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
												if(isset($_GET['client']))
												{
														$client = $_GET['client'];

															$result=mysqli_query($conn,"SELECT * FROM client WHERE clientID = '$client'");

															while($row=mysqli_fetch_Array($result))
															{
																?>
																<script> document.getElementById('client').value = '<?php echo $row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename'];?>';</script>
															<?php
														};
											}
										}

										?>
	-->




	<!--		//							$(document).on("click", "retrieve", function()
		//							{
		//								var row=$(this);
		//								var id=$(this).attr("data-id");
		//								$("#client").val(id);

		//							});

			//					var table = document.getElementById('datatable-fixed-header3')
			//					for(var counter = 1; counter < table.rows.length; counter++)
			//					{
			//							table.rows[counter].onclick = function()
			//							{;
			//								document.getElementById("client").value = this.cells[1].innerHTML;
			//								document.getElementById("clientIDModal").value = this.cells[0].innerHTML;
			//							};
			//						}

	-->
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
	                  <h2><b>DAILY PRODUCTION</b></h2>

	                  <div class="clearfix"></div>
	                </div>
	                  <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
	                    <div class="row">
												<div class="col-sm-3">
			                          Transaction Date <span class="required">*</span>
			                          <input name="transDate" id="transDate" style="width: 195px;" class="date-picker form-control" required="required" type="date" required><br>
			                          Client Name <span class="required">*</span><br>
			                          <input name="client" placeholder="Client Name" id="client" style="width: 150px;" class="date-picker form-control" required="required" type="text" required readonly>
																<button type="button" class="btn btn-primary" style="margin-bottom: -1px;" data-toggle="modal" data-target="#clientSearch"><span class='glyphicon glyphicon-search'></span></button><br>

			                          <input type="text" id="firstname" placeholder="Firstname" name="firstname"hidden>
			                          <input type="text" id="lastname" placeholder="Lastname" name="lastname"hidden>

					                      Policy No. <span class="required">*</span>
					                      <input type="text" id="policyNo" name="policyNo" placeholder="Policy No." required="required" class="form-control" required><br>
			                          Plan <span class="required">*</span> <br>
			                          <input name="plan" id="plan" class="form-control" value="" placeholder="Plan" style="width: 150px;" required readonly>
																<input hidden name="planCodePass" id="planCodePass" value="" placeholder="" style="width: 150px;">
																<button type="button" class="btn btn-primary" style="margin-bottom: -1px;" data-toggle="modal" data-target=".bs-example-modal-sm"><span class='glyphicon glyphicon-plus'></span></button><br>
																Official Receipt No.
																<input type="text" id="receiptNo" name="receiptNo" required="required" placeholder="OR #" class="form-control" required><br>
					                      Face Amount
					                      <input type="text" id="faceAmount" name="faceAmount" required="required" class="form-control" placeholder="Face Amount" required><br>
					                      Premium <span class="required">*</span>
			                          <input type="text" id="premium" name="premium" required="required" class="form-control" placeholder="Premium" required><br>
					                     	Rate <span class="required">*</span><br>
					                      <input type="text" id="rate" name="rate" required="required" class="form-control" placeholder="Rate" required><br>
																Mode of Payment <span class="required">*</span><br>
			                          <select name="modeOfPayment" id="modeOfPayment" class="select2_gender form-control" style="width: 195px;" tabindex="-1">
		                            <option value="Monthly" id="modeOfPayment">Monthly</option>
		                            <option value="Quarterly" id="modeOfPayment">Quarterly</option>
		                            <option value="Semi-Annual" id="modeOfPayment">Semi-Annual</option>
		                            <option value="Annualy" id="modeOfPayment">Annualy</option>
																</select><br>
					                      Agent <span class="required">*</span><br>
																<input type="text" id="agentCode" name="agentCode" hidden>
			                          <input type="text" id="agent" name="agent" required="required" placeholder="Agent Name" class="form-control" required style="width: 150px;" readonly>
																<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"><i class="fa fa-search"></i></button>
																<br><br>

																<center>

																	<input name="clientIDModal" id="clientIDModal" type="text" hidden><br>
																	<button type="submit" class="btn btn-primary" id="SaveButton" name="SaveButton"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>

																	<button type="submit" class="btn btn-primary" id="UpdateButton" name="UpdateButton"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Update</button>
																	<a  class="btn btn-default" href="newBusiness.php" onclick="disableUpdateButton();">Cancel</a>

																</center>
													</div>
	                      <div class="col-sm-9">

	      <!-- table-striped dataTable-->

	                        <table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
	                          <thead>
	                            <tr role="row">
																  <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 15px;text-align:center;" hidden>ProdID</th>
	                              <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 15px;text-align:center;">Trans. Date</th>
	                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Name of Insured</th>
	                              <th class="sorting" tabindex="0" id="policyNum" name="policyNum" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending" style="width: 35px;text-align:center;">Policy No.</th>
	                              <th class="sorting" tabindex="0" id="receiptNum" name="receiptNum" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 10px;text-align:center;">OR No.</th>
	                              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Premium: activate to sort column ascending" style="width: 15px;text-align:center;">Premium</th>
	                              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Mode of Payment: activate to sort column ascending" style="width: 15px;text-align:center;">M.O.P</th>
	                              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Issued Date: activate to sort column ascending" style="width: 100px;text-align:center;">Agent</th>
	                              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Agent: activate to sort column ascending" style="width: 15px;text-align:center;">Status</th>
	                              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 10px;text-align:center;">Action</th>
															</tr>
	                          </thead>



														<tbody>

	                              <?php
																	if($_SESSION['usertype'] == 'Secretary')
																	{
																		$team = $_SESSION['team'];
																		$usertype = $_SESSION['usertype'];

	                                  $DB_con = Database::connect();
	                                  $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	                                  	$sql = "SELECT * FROM production, client, agents, team WHERE prodclientID = clientID AND agentCode = agent AND agentTeam = teamID AND teamName = '$team'";


	                                  $result = $DB_con->query($sql);
	                                  if($result->rowCount()>0)
																		{
	                                    while($row=$result->fetch(PDO::FETCH_ASSOC))
																			{
																				$originalDate = $row['transDate'];
																				$newDate = date("m/d/Y", strtotime($originalDate));
	                                      ?>
	                                      <tr>
																					<td hidden><?php print($row['prodID']); ?></td>
	                                        <td><?php print($newDate); ?></td>
	                                        <td><?php print($row['cLastname']. ", " .$row['cFirstname']. " " .$row['cMiddlename']); ?></td>
	                                        <td><?php print($row['policyNo']); ?></td>
	                                        <td><?php print($row['receiptNo']); ?></td>
	                                        <td><?php print($row['premium']); ?></td>
	                                        <td><?php print($row['modeOfPayment']); ?></td>
	                                        <td><?php print($row['agentLastname']. ", " .$row['agentFirstname']); ?></td>
	                                        <td><?php print($row['remarks']); ?></td>
																					<td>
																								<a title="Edit Data" href="newBusiness.php?edit=<?php echo $row['prodID'] ?>" class="btn btn-danger"><i class="fa fa-pencil"></i></a>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="newBusiness.php?delete=<?php echo $row['prodID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																					</td>

	                                      </tr>

	                                      <?php

	                                    }
																		}
																	}
																	else{

																		$DB_con = Database::connect();
	                                  $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	                                  $sql = "SELECT * FROM production, agents, client WHERE prodclientID = clientID AND agentCode = agent";


	                                  $result = $DB_con->query($sql);
	                                  if($result->rowCount()>0)
																		{
	                                    while($row=$result->fetch(PDO::FETCH_ASSOC))
																			{
																				$originalDate = $row['transDate'];
																				$newDate = date("m/d/Y", strtotime($originalDate));
	                                      ?>
	                                      <tr>
																					<td hidden><?php print($row['prodID']); ?></td>
	                                        <td><?php print($newDate); ?></td>
	                                        <td><?php print($row['cLastname']. ", " .$row['cFirstname']. " " .$row['cMiddlename']); ?></td>
	                                        <td><?php print($row['policyNo']); ?></td>
	                                        <td><?php print($row['receiptNo']); ?></td>
	                                        <td><?php print($row['premium']); ?></td>
	                                        <td><?php print($row['modeOfPayment']); ?></td>
	                                        <td><?php print($row['agentLastname']. ", " .$row['agentFirstname']); ?></td>
	                                        <td><?php print($row['remarks']); ?></td>
																					<td style="width: 100%; align:center">
																						<div class="row">
																								<a title="Edit Data" href="newBusiness.php?edit=<?php echo $row['prodID'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="newBusiness.php?delete=<?php echo $row['prodID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																						<div>
																					</td>

	                                      </tr>
																				<?php
																	}
																}
															}

	                              ?>
	                            </tbody>
	                        </table>
													<script>


														var table = document.getElementById('datatable-fixed-header');
														for(var counter = 1; counter < table.rows.length; counter++)
														{
															table.rows[counter].onclick = function()
															{;
															 document.getElementById("policyNo1").value = this.cells[2].innerHTML;
															 document.getElementById("receiptNo1").value = this.cells[3].innerHTML;
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
    <footer style="margin-bottom: -15px;">
			    <?php include 'base/footer.php'; ?>
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




//$("#datatable-fixed-header1 tr").click(function() {
//	var selected = $(this).hasClass("highlight1");
//	$("#datatable-fixed-header1 tr").removeClass("highlight1");
//	if(!selected)
//					$(this).addClass("highlight1");

//});


//$("#datatable-fixed-header2 tr").click(function() {
//	var selected = $(this).hasClass("highlight1");
//	$("#datatable-fixed-header2 tr").removeClass("highlight1");
//	if(!selected)
//					$(this).addClass("highlight1");

//});

//$("#datatable-fixed-header3 tr").click(function() {
//	var selected = $(this).hasClass("highlight1");
//	$("#datatable-fixed-header3 tr").removeClass("highlight1");
//	if(!selected)
//					$(this).addClass("highlight1");

});



</script>

<script>


		function disableUpdateButton()
		{
			document.getElementById("receiptNo1").value = "";
			document.getElementById("policyNo1").value = "";

			window.location="newBusiness.php";


						$('#UpdateButton').hide();
						$('#SaveButton').show();

		}
		function ClickCancel()
		{
			$('#ModalEdit, #ModalDelete').hide("highlight1");
		}


		function enableUpdateButton()
		{
				document.getElementById("UpdateButton").disabled = false;
				document.getElementById("SaveButton").disabled = true;

		}
		function disableSaveButton()
		{
				document.getElementById("SaveButton").disabled = true;

		}

		function LogoutConfirm()
		{
			window.location = "index.php";
		}



</script>



<script>

function myFunction() {

  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable-fixed-header1");
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
    $('#datatable-fixed-header2').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

$(document).ready(function() {
    $('#datatable-fixed-header3').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

$(document).ready(function() {
    $('#datatable-fixed-header1').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

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
	if(isset($_POST['ModalEdit']))
	{

		$plancode = $_POST['planCode'];
		$plandesc = $_POST['planDesc'];
		$planrate = $_POST['planRate'];


		$sql = "UPDATE plans SET planCode = '$plancode', planDesc = '$plandesc', planRate = '$planrate' WHERE planCode = '$plancode'";


		if($conn->query($sql))
		{
			?>
			<script>
				alert("Plan is updated.");
				window.location = 'home.php';
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

$conn = new mysqli ($servername, $username, $password, $dbname);

if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
		if(isset($_GET['edit']))
		{
				$edit = $_GET['edit'];

					$result=mysqli_query($conn,"SELECT * from production, agents, plans, client WHERE plan = planID AND clientID = prodclientID AND agentCode = agent AND prodID = '$edit'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('client').value = '<?php echo $row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename'];?>';</script>
						<script> document.getElementById('policyNo').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('policyNo1').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('receiptNo').value = '<?php echo $row['receiptNo'];?>';</script>
						<script> document.getElementById('receiptNo1').value = '<?php echo $row['receiptNo'];?>';</script>
						<script> document.getElementById('faceAmount').value = '<?php echo $row['faceAmount'];?>';</script>
						<script> document.getElementById('premium').value = '<?php echo $row['premium'];?>';</script>
						<script> document.getElementById('rate').value = '<?php echo $row['rate'];?>';</script>
						<script> document.getElementById('agentCode').value = '<?php echo $row['agent'];?>';</script>
						<script> document.getElementById('agent').value = '<?php echo $row['agentLastname'].",".$row['agentFirstname'];?>';</script>
						<script> document.getElementById('remarks').value = '<?php echo $row['remarks'];?>';</script>
						<script> document.getElementById('transDate').value = '<?php echo $row['transDate'];?>';</script>
						<script> document.getElementById('plan').value = '<?php echo $row['planCode'];?>';</script>
						<script> document.getElementById('planCodePass').value = '<?php echo $row['planID'];?>';</script>
						<script> document.getElementById('clientIDModal').value = '<?php echo $row['clientID'];?>';</script>


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
	if(isset($_POST['ModalDelete']))
	{

		$plancode = $_POST['planCode'];

		$sql = "DELETE FROM plans WHERE planCode = '$plancode'";

		if($conn->query($sql) === TRUE)
		{
			echo "Successful";
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		?>
		<script>
		window.location="home.php";
		</script>
		<?php
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

		$delete= $_GET['delete'];

		$sql = "DELETE FROM production WHERE prodID= '$delete'";

		if($conn->query($sql) === TRUE)
		{
			echo "Successful";
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		?>
		<script>
		window.location="newBusiness.php";
		</script>
		<?php
		$conn->close();
	}
}
?>




<?php

  $edit_state = false;

  $transDate = filter_input(INPUT_POST, 'transDate');
	$clientID = filter_input(INPUT_POST, 'clientIDModal');
  $policyNo = filter_input(INPUT_POST, 'policyNo');
  $receiptNo = filter_input(INPUT_POST, 'receiptNo');
  $faceAmount = filter_input(INPUT_POST, 'faceAmount');
  $premium = filter_input(INPUT_POST, 'premium');
  $rate = filter_input(INPUT_POST, 'rate');
  $modeOfPayment = filter_input(INPUT_POST, 'modeOfPayment');
  $agent = filter_input(INPUT_POST, 'agentCode');
  $remarks = "New";
  $plan = filter_input(INPUT_POST, 'planCodePass');

  $policyNo1 = filter_input(INPUT_POST, 'policyNo1');

  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "tgpdso_db";


  if(!empty($policyNo))
  {
    if(!empty($receiptNo))
    {

      $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['SaveButton']))
				{
					if($_POST['receiptNo'] == $_POST['receiptNo1'])
					{
						?>
						<script>
						alert('The data is already inserted, kindly submit a non-duplicate data before saving');
						window.location="newBusiness.php";
						</script>
						<?php
					}
					else {

						$sql = "INSERT INTO production (transDate, prodclientID, policyNo, plan, receiptNo, faceAmount, premium, rate, modeOfPayment, agent, remarks)
						values ('$transDate', '$clientID', '$policyNo', '$plan', '$receiptNo', '$faceAmount', '$premium', '$rate', '$modeOfPayment', '$agent', '$remarks')";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
								window.location = 'newBusiness.php';
								</script>
								<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
						$conn->close();

					}
      }
    }
	}
    else
    {
      echo "Password should not be empty";
      die();
    }
  }
  else
   {
     echo "Username should not be empty";
     die();
   }

?>


<?php


$transDate = filter_input(INPUT_POST, 'transDate');
$clientID = filter_input(INPUT_POST, 'clientIDModal');
$policyNo = filter_input(INPUT_POST, 'policyNo');
$receiptNo = filter_input(INPUT_POST, 'receiptNo');
$faceAmount = filter_input(INPUT_POST, 'faceAmount');
$premium = filter_input(INPUT_POST, 'premium');
$rate = filter_input(INPUT_POST, 'rate');
$modeOfPayment = filter_input(INPUT_POST, 'modeOfPayment');
$agent = filter_input(INPUT_POST, 'agentCode');
$remarks = filter_input(INPUT_POST, 'remarks');
$plan = filter_input(INPUT_POST, 'planCodePass');
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

		$sql = "UPDATE production SET
		transDate='$transDate',
		prodclientID='$clientID',
		policyNo='$policyNo',
		plan='$plan',
		premium='$premium',
		receiptNo='$receiptNo',
		faceAmount='$faceAmount',
		rate='$rate',
		modeOfPayment='$modeOfPayment',
		agent='$agent',
		remarks='$remarks'
		WHERE policyNo = '$policyNo' OR receiptNo = '$receiptNo'";



		if($conn->query($sql))
		{
			?>
			<script>
				alert("Record production successfully updated");
				window.location = 'newBusiness.php';
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
