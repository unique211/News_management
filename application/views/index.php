<?php include('include/header.php');  ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
     <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
<body>
  <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/plugins/d3pie/d3pie.js"></script>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-toggled page-container-wide">

            <!-- START PAGE SIDEBAR -->
            <?php include('include/sidebar.php');  ?>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <?php include('include/topbar.php');  ?>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li class="active">Dashboard </li>
                 
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                  <!--NEWS SECTION-->
                 

                  <!--NEWS SECTION END-->
                   
               
                  </div>

                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <!-- MESSAGE BOX-->
        <?php include('include/message_box.php');  ?>
        <!-- END MESSAGE BOX-->

        <!-- START SCRIPTS -->
        <?php include('include/footer_scripts.php');  ?>
        <!-- END SCRIPTS --> 
     
    </body>
</html> 