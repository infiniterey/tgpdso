<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>

</head>
<style>
#trainingid,#utrainid{display:none}
</style>
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
				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->
				<div class="right_col" role="main">
					<div class="">
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">

										<form method='post' name='myform' onsubmit="CheckForm()">
												<?php
												$trainingid="";
												 $pat=""; $pot=""; $pit=""; $tempAgentName=""; $tempAgentID=""; $tempTrainingID=""; $tempTrainingName=""; $contain=""; $contain1="";?>

											<input style = "width:130px;"  style="border:none" type="text" class="form-control" name="temp" id="temp">
											<input style = "width:130px;"  style="border:none" type="text" class="form-control" name="temp2" id="temp2">
											<input style = "width:130px;"  style="border:none" type="text" class="form-control" name="temp3" id="temp3">
											<div method="post">
												<?php if(isset($_POST['temp'])) { $pat = $_POST['temp']; } ?>
												<?php if(isset($_POST['temp2'])) { $pot = $_POST['temp2']; } ?>
												<?php if(isset($_POST['temp3'])) { $pit = $_POST['temp3']; } ?>
 											</div>
										<h2><b>Add Training</b></h2><br><br><br>
										<div class="clearfix"></div>

										<?php
											if(isset($_POST['btn-deleteRow'])){
												tgpdso::deleteTraining();
											}
									?>
				<button style="float:left" type="button" class="btn btn-primary" id="addTraining" name="addTraining" data-toggle="modal" data-target="#momodal"><i class="fa fa-file-text"></i>Add training</button>
				<table method="post" id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
				<thead>
					<tr role="row">
									<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;" hidden>Training ID</th>
						<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Training Name</th>
							<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Date of Training</th>
							<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
						</tr>
				</thead>
				<tbody>
					<?php
						$DB_con = Database::connect();
						$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
						$sql = "SELECT * FROM training";

						$result = $DB_con->query($sql);
						if($result->rowCount()>0){
							while($row=$result->fetch(PDO::FETCH_ASSOC)){
								?>
								<tr>
									<td hidden><?php print($row['trainingNo']); ?></td>
									<td><?php print($row['trainingName']); ?></td>
									<td><?php print($row['trainingDate']); ?></td>
									<td>
										<div class="row">
											<center>
												<form method='post' name='myform' onsubmit="CheckForm()">
												<button  type="button" id="ButtonUpdate" name="ButtonUpdate" data-toggle="modal" data-target="#myModal2" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
													<a data-toggle="modal" data-target="#addtrainingqualifications" title="add Data" href="add=<?php echo $row['trainingNo']; ?>" name="addbutton" class="btn btn-primary"><i class="fa fa-plus"></i></a>
												  <a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_training.php?delete=<?php echo $row['trainingNo']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
												</form>
											</center>
										</div>
									</td>
							</tr>
								<?php
							}
						}
						else{
						}

					?>

				</form>
			</table>
			<!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification -->

			<div id="addtrainingqualifications" name="addtrainingqualifications" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" style="width:800px">
					<div class="modal-content">
						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel2">Add Qualification</h4>
						</div>
						 <div class="row">
							<div class="modal-body">
								<div class="col-sm-3">
								<form method='post' name='myform' action="<?php $_PHP_SELF ?>">
								<input type="text" class="form-control"  style="width: 195px" id="trainingid" name="trainingid" value=""><br>
								Training Name:<br><input type="text" class="form-control"  style="width: 195px" id="TrainingName" name="TrainingName" value=""><br>
								Training Required Position: <br>
								<select style = "width:195px" name="TrainingRequired" id="TrainingRequired"class="form-control" >
								<?php tgpdso::dropdown_position(); ?>

							</select><br>
							<br><br>
						 	</div>
						 <?php

						 if(isset($_GET['trainingid']))
						 {
							 $trainingid=$_GET['trainingid'];
							 ?><script>alert('go ');</script><?php
							}
						  ?>
						 <div class="col-sm-9">
							 <?php
							 ?>
							 <table method ="post" style="margin-left:70px" id="datatable-fixed-header10" name="datatable-fixed-header10" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
							 <thead>
								 <tr role="row">
										 <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-controls="datatable-fixed-header10"aria-sort="ascending" style="width:200px" aria-label="Trans. Date: activate to sort column descending">Training Name</th>
										 <th class="sorting" tabindex="0"rowspan="1" colspan="1" aria-controls="datatable-fixed-header10"style="width:200px" aria-label="Name of Insured: activate to sort column ascending">Training Required</th>
										 <th class="sorting" tabindex="0"rowspan="1" colspan="1" aria-controls="datatable-fixed-header10"style="width:200px" aria-label="Rate: activate to sort column ascending">Action</th>
									 <th class="sorting" tabindex="0"rowspan="1" colspan="1" aria-controls="datatable-fixed-header10"style="width:200px" aria-label="Action: activate to sort column ascending" hidden>training no</th>
									 </tr>
							 </thead>
							 <tbody>
								 <?php

									 $DB_con = Database::connect();
									 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
									 $sql = "SELECT * FROM trainingqualifications";

									 $result = $DB_con->query($sql);
									 if($result->rowCount()>0){
										 while($row=$result->fetch(PDO::FETCH_ASSOC)){
											 ?>
											 <tr>
												 <td><?php print($row['trainingQName']); ?></td>
												 <td><?php print($row['trainingQualification']); ?></td>
												 <td>
													 <div class="row">
														 <center>
															 <form method='post' name='myform' onsubmit="CheckForm()">
																 <a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_training.php?deletetraining=<?php echo $row['trainingID'] ?>&deletequalification=<?php echo $row['trainingQualification']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
														 </center>
													 </div>
												 </td>
											 <td hidden><?php print($row['trainingID']); ?></td>
											 </tr>
											 <?php
										 }
									 }
									 else{}

								 ?>

								 </tbody>
						 </table>
						 <script>
						 var table = document.getElementById('datatable-fixed-header10');
						 for(var counter = 1; counter < table.rows.length; counter++)
						 {
							 table.rows[counter].onclick = function()
							 {;

										document.getElementById("TrainingName").value = this.cells[0].innerHTML;
										document.getElementById("TrainingDate").value = this.cells[2].innerHTML;
								document.getElementById("trainingid").value = this.cells[4].innerHTML;
						};
							 }
						 </script>

					 </div>
					 <?php

				 ?>
						</div>
						<div 	<div  class="col-sm-12">
							<div method="post" class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary" id="addqualifications" name="addqualifications"><i class="fa fa-plus"></i>Add Qualification</button>
								<?php if(isset($_POST['addqualifications']))
								{tgpdso::addTrainingQualifications();}?>
							 </div>
						 </div>
						</form>
					</div>
					</div>
				</div>
			</div>
			<?php

		?>
			<!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification --><!-- add qualification -->

				<br><br>
			</form>
				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->

				<!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training -->
			<div id="momodal"name="momodal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm" style="width:250px">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel2">Add Requirements</h4>
						</div>
						<form method='post' name='myform' onsubmit="CheckForm()">
							<div class="modal-body">
								<?php
									if(isset($_POST['btn-addrEquirements'])){
										tgpdso::addTraining();
									}
							?>
								Training Name:<br><input type="text" class="form-control"  style="width: 195px" id="TrainingName" name="TrainingName" value=""><br>
								Training Date:<br><input type="date" class="form-control"  style="width: 195px" id="TrainingDate" name="TrainingDate" value=""><br>
							<br><br>
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
<!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training --><!-- /Modal add training -->
<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->

	<!-- The Modal update training--><!-- The Modal update training--><!-- The Modal update training--><!-- The Modal update training--><!-- The Modal update training--><!-- The Modal update training-->
	<div	method="POST" class="modal fade bs-example-modal-sm" name="myModal2" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
			<h2 class="modal-title">Update Training</h2>
			<button type="button" class="close" data-dismiss="modal">X</button>
		<form method='post' name='myform' onsubmit="CheckForm()">
			<?php 	if(isset($_POST['iupdateko']))
			{tgpdso::updateTraining();}?>
				<div class="modal-body">
			<br><br>
		 	Training ID<input type="text" readonly="readonly" style="width:195px" class="form-control"  name="utrainid" id="utrainid" value="<?php echo $pat?>" >
			Training Name<input style = "width:195px" name="utrainname" id="utrainname"class="form-control">
			Date<input  type="date" class="form-control" style="width:195px" name="utraindate" id="utraindate" value="<?php echo $pit?>">


		</div>

		<div class="modal-footer">
			<form method="POST" action="<?php $_PHP_SELF ?>">
			<div  class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="iupdateko" name="iupdateko"><i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
				</div>
		</form>
		</div>
		</div>
	</div>
	</form>
