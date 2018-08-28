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

$(document).ready(function () {
    $('#policyIssueDate').datepicker();
    $('#policyDueDate').datepicker();
});

$(function() {

		$('#paymentmodeOfPayment').change(function()
		{
			var selectPayment = $("#paymentmodeOfPayment").val();
			if(selectPayment == "Monthly")
			{
				document.getElementById("policyMOP").value = selectPayment;
				var datehere = document.getElementById("policyIssueDate").value;
				var dateObj = new Date(datehere);
				var dt = dateObj.addMonths(1);
				var newdate = dt.getFullYear() + '-' + (((dt.getMonth() + 1) < 10) ? '0' : '') + (dt.getMonth() + 1) + '-' + ((dt.getDate() < 10) ? '0' : '') + dt.getDate();
				$('#policyDueDate').val(newdate);
				$('#paymentNextDue').val(newdate);
			}
			else if(selectPayment == "Quarterly")
			{
				document.getElementById("policyMOP").value = selectPayment;
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




window.onload = function () {
								startTab();
							};

function startTab() {
								document.getElementById("defaultOpen").click();
							}

function openPolicy(evt, tabName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the link that opened the tab
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }

						function myFunction() {

						  var input, filter, table, tr, td, i;
						  input = document.getElementById("myInput");
						  filter = input.value.toUpperCase();
						  table = document.getElementById("datatable-fixed-header");
						  tr = table.getElementsByTagName("tr");


						  for (i = 0; i < tr.length; i++) {
						    td = tr[i].getElementsByTagName("td")[0];
						    if (td) {
						      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
						        tr[i].style.display = "";
						      } else {
						        tr[i].style.display = "none";
						      }
						    }
						  }
						}

						$(document).ready(function() {
								$('#datatable-fixed-header0').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

						$(document).ready(function() {
								$('#datatable-fixed-header').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );
						$(document).ready(function() {
								$('#datatable-fixed-header1').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );
						$(document).ready(function() {
								$('#datatable-fixed-header-1').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

						$(document).ready(function() {
								$('#datatable-fixed-header10').DataTable( {
										"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								} );
						} );

						$(document).ready(function() {

  					if(window.location.href.indexOf('#fundModal') != -1) {
    				$('#fundModal').modal('show');
  					}
					});

					function boxChecked() {
  					var checkBox = document.getElementById("box");
  					var firstname = document.getElementById("firstname1").value;
						var lastname = document.getElementById("lastname1").value;
						var middlename = document.getElementById("middlename1").value;
						var birthdate = document.getElementById("birthdate1").value;
						var address = document.getElementById("address1").value;
						var contactno = document.getElementById("contactno1").value;


  						if (checkBox.checked == true)
								{
									document.getElementById("insuredLastName").value = lastname;
									document.getElementById("insuredFirstName").value = firstname;
									document.getElementById("insuredMiddleName").value = middlename;
									document.getElementById("insuredBirthdate").value = birthdate;
									document.getElementById("insuredAddress").value = address;
									document.getElementById("insuredContactno").value = contactno;
  							}
								else
									{
										document.getElementById("insuredLastName").value = "";
										document.getElementById("insuredFirstName").value = "";
										document.getElementById("insuredMiddleName").value = "";
										document.getElementById("insuredBirthdate").value = "";
										document.getElementById("insuredAddress").value = "";
										document.getElementById("insuredContactno").value = "";
  								}
								}

								$(document).ready(function() {
								    $('#datatable-fixed-header2').DataTable( {
								        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
								    } );
								} );


								$(document).ready(function(){
									if(!$('#policyIssuedDate').val()){
									    $('#paymentButton').show();
									}
									else {
									    $('#paymentButton').show();
									}
								});

								document.getElementById("beneLastName").addEventListener("keyup", function() {
    						var nameInput = document.getElementById('beneLastName').value;
    						if (nameInput != "")
								{
        					document.getElementById('addBeneficiaryButton').removeAttribute("disabled");
    						}
								else
								{
        					document.getElementById('addBeneficiaryButton').setAttribute("disabled", null);
    						}
							});

							$('#searchT').on("keypress", function(e) {
        			if (e.keyCode == 13) {
								var searchValue = document.getElementById('searchT').value;
								window.location="records.php?edit="+searchValue+"";
        				}
							});

              document.getElementById("beneLastName").addEventListener("keyup", function() {
              var nameInput = document.getElementById('beneLastName').value;
              if (nameInput != "")
              {
                document.getElementById('addBeneficiaryButton').removeAttribute("disabled");
              }
              else
              {
                document.getElementById('addBeneficiaryButton').setAttribute("disabled", null);
              }
              });

</script>
