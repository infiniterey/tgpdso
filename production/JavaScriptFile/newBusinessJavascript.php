<script>


		function disableUpdateButton()
		{
			document.getElementById("receiptNo1").value = "";
			document.getElementById("policyNo1").value = "";

			window.location="newBusiness.php";


						$('#UpdateButton').hide();
						$('#SaveButton').show();

		}
		function ClickCancel()
		{
			$('#ModalEdit, #ModalDelete').hide("highlight1");
		}


		function enableUpdateButton()
		{
				document.getElementById("UpdateButton").disabled = false;
				document.getElementById("SaveButton").disabled = true;

		}
		function disableSaveButton()
		{
				document.getElementById("SaveButton").disabled = true;

		}

		function LogoutConfirm()
		{
			window.location = "index.php";
		}

function commission()
{
	var premium = document.getElementById("premium").value;
	var rate = document.getElementById("rate").value;
	var rate2 = premium / 100;
	var str = rate.slice(0, -1) ;
	str = str/100;
	var result = premium*str;
	fyc.value = premium*str;
	// window.alert(fyc.value);
	// document.getElementById("myText").value
}

function myFunction() {

  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("datatable-fixed-header1");
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
    $('#datatable-fixed-header02').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

$(document).ready(function() {
    $('#datatable-fixed-header3').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

$(document).ready(function() {
    $('#datatable-fixed-header1').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

$(document).ready(function() {
    $('#datatable-fixed-header').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );

</script>
