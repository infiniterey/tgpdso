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
        <!-- page content -->

				<div class="right_col" role="main">
		  		<div class="clearfix">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>POLICY REQUIREMENTS</b></h2>
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
													<form method='post'>
														<h4 style="float:left">Policy No <input type="text" name="searchT" id="searchT" placeholder="Search"></input>
													 <button type="submit" name="buttonSearch"  id="buttonSearch" class="fa fa-search" ></button>
												 <button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-table"	  data-toggle="modal" data-target="#myModal" style="margin-bottom: -1px;" id="myBtn"></button></h4>

													 <?php
												 	 $Tdate = "";
													 $Lname = "";
													 $Fname = "";
													 $clientID="";
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

														if(isset($_POST['searchT']))
														{	 $valueToSearch = $_POST['searchT'];}
														try {
														$DB_con = Database::connect();
														 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
														 //$stmt->bindValue(':search', '%' . $var1 . '%', PDO::PARAM_INT);
														 	$sql="SELECT * FROM production, client WHERE clientID = '$clientID' and policyNo = '$valueToSearch'";

														 $q = $DB_con->prepare($sql);
														 $q->execute();
														 $result =  $q->fetchall();
														 foreach($result as $row)
															 {
																 $bool = True;
																 $prodID = $row['prodID'];
																 $Tdate = $row['transDate'];
																 $clientID=$row['prodclientID'];
																 $Lname = $row['cLastname'];
																 $Fname = $row['cFirstname'];
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
															 <div class="row">
															 <div class="col-md-12">
													 <div class="form-group">
														 <div class="col-xs-3">
		                           Last Name
														 		 <input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="mylastname" id="mylastname" value='<?php echo $Lname; ?>'><br>
													 </div>
												  	 <div class="col-xs-3">
	 		                      			First Name
																 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="myfirstname" id="myfirstname" value='<?php echo $Fname; ?>'>
													  </div>
	 												<div class="col-xs-3">
		 												Policy No
												 				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" name="mypolicy" disabled="disabled" id="mypolicy" value='<?php echo $Pno; ?>'>
												 	 </div>
												 	 <div class="col-xs-3">
														 			 Official Receipt
												 				 <input style="cursor:auto" style="border:none" type="text" class="form-control" disabled="disabled" name="myofficialReceipt" id="myofficialReceipt" value='<?php echo $Rno; ?>'>
												 		</div>
													</div><br><br><br><br>
													 <div class="form-group">
	 													<div class="col-xs-3">
		 		 										Agent
																<input style="cursor:auto" style="border:none" type="text" class="form-control" name="myAgent" id="myAgent" disabled="disabled" value='<?php echo $Aagent; ?>'>
														</div>
														 <div class="col-xs-3">
																Plan
																 <input style="cursor:auto" style="border:none" type="text" class="form-control" name="myplan" id="myplan" disabled="disabled" value='<?php echo $Pplan; ?>'>
  													 </div>

														 	 <div class="col-xs-3">
																Transaction Date
																 <input style="cursor:auto" style="border:none" disabled="disabled" type="text" class="form-control" name="mydate" id="mydate" value='<?php echo $Tdate; ?>'>
															 </div>
															 <div class="col-xs-3">
														 		 Mode of Payment
																<input style="cursor:auto" style="border:none" type="text" class="form-control"disabled="disabled"  name="myModeOfPayment" id="myModeOfPayment" value='<?php echo $MOP; ?>'>
															 	 </div>
															</div>
																	</div>
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
												<h2><b>Add Requirement</b></h2>
												<button  type="button" style='float:right' data-toggle="modal" data-target="#momodal" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus" hidden></i>&nbsp;&nbsp;Add Requirements</button>
												<br	><br>
												</div>
									 <div class="x_content">
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

														</form>
											</form>
								<div class="clearfix"></div>
								</div>
									<div   cellpadding=100 border= 1 style='float:center' id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<div class="row"
											<div class="col-sm-1">
												<table  id="tablekoto" name ="tablekoto" class="table  table-bordered dataTable table-hover no-footer" role="grid" onclick="showForm()">
													<thead>
														<tr role="row">
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Transaction Date</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending"  style="width: 35px;text-align:center;">Requirements</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Status</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Submit Date</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>RequirementNo</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
															</tr>
													</thead>
													<div id="momodal"name="momodal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-sm">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																	<h4 class="modal-title" id="myModalLabel2">Add Requirements</h4>
																</div>
																<form method='post' name='myform' onsubmit="CheckForm()">
																	<div class="modal-body">

																		<?php
																			if(isset($_POST['btn-addrEquirements'])){
																				$RRRequirements = $_POST['requirement'];
																				tgpdso::addRequirements();
																			}

																		?>
																		Transaction Date: <br><input class="form-control" name="TTransactDate" style = "width:195px" class="date-picker form-control" required="required" type="date" value=""><br>
																		Production ID:<br><input type="text" readonly="readonly" class="form-control" id="ProdId" name="ProdId" value="<?php echo $prodID?>"hidden><br>
																		Agent Code: <br><input  type="text" readonly="readonly" class="form-control" id="agentCode" name="agentCode" value="<?php echo $Aagent?>"hidden><br>
																		Plan Code: <br><input  type="text" class="form-control" readonly="readonly" name="planCode" value="<?php echo $Pplan?>"hidden><br>
																		Requirement: <br><Textarea type="text" class="form-control" name="requirement" style="width:200px;height:40px" ></Textarea><br>
																		<!-- Status: <br><input type="text" class="form-control" name="stats"><br> -->
																		<!-- Submit Date: <br> <input name="submitdate" style = "width:195px" class="date-picker form-control" required="required" type="date" required><br> -->
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
														<form method='POST' name='myform' onsubmit="CheckForm()">
															<?php
																if(isset($_POST['retrieveAgent']))
																{
																	?><script>alert('yahaloo');</script><?php
																$DB_con = Database::connect();
																$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																$sql = "SELECT * FROM requirements WHERE RProdID = '$prodID'";
																$result = $DB_con->query($sql);

																	while($row=$result->fetch(PDO::FETCH_ASSOC)){
																		?>
																			<tr>
																				<td><?php print($row['RtransDate']); ?></td>
																				<td><?php print($row['Rrequirements']); ?></td>
																				<td><?php print($row['Status']); ?></td>
																				<td><?php print($row['SubmitDate']); ?></td>
																				<td hidden><?php print($row['RequirementNo']); ?></td>
																				<td>
																					<div class="row">
																						<center>
																							<form method='post' name='myform' onsubmit="CheckForm()">
																							<button  type="button" id="ButtonUpdate" name="ButtonUpdate" data-toggle="modal" data-target="#myModal2" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
																									<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_requirements.php?delete=<?php echo $row['RequirementNo'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
																							</form>
																						</center>
																					</div>
																				</td>
																		</tr>
																			<?php
																		}
																		?>
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
																				<?php
																	}
															?>
														</form>
														</tbody>
													</table>
													<script>
															var table = document.getElementById('tablekoto');

															for(var counter = 1; counter < table.rows.length; counter++)
															{
																table.rows[counter].onclick = function()
																{;
																 	document.getElementById("inputvaluedelete").value =this.cells[4].innerHTML;
															 	 	document.getElementById("inputvaluedelete2").value =this.cells[1].innerHTML;
														  	  document.getElementById("modalRequirementNo").value =this.cells[4].innerHTML;
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
					<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->
					<div class="modal fade" name="myModal" id="myModal">
					<div class="modal-dialog">
						<div class="modal-content">


							<div class="modal-header">
								<h2 class="modal-title">Search policy NO</h2>
								<button type="button" class="close" data-dismiss="modal">x</button>
							</div>

							<form style="margin-bottom: 10px;">
							<div class="modal-body">

								<table method = 'post' name="tableko" id="tableko" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
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
									 <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">	Action</th>
 									 </tr>
 							 </thead>
 							 <tbody>
 								 <?php

 									 $DB_con = Database::connect();
 									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 									 $sql = "SELECT * from production, client Where client.clientID = production.prodclientID";

 									 $result = $DB_con->query($sql);
 									 if($result->rowCount()>0){
 										 while($row=$result->fetch(PDO::FETCH_ASSOC)){
 											 ?>
 											 <tr>
 												 <td><?php print($row['policyNo']); ?></td>
 												 <td><?php print($row['cLastname']. ", " .$row['cFirstname']); ?></td>
 												 <td><?php print($row['agent']); ?></td>
												 <td><?php print($row['issuedDate']); ?></td>

 												 <td hidden><?php print($row['lastName']); ?></td>
												 <td hidden><?php print($row['firstName']); ?></td>
												 <td hidden><?php print($row['receiptNo']); ?></td>
												 <td hidden><?php print($row['agent']); ?></td>
												 <td hidden><?php print($row['plan']); ?></td>
												 <td hidden><?php print($row['transDate']); ?></td>
												 <td hidden><?php print($row['modeOfPayment']); ?></td>
												 <form method='get' name='myform' onsubmit="CheckForm()">
												 	<td><button style="width: 100%; height: 100%;"  type="button" id="retrieveAgent" name="retrieveAgent" data-dismiss="modal" class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button></td>
												</form>
												 </tr>
 											 <?php
 										 }
 									 }
 									 else{}

 								 ?>

 								 </tbody>
 						 </table>



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
					<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-header">
							<h2 class="modal-title">Update Requirements</h2>
							<button type="button" class="close" data-dismiss="modal">x</button>
						</div>

							<form method='post' name='myform' onsubmit="CheckForm()">
						<div class="modal-body">

							<input type="text" style="width:195px" class="form-control" name="modalRequirementNo" id="modalRequirementNo" value="" >
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
		?><script>alert('<?php echo $delete?>');</script><?php
		$sql = "DELETE FROM requirements WHERE RequirementNo = '$delete'";

		if($conn->query($sql) === TRUE)
		{
			echo "Successful";
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		?>
		<script>
		window.location="add_requirements.php";
		</script>
		<?php
		$conn->close();
	}
}
?>
