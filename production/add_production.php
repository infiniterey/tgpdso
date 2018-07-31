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
        <div class="right_col" role="main" style="min-height: 6026px;">
          <div class="">
            <div class="clearfix"></div>

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Add new plan</h4>
                  </div>
                  <form method='post' name='myform' onsubmit="CheckForm()">
                    <div class="modal-body">
                      <?php
                        if(isset($_POST['btn-addPlan'])){
                          tgpdso::addPlan();
                        }
                      ?>
                      Plan Code: <input type="text" class="form-control" name="planCode"><br>
                      Plan Description: <input type="text" class="form-control" name="planDesc">
                      Plan Rate: <input type="text" class="form-control" name="planRate">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" name="btn-addPlan"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="row">
              <form method="post" name="myform" onsubmit="CheckForm()" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                <?php
                  if(isset($_POST['btn-save'])){
                    tgpdso::addProduction();
                  }
                ?>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2><b>ADD PRODUCTION</b></h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Transaction Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="transDate" class="date-picker form-control col-md-7 col-xs-12 parsley-success" required="required" type="date" data-parsley-id="16" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Name of Insured <span class="required">*</span>
                        </label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" placeholder="Firstname" name="firstname" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" placeholder="Lastname" name="lastname" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Policy No. <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="policyNo" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm"><span class='glyphicon glyphicon-plus'></span></button>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Plan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="plan" class="select2_gender form-control" tabindex="-1">
                            <?php tgpdso::dropdown_plans(); ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Official Receipt No.
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="receiptNo" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Face Amount
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="faceAmount" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Premium <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="premium" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Rate <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="rate" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Mode of Payment <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="modeOfPayment" class="select2_gender form-control" tabindex="-1">
                            <option value="Monthly">Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Semi-Annual">Semi-Annual</option>
                            <option value="Annualy">Annualy</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Agent <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="agent" required="required" class="form-control col-md-7 col-xs-12" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Remarks <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="remarks" class="select2_gender form-control" tabindex="-1">
                            <option value="New">New</option>
                            <option value="FYP">FYP</option>
                            <option value="RYP">RYP</option>
                          </select>
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
