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
?>