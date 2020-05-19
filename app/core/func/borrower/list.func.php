<?php
	function getBorrowers($mysqli,$data) {
		$filter = (isset($data['filter']) || !empty(@$data['filter'])) ? "(b.borrower_no = '".$data['filter']."' OR b.first_name = '".$data['filter']."' OR b.last_name = '".$data['filter']."') AND" : "";
		$query = "SELECT
			b.borrower_no,
			CONCAT(b.last_name, ', ' ,b.first_name) AS 'borrower',
			b.email,
			b.mobile,
			b.gender
		FROM borrowers b
		WHERE $filter b.active = 1
		ORDER BY b.borrower_no DESC";
		return $mysqli->query($query)->fetch_all(MYSQLI_ASSOC);
	}
?>