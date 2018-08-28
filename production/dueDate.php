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

          <!-- page content -->
<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->

<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->		<!-- The Modal -->

					</div>
					<form method="post" style="margin-top: 40px;">
          <div class="right_col" role="main">
            <div class="">
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><b>DUE DATE</b></h2>
                      <div class="clearfix"></div>
                    </div>
										<ul>
										<div cellpadding=100 border= 1 style='float:center' id="datatable-fixed-header_wrapper" class="form-form">
											<div class="row">
												<div class="col-md-push-5">
													<style>
														table tr:not(:first-child){
															cursor:pointer;transition: all .25s	ease-in-out;
														}
													</style>
													<form>
														<!--<h4 style="float:center"><input type="text" name="searchT" id="searchT" placeholder="Search Policy"></input>-->
												 <!--<button type="button" name="buttonshowall" id="buttonshowall" class="fa fa-search btn btn-success"	  data-toggle="modal" data-target="#myModal" id="myBtn"></button></h4>-->
											 </form>
											 </div>
										 </div>
									 </div>
								 </ul>
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
													</div>
                          <div class="col-sm-12">

          <!-- table-striped dataTable-->

                            <table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username" style="width: 200px;text-align:center;">Policy Owner</th>
	                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Firstname" style="width: 25x;text-align:center;">Policy No.</th>
                                  <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Plan</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">M.O.P</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Premium</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Due Date</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 25px;">Action</th>
                              </thead>

                              <tbody>

                                  <?php
                                    $DB_con = Database::connect();
                                    $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $sql = "SELECT * FROM production, client, payment, plans WHERE planID = plan AND policyno = payment_policyNo and clientID = prodclientID";

                                    $result = $DB_con->query($sql);
                                    if($result->rowCount()>0){
                                      while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                        ?>
																			  <tr>
																					<td style="text-align:center"><?php print($row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']);?></td>
                                          <td style="text-align:center" ><?php print($row['policyNo']); ?></td>
                                          <td style="text-align:center"><?php print($row['planCode']); ?></td>
																					<td style="text-align:center"><?php print($row['modeOfPayment']); ?></td>
																					<td style="text-align:center"><?php print($row['premium']); ?></td>
																					<td style="text-align:center"><?php print($row['payment_nextDue']); ?></td>
																					<td style="text-align:center">
																						<div class="row">
																							<button  type="button" style='float:right' data-toggle="modal" data-target="#paymentModal" class="btn btn-primary" name="duedatebutton" id="duedatebutton" disabled title="Temporary disabled"><i class="glyphicon glyphicon-copy"></i>&nbsp;Edit</button>
																						</div>
																					</td>
																					  </tr>
                                        <?php
                                      }
                                    }
                                    else{}
																			?>
                                </tbody>
                            </table>
														<script>
														</script>

                        </div>
												<!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content -->
												<div id="paymentModal" name="paymentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
													<?php include 'add_payment.php';?>
												</div>

															</form>
														</div>
													</div>
													<?php
														?>

                      </div>
                    </div>
                  </div>
                </div>
				</form>
          <!-- /page content -->
    </form>
		<div class="modal fade" id="myModal">
			<?php include 'PHPFile/searchPolicy_DueDate.php'; ?>
	</div>
	<form>
	</form>
    <footer>

				<center>
					<div>
        COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
			</div>
			</center>
    </footer>

    <?php include 'java.php'; ?>

		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script>
		$(document).ready(function() {
		    $('#datatable-fixed-header').DataTable( {
		        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
		    } );
		} );
		$(document).ready(function() {
				$('#datatable-fixed-header0').DataTable( {
						"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
				} );
		} );
	</script>

		<!-- The Modal -->
  </body>
</html>
<?php include 'PHPFile/dueDateConnection.php'; ?>
