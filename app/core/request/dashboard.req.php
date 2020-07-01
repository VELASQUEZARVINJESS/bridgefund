<?php 
	include_once '../config.php';
	include_once '../func/dashboard.func.php';
	if (isset($_POST['part']) && isset($_SESSION['app']['id'])) {
		if ($_POST['part'] == 'bank') {
			echo json_encode(getBankBalance($mysqli));
		} else if ($_POST['part'] == 'loanStatus') {
            $data = getLoanStatus($mysqli);
            $d = array();
            foreach ($data as $key => $value) {
                if ($value['loan_status'] == 'PENDING') {
                    $d['pending'] = $value['count'];
                }else if($value['loan_status'] == 'APPROVE' || $value['loan_status'] == 'ONGIONG') {
                    $d['approve'] = $value['count'];
                } else if ($value['loan_status'] == 'DECLINE') {
                    $d['decline'] = $value['count'];
                }
            }
            echo json_encode($d);
		} else if ($_POST['part'] == 'totalBorrowers') {
			echo json_encode(getTotalBorrowers($mysqli));
		} else if ($_POST['part'] == 'activeLoans') {
			echo json_encode(getActiveLoan($mysqli));
		} else if ($_POST['part'] == 'recentTrans') {
			echo json_encode(getLogs($mysqli));
		} else if ($_POST['part'] == 'getUpcomingPayment') {
			echo json_encode(getUpcomingPayment($mysqli));
		}
    } 
?>