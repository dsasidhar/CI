<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a <?php if(uri_string()=='dashboard') { ?>class="active" <?php }?> href="<?= site_url('dashboard')?>">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard </span>
                      </a>
                  </li>

                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-plus-square-o"></i>
                          <span>Browse Projects</span>
                      </a>
                      <ul class="sub">
						              <li><a  href="<?= site_url('dashboard/view_project')?>">View All Projects</a></li>
                          <li><a <?php if(uri_string()=='dashboard/new_project') { ?>class="active" <?php }?>   href="<?= site_url('dashboard/new_project')?>">Add New Project</a></li>
                          <li><a  href="#">Manage Projects</a></li>
                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Requirements</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Add New Requirements Specification</a></li>
                          <li><a  href="<?= site_url('dashboard/view_project')?>">Manage Requirements Specification For A Project</a></li>
                          <li><a  href="#">Requirements Library</a></li>
                          
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Testing</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="#">Test Plan</a></li>
                          <li><a  href="#">Test Lab</a></li>
                          <li><a  href="#">Test Runs</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-envelope"></i>
                          <span>Mail</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="inbox.html">Inbox</a></li>
                          <li><a  href="inbox_details.html">Inbox Details</a></li>
                      </ul>
                  </li>
				  
                  <li>
                      <a href="sample_calender.html" >
                          <i class=" fa fa-envelope"></i>
                          <span>Demo For Sprint Assigning</span>
                      </a>
                     
                  </li>
                  
                 <!-- 
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-comments-o"></i>
                          <span>Chat Room</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="lobby.html">Lobby</a></li>
                          <li><a  href="chat_room.html"> Chat Room</a></li>
                      </ul>
                  </li>
                  -->
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->