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
 }
?>