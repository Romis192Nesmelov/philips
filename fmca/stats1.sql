/* Отчеты для проакции
Имена файлов вписаны в код. При адаптации их необходимо будет исправить.
Поиск по контексту 'INTO OUTFILE'
(c) Victor Makarov */

/*-----------------------------------------*/
/* Отчет 1 - Статистика по акции           */
/*-----------------------------------------*/

CREATE TEMPORARY TABLE `dates` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`Date` date NOT NULL,
		PRIMARY KEY (`id`)
	);

DROP PROCEDURE IF EXISTS `date_between`;

delimiter //;
CREATE PROCEDURE `date_between` ( dfrom DATE, dto DATE )
BEGIN 
	DECLARE curr DATE;
	SET curr = dfrom;
	WHILE ( curr <  dto ) DO 
		INSERT INTO `dates` VALUES ( NULL, curr );
		SET curr = curr + INTERVAL 1 day;
	END WHILE;
END//;
delimiter ;

/*
SELECT MIN(on_time) INTO @min_unixtime FROM promo_codes WHERE on_time > 0;
call date_between(FROM_UNIXTIME(@min_unixtime, '%Y-%m-%d'), NOW());
*/
call date_between('2018-10-29', NOW());

DROP PROCEDURE `date_between`;

CREATE TEMPORARY TABLE `users_groups` AS (
	SELECT DATE(created_at) AS 'Date', COUNT(created_at) AS 'Registrations'
	FROM `philips`.users
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `promocodes_groups` AS (
	SELECT FROM_UNIXTIME(on_time, '%Y-%m-%d') AS 'Date', COUNT(on_time) AS 'Promocodes'
	FROM `philips`.promo_codes
	WHERE on_time > 0
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `discount10_groups` AS (
	SELECT FROM_UNIXTIME(on_time, '%Y-%m-%d') AS 'Date', COUNT(on_time) AS 'Discount10'
	FROM `philips`.discount_codes
	WHERE on_time > 0 AND discount = 10
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `discount20_groups` AS (
	SELECT FROM_UNIXTIME(on_time, '%Y-%m-%d') AS 'Date', COUNT(on_time) AS 'Discount20'
	FROM `philips`.discount_codes
	WHERE on_time > 0 AND discount = 20
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `discount30_groups` AS (
	SELECT FROM_UNIXTIME(on_time, '%Y-%m-%d') AS 'Date', COUNT(on_time) AS 'Discount30'
	FROM `philips`.discount_codes
	WHERE on_time > 0 AND discount = 30
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `discount40_groups` AS (
	SELECT FROM_UNIXTIME(on_time, '%Y-%m-%d') AS 'Date', COUNT(on_time) AS 'Discount40'
	FROM `philips`.discount_codes
	WHERE on_time > 0 AND discount = 40
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `discount50_groups` AS (
	SELECT FROM_UNIXTIME(on_time, '%Y-%m-%d') AS 'Date', COUNT(on_time) AS 'Discount50'
	FROM `philips`.discount_codes
	WHERE on_time > 0 AND discount = 50
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `discount60_groups` AS (
	SELECT FROM_UNIXTIME(on_time, '%Y-%m-%d') AS 'Date', COUNT(on_time) AS 'Discount60'
	FROM `philips`.discount_codes
	WHERE on_time > 0 AND discount = 60
	GROUP BY Date
	);

CREATE TEMPORARY TABLE `orders_groups` AS (
	SELECT FROM_UNIXTIME(activation_time, '%Y-%m-%d') AS 'Date', COUNT(activation_time) AS 'Orders'
	FROM `philips`.discount_codes
	WHERE activation_time > 0
	GROUP BY Date
	);

SELECT dates.Date AS 'Date', 
			 IFNULL(Registrations,'') AS 'Registrations',
			 IFNULL(Promocodes,'') AS 'Promocodes',
			 IFNULL(Discount10,'') AS 'Discount10', 
			 IFNULL(Discount20,'') AS 'Discount20', 
			 IFNULL(Discount30,'') AS 'Discount30',
			 IFNULL(Discount40,'') AS 'Discount40', 
			 IFNULL(Discount50,'') AS 'Discount50', 
			 IFNULL(Discount60,'') AS 'Discount60',
			 IFNULL(Orders,'') AS 'Orders'
FROM dates 
LEFT OUTER JOIN users_groups ON dates.Date = users_groups.Date 
LEFT OUTER JOIN promocodes_groups ON dates.Date = promocodes_groups.Date 
LEFT OUTER JOIN discount10_groups ON dates.Date = discount10_groups.Date 
LEFT OUTER JOIN discount20_groups ON dates.Date = discount20_groups.Date 
LEFT OUTER JOIN discount30_groups ON dates.Date = discount30_groups.Date 
LEFT OUTER JOIN discount40_groups ON dates.Date = discount40_groups.Date 
LEFT OUTER JOIN discount50_groups ON dates.Date = discount50_groups.Date 
LEFT OUTER JOIN discount60_groups ON dates.Date = discount60_groups.Date 
LEFT OUTER JOIN orders_groups ON dates.Date = orders_groups.Date 
ORDER BY dates.Date;

