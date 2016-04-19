cd..//..//xampp/mysql/bin      //для винды
mysql –u root –p

Для Мак: /Applications/XAMPP/xamppfiles/bin/mysql

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


CREATE TABLE `user`(
`id` TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
`login` VARCHAR(100) NOT NULL,
`pass` CHAR(32) NOT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO `product` (`isbn`, `name`, `author`, `price`, `mark`, `count`, `id_category`) VALUES
(567890140, "Мир", "Л.Н. Толстой", 200, 4.3, 11, 3),
(567890141, "100 лет", "Маркес", 300, 4.2, 11, 2),
(567890142, "Плоский мир", "Гоголь", 400, 4.5, 11, 1),
(567890143, "Хоббит", "Т. Пратчет", 1800, 5.0, 11, 4);

INSERT INTO `order` (`id_user`, `isbn`, `count`, `id_status`, `number`, `date`) VALUES
(2, 567890143, NULL, 1, '1', '2016-03-02'),
(2, 567890141, NULL, 1, '1', '2016-03-02'),
(2, 567890140, NULL, 5, '2', '2016-03-02'),
(2, 567890143, 2, 1, '3', '2016-03-06'),
(3, 567890141, 1, 1, '3', '2016-05-02'),
(4, 567890140, 3, 4, '4', '2016-04-02'),
(5, 567890140, 2, 4, '4', '2016-03-01');

SELECT COUNT(*) as cat FROM `user`;

SELECT `user`.`name`, COUNT(`address`.`address`) AS cut FROM `user`
LEFT JOIN `address` ON(`user`.`id` = `address`.`user_id`)
GROUP BY `user_id`;
//
SELECT `category`.`name` , COUNT(`product`.`isbn`) AS cnt FROM `category`
LEFT JOIN `product` ON(`category`.`id` = `product`.`id_category`)
GROUP BY `id_category`
ORDER BY cnt DESC;

SELECT `category`.`name` , COUNT(`product`.`isbn`) AS cnt, AVG (`mark`) FROM `category`
LEFT JOIN `product` ON(`category`.`id` = `product`.`id_category`)
GROUP BY `id_category`
ORDER BY AVG(`mark`) DESC;

//задание 5
SELECT AVG(`mark`) FROM `product`;

//найти самую дешевую книгу
SELECT `name`, MIN(`price`) AS `min`
FROM `product`
GROUP BY `price` ASC
LIMIT 1;

//найти самую дорогую книгу
SELECT `name`, MAX(`price`) AS `max`
FROM `product`
GROUP BY `price` DESC
LIMIT 1;

//посчитать среднюю оценку по жанрам и количество выставленных оценок
SELECT `category`.`name`, AVG(`mark`), SUM(`count`)
FROM `category`
LEFT JOIN `product` ON (`category`.`id` = `product`.`id_category`)
GROUP BY `id_category`
ORDER BY `mark` DESC;

//посчитать количество заказов в статусе "1"
SELECT *
FROM `order`
WHERE `id_status`=1
GROUP BY `number`;

//найти все заказы, стоимость которых выше 1000 рублей
SELECT `number`, SUM(`order`.`count`*`product`.`price`) AS `sum`
FROM `order`
LEFT JOIN `product` ON(`order`.`isbn` = `product`.`isbn`)
WHERE `id_category`
GROUP BY `number`
HAVING `sum`> 1000;

