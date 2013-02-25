<?php

class Login_model extends CI_Model {
    function __construct() 
    {
    }
    
    public function verify_user($username, $password) 
    {
        $q = $this
        ->db
        ->where('user_name', $username)
        ->where('password', sha1($password))
        ->limit(1)
        ->get('users');
        
        
        
        if($q->num_rows >0) {
            return $q->row();
        }
        return false;
                        
    }
    

}