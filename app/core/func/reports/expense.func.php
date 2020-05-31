<?php
	function getExpenses($mysqli,$data) {
		$q = "SELECT
				COALESCE(e.editby,e.addby) AS 'name',
				e.purpose,
				e.transdate AS 'date',
				e.amount
			FROM expenses e
			WHERE e.transdate BETWEEN '{$data['sdate']}' AND '{$data['edate']}'";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
?>