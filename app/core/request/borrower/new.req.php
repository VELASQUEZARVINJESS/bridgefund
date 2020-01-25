<?php 
	include_once '../../config.php';
	include_once '../../func/borrower/new.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part']=='addBorrower') {
			$frmVal = array();
			foreach($_POST['frm'] as $key => $value){
				$frmVal[$value['name']]=sanitize($value['value']);
			}
			echo json_encode(addBorrower($mysqli,$frmVal),JSON_PRETTY_PRINT);
		}
	}
?>