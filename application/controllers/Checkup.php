<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Checkup extends Admin_Controller {

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

    $this->data['title'] = "Checkup";
    $this->data['main_content'] = $this->base_temp.'checkup/view';
    $this->load->model('patient_m');
    $patient_params = array(
        'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
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
    $this->data['title'] = "Checkup";
    $this->data['main_content'] = $this->base_temp.'checkup/view';
    $this->load->model('patient_m');
    $patient_params = array(
        'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
    );
    $this->data['input'] = true;
    $this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
    $this->load->view('_admin/_includes/header',$this->data);
   }

   function validate(){

     if(session('account_type')!= "DOCTOR"){
        $this->form_validation->set_rules('patient_no', 'Patient No.', 'trim|required');
        // $this->form_validation->set_rules('weight', 'weight', 'trim|required');
        // $this->form_validation->set_rules('height', 'height', 'trim|required');
    }
      if(session('account_type')== "DOCTOR"){
         $this->form_validation->set_rules('findings', 'Findigs', 'trim|required');
      }
      if($this->form_validation->run() == FALSE){
        echo json_encode(array(
          'is_valid'=> false,
          'errors'=> $this->form_validation->error_array(),
        ));
      }else{    
        $this->load->model('checkup_m');
        $this->load->library('encryption');
        $pass = $this->encryption->encrypt(post('password'));

        $checkup_params = array(
          'patient_no' => post('patient_no'),
          'weight' => post('weight'),
          'height' => post('height'),
          'blood_p' => post('bp'),
          'findings' => post('findings'),
        );
        $this->checkup_m->save($checkup_params);
          // print_r($this->db->last_query()); 
        echo json_encode(array(
          'is_valid'=> true,
          'info'=> $checkup_params,
        ));
      }
  }


   function history(){
    $this->data['title'] = "Checkup";
    $this->data['main_content'] = $this->base_temp.'checkup/view';
    $this->load->model('checkup_m');
    $ch_params = array(
        'select' => 'patients.first_name,patients.last_name,check_up.blood_p,check_up.weight,check_up.findings,check_up.created',
        'join' => 'patients',
        'patient_no' => get('id'),
    );
    $this->data['ch_history'] = $this->checkup_m->patient_history($ch_params)->result();

    $this->data['history'] = true;
    $this->load->model('patient_m');
    $patient_params = array(
        'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',
    );
    $this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
    //print_r($this->data['ch_history']); die();
    $this->load->view('_admin/_includes/header',$this->data);
   }

  }