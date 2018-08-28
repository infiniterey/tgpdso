<script>
$(function() {

		$('#paymentmodeOfPayment').change(function()
		{
			var selectPayment = $("#paymentmodeOfPayment").val();
			if(selectPayment == "Monthly")
			{
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(1);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
			else if(selectPayment == "Quarterly")
			{
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(4);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
			else if(selectPayment == "Semi-Annual")
			{
				document.getElementById("policyMOP").value = selectPayment;
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(6);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
			else if(selectPayment == "Annual")
			{
				document.getElementById("policyMOP").value = selectPayment;
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(12);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
		});
    $('#policyMOP').change(function() {
        var selectedValue = $("#policyMOP").val();
				if(selectedValue == "Monthly")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(1);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Quarterly")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(4);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Semi-Annual")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(6);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Annual")
				{
					var datehere = document.getElementById("policyIssueDate").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(12);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
    });

		$('#policyIssueDate').change(function() {
			var getter = document.getElementById("policyIssueDate").value;
			var dat = new Date(getter);
			var copyOf = new Date(dat.valueOf());

			$('#policyDueDate').val(copyof);
    });
				$('#sample').val(selectedValue);

});
</script>
