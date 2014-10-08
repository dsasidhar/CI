<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Testcase extends CI_MOdel{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('databaseWraper');
 	}

 	public function addTestCase($vars){

 		$data = array(
						'name'=>$vars['testcaseName'],
						'description'=>$vars['testcaseDescription'],
						'expectedinput'=>$vars['expectedInput'],
						'expectedoutput'=>$vars['expectedOutput']);

			$id = $this->databaseWraper->insertInto('testcase',$data);

			return $id;
 	}

 	public function getAllTestcases(){
 		$res = $this->databaseWraper->selectWhere('testcase');
 		return $res;
 	}

 	public function assignTestcase($vars){

 		foreach( explode(",", $vars["rid_list"]) as $rid){

 			foreach(explode(",", $vars["tid_list"]) as $tid){
 				$data = array(
 						'rid'=>$rid,
 						'tid'=>$tid,
 						'assignedto'=>$vars["assignedto_list"]);
 				$id = $this->databaseWraper->insertInto('testcase_rid',$data);

 			}

 		}

		return $id;

 	}

 	public function getTestCases($id){
 		$res = $this->databaseWraper->joiningSelect('testcase_rid','testcase','testcase.id = testcase_rid.tid',array("rid"=>$id));
 		return $res;
 	}

 	public function getTestCaseDetails($rid,$tid){
 		$res = $this->databaseWraper->joiningSelect('testcase_rid','testcase','testcase.id = testcase_rid.tid',array("rid"=>$rid,"tid"=>$tid));
 		return $res[0];
 	}

 	public function updateTestcase($vars){

 		$uid = $this->session->userdata("userid");
 		$data = array(
 						'observedoutput'=>$vars["observedoutput"],
 						'status'=>$vars["status"],
 						'runby'=> $uid);

 		$res = $this->databaseWraper->updateTable('testcase_rid',array("id_rid"=>$vars["id_rid"]),$data);

 		return $res;

 	}

 	public function reportBug($vars){
 		$res = $this->databaseWraper->insertInto('bug',$vars);
 		return $res;
 	}
 }
?>