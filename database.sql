CREATE DATABASE bridgefund;
USE bridgefund;

CREATE TABLE IF NOT EXISTS users(
	id tinyint(2) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	user varchar(128) NOT NULL,
	username varchar(64) NOT NULL,
	password varchar(128) NOT NULL,
	level tinyint(1) UNSIGNED NOT NULL,
	active tinyint(1) UNSIGNED NOT NULL DEFAULT 1
);

INSERT INTO users(user,username,password,level) VALUES('testUser','user','3e39b3844837bdefc8017fbcb386ea302af877fb17baa09d0a1bd34b67bbf2b34fba314bbcab450f5f3f73771b7aea956ba3320defda029723f4fdff7dfa007b',1);

CREATE TABLE IF NOT EXISTS borrowers(
	id int(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower_no char(32) NOT NULL,
	first_name char(64) NOT NULL,
	last_name char(64) NOT NULL,
	middle_name char(64) NOT NULL,
	gender char(10) NOT NULL,
	birthdate DATE NOT NULL,
	phone_no char(16) NOT NULL,
	email char(32) not null,
	civil_status char(16) not null,
	province char(32) not null,
	city char(32) not null,
	barangay char(32) not null,
	street char(64) not null,
	active tinyint(1) not null DEFAULT 1,
	datecreated timestamp not null DEFAULT CURRENT_TIMESTAMP

);

CREATE TABLE IF NOT EXISTS borrowers_employer(
	id int(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower_no char(32) NOT NULL,
	employer_status char(32) NOT NULL,
	company_name char(64) NOT NULL,
	employer_address char(64) NOT NULL,
	hr_manager char(16) NOT NULL,
	hr_contact char(16) NOT NULL,
	hr_email char(64) NOT NULL
);

CREATE TABLE IF NOT EXISTS borrowers_loan(
	id int(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower_no char(32) NOT NULL,
	transaction_no char(32) NOT NULL,
	annual_salary decimal(8,2) not null,
	monthly_salary decimal(8,2) not null,
	loan_amount decimal(7,2) NOT NULL,
	loan_purpose char(32) NOT NULL,
	loan_term char(32) NOT NULL,
	load_status char(16) NOT NULL,
	loan_interest char(32) NOT NULL,
	loan_payable char(32) NOT NULL,
	payment_mode char(16) NOT NULL,
	bank_name char(16) NOT NULL,
	bank_account char(64) NOT NULL,
	bank_branch char(32) not null,
	pin char(8) not null
);

CREATE TABLE IF NOT EXISTS loan_payment(
	id int(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	transaction_no char(32) NOT NULL,
	paid decimal(6,2) not null,
	balance decimal(8,2) not null,
	date_paid date NOT NULL,
	date_created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE `borrowers`  ADD `status` TINYINT(1) NOT NULL DEFAULT '1'  AFTER `street`;

CREATE TABLE provinces (
  id tinyint(3) PRIMARY KEY AUTO_INCREMENT,
  province char(128) NOT NULL,
  active tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO provinces (`provincesname`) VALUES
('CAMARINES SUR'),
('CAMARINES NORTE'),
('ALBAY'),
('CATANDUANES'),
('MASBATE'),
('SORSOGON');


CREATE TABLE IF NOT EXISTS cities (
  citiesid int(5) PRIMARY KEY AUTO_INCREMENT,
  provincesid tinyint(3) UNSIGNED NOT NULL,
  citiesname char(128) NOT NULL,
  status tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO cities (provincesid, citiesname) VALUES
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

-- PUSH #6
ALTER TABLE `provinces`
	CHANGE `provincesid` `id` TINYINT(3) PRIMARY KEY AUTO_INCREMENT,
	CHANGE `provincesname` `province` CHAR(128) NOT NULL,
	CHANGE `status` `active` TINYINT(1) NOT NULL DEFAULT '1';

ALTER TABLE `cities`
	CHANGE `citiesid` `id` INT(5) PRIMARY KEY AUTO_INCREMENT,
	CHANGE `provincesid` `provinceid` TINYINT(3) UNSIGNED NOT NULL,
	CHANGE `citiesname` `city` CHAR(128) NOT NULL,
	CHANGE `status` `active` TINYINT(1) NOT NULL DEFAULT 1;

UPDATE cities SET active = 1;

ALTER TABLE `borrowers`
	CHANGE `phone_no` `mobile` CHAR(16) NOT NULL,
	ADD `subdivision` CHAR(18) NOT NULL AFTER `barangay`,
	ADD `zipcode` MEDIUMINT(8) NOT NULL AFTER `street`,
	ADD `landline` CHAR(32) AFTER `email`,
	ADD `addby` TINYINT(3) NOT NULL AFTER `active`,
	ADD `editby` TINYINT(3) DEFAULT NULL AFTER `datecreated`,
	ADD `dateupdated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL AFTER `editby`;

ALTER TABLE `borrowers_employer`
	CHANGE `employer_status` `position` CHAR(32) NOT NULL,
	CHANGE `employer_address` `company_address` CHAR(32) NOT NULL,
	ADD `monthly_salary` INT(5) UNSIGNED NOT NULL AFTER `position`,
	ADD `annual_salary` INT(7) UNSIGNED NOT NULL AFTER `monthly_salary`,
	ADD `take_home_pay` INT(8) UNSIGNED NOT NULL AFTER `annual_salary`,
	ADD `addby` TINYINT(3) NOT NULL AFTER `hr_email`,
	ADD `datecreated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `addby`,
	ADD `editby` TINYINT(3) NOT NULL AFTER `datecreated`,
	ADD `dateupdated` TIMESTAMP on update CURRENT_TIMESTAMP NULL DEFAULT NULL AFTER `editby`,
	ADD `active` TINYINT(1) NOT NULL DEFAULT 1 AFTER `dateupdated`;
