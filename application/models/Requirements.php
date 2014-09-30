<?php
	class Requirements extends CI_Model {

		public function __construct(){
			parent::__construct();
			$this->load->model('databaseWraper');
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

			return $result;

		}
	}
?>
