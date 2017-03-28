# players

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NULL COLLATE utf8_general_ci DEFAULT NULL,
  `user` varchar(127) NULL COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(127) NULL COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

# games

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(127) NULL COLLATE utf8_general_ci DEFAULT NULL,
  `started_at` datetime NULL DEFAULT NULL,
  `finished_at` datetime NULL DEFAULT NULL,
  `winner_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `winner_id_fk` (`winner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

# round

DROP TABLE IF EXISTS `round`;

CREATE TABLE `round` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NULL DEFAULT NULL,
  `nr` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `game_id_fk` (`game_id`),
  UNIQUE KEY `game_nr` (`game_id`, `nr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

# player_has_game

DROP TABLE IF EXISTS `player_has_game`;

CREATE TABLE `player_has_game` (
  `player_id` int(11) NULL DEFAULT NULL,
  `game_id` int(11) NULL DEFAULT NULL,
  `hand` text NULL COLLATE utf8_general_ci DEFAULT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`player_id`, `game_id`),
  KEY `player_id_fk` (`player_id`),
  KEY `game_id_fk` (`game_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;