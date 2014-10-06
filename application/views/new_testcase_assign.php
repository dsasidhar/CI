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

    <!--new project start-->
    <?php include_once('new_testcase_assign_content.php'); ?>
    <!--new project end-->

    <!--right sidebar start-->
    <?php include_once('/right_sidebar.php'); ?>
    <!--right sidebar end-->

    <!--footer start-->
    <?php include_once('/footer.php'); ?>
    <!--footer end-->

  </section>

<?php include_once('/script_includes.php'); ?>

<script type="text/javascript">
    $('#requirements').SumoSelect();
    $('#testcases').SumoSelect();
    $('#project').SumoSelect();
    $('#assignedto').SumoSelect();
    $('#requirements')[0].sumo.disabled=true;

    $(document).ready(function(){
        $('body').on('change','#project',function(){
           var val = $('#project').val();
           $.get("<?=site_url('dashboard/getRequirementList')?>"+"/"+val,function(data){
                if(data.length==0) $('#requirements')[0].sumo.disabled=true;
                else $('#requirements')[0].sumo.disabled=false;
                var len = $('#requirements')[0].length;
                for(var i=len-1;i>=0;i--) $('#requirements')[0].sumo.remove(i);
                data.forEach(function(entry){
                    $('#requirements')[0].sumo.add(entry["id"],entry["name"]);
                });
           });
        });

        $('#testcaseAssign').on('submit',function(e){
            $('#requirements_').val($('#requirements').val().join(","));
            $('#testcases_').val($('#testcases').val().join(","));
            $('#assignedto_').val($('#assignedto').val().join(","));
            

        });
    });
</script>

</body>

</html>
