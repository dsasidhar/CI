<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once('/head_includes.php'); ?>
	<script type="text/javascript">
	var data =  '<?= json_encode ($project_requirements) ?>'; 
	</script>
</head>
<body>
	<section id="container" >

		<!--header start-->
		<?php include_once('/head_toolbar.php'); ?>
		<!--header end-->

		<!--sidebar start-->
		<?php include_once('/sidebar.php'); ?>
		<!--sidebar end-->
		<section id="main-content">
			<section class="wrapper">
				<div class="mail-box">
					<aside class="sm-side">
						<div class="user-head">
							<h3>Projects</h3>
						</div>
						<div>
							<div class="modal fade" id="addReqGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Add TestCase</h4>
										</div>
										<div class="modal-body">
											<form role="form" id="group">
												<div class="form-group">
													<select name="parent" class="form-control"  id="parent_project_id" disabled>
														<option value="default">Select Project</option>
														<?php foreach($project_requirements as $project){ ?>
														<option value="<?= $project['project_id']?>"><?= $project['project_name']?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<input name="parentname" class="form-control" type="text"  id="parentname" disabled/>
													<input name="parent" type="hidden" id="parentid"/>
												</div> 
												<div class="form-group">
													<input type="text" class="form-control" name="requirementname" id="req_group_name" placeholder="Requirement Group Name">
												</div>												                      
												<button class="btn btn-lg btn-primary btn-block" type="button" onclick='addReqGroup()'>Add Requirement Group</button>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->							
							<div class="modal fade" id="removeReqGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Remove Testcase</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												Are you sure you want to remove Test case?
												<br><br>
												<div class="form-group">
													<div class="col-lg-10">
														<button type="submit" class="btn btn-send">Remove</button>
														<button type="submit" class="btn btn-send">Cancel</button>
													</div>
												</div>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
							<div class="modal fade" id="addReq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Add Requirement</h4>
										</div>
										<div class="modal-body">
											<form role="form" id="individual" >
												<div class="form-group">
													<select name="parent" class="form-control"  id="parent_project_id" disabled>
														<option value="default">Select Project</option>
														<?php foreach($project_requirements as $project){ ?>
														<option value="<?= $project['project_id']?>"><?= $project['project_name']?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group">
													<input name="parentname" class="form-control" type="text"  id="parentname" disabled/>
													<input name="parent" type="hidden" id="parentid"/>
												</div> 
												<div class="form-group">
													<div class="form-group">
														<input type="text" class="form-control" name="requirementname" id="req_group_name" placeholder="Requirement Name">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<select name="type" class="form-control"  id="type">
															<option value="default">Select Type</option>
															<option value="1">Functional</option>
															<option value="0">Non-Functional</option>
														</select>
													</div>
													<div class="form-group col-md-6">
														<select name="priority" class="form-control" id="priority">
															<option value="default">Select Priority</option>
															<option value="1">Very High</option>
															<option value="2">High</option>
															<option value="3">Medium</option>
															<option value="4">Low</option>
															<option value="5">Very Low</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<textarea class="form-control" rows="4" id="requirementdescription" name="requirementdescription" placeholder="Requirement Description"></textarea>
												</div>
												<button class="btn btn-lg btn-primary btn-block" onclick="addReq()">Add Requirement</button>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->							
							<div class="modal fade" id="removeSprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Remove Requirement</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												Are you sure you want to remove Requirement?
												<br><br>
												<div class="form-group">
													<div class="col-lg-10">
														<button type="submit" class="btn btn-send">Remove</button>
														<button type="submit" class="btn btn-send">Cancel</button>
													</div>
												</div>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
						</div>
						<div id = "jstree_div_container">
						<div id="jstree_div">
							<?php include_once('/show_requirement_tree.php');?>
							
						</div>
						</div>
						</aside>
						<aside class="lg-side">
							<div id="message">
								<div class="inbox-head">
									<h3>Manage Test cases</h3>
								</div>
								<div class="inbox-body" id="edit-content" style="min-height:400px;">
									<div class="alert alert-info" role="alert" style=" maring:auto; margin-top:100px; width:50%;">
										Select a Requirement to manage associated testcases
									</div>
								</div>
							</div>
							<div id="editreqgroup" style="min-height:400px;display:none;">
								<div class="inbox-head">
									<h3>Edit Requirement Group</h3>
								</div>
								<div class="inbox-body" id="edit-content">
									<form role="form" id="group">
										<div class="form-group">
											<select name="parent" class="form-control"  id="parent_project_id" disabled>
												<option value="default">Select Project</option>
												<?php foreach($project_requirements as $project){ ?>
												<option value="<?= $project['project_id']?>"><?= $project['project_name']?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<input name="parentname" class="form-control" type="text"  id="parentname" disabled/>
											<input name="parent" type="hidden" id="parentid"/>
											<input name="id" type="hidden" id="id"/>
										</div> 
										<div class="form-group">
											<input type="text" class="form-control" name="requirementname" id="req_group_name" placeholder="Requirement Group Name">
										</div>												                      
										<button class="btn btn-lg btn-primary btn-block" type="button" onclick='editReqGroup()'>Edit Requirement Group</button>
									</form>
								</div>
							</div>
							<div id="editreq" style="min-height:400px;display:none">
								<div class="inbox-head">
									<h3>Edit Requirement</h3>
								</div>
								<div class="inbox-body" id="edit-content">
									<form role="form" id="individual" >
										<div class="form-group">
											<select name="parent" class="form-control"  id="parent_project_id" disabled>
												<option value="default">Select Project</option>
												<?php foreach($project_requirements as $project){ ?>
												<option value="<?= $project['project_id']?>"><?= $project['project_name']?></option>
												<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<input name="parentname" class="form-control" type="text"  id="parentname" disabled/>
											<input name="parent" type="hidden" id="parentid"/>
											<input name="id" type="hidden" id="id"/>
										</div> 
										<div class="form-group">
											<div class="form-group">
												<input type="text" class="form-control" name="requirementname" id="req_group_name" placeholder="Requirement Name">
											</div>
										</div>
										<div class="row">
											<div class="form-group col-md-6">
												<select name="type" class="form-control"  id="type">
													<option value="default">Select Type</option>
													<option value="1">Functional</option>
													<option value="0">Non-Functional</option>
												</select>
											</div>
											<div class="form-group col-md-6">
												<select name="priority" class="form-control" id="priority">
													<option value="default">Select Priority</option>
													<option value="1">Very High</option>
													<option value="2">High</option>
													<option value="3">Medium</option>
													<option value="4">Low</option>
													<option value="5">Very Low</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<textarea class="form-control" rows="4" id="requirementdescription" name="requirementdescription" placeholder="Requirement Description"></textarea>
										</div>
										<button class="btn btn-lg btn-primary btn-block" type="button" onclick="editReq()">Edit Requirement</button>
									</form>
								</div>
							</div>
						</div>						
					</aside>
				</div>
			</section>
		</section>
		<!--right sidebar start-->
		<?php include_once('/right_sidebar.php'); ?>
		<!--right sidebar end-->
		<!--footer start-->
		<?php include_once('/footer.php'); ?>
		<!--footer end-->
	</section>
	<?php include_once('/script_includes.php'); ?>
	<script type="text/javascript">

	var projectData = '<?= json_encode($project_requirements) ?>';


	$("#jstree_div").on("select_node.jstree",jstreeEventHandler);
	function jstreeEventHandler(evt,data){
		var res = data.node["id"].split("_");
		// console.log(data.node['id']);
		if(res[0]== 'proj_') parent_id = 0;
		else if(res[0]=='reqChild') parent_id = res[3];
		else parent_id = res[2];

		proj_id = res[1];
		node_name = data.node["id"];

		if(res[0]=='reqGroup'){
			$('#message').hide();
			$('#editreq').hide();
			$('#editreqgroup').show();

			// $.post("<?=site_url('dashboard/getRequirementGroupDetails')?>"+"/"+res[2],function(data){
			// 	$('#editreqgroup select#parent_project_id').val(data["project_id"]);
			// 	$('#editreqgroup #parentname').val(data["parentname"]);
			// 	$('#editreqgroup #parentid').val(data["parentid"]);
			// 	$('#editreqgroup #req_group_name').val(data["name"]);
			// 	$('#editreqgroup #id').val(data["id"]);
				
			// });

		}
		else if(res[0]=='reqChild'){
			$('#message').hide();
			$('#editreqgroup').hide();
			$('#editreq').show();

			$.post("<?=site_url('dashboard/getRequirementDetails')?>"+"/"+res[2],function(data){
				$('#editreq select#parent_project_id').val(data["project_id"]);
				$('#editreq #parentname').val(data["parentname"]);
				$('#editreq #parentid').val(data["parentid"]);
				$('#editreq #req_group_name').val(data["name"]);
				$('#editreq #type').val(data["type"]);
				$('#editreq #priority').val(data["priority"]);
				$('#editreq #requirementdescription').val(data["description"]);
				$('#editreq #id').val(data["id"]);

			});

		}
	}

function addReqGroupPopulate(){
	$('#addReqGroup select#parent_project_id').val(proj_id);
	var name = $('#'+node_name).attr("name");
		// console.log(name);
		$('#addReqGroup #parentname').val(name.split("_").join(" "));
		$('#addReqGroup #parentid').val(parent_id);

	}

	function addReqPopulate(){

		$('#addReq select#parent_project_id').val(proj_id);
		var name = $('#'+node_name).attr("name");
		// console.log(name);
		$('#addReq #parentname').val(name.split("_").join(" "));
		$('#addReq #parentid').val(parent_id);

	}

	function addReqGroup(){
		var postData={};

		postData.parentid = $('#addReqGroup #parentid').val();
		postData.requirementgroupname = $('#addReqGroup #req_group_name').val();
		postData.projectid = $('#addReqGroup select#parent_project_id').val();

		$.post("<?=site_url('dashboard/save_requirement_group')?>",postData,function(data){
			// console.log(data);
			if(data["status"]==1){
				$('addReqGroup').hide();
				$('addReq').hide();
				updateRequirementTree("rg",data["create_id"]);
			}
		});
	}

	function editReqGroup(){
		var postData={};

		postData.parentid = $('#editreqgroup #parentid').val();
		postData.requirementgroupname = $('#editreqgroup #req_group_name').val();
		postData.projectid = $('#editreqgroup select#parent_project_id').val();

		var id = $('#editreqgroup #id').val();

		$.post("<?=site_url('dashboard/save_requirement_group')?>"+"/"+id,postData,function(data){
			// console.log(data);
			if(data["status"]==1){
				$('addReqGroup').hide();
				$('addReq').hide();
				updateRequirementTree("rg",id);
			}
		});
	}

	function updateRequirementTree(type,id){
		$.get("<?=site_url('dashboard/update_requirement_tree')?>"+"/"+type+"/"+id,function(data){
			$("#jstree_div").remove();
			$('#jstree_div_container').html('<div id="jstree_div">'+data+'</div>');
			$('#jstree_div').jstree({"multiple": false});
			$("#jstree_div").on("select_node.jstree",jstreeEventHandler);
			//$.jstree.reference('#jstree_div').refresh(-1);

		});
	}

	function addReq(){

		var postData={};

		postData.rgid = $('#aid').val();
		postData.requirementname = $('#addReq #req_group_name').val();
		postData.requirementdescription = $('#addReq #requirementdescription').val();
		postData.type = $('#addReq #type').val();
		postData.priority = $('#addReq #pri').val();
		

		$.post("<?=site_url('dashboard/save_requirement')?>",postData,function(data){
			// console.log(data);
			if(data["status"]==1){
				updateRequirementTree("r",data["create_id"]);
			}
		});

	}

	function editReq(){

		var postData={};

		postData.rgid = $('#editreq #parentid').val();
		postData.requirementname = $('#editreq #req_group_name').val();
		postData.requirementdescription = $('#editreq #requirementdescription').val();
		postData.type = $('#editreq #type').val();
		postData.priority = $('#editreq #priority').val();
		
		var id = $('#editreq #id').val();

		$.post("<?=site_url('dashboard/save_requirement')?>"+"/"+id,postData,function(data){
			// console.log(data);
			if(data["status"]==1){
				 updateRequirementTree("r",id);
			}
		});

	}



	function getObjects(obj, key, val) {
		var objects = [];
		for (var i in obj) {
			if (!obj.hasOwnProperty(i)) continue;
			if (typeof obj[i] == 'object') {
				objects = objects.concat(getObjects(obj[i], key, val));
			} else if (i == key && obj[key] == val) {
				objects.push(obj);
			}
		}
		return objects;
	}
	
	var proj_id = 0;
	var parent_id = 0;
	var node_name = '';

	</script>
</body>
</html>