</div>
</div>

<!-- The Modal update training--><!-- The Modal update training--><!-- The Modal update training--><!-- The Modal update training-->
<!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addAgentToTrain">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
			</div>
			<form method='post' name='myform' onsubmit="CheckForm()">
				<div class="modal-body">
						<div class="row">
						<div class="col-md-12">
							<table id="myTable" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="">
							<thead>
								<tr role="row">
												<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Agent Code</th>
									<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Agent Name</th>
										<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Agent Position</th>
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
												<td><?php print($row['agentLastname']. ", " .$row['agentFirstname']);?></td>
												<td><?php print($row['agentPosition']); ?></td>
										</tr>
											<?php
										}
									}
									else{
									}
								?>

								</tbody>
							</table>
							<br><br>
							<button style="float:right" type="button" class="btn btn-primary" data-dismiss="modal" id="ok" name="ok"><span class='fa fa-close'></span>Ok</button>
					</form>

						</div>
				</div>
			</form>
		</div>
	</div>
	</div>
	</div>
	<!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
	<!-- The Modal training table--><!-- The Modal training table-->
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addAgentToTrain2">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
				</div>
				<form method='post' name='myform' onsubmit="CheckForm()">
					<div class="modal-body">
							<div class="row">
							<div class="col-md-12">
								<table id="myTable2" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="">
								<thead>
									<tr role="row">
										<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Training No</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Training Name</th>
										<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Training Required</th>
										</tr>
								</thead>
								<tbody>
									<?php
										$DB_con = Database::connect();
										$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
										$sql = "SELECT * FROM training";

										$result = $DB_con->query($sql);
										if($result->rowCount()>0){
											while($row=$result->fetch(PDO::FETCH_ASSOC)){
												?>
												<tr>
													<td><?php print($row['trainingNo']); ?></td>
													<td><?php print($row['trainingName']); ?></td>
													<td><?php print($row['trainingRequired']); ?></td>
											</tr>
												<?php
											}
										}
										else{
										}
									?>

									</tbody>
								</table>
								<br><br>
								<button style="float:right" type="button" class="btn btn-primary" data-dismiss="modal"	><span class='fa fa-close'></span>Ok</button>
						</form>

							</div>
					</div>
				</form>
			</div>
		</div>
		</div>
		</div>
		<!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
		<!-- The Modal training table--><!-- The Modal training table--><!-- The Modal training table--><!-- The Modal training table--><!-- The Modal training table-->

		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addAgentToTrain2">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
					</div>
					<form method='post' name='myform' onsubmit="CheckForm()">
						<div class="modal-body">
								<div class="row">
								<div class="col-md-12">
									<table id="myTable2" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="">
									<thead>
										<tr role="row">
											<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Training No</th>
											<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Training Name</th>
											<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Training Required</th>
											</tr>
									</thead>
									<tbody>
										<?php
											$DB_con = Database::connect();
											$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
											$sql = "SELECT * FROM training";

											$result = $DB_con->query($sql);
											if($result->rowCount()>0){
												while($row=$result->fetch(PDO::FETCH_ASSOC)){
													?>
													<tr>
														<td><?php print($row['trainingNo']); ?></td>
														<td><?php print($row['trainingName']); ?></td>
														<td><?php print($row['trainingRequired']); ?></td>

												</tr>
													<?php
												}
											}
											else{
											}
										?>

										</tbody>
									</table>
									<br><br>
									<button style="float:right" type="button" class="btn btn-primary" data-dismiss="modal"	><span class='fa fa-close'></span>Ok</button>
							</form>

								</div>
						</div>
					</form>
				</div>
			</div>
			</div>
			</div>
		<!-- The Modal training table--><!-- The Modal training table--><!-- The Modal training table--><!-- The Modal training table--><!-- The Modal training table--><!-- The Modal training table-->
		<!-- The Modal add agent to train	ing--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="addAgentToTrain5">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
						<h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
					</div>
					<form method='post' name='myform' onsubmit="CheckForm()">
						<div class="modal-body">
								<div class="row">
								<div class="col-md-12">
									<table id="myTable5" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="">
									<thead>
										<tr role="row">
														<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Position ID</th>
											<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Position Name</th>
											</tr>
									</thead>
									<tbody>
										<?php
											$DB_con = Database::connect();
											$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
											$sql = "SELECT * FROM position";

											$result = $DB_con->query($sql);
											if($result->rowCount()>0){
												while($row=$result->fetch(PDO::FETCH_ASSOC)){
													?>
													<tr>
														<td><?php print($row['positionID']); ?></td>
														<td><?php print($row['positionName']); ?></td>

												</tr>
													<?php
												}
											}
											else{
											}
										?>

										</tbody>
									</table>
									<br><br>
									<button style="float:right" type="button" class="btn btn-primary" data-dismiss="modal" id="ok" name="ok"><span class='fa fa-close'></span>Ok</button>
							</form>

								</div>
						</div>
					</form>
				</div>
			</div>
			</div>
			</div>
			<!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->

				</div>
			</div>
						</div>
							</div>
								</div>
  		</div>
  	</div>
		<footer style="margin-bottom: -15px;">
				<center>
				COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
			</center>
		</footer>


    <?php include 'java.php';?>
		<script	src="	https://code.jquery.com/jquery-3.3.1.js">	</script>
	<script	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script	src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
  </body>
