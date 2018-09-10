<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->
<div class="modal-dialog">
  <div class="modal-content">


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Search Policy Number</h4>
    </div>
    <form style="margin-bottom: 10px;">
    <div class="modal-body">

      <table method="post" name="policyNumberSearch" id="policyNumberSearch" class="table table-bordered table-hover no-footer" role="grid" aria-describedby="datatable-fixed-header_info"  >
     <thead>
       <tr role="row">
         <th class="sorting_asc" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Trans. Date: activate to sort column descending" style="width: 30px;text-align:center;">Policy No</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="Name of Insured: activate to sort column ascending" style="width: 100px;text-align:center;">Name</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="Policy No.: activate to sort column ascending" style="width: 50px;text-align:center;name="PolicyNoCell"">Agent</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">Issued Date</th>

         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Lastname</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Firstname</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>Receipt</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Plan</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Plan</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Transadate</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	MOD</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	Prod</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;"hidden>	ProdClientID</th>
         <th class="sorting" tabindex="0" aria-controls="tableko" rowspan="1" colspan="1" aria-label="OR No.: activate to sort column ascending" style="width: 30px;text-align:center;">	Action</th>
         </tr>
     </thead>
     <tbody>
       <?php

         $DB_con = Database::connect();
         $DB_con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         $sql = "SELECT * from production, 	client where prodclientID=clientID";

         $result = $DB_con->query($sql);
         if($result->rowCount()>0){
           while($row=$result->fetch(PDO::FETCH_ASSOC)){;
             ?>
             <tr>
               <td><?php print($row['policyNo']); ?></td>
               <td><?php print($row['cLastname']. ", " .$row['cFirstname']); ?></td>
               <td><?php print($row['agent']); ?></td>
               <td><?php print($row['issuedDate']); ?></td>
               <td hidden><?php print($row['lastName']); ?></td>
               <td hidden><?php print($row['firstName']); ?></td>
               <td hidden><?php print($row['receiptNo']); ?></td>
               <td hidden><?php print($row['agent']); ?></td>
               <td hidden><?php print($row['plan']); ?></td>
               <td hidden><?php print($row['transDate']); ?></td>
               <td hidden><?php print($row['prodID']); ?></td>
               <td hidden><?php print($row['prodclientID']); ?></td>
               <td hidden><?php print($row['modeOfPayment']); ?></td>
               <td>
               <div align="center" class="row">
                   <a title="Display Data" href="add_requirements.php?display=<?php echo $row['prodID'];?>&& display2=<?php echo $row['prodclientID'];?>"  class="btn btn-primary"><i class="glyphicon glyphicon-copy"></i></a>
                 </div>
               </td>
               </tr>
             <?php
           };
         }
         else{}
       ?>
       </tbody>
   </table>
        </form>
    </div>
    <div class="modal-footer">

    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#policyNumberSearch').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );

</script>
<!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search--><!-- The Modal search-->
