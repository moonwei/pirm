CREATE TABLE `posts` (
	`sn` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`dep` varchar(100) NOT NULL,
	PRIMARY KEY (`sn`),
	KEY `posts_departs_FK` (`dep`),
	CONSTRAINT `posts_departs_FK` FOREIGN KEY (`dep`) REFERENCES `departs` (`did`)
) ENGINE=InnoDB AUTO_INCREMENT=581 DEFAULT CHARSET=utf8mb4;
