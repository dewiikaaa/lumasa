CREATE TABLE `news` (
  `id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR (200),
  `content` TEXT,
  `created_at` DATE,
  `published_at` DATE,
  `publish` TINYINT (0),
  `sort_order` TINYINT (1),
  PRIMARY KEY (`id`)
) ENGINE = INNODB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;