<?php 
	include_once '../../config.php';
	include_once '../../func/loan/loan_details.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getLoanInfo') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getLoanInfo($mysqli,$data),JSON_PRETTY_PRINT);
		} else if ($_POST['part'] == 'getLoanSched') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getLoanSched($mysqli,$data),JSON_PRETTY_PRINT);
		} else if ($_POST['part'] == 'getClientDetails') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getClientDetails($mysqli,$data),JSON_PRETTY_PRINT);
		}
	}
?>