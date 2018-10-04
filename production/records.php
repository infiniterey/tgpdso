<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
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

												<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="x_title">
															<h2><input type="text" name="searchT" id="searchT" placeholder="Search Policy" hidden>
													 		<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-search btn btn-success" style="margin-left: 12px;" data-toggle="modal" data-target="#myModal" id="myBtn">&nbsp;&nbsp;Search Policy</button></h2>
															<button  type="button" style='float:right' data-toggle="modal" data-target="#paymentModal" class="btn btn-primary" name="paymentButton" id="paymentButton" disabled><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Payment</button>
															<br	><br>
															<div class="clearfix"></div>
														</div>
														<div class="x_content">
																<div class="tab col-xs-12" id="div2"><h4>
																	<a class="col-sm-3 btn btn-primary" href="javascript:void(0)" class="tablinks"
																			onclick="openPolicy(event, 'Policy');" id="defaultOpen"><b>Policy Details</b></a>
																	<a class="col-sm-3 btn btn-primary" href="javascript:void(0)" class="tablinks"
																		  onclick="openPolicy(event, 'Payment');"><b>Payment Details</b></a></h4>
																</div>
																<div id="Policy" class="tabcontent">
																	<form method="post" class="form-group" action="<?php $_PHP_SELF ?>">
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
																		 <hr>
																		 <h5><b>Policy Owner Details</b></h5>
																		 <hr/>
																		 <div class="row">
																 			 <div class="col-xs-3">
																				 Last Name
																				 <input id="clientToRetrieve" name="clientToRetrieve" hidden>
																				 <input type="text" name="policyNoOwner" id="policyNoOwner"hidden>
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="lastname1" id="lastname1" placeholder="Last Name"><br>
																			 </div>
																		 	 <div class="col-xs-3">
																				 First Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="firstname1" id="firstname1" placeholder="First Name">
																			 </div>
																			 <div class="col-xs-3">
																				 Middle Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="middlename1" id="middlename1" placeholder="Middle Name">
																			 </div>
																			 <div class="col-xs-3">
																				 Birthday
																				 <input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4"  name="birthdate1" id="birthdate1" placeholder="Birthday">
																			 </div>
																		 </div>
																		 <div class="row">
																			 <div class="col-xs-3">
																				 Address
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="address1" id="address1" placeholder="Address">
																			 </div>
																			 <div class="col-xs-3">
																				 Contact #
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="contactno1" id="contactno1" placeholder="Contact #">
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
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="insuredLastName" id="insuredLastName" placeholder="Last Name"><br>
																				 </div>
																			 	 <div class="col-xs-3">
																					 First Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="insuredFirstName" id="insuredFirstName" placeholder="First Name">
																				 </div>
																				 <div class="col-xs-3">
																					 Middle Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="insuredMiddleName" id="insuredMiddleName" placeholder="Middle Name">
																				 </div>
																				 <div class="col-xs-3">
																					 Birthday
																					 <input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4"  name="insuredBirthdate" id="insuredBirthdate" placeholder="Birthday">
																				 </div>
																			 </div>
																			 <div class="row">
																				 <div class="col-xs-3">
																					 Address
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="insuredAddress" id="insuredAddress" placeholder="Address">
																				 </div>
																				 <div class="col-xs-3">
																					 Contact #
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="insuredContactno" id="insuredContactno" placeholder="Contact #">
																				 </div>
																			 </div>
																		 </div>
																		 </div><br/>
																		 <div class="form-group">
																			 <h5><b>Policy Details</b></h5><hr>
																				<script>
																				jQuery(function($) {
																				$('input.number').on('keyup', function() {
																					if(event.which >= 37 && event.which <= 40) return;
																					$(this).val(function(index, value) {
																						return value
																						.replace(/\D/g, "")
																						.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
																							});
																						});
																					});
																				</script>
																				<script>
																					 function commissionCalculate()
																					 {
																						 var premium = document.getElementById("policyPremium").value;
																						 premium = premium.replace(/,/g , "");
																						 var rate = document.getElementById("productionRate").value;
																						 var rate2 = premium / 100;
																						 var str = rate.slice(0, -1);
																						 str = str/100;
																						 var result = premium*str;
																						 result =  result.toLocaleString('en', {maximumSignificantDigits : 21});
																						 document.getElementById("productionCommission1").value = result;
																						 // var resultCom = document.getElementById("productionCommission1").value;
																						 // resultCom =  resultCom.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
																						 // document.getElementById("productionCommission1").value = resultCom;
																					 }
																				 </script>
																			 <div class="row">
																		 			 <div class="col-xs-3">
																						 Plan
																						 <div class="row">
																						 	<div class="col-md-10">
																						 		<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="planName" id="planName" placeholder="Plan" readonly><br>
																						 		<input style="cursor:auto" style="border:none" type="text" name="policyPlan" id="policyPlan" hidden>
																								<input name="planRate" id="planRate" hidden>
																					 		</div>
																							<div class="col-md-2" style="margin-left: -16px;">
																								<button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#addplanmodal" name="planButton" id="planButton" disabled><i class="fa fa-search"></i></button>
																					 		</div>
																					 </div>
																					 </div>
																				 	 <div class="col-md-3">
																						 Face Amount
																						 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12 number" name="policyFaceAmount" id="policyFaceAmount" placeholder="Face Amount">
																					 </div>
																					 <div class="col-sm-3 ">
																						 Mode of Payment
																						 <select id="policyMOP" name="policyMOP" class="form-control col-md-7 col-xs-4">
																							 <option id="policyMOP" name="policyMOP" value="">Select Mode</option>
																							 <option id="policyMOP" name="policyMOP" value="Monthly">Monthly</option>
																							 <option id="policyMOP" name="policyMOP" value="Quarterly">Quarterly</option>
																							 <option id="policyMOP" name="policyMOP" value="Semi-Annual">Semi-Annual</option>
																							 <option id="policyMOP" name="policyMOP" value="Annual">Annual</option>
																						 </select>
																						 <input id="sample" name="sample" hidden>
																					 </div>
																				 <div class="col-sm-3 ">
																						 Issue Date
																						 <input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4" name="policyIssueDate" id="policyIssueDate" value="mm/dd/yyyy"  onchange="handler();" required>
																					 </div>
																	 	 		</div>
																				<div class="row">

																					<div class="col-xs-3">
																						Premium
																						<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12 number" name="policyPremium" id="policyPremium" placeholder="Premium" onchange="commissionCalculate()"><br>
																						<input name="productionCommission1" id="productionCommission1" type="text" hidden>
																						<input name="productionRate" id="productionRate" type="text" hidden>
																					</div>
																					<div class="col-xs-3">
																						Fund
																						<div class="row">
																							<?php
																							$name = "";
																							$DB_con = Database::connect();
																							$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																							if(isset($_GET['edit']))
																							{
																						$edit = $_GET['edit'];
																						$sql = "SELECT * FROM policyfund, fund WHERE polFund_fund = fundID AND polFund_policyNo = '$edit'";
																						$result = $DB_con->query($sql);
																						if($result->rowCount()>0)
																						{
																							while($row=$result->fetch(PDO::FETCH_ASSOC))
																							{
																								$name = $name.$row['fundName'] .", " ;
																							}
																						}
																					}
																					else if (isset($_GET['editBene']))
																					{
																						$edit = $_GET['editBene'];
																						$sql = "SELECT * FROM policyfund, fund WHERE polFund_fund = fundID AND polFund_policyNo = '$edit'";
																						$result = $DB_con->query($sql);
																						if($result->rowCount()>0)
																						{
																							while($row=$result->fetch(PDO::FETCH_ASSOC))
																							{
																								$name = $name.$row['fundName'] .", " ;
																							}
																						}
																					}
																					?>
																							<div class="col-md-10">
																								<input placeholder="Fund" value="<?php echo $name; ?>" readonly="readonly" type="text" class="form-control" name="policyFund" id="policyFund">
																							</div>
																							<div class="col-md-2" style="margin-left: -19px;">
																								<input id="policyRate" name="policyRate" hidden>
																								<input id="getFundID" name="getFundID" hidden>
																								<button style="margin-left: 4px;width: 40px;" type="button" data-toggle="modal" data-target="#fundModal" class="btn btn-primary" name="fundButton" id="fundButton" disabled><i class="fa fa-plus"></i></button>
																					</div>
																					</div>
																					</div>
																					<div class="col-sm-3 ">
																						Policy Status
																						<div>
																						<select name="policyStatusSelect" id="policyStatusSelect" placeholder="Select a policy" class="form-control col-md-7 col-xs-4">
																							<?php
																							$DB_con = Database::connect();
																							$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																							$sql = "SELECT * FROM policystatus";
																						$result = $DB_con->query($sql);
																						if($result->rowCount()>0)
																						{
																							?>
																							<option>Select a status</option>
																							<?php
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
																						<input type="date" name="sampleDueDate" id="sampleDueDate" hidden>
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
																				<form method="POST" action="<?php $_PHP_SELF ?>">
																					<div class="row">
																						<div class="col-xs-3">
																							<input type="text" name="beneID" id="beneID" hidden>
																							Last Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="beneLastName" id="beneLastName" placeholder="Last Name"><br>
																						</div>
																						<div class="col-xs-3">
																							First Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12"  name="beneFirstName" id="beneFirstName" placeholder="First Name">
																						</div>
																						<div class="col-xs-3">
																							Middle Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="beneMiddleName" id="beneMiddleName" placeholder="Middle Name">
																						</div>
																						<div class="col-xs-3">
																							Birthday
																							<input style="cursor:auto" style="border:none" type="date" class="form-control col-md-7 col-xs-4"  name="beneBirthday" id="beneBirthday" placeholder="Birthday">
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-xs-3">
																							Address
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4"  name="beneAddress" id="beneAddress" placeholder="Address">
																						</div>
																						<div class="col-xs-3">
																							Contact #
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="beneContact" id="beneContact" placeholder="Contact #">
																						</div>
																						<div class="col-xs-3">
																							Relationship
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" name="beneRelationship" id="beneRelationship" placeholder="Relationship">
																						</div>

																						<br><br><br>
																				 </div>
																				 <button style="float: right"class="btn btn-primary" type="submit" name="addBeneficiaryButton" id="addBeneficiaryButton" disabled><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Beneficiary</button>
																				 <?php include 'PHPFile/add_beneficiary_php.php'?>
																			 </form>
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
																							include 'PHPFile/Connection_Database.php';

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
																													<td style="width: 100px;"><?php echo $row['bene_lastName']?></td>
																													<td style="width: 100px;"><?php echo $row['bene_firstName']; ?></td>
																													<td style="width: 100px;"><?php echo $row['bene_middleName']; ?></td>
																													<td style="width: 100px;"><?php echo $row['bene_address']; ?></td>
																													<td style="width: 100px;"><?php echo $row['bene_birthDate']; ?></td>
																													<td style="width: 100px;"><?php echo $row['bene_contactNo']; ?></td>
																													<td  style="width: 100px;"><?php echo $row['bene_relationShip']; ?></td>
																													<td style="width: 100px;">
																														<div class = "row" align="center">
																																<a title="Edit Data" onclick="return confirm('Are you sure to to edit?')" href="records.php?editBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_ID'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																																<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="records.php?deleteBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_ID']?>&name=<?php echo $row['bene_lastName']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
																															<a title="Edit Data" onclick="return confirm('Are you sure to to edit?')" href="records.php?editBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_ID'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																															<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="records.php?deleteBene=<?php echo $row['bene_policyNo'] ?>&number=<?php echo $row['bene_ID']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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


			 																			<div>
																						</div>
																						<?php
																						include 'PHPFile/Connection_Database.php';
																						if(mysqli_connect_error())
																						{
																							die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
																						}
																						else
																						{
																							if(isset($_GET['edit']))
																							{
																								$edit = $_GET['edit'];
																								$sum = 0;
																								$sql=mysqli_query($conn,"SELECT * FROM policyfund WHERE polFund_policyNo = '$edit'");
																								while($row=mysqli_fetch_Array($sql))
																								{
																									$score = $row['polFund_rate'];
																									$sum += (int)$score;
																								}
																							}
																						}
																						?>
																						<div id="fundModal" name="fundModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
																							<div class="modal-dialog modal-lg"  role="document">
																								<div class="modal-content">
																									<div class="modal-header">
																										<button type="button" onclick="checkMaximumFund()" id="closeFund" name="closeFund" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																										<h4 class="modal-title" id="myFundModal">Add Fund</h4>
																									</div>
																									<form method='post' name='myFormModal' onsubmit="CheckForm()">
																										<div class="modal-body">

																									<div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
																                    <div class="row">
																											<div class="col-sm-4">
																													<form method="POST" action="<?php $_PHP_SELF ?>">
																		                          Fund:
																															<div>
																																<input name="setFundID" id="setFundID" hidden>
																		                          	<input readonly="readonly" name="setFundName" id="setFundName" style="width: 150px; margin-top: -5px;" class="form-control" type="text" required>
																																<button data-toggle="modal" data-target="#searchFundModal" style="cursor:auto; width: 40px;" style="border:none" type="button" class="btn btn-primary" id="searchFund" name="searchFund"><i class="fa fa-search"></i></button>
																															</div>
																															Rate<br>
																															<input type="text" id="addText" name="addText" hidden value="<?php echo $sum?>">
																		                          <input type="text" id="setFundRate" style="width: 150px;" placeholder="" name="setFundRate" required="required" class="form-control" required>&nbsp;&nbsp;<i style="font-size: 25px;">%</i><br/>
																															<br><br>
																																<button type="submit" style="size: 100px;" class="btn btn-primary" id="saveThisFund" name="saveThisFund"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
																																<button type="submit" class="btn btn-primary" id="update" name="update"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Update</button>


																														</form>
																														<script type="text/javascript">
																														function checkMaximumFund()
																														{
																															if(document.getElementById("addText").value=="100")
																															{
																																document.getElementById('closeFund').disabled = false;
																															}
																															else
																															{
																																alert('Maximum 100% only');
																																document.getElementById('closeFund').disabled = true;
																																return;
																															}
																														}
																														</script>
																												</div>
																										<div class="col-sm-7">
																											<table method ="post" id="datatable-fixed-header10"  name="datatable-fixed-header10" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
																											<thead>
																												<tr role="row">
																														<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header10"aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending">
																															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																															&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fund</th>
																														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header10" aria-label="Name of Insured: activate to sort column ascending">Rate</th>
																														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header10" aria-label="Rate: activate to sort column ascending">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
																													<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header10" aria-label="Action: activate to sort column ascending" hidden>FundID</th>
																													</tr>
																											</thead>
																											<tbody>
																												<?php
																													$policyNoFund = $_GET['edit'];
																													$DB_con = Database::connect();
																													$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																													$sql = "SELECT * FROM policyFund, fund WHERE polFund_fund = fundID AND polFund_policyNo = '$policyNoFund'";

																													$result = $DB_con->query($sql);
																													if($result->rowCount()>0){
																														while($row=$result->fetch(PDO::FETCH_ASSOC)){
																															?>
																															<tr>
																																<td><?php print($row['fundName']); ?></td>
																																<td><?php print($row['polFund_rate']); ?>%</td>
																																<td>
																																	<div class="row">
																																		<center>
																																			<form method='post' name='myform' onsubmit="CheckForm()">
																																				<a tittle="Edit Data" id="fundEdit" name="fundEdit" class="btn btn-primary" href="records.php?edit=<?php echo $row['polFund_policyNo']; ?>&fund=<?php echo $row['polFund_fund'];?>&rate=<?php echo $row['polFund_rate'];?>"><i class="fa fa-pencil"></i></a>
																																				<!--<button  type="button" id="fundEdit" name="fundEdit" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>-->
																																				<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="records.php?deleteFund=<?php echo $row['polFund_policyNo'] ?>&fund=<?php echo $row['polFund_fund']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																																		</center>
																																	</div>
																																</td>
																															<td hidden><?php print($row['polFund_policyNo']); ?></td>
																															</tr>
																															<?php
																														}
																													}
																													else{}
																												?>

																												</tbody>
																										</table>
																										<script>

																										var rateSum = 0;
																										var addTable = document.getElementById('datatable-fixed-header10');
																										for(var counterSum = 1; counterSum < addTable.rows.length; counterSum++)
																										{
																											rateSum = rateSum + parseInt(addTable.rows.length[counterSum].cells[1].innerHTML);
																										}

																										addText.value = rateSum;

																										var table = document.getElementById('datatable-fixed-header');
																										for(var counter = 1; counter < table.rows.length; counter++)
																										{
																											table.rows[counter].onclick = function()
																											{
																											 document.getElementById("getFundID").value = this.cells[0].innerHTML;
																											 document.getElementById("").value = this.cells[3].innerHTML;
																											};
																										}
																										</script>

																									</div>
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
																				</div>

																				<div id="searchFundModal" name="searchFundModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
																					<div class="modal-dialog modal-sm" style="width: 500px; margin-top: 100px;" role="document">
																						<div class="modal-content">
																							<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																								<h4 class="modal-title" id="myFundModal">Search Fund</h4>
																							</div>
																							<form method='post' name='myFormModal' onsubmit="CheckForm()">
																								<div class="modal-body">

																							<div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
																								<div class="row">
																									<table method ="post" id="datatable-fixed-header-1" name="datatable-fixed-header-1" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
																									<thead>
																										<tr role="row">
																												<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header-1"aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending">
																													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
																													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fund</th>
																												<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header-1" aria-label="Rate: activate to sort column ascending">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Action</th>
																											<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header-1" aria-label="Action: activate to sort column ascending" hidden>FundID</th>
																											</tr>
																									</thead>
																									<tbody>
																										<?php

																											$DB_con = Database::connect();
																											$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																											if(isset($_GET['edit']))
																											{
																											$edit = $_GET['edit'];
																											$sql = "SELECT * FROM fund WHERE NOT EXISTS (SELECT * FROM policyFund WHERE polFund_fund = fundID AND polFund_policyNo = '$edit')";
																											$result = $DB_con->query($sql);
																											if($result->rowCount()>0){
																												while($row=$result->fetch(PDO::FETCH_ASSOC)){
																													?>
																													<tr>
																														<td><?php print($row['fundName']); ?></td>
																														<td>
																															<div class="row">
																																<center>
																																	<form method='post' name='myform' onsubmit="CheckForm()">
																																		<button data-dismiss="modal" data-toggle="modal" type="button" id="fundEdit" name="fundEdit" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
																																	</form>
																																</center>
																															</div>
																														</td>
																													<td hidden><?php print($row['fundID']); ?></td>
																													</tr>
																													<?php
																												}
																											}
																											else{}
																											}
																										?>

																										</tbody>
																								</table>

																								<script>
																								var table = document.getElementById('datatable-fixed-header-1');
																								for(var counter = 1; counter < table.rows.length; counter++)
																								{
																									table.rows[counter].onclick = function()
																									{
																									 document.getElementById("setFundID").value = this.cells[2].innerHTML;
																									 document.getElementById("setFundName").value = this.cells[0].innerHTML;
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
																		</div>
																	</form>

																		<div class="form-group">
																			<hr>
																				 <div style='float:right'>
																						 <button type="submit" style="width: 100px;"class="btn btn-primary" name="saveButton" id="saveButton"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
																						 <a href="records.php" class="btn btn-default"  style="width: 100px;" data-dismiss="modal">Close</a>
																					 </div>
																	</div>

																			 </div>
																		</div>
																	</div>
																</form>
																</div>
 																</form>
															<div id="Payment" class="tabcontent">
																<div class="row">
																	<div class="col-md-12">
																	 <div class="form-group">
																		 <hr>
																		 	<h5><b>Payment Details</b></h5><hr/>
																		 <div class="row">
																			 <table name="datatable-fixed-header1" id="datatable-fixed-header1" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
																					<thead>
																					<tr role="row">
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Trans. Date</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Remarks</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="MOP: activate to sort column ascending" style="width: 10px;text-align:center;">M.O.P</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">Due Date</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">Next Due Date</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="OR NO: activate to sort column ascending" style="width: 30px;text-align:center;">O.R.#</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="APR No.: activate to sort column ascending" style="width: 30px;text-align:center;">APR#</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Premium: activate to sort column ascending" style="width: 30px;text-align:center;">Premium</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">SOA date</th>
																						<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
																						<th hidden></th>
																						<th hidden></th>
																						<th hidden></th>
																						<th hidden></th>
																						<th hidden></th>
																						<th hidden></th>
																						<th hidden></th>
																						<th hidden></th>
																						<th hidden></th>
																						</tr>
																					</thead>
																					<tbody>
																						<?php
																						$DB_con = Database::connect();
																						$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

																						if(isset($_GET['edit']))
																						{
																						$edit = $_GET['edit'];
																						$sql = "SELECT * FROM payment, production WHERE payment_policyNo = policyNo AND payment_policyNo = '$edit' ORDER BY payment_ID DESC";


																						$currentDate = '';
																						$previousDate = '';

																					$result = $DB_con->query($sql);
																					if($result->rowCount()>0)
																					{
																						while($row=$result->fetch(PDO::FETCH_ASSOC))
																						{
																							$date0 = $row['payment_transDate'];
																							$date1 = $row['payment_dueDate'];
																							$date2 = $row['payment_nextDue'];
																							$date3 = $row['payment_soaDate'];
																							$dateR0 = date("m/d/Y", strtotime($date0));
																							$dateR1 = date("m/d/Y", strtotime($date1));
																							$dateR2 = date("m/d/Y", strtotime($date2));
																							$dateR3 = date("m/Y", strtotime($date3));
																									?>
																								<tr>
																									<td><?php echo $dateR0; ?></td>
																									<?php
																									if($row['payment_remarks_year'] == '1' && $row['payment_remarks_month'] == '1')
																									{
																										?>
																											<td style="width: 10px;"><?php echo $row['payment_remarks']; ?></td>
																										<?php
																									}
																									else
																									{
																										if($row['payment_MOP'] == "Monthly")
																										{
																											?>
																											<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and ".$row['payment_remarks_month']." month(s)"; ?></td>
																											<?php
																										}
																										else if($row['payment_MOP'] == "Quarterly")
																										{
																											if($row['payment_remarks_month'] == "1")
																											{
																												?>
																													<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and 1 quarterly"; ?></td>
																												<?php
																											}
																											else
																											{
																											?>
																												<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and ".$row['payment_remarks_month'] / "3"." quarterly"; ?></td>
																											<?php
																											}
																										}
																										else if($row['payment_MOP'] == "Semi-Annual")
																										{
																											if($row['payment_remarks_month'] == "1")
																											{
																												?>
																													<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and 1 SA"; ?></td>
																												<?php
																											}
																											else
																											{
																											?>
																												<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and ".$row['payment_remarks_month'] / "6"." SA"; ?></td>
																											<?php
																											}
																										}
																										else if($row['payment_MOP'] == "Annual")
																										{
																											?>
																											<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s)"; ?></td>
																											<?php
																										}
																									}
																									?>
																									<td style="width: 10px;"><?php echo $row['payment_MOP']; ?></td>
																									<td><?php echo $dateR1; ?></td>
																									<td><?php echo $dateR2; ?></td>
																									<td style="width: 10px;"><?php echo $row['payment_OR']; ?></td>
																									<td style="width: 10px;"><?php echo $row['payment_APR']; ?></td>
																									<td style="width: 20px;">Php&nbsp;<?php echo $row['premium'] ?></td>
																									<td>
																											<?php
																											if(!empty($row['payment_soaDate']))
																											{
																												echo $dateR3;
																											}
																											?>
																									</td>
																									<td>
																										<?php
																											if(!empty($row['payment_soaDate']))
																											{
																												?>
																												<script>document.getElementById("paymentDueDate").readOnly = false;</script>
																												<div align="center">
																													<button type="button" title="Edit Data" data-toggle="modal" style="width: 84px;" data-target="#paymentModalEdit" class="btn btn-success"><i class="glyphicon glyphicon-edit" style="font-size: 16px;"></i></a>
																												</div>
																												<?php
																											}
																									else if($row['payment_latest'] == "0")
																									{
																										?>
																										<div align="center">
																											<button type="button" title="Edit Data" data-toggle="modal" style="width: 84px;" data-target="#paymentModalEdit" class="btn btn-primary"><i class="fa fa-pencil" style="font-size: 16px;"></i></a>
																										</div>
																										<?php
																									}
																									else
																									{
																									?>
																									<div align="center">
																										<button type="button" title="Edit Data" data-toggle="modal" data-target="#paymentModalEdit" class="btn btn-primary" style="font-size: 16px;"><i class="fa fa-pencil"></i></button>
																										<a id="deleteBtn" name="deleteBtn" onclick="return confirm('Are you sure to delete?')" title="Delete Data" href="records.php?deletePayment=<?php echo $row['payment_policyNo'] ?>&list=<?php echo $row['payment_ID']?>" class="btn btn-danger"style="font-size: 16px;"><i class="fa fa-trash"></i></a>
																									</div>
																									<?php
																									}
																										?>
																									</td>
																									<td hidden><?php echo $row['payment_policyNo']; ?></td>
																									<td hidden><?php echo $row['payment_issueDate']; ?></td>
																									<td hidden><?php echo $row['payment_MOP']; ?></td>
																									<td hidden><?php echo $row['payment_Amount']; ?></td>
																									<td hidden><?php echo $row['payment_transDate']; ?></td>
																									<td hidden><?php echo $row['payment_OR']; ?></td>
																									<td hidden><?php echo $row['payment_APR']; ?></td>
																									<td hidden><?php echo $row['payment_dueDate']; ?></td>
																									<td hidden><?php echo $row['payment_nextDue']; ?></td>
																							 </tr>
																									<?php
																								}
																								?>
																								<?php
																						}
																					}
																						?>
																						</tbody>
																				</table>
			 																	<script>
			 																		var table = document.getElementById('datatable-fixed-header1');
			 																		for(var counter = 1; counter < table.rows.length; counter++)
			 																		{
			 																			table.rows[counter].onclick = function()
			 																			{
			 																			 document.getElementById("paymentPolicyNo1").value = this.cells[10].innerHTML;
			 																			 document.getElementById("paymentIssueDate1").value = this.cells[11].innerHTML;
			 																			 document.getElementById("paymentAmount1").value = this.cells[13].innerHTML;
			 																			 document.getElementById("paymentTransDate1").value = this.cells[14].innerHTML;
			 																			 document.getElementById("paymentORNo1").value = this.cells[15].innerHTML;
																						 document.getElementById("paymentAPR1").value = this.cells[16].innerHTML;
																						 document.getElementById("paymentDueDate1").value = this.cells[17].innerHTML;
																						 document.getElementById("paymentNextDue1").value = this.cells[18].innerHTML;
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
						<?php include 'PHPFile/searchPolicy.php'; ?>
				</div>
				<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->

					<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
			<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
			</form>

			<footer>
				<?php include 'base/footer.php';?>
			</footer>

    <?php include 'java.php';?>
		<script	src="	https://code.jquery.com/jquery-3.3.1.js"></script>
		<script	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script	src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addplanmodal" data-keyboard="false" data-backdrop="static">
	<?php include 'PHPFile/button_add_plan_records.php';?>
</div>
<div id="paymentModal" name="paymentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<?php include 'add_payment.php';?>
</div>
<div id="paymentModalEdit" name="paymentModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<?php include 'PHPFile/button_add_payment_records.php';?>
</div>
	</body>
</html>
<?php include 'JavaScriptFile/recordsJavascript.php'?>
<?php include 'PHPFile/button_editButton_records.php'?>
<?php include 'PHPFile/button_saveButton_records.php'?>
<?php include 'PHPFile/button_fundButton_records.php'?>
<?php include 'PHPFile/button_deleteButton_records.php'?>
