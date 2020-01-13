<?php include('include/header.php');  ?>

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
                <li class="active">Table Master</li>

            </ul>
            <!-- END BREADCRUMB -->

            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <!--NEWS SECTION-->


                <!--NEWS SECTION END-->

                <!-- strat notification -->
                <div class="row  ">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Table Form</h3>
                                <div class="pull-right">
                                    <!-- <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
									Table</button> -->
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form-horizontal" id="master_form" name="master_form">

                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"> Table Name*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"> Capacity*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"> Location*</label>
                                            </div>
                                          

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <input type="text" class="form-control input-sm placeholdesize" placeholder="Table Name"
                                                    id="table_name" autocomplete="off" name="table_name" required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control input-sm placeholdesize"placeholder="Capacity"
                                                    id="capacity" autocomplete="off" name="capacity" required>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control input-sm placeholdesize"placeholder="Location"
                                                    id="location" autocomplete="off" name="location" required>
                                            </div>
                                            
                                            <div class="col-md-2">
                                                <input type="hidden" id="save_update" value="">
												<input class="btn btn-primary" type="submit" value="Save">
												<button type="button" class="btn btn-warning" id="reset">Reset</button>
                                            </div>


                                        </div>

                                    </form>
                                </div>

                                <div class="col-lg-12 ">
                                    <div class="table-responsive" id="show_master">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END SIMPLE DATATABLE -->
                </div>
            </div>
            <!-- end notification -->
        </div>
        <!-- end notification -->


    </div>

    <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->


    <!-- END PAGE CONTAINER -->
    <!- - MESSAGE BOX-->
        <?php include('include/message_box.php');  ?>
        <!-- END MESSAGE BOX-->

        <!-- START SCRIPTS -->
        <?php include('include/footer_scripts.php');  ?>
        <!-- END SCRIPTS -->
        <script>
        $('.date').datepicker({
            'todayHighlight': true,
            format: 'dd/mm/yyyy',
            autoclose: true,
        });
        var date = new Date();
        date = date.toString('dd/MM/yyyy');
        $("#from").val(date);
        $("#to").val(date);
        //  $("#fdate").val(date);
        </script>
        <script type="text/javascript">
        var base_url = "<?php print base_url(); ?>";
        </script>
        <script src="<?php echo base_url(); ?>assets/js/myjs/table_master.js"></script>

</body>

</html>
