<?php

class Downloads_model extends CI_Model {
	function get_status() {
		$query = $this->db->where('id',1)->limit(1)->get('download');

		if($query->num_rows() > 0) {
			return $query->result();
		}
		else {
			return FALSE;
		}
	}

	function update_status($db) {
		$this->db->where('id',1)->update('download', $db);
	}
}