<?php defined('BASEPATH') OR exit('No direct script access allowed');

 // require_once(APPPATH.'core\Admin_Controller.php');

class Dashboard extends Admin_Controller {

	  public $basetemp = '_admin/_includes/';
	  public function __construct(){
	  	parent::__construct();

	  }
	  public function index()
	  {

			$this->load->view('_admin/_includes/header');
	  }


 }