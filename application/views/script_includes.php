
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url(); ?>public/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>public/js/owl.carousel.js" ></script>
    <script src="<?php echo base_url(); ?>public/js/jquery.customSelect.min.js" ></script>
    <script src="<?php echo base_url(); ?>public/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="<?php echo base_url(); ?>public/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url(); ?>public/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="<?php echo base_url(); ?>public/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url(); ?>public/js/easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>public/js/count.js"></script>
    <script src="<?php echo base_url(); ?>public/js/ajax.js"></script>

    <!--jsTree-->
    <script src="<?php echo base_url(); ?>public/js/jstree/jstree.min.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

      $(function () {
        $('#jstree_div').jstree(); 
      });

      function makeAjaxCall(apiToCall,payload,callBack,toEditID){
          var urlToCall = urlMap[apiToCall];
          if(toEditID) urlToCall+= ('/'+toEditID);
          $.post( urlToCall, payload,function(data){
              callBack.call(data);
          });

      }

      var urlMap = {
          'addSprint'     :"<?= site_url('dashboard/save_sprint')?>",
          'editSprint'    :"<?= site_url('dashboard/save_sprint')?>", 
          'addVersion'    :"<?= site_url('dashboard/save_version')?>",
          'editVersion'   :"<?= site_url('dashboard/save_version')?>",
          'editProject'   :"<?= site_url('dashboard/update_project')?>"
      }
      
  </script>