--建立部门表
CREATE TABLE `departs` (
	`name` varchar(100) NOT NULL,
	`did` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 添加部门表数据
INSERT INTO departs(name,did) values ("办公室","D1"),("人力资源部","D2"),("财务部","D3"),("资产运营与物资管理部","D4"),("工会","D5"),("党群工作部","D6"),("派驻纪检组／派驻审计部","D7"),("客户服务部","D8"),("市场营销部","D9"),("信息化服务中心","D10"),("自有厅营销中心","D11"),("综合服务支撑中心","D12"),("渠道营销中心","D13"),("互联网与电子商务中心","D14"),("创新业务支撑中心","D15"),("政企客户事业部","D16"),("校园营销中心","D17"),("政要大客户营销中心","D18"),("政企大客户营销中心","D19"),("运行维护部/网络与信息安全办公室","D20"),("网络发展部","D21"),("网络维护中心","D22"),("网络优化中心","D23"),("客户支撑中心","D24"),("新华区营销中心","D25"),("湛河区营销中心","D26"),("卫东区营销中心","D27"),("新城区营销中心","D28"),("鲁山县分公司","D29"),("汝州市分公司","D30"),("宝丰县分公司","D31"),("舞钢市分公司","D32"),("叶县分公司","D33"),("郏县分公司","D34");

-- 显示部门表数据
select did,name from departs;

--清空部门表数据
DELETE from departs where 1=1;


--创建计算机信息表
CREATE TABLE pcinfo.pcs (
	SN BIGINT(11) NOT NULL  AUTO_INCREMENT,
	CPU_NAME VARCHAR(100) ,
	CPU_ID VARCHAR(100),
	MEMDX VARCHAR(100),
	MAINBOARD_NAME VARCHAR(100),
	SYSTEM_NAME VARCHAR(100),
	WEISHU VARCHAR(100),
	DISK_LX1 VARCHAR(100),
	DISK_CJ1 VARCHAR(100),
	DISK_NAME1 VARCHAR(100),
	DISK_SIZE1 int(11),
	DISK_LX2 VARCHAR(100),
	DISK_CJ2 VARCHAR(100),
	DISK_NAME2 VARCHAR(100),
	DISK_SIZE2 int(11),
	DISK_LX3 VARCHAR(100),
	DISK_CJ3 VARCHAR(100),
	DISK_NAME3 VARCHAR(100),
	DISK_SIZE3 int(11),
	DISK_LX4 VARCHAR(100),
	DISK_CJ4 VARCHAR(100),
	DISK_NAME4 VARCHAR(100),
	DISK_SIZE4 int(11),
	NET_DES1 VARCHAR(200),
	NET_IP1 VARCHAR(50),
	NET_SUB1 VARCHAR(50),
	NET_GATE1 VARCHAR(50),
	NET_MAC1 VARCHAR(50),
	NET_DES2 VARCHAR(200),
	NET_IP2 VARCHAR(50),
	NET_SUB2 VARCHAR(50),
	NET_GATE2 VARCHAR(50),
	NET_MAC2 VARCHAR(50),
	SY_NAME VARCHAR(50),
	SY_PHONE VARCHAR(50),
	SY_BM VARCHAR(30),
	ZC_BH VARCHAR(30),
	ADD_TIME DATETIME,
	NET_DES3 VARCHAR(200),
	NET_IP3 VARCHAR(50),
	NET_SUB3 VARCHAR(50),
	NET_GATE3 VARCHAR(50),
	NET_MAC3 VARCHAR(50),
	NET_DES4 VARCHAR(200),
	NET_IP4 VARCHAR(50),
	NET_SUB4 VARCHAR(50),
	NET_GATE4 VARCHAR(50),
	NET_MAC4 VARCHAR(50),
	SYSTEM_INFO VARCHAR(100),
	PRIMARY KEY (SN)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4;

--显示计算机信息表数据
SELECT SN, CPU_NAME, CPU_ID, MEMDX, MAINBOARD_NAME, SYSTEM_INFO, SYSTEM_NAME, WEISHU, SY_NAME, SY_PHONE, SY_BM, ZC_BH, ADD_TIME, DISK_LX1, DISK_CJ1, DISK_NAME1, DISK_SIZE1, DISK_LX2, DISK_CJ2, DISK_NAME2, DISK_SIZE2, DISK_LX3, DISK_CJ3, DISK_NAME3, DISK_SIZE3, DISK_LX4, DISK_CJ4, DISK_NAME4, DISK_SIZE4, NET_DES1, NET_IP1, NET_SUB1, NET_GATE1, NET_MAC1, NET_DES2, NET_IP2, NET_SUB2, NET_GATE2, NET_MAC2, NET_DES3, NET_IP3, NET_SUB3, NET_GATE3, NET_MAC3, NET_DES4, NET_IP4, NET_SUB4, NET_GATE4, NET_MAC4
FROM pcinfo.pcs;

-- 清空计算机信息表数据
DELETE from pcs where 1;


--删除计算机信息表
drop TABLE pcs;

--清空数据，重置id方法一：
truncate TABLE pcs;

--重置id方法二：
ALTER TABLE pcs auto_increment = 1;


-- 建立岗位表


-- 全部数据
SELECT	SN,	CPU_NAME,	CPU_ID,	MEMDX,	MAINBOARD_NAME,	SYSTEM_NAME,	WEISHU,	SYSTEM_INFO,	SY_NAME,	SY_PHONE,	SY_BM,	ZC_BH,	ADD_TIME,	POST,	NET_DES1,	NET_IP1,	NET_DES2,	NET_IP2,	NET_DES3,	NET_IP3,	NET_DES4,	NET_IP4
FROM	pcinfo.pcs;

-- 明细+部门和岗位名称
SELECT d.name,p.NAME,pc.SY_NAME, pc.SY_PHONE, pc.SN, pc.CPU_NAME, pc.CPU_ID, pc.MEMDX, pc. MAINBOARD_NAME, pc.SYSTEM_NAME, pc.WEISHU, pc.SYSTEM_INFO,  pc.SY_BM, pc. ZC_BH, pc. ADD_TIME, pc.POST, pc.NET_DES1, pc.NET_IP1, pc.NET_DES2, pc.NET_IP2, pc.NET_DES3, pc.NET_IP3, pc.NET_DES4, pc.NET_IP4
FROM pcinfo.pcs AS pc, departs AS d, posts AS p WHERE pc.SY_BM = d.did and pc.POST= p.SN ;

-- 统计总数
SELECT COUNT(1)
FROM pcs;

-- 统计各部门报送数量
SELECT pc.SY_BM,d.name,COUNT(1)
FROM pcinfo.pcs AS pc, departs AS d WHERE pc.SY_BM = d.did GROUP by pc.SY_BM;


-- 统计未报送的部门
SELECT p.SY_BM,d.name,COUNT(1)
FROM departs as d LEFT OUTER JOIN pcs as p ON p.SY_BM = d.did GROUP BY d.name ORDER BY COUNT(1) DESC ;


-- 133网段登记明细
SELECT d.name,p.NAME,pc.SY_NAME, pc.SY_PHONE, pc.SN, pc.CPU_NAME, pc.CPU_ID, pc.MEMDX, pc. MAINBOARD_NAME, pc.SYSTEM_NAME, pc.WEISHU, pc.SYSTEM_INFO,  pc.SY_BM, pc. ZC_BH, pc. ADD_TIME, pc.POST, pc.NET_DES1, pc.NET_IP1, pc.NET_DES2, pc.NET_IP2, pc.NET_DES3, pc.NET_IP3, pc.NET_DES4, pc.NET_IP4
FROM pcinfo.pcs AS pc, departs AS d, posts AS p WHERE pc.SY_BM = d.did and pc.POST= p.SN AND (NET_IP1 LIKE "133%" OR 	NET_IP2 LIKE "133%" OR NET_IP3 LIKE "133%" OR NET_IP4 LIKE "133%");

-- 重复次数统计
SELECT NET_MAC1,SY_BM,SY_NAME,COUNT(1) FROM pcs group by NET_MAC1 ORDER BY COUNT(1) DESC;

-- 提取部门终端数据
SELECT SN, NET_MAC1, SY_NAME, SY_PHONE, SY_BM, ZC_BH,CPU_NAME, CPU_ID, MEMDX, MAINBOARD_NAME, SYSTEM_NAME, WEISHU, SYSTEM_INFO, SY_NAME, SY_PHONE, SY_BM, ZC_BH, ADD_TIME, POST, DISK_LX1, DISK_CJ1, DISK_NAME1, DISK_SIZE1, DISK_LX2, DISK_CJ2, DISK_NAME2, DISK_SIZE2, DISK_LX3, DISK_CJ3, DISK_NAME3, DISK_SIZE3, DISK_LX4, DISK_CJ4, DISK_NAME4, DISK_SIZE4, NET_DES1, NET_IP1, NET_SUB1, NET_GATE1,  NET_DES2, NET_IP2, NET_SUB2, NET_GATE2, NET_MAC2, NET_DES3, NET_IP3, NET_SUB3, NET_GATE3, NET_MAC3, NET_DES4, NET_IP4, NET_SUB4, NET_GATE4, NET_MAC4
FROM pcinfo.pcs WHERE
		SY_BM='D12'
ORDER BY SY_NAME DESC;
