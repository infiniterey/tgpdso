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

												<div class="col-md-12 col-sm-12 col-xs-12">
														<div class="x_title">
															<h2><input type="text" name="searchT" id="searchT" placeholder="Agent ID"></input>
														 	<button type="submit" name="buttonSearch"  id="buttonSearch" class="fa fa-search" ></button>
													 		<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-table"	  data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>
															<button  type="button" style='float:right' data-toggle="modal" data-target="#momodal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add Payment</button>
															<br	><br>
															<div class="clearfix"></div>
														</div>
														<div class="x_content">
																<div class="tab ">
																	<div class="col-xs-12"><h4>
																	<a  class="col-sm-3" onclick="openPolicy(event, 'Policy')"><b>Agent Profile</b></a>
																	<a  onclick="openPolicy(event, 'Payment')"><b>Trainings</b></a></h4>
																	</div>
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

																		$Aagentcode ="";
																		$ALastname = "";
																		$AFirstname = "";
																		$AMiddlename = "";
																		$ABirthday = "";
																		$AApplicationdate = "";
																		$ATeam = "";
																		$APosition = "";

																		$bool = False;
																		if(isset($_GET['searchT']))
																		{$valueToSearch = $_GET['searchT'];}
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
																		 <h5><b>Information	</b></h5>
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
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myBirthday" id="myBirthday" value='<?php echo $Fname; ?>'>
																			 </div>
																		 </div>
																		 <div class="row">
																			 <div class="col-xs-3">
																				 	Application Date
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myAppdate" id="myAppdate" value='<?php echo $Fname; ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Team
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myTeam" id="myTeam" value='<?php echo $Fname; ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Position
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="myPosition" id="myPosition" value='<?php echo $Fname; ?>'>
																			 </div>
																			</div>
																		</div><br/>
																			 <div class="form-group">
																				 <hr>
																				 <button  type="button" style='float:left' data-toggle="modal" data-target="#momodal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Save</button>
																				 <button  type="button" style='float:left' data-toggle="modal" data-target="#momodal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Cancel</button>
																	 	 </div>
																		</div>
																	</div>
																</div>
 																</form>
															<div id="Payment" class="tabcontent">
															<!--table content policy for adding requirements-->
																<h5><b>Payment Details</b></h5><hr>
															 <div class="row">
																<form name="formko" id="formko" method="post" onsubmit="CheckForm()">
																	<?php 	if(isset($_POST['btn-deleteRow']))
																	{tgpdso::deleteRequirements();}?>
																	<?php 	if(isset($_POST['iupdateko']))
																		{tgpdso::updateRequirements();}?>
																	<br>
																	<div class="col-md-5">
																			<input style = "width:130px;"  style="border:none" readonly="readonly" type="text" class="form-control" name="inputvaluedelete" id="inputvaluedelete" value='' hidden/>
																	</div>
																	<div class="col-md-6">
																				<form>
																			<input style = "width:130px;"  readonly="readonly"  style="border:none"  type="text" class="form-control" name="inputvaluedelete2" id="inputvaluedelete2" value='' hidden/>
																	</div>
																	<div class="col-md-12">
																			<button  type="submit" style='float:center' class="btn btn-primary" id="btn-deleteRow" formnovalidate onclick="return confirm('Are you sure do you want to delete?')" name="btn-deleteRow"><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete </button>
																			<button type="button" class="btn btn-primary" id="UpdateButton" name="UpdateButton" data-toggle="modal" data-target="#myModal2" id="myBtn2"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Update	</button>
																			<button type="submit"  class="btn btn-primary" id="cancel" name="cancel"><i class="fa fa-close" onclick="ClickCancel()"></i>Cancel</button>
																	</div>
																			</form>
																</form>
																<div class="clearfix"></div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<table style="text-align:center" id="tablekoto" name ="tablekoto" class="table  table-bordered dataTable table-hover no-footer" role="grid" onclick="showForm()">
																			<thead>
																				<tr role="row">
																				<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Training ID</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending"  style="width: 35px;text-align:center;"hidden>Agent ID</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Agent Name</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Training Name</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Training Required position</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Date</th>
																					</tr>
																			</thead>
																			<div id="momodal"name="momodal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
																				<div class="modal-dialog modal-sm">
																					<div class="modal-content">
																						<div class="modal-header">
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																							<h4 class="modal-title" id="myModalLabel2">Add Payment</h4>
																						</div>
																						<form method='post' name='myform' onsubmit="CheckForm()">
																							<div class="modal-body">

																								<?php
																									if(isset($_POST['btn-addrEquirements'])){
																										$RRRequirements = $_POST['requirement'];
																										tgpdso::addRequirements();
																									}

																								?>
																								Production ID:<br><input type="text" readonly="readonly" class="form-control" name="ProdId" value="<?php echo $prodID?>"hidden><br>
																								Agent Code: <br><input  type="text" readonly="readonly" class="form-control" id="agentCode" name="agentCode" value="<?php echo $Aagent?>"hidden><br>
																								Plan Code: <br><input  type="text" class="form-control" readonly="readonly" name="planCode" value="<?php echo $Pplan?>"hidden><br>
																								Requirement: <br><Textarea type="text" class="form-control" name="requirement" style="width:200px;height:40px" ></Textarea><br>
																								Transaction Date: <br><input class="form-control" name="TTransactDate" style = "width:195px" class="date-picker form-control" required="required" type="date" value=""><br>
																								Status: <br><input type="text" class="form-control" name="stats"><br>
																								Submit Date: <br> <input name="submitdate" style = "width:195px" class="date-picker form-control" required="required" type="date" required><br>
																							 <br>
																						</div>
																							<div class="modal-footer">
																								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																									<button type="submit" class="btn btn-primary" name="btn-addrEquirements"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
																							</div>
																						</form>
																					</div>
																				</div>
																			</div>
																			<tbody>
																				</tbody>
																				<?php

											  									 $DB_con = Database::connect();
											  									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
											  									 $sql = "SELECT * FROM agentstraining";
																					 ?>
																					 	<script>alert('Agent Code: <?php echo $valueToSearch ?>');</script>
																					 <?php
											  									 $result = $DB_con->query($sql);
											  									 if($result->rowCount()>0){
											  										 while($row=$result->fetch(PDO::FETCH_ASSOC)){
											  											 ?>
											  											 <tr>
											  												 <td><?php print($row['ATagentName']); ?></td>
											  												 <td><?php print($row['ATtrainingName']); ?></td>

											  												 <td hidden><?php print($row['ATagentTrainingID']); ?></td>
											 												 <td hidden><?php print($row['ATagentID']); ?></td>
											 												 <td hidden><?php print($row['ATagentName']); ?></td>
											 												 <td hidden><?php print($row['ATtrainingName']); ?></td>
											 												 <td hidden><?php print($row['ATrequiredPosition']); ?></td>
											 												 <td hidden><?php print($row['ATdate']); ?></td>
											 												 </tr>
											  											 <?php
											  										 }
											  									 }
											  									 else{}

																					 ?>
																			</table>
																			<script>
																					var table = document.getElementById('tablekoto');

																					for(var counter = 1; counter < table.rows.length; counter++)
																					{
																						table.rows[counter].onclick = function()
																						{;
																						 	document.getElementById("inputvaluedelete").value =this.cells[4].innerHTML;
																					 	 	document.getElementById("inputvaluedelete2").value =this.cells[1].innerHTML;
																				  	  document.getElementById("modalprod").value =this.cells[4].innerHTML;
																						 	document.getElementById("modalreq").value =this.cells[1].innerHTML;
																						 	document.getElementById("modaltrans").value =this.cells[0].innerHTML;
																							document.getElementById("modalstats").value =this.cells[2].innerHTML;
																						 	document.getElementById("modalsubdate").value =this.cells[3].innerHTML;
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
 									 <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Agent Code</th>
 									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 100px;text-align:center;">Agent Name</th>

									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Lastname</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Firstname</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Middlename</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Birthdate</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	applicationDate</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Team</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Position</th>
 									 </tr>
 							 </thead>
 							 <tbody>
 								 <?php
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
												 </tr>
 											 <?php
 										 }
 									 }
 									 else{}

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
										 document.getElementById("mylastname").value = this.cells[2].innerHTML;
										 document.getElementById("myfirstname").value = this.cells[3].innerHTML;
										 document.getElementById("myMiddleName").value = this.cells[4].innerHTML;
										 document.getElementById("myBirthday").value = this.cells[5].innerHTML;
										 document.getElementById("myAppdate").value = this.cells[6].innerHTML;
										 document.getElementById("myTeam").value = this.cells[7].innerHTML;
										 document.getElementById("myPosition").value = this.cells[8].innerHTML;
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
					<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
							<h2 class="modal-title">Update Requirements</h2>
							<button type="button" class="close" data-dismiss="modal">x</button>
						</div>

							<form method='post' name='myform' onsubmit="CheckForm()">
						<div class="modal-body">

							<input type="text" style="width:195px" class="form-control" name="modalprod" id="modalprod" value="" >
							<input  type="text" style="width:195px" class="form-control" id="modalcode" name="modalcode" value="<?php echo $Aagent?>">
							<input  type="text" class="form-control" style="width:195px" name="modalplan" id="modalplan" value="<?php echo $Pplan?>">
							Requirement: <br><Textarea type="text" class="form-control" name="modalreq" style="width:195px" id="modalreq" style="width:200px;height:40px" ></Textarea><br>
							Transaction Date: <br><input class="form-control" name="modaltrans" id="modaltrans" style="width:195px" style = "width:195px" class="date-picker form-control" required="required" type="date" value=""><br>
							Status: <br><input type="text" class="form-control" name="modalstats" style="width:195px" id="modalstats"><br>
							Submit Date: <br> <input name="modalsubdate" id="modalsubdate" style = "width:195px" style="width:195px" class="date-picker form-control" required="required" type="date" required><br>


						</div>
						<form method="POST" action="<?php $_PHP_SELF ?>">
						<div  class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" id="iupdateko" name="iupdateko"><i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
						</div>
					</form>
						<div class="modal-footer">
						</div>
							</form>
					</div>
				</div>
			</div>

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

	$("#tableko tr").click(function() {
		var selected = $(this).hasClass("highlight");
		$("#tableko tr").removeClass("highlight");


		if(!selected)
							$(this).addClass("highlight");
				});
$(document).on("dblclick","#tableko tr",function() {
							$("#tableko tr").removeClass("highlight1");
});

$("#tablekoto tr").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#tablekoto tr").removeClass("highlight");
					$('#formko').hide("highlight");
	if(!selected)
						$(this).addClass("highlight");
					$('#formko').show("highlight");
});
$(document).on("dblclick","#tablekoto tr",function() {
					$('#formko').hide();
						$("#tablekoto tr").removeClass("highlight1");
});




$("#searchT").enter(function()
{
	$('#formko').show();
	if(!selected)
	$(this).addClass("highlight");
	$('#formko').hide();
});
$("#buttonshowall").click(function()
{
$('#tableko').show();
if(!selected)
$(this).addClass("highlight");
$('#tableko	').hide();
});
function ClickCancel()
{
$('#formko').hide();
}
function closemodal()
{
	$('#myModal').close();
}
function showForm()
{
$('#formko).show()');
}
function hideForm()
{
$('#formko').hide("highlight1");
}
function showdiv()
{
	$('#addreqvid).show()')
}
function hidediv()
{
$('#addreqdiv').hide();
}
function showtable()
{
$('#tableko').show("highlight");
}
function hidetable()
{
$('#tableko').hide("highlight1");
}
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
