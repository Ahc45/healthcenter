<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prenatal_m extends MY_Model
{
	protected $_table_name = 'prenatal';
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
			$this->db->where('patients.patient_no',$params['patient_no']);
		}

	}
	function joins($params){

		if(array_key_exists('join', $params)){
			$this->db->join($params['join'], $params['join'].'.patient_no ='. $this->_table_name. '.patient_no' , 'left');
		}
	}
}