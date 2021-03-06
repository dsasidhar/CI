<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once('/head_includes.php'); ?>
	<script type="text/javascript">
	var data =  <?= json_encode ($projects); ?> 
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
							<div class="row" style="margin:0px;">
								<div class="col-md-6" style="text-align:center;background-color: #fff;padding:0px;">
									<p style="background-color: #a9d86e;color: #fff;">Version</p>
									<a class="btn" data-toggle="modal" href="#addVersion"><span class="glyphicon glyphicon-plus"></a>
									<a class="btn" data-toggle="modal" href="#removeVersion"><span class="glyphicon glyphicon-remove"></a>
								</div>

								<div class="col-md-6" style="text-align:center;background-color: #fff;padding:0px;">
									<p style="background-color: #998866;color: #fff;">Sprints</p>
									<a class="btn" data-toggle="modal" href="#addSprint"><span class="glyphicon glyphicon-plus"></a>
									<a class="btn" data-toggle="modal" href="#removeSprint"><span class="glyphicon glyphicon-remove"></a>
								</div>
							</div>
							<div class="modal fade" id="addVersion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Add Version</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form" id="addversionform">												
												<div id="addversionfailure" class="alert alert-danger" role="alert">Add Version unsuccesful</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="versionname" id="versionname" placeholder="Version Name">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Description</label>
													<div class="col-lg-10">
														<textarea class="form-control" name="versiondescription" id="versiondescription" placeholder="Version Description"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Release ID</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="versionreleaseid" placeholder="Release ID">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Start Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" id="versionstartdate" name="startdate" placeholder="Start Date">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">End Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" id="versionenddate" name="enddate" placeholder="End Date">
													</div>
												</div>

												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button type="button" class="btn btn-send" id="addversionbtn">Add Version</button>
													</div>
												</div>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->							
							<div class="modal fade" id="removeVersion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Remove Version</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												Are you sure you want to remove Version?
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
							<div class="modal fade" id="addSprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Add Sprint</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form" id="addsprintform">												
												<div id="addsprintfailure" class="alert alert-danger" role="alert">Add Sprint unsuccesful</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="sprintname" id="sprintname" placeholder="Sprint Name">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Description</label>
													<div class="col-lg-10">
														<textarea class="form-control" name="sprintdescription" placeholder="Sprint Description"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Start Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="startdate" placeholder="Start Date">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">End Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="enddate" placeholder="End Date">
													</div>
												</div>

												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button type="button" class="btn btn-send" id="addsprintbtn">Add Sprint</button>
													</div>
												</div>
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
											<h4 class="modal-title">Remove Sprint</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												Are you sure you want to remove Sprint?
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
						<div id="jstree_div">
							<ul>
								<?php foreach($projects as $project){ ?>
								<li id="<?= $project["project"]->id ?>">
									<?= $project["project"]->name ?>									
									<ul>
										<?php foreach($project["version"] as $version){ ?>
										<li id="<?= $version->id."_". $project["project"]->id."_v" ?>"><?= $version->name ?></li>
										<?php } ?>
									</ul>
									<ul>
										<?php foreach($project["sprint"] as $sprint){ ?>
										<li id="<?= $sprint->id."_". $project["project"]->id."_s" ?>"><?= $sprint->name ?></li>
										<?php } ?>
									</ul>
								</li>
								<?php } ?>
							</ul>
						</div>
					</aside>
					<aside class="lg-side">
						<div id="message">
							<div class="inbox-head">
								<h3>Manage Project</h3>
							</div>
							<div class="inbox-body" id="edit-content" style="min-height:400px;">
								<div class="alert alert-info" role="alert" style=" maring:auto; margin-top:100px; width:50%;">
									Select Project/Versions/Sprint to manage
								</div>
							</div>
						</div>
						<div id="editproject" style="min-height:400px;">
							<div class="inbox-head">
								<h3>Edit Project</h3>
							</div>
							<div class="inbox-body" id="edit-content">
								<form role="form" id="editprojectform">
									<div id="editprojectfailure" class="alert alert-danger" role="alert">Edit project unsuccesful</div>
									<div class="row">
										<div class="form-group col-md-6">
											<!--<label for="">Project Name</label>-->
											<input type="text" class="form-control" name="projectname" id="projectname" placeholder="Project Name">
										</div>
										<div class="form-group col-md-6">
											<!--<label for="">Start Date</label>-->
											<input type="date" class="form-control" name="startdate" id="startdate" placeholder="Start Date">
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<!--<label for="">Project Name</label>-->
											<input type="text" class="form-control" name="releaseid" id="releaseid" placeholder="Project Release ID">
										</div>
										<div class="form-group col-md-6">
											<!--<label for="">Project Description</label>-->
											<input type="date" class="form-control" name="enddate" id="enddate" placeholder="End Date">
										</div>
									</div>
									<div class="form-group">
										<!--<label for="">Project Description</label>-->
										<textarea class="form-control" rows="4" name="projectdescription" id="projectdescription" placeholder="Project Description"></textarea>
									</div>
									<button class="btn btn-lg btn-primary btn-block" type="button" id="editprojectbtn">Edit Project</button>
								</form>
							</div>
						</div>
						<div id="editsprint" style="min-height:400px;">
							<div class="inbox-head">
								<h3>Edit Sprint</h3>
							</div>
							<div class="inbox-body" id="edit-content">
								<form role="form" id="editsprintform">
									<div id="editsprintfailure" class="alert alert-danger" role="alert">Add Sprint unsuccesful</div>
									<div class="form-group">
										<label  class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="sprintname" id="sprintname" placeholder="Sprint Name">
										</div>
									</div>
									<div class="form-group">
										<label  class="col-lg-2 control-label">Description</label>
										<div class="col-lg-10">
											<textarea class="form-control" name="sprintdescription" id="sprintdescription" placeholder="Sprint Description"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Start Date</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" name="startdate" id="sprintstartdate" placeholder="Start Date">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">End Date</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" name="enddate" id="sprintenddate" placeholder="End Date">
										</div>
									</div>

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="button" class="btn btn-send" id="editsprintbtn">Edit Sprint</button>
										</div>
									</div>							
								</form>
							</div>
						</div>
						<div id="editversion" style="min-height:400px;">
							<div class="inbox-head">
								<h3>Edit Version</h3>
							</div>
							<div class="inbox-body" id="edit-content">
								<form role="form" id="editversionform">
									<div id="editsprintfailure" class="alert alert-danger" role="alert">Edit Version unsuccesful</div>
									<input type="hidden" id="vid" name="id">
									<div class="form-group">
										<label  class="col-lg-2 control-label">Name</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="versionname" id="versionname" placeholder="Version Name">
										</div>
									</div>
									<div class="form-group">
										<label  class="col-lg-2 control-label">Description</label>
										<div class="col-lg-10">
											<textarea class="form-control" name="versiondescription" id="versiondescriptionedit" placeholder="Version Description"></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Release ID</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" name="versionreleaseid" id="versionreleaseid" placeholder="Release ID">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">Start Date</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" name="startdate" id="versionstartdateedit" placeholder="Start Date">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">End Date</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" name="enddate" id="versionstartdateedit" placeholder="End Date">
										</div>
									</div>

									<div class="form-group">
										<div class="col-lg-offset-2 col-lg-10">
											<button type="button" class="btn btn-send" id="editversionbtn">Edit Version</button>
										</div>
									</div>									
								</form>
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

	var projectData = <?= json_encode($projects); ?>;
	console.log(typeof data);
	console.log(data.length);

	$("#editproject").hide();
	$("#editsprint").hide();
	$("#editversion").hide();

	$("#jstree_div").on("select_node.jstree",function(evt,data){

		$("#editproject").hide();
		$("#editsprint").hide();
		$("#editversion").hide();
		$("#message").hide();
		if(data.node["id"].indexOf("_")==-1){
			$("#editproject").show();		
			var id = data.node["id"];
			for(var i=0; i<projectData.length; i++){
				if(projectData[i]["project"]["id"] == id){
					console.log(projectData[i]["project"]);
					$("#editproject #projectname").val(projectData[i]["project"]["name"]);
					$("#editproject #startdate").val(projectData[i]["project"]["startdate"].split(" ")[0]);
					$("#editproject #enddate").val(projectData[i]["project"]["enddate"].split(" ")[0]);
					$("#editproject #releaseid").val(projectData[i]["project"]["releaseid"]);
					$("#editproject #projectdescription").val(projectData[i]["project"]["description"]);
				}
			}
		}
		else if(data.node["id"].indexOf("v")!=-1){
			$("#editversion").show();
			var ids = data.node["id"].split("_");
			var id  = ids[0];
			var pid = ids[1];
			var found = 0;
			for(var i=0; i<projectData.length; i++){
				if(projectData[i]["project"]["id"] == pid){
					for(var j=0; j<projectData[i]["version"].length; i++){
						if(projectData[i]["version"][j]["id"] == id){
							console.log(projectData[i]["version"][j])
							var found = 1;
							$("#editversion #versionname").val(projectData[i]["version"][j]["name"]);
							$("#editversion #versionstartdateedit").val(projectData[i]["version"][j]["startdate"].split(" ")[0]);
							$("#editversion #versionenddateedit").val(projectData[i]["version"][j]["enddate"].split(" ")[0]);
							$("#editversion #versionreleaseid").val(projectData[i]["version"][j]["releaseId"]);
							$("#editversion #versiondescriptionedit").val(projectData[i]["version"][j]["description"]);		
							break;
						}
					}
					if(found==1){
						break;
					}			
				}
			}

		}
		else if(data.node["id"].indexOf("s")!=-1){
			console.log("yes")
			$("#editsprint").show();
			var ids = data.node["id"].split("_");
			var id  = ids[0];
			var pid = ids[1];
			for(var i=0; i<projectData.length; i++){
				if(projectData[i]["project"]["id"] == pid){
					for(var j=0; j<projectData[i]["sprint"].length; i++){
						if(projectData[i]["sprint"][j]["id"] == id){
							console.log(projectData[i]["sprint"][j])
							var found = 1;
							$("#editsprint #sprintname").val(projectData[i]["sprint"][j]["name"]);
							$("#editsprint #sprintstartdate").val(projectData[i]["sprint"][j]["startdate"].split(" ")[0]);
							$("#editsprint #sprintenddate").val(projectData[i]["sprint"][j]["enddate"].split(" ")[0]);
							$("#editsprint #sprintdescription").val(projectData[i]["sprint"][j]["description"]);		
							break;
						}
					}
					if(found==1){
						break;
					}
				}
			}
		}
	});
