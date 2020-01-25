<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_M extends MY_Model
{


	protected $_table_name = 'users';
	protected $_order_by = 'id';
	protected $_timestamps = TRUE;

	public $personal_info_rules = array(
		'first_name' => array(
			'field'=> 'first_name', 
			'label'=> 'First Name', 
			'rules'=> 'trim|required'
		),
		'last_name' => array(
			'field'=> 'last_name', 
			'label'=> 'Last Name', 
			'rules'=> 'trim|required'
		),
		'middle_name' => array(
			'field'=> 'middle_name', 
			'label'=> 'Middle Name', 
			'rules'=> 'trim'
		),
		'nickname' => array(
			'field'=> 'nickname', 
			'label'=> 'Nickname', 
			'rules'=> 'trim'
		),
		'gender' => array(
			'field'=> 'gender', 
			'label'=> 'Gender', 
			'rules'=> 'trim|required'
		),
		'month' => array(
			'field'=> 'month', 
			'label'=> 'birthday', 
			'rules'=> 'trim|required'
		),
		
		'address' => array(
			'field'=> 'address', 
			'label'=> 'Address', 
			'rules'=> 'trim|required'
		),
		'contact_no' => array(
			'field'=> 'contact_no', 
			'label'=> 'Contact No', 
			'rules'=> 'trim|numeric|required'
		),
		
		'username' => array(
			'field'=> 'email', 
			'label'=> 'Email', 
			'rules'=> 'trim|required|valid_email|ms_is_unique[users.email]'
		),


	);

	public $account_detail_rules = array(
		'username' => array(
			'field'=> 'username', 
			'label'=> 'Username', 
			'rules'=> 'trim|required|min_length[4]|max_length[32]|ms_is_unique[users.username]',
		),
		'password' => array(
			'field'=> 'password', 
			'label'=> 'Password', 
			'rules'=> 'trim|required|min_length[4]|max_length[32]'
		),
		'confirm_password' => array(
			'field'=> 'confirm_password', 
			'label'=> 'Confirm Password', 
			'rules'=> 'trim|required|matches[password]'
		),
		'account_type' => array(
			'field'=> 'account_type', 
			'label'=> 'Account Type', 
			'rules'=> 'trim|required'
		),
	);


	public $login_rules = array(
		'username' => array(
			'field' => 'username',
			'label' => 'Username',
			'rules'=> 'trim|required'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules'=> 'trim|required'
		),
	);
	
	function login()
	{
        $this->load->library('encryption');
		$user = $this->get_by(array(
			'username' => post('username'),
			'password' => $this->hash(post('password')),
			'is_deleted' => 0,
		), TRUE);
		if ( count($user) ) {
			return $this->set_session($user);
		};

	}
	
	function set_session($user)
	{
		if ( count($user) ) {
			$user_data = array(
				'user_id' => $user->id,
				'name' => $user->first_name . ' ' . $user->last_name,
				'username' => $user->username,
				'email' => $user->email,
				'contact_no' => $user->contact_no,
				'account_type' => $user->account_type,
				'account_no' => $user->account_no,
				'is_admin' => true,
				'is_logged_in' => true,
				'created' => $user->created,
			);

			$this->session->set_userdata($user_data);

			unset($_SESSION['is_customer']);
			return $user;
		}
	}

	function logout()
	{
	//	var_dump(session('is_logged_in'));die();
	}

	function is_logged_in()
	{	
		//var_dump((bool) session('is_logged_in') == true && session('is_admin') == true); die();

		return (bool) session('is_logged_in') == true && session('is_admin') == true;

	}


	function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}

	function get_all_admins($params){
		if ( array_key_exists('select', $params) && $params['select'] !=null ) {
			$this->db->select($params['select']);
		}else{
			$this->db->select('*');
		}
		return $this->db->get($this->_table_name);
	}
	function get_admin($params){

		$this->_filters($params);
		if ( array_key_exists('select', $params) && $params['select'] !=null ) {
			$this->db->select($params['select']);
		}else{
			$this->db->select('*');
		}
		return $this->db->get($this->_table_name)->row();
	}
	function _filters($params){

		if ( array_key_exists('id', $params) && $params['id'] !=null ) {
			$this->db->where('users.id',$params['id']);
		}
	}


}