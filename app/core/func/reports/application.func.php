<?php
	function getApplicant($mysqli,$data) {
		$q = "SELECT
				CONCAT(b.last_name,', ',b.first_name) AS 'name',
				l.loan_id AS 'loanid',
				l.loan_amount AS 'amount',
				l.date_apply AS 'date',
				l.loan_duration AS 'term',
				l.loan_status AS 'status'
			FROM borrowers_loan l
				LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
			WHERE l.date_apply BETWEEN '{$data['sdate']}' AND '{$data['edate']}'";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
?>