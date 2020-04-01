<?php 
	include_once '../../config.php';
	include_once '../../func/admin/list.employee.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'employeeList') {
			echo json_encode(getEmployee($mysqli),JSON_PRETTY_PRINT);
		}
	} else {
		echo 'no if';
	}
?>