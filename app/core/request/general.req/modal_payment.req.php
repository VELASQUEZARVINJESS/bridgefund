<?php 
	include_once '../../config.php';
	include_once '../../func/general.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getLoanPayment') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getLoanPayment($mysqli,$data),JSON_PRETTY_PRINT);
		} else if ($_POST['part'] == 'addLoanPayment') {
			$data = sanitize_assoc($_POST['data']);
			$data['due_date'] = date('Y-m-d', strtotime($data['due_date']));
			echo json_encode(addLoanPayment($mysqli,$data),JSON_PRETTY_PRINT);
		}
	}
?>