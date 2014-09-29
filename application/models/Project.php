<?php
	class Project extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->model("databaseWraper");
		}

		public function addNewProject($vars){
			$data = array(
						'name'=>$vars['projectName'],
						'description'=>$vars['projectDescription'],
						'releaseid'=>$vars['releaseID'],
						'startdate'=>$vars['startDate'],
						'enddate'=>$vars['endDate']);

			$id = $this->databaseWraper->insertInto('projects',$data);

			return $id;

		}

		public function editProject($vars){

			$data = array(
						'name'=>$vars['projectName'],
						'description'=>$vars['projectDescription'],
						'releaseid'=>$vars['releaseID'],
						'startdate'=>$vars['startDate'],
						'enddate'=>$vars['endDate']);
			$id = array('id'=>$vars['projectID']);

			$status = $this->databaseWraper->updateTable('projects',$id,$data);

			return $status;
		}

		public function getAllProjects($userid){

			$projects = $this->databaseWraper->selectWhere('projects');
			$res = array();
			foreach($projects as $project){
				$val["project"] = $project;
				$versions = $this->databaseWraper->selectWhere('version',array('pid'=>$project->id));
				$val["version"] = $versions;
				$sprint = $this->databaseWraper->selectWhere('sprint',array('pid'=>$project->id));
				$val['sprint']= $sprint;

				array_push($res, $val);
			}

			return $res;

		}
	}
?>