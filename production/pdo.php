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
          alert('New production successfully added!');
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
          alert('New plan successfully added!');
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


				$sql = "INSERT INTO requirements (RagentCode, Rrequirements, RProdID, RtransDate)
				values ('$AgentCode','$Requirement','$PprodID','$TransactTdate')";

				if($conn->query($sql))
				{
					?>
					<script>
						alert('Requirement successfully added!');
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
					?><script>alert('<?php echo $reqtext ?>');</script><?php
					$sql = "DELETE FROM requirements WHERE Rrequirements = '$reqtext' AND	RProdID = '$prodtext'";
					}
			if($conn->query($sql))
					{
						?>
						<script>
							alert('Requirements successfully deleted!');
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
					?><script>alert('good morning <?php echo $requirementProdID?>');</script><?php
					$sql = "UPDATE requirements SET Rrequirements = '$newAgentRequirement',RtransDate = '$newAgentRequirementTransDate',SubmitDate = '$newAgentRequirementSubmitDate',Status = '$newAgentRequirementStatus' where RequirementNo = '$requirementNo'";
				}
						if($conn->query($sql))
						{
							?>
							<script>
								alert('Issue Date successfully updated!');
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
								alert('Agent successfully added!');
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
								alert('Team successfully added!');
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
									alert('Team successfully updated!');
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

					$result = $DB_con->prepare("SELECT * FROM team ");
					$result->execute();

					while($row = $result->fetch(PDO::FETCH_ASSOC)) {
						    echo "<option value='" . $row['teamID'] . "'>" . $row['teamName'] . "</option>";
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
									alert('Issue Date successfully updated!');
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
								alert('halaa <?php echo $ProdID?>');
						</script>
					<?php
					$sql = "UPDATE production SET issuedDate = $policy WHERE policyNo = '$policy' and prodID = '$ProdID'";
					}
					if($conn->query($sql))
					{
						?>
						<script>
							alert('Issue Date successfully Deleted!');
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
						$trainingRequired = $_POST['TrainingRequired'];

						$sql = "INSERT Into training (TrainingName, TrainingRequired) values ('$trainingName','$trainingRequired')";
					}
					if($conn->query($sql))
					{
						?>
						<script>
							alert('Training successfully added!');
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
						?>
						<script>
								alert('haloooooooooooooooooooooooooo <?php echo $trainid?>');
						</script>
						<?php
						$sql = "DELETE FROM training WHERE trainingNo = '$trainid' AND	trainingName = '$trainname'";
					}
					if($conn->query($sql))
					{
						?>
						<script>
							alert('Training successfully deleted!');
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
						$newTrainingNo = $_POST['utrainid'];
					$newTrainingName = $_POST['utrainname'];
					$newTrainingPosition = $_POST['utrainposition'];
					?>
					<script>
						alert('yahoooo!<?php echo $newTrainingNo  ?>');
					</script>
					<?php
						$sql = "UPDATE training SET trainingNo = '$newTrainingNo', trainingName = '$newTrainingName', trainingRequired = '$newTrainingPosition' where trainingNo = '$newTrainingNo'";
						if($conn->query($sql))
						{
							?>
							<script>
								alert('Issue Date successfully updated!');
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
			public function deleteAgentToTraining(){
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "tgpdso_db";

				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
				?>
				<script>
					alert('haaayyynaaakooo!');
				</script>
				<?php
				if(mysqli_connect_error())
				{
					die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
				}
				else {
					if(isset($_POST['btn-deleteRow']))
					{
						$ATagentID = $_POST['contain1'];
						$ATagentName= $_POST['agentName'];
						$ATtrainingName = $_POST['trainingNameko'];
						$ATtrainingID =  $_POST['contain2'];
						$ATdate = $_POST['DateAdded'];
						?>
							<script>alert('echo lalalala <?php $prodID?>')</script>
						<?php
						$sql = "DELETE from agentstraining WHERE ATagentID = '$ATagentID' AND ATtrainingName= '$ATtrainingName'";
					}
					if($conn->query($sql))
					{
						?>
						<script>
							alert('Agent successfully deleted the training!');
							window.location="add_agent_training.php";
						</script>
						<?php
					}
					else {
						echo "Error:". $sql."<br>".$conn->error;
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
							alert('Team successfully added!');
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
								alert('Fund successfully updated!');
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
							alert('Policy successfully added!');
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
								alert('Policy Status successfully updated!');
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
							alert('Position successfully added!');
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
								alert('Position successfully updated!');
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
								alert('Agent successfully updated!');
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
							alert('Payment successfully added!');
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
					alert('Halloo');
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
							alert('hello <?php echo $newAgentName?>');
						</script>
					<?php
					$sql = "UPDATE agentstraining SET ATagentName = '$newAgentName', ATtrainingName = '$newAgentTrainingName', ATdate = '$newDate' where ATagentTrainingID = '$addAgentToTrainingID'";
						if($conn->query($sql)===true)
						{
							?>
							<script>
								alert('Agent successfully updated!');
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
