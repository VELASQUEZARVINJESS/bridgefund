<?php 
	function getborrowerWithEmployment($mysqli,$data) {
		$q = "SELECT
				b.borrower_no, b.gender, b.birthdate, b.civil_status AS 'civil',
				CONCAT(b.last_name,', ',b.first_name) AS 'borrower',
				b.mobile, b.email, b.landline, b.street, b.subdivision,
				CONCAT(b.barangay, ', ',b.city,', ',b.province) AS 'address', b.zipcode,
				e.position,e.monthly_salary AS 'smonthly',b.photo,
				e.annual_salary AS 'sannual',e.take_home_pay AS 'takehomepay',
				e.company_name AS 'employer',e.company_address AS 'caddress',
				e.hr_manager 'hmanager',e.hr_contact AS 'hcontact',e.hr_email AS 'hemail'
			FROM borrowers b
				LEFT JOIN borrowers_employer e ON b.borrower_no = e.borrower_no
			WHERE b.borrower_no = '{$data['id']}'";
		return $mysqli->query($q)->fetch_assoc();
	}
	function getLoanHistory($mysqli,$data) {
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
				LEFT JOIN (SELECT SUM(p.paid_amount) AS 'paid', p.penalty, p.loan_id FROM loan_payment p WHERE p.active = 1 GROUP BY p.loan_id) lp ON l.loan_id = lp.loan_id
				LEFT JOIN (SELECT s.sched, s.loanid, s.repayment AS 'due' FROM payment_sched s WHERE s.active = 1 GROUP BY s.loanid) sp ON l.loan_id = sp.loanid
			WHERE
				l.borrower_no = '{$data['id']}' AND
				l.active = 1";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
?>