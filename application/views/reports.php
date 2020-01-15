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
                <li class="active">Reports</li>
            </ul>
            <!-- END BREADCRUMB -->
            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <!--NEWS SECTION-->
                <div class="row tablehideshow">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="section_header"><span class="fa fa-file"> Reports</span></div>
                                <!-- <ul class="panel-controls">
                                             <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;"> Add Detail</button></li>
                                        </ul> -->
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12 ">
                                    <div class="row">
                                        <form class="form-horizontal" id="master_form" name="master_form">
                                            <!-- date filter -->
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <label>From Date*</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-group date " data-provide="datepicker"
                                                            required>
                                                            <input type="text"
                                                                class="form-control input-sm placeholdesize date1"
                                                                id="from_date" autocomplete="off" name="from_date">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>To Date*</label>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="input-group date " data-provide="datepicker"
                                                            required>
                                                            <input type="text"
                                                                class="form-control input-sm placeholdesize date1"
                                                                id="to_date" autocomplete="off" name="to_date">
                                                            <div class="input-group-addon">
                                                                <span class="fa fa-calendar"></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--type  -->
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <label>Type</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select id="type" class="form-control " name="type">
                                                            <option value="0">All</option>
                                                            <option value="1">News</option>
                                                            <option value="2">Advertisement</option>
                                                        </select>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- impact -->
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-3">
                                                        <label>Impact of news</label>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <select id="impact" class="form-control " name="impact">
                                                            <option value="0">All</option>
                                                            <option value="1">Positive</option>
                                                            <option value="2">Negative</option>
                                                        </select>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="btn-group pull-right">
                                                    <input type="hidden" id="save_update" value="">
                                                    <button class="btn btn-primary" type="submit">Search</button>
                                        </form>
								<button class="btn btn-info " id="reset">Reset</button>
								<br>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
						   <br>
                                <div class="table-responsive" id="show_master">
                                    <table class="table">
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>News Date</th>
                                            <th>Code</th>
                                            <th>News Paper Name</th>
                                            <th>Type</th>
                                            <th>Impact of News</th>
                                            <th>News Heading</th>
                                            <th>News Size</th>
                                            <th>View Image</th>

                                        </tr>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- END SIMPLE DATATABLE -->
            </div>
        </div>
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
    <script type="text/javascript">
    var base_url = "<?php print base_url(); ?>";
    </script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/myjs/birth_death.js"></script> -->
    <!--fileupload Files -->
    <script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/myjs/Creport.js' ?>"></script>
    <script type="text/javascript">
    $('.clockpicker').clockpicker();
    </script>
    <script>
    $('.date').datepicker({
        'setDate': 'today',
        'todayHighlight': true,
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
    var date = new Date();
    date = date.toString('dd/MM/yyyy');
    $(".date1").val(date);
    //  $("#fdate").val(date);
    </script>
</body>

</html>
