/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица detemiro.det_rules
CREATE TABLE IF NOT EXISTS `det_rules` (
  `code` varchar(60) NOT NULL,
  `info` text,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_rules: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `det_rules` DISABLE KEYS */;
INSERT INTO `det_rules` (`code`, `info`) VALUES
    ('admin', 'Абсолютное право.'),
    ('guest', 'Стандартное право гостя.'),
    ('moderate', 'Общий доступ к панели модерирования.'),
    ('moderate-core', 'Управление важными компонентами системы.'),
    ('moderate-users', 'Право на управление пользователями.'),
    ('public', 'Право авторизованного пользователя.');
/*!40000 ALTER TABLE `det_rules` ENABLE KEYS */;

-- Дамп структуры для таблица detemiro.det_groups
CREATE TABLE IF NOT EXISTS `det_groups` (
  `code` varchar(60) NOT NULL,
  `name` text,
  `info` text,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_groups: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `det_groups` DISABLE KEYS */;
INSERT INTO `det_groups` (`code`, `name`, `info`) VALUES
	('admins', 'Администраторы', ''),
	('banned', 'Забаненные', NULL),
	('guests', 'Гости', ''),
	('moderators', 'Модераторы', 'Общая группа модераторов.'),
	('users', 'Пользователи', 'Обычные пользователи.');
/*!40000 ALTER TABLE `det_groups` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_groups_rules
CREATE TABLE IF NOT EXISTS `det_groups_rules` (
  `group_code` varchar(60) NOT NULL,
  `rule_code` varchar(60) NOT NULL,
  PRIMARY KEY (`group_code`,`rule_code`),
  KEY `gr_rule` (`rule_code`),
  KEY `gr_key` (`group_code`),
  CONSTRAINT `gr_group` FOREIGN KEY (`group_code`) REFERENCES `det_groups` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `gr_rule` FOREIGN KEY (`rule_code`) REFERENCES `det_rules` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_groups_rules: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `det_groups_rules` DISABLE KEYS */;
INSERT INTO `det_groups_rules` (`group_code`, `rule_code`) VALUES
	('admins', 'admin'),
	('guests', 'guest'),
	('moderators', 'moderate'),
	('admins', 'public'),
	('users', 'public');
/*!40000 ALTER TABLE `det_groups_rules` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_media
CREATE TABLE IF NOT EXISTS `det_media` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned DEFAULT NULL,
  `path` text NOT NULL,
  `mime` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `comment` text,
  `type` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `media_author` (`author_id`),
  CONSTRAINT `media_author` FOREIGN KEY (`author_id`) REFERENCES `det_users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_media: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `det_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_media` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_options
CREATE TABLE IF NOT EXISTS `det_options` (
  `family` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`family`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_options: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `det_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `det_options` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_users
CREATE TABLE IF NOT EXISTS `det_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `salt` varchar(30) NOT NULL,
  `hash` varchar(26) DEFAULT NULL,
  `registration` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ulogin` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_users: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `det_users` DISABLE KEYS */;
INSERT INTO `det_users` (`id`, `login`, `password`, `salt`, `hash`, `registration`, `last_login`) VALUES
	(1, 'admin', '$2a$10$6MIhXgCxWteDmqCr5686AefR5urZ9eDXig7YLL.rWUyJ1M9XOsrXS', '$2a$10$6MIhXgCxWteDmqCr5686At$', null, '2014-05-26 20:28:30', '2015-08-24 01:53:41');
/*!40000 ALTER TABLE `det_users` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_users_fields
CREATE TABLE IF NOT EXISTS `det_users_fields` (
  `name` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL DEFAULT 'default',
  `require` tinyint(4) NOT NULL DEFAULT '0',
  `value` text,
  `title` varchar(255) DEFAULT NULL,
  `priority` INT(11) NULL DEFAULT '0',
  `info` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_users_fields: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `det_users_fields` DISABLE KEYS */;
INSERT INTO `det_users_fields` (`name`, `type`, `require`, `value`, `title`, `info`) VALUES
	('avatar', 'image', 0, '', 'Аватар', 'Аватар пользователя'),
	('mail', 'mail', 0, '', 'E-mail', ''),
	('name', 'string', 0, '', 'Имя пользователя', 'Имя и фамилия');
/*!40000 ALTER TABLE `det_users_fields` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_users_groups
CREATE TABLE IF NOT EXISTS `det_users_groups` (
  `user_id` bigint(20) unsigned NOT NULL,
  `group_code` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`,`group_code`),
  KEY `ug_group` (`group_code`),
  KEY `ug_key` (`user_id`),
  CONSTRAINT `ug_group` FOREIGN KEY (`group_code`) REFERENCES `det_groups` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ug_user` FOREIGN KEY (`user_id`) REFERENCES `det_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_users_groups: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `det_users_groups` DISABLE KEYS */;
INSERT INTO `det_users_groups` (`user_id`, `group_code`) VALUES
	(1, 'admins'),
	(2, 'admins');
/*!40000 ALTER TABLE `det_users_groups` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_users_properties
CREATE TABLE IF NOT EXISTS `det_users_properties` (
  `user_id` bigint(20) unsigned NOT NULL,
  `family` varchar(60) NOT NULL,
  `code` varchar(60) NOT NULL,
  `value` text,
  PRIMARY KEY (`user_id`,`code`,`family`),
  CONSTRAINT `up_user` FOREIGN KEY (`user_id`) REFERENCES `det_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_users_properties: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `det_users_properties` DISABLE KEYS */;
INSERT INTO `det_users_properties` (`user_id`, `family`, `code`, `value`) VALUES
	(1, 'notes', 'index', 'Привет мир!'),
	(1, 'usersfields', 'mail', 'dkruban@gmail.com'),
	(1, 'usersfields', 'name', 'Дмитрий Рубан'),
	(1, 'theme', 'profile-bg', 'https://detemiro.org/det-admin/det-content/themes/master/images/bg.jpg'),
	(1, 'theme', 'sidebar', '1'),
	(2, 'theme', 'sidebar', '1');
/*!40000 ALTER TABLE `det_users_properties` ENABLE KEYS */;


-- Дамп структуры для таблица detemiro.det_users_rules
CREATE TABLE IF NOT EXISTS `det_users_rules` (
  `user_id` bigint(20) unsigned NOT NULL,
  `rule_code` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`,`rule_code`),
  KEY `ur_rule` (`rule_code`),
  KEY `ur_key` (`user_id`),
  CONSTRAINT `ur_rule` FOREIGN KEY (`rule_code`) REFERENCES `det_rules` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ur_user` FOREIGN KEY (`user_id`) REFERENCES `det_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы detemiro.det_users_rules: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `det_users_rules` DISABLE KEYS */;
INSERT INTO `det_users_rules` (`user_id`, `rule_code`) VALUES
	(1, 'admin');
/*!40000 ALTER TABLE `det_users_rules` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
