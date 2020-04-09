<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');

class Announcement extends Admin_Controller {

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
	  	$this->data['title'] = "Announcement"; 
        $this->data['main_content'] = $this->basetemp.'/announcement/view';
	 	
      	$this->load->view('_admin/_includes/header',$this->data);
	  }
	  function validate(){
	  	//print_r(post('body'));die();
        $this->form_validation->set_rules('title', 'Title ', 'trim|required');
        $this->form_validation->set_rules('body', 'Announcement discription ', 'required');
    
	      if($this->form_validation->run() == FALSE){
	        echo json_encode(array(
	          'is_valid'=> false,
	          'errors'=> $this->form_validation->error_array(),
	        ));
	      }else{
	      	$this->load->model('announcement_m');
	      	$params = array(
	      		'title' => post('title'),
	      		'body' => post('body')
	      	);
		    $this->announcement_m->save($params);
	          // print_r($this->db->last_query()); 
	        echo json_encode(array(
	          'is_valid'=> true,
	          'info'=> $params,
	        ));
      
	      }
	  }	
	function delete(){
		$this->load->model('announcement_m');
		$this->announcement_m->delete(get('id'));
		// print_r(get('id'));
		echo json_encode(
			array(
					'is_valid' => true,
					'deleted' => 'deleted',
			)
		);

	}


 }