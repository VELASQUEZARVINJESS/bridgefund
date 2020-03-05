<?php 
	include_once '../../config.php';
	include_once '../../func/application/new.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'applyloan') {
			foreach($_POST['data'] as $key => $value){
				$frmVal[$value['name']] = sanitize($value['value']);
			}
			$frmVal['photo'] = $frmVal['applicant'].'_profile_'.date('YmdHi').'.png';
			$img = $_POST['capture'];
			if ($img != '') {
				$img = substr(explode(';', $img)[1], 7);
				file_put_contents('../../../../docs/'.$frmVal['photo'], base64_decode($img));
				echo json_encode(setNewApplication($mysqli,$frmVal),JSON_PRETTY_PRINT);	
			} else {
				echo json_encode(array('error' => 'Please upload the borrower photo'),JSON_PRETTY_PRINT);
			}
		}
	} else {
		echo array('eror'=>'Please login to proceed');
	}
?>