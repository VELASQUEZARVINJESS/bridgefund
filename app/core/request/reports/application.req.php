<?php 
	include_once '../../config.php';
	include_once '../../func/reports/application.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getApplicant') {
			$data = sanitize_assoc($_POST['data']);
			$data['sdate'] = date('Y-m-d', strtotime($data['sdate']));
			$data['edate'] = date('Y-m-d', strtotime($data['edate']));
			echo json_encode(getApplicant($mysqli,$data),JSON_PRETTY_PRINT);
		}
	}
?>