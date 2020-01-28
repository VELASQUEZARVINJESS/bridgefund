<?php 
	include_once '../../config.php';
	include_once '../../func/borrower/list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'provinceList') {
			echo json_encode(getProvinces($mysqli),JSON_PRETTY_PRINT);
		}
		else if ($_POST['part'] == 'cityList') {
			echo json_encode(getCities($mysqli),JSON_PRETTY_PRINT);
		}
	}
?>