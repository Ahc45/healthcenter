<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkup_m extends MY_Model
{
	protected $_table_name = 'check_up';
	protected $_order_by = 'id';
	protected $_timestamps = TRUE;

	function patient_history($params){
		$this->_filter($params);
		$this->joins($params);
		if ( array_key_exists('select', $params) && $params['select'] !=null ) {
			$this->db->select($params['select']);
		}else{
			$this->db->select('*');
		}

		return $this->db->get($this->_table_name);
	}

	function _filter($params){
		if(array_key_exists('patient_no', $params)){
			$this->db->where('check_up.patient_no',$params['patient_no']);
		}

	}
	function joins($params){

		if(array_key_exists('join', $params)){
			$this->db->join($params['join'], $params['join'].'.patient_no ='. $this->_table_name. '.patient_no' , 'left');
		}
	}
	function count(){
      	
			$this->db->select('check_up.*');
			$this->db->where('patients.is_deleted', 0 );
			$this->db->join('patients','check_up.patient_no = patients.patient_no','left');
			$this->db->group_by('check_up.patient_no', 'DESC');
 		return $this->db->get($this->_table_name);
    }
    function checup_data($params){

		$this->db->where('check_up.patient_no',$params['patient_no']);
    	$this->db->select('*');
    	$this->db->group_by('patient_no', 'DESC');
    	return $this->db->get($this->_table_name); 
    }
}