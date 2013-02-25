<?php 

class Employee_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    function get_records()
    {
        $query = $this->db->get('users',9999999,1);
        return $query->result();
    }
    
    function add_record($db) {
        $this->db->insert('users',$db);
    }
    
    function update_record() {
        $this->db->where('id',14);
        $this->db->update('users', $data);
    }
    
    function delete_row() {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('users');
    }

    function delete_client_row() {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('clients');
    }

    function get_clients() {
        $query = $this->db->get('clients');
        if($query->num_rows() > 0) {
        return $query->result();
        }
        else {
            return false;
        }
    }

    function add_client_record($db) {
        $this->db->insert('clients',$db);
    }

    function get_prices() {
        $query = $this->db->limit(1)->get('prices');
        return $query->last_row();
    }

    function update_price($db) {
        $this->db->where('id', 1)->update('prices',$db);
    }
}