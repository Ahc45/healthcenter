<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');

class Frontend extends CI_Controller {

	  public $basetemp = '_frontend/';
	  public function __construct(){
	  	parent::__construct();

	  	$this->load->model('users_m');
	    if ( !session('is_logged_in') ) {
	        redirect('login');
	      }
	        if (session('is_admin') ) {
	       redirect('dashboard');
	      }
	  }

	function index(){

	  	$this->data['title'] = "Talon Uno"; 
        $this->data['main_content'] = $this->basetemp.'/main_view';
        $this->load->model('checkup_m');

        $ch_params = array(
        	'patient_no' => session('patient_no'),
        );
        $checkup_data = $this->checkup_m->checup_data($ch_params)->result();
        $this->data['checkup_data'] = $checkup_data;

        $this->load->model('announcement_m');
    	$this->data['announcement'] = $this->announcement_m	->get_all();
    	//print_r($this->data['announcement'] );
    	$this->data['ch_history'] = $this->checkup_m->patient_history($ch_params)->result();
        $this->load->view('_frontend/header',$this->data);
	}
	function logout()
   {
    //die(); 
    $this->session->sess_destroy(); 
    redirect(base_url('login'));
    //var_dump($this->users_m->is_logged_in()); 
  }
}