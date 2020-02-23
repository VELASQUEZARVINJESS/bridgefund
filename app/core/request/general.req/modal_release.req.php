<?php 
	include_once '../../config.php';
	include_once '../../func/general.func.php';
	include_once '../../func/application/list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'borrowerLoan') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getBorrowerLoan($mysqli,$data),JSON_PRETTY_PRINT);
		} else if ($_POST['part'] == 'setSched') {
			$data = sanitize_assoc($_POST['data']);
			$data['releasedate'] = date('Y-m-d', strtotime($data['releasedate']));
			$data['firstdate'] = date('Y-m-d', strtotime($data['firstdate']));
			$data['lastdate'] = date('Y-m-d', strtotime($data['lastdate']));
			echo json_encode(setSched($mysqli,$data),JSON_PRETTY_PRINT);
		}
	}
?>