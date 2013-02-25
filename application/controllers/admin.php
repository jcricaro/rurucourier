<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
        parent::__construct();
        session_start();
        
        if(!isset($_SESSION['usertype'])) {
            redirect('login');
        }


    }


    function index() {
        redirect('admin/home');
    }

    public function logout() {
        session_destroy();
        redirect('home');
    }

    public function home ()
    {
		//$this->load->model('feedback_model');
		//$data['feedbacks'] = $this->feedback_model->get_feedback();
        $data['title'] = "Ruru Courier";
        $data['page'] = "home";
        $this->load->library('calendar');
        $this->load->view('template/header_admin', $data);
		$this->load->view('admin/modules/home');
        $this->load->view('template/footer_index');
    }
		
	function update_feedback($do,$id) {
		$this->load->model('feedback_model');
		
		if($do == "accept") {
			$status = array(
				'status' => 1
			);
			$this->feedback_model->update_feedback($id,$status);
			redirect('admin/home');
		}
		else if($do == "deny") {
			$status = array(
				'status' => 2
			);
			$this->feedback_model->update_feedback($id,$status);
			redirect('admin/home');
		}
		else {
			redirect('admin/home');
		}
		
	}
        
    public function delivery() {
        $data['title'] = "Ruru Courier - Delivery";
        $data['page'] = "delivery";
        
        $this->load->library('calendar');
        
        $this->load->view('template/header_admin', $data);
        $this->load->view('admin/home_view');
        $this->load->view('template/footer_index');
    }

    public function management() {
        echo 'branch';
    }
    public function branch() {
        
    }
        
    public function single () {
        $this->load->library('form_validation');
        $this->load->model('transaction_model');
        $this->load->model('employee_model');
        $data['dprice'] = $this->employee_model->get_prices();
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('middle_name', 'Middle Name', 'required|alpha');
        $this->form_validation->set_rules('contact_number','Contact Number' , 'required|min_lenth[6]|numeric|max_length[11]');
        $this->form_validation->set_rules('last_name_r', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('first_name_r', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('middle_name_r', 'Middle Name', 'required|alpha');
        $this->form_validation->set_rules('contact_number_r','Contact Number' , 'required|min_lenth[6]|numeric|max_length[11]');
        $this->form_validation->set_rules('area_r', 'Area', 'required|is_natural_no_zero');
        $this->form_validation->set_message('is_natural_no_zero','%s required.');
        $this->form_validation->set_rules('delivery_type','Delivery type','is_natural_no_zero');
        $this->form_validation->set_rules('box','Box','is_natural_no_zero');
        $this->form_validation->set_rules('street_address_r', 'Address' , 'required');
        $this->form_validation->set_rules('street_address', 'Address' , 'required');
        $this->form_validation->set_rules('city_address_r', 'Address' , 'required');
        $this->form_validation->set_rules('city_address', 'Address' , 'required');
        $this->form_validation->set_rules('state_address_r', 'Address' , 'required');
        $this->form_validation->set_rules('state_address', 'Address' , 'required');
        
        
        
        $data['title'] = "Single transaction";
        $data['page'] = "delivery";
        $data['code'] =strtoupper($this->gen_uuid_ref());
        
        if($this->form_validation->run() !== false) {
        $db = array(
            'last_name' => $this->input->post('last_name'),
            'first_name' => $this->input->post('first_name'),
            'middle_name' => $this->input->post('middle_name'),
            'contact_number' => $this->input->post('contact_number'),
            'address' => $this->input->post('street_address').', '.$this->input->post('city_address').', '.$this->input->post('state_address'),
            
            'last_name_r' => $this->input->post('last_name_r'),
            'first_name_r' => $this->input->post('first_name_r'),
            'middle_name_r' => $this->input->post('middle_name_r'),
            'contact_number_r' => $this->input->post('contact_number_r'),
            'area_r' => $this->input->post('area_r'),
            'address_r' => $this->input->post('street_address_r').', '.$this->input->post('city_address_r').', '.$this->input->post('state_address_r'),
            
            'item_code' => $this->gen_uuid_ref(),
            'description' => $this->input->post('description'),
            'delivery_type' => $this->input->post('delivery_type'),
            'transmit_time' => $this->input->post('transmit_time'),
            'weight' => $this->input->post('weight'),
            'add_weight' => $this->input->post('add_weight'),
            'length' => $this->input->post('length'),
            'width' => $this->input->post('width'),
            'height' => $this->input->post('height'),
            'box' => $this->input->post('box'),
            'valuable' => $this->input->post('valuable'),
            'date' => date('Y-m-d')
        );
        
        $this->transaction_model->add_records($db);
        $qu = $this->transaction_model->get_records();
        $id = $qu->id;
        $this->transaction_model->get_db($id);
        redirect('admin/single_print/'.$id);
        } 
         
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/single_view');
            $this->load->view('template/footer_index'); 
        
    }

    function single_print() {
        $this->load->model('transaction_model');
        $id = $this->uri->segment(3);
        $qu = $this->transaction_model->get_db($id);

        if($qu !== false) {
            $data['page'] = "delivery";
            $data['title'] = "Single Print";
            $weight = $qu->weight;
            $area = $qu->area_r;            
            $this->load->model('employee_model');
            $pri = $this->employee_model->get_prices();
            $details = array(
                'delivery_type' => $qu->delivery_type,
                'box' => $qu->box,
                'weight' => $qu->weight,
                'transmit_time' => $qu->transmit_time,
                'length' => $qu->length,
                'width' => $qu->width,
                'height' => $qu->height,
                'valuable' => $qu->valuable,
                'additional_weight' => $qu->add_weight,
                'area' => $qu->area_r
                );
        $price = $this->compute_price($details);
        
        $secondary['qu'] = $qu;
        $secondary['price'] = $price;
        $pr = array(
            'price' => $price
            );
        
        $id = $this->uri->segment(3);
        $this->transaction_model->update_price($pr,$id);
        
        
        $this->load->view('template/header_admin',$data);
        $this->load->view('admin/modules/print',$secondary);
        $this->load->view('admin/modules/single_print_view',$secondary);

        $this->load->view('template/footer_index');
                }

        else {
            redirect(base_url().'admin/single');
        }
        
    }

    function single_print_cancel() {
        $this->load->model('transaction_model');
        $this->transaction_model->delete_latest();
        redirect('admin/single');
    }

    //reports

    function reports() {

        $this->load->model('downloads_model');
        $data['status'] = $this->downloads_model->get_status();
        $data['page'] = 'reports';
        $data['title'] = 'Reports';
        $data['error'] = '';
        $this->load->view('template/header_admin',$data);
        $this->load->view('admin/modules/reports_home_view',$data);
        $this->load->view('template/footer_index');
    }

    function reports_upload() {
        $config['upload_path'] = './reports/';
        $config['allowed_types'] = 'xlsx';
        $config['file_name'] = 'data.xlsx';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('reports_home_view', $error);
        }
        else
        {
            $this->load->model('excel_model');
            $this->load->library('excel');
            $inputFileType = 'Excel2007';
            $inputFileName = 'reports/data.xlsx';
            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
            $objPHPExcel->setActiveSheetIndex(0);
            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
            $count = count($sheetData) - 1;
            for($i = 2 ; $i < $count + 2 ; $i++) {
                $ref['item_code'] = strtolower($sheetData[$i]["A"]);
                $ref['stat'] = $sheetData[$i]["I"];
                $this->excel_model->update_single_stat($ref);
            }

            $objPHPExcel->setActiveSheetIndex(1);
            $sheetDataJ = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
            $count = count($sheetDataJ) - 1;
            for($i = 2 ; $i < $count + 2 ; $i++) {
                $ic['item_code'] = strtolower($sheetDataJ[$i]["B"]);
                $ic['stat'] = $sheetDataJ[$i]["J"];
                $this->excel_model->update_job_stat($ic);

            }
            $this->load->model('downloads_model');

            $db = array(
                'state' => 0
                );
            $this->downloads_model->update_status($db);
            $data['status'] = $this->downloads_model->get_status();
            $data['page'] = 'reports';
            $data['title'] = 'Reports';
            $data['error'] = 'Success!';
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/reports_home_view',$data);
            $this->load->view('template/footer_index');

        }

    }

    function reports_job($offset = 0) {
        $limit = 15;
        $this->load->model('reports_model');
        $data['rows'] = $this->reports_model->get_job($offset,$limit);
        $all = $this->reports_model->get_job_all();

        $this->load->library('pagination');
        $config['base_url'] = base_url().'admin/reports_job';
        $config['total_rows'] = count($all);
        $config['per_page'] = 15; 
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li><b><a href="#">';
        $config['cur_tag_close'] = '</a></b></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $data['title'] = "Reports";
        $data['page'] = "reports";
        $this->load->view('template/header_admin',$data);
        $this->load->view('admin/modules/reports_job',$data);
        $this->load->view('template/footer_index');
    }

    function reports_single($offset = 0) {
        $limit = 15;

        $this->load->model('reports_model');
        $data['rows'] = $this->reports_model->get_some($offset,$limit);
        $all = $this->reports_model->get_all();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'admin/reports_single';
        $config['total_rows'] = count($all);
        $config['per_page'] = 15; 
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li><b><a href="#">';
        $config['cur_tag_close'] = '</a></b></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        
        $data['title'] = "Reports";
        $data['page'] = "reports";
        $this->load->view('template/header_admin',$data);
        $this->load->view('admin/modules/reports',$data);
        $this->load->view('template/footer_index');
    }

    /*
    function reports_single_upload() {
    $data = array('upload_data' => $this->upload->data());
    $this->load->library('excel');
    $inputFileType = 'Excel2007';
    $inputFileName = 'uploads/'.$jo.'.xlsx';
    $sheetname = 'Sheet1'; 

    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

    $config = array(
    'upload_path' => './reports/',
    'allowed_types' => 'xls|xlsx',
    'file_name' => 'singlestatus',
    'overwrite' => TRUE
    );

    $this->load->library('upload', $config);

    }
    */

    function reports_view() {
        $id = $this->uri->segment(3);
        $this->load->model('transaction_model');   
        $qu = $this->transaction_model->get_db($id);
        $data['title'] = "Reports";
        $data['page'] = "reports";
        
        $this->load->view('template/header_admin',$data);

        $this->load->view('admin/modules/reports_view',$qu);
        $this->load->view('template/footer_index');
    }

    function reports_delete() {
        $this->load->model('reports_model');
        $id = $this->uri->segment(3);
        $this->reports_model->delete_one($id);


        redirect(base_url().'admin/reports');
    }

    function employee_delete() {
        $this->load->model('employee_model');
        $this->employee_model->delete_row();
        redirect('admin/filemanager/employee');
    }

    function client_delete() {
        $this->load->model('employee_model');
        $this->employee_model->delete_client_row();
        redirect('admin/filemanager/client');
    }

    function filemanager($module) {
        $this->load->model('employee_model');
        if($module =='employee') {
            $data['rows'] = $this->employee_model->get_records();
            $this->load->library('form_validation');
            $this->form_validation->set_rules('last_name','Last Name','required|alpha');
            $this->form_validation->set_rules('first_name','First Name','required|alpha');
            $this->form_validation->set_rules('last_name','Last Name','required|alpha');
            $this->form_validation->set_rules('user_name','Username','required');
            $this->form_validation->set_rules('password','Password','required|min_length[5]');
            $this->form_validation->set_message('is_natural_no_zero','%s required.');

            if($this->form_validation->run() !== false) {
            $db = array(
                'last_name' => $this->input->post('last_name'),
                'first_name' => $this->input->post('first_name'),
                'middle_name' => $this->input->post('middle_name'),
                'user_name' => $this->input->post('user_name'),
                'password' => sha1($this->input->post('password')),
                'usertype' => $this->input->post('usertype')
                );

            $this->employee_model->add_record($db);

            redirect('admin/filemanager/employee');
            }

            $data['module'] ='employee';
            $data['title'] = "File Maintenance";
            $data['page'] = "filemanager";
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/file_maintenance_view',$data);
            $this->load->view('admin/modules/employee_view',$data);
            $this->load->view('template/footer_index');   
        }
        else if($module =='area') {
            $data['module'] = 'area';
            $data['title'] = "File Maintenance";
            $data['page'] = "filemanager";
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/file_maintenance_view',$data);
            $this->load->view('admin/modules/employee_view',$data);
            $this->load->view('template/footer_index');   
        }
        else if($module =='matrix') {

            $query = $this->employee_model->get_prices();
            $data['prices'] = $query;

            $this->load->library('form_validation');
            $this->form_validation->set_rules('a1',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a2',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a3',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a4',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a5',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a6',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a7',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a8',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a9',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a10',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a11',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a12',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a13',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a14',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a15',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a16',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a17',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a18',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a19',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a20',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a21',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a22',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a23',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a24',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a25',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a26',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a27',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a28',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('a29',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b1',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b2',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b3',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b4',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b5',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b6',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b7',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b8',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b9',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b10',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b11',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b12',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b13',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b14',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b15',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b16',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b17',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b18',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b19',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b20',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b21',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b22',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b23',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b24',NULL,'required|numeric|max_length[12]');
            $this->form_validation->set_rules('b25',NULL,'required|numeric|max_length[12]');

            $this->form_validation->set_rules('c1',NULL,'required');
            $this->form_validation->set_rules('c2',NULL,'required');
            $this->form_validation->set_rules('c3',NULL,'required');
            $this->form_validation->set_rules('c4',NULL,'required');
            $this->form_validation->set_rules('c5',NULL,'required');
            $this->form_validation->set_rules('c6',NULL,'required');

            $this->form_validation->set_rules('c11',NULL,'required');
            $this->form_validation->set_rules('c12',NULL,'required');
            $this->form_validation->set_rules('c13',NULL,'required');
            $this->form_validation->set_rules('c14',NULL,'required');
            
            $this->form_validation->set_rules('c16',NULL,'required');
            $this->form_validation->set_rules('c17',NULL,'required');

            $this->form_validation->set_rules('d1',NULL,'required');
            $this->form_validation->set_rules('d2',NULL,'required');
            $this->form_validation->set_rules('d3',NULL,'required');
            $this->form_validation->set_rules('d4',NULL,'required');
            $this->form_validation->set_rules('d5',NULL,'required');

            $this->form_validation->set_message('required','Field Required');
            $this->form_validation->set_message('numeric','Invalid Input');

            if($this->form_validation->run() !== false) {
                $db = array(
                    'a1' => $this->input->post('a1'),
                    'a2' => $this->input->post('a2'),
                    'a3' => $this->input->post('a3'),
                    'a4' => $this->input->post('a4'),
                    'a5' => $this->input->post('a5'),
                    'a6' => $this->input->post('a6'),
                    'a7' => $this->input->post('a7'),
                    'a8' => $this->input->post('a8'),
                    'a9' => $this->input->post('a9'),
                    'a10' => $this->input->post('a10'),
                    'a11' => $this->input->post('a11'),
                    'a12' => $this->input->post('a12'),
                    'a13' => $this->input->post('a13'),
                    'a14' => $this->input->post('a14'),
                    'a15' => $this->input->post('a15'),
                    'a16' => $this->input->post('a16'),
                    'a17' => $this->input->post('a17'),
                    'a18' => $this->input->post('a18'),
                    'a19' => $this->input->post('a19'),
                    'a20' => $this->input->post('a20'),
                    'a21' => $this->input->post('a21'),
                    'a22' => $this->input->post('a22'),
                    'a23' => $this->input->post('a23'),
                    'a24' => $this->input->post('a24'),
                    'a25' => $this->input->post('a25'),
                    'a26' => $this->input->post('a26'),
                    'a27' => $this->input->post('a27'),
                    'a28' => $this->input->post('a28'),
                    'a29' => $this->input->post('a29'),


                    'b1' => $this->input->post('b1'),
                    'b2' => $this->input->post('b2'),
                    'b3' => $this->input->post('b3'),
                    'b4' => $this->input->post('b4'),
                    'b5' => $this->input->post('b5'),
                    'b6' => $this->input->post('b6'),
                    'b7' => $this->input->post('b7'),
                    'b8' => $this->input->post('b8'),
                    'b9' => $this->input->post('b9'),
                    'b10' => $this->input->post('b10'),
                    'b11' => $this->input->post('b11'),
                    'b12' => $this->input->post('b12'),
                    'b13' => $this->input->post('b13'),
                    'b14' => $this->input->post('b14'),
                    'b15' => $this->input->post('b15'),
                    'b16' => $this->input->post('b16'),
                    'b17' => $this->input->post('b17'),
                    'b18' => $this->input->post('b18'),
                    'b19' => $this->input->post('b19'),
                    'b20' => $this->input->post('b20'),
                    'b21' => $this->input->post('b21'),
                    'b22' => $this->input->post('b22'),
                    'b23' => $this->input->post('b23'),
                    'b24' => $this->input->post('b24'),
                    'b25' => $this->input->post('b25'),

                    'c1' => $this->input->post('c1'),
                    'c2' => $this->input->post('c2'),
                    'c3' => $this->input->post('c3'),
                    'c4' => $this->input->post('c4'),
                    'c5' => $this->input->post('c5'),
                    'c6' => $this->input->post('c6'),
                    'c7' => $this->input->post('c7'),
                    'c8' => $this->input->post('c8'),
                    'c9' => $this->input->post('c9'),
                    'c10' => $this->input->post('c10'),
                    'c11' => $this->input->post('c11'),
                    'c12' => $this->input->post('c12'),
                    'c13' => $this->input->post('c13'),
                    'c14' => $this->input->post('c14'),
                    'c16' => $this->input->post('c16'),
                    'c17' => $this->input->post('c17'),
                    'd1' => $this->input->post('d1'),
                    'd2' => $this->input->post('d2'),
                    'd3' => $this->input->post('d3'),
                    'd4' => $this->input->post('d4'),
                    'd5' => $this->input->post('d5')
                );

                $this->employee_model->update_price($db);
                redirect('admin/filemanager/matrix');
            }

            $data['module'] = 'matrix';
            $data['title'] = "File Maintenance";
            $data['page'] = "filemanager";
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/file_maintenance_view',$data);
            $this->load->view('admin/modules/matrix_view',$data);
            $this->load->view('template/footer_index');   
        }
        else if($module =='client') {
            
            $this->load->library('form_validation');
            $this->form_validation->set_rules('company_name','Company Name', 'required');
            $this->form_validation->set_rules('company_code','Company Code', 'required|max_length[5]');
            $this->form_validation->set_rules('branch','Branch', 'required');
            $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|min_length[6]|max_length[11]');
            $this->form_validation->set_rules('street_address','Street Address','required');
            $this->form_validation->set_rules('city_address','City Address','required');
            $this->form_validation->set_rules('state_address','State Address','required');

            if($this->form_validation->run() !== false) {
                $db = array(
                    'company_name' => $this->input->post('company_name'),
                    'company_code' => $this->input->post('company_code'),
                    'branch' => $this->input->post('branch'),
                    'address' => $this->input->post('street_address').', '.$this->input->post('city_address').', '.$this->input->post('state_address'),
                    'contact_number' => $this->input->post('contact_number')
                );

                $this->employee_model->add_client_record($db);
                redirect('admin/filemanager/client');
            }

            $data['rows'] = $this->employee_model->get_clients();
            $data['module'] = 'client';
            $data['title'] = "File Maintenance";
            $data['page'] = "filemanager";
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/file_maintenance_view',$data);
            $this->load->view('admin/modules/client_view',$data);
            $this->load->view('template/footer_index');   
        }
        else if($module=='content') {
            $data['module'] = 'content';
            $data['title'] = "Content Manager";
            $data['page'] = "filemanager";
            $this->load->model('content_model');

            $qu = $this->content_model->get_content();
            $data['content'] = $qu;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('home', 'Home', 'required');
            if($this->form_validation->run() !== false) {
                        $db = array(
                            'home' => $this->input->post('home'),
                            'about' => $this->input->post('about'),
                            'services' => $this->input->post('services'),
                            'contact' => $this->input->post('contact')
                        );
                        $this->content_model->save_content($db);
                        redirect('admin/filemanager/content');

            }
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/file_maintenance_view',$data);
            $this->load->view('admin/modules/cms');
            $this->load->view('template/footer_index');
        }

        else {
            $data['module'] = 'home';
            $data['title'] = "File Maintenance - Home";
            $data['page'] = "filemanager";
            $this->load->view('template/header_admin',$data);
            $this->load->view('admin/modules/file_maintenance_view',$data);
            //$this->load->view('admin/modules/employee_view',$data);
            $this->load->view('template/footer_index');   
        }
        
        
    }

    function filemanager_employee() {

    }

    function receipt() {
        $data['ewan'] = 'ewan';
        $this->load->view('admin/modules/print',$data);
    }

    function job_order() {
        $data['title'] = "Job Order";
        $data['page'] = "delivery";
        
        $this->load->view('template/header_admin',$data);
        $this->load->view('admin/modules/job_order_choose');
        $this->load->view('template/footer_index');
    }

    function job_order_manual() {
        $this->load->model('job_order_model');
        $this->load->model('employee_model');
        $data['dprice'] = $this->employee_model->get_prices();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('delivery_type','Delivery Type','is_natural_no_zero');
        $this->form_validation->set_rules('client_name','Client Name','is_natural_no_zero');
        $this->form_validation->set_rules('received_by', 'Received by', 'required');
        $this->form_validation->set_rules('released_by', 'Released by', 'required');
        $this->form_validation->set_message('is_natural_no_zero', 'The %s is required.');
        $this->form_validation->set_rules('datepicker','Pick-up date','required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|is_natural_no_zero|less_than[11]');
        $this->form_validation->set_rules('joborder','Job Order','required');


        $data['clients'] = $this->job_order_model->get_clients();
        $cid = $this->input->post('client_name');
        $q = $this->job_order_model->get_client_name($cid);
        if($this->form_validation->run() !== false) {
            $time = strtotime($this->input->post('datepicker'));
            $date = date( 'y-m-d', $time );

            $db = array(
                'ref_number' => $this->gen_uuid_ref(),
                'client_name' => $q->company_name,
                'client_id' => $this->input->post('client_name'),
                'job_order_number' => $this->input->post('joborder'),
                'quantity' => $this->input->post('quantity'),
                'pickup_date' => $date,
                'delivery_type' => $this->input->post('delivery_type'),
                'received_by' => $this->input->post('received_by'),
                'released_by' => $this->input->post('released_by'),
                'quantity' => $this->input->post('quantity')
            );
            $this->job_order_model->add_job_order($db);
            $ref = $db['ref_number'];
            $job = $db['job_order_number'];
            $nid = $this->job_order_model->get_id($ref, $job);
            
            redirect('admin/job_order_items/'.$nid->id.'/'.$this->input->post('quantity') );
        }


        $data['title'] = "Job Order";
        $data['page'] = "delivery";
        $data['code'] = strtoupper($this->gen_uuid_ref());
        $data['joborder'] = strtoupper($this->gen_uuid_jo());
        $this->load->view('template/header_admin',$data);
        $this->load->view('admin/modules/job_order_view',$data);
        $this->load->view('template/footer_index');
    }

    

    

    function job_order_items() {
        $this->load->model('employee_model');
        $data['dprice'] = $this->employee_model->get_prices();
        $this->load->model('job_order_model');
        $id = $this->uri->segment(3);
        $quant = $this->uri->segment(4);
        $q = $this->job_order_model->get_row_job($id);
        $w = $this->job_order_model->get_items($id);

        $this->load->library('form_validation');
        for($i=0;$i<$quant;$i++) {
        $this->form_validation->set_rules('last_name['.$i.']', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('first_name['.$i.']', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('middle_name['.$i.']', 'Middle Name', 'required|alpha');
        $this->form_validation->set_rules('address['.$i.']', 'Address' , 'required|min_length[10]');
        $this->form_validation->set_rules('contact_number['.$i.']','Contact Number' , 'required|minlenth[6]|numeric|max_length[11]');
        $this->form_validation->set_rules('delivery_type['.$i.']','Delivery type','is_natural_no_zero');
        $this->form_validation->set_rules('box['.$i.']','Box','is_natural_no_zero');
        $this->form_validation->set_rules('area_r['.$i.']','Area','is_natural_no_zero');
        }
        $this->form_validation->set_message('is_natural_no_zero','%s required.');
        //$this->form_validation->set_rules('delivery_type','Delivery type','is_natural_no_zero');            
        //$this->form_validation->set_rules('box[]','Box','is_natural_no_zero');
        //$this->form_validation->set_rules('area_r[]', 'Area', 'required|is_natural_no_zero');

        $this->load->model('job_order_model');
        
        
        if($this->form_validation->run() !== false) {

            for($i=0;$i<$quant;$i++) {
                $details = array(
                    'delivery_type' => $this->input->post('delivery_type')[$i],
                    'box' => $this->input->post('box')[$i],
                    'weight' => $this->input->post('weight')[$i],
                    'transmit_time' => $this->input->post('transmit_time')[$i],
                    'length' => $this->input->post('length')[$i],
                    'width' => $this->input->post('width')[$i],
                    'height' => $this->input->post('height')[$i],
                    'valuable' => $this->input->post('valuable')[$i],
                    'additional_weight' => $this->input->post('add_weight')[$i],
                    'area' => $this->input->post('area_r')[$i]
                    );
                $price[$i] = $this->compute_price($details);

                $db = array(
                    'last_name'=> $this->input->post('last_name')[$i],
                    'first_name' => $this->input->post('first_name')[$i],
                    'middle_name' => $this->input->post('middle_name')[$i],
                    'contact_number' => $this->input->post('contact_number')[$i],
                    'address' => $this->input->post('address')[$i],
                    'item_code' => $this->gen_uuid_ref(),
                    'description' => $this->input->post('description')[$i],
                    'area_r' => $this->input->post('area_r')[$i],
                    'delivery_type' => $this->input->post('delivery_type')[$i],
                    'transmit_time' => $this->input->post('transmit_time')[$i],
                    'weight' => $this->input->post('weight')[$i],
                    'add_weight' => $this->input->post('add_weight')[$i],
                    'length' => $this->input->post('length')[$i],
                    'width' => $this->input->post('width')[$i],
                    'height' => $this->input->post('height')[$i],
                    'box' => $this->input->post('box')[$i],
                    'valuable' => $this->input->post('valuable')[$i],
                    'job_order_id' => $q->id,
                    'job_order_number' => $q->job_order_number,
                    'price' => $price[$i],
                    'date' => date('Y-m-d')
                    );

                $this->job_order_model->add_job_order_item($db);
            }
            redirect('admin/job_order_items/'.$q->id);
        }


        $data['current'] = $w;
        $data['quantity'] = $quant;
        $data['details'] = $q;
        $data['title'] = "Job Order - Items";
        $data['page'] = "delivery";
        $this->load->view('template/header_admin_job',$data);
        $this->load->view('admin/modules/job_order_items',$data);
        $this->load->view('template/footer_index');

    }

    /*function delivery() {
        $data['title'] = "Delivery";
        $data['page'] = "delivery";
        $this->load->view('template/header_admin',$data);
        
        $this->load->view('template/footer_index');   
    }*/

    function single_update_status() {
        $this->load->library('Excel');
        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'xls|xlsx',
            'file_name' => 'singlestatus',
            'overwrite' => TRUE

            );

        $this->load->library('upload', $config);

    }

    function job_order_items_delete() {
        $id = $this->uri->segment(3);
        $this->load->model('job_order_model'); 
        
        $q = $this->job_order_model->get_job_item($id);
        $this->job_order_model->delete_row($id);
        redirect('admin/job_order_items/'.$q->job_order_id);


    }

    function job_order_delete() {
        $this->load->model('job_order_model');
        $id= $this->uri->segment(3);
        $this->job_order_model->delete_job_order($id);
        redirect('admin/job_order');
    }

    function job_order_upload() {
		$this->load->model('job_order_model');		
		$data['clients'] = $this->job_order_model->get_clients();
		$cid = $this->input->post('client_name');
        $q = $this->job_order_model->get_client_name($cid);

		
        $data['title'] = "Job Order - Upload Excel";
        $data['page'] = "delivery";
        $data['code'] = strtoupper($this->gen_uuid_ref());
        $data['joborder'] = strtoupper($this->gen_uuid_jo());
        $this->load->view('template/header_admin', $data);
        $this->load->view('admin/modules/job_order_upload_view', array('error' => ' ' ) );
        $this->load->view('template/footer_index');
    }

    function do_upload() {
        $data['code'] = strtoupper($this->gen_uuid_ref());
        $data['joborder'] = strtoupper($this->gen_uuid_jo());
		$this->load->model('job_order_model');		
		$data['clients'] = $this->job_order_model->get_clients();
		$cid = $this->input->post('client_name');
        $q = $this->job_order_model->get_client_name($cid);
		$this->load->library('form_validation');
        $this->form_validation->set_rules('client_name','Client Name','is_natural_no_zero');
        $this->form_validation->set_rules('received_by', 'Received by', 'required');
        $this->form_validation->set_rules('released_by', 'Released by', 'required');
        $this->form_validation->set_message('is_natural_no_zero', 'The %s is required.');
        $this->form_validation->set_rules('datepicker','Pick-up date','required');
        $this->form_validation->set_rules('job_order_number','Job Order Number','required');
        if($this->form_validation->run() !== false) {
            $time = strtotime($this->input->post('datepicker'));
            $date = date( 'y-m-d', $time );

            $db = array(
                'ref_number' => $this->gen_uuid_ref(),
                'client_name' => $q->company_name,
                'client_id' => $this->input->post('client_name'),
                'job_order_number' => $this->input->post('job_order_number'),
                'quantity' => $this->input->post('quantity'),
                'pickup_date' => $date,
                'received_by' => $this->input->post('received_by'),
                'released_by' => $this->input->post('released_by')
            );
            $this->job_order_model->add_job_order($db);
			$ref = $db['ref_number'];
            $job = $db['job_order_number'];
			$nid = $this->job_order_model->get_id($ref, $job);
		}
        $data['title'] = "Job Order - Upload Excel";
        $data['page'] = "delivery";
        $this->load->view('template/header_admin', $data);
        $jo = $this->gen_uuid_jo();
        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'xls|xlsx',
            'file_name' => $jo,
            'overwrite' => TRUE

            );

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/modules/job_order_upload_view', $error);
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->library('excel');
            $inputFileType = 'Excel2007';
            $inputFileName = 'uploads/'.$jo.'.xlsx';
            $sheetname = 'Sheet1'; 

            $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

            $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

            $count = count($sheetData);
            $data['job_order'] = $jo;
            $data['count'] = $count;
            $data['total_price'] = 0;
            for($i = 3; $i <= $count; $i++) {
                $data['last_name'][$i-3] = false;
                $data['first_name'][$i-3] = false;
                $data['middle_name'][$i-3] = false;
                $data['contact_number'][$i-3] = false;
                $data['address'][$i-3] = false;
                $data['area'][$i-3] = false;
                $data['delivery_type'][$i-3] = false;
                $data['transmit_time'][$i-3] = false;
                $data['box'][$i-3] = false;
                $data['length'][$i-3] = false;
                $data['width'][$i-3] = false;
                $data['height'][$i-3] = false;
                $data['add_wgt'][$i-3] = false;
            }
            for($i = 3; $i <= $count; $i++) {
                $data['last_name'][$i-3] = $sheetData[$i]['A'];
                $data['first_name'][$i-3] = $sheetData[$i]['B'];
                $data['middle_name'][$i-3] = $sheetData[$i]['C'];
                $data['contact_number'][$i-3] = $sheetData[$i]['D'];
                $data['address'][$i-3] = $sheetData[$i]['E'];
                $data['details'][$i-3] = $sheetData[$i]['X'];
            }

            for($i = 3; $i <= $count; $i++) {
                if(strtoupper($sheetData[$i]['F']) == "OK") {
                    $data['area'][$i-3] = 1;
                }
                else if(strtoupper($sheetData[$i]['G']) == "OK") {
                    $data['area'][$i-3] = 2;
                }
                else if(strtoupper($sheetData[$i]['H']) == "OK") {
                    $data['area'][$i-3] = 3;
                }
                else if(strtoupper($sheetData[$i]['I']) == "OK") {
                    $data['area'][$i-3] = 4;
                }
                else if(strtoupper($sheetData[$i]['J']) == "OK") {
                    $data['area'][$i-3] = 5;
                }
                else {
                    $data['area'][$i-3] = FALSE;
                }

                if(strtoupper($sheetData[$i]['K']) == "OK") {
                    $data['delivery_type'][$i-3] = 1;
                    $data['transmit_time'][$i-3] = FALSE;

                }
                else if(strtoupper($sheetData[$i]['L']) == "OK") {
                    $data['delivery_type'][$i-3] = 2;
                    if(strtoupper($sheetData[$i]['M']) == "OK") {
                        $data['transmit_time'][$i-3] = 1;
                    }
                    else if(strtoupper($sheetData[$i]['N']) == "OK") {
                        $data['transmit_time'][$i-3] = 2;
                    }
                }

                if(strtoupper($sheetData[$i]['O']) == "YES"){
                    $data['box'][$i-3] = 1;
                    $data['length'][$i-3] = $sheetData[$i]['P'];
                    $data['width'][$i-3] = $sheetData[$i]['Q'];
                    $data['height'][$i-3] = $sheetData[$i]['R'];
                    $data['weight'][$i-3] = FALSE;
                    $data['add_wgt'][$i-3] = FALSE;
                }
                else if(strtoupper($sheetData[$i]['O']) == "NO") {
                    $data['box'][$i-3] = 2;
                    $data['length'][$i-3] = FALSE;
                    $data['width'][$i-3] = FALSE;
                    $data['height'][$i-3] = FALSE;
                    if(strtoupper($sheetData[$i]['S']) == "OK") {
                        $data['weight'][$i-3] = 1;
                    }
                    else if(strtoupper($sheetData[$i]['T']) == "OK") {
                        $data['weight'][$i-3] = 2;
                    }
                    else if(strtoupper($sheetData[$i]['U']) == "OK") {
                        $data['weight'][$i-3] = 3;
                    }
                    else if(strtoupper($sheetData[$i]['V']) == "OK") {
                        $data['weight'][$i-3] = 4;
                        $data['add_wgt'][$i-3] = $sheetData[$i]['W'];
                    }
                }
                if(strtoupper($sheetData[$i]['Y']) == "YES") {
                    $data['valuable'][$i-3] = 1;
                }
                else if(strtoupper($sheetData[$i]['Y']) == "NO") {
                    $data['valuable'][$i-3] = 0;
                }

                // Compute price start

                $details = array(
                    'delivery_type' => $data['delivery_type'][$i-3],
                    'box' => $data['box'][$i-3],
                    'weight' => $data['weight'][$i-3],
                    'transmit_time' => $data['transmit_time'][$i-3],
                    'length' => $data['length'][$i-3],
                    'width' => $data['width'][$i-3],
                    'height' => $data['height'][$i-3],
                    'valuable' => $data['valuable'][$i-3],
                    'additional_weight' => $data['add_wgt'][$i-3],
                    'area' => $data['area'][$i-3]
                    );

                $data['price'][$i-3] = $this->compute_price($details);
                $data['total_price'] = $data['total_price'] + $data['price'][$i-3]; 
                // Compute price end

                if($data['last_name'][$i-3] == false || $data['first_name'][$i-3] == false) {
                    redirect(error);
                }
                
                
                
                
            }
		$data['joborderid'] = $nid->id;
		for($i = 0; $i < $data['count'] -3 ; $i++) {
		$db = array(
			'job_order_id' => $data['joborderid'],
			'job_order_number' => $data['job_order'],
			'item_code' => $this->gen_uuid(),
			'first_name' => $data['first_name'][$i],
			'middle_name' => $data['middle_name'][$i],
			'last_name' => $data['last_name'][$i],
			'contact_number' => $data['contact_number'][$i],
			'address' => $data['address'][$i],
			'delivery_type' => $data['delivery_type'][$i],
			'transmit_time' => $data['transmit_time'][$i],
			'area_r' => $data['area'][$i],
			'weight' => $data['weight'][$i],
			'add_weight' => $data['add_wgt'][$i],
			'length' => $data['length'][$i],
			'width' => $data['width'][$i],
			'height' => $data['height'][$i],
			'price' => $data['price'][$i],
			'valuable' => $data['valuable'][$i],
            'date' => date('Y-m-d')
			);
		$this->job_order_model->add_job_order_item($db);
		}
		$_SESSION['jovalidate'] = $data;
        redirect('admin/job_order_validate');
        }
        $this->load->view('template/footer_index');
    }

    function job_order_validate() {
			if(!$_SESSION['jovalidate']) {
				redirect('admin');
			}                
            $data = $_SESSION['jovalidate'];
			$data['current'] = array_slice($data, 4, 17);
			
            if(!$this->uri->segment(3)) {
                $data['pagenum']=0;
            }
            else {
                $data['pagenum'] = $this->uri->segment(3);
            }
			$this->load->library('pagination');
            $meh = (array_slice($data, 4));
            $j =0;
            $config['base_url'] = base_url().'admin/job_order_validate';
            $config['total_rows'] = count($data['last_name']);
            $config['per_page'] = 10; 
            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] = '</ul>';
            $config['cur_tag_open'] = '<li><b><a href="#">';
            $config['cur_tag_close'] = '</a></b></li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);

            $data['contains'] = $data['pagenum'] + $config['per_page'];
            
            $data['title'] = "Job Order - Upload Excel";
            $data['page'] = "delivery";
            $this->load->view('template/header_admin_jobs',$data);
            $this->load->view('admin/modules/job_order_validate_view', $data);
            $this->load->view('template/footer_index');
    }

    function gen_uuid_ref() {
        return sprintf( 'ref%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
                
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
                    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
                    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
    }

    function gen_uuid_jo() {
        return sprintf('job%04x%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
                
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
                    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
                    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
    }

    function gen_uuid() {
        return sprintf('%04x',
            // 32 bits for "time_low"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                
            // 16 bits for "time_mid"
            mt_rand( 0, 0xffff ),
                
            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand( 0, 0x0fff ) | 0x4000,
                    
            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand( 0, 0x3fff ) | 0x8000,
                    
            // 48 bits for "node"
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
            );
    } 


    function compute_price($details) {
        $this->load->model('employee_model');
        $prices = $this->employee_model->get_prices();
        //compute price
        $price = 0;
        if($details['delivery_type'] == 1) {
            if($details['box'] == 1)  {
                $weight = ($details['length'] * $details['width'] * $details['height'])/3500;
                if($details['area'] == 1) {
                    if($weight <= 500) {
                        $price = $prices->a5;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->a10;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->a15;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->a20 + ($add_weight * $prices->a25);
                    }
                }
                else if($details['area'] == 2) {
                    if($weight <= 500) {
                        $price = $prices->a6;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->a11;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->a16;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->a21 + ($add_weight * $prices->a26);
                    }
                }
                else if($details['area'] == 3) {
                    if($weight <= 500) {
                        $price = $prices->a7;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->a12;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->a17;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->a22 + ($add_weight * $prices->a27);
                    }
                }
                else if($details['area'] == 4) {
                    if($weight <= 500) {
                        $price = $prices->a8;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->a13;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->a18;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->a23 + ($add_weight * $prices->a28);
                    }
                }
                else if($details['area'] == 5) {
                    if($weight <= 500) {
                        $price = $prices->a9;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->a14;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->a19;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->a24 + ($add_weight * $prices->a29);
                    }
                }
            }
            else if($details['box'] == 2) {
                if($details['weight'] == 1) {
                    if($details['area'] == 1) {
                        $price = $prices->a1;
                    }
                    else if($details['area'] == 2) {
                        $price = $prices->a1;
                    }
                    else if($details['area'] == 3) {
                        $price = $prices->a2;
                    }
                    else if($details['area'] == 4) {
                        $price = $prices->a3;
                    }
                    else if($details['area'] == 5) {
                        $price = $prices->a4;
                    }
                }
                else if($details['weight'] == 2) {
                    if($details['area'] == 1) {
                        $price = $prices->a5;
                    }
                    else if($details['area'] == 2) {
                        $price = $prices->a6;
                    }
                    else if($details['area'] == 3) {
                        $price = $prices->a7;
                    }
                    else if($details['area'] == 4) {
                        $price = $prices->a8;
                    }
                    else if($details['area'] == 5) {
                        $price = $prices->a9;
                    }
                }
                else if($details['weight'] == 3) {
                    if($details['area'] == 1) {
                        $price = $prices->a10;
                    }
                    else if($details['area'] == 2) {
                        $price = $prices->a11;
                    }
                    else if($details['area'] == 3) {
                        $price = $prices->a12;
                    }
                    else if($details['area'] == 4) {
                        $price = $prices->a13;
                    }
                    else if($details['area'] == 5) {
                        $price = $prices->a14;
                    }
                }
                else if($details['weight'] == 4) {
                    if($details['area'] == 1) {
                        $price = $prices->a15;
                    }
                    else if($details['area'] == 2) {
                        $price = $prices->a16;
                    }
                    else if($details['area'] == 3) {
                        $price = $prices->a17;
                    }
                    else if($details['area'] == 4) {
                        $price = $prices->a18;
                    }
                    else if($details['area'] == 5) {
                        $price = $prices->a19;
                    }
                }
                else if($details['weight'] == 5)  {
                    if($details['area'] == 1) {
                        $price = $prices->a20;
                    }
                    else if($details['area'] == 2) {
                        $price = $prices->a21;
                    }
                    else if($details['area'] == 3) {
                        $price = $prices->a22;
                    }
                    else if($details['area'] == 4) {
                        $price = $prices->a23;
                    }
                    else if($details['area'] == 5) {
                        $price = $prices->a24;
                    }
                }
            }
        }
        else if($details['delivery_type'] == 2) {
            if($details['box'] == 1)  {
                $weight = ($details['length'] * $details['width'] * $details['height'])/3500;
                if($details['area'] == 1) {
                    if($weight <= 500) {
                        $price = $prices->b1;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->b6;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->b11;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->b16 + ($add_weight * $prices->b21);
                    }
                }
                else if($details['area'] == 2) {
                    if($weight <= 500) {
                        $price = $prices->b2;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->b7;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->b12;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->b17 + ($add_weight * $prices->b22);
                    }
                }
                else if($details['area'] == 3) {
                    if($weight <= 500) {
                        $price = $prices->b3;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->b8;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->b13;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->b18 + ($add_weight * $prices->b23);
                    }
                }
                else if($details['area'] == 4) {
                    if($weight <= 500) {
                        $price = $prices->b4;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->b9;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->b14;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->b19 + ($add_weight * $prices->b24);
                    }
                }
                else if($details['area'] == 5 ) {
                    if($weight <= 500) {
                        $price = $prices->b5;
                    }
                    else if($weight <= 2000) {
                        $price = $prices->b10;
                    }
                    else if($weight <= 3000) {
                        $price = $prices->b15;
                    }
                    else if($weight > 3000) {
                        $add_weight = ceil($weight);
                        $price = $prices->b20 + ($add_weight * $prices->b25);
                    }
                }
            }
            else if($details['box'] == 2) {
                if($details['area'] == 2) {
                    if($details['weight'] == 1) {
                        $price = $prices->b1;
                    }
                    else if($details['weight'] == 2) {
                        $price = $prices->b6;
                    }
                    else if($details['weight'] == 3) {
                        $price = $prices->b11;
                    }
                    else if($details['weight'] == 4) {
                        $add_weight = $details['additional_weight'];
                        $price = $prices->b16 + ($add_weight * $prices->b21);
                    }
                }
                else if($details['area'] == 3) {
                    if($details['weight'] == 1) {
                        $price = $prices->b2;
                    }
                    else if($details['weight'] == 2) {
                        $price = $prices->b7;
                    }
                    else if($details['weight'] == 3) {
                        $price = $prices->b12;
                    }
                    else if($details['weight'] == 4) {
                        $add_weight = $details['additional_weight'];
                        $price = $prices->b17 + ($add_weight * $prices->b22);
                    }

                }
                else if($details['area'] == 4) {
                    if($details['weight'] == 1) {
                        $price = $prices->b3;
                    }
                    else if($details['weight'] == 2) {
                        $price = $prices->b8;
                    }
                    else if($details['weight'] == 3) {
                        $price = $prices->b13;
                    }
                    else if($details['weight'] == 4) {
                        $add_weight = $details['additional_weight'];
                        $price = $prices->b18 + ($add_weight * $prices->b23);
                    }
                }
                else if($details['area'] == 5) {
                    if($details['weight'] == 1) {
                        $price = $prices->b4;
                    }
                    else if($details['weight'] == 2) {
                        $price = $prices->b9;
                    }
                    else if($details['weight'] == 3) {
                        $price = $prices->b14;
                    }
                    else if($details['weight'] == 4) {
                        $add_weight = $details['additional_weight'];
                        $price = $prices->b19 + ($add_weight * $prices->b24);
                    }
                }
                else if($details['area'] == 6 ) {
                    if($details['weight'] == 1) {
                        $price = $prices->b5;
                    }
                    else if($details['weight'] == 2) {
                        $price = $prices->b10;
                    }
                    else if($details['weight'] == 3) {
                        $price = $prices->b15;
                    }
                    else if($details['weight'] == 4) {
                        $add_weight = $details['additional_weight'];
                        $price = $prices->b20 + ($add_weight * $prices->b25);
                    }
                }
            }
        }

        if($details['valuable'] == 1) {
            $price = $price + ($price * 0.01);
        }
        // end compute price
        return $price;
    }


    function download_reports() {
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('Single');
         
        $this->excel->getActiveSheet()->setCellValue('A1', 'Item Code');
        $this->excel->getActiveSheet()->setCellValue('B1', 'Last Name');
        $this->excel->getActiveSheet()->setCellValue('C1', 'First Name');
        $this->excel->getActiveSheet()->setCellValue('D1', 'Middle Name');
        $this->excel->getActiveSheet()->setCellValue('E1', 'Contact Number');
        $this->excel->getActiveSheet()->setCellValue('F1', 'Address');
        $this->excel->getActiveSheet()->setCellValue('G1', 'Details');
        $this->excel->getActiveSheet()->setCellValue('H1', 'Valuable');
        $this->excel->getActiveSheet()->setCellValue('I1', 'Status');
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(45);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);

        $this->load->model('excel_model');
        $single_items = $this->excel_model->get_single_bydate();
        if($single_items) {
        $count = count($single_items);
        for($i = 0; $i < $count; $i++) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $i+2 ,strtoupper($single_items[$i]->item_code));
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $i+2 ,$single_items[$i]->last_name_r);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $i+2 ,$single_items[$i]->first_name_r);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $i+2 ,$single_items[$i]->middle_name_r);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $i+2 ,$single_items[$i]->contact_number_r);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $i+2 ,$single_items[$i]->address_r);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, $i+2 ,$single_items[$i]->status);
        }
        }
        
        $this->excel->createSheet();
        $this->excel->setActiveSheetIndex(1);
        $this->excel->getActiveSheet()->setTitle('Job Order');

        $this->excel->getActiveSheet()->setCellValue('A1', 'Job Order Number');
        $this->excel->getActiveSheet()->setCellValue('B1', 'Item Code');
        $this->excel->getActiveSheet()->setCellValue('C1', 'Last Name');
        $this->excel->getActiveSheet()->setCellValue('D1', 'First Name');
        $this->excel->getActiveSheet()->setCellValue('E1', 'Middle Name');
        $this->excel->getActiveSheet()->setCellValue('F1', 'Contact Number');
        $this->excel->getActiveSheet()->setCellValue('G1', 'Address');
        $this->excel->getActiveSheet()->setCellValue('H1', 'Details');
        $this->excel->getActiveSheet()->setCellValue('I1', 'Valuable');
        $this->excel->getActiveSheet()->setCellValue('J1', 'Status');
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(45);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);

        $job_items = $this->excel_model->get_job_bydate();
        if($job_items) {
        $count = count($job_items);
        for($i = 0; $i < $count; $i ++) {
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $i + 2 ,strtoupper($job_items[$i]->job_order_number));
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $i + 2 ,strtoupper($job_items[$i]->item_code));
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $i + 2 ,$job_items[$i]->last_name);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $i + 2 ,$job_items[$i]->first_name);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $i + 2 ,$job_items[$i]->middle_name);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $i + 2 ,$job_items[$i]->contact_number);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $i + 2 ,$job_items[$i]->address);
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(9, $i + 2 ,$job_items[$i]->status);
        }
        }

        $this->excel->setActiveSheetIndex(0);
        
        $filename=  strtolower(date('FdY')); 
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007'); 
        $objWriter->save('php://output');
        $this->load->model('downloads_model');
        $db = array(
            'state' => 1
            );
        $this->downloads_model->update_status($db);
        
    }

    
    function waste() {
        $this->load->library('excel');
        $inputFileType = 'Excel2007';
        $inputFileName = 'data/data.xlsx'; 
        $sheetname = 'Sheet1'; 
        
        /**  Create a new Reader of the type defined in $inputFileType  **/ 
        $objReader = PHPExcel_IOFactory::createReader($inputFileType); 
        /**  Advise the Reader of which WorkSheets we want to load  **/ 
        $objReader->setLoadSheetsOnly($sheetname); 
        /**  Load $inputFileName to a PHPExcel Object  **/ 
        $objPHPExcel = $objReader->load($inputFileName); 

        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);      
        
        $this->load->model('excel_model');
        
        $y = count($sheetData);
        for($x=4; $x<=$y; $x++) {
            $exdt['id'] = $sheetData[$x]["A"];
            $exdt['data'] = array(
                    'status' => $sheetData[$x]["N"]
                );
            $this->excel_model->update_single($exdt);
        }

    }

    function test() {
        $this->load->model('excel_model');
        var_dump($this->excel_model->get_job_bydate());

        echo date('Y-m-d');
    }
}
