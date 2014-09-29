<?php
	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper("url");
		}
		public function index(){
			$data["error"] = $this->session->userdata("error");
			if($this->session->userdata("userid")){
				$this->session->set_userdata("error","");
				redirect('/dashboard');
			}
			$this->load->view("index",$data);
		}
	}
?>