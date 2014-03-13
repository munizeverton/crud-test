


-- ----------------------------
-- Table structure for paginas
-- ----------------------------
DROP TABLE IF EXISTS `paginas`;
CREATE TABLE `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` longtext,
  `body` longtext,
  `author` varchar(100) DEFAULT NULL,
  `insert_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
