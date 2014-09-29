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
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="versionname" id="versionname" placeholder="Version Name">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Description</label>
													<div class="col-lg-10">
														<textarea class="form-control" id="versiondescription" placeholder="Version Description"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Release ID</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" id="versionreleaseid" placeholder="Release ID">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Start Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="versionstartdate" placeholder="Start Date">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">End Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="versionenddate" placeholder="End Date">
													</div>
												</div>

												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button type="submit" class="btn btn-send">Add Version</button>
													</div>
												</div>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
							<div class="modal fade" id="editVersion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Edit Version</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="versionname" id="versionname" placeholder="Version Name">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Description</label>
													<div class="col-lg-10">
														<textarea class="form-control" id="versiondescription" placeholder="Version Description"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Release ID</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" id="versionreleaseid" placeholder="Release ID">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Start Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="versionstartdate" placeholder="Start Date">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">End Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="versionenddate" placeholder="End Date">
													</div>
												</div>

												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button type="submit" class="btn btn-send">Edit Version</button>
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
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="sprintname" id="versionname" placeholder="Sprint Name">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Description</label>
													<div class="col-lg-10">
														<textarea class="form-control" id="sprintdescription" placeholder="Sprint Description"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Start Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="sprintstartdate" placeholder="Start Date">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">End Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="sprintenddate" placeholder="End Date">
													</div>
												</div>

												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button type="submit" class="btn btn-send">Add Sprint</button>
													</div>
												</div>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->
							<div class="modal fade" id="editSprint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Edit Sprint</h4>
										</div>
										<div class="modal-body">
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<label  class="col-lg-2 control-label">Name</label>
													<div class="col-lg-10">
														<input type="text" class="form-control" name="sprintname" id="versionname" placeholder="Sprint Name">
													</div>
												</div>
												<div class="form-group">
													<label  class="col-lg-2 control-label">Description</label>
													<div class="col-lg-10">
														<textarea class="form-control" id="sprintdescription" placeholder="Sprint Description"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">Start Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="sprintstartdate" placeholder="Start Date">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label">End Date</label>
													<div class="col-lg-10">
														<input type="date" class="form-control" name="sprintenddate" placeholder="End Date">
													</div>
												</div>

												<div class="form-group">
													<div class="col-lg-offset-2 col-lg-10">
														<button type="submit" class="btn btn-send">Edit Sprint</button>
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
								<?php 
								foreach($projects as $project){ ?>
								<li data-id="<?= $project["project"]->id ?>">
									<?= $project["project"]->name ?>
									<?php 
									foreach($project["version"] as $version){ ?>
									<li data-id="<?= $version->id ?>" data-pid="<?= $project["project"]->id ?>">?= $version->name ?></li>
									<?php } ?>

									<?php 
									foreach($project["sprint"] as $sprint){ ?>
									<li>?= $sprint->name ?></li>
									<?php } ?>

								</li>
								<?php } ?>
							</ul>
						</div>
					</aside>
					<aside class="lg-side">
						<div class="inbox-head">
							<h3>View Project</h3>
						</div>
						<div class="inbox-body" id="edit-content">
							<form role="form" action="<?= site_url('dashboard/save_view_project')?>">
								<div class="row">
									<div class="form-group col-md-6">
										<!--<label for="">Project Name</label>-->
										<input type="text" class="form-control" name="projectname" placeholder="Project Name">
									</div>
									<div class="form-group col-md-6">
										<!--<label for="">Start Date</label>-->
										<input type="date" class="form-control" name="startdate" placeholder="Start Date">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<!--<label for="">Project Name</label>-->
										<input type="text" class="form-control" name="releaseid" placeholder="Project Release ID">
									</div>
									<div class="form-group col-md-6">
										<!--<label for="">Project Description</label>-->
										<input type="date" class="form-control" name="enddate" placeholder="End Date">
									</div>
								</div>
								<div class="form-group">
									<!--<label for="">Project Description</label>-->
									<textarea class="form-control" rows="4" name="projectdescription" placeholder="Project Name"></textarea>
								</div>
								<button class="btn btn-lg btn-primary btn-block" type="submit">Add Project</button>
							</form>
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
</body>
</html>
