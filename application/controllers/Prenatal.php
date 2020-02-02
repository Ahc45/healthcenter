<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Prenatal extends Admin_Controller {

	public $base_temp = '_admin/';

  public function __construct(){
  	parent::__construct();

    $this->load->model('checkup_m');
    $this->load->model('users_m');
    if ( !session('is_logged_in') && !session('is_customer') ) {
        redirect('login');
      }
  }
  function index(){

    $this->data['title'] = "Prenatal";
    $this->data['main_content'] = $this->base_temp.'prenatal/view';
    $this->load->model('patient_m');
    $patient_params = array(
        'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
        'gender' => 'female'
    );
    $ch_params = array(
        'select' => 'patients.first_name,patients.last_name,check_up.blood_p,check_up.weight,check_up.findings,check_up.created',
        'join' => 'patients',
        #'patient_no' => get('id'),
    );
    $this->data['ch_history'] = $this->checkup_m->patient_history($ch_params)->result();
    $this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
    $this->load->view('_admin/_includes/header',$this->data);
    }

    function input(){
    $this->data['title'] = "Prenatal";
    $this->data['main_content'] = $this->base_temp.'prenatal/view';
    $this->load->model('patient_m');
    $patient_params = array(
        'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
        'gender' => 'female'
    );
    $this->data['input'] = true;
    $this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
    $this->load->model('prenatal_m');
    $params = array(
      'patient_no' => get('id'),
    );
    $this->data['prenatal_record'] = $this->prenatal_m->get_record($params)->result();
    $gp_params = array(
      'patient_no' => get('id'),

      'group_by' => 'patient_no',
    );
    $this->data['record'] = $this->prenatal_m->get_record($gp_params)->row();
    // /print_r($this->data['record']); die();
    $this->load->view('_admin/_includes/header',$this->data);
   }

    function validate(){

 
        $this->form_validation->set_rules('patient_no', 'Patient No.', 'trim|required');
      
      if($this->form_validation->run() == FALSE){
        echo json_encode(array(
          'is_valid'=> false,
          'errors'=> $this->form_validation->error_array(),
        ));
      }else{    
        $this->load->model('prenatal_m');
        $checkup_params = array(
          'patient_no'  => post('patient_no'),
          'fp_counseling' => post('fp_counseling'),
          'with_philhealth' => post('with_philhealth'),
          'philhealth' => post('philhealth'),
          'birth_plan' => post('birth_plan'),
          'prenatal_note' => post('prenatal_note'),
        );
        $this->prenatal_m->save($checkup_params);
          // print_r($this->db->last_query()); 
        echo json_encode(array(
          'is_valid'=> true,
          'info'=> $checkup_params,
        ));
      }
  }
  }