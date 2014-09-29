<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once('/head_includes.php'); ?>
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
						<div id="jstree_div">
							<ul>
								<li>Root node 1
									<ul>
										<li>Child node 1</li>
										<li><a href="#">Child node 2</a></li>
									</ul>
								</li>
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
