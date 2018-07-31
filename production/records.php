<?php
	include 'confg.php';
	include 'pdo.php';
	include_once 'createdb.php';

session_Start();
?>

<?php
if(isset($_POST['logout']))
{
	session_destroy();
	unset($_SESSION['logout']);
	?>
	<script>
	alert('Successfully logout - TGP');
	window.location="index.php";
	</script>

	<?php
}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<style>
{

    box-sizing: border-box;
}
.highlight { background-color: lightgreen; color: green}
.highlightBack { background-color: white; color: gray}

.highlight1 { background-color: lightgreen; color: green}
.disablehighlight { background-color: transparent;}

.column {
    float: left;
    width: 50%;
    padding: 10px;
    height: 300px; /* Should be removed. Only for demonstration */
}
.row:after {
    content: "";
    display: table;
    clear: both;
}

.scrollbar{
	height: 100%;
	width: 100%;
	overflow: auto;
}
::-webkit-scrollbar {
    width: 1px;
}

.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

#formko,#inputvaluedelete,#inputvaluedelete2,#modalprod,#modalcode,#modalplan{display:none}

</style>
	<?php include 'base/header.php';?>
	<body class="nav-md footer_fixed">
		<div class="container body">
  		<div class="main_container">
  			<div class="col-md-3 left_col menu_fixed">
  				<div class="left_col scroll-view scrollbar">
  					<div class="clearfix"></div>

  					<!-- menu profile quick info -->
							<?php include 'base/sessionsidebar.php';?>
						<!-- /menu profile quick info -->

						 <br />

						<?php

						$usertype1 = $_SESSION['usertype'];
						if($usertype1 == 'secretary' || $usertype1 == 'Secretary')
						{
							 include 'base/sidebar.php';
						}
						else
						{
							 include 'base/sidebarAdmin.php';
						}
						?>

  					<!-- sidebar menu -->

            <!-- /sidebar menu -->

  				</div>
  			</div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
		    <!-- /top navigation -->

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
																				 <input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="mylastname" id="mylastname" value='<?php echo $Lname; ?>'><br>
																			 </div>
																		 	 <div class="col-xs-3">
																				 First Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="myfirstname" id="myfirstname" value='<?php echo $Fname; ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Middle Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Birthday
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																			 </div>
																		 </div>
																		 <div class="row">
																			 <div class="col-xs-3">
																				 Address
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Contact #
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																			 </div>
																			</div>
																		</div><br/>
																		<div class="form-group">
																			 <h5><b>Insured Policy Details</b></h5>
																			 <hr/>
																			 <div class="row">
																	 			 <div class="col-xs-3">
																					 Last Name
																					 <input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="mylastname" id="mylastname" value='<?php echo $Lname; ?>'><br>
																				 </div>
																			 	 <div class="col-xs-3">
																					 First Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="myfirstname" id="myfirstname" value='<?php echo $Fname; ?>'>
																				 </div>
																				 <div class="col-xs-3">
																					 Middle Name
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																				 </div>
																				 <div class="col-xs-3">
																					 Birthday
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																				 </div>
																			 </div>
																			 <div class="row">
																				 <div class="col-xs-3">
																					 Address
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																				 </div>
																				 <div class="col-xs-3">
																					 Contact #
																					 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
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
																				<button type="button" style='float:right' data-toggle="modal" data-target="#paymentModal" class="btn btn-primary" name="paymentButton"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add Beneficiary</button></h5>
																				</div>		<hr>
																					<div class="row">
																						<div class="col-xs-3">
																							Last Name
																							<input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="mylastname" id="mylastname" value='<?php echo $Lname; ?>'><br>
																						</div>
																						<div class="col-xs-3">
																							First Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="myfirstname" id="myfirstname" value='<?php echo $Fname; ?>'>
																						</div>
																						<div class="col-xs-3">
																							Middle Name
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																						</div>
																						<div class="col-xs-3">
																							Birthday
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																						</div>
																					</div>
																					<div class="row">
																						<div class="col-xs-3">
																							Address
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																						</div>
																						<div class="col-xs-3">
																							Contact #
																							<input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myMiddleName" id="myMiddleName" value='<?php echo $Fname; ?>'>
																						</div>
																				 </div>

			 																			<div id="paymentModal" name="paymentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
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
																											<input  type="text" readonly="readonly" class="form-control" id="agentCode" name="agentCode" value="<?php echo $Aagent?>"hidden><hr>
																											<label class="control-label">
																										 	Transaction Date:
																											</label><input type="date" class="form-control" name="stats"><br>
																											<label class="control-label">
																										 	OR #:
																											</label><input type="text" class="form-control" name="stats"><br>
																											<label class="control-label">
																										 	APR #:
																											</label><input type="text" class="form-control" name="stats"><br>
																											<label class="control-label">
																										 	Next Due Date:
																											</label><input type="date" class="form-control" name="stats"><br>
			 																							 <br>
			 																							</div>
			 																							<div class="modal-footer">
			 																								<button type="submit" class="btn btn-primary" name="btn-addrEquirements"><i class="fa fa-plus"></i>&nbsp;&nbsp;Save</button>
																											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			 																							</div>
			 																						</form>
			 																					</div>
																							</div>
			 																			</div>
																			 </div>
																			 <div class="form-group">
																				 <hr>
																				 <button type="button" style='float:left' data-toggle="modal" data-target="#" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>Save</button>
																				 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
																			 <table id="datatable-fixed-header1" align="right" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
			 																		<thead>
			 																			<tr role="row">
			 																				<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Plan Code" style="width: 15px;text-align:center;">Plan Code</th>
			 																				<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Description" style="width: 155px;text-align:center;">Plan Description</th>
			 																				<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Rate" style="width: 35px;text-align:center;">Plan Rate</th>
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
			 																								<td><?php print($row['planCode']); ?></td>
			 																								<td><?php print($row['planDesc']); ?></td>
			 																								<td><?php print($row['planRate']); ?></td>

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
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>

							<form style="margin-bottom: 10px;">
							<div class="modal-body">

							<table name="tableko" id="tableko" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
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
								 	 $team = $_SESSION['team'];
									 $usertype = $_SESSION['usertype'];

									 $DB_con = Database::connect();
									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
									 $sql = "SELECT * FROM production, client WHERE prodclientID = clientID";


								 $result = $DB_con->query($sql);
								 if($result->rowCount()>0)
								 {
									 while($row=$result->fetch(PDO::FETCH_ASSOC))
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
												 <td><?php echo $row['plan']; ?></td>
												 <td><?php echo $row['premium']; ?></td>
												 <td><?php echo $row['receiptNo']; ?></td>
												 <td>
													 <div class = "row">
															 <a title="Edit Data" href="newBusiness.php?edit=<?php echo $row['prodID'] ?>" class="btn btn-danger"><i class="fa fa-pencil"></i></a>
															 <a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="newBusiness.php?delete=<?php echo $row['prodID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
														</div>
												 </td>
												 </tr>
 											 <?php
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
</script>
