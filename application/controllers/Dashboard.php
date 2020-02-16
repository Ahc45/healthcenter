<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');

class Dashboard extends Admin_Controller {

	  public $basetemp = '_admin/';
	  public function __construct(){
	  	parent::__construct();

	  	$this->load->model('users_m');
	  if ( !session('is_logged_in') ) {
	        redirect('login');
	      }
	     if (session('is_patient') ) {
       redirect('frontend');
      }
	  }
	  public function index()
	  {
	  	$this->data['title'] = "Dashboard"; 
        $this->data['main_content'] = $this->basetemp.'/dashboard/view';
      	$this->load->model('patient_m');
	 	$patient_params = array(
	 			'select' => 'patients.*,familynumbers.id as fam_id',
	 			'is_deleted' => 0,
	 			'join' => 'familynumbers',
	 	);
	 	$this->data['patients'] = $this->patient_m->get_all_patient($patient_params)->result();
	 	// print_r("<pre>"); print_r(	$this->data['patients']); die();
	 	$this->load->model('prenatal_m');
	 	$prenatal_num = $this->prenatal_m->count()->result();
	 	$this->data['prenatal_num'] = count($prenatal_num);

	 	$this->load->model('checkup_m');
	 	$checkup = $this->checkup_m->count()->result();
	 	$this->data['checkup'] = count($checkup);
	 	// print_r("<pre>"); print_r($this->db->last_query()); die();
	 	$this->load->model('vaccine_m');
	 	$vaccine = $this->vaccine_m->count()->result();
	 	$this->data['vaccine'] = count($vaccine);

	 	$this->data['patient_count'] = count($this->data['patients']);

	 	$this->load->model('announcement_m');
    	$this->data['announcement'] = $this->announcement_m	->get_all();

    	$this->load->model('vaccine_m');
    	$vaccines = $this->vaccine_m->get_all();
	 	$vaccine_history = $this->vaccine_m->join_vaccine();
	 	foreach ($vaccines as $key => $vacc) {
	 		$vacc->history="";
	 		foreach ($vaccine_history as $i => $vacc_h) {
	 			if($vacc->id == $vacc_h->vaccine_id){
	 				$vacc->history[$i] = $vacc_h;
	 			}
	 		}
	 	}
	 	$this->data['vaccines'] = $vaccines; 
	 	//print_r($vaccines); die();
	 	//echo"<pre>"; print_r($vaccines); die();
	 	
      	$this->load->view('_admin/_includes/header',$this->data);
	  }


 }