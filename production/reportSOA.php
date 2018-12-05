<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
	<style type="text/css" media="print">
	@media print
	{
		@page
		{
			size: legal landscape;
		}
	}

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
<script>
shortcut.add("ctrl+p", function(){
  var getPage = document.body.innerHTML;
  var printContent = document.getElementById("printContent1").innerHTML;
  document.body.innerHTML = printContent;
  $("printContent1")[0].contentWindow.print();
  document.body.innerHTML = getPage
  });
</script>
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
										<h2><b>SOA Report</b></h2>
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
                       <table id="datatable-fixed-header087" name="datatable-fixed-header087" align="center" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
                         <thead>
                           <tr role="row">
                             <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="TransactionDate" style="width: 15px;text-align:center;">Transaction Date</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyNo" style="width: 10px;text-align:center;">Policy No.</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PolicyOwner" style="width: 20px;text-align:center;">Policy Owner</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PaymentMode" style="width: 20px;text-align:center;">M.O.P</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Premium" style="width: 20px;text-align:center;">Premium</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Rate" style="width: 10px;text-align:center;">Rate</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Commission" style="width: 10px;text-align:center;">Commission</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Action" style="width: 50px;text-align:center;">SOA Date</th>
                             <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Agent" style="width: 50px;text-align:center;">Agent</th>
                           </tr>
                         </thead>
                         <tbody>

                           <?php
                             $DB_con = Database::connect();
                             $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                             $teamItSelf = $_SESSION["team"];
                             $userTypeItSelf = $_SESSION["usertype"];
                             if($_SESSION["usertype"] == "Secretary" || $_SESSION["usertype"] == "secretary")
                             {
                               $sql = "SELECT * FROM production, agents, client, team, soa WHERE SOA_policyNo = policyNo AND agentCode = agent AND agentTeam = teamID AND teamName = '$teamItSelf' AND agent = agentCode AND clientID = prodclientID";
                             }
                             else
                             {
                               $sql = "SELECT * FROM production, agents, client, soa WHERE SOA_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND clientID = SOA_policyOwner";
                             }
                             $result = $DB_con->query($sql);
                             if($result->rowCount()>0){
                               while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                 $originalDate = $row['SOA_transDate'];
                                 $payTransdate = date("m/d/Y", strtotime($originalDate));
                                 ?>
                                     <tr>
                                       <td><?php print($payTransdate); ?></td>
                                       <td><?php print($row['SOA_policyNo']); ?></td>
                                       <td><?php print($row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename']);?></td>
                                       <td><?php print($row['SOA_paymentMode']); ?></td>
                                       <td>Php&nbsp;<?php print($row['SOA_premium']); ?></td>
                                       <td><?php print($row['SOA_rate']); ?></td>
                                       <td>Php&nbsp;<?php print($row['SOA_commission']); ?></td>
                                       <td><?php print($row['SOA_date']." (".$row['SOA_selectMonth'].")");?></td>
                                       <td style="width: 50px;"><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
                                     </tr>
                                     <?php
                                   }
                                 }


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
