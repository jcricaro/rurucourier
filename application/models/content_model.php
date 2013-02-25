<?php 

class Content_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    function get_content() {
        $query = $this->db->get('content');
        return $query->last_row();
    }

    function save_content($db) {
        $this->db->where('id', 1);
        $this->db->update('content', $db); 
    }

}