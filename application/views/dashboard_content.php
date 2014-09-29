<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
			  <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      <section class="panel">
                          <div class="panel-body">
                              <a href="#" class="task-thumb">
                                  <img src="<?php echo base_url(); ?>public/img/profile-avatar.jpg" width="90" height="83" alt="">
                              </a>
                              <div class="task-thumb-details">
                                  <h1><a href="#"><?= $this->session->userdata("userid"); ?></a></h1>
                                  <p>Senior Tester</p>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                                <tr>
                                    <td>
                                        <i class=" fa fa-tasks"></i>
                                    </td>
                                    <td>New Requirement Created</td>
                                    <td> 04</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-circle"></i>
                                    </td>
                                    <td>Tasks Completed</td>
                                    <td> 14</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </td>
                                    <td>Defects Pending</td>
                                    <td> 2</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class="fa fa-envelope"></i>
                                    </td>
                                    <td>Inbox</td>
                                    <td> 05</td>
                                </tr>
                                <tr>
                                    <td>
                                        <i class=" fa fa-bell-o"></i>
                                    </td>
                                    <td>New Notification</td>
                                    <td> 09</td>
                                </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--user info table end-->
                  </div>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>Work Progress</h1>
                                  <p>RamaKrishna Kumar</p>
                              </div>
                              <div class="task-option">
                                  <select class="styled">
                                      <option>James</option>
                                      <option>Tom</option>
                                      <option>Sami</option>
                                  </select>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <thead>
								<tr><th>S.NO</th><th>Project Name</th><th>Completion (%)</th><th>No. Of Requirements</th><th>No. Of Test Cases</th><th>Current Sprint / Cycle</th></tr>
							  </thead>
							  <tbody>
							  
                              <tr>
                                  <td>1</td>
                                  <td>
                                      Project 1
                                  </td>
                                  <td>
                                      <span class="badge bg-important">75%</span>
                                  </td>
								  <td>
									20
								  </td>
								  <td>
									60
								  </td>
                                  <td>
                                    <div id="work-progress1"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td>
                                      Project 2
                                  </td>
                                  <td>
                                      <span class="badge bg-success">43%</span>
                                  </td>
								  <td>
									15
								  </td>
								  <td>
									50
								  </td>
                                  <td>
                                      <div id="work-progress2"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td>
                                      Project 3
                                  </td>
                                  <td>
                                      <span class="badge bg-info">67%</span>
                                  </td>
								  <td>
									12
								  </td>
								  <td>
									60
								  </td>
                                  <td>
                                      <div id="work-progress3"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>4</td>
                                  <td>
                                      Project 4
                                  </td>
                                  <td>
                                      <span class="badge bg-warning">30%</span>
                                  </td>
								  <td>
									10
								  </td>
								  <td>
									60
								  </td>
                                  <td>
                                      <div id="work-progress4"></div>
                                  </td>
                              </tr>
                              <tr>
                                  <td>5</td>
                                  <td>
                                      Project 5
                                  </td>
								  
                                  <td>
                                      <span class="badge bg-primary">15%</span>
                                  </td>
                                  <td>
									30
								  </td>
								  <td>
									200
								  </td>
								  <td>
                                      <div id="work-progress5"></div>
                                  </td>
                              </tr>
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>
            <!-- Timeline start-->
            <?php include_once('timeline.php') ?>
            <!-- Timeline end-->
              
          </section>
      </section>
      <!--main content end-->