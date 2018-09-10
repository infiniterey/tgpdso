<script>

Date.isLeapYear = function (year) {
		return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0));
};

Date.getDaysInMonth = function (year, month) {
		return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
};

Date.prototype.isLeapYear = function () {
		return Date.isLeapYear(this.getFullYear());
};

Date.prototype.getDaysInMonth = function () {
		return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
};

Date.prototype.addMonths = function (value) {
		var n = this.getDate();
		this.setDate(1);
		this.setMonth(this.getMonth() + value);
		this.setDate(Math.min(n, this.getDaysInMonth()));
		return this;
};

</script>

<script>

//var date = $("#paymentNextDueADD").val();
//var date1 = $("#paymentIssueDate").val();
//if(date == "")
//{
//	$('policyDueDate').val(date1);
//}


var selectPayment = $("#paymentmodeOfPayment").val();
if(selectPayment == "Monthly")
{
	var datehere = document.getElementById("paymentNextDueADD").value;
	var dateObj = new Date(datehere);
	var dt = dateObj.addMonths(1);
	var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
	$('#policyDueDate').val(newdate);
	$('#paymentNextDue').val(newdate);
}
else if(selectPayment == "Quarterly")
{
	var datehere = document.getElementById("paymentNextDueADD").value;
	var dateObj = new Date(datehere);
	var dt = dateObj.addMonths(4);
	var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
	$('#policyDueDate').val(newdate);
	$('#paymentNextDue').val(newdate);
}
else if(selectPayment == "Semi-Annual")
{
	var datehere = document.getElementById("paymentNextDueADD").value;
	var dateObj = new Date(datehere);
	var dt = dateObj.addMonths(6);
	var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
	$('#policyDueDate').val(newdate);
	$('#paymentNextDue').val(newdate);
}
else if(selectPayment == "Annual")
{
	var datehere = document.getElementById("paymentNextDueADD").value;
	var dateObj = new Date(datehere);
	var dt = dateObj.addMonths(12);
	var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
	$('#policyDueDate').val(newdate);
	$('#paymentNextDue').val(newdate);
}

$(function() {
    $('#paymentmodeOfPayment').change(function() {
        var selectedValue = $("#paymentmodeOfPayment").val();
				if(selectedValue == "Monthly")
				{
					var datehere = document.getElementById("paymentNextDueADD").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(1);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Quarterly")
				{
					var datehere = document.getElementById("paymentNextDueADD").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(4);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Semi-Annual")
				{
					var datehere = document.getElementById("paymentNextDueADD").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(6);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
				else if(selectedValue == "Annual")
				{
					var datehere = document.getElementById("paymentNextDueADD").value;
					var dateObj = new Date(datehere);
					var dt = dateObj.addMonths(12);
					var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
					$('#policyDueDate').val(newdate);
					$('#paymentNextDue').val(newdate);
					document.getElementById("paymentmodeOfPayment").value = selectedValue;
				}
    });

		$('#payment_nextDue').change(function() {
			var getter = document.getElementById("paymentNextDueADD").value;
			var dat = new Date(getter);
			var copyOf = new Date(dat.valueOf());

			$('#policyDueDate').val(copyof);
    });
				$('#sample').val(selectedValue);

});

$(".readonly").on('keydown paste', function(e){
		e.preventDefault();
});

</script>
