<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Users extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->model('databaseWraper');
		}

		public function getUsers(){
			$res = $this->databaseWraper->selectWhere('user');
			return $res;
		}

	}
?>