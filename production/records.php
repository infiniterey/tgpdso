<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<head>
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
															<h2><input type="text" name="searchT" id="searchT" placeholder="Search">
														 	<button type="submit" name="buttonSearch"  id="buttonSearch" class="fa fa-search btn btn-success"></button>
													 		<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-table btn btn-success"	  data-toggle="modal" data-target="#myModal" id="myBtn"></button></h2>
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
																	<form method="post" class="form-group">
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
																						 <select id="policyMOP" name="policyMOP" class="form-control col-md-7 col-xs-4">
																							 <option id="policyMOP" name="policyMOP" value="Monthly">Monthly</option>
																							 <option id="policyMOP" name="policyMOP" value="Quarterly">Quarterly</option>
																							 <option id="policyMOP" name="policyMOP" value="Semi-Annual">Semi-Annual</option>
																							 <option id="policyMOP" name="policyMOP" value="Annual">Annual</option>
																						 </select>
																						 <input id="sample" name="sample" hidden>
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
																								<button disabled="disabled" style="cursor:auto; width: 40px;" style="border:none" type="button" data-toggle="modal" data-target="#fundModal" class="form-control btn btn-primary" name="fundButton" id="fundButton"><i class="fa fa-plus" hidden></i></button>
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
																						<input data-target="#fundModal" data-toggle="modal" value="<?php echo $name; ?>" readonly="readonly" style="cursor:auto; width: 180px;" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="policyFund" id="policyFund">

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
																						<input type="date" name="sampleDueDate" id="sampleDueDate">
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


			 																			<div>
																						</div>

																						<div id="fundModal" name="fundModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
																							<div class="modal-dialog modal-sm" style="width: 950px;" role="document">
																								<div class="modal-content">
																									<div class="modal-header">
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																										<h4 class="modal-title" id="myFundModal">Add Fund</h4>
																									</div>
																									<form method='post' name='myFormModal' onsubmit="CheckForm()">
																										<div class="modal-body">

																									<div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
																                    <div class="row">
																											<div class="col-lg-5">
																													<form method="POST" action="<?php $_PHP_SELF ?>">
																		                          Fund:
																															<div>
																																<input name="setFundID" id="setFundID" hidden>
																		                          	<input readonly="readonly" name="setFundName" id="setFundName" style="width: 150px;" class="form-control" type="text" required>
																																<button data-dismiss="modal" data-toggle="modal" data-target="#searchFundModal" style="cursor:auto; width: 40px;" style="border:none" type="button" class="btn btn-primary" id="searchFund" name="searchFund"><i class="fa fa-search"></i></button>
																															</div>
																															Rate<br>
																		                          <input type="text" id="setFundRate" style="width: 150px;" placeholder="" name="setFundRate" required="required" class="form-control" required>&nbsp;&nbsp;<i style="font-size: 25px;">%</i><br/>
																															<br><br>
																																<button type="submit" class="btn btn-primary" id="saveThisFund" name="saveThisFund"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
																																<button type="submit" class="btn btn-primary" id="update" name="update"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Update</button>
																																<a type="submit" id="reset" name="reset" value="Reset" class="btn btn-default" href="records.php">Cancel</a>
																														</form>
																												</div>
																										<div class="col-sm-6">
																											<table method ="post" id="datatable-fixed-header10" name="datatable-fixed-header10" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
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
																																				<a tittle="Edit Data" id="fundEdit" name="fundEdit" class="btn btn-primary" href="records.php?edit=<?php echo $row['polFund_policyNo']; ?>&fund=<?php echo $row['polFund_fund'];?>&rate=<?php echo $row['polFund_rate'];?>#fundModal"><i class="fa fa-pencil"></i></a>
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
																										var table = document.getElementById('datatable-fixed-header');
																										for(var counter = 1; counter < table.rows.length; counter++)
																										{
																											table.rows[counter].onclick = function()
																											{;
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
																					<div class="modal-dialog modal-sm" style="width: 500px" role="document">
																						<div class="modal-content">
																							<div class="modal-header">
																								<button type="button" class="close" data-dismiss="modal" data-target="#fundModal" data-toggle="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
																											$sql = "SELECT * FROM fund";

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
																																		<button data-dismiss="modal" data-target="#fundModal" data-toggle="modal" type="button" id="fundEdit" name="fundEdit" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
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
																			 <table name="datatable-fixed-header1" id="datatable-fixed-header1" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
																					<thead>
																					<tr role="row">
																							<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Trans. Date</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Remarks</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="MOP: activate to sort column ascending" style="width: 30px;text-align:center;">M.O.P</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">Due Date</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">Next Due Date</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="OR NO: activate to sort column ascending" style="width: 30px;text-align:center;">O.R.#</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="APR No.: activate to sort column ascending" style="width: 30px;text-align:center;">APR#</th>
																							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Premium: activate to sort column ascending" style="width: 30px;text-align:center;">Premium</th>
																								<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">SOA date</th>
																						<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
																						</tr>
																					</thead>
																					<tbody>
																						<?php
																						$DB_con = Database::connect();
																						$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

																						if(isset($_GET['edit']))
																						{
																						$edit = $_GET['edit'];
																						$sql = "SELECT * FROM payment, production WHERE payment_policyNo = policyNo AND payment_policyNo = '$edit'";


																					$result = $DB_con->query($sql);
																					if($result->rowCount()>0)
																					{
																						while($row=$result->fetch(PDO::FETCH_ASSOC))
																						{
																									?>
																								<tr>
																									<td><?php echo $row['transDate']; ?></td>
																									<td><?php echo $row['payment_remarks']; ?></td>
																									<td><?php echo $row['payment_MOP']; ?></td>
																									<td><?php echo $row['payment_transDate']; ?></td>
																									<td><?php echo $row['payment_nextDue']; ?></td>
																									<td><?php echo $row['payment_OR']; ?></td>
																									<td><?php echo $row['payment_APR']; ?></td>
																									<td><?php echo $row['premium']; ?></td>
																									<td><?php echo $row['SOAdate']; ?></td>
																									<td>
																										<div align="center">
																											<a title="Edit Data" data-toggle="modal" data-target="#paymentModal" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
																											<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="records.php?deletePayment=<?php echo $row['payment_policyNo'] ?>&paymentReceiptNo=<?php echo $row['payment_OR']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
			 																	<script>
			 																		var table = document.getElementById('datatable-fixed-header1');
			 																		for(var counter = 1; counter < table.rows.length; counter++)
			 																		{
			 																			table.rows[counter].onclick = function()
			 																			{
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
															 <a id="searchClient" onclick='return searchClientNextDue();' title="Edit Data" href="records.php?edit=<?php echo $row['policyNo'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
															 <input id="retrieveClientID" name="retrieveClientID" value="<?php echo $row['clientID']; ?>" hidden>
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
		<script	src="	https://code.jquery.com/jquery-3.3.1.js"></script>
		<script	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script	src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->

<div id="paymentModal" name="paymentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
	<?php include 'add_payment.php';?>
</div>
	</body>
</html>
<?php include 'base/recordConnection.php'?>
<?php include 'JavaScriptFile/recordsJavascript.php'?>
