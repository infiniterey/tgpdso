<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
  <style type="text/css" media="print">
  /* @page { size: landscape; } */
  @media print
  {
    @page
    {
      size: legal landscape;
    }
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
	      <!-- /top navigation -->

        <!-- page content -->

				<div class="right_col" role="main">
		  		<div class="clearfix">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>Due Date Report</b></h2>
											<div class="clearfix"></div>
									</div>
									<!--table content policy for adding requirements-->
								<div class="clearfix"></div>
								<div style="margin-left: 800px;">
									<button type="button" id="printButton" name="printButton" class="btn btn-primary" onclick="printable('printContent1')">Printable View</button>
								</div>
								<div class="x_title"></div>
								<div id="printContent1" style="border-style:solid;width: 980px;">
									<div>
										<img src="images/logowidthresize.png" alt="TGP Logo" >
									</div>

									<div style="margin-left: 350px;margin-top: -80px;color:blue;">
										Sample sample Sample sample Sample sample Sample sampleSample sampleSample</br>
										sampleSample sampleSample sampleSample sampleSample sampleSample sampleSample<br>
										 Sample sampleSample sampleSample sampleSample samplesampleSample sample</div>

										 <div style="margin-top: 50px;">
                       <table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
                         <thead>
                           <tr role="row">
                             <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username" style="width: 50px;text-align:center;">Policy Owner</th>
                             <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Firstname" style="width: 25px;text-align:center;">Policy No.</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 50px;text-align:center;">Plan</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 50px;text-align:center;">M.O.P</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 50px;text-align:center;">Premium</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 50px;text-align:center;">Due Date</th>
                         </thead>

                         <tbody>

                             <?php
                               $DB_con = Database::connect();
                               $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                               $teamItSelf = $_SESSION["team"];
                               if($_SESSION["usertype"] == "Secretary" || $_SESSION["usertype"] == "secretary")
                               {
                                 $sql = "SELECT * FROM production, client, payment, plans, agents, team WHERE teamID = agentTeam AND agentCode = agent AND teamName = '$teamItSelf' AND planID = plan AND policyno = payment_policyNo and clientID = prodclientID AND dueDate = payment_nextDue";
                               }
                               else
                               {
                                 $sql = "SELECT * FROM production, client, payment, plans WHERE planID = plan AND policyno = payment_policyNo and clientID = prodclientID AND dueDate = payment_nextDue";
                               }

                               $result = $DB_con->query($sql);
                               if($result->rowCount()>0){
                                 while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                   $date1 = $row['payment_dueDate'];
                                   $dateR1 = date("m/d/Y", strtotime($date1));
                                   ?>
                                   <tr>
                                     <td style="text-align:center; width: 200px;"><?php print($row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']);?></td>
                                     <td style="text-align:center; width: 10px;"><?php print($row['policyNo']); ?></td>
                                     <td style="text-align:center; width: 10px;"><?php print($row['planCode']); ?></td>
                                     <td style="text-align:center; width: 20px;"><?php print($row['modeOfPayment']); ?></td>
                                     <td style="text-align:center; width: 20px;">Php&nbsp;<?php print($row['premium']); ?></td>
                                     <td style="text-align:center; width: 100px;"><?php echo $dateR1; ?></td>

                                       </tr>
                                   <?php
                                 }
                                 ?>
                                 <?php
                               }
                               else{}
                                 ?>
                           </tbody>
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
	function printable(el)
	{
		var getPage = document.body.innerHTML;
		var printContent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printContent;
		window.print();
		document.body.innerHTML = getPage
	}
</script>
