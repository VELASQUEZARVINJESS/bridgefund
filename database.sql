CREATE DATABASE bridgefund;
USE bridgefund;

CREATE TABLE IF NOT EXISTS users(
	id TINYINT(2) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	user CHAR(128) NOT NULL,
	username CHAR(64) NOT NULL,
	password CHAR(128) NOT NULL,
	level TINYINT(1) UNSIGNED NOT NULL,
	active TINYINT(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO users(user,username,password,level) VALUES('testUser','user','3e39b3844837bdefc8017fbcb386ea302af877fb17baa09d0a1bd34b67bbf2b34fba314bbcab450f5f3f73771b7aea956ba3320defda029723f4fdff7dfa007b',1);

CREATE TABLE IF NOT EXISTS borrowers(
	id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower_no CHAR(32) NOT NULL,
	first_name CHAR(64) NOT NULL,
	last_name CHAR(64) NOT NULL,
	middle_name CHAR(64) NOT NULL,
	gender CHAR(10) NOT NULL,
	birthdate DATE NOT NULL,
	mobile CHAR(32) NOT NULL,
	email CHAR(32) NOT NULL,
	landline CHAR(32) NULL,
	civil_status CHAR(16) NOT NULL,
	province CHAR(32) NOT NULL,
	city CHAR(32) NOT NULL,
	barangay CHAR(32) NOT NULL,
	subdivision CHAR(18) NOT NULL,
	street CHAR(64) NOT NULL,
	zipcode MEDIUMINT(8) NOT NULL,
	status CHAR(32) NOT NULL , 
	active TINYINT(1) NOT NULL DEFAULT 1,
	addby TINYINT(3) NOT NULL,
	datecreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	editby TINYINT(3) DEFAULT NULL,
	dateupdated TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS borrowers_employer(
	id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower_no CHAR(32) NOT NULL,
	position CHAR(32) NOT NULL,
	monthly_salary INT(5) UNSIGNED NOT NULL,
	annual_salary INT(7) UNSIGNED NOT NULL,
	take_home_pay INT(8) UNSIGNED NOT NULL,
	company_name CHAR(64) NOT NULL,
	company_address CHAR(64) NOT NULL,
	hr_manager CHAR(16) NOT NULL,
	hr_contact CHAR(16) NOT NULL,
	hr_email CHAR(64) NOT NULL,
	addby TINYINT(3) NOT NULL,
	datecreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	editby TINYINT(3) NOT NULL,
	dateupdated TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL,
	active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS borrowers_loan(
	id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower_no CHAR(32) NOT NULL,
	loan_id CHAR(32) NOT NULL,
	loan_amount DECIMAL(7,2) NOT NULL,
	loan_purpose CHAR(32) NOT NULL,
	loan_duration CHAR(32) NOT NULL,
	loan_status enum('pending','approve','decline') NOT NULL DEFAULT 'pending',
	loan_interest DECIMAL(4,2) NOT NULL,
	loan_payable DECIMAL(6,2) NOT NULL,
	repayment_cycle CHAR(64) NOT NULL,
	repayment_count INT(3) UNSIGNED NOT NULL,
	date_apply DATE NULL,
	date_released DATE NULL,
	payment_start DATE NULL,
	payment_end DATE NULL,
	bank_name CHAR(16) NOT NULL,
	bank_account CHAR(64) NOT NULL,
	bank_branch CHAR(64) NOT NULL,
	pin CHAR(64) NOT NULL,
	notes TEXT,
	addby TINYINT(3) NOT NULL,
	datecreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	editby TINYINT(3) NULL DEFAULT NULL,
	dateupdated TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT NULL,
	active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS loan_payment(
	id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower CHAR(32) NOT NULL,
	loan_id CHAR(32) NOT NULL,
	reference CHAR(32) NOT NULL,
	paid_amount DECIMAL(6,2) NOT NULL,
	penalty DECIMAL(6,2) NOT NULL
	payment_type CHAR(32) NOT NULL,
	payment_due DATE NOT NULL,
	date_paid DATE NOT NULL,
	notes TEXT,
	addby CHAR(64) NOT NULL,
	datecreated TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	editby CHAR(64) NULL,
	dateupdated TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
	active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE provinces (
  id TINYINT(3) PRIMARY KEY AUTO_INCREMENT,
  province CHAR(128) NOT NULL,
  active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO provinces (`province`) VALUES
('CAMARINES SUR'),
('CAMARINES NORTE'),
('ALBAY'),
('CATANDUANES'),
('MASBATE'),
('SORSOGON');

CREATE TABLE IF NOT EXISTS cities (
  id INT(5) PRIMARY KEY AUTO_INCREMENT,
  provinceid TINYINT(3) UNSIGNED NOT NULL,
  city CHAR(128) NOT NULL,
  active TINYINT(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO cities (provinceid, city) VALUES
(3, 'LEGAZPI CITY'),
(3, 'LIGAO CITY'),
(3, 'TABACO CITY'),
(3, 'BACACAY'),
(3, 'CAMALIG'),
(3, 'DARAGA'),
(6, 'SORSOGON CITY'),
(6, 'BARCELONA'),
(6, 'BULAN'),
(6, 'BULUSAN'),
(6, 'CASIGURAN'),
(6, 'CASTILLA'),
(6, 'DONSOL'),
(6, 'GUBAT'),
(6, 'IROSIN'),
(6, 'JUBAN'),
(6, 'MAGALLANES'),
(6, 'MATNOG'),
(6, 'PILAR'),
(6, 'PRIETO DIAZ'),
(6, 'SANTA MAGDALENA'),
(5, 'MASBATE CITY'),
(5, 'AROROY'),
(5, 'BALENO'),
(5, 'BALUD'),
(5, 'BATUAN'),
(5, 'CATAINGAN'),
(5, 'CAWAYAN'),
(5, 'CLAVERIA'),
(5, 'DIMASALANG'),
(5, 'ESPERANZA'),
(5, 'MANDAON'),
(5, 'MILAGROS'),
(5, 'MOBO'),
(5, 'MONREAL'),
(5, 'PALANAS'),
(5, 'PIO V. CORPUZ'),
(5, 'PLACER'),
(5, 'SAN FERNANDO'),
(5, 'SAN JACINTO'),
(5, 'SAN PASCUAL'),
(5, 'USON'),
(4, 'BAGAMANOC'),
(4, 'BARAS'),
(4, 'BATO CATANDUANES'),
(4, 'CARAMORAN CATANDUANES'),
(4, 'GIGMOTO'),
(4, 'PANDAN'),
(4, 'PANGANIBAN'),
(4, 'SAN ANDRES'),
(4, 'SAN MIGUEL'),
(4, 'VIGA'),
(4, 'VIRAC'),
(1, 'SAGÃ±AY'),
(1, 'NAGA CITY'),
(1, 'IRIGA CITY'),
(1, 'BAAO'),
(1, 'BALATAN'),
(1, 'BATO CAM SUR'),
(1, 'BOMBON'),
(1, 'BUHI'),
(1, 'BULA'),
(1, 'CABUSAO'),
(1, 'CALABANGA'),
(1, 'CAMALIGAN'),
(1, 'CANAMAN'),
(1, 'CARAMOAN'),
(1, 'DEL GALLEGO'),
(1, 'GAINZA'),
(1, 'GARCHITORENA'),
(1, 'GOA'),
(1, 'LAGONOY'),
(1, 'LIBMANAN'),
(1, 'LUPI'),
(1, 'MAGARAO'),
(1, 'MILAOR'),
(1, 'MINALABAC'),
(1, 'NABUA'),
(1, 'OCAMPO'),
(1, 'PAMPLONA'),
(1, 'PASACAO'),
(1, 'PILI'),
(1, 'PRESENTACION'),
(1, 'RAGAY'),
(1, 'SAN FERNANDO'),
(1, 'SAN JOSE'),
(1, 'SIPOCOT'),
(1, 'SIRUMA'),
(1, 'TIGAON'),
(1, 'TINAMBAC'),
(2, 'BASUD'),
(2, 'CAPALONGA'),
(2, 'DAET'),
(2, 'JOSE PANGANIBAN'),
(2, 'LABO'),
(2, 'MERCEDES'),
(2, 'PARACALE'),
(2, 'SAN LORENZO RUIZ'),
(2, 'SAN VICENTE'),
(2, 'SANTA ELENA'),
(2, 'TALISAY'),
(2, 'VINZONS'),
(3, 'GUINOBATAN'),
(3, 'JOVELLAR'),
(3, 'LIBON'),
(3, 'MALILIPOT'),
(3, 'MALINAO'),
(3, 'MANITO'),
(3, 'OAS'),
(3, 'PIO DURAN'),
(3, 'POLANGUI'),
(3, 'RAPU-RAPU'),
(3, 'SANTO DOMINGO'),
(3, 'TIWI');
