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
    $("#reqtype").change(function(evt){
        $( "#reqtype option:selected" ).each(function() {
          if($( this ).val() == "group"){
            $("#individual").hide();
            $("#group").show(); 
          }
          else if($( this ).val() == "leaf"){
             $("#group").hide(); 
            $("#individual").show();
          }
        });
    })
</script>

</body>

</html>
