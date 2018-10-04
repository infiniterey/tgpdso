<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Search Client  <!--<button type="button" class="close" data-dismiss="modal" onclick="cancelDetail();">x</button> --></h2>
      </div>
      <div class="modal-body">
        <table id="datatable-fixed-header089" name="datatable-fixed-header089" align="center" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="showButtons1()">
          <thead>
            <tr role="row">
              <th hidden class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" style="width: 50px;" aria-label="ClientID">ClientID</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" style="width: 100px;" aria-label="FullName">Full Name</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" style="width: 50px;" aria-label="Birthdate">Birthdate</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" style="width: 50px;" aria-label="Address">Address</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1" style="width: 50px;" aria-label="CellNo">Cellphone No.</th>
              <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header3" rowspan="1" colspan="1"  style="width: 50px;" aria-label="Action">Action</th>
            </tr>
          </thead>
          <tbody>



              <?php
                  $DB_con = Database::connect();
                  $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                  $sql = "SELECT * FROM client";

                  $result = $DB_con->query($sql);
                  if($result->rowCount()>0){

                    while($row=$result->fetch(PDO::FETCH_ASSOC)){
                      ?>
                      <tr>
                        <td hidden><?php print($row['clientID']); ?></td>
                        <td><?php print($row['cLastname']. ", " .$row['cFirstname']. " " .$row['cMiddlename']); ?></td>
                        <td><?php print($row['cBirthdate']); ?></td>
                        <td><?php print($row['cAddress']); ?></td>
                        <td><?php print($row['cCellno']); ?></td>
                        <td>
                              <button style="width: 100%; height: 100%;" onclick="clickMe();" type="button" id="retrieve" name="retrieve" data-dismiss="modal" class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></button>
                        </td>

                      </tr>
                      <?php
                    }
                  }
              ?>
            </tbody>
        </table>
        <script>
        var table = document.getElementById('datatable-fixed-header089');
        for(var counter = 1; counter < table.rows.length; counter++)
        {
          table.rows[counter].onclick = function()
          {
           document.getElementById("soa_name").value = this.cells[0].innerHTML;
           document.getElementById("soa_client").value = this.cells[1].innerHTML;
          };
        }
        </script>

    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
