<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vaccine_record_m extends MY_Model
{
	protected $_table_name = 'vaccine_history';
	protected $_order_by = 'id';
	protected $_timestamps = TRUE;

	 function get_all($params){
	 	$this->_filter($params);
	 	$this->db->select('*');
	 	$this->db->order_by('id', 'DESC');
	 	return $this->db->get($this->_table_name)->result();
	 }
	 function _filter($params){

		if ( array_key_exists('vacc_id', $params) && $params['vacc_id'] !=null ) {
			$this->db->where('vaccine_id',$params['vacc_id']);
			}
		}

}