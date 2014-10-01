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
											<form class="form-horizontal" role="form" id="addversionform">
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="versionname" id="versionname" placeholder="Version Name">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Description</label>
													<div class="col-lg-10">
														<textarea class="form-control" name="versiondescription" placeholder="Version Description"></textarea>
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
											<form class="form-horizontal" role="form" id="addsprintform">
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="sprintname" id="versionname" placeholder="Sprint Name">
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
									Select to Manage
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
