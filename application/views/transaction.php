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
                    <li class="active">Transaction</li>
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
                                       <div class="section_header"><span class="fa fa-exchange"> Transaction Master</span>
                                        <!--<h3 class="panel-title">Transaction Master</h3>-->
                                        <ul class="panel-controls">
                                             <li> <button class="btn btn-success btnhideshow" style="background-color:#33414e;margin-right:10px"><i class="fa fa-plus"></i> Add Detail</button></li>
                                        </ul></div>
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
                                   <!--<h3 class="panel-title">Transaction Master</h3>-->
                                    <div class="section_header"><span class="fa fa-exchange"> Transaction Master</span>
                                        <div class="pull-right">
                                             <button class="btn btn-success closehideshow" style="background-color:#33414e;margin-right:10px"><i class="fa fa-eye"></i> View Detail</button></div>
                                        </div>
                                   </div>
                                   <div class="panel-body">
                                        <div class="row">
                                        <div class="col-lg-6">
                                             <form class="form-horizontal" id="master_form" name="master_form">
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
                                                                 <label>Code*</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                            <input type="text" class="form-control " id="code" name="code" required>
                                                                 
                                                            </div>
                                                            
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
                                                                 <label>Newspaper Name</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                            <select id="newpaper_name"  class="form-control fstdropdown-select"  name="newpaper_name">

                                                            </select>
                                                                 
                                                            </div>
                                                            
                                                       </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
                                                                 <label>Type</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                            <select id="type"  class="form-control "  name="type">
     <option value="1">News</option>
     <option value="2">Advertisement</option>
                                                            </select>
                                                                 
                                                            </div>
                                                            
                                                       </div>
                                                  </div>
                                                  <!-- impact -->
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
                                                                 <label>Impact of news</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                            <select id="impact"  class="form-control "  name="impact">
     <option value="1">Positive</option>
     <option value="2">Negative</option>
                                                            </select>
                                                                 
                                                            </div>
                                                            
                                                       </div>
                                                  </div>
                                                  <!-- news heading -->
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
                                                                 <label>News Heading</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                           <textarea id="heading" class="form-control" name="heading" style="resize: none"></textarea>
                                                                 
                                                            </div>
                                                            
                                                       </div>
                                                  </div>
                                                   <!-- news size -->
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
                                                                 <label>News Size*</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                            <input type="text" class="form-control " id="codesize" name="codesize" required>
                                                                 
                                                            </div>
                                                            
                                                       </div>
                                                  </div>
                                                  <!-- news date -->
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
                                                                 <label>News Date*</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                 <div class="input-group date " data-provide="datepicker" required>
                                                                      <input type="text" class="form-control input-sm placeholdesize date1" id="news_date" autocomplete="off" name="news_date">
                                                                      <div class="input-group-addon">
                                                                           <span class="fa fa-calendar"></span>
                                                                      </div>
                                                                 </div>
                                                            </div>
                                                           
                                                       </div>
                                                  </div>
                                        </div>
                                        <div class="col-lg-6">
                                                  <div class="row">
                                                  <div class="form-group">
                                                       <img id="displayimg" name="displayimg" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" height="300px" width="400px"></img> 
                                                  </div>
                                                  </div>
                                                  <div class="row">
                                                       <div class="form-group">
                                                            <div class="col-sm-6">
												<input	class="" type="file" id="attachment" name="attachment" >
                                <input type="hidden" id="file_attachother" value="">
											<div id="msg"></div>
                                                            </div>
                                                            
                                                            
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
        var base_url = "<?php print base_url(); ?>";
	   </script>
	     <script src="<?php echo base_url() . 'assets/js/AjaxFileUpload.js' ?>"></script>
        <script src="<?php echo base_url(); ?>assets/js/myjs/transaction.js"></script>
     <!--fileupload Files -->
   
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
          date = date.toString('dd/MM/yyyy');
		  $("#news_date").val(date);
		//  $("#to").val(date);
          //  $("#fdate").val(date);
     </script>
</body>
</html>
