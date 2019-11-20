<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller
{


	public $query_limit = 20;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('users_m');
	}


}

/* End of file Admin_Controller.php */
/* Location: ./application/libraries/Admin_Controller.php */