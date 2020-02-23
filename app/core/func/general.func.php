<?php 
	// ***************** SECURITY ***********************
	function sanitize($data) { return addslashes(htmlentities(strip_tags(trim($data)))); }
	function sanitize_assoc($data){
		$val = array();
		foreach ($data as $key => $value) {
			$val[$key] = (!is_array($value)) ? sanitize($value) : $value ;
		}
		return $val;
	}
	function userencrypt($text) { return hash('sha512',md5($text)); }

	// ***************** USER ***********************
	function userInfo($mysqli,$u,$p) {
		return $mysqli->query("SELECT u.id, u.user, u.level FROM users u WHERE u.username = '$u' AND u.password = '$p' AND u.active = 1")->fetch_assoc();
	}
	function userLoginLog($mysqli){
		$mysqli->query("INSERT INTO userlogs(uid) VALUES(".@$_SESSION['app']['id'].")"); return $mysqli->insert_id;
	}

	// ***************** LIST EXTRACTION ***********************
	function getProvinces($mysqli) {
		return $mysqli->query("SELECT id, province FROM provinces WHERE active = 1 ORDER BY province")->fetch_all(MYSQLI_ASSOC);
	}
	function getCities($mysqli) {
		return $mysqli->query("SELECT id, provinceid, city FROM cities WHERE active = 1 ORDER BY city")->fetch_all(MYSQLI_ASSOC);
	}

	// ***************** BORROWER ***********************
	function getborrowerBasic($mysqli,$data) {
		$q = "SELECT
				b.id, b.gender, b.birthdate, b.civil_status AS 'civil',
				CONCAT(b.last_name,', ',b.first_name) AS 'borrower',
				b.mobile, b.email, b.landline, b.street, b.subdivision,
				CONCAT(b.barangay,b.city,b.province) AS 'address', b.zipcode
			FROM borrowers b
			WHERE b.borrower_no = '{$data['id']}'";
		return $mysqli->query($q)->fetch_assoc();
	}
	function getborrowerWithEmployment($mysqli,$data) {
		$q = "SELECT
				b.id, b.gender, b.birthdate, b.civil_status AS 'civil',
				CONCAT(b.last_name,', ',b.first_name) AS 'borrower',
				b.mobile, b.email, b.landline, b.street, b.subdivision,
				CONCAT(b.barangay, ', ',b.city,', ',b.province) AS 'address', b.zipcode,
				e.position,e.monthly_salary AS 'smonthly',
				e.annual_salary AS 'sannual',e.take_home_pay AS 'takehomepay',
				e.company_name AS 'employer',e.company_address AS 'caddress',
				e.hr_manager 'hmanager',e.hr_contact AS 'hcontact',e.hr_email AS 'hemail'
			FROM borrowers b
				LEFT JOIN borrowers_employer e ON b.borrower_no = e.borrower_no
			WHERE b.borrower_no = '{$data['id']}'";
		return $mysqli->query($q)->fetch_assoc();
	}
	function getBorrowerList($mysqli) {
		$q = "SELECT
				b.id, b.borrower_no, CONCAT(b.last_name,', ',b.first_name) AS 'borrower'
			FROM borrowers b
			WHERE b.active = 1";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
	function getBorrowerLoan($mysqli,$data) {
		$err = array();
		$q = "SELECT l.loan_amount, l.loan_interest, l.loan_duration, l.payment_start, l.repayment_cycle FROM borrowers_loan l WHERE loan_id = '{$data['loanid']}'";
		$res = $mysqli->query($q);
		if ($res->num_rows > 0) {
			return $res->fetch_assoc();
		} else {
			return array('error' => 'Error on retreiving loan details');
		}
	}

	function getLoanPayment($mysqli,$data) {
		$err = array();
		$q = "SELECT
				p.loanid,
				CONCAT(b.last_name,', ',b.first_name) AS 'borrower',
				p.sched AS 'due_date',
				p.repayment AS 'amount_due',
				p.term
			FROM payment_sched p
				LEFT JOIN borrowers_loan l ON p.loanid = l.loan_id
				LEFT JOIN borrowers b ON l.borrower_no = b.borrower_no
			WHERE
				p.loanid = '{$data['loanid']}' AND
				p.active = 1
			LIMIT 1";
		return $mysqli->query($q)->fetch_assoc();
	}

	function addLoanPayment($mysqli,$data) {
		$err = array();
		$q = "INSERT INTO loan_payment(loan_id,paid_amount,date_paid,penalty) VALUES('{$data['loanid']}','{$data['amount_due']}','{$data['due_date']}',0)";
		$mysqli->query($q) or array_push($err, "Error on adding payment");
		return (count($err) == 0) ? array('success'=>'Payment has been updated') : array('error'=>$err);
	}
?>