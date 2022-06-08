CREATE TABLE `products` (
  `id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR (200),
  `description` TEXT,
  `picture` VARCHAR (200),
  `price` FLOAT (10),
  `publish` TINYINT (0),
  `sort_order` TINYINT (1),
  `created_at` DATE,
  PRIMARY KEY (`id`)
) ENGINE = INNODB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;