# Host: localhost  (Version 5.5.5-10.4.19-MariaDB)
# Date: 2021-07-12 20:08:11
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "member"
#

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `parent_id` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "member"
#

INSERT INTO `member` VALUES (0,'root',0),(1,'William',0),(2,'Jessica',0),(3,'Samantha',0),(4,'Maya',0),(5,'Richard',1),(6,'Ryan',1),(7,'Marge',2),(8,'James',3),(9,'April',3),(10,'Charles',3),(11,'Gerald',4),(12,'Andrea',4),(13,'Summer',5),(14,'Geraldine',7),(15,'John',7),(16,'Bach',9),(17,'Dean',12),(18,'Andre',12),(19,'Josephine',12),(20,'Drake',14),(21,'Neil',18),(22,'Derp',21),(23,'Derpina',22);
