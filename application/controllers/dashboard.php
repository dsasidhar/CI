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

		public function save_new_project(){

			$data["projectName"] = $_POST['projectname'];
			$data["startDate"] = $_POST['startdate'];
			$data["releaseID"] = $_POST['releaseid'];
			$data["endDate"] = $_POST['enddate'];
			$data["projectDescription"] = $_POST['projectdescription'];

			$this->load->model('project');

			$id = $this->project->addNewProject($data);

			if($id) $this->load->view('view_projects');
			else{
				$this->session->set_userdata('error','Unable to create new project');
				$this->load->view("new_project");
			}

		}

		public function update_project(){

			$data["projectName"] = $_POST['projectname'];
			$data["startDate"] = $_POST['startdate'];
			$data["releaseID"] = $_POST['releaseid'];
			$data["endDate"] = $_POST['enddate'];
			$data["projectDescription"] = $_POST['projectdescription'];

			$data['id'] = $_POST['id'];

			$status = $this->project->editProject($data);

			$success_mes = array(status=>1,message=>'Project Edited Successfully');
			$error_mes = array(status=>0,message=>'Editing failed');

			header('Content-Type: application/json');
    		$mes =$status ? $success_mes : $error_mes;
    		echo json_encode($mes);
		}

		public function get_Projects(){

			$userid = $this->session->userdata('userid');
			$res = $this->project->getAllProjects($userid);
			return $res;
		}
		public function view_project(){
			$this->load->view("view_projects");
		}

		public function checkLogin(){

			if($this->session->userdata("userid")){
				$this->session->set_userdata("error","");
				return true;
			}
			else if(isset($_POST['username']) && isset($_POST['password'])){
				$data["username"] = $_POST["username"];
				$data["password"] = $_POST["password"];
				$res = $this->databaseWraper->selectWhere("user",array('username'=>$data["username"],'password'=>$data["password"]));

				if(count($res)>0){
					$this->session->set_userdata('username',$data["username"]);
					$this->session->set_userdata('userid',$res[0]->id);
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