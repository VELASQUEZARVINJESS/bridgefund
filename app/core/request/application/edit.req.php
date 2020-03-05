<?php 
	include_once '../../config.php';
	include_once '../../func/application/edit.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getLoanInfo') {
            $data = sanitize_assoc($_POST['data']);
            echo json_encode(getLoanInfo($mysqli,$data),JSON_PRETTY_PRINT);
		} else if ($_POST['part'] == 'updateloan') {
            $data = array(); $data['photo'] = '';
			foreach($_POST['data'] as $key => $value){
				$data[$value['name']]=sanitize($value['value']);
            }
            $id = sanitize($_POST['id']);
            $img = $_POST['capture'];
            if ($img != '') {
                $data['photo'] = $data['applicant'].'_profile_'.date('YmdHi').'.png';
				$img = substr(explode(';', $img)[1], 7);
				file_put_contents('../../../../docs/'.$data['photo'], base64_decode($img));
			}
            echo json_encode(updateLoanInfo($mysqli,$data,$id),JSON_PRETTY_PRINT);
        }
	} else {
		echo array('eror'=>'Please login to proceed');
	}
?>