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
			WHERE b.borrower_no = '{$data['id']}'
			";
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
			WHERE b.borrower_no = '{$data['id']}'
			";
		return $mysqli->query($q)->fetch_assoc();
	}
?>