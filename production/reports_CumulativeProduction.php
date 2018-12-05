<!DOCTYPE html>
<html lang="en">
<?php include 'base/header.php'; ?>
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<head>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <style type="text/css">


    /* width */
.scrollpage::-webkit-scrollbar {
    width: 1px;
}

/* Track */
.scrollpage::-webkit-scrollbar-track {
    background: #f1f1f1;
}

/* Handle */
.scrollpage::-webkit-scrollbar-thumb {
    background: #888;
}

/* Handle on hover */
.scrollpage::-webkit-scrollbar-thumb:hover {
    background: #555;
}

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
										<h2><b>Cumulative Production Report</b></h2>
											<div class="clearfix"></div>
									</div>
									<!--table content policy for adding requirements-->
								<div class="clearfix"></div>
								<div style="margin-left: 800px;">
									<button type="button" id="printButton" name="printButton" class="btn btn-primary" onclick="printable('tablePage')">Printable View</button>
								</div>
								<div class="x_title"></div>
              <div style="margin-left: 30px; margin-top: 20px;">
                <div style="margin-left: 10px"><b>Search</b></div>
                <input id="inputSearch" placeholder="Agent Name, Client Name, Code" name="inputSearch" class="form-control" style="width: 240px; margin-left: 10px;"/>
                <button type="button" id="searchButton" name="searchButton" class="btn btn-primary" style="margin-left: 255px; margin-top: -50px;"><i class="fa fa-search"></i></button>
              </div>

              <div style="margin-left: 760px; margin-top: -70px;">
                <div style="width: 200px; height: 60px;">
                <div style="margin-left: 10px"><b>Date</b></div>
                  <input id="inputDate" name="inputDate" type="date" class="form-control" style="width: 180px;margin-left: 10px"/>
              </div>
              </div>
                <div style="margin-left: 40px;">
                  <h5><b>Cumulative Production Report of (Date)</b></h5>
                </div>
                <div style="overflow-x: auto; width: 900px; margin-left: 40px;border-style: solid; border-width: 1px;" class="scrollpage">
                  <div id="tablePage" name="tablePage">
                  <table style="width: 1600px;" id="dataTable1" name="dataTable1" class="table table-bordered table-hover no-footer" role="grid">
                    <thead>
                      <tr role="row">
                        <th rowspan="2" class="sorting_asc" style="width: 150px;text-align:center;">Team</th>
                        <th rowspan="2" class="sorting" style="width: 200px;text-align:center;">Agent Name</th>
                        <th rowspan="2" class="sorting" style="width: 150px;text-align:center;">Agent Code</th>
                        <th colspan="3" scope="colgroup" class="sorting" style="text-align:center;">Submitted Policy</th>
                        <th colspan="3" scope="colgroup" class="sorting" style="text-align:center;">Issued Policy</th>
                        <th colspan="3" scope="colgroup" class="sorting" style="text-align:center;">Unissued Policy</th>
                      </tr>
                      <tr>

                        <th style="text-align:center;" scope="col">FYP</th>
                        <th style="text-align:center;" scope="col">FYC</th>
                        <th style="text-align:center;" scope="col">IC</th>

                        <th style="text-align:center;" scope="col">FYP</th>
                        <th style="text-align:center;" scope="col">FYC</th>
                        <th style="text-align:center;" scope="col">IC</th>

                        <th style="text-align:center;" scope="col">FYP</th>
                        <th style="text-align:center;" scope="col">FYC</th>
                        <th style="text-align:center;" scope="col">IC</th>
                      </tr>
                    </thead>
                    <tbody>
                              <tr>
                                <td width="50"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
    <script	src="	https://code.jquery.com/jquery-3.3.1.js"></script>
		<script	src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script	src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>


  </body>
</html>



<script>

// $(document).ready(function() {
//     $('#dataTable1').DataTable( {
//         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
//     } );
// } );

	function printable(el)
	{
		var getPage = document.body.innerHTML;
		var printContent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printContent;
		window.print();
		document.body.innerHTML = getPage
	}
</script>
