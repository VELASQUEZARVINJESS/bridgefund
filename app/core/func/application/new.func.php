<?php 
	function setNewApplication($mysqli,$data) {
		$mysqli->autocommit(false); $err = array(); $counter = 0;
		$myq = $mysqli->query("SELECT MAX(loan_id) AS 'L' FROM borrowers_loan");
		$row = $myq->num_rows;
		if ($row > 0) {
			$counter = (int) substr($myq->fetch_assoc()['L'], 1);
		}
		$id = sprintf("L%09d", $counter + 1);
		$q1 = "INSERT INTO  borrowers_loan(
				borrower_no,loan_id,loan_amount,loan_purpose,loan_duration,
				loan_interest,repayment_cycle,addby,
				bank_name,bank_branch,bank_account,date_apply)
			VALUES(
				'{$data['applicant']}','$id','{$data['amount']}','{$data['loanpurpose']}','{$data['duration']}',
				'{$data['interest']}','{$data['repaymentcycle']}','{$_SESSION['app']['id']}',
				'{$data['bankname']}','{$data['bankbranch']}','{$data['bankaccount']}',CURDATE()
			)";

		$mysqli->query($q1) or array_push($err, "Error on adding loan application ".$mysqli->error);
		if (count($err) > 0) {
			$mysqli->rollback();
			return array('error' => $err);
		} else {
			$mysqli->commit();
			return array('success' => 'Application added successfuly');
		}
	}
	
?>