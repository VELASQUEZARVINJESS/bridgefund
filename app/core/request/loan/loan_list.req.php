<?php 
	include_once '../../config.php';
	include_once '../../func/loan/loan_list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getLoanList') {
			echo json_encode(getLoanList($mysqli),JSON_PRETTY_PRINT);
		}
	}
?>