<?php 
	function getLoanList($mysqli) {
		$q = "SELECT
				CONCAT(b.last_name, ', ', b.first_name) AS 'name',
				l.loan_id AS 'loanid',
				l.loan_interest AS 'interest',
				l.date_released AS 'released',
				l.payment_end AS 'maturity',
				l.loan_payable AS 'payable',
				l.loan_status AS 'status',
				l.repayment_cycle AS 'repayment',
				IFNULL(lp.paid, 0) AS 'paid',
				IFNULL(lp.penalty, 0) AS 'penalty',
				sp.due,
				sp.sched
			FROM borrowers_loan l 
				LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
				LEFT JOIN (SELECT SUM(p.paid_amount) AS 'paid', SUM(p.penalty) AS 'penalty', p.loan_id FROM loan_payment p WHERE p.active = 1 GROUP BY p.loan_id) lp ON l.loan_id = lp.loan_id
				LEFT JOIN (SELECT s.sched, s.loanid, s.repayment AS 'due' FROM payment_sched s WHERE s.active = 1 GROUP BY s.loanid) sp ON l.loan_id = sp.loanid
			WHERE
				l.loan_status = 'ONGOING' AND
				l.payment_end > NOW() AND
				sp.due IS NOT NULL AND
				IFNULL(lp.paid, 0) < l.loan_payable AND
				l.active = 1";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
?>