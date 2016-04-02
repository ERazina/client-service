cd..//..//xampp/mysql/bin      //для винды
mysql –u root –p

CREATE DATABASE  `company`
CHARACTER SET = 'utf8'
COLLATE = 'utf8_general_ci';
SHOW DATABASES;

USE `company`; // выбираем бд

CREATE TABLE `staff`(
    `id` TINYINT (3) UNSIGNED NOT NULL AUTO_INCREMENT,
    `last_name` VARCHAR(100) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `position` TINYINT(3) NOT NULL,
    PRIMARY KEY (`id`)
);

SHOW TABLES;

CREATE TABLE `company`(
    `id` TINYINT (3) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
);

SHOW TABLES;

CREATE TABLE `client`(
    `id` TINYINT (3) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_company` TINYINT (3) UNSIGNED NOT NULL AUTO_INCREMENT,
    `last_name` VARCHAR(100) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `FK`(`id_company`),
    FOREIGN KEY (`id_company`)
    REFERENCES `company`(`id`) ON DELETE SET NULL
);

SHOW TABLES;


CREATE TABLE `order` (
	`id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	`id_staff` TINYINT(3) UNSIGNED NOT NULL,
	`id_client` TINYINT(3) UNSIGNED NOT NULL,
	`sum` FLOAT(10,2),
	`status` TINYINT(1) UNSIGNED NOT NULL,
	PRIMARY KEY(`id`),
	INDEX `FK1`(`id_staff`),
	INDEX `FK2`(`id_client`),
	FOREIGN KEY(`id_staff`) REFERENCES `staff`(`id`) ON DELETE RESTRICT,
	FOREIGN KEY(`id_client`) REFERENCES `client`(`id`) ON DELETE RESTRICT
);

SHOW TABLES;
SELECT*FROM `staff`;