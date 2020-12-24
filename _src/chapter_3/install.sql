CREATE TABLE `categories` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First category', 1422126472, 1422126472),
(2, 'Second category', 1422126477, 1422126477);

CREATE TABLE `comments` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` enum('not_published','pending','published') NOT NULL DEFAULT 'pending',
  `post_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `name`, `email`, `content`, `status`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'Commenter', 'commenter@awesome.com', 'Excellent comment.', 'published', 1, 1422127154, 1422127236),
(2, 'Spammer', 'commenter@spammer.com', 'Spammer comment.', 'not_published', 1, 1422127182, 1422127231),
(3, 'New comment', 'new@comment.com', 'New comment.', 'pending', 1, 1422127211, 1422127211);

CREATE TABLE `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('package', 'auth', '001_auth_create_usertables'),
('package', 'auth', '002_auth_create_grouptables'),
('package', 'auth', '003_auth_create_roletables'),
('package', 'auth', '004_auth_create_permissiontables'),
('package', 'auth', '005_auth_create_authdefaults'),
('package', 'auth', '006_auth_add_authactions'),
('package', 'auth', '007_auth_add_permissionsfilter'),
('package', 'auth', '008_auth_create_providers'),
('package', 'auth', '009_auth_create_oauth2tables'),
('package', 'auth', '010_auth_fix_jointables'),
('app', 'default', '001_create_posts'),
('module', 'blog', '001_create_posts'),
('module', 'blog', '002_create_categories'),
('module', 'blog', '003_create_comments'),
('module', 'blog', '004_create_indexes');

CREATE TABLE `posts` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `small_description` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `slug`, `small_description`, `content`, `category_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'First post', 'first-post', 'Small description of __first post__', '<p>Content of <strong>first post</strong>.</p>', 1, 1, 1422126957, 1422126995),
(2, 'Second post', 'second-post', 'Small description of __second post__', '<p>Content of <em><strong>second post</strong></em></p>', 1, 1, 1422127025, 1422127025),
(3, 'Third post', 'third-post', 'Small description of __third post__', '<p>Content of <span style="text-decoration: underline;">third post</span>.</p>', 2, 1, 1422127073, 1422127073);

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `previous_login` varchar(25) NOT NULL DEFAULT '0',
  `login_hash` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `email`, `last_login`, `previous_login`, `login_hash`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 'guest', 'YOU CAN NOT USE THIS TO LOGIN', 2, '', '0', '0', '', 0, 1419696221, 0),
(1, 'admin', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 6, 'admin@admin.com', '1422126443', '1422121719', '2721e4724f5219aac9366ef0de7e56eb30298a7f', 1, 1419696221, 1422126443);

CREATE TABLE `users_clients` (
`id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL DEFAULT '',
  `client_id` varchar(32) NOT NULL DEFAULT '',
  `client_secret` varchar(32) NOT NULL DEFAULT '',
  `redirect_uri` varchar(255) NOT NULL DEFAULT '',
  `auto_approve` tinyint(1) NOT NULL DEFAULT '0',
  `autonomous` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('development','pending','approved','rejected') NOT NULL DEFAULT 'development',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `notes` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_groups` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Banned', 0, 0, 0),
(2, 'Guests', 0, 0, 0),
(3, 'Users', 0, 0, 0),
(4, 'Moderators', 0, 0, 0),
(5, 'Administrators', 0, 0, 0),
(6, 'Super Admins', 0, 0, 0);

CREATE TABLE `users_group_permissions` (
`id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `perms_id` int(11) NOT NULL,
  `actions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_group_roles` (
  `group_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_group_roles` (`group_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3),
(4, 4),
(5, 3),
(5, 4),
(5, 5),
(6, 6);

CREATE TABLE `users_metadata` (
`id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `key` varchar(20) NOT NULL,
  `value` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `users_metadata` (`id`, `parent_id`, `key`, `value`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'fullname', 'System administrator', 0, 1419696221, 0),
(2, 0, 'fullname', 'Guest', 0, 0, 0);

CREATE TABLE `users_permissions` (
`id` int(11) NOT NULL,
  `area` varchar(25) NOT NULL,
  `permission` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `actions` text,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_providers` (
`id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `provider` varchar(50) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `expires` int(12) DEFAULT '0',
  `refresh_token` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_roles` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `filter` enum('','A','D','R') NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `users_roles` (`id`, `name`, `filter`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'banned', 'D', 0, 0, 0),
(2, 'public', '', 0, 0, 0),
(3, 'user', '', 0, 0, 0),
(4, 'moderator', '', 0, 0, 0),
(5, 'administrator', '', 0, 0, 0),
(6, 'superadmin', 'A', 0, 0, 0);

CREATE TABLE `users_role_permissions` (
`id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `perms_id` int(11) NOT NULL,
  `actions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_scopes` (
`id` int(11) NOT NULL,
  `scope` varchar(64) NOT NULL DEFAULT '',
  `name` varchar(64) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_sessions` (
`id` int(11) NOT NULL,
  `client_id` varchar(32) NOT NULL DEFAULT '',
  `redirect_uri` varchar(255) NOT NULL DEFAULT '',
  `type_id` varchar(64) NOT NULL,
  `type` enum('user','auto') NOT NULL DEFAULT 'user',
  `code` text NOT NULL,
  `access_token` varchar(50) NOT NULL DEFAULT '',
  `stage` enum('request','granted') NOT NULL DEFAULT 'request',
  `first_requested` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `limited_access` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_sessionscopes` (
`id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `access_token` varchar(50) NOT NULL DEFAULT '',
  `scope` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_user_permissions` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perms_id` int(11) NOT NULL,
  `actions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users_user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `post_id` (`post_id`);

ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `user_id` (`user_id`), ADD KEY `slug` (`slug`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`email`);

ALTER TABLE `users_clients`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `client_id` (`client_id`);

ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users_group_permissions`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users_group_roles`
 ADD PRIMARY KEY (`group_id`,`role_id`);

ALTER TABLE `users_metadata`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users_permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permission` (`area`,`permission`);

ALTER TABLE `users_providers`
 ADD PRIMARY KEY (`id`), ADD KEY `parent_id` (`parent_id`);

ALTER TABLE `users_roles`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users_role_permissions`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users_scopes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `scope` (`scope`);

ALTER TABLE `users_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `oauth_sessions_ibfk_1` (`client_id`);

ALTER TABLE `users_sessionscopes`
 ADD PRIMARY KEY (`id`), ADD KEY `session_id` (`session_id`), ADD KEY `access_token` (`access_token`), ADD KEY `scope` (`scope`);

ALTER TABLE `users_user_permissions`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users_user_roles`
 ADD PRIMARY KEY (`user_id`,`role_id`);


ALTER TABLE `categories`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `comments`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `posts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `users_clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
ALTER TABLE `users_group_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_metadata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
ALTER TABLE `users_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_providers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
ALTER TABLE `users_role_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_scopes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_sessionscopes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_user_permissions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users_sessions`
ADD CONSTRAINT `oauth_sessions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users_clients` (`client_id`) ON DELETE CASCADE;

ALTER TABLE `users_sessionscopes`
ADD CONSTRAINT `oauth_sessionscopes_ibfk_1` FOREIGN KEY (`scope`) REFERENCES `users_scopes` (`scope`),
ADD CONSTRAINT `oauth_sessionscopes_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `users_sessions` (`id`) ON DELETE CASCADE;
