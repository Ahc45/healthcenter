 <?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Login extends Admin_Controller {

  public $base_temp = '_admin/';

  public function __construct(){
    parent::__construct();

    //$this->load->model('users_m');
    //var_dump($this->users_m->is_logged_in());die();
    $this->users_m->is_logged_in() == false || redirect('admin');
    
  }

 public function index(){

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
        $this->index();
    }else{      

      if ( $this->users_m->login('username') == TRUE ) {
        

        $session_code = random_string('alnum', 30);
        $this->users_m->save(array('session_code'=> $session_code), session('user_id') );
        
        $this->session->set_userdata( 'session_code', $session_code );

          redirect('Admin');
        
      }else{
        $message = array('title'=> '', 'message' => 'Wrong Username and password combination.', 'show' => 'show', 'alert_type' => 'alert-danger' );
        $this->session->set_flashdata($message); 
        
       redirect('login');
       $this->data['show']= "show";

      }
    }
  }

  function logout()
  {
    $this->users_m->logout();
    redirect(base_url('login'));
    //die();
  }

}