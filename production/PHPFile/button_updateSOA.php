<div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Update SOA Details</h4>
    </div>
    <form method='post' name='myform' onsubmit="CheckForm()">
      <div class="modal-body">
        <label class="control-label">
        SOA Date:
        </label>
       <input type="month" class="form-control" name="soa_soaDate" id="soa_soaDate"><br>
       <div align="center">
      <input type="radio" name="soa_soaDate" id="soa_soaDate" value="mid month">
      <label class="control-label" style="font-size: 16px;">
      Mid Month
    </label>
    &nbsp;
      <input type="radio" name="soa_soaDate" id="soa_soaDate" value="month end">
      <label class="control-label" style="font-size: 16px;">
      Month End
    </label>
  </div>
    <br>
       <label class="control-label">
       Policy No.:
     </label><input type="text" class="form-control" name="soa_policyNO" id="soa_policyNo">
     <button type="button" class="form-control btn btn-primary"name="soaSearch" id="soaSearch" data-dismiss="modal" data-toggle="modal" data-target="#addSOASearchPolicy"><i class="fa fa-search"></i>&nbsp;Search Policy</button><br>
        <label class="control-label">
        Transaction Date:
      </label><input type="date" class="form-control" name="soa_transDate" id="soa_transDate"><br>
      <label class="control-label">
        Name:
      </label>
      <input  type="text" class="form-control" id="soa_name" name="soa_name"><br>
        <label class="control-label">
        Issue Date:
      </label><input type="date" class="form-control" name="soa_issueDate" id="soa_issueDate"><br>
        <label class="control-label">
        Premium:
      </label><input type="text" class="form-control" name="soa_premium" id="soa_premium"><br>
        <label class="control-label">
        Rate:
      </label><input type="text" class="form-control" name="soa_rate" id="soa_commission"><br>
       <br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="width: 100px;" name="paymentSaveButton" id="paymentSaveButton" onclick="openPolicy(event, 'Payment')"><i class="fa fa-arrow-up"></i>&nbsp;&nbsp;Update</button>
      </div>
    </form>
  </div>
</div>
