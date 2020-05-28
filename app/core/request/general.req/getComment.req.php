<?php 
	include_once '../../config.php';
	include_once '../../func/general.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'getcomment') {
            $data = sanitize_assoc($_POST['data']);
            if ($data['page'] == 'borrower') {
                echo json_encode(getCommentBorrower($mysqli,$data));
            } else if ($data['page'] == 'loan') {
                echo json_encode(getCommentLoan($mysqli,$data));
            }
		}
		else if ($_POST['part'] == 'setcomment') {
            $data = sanitize_assoc($_POST['data']);
            if ($data['page'] == 'borrower') {
                echo json_encode(setCommentBorrower($mysqli,$data));
            } else if ($data['page'] == 'loan') {
                echo json_encode(setCommentLoan($mysqli,$data));
            }
		}
	}
?>