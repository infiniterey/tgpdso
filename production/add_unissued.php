<?php
	include 'confg.php';
	include 'pdo.php';
	include_once 'createdb.php';

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
#formko,#inputvaluedelete,#inputvaluedelete2{display:none}

</style>
	<?php include 'base/header.php';?>
	<body class="nav-md footer_fixed">
  	<div class="container body">
  		<div class="main_container">

  			<div class="col-md-3 left_col menu_fixed">
  				<div class="left_col scroll-view">
  					<div class="clearfix"></div>

  					<!-- menu profile quick info -->
  					<div class="profile clearfix">
							<div class="profile_pic">
								<img class="img-circle img1 profile_img" src="images/user.png">
							</div>
							<div class="profile_info">
								<span>Magandang</span>
								<h2><b>ARAW!</b></h2>
								<div class="clearfix"></div>
							</div>
						</div>
						<!-- /menu profile quick info -->

  					<!-- sidebar menu -->
            <?php include 'base/sidebar.php'; ?>
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

				<div method="post" class="right_col" role="main">
		  		<div class="clearfix">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>Unissued Policy</b></h2>
											<div class="clearfix"></div>
									</div>
									<center>
										<div   cellpadding=100 border= 1 style='float:center' id="datatable-fixed-header_wrapper" class="form-form">
											<div class="row">
												<div class="col-md-push-5">
													<style>
														table tr:not(:first-child){
															cursor:pointer;transition: all .25s	ease-in-out;
														}
													</style>
													<form>
														<h4 style="float:left">Policy No <input type="text" name="searchT" id="searchT" placeholder="Search"></input>
													 <button type="submit" name="buttonSearch"  id="buttonSearch" class="fa fa-search" ></button>
												 <button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-table"	  data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h4>

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
													 }
													 		?>

															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="x_panel">
																	<div class="x_title">
																		<h2><b>Information</b></h2>
																		<div class="clearfix"></div>
																		</div>
														 <div class="x_content">
				                       <br>

													 <div class="form-group">
														 <label class="control-label col-md-3 col-sm-3 col-xs-12">
		                           Last Name
														 </label>
												 			 <div class="col-md-3 col-sm-3 col-xs-12">
																 <input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="mylastname" id="mylastname" value='<?php echo $Lname; ?>'><br>
															 </div>
															 <label class="control-label col-md-3 col-sm-3 col-xs-12">
																First Name
															</label>
														 	 <div class="col-md-3 col-sm-3 col-xs-12">
																 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="myfirstname" id="myfirstname" value='<?php echo $Fname; ?>'>
															 </div>
		                        </div>

														<div class="form-group">
												 		 <label class="control-label col-md-3 col-sm-3 col-xs-12">
												 			 Policy No
												 		 </label>
												 			 <div class="col-md-3 col-sm-3 col-xs-12">
												 				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="mypolicy" disabled="disabled" id="mypolicy" value='<?php echo $Pno; ?>'>
												 		 </div>
												 		 <label class="control-label col-md-3 col-sm-3 col-xs-12">
												 			 Official Receipt
												 		 </label>
												 			 <div class="col-md-3 col-sm-3 col-xs-12">
												 				 <input style="cursor:auto" style="border:none" type="text" class="form-control" disabled="disabled" name="myofficialReceipt" id="myofficialReceipt" value='<?php echo $Rno; ?>'>
												 				</div>
												 			</div>

														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12">
															 Agent
															</label>
															<div class="col-md-3 col-sm-3 col-xs-12">
																<input style="cursor:auto" style="border:none" type="text" class="form-control" name="myAgent" id="myAgent" disabled="disabled" value='<?php echo $Aagent; ?>'>
															</div>
																<label class="control-label col-md-3 col-sm-3 col-xs-12">
																Plan
															 </label>
															 <div class="col-md-3 col-sm-3 col-xs-12">
 																 <input style="cursor:auto" style="border:none" type="text" class="form-control" name="myplan" id="myplan" disabled="disabled" value='<?php echo $Pplan; ?>'>
  															</div>
														 </div>

														 <div class="form-group">
															 <label class="control-label col-md-3 col-sm-3 col-xs-12">
																Transaction Date
															 </label>
															 <div class="col-md-3 col-sm-3 col-xs-12">
																 <input style="cursor:auto" style="border:none" disabled="disabled" type="text" class="form-control" name="mydate" id="mydate" value='<?php echo $Tdate; ?>'>
															 </div>
																 <label class="control-label col-md-3 col-sm-3 col-xs-12">
																 Mode of Payment
																</label>
																<div class="col-md-3 col-sm-3 col-xs-12">
																	<input style="cursor:auto" style="border:none" type="text" class="form-control"disabled="disabled"  name="myModeOfPayment" id="myModeOfPayment" value='<?php echo $MOP; ?>'>
															 	 </div>
															</div>

																</div>
														</div>
													</div>
											</div>

												  </form>
											</div>
										</div>
									</div>
								</center>
									<!--table content policy for adding requirements-->
									<div name="addreqdiv" class="col-md-12 col-sm-12 col-xs-12" >
											<div class="x_panel">
												<div class="x_title">
												<h2><b>Issue Date</b></h2>
												<button  type="button" style='float:right' data-toggle="modal" data-target="#momodal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Issue Date</button>
												<br	><br>
												</div>
									 <div class="x_content">
										 <div class="row">
											<form name="formko" id="formko" method="post" onsubmit="CheckForm()">

												<br>
												<div class="col-md-5">
														<input style = "width:130px;"  style="border:none" readonly="readonly" type="text" class="form-control" name="inputvaluedelete" id="inputvaluedelete" value='' hidden/>
												</div>
												<div class="col-md-6">
															<form>
														<input style = "width:130px;"  readonly="readonly"  style="border:none"  type="text" class="form-control" name="inputvaluedelete2" id="inputvaluedelete2" value='' hidden/>
												</div>
												<div class="col-md-12">
														<button type="button" class="btn btn-primary" id="UpdateButton" name="UpdateButton" data-toggle="modal" data-target="#myModal2" id="myBtn2"><i class="fa fa-file-text"></i>&nbsp;&nbsp; Update	</button>
														<button type="submit"  class="btn btn-primary" id="cancel" name="cancel"><i class="fa fa-close" onclick="ClickCancel()"></i>Cancel</button>
												</div>
														</form>
											</form>
								<div class="clearfix"></div>
								</div>
									<div   cellpadding=100 border= 1 style='float:center' id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<div class="row"
											<div class="col-sm-1">
												<table method="post" id="tablekoto" name ="tablekoto" class="table  table-bordered dataTable table-hover no-footer" role="grid" onclick="CheckForm()">
													<thead>
														<tr role="row">
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Policy No</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending"  style="width: 35px;text-align:center;">Plan</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending"  style="width: 35px;text-align:center;">Name of Insured</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Remarks</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Issue Date</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Production ID</th>
															</tr>
													</thead>
													<div id="momodal"name="momodal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-sm">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																	<h4 class="modal-title" id="myModalLabel2">Issue Date</h4>
																</div>
																<form method='post' name='myform' onsubmit="CheckForm()">
																	<div class="modal-body">

																		<?php
																			if(isset($_POST['btn-addrEquirements'])){
																			//	$RRRequirements = $_POST['requirement'];
																				tgpdso::addIssuedate();
																			}

																		?>
																		Production ID:<br><input type="text" readonly="readonly" class="form-control" name="ProdId" value="<?php echo $prodID?>"hidden><br>
																		Policy No: <br><input  type="text" readonly="readonly" class="form-control" id="policy" name="policy" value="<?php echo $Pno?>"hidden><br>
																		Plan Code: <br><input  type="text" class="form-control" readonly="readonly" id="planCode" name="planCode" value="<?php echo $Pplan?>"hidden><br>
																		Issue Date: <br> <input name="issuedate" id="issuedate" style = "width:195px" class="date-picker form-control" required="required" type="date" required><br>
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
															<?php

																$DB_con = Database::connect();
																$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																$sql = "SELECT * FROM production WHERE '$prodID' = prodID";
																$result = $DB_con->query($sql);

																	while($row=$result->fetch(PDO::FETCH_ASSOC)){
																		?>
																			<tr>
																				<td><?php print($row['policyNo']); ?></td>
																				<td><?php print($row['plan']); ?></td>
																				<td><?php print($row['lastName']. ", " .$row['firstName']); ?></td>
																				<td><?php print($row['remarks']); ?></td>
																				<td><?php print($row['issuedDate']); ?></td>
																				<td hidden><?php print($row['prodID']); ?></td>
																		</tr>
																			<?php
																		}
															?>
														</tbody>
														<script method="POST">
																var table = document.getElementById('tablekoto');

																for(var counter = 1; counter < table.rows.length; counter++)
																{
																	table.rows[counter].onclick = function()
																	{;
																		document.getElementById("inputvaluedelete").value =this.cells[0].innerHTML;
																		document.getElementById("inputvaluedelete2").value =this.cells[1].innerHTML;
																		document.getElementById("uprod").value =this.cells[5].innerHTML;
																		document.getElementById("uplan").value =this.cells[1].innerHTML;
																		document.getElementById("upolicy").value =this.cells[0].innerHTML;
																		};
																	}
																	</script>

													</table>
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
								<h2 class="modal-title">Search policy NO</h2>
								<button type="button" class="close" data-dismiss="modal">x</button>
							</div>

							<form style="margin-bottom: 10px;">
							<div class="modal-body">

								<table name="tableko" id="tableko" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
 							 <thead>
								 <tr role="row">
 									 <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Policy No</th>
 									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 100px;text-align:center;">Name</th>
 									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending" style="width: 50px;text-align:center;name="PolicyNoCell"">Agent</th>
 									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Issued Date</th>

									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Lastname</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Firstname</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Receipt</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Plan</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Transadate</th>
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	MOD</th>
 									 </tr>
 							 </thead>
 							 <tbody>
 								 <?php
 									 $DB_con = Database::connect();
 									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 									 $sql = "SELECT * FROM production";

 									 $result = $DB_con->query($sql);
 									 if($result->rowCount()>0){
 										 while($row=$result->fetch(PDO::FETCH_ASSOC)){
 											 ?>
 											 <tr>
 												 <td><?php print($row['policyNo']); ?></td>
 												 <td><?php print($row['lastName']. ", " .$row['firstName']); ?></td>
 												 <td><?php print($row['agent']); ?></td>
												 <td><?php print($row['issuedDate']); ?></td>

 												 <td hidden><?php print($row['lastName']); ?></td>
												 <td hidden><?php print($row['firstName']); ?></td>
												 <td hidden><?php print($row['receiptNo']); ?></td>
												 <td hidden><?php print($row['agent']); ?></td>
												 <td hidden><?php print($row['plan']); ?></td>
												 <td hidden><?php print($row['transDate']); ?></td>
												 <td hidden><?php print($row['modeOfPayment']); ?></td>
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
								<button type="submit" onclick="showdata()" class ="btn btn-primary"class="btn btn-default" data-dismiss="modal">Submit</button>
							</div>

						</div>
					</div>
				</div>
				<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->

					<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
					<div	method="POST" class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
							<h2 class="modal-title">Update Requirements</h2>
							<button type="button" class="close" data-dismiss="modal">X</button>
						<form method='post' name='myform' onsubmit="CheckForm()">
							<?php 	if(isset($_POST['iupdateko']))
							{tgpdso::updateIssuedate();}?>
						<div method="post" class="modal-body">
							Production ID <input type="text" readonly="readonly" style="width:195px" class="form-control" name="uprod" id="uprod" value="<?php $prodID ?>" >
						 	Plan <input  type="text" style="width:195px" readonly="readonly" class="form-control" id="uplan" name="uplan" value="<?php echo $Pplan?>">
							Policy No <input  type="text" class="form-control" readonly="readonly" style="width:195px" name="upolicy" id="upolicy" value="<?php echo $Pno?>">
							Issue Date:  <br><input class="form-control" name="modalissuedate" style = "width:195px" class="date-picker form-control" required="required" type="date" value=""><br>
						</div>

						<div class="modal-footer">
							<form method="POST" action="<?php $_PHP_SELF ?>">
							<div  class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="iupdateko" name="iupdateko"><i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
						</form>
						</div>
						</div>
						</div>
					</div>
					</form>
				</div>
			</div>

			<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
			</form>
			<footer>
				<div class="pull-right">
					COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
				</div>
				<div class="clearfix"></div>
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

</script>

<script>
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
$('#myModal').this.Close();
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

</script>
