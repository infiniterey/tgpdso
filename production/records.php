<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<style>

#insuredPolicy{ display: none};

</style>
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
											</style>

												<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="x_title">
															<h2><input type="text" name="searchT" id="searchT" placeholder="Policy No."></input>
														 	<button type="submit" name="buttonSearch"  id="buttonSearch" class="fa fa-search" ></button>
													 		<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-table"	  data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>
															<button  type="button" style='float:right' data-toggle="modal" data-target="#paymentModal" class="btn btn-primary" name="paymentButton"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add Payment</button>
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
																				 <input style="cursor:auto" style="border:none" type="text" readonly class="form-control col-md-7 col-xs-12" name="lastname1" id="lastname1"><br>
																			 </div>
																		 	 <div class="col-xs-3">
																				 First Name
																				 <input style="cursor:auto" style="border:none" type="text" readonly class="form-control col-md-7 col-xs-12"  name="firstname1" id="firstname1">
																			 </div>
																			 <div class="col-xs-3">
																				 Middle Name
																				 <input style="cursor:auto" style="border:none" type="text" readonly class="form-control col-md-7 col-xs-4"  name="middlename1" id="middlename1">
																			 </div>
																			 <div class="col-xs-3">
																				 Birthday
																				 <input style="cursor:auto" style="border:none" type="date" readonly class="form-control col-md-7 col-xs-4"  name="birthdate1" id="birthdate1">
																			 </div>
																		 </div>
																		 <div class="row">
																			 <div class="col-xs-3">
																				 Address
																				 <input style="cursor:auto" style="border:none" type="text" readonly class="form-control col-md-7 col-xs-4"  name="address1" id="address1">
																			 </div>
																			 <div class="col-xs-3">
																				 Contact #
																				 <input style="cursor:auto" style="border:none" type="text" readonly class="form-control col-md-7 col-xs-4" name="contactno1" id="contactno1">
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
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" readonly name="insuredLastName" id="insuredLastName"><br>
																				 </div>
																			 	 <div class="col-xs-3">
																					 First Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" readonly name="insuredFirstName" id="insuredFirstName">
																				 </div>
																				 <div class="col-xs-3">
																					 Middle Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" readonly name="insuredMiddleName" id="insuredMiddleName">
																				 </div>
																				 <div class="col-xs-3">
																					 Birthday
																					 <input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4" readonly name="insuredBirthdate" id="insuredBirthdate">
																				 </div>
																			 </div>
																			 <div class="row">
																				 <div class="col-xs-3">
																					 Address
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" readonly name="insuredAddress" id="insuredAddress">
																				 </div>
																				 <div class="col-xs-3">
																					 Contact #
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" readonly name="insuredContactno" id="insuredContactno">
																				 </div>
																			 </div>
																		 </div>
																		 </div><br/>
																		 <div class="form-group">
																			 <h5><b>Policy Details</b></h5><hr>
																			 <div class="row">
																		 			 <div class="col-xs-3">
																						 Plan
																						 <input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="mylastname" id="mylastname" value='<?php echo $Lname; ?>'><br>
																					 </div>
																				 	 <div class="col-md-3">
																						 Face Amount
																						 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="myfirstname" id="myfirstname" value='<?php echo $Fname; ?>'>
																					 </div>
																					 <div class="col-sm-3 ">
																						 Mode of Payment
																						 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																					 </div>
																				 <div class="col-sm-3 ">
																						 Issue Date
																						 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																					 </div>
																	 	 		</div>
																				<div class="row">
																					<div class="col-xs-3">
																						Premium
																						<input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="mylastname" id="mylastname" value='<?php echo $Lname; ?>'><br>
																					</div>
																					<div class="col-md-3">
																						Fund
																						<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="myfirstname" id="myfirstname" value='<?php echo $Fname; ?>'>
																					</div>
																					<div class="col-sm-3 ">
																						Policy Status
																						<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																					</div>
																					<div class="col-sm-3 ">
																						Next Due Date
																						<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																					</div>
																			 </div>
																 			</div><br>
																			<div class="form-group">
																				<div class="row">
																	 			<h5><b>Beneficiary Details</b>
																				<button type="button" style='float:right' class="btn btn-primary" name="paymentButton"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add Beneficiary</button></h5>
																				</div>		<hr>
																					<div class="row">
																						<div class="col-xs-3">
																							Last Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="beneLastName" id="beneLastName" value='<?php echo $Lname; ?>'><br>
																						</div>
																						<div class="col-xs-3">
																							First Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="beneFirstName" id="beneFirtName" value='<?php echo $Fname; ?>'>
																						</div>
																						<div class="col-xs-3">
																							Middle Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="beneMiddleName" id="beneMiddleName" value='<?php echo $Fname; ?>'>
																						</div>
																						<div class="col-xs-3">
																							Birthday
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="beneBirthday" id="beneBirthday" value='<?php echo $Fname; ?>'>
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-xs-3">
																							Address
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="beneAddress" id="beneAddress" value='<?php echo $Fname; ?>'>
																						</div>
																						<div class="col-xs-3">
																							Contact #
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="beneContact" id="beneContact" value='<?php echo $Fname; ?>'>
																						</div>
																						<div class="col-xs-3">
																							Relationship
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="beneRelationship" id="beneRelationship" value='<?php echo $Fname; ?>'>
																						</div>
																				 </div>

																				 <br><br><br>

																				 <table name="datatable-fixed-header2" id="datatable-fixed-header2" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
																						<thead>
																						<tr role="row">
																								<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Last Name.</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="OR NO: activate to sort column ascending" style="width: 100px;text-align:center;">First Name</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="APR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Middle Name</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="NextDueDate: activate to sort column ascending" style="width: 30px;text-align:center;">Address</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Birthdate</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Contact#</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header2" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Relationship</th>
																							</tr>
																						</thead>
																						<tbody>
																							<?php
																							$DB_con = Database::connect();
																							$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																							$sql = "SELECT * FROM beneficiary";


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
																										<td><?php echo $row['bene_lastName']?></td>
																										<td><?php echo $row['bene_firstName']; ?></td>
																										<td><?php echo $row['bene_middleName']; ?></td>
																										<td><?php echo $row['bene_address']; ?></td>
																										<td><?php echo $row['bene_birthDate']; ?></td>
																										<td><?php echo $row['bene_contactNo']; ?></td>
																										<td><?php echo $row['bene_relationShip']; ?></td>
																								 </tr>
																										<?php
																									}
																							}
																								 // }


																							?>

																							</tbody>
																					</table>


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
										 																 <input type="text" readonly="readonly" class="form-control" name="ProdId" value="<?php echo $prodID?>">
																										 	<label class="control-label">
																										 	Amount:
																											</label>
																											<input  type="text" class="form-control" id="agentCode" name="agentCode" value="<?php echo $Aagent?>"hidden>
																											<label class="control-label">
																											Issue Date:
																										</label><input type="date" class="form-control" name="issuedate" readonly><br>
																										<label class="control-label">
																										Mode of Payment:
																									</label>
																										<select name="modeOfPayment" id="modeOfPayment" class="form-control">
																										<option value="Monthly" id="modeOfPayment">Monthly</option>
																										<option value="Quarterly" id="modeOfPayment">Quarterly</option>
																										<option value="Semi-Annual" id="modeOfPayment">Semi-Annual</option>
																										<option value="Annualy" id="modeOfPayment">Annualy</option>
																										</select><br>
																											<hr>
																											<label class="control-label">
																										 	Transaction Date:
																										</label><input type="date" class="form-control" name="transdate"><br>
																											<label class="control-label">
																										 	OR #:
																										</label><input type="text" class="form-control" name="orno"><br>
																											<label class="control-label">
																										 	APR #:
																										</label><input type="text" class="form-control" name="aprno"><br>
																											<label class="control-label">
																										 	Next Due Date:
																										</label><input type="date" class="form-control" name="nextdue"><br>
			 																							 <br>
			 																							</div>
			 																							<div class="modal-footer">
			 																								<button type="submit" class="btn btn-primary" style="width: 100px;" name="btn-addrEquirements"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
																											<button type="button" class="btn btn-default" style="width: 100px;" data-dismiss="modal">Close</button>
			 																							</div>
			 																						</form>
			 																					</div>
																							</div>
			 																			</div>
																			 </div>
																			 <div class="form-group">
																				 <hr>
																				 		<div style='float:right'>
																				 				<button type="button" data-toggle="modal" data-target="#"  style="width: 100px;"class="btn btn-primary" name="btn-addPlan"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
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

							<table name="datatable-fixed-header" id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
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
															 <a title="Edit Data" href="records.php?edit=<?php echo $row['prodID'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
															 <a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="newBusiness.php?delete=<?php echo $row['prodID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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