</html>
	<script method="POST" type="text/javascript">
	var table = document.getElementById('myTable5');

for(var counter = 1; counter < table.rows.length; counter++)
{
	table.rows[counter].onclick = function()
	{;
		document.getElementById("TrainingRequired").value =this.cells[1].innerHTML;
		};
	}
 		var table = document.getElementById('datatable-fixed-header');

	for(var counter = 1; counter < table.rows.length; counter++)
	{
		table.rows[counter].onclick = function()
		{;
			document.getElementById("temp").value =this.cells[0].innerHTML;
			document.getElementById("temp2").value =this.cells[1].innerHTML;
			document.getElementById("temp3").value =this.cells[2].innerHTML;
			document.getElementById("utrainid").value = this.cells[0].innerHTML;
			document.getElementById("utrainname").value = this.cells[1].innerHTML;
			document.getElementById("utraindate").value = this.cells[2].innerHTML;
			document.getElementById("TrainingName").value = this.cells[1].innerHTML;
			document.getElementById("TrainingDate").value = this.cells[3].innerHTML;
			document.getElementById("trainingid").value = this.cells[0].innerHTML;
			document.getElementById("trainingid2").value = this.cells[0].innerHTML;
			var temporary = document.getElementById("trainingid").innerHTML;

			};
		}

		var table = document.getElementById('myTable');

	for(var counter = 1; counter < table.rows.length; counter++)
	{
		table.rows[counter].onclick = function()
		{;
			document.getElementById("agentName").value =this.cells[1].innerHTML;
			document.getElementById("contain1").value =this.cells[0	].innerHTML;
			};
		}

		var table = document.getElementById('myTable2');

	for(var counter = 1; counter < table.rows.length; counter++)
	{
		table.rows[counter].onclick = function()
		{;
			document.getElementById("trainingNameko").value =this.cells[1].innerHTML;
				document.getElementById("contain2").value =this.cells[2].innerHTML;
			};
		}

	$("#datatable-fixed-header tr").click(function() {
		var selected = $(this).hasClass("highlight");
		$("#datatable-fixed-header tr").removeClass("highlight");

		if(!selected)
							$(this).addClass("highlight");

	});

	$(document).on("dblclick","#datatable-fixed-header tr",function() {

							$("#datatable-fixed-header tr").removeClass("highlight1");
	});

	$("#myTable tr").click(function() {
		var selected = $(this).hasClass("highlight");
		$("#myTable tr").removeClass("highlight");

		if(!selected)
							$(this).addClass("highlight");
	});

	$(document).on("dblclick","#myTable tr",function() {
							$("#myTable tr").removeClass("highlight1");
	});

	$("#myTable2 tr").click(function() {
		var selected = $(this).hasClass("highlight");
		$("#myTable2 tr").removeClass("highlight");

		if(!selected)
							$(this).addClass("highlight");
	});

	$(document).on("dblclick","#myTable2 tr",function() {
							$("#myTable2 tr").removeClass("highlight1");
	});



$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );
$(document).ready(function() {
    $('#datatable-fixed-header10').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );

$("#myTable5 tr").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#myTable5 tr").removeClass("highlight");

	if(!selected)
						$(this).addClass("highlight");
});
$(document).ready(function() {
    $('#myTable').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );
function ClickCancel()
{
	$('#addAgentToTrain').closemodal("highlight");
}
function showButtons()
{
}
$("#addbutton").click(function(){
    $("#addtrainingqualifications").modal();
});
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
		$sql = "DELETE FROM training WHERE trainingNo = '$delete'";

		if($conn->query($sql) === TRUE)
		{
			echo "Successful";
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		?>
		<script>
		window.location="add_training	.php";
		</script>
		<?php
		$conn->close();
	}
}
?>
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
	if(isset($_GET['deletetraining'])&& isset($_GET['deletequalification']))
	{
		$delete= $_GET['deletetraining'];
		$delete2 = $_GET['deletequalification'];
		$sql = "DELETE FROM trainingqualifications WHERE trainingID = '$delete' and trainingQualification = '$delete2'";

		if($conn->query($sql) === TRUE)
		{
			echo "Successful";
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		?>
		<script>
		window.location="add_training.php";
		</script>
		<?php
		$conn->close();
	}
}
?>
