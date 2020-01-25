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
		$this->data['title'] = "Patient";
	  	$this->data['main_content'] = $this->basetemp.'patient/patient_view';
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
	  		$this->data['main_content'] = $this->basetemp.'patient/add';
			$this->load->view('_admin/_includes/header',$this->data);
	  }
	  function validate(){

		
	$this->form_validation->set_rules('patient_no', 'Patient No.', 'trim|required');
	$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
	$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
	$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
	$this->form_validation->set_rules('contact_no', 'Contact Number', 'trim|required|numeric');
	$this->form_validation->set_rules('username', 'Username', 'trim|required');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	$this->form_validation->set_rules('address', 'Address', 'trim|required');
	$this->form_validation->set_rules('weight', 'Weight', 'trim');
	$this->form_validation->set_rules('height', 'Height', 'trim');
	$this->form_validation->set_rules('bp', 'BP', 'trim');
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

				'username' => post('username'),
				'password' => $pass,
				'address' => post('address'),
				'age' => post('age'),
				'middle_name' =>post('middle_name'),
				'gender' => post('sex'),
				'height' => post('height'),
				'weight' => post('weight'),
				'bp' => post('bp'),
			);
			$this->patient_m->save($patient_params);
				// print_r($this->db->last_query()); 
			echo json_encode(array(
				'is_valid'=> true,
				'info'=> $patient_params,
			));
		}	

	  }
	 function view_list(){
	 	$this->data['title'] = "Patients";
	  	$this->data['main_content'] = $this->basetemp.'patient/patience_view';
	 	$this->load->model('patient_m');
	 	$patient_params = array(
	 			'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
	 	);
	 	$this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
	 	$this->load->view('_admin/_includes/header',$this->data);
	 }
	 function add_prenatal(){
	 	$this->data['title'] = "Pre-natal";
	  	$this->data['main_content'] = $this->basetemp.'patient/patience_view';
	 	$this->load->model('prenatal_m');
	 }
	


 }