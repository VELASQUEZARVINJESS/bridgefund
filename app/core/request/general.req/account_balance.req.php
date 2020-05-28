<?php 
	include_once '../../config.php';
	include_once '../../func/general.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getbal') {
			echo json_encode(getAccntBal($mysqli),JSON_PRETTY_PRINT);
		}
	}
?>