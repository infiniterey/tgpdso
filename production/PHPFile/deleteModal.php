<div id="fundModal" name="fundModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-sm" style="width: 950px;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>
      <form method='post' name='myFormModal' onsubmit="CheckForm()">
        <div class="modal-body">

      <div id="datatable-fixed-header_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
        <div class="row">
          <div class="col-lg-5">
              <h4 style="float:center">Confirm Delete?</h4>
          </div>
          <div class="col-lg-5">
              <form method="POST" action="<?php $_PHP_SELF ?>">
                  <a title="Delete Data" href="add_requirements.php?delete=<?php echo $row['RequirementsNo'] ?>" class="btn btn-danger">Yes<i class="fa fa-trash"></i></a>
                  <button id="Cancel" name="Cancel">No</button>
            </div>

        </div>
        <div class="modal-footer">
          <!--<button type="submit" class="btn btn-primary" style="width: 100px;" name="paymentSaveButton" id="paymentSaveButton" onclick="openPolicy(event, 'Payment')"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>-->
          <!--<button type="button" class="btn btn-default" style="width: 100px;" data-dismiss="modal">Close</button>-->
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
