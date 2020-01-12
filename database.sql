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
