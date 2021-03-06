<?php 
	function getLoanInfo($mysqli,$data) {
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
				l.loan_status AS 'status',
				l.check_no AS 'checkno',
				sp.due,
				sp.sched
			FROM borrowers_loan l 
				LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
				LEFT JOIN (SELECT SUM(p.paid_amount) AS 'paid', SUM(p.penalty) AS 'penalty', p.loan_id FROM loan_payment p WHERE p.active = 1 GROUP BY p.loan_id) lp ON l.loan_id = lp.loan_id
				LEFT JOIN (SELECT s.sched, s.loanid, s.repayment AS 'due' FROM payment_sched s WHERE s.active = 1 GROUP BY s.loanid) sp ON l.loan_id = sp.loanid
			WHERE
				l.loan_id = '{$data['id']}' AND
				l.active = 1";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
	function getLoanSched($mysqli,$data) {
		$q = "SELECT
				ps.date,
				ps.amount,
				ps.penalty,
				ps.term,
				ps.status,
				ps.method
			FROM (
					(SELECT p.date_paid AS 'date', p.paid_amount AS 'amount', p.penalty, p.term, 'paid' AS 'status', p.payment_type AS 'method' FROM loan_payment p WHERE p.loan_id = '{$data['id']}' AND p.active = 1)
					UNION ALL
					(SELECT s.sched AS 'date', s.repayment AS 'amount', 0 AS 'penalty', s.term, 'scheduled' AS 'status', '' AS 'method' FROM payment_sched s WHERE s.loanid = '{$data['id']}' AND s.active = 1)
				) ps";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
	function getClientDetails($mysqli,$data) {
		$q = "SELECT
				b.borrower_no AS 'id',
				CONCAT(b.first_name, ', ', b.last_name) AS 'client',
				b.gender,
				b.barangay,
				b.subdivision,
				b.street,
				b.city,
				b.province,
				b.zipcode,
				b.mobile,
				b.email,
				b.landline
			FROM borrowers_loan l
				LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
			WHERE
				l.loan_id = '{$data['id']}'";
		return $mysqli->query($q)->fetch_assoc();
	}
	function getLoanTerm($mysqli,$data) {
		$q = "SELECT
				l.loan_amount AS 'principal',
				l.loan_purpose AS 'product',
				l.loan_duration AS 'tenure',
				l.loan_status AS 'status',
				l.loan_interest AS 'interest',
				l.repayment_cycle AS 'cycle',
				l.date_apply,
				l.date_released AS 'release',
				l.payment_start AS 'start',
				l.payment_end AS 'maturity',
				l.bank_name AS 'bank',
				l.bank_account AS 'account',
				l.bank_branch AS 'branch',
				l.process_fee AS 'processfee',
				l.notary_fee AS 'notaryfee',
				(SELECT CONCAT(b.last_name, ', ', b.first_name) FROM borrowers b WHERE b.borrower_no = l.coborrower LIMIT 1) AS 'coborrower' 
			FROM borrowers_loan l
			WHERE l.loan_id = '{$data['id']}'";
		return $mysqli->query($q)->fetch_assoc();
	}
?>