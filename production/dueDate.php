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
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
													</div>
                          <div class="col-sm-12">

          <!-- table-striped dataTable-->

                            <table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username" style="width: 25px;text-align:center;">Policy #</th>
	                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Firstname" style="width: 200px;text-align:center;">Policy Owner</th>
                                  <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Plan</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Policy Status</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Issue Date</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Premium</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">modepayment</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Next Due</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 200px;text-align:center;">Agent</th>
																	<th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Action</th>
																</tr>
                              </thead>

                              <tbody>

                                  <?php
                                    $DB_con = Database::connect();
                                    $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $sql = "SELECT * FROM production, client, payment WHERE policyno = payment_policyNo and clientID = ProdClientID group by policyNo";

                                    $result = $DB_con->query($sql);
                                    if($result->rowCount()>0){
                                      while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                        ?>
																			  <tr>
                                          <td style="text-align:center" ><?php print($row['policyNo']); ?></td>
                                          <td style="text-align:center"><?php print($row['cLastname'].", ".$row['cFirstname']);?></td>
                                          <td style="text-align:center"><?php print($row['plan']); ?></td>
																					<td style="text-align:center"><?php print($row['policyStat']); ?></td>
																					<td style="text-align:center"><?php print($row['issuedDate']); ?></td>
																					<td style="text-align:center"><?php print($row['premium']); ?></td>
																					<td style="text-align:center"><?php print($row['modeOfPayment']); ?></td>
																					<td style="text-align:center"><?php print($row['payment_nextDue']); ?></td>
																					<td style="text-align:center"><?php print($row['agent']); ?></td>
																					<td style="text-align:center">
																						<div class="row">
																							<button  type="button" style='float:right' data-toggle="modal" data-target="#paymentModal" class="btn btn-primary" name="btn-addPlan" id=""><i class="fa fa-pencil" hidden></i>Update</button>
																						</div>
																					</td>
																					  </tr>
                                        <?php
                                      }
                                    }
                                    else{}
																			?>
																			<script>
																			var table = document.getElementById('datatable-fixed-header');
																			for(var counter = 1; counter < table.rows.length; counter++)
																			{
																				table.rows[counter].onclick = function()
																				{;
																				 document.getElementById("paymentPolicyNo").value = this.cells[0].innerHTML;
																				 document.getElementById("paymentIssueDate").value = this.cells[4].innerHTML;
																				 document.getElementById("paymentAmount").value = this.cells[5].innerHTML;
																				 document.getElementById("paymentmodeOfPayment").value = this.cells[6].innerHTML;
																					};
																				}
																			</script>
                                </tbody>
                            </table>
														<script>
														</script>

                        </div>
												<!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content -->
												<div id="paymentModal" name="paymentModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
																<h4 class="modal-title" id="myModalLabel2">Add Payment</h4>
															</div>
															<form method='post' name='myform' onsubmit="return check()">
																<?php
																	if(isset($_POST['paymentSaveButton'])){
																		tgpdso::addPaymentFromDueDate();
																	}
																?>
																<div class="modal-body">
																	<label class="control-label">
																	Policy #:
																	</label>
																 <input type="text" readonly="readonly" class="form-control" name="paymentPolicyNo" id="paymentPolicyNo">
																	<label class="control-label">
																	Amount:
																	</label>
																	<input  type="text" class="form-control" id="paymentAmount" name="paymentAmount">
																	<label class="control-label">
																	Issue Date:
																</label><input class="form-control" name="paymentIssueDate" id="paymentIssueDate" readonly><br>
																<label class="control-label">
																Mode of Payment:
															</label><input readonly='readonly' class="form-control" name="paymentmodeOfPayment" id="paymentmodeOfPayment" readonly><br>
															</label>
																</select><br>
																	<hr>
																	<label class="control-label">
																	Transaction Date:
																</label><input type="date" class="form-control" name="paymentTransDate" onchange ="test()" id="paymentTransDate"><br>
																	<label class="control-label">
																	OR #:
																</label><input type="text" class="form-control" name="paymentORNo" id="paymentORNo"><br>
																	<label class="control-label">
																	APR #:
																</label><input type="text" class="form-control" name="paymentAPR" id="paymentAPR"><br>
																	<label class="control-label">
																	Next Due Date:
																</label><input readonly="readonly" type="date" class="form-control" name="paymentNextDue" id="paymentNextDue"><br>
																 <br>
																</div>
																<div class="modal-footer">
																	<button type="submit" class="btn btn-primary" style="width: 100px;" onchange = "check()"name="paymentSaveButton" id="paymentSaveButton"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>

																</div>
																<!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content --><!-- /Update payment content -->
									<script>
									$premium_mode=document.getElementById('paymentmodeOfPayment');
									function countDueDate($policy_start_date,$months){
      						$next_due_date = strtotime($policy_start_date.' + '.$months.' Months');
        					if($next_due_date<time()){
            			return countDueDate(date('Y-m-d', $next_due_date), $months);
        					}else{
           				return  date('Y-m-d',$next_due_date);
        					}
    							}
									function getModeMonth($premium_mode ){
        					switch ($premium_mode){
            			case 'yearly':      $q=12;break;
            			case 'monthly':     $q=1;break;
            			case 'quarterly':   $q=3;break;
            			case 'half year':   $q=6;break;
            			default :           $q=12;break;
        					}
        						return $q;
    								}

								function test()
								{
									countDueDate();
									getModeMonth();
									$date=countDueDate(date('Y').'-'.date('m-d',strtotime($policy_start_date)), getModeMonth($premium_mode));
									document.getElementById('paymentAmount').value = $date.toString();
								}
								</script>

															</form>
														</div>
													</div>
													<?php
														?>

												</div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
				</form>
          <!-- /page content -->
    		</div>
    	</div>
    </form>
	<form>
	</form>
    <footer style="margin-bottom: -15px;">

				<center>
					<form method="post" action="<?php $_PHP_SELF ?>">

						<input type="text" name="username1" id="username1" hidden>

						<button type="submit" style="font-size: 10px; margin-bottom: -15px;" title="Edit Data" class="btn btn-primary" id="edit" name="edit" formnovalidate onclick="enableUpdateButton(); Random();" hide><i class="fa fa-pencil"/></i>&nbsp;&nbsp;&nbsp;Edit Data</button>
						<button type="submit" style="font-size: 10px; margin-bottom: -15px;" title="Delete Data" class="btn btn-primary" id="deleted" name="deleted" formnovalidate onclick="return confirm('Are you sure do you want to delete?')" hidden><i class="fa fa-trash-o"></i>&nbsp;&nbsp;&nbsp;Delete Data</button>

					</form><br>
					<div style="font-size: 8px;">

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
		} );</script>

		<!-- The Modal -->
  </body>
</html>
