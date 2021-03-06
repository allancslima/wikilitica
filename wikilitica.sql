CREATE DATABASE wikilitica
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE wikilitica;

CREATE TABLE states (
	`id`   INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
) DEFAULT CHARSET = utf8;

CREATE TABLE cities (
	`id`       INT(11) NOT NULL AUTO_INCREMENT,
	`state_id` INT(11) NOT NULL,
	`name`     VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`state_id`) REFERENCES states (`id`)
) DEFAULT CHARSET = utf8;

CREATE TABLE political_parties (
	`id`          INT(11) NOT NULL AUTO_INCREMENT,
	`name`        VARCHAR(50) NOT NULL,
	`initials`    VARCHAR(10) NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`)
) DEFAULT CHARSET = utf8;

CREATE TABLE state_candidates (
	`id`                 INT(11) NOT NULL AUTO_INCREMENT,
	`state_id`           INT(11) NOT NULL,
	`political_party_id` INT(11) NOT NULL,
	`name`               VARCHAR(50) NOT NULL,
	`gender`             ENUM('M', 'F') NOT NULL,
	`birth`              DATE,
	`profession`         VARCHAR(50),
	`role`               VARCHAR(30),
	PRIMARY KEY (`id`),
	FOREIGN KEY (`state_id`) REFERENCES states (`id`),
	FOREIGN KEY (`political_party_id`) REFERENCES political_parties (`id`)
) DEFAULT CHARSET = utf8;

CREATE TABLE city_candidates (
	`id`                 INT(11) NOT NULL AUTO_INCREMENT,
	`city_id`            INT(11) NOT NULL,
	`political_party_id` INT(11) NOT NULL,
	`name`               VARCHAR(50) NOT NULL,
	`gender`             ENUM('M', 'F') NOT NULL,
	`birth`              DATE,
	`profession`         VARCHAR(50),
	`role`               VARCHAR(30),
	PRIMARY KEY (`id`),
	FOREIGN KEY (`city_id`) REFERENCES cities (`id`),
	FOREIGN KEY (`political_party_id`) REFERENCES political_parties (`id`)
) DEFAULT CHARSET = utf8;

CREATE TABLE state_candidates_realizations (
	`id`           INT(11) NOT NULL AUTO_INCREMENT,
	`candidate_id` INT(11) NOT NULL,
	`body`         TEXT NOT NULL,
	`type`         VARCHAR(20) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`candidate_id`) REFERENCES state_candidates (`id`)
) DEFAULT CHARSET = utf8;

CREATE TABLE city_candidates_realizations (
	`id`           INT(11) NOT NULL AUTO_INCREMENT,
	`candidate_id` INT(11) NOT NULL,
	`body`         TEXT NOT NULL,
	`type`         VARCHAR(20) NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`candidate_id`) REFERENCES city_candidates (`id`)
) DEFAULT CHARSET = utf8;