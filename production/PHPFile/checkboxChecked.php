<?php
$DB_con = Database::connect();
$DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM production, payment, agents, client, team WHERE payment_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND agentTeam = teamID AND SOAdate != '0000-00' AND teamName = '$teamUser' AND(payment_soaDate IS NULL OR payment_soaDate LIKE '')";

$result = $DB_con->query($sql);
if($result->rowCount()>0){
  while($row=$result->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
      <td hidden><?php print($row['payment_ID']); ?></td>
      <td><?php print($row['payment_transDate']); ?></td>
      <td><?php print($row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename']);?></td>
      <td><?php print($row['payment_policyNo']); ?></td>
      <td><?php print($row['payment_MOP']); ?></td>
      <td><?php print($row['premium']); ?></td>
      <td><?php print($row['rate']); ?></td>
      <td><?php print($row['FYC']); ?></td>
      <td><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
      <td>
        <div class="row">
          <div class="col-md-6">
          <button type="button" data-modal="modal" data-toggle="modal" data-target="#updateModal" class="btn btn-primary" style="margin-left: 10px;" name="editSoaButton"><i class="glyphicon glyphicon-copy"></i></a>
        </div>
        </div>
      </td>
      <td hidden><?php print($row['payment_policyNo']); ?></td>
      <td hidden><?php print($row['payment_soaDate']); ?></td>
      <td hidden><?php print($row['payment_transDate']); ?></td>
      <td hidden><?php print($row['clientID']); ?></td>
      <td hidden><?php print($row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']); ?></td>
      <td hidden><?php print($row['payment_issueDate']); ?></td>
      <td hidden><?php print($row['payment_MOP']); ?></td>
      <td hidden><?php print($row['premium']); ?></td>
      <td hidden><?php print($row['rate']); ?></td>
      <td hidden><?php print($row['FYC']); ?></td>
      <td hidden><?php print($row['agentCode']); ?></td>
      <td hidden><?php print($row['agentLastname'].", ".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
      <td hidden><?php print($row['payment_dueDate']); ?></td>
      <td hidden><?php print($row['payment_ID']); ?></td>
    </tr>
    <?php
  }
}
else if($positionUser == 'Administrator' || $positionUser == 'administrator'){
  $DB_con = Database::connect();
  $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM production, payment, agents, client WHERE payment_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND (payment_soaDate IS NULL OR payment_soaDate LIKE '')";

  $result = $DB_con->query($sql);
  if($result->rowCount()>0){
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      ?>
      <tr>
        <td hidden><?php print($row['payment_ID']); ?></td>
        <td><?php print($row['payment_transDate']); ?></td>
        <td><?php print($row['cLastname'].",".$row['cFirstname']." ".$row['cMiddlename']);?></td>
        <td><?php print($row['payment_policyNo']); ?></td>
        <td><?php print($row['payment_MOP']); ?></td>
        <td><?php print($row['premium']); ?></td>
        <td><?php print($row['rate']); ?></td>
        <td><?php print($row['FYC']); ?></td>
        <td><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
        <td>
          <div class="row">
            <div class="col-md-6">
            <button type="button" data-modal="modal" data-toggle="modal" data-target="#updateModal" class="btn btn-primary" style="margin-left: 10px;" name="editSoaButton"><i class="glyphicon glyphicon-copy"></i></a>
          </div>
          </div>
        </td>
        <td hidden><?php print($row['payment_policyNo']); ?></td>
        <td hidden><?php print($row['payment_soaDate']); ?></td>
        <td hidden><?php print($row['payment_transDate']); ?></td>
        <td hidden><?php print($row['clientID']); ?></td>
        <td hidden><?php print($row['cLastname'].", ".$row['cFirstname']." ".$row['cMiddlename']); ?></td>
        <td hidden><?php print($row['payment_issueDate']); ?></td>
        <td hidden><?php print($row['payment_MOP']); ?></td>
        <td hidden><?php print($row['premium']); ?></td>
        <td hidden><?php print($row['rate']); ?></td>
        <td hidden><?php print($row['FYC']); ?></td>
        <td hidden><?php print($row['agentCode']); ?></td>
        <td hidden><?php print($row['agentLastname'].", ".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
        <td hidden><?php print($row['payment_dueDate']); ?></td>
        <td hidden><?php print($row['payment_ID']); ?></td>
      </tr>
      <?php
    }
  }
}
?>
