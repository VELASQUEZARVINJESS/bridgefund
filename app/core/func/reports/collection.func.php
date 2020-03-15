<?php
	function getCollection($mysqli,$data) {
		$q = "SELECT
				CONCAT(b.last_name,', ',b.first_name) AS 'name',
				p.loan_id AS 'loanid',
				p.paid_amount AS 'amount',
				p.penalty,
				p.payment_type AS 'method',
				p.date_paid AS 'date',
				p.term,
				l.loan_duration AS 'duration',
				l.repayment_cycle AS 'cycle'
			FROM loan_payment p
				LEFT JOIN borrowers_loan l ON p.loan_id = l.loan_id
				LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
			WHERE p.date_paid BETWEEN '{$data['sdate']}' AND '{$data['edate']}'";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
?>