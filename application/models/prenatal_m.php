<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prenatal_m extends MY_Model
{
	protected $_table_name = 'prenatal';
	protected $_order_by = 'id';
	protected $_timestamps = TRUE;

	function get_record($params){
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
			$this->db->where('prenatal.patient_no',$params['patient_no']);
		}
		if(array_key_exists('group_by', $params)){
			$this->db->group_by($params['group_by'], 'DESC');
		}

	}
	function joins($params){

		if(array_key_exists('join', $params)){
			$this->db->join($params['join'], $params['join'].'.patient_no ='. $this->_table_name. '.patient_no' , 'left');
		}
	}
	function count(){
      	
			$this->db->select('*');
			$this->db->where('prenatal.is_deleted', 0 );
			$this->db->group_by('prenatal.patient_no', 'DESC');

		return $this->db->get($this->_table_name);
    }

}