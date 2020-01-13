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
            <style>
            body {
                padding-top: 0;
                font-size: 12px;
                color: #111927;
                background: #f9f9f9;
                font-family: "Open Sans", sans-serif;
            }

            .bg-danger {
                background-color: #fc8675 !important;
                color: #fff !important;
            }

            .panel-stat3 {
                position: relative;
                overflow: hidden;
                padding: 25px 20px;
                margin-bottom: 20px;
                color: #fff;
                cursor: pointer;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }

            .bg-danger {
                background-color: #f2dede;
            }

            .bg-warning {
                background-color: #f3ce85;
                color: #fff;
            }

            .m-top-none {
                margin-top: 0;
            }

            .padding-md {
                padding: 35px !important;
                margin: 10px;
            }

            .panel-stat3 .stat-icon {
                position: absolute;
                top: 20px;
                right: 10px;
                font-size: 30px;
                opacity: 0.3;
            }

            .fa-3x {
                font-size: 5em;
            }
            </style>
            <!-- END BREADCRUMB -->
            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
              
                <!--NEWS SECTION-->
                <div class="padding-md col-md-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="panel-stat3 bg-danger">
							<h2 class="m-top-none" id="userCount">
                                    <span id="today_news">0</span>/<span id="all_news">0</span>
                                </h2>
                                <h5>News Paper Count</h5>
                                <div class="stat-icon">
                                    <i class="fa fa-newspaper-o fa-3x"></i>
                                </div>
                             
                            </div>
                        </div><!-- /.col -->
                        <div class="col-sm-12 col-md-6">
                            <div class="panel-stat3 bg-info">
                               
                          
							<h2 class="m-top-none" id="userCount">
							<span id="today_transaction">0</span>/<span id="all_transaction">0</span>
                                </h2>
										
                                        <h5>Transaction Count</h5>
                                        <div class="stat-icon">
                                            <i class="fa fa-inr fa-3x"></i>
                                        </div>
                                       
                            </div>
                        </div><!-- /.col -->
                    </div>
                </div>
                <div class="padding-md col-md-12">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <!-- START SIMPLE DATATABLE -->
                            <div class=" panel panel-default">
                                <div class="panel-heading">
                                 
                                  
                                  
                                    <h3 class="panel-title">Transaction Details</h3>
                                  
                                    <ul class="panel-controls">
                                        <li>
                                            <!--<button class="btn btn-success btnhideshow"
                              style="background-color:#00B050;"> Add </button></li> -->
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="col-lg-12 ">
                                        <div class="table-responsive" id="show_master">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END SIMPLE DATATABLE -->
                        </div>

                       


                    </div>
                </div>

                <!--NEWS SECTION END-->
             
                <div class="row">
                </div>
            
            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!- - MESSAGE BOX-->
        <?php include('include/message_box.php');  ?>
        <!-- END MESSAGE BOX-->
        <!-- START SCRIPTS -->
        <?php include('include/footer_scripts.php');  ?>
        <!-- END SCRIPTS -->
      
		  <script type="text/javascript">
    var base_url = "<?php print base_url(); ?>";
    </script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/myjs/birth_death.js"></script> -->
    <!--fileupload Files -->
   <script src="<?php echo base_url() . 'assets/js/myjs/dashboard.js' ?>"></script>
</body>

</html>
