<!-- set up the modal to start hidden and fade in and out -->
<div id="bootbox" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        Process is sucessful!
      </div>
      <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div>
    </div>
  </div>
</div>

<!-- sometime later, probably inside your on load event callback -->
<script>
    $("#bootbox").on("show", function() {    // wire up the OK button to dismiss the modal when shown
        $("#bootbox a.btn").on("click", function(e) {
            console.log("button pressed");   // just as an example...
            $("bootbox").modal('hide');     // dismiss the dialog
        });
    });
    $("#bootbox").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#bootbox a.btn").off("click");
    });

    $("#bootbox").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#bootbox").remove();
    });

    $("#bootbox").modal({                    // wire up the actual modal functionality and show the dialog
      "backdrop"  : "static",
      "keyboard"  : true,
      "show"      : true                     // ensure the modal is shown immediately
    });
</script>
