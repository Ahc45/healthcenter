<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccine_m extends MY_Model
{
	protected $_table_name = 'vaccine';
	protected $_order_by = 'id';
	protected $_timestamps = TRUE;

	 function get_all(){
	 	$this->db->select('*');
	 	$this->db->order_by('id', 'DESC');
	 	return $this->db->get($this->_table_name)->result();
	 }
	 function get_like($param){
	 	$this->db->select('*');
	 	$this->db->like('name',$param);
	 	return $this->db->get($this->_table_name)->result();
	
	 }	
	function count(){
			$this->db->select('*');
			$this->db->where('is_deleted', 0 );

		return $this->db->get($this->_table_name);
    }
    function join_vaccine(){

	 		$this->db->select('*');
    		$this->db->order_by('id', 'DESC');
	 	return $this->db->get('vaccine_history')->result();
    }
    function get_vaccine_rec($params){
    	$this->_filter($params);
    	$this->db->select('*');;
	 	return $this->db->get($this->_table_name)->row();
    }
    function _filter($params){
    		if(array_key_exists('id', $params)){
			$this->db->where('vaccine.id',$params['id']);
		}
    }

}