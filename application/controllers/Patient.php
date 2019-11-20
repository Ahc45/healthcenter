<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');

class Patient extends Admin_Controller {

	  public $basetemp = '_admin/';
	  	public $scripts = array(
		'css'=> array('datatables'),
	);

	  public function __construct(){
	  	parent::__construct();
	  }
	   function index()
	  {
		$this->data['title'] = "Patience";
	  	$this->data['main_content'] = $this->basetemp.'patience/patience_view';
	 	$this->load->model('patient_m');
	 	$patient_params = array(
	 			'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
	 	);
	 	$this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
	 	$this->load->view('_admin/_includes/header',$this->data);
	  }

	  function add(){
			$this->load->helper('string');
	  		$this->data['title'] = "Add Patience";
	  		$this->data['patient_no'] = random_string('numeric');
	  		$this->data['main_content'] = $this->basetemp.'patience/add';
			$this->load->view('_admin/_includes/header',$this->data);
	  }
	  function validate(){

		
	$this->form_validation->set_rules('patient_no', 'Patient No.', 'trim|required');
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
	$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
	$this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required|numeric');
	$this->form_validation->set_rules('account_type', 'Acount type', 'trim|required');
	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	$this->form_validation->set_rules('address', 'Address', 'trim|required');
		if($this->form_validation->run() == FALSE){
			echo json_encode(array(
				'is_valid'=> false,
				'errors'=> $this->form_validation->error_array(),
			));
		}else{		
			$this->load->model('patient_m');
			$this->load->library('encryption');
			$pass = $this->encryption->encrypt(post('password'));

			$patient_params = array(
				'patient_no' => post('patient_no'),
				'first_name' => post('first_name'),
				'last_name' => post('last_name'),
				'birthday' => post('birthday'),
				'contact_no' => post('contact_no'),
				'account_type' => post('account_type'),
				'username' => post('username'),
				'password' => $pass,
				'address' => post('address'),
			);
			$this->patient_m->save($patient_params);

			echo json_encode(array(
				'is_valid'=> true,
				'info'=> $patient_params,
			));
		}	

	  }
	 function view_list(){
	 	$this->data['title'] = "Patience";
	  	$this->data['main_content'] = $this->basetemp.'patience/patience_view';
	 	$this->load->model('patient_m');
	 	$patient_params = array(
	 			'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
	 	);
	 	$this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
	 	$this->load->view('_admin/_includes/header',$this->data);
	 }


 }