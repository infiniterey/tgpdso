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
				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->				<!-- /Add training -->
				<div class="right_col" role="main">
					<div class="">
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
		<!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
<h2><br><b>Add agent to training</b></h2>

<br><br>
  <div method="post" id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
		<form  method="post" name='myform' onsubmit="CheckForm()">
<div class="row">
	<div class = "col-sm-3">

Agent Name <span class="required">*</span><br>
<input name="agentName" id="agentName" class="form-control" value="" placeholder="" style="width: 194px;">
<button type="button" class="btn btn-primary" style="margin-bottom: -1px;" data-toggle="modal" data-target="#addAgentToTrain"><span class='glyphicon glyphicon-plus'></span></button>
<input name="contain1" id="contain1" class="form-control" value="" placeholder="" style="width: 257px;"hidden>

Training Name<span class="required">*</span><br>
	<input name="trainingNameko" id="trainingNameko" class="form-control" value="" placeholder="" style="width: 194px;">
	<input name="contain2" id="contain2" class="form-control" value="" placeholder="" style="width: 257px;"hidden>
<button type="button" class="btn btn-primary" style="margin-bottom: -1px;" data-toggle="modal" data-target="#addAgentToTrain5"><span class='glyphicon glyphicon-plus'></span></button>

Date <span class="required">*</span><br>
<input name="DateAdded" id="DateAdded" style="width: 194px;" class="date-picker form-control" required="required" type="date" required><br><br>
<div method="post" action="<?php $_PHP_SELF ?>">
		<button type="reset" name="reset" id="reset" class="btn btn-default">Cancel</button>
	<button type="submit" class="btn btn-primary" id="apply" name="apply">&nbsp;Apply</button><br><br>
	</div>
</div>
<div class="col-md-12">
	<?php
	$contain=""; $contain2="";
	if(isset($_POST['contain1'])){$contain=$_POST['contain1'];}
	if(isset($_POST['contain2'])){$contain2=$_POST['contain2'];}
	?>
<table method="post" name="datatable-fixed-header" id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
<thead>
	<tr role="row">
					<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Agent Name</th>
		<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Agent Training</th>
			<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Date added</th>
				<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
						<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>id</th>
		</tr>
</thead>
<tbody>
	<?php
		$DB_con = Database::connect();
		$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM agentstraining";

		$result = $DB_con->query($sql);
		if($result->rowCount()>0){
			while($row=$result->fetch(PDO::FETCH_ASSOC)){
				?>
				<tr>
					<td><?php print($row['ATagentName']); ?></td>
					<td><?php print($row['ATtrainingName']); ?></td>
					<td><?php print($row['ATdate']); ?></td>
					<td>
						<div class="row">
							<center>
								<form method='post' name='myform' onsubmit="CheckForm()">
								<button  type="button"  data-toggle="modal" data-target="#myModal2" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil" hidden></i></button>
								<a title="Delete Data" onclick="return confirm('Are you sure to delete?')" href="add_agent_training.php?delete=<?php echo $row['ATagentTrainingID'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							</form>
							</center>
						</div>
					</td>
						<td hidden><?php print($row['ATagentTrainingID']); ?></td>
			</tr>
				<?php
			}
		}
		else{
		}
	?>
	</tbody>
	<form method='post' name='myform' onsubmit="CheckForm()">
		<div method="post" class="modal-body">
	<div  name="divnako" id="divnako">
		</div>
	</div>
