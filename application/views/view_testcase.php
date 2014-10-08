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
							<div class="modal fade" id="reportBug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Report Bug</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												
												<div class="form-group row">
													<div class="col-md-10">
														<input class="form-control" type="text" id="bugname" name="bugname" placeholder="Bug Name">
													</div>
												</div>

												<div class="form-group row">
													<div class="col-md-10">
														<textarea class="form-control" id="bugdescription" name="bugdescription" placeholder="Bug Description"></textarea>
													</div>
												</div>
												<div class="form-group row">
													<div class="col-md-10">
														<select id="bugstatus" class="form-control" name="bugstatus">
															<option value="default">Select Status</option>
															<option value="1">Very High</option>
															<option value="2">High</option>
															<option value="3">Medium</option>
															<option value="4">Low</option>
															<option value="5">Very Low</option>
														</select>
													</div>
												</div>
												<br><br>
												<div class="form-group">
													<div class="col-lg-10">
														<button type="button" onclick="reportBug()" class="btn btn-send">Report</button>
														<button type="button" data-dismiss="modal" class="btn btn-send">Cancel</button>
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
						<div id="edittestcasegroup" style="min-height:400px;display:none;">
							<div class="inbox-head">
								<h3>Update TestCase</h3>
							</div>
							<div class="inbox-body" id="edit-content">
								<form role="form" id="group">
									<div class="form-group">
										<select name="testcase_id" class="form-control"  id="testcase_id">
											<option value="default">Select TestCase</option>
										</select>
										<input type="hidden" id="id_rid"/>
									</div>
									<div class="testcase-details">
										<div class="row">
											<div class="form-group col-md-6">
												<textarea class="form-control" disabled="disabled" id="expectedinput" name="expectedinput" placeholder="Expected Input"></textarea>
											</div> 
											<div class="form-group col-md-6">
												<textarea class="form-control" id="expectedoutput" disabled="disabled" name="expectedoutput" placeholder="Expected Output"></textarea>
											</div> 
										</div>
										<div class="row">
											<div class="form-group col-md-6">
												<textarea class="form-control" id="observedoutput" name="observedoutput" placeholder="Observed Output"></textarea>
											</div> 
											<div class="form-group col-md-3">
												<select name="testcase_status" class="form-control" disabled="disabled"  id="testcase_status">
													<option value="-1">Set Status</option>
													<option value="1">Success</option>
													<option value="0"> Failed</option>
												</select>
											</div>
											<div class="col-md-3">
												<a class="btn" data-toggle="modal" href="#reportBug" id="bugreportbtn"><span class="fa fa-minus-square"> Report Bug</a>
											</div>
										</div>
										
										<button class="btn btn-lg btn-primary btn-block" type="button" onclick='updateTestcase()'>Update TestCase</button>
									</div>
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

$('#testcase_id').on('change',function(){
	if($('#testcase_id').val()==0){
		clearInputs();
		return;
	}

	// console.log($('#testcase_id').val());

	var tid = $('#testcase_id').val();
	var rid = req_id;

	$.get("<?=site_url('dashboard/getTestCaseDetails')?>"+"/"+rid+"/"+tid,function(data){
		$('#expectedinput').val(data["expectedinput"]);
		$('#expectedoutput').val(data["expectedoutput"]);
		if(data["observedoutput"]) $('#observedoutput').val(data["observedoutput"]);
		$('#testcase_status').val(data["status"]);
		$('#testcase_status').prop('disabled',false);
		$('#id_rid').val(data["id_rid"]);
	});
});

function clearInputs(){
	$('#expectedinput').val('');
	$('#expectedoutput').val('');
	$('#id_rid').val('');
	$('#testcase_status').prop('disabled','disabled');
}

function reportBug(){
	var postData = {};
	postData.bugname = $('#bugname').val();
	postData.bugdescription = $('#bugdescription').val();
	postData.bugstatus = $('#bugstatus').val();
	postData.testcaseid = $('#id_rid').val();

	$.post("<?=site_url('dashboard/reportBug')?>",postData,function(data){
		if(data["status"]==1){
			$('#reportBug').modal('hide');
			alert("Bug reported successfully")
		}
		else{
			alert("Bug report failed");
		}
	});
}

function updateTestcase(){
	if($('#testcase_id').val()==0){
		alert('Please select a test case and fill the requiered form fields');
		return false;
	}

	var postData = {};
	postData.observedoutput = $('#observedoutput').val();
	postData.id_rid = $('#id_rid').val();
	postData.status = $('#testcase_status').val();
	$.post("<?=site_url('dashboard/updateTestcase')?>",postData,function(data){
		if(data=='1'){
			alert('updated successfully');
		}
		else{
			alert('update failed');
		}
	});


}

$("#jstree_div").on("select_node.jstree",jstreeEventHandler);
function jstreeEventHandler(evt,data){
	var res = data.node["id"].split("_");
	// console.log(data.node['id']);
	if(res[0]== 'proj_') parent_id = 0;
	else if(res[0]=='reqChild') parent_id = res[3];
	else parent_id = res[2];

	proj_id = res[1];
	node_name = data.node["id"];

	$("#bugreportbtn").hide();
	$('#testcase_status').on('change', function() {
		console.log(this.value);
		if(this.value == "0"){
			$("#bugreportbtn").show();
		}
		else{
			$("#bugreportbtn").hide();
		}
	});

	if(res[0]=='reqGroup'){
		$('#message').show();
		$('#edittestcasegroup').hide();
		req_id = 0;
		

	}
	else if(res[0]=='reqChild'){
		$('#message').hide();
		$('#edittestcasegroup').show();
		req_id = res[2];
		$.post("<?=site_url('dashboard/getTestCases')?>"+"/"+res[2],function(data){
			clearInputs();
			$('#testcase_id option').remove();
			if(data.length<1){
				$('#testcase_id').append($('<option>',{
					value : '0',
					text : 'No Test cases to display'
				}));
			}
			else{
				$('#testcase_id').append($('<option>',{
					value : '0',
					text : 'Select a test case'
				}));
			}
			$.each(data, function (i, item) {
				$('#testcase_id').append($('<option>', { 
					value: item.tid,
					text : item.name 
				}));
			});



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


// view_testcase

var req_id = 0;

</script>
</body>
</html>




