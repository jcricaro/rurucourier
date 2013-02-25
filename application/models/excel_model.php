<?php 

class Excel_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    function update_single($exdt) {
    	$this->db->where('id', $exdt['id'])->update('single',$exdt['data']);
    	
    }

    function get_single() {
    	$query = $this->db->get('single');

    	if($query->num_rows() > 0) {
    		return $query->result();
    	}
    	else {
    		return FALSE;
    	}
    }

    function get_job() {
    	$query = $this->db->get('job_order_items');

    	if($query->num_rows() > 0) {
    		return $query->result();
    	}
    	else {
    		return false;
    	}
    }

    function update_single_stat($ref) {
    	$status = array(
    		'status' => $ref['stat']
    		);
    	$this->db->where('item_code', $ref['item_code']);
		$this->db->update('single', $status);
    }

    function update_job_stat($ic) {
    	$status = array(
    		'status' => $ic['stat']
    		);
    	$this->db->where('item_code', $ic['item_code']);
		$this->db->update('job_order_items', $status);
    }

    function get_single_bydate() {
        $query = $this->db
        ->where('date', date('Y-m-d'))
        ->get('single');

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }

    function get_job_bydate() {
        $query = $this->db
        ->where('date', date('Y-m-d'))
        ->get('job_order_items');

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;   
    }

}