<script>
window.onload = function () {
								startTab();
							};

function startTab() {
								document.getElementById("defaultOpen").click();
							}

function openPolicy(evt, tabName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the link that opened the tab
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

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
						$(document).ready(function() {
								$('#datatable-fixed-header1').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

					function boxChecked() {
  					var checkBox = document.getElementById("box");
  					var firstname = document.getElementById("firstname1").value;
						var lastname = document.getElementById("lastname1").value;
						var middlename = document.getElementById("middlename1").value;
						var birthdate = document.getElementById("birthdate1").value;
						var address = document.getElementById("address1").value;
						var contactno = document.getElementById("contactno1").value;


  						if (checkBox.checked == true)
								{
									document.getElementById("insuredLastName").value = lastname;
									document.getElementById("insuredFirstName").value = firstname;
									document.getElementById("insuredMiddleName").value = middlename;
									document.getElementById("insuredBirthdate").value = birthdate;
									document.getElementById("insuredAddress").value = address;
									document.getElementById("insuredContactno").value = contactno;
  							}
								else
									{
										document.getElementById("insuredLastName").value = "";
										document.getElementById("insuredFirstName").value = "";
										document.getElementById("insuredMiddleName").value = "";
										document.getElementById("insuredBirthdate").value = "";
										document.getElementById("insuredAddress").value = "";
										document.getElementById("insuredContactno").value = "";
  								}
								}

</script>
