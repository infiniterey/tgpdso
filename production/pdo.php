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

			$AgentCode = $_POST['agentCode'];
			$PlanCode = $_POST['planCode'];
			$Requirement = $_POST['requirement'];
			$TransactTdate = $_POST['TTransactDate'];
			$PprodID = $_POST['ProdId'];
			$SubmitDate = $_POST['submitdate'];
			$Status = $_POST['stats'];
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

				$sql = "INSERT INTO requirements (RagentCode, Rrequirements, RProdID, RtransDate,SubmitDate,Status)
				values ('$AgentCode','$Requirement','$PprodID','$TransactTdate','$SubmitDate','$Status')";

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
					if(isset($_POST['TrueDelete']))
					{
					$reqtext = $var1;
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
					$requirementProdID= $prodID;
					?><script>alert('good morning <?php echo $agentRequirementCode?>');</script><?php
					$sql = "UPDATE requirements SET Rrequirements = '$newAgentRequirement',RtransDate = '$newAgentRequirementTransDate',SubmitDate = '$newAgentRequirementSubmitDate',Status = '$newAgentRequirementStatus' where RProdID = '$requirementProdID' RagentCode = '$agentRequirementCode'";
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

					$teamID=$_POST['teamid'];
					$teamName=$_POST['teamname'];

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
				public function dropdown_team() {
					$DB_con = Database::connect();
					$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$result = $DB_con->prepare("SELECT * FROM team ");
					$result->execute();

					while($row = $result->fetch(PDO::FETCH_ASSOC)) {
						    echo "<option value='" . $row['teamID'] . "'>" . $row['teamName'] . "</option>";
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
			public function addAgentToTraining(){
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
					if(isset($_POST['apply']))
					{
						$ATagentID = $_POST['contain1'];
						$ATagentName= $_POST['agentName'];
						$ATtrainingName = $_POST['trainingNameko'];
						$ATtrainingID =  $_POST['contain2'];
						$ATdate = $_POST['DateAdded'];

						$sql = "INSERT Into agentstraining (ATagentID, ATagentName, ATtrainingName, ATrequiredPosition, ATdate) values ('$ATagentID','$ATagentName','$ATtrainingName','$ATtrainingID', '$ATdate')";
					}
					if($conn->query($sql))
					{
						?>
						<script>
							alert('Agent successfully added to the training!');
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
	}
?>
