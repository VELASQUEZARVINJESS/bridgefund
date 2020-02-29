<?php 
	date_default_timezone_set('Asia/Manila');
	
	// connection
	define('SVR', 'localhost');
	define('UID', 'root');
	define('PWD', '');
	define('DBS', 'bridgefund');
	
	// company details
	define('COMPANY_NAME', 'Bridge Fund');
	define('COMPANY_ADDR', '');

	// website title on display
	define('BFSL_TTL', 'BridgeFund');
	define('BFSL_CPY', '<strong>Copyright &copy; 2020 BridgeFund</strong>');
	define('BFSL_VER', '<b>Version</b> 0.1 alpha');

	// htaccess
	define('HTACCESS', 	FALSE);
	define('FOLDER',	'/bridgefund/');
	define('ASSET',		(HTACCESS) ? ''	: 'asset/');
	define('PAGE',		(HTACCESS) ? ''	: 'page=');
	define('DIR',		(HTACCESS) ? ''	: 'f=');
	define('NAV',		(HTACCESS) ? 'page/': 'nav=');
	define('ID',		(HTACCESS) ? ''	: 'id=');
	define('Q',			(HTACCESS) ? ''	: '?');
	define('A',			(HTACCESS) ? '/': '&');
	define('B',			(HTACCESS) ? '../': '');

	// path
	define('PROTOCOL',	(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://');
	define('PATH_URL',	PROTOCOL.$_SERVER['HTTP_HOST'].FOLDER);
	define('PATH_PRT',	'app/view/part/');
	define('PATH_PGE',	'app/view/page/');
	define('PATH_JAV',	'app/view/java/');
	define('PATH_COR',	(HTACCESS) ? '' : 'app/core/');
	define('PATH_REQ',	PATH_COR.'request/');
	define('PATH_CSS',	ASSET.'css/');
	define('PATH_JSC',	ASSET.'js/');
	define('PATH_IMG',	ASSET.'img/');
	define('PATH_PLG',	ASSET.'plugins/');
	
	// developer setup
	define('DEBUG_MODE', TRUE);
	
	ini_set('session.cookie_httponly', true);
	session_start();

	if (isset($_SESSION['last_ip']) === false) {
		$_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
	}

	if ($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {	session_unset();session_destroy(); }

	// hashids
	function generateRandomString($length = 10) {
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	if (@$_SESSION['app']['security_key']=="") {
		$_SESSION['app']['security_key'] = generateRandomString(7);
	}

	// require_once('Hashids/HashGenerator.php');
	// require_once('Hashids/Hashids.php');
	// $key = (isset($_SESSION['carex']['security_key'])) ? $_SESSION['carex']['security_key'] : 'C4R3X' ;

	// $hashids = new Hashids\Hashids($key, 10, 'abcdefghjkmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ1234567890');
	$mysqli = new mysqli(SVR,UID,PWD,DBS);
	$mysqli->set_charset("utf8");
	require_once 'func/general.func.php';

	if (is_numeric(@$_SESSION['app']['id']) && isset($_SESSION['app']['security_key'])) {
		// $_SESSION['app']['id'] = encrypt($_SESSION['app']['id']);
	}
?>