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

        <!-- page content -->

				<div class="right_col" role="main">
		  		<div class="clearfix">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>POLICIES RECORD</b></h2>
											<div class="clearfix"></div>
									</div>
								<div cellpadding=100 border= 1 style='float:center' id="datatable-fixed-header_wrapper" class="form-form">
									<div class="row">
										<div class="col-md-push-5">
											<style>
												table tr:not(:first-child){
													cursor:pointer;transition: all .25s	ease-in-out;
												}
												#paymentButton{display: none};
											</style>

												<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="x_title">
															<h2><input type="text" name="searchT" id="searchT" placeholder="Policy No."></input>
														 	<button type="submit" name="buttonSearch"  id="buttonSearch" class="fa fa-search" ></button>
													 		<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-table"	  data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>
															<button  type="button" style='float:right' data-toggle="modal" data-target="#paymentModal" class="btn btn-primary" name="paymentButton" id="paymentButton"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add Payment</button>
															<br	><br>
															<div class="clearfix"></div>
														</div>
														<div class="x_content">
																<div class="tab col-xs-12" id="div2"><h4>
																	<a class="col-sm-3" href="javascript:void(0)" class="tablinks"
																			onclick="openPolicy(event, 'Policy')" id="defaultOpen"><b>Policy Details</b></a>
																	<a href="javascript:void(0)" class="tablinks"
																		  onclick="openPolicy(event, 'Payment')"><b>Payment Details</b></a></h4>
																</div>
																<div id="Policy" class="tabcontent">
																	<form>
																	 <?php
																	 $Tdate = "";
																	 $Lname = "";
																	 $Fname = "";
																	 $Pno = "";
																	 $Pplan = "";
																	 $Premium = "";
																	 $Rno = "";
																	 $Fcname = "";
																	 $Rrate = "";
																	 $FFyc = "";
																	 $MOP = "";
																	 $Idate = "";
																	 $SOADate = "";
																	 $Aagent = "";
																	 $Rremarks ="";
																		$RRRequirements ="";
																		$prodID="";
																		$valueToSearch="";
																		$bool = False;
																		if(isset($_GET['searchT']))
																		{$valueToSearch = $_GET['searchT'];}
																		try {
																		$DB_con = Database::connect();
																		 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
																		 //$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_INT);
																		 $sql="SELECT * FROM production WHERE policyNo = '$valueToSearch'";
																		 $q = $DB_con->prepare($sql);
																		 $q->execute();
																		 $result =  $q->fetchall();
																		 foreach($result as $row)
																			 {
																				 $bool = True;
																				 $prodID = $row['prodID'];
																				 $Tdate = $row['transDate'];
																				 $Lname = $row['lastName'];
																				 $Fname = $row['firstName'];
																				 $Pno = $row['policyNo'];
																				 $Pplan = $row['plan'];
																				 $Premium = $row['premium'];
																				 $Rno = $row['receiptNo'];
																				 $Fcname = $row['faceAmount'];
																				 $Rrate = $row['rate'];
																				 $FFyc = $row['FYC'];
																				 $MOP = $row['modeOfPayment'];
																				 $Idate = $row['issuedDate'];
																				 $SOADate = $row['SOAdate'];
																				 $Aagent = $row['agent'];
																				 $Rremarks = $row['remarks'];
																			}
																		}
																	 catch (PDOException $msg) {
																		 die("Connection Failed : " . $msg->getMessage());
																	 }?>
																	<div class="row">
																	<div class="col-md-12">
																	 <div class="form-group">
																		 <h5><b>Policy Owner Details</b></h5>
																		 <hr/>
																		 <div class="row">
																 			 <div class="col-xs-3">
																				 Last Name
																				 <input type="text" name="policyNoOwner" id="policyNoOwner"hidden>
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="lastname1" id="lastname1"><br>
																			 </div>
																		 	 <div class="col-xs-3">
																				 First Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="firstname1" id="firstname1">
																			 </div>
																			 <div class="col-xs-3">
																				 Middle Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="middlename1" id="middlename1">
																			 </div>
																			 <div class="col-xs-3">
																				 Birthday
																				 <input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4"  name="birthdate1" id="birthdate1">
																			 </div>
																		 </div>
																		 <div class="row">
																			 <div class="col-xs-3">
																				 Address
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="address1" id="address1">
																			 </div>
																			 <div class="col-xs-3">
																				 Contact #
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="contactno1" id="contactno1">
																			 </div>
																			</div>
																		</div><br/>
																		<div class="form-group">
																			 <h5><b>Insured Policy Details</b> &nbsp;&nbsp;&nbsp;Same as insured: <input type="checkbox" name="box" id="box" onclick="boxChecked();"></h5>
																			 <hr/>
																			 <div>
																			 <div class="row">
																	 			 <div class="col-xs-3">
																					 Last Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="insuredLastName" id="insuredLastName"><br>
																				 </div>
																			 	 <div class="col-xs-3">
																					 First Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="insuredFirstName" id="insuredFirstName">
																				 </div>
																				 <div class="col-xs-3">
																					 Middle Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="insuredMiddleName" id="insuredMiddleName">
																				 </div>
																				 <div class="col-xs-3">
																					 Birthday
																					 <input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4"  name="insuredBirthdate" id="insuredBirthdate">
																				 </div>
																			 </div>
																			 <div class="row">
																				 <div class="col-xs-3">
																					 Address
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="insuredAddress" id="insuredAddress">
																				 </div>
																				 <div class="col-xs-3">
																					 Contact #
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="insuredContactno" id="insuredContactno">
																				 </div>
																			 </div>
																		 </div>
																		 </div><br/>
																		 <div class="form-group">
																			 <h5><b>Policy Details</b></h5><hr>
																			 <div class="row">
																		 			 <div class="col-xs-3">
																						 Plan
																						 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="policyPlan" id="policyPlan"><br>
																					 </div>
																				 	 <div class="col-md-3">
																						 Face Amount
																						 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="policyFaceAmount" id="policyFaceAmount">
																					 </div>
																					 <div class="col-sm-3 ">
																						 Mode of Payment
																						 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="policyMOP" id="policyMOP">
																					 </div>
																				 <div class="col-sm-3 ">
																						 Issue Date
																						 <input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4" name="policyIssueDate" id="policyIssueDate" value="mm/dd/yyyy">
																					 </div>
																	 	 		</div>
																				<div class="row">
																					<div class="col-xs-3">
																						Premium
																						<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="policyPremium" id="policyPremium"><br>
																					</div>
																					<div class="col-xs-3">
																						Fund
																						<div>
																								<input id="policyRate" name="policyRate" hidden>
																								<input id="getFundID" name="getFundID" hidden>
																								<input style="cursor:auto; width: 180px;" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="policyFund" id="policyFund">
																								<button  style="cursor:auto; width: 40px;" style="border:none" type="button" data-toggle="modal" data-target="#fundModal" class="form-control btn btn-primary" name="fundButton" id="fundButton"><i class="fa fa-plus" hidden></i></button>
																					</div>
																					</div>
																					<div class="col-sm-3 ">
																						Policy Status
																						<div>
																						<select name="policyStatusSelect" id="policyStatusSelect" class="form-control col-md-7 col-xs-4">
																							<option>Select a policy<option>
																							<?php
																							$DB_con = Database::connect();
																							$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																							$sql = "SELECT * FROM policystatus";
																						$result = $DB_con->query($sql);
																						if($result->rowCount()>0)
																						{
																							while($row=$result->fetch(PDO::FETCH_ASSOC))
																							{
																								?>
																								<option id="policyStatusSelect" name="policyStatusSelect" value="<?php echo $row['policyID']?>"><?php echo $row['policyStatus']?></option>
																								<?php
																							}
																						}
																						?>
																						</select>
																					</div>
																					</div>
																					<div class="col-sm-3 ">
																						Next Due Date
																						<input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4" name="policyDueDate" id="policyDueDate">
																					</div>
																			 </div>
																 			</div><br>

																			<div class="form-group">
																				<div class="row">
																	 			<h5><b>Beneficiary Details</b>
																					</h5>
																				</div>
																				<hr>
																					<div class="row">
																						<div class="col-xs-3">
																							Last Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="beneLastName" id="beneLastName"><br>
																						</div>
																						<div class="col-xs-3">
																							First Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="beneFirstName" id="beneFirstName" >
																						</div>
																						<div class="col-xs-3">
																							Middle Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="beneMiddleName" id="beneMiddleName">
																						</div>
																						<div class="col-xs-3">
																							Birthday
																							<input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4"  name="beneBirthday" id="beneBirthday" >
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-xs-3">
																							Address
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="beneAddress" id="beneAddress" >
																						</div>
																						<div class="col-xs-3">
																							Contact #
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="beneContact" id="beneContact">
																						</div>
																						<div class="col-xs-3">
																							Relationship
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="beneRelationship" id="beneRelationship">
																						</div>

																						<br><br><br>
																				 </div>
																				 <button style="float: right"class="btn btn-primary" type="submit" name="addBeneficiaryButton" id="addBeneficiaryButton"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Beneficiary</button>
																				 <br><br><br>

																				 <table name="datatable-fixed-header2" id="datatable-fixed-header2" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
																						<thead>
																						<tr role="row">
																								<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 80px;text-align:center;">Last Name</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="OR NO: activate to sort column ascending" style="width: 80px;text-align:center;">First Name</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="APR No.: activate to sort column ascending" style="width: 5px;text-align:center;">Middle Name</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="NextDueDate: activate to sort column ascending" style="width: 120px;text-align:center;">Address</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Birthdate</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 20px;text-align:center;">Contact#</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 10px;text-align:center;">Relationship</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 10px;text-align:center;">Action</th>
																							</tr>
																						</thead>
																						<tbody>

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

																												$result=mysqli_query($conn,"SELECT * FROM beneficiary, production WHERE policyNo = bene_policyNo AND bene_policyNo = '$edit'");

																												while($row=mysqli_fetch_Array($result))
																												{
																													?>
																												<tr>
																													<td><?php echo $row['bene_lastName']?></td>
																													<td><?php echo $row['bene_firstName']; ?></td>
																													<td><?php echo $row['bene_middleName']; ?></td>
																													<td><?php echo $row['bene_address']; ?></td>
																													<td><?php echo $row['bene_birthDate']; ?></td>
																													<td><?php echo $row['bene_contactNo']; ?></td>
																													<td><?php echo $row['bene_relationShip']; ?></td>
																													<td>
																														<div class = "row" align="center">
																																<a title="Edit Data" onclick="return confirm('Are you sure to to edit?')" href="records.php?editBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_contactNo'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																																<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="records.php?deleteBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_contactNo']?>&name=<?php echo $row['bene_lastName']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																														 </div>
																													</td>
																											 </tr>
																													<?php
																											}

																										?>
																										<script>

																										</script>
																										<?php
																								}
																								if(isset($_GET['editBene']))
																								{
																										$edit = $_GET['editBene'];

																											$result=mysqli_query($conn,"SELECT * FROM beneficiary, production WHERE policyNo = bene_policyNo AND bene_policyNo = '$edit'");

																											while($row=mysqli_fetch_Array($result))
																											{
																												?>
																											<tr>
																												<td><?php echo $row['bene_lastName']?></td>
																												<td><?php echo $row['bene_firstName']; ?></td>
																												<td><?php echo $row['bene_middleName']; ?></td>
																												<td><?php echo $row['bene_address']; ?></td>
																												<td><?php echo $row['bene_birthDate']; ?></td>
																												<td><?php echo $row['bene_contactNo']; ?></td>
																												<td><?php echo $row['bene_relationShip']; ?></td>
																												<td>
																													<div class = "row" align="center">
																															<a title="Edit Data" onclick="return confirm('Are you sure to to edit?')" href="records.php?editBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_contactNo'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																															<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="records.php?deleteBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_contactNo']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																													 </div>
																												</td>
																										 </tr>
																												<?php
																										}

																									?>
																									<script>

																									</script>
																									<?php
																							}
																							}

																							?>

																							</tbody>
																					</table>
																					<br><br>


			 																			<div id="paymentModal" name="paymentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
																							<div class="modal-dialog" role="document">
																								<div class="modal-content">
			 																						<div class="modal-header">
			 																							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			 																							<h4 class="modal-title" id="myModalLabel2">Add Payment</h4>
			 																						</div>
			 																						<form method='post' name='myform' onsubmit="CheckForm()">
			 																							<div class="modal-body">
																										 	<label class="control-label">
											 		                            Policy #:
											 														 	 	</label>
										 																 <input type="text" readonly="readonly" class="form-control" name="paymentPolicyNo" id="paymentPolicyNo">
																										 	<label class="control-label">
																										 	Amount:
																											</label>
																											<input  type="text" class="form-control" id="paymentAmount" name="paymentAmount">
																											<label class="control-label">
																											Issue Date:
																										</label><input type="date" class="form-control" name="paymentIssueDate" id="paymentIssueDate" readonly><br>
																										<label class="control-label">
																										Mode of Payment:
																									</label>
																										<select name="paymentmodeOfPayment" id="paymentmodeOfPayment" class="form-control">
																										<option value="Monthly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Monthly</option>
																										<option value="Quarterly" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Quarterly</option>
																										<option value="Semi-Annual" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Semi-Annual</option>
																										<option value="Annualy" name="paymentmodeOfPayment" id="paymentmodeOfPayment">Annualy</option>
																										</select><br>
																											<hr>
																											<label class="control-label">
																										 	Transaction Date:
																										</label><input type="date" class="form-control" name="paymentTransDate" id="paymentTransDate"><br>
																											<label class="control-label">
																										 	OR #:
																										</label><input type="text" class="form-control" name="paymentORNo" id="paymentORNo"><br>
																											<label class="control-label">
																										 	APR #:
																										</label><input type="text" class="form-control" name="paymentAPR" id="paymentAPR"><br>
																											<label class="control-label">
																										 	Next Due Date:
																										</label><input type="date" class="form-control" name="paymentNextDue" id="paymentNextDue"><br>
			 																							 <br>
			 																							</div>
			 																							<div class="modal-footer">
			 																								<button type="submit" class="btn btn-primary" style="width: 100px;" name="paymentSaveButton" id="paymentSaveButton" onclick="openPolicy(event, 'Payment')"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
																											<!--<button type="button" class="btn btn-default" style="width: 100px;" data-dismiss="modal">Close</button>-->
			 																							</div>
			 																						</form>
			 																					</div>
																							</div>
			 																			</div>

																						<div id="fundModal" name="fundModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
																							<div class="modal-dialog" role="document">
																								<div class="modal-content">
																									<div class="modal-header">
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																										<h4 class="modal-title" id="myFundModal">Add Fund</h4>
																									</div>
																									<form method='post' name='myFormModal' onsubmit="CheckForm()">
																										<div class="modal-body">

																											<table method ="post" id="datatable-fixed-header" name="datatable-fixed-header" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
																											<thead>
																												<tr role="row">
																													<th class="sorting_asc" style="width:50px;text-align:center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 15px;text-align:center;">Fund ID</th>
																														<th class="sorting" style="width:50px;text-align:center" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Fund Name</th>
																														<th class="sorting" style="width:10px;" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending">Action</th>
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
																																<td><?php print($row['fundID']); ?></td>
																																<td><?php print($row['fundName']); ?></td>
																																<td>
																																	<div class="row">
																																		<center>
																																			<form method='post' name='myform' onsubmit="CheckForm()">
																																				<button  type="button" id="fundEdit" name="fundEdit" data-dismiss="modal" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
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

																										<script>
																										var table = document.getElementById('datatable-fixed-header');
																										for(var counter = 1; counter < table.rows.length; counter++)
																										{
																											table.rows[counter].onclick = function()
																											{;
																											 document.getElementById("getFundID").value = this.cells[0].innerHTML;
																											 document.getElementById("policyFund").value = this.cells[1].innerHTML;
																												};
																											}
																										</script>

																										</div>
																										<div class="modal-footer">
																											<!--<button type="submit" class="btn btn-primary" style="width: 100px;" name="paymentSaveButton" id="paymentSaveButton" onclick="openPolicy(event, 'Payment')"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>-->
																											<!--<button type="button" class="btn btn-default" style="width: 100px;" data-dismiss="modal">Close</button>-->
																										</div>
																									</form>
																								</div>
																							</div>
																						</div>

																			 </div>
																			 <div class="form-group">
																				 <hr>
																				 		<div style='float:right'>
																				 				<button type="submit" style="width: 100px;"class="btn btn-primary" name="saveButton" id="saveButton"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
																				 				<button type="button" class="btn btn-default"  style="width: 100px;" data-dismiss="modal">Close</button>
																							</div>
																	 	 </div>
																		</div>
																	</div>
																</div>
 																</form>
															<div id="Payment" class="tabcontent">
																<div class="row">
																	<div class="col-md-12">
																	 <div class="form-group">
																		 	<h5><b>Payment Details</b></h5><hr/>
																		 <div class="row">
																			 <table name="datatable-fixed-header1" id="datatable-fixed-header1" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
																					<thead>
																					<tr role="row">
																							<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Transaction No.</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="OR NO: activate to sort column ascending" style="width: 100px;text-align:center;">O.R.#</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="APR No.: activate to sort column ascending" style="width: 30px;text-align:center;">APR#</th>
																						<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="NextDueDate: activate to sort column ascending" style="width: 30px;text-align:center;">Next Due Date</th>
																						<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Remarks</th>
																						<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
																						</tr>
																					</thead>
																					<tbody>
																						<?php
																						$DB_con = Database::connect();
																						$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																						$sql = "SELECT * FROM payment";


																					$result = $DB_con->query($sql);
																					if($result->rowCount()>0)
																					{
																						while($row=$result->fetch(PDO::FETCH_ASSOC))
																						{
																									?>
																								<tr>
																									<td><?php echo $row['payment_transDate']; ?></td>
																									<td><?php echo $row['payment_OR']; ?></td>
																									<td><?php echo $row['payment_APR']; ?></td>
																									<td><?php echo $row['payment_nextDue']; ?></td>
																									<td><?php echo $row['payment_remarks']; ?></td>
																									<td>
																										<div align="center">
																											<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="records.php?deletePayment=<?php echo $row['payment_policyNo'] ?>&paymentReceiptNo=<?php echo $row['payment_OR']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																										</div>
																									</td>
																							 </tr>
																									<?php
																								}
																						}
																							 // }


																						?>

																						</tbody>
																				</table>
			 																	<script>
			 																		var table = document.getElementById('datatable-fixed-header1');
			 																		for(var counter = 1; counter < table.rows.length; counter++)
			 																		{
			 																			table.rows[counter].onclick = function()
			 																			{;
			 																			 document.getElementById("planCode").value = this.cells[0].innerHTML;
			 																			 document.getElementById("planC").value = this.cells[0].innerHTML;
			 																			 document.getElementById("planDesc").value = this.cells[1].innerHTML;
			 																			 document.getElementById("planRate").value = this.cells[2].innerHTML;
			 																			 document.getElementById("plan").value = this.cells[0].innerHTML;

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
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
					<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->
					<div class="modal fade" id="myModal">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h2 class="modal-title">Search Record<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h2>

							</div>

							<form style="margin-bottom: 10px;">
							<div class="modal-body">

							<table name="datatable-fixed-header0" id="datatable-fixed-header0" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
 							 <thead>
								 <tr role="row">
 									 <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Policy No</th>
 									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 100px;text-align:center;">Name</th>
 				 					 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Issued Date</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Plan</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Premium</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Receipt #</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
									 </tr>
 							 </thead>
 							 <tbody>
 								 <?php
									 $DB_con = Database::connect();
									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
									 $sql = "SELECT * FROM production, client, plans WHERE prodclientID = clientID AND plan = planID";


								 $result = $DB_con->query($sql);
								 if($result->rowCount()>0)
								 {
									 while($row=$result->fetch(PDO::FETCH_ASSOC))
									 {
 									 // $sql =$DB_con->prepare( "SELECT p.policyNo, p.issuedDate,p.premium,p.receiptNo,p.plan,
									 // c.cFirstname, c.cLastname, c.cMiddlename From production as p Inner join client as c
									 // ON p.prodclientID = c.clientID");
									 // $sql->execute();
 									 //  // $result = $DB_con->query($sql);
 									 // // if($result->rowCount()>0){
 										//  while($row=$sql->fetchAll(PDO::FETCH_ASSOC)){
 											 ?>
 											 <tr>
 												 <td><?php echo $row['policyNo']; ?></td>
 												 <td><?php echo $row['cLastname']. ", " .$row['cFirstname']; ?></td>
												 <td><?php echo $row['issuedDate']; ?></td>
												 <td><?php echo $row['planCode']; ?></td>
												 <td><?php echo $row['premium']; ?></td>
												 <td><?php echo $row['receiptNo']; ?></td>
												 <td>
													 <div class = "row" align="center">
															 <a title="Edit Data" href="records.php?edit=<?php echo $row['policyNo'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
														</div>
												 </td>
											</tr>
 											 <?php
 										 }
									 }
 									  // }


 								 ?>

 								 </tbody>
 						 </table>


								<script>
									var table = document.getElementById('tableko');
									for(var counter = 1; counter < table.rows.length; counter++)
									{
										table.rows[counter].onclick = function()
										{;
										 document.getElementById("searchT").value = this.cells[0].innerHTML;
										 document.getElementById("mylastname").value = this.cells[4].innerHTML;
										 document.getElementById("myfirstname").value = this.cells[5].innerHTML;
										 document.getElementById("mypolicy").value = this.cells[0].innerHTML;
										 document.getElementById("myofficialReceipt").value = this.cells[6].innerHTML;
										 document.getElementById("myAgent").value = this.cells[7].innerHTML;
										 document.getElementById("myplan").value = this.cells[8].innerHTML;
										 document.getElementById("mydate").value = this.cells[9].innerHTML;
										 document.getElementById("myModeOfPayment").value = this.cells[10].innerHTML;
										 };
									}
										</script>
									</form>
							</div>
							<div class="modal-footer">
								<button type="submit" onclick="closemodal()" class ="btn btn-primary"class="btn btn-default" data-dismiss="modal">Submit</button>
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
	<script	src="	https://code.jquery.com/jquery-3.3.1.js">	</script>
	<script	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script	src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>


  </body>
</html>

<?php include 'base/recordConnection.php';?>
