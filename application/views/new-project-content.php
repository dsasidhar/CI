<section id="main-content">
	<section class="wrapper">
		<div class="mail-box">
			<aside class="lg-side">
				<div class="inbox-head">
					<h3>Add Project</h3>
				</div>
				<div class="inbox-body">
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
