CREATE TABLE `orders` (
  `id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT (11),
  `product_id` INT (11),
  `qty` SMALLINT (4),
  `price` FLOAT,
  `purchase_date` DATE,
  PRIMARY KEY (`id`)
) ENGINE = INNODB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;