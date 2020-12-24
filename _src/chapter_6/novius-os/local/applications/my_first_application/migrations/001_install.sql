CREATE TABLE IF NOT EXISTS `monkeys` (
    `monk_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `monk_name` varchar(255) NOT NULL,
    `monk_still_here` tinyint(1) NOT NULL DEFAULT '0',
    `monk_height` varchar(255) NOT NULL,
    `monk_virtual_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
    `monk_publication_status` tinyint(1) NOT NULL,
    `monk_publication_start` datetime DEFAULT NULL,
    `monk_publication_end` datetime DEFAULT NULL,
    `monk_created_by_id` INT UNSIGNED NULL,
    `monk_updated_by_id` INT UNSIGNED NULL,
    `monk_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
    `monk_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`monk_id`),
    KEY `monk_created_at` (`monk_created_at`),
    KEY `monk_updated_at` (`monk_updated_at`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
