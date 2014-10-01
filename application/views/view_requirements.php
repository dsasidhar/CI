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
									<p style="background-color: #a9d86e;color: #fff;">Req. Group</p>
									<a class="btn" data-toggle="modal" href="#addVersion"><span class="glyphicon glyphicon-plus"></a>
									<a class="btn" data-toggle="modal" href="#removeVersion"><span class="glyphicon glyphicon-remove"></a>
								</div>

								<div class="col-md-6" style="text-align:center;background-color: #fff;padding:0px;">
									<p style="background-color: #998866;color: #fff;">Requirement</p>
									<a class="btn" data-toggle="modal" href="#addSprint"><span class="glyphicon glyphicon-plus"></a>
									<a class="btn" data-toggle="modal" href="#removeSprint"><span class="glyphicon glyphicon-remove"></a>
								</div>
							</div>
							<div class="modal fade" id="addVersion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Add Requirement Group</h4>
										</div>
										<div class="modal-body">
											<form role="form" id="group" method="post" action="<?= site_url('dashboard/save_new_project')?>">
												<div class="form-group">
													<select name="parent" class="form-control"  id="parentid" disabled>
														<option value="default">Select Project</option>
													</select>
												</div>
												<div class="form-group">
													<select name="parent" class="form-control"  id="parentid" disabled>
														<option value="default">Select Parent</option>
														<option value="null">None</option>
														<option value="id">ReguirementGroup-Subgroup-subgroup-etc</option>
													</select>
												</div> 
												<div class="form-group">
													<input type="text" class="form-control" name="requirementname" placeholder="Requirement Group Name">
												</div>												                      
												<button class="btn btn-lg btn-primary btn-block" type="submit">Add Requirement Group</button>
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
											<h4 class="modal-title">Remove Requirement Group</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												Are you sure you want to remove Requirement Group?
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
											<h4 class="modal-title">Add Requirement</h4>
										</div>
										<div class="modal-body">
											<form role="form" id="individual" method="post" action="<?= site_url('dashboard/save_new_project')?>">
												<div class="form-group">
													<select name="parent" class="form-control"  id="parentid" disabled>
														<option value="default">Select Project</option>
													</select>
												</div>
												<div class="form-group">
													<select name="parent" class="form-control"  id="parentid" disabled>
														<option value="default">Select Parent</option>
														<option value="null">None</option>
														<option value="id">ReguirementGroup-Subgroup-subgroup-etc</option>
													</select>
												</div> 
												<div class="form-group">
													<div class="form-group">
														<input type="text" class="form-control" name="requirementname" placeholder="Requirement Name">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<select name="type" class="form-control"  id="type">
															<option value="default">Select Type</option>
															<option value="functional">Functional</option>
															<option value="nonfunctional">Non-Functional</option>
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
													<textarea class="form-control" rows="4" name="requirementdescription" placeholder="Requirement Description"></textarea>
												</div>
												<button class="btn btn-lg btn-primary btn-block" type="submit">Add Requirement</button>
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
						<div id="jstree_div">
							<ul>
								<?php foreach($project_requirements as $project){ ?>
								<li id="<?= $project["project_id"] ?>">
									<?= $project["project_name"] ?>
									<ul>
										<?php foreach($project['project_requirements'] as $requirements) {?>
										<li> <?= $requirements['current_node']->name;?>									
											<?= printProjectRequirements($requirements);?>
										</li>
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
								<h3>Manage Requirements</h3>
							</div>
							<div class="inbox-body" id="edit-content" style="min-height:400px;">
								<div class="alert alert-info" role="alert" style=" maring:auto; margin-top:100px; width:50%;">
									Select to Manage Requirements
								</div>
							</div>
						</div>
						<div id="Edit Requirements">
							<div class="inbox-head">
								<h3>Edit Requirements</h3>
							</div>
							<div class="inbox-body" id="edit-content" style="min-height:400px;">
								<div class="form-group">
									<div class="form-group">
										<input type="text" class="form-control" name="requirementname" placeholder="Requirement Name">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<select name="type" class="form-control"  id="type">
											<option value="default">Select Type</option>
											<option value="functional">Functional</option>
											<option value="nonfunctional">Non-Functional</option>
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
									<textarea class="form-control" rows="4" name="requirementdescription" placeholder="Requirement Description"></textarea>
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

	var projectData = <?= json_encode($projects); ?>;

	$("#addversionbtn").click(function(){
		var id = $("#jstree_div").jstree("get_selected")[0];
		return false;
	});

	$("#editversionbtn").click(function(){
		var id = $("#jstree_div").jstree("get_selected")[0];
		return false;
	});

	$("#addsprintbtn").click(function(){
		var id = $("#jstree_div").jstree("get_selected")[0];
		return false;
	});

	$("#editsprintbtn").click(function(){
		var id = $("#jstree_div").jstree("get_selected")[0];
		return false;
	});
	</script>
</body>
</html>



<?php
function printProjectRequirements($requirements){
	$str = '';
	$str.='<ul>';
	foreach($requirements['direct_child'] as $dc){
		$str.= '<li>'.$dc->name.'</li>';
	}
	foreach($requirements['child_group'] as $cg){
		$str.= '<li>'.$cg['current_node']->name.printProjectRequirements($cg).'</li>';
	}
	$str.='</ul>';

	return $str;
}
?>
