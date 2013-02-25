<?php 

class Reports_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    function get_all() {
    	$q = $this->db->get('single');
    	if($q->num_rows() > 0) {
    		foreach($q->result() as $row) {
    			$data[] = $row;
    		}
    		return $data;
    	}
        else {
            return false;
        }
    }

    function get_some($offset,$limit) {
        $query = $this->db
            ->offset($offset)
            ->limit($limit)
            ->get('single');

        if($query->num_rows() >0) {
            return $query->result();
        }
        return false;

    }

    function get_one($id) {
        $q = $this->db->where('id',$id)->get('single');
    }

    function delete_one($id) {
        $this->db->where('id',$id)->delete('single');
    }

    function get_job($offset,$limit) {
        $query = $this->db
            ->offset($offset)
            ->limit($limit)
            ->get('job_order_items');

        if($query->num_rows() > 0) {
            return $query->result();
        }
        return FALSE;
    }

    function get_job_all() {
        $q = $this->db->get('job_order_items');
        if($q->num_rows() > 0) {
            foreach($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        else {
            return false;
        }   
    }

    function get_job_search($ref,$month,$year,$offset) {
        $query = $this->db
            ->where('job_order_number',$ref)
            ->or_where('item_code',$ref)
            ->where('month(date)',$month)
            ->where('year(date)',$year)
            ->offset($offset)
            ->get('job_order_items');

        if($query->num_rows() > 0) {
            return $query->result();
        }
        else {
            return FALSE;
        }
    }
}