<div class="clearfix"></div>

<!-- menu profile quick info -->
<?php include 'base/sessionsidebar.php';?>
<!-- /menu profile quick info -->

<br />

<!-- sidebar menu -->
<?php

$usertype1 = $_SESSION['usertype'];
if($usertype1 == 'secretary' || $usertype1 == 'Secretary')
{
   include 'base/sidebar.php';
}
else
{
   include 'base/sidebarAdmin.php';
}
?>

<!-- /sidebar menu -->
