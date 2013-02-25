<?php

class Feedback_model extends CI_Model {
	function add_feedback($db) {
		$this->db->insert('feedback', $db);
	}
	
	function get_feedback() {
		$query = $this->db->get('feedback');
        
        if($query->num_rows >0) {
            return $query->result();
        }
		return false;
	}
	
	function update_feedback($id,$status) {
		$this->db
			->where('id',$id)
			->update('feedback',$status);
	}
	
	function get_active() {
		$query = $this->db->where('status', 1)->limit(10)->get('feedback');
		
		if($query->num_rows > 0) {
			return $query->result();
		}
		return false;
	}
}
