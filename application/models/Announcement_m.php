<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement_m extends MY_Model
{
	protected $_table_name = 'announcement';
	protected $_order_by = 'id';
	protected $_timestamps = TRUE;
	
	 function get_all(){
	 	$this->db->select('*');
	 	$this->db->order_by('id', 'DESC');
	 	return $this->db->get($this->_table_name)->result();
	 }

	function family_members($params){
		$this->_filter($params);
		$this->db->join('patients', 'familynumbers.family_number = patients.family_number', 'left');
		if ( array_key_exists('select', $params) && $params['select'] !=null ) {
			$this->db->select($params['select']);
		}else{
			$this->db->select('*');
		}
		return $this->db->get($this->_table_name)->result();
	} 
		function _filter($params){
		if(array_key_exists('patient_no', $params)){
			$this->db->where('patients.patient_no',$params['patient_no']);
		}
		if(array_key_exists('is_deleted', $params)){
			$this->db->where('patients.is_deleted',$params['is_deleted']);
		}

	}

}