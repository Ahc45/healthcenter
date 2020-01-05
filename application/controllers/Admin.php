<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Admin extends Admin_Controller {

	public $base_temp = '_admin/';

  public function __construct(){
  	parent::__construct();

    $this->load->model('users_m');
    if ( !session('is_logged_in') && !session('is_customer') ) {
        redirect('login');
      }
  }
  function index(){

    $this->data['title'] = "Admin";
      $this->data['main_content'] = $this->base_temp.'admin_view';
    $this->load->model('users_m');
    $patient_params = array(
        'select' => 'users.id,users.first_name,users.last_name,users.address,users.account_no,users.account_type',
    );
    $this->data['admins'] = $this->users_m->get_all_admins($patient_params)->result();
    $this->load->view('_admin/_includes/header',$this->data);
    }
  
 

 function add(){

      $this->load->helper('string');
      $this->data['account_no'] = random_string('numeric');
        $this->data['title'] = "Add Admin User";
        $this->data['main_content'] = $this->base_temp.'/add_admin';
      $this->load->view('_admin/_includes/header',$this->data);
    }

   function validate()
   {
      $this->form_validation->set_rules('account_no', 'Account No.', 'trim|required');
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
          $this->load->model('users_m');
          $pass = $this->users_m->hash(post('password'));

          $patient_params = array(
            'account_no' => post('account_no'),
            'first_name' => post('first_name'),
            'last_name' => post('last_name'),
            'birthday' => post('birthday'),
            'contact_no' => post('contact_no'),
            'account_type' => post('account_type'),
            'username' => post('username'),
            'password' => $pass,
            'address' => post('address'),
            'middle_name' =>post('middle_name'),
          );
          if(post('id') && post('id') != ''){
            $id = $this->users_m->save($patient_params,post('id'));
          }else{
          $id = $this->users_m->save($patient_params);
          }
            // print_r($this->db->last_query()); 
          echo json_encode(array(
            'is_valid'=> true,
            'info'=> $patient_params,
          ));
        } 

        }
  function edit($id){

        $this->data['title'] = "Add Admin User"; 
        $this->data['main_content'] = $this->base_temp.'/add_admin';
        $user_params = array(
            'id' => $id,
        );
        $this->load->model('users_m');
      $users_data  =  $this->users_m->get_admin($user_params);
      $this->load->library('encryption');
      $users_data->password = $this->encryption->decrypt( $users_data->password);
       $this->data['users_data'] =  $users_data;
      $this->load->view('_admin/_includes/header',$this->data);

    }


}
