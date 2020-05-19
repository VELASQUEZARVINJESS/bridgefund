<?php 
	include_once '../../config.php';
	include_once '../../func/borrower/list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'borrowerList') {
			$data = (isset($_POST['data'])) ? sanitize_assoc($_POST['data']) : array();
			echo json_encode(getBorrowers($mysqli,$data),JSON_PRETTY_PRINT);
		}
	} else {
		echo json_encode(array('error'=>'Please login to process'));
	}
?>