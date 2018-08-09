<?php
/**
 *
 */
class Departs_model extends CI_Model {

	function __construct() {
		$this->load->database();

	}

	public function list() {
		// $query = $this->db->get('departs');
		$query = $this->db->query("select did,name from departs");
		return $query->result();

	}
	public function get_deps() {
		$query = $this->db->query("select did,name from departs");
		return $query->result();
	}

	//测试用一个函数解决部门列表和某个部门内容的问题
	public function g($did = FALSE) {
		if ($did == FALSE) {
			return NULL;
			// // $query = $this->db->get('departs');
			// 		$query = $this->db->select('did,name')
			// 						->get('departs');
			// 		return $query->result();
		} else {
			$query = $this->db->select('did,name')
				->where("did", $did)
				->get('departs');
			return $query->row();
		}

	}
}