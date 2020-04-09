<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Prenatal extends Admin_Controller {

	public $base_temp = '_admin/';

  public function __construct(){
  	parent::__construct();

    $this->load->model('checkup_m');
    $this->load->model('users_m');
  if ( !session('is_logged_in') ) {
        redirect('login');
      }
if (session('is_patient') ) {
       redirect('frontend');
      }
  }
  function index(){

    $this->data['title'] = "Prenatal";
    $this->data['main_content'] = $this->base_temp.'prenatal/view';
    $this->load->model('patient_m');
    $patient_params = array(
        'select' => 'patients.*',
        'gender' => 'Female',
        'is_deleted' => 0,
    );

    $this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
    $ch_params = array(
        'select' => 'patients.first_name,patients.last_name,check_up.blood_p,check_up.weight,check_up.findings,check_up.created',
        'join' => 'patients',
        #'patient_no' => get('id'),
    );
    $this->data['ch_history'] = $this->checkup_m->patient_history($ch_params)->result();
        // print_r($this->db->last_query()); die();
    $this->load->view('_admin/_includes/header',$this->data);
    }

    function input(){
    $this->data['title'] = "Prenatal";
    $this->data['main_content'] = $this->base_temp.'prenatal/view';
    $this->load->model('patient_m');
    $patient_params = array(
        'select' => 'patients.id,patients.first_name,patients.last_name,patients.address,patients.patient_no',

        'is_deleted' => 0,
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
      'is_deleted'
    );
    $this->data['record'] = $this->prenatal_m->get_record($gp_params)->row();
        // print_r("<Pre>"); print_r( $this->db->last_query()); die();
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
            'patient_no' => post('patient_no'),
            'ob_history' => post('ob_history'),
            'lmp' => post('lmp'),
            'edc' => post('edc'),
            'aog'  => post('aog'),
            'fht' => post('fht'),
            'fhb' => post('fhb'),
            'pos' => post('pos'),
            'pres' => post('pres'),
            'tt_record' => post('tt_record'),
            'hr_code' => post('hr_code'),
            'last_delivery' => post('last_delivery'),
            'place_last_delivery'  => post('place_last_delivery'),
            'attent_by' => post('attent_by'),
            'typeofdelivery' => post('typeofdelivery'),
            'blood_type' => post('blood_type'),
            'micoronutients_given' => post('micoronutients_given'),
            'mg_date_given' => post('mg_date_given'),
            'food_suplement' => post('food_suplement'),
            'fs_date_given'  => post('fs_date_given'),
            'dental_checkup' => post('dental_checkup'),
            'treatment_given' => post('treatment_given'),
            'date_of_visit' => post('date_of_visit'),
            'FSN' => post('FSN'),
            'ap_no' => post('ap_no'),
            'prenatal_note' => post('prenatal_note'),
            'hgb' => post('hgb'),
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