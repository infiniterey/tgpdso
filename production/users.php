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



<!DOCTYPE html>
<html lang="en">
<head>

</head>

<style type="text/css">

.highlight { background-color: lightgreen; color: green}
.highlightBack { background-color: white; color: gray}

.highlight1 { background-color: lightgreen; color: green}
.disablehighlight { background-color: transparent;}

#edit, #deleted{ display: none;}

.scrollbar{
 height: 100%;
 width: 100%;
 overflow: auto;
}
::-webkit-scrollbar {
		width: 1px;
}



</style>



	<?php include 'base/header.php'; ?>
  <body class="nav-md footer_fixed">
    <form method="post">
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
                      <h2><b>USERS</b></h2>

                      <div class="clearfix"></div>
                    </div>
                      <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
													<div class="col-sm-3">
															<form method="post" action="<?php $_PHP_SELF ?>">
				                          Username: <span class="required">*</span>
				                          <input name="username" id="username" style="width: 195px;" class="date-picker form-control" required="required" type="text" required readonly><br/>
				                          First Name: <span class="required">*</span>
				                          <input type="text" id="firstname" placeholder="" name="firstname" required="required" class="form-control" required disabled><br/>
																  Last Name: <span class="required">*</span>
				                          <input type="text" id="lastname" placeholder="" name="lastname" required="required" class="form-control" required disabled><br/>
																	New Password: <span class="required">*</span>
																	<input type="text" id="npassword" placeholder="" name="npassword" required="required" class="form-control" value="" maxlength="25" required><br/>
																	<br><br>
																	<center>



																		<button type="submit" class="btn btn-primary" id="update" name="update"><i class="fa fa-file-text"></i>&nbsp;&nbsp;Update</button>
																		<button type="reset" id="reset" name="reset" value="Reset" class="btn btn-default" onclick="disableUpdateButton()">Cancel</button>

																	</center>
																</form>
														</div>
                          <div class="col-sm-9">

          <!-- table-striped dataTable-->

                            <table id="datatable-fixed-header" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
                              <thead>
                                <tr role="row">
                                  <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username" style="width: 25px;text-align:center;">Username</th>
	                                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Firstname" style="width: 100px;text-align:center;">First Name</th>
                                  <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Lastname" style="width: 100px;text-align:center;">Last Name</th>

																</tr>
                              </thead>

                              <tbody>

                                  <?php
                                    $DB_con = Database::connect();
                                    $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                                    $sql = "SELECT * FROM users";

                                    $result = $DB_con->query($sql);
                                    if($result->rowCount()>0){
                                      while($row=$result->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                        <tr>
                                          <td><?php print($row['username']); ?></td>
                                          <td><?php print($row['ufirstname']);?></td>
                                          <td><?php print($row['ulastname']); ?></td>
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
																{

																 document.getElementById("username1").value = this.cells[0].innerHTML;

																	};
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

						<button type="submit" style="font-size: 10px; margin-bottom: -15px;" title="Edit Data" class="btn btn-primary" id="edit" name="edit" formnovalidate hide><i class="fa fa-pencil"/></i>&nbsp;&nbsp;&nbsp;Edit Data</button>
						<button type="submit" style="font-size: 10px; margin-bottom: -15px;" title="Delete Data" class="btn btn-primary" id="deleted" name="deleted" formnovalidate onclick="return confirm('Are you sure do you want to delete?')" hidden><i class="fa fa-trash-o"></i>&nbsp;&nbsp;&nbsp;Delete Data</button>

					</form><br>
					<div style="font-size: 8px;">

        COPYRIGHT 2018 | TGP DISTRICT SALES OFFICE
			</div>
			</center>
    </footer>

    <?php include 'java.php'; ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


		<!-- The Modal -->
  </body>
</html>



<script>


$("#datatable-fixed-header tr").click(function() {
	var selected = $(this).hasClass("highlight");
	$("#datatable-fixed-header tr").removeClass("highlight");
				  $('#edit, #deleted').hide("highlight");
	if(!selected)
						$(this).addClass("highlight");
					$('#edit, #deleted').show("highlight");
});

$(document).on("dblclick","#datatable-fixed-header tr",function() {
						$('#edit, #deleted').hide();
							$("#datatable-fixed-header tr").removeClass("highlight1");
});


</script>

<script>


		function ClickCancel()
		{
			$('#deleted, #edit').hide("highlight1");
		}

		}


		function showButtons()
		{

				$('#edit, #deleted').show("highlight");

		}

		function hideButtons()
		{

				$('#edit, #deleted').hide("highlight");

		}




</script>



<script>

function myFunction() {

  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable-fixed-header");
  tr = table.getElementsByTagName("tr");


  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );



function disableUpdateButton()
{
				document.getElementById("username1").value = "";
				$('#edit, #deleted').hide("highlight");
}

</script>




<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tgpdso_db";


$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);


if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else {
	if(isset($_POST['update']))
	{

		$userName = $_POST['username'];
		$password = $_POST['npassword'];



		$sql = "UPDATE users SET password = '$password' WHERE username = '$userName'";


		if($conn->query($sql))
		{
			?>
			<script>
				alert("User is updated.");
				window.location="users.php";
				</script>
				<?php
		}
		else {
			echo "Error:". $sql."<br>".$conn->error;
		}
		$conn->close();
	}
	}
?>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgpdso_db";


$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
		die("Connection failed:" .$conn->connect_error);
}
else {
	if(isset($_POST['deleted']))
	{

		$username1 = $_POST['username1'];

		$sql = "DELETE FROM users WHERE username = '$username1'";

		if($conn->query($sql) === TRUE)
		{
			?>
			<script>
			window.location="users.php";
			</script>
			<?php
		}
		else {
			echo "Error Deleting" .$conn->error;;
		}
		$conn->close();
	}
}
?>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tgpdso_db";

$conn = new mysqli ($servername, $username, $password, $dbname);

if(mysqli_connect_error())
{
	die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else
{
		if(isset($_POST['edit']))
		{

				$username1 = $_POST['username1'];

					$result=mysqli_query($conn,"SELECT * from users WHERE username = '$username1'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('username').value = '<?php echo $row['username'];?>';</script>
						<script> document.getElementById('firstname').value = '<?php echo $row['ufirstname'];?>';</script>
						<script> document.getElementById('lastname').value = '<?php echo $row['ulastname'];?>';</script>
						<script> document.getElementById('npassword').value = Math.floor(Math.random() * 10000);</script>
						}

					<?php
				};
				$conn->close();
	}
}

?>
