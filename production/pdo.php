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
				$reqtext = $_POST['inputvaluedelete2'];
				$prodtext = $_POST['inputvaluedelete'];
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
						$sql = "DELETE FROM requirements WHERE Rrequirements = '$reqtext' AND	RProdID = '$prodtext'";
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
	}
?>
