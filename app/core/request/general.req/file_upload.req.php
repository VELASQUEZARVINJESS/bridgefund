<?php 
	include_once '../../config.php';
	include_once '../../func/general.func.php';
	if (isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'upload') {
			$err = array();
			$target_dir = $_SERVER['DOCUMENT_ROOT'].'docs/';
			$target_file = $target_dir.basename($_FILES['docfile']['name']);
			$file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$check = getimagesize($_FILES["docfile"]["tmp_name"]);

			if ($check === false) {
				array_push($err, "File is not an image");
			}
			if (file_exists($target_file)) {
				array_push($err, "Sorry, file already exists");
			}
			
			if ($_FILES["docfile"]["size"] > 500000) {
				array_push($err, "Sorry, your file is too large");
			}
			if (!in_array($file_type, array('jpg','png','jpeg'))) {
				array_push($err, "Sorry, only JPG, JPEG & PNG files are allowed");
			}
			if (!file_exists($_SERVER['DOCUMENT_ROOT'].FOLDER.'docs/'.@$_POST['loanid'])) {
				mkdir($_SERVER['DOCUMENT_ROOT'].FOLDER.'docs/'.@$_POST['loanid'], 0777, true);
			}
			$target_path = $_SERVER['DOCUMENT_ROOT'].FOLDER.'docs/'.@$_POST['loanid'].'/'.@$_POST['loanid'].'_'.@$_POST['docname'].'.'.$file_type;
			if (count($err) == 0) {
				move_uploaded_file($_FILES['docfile']['tmp_name'], $target_path);
				echo json_encode(array('success' => "Upload successful"));
			} else {
				echo json_encode(array('error' => $err));
			}
            
		} else if ($_POST['part'] == 'loadimages') {
			$dir = $_SERVER['DOCUMENT_ROOT'].FOLDER."docs/".@$_POST['loanid']."/";
			if (is_dir($dir)) {
				$files = scandir($dir);
				array_shift($files);
				array_shift($files);
				echo json_encode($files);
			}
		}
	}
?>