<?php
/**
 *
 */
class M_post extends CI_Model {

	public function __construct() {
		$this->load->database();

		# code...
	}

	public function findByDid($did) {
		$query = $this->db->get_where('posts', array('dep' => $did));
		return $query->result();
	}

	public function findBySn($sn) {
		$query = $this->db->get_where('posts', array('SN' => $sn));
		return $query->row();
	}

}
?>