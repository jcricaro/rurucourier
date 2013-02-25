<?php 

class Transaction_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    function update_price($pr,$id) {
        $this->db->where('id', $id);
        $this->db->update('single', $pr); 


    }
    function add_records($db)
    {
        $this->db->insert('single',$db);
        
    }
    function get_db($id) {
        $q = $this->db->where('id',$id)->limit(1)->get('single');
        if($q->num_rows>0) {
            return $q->row();
        }
        else {
            return false;
        }
    }

    function get_records() {
        $id = $this->db->get('single');
        
        if($id->num_rows >0) {
            return $id->last_row();
        }
    }

    function delete_latest() {
        $q = $this->db->get('single');
        $w = $q->last_row();
        $e = $w->id;

        $this->db->where('id',$e);
        $this->db->delete('single');
    }

    function get_status($ref) {
        $id = $this->db->get_where('single',array('item_code' => $ref),'1');

        if($id->num_rows >0) {
            return $id->row();
        }
        else {
            return false;
        }
    }
}