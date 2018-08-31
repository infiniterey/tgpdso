<?php
	include_once 'confg.php';

	class tgpdso
	{
		public function addProduction(){
			$transDate = $_POST['transDate'];
			$lastname = $_POST['lastname'];
			$firstname = $_POST['firstname'];
			$policyNo = $_POST['policyNo'];
			$plan = $_POST['plan'];
			$premium = $_POST['premium'];
			$receiptNo = $_POST['receiptNo'];
			$faceAmount = $_POST['faceAmount'];
			$rate = $_POST['rate'];
			$modeOfPayment= $_POST['modeOfPayment'];
			$agent = $_POST['agent'];
			$remarks = $_POST['remarks'];

			try {
        $DB_con = Database::connect();
        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO production(transDate, lastName, firstName, policyNo, plan, premium, receiptNo, faceAmount, rate, modeOfPayment, agent, remarks) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $q = $DB_con->prepare($sql);
        $q->execute(array($transDate,$lastname,$firstname,$policyNo,$plan,$premium,$receiptNo,$faceAmount,$rate,$modeOfPayment,$agent,$remarks));

        ?>
        <script>
          window.location = 'add_production.php'
        </script>
        <?php
      }
      catch (PDOException $msg) {
        die("Connection Failed : " . $msg->getMessage());
      }
		}

		public function dropdown_plans() {
      $DB_con = Database::connect();
      $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $result = $DB_con->prepare("SELECT * FROM plans ");
      $result->execute();

      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value='" . $row['planCode'] . "'>" . $row['planDesc'] . "</option>";
      }
    }

    public function addPlan(){
      $planCode = $_POST['planCode'];
      $planDesc = $_POST['planDesc'];
      $planRate = $_POST['planRate'];
		  try {
        $DB_con = Database::connect();
        $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO plans(planCode, planDesc, planRate) VALUES(?,?,?)";
        $q = $DB_con->prepare($sql);
        $q->execute(array($planCode,$planDesc,$planRate));

        ?>
        <script>
        </script>
        <?php
      }
      catch (PDOException $msg) {
        die("Connection Failed : " . $msg->getMessage());
      }
    }
		public function addRequirements(){

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
				$AgentCode = $_POST['agentCode'];
				$PlanCode = $_POST['planCode'];
				$Requirement = $_POST['requirement'];
				$TransactTdate = $_POST['TTransactDate'];
				$PprodID = $_POST['ProdId'];

				$DB_con = Database::connect();
				 $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
					 $sql = "SELECT * FROM requirements, client ,production where requirements.RProdID = '$PprodID' and production.prodID='$PprodID'";
				 $result = $DB_con->query($sql);
			 ?>
				 <?php
				 while($row=$result->fetch(PDO::FETCH_ASSOC)){
					 if($row['issuedDate']=="0000-00-00")
					 {
					 }
					 else
					 {
						 $sql = "INSERT INTO requirements (RagentCode, Rrequirements, RProdID, RtransDate)
						 values ('$AgentCode','$Requirement','$PprodID','$TransactTdate')";
					}
			}
				if($conn->query($sql))
				{
					?>
					<script>
					</script>
					<?php
				}
				else {
					echo "Error:". $sql."<br>".$conn->error;
				}
				$conn->close();
			}
		}


			public function deleteRequirements(){

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
					if(isset($_POST['btn-deleteRow']))
					{
					$reqtext =  $_POST['inputvaluedelete2'];
					$prodtext = $_POST['inputvaluedelete'];
					$sql = "DELETE FROM requirements WHERE Rrequirements = '$reqtext' AND	RProdID = '$prodtext'";
					}
			if($conn->query($sql))
					{
						?>
						<script>
						window.location="add_requirements.php";
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
			public function updateRequirements(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['iupdateko']))
					{
						$agentRequirementCode = $_POST['modalcode'];
					  $newAgentRequirement = $_POST['modalreq'];
					$newAgentRequirementTransDate =$_POST['modaltrans'];
					$newAgentRequirementStatus = $_POST['modalstats'];
					$newAgentRequirementSubmitDate = $_POST['modalsubdate'];
					$requirementNo=  $_POST['modalRequirementNo'];
					$sql = "UPDATE requirements SET Rrequirements = '$newAgentRequirement',RtransDate = '$newAgentRequirementTransDate',SubmitDate = '$newAgentRequirementSubmitDate',Status = '$newAgentRequirementStatus' where RequirementNo = '$requirementNo'";
				}
						if($conn->query($sql))
						{
							?>
							<script>
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}


					$conn->close();

				}

			public function deleteTeam(){
				$delteam = $_POST['inputvaluedelete3'];

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
						$sql = "DELETE FROM team WHERE teamID = '$delteam'";
						if($conn->query($sql) == TRUE)
						{
							echo "Successful";
						}
						else {
							echo "Error Deleting" .$conn->error;;
							}
							?>
							<script>
							window.location="add_requirements.php";
							</script>
							<?php
							$conn->close();

					}
			}
				public function addAgent(){

					$Agentcode=$_POST['agentCode'];
					$Lastname=$_POST['lastname'];
					$Firstname=$_POST['firstname'];
					$Middlename=$_POST['middlename'];
					$Birthdate=$_POST['birthdate'];
					$Applicationdate=$_POST['appDate'];
					$team=$_POST['team'];
					$Position=$_POST['position'];

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
						$sql = "INSERT INTO agents (agentCode, agentLastname, agentFirstname, agentMiddlename,agentBirthdate,agentApptDate,agentTeam,agentPosition)
						values ('$Agentcode','$Lastname','$Firstname','$Middlename','$Birthdate','$Applicationdate','$team','$Position')";

						if($conn->query($sql))
						{
							?>
							<script>
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
						$conn->close();
					}
				}
				public function addTeam(){


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
						$teamID=$_POST['teamid'];
						$teamName=$_POST['teamname'];

						$sql = "INSERT INTO team (teamID, teamName)
						values ('$teamID','$teamName')";

						if($conn->query($sql))
						{
							?>
							<script>
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
						$conn->close();
					}
				}
				public function updateTeam(){
					$host = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "tgpdso_db";
					$sql ="";
					$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

					if(mysqli_connect_error())
					{
						die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
					}
					else {
						if(isset($_POST['ButtonUpdate']))
						{
							$newTeamID = $_POST['newTeamID'];
						$newTeamName = $_POST['newTeamName'];
							$sql = "UPDATE team SET teamName = '$newTeamName' where teamID = '$newTeamID'";
							if($conn->query($sql)===true)
							{
								?>
								<script>
									window.location='add_team.php';
								</script>
								<?php
							}
							else {
								echo "Error:". $sql."<br>".$conn->error;
							}
						}
						$conn->close();
					}
				}
				public function dropdown_team() {
					$DB_con = Database::connect();
					$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$result = $DB_con->prepare("SELECT * FROM team");
					$result->execute();

					while($row = $result->fetch(PDO::FETCH_ASSOC)) {
						    echo "<option value='" . $row['teamName'] . "'>" . $row['teamName'] . "</option>";
					}
				}
				public function dropdown_training() {
					$DB_con = Database::connect();
					$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$result = $DB_con->prepare("SELECT * FROM training ");
					$result->execute();

					while($row = $result->fetch(PDO::FETCH_ASSOC)) {
								echo "<option value='" . $row['trainingName'] . "'>" . $row['trainingName'] . "</option>";
					}
				}
				public function dropdown_position() {
					$DB_con = Database::connect();
					$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$result = $DB_con->prepare("SELECT * FROM position ");
					$result->execute();

					while($row = $result->fetch(PDO::FETCH_ASSOC)) {
								echo "<option value='" . $row['positionName'] . "'>" . $row['positionName'] . "</option>";
					}
				}

				public function updateIssuedate(){
					$host = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "tgpdso_db";
					$sql ="";
					$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

					if(mysqli_connect_error())
					{
						die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
					}
					else {
						if(isset($_POST['iupdateko']))
						{
						if(isset($_POST['uprod'])){	?>
							<?php
							$ProdID = $_POST['uprod'];
						$planplan = $_POST['uplan'];
						$policy =$_POST['upolicy'];
						$upissuedate = $_POST['modalissuedate'];}
							$sql = "UPDATE production SET issuedDate = '$upissuedate' where prodID = '$ProdID' and plan ='$planplan' and policyNo = '$policy'";
							if($conn->query($sql))
							{
								?>
								<script>
								</script>
								<?php
							}
							else {
								echo "Error:". $sql."<br>".$conn->error;
							}
						}


						$conn->close();

					}
				}
				public function deleteIssuedate(){
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
					if(isset($_POST['btn-deleteRow']))
					{
					$policy = $_POST['inputvaluedelete'];
					$ProdID = $_POST['inputvaluedelete2'];

					?>
						<script>
						</script>
					<?php
					$sql = "UPDATE production SET issuedDate = $policy WHERE policyNo = '$policy' and prodID = '$ProdID'";
					}
					if($conn->query($sql))
					{
						?>
						<script>
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
				public function addTraining(){
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
					if(isset($_POST['btn-addrEquirements']))
					{
						$trainingName = $_POST['TrainingName'];
						$trainingdate = $_POST['TrainingDate'];

						$sql = "INSERT Into training (trainingName, trainingDate) values ('$trainingName','$trainingdate')";
					}
					if($conn->query($sql))
					{
						?>
						<script>
							window.location="add_training.php";
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
			public function deleteTraining(){

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
					if(isset($_POST['btn-deleteRow']))
					{
						$trainid = $_POST['temp'];
						$trainname = $_POST['temp2'];
						$sql = "DELETE FROM training WHERE trainingNo = '$trainid' AND	trainingName = '$trainname'";
					}
					if($conn->query($sql))
					{
						?>
						<script>
						window.location="add_training.php";
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
			public function updateTraining(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['iupdateko']))
					{
						$newTrainingNo = $_POST['trainingid'];
					$newTrainingName = $_POST['TrainingName'];
					$newTrainingDate = $_POST['utraindate'];
						?>
					<?php
						$sql = "UPDATE training SET trainingNo = '$newTrainingNo', trainingName = '$newTrainingName', trainingDate = '$newTrainingDate' where trainingNo = '$newTrainingNo'";

						if($conn->query($sql))
						{
							?>
							<script>
								window.location='add_training.php';
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}
					$conn->close();
				}
			}
			public function updateAgentTraining(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['updateAgentTraining']))
					{
							$display = $_REQUEST['display'];
						$newtrainingid= $_POST['updateTrainingid'];
						$newTrainingDate = $_POST['updatetrainingdateApplication'];
					$newTrainingName = $_POST['updatetrainingName'];
					$newtrainingStatus = $_POST['updatetrainingStatus'];
						?>
					<?php
						$sql = "UPDATE agentstraining SET ATstatus = '$newtrainingStatus', ATtrainingName = '$newTrainingName', ATapplicationdate = '$newTrainingDate' where ATagentTrainingID = '$newtrainingid'";
						if($conn->query($sql))
						{
							?>
							<script>
								window.location = "agent_profile.php?display=<?php echo $display?>";
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}
					$conn->close();
				}
			}
			public function addTrainingQualifications(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['addqualifications']))
					{
						$add= $_POST['add'];
						$newTrainingNo = $_POST['trainingid'];
					$newTrainingName = $_POST['TrainingName'];
					$newTrainingPosition = $_POST['TrainingRequired'];
					?>
					<?php
					$sql = "INSERT INTO trainingqualifications (trainingID, trainingQName, trainingQualification)
					values ('$newTrainingNo','$newTrainingName','$newTrainingPosition')";
						if($conn->query($sql))
						{
							?>
							<script>
								window.location='add_training.php?add=<?php $add ?>&#addtrainingqualifications';
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}
					$conn->close();
				}
			}
			public function addFund(){

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
						if(isset($_POST['btn-save']))
						{
					$fundID=$_POST['fundID'];
					$fundName=$_POST['fundName'];

					$sql = "INSERT INTO fund (fundID, fundName)
					values ('$fundID','$fundName')";
				}
					if($conn->query($sql))
					{
						?>
						<script>
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
			public function updateFund(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['ButtonUpdate']))
					{
						$newFundNo = $_POST['newFundID'];
					$newFundName = $_POST['newFundName'];

						$sql = "UPDATE fund SET fundName = '$newFundName' where fundID = '$newFundNo'";
						if($conn->query($sql)===true)
						{
							?>
							<script>
								window.location='fund.php';
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}


					$conn->close();

				}
			}
			public function addPolicyStatus(){

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
						if(isset($_POST['btn-save']))
						{
					$policyID=$_POST['policyID'];
					$policyStatus=$_POST['policyStatus'];
					$policyremarks = $_POST['policyremarks'];

					$sql = "INSERT INTO policystatus (policyID, policyStatus, policyRemarks)
					values ('$policyID','$policyStatus', '$policyremarks')";
				}
					if($conn->query($sql))
					{
						?>
						<script>
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
			public function updatePolicyStatus(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['ButtonUpdate']))
					{
						$newPolicyID = $_POST['newPolicyID'];
					$newPolicyStatus = $_POST['newPolicyStatus'];
					$newPolicyRemarks = $_POST['newPolicyRemarks'];

						$sql = "UPDATE policystatus SET policyStatus = '$newPolicyStatus', policyRemarks = '$newPolicyRemarks' where policyID = '$newPolicyID'";
						if($conn->query($sql)===true)
						{
							?>
							<script>
								window.location='policyStatus.php';
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}


					$conn->close();

				}
			}
			public function addPosition(){

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
						if(isset($_POST['btn-save']))
						{
					$positionName=$_POST['positionName'];

					$sql = "INSERT INTO position (positionName)
					values ('$positionName')";
				}
					if($conn->query($sql))
					{
						?>
						<script>
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
			public function updatePosition(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['ButtonUpdate']))
					{
					$newPositionName = $_POST['newPositionName'];
					$newPositionID = $_POST['newPositionID'];
						$sql = "UPDATE position SET positionName = '$newPositionName' where positionID = '$newPositionID'";
						if($conn->query($sql)===true)
						{
							?>
							<script>
								window.location='position.php';
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}


					$conn->close();

				}
			}
			public function updateAgent(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['ButtonUpdate']))
					{
					$newAgentCode = $_POST['agentcode'];
					$newLastName = $_POST['newLastName'];
					$newFirstName= $_POST['newFirstName'];
					$newMiddleName= $_POST['newMiddleName'];
					$newBirthdate= $_POST['newBirthdate'];
					$newAppDate= $_POST['newAppDate'];
					$newTeam= $_POST['newTeam'];
					$newPosition = $_POST['newPosition'];
						$sql = "UPDATE agents SET agentLastname = '$newLastName', agentFirstname = '$newFirstName', agentMiddlename = '$newMiddleName', agentBirthdate = '$newBirthdate', agentApptDate = '$newAppDate', agentTeam = '$newTeam', agentPosition = '$newPosition' where agentCode = '$newAgentCode'";
						if($conn->query($sql)===true)
						{
							?>
							<script>
								window.location='add_agent.php';
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}
					$conn->close();

				}
			}
			public function addPaymentFromDueDate(){

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
					$newPaymentPolicyNo = $_POST['paymentPolicyNo'];
					$newPaymentAmount = $_POST['paymentAmount'];
					$newPaymentOR = $_POST['paymentORNo'];
					$newPaymentAPR = $_POST['paymentAPR'];
					$newPaymentNextDue = $_POST['paymentNextDue'];
					$newPaymentRemarks =  "Renewed";

					$sql = "INSERT INTO payment(payment_policyNo, payment_Amount, payment_OR, payment_APR, payment_nextDue, payment_remarks)
					values ('$newPaymentPolicyNo','$newPaymentAmount','$newPaymentOR','$newPaymentAPR','$newPaymentNextDue','$newPaymentRemarks')";

					if($conn->query($sql))
					{
						?>
						<script>
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
					}
					$conn->close();
				}
			}
			public function updateAddAgentToTraining(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";
				$sql ="";
				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
				?>
				<script>
				</script>
				<?php
				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['ButtonUpdate']))
					{

					$newAgentName = $_POST['newAgentName'];
					$newAgentTrainingName = $_POST['newAgentTrainingName'];
					$newDate = $_POST['newDate'];
					$addAgentToTrainingID = $_POST['addagentTrainingID'];
					?>
						<script>
						</script>
					<?php
					$sql = "UPDATE agentstraining SET ATagentName = '$newAgentName', ATtrainingName = '$newAgentTrainingName', ATapplicationdate = '$newDate' where ATagentTrainingID = '$addAgentToTrainingID'";
						if($conn->query($sql)===true)
						{
							?>
							<script>
								window.location='add_agent_training.php';
							</script>
							<?php
						}
						else {
							echo "Error:". $sql."<br>".$conn->error;
						}
					}
					$conn->close();

				}
			}

	}
?>
