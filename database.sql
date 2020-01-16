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
	gender chat(10) NOT NULL,
	birthdate DATE NOT NULL,
	contact_info char(16) NOT NULL,
	email char(32) not null,
	civil_status char(16) not null,
	province char(32) not null,
	city char(32) not null,
	barangay char(32) not null,
	street char(64) not null
);

CREATE TABLE IF NOT EXISTS borrowers_employer(
	id int(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	borrower_no char(32) NOT NULL,
	employer_status char(32) NOT NULL,
	company_name chat(64) NOT NULL,
	employer_address chat(64) NOT NULL,
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
	loan_purpose chat(32) NOT NULL,
	loan_term chat(32) NOT NULL,
	load_status char(16) NOT NULL,
	loan_interest chat(32) NOT NULL,
	loan_payable chat(32) NOT NULL,
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
	date_created timestamp NOT NULL
);

