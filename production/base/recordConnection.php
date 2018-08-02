

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
		if(isset($_GET['edit']))
		{
				$edit = $_GET['edit'];

					$result=mysqli_query($conn,"SELECT * from production, client WHERE clientID = prodclientID AND policyNo = '$edit'");

					while($row=mysqli_fetch_Array($result))
					{
						?>
						<script> document.getElementById('policyNoOwner').value = '<?php echo $row['policyNo'];?>';</script>
						<script> document.getElementById('lastname1').value = '<?php echo $row['cLastname'];?>';</script>
						<script> document.getElementById('firstname1').value = '<?php echo $row['cFirstname'];?>';</script>
						<script> document.getElementById('middlename1').value = '<?php echo $row['cMiddlename'];?>';</script>
						<script> document.getElementById('birthdate1').value = '<?php echo $row['cBirthdate'];?>';</script>
						<script> document.getElementById('address1').value = '<?php echo $row['cAddress'];?>';</script>
						<script> document.getElementById('contactno1').value = '<?php echo $row['cCellno'];?>';</script>

						<script> document.getElementById('policyPlan').value = '<?php echo $row['plan'];?>';</script>
						<script> document.getElementById('policyFaceAmount').value = '<?php echo $row['faceAmount'];?>';</script>
						<script> document.getElementById('policyMOP').value = '<?php echo $row['modeOfPayment'];?>';</script>
						<script> document.getElementById('policyIssueDate').value = '<?php echo $row['issuedDate'];?>';</script>
						<script> document.getElementById('policyPremium').value = '<?php echo $row['premium'];?>';</script>



					<?php
				}

			?>
			<script>

			</script>
			<?php
	}
}
?>

<!---      Table                 -->
<!---      Table                 -->
<!---      Table                 -->
<?php
  $host = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "tgpdso_db";

      $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else {
				if(isset($_POST['addBeneficiaryButton']))
				{
					$beneLastname = $_POST['beneLastName'];
					$beneFirstname = $_POST['beneFirstName'];
					$beneMiddlename = $_POST['beneMiddleName'];
					$beneBirthday = $_POST['beneBirthday'];
					$beneAddress = $_POST['beneAddress'];
					$beneContact = $_POST['beneContact'];
					$beneRelationship = $_POST['beneRelationship'];
					$add = $_POST['policyNoOwner'];


						$sql = "INSERT INTO beneficiary (bene_policyNo, bene_lastName, bene_firstName, bene_middleName, bene_birthDate, bene_address, bene_contactNo, bene_relationShip)
						values ('$add','$beneLastname','$beneFirstname','$beneMiddlename','$beneBirthday','$beneAddress','$beneContact','$beneRelationship')";

						if($conn->query($sql))
						{
							?>
							<script>
								alert("New record production successfully added");
								window.location = "records.php?edit=<?php echo $add ?>";
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







<script>
window.onload = function () {
								startTab();
							};

function startTab() {
								document.getElementById("defaultOpen").click();
							}

function openPolicy(evt, tabName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the link that opened the tab
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

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
						$(document).ready(function() {
								$('#datatable-fixed-header1').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

					function boxChecked() {
  					var checkBox = document.getElementById("box");
  					var firstname = document.getElementById("firstname1").value;
						var lastname = document.getElementById("lastname1").value;
						var middlename = document.getElementById("middlename1").value;
						var birthdate = document.getElementById("birthdate1").value;
						var address = document.getElementById("address1").value;
						var contactno = document.getElementById("contactno1").value;


  						if (checkBox.checked == true)
								{
									document.getElementById("insuredLastName").value = lastname;
									document.getElementById("insuredFirstName").value = firstname;
									document.getElementById("insuredMiddleName").value = middlename;
									document.getElementById("insuredBirthdate").value = birthdate;
									document.getElementById("insuredAddress").value = address;
									document.getElementById("insuredContactno").value = contactno;
  							}
								else
									{
										document.getElementById("insuredLastName").value = "";
										document.getElementById("insuredFirstName").value = "";
										document.getElementById("insuredMiddleName").value = "";
										document.getElementById("insuredBirthdate").value = "";
										document.getElementById("insuredAddress").value = "";
										document.getElementById("insuredContactno").value = "";
  								}
								}

								$(document).ready(function() {
								    $('#datatable-fixed-header2').DataTable( {
								        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								    } );
								} );

</script>
