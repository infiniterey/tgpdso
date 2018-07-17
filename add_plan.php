<?php
	include 'confg.php';
	include 'pdo.php';
	include_once 'createdb.php';
?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'base/header.php'; ?>
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

  					<br />

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
        <div class="right_col" role="main" style="min-height: 6026px;">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <form method="post" name="myform" onsubmit="CheckForm()" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <?php
                  if(isset($_POST['btn-save'])){
                    tgpdso::addAgent();
                  }
                ?>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><b>ADD AGENT</b></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br>

											<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
															<h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
														</div>
														<form method='post' name='myform' onsubmit="CheckForm()">
															<div class="modal-body">

																<div class="row">
																	<div class="col-md-3">

																<?php
																	if(isset($_POST['btn-addPlan'])){
																		tgpdso::addPlan();
																	}
																?>
																Plan Code: <input id="planCode" type="text" class="form-control" name="planCode"><br>
																Plan Description: <input id="planDesc" type="text" class="form-control" name="planDesc">
																Plan Rate: <input id="planRate" type="text" class="form-control" name="planRate">

																</div>

																<div class="col-md-8">


																	<table id="datatable-fixed-header1" align="right" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
																		<thead>
																			<tr role="row">
																				<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Plan Code" style="width: 15px;text-align:center;">Plan Code</th>
																					<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Description" style="width: 155px;text-align:center;">Plan Description</th>
																				<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Rate" style="width: 35px;text-align:center;">Plan Rate</th>

																			</tr>
																		</thead>



																		<tbody>

																				<?php
																					$DB_con = Database::connect();
																					$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																					$sql = "SELECT * FROM plans";

																					$result = $DB_con->query($sql);
																					if($result->rowCount()>0){
																						while($row=$result->fetch(PDO::FETCH_ASSOC)){
																							?>
																							<tr>
																								<td><?php print($row['planCode']); ?></td>
																								<td><?php print($row['planDesc']); ?></td>
																								<td><?php print($row['planRate']); ?></td>

																							</tr>
																							<?php
																						}
																					}
																					else{}
																				?>
																			</tbody>
																	</table>


																	<script>


																		var table = document.getElementById('datatable-fixed-header1');
																		for(var counter = 1; counter < table.rows.length; counter++)
																		{
																			table.rows[counter].onclick = function()
																			{;
																			 document.getElementById("planCode").value = this.cells[0].innerHTML;
																			 document.getElementById("planC").value = this.cells[0].innerHTML;
																			 document.getElementById("planDesc").value = this.cells[1].innerHTML;
																			 document.getElementById("planRate").value = this.cells[2].innerHTML;
																			 document.getElementById("plan").value = this.cells[0].innerHTML;

																				};
																			}

																			</script>

																</div>
															</div>

															</div>
															<div class="modal-footer">
																										<div>
																		<div class="row">
																			<div class="col-md-11">
																				<input type="text" name="planC" id="planC" hidden>
																				<button type="submit" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
																				<button type="reset" class="btn btn-default" name="cancel" id="cancel" onclick="ClickCancel()">Cancel</button>
																		  </div>
																	<form method="post" action="<?php $_PHP_SELF ?>">

																	<div class="col-md-6">
																		<button type="submit" id="ModalEdit"  name="ModalEdit" class="btn btn-primary" formnovalidate><i class="fa fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;</i>Update Plan</button>
																	</div>
																<div class="col-md-1">
																		<button type="submit" id="ModalDelete" name="ModalDelete" class="btn btn-primary" onclick="return confirm('Are you sure do you want to delete this plan?')" formnovalidate><i class="fa fa-trash">&nbsp;&nbsp;&nbsp;&nbsp;</i>Delete Plan</button>
																</div>
																		</div>
																	</div>
																</form>

																	</div>
															</div>
														</form>
													</div>
												</div>


                    </div>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="add_production.php" class="btn btn-primary"><i class="fa fa-close"></i>&nbsp;Cancel</a>
                          <button type="submit" class="btn btn-success" name="btn-save"><i class="fa fa-check"></i>&nbsp;Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- /page content -->
  		</div>
  	</div>

    <footer>
      <div class="pull-right">
        COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
      </div>
      <div class="clearfix"></div>
    </footer>

    <?php include 'java.php';?>
  </body>
</html>
