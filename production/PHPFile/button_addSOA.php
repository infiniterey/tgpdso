<div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title" id="myModalLabel2">Add SOA Details</h4>
    </div>
    <form method="post" name="myform" action="<?php $_PHP_SELF ?>">
      <div class="modal-body">
        <div class="row">

          <div class="col-md-5">
          <label class="control-label">
          Policy No.:
        </label><input type="text" class="form-control" name="soa_policyNo" id="soa_policyNo"/>
      </div>

    <div class="col-md-2">
        <button type="button" class="btn btn-primary"name="soaSearch" id="soaSearch" data-dismiss="modal" data-toggle="modal" data-target="#addSOASearchPolicy" style="margin-top: 24px; margin-left: -14px;"><i class="fa fa-search"></i></button>
      </div>
        </div>
<div class="row">
          <div class="col-md-6">
            <label class="control-label">
              SOA Date:
              </label>
             <input type="month" class="form-control" name="soa_date" id="soa_date" required><br>
             <hr>
             <label class="control-label">
             Month Select:
             </label>
        <div class="row" style="background-color: lightgray;">
          <div class="col-md-5">
            <br>
        <label class="control-label">
        Mid Month:
        </label>
       <input type="radio"  name="soa_select" id="soa_select" value="Mid Month">
     </div>
     <div class="col-md-5" style="margin-top:18px;">
       <label class="control-label">
       Month End:
       </label>
      <input type="radio"  name="soa_select" id="soa_select" value="Month End">
    </div>
    </div>
        <hr>
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

    <div class="row">

      <div class="col-md-10">
    <label class="control-label">
    Agent:
  </label><input type="text" hidden name="soa_agent" id="soa_agent">
  <input type="text" class="form-control" name="soa_agentname" id="soa_agentname">
    </div>
    <div class="col-md-2">
      <button type="button" class="btn btn-primary"name="soaAgent" id="soaAgent" data-dismiss="modal" data-toggle="modal" data-target="#searchAgent" style="margin-top: 24px; margin-left: -14px;"><i class="fa fa-search"></i></button>
    </div>

  </div>
  <br>
  <label class="control-label">
  Due Date:
</label>
<input type="text" class="form-control" name="soa_dueDate" id="soa_dueDate">


       <br>
     </div>
     </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" style="width: 100px;" name="soaSave" id="soaSave"><i class="fa fa-check"></i>&nbsp;&nbsp;Save</button>
      </div>
    </form>
  </div>
</div>
