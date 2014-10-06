<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper("url");
		$this->load->model("databaseWraper");
		$this->load->model("project");
		$this->load->model("requirements");
		$this->load->model("testcase");
		$this->load->model("users");

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

		$success_mes = array("status"=>1,"message"=>'Version Created Successfully',"create_id"=>$id);
		$error_mes = array("status"=>0,"message"=>'Version Creation Failed',"create_id"=>'-1');

		header('Content-Type: application/json');
		$mes = $id ? $success_mes : $error_mes;
		echo json_encode($mes);
		flush();
	}
	public function save_sprint($versionid = 0){

		$data["sprintName"] = $_POST['sprintname'];
		$data["startDate"] = $_POST['startdate'];
		$data["endDate"] = $_POST['enddate'];
		$data["sprintDescription"] = $_POST['sprintdescription'];
		$data["pid"] = $_POST['pid'];

		if($versionid) $id = $this->project->saveSprint($data,$versionid);
		else $id = $this->project->saveSprint($data);

		$success_mes = array("status"=>1,"message"=>'Sprint Created Successfully',"create_id"=>$id);
		$error_mes = array("status"=>0,"message"=>'Sprint Creation Failed',"create_id"=>'-1');

		header('Content-Type: application/json');
		$mes = $id ? $success_mes : $error_mes;
		echo json_encode($mes);
		flush();
	}

	public function update_project(){

		$data["projectName"] = $_POST['projectname'];
		$data["startDate"] = $_POST['startdate'];
		$data["releaseID"] = $_POST['releaseid'];
		$data["endDate"] = $_POST['enddate'];
		$data["projectDescription"] = $_POST['projectdescription'];
		$data['projectID'] = $_POST['id'];

		$data['projectID'] = $_POST['id'];

		$status = $this->project->editProject($data);

		$success_mes = array("status"=>1,"message"=>'Project Edited Successfully');
		$error_mes = array("status"=>0,"message"=>'Editing failed');
		header('Content-Type: application/json');
		$mes = $status ? $success_mes : $error_mes;
		echo json_encode($mes);

	}

	public function get_requirements($project_id){
		$this->load->model('requirements');
		$res = $this->requirements->getRequirements($project_id);
		return $res;
	}

	public function get_requirements_json($project_id){
		$this->load->model('requirements');
		header('Content-Type: application/json');
		$res = $this->requirements->getRequirements($project_id);
		echo json_encode($res);
	}
	public function get_Projects(){

		$userid = $this->session->userdata('userid');
		$res = $this->project->getAllProjects(array("name"=>$userid));
		return $res;
	}
	public function save_requirement($requirementid = 0){

		$data["requirementName"] = $_POST['requirementname'];
		$data["requirementDescription"] = $_POST['requirementdescription'];
		$data["type"] = $_POST['type'];
		$data["priority"] = $_POST['priority'];
		$data["rgid"] = $_POST['rgid'];

		if($requirementid) $id = $this->requirements->saveRequirement($data,$requirementid);
		else $id = $this->requirements->saveRequirement($data);

		$success_mes = array("status"=>1,"message"=>'Requirement Created Successfully',"create_id"=>$id);
		$error_mes = array("status"=>0,"message"=>'Requirement Creation Failed',"create_id"=>'-1');

		header('Content-Type: application/json');
		$mes = $id ? $success_mes : $error_mes;
		echo json_encode($mes);
	}

	public function getRequirementDetails($id){
		$res = $this->requirements->getRequirementDetails($id);

		header('Content-Type: application/json');
		echo json_encode($res);

	}
	public function getRequirementGroupDetails($id){
		$res = $this->requirements->getRequirementGroupDetails($id);

		header('Content-Type: application/json');
		echo json_encode($res);

	}
	public function save_requirement_group($requirementgroupid = 0){

		$data["requirementGroupName"] = $_POST['requirementgroupname'];
		$data["projectID"] = $_POST['projectid'];
		$data["parentID"] = $_POST['parentid'];
		

		if($requirementgroupid) $id = $this->requirements->saveRequirementsGroup($data,$requirementgroupid);
		else $id = $this->requirements->saveRequirementsGroup($data);

		$success_mes = array("status"=>1,"message"=>'Requirement Group Created Successfully',"create_id"=>$id);
		$error_mes = array("status"=>0,"message"=>'Requirement Group Creation Failed',"create_id"=>'-1');

		header('Content-Type: application/json');
		$mes = $id ? $success_mes : $error_mes;
		echo json_encode($mes);
	}
	public function view_project(){
		$data["projects"] = $this->get_Projects();
		$this->load->view("view_projects",$data);
	}
	public function view_requirements(){
		$data["project_requirements"] = $this->requirements->getAllRequirements();
		$this->load->view("view_requirements",$data);
	}

	public function save_testcase(){
		$data["testcaseName"] = $_POST['testcasename'];
		$data["testcaseDescription"] = $_POST['testcasedescription'];
		$data["expectedInput"] = $_POST['expectedinput'];
		$data["expectedOutput"] = $_POST['expectedoutput'];

		$id = $this->testcase->addTestCase($data);
		if($id)  $this->load->view("view_testcase");
	}


	public function new_testcase(){
		
		$this->load->view("new_testcase");
	}
	public function view_testcases(){
		$data["project_requirements"] = $this->requirements->getAllRequirements();
		$this->load->view("view_testcase",$data);
	}

	public function new_testcase_assign(){
		$data["projects"] = $this->project->getProjects();
		$data["testcases"] = $this->testcase->getAllTestcases();
		$data["users"] = $this->users->getUsers();
		$this->load->view("new_testcase_assign",$data);
	}

	public function assign_testcase(){
		$data["rid_list"] = $_POST['requirements_'];
		$data["tid_list"] = $_POST['testcases_'];
		$data["assignedto_list"] = $_POST["assignedto_"];

		// var_dump($_POST['requirements_']);
		// echo $_POST['requirements_'];
		$id = $this->testcase->assignTestcase($data);
		if($id) $this->load->view("view_testcase");
	}

	public function getRequirementList($proj_id){
		
		$requirements = $this->requirements->getRequirementList($proj_id);
		header('Content-Type: application/json');
		echo json_encode($requirements);

	}

	public function update_requirement_tree($type,$id){
		$data["project_requirements"] = $this->requirements->getAllRequirements();
		$data["path"] = $this->requirements->getRequirementsPath($type,$id);
		$this->load->view("show_requirement_tree",$data);
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
	public function new_requirements(){
		$this->load->view("new_requirements");
	}
	

}
?>