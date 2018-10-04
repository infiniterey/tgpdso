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
        </label><input type="text" class="form-control" name="soa_policyNo" id="soa_policyNo" placeholder="Policy No.">
      </div>

    <div class="col-md-2">
        <button type="button" class="btn btn-primary"name="soaSearch" id="soaSearch" data-toggle="modal" data-target="#addSOASearchPolicy" style="margin-top: 24px; margin-left: -14px;"><i class="fa fa-search"></i></button>
      </div>
        </div>
        <div class="row">
          <script>
          jQuery(function($) {
          $('input.number').on('keyup', function() {
            if(event.which >= 37 && event.which <= 40) return;
            $(this).val(function(index, value) {
              return value
              .replace(/\D/g, "")
              .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
              });
            });
          </script>
          <script>
             function commissionAddSOA()
             {
               document.getElementById("soa_commission").value="";
               var premium = document.getElementById("soa_premium").value;
               premium = premium.replace(/,/g , "");

               var rate = document.getElementById("soa_rate").value;
               var rate2 = premium / 100;
               var str = rate.slice(0, -1);
               str = str/100;
               var result = premium*str;
               result =  result.toLocaleString('en', {maximumSignificantDigits : 21});
               document.getElementById("soa_commission").value = result;
               // var resultCom = document.getElementById("soa_commission1").value;
               // resultCom =  resultCom.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
               // document.getElementById("soa_commission1").value = resultCom;
             }
           </script>
           <br>
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
               <input type="radio"  name="soa_select" id="soa_select" value="Mid Month" required>
             </div>
             <div class="col-md-5" style="margin-top:18px;">
               <label class="control-label">
               Month End:
               </label>
              <input type="radio"  name="soa_select" id="soa_select" value="Month End" required>
            </div>
            </div>
                <hr>
                <label class="control-label">
                Transaction Date:
              </label><input type="date" class="form-control" name="soa_transDate" id="soa_transDate" placeholder="Transaction Date"><br>
              <div class="row">
                <div class="col-md-10">
              <label class="control-label">
                Name:
              </label>
                  <input  type="text" class="form-control" id="soa_client" name="soa_client" placeholder="Client Name">
              </div>
              <div class="col-md-2">
                  <button type="button" name="searchClient" id="searchClient" class="btn btn-primary" data-target="#clientSearchAddSOA" data-toggle="modal" style="margin-top: 24px; margin-left: -14px;"><i class="fa fa-search"></i></button>
              <input  type="text" id="soa_name" name="soa_name" hidden>
            </div>
              </div>
              <br>
                <label class="control-label">
                Issue Date:
              </label><input type="date" class="form-control" name="soa_issueDate" id="soa_issueDate" placeholder="Issue Date"><br>
            </div>
            <div class="col-md-6" style="margin-top: -77px;">
              <label class="control-label">
              Mode of Payment:
            </label>
            <select id="soaMOP" name="soaMOP" class="form-control">
            <option id="soaMOP" name="soaMOP">Select MOP</option>
            <option id="soaMOP" name="soaMOP" value="Monthly">Monthly</option>
            <option id="soaMOP" name="soaMOP" value="Quarterly">Quarterly</option>
            <option id="soaMOP" name="soaMOP" value="Semi-Annual">Semi-Annual</option>
            <option id="soaMOP" name="soaMOP" value="Annual">Annual</option>
            </select>

            <br>
                <label class="control-label">
                Premium:
              </label><input type="text" class="form-control number" name="soa_premium" id="soa_premium" onchange="commissionAddSOA()" placeholder="Premium"><br>
              <div class="row">
                <div class="col-md-10">
                <label class="control-label">
                  Plan:
                  <input type="text" name="soa_planID" id="soa_planID" hidden>
                </label><input type="text" class="form-control number" name="soa_plan" id="soa_plan" placeholder="Plan">
              </div>
                <div class="col-md-2">
                <button style="margin-left: -14px; margin-top: 24px;" type="button" name="soa_planButton" id="soa_planButton" data-target="#planSearchAddSOA" data-toggle="modal" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
              </div>
              <br>

                <label class="control-label">
                Rate:
              </label><input type="text" class="form-control" name="soa_rate" id="soa_rate" placeholder="Rate"><br>
              <div style="margin-top: -7px;">
                <label class="control-label">
                Commission:
              </label><input type="text" class="form-control" name="soa_commission" id="soa_commission" placeholder="Commission"><br>
              </div>

            <div class="row">

              <div class="col-md-10">
            <label class="control-label">
            Agent:
          </label><input type="text" hidden name="soa_agent" id="soa_agent">
          <input type="text" class="form-control" name="soa_agentname" id="soa_agentname" placeholder="Agent">
            </div>
            <div class="col-md-2">
              <button type="button" class="btn btn-primary"name="soaAgent" id="soaAgent" data-toggle="modal" data-target="#searchAgent" style="margin-top: 24px; margin-left: -14px;"><i class="fa fa-search"></i></button>
            </div>
          </div>
          <br>
          <label class="control-label">
          Due Date:
        </label><input type="date" class="form-control" name="soa_dueDate" id="soa_dueDate">
        <input type="text" hidden name="soa_ID" id="soa_ID">
               <br>
             </div>
             </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="width: 100px;" name="soaSave" id="soaSave"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
              </div>
            </form>
          </div>
        </div>
