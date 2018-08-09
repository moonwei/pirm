CREATE TABLE `departs` (
	`name` varchar(100) NOT NULL,
	`did` varchar(100) NOT NULL,
	`manager` varchar(100) DEFAULT NULL,
	`tele` varchar(100) DEFAULT NULL,
	PRIMARY KEY (`did`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
