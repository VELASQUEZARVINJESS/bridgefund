<?php 
	include_once '../../config.php';
	include_once '../../func/application/new.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'applyloan') {
			foreach($_POST['data'] as $key => $value){
				$frmVal[$value['name']] = sanitize($value['value']);
			}
			echo json_encode(setNewApplication($mysqli,$frmVal),JSON_PRETTY_PRINT);
		}
	} else {
		echo array('eror'=>'Please login to proceed');
	}
?>