CREATE TABLE `carts` (
  `id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT (11),
  `product_id` INT (11),
  `qty` SMALLINT (4),
  PRIMARY KEY (`id`)
) ENGINE = INNODB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;