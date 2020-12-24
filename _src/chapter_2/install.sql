CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_projects'),
('app', 'default', '002_create_tasks');

CREATE TABLE `projects` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `projects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Second project', 1422126339, 1422126339),
(3, 'Third project', 1422126339, 1422126339),
(4, 'Fourth project', 1422126340, 1422126340);

CREATE TABLE `tasks` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rank` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `tasks` (`id`, `name`, `status`, `rank`, `project_id`, `created_at`, `updated_at`) VALUES
(1, 'Marketing plan', 0, 0, 4, 1422126339, 1422126340),
(2, 'Update website', 1, 1, 2, 1422126339, NULL),
(3, 'Improve website template', 1, 2, 2, 1422126339, NULL),
(4, 'Contact director', 0, 0, 0, 1422126339, 1422126340),
(5, 'Buy a new computer', 1, 1, 3, 1422126339, NULL),
(6, 'Buy an optical mouse', 0, 2, 2, 1422126340, 1422126340);


ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);


ALTER TABLE `projects`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
ALTER TABLE `tasks`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;