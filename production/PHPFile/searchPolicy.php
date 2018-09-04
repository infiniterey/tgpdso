<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h2 class="modal-title">Search Record<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h2>

    </div>

    <form style="margin-bottom: 10px;">
    <div class="modal-body">

    <table name="datatable-fixed-header0" id="datatable-fixed-header0" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info" onclick="closemodal()" >
     <thead>
       <tr role="row">
         <th class="sorting_asc" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Policy No</th>
         <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 100px;text-align:center;">Name</th>
         <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Issued Date</th>
         <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Plan</th>
         <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Premium</th>
         <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Receipt #</th>
         <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Action</th>
         </tr>
     </thead>
     <tbody>
       <?php
         $DB_con = Database::connect();
         $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT * FROM production, client, plans WHERE prodclientID = clientID AND plan = planID";


       $result = $DB_con->query($sql);
       if($result->rowCount()>0)
       {
         while($row=$result->fetch(PDO::FETCH_ASSOC))
         {
         // $sql =$DB_con->prepare( "SELECT p.policyNo, p.issuedDate,p.premium,p.receiptNo,p.plan,
         // c.cFirstname, c.cLastname, c.cMiddlename From production as p Inner join client as c
         // ON p.prodclientID = c.clientID");
         // $sql->execute();
         //  // $result = $DB_con->query($sql);
         // // if($result->rowCount()>0){
          //  while($row=$sql->fetchAll(PDO::FETCH_ASSOC)){
             ?>
             <tr>
               <td><?php echo $row['policyNo']; ?></td>
               <td><?php echo $row['cLastname']. ", " .$row['cFirstname']; ?></td>
               <td><?php echo $row['issuedDate']; ?></td>
               <td><?php echo $row['planCode']; ?></td>
               <td><?php echo $row['premium']; ?></td>
               <td><?php echo $row['receiptNo']; ?></td>
               <td>
                 <div class = "row" align="center">
                     <a id="searchClient" onclick='return searchClientNextDue();' title="Edit Data" href="records.php?edit=<?php echo $row['policyNo'] ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                     <input id="retrieveClientID" name="retrieveClientID" value="<?php echo $row['clientID']; ?>" hidden>
                  </div>
               </td>
            </tr>
             <?php
           }
         }
          // }


       ?>

       </tbody>
   </table>
        </form>
    </div>
    <div class="modal-footer">
    </div>

  </div>
</div>
