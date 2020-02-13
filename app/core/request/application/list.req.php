<?php 
	include_once '../../config.php';
	include_once '../../func/application/list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'applicationList') {
			echo json_encode(getApplications($mysqli),JSON_PRETTY_PRINT);
		}
	} else {
		echo array('error'=>'Please login to proceed');
	}
?>