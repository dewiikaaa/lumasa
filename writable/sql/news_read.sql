CREATE TABLE `news_read` (
  `id` INT (11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `news_id` INT (11),
  `user_id` INT (11),
  PRIMARY KEY (`id`)
) ENGINE = INNODB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;