<div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Update SOA Details</h4>
    </div>
    <form method="post" name="myform" action="<?php $_PHP_SELF ?>">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
        <label class="control-label">
        Mid Month:
        </label>
       <input type="month" class="form-control" name="soa_mid" id="soa_mid"><br>
       <label class="control-label">
       Month End:
       </label>
      <input type="month" class="form-control" name="soa_end" id="soa_end"><br>
      SOA Date:
      </label>
     <input type="date" class="form-control" name="soa_date" id="soa_date"><br>
       <label class="control-label">
       Policy No.:
     </label><input type="text" class="form-control" name="soa_policyNo" id="soa_policyNo"/>
     <br>
        <label class="control-label">
        Transaction Date:
      </label><input type="date" class="form-control" name="soa_transDate" id="soa_transDate"><br>
      <label class="control-label">
        Name:
      </label>
      <input  type="text" class="form-control" id="soa_client" name="soa_client">
      <input  type="text" id="soa_name" name="soa_name" hidden><br>
        <label class="control-label">
        Issue Date:
      </label><input type="date" class="form-control" name="soa_issueDate" id="soa_issueDate"><br>
    </div>
    <div class="col-md-6">
      <label class="control-label">
      Mode of Payment:
    </label>
    <select id="soaMOP" name="soaMOP" class="form-control">
    <option id="soaMOP" name="soaMOP">Select MOP</option>
      <option id="soaMOP" name="soaMOP" value="Monthly">Montly</option>
        <option id="soaMOP" name="soaMOP" value="Quarterly">Quarterly</option>
          <option id="soaMOP" name="soaMOP" value="Semi-Annual">Semi-Annual</option>
            <option id="soaMOP" name="soaMOP" value="Annual">Annual</option>
    </select>

    <br>
        <label class="control-label">
        Premium:
      </label><input type="text" class="form-control" name="soa_premium" id="soa_premium"><br>
        <label class="control-label">
        Rate:
      </label><input type="text" class="form-control" name="soa_rate" id="soa_rate"><br>
      <label class="control-label">
      Commission:
    </label><input type="text" class="form-control" name="soa_commission" id="soa_commission"><br>
    <label class="control-label">
    Agent:
  </label><input type="text" hidden name="soa_agent" id="soa_agent">
  <input type="text" class="form-control" name="soa_agentname" id="soa_agentname"><br>
       <br>
     </div>
     </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="width: 100px;" name="soaUpdate" id="soaUpdate"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;Update</button>
      </div>
    </form>
  </div>
</div>
