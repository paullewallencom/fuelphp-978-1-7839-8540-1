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
('app', 'default', '001_create_posts');

CREATE TABLE `posts` (
`id` int(11) unsigned NOT NULL,
  `content` varchar(140) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `content`, `user_id`, `created_at`) VALUES
(1, 'eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis', 1, 1421881330),
(2, 'egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et,', 1, 1421883830),
(3, 'Nullam ut nisi a odio semper cursus. Integer mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis', 1, 1421886330),
(4, 'sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. D', 1, 1421888830),
(5, 'nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra ut,', 1, 1421891330),
(6, 'enim. Nunc ut erat. Sed nunc est, mollis non, cursus non, egestas a, dui. Cras pellentesque. Sed', 1, 1421893830),
(7, 'Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare,', 1, 1421896330),
(8, 'a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque tincidunt pede ac', 1, 1421898830),
(9, 'ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac ', 1, 1421901330),
(10, 'nec ante blandit viverra. Donec tempus, lorem fringilla ornare placerat,', 1, 1421903830),
(11, 'mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis dia', 1, 1421906330),
(12, 'Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesu', 1, 1421908830),
(13, 'accumsan convallis, ante lectus convallis est, vitae sodales nisi', 1, 1421911330),
(14, 'In nec orci. Donec nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est', 1, 1421913830),
(15, 'Mauris ut quam vel sapien imperdiet ornare. In faucibus. Morbi vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac arcu. N', 1, 1421916330),
(16, 'nascetur ridiculus mus. Proin vel nisl. Quisque fringilla euismod enim. Etiam', 1, 1421918830),
(17, 'mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna', 1, 1421921330),
(18, 'Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor sceleri', 1, 1421923830),
(19, 'Mauris vestibulum, neque sed dictum eleifend, nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibe', 1, 1421926330),
(20, 'molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit amet', 1, 1421928830),
(21, 'Integer vitae nibh. Donec est mauris, rhoncus id, mollis nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus, ipsum leo elementum', 1, 1421931330),
(22, 'semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet.', 1, 1421933830),
(23, 'Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in lobortis tellus justo sit amet nul', 1, 1421936330),
(24, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere', 1, 1421938830),
(25, 'Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor, velit eget laoreet posuere, enim nisl elementum pur', 1, 1421941330),
(26, 'pellentesque. Sed dictum. Proin eget odio. Aliquam vulputate ullamcorper magna.', 1, 1421943830),
(27, 'vitae, erat. Vivamus nisi. Mauris nulla. Integer urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas orn', 1, 1421946330),
(28, 'Aenean gravida nunc sed pede. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel arcu eu odio t', 1, 1421948830),
(29, 'Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing', 1, 1421951330),
(30, 'euismod enim. Etiam gravida molestie arcu. Sed eu nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula. Nullam enim. Sed nu', 1, 1421953830),
(31, 'diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam vel sapien ', 1, 1421956330),
(32, 'et netus et malesuada fames ac turpis egestas. Fusce aliquet magna a neque. Nullam ut nisi a odio semper cursus. Integer mollis. Integer tin', 1, 1421958830),
(33, 'Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mol', 1, 1421961330),
(34, 'volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tem', 1, 1421963830),
(35, 'justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer in magn', 1, 1421966330),
(36, 'magna a tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est. Nu', 1, 1421968830),
(37, 'metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, pl', 1, 1421971330),
(38, 'Praesent luctus. Curabitur egestas nunc sed libero. Proin sed', 1, 1421973830),
(39, 'urna, nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi lorem, vehicula et,', 1, 1421976330),
(40, 'In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et', 1, 1421978830),
(41, 'egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit,', 1, 1421981330),
(42, 'Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et', 1, 1421983830),
(43, 'nunc risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci,', 1, 1421986330),
(44, 'scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus', 1, 1421988830),
(45, 'sapien. Nunc pulvinar arcu et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus libero mauris, aliquam eu, accumsan sed, faci', 1, 1421991330),
(46, 'mauris id sapien. Cras dolor dolor, tempus non, lacinia at,', 1, 1421993830),
(47, 'condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis nat', 1, 1421996330),
(48, 'hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdiet dictum magna. Ut tincidunt orci quis lectus.', 1, 1421998830),
(49, 'eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed,', 1, 1422001330),
(50, 'urna. Vivamus molestie dapibus ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat placerat velit', 1, 1422003830),
(51, 'Donec non justo. Proin non massa non ante bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincid', 1, 1422006330),
(52, 'ac mattis ornare, lectus ante dictum mi, ac mattis velit justo nec ante. Maecenas mi felis, adipiscing fringilla, porttitor vulputate, posue', 1, 1422008830),
(53, 'neque. Nullam nisl. Maecenas malesuada fringilla est. Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue ut lacus. Nulla tinc', 1, 1422011330),
(54, 'cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenati', 1, 1422013830),
(55, 'auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor. Fusce feugiat. Lorem ip', 1, 1422016330),
(56, 'at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel,', 1, 1422018830),
(57, 'Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris u', 1, 1422021330),
(58, 'blandit mattis. Cras eget nisi dictum augue malesuada malesuada. Integer id magna et ipsum cursus vestibulum. Mauris magna. Duis', 1, 1422023830),
(59, 'tincidunt nibh. Phasellus nulla. Integer vulputate, risus a ultricies adipiscing, enim mi tempor lorem, eget', 1, 1422026330),
(60, 'risus varius orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit ', 1, 1422028830),
(61, 'ut mi. Duis risus odio, auctor vitae, aliquet nec, imperdiet nec, leo. Morbi neque tellus, imperdiet non, vestibulum nec, euismod in, dolor.', 1, 1422031330),
(62, 'Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus vulputate, nisi sem', 1, 1422033830),
(63, 'Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, malesuada id, erat. Etiam vesti', 1, 1422036330),
(64, 'Proin vel arcu eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam', 1, 1422038830),
(65, 'hendrerit id, ante. Nunc mauris sapien, cursus in, hendrerit consectetuer, cursus et, magna. Praesent interdum ligula eu enim. Etiam imperdi', 1, 1422041330),
(66, 'tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed', 1, 1422043830),
(67, 'pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi', 1, 1422046330),
(68, 'risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam ', 1, 1422048830),
(69, 'gravida non, sollicitudin a, malesuada id, erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque', 1, 1422051330),
(70, 'Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridi', 1, 1422053830),
(71, 'orci, in consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibu', 1, 1422056330),
(72, 'sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis', 1, 1422058830),
(73, 'erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec', 1, 1422061330),
(74, 'nonummy ut, molestie in, tempus eu, ligula. Aenean euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget', 1, 1422063830),
(75, 'pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis ege', 1, 1422066330),
(76, 'Mauris nulla. Integer urna. Vivamus molestie dapibus ligula.', 1, 1422068830),
(77, 'sed dolor. Fusce mi lorem, vehicula et, rutrum eu, ultrices sit amet, risus. Donec nibh enim, gravida sit amet, dapibus id, blandit at, nisi', 1, 1422071330),
(78, 'urna. Ut tincidunt vehicula risus. Nulla eget metus eu erat semper rutrum. Fusce dolor quam, elementum at, egestas a, scelerisque sed, sapie', 1, 1422073830),
(79, 'eu augue porttitor interdum. Sed auctor odio a purus. Duis elementum, dui quis', 1, 1422076330),
(80, 'auctor non, feugiat nec, diam. Duis mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum. Donec sollicitudin', 1, 1422078830),
(81, 'Fusce feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam auctor,', 1, 1422081330),
(82, 'ipsum non arcu. Vivamus sit amet risus. Donec egestas. Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis non, cursus', 1, 1422083830),
(83, 'mollis lectus pede et risus. Quisque libero lacus, varius et, euismod et, commodo at, libero. Morbi', 1, 1422086330),
(84, 'Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque', 1, 1422088830),
(85, 'lorem, eget mollis lectus pede et risus. Quisque libero', 1, 1422091330),
(86, 'dapibus id, blandit at, nisi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin vel', 1, 1422093830),
(87, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel', 1, 1422096330),
(88, 'mattis velit justo nec ante. Maecenas mi felis, adipiscing', 1, 1422098830),
(89, 'aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a, males', 1, 1422101330),
(90, 'ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris', 1, 1422103830),
(91, 'consequat enim diam vel arcu. Curabitur ut odio vel est tempor bibendum. Donec felis orci, adipiscing non, luctus sit amet, faucibus', 1, 1422106330),
(92, 'lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. ', 1, 1422108830),
(93, 'molestie orci tincidunt adipiscing. Mauris molestie pharetra nibh. Aliquam ornare, libero at auctor ullamcorper, nisl arcu iaculis enim, sit', 1, 1422111330),
(94, 'sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. D', 1, 1422113830),
(95, 'volutpat nunc sit amet metus. Aliquam erat volutpat. Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate', 1, 1422116330),
(96, 'feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc, ullamcorper eu, euismod ac, fermentum vel, mauris. Integer', 1, 1422118830),
(97, 'a neque. Nullam ut nisi a odio semper cursus.', 1, 1422121330),
(98, 'bibendum ullamcorper. Duis cursus, diam at pretium aliquet, metus urna convallis erat, eget tincidunt dui augue', 1, 1422123830),
(99, 'lacinia orci, consectetuer euismod est arcu ac orci. Ut', 1, 1422126330),
(100, 'lobortis ultrices. Vivamus rhoncus. Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer euismod est', 1, 1422128830);

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `last_login` varchar(25) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`) VALUES
(1, 'admin', '6XzpOmlNnc9LfeSoIZXx5fzKfAWuXE83/0tSDAJesFs=', 1, 'admin@admin.org', '1422128499', '7c1d3b4a19b1b7091c5c9d11ed9ae4a3bf55e62e', 'a:0:{}', 1422127653, 0);

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


ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`email`);

ALTER TABLE `users_clients`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `client_id` (`client_id`);

ALTER TABLE `users_providers`
 ADD PRIMARY KEY (`id`), ADD KEY `parent_id` (`parent_id`);

ALTER TABLE `users_scopes`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `scope` (`scope`);

ALTER TABLE `users_sessions`
 ADD PRIMARY KEY (`id`), ADD KEY `oauth_sessions_ibfk_1` (`client_id`);

ALTER TABLE `users_sessionscopes`
 ADD PRIMARY KEY (`id`), ADD KEY `session_id` (`session_id`), ADD KEY `access_token` (`access_token`), ADD KEY `scope` (`scope`);


ALTER TABLE `posts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
ALTER TABLE `users_clients`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_providers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_scopes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_sessions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users_sessionscopes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users_sessions`
ADD CONSTRAINT `oauth_sessions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users_clients` (`client_id`) ON DELETE CASCADE;

ALTER TABLE `users_sessionscopes`
ADD CONSTRAINT `oauth_sessionscopes_ibfk_1` FOREIGN KEY (`scope`) REFERENCES `users_scopes` (`scope`),
ADD CONSTRAINT `oauth_sessionscopes_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `users_sessions` (`id`) ON DELETE CASCADE;


UPDATE `posts` SET `created_at` = (UNIX_TIMESTAMP() + `id` * 2500 - 100 * 2500);