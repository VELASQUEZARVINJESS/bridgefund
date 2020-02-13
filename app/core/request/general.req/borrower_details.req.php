<?php 
	include_once '../../config.php';
	include_once '../../func/borrower/list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'borrowerWithEmployment') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getborrowerWithEmployment($mysqli,$data),JSON_PRETTY_PRINT);
		}else if ($_POST['part'] == 'borrowerBasic') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getborrowerBasic($mysqli,$data),JSON_PRETTY_PRINT);
		}else if ($_POST['part'] == 'borrowerSelect') {
			echo json_encode(getBorrowerList($mysqli));
		}
	}
?>