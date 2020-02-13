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
		WHERE l.active = 1";
		return $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
	}
?>