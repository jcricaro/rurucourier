<?php 

class Job_order_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    function get_clients () {
    	$query = $this->db->get('clients');
    	if($query->num_rows() > 0) {
    		foreach($query->result() as $row) {
    			$data[] = $row;
    		}
    		return $data;
    	}
        else {
            return false;
        }
    }

    function add_job_order($data) {
    	$this->db->insert('job_order',$data);
    }

    function add_job_order_item($db) {
    	$this->db->insert('job_order_items',$db);
    }

    function get_id($ref,$job) {
    	$query = $this->db->where('ref_number',$ref)->where('job_order_number', $job)->limit(1)->get('job_order');
    	if($query->num_rows() > 0) {
    		return $query->row();
    	}
    	else {
    		return false;
    	}

    }

    function get_row_job($id) {
    	$query =$this->db->where('id', $id)->limit(1)->get('job_order');
    	if($query->num_rows() > 0) {
    		return $query->row();
    	}
    	else {
    		return false;
    	}
    }

    function get_row_clients($cid) {
    	$query =$this->db->where('id', $cid)->limit(1)->get('clients');
    	if($query->num_rows() > 0) {
    		return $query->row();
    	}
    	else {
    		return false;
    	}	
    }

    function get_job_items($jon) {
    	$query = $this->db->where('job_order_number',strtolower($jon))->get('job_order_items');
    	if($query->num_rows() > 0) {
    		foreach($query->result() as $row) {
    			$data[] = $row;
    		}

    		return $data;

    	}
        else {
            return false;
        }
    }

    function get_job_item($id) {
    	$query = $this->db->where('id', $id)->get('job_order_items');
    	if ($query->num_rows() >0){
    		return $query->last_row();
    	}
    	else {
    		return false;
    	}

    }
    function delete_row($id) {
    	$this->db->where('id', $id)->delete('job_order_items');
    }

    function get_client_name($cid) {
    	$query = $this->db->where('id', $cid)->limit(1)->get('clients');
    	
    	if($query->num_rows() > 0) {
    		return $query->row();
    	}
    	else {
    		return false;
    	}	

    }


    function delete_job_order($id) {
        $this->db->where('id', $id)->delete('job_order');
        $this->db->where('job_order_id',$id)->delete('job_order_items');
    }

    function update_price($up,$data) {

    $this->db->where('id', $data['ids']);
    $this->db->update('job_order', $up);
        
    }

    function get_items($id) {
        $query = $this->db->where('job_order_id', $id)->get('job_order_items');
        if($query->num_rows() > 0) {
            foreach($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else {
            return false;
        }
    }

}