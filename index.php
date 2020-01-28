<?php ob_start(); require_once 'app/core/config.php';?>
<!DOCTYPE html>
<html lang="en">
<?php include_once PATH_PRT.'layout_head.php';?>
<body class="hold-transition text-sm <?php echo ($_SESSION['app']['id']) ? 'sidebar-mini sidebar-collapse' : 'login-page';?>">
<!-- <div class="print_out"></div> -->
<?php
	include_once PATH_PRT.'comp_script.php';
	if (isset($_SESSION['app']['id']) && in_array($_SESSION['app']['level'], array(0, 1, 2, 3, 4))) {
		include_once PATH_PRT.'layout_content.php';
	} else {
		include_once PATH_PGE.'login.php';
	}
?></body></html><?php ob_flush();?>