CREATE TABLE `pcs` (
	`SN` bigint(11) NOT NULL AUTO_INCREMENT,
	`CPU_NAME` varchar(100) DEFAULT NULL,
	`CPU_ID` varchar(100) DEFAULT NULL,
	`MEMDX` varchar(100) DEFAULT NULL,
	`MAINBOARD_NAME` varchar(100) DEFAULT NULL,
	`SYSTEM_NAME` varchar(100) DEFAULT NULL,
	`WEISHU` varchar(100) DEFAULT NULL,
	`SYSTEM_INFO` varchar(100) DEFAULT NULL,
	`SY_NAME` varchar(50) DEFAULT NULL,
	`SY_PHONE` varchar(50) DEFAULT NULL,
	`SY_BM` varchar(30) DEFAULT NULL,
	`ZC_BH` varchar(30) DEFAULT NULL,
	`ADD_TIME` datetime DEFAULT NULL,
	`POST` int(11) NOT NULL,
	`DISK_LX1` varchar(100) DEFAULT NULL,
	`DISK_CJ1` varchar(100) DEFAULT NULL,
	`DISK_NAME1` varchar(100) DEFAULT NULL,
	`DISK_SIZE1` int(11) DEFAULT NULL,
	`DISK_LX2` varchar(100) DEFAULT NULL,
	`DISK_CJ2` varchar(100) DEFAULT NULL,
	`DISK_NAME2` varchar(100) DEFAULT NULL,
	`DISK_SIZE2` int(11) DEFAULT NULL,
	`DISK_LX3` varchar(100) DEFAULT NULL,
	`DISK_CJ3` varchar(100) DEFAULT NULL,
	`DISK_NAME3` varchar(100) DEFAULT NULL,
	`DISK_SIZE3` int(11) DEFAULT NULL,
	`DISK_LX4` varchar(100) DEFAULT NULL,
	`DISK_CJ4` varchar(100) DEFAULT NULL,
	`DISK_NAME4` varchar(100) DEFAULT NULL,
	`DISK_SIZE4` int(11) DEFAULT NULL,
	`NET_DES1` varchar(200) DEFAULT NULL,
	`NET_IP1` varchar(50) DEFAULT NULL,
	`NET_SUB1` varchar(50) DEFAULT NULL,
	`NET_GATE1` varchar(50) DEFAULT NULL,
	`NET_MAC1` varchar(50) DEFAULT NULL,
	`NET_DES2` varchar(200) DEFAULT NULL,
	`NET_IP2` varchar(50) DEFAULT NULL,
	`NET_SUB2` varchar(50) DEFAULT NULL,
	`NET_GATE2` varchar(50) DEFAULT NULL,
	`NET_MAC2` varchar(50) DEFAULT NULL,
	`NET_DES3` varchar(200) DEFAULT NULL,
	`NET_IP3` varchar(50) DEFAULT NULL,
	`NET_SUB3` varchar(50) DEFAULT NULL,
	`NET_GATE3` varchar(50) DEFAULT NULL,
	`NET_MAC3` varchar(50) DEFAULT NULL,
	`NET_DES4` varchar(200) DEFAULT NULL,
	`NET_IP4` varchar(50) DEFAULT NULL,
	`NET_SUB4` varchar(50) DEFAULT NULL,
	`NET_GATE4` varchar(50) DEFAULT NULL,
	`NET_MAC4` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`SN`)
) ENGINE=InnoDB AUTO_INCREMENT=818 DEFAULT CHARSET=utf8mb4;