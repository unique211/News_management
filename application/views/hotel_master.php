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
                <li class="active">Hotel Master</li>

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
                                <h3 class="panel-title">Hotel Master</h3>

                                <ul class="panel-controls">

                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Hotel</button></li>
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
                <!--NEWS SECTION END-->

                <!-- strat notification -->
                <div class="row  formhideshow" style="display:none">
                    <div class="col-md-12 col-sm-12 col-xs-12 right_side">
                        <!-- START SIMPLE DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add Hotel Form</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
                                        Hotel</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                        <div style="margin-top:-15px;border-bottom:2px solid;width:100%;">
                                            <b>Hotel Details</b>
                                        </div><br>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"> Hotel Name*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" placeholder="Hotel Name"
                                                    class="form-control input-sm placeholdesize" id="hotel_name"
                                                    name="hotel_name" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"> Mobile Number 1*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" placeholder="Mobile Number 1"
                                                    class="form-control input-sm placeholdesize" id="mobile_1"
                                                    name="mobile_1" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"> Mobile Number 2</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" placeholder="Mobile Number 2"
                                                    class="form-control input-sm placeholdesize" id="mobile_2"
                                                    name="mobile_2">
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Address*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <textarea class="form-control input-sm placeholdesize" name="address"
                                                    id="address" placeholder="Address" style="resize: none"
                                                    required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"> GSTIN Number*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" placeholder="GSTIN Number"
                                                    class="form-control input-sm placeholdesize" id="gst_no"
                                                    name="gst_no" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label">Special Note</label>
                                            </div>
                                            <div class="col-md-3">
                                                <textarea class="form-control input-sm placeholdesize" name="spcl_note"
                                                    id="spcl_note" placeholder="Special Note" style="resize: none"
                                                    ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label">Logo*</label>
                                            </div>
                                            <div class="col-md-3">
											<input	class="form-control input-sm " type="file" id="attachment" name="attachment" required>
                                <input type="hidden" id="file_attachother" value="">
											<div id="msg"></div>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="control-label"> Printer*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="printer" id="printer"
                                                    class="form-control input-sm placeholdesize" required>
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Thermal">Thermal</option>
                                                    <option value="Normal">Normal</option>
                                                </select>
                                            </div>
										</div>
										<div class="form-group">
                                            <div class="col-md-1">
                                                <label class="control-label">Validation</label>
                                            </div>
                                           
                                            <div class="col-md-2">
                                                <label class="control-label"> From*</label>
                                            </div>
                                            <div class="col-md-3">
											<div class="input-group date " data-provide="datepicker" required>
                                                                      <input type="text" class="form-control input-sm placeholdesize date1" id="from" autocomplete="off" name="from" required>
                                                                      <div class="input-group-addon">
                                                                           <span class="fa fa-calendar"></span>
                                                                      </div>
                                                                 </div>
											</div>
											<div class="col-md-3">
                                                <label class="control-label"> To*</label>
                                            </div>
                                            <div class="col-md-3">
											<div class="input-group date " data-provide="datepicker" required>
                                                                      <input type="text" class="form-control input-sm placeholdesize date1" id="to" autocomplete="off" name="to" required>
                                                                      <div class="input-group-addon">
                                                                           <span class="fa fa-calendar"></span>
                                                                      </div>
                                                                 </div>
                                            </div>
                                        </div>


                                        <br>
                                        <div style="margin-top:-15px;border-bottom:2px solid;width:100%;">
                                            <b>Login Details</b>
                                        </div><br>
                                        <div class="form-group">


                                            <div class="col-md-2">
                                                <label class="control-label"> User Id*</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="text" placeholder="User Id"
                                                    class="form-control input-sm placeholdesize" id="user_id"
                                                    name="user_id" required>
                                                <div class='validation2' style='color:red;margin-bottom: 20px;'></div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label"> Password*</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="password" placeholder="Password"
                                                    class="form-control input-sm placeholdesize" id="psw" name="psw"
                                                    required>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label"> Confirm Password*</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="password" placeholder="Confirm Password"
                                                    class="form-control input-sm placeholdesize" id="cpsw" name="cpsw"
                                                    required>
                                                <div class='validation' style='color:red;margin-bottom: 20px;'>
                                                </div>
                                            </div>

                                            <div class="btn-group pull-right">
                                                <input type="hidden" id="save_update" value="">
                                                <input class="btn btn-primary" type="submit" value="Save">
                                            </div>
                                        </div>
                                    </form>
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
      <script src="<?php echo base_url(); ?>assets/js/AjaxFileUpload.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/myjs/hotel_master.js"></script>

</body>

</html>
