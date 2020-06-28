<?php
    function getBankBalance($mysqli) {
        $bank = $mysqli->query("SELECT a.initial_balance AS 'init' FROM accounts a WHERE a.atype = 'Bank'")->fetch_assoc()['init'];
        $loan = $mysqli->query("SELECT SUM(l.loan_amount - (l.process_fee + l.notary_fee)) AS 'release' FROM borrowers_loan l WHERE l.loan_status = 'ONGOING' AND l.active = 1")->fetch_assoc()['release'];
        $payment = $mysqli->query("SELECT SUM(l.paid_amount + l.penalty) AS 'paid' FROM loan_payment l WHERE active = 1")->fetch_assoc()['paid'];
        $expense = $mysqli->query("SELECT SUM(e.amount) AS 'expense' FROM expenses e  WHERE e.active = 1")->fetch_assoc()['expense'];
        return array('amount' => ((floatval($bank) + floatval($payment)) - (floatval($loan) + floatval($expense))));
    }
    function getLoanStatus($mysqli) {
        return $mysqli->query("SELECT l.loan_status, COUNT(l.id) AS 'count' FROM borrowers_loan l WHERE l.active = 1 GROUP BY l.loan_status")->fetch_all(MYSQLI_ASSOC);
    }
    function getTotalBorrowers($mysqli) {
        return $mysqli->query("SELECT COUNT(b.borrower_no) AS 'count' FROM borrowers b WHERE b.active = 1")->fetch_assoc();
    }
    function getActiveLoan($mysqli) {
        return $mysqli->query("SELECT COUNT(b.borrower_no) AS 'count' FROM borrowers_loan b WHERE b.active = 1 AND b.loan_status = 'ONGOING'")->fetch_assoc();
    }
    function getTotalPenalty($mysqli) {
        return $mysqli->query("SELECT COUNT(l.loan_id) AS 'count' FROM loan_payment l WHERE l.active = 1 AND l.penalty > 0")->fetch_assoc();
    }
	function getLogs($mysqli) {
		return $mysqli->query("SELECT l.trans AS 't',l.amount AS 'a', l.addby AS 'u', l.ref AS 'r' FROM trans_log l ORDER BY date_created DESC LIMIT 10")->fetch_all(MYSQLI_ASSOC);
	}
?>