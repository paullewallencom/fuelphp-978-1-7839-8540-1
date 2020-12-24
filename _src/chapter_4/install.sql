CREATE TABLE `captcha_answers` (
`id` int(11) unsigned NOT NULL,
  `expected_value` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `captcha_answers` (`id`, `expected_value`, `created_at`) VALUES
(1, 6, 1422127584);

CREATE TABLE `items` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_items'),
('package', 'captcha', '001_create_captcha_answers'),
('app', 'default', '002_create_captcha_answers');


ALTER TABLE `captcha_answers`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `captcha_answers`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `items`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;