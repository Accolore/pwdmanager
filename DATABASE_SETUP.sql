CREATE TABLE IF NOT EXISTS `app_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `username` varbinary(512) DEFAULT NULL,
  `password` varbinary(512) DEFAULT NULL,
  `url` varchar(512) DEFAULT NULL,
  `note` blob,
  `creation_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `edit_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `registry_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(512) CHARACTER SET utf8 NOT NULL,
  `registry_id` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `app_users` (`id`, `username`, `password`, `registry_id`) VALUES
  (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);