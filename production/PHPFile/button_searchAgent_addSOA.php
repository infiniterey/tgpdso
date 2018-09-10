<div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#addSOAModal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Search Agent</h4>
    </div>
    <form method="post" name="myform" action="<?php $_PHP_SELF ?>">
      <div class="modal-body">

        <table id="datatable-fixed-header09" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons()">
          <thead>
            <tr role="row">
              <th hidden>AgentCode</th>
              <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header09" rowspan="1" colspan="1" aria-label="Agent" style="width: 400px;text-align:center;">Agent</th>
              <th class="sorting" tabindex="0"  aria-controls="datatable-fixed-header09" rowspan="1" colspan="1" aria-label="Action" style="width: 20px;text-align:center;">Action</th>
            </tr>
          </thead>

          <tbody>

              <?php
              if($_SESSION['usertype'] == 'Secretary' || $_SESSION['usertype'] == 'secretary')
              {
                $DB_con = Database::connect();
                $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM agents";

                $result = $DB_con->query($sql);
                if($result->rowCount()>0){
                  while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                      <td hidden><?php print($row['agentCode']); ?></td>
                      <td><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
                      <td align="center">
                        <div class="row">
                          <button  class="btn btn-primary" name="buttonsearchAgent">Get&nbsp;<i class="fa fa-arrow-right"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php
                  }
                }
              }
              else
              {
                $DB_con = Database::connect();
                $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM agents";

                $result = $DB_con->query($sql);
                if($result->rowCount()>0){
                  while($row=$result->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                      <td hidden><?php print($row['agentCode']); ?></td>
                      <td><?php print($row['agentLastname'].",".$row['agentFirstname']." ".$row['agentMiddlename']); ?></td>
                      <td align="center">
                        <div class="row">
                          <button  type="button" data-dismiss="modal" data-toggle="modal" data-target="#addSOAModal" class="btn btn-primary" name="buttonsearchAgent">Get&nbsp;<i class="fa fa-arrow-right"></i></a>
                        </div>
                      </td>
                    </tr>
                    <?php
                  }
                }
              }
              ?>
            </tbody>
        </table>

        <script>
        var table = document.getElementById('datatable-fixed-header09');
        for(var counter = 1; counter < table.rows.length; counter++)
        {
          table.rows[counter].onclick = function()
          {
           document.getElementById("soa_agent").value = this.cells[0].innerHTML;
           document.getElementById("soa_agentname").value = this.cells[1].innerHTML;
            };
          }
        </script>

      </div>
      <div class="modal-footer">
      </div>
    </form>
  </div>
</div>
