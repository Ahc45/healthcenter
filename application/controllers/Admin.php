<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Admin extends Admin_Controller {

	public $base_temp = '_admin/';

  public function __construct(){
  	parent::__construct();

  }
  function index(){
    {
    $this->data['title'] = "Admin";
      $this->data['main_content'] = $this->base_temp.'admin_view';
    $this->load->model('users_m');
    $patient_params = array(
        'select' => 'users.id,users.first_name,users.last_name,users.address,users.account_no,users.account_type',
    );
    $this->data['admins'] = $this->users_m->get_all_admins($patient_params)->result();
    $this->load->view('_admin/_includes/header',$this->data);
    }
  }
  public function login(){

  		$this->data['title'] = "Health Center - LOGIN";
		$this->load->view('_admin/login/login_header',$this->data); 

  }
function validate_login()
  {   
    
    $this->load->model('users_m');
    $this->load->library('form_validation');
    $rules = $this->users_m->login_rules;

    $this->form_validation->set_rules($rules);

    if($this->form_validation->run() == FALSE){
        $this->login();
    }else{      

      if ( $this->users_m->login('username') == TRUE ) {
        

        $session_code = random_string('alnum', 30);
        $this->users_m->save(array('session_code'=> $session_code), session('user_id') );
        
        $this->session->set_userdata( 'session_code', $session_code );

          redirect('dashboard');
        
      }else{
        $message = array('title'=> '', 'message' => 'Wrong Username and password combination.', 'show' => 'show', 'alert_type' => 'alert-danger' );
        $this->session->set_flashdata($message); 
        
       redirect('user/login');
       $this->data['show']= "show";

      }
    }
  }


 function add(){
      $this->load->helper('string');
        $this->data['title'] = "Add Admin User";
        $this->data['patient_no'] = random_string('numeric');
        $this->data['main_content'] = $this->base_temp.'/add_admin';
      $this->load->view('_admin/_includes/header',$this->data);
    }

 }