$("#addversionfailure").hide();
$("#addsprintfailure").hide();
$("#editsprintfailure").hide();
$("#editprojectfailure").hide();
$("#editversionfailure").hide();

$("#addversionbtn").click(function(){
	var select_node = $("#jstree_div").jstree("get_selected")[0];
	if(select_node != undefined){
		if(select_node.indexOf("_")!=-1){
			var ids = select_node.split("_");
			var id  = ids[0];
			var pid = ids[1];
		}
		else{
			var pid = select_node;	
		}
		console.log(pid);
		form_data = $("#addversionform").serialize()+"&pid="+pid;
		console.log(form_data);
		makeAjaxCall("addVersion",form_data,function(data){
			console.log(data);
			$('#addVersion').modal('hide');
			if(data["status"]==1){
				location.reload();
			}
			else{
				$("#addversionfailure").show();
			}
		});
	}
	else{
		alert("Select a Project/Version before you add");
	}
	return false;
});

$("#editversionbtn").click(function(){
	var select_node = $("#jstree_div").jstree("get_selected")[0];
	if(select_node != undefined){
		if(select_node.indexOf("_")!=-1){
			var ids = select_node.split("_");
			var id  = ids[0];
			var pid = ids[1];
		}
		form_data = $("#editversionform").serialize()+"&pid="+pid;
		console.log(form_data)
		makeAjaxCall("editVersion",form_data,function(data){
			console.log(data);
			if(data["status"]==1){
				location.reload();
			}
			else{
				$("#editversionfailure").show();
			}
		},id);
	}
	return false;
});

