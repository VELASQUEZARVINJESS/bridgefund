<?php 
	include_once '../../config.php';
	include_once '../../func/general.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'changepass') {
			$data = sanitize_assoc($_POST['data']);
            echo json_encode(updatePass($mysqli,$data));
		}
	}
?>