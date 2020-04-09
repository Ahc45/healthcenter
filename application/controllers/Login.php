 <?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');
class Login extends Admin_Controller {

  public $base_temp = '_admin/';

  public function __construct(){
    parent::__construct();
    //$this->load->model('users_m');
    //var_dump($this->users_m->is_logged_in());die();
     if ( session('is_logged_in') && !session('is_patient') ) {
         redirect('dashboard');
      }
       if ( session('is_logged_in') && session('is_patient') ) {
         redirect('frontend');
      }
    
  }

 public function index(){

  	$this->data['title'] = "Health Center - LOGIN";


    $this->data['main_content'] = '_admin/login/login_body';

    $this->load->model('announcement_m');
    $this->data['announcement'] = $this->announcement_m ->get_all();
    // print_r("<pre>"); print_r($this->data['announcement']); die();
		$this->load->view('_admin/login/login_header',$this->data); 

  }
function validate_login()
  {   
    
    $this->load->model('patient_m');
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

          redirect('dashboard');
        
    }elseif( $this->patient_m->login('username') == TRUE ) {
        $session_code = random_string('alnum', 30);
        $this->users_m->save(array('session_code'=> $session_code), session('user_id') );
        
        $this->session->set_userdata( 'session_code', $session_code );

          redirect('frontend');
      }else{
        $message = array('title'=> '', 'message' => 'Wrong Username and password combination.', 'show' => 'show', 'alert_type' => 'alert-danger' );
        $this->session->set_flashdata($message); 
        
       redirect('login');
       $this->data['show']= "show";
        // echo json_encode(array(
        //     'is_valid'=> false,
        //     'error_msg'=>'Wrong Username and Password combination.',
        //   ));
      }
    }
  }
 function about(){
  
    $this->data['title'] = "Health Center - ABOUT";
    $this->data['main_content'] = '_admin/login/about';
    $this->load->view('_admin/login/login_header',$this->data);
 }
  

}