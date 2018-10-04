<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
	<script src="https://ajax.aspnetcdn.com/ajax/JQuery/jquery-3.3.1.min.js"></script>
	</head>
	<style>

	#agentcode, #updateTrainingid,#training{display: none};
	</style>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script src="bootbox.min.js"></script>
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

				<div class="right_col" role="main">
		  		<div class="clearfix">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>AGENT PROFILE</b></h2>
											<div class="clearfix"></div>
									</div>
								<div method="post" cellpadding=100 border= 1 style='float:center' id="datatable-fixed-header_wrapper" class="form-form">
									<div class="row">
										<div class="col-md-push-5">
											<style>
												table tr:not(:first-child){
													cursor:pointer;transition: all .25s	ease-in-out;
												}
											</style>
												<script>bootbox.alert("Hi");</script>
												<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="x_title">
															<form method='get' name='myform' onsubmit="CheckForm()">
															<h2><input type="text" name="searchAgentCodeText" id="searchAgentCodeText" placeholder="Agent ID"></input>
														 	<button type="button" name="buttonShowAllAgent" id="buttonShowAllAgent" class="fa fa-table" data-toggle="modal" data-target="#agentTableModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>

															<br	><br>
															<div class="clearfix"></div>
														</form>
														<form name="policyForm" id="policyForm">
														<div>
															 <?php
															 $agentname = "";
															 $agenttrainingID="";
															 $variableAgentCode="";
															 $variableLastName ="";
															 $variableFirstName ="";
															 $variablePositon2="";
															 $variableAgentName="";
															 $variableMiddleName ="";
															 $variableBirthdate = "";
															 $variableApplicationDate ="";
															 $variableTeam = "";
															 $variablePositon ="";
																$valueToSearch="";
																$teamname="";
																$bool = False;
																	if(isset($_GET['display']))
																{
																	$valueToSearch = $_GET['display'];
																	}
																	try {
																	$DB_con = Database::connect();
																	 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
																	 //$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_INT);
																	 $sql="SELECT * FROM agents WHERE agentCode = '$valueToSearch'";
																	 $q = $DB_con->prepare($sql);
																	 $q->execute();
																	 $result =  $q->fetchall();
																	 foreach($result as $row)
																		 {
																			$variableAgentCode = $row['agentCode'];
																			$variableLastName = $row['agentLastname'];
																			$variableFirstName = $row['agentFirstname'];
																			$variableMiddleName = $row['agentMiddlename'];
																			$variableBirthdate = $row['agentBirthdate'];
																			$variableApplicationDate = $row['agentApptDate'];
																			$variableTeam = $row['agentTeam'];
																			$variablePositon = $row['agentPosition'];

																			$DB_con = Database::connect();
																			 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
																			 //$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_INT);
																			 $sql="SELECT * FROM team WHERE teamID = '$variableTeam'";
																			 $q = $DB_con->prepare($sql);
																			 $q->execute();
																			 $result =  $q->fetchall();
																			 foreach($result as $row)
																			 {
																			$teamname = $row['teamName'];
																		}
																	}
																}
																 catch (PDOException $msg) {
																	 die("Connection Failed : " . $msg->getMessage());
																 }
														 ?>
															<div class="row">
																<div class="col-md-12">
															 <div class="form-group">
																 <h5><b>Information	</b></h5>
																 <hr/>
																 <div class="row">
																	 <div class="col-xs-3">
																		 Last Name
																		 <input placeholder="Last Name" style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="lastNameInputBox" id="lastNameInputBox"  value='<?php echo $variableLastName ?>'><br>
																	 </div>
																	 <div class="col-xs-3">
																		 First Name
																		 <input placeholder="First Name" style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="firstNameInputBox" id="firstNameInputBox" value='<?php echo $variableFirstName ?>'>
																	 </div>
																	 <div class="col-xs-3">
																		 Middle Name
																		 <input style="cursor:auto" placeholder="Middle Name" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="middleNameInputBox" id="middleNameInputBox" value='<?php echo $variableMiddleName ?>'>
																	 </div>
																	 <div class="col-xs-3">
																		 Birthday
																		 <input style="cursor:auto" style="border:none" placeholder="Birthday" type="text" class="form-control col-md-7 col-xs-4"  name="birthdayInputBox" id="birthdayInputBox" value='<?php echo $variableBirthdate ?>'>
																	 </div>
																 </div>
																 <div class="row">
																	 <div class="col-xs-3">
																			Application Date
																		 <input placeholder="Application Date" style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="applicationInputBox" id="applicationInputBox" value='<?php echo $variableApplicationDate ?>'>
																	 </div>
																	 <div class="col-xs-3">
																		 Team
																		 <input style="cursor:auto" placeholder="Team" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="teamInputTextBox" id="teamInputTextBox" value='<?php echo $teamname ?>'>
																	 </div>
																	 <div class="col-xs-3">
																		 Position
																		 <input style="cursor:auto" placeholder="Position" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="positionInputText" id="positionInputText" value='<?php echo $variablePositon ?>'>

																		 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="codeInputTextBox" id="codeInputTextBox" value='<?php echo $variableAgentCode ?>'>

																	 </div>
																	</div>
																</div><br/>

																</div>
															</div>
														</div>
														</form>

														<div class="x_content">
																	<a  class="col-sm-3" onclick="openPolicy(event, 'production')"><b>Production</b></a>
																	<a  onclick="openPolicy(event, 'training')"><b>Trainings</b></a></h4>

																	</div>
																</div>

																	<div id="production" class="tabcontent">

						      <!-- table-striped dataTable-->
																		<table name"datatable-fixed-header"  style="text-align:center;float:center" id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
						                          <thead>
						                            <tr role="row">
																					<th  style="width: 100px;text-align:center;" class="sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-controls="datatable-fixed-header"aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending"hidden>ProdID</th>
						                              <th style="width: 100px;text-align:center;" class="sorting_asc" tabindex="0" rowspan="1"colspan="1"  aria-controls="datatable-fixed-header" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending">Trans. Date</th>
						                              <th style="width: 100px;text-align:center;" tabindex="0" aria-controls=" rowspan="1"colspan="1" datatable-fixed-header" aria-label="Name of Insured: activate to sort column ascending">Name of Insured</th>
						                              <th style="width: 100px;text-align:center;" class="sorting" tabindex="0" rowspan="1"colspan="1" aria-controls="datatable-fixed-header"  aria-label="Policy No.: activate to sort column ascending">Policy No.</th>
						                              <th style="width: 100px;text-align:center;" class="sorting" tabindex="0" rowspan="1"colspan="1"  aria-controls="datatable-fixed-header"  aria-label="OR No.: activate to sort column ascending">OR No.</th>
						                              <th style="width: 100px;text-align:center;" class="sorting" tabindex="0" rowspan="1" colspan="1"aria-controls="datatable-fixed-header"  aria-label="Premium: activate to sort column ascending">Premium</th>
						                              <th style="width: 100px;text-align:center;" class="sorting" tabindex="0" rowspan="1"colspan="1" aria-controls="datatable-fixed-header"  aria-label="Mode of Payment: activate to sort column ascending">M.O.P</th>
						                              <th style="width: 100px;text-align:center;" class="sorting" tabindex="0" rowspan="1"colspan="1" aria-controls="datatable-fixed-header"  aria-label="Issued Date: activate to sort column ascending">Agent</th>
						                              <th style="width: 100px;text-align:center;" class="sorting" tabindex="0" rowspan="1"colspan="1" aria-controls="datatable-fixed-header"  aria-label="Agent: activate to sort column ascending">Status</th>
						                              <th style="width: 100px;text-align:center;" class="sorting" tabindex="0" rowspan="1"colspan="1" aria-controls="datatable-fixed-header"  aria-label="Action: activate to sort column ascending">Action</th>
																				</tr>
						                          </thead>
																			<tbody>

						                              <?php

																					if(isset($_GET['display']))
																					{
																						$display = $_GET['display'];
																							$DB_con = Database::connect();
						                                  $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

						                                  $sql = "SELECT * FROM production, agents, client WHERE agent = '$display' and agentCode = '$display' and clientID = ProdClientID";


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
																										<td >
																											<div method="post" class="row">
																												<center>
																													<a title="Edit Data" href="newBusinessForm.php?edit=<?php echo $row['prodID'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																													<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="newBusiness.php?delete=<?php echo $row['prodID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																												</center>
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
																		</div>
														</div>
						                </div>

																<?php
																if(isset($_GET['display']))
																{
																	$display = $_GET['display'];
																?>
															<div id="training" class="tabcontent">
															<!--table content policy for adding requirements-->
															 <div class="row">
																	 <button  type="button" style='float:right' data-toggle="modal" data-target="#myModal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add Training</button>
																<div class="clearfix"></div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																	<table style="text-align:center" id="agentTrainingTable" name ="agentTrainingTable"  class="table table-bordered table-hover no-footer" aria-describedby="datatable-fixed-header_info" role="grid" onclick="showForm()">
																			<thead>
																				<tr role="row">
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;"hidden>AT id</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;"hidden>AT agent id</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;"hidden>AT agent name</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;"hidden>AT required position</th>
																				<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;">Date Application</th>
																				<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;">Date of Training</th>
																						<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending"  style="text-align:center;">Training Name</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;">Status</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="text-align:center;">Action</th>
																				</tr>
																			</thead>
																				<tbody>
																			</tbody>

																				<?php
																				try {
																				$DB_con = Database::connect();
																				 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
																				 //$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_INT);
																				 $sql = "SELECT * FROM agents where '$display' = agentCode";
																				 $q = $DB_con->prepare($sql);
																				 $q->execute();
																				 $result =  $q->fetchall();
																				 foreach($result as $row)
																					 {
																						 	 $variablePositon2 = $row['agentPosition'];
																							 $variableAgentName = $row['agentLastname'].' '. $row['agentFirstname'];
																					 }
																				 }
																				 catch (PDOException $msg) {
																					 die("Connection Failed : " . $msg->getMessage());
																				 }
																					 $DB_con = Database::connect();
											  									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
											  									 $sql = "SELECT * FROM agentstraining,training, agents where '$display' = ATagentID and agentCode = '$display' and trainingName = ATtrainingName";

																					 $result = $DB_con->query($sql);
											  									 if($result->rowCount()>0){
											  										 while($row=$result->fetch(PDO::FETCH_ASSOC)){
																							 $agentname = $row['ATagentName'];
																							 $variablePositon = $row['agentPosition'];
																							 ?>
																							 <script>
																							 </script>
																							 <tr>
											  												 <td><?php print($row['ATdate']); ?></td>
																								 <td><?php print($row['trainingDate']); ?></td>
											  												 <td><?php print($row['ATtrainingName']); ?></td>
																							 <td hidden><?php print($row['ATagentTrainingID']); ?></td>
											 												 <td hidden><?php print($row['ATagentID']); ?></td>
											 												 <td hidden><?php print($row['ATagentName']); ?></td>
																							 <td hidden><?php print($row['ATrequiredPosition']); ?></td>
																							 <td hidden><?php print($row['ATapplicationdate']); ?></td>
											 												 <td hidden><?php print($row['ATtrainingName']); ?></td>
											 												 <td><?php print($row['ATstatus']); ?></td>
																							 <td>
																								 <div class="row">
																									 <center>
																										 <form method='post' name='myform' onsubmit="CheckForm()">
																											 <button  type=	"button" id="ButtonUpdate" name="ButtonUpdate" data-toggle="modal" data-target="#myModal2" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
																											 <a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="agent_profile.php?delete=<?php echo $row['ATagentTrainingID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																											 <?php
																											 ?>
																										 </form>
 			 																						</center>
 			 																					</div>
																							</td>
											 												 </tr>
											  											 <?php
											  										 }
											  									 }
											  									 else{}
																					 }
																					 ?>
																			</table>
																			<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
																			<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
																				<div class="modal-dialog modal-sm">
																					<div class="modal-content">
																						<div class="modal-header">
																					<h2 class="modal-title">Update Training</h2>
																					<button type="button" class="close" data-dismiss="modal">x</button>
																				</div>

																					<form method='post' name='myform' onsubmit="CheckForm()">
																				<div class="modal-body">
																				<input type="text" class="form-control" name="updateTrainingid" style="width:195px" id="updateTrainingid" value="" hidden><br>
																					Date Application: <br> <input name="updatetrainingdateApplication" id="updatetrainingdateApplication" style = "width:195px" style="width:195px" class="date-picker form-control" required="required" type="date" required><br>
																				  Training Name: <br>
																					<select style = "width:200px" name="updatetrainingName" id="updatetrainingName" class="form-control" ><br>
																					<?php 	$DB_con = Database::connect();
																						$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

																						$result = $DB_con->prepare("SELECT * FROM trainingqualifications where '$variablePositon' = trainingQualification ");
																						$result->execute();

																						while($row = $result->fetch(PDO::FETCH_ASSOC)) {
																									echo "<option value='" . $row['trainingQName'] . "'>" . $row['trainingQName'] . "</option>";
																						} ?>
																					</select>
																					Status: <br>
																					<select style = "width:195px" name="updatetrainingStatus" id="updatetrainingStatus"class="form-control" >
																					<option value="Active" >Active</option>
																					<option value="Done" >Done</option>
																					<option value="Cancel" >Cancel</option>
																					<option value="Postponed" >Postponed</option>
																					</select> <br>


																				</div>
																				<form method="POST" action="<?php $_PHP_SELF ?>">
																				<div  class="modal-footer">
																					<button type="submit" class="btn btn-primary" id="updateAgentTraining" name="updateAgentTraining"><i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
																					<?php if(isset($_POST['updateAgentTraining']))
																					{
																						tgpdso::updateAgentTraining();
																					}?>
																				</div>
																			</form>
																				<div class="modal-footer">
																				</div>
																					</form>
																			</div>
																		</div>
																	</div>

																	<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
																			<script>
																					var table = document.getElementById('agentTrainingTable');

																					for(var counter = 1; counter < table.rows.length; counter++)
																					{
																						table.rows[counter].onclick = function()
																						{;
																							document.getElementById("updatetrainingdateApplication").value = this.cells[0].innerHTML;
																							document.getElementById("updatetrainingName").value = this.cells[2].innerHTML;
																							document.getElementById("updatetrainingStatus").value = this.cells[9].innerHTML;
																						 	document.getElementById("updateTrainingid").value = this.cells[3].innerHTML;
																						 	};
																						}

																						</script>
																	</div>
																	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->
																	<div class="modal fade bs-example-modal-sm" name="myModal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
																		<div class="modal-dialog modal-sm" style="width: 300px;">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																					<h4 class="modal-title" id="myModalLabel2">Add Training</h4>
																				</div>

																			<form method='post' name='myform' onsubmit="CheckForm()">
																		<div class="modal-body" method='post'>
																			<input name="position" id="position" style="width: 200px;" required="required" value="<?php echo $variablePositon?>" hidden ><br>

																			Application Date <span class="required">*</span><br>
																			<input name="DateAdded" id="DateAdded" style="width: 200px;" class="date-picker form-control" required="required" type="date" required><br>

																			Training Name<span class="required">*</span><br>
																			<select style = "width:200px" name="addtraining" id="addtraining" class="form-control" ><br>
																			<?php 	$DB_con = Database::connect();
																				$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

																				$result = $DB_con->prepare("SELECT * FROM trainingqualifications where '$variablePositon2' = trainingQualification ");
																				$result->execute();

																				while($row = $result->fetch(PDO::FETCH_ASSOC)) {
																							echo "<option value='" . $row['trainingQName'] . "'>" . $row['trainingQName'] . "</option>";
																				} ?>
																			</select>
																			<br>
																			<div class="row">
																				<div class="col-xs-6">

																			Agent Name <span class="required">*</span><br>
																			<input name="agentName" id="agentName" readonly class="form-control" value="<?php echo $variableAgentName ?>" placeholder="" style="width: 200px;"><br>

																			Status <span class="required">*</span><br>
																			<select style = "width:195px" name="status" id="status"class="form-control" >
																			<option value="Active" >Active</option>
																			<option value="Done" >Done</option>
																			<option value="Cancel" >Cancel</option>
																			<option value="Postponed" >Postponed</option>
																			</select>
																		</div>

																			<?php
																			if(isset($_GET['display2']))
																			{
																				$display2 = $GET['display2'];
																				?>
																				<script>document.getElementById('agentname').value = "<?php echo $display2;?>"</script>
																				<?php
																			} ?>

																		</div>
																		<form method="POST" action="<?php $_PHP_SELF ?>">
																		<div  class="modal-footer">
																			<div method="post" action="<?php $_PHP_SELF ?>">
																			<button type="submit" class="btn btn-primary" id="savetraining" name="savetraining"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
																		</div>
																		</div>
																	</form>
																			</form>
																	</div>
																</div>
															</div>

																<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->	<!-- The Modal Add training-->
															</div>
														</div>
													<?php}?>
													</div>
												</div>
											</div>
								  	</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->
					<div class="modal fade" id="agentTableModal">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h2>Agents</h2>
							</div>

							<form style="margin-bottom: 10px;">
							<div class="modal-body">

								<table name="agentTable" id="agentTable" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
 							 <thead>
								 <tr role="row">
 									 <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="2" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style=";text-align:center;">Agent Code</th>
 									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="2" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style=";text-align:center;">Agent Name</th>

									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Lastname</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Firstname</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Middlename</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Birthdate</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	applicationDate</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Team</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Position</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="2" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style=";text-align:center;">Action</th>
 									 </tr>
 							 </thead>
 							 <tbody>

 								 <?php
								 include 'A_Login/PositionAndTeam.php';
 									 $DB_con = Database::connect();
 									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 									 $sql = "SELECT * FROM agents, team where agentTeam = teamID AND teamName = '$teamUser'";

 									 $result = $DB_con->query($sql);
 									 if($result->rowCount()>0){
 										 while($row=$result->fetch(PDO::FETCH_ASSOC)){

 											 ?>
 											 <tr>
 												 <td><?php print($row['agentCode']); ?></td>
 												 <td><?php print($row['agentLastname']. ", " .$row['agentFirstname']); ?></td>

 												 <td hidden><?php print($row['agentLastname']); ?></td>
												 <td hidden><?php print($row['agentFirstname']); ?></td>
												 <td hidden><?php print($row['agentMiddlename']); ?></td>
												 <td hidden><?php print($row['agentBirthdate']); ?></td>
												 <td hidden><?php print($row['agentApptDate']); ?></td>
												 <td hidden><?php print($row['agentTeam']); ?></td>
												 <td hidden><?php print($row['agentPosition']); ?></td>
												 <td>
												 <div align="center" class="row">
														 <a title="Display Data" href="agent_profile.php?display=<?php echo $row['agentCode'];?>"  class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></a>
													 </div>
												 </td>
												 </tr>
 											 <?php

 										 }
 									 }
 								else if($positionUser == 'Administrator' || $positionUser == 'administrator'){
									$DB_con = Database::connect();
									$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
									$sql = "SELECT * FROM agents";

									$result = $DB_con->query($sql);
									if($result->rowCount()>0){
										while($row=$result->fetch(PDO::FETCH_ASSOC)){

											?>
											<tr>
												<td><?php print($row['agentCode']); ?></td>
												<td><?php print($row['agentLastname']. ", " .$row['agentFirstname']); ?></td>

												<td hidden><?php print($row['agentLastname']); ?></td>
												<td hidden><?php print($row['agentFirstname']); ?></td>
												<td hidden><?php print($row['agentMiddlename']); ?></td>
												<td hidden><?php print($row['agentBirthdate']); ?></td>
												<td hidden><?php print($row['agentApptDate']); ?></td>
												<td hidden><?php print($row['agentTeam']); ?></td>
												<td hidden><?php print($row['agentPosition']); ?></td>
												<td>
												<div align="center" class="row">
														<a title="Display Data" href="agent_profile.php?display=<?php echo $row['agentCode'];?>"  class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></a>
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
						 		<?php
								if(isset($_GET['display']))
								{
									$display=$_GET['display'];
									try {
									$DB_con = Database::connect();
									 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									 //$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_INT);
									 $sql="SELECT * FROM agents WHERE agentCode = '$display'";
									 $q = $DB_con->prepare($sql);
									 $q->execute();
									 $result =  $q->fetchall();
									 foreach($result as $row)
										 {

											$variableAgentCode = $row['agentCode'];
											$variableLastName = $row['agentLastname'];
											$variableFirstName = $row['agentFirstname'];
											$variableMiddleName = $row['agentMiddlename'];
											$variableBirthdate = $row['agentBirthdate'];
											$variableApplicationDate = $row['agentApptDate'];
											$variablePositon = $row['agentPosition'];
											$variableTeam = $row['agentTeam'];
											$DB_con = Database::connect();
											 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											 //$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_INT);
											 $sql="SELECT * FROM team WHERE teamID = '$variableTeam'";
											 $q = $DB_con->prepare($sql);
											 $q->execute();
											 $result =  $q->fetchall();
											 foreach($result as $row)
											 {
											$teamname = $row['teamName'];


											?>
											 <script>
											 		document.getElementById('lastNameInputBox').value = "<?php echo $variableLastName;?>"
													document.getElementById('firstNameInputBox').value = "<?php echo $variableFirstName;?>"
													document.getElementById('middleNameInputBox').value = "<?php echo $variableMiddleName;?>"
													document.getElementById('birthdayInputBox').value = "<?php echo $variableBirthdate;?>"
													document.getElementById('applicationInputBox').value = "<?php echo $variableApplicationDate;?>"
													document.getElementById('teamInputTextBox').value = "<?php echo $teamname;?>"
													document.getElementById('positionInputText').value = "<?php echo $variablePositon;?>"
													document.getElementById('position').value = "<?php echo $variablePositon;?>";
													document.getElementById('hay').value = "<?php echo $variableAgentCode;?>"
											 </script>
												<?php
										}
									}
								}
								 catch (PDOException $msg) {
									 die("Connection Failed : " . $msg->getMessage());
								 }
								}

									?>
 										<?php
									?>
									</form>
							</div>


							<div class="modal-footer">
							</div>
						</div>
					</div>
				</div>
				<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->

					<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->


			<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
			</form>
			<footer>
				<?php include 'base/footer.php';?>
			</footer>

    <?php include 'java.php';?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
  </body>
</html>
<script>
$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );
$(document).ready(function() {
    $('#agentTable').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );
$(document).ready(function() {
    $('#agentTrainingTable').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );


	var table = document.getElementById('agentTable');
	for(var counter = 1; counter < table.rows.length; counter++)
	{
		table.rows[counter].onclick = function()
		{
		 document.getElementById("searchAgentCodeText").value = this.cells[0].innerHTML;
		 document.getElementById("lastNameInputBox").value = this.cells[2].innerHTML;
		 document.getElementById("firstNameInputBox").value = this.cells[3].innerHTML;
		 document.getElementById("middleNameInputBox").value = this.cells[4].innerHTML;
		 document.getElementById("birthdayInputBox").value = this.cells[5].innerHTML;
		 document.getElementById("applicationInputBox").value = this.cells[6].innerHTML;
		 document.getElementById("teamInputTextBox").value = this.cells[7].innerHTML;
		 document.getElementById("positionInputText").value = this.cells[8].innerHTML;
		 document.getElementById("codeInputTextBox").value=this.cells[0].innerHTML;
		 };
	}
		</script>
<script>
$("#agentTable tr").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#agentTable tr").removeClass("highlight");

		if(!selected)
							$(this).addClass("highlight");
				});
$(document).on("dblclick","#agentTable tr",function() {
							$("#agentTable tr").removeClass("highlight1");
});



$("#agentTrainingTable tr").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#agentTrainingTable tr").removeClass("highlight");

	if(!selected)
						$(this).addClass("highlight");

});
$(document).on("dblclick","#agentTrainingTable tr",function() {

						$("#agentTrainingTable tr").removeClass("highlight1");
});


$("#searchAgentCodeText").enter(function()
{

	if(!selected)
	$(this).addClass("highlight");

});
$("#buttonShowAllAgent").click(function()
{
$('#agentTable').show();
if(!selected)
$(this).addClass("highlight");
$('#agentTable	').hide();
});
function openPolicy(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training -->
<?php 	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tgpdso_db";

	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

	if(mysqli_connect_error())
	{
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else {
		if(isset($_POST['savetraining']))
		{
			$display = $_REQUEST['display'];
			$ATagentID = $variableAgentCode;
			$ATagentName= $_POST['agentName'];
			$ATtrainingName = $_POST['addtraining'];
			$ATdate = $_POST['DateAdded'];
			$ATstatus = $_POST['status'];
			$ATposition = $_POST['position'];
			$check="";

			$DB_con = Database::connect();
			$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql="SELECT * FROM agentstraining,training,trainingqualifications where trainingID = trainingNo and trainingQName = '$ATtrainingName' and ATtrainingName != '$ATtrainingName'";
			$q = $DB_con->prepare($sql);
		 $q->execute();
		 $result =  $q->fetchall();
		 foreach($result as $row)
			{
				$check = 'TRUE';

			$sql = "INSERT Into agentstraining (ATagentID, ATagentName, ATtrainingName,ATrequiredPosition, ATdate, ATstatus) values ('$ATagentID','$ATagentName','$ATtrainingName','$ATposition', '$ATdate', '$ATstatus')";
		}
		}

		if($sql===TRUE)
		{
			?>
			<script>
				window.location = "agent_profile.php?display=<?php echo $display?>";
			</script>
			<?php

		}
		else {

		}
		$conn->close();
	}
	?>
<!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training --><!-- add training -->

<!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training-->
<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tgpdso_db";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else {

	if(isset($_GET['delete']))
	{
		$display = $_REQUEST['display'];
		$ATagenttrainingID =$_GET['delete'];
		?>
		<?php
		$sql = "DELETE FROM agentstraining WHERE ATagentTrainingID = '$ATagenttrainingID'";
	}
	if($conn->query($sql)===TRUE)
	{
		?>
		<script>
			window.location = "agent_profile.php?display=<?php echo $display?>";
		</script>
		<?php
	}
	else {
		echo "Error:". $sql."<br>".$conn->error;
	}
	$conn->close();
}
?>
<!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training--><!-- delete training-->
