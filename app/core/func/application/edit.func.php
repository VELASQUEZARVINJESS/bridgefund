<?php
	function getLoanInfo($mysqli,$data) {
		$q = "SELECT 
				l.borrower_no,
				l.coborrower,
				l.loan_amount,
				l.loan_purpose,
				l.loan_interest,
				l.loan_duration,
				l.repayment_cycle,
				l.process_fee,
				l.notary_fee,
				l.bank_name,
				l.bank_account,
				l.bank_branch,
				b.photo,
				CONCAT(b.last_name, ', ', b.first_name) AS 'client'
			FROM borrowers_loan l
				LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
			WHERE l.loan_id = '{$data['id']}'";
		return $mysqli->query($q)->fetch_assoc();
	}

	function updateLoanInfo($mysqli,$data,$id) {
		$mysqli->autocommit(false); $err = array();
		$q1 = "UPDATE borrowers_loan l SET
				l.coborrower = '{$data['coborrower']}',
				l.loan_purpose = '{$data['loanpurpose']}',
				l.loan_amount = '{$data['amount']}',
				l.loan_interest = '{$data['interest']}',
				l.loan_duration = '{$data['duration']}',
				l.repayment_cycle = '{$data['repaymentcycle']}',
				l.bank_name = '{$data['bankname']}',
				l.bank_account = '{$data['bankaccount']}',
				l.bank_branch = '{$data['bankbranch']}'
			WHERE l.loan_id = '$id'";

		$q2 = "UPDATE borrowers b SET b.photo = '{$data['photo']}' WHERE b.borrower_no = '{$data['applicant']}'";
		$q3 = "SELECT b.photo FROM borrowers b WHERE b.borrower_no = '{$data['applicant']}'";
		$photo = $mysqli->query($q3)->fetch_assoc()['photo'];
		if ($photo != $data['photo']) {
			$mysqli->query($q2);
			if ($mysqli->affected_rows == 1) {
				$path = '../../../../docs/'.$photo;
				unlink('../../../../docs/'.$photo);
			} else {
				array_push($err, "Error on updating profile photo ".$mysqli->error);
			}
		}
		$mysqli->query($q1) or array_push($err, "Error on updating profile info ".$mysqli->error);

		if (count($err) > 0) {
			$mysqli->rollback(); return array('error'=>$err);
		} else {
			$mysqli->commit(); return array('success'=>'Loan application has bee updated');
		}
	}
?>