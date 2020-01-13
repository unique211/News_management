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
                    <li class="active">Consumer Master</li>
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
                                        <h3 class="panel-title">Consumer Master</h3>
                                        <ul class="panel-controls">
                                             <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;"> Add Detail</button></li>
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
                    <div class="row formhideshow" style="display: none;">
                         <div class="col-md-12 col-sm-12 col-xs-12 right_side" id="form1" >
                              <!-- START SIMPLE DATATABLE -->
                              <div class="panel panel-default">
                                   <div class="panel-heading">
                                   <h3 class="panel-title">Consumer Master</h3>
                                        <div class="pull-right">
                                             <button class="btn btn-success closehideshow" style="background-color:#00B050;">View Detail</button>
                                        </div>
                                   </div>
                                   <div class="panel-body">
                                        <div class="col-lg-12">
                                             <form class="form-horizontal" id="master_form" name="master_form">
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-3">
                                                                 <label>Date*</label>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                 <div class="input-group date " data-provide="datepicker" required>
                                                                      <input type="text" class="form-control input-sm placeholdesize date1" id="salary_date" autocomplete="off" name="salary_date">
                                                                      <div class="input-group-addon">
                                                                           <span class="fa fa-calendar"></span>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                 <label>Salary*</label>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                 <input type="number" id="salary" name="salary" class="form-control" placeholder="Salary" required>
                                                            </div>
                                                       </div>
                                                  </div>
                                        </div>
                                   </div>
                                   <div class="btn-group pull-right">
                                        <input type="hidden" id="save_update" value="">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        </form>
                                        <button class="btn btn-info " id="reset">Reset</button>
                                   </div>
                              </div>
                              <!--panel panel default-->
                              <!-- END SIMPLE DATATABLE -->
                         </div>
                         <!------------------------form1-end------------------------------->
                         <!-------------------------------------------------------------------------------------------------------------------------->
                    </div>
                    <!-- end notification -->
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
          var baseurl = "<?php print base_url(); ?>";
     </script>
     <!-- <script src="<?php echo base_url(); ?>assets/js/myjs/birth_death.js"></script> -->
     <!--fileupload Files -->
     <script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>
     <script type="text/javascript">
          $('.clockpicker').clockpicker();
     </script>
     <script>
          $('.date').datepicker({
               'todayHighlight': true,
               format: 'dd/mm/yyyy',
               autoclose: true,
          });
          var date = new Date();
          date = date.toString('DD/MM/YYYY');
          $(".date").val(date);
          //  $("#fdate").val(date);
     </script>
</body>
</html>