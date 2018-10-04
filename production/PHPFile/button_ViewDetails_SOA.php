  <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">View Details  <button type="button" class="close" data-dismiss="modal" onclick="cancelDetail();">x</button></h2>
        </div>
        <div class="modal-body">
          <table id="datatable-fixed-header087" name="datatable-fixed-header087" align="center" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
            <thead>
              <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="TransactionDate" style="width: 25px;text-align:center;">Transaction Date</th>
                <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="PaymentMode" style="width: 20px;text-align:center;">M.O.P</th>
                <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Premium" style="width: 20px;text-align:center;">Premium</th>
                <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Rate" style="width: 10px;text-align:center;">Rate</th>
                <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Commission" style="width: 40px;text-align:center;">Commission</th>
                <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Action" style="width: 50px;text-align:center;">SOA Date</th>
              </tr>
            </thead>
            <tbody>

              <?php
              if(isset($_GET['view']))
              {
                $DB_con = Database::connect();
                $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $view = $_GET['view'];
                $teamItSelf = $_SESSION["team"];
                $userTypeItSelf = $_SESSION["usertype"];
                if($_SESSION["usertype"] == "Secretary" || $_SESSION["usertype"] == "secretary")
                {
                  $sql = "SELECT * FROM production, agents, client, team, soa WHERE SOA_policyNo = policyNo AND agentCode = agent AND agentTeam = teamID AND teamName = '$teamItSelf' AND agent = agentCode AND clientID = prodclientID AND SOA_policyNo = '$view'";
                }
                else
                {
                  $sql = "SELECT * FROM production, agents, client, soa WHERE SOA_policyNo = policyNo AND agent = agentCode AND clientID = prodclientID AND clientID = SOA_policyOwner AND SOA_policyNo = '$view'";
                }
                $result = $DB_con->query($sql);
                if($result->rowCount()>0){
                  while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    $originalDate = $row['SOA_transDate'];
                    $payTransdate = date("m/d/Y", strtotime($originalDate));
                    ?>
                        <tr>
                          <td><?php print($payTransdate); ?></td>
                          <td><?php print($row['SOA_paymentMode']); ?></td>
                          <td>Php&nbsp;<?php print($row['SOA_premium']); ?></td>
                          <td><?php print($row['SOA_rate']); ?></td>
                          <td>Php&nbsp;<?php print($row['SOA_commission']); ?></td>
                          <td><?php print($row['SOA_date']." (".$row['SOA_selectMonth'].")");?></td>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                    <script>
                    $(document).ready(function () {
                      $('#viewSOA').modal('show');
                      document.getElementById('tableFront').style.display = "none";
                      document.getElementById('tableView').style.display = "block";

                      var test = localStorage.input === 'true'? true: false;
                        $('#soaCheckBox').prop('checked', test || false);

                        $('#soaCheckBox').on('change', function() {
                        localStorage.input = $(this).is(':checked');
                        });
                        document.getElementById("addThis").disabled = true;
                    });
                  </script>
                    <?php
                  }

                  ?>
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
