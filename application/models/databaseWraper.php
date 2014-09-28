<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class DatabaseWraper extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function selectWhere($tableName,$param){
			$this->db->select("*");
			$this->db->from($tableName);
			$this->db->where($param);
			$query = $this->db->get();

			if($query->num_rows() >0 ){
				return $query->result();
			}
			else{
				return array();
			}
		}
	}
?>