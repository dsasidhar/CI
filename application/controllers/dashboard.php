<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('session');
			$this->load->helper("url");
			$this->load->model("databaseWraper");
			$this->load->model("project");

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

			$id = $this->project->addNewProject($data);

			if($id) $this->load->view('view_projects');
			else{
				$this->session->set_userdata('error','Unable to create new project');
				$this->load->view("new_project");
			}

		}

		public function save_version($versionid = 0){

			$data["versionName"] = $_POST['versionname'];
			$data["startDate"] = $_POST['startdate'];
			$data["releaseID"] = $_POST['versionreleaseid'];
			$data["endDate"] = $_POST['enddate'];
			$data["versionDescription"] = $_POST['versiondescription'];
			$data["pid"] = $_POST['pid'];

			if($versionid) $id = $this->project->saveVersion($data,$versionid);
			else $id = $this->project->saveVersion($data);

			$success_mes = array(status=>1,message=>'Version Created Successfully',create_id=>$id);
			$error_mes = array(status=>0,message=>'Version Creation Failed',create_id=>'-1');

			header('Content-Type: application/json');
			$mes = $id ? $success_mes : $error_mes;
			echo json_encode($mes);
		}
		public function save_sprint($versionid = 0){

			$data["sprintName"] = $_POST['sprintname'];
			$data["startDate"] = $_POST['startdate'];
			$data["endDate"] = $_POST['enddate'];
			$data["sprintDescription"] = $_POST['sprintdescription'];
			$data["pid"] = $_POST['pid'];

			if($versionid) $id = $this->project->saveSprint($data,$versionid);
			else $id = $this->project->saveSprint($data);

			$success_mes = array(status=>1,message=>'Sprint Created Successfully',create_id=>$id);
			$error_mes = array(status=>0,message=>'Sprint Creation Failed',create_id=>'-1');

			header('Content-Type: application/json');
			$mes = $id ? $success_mes : $error_mes;
			echo json_encode($mes);
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

		public function get_requirements($project_id){
			$this->load->model('requirements');
			header('Content-Type: application/json');
			$mes = $this->requirements->getRequirements($project_id);
			echo json_encode($mes);
		}

		public function get_Projects(){

			$userid = $this->session->userdata('userid');
			$res = $this->project->getAllProjects(array("name"=>$userid));
			return $res;
		}
		public function view_project(){
			$data["projects"] = $this->get_Projects();
			$this->load->view("view_projects",$data);
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