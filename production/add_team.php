	<?php
	include 'confg.php';
	include 'pdo.php';
	include_once 'createdb.php';

session_start();
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


<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<style>
.highlight { background-color: lightgreen; color: green}
#formko1{display:none}

.scrollbar{
	height: 100%;
	width: 100%;
	overflow: auto;
}
::-webkit-scrollbar {
    width: 1px;
}

</style>
<!DOCTYPE html>
<html lang="en">
	<?php include 'base/header.php'; ?>
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

  					<!-- sidebar menu -->
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
				<form method="POST" >
					<?php
						if(isset($_POST['btn-save'])){
							tgpdso::addTeam();
						}
					?>
				<div class="right_col" role="main">
					<div class="">
						<div class="clearfix"></div>
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_title">
										<h2><b>Add Team</b></h2>
										<div class="clearfix"></div>
									</div>
										<div id="datatable-fixed-header_wrapper"  class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<div class="row">
												<div class="col-sm-3">
																Team ID<span class="required">*</span>
																<input type="text" name="teamid" required="required" class="form-control" required><br>
																Team Name<span class="required">*</span>
																<input type="text" style="margin-bottom:50px" name="teamname" required="required" class="form-control" required><br>
																<center>
			                          <a href="add_production.php"  style="float:left"class="btn btn-primary"><i class="fa fa-close"></i>&nbsp;Cancel</a>
	                             <button	style="float:left" type="submit" class="btn btn-success" name="btn-save"><i class="fa fa-check"></i>&nbsp;Save</button>
													</div>
												<div class="col-sm-9">
													<style>

													</style>

													</form>
														<table id="datatable-fixed-header" class="table table-bordered dataTable table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info">
														<thead>
															<tr role="row">
																<th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 15px;text-align:center;">Team ID</th>
																	<th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 155px;text-align:center;">Team Name</th>
																</tr>
														</thead>
														<tbody>
															<?php
																$DB_con = Database::connect();
																$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
																$sql = "SELECT * FROM team";

																$result = $DB_con->query($sql);
																if($result->rowCount()>0){
																	while($row=$result->fetch(PDO::FETCH_ASSOC)){
																		?>
																		<tr>
																			<td><?php print($row['teamID']); ?></td>
																			<td><?php print($row['teamName']); ?></td>
																		</tr>
																		<?php
																	}
																}
																else{}
															?>

															</tbody>
													</table>
													<script>
															var table = document.getElementById('datatable-fixed-header');

															for(var counter = 1; counter < table.rows.length; counter++)
															{
																table.rows[counter].onclick = function()
																{;
																 document.getElementById("inputvaluedelete3").value =this.cells[0].innerHTML;
																	};
																}
																</script>

																<script>
																$("#datatable-fixed-header tr").click(function()
																 {
																	var selected = $(this).hasClass("highlight");
																	$("#datatable-fixed-header tr").removeClass("highlight");
																$('#formko1').show("highlight");
																if(!selected)
																$(this).addClass("highlight");
																$('#formko1').hide();
															});

																function showForm()
															{
																$('#formko1).show()');
															}
															function hideForm()
															{
																$('#formko1').hide();
															}
															</script>
													</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>
    	</div>
  	</div>

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
$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>
