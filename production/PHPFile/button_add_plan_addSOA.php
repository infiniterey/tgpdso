<div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="cancelInfoAgent();" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel2">Search new plan</h4>
      </div>
      <form method='post' name='myform' onsubmit="CheckForm()">
        <div class="modal-body">
            <table id="datatable-fixed-header003"  align="center" name="datatable-fixed-header003" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
              <thead>
                <tr role="row">
                  <th hidden></th>
                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Plan Code" style="width: 50px;text-align:center;">Plan Code</th>
                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Description" style="width: 100px;">Plan Description</th>
                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Plan Rate" style="width: 35px;text-align:center;">Plan Rate</th>
                  <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header1" rowspan="1" colspan="1" aria-label="Action" style="width: 35px;text-align:center;">Action</th>

                </tr>
              </thead>
              <tbody>

                  <?php
                    $DB_con = Database::connect();
                    $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT * FROM plans";

                    $result = $DB_con->query($sql);
                    if($result->rowCount()>0){
                      while($row=$result->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>

                          <td hidden><?php print($row['planID']); ?></td>
                          <td><?php print($row['planCode']); ?></td>
                          <td><?php print($row['planDesc']); ?></td>
                          <td><?php print($row['planRate']); ?></td>
                          <td>
                              <button onclick="VV2();" style="width: 100%; height: 100%;" type="button" id="retrieveAgent" name="retrieveAgent" data-dismiss="modal" class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button>
                          </td>

                        </tr>
                        <?php
                      }
                    }
                    else{}
                  ?>
                </tbody>
            </table>
            <script>
            $(document).ready(function() {
                $('#datatable-fixed-header003').DataTable( {
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
                } );
            } );
              function VV2()
              {
                var table = document.getElementById('datatable-fixed-header003');
                for(var counter = 1; counter < table.rows.length; counter++)
                {
                  table.rows[counter].onclick = function()
                {
                  document.getElementById("soa_planID").value = this.cells[0].innerHTML;
                   document.getElementById("soa_rate").value = this.cells[3].innerHTML;
                   document.getElementById("soa_plan").value = this.cells[1].innerHTML;
                    };
                  }
              }
            </script>
        </div>
        <div class="modal-footer">
                              <div>
              <div class="row">
                <div class="col-md-3">
              </div>
              <div class="col-md-8">
            </div>
            <form method="post" action="<?php $_PHP_SELF ?>">

            <div class="col-md-6">
              <button type="submit" id="ModalEdit"  name="ModalEdit" class="btn btn-primary" formnovalidate><i class="fa fa-pencil">&nbsp;&nbsp;&nbsp;&nbsp;</i>Update Plan</button>
            </div>
          <div class="col-md-1">
              <button type="submit" id="ModalDelete" name="ModalDelete" class="btn btn-primary" onclick="return confirm('Are you sure do you want to delete this plan?')" formnovalidate><i class="fa fa-trash">&nbsp;&nbsp;&nbsp;&nbsp;</i>Delete Plan</button>
          </div>
              </div>
            </div>
          </form>

            </div>
        </div>
      </form>
    </div>