$("#addsprintbtn").click(function(){
	var select_node = $("#jstree_div").jstree("get_selected")[0];
	if(select_node != undefined){
		if(select_node.indexOf("_")!=-1){
			var ids = select_node.split("_");
			var id  = ids[0];
			var pid = ids[1];
		}
		else{
			var pid = select_node;	
		}
		form_data = $("#addsprintform").serialize()+"&pid="+pid;
		makeAjaxCall("addSprint",form_data,function(data){
			console.log(data);
			$('#addSprint').modal('hide');
			if(data["status"]==1){
				location.reload();
			}
			else{
				$("#addsprintfailure").show();
			}
		});
	}
	else{
		alert("Select a Project/Sprint before you add");
	}
	return false;
});

$("#editsprintbtn").click(function(){
	var select_node = $("#jstree_div").jstree("get_selected")[0];
	if(select_node != undefined){
		if(select_node.indexOf("_")!=-1){
			var ids = select_node.split("_");
			var id  = ids[0];
			var pid = ids[1];
		}
		form_data = $("#editsprintform").serialize()+"&pid="+pid;
		console.log(form_data)
		makeAjaxCall("addSprint",form_data,function(data){
			console.log(data);
			if(data["status"]==1){
				location.reload();
			}
			else{
				$("#editsprintfailure").show();
			}
		},id);
	}
	return false;
});

$("#editprojectbtn").click(function(){
	var select_node = $("#jstree_div").jstree("get_selected")[0];
	if(select_node != undefined){
		var id = select_node;
		form_data = $("#editprojectform").serialize()+"&id="+id;
		console.log(form_data)
		makeAjaxCall("editProject",form_data,function(data){
			console.log(data);
			if(data["status"]==1){
				location.reload();
			}
			else{
				$("#editprojectfailure").show();
			}
		});
	}
	return false;
});

</script>
</body>
</html>
