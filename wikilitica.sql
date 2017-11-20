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