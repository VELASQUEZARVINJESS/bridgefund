<?php 
	include_once '../../config.php';
	include_once '../../func/general.func.php';
	include_once '../../func/application/list.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'imageCapture') {
			$img = $_POST['data']['image'];
			$img = substr(explode(';', $img)[1], 7);
			file_put_contents($_POST['data']['name'], base64_decode($img));
		}
	}
?>