<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
            parent::__construct();
            session_start();

        }
	   public function index() {

	   		$this->load->model('feedback_model');
			$data['feedbacks'] = $this->feedback_model->get_active();
			
            $data['title'] = "Ruru Courier";
            $data['page'] = "home";
            $this->load->model('content_model');
            $data['content'] = $this->content_model->get_content();


            $this->load->library('form_validation');
            $this->form_validation->set_rules('ref_number','Reference Number','required');


                if($this->form_validation->run() !== false ) {
                $this->load->model('transaction_model');    
                $ref = $this->input->post('ref_number');
                $q = $this->transaction_model->get_status($ref);
                $_SESSION['check_status'] = $q;
                if($q !==false) {
                    redirect('home/check_status');
                }
                
                
            }

            $this->load->view('template/header_index', $data );
            $this->load->view('home/home_view',$data);
            $this->load->view('template/footer_index');
        }

        public function check_status() {
        	$this->load->library('form_validation');
			$this->form_validation->set_rules('feedback', 'Feedback', 'required');
			
			$this->load->model('feedback_model');
			if($this->form_validation->run() !== FALSE) {
				$db = array(
					'author' => $q->last_name.','.$q->first_name,
					'comment' => $this->input->post('feedback')
				);
				$this->feedback_model->add_feedback($db);
				redirect('home');
			}
			
			
            $q = $_SESSION['check_status'];
            $data['title'] = "Ruru Courier";
            $data['page'] = "somewhere";
            $this->load->view('template/header_index',$data);
            $this->load->view('home/modules/check_status_view',$q);
            $this->load->view('template/footer_index');
            

            

        }
        
        public function services() {
            $data['title'] = "Services - Ruru Courier";
            $data['page'] = "services";
            $this->load->model('content_model');
            $data['content'] = $this->content_model->get_content();
            $this->load->view('template/header_index', $data );
            $this->load->view('home/services_view',$data);
            $this->load->view('template/footer_index');
        }
        public function aboutus() {
            $data['title'] = "About Us - Ruru Courier";
            $data['page'] = "aboutus";
            $this->load->model('content_model');
            $data['content'] = $this->content_model->get_content();
            $this->load->view('template/header_index', $data );
            $this->load->view('home/aboutus_view',$data);
            $this->load->view('template/footer_index');
        }
        public function contactus() {
            $data['title'] = "Contact Us - Ruru Courier";
            $data['page'] = "contactus";
            $this->load->model('content_model');
            $data['content'] = $this->content_model->get_content();
            $this->load->view('template/header_index', $data );
            $this->load->view('home/contactus_view',$data);
            $this->load->view('template/footer_index');
        }

}