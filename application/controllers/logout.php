<?php
	class Logout extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper("url");
		}
		public function index(){
			$this->session->set_userdata("error","");
			if($this->session->userdata("userid")){
				$this->session->set_userdata("userid","");
				$this->session->sess_destroy();
			}
			redirect("/login");
		}
	}
?>