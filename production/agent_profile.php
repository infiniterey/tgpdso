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

#inputvaluedelete,#inputvaluedelete2,#modalprod,#modalcode,#modalplan,#codeInputTextBox{display:none}

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
															<form method='get' name='myform' onsubmit="CheckForm()">
															<h2><input type="text" name="searchAgentCodeText" id="searchAgentCodeText" placeholder="Agent ID"></input>
														 	<button type="button" name="buttonShowAllAgent" id="buttonShowAllAgent" class="fa fa-table" data-toggle="modal" data-target="#agentTableModal" style="margin-bottom: -1px;" id="myBtn"></button></h2>

															<br	><br>
															<div class="clearfix"></div>
														</form>
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
																	 $variableAgentCode=" ";;
																	 $variableLastName =" ";
																	 $variableFirstName =" ";
																	 $variableMiddleName =" ";
																	 $variableBirthdate = " ";
																	 $variableApplicationDate =" ";
																	 $variableTeam = " ";
																	 $variablePositon =" ";
																		$valueToSearch=" ";
																		$bool = False;
																		if(isset($_GET['searchAgentCodeText']))
																		{
																			$valueToSearch = $_GET['searchAgentCodeText'];
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
																				 <input style="cursor:auto" style="border:none" type="text" disabled="disabled" class="form-control col-md-7 col-xs-12" name="lastNameInputBox" id="lastNameInputBox" value='<?php echo $variableLastName ?>'><br>
																			 </div>
																		 	 <div class="col-xs-3">
																				 First Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-12" disabled="disabled" name="firstNameInputBox" id="firstNameInputBox" value='<?php echo $variableFirstName ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Middle Name
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="middleNameInputBox" id="middleNameInputBox" value='<?php echo $variableMiddleName ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Birthday
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="birthdayInputBox" id="birthdayInputBox" value='<?php echo $variableBirthdate ?>'>
																			 </div>
																		 </div>
																		 <div class="row">
																			 <div class="col-xs-3">
																				 	Application Date
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="applicationInputBox" id="applicationInputBox" value='<?php echo $variableApplicationDate ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Team
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="teamInputTextBox" id="teamInputTextBox" value='<?php echo $variableTeam ?>'>
																			 </div>
																			 <div class="col-xs-3">
																				 Position
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="positionInputText" id="positionInputText" value='<?php echo $variablePositon ?>'>
																				 <input style="cursor:auto" style="border:none" type="text" class="form-control col-md-7 col-xs-4" disabled="disabled" name="codeInputTextBox" id="codeInputTextBox" value='<?php echo $variableAgentCode ?>'>
																			 </div>
																			</div>
																		</div><br/>
																			 <div class="form-group">
																				 <hr>

																	 	 </div>
																		</div>
																	</div>
																</div>
 																</form>


																<?phpif(isset($_POST['searchAgentCodeText']))
															{?>
															       	<script>alert('gagagagagaga');</script>
															<div id="Payment" class="tabcontent">
															<!--table content policy for adding requirements-->
																<h5><b>Payment Details</b></h5><hr>
															 <div class="row">

																<div class="clearfix"></div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<table style="text-align:center" id="agentTrainingTable" name ="agentTrainingTable" class="table  table-bordered dataTable table-hover no-footer" role="grid" onclick="showForm()">
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
																				<tbody>
																			</tbody>

																				<?php
																				if(isset($_GET['searchAgentCodeText']))
																				{
																					 $DB_con = Database::connect();
											  									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
											  									 $sql = "SELECT * FROM agentstraining Where ATagentID = '".$_GET["searchAgentCodeText"]."'";
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
																					 }
																					 ?>
																			</table>
																			<script>
																					var table = document.getElementById('agentTrainingTable');

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
						 <script>alert('mao ni kani: <?php echo $valueToSearch ?>');</script>
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>

							<form style="margin-bottom: 10px;">
							<div class="modal-body">

								<table name="agentTable" id="agentTable" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
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
						 		<?php
									?>
 								 <script>alert('hooooy<?php $valueToSearch ?>');</script>


										<?php
									?>
									</form>
							</div>

							<div class="modal-footer">
								<form method='post' name='myform' action="<?php $_PHP_SELF ?>" onsubmit="CheckForm()">
								<button type="button" onclick="closemodal()" name ="submitAgentChosen" id="submitAgentChosen" class ="btn btn-primary"class="btn btn-default" data-dismiss="modal">Submit</button>
							</form>
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
function ClickCancel()
{

}
function closemodal()
{
	$('#agentTableModal').close();
}
function showForm()
{

}
function hideForm()
{

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
$('#agentTable').show("highlight");
}
function hidetable()
{
$('#agentTable').hide("highlight1");
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
