<?php 
	include_once '../../config.php';
	include_once '../../func/borrower/edit.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getClientInfo') {
			$data = sanitize_assoc($_POST['data']);
			echo json_encode(getClientInfo($mysqli,$data),JSON_PRETTY_PRINT);
		} else if ($_POST['part'] == 'updateClientInfo') {
			$data = array();
			foreach($_POST['data'] as $key => $value){
				$data[$value['name']]=sanitize($value['value']);
			}
			$data['bdate'] = date('Y-m-d',strtotime($data['bdate']));
			echo json_encode(updateClientInfo($mysqli,$data,$_POST['id']),JSON_PRETTY_PRINT);
		}
	}
?>