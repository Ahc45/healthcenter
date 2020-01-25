<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Vaccine extends Admin_Controller {

	public $base_temp = '_admin/vaccine';

  public function __construct(){
  	parent::__construct();

    $this->load->model('vaccine_m');
    if ( !session('is_logged_in') ) {
        redirect('login');
      }
  }
  function index(){
  		$this->data['title'] = "Vaccine List";
	  	$this->data['main_content'] = $this->base_temp.'/view';
	 	$this->load->model('vaccine_m');
	 	$this->data['all_vaccine'] =$this->vaccine_m->get_all();
	 	//print_r('<pre>'); print_r($all_vaccine); die();
	 	$this->load->view('_admin/_includes/header',$this->data);
  }
 // function add_vaccine(){
	//  	$this->data['title'] = "Vaccine";
	//   	$this->data['main_content'] = $this->basetemp.'/add';
	//  	$this->load->model('prenatal_m');
	//  }
    function validate(){
	  	$this->form_validation->set_rules('name', 'Name.', 'trim|required');
		$this->form_validation->set_rules('mother', 'Mother\'s name', 'trim|required');
		$this->form_validation->set_rules('bp', 'BP', 'trim');
		if($this->form_validation->run() == FALSE){
			echo json_encode(array(
				'is_valid'=> false,
				'errors'=> $this->form_validation->error_array(),
			));
		}else{		
			$vaccine_params = array(
				'name' => post('name'),
				'birthday' => post('birthday'),
				'mother' => post('mother'),
				'address' => post('address'),
				'birth_history' => post('birth_history'),

				'feeding_history' => post('feeding_history'),
				'sex' => post('sex'),
				'birth_wt' => post('birth_wt'),
				'date_refer' => post('date_refer'),
				'tt_satatus' => post('tt_satatus'),
				'contact_no' => post('contact_no'),
				'time_initiated' => post('time_initiated'),
				'fh_no' => post('fh_no'),
				'ufh_no' => post('ufh_no'),
				'ept_no' => post('ept_no'),
			);
			$this->vaccine_m->save($vaccine_params);
				// print_r($this->db->last_query()); 
			echo json_encode(array(
				'is_valid'=> true,
				'info'=> $vaccine_params,
			));
		}	
    }
    function view_history(){
  		$this->data['title'] = "Vaccine Record";
	  	$this->data['main_content'] = $this->base_temp.'/vaccine_history';
	 	$this->load->model('vaccine_m');
	 	$this->data['all_vaccine'] =$this->vaccine_m->get_all();
	 	//print_r('<pre>'); print_r($all_vaccine); die();
	 	$this->load->view('_admin/_includes/header',$this->data);    	
    }
}