<?php include('include/header.php');  ?>



<div id="divToPrint">
    <?php
 
                             
 foreach($hotel_details as $value)
 {

 ?>

    <div style="text-align: center">
        <table width="100%">
            <tr>
                <td rowspan="5" ><img
                        src="<?php echo base_url() ?>Upload/<?php echo htmlentities($value->logo);?>" width="120px"
                        height="120px" /></td>
                <td >
                  
                        <h2><?php echo htmlentities($value->hotel_name);?></h2>
                  
                </td>

            </tr>
            <tr>

                <td>

                    <h3><?php echo htmlentities($value->address);?></h3>
                </td>
            </tr>
            <tr>
                <td>
                    <?php
		if($value->mobile2==null){
			?>
                    <h4><?php echo htmlentities($value->mobile1);?></h4>
                    <?php	}else{
		?>
                    <h4><?php echo htmlentities($value->mobile1);?>, <?php echo htmlentities($value->mobile2);?></h4>
                </td>
            </tr>
            <tr>
                <td>
                    <h5>GSTIN : <?php echo htmlentities($value->gst_no);?></h5>
                </td>




            </tr>
        </table>



        <?php  }}
		 foreach($master as $value2)
		 { ?>
        <div class="col-lg-12">
            <div class="row form-group">
                <div class="col-lg-6">
                    <span><b>Customer Name :</b> <?php echo htmlentities($value2->customer_name);?></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-lg-6">
                    <span><b>Table Number :</b> <?php echo htmlentities($value2->table_name);?></span>
                </div>
                <div class="col-lg-6">
                    <span><b>Employee Name :</b> <?php echo htmlentities($value2->emp_name);?></span>
                </div>
            </div>

        </div>
        <?php  } ?>
    </div>
    <div style="text-align: center" class="row col-lg-12">
        <table class="table table-bordered" width="100%">
            <thead>
                <tr>
                    <th style="text-align: center">Sr. No.</th>
                    <th style="text-align: center">Item Name</th>
                    <th style="text-align: center">Quantity</th>
                    <th style="text-align: center">Rate</th>
                    <th style="text-align: center">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php	
		 foreach($details as $value3)
		 {
			 $i=1;
		?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo htmlentities($value3->curse);?></td>
                    <td><?php echo htmlentities($value3->qty);?></td>
                    <td style="text-align: right"><?php echo htmlentities($value3->rate);?></td>
                    <td style="text-align: right"><?php echo htmlentities($value3->amount);?></td>
                </tr>
                <?php	
			$i++;
		}
		?>
            </tbody>
            <tfoot>
                <?php  
		 foreach($master as $value2)
		 {
			 $tot_amt=$value2->total_amt;
			 $gst_per=$value2->gst_per;
			 $tot_gst= floatval($gst_per)*floatval($tot_amt)/100;
			 $g_total= floatval($tot_amt)+floatval($tot_gst);
			 ?>
                <tr>
                    <th style="text-align: right" colspan="3">Total Amount</th>
                    <th></th>
                    <th style="text-align: right"><?php echo htmlentities($value2->total_amt);?></th>

                </tr>
                <tr>
                    <th style="text-align: right" colspan="3">GST (%)</th>
                    <th style="text-align: right"><?php echo htmlentities($value2->gst_per);?></th>
                    <th style="text-align: right"><?php echo number_format((float)$tot_gst, 2, '.', '');?></th>

                </tr>
                <tr>
                    <th style="text-align: right" colspan="3">Grand Total</th>
                    <th></th>
                    <th style="text-align: right"><?php echo number_format((float)$g_total, 2, '.', '') ?></th>

                </tr>
                <?php  
		}?>
            </tfoot>
        </table>
    </div>
    <h3 style="text-align: center">Thanks Visit Again</h3>
</div>



<?php include('include/footer_scripts.php');  ?>
<!-- <button onclick="myFunction()">Print this page</button> -->
<a class="printPage btn btn-primary" href="#">Print</a>

<script>
$('a.printPage').click(function() {
    var divToPrint = document.getElementById("divToPrint");
    newWin = window.open("");
    newWin.document.write(divToPrint.outerHTML);
    newWin.print();
    newWin.close();
});
</script>
