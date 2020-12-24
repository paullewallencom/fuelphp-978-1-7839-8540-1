CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_monkeys');

CREATE TABLE `monkeys` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `still_here` tinyint(1) NOT NULL,
  `height` float NOT NULL,
  `description` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `monkeys` (`id`, `name`, `still_here`, `height`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Jane', 1, 3, 'Small and cute.', NULL, NULL),
(2, 'Tory', 1, 5, 'Big and strong.', NULL, NULL);


ALTER TABLE `monkeys`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `monkeys`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;