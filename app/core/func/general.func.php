<?php 
	// ***************** SECURITY ***********************
	function sanitize($data) { return addslashes(htmlentities(strip_tags(trim($data)))); }
	function sanitize_assoc($data) {
		$val = array();
		foreach ($data as $key => $value) {
			$val[$key] = (!is_array($value)) ? sanitize($value) : $value ;
		}
		return $val;
	}
	function userencrypt($text) { return hash('sha512',md5($text)); }

	// ***************** LOGS ***********************
	function logs($ref, $amount, $trans) {
		global $mysqli;
		$mysqli->query("INSERT INTO trans_log(trans,amount,ref,addby) VALUES('$trans','$amount','$ref','{$_SESSION['app']['name']}')") or die($mysqli->error);
	}

	// ***************** USER ***********************
	function userInfo($mysqli,$u,$p) {
		return $mysqli->query("SELECT u.id, u.user, u.level, u.name FROM users u WHERE u.username = '$u' AND u.password = '$p' AND u.active = 1")->fetch_assoc();
	}
	function userLoginLog($mysqli) {
		$mysqli->query("INSERT INTO userlogs(uid) VALUES(".@$_SESSION['app']['id'].")"); return $mysqli->insert_id;
	}
	function updatePass($mysqli,$data) {
		$err = array(); $new = userencrypt($data['newpass']); $cur = userencrypt($data['curpass']);
		$mysqli->query("UPDATE users u SET u.password = '$new' WHERE u.password = '$cur' AND u.id = '{$_SESSION['app']['id']}'") OR array_push($err, 'An error occured while updating the password!');
		if ($mysqli->affected_rows == 0) { array_push($err,'Invalid current password'); }
		return (count($err) > 0) ? array('error' => $err) : array('success' => 'Password updated successfully');
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
		$err = array(); $mysqli->autocommit(false);
		$q1 = "INSERT INTO loan_payment(loan_id,paid_amount,date_paid,penalty,addby,term,payment_type) VALUES('{$data['loanid']}','{$data['amount_due']}','{$data['due_date']}','{$data['penalty']}','{$_SESSION['app']['id']}','{$data['term']}','{$data['pay_method']}')";
		$q2 = "UPDATE payment_sched p SET p.active = 0 WHERE loanid = '{$data['loanid']}' AND p.term = '{$data['term']}'";
		$mysqli->query($q2);
		if ($mysqli->affected_rows > 0) {
			if ($mysqli->query($q1)) {
				if ($data['due'] != $data['amount_due']) {
					$nextpayment = $mysqli->query("SELECT p.repayment FROM payment_sched p WHERE p.loanid = '{$data['loanid']}' AND p.active = 1 LIMIT 1")->fetch_assoc()['repayment'];
					$amount = 0;
					if (is_numeric($nextpayment) && $nextpayment > 0) {
						if ($data['due'] < $data['amount_due']) {
							$amount = $nextpayment - ($data['amount_due'] - $data['due']);
						} else if ($data['due'] > $data['amount_due']) {
							$amount = $nextpayment + abs($data['amount_due'] - $data['due']);
						}
					}
					$mysqli->query("UPDATE payment_sched p SET p.repayment = '$amount' WHERE p.loanid = '{$data['loanid']}' AND active = 1 LIMIT 1");
					if ($mysqli->affected_rows > 0) {
						$mysqli->query("UPDATE accounts a SET a.balance = (a.balance + $amount) WHERE a.atype = 'Cash'");
						logs($data['loan_id'],$data['amount_due'],'Payment');
						$mysqli->commit(); return array('success'=>"Payment has been successfully updated");
					} else {
						array_push($err, "Error passing excess payment to the next cutoff");
					}
				} else {
					$amount = $data['amount_due'];
					$mysqli->query("UPDATE accounts a SET a.balance = (a.balance + $amount) WHERE a.atype = 'Cash'");
					logs($data['loanid'],$data['amount_due'],'Payment');
					$mysqli->commit(); return array('success'=>"Payment has been successfully updated");
				}
			} else {
				array_push($err, "Error on adding payment");
			}
		} else {
			array_push($err, "Error on updating payment sched");
		}
		if (count($err) > 0) {
			$mysqli->rollback();
			return array('error'=>$err);
		}
	}
	
	function getLoanPaymentInfo($mysqli,$data) {
		$q = "SELECT 
				p.paid_amount AS 'amount_due',
				p.penalty,
				p.date_paid AS 'due_date',
				p.payment_type AS 'paytype',
				p.loan_id AS 'loanid',
				p.term,
				CONCAT(b.last_name, ', ', b.first_name) AS 'borrower'
			FROM loan_payment p
				LEFT JOIN borrowers_loan l ON p.loan_id = l.loan_id
				LEFT JOIN borrowers b ON b.borrower_no = l.borrower_no
			WHERE p.loan_id = '{$data['loanid']}'
				AND p.term = '{$data['term']}'";

		return $mysqli->query($q)->fetch_assoc();
	}
	
	function updateLoanPayment($mysqli, $data) {
		$err = array(); $mysqli->autocommit(false);
		$q = "UPDATE loan_payment p SET
				p.penalty = '{$data['penalty']}',
				p.paid_amount = '{$data['amount_due']}',
				p.date_paid = '{$data['due_date']}',
				p.payment_type = '{$data['pay_method']}',
				p.editby = '{$_SESSION['app']['id']}'
			WHERE p.loan_id = '{$data['loanid']}'
				AND p.term = '{$data['term']}'";
		// $mysqli->query($q) or array_push($err, "Error on updating payment details ".$mysqli->error);
		if ($mysqli->query($q)) {
			if ($data['due'] != $data['amount_due']) {
				$nextpayment = $mysqli->query("SELECT p.repayment FROM payment_sched p WHERE p.loanid = '{$data['loanid']}' AND p.active = 1 LIMIT 1")->fetch_assoc()['repayment'];
				$amount = 0;
				if (is_numeric($nextpayment) && $nextpayment > 0) {
					if ($data['due'] < $data['amount_due']) {
						$amount = $nextpayment - ($data['amount_due'] - $data['due']);
					} else if ($data['due'] > $data['amount_due']) {
						$amount = $nextpayment + abs($data['amount_due'] - $data['due']);
					}
				}
				$mysqli->query("UPDATE payment_sched p SET p.repayment = '$amount' WHERE p.loanid = '{$data['loanid']}' AND active = 1 LIMIT 1");
				if ($mysqli->affected_rows == 0) {
					array_push($err, "Error passing execess payment to the next cutoff");
				}
			}
		} else {
			array_push($err, "Error on updating payment details");
		}
		if (count($err) > 0) {
			return array('error' => $err);
		} else {
			$mysqli->commit(); return array('success'=>"Payment has been successfully updated");
			return array('success' => "Payment successfully updated");
		}
	}

	function addExpense($mysqli, $data) {
		$q = "INSERT INTO expenses(amount,purpose,addby,transdate) VALUES('{$data['amount']}','{$data['purpose']}','{$_SESSION['app']['name']}','{$data['transdate']}')";
		if ($mysqli->query($q)) {
			$mysqli->query("UPDATE accounts a SET a.balance = (a.balance - {$data['amount']}) WHERE a.atype = 'Cash'");
			logs($mysqli->insert_id, $data['amount'], 'Expense');
			return array('success' => 'Expense added successfully');
		} else {
			return array('error' => 'Error on add expense');
		}
	}

	function addDeposit($mysqli, $data) {
		$q = "INSERT INTO deposit(amount,addby,transdate,reference) VALUES('{$data['amount']}','{$_SESSION['app']['name']}','{$data['date']}','{$data['ref']}')";
		if ($mysqli->query($q)) {
			logs($mysqli->insert_id, $data['amount'], 'Deposit');
			return array('success' => 'Deposit details added successfully');
		} else {
			return array('error' => 'Error on adding deposit transaction');
		}
	}

	function addEmployee($mysqli, $data) {
		$pass = userencrypt($data['pass']);
		$q = "INSERT INTO users(name,user,username,password,level) VALUES('{$data['fname']}','{$data['uname']}','{$data['xname']}','$pass','{$data['level']}')";
		if ($mysqli->query($q)) {
			return array('success' => 'New Employee Added Successfully');
		} else {
			return array('error' => 'Error on add Expebse');
		}
	}

	function addnoteBorrower($mysqli,$data) {
		if($mysqli->query("INSERT INTO borrower_notes (borrower_id,note,added_by) VALUES('{$data['id']}','{$data['note']}','{$_SESSION['app']['name']}')")) {
			return array('success' => 'Note has been added');
		} else {
			return array('error' => 'Error on adding note');
		}
	}

	// ***************** COMMENTS ***********************
	function getCommentBorrower($mysqli,$data) {
		return $mysqli->query("SELECT n.note, n.added_by, n.date_created FROM borrower_notes n WHERE n.borrower_id = '{$data['id']}' ORDER BY n.date_created DESC")->fetch_all(MYSQLI_ASSOC);
	}

	function setCommentBorrower($mysqli,$data) {
		$mysqli->query("INSERT INTO borrower_notes(borrower_id,note,added_by) VALUES('{$data['id']}','{$data['note']}','{$_SESSION['app']['name']}')");
		if ($mysqli->affected_rows > 0) {
			return array('success' => 'Comment added');
		} else {
			return array('error' => 'Comment failed');
		}
	}

	function getCommentLoan($mysqli,$data) {
		return $mysqli->query("SELECT n.note, n.added_by, n.date_created FROM loan_notes n WHERE n.loan_id = '{$data['id']}' ORDER BY n.date_created DESC")->fetch_all(MYSQLI_ASSOC);
	}

	function setCommentLoan($mysqli,$data) {
		$mysqli->query("INSERT INTO loan_notes(loan_id,note,added_by) VALUES('{$data['id']}','{$data['note']}','{$_SESSION['app']['name']}')");
		if ($mysqli->affected_rows > 0) {
			return array('success' => 'Comment added');
		} else {
			return array('error' => 'Comment failed');
		}
	}
	?>