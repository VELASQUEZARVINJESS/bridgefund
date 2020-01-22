<?php 
	include_once '../../config.php';
	include_once '../../func/borrower/list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'borrowerList') {
			echo json_encode(getBorrowers($mysqli),JSON_PRETTY_PRINT);
		}
	} else {
		echo 'no if';
	}
?>