</form>
</table>
</div>
</div>
</form>
</div>
</div>
<!-- The Modal add agent to train	ing--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training--><!-- The Modal add agent to training-->
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
							<table id="myTable" name = "myTable" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="">
							<thead>
								<tr role="row">
												<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Agent Code</th>
									<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Agent Name</th>
										<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Agent Position</th>
										<th class="sorting"	 tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;">Action</th>

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
												<td>
													<div class="row">
														<center>
															<form method='post' name='myform' onsubmit="CheckForm()">
																<button  type="button" id="update" data-dismiss="modal" name="update" data-toggle="modal" close="modal"  id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
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
													<th class="sorting"  tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 50px;text-align:center;" hidden>Training ID</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Training ID Name</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Training Required position</th>
										<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 50px;text-align:center;">Action</th>
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
													<td hidden><?php print($row['trainingNo	']); ?></td>
													<td><?php print($row['trainingName']); ?></td>
													<td><?php print($row['trainingRequired']); ?></td>
													<td>
														<div class="row">
															<center>
																<form method='post' name='myform' onsubmit="CheckForm()">
																	<button  type="button" id="update" data-dismiss="modal" name="update" data-toggle="modal" close="modal" id="myBtn2" class="btn btn-primary"><i class="fa fa-pencil" ></i></button>
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
		<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->
		<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
				<h2 class="modal-title">Update Fund</h2>
				<button type="button" class="close" data-dismiss="modal">x</button>
			</div>

				<form method="post" name='myform' onsubmit="CheckForm()">
			<div method="post" class="modal-body">

				<button type="button" class="btn btn-primary" style="margin-bottom: -1px;" data-toggle="modal" data-target="#addAgentToTrain5"><span class='glyphicon glyphicon-plus'></span></button>
				New Agent Name:<span class="required">*</span><br><input type="text" readonly="readonly" class="form-control" name="newAgentName" style="width:170px" id="newAgentName" value="" ></br><br>

				<button type="button" class="btn btn-primary" style="margin-bottom: -1px;" data-toggle="modal" data-target="#addAgentToTrain5"><span class='glyphicon glyphicon-plus'></span></button>
				New Agent Training:<span class="required">*</span> <br><input type="text" class="form-control" name="newAgentTrainingName" style="width:170px" id="newAgentTrainingName" value=""></br><br>

				New Date: <span class="required">*</span><input type="date" class="form-control" name="newDate" style="width:170px" id="newDate" value="">

			</div>
			<form method="post" action="<?php $_PHP_SELF ?>">
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary" id="ButtonUpdate" name="ButtonUpdate"><i class="fa fa-plus"></i>&nbsp;&nbsp;Update</button>
			</div>
		</form>
			<div class="modal-footer">
			</div>
				</form>
		</div>
	</div>
</div>

<!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements--><!-- The Modal update requirements-->

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
	<script method="POST">
 		var table = document.getElementById('datatable-fixed-header');

	for(var counter = 1; counter < table.rows.length; counter++)
	{
		table.rows[counter].onclick = function()
		{;
			document.getElementById("newAgentName").value = this.celles[0].innerHTML;
			document.getElementById("newAgentTrainingName").value = this.celles[1].innerHTML;
			document.getElementById("newDate").value = this.celles[2].innerHTML;
			};
		}

		var table = document.getElementById('myTable');

	for(var counter = 1; counter < table.rows.length; counter++)
	{
		table.rows[counter].onclick = function()
		{;
			document.getElementById("agentName").value =this.cells[1].innerHTML;
			document.getElementById("contain1").value =this.cells[0].innerHTML;
			};
		}

		var table = document.getElementById('myTable5');

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
						$('#divnako').hide("highlight");
		if(!selected)
							$(this).addClass("highlight");
						$('#divnako').show("highlight");
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
	    $('#datatable-fixed-header2').DataTable( {
	        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
	    } );
	} );

$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );


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

		$('#divnako').show("highlight");

}
</script>
<?php 	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tgpdso_db";

	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

	if(mysqli_connect_error())
	{
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else {
		if(isset($_POST['apply']))
		{
			$ATagentID = $_POST['contain1'];
			$ATagentName= $_POST['agentName'];
			$ATtrainingName = $_POST['trainingNameko'];
			$ATtrainingPosition =  $_POST['contain2'];
			$ATdate = $_POST['DateAdded'];
			?>
			<?php
			$sql = "INSERT Into agentstraining (ATagentID, ATagentName, ATtrainingName, ATrequiredPosition, ATdate) values ('$ATagentID','$ATagentName','$ATtrainingName','$ATtrainingPosition', '$ATdate')";
		}
		if($conn->query($sql)===TRUE)
		{
			?>
			<script>
				alert('Agent successfully added to the training!');
				window.location = "add_agent_training.php";
			</script>
			<?php

		}
		else {
			echo "Error:". $sql."<br>".$conn->error;
		}
		$conn->close();
	}
	?>

	<!-- delete --><!-- delete --><!-- delete --><!-- delete --><!-- delete --><!-- delete --><!-- delete -->
	<?php
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "tgpdso_db";

	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
	?>
	<script>
		alert('haaayyynaaakooo!');
	</script>
	<?php
	if(mysqli_connect_error())
	{
		die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
	}
	else {
		if(isset($_GET['delete']))
		{
			$deleteATtrainingID =  $_GET['delete'];
			$sql = "DELETE from agentstraining WHERE ATagentTrainingID = '$deleteATtrainingID'";
		}
		if($conn->query($sql)===TRUE)
		{
			?>
			<script>
				alert('Agent successfully deleted the training!');
				window.location = "add_agent_training.php";
			</script>
			<?php
		}
		else {
			echo "Error:". $sql."<br>".$conn->error;
		}
		$conn->close();
	}

	?>
	<!-- delete --><!-- delete --><!-- delete --><!-- delete --><!-- delete --><!-- delete --><!-- delete --><!-- delete -->v
