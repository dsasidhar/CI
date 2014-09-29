<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper("url");
			$this->load->model("databaseWraper");

			if(! $this->checkLogin()) redirect('/login');
		}
		public function index(){
			$this->load->view("dashboard");
		}

		public function new_project(){
			$this->load->view("new_project");
		}

		public function view_project(){
			$this->load->view("view_projects");
		}

		public function checkLogin(){

			if($this->session->userdata("userid")){
				$this->session->set_userdata("error","");
				return true;
			}
			else if(isset($_POST['userid']) && isset($_POST['password'])){
				$data["userid"] = $_POST["userid"];
				$data["password"] = $_POST["password"];
				$res = $this->databaseWraper->selectWhere("user",array('username'=>$data["userid"],'password'=>$data["password"]));

				if(count($res)>0){
					$this->session->set_userdata('userid',$data["userid"]);
					return true;
				}
				else{
					$this->session->set_userdata("error","Invalid User name and password");
					return false;
				}
			}
			else{
				$this->session->set_userdata("error","Please Log in to the system first");
				return false;
			}
			
			
		}
	}
?>