<?php
	
	/**
	 *
	 */
	class M_pc extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
			
			# code...
		}
		
		public function set_pc($pcjson)
		{
			$CPU_NAME = "";
			$CPU_ID = "";
			$MEMDX = "";
			$MAINBOARD_NAME = "";
			$SYSTEM_NAME = "";
			$WEISHU = "";
			$SYSTEM_INFO = "";
			
			$SY_NAME = "";
			$SY_PHONE = "";
			$SY_BM = "";
			$POST = "";
			$ZC_BH = "";
			
			$DISK_LX2 = "";
			$DISK_CJ2 = "";
			$DISK_NAME2 = "";
			$DISK_SIZE2 = "";
			$DISK_LX3 = "";
			$DISK_CJ3 = "";
			$DISK_NAME3 = "";
			$DISK_SIZE3 = "";
			$DISK_LX4 = "";
			$DISK_CJ4 = "";
			$DISK_NAME4 = "";
			$DISK_SIZE4 = "";
			$DISK_LX5 = "";
			$DISK_CJ5 = "";
			$DISK_NAME5 = "";
			$DISK_SIZE5 = "";
			
			$NET_DES1 = "";
			$NET_IP1 = "";
			$NET_SUB1 = "";
			$NET_GATE1 = "";
			$NET_MAC1 = "";
			$NET_DES2 = "";
			$NET_IP2 = "";
			$NET_SUB2 = "";
			$NET_GATE2 = "";
			$NET_MAC2 = "";
			$NET_DES3 = "";
			$NET_IP3 = "";
			$NET_SUB3 = "";
			$NET_GATE3 = "";
			$NET_MAC3 = "";
			$ADD_TIME = "";
			$NET_DES4 = "";
			$NET_IP4 = "";
			$NET_SUB4 = "";
			$NET_GATE4 = "";
			$NET_MAC4 = "";
			$NET_DES5 = "";
			$NET_IP5 = "";
			$NET_SUB5 = "";
			$NET_GATE5 = "";
			$NET_MAC5 = "";
			// $this->load->helper('url');
			// $this->CPU_NAME = $this->input->post('');
			//
			$pcinfo = json_decode($pcjson);
			// $this->CPU_NAME=$pcinfo->cpuname;
			// $this->MEMDX= $pcinfo->memsize;
			$nets = $pcinfo->nets;
			$disks = $pcinfo->disks;
			$disksi = count($disks);
			$netsi = count($nets);
			
			if ($disksi > 0) {
				$DISK_LX1 = $disks[0]->Interface;
				$DISK_CJ1 = $disks[0]->Model;
				$DISK_NAME1 = $disks[0]->Name;
				$DISK_SIZE1 = $disks[0]->Size;
			}
			if ($disksi > 1) {
				$DISK_LX2 = $disks[1]->Interface;
				$DISK_CJ2 = $disks[1]->Model;
				$DISK_NAME2 = $disks[1]->Name;
				$DISK_SIZE2 = $disks[1]->Size;
			}
			if ($disksi > 2) {
				$DISK_LX3 = $disks[2]->Interface;
				$DISK_CJ3 = $disks[2]->Model;
				$DISK_NAME3 = $disks[2]->Name;
				$DISK_SIZE3 = $disks[2]->Size;
			}
			if ($disksi > 3) {
				$DISK_LX4 = $disks[3]->Interface;
				$DISK_CJ4 = $disks[3]->Model;
				$DISK_NAME4 = $disks[3]->Name;
				$DISK_SIZE4 = $disks[3]->Size;
			}
			
			if ($netsi > 0) {
				$NET_DES1 = $nets[0]->Caption;
				$NET_IP1 = $nets[0]->IPAddress;
				$NET_SUB1 = $nets[0]->IPSubnet;
				if (isset($nets[0]->DefaultIPGateway)) {
					$NET_GATE1 = $nets[0]->DefaultIPGateway;
				};
				$NET_MAC1 = $nets[0]->MAC;
			}
			
			if ($netsi > 1) {
				$NET_DES2 = $nets[1]->Caption;
				$NET_IP2 = $nets[1]->IPAddress;
				$NET_SUB2 = $nets[1]->IPSubnet;
				if (isset($nets[1]->DefaultIPGateway)) {
					$NET_GATE2 = $nets[1]->DefaultIPGateway;
				};
				$NET_MAC2 = $nets[1]->MAC;
			}
			
			if ($netsi > 2) {
				$NET_DES3 = $nets[2]->Caption;
				$NET_IP3 = $nets[2]->IPAddress;
				$NET_SUB3 = $nets[2]->IPSubnet;
				if (isset($nets[2]->DefaultIPGateway)) {
					$NET_GATE3 = $nets[2]->DefaultIPGateway;
				};
				$NET_MAC3 = $nets[2]->MAC;
			}
			
			if ($netsi > 3) {
				$NET_DES4 = $nets[3]->Caption;
				$NET_IP4 = $nets[3]->IPAddress;
				$NET_SUB4 = $nets[3]->IPSubnet;
				if (isset($nets[3]->DefaultIPGateway)) {
					$NET_GATE4 = $nets[3]->DefaultIPGateway;
				};
				$NET_MAC4 = $nets[3]->MAC;
			}
			
			if (!isset($pcinfo->osArchitecture)) {
				$pcinfo->osArchitecture = "xp-32bit";
			}

//生成用于写入数据库的关联数组
			$data = array(
				'CPU_NAME' => $pcinfo->cpuname,
				'MEMDX' => $pcinfo->memsize,
				'MAINBOARD_NAME' => $pcinfo->boardname,
				'SYSTEM_NAME' => $pcinfo->osCaption,
				'WEISHU' => $pcinfo->osArchitecture,
				'CPU_ID' => $pcinfo->cpu_id,
				'SYSTEM_INFO' => $pcinfo->osCaption,
				
				'POST' => $pcinfo->post_id,
				
				'SY_NAME' => $pcinfo->sy_name,
				'SY_PHONE' => $pcinfo->sy_phone,
				'SY_BM' => $pcinfo->sy_bm,
				'ZC_BH' => $pcinfo->zc_bh,
				'ADD_TIME' => date('y-m-d h:i:s', time()),
				
				'DISK_LX1' => $DISK_LX1,
				'DISK_CJ1' => $DISK_CJ1,
				'DISK_NAME1' => $DISK_NAME1,
				'DISK_SIZE1' => $DISK_SIZE1,
				
				'DISK_LX2' => $DISK_LX2,
				'DISK_CJ2' => $DISK_CJ2,
				'DISK_NAME2' => $DISK_NAME2,
				'DISK_SIZE2' => $DISK_SIZE2,
				
				'DISK_LX3' => $DISK_LX3,
				'DISK_CJ3' => $DISK_CJ3,
				'DISK_NAME3' => $DISK_NAME3,
				'DISK_SIZE3' => $DISK_SIZE3,
				
				'DISK_LX4' => $DISK_LX4,
				'DISK_CJ4' => $DISK_CJ4,
				'DISK_NAME4' => $DISK_NAME4,
				'DISK_SIZE4' => $DISK_SIZE4,
				
				'NET_DES1' => $NET_DES1,
				'NET_IP1' => $NET_IP1,
				'NET_SUB1' => $NET_SUB1,
				'NET_GATE1' => $NET_GATE1,
				'NET_MAC1' => $NET_MAC1,
				
				'NET_DES2' => $NET_DES2,
				'NET_IP2' => $NET_IP2,
				'NET_SUB2' => $NET_SUB2,
				'NET_GATE2' => $NET_GATE2,
				'NET_MAC2' => $NET_MAC2,
				
				'NET_DES3' => $NET_DES3,
				'NET_IP3' => $NET_IP3,
				'NET_SUB3' => $NET_SUB3,
				'NET_GATE3' => $NET_GATE3,
				'NET_MAC3' => $NET_MAC3,
				
				'NET_DES4' => $NET_DES4,
				'NET_IP4' => $NET_IP4,
				'NET_SUB4' => $NET_SUB4,
				'NET_GATE4' => $NET_GATE4,
				'NET_MAC4' => $NET_MAC4,
			);
			
			return $this->db->insert('pcs', $data);
// return '成功导入json. '.var_dump($data);
		
		}
		
		public function list($did = false)
		{
			if ($did == false) {
				$query = $this->db->get('pcs');
				return $query->result_array();
			}
			$query = $this->db->get_where('pcs', array('SY_BM' => $did));
			return $query->result_array();
		}
		
		/**
		 * @param bool $did
		 * @return mixed
		 */
		public function detail($did = false)
		{
			$sql = "SELECT d.name as dname ,p.NAME as pname,pc.SY_NAME, pc.SY_PHONE, pc.SN, pc.CPU_NAME, pc.CPU_ID, pc.MEMDX, pc.MAINBOARD_NAME, pc.SYSTEM_NAME, pc.WEISHU, pc.SYSTEM_INFO,  pc.SY_BM, pc. ZC_BH, pc. ADD_TIME, pc.POST, pc.NET_DES1, pc.NET_IP1,pc.NET_MAC1, pc.NET_DES2, pc.NET_IP2, pc.NET_DES3, pc.NET_IP3, pc.NET_DES4, pc.NET_IP4
FROM pcs AS pc, departs AS d, posts AS p WHERE pc.SY_BM = d.did and pc.POST= p.SN and pc.SY_BM= ?;";
			
			if ($did == false) {
				$query = $this->db->get('pcs');
				return $query->result_array();
			}
			
			$query = $this->db->query($sql,$did);
			return $query->result_array();
		}
	}
