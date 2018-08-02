    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
    <title>TMS - TGPDSO Monitoring System</title>
    <?php
    	include 'confg.php';
    	include 'pdo.php';
    	include_once 'createdb.php';


    	session_start();
    	?>

    	<?php
    if(isset($_POST['logout']))
    {
    		session_destroy();
    		unset($_SESSION['logout']);
    		?>
    		<script>
    		alert('Successfully logout - TGP');
    		window.location="tgpdso/index.php";
    		</script>

    		<?php
    }
    	 ?>


<style type="text/css">

   .scrollbar{
   	height: 100%;
   	width: 100%;
   	overflow: auto;
   }
   ::-webkit-scrollbar {
       width: 1px;
     }
   .center {
     position: absolute;
     left: 50%;
     top: 50%;
     transform: translate(-50%, -50%);
   }
   .column {
       float: left;
       padding: 10px;
       /* height: 300px; /* Should be removed. Only for demonstration */ */
   }
   .row:after {
       content: "";
       display: table;
       clear: both;
       .tab {
           overflow: hidden;
           border: 1px solid #ccc;
           background-color: #f1f1f1;
       }

       /* Style the buttons inside the tab */
     .tab button {
         background-color: inherit;
         float: left;
         border: none;
         outline: none;
         cursor: pointer;
         padding: 14px 16px;
         transition: 0.3s;
         font-size: 17px;
     }

     /* Change background color of buttons on hover */
     .tab button:hover {
         background-color: #ddd;
     }

     /* Create an active/current tablink class */
     .tab button.active {
         background-color: #ccc;
     }

     /* Style the tab content */
     .tabcontent {
         display: none;
         padding: 6px 12px;
         border: 1px solid #ccc;
         border-top: none;
     }

   }


   /* Change background color of buttons on hover */

   /* Style the tab content */
   #inputvaluedelete,#inputvaluedelete2,#modalprod,#modalcode,#modalplan{display:none}
   #edit, #deleted, #UpdateButton, #ModalEdit, #ModalDelete { display: none;}
   #temp,#temp2,#temp3,#contain1,#contain2{ display: none;}
   #formko,#inputvaluedelete,#inputvaluedelete2{display:none}
   #inputvaluedelete,#inputvaluedelete2,#modalprod,#modalcode,#modalplan,#codeInputTextBox{display:none}
</style>
