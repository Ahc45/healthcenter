<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  protected $data = array();

 function __construct()
	{
		parent::__construct();
		
		$this->data['errors'] = array();
		$this->data['site_name'] = config_item('site_name');
		$this->data['currency'] = config_item('currency');

		// $this->output->enable_profiler(ENVIRONMENT == 'development');
		
	}
}

class Admin_Controller extends MY_Controller
{


	public $query_limit = 20;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}


}