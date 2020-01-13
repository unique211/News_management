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
                <li class="active">Bill Generation</li>

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
                                <h3 class="panel-title">Bill Generation</h3>

                                <ul class="panel-controls">

                                    <li> <button class="btn btn-success btnhideshow" style="background-color:#00B050;">
                                            Add Bill</button></li>
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
                                <h3 class="panel-title">Add Bill Form</h3>
                                <div class="pull-right">
                                    <button class="btn btn-success closehideshow" style="background-color:#00B050;">View
									Bill</button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <form class="form-horizontal" id="master_form" name="master_form">
                                       
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <label class="control-label"> Bill Date*</label>
                                            </div>
                                            <div class="col-md-3">
											<div class="input-group date " data-provide="datepicker" required>
                                                                      <input type="text" class="form-control input-sm placeholdesize date1" id="bill_date" autocomplete="off" name="bill_date" required>
                                                                      <div class="input-group-addon">
                                                                           <span class="fa fa-calendar"></span>
                                                                      </div>
                                                                 </div>
											</div>
											<div class="col-md-3">
                                                <label class="control-label">Name of Customer*</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" placeholder="Customer Name"
                                                    class="form-control input-sm placeholdesize" id="customer"
                                                    name="customer" required>
                                            </div>
                                           
                                        </div>
                                        <div class="form-group">
										<div class="col-md-3">
                                                <label class="control-label">Table Name*</label>
                                            </div>
                                            <div class="col-md-3">
											<select name="table_nm" id="table_nm"
                                                    class="form-control input-sm placeholdesize" required>
                                                    <option value="" disabled selected>Select</option>
                                                  
                                                </select>
											</div>
											<div class="col-md-3">
                                                <label class="control-label">Emp Name*</label>
                                            </div>
                                            <div class="col-md-3">
											<select name="emp_nm" id="emp_nm"
                                                    class="form-control input-sm placeholdesize" required>
                                                    <option value="" disabled selected>Select</option>
                                                    
                                                </select>
                                            </div>
                                           
                                        </div>
                                       
										<div class="table-responsive" id="">
                                                                 <table id="file_info" style="width: 100%; margin-left: 0px; table-layout: fixed;" class="table table-striped dataTable no-footer">
                                                                      <thead>
                                                                           <input type="hidden" id="row" class="row" value="0">
                                                                           <tr>
                                                                                <th colspan="6" style="text-align:center;">Item Details</th>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Item Name</th>
                                                                                <th>Varity</th>
                                                                                <th>Quantity</th>
                                                                                <th>Rate</th>
																				<th>Amount</th>
                                                                                <th>Add</th>
                                                                           </tr>
                                                                           <tr>
                                                                               
                                                                                     <input type="hidden" id="ids" class="ids" />
                                                                                     <th> <select id="item_nm" class="form-control" name="item_nm" form="item_info" >
                                                                                            
                                                                                          </select>
                                                                                     </th>
                                                                                     <th><select id="varity" class="form-control" name="varity" form="item_info" >
                                                                                            <option value="" selected disabled>Select</option>
                                                                                               <option value="Full">Full</option>
                                                                                               <option value="Half">Half</option>
                                                                                            
																						  </select>
																						  <input type="hidden" name="full_amt" id="full_amt" value="0">
																						  <input type="hidden" name="half_amt" id="half_amt" value="0">
																						</th>
                                                                                     <th>
                                                                                          <input type="number" id="qty" name="qty" class="form-control" form="item_info" placeholder="Quantity" >
																					 </th>
																					 <th>
                                                                                          <input type="number" id="rate" name="rate" class="form-control" form="item_info" placeholder="Rate" >
                                                                                     </th>
                                                                                     <th>
                                                                                          <input type="number" id="amount" name="amount" class="form-control" form="item_info" placeholder="Amount" disabled >
                                                                                     </th>

                                                                                     <th><button type="button" class="btn btn-success" id="plus" value=""><i class="fa fa-plus"></i></button></th>
                                                                               
                                                                           </tr>
                                                                      </thead>
																	  <tbody id="file_info_tbody"></tbody>
																	  <tfoot>
																	  <tr>
                                                                                <th colspan="3" style="text-align: right;">Total Amount</th>
                                                                                <th></th>
                                                                                <th><input type="number" id="tamt" name="tamt" class="form-control text-right" disabled placeholder="0.00" value="0.00" ></th>
                                                                               
                                                                                <th></th>
																		   </tr>
																		   <tr>
                                                                                <th colspan="3" style="text-align: right;">GST (%)</th>
                                                                                <th><input type="number" id="gst" name="gst" class="form-control text-right"  placeholder="0" value="0" ></th>
                                                                                <th><input type="number" id="tgst" name="tgst" class="form-control text-right" disabled placeholder="0.00" value="0.00" ></th>
                                                                               
                                                                                <th></th>
																		   </tr>
																		   <tr>
                                                                                <th colspan="3" style="text-align: right;">Grand Total</th>
                                                                                <th></th>
                                                                                <th><input type="number" id="gtotal" name="gtotal" class="form-control text-right" disabled placeholder="0.00" value="0.00" ></th>
                                                                               
                                                                                <th></th>
                                                                           </tr>
																	  </tfoot>
                                                                 </table>
                                                            </div>


                                       
                                        

                                            <div class="btn-group pull-right">
                                                <input type="hidden" id="save_update" value="">
												<input class="btn btn-primary" type="submit" value="Save">
												<button type="button" class="btn btn-warning" id="reset">Reset</button>
												<button class="btn btn-success" type="submit" form="invoice_form"
                                                                 id="btnprint" name="btnprint" value=""
                                                                 style="display:none">Print</button>

  
                                            </div>
                                        </div>
									</form>
									<form id="item_info" name="item_info"> </form>
									<form name="invoice_form" id="invoice_form" method="POST"  action="<?php echo base_url('CBill_genrate/print_invoice');?>"
                                                                 target="_blank"></form>
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
		  $("#bill_date").val(date);
		//  $("#to").val(date);
          //  $("#fdate").val(date);
     </script>
        <script type="text/javascript">
        var base_url = "<?php print base_url(); ?>";
        </script>
       <script src="<?php echo base_url(); ?>assets/js/myjs/bill_generation.js"></script>

</body>

</html>
