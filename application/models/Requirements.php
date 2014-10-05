<?php
	class Requirements extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->model('databaseWraper');
		}


		public function saveRequirementsGroup($vars,$requirementGroupID=0){

			$data = array(
						'name'=>$vars['requirementGroupName'],
						'pid'=>$vars['projectID'],
						'parentid'=>$vars['parentID']);

			if($requirementGroupID){
				$id = array('id'=>$requirementGroupID);
				$id = $this->databaseWraper->updateTable('requirementgroup',$id,$data);
			}
			else  $id = $this->databaseWraper->insertInto('requirementgroup',$data);


			return $id;

		}

		public function saveRequirement($vars,$requirementID=0){

			$data = array(
						'name'=>$vars['requirementName'],
						'description'=>$vars['requirementDescription'],
						'type'=>$vars['type'],
						'priority'=>$vars['priority'],
						'rgid'=>$vars['rgid']);

			if($requirementID){
				$id = array('id'=>$requirementID);
				$id = $this->databaseWraper->updateTable('requirements',$id,$data);

			}
			else $id = $this->databaseWraper->insertInto('requirements',$data);

			return $id;

		}


		public function getAllRequirements(){
			$projects = $this->databaseWraper->selectWhere('projects');
			$res = array();

			foreach($projects as $project){
				array_push($res, $this->getRequirements($project->id));
			}
			return $res;
		}

		public function getRequirementDetails($id){
			$res = $this->databaseWraper->selectWhere('requirements',array('id'=>$id));
			$res = $res[0];
			$res_obj['id'] = $res->id;
			$res_obj['name'] = $res->name;
			$res_obj['description'] = $res->description;
			$res_obj['type'] = $res->type;
			$res_obj['priority'] = $res->priority;

			$res2 = $this->databaseWraper->selectWhere('requirementgroup',array('id'=>$res->rgid));
			$res2 = $res2[0];
			$res_obj['parentid'] = $res2->id;
			$res_obj['parentname'] = $res2->name;

			$res3 = $this->databaseWraper->selectWhere('projects',array('id'=>$res2->pid));
			$res3 = $res3[0];
			$res_obj['project_id'] = $res3->id;
			$res_obj['project_name'] = $res3->name;

			return $res_obj;
		}

		public function getRequirementGroupDetails($id){
			$res2 = $this->databaseWraper->selectWhere('requirementgroup',array('id'=>$id));
			$res2 = $res2[0];
			$res_obj["id"] = $res2->id;
			$res_obj["name"] = $res2->name;

			$res3 = $this->databaseWraper->selectWhere('projects',array('id'=>$res2->pid));
			$res3 = $res3[0];
			$res_obj["project_id"] = $res3->id;
			$res_obj["project_name"] = $res3->name;

			if($res2->parentid==0){
				$res_obj['parentid'] = 0;
				$res_obj['parentname'] = 'none';
				return $res_obj;
			}
			$res = $this->databaseWraper->selectWhere('requirementgroup',array('id'=>$res2->parentid));
			$res = $res[0];
			$res_obj['parentid'] = $res->id;
			$res_obj['parentname'] = $res->name;

			return $res_obj;

		}

		public function getRequirementsPath($type,$id){
			$path = array();
			$path['parent_group_nodes']=array();

			if($type=='rg'){
				$stack = array();
				array_push($stack, $id);

				while(count($stack)>0){
					$parent_id = array_pop($stack);
					$res = $this->databaseWraper->selectWhere('requirementgroup',array('id'=>$parent_id));
					$res = $res[0];

					$path['parent_project_node'] = $res->pid;
					if($res->id != $id)
					array_push($path['parent_group_nodes'] , $res->id);

					if($res->parentid !=0){
						
						array_push($stack, $res->parentid);
					}
				}
			}
			else {
				$stack = array();
				$path['parent_req_id'] = $id;
				$res1 = $this->databaseWraper->selectWhere('requirements',array('id'=>$id));
				$res1 = $res1[0];
				array_push($stack,$res1->rgid);
				while(count($stack)>0){
					$parent_id = array_pop($stack);
					$res = $this->databaseWraper->selectWhere('requirementgroup',array('id'=>$parent_id));
					$res = $res[0];

					$path['parent_project_node'] = $res->pid;
					array_push($path['parent_group_nodes'], $res->id);

					if($res->parentid !=0){
						array_push($stack, $res->parentid);
					}


				}
			}

			return $path;
			

		}


		public function getRequirements($project_id){

			$req_group = $this->databaseWraper->selectWhere('requirementgroup',array('pid'=>$project_id,'parentid'=>'0'));
			$result = array();
			foreach($req_group as $req){

				$res=array();

				$res['current_node'] = $req;
				$direct_child = $this->databaseWraper->selectWhere('requirements',array('rgid'=>$req->id));
				$res['direct_child'] = $direct_child;
				$child_group_req = $this->databaseWraper->selectWhere('requirementgroup',array('pid'=>$project_id,'parentid'=>$req->id));
				$res['child_group'] = array();

				$ref['child_group'+$req->id] = &$res['child_group'];

				$stack = array();
				foreach($child_group_req as $ch_req) array_push($stack, $ch_req);

				while(count($stack)>0){
					$cur_req = array_pop($stack);

					$inner_val = array();

					$inner_val['current_node'] = $cur_req;
					$direct_child = $this->databaseWraper->selectWhere('requirements',array('rgid'=>$cur_req->id));
					$inner_val['direct_child'] = $direct_child;
					$child_group_req = $this->databaseWraper->selectWhere('requirementgroup',array('pid'=>$project_id,'parentid'=>$cur_req->id));
					$inner_val['child_group']= array();

					$ref['child_group'+$cur_req->id] = &$inner_val['child_group'];
					foreach($child_group_req as $ch_req) array_push($stack, $ch_req);

					array_push($ref['child_group'+$cur_req->parentid],$inner_val);

				}

				array_push($result,$res);

			}

			$pro = $this->databaseWraper->selectWhere('projects',array('id'=>$project_id));

			$res_array['project_name'] = $pro[0]->name;
			$res_array['project_id'] = $project_id;
			$res_array['project_requirements'] = $result;

			return $res_array;

		}
	}
?>
