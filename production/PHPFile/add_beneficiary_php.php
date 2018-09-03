<?php
include 'PHPFile/Connection_Database.php';

      if(mysqli_connect_error())
      {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
      }
      else
      {
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


          $query = "SELECT * from beneficiary, production WHERE policyNo = bene_policyNo AND policyNo = '$add'";
          $data = mysqli_query($conn, $query);
          $result = mysqli_num_rows($data);
          if($result == 0)
          {
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
          else if($result == 1)
          {
            $sql = "UPDATE beneficiary
            SET bene_policyNo = '$add',
            bene_lastName = '$beneLastname',
            bene_firstName = '$beneFirstname',
            bene_middleName = '$beneMiddlename',
            bene_birthDate = '$beneBirthday',
            bene_address = '$beneAddress',
            bene_contactNo = '$beneContact',
            bene_relationShip = '$beneRelationship'
            WHERE bene_policyNo = '$add' AND bene_contactNo = '$beneContact'";

            if($conn->query($sql))
            {
              ?>
              <script>
                alert("Update record production successfully added");
                window.location = "records.php?edit=<?php echo $add ?>";
                </script>
                <?php
            }
            else {
              echo "Error:". $sql."<br>".$conn->error;
            }
            $conn->close();
          }
          else {
            ?><script>alert('Does not connect or input is incorrect!');</script><?php
          }

				$conn->close();
      }
      else if(isset($_GET['editBene']) && isset($_GET['number']))
      {
      $edit = $_GET['editBene'];
      $number = $_GET['number'];

        $result=mysqli_query($conn,"SELECT * from production, client, beneficiary, policystatus WHERE policyStat = policyID AND clientID = prodclientID AND bene_policyNo = policyNo AND policyNo = '$edit' AND bene_ID = '$number'");

        $query = "SELECT * from insuredpolicy, production WHERE policyNo = insured_policyNo AND policyNo = '$edit'";
        $data = mysqli_query($conn, $query);
        $result = mysqli_num_rows($data);
        if($result == 1)
        {
          $sql=mysqli_query($conn,"SELECT * FROM production, plans, client, beneficiary, policystatus, insuredpolicy WHERE plan = planID AND insured_policyNo = policyNo AND policyStat = policyID AND clientID = prodclientID AND bene_policyNo = policyNo AND policyNo = '$edit' AND bene_ID = '$number'");
          while($row=mysqli_fetch_Array($sql))
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
          <script> document.getElementById('policyDueDate').value = '<?php echo $row['dueDate'];?>';</script>
          <script> document.getElementById('planName').value = '<?php echo $row['planCode'];?>';</script>

          <script> document.getElementById('beneLastName').value = '<?php echo $row['bene_lastName'];?>';</script>
          <script> document.getElementById('beneFirstName').value = '<?php echo $row['bene_firstName'];?>';</script>
          <script> document.getElementById('beneMiddleName').value = '<?php echo $row['bene_middleName'];?>';</script>
          <script> document.getElementById('beneBirthday').value = '<?php echo $row['bene_birthDate'];?>';</script>
          <script> document.getElementById('beneAddress').value = '<?php echo $row['bene_address'];?>';</script>
          <script> document.getElementById('beneContact').value = '<?php echo $row['bene_contactNo'];?>';</script>
          <script> document.getElementById('beneRelationship').value = '<?php echo $row['bene_relationShip'];?>';</script>

          <script> document.getElementById('clientToRetrieve').value = '<?php echo $row['clientID'];?>';</script>
          <script> document.getElementById('policyStatusSelect').value = '<?php echo $row['policyID'];?>';</script>
          <script>document.getElementById("fundButton").disabled = false;</script>

          <script> document.getElementById('insuredLastName').value = '<?php echo $row['insured_lastName'];?>';</script>
          <script> document.getElementById('insuredFirstName').value = '<?php echo $row['insured_firstName'];?>';</script>
          <script> document.getElementById('insuredMiddleName').value = '<?php echo $row['insured_middleName'];?>';</script>
          <script> document.getElementById('insuredBirthdate').value = '<?php echo $row['insured_birthdate'];?>';</script>
          <script> document.getElementById('insuredAddress').value = '<?php echo $row['insured_address'];?>';</script>
          <script> document.getElementById('insuredContactno').value = '<?php echo $row['insured_contactNo'];?>';</script>
          <?php
          }
          $conn->close();
        }
        else if($result == 0)
        {
          $sql=mysqli_query($conn,"SELECT * FROM production, client, beneficiary, policystatus WHERE policyStat = policyID AND clientID = prodclientID AND bene_policyNo = policyNo AND policyNo = '$edit' AND bene_ID = '$number'");
          while($row=mysqli_fetch_Array($sql))
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

          <script> document.getElementById('beneLastName').value = '<?php echo $row['bene_lastName'];?>';</script>
          <script> document.getElementById('beneFirstName').value = '<?php echo $row['bene_firstName'];?>';</script>
          <script> document.getElementById('beneMiddleName').value = '<?php echo $row['bene_middleName'];?>';</script>
          <script> document.getElementById('beneBirthday').value = '<?php echo $row['bene_birthDate'];?>';</script>
          <script> document.getElementById('beneAddress').value = '<?php echo $row['bene_address'];?>';</script>
          <script> document.getElementById('beneContact').value = '<?php echo $row['bene_contactNo'];?>';</script>
          <script> document.getElementById('beneRelationship').value = '<?php echo $row['bene_relationShip'];?>';</script>

          <script> document.getElementById('clientToRetrieve').value = '<?php echo $row['clientID'];?>';</script>
          <script> document.getElementById('policyStatusSelect').value = '<?php echo $row['policyID'];?>';</script>
          <script>document.getElementById("fundButton").disabled = false;</script>
          <?php
          }
          $conn->close();
        }
      }
      else if(isset($_GET['deleteBene']) && isset($_GET['number'])&&isset($_GET['name']))
      {
        $delete = $_GET['deleteBene'];
        $number = $_GET['number'];
        $name = $_GET['name'];


          $sql = "DELETE FROM beneficiary WHERE bene_policyNo = '$delete' AND bene_ID = '$number' AND bene_lastName = '$name'";

          if($conn->query($sql))
          {
            ?>
            <script>
              alert("delete record production successfully added");
              window.location = "records.php?edit=<?php echo $delete ?>";
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
