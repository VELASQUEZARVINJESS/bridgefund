<?php
	function getApplications($mysqli) {
		$query = "SELECT
			l.loan_id,
			CONCAT(b.last_name, ', ' ,b.first_name) AS 'borrower',
			l.loan_purpose,
			l.loan_amount,
			l.loan_duration,
			l.repayment_cycle,
			l.loan_status,
			l.date_apply
		FROM borrowers_loan l
			LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
		WHERE (
				l.loan_status = 'PENDING' OR 
				(l.loan_status = 'APPROVE' AND l.payment_start IS NULL) OR 
				(l.loan_status = 'DECLINE' AND l.date_apply >= NOW() - INTERVAL 1 MONTH)
			)
			AND l.active = 1";
		return $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
	}
	function setSched($mysqli,$data) {
		$mysqli->autocommit(false); $err = array();
		$values = array(); $cntr = 1;
		$q1 = "UPDATE borrowers_loan l SET
				l.loan_payable = '{$data['payable']}',
				l.date_released = '{$data['releasedate']}',
				l.payment_start = '{$data['firstdate']}',
				l.payment_end = '{$data['lastdate']}',
				l.loan_status = 'ONGOING'
			WHERE l.loan_id = '{$data['loanid']}'";

		foreach ($data['table'] as $key => $v) {
			$date = date('Y-m-d',strtotime($v['date']));
			array_push($values, "('".$data['loanid']."',".$cntr.",'".$date."',".$v['repayment'].")");
			$cntr++;
		}

		$q2 = "INSERT INTO payment_sched(loanid,term,sched,repayment) VALUES".implode(',', $values);
		$mysqli->query($q1) or array_push($err, "Error on updating borrower loan details ".$mysqli->error);
		$mysqli->query($q2) or array_push($err, "Error on adding the payment schedule ".$mysqli->error);
		if (count($err) > 0) {
			$mysqli->rollback();
			$mysqli->query("ALTER TABLE payment_sched AUTO_INCREMENT = 1");
			return array('error', $err);
		} else {
			$mysqli->commit(); return array('success'=>"Loan schedule has been successfully added");
		}
	}

	function setApproveLoan($mysqli,$data) {
		$err = array();
		$mysqli->query("UPDATE borrowers_loan b SET b.loan_status = 'APPROVE' WHERE b.loan_id = '{$data['loanid']}'") or array_push($err, "Error on updating loan status");
		if (count($err) > 0) {
			return array('error' => $err);
		} else {
			return array('success' => "Loan application has been successfully approved");
		}
	}

	function setDeclineLoan($mysqli,$data) {
		$err = array();
		$mysqli->query("UPDATE borrowers_loan b SET b.loan_status = 'DECLINE' WHERE b.loan_id = '{$data['loanid']}'") or array_push($err, "Error on updating loan status");
		if (count($err) > 0) {
			return array('error' => $err);
		} else {
			return array('success' => "Loan application has been successfully declined");
		}
	}
?>