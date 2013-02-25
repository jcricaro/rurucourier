<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct() {
            parent::__construct();
            session_start();



        }
	public function index() {
        $data['message'] = FALSE;
            if(isset($_SESSION['usertype']) !== false) {
                redirect('admin/home');
            }
            $this->load->library('form_validation');
            $this->form_validation->set_rules('user_name','User Name', 'required');
            $this->form_validation->set_rules('password','Password', 'required|min_length[4]');
            if($this->form_validation->run() !== false) {
                $this->load->model('login_model'); //Checks login details to match /w database
                $res = $this
                    ->login_model
                    ->verify_user(
                            $this->input->post('user_name'), 
                            $this->input->post('password')
                    ); //Checks login details to match /w database
                        
                if($res !== FALSE) {
                    $_SESSION['usertype'] = $res->usertype;
                    $_SESSION['name'] = $res->first_name;
                    redirect('admin/home');    
                }
                else {
                    $data['message'] = "Incorrect login details";
                }
                    
                       
            }
            $data['title'] = "Login - Ruru Courier";
            $data['page'] = "login";
            $this->load->view('template/header_index', $data);
			$this->load->view('admin/login_view');
            $this->load->view('template/footer_index');
	}
}
