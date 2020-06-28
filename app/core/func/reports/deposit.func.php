<?php
	function getDeposit($mysqli,$data) {
		$q = "SELECT
				COALESCE(d.editby,d.addby) AS 'name',
				d.reference AS 'ref',
				d.transdate AS 'date',
				d.amount
			FROM deposit d
			WHERE d.transdate BETWEEN '{$data['sdate']}' AND '{$data['edate']}'";
		return $mysqli->query($q)->fetch_all(MYSQLI_ASSOC);
	}
?>