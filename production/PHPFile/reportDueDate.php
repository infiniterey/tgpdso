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
										<h2><b>Records Report</b></h2>
											<div class="clearfix"></div>
									</div>
									<!--table content policy for adding requirements-->
								<div class="clearfix"></div>
								<div style="margin-left: 800px;">
									<button type="button" id="printButton" name="printButton" class="btn btn-primary" onclick="printable('printContent1')">Printable View</button>
								</div>
								<div class="x_title"></div>
								<div id="printContent1" style="border-style:solid;width: 900px;">
									<div>
										<img src="images/logowidthresize.png" alt="TGP Logo" >
									</div>

									<div style="margin-left: 350px;margin-top: -80px;color:blue;">
										Sample sample Sample sample Sample sample Sample sampleSample sampleSample</br>
										sampleSample sampleSample sampleSample sampleSample sampleSample sampleSample<br>
										 Sample sampleSample sampleSample sampleSample samplesampleSample sample</div>

										 <div style="margin-top: 50px;">
										 		<table name="datatable-fixed-header1" id="datatable-fixed-header1" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
												<thead>
												<tr role="row">
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Trans. Date</th>
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Remarks: activate to sort column ascending" style="width: 30px;text-align:center;">Remarks</th>
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="MOP: activate to sort column ascending" style="width: 10px;text-align:center;">M.O.P</th>
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">Due Date</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">Next Due Date</th>
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="OR NO: activate to sort column ascending" style="width: 30px;text-align:center;">O.R.#</th>
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="APR No.: activate to sort column ascending" style="width: 30px;text-align:center;">APR#</th>
														<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Premium: activate to sort column ascending" style="width: 30px;text-align:center;">Premium</th>
															<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Due Date: activate to sort column ascending" style="width: 30px;text-align:center;">SOA date</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$DB_con = Database::connect();
													$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
													$sql = "SELECT * FROM payment, production WHERE payment_policyNo = policyNo ORDER BY payment_ID DESC";
													$currentDate = '';
													$previousDate = '';

												$result = $DB_con->query($sql);
												if($result->rowCount()>0)
												{
													while($row=$result->fetch(PDO::FETCH_ASSOC))
													{
														$date0 = $row['payment_transDate'];
														$date1 = $row['payment_dueDate'];
														$date2 = $row['payment_nextDue'];
														$date3 = $row['payment_soaDate'];
														$dateR0 = date("m/d/Y", strtotime($date0));
														$dateR1 = date("m/d/Y", strtotime($date1));
														$dateR2 = date("m/d/Y", strtotime($date2));
														$dateR3 = date("m/Y", strtotime($date3));
																?>
															<tr>
																<td><?php echo $dateR0; ?></td>
																<?php
																if($row['payment_remarks_year'] == '1' && $row['payment_remarks_month'] == '1')
																{
																	?>
																		<td style="width: 10px;"><?php echo $row['payment_remarks']; ?></td>
																	<?php
																}
																else
																{
																	if($row['payment_MOP'] == "Monthly")
																	{
																		?>
																		<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and ".$row['payment_remarks_month']." month(s)"; ?></td>
																		<?php
																	}
																	else if($row['payment_MOP'] == "Quarterly")
																	{
																		if($row['payment_remarks_month'] == "1")
																		{
																			?>
																				<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and 1 quarterly"; ?></td>
																			<?php
																		}
																		else
																		{
																		?>
																			<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and ".$row['payment_remarks_month'] / "3"." quarterly"; ?></td>
																		<?php
																		}
																	}
																	else if($row['payment_MOP'] == "Semi-Annual")
																	{
																		if($row['payment_remarks_month'] == "1")
																		{
																			?>
																				<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and 1 SA"; ?></td>
																			<?php
																		}
																		else
																		{
																		?>
																			<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s) and ".$row['payment_remarks_month'] / "6"." SA"; ?></td>
																		<?php
																		}
																	}
																	else if($row['payment_MOP'] == "Annual")
																	{
																		?>
																		<td style="width: 10px;"><?php echo $row['payment_remarks_year']." year(s)"; ?></td>
																		<?php
																	}
																}
																?>
																<td style="width: 10px;"><?php echo $row['payment_MOP']; ?></td>
																<td><?php echo $dateR1; ?></td>
																<td><?php echo $dateR2; ?></td>
																<td style="width: 10px;"><?php echo $row['payment_OR']; ?></td>
																<td style="width: 10px;"><?php echo $row['payment_APR']; ?></td>
																<td style="width: 20px;">Php&nbsp;<?php echo $row['premium'] ?></td>
																<td>
																		<?php
																		if(!empty($row['payment_soaDate']))
																		{
																			echo $dateR3;
																		}
																		?>
																</td>
														 </tr>
																<?php
															}
															?>
															<?php
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
