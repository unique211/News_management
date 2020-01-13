<?php
//include 'fpdf.php';
//include 'exfpdf.php';
//include 'easyTable.php';
//$id=1;
// $language='';
$from = "";
$to = "";
$name = "";
$con_no = "";
$address = "";
$mobile = "";



// foreach ($details as $row) {
// 	$from1 = $row['from'];
// 	$to1 = $row['to'];
// 	$name = $row['name'];
// 	$con_no = $row['con_no'];
// 	$address = $row['address'];
// 	$mobile = $row['mobile'];


// 	$from = date("d/m/Y", strtotime($from1));
// 	$to = date("d/m/Y", strtotime($to1));
// }
//  if($language=="english"){
$pdf = new exFPDF();
$pdf->AddPage("P", "A4");
$pdf->SetFont('helvetica', '', 10);
$pdf->AddFont('helvetica', '', 'helvetica.php');
$pdf->AddFont('helvetica', 'B', 'helveticab.php');
$pdf->AddFont('helvetica', 'I', 'helveticai.php');
$pdf->AddFont('helvetica', 'BI', 'helveticabi.php');

$logo="";
$hotel_name="";
$adderss="";
$mobile1="";
$mobile2="";
$GSTIN="";

foreach($hotel_details as $value)
 {
$logo=$value->logo;
$hotel_name=$value->hotel_name;
$adderss=$value->address;
$mobile1=$value->mobile1;
$mobile2=$value->mobile2;
$GSTIN=$value->gst_no;
 }


$table = new easyTable($pdf, '{40,140}', 'width:180; border-color:#000000; font-size:10; paddingY:0;');

$table->easyCell('', 'img:Upload/'.$logo.', w35; rowspan:4;  align:L;');
$table->easyCell("$hotel_name", ' align:C; font-style:B;font-size:16;');
$table->printRow();

$table->easyCell("$adderss", ' align:C; font-size:12;');	
$table->printRow();

if($value->mobile2==null){
	$table->easyCell("$mobile1", ' align:C; font-size:12;');
}else{
	$table->easyCell("$mobile1, $mobile2", ' align:C; font-size:12;');
}
$table->printRow();

$table->easyCell("<b>GSTIN :</b> $GSTIN", ' align:C; font-size:12;');
$table->printRow();

$table->easyCell("", ' align:C; colspan:2; border:B; font-size:12;  paddingY:2;');
$table->printRow();


$table->printRow();

// $table->easyCell("Consumer Ledger", ' align:C; font-style:BU;colspan:3; font-size:16;');
// $table->printRow();

// $table->easyCell("", ' align:C; font-style:BU;colspan:3;border:B; font-size:16;');
// $table->printRow();

$table->endTable(0);

$table = new easyTable($pdf, '{45,45,45,45}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');

$customer_name="";
$table_name="";
$emp_name="";
$tot_amt=0;
$gst_per=0;
$tot_gst=0;
$g_total= 0;

foreach($master as $value2)
 {
$customer_name=$value2->customer_name;
$emp_name=$value2->emp_name;
$table_name=$value2->table_name;
$tot_amt=$value2->total_amt;
$gst_per=$value2->gst_per;
$tot_gst= floatval($gst_per)*floatval($tot_amt)/100;
$g_total= floatval($tot_amt)+floatval($tot_gst);

 }

$table->easyCell("Customer Name : ", ' align:L;font-style:B; font-size:12;');
$table->easyCell("$customer_name", 'font-size:12;align:L;');
$table->easyCell("", ' align:L;font-style:B; font-size:12;');
$table->easyCell("", 'font-size:12;align:L;');
$table->printRow();

$table->easyCell("Table Number : ", ' align:L;font-style:B; font-size:12;');
$table->easyCell("$table_name", 'font-size:12;align:L;');
$table->easyCell("Employee Name : ", ' align:L;font-style:B; font-size:12;');
$table->easyCell("$emp_name", 'font-size:12;align:L;');
$table->printRow();


$table->endTable(0);





$table = new easyTable($pdf, '{20,70,30,30,30}', 'width:180; border-color:#000000; font-size:10; paddingY:2;');

$table->easyCell("Sr. No.", ' align:C; border:TLR; font-size:12;font-style:B;');
$table->easyCell("Item Name", 'align:C; border:TLR; font-size:12;font-style:B;');
$table->easyCell("Quantity", 'align:C; border:TLR; font-size:12;font-style:B;');
$table->easyCell("Rate", 'align:C;border:TLR; font-size:12;font-style:B;');
$table->easyCell("Amount", 'align:C; border:TLR; font-size:12;font-style:B;');
$table->printRow();




$sr = 1;
foreach ($details as $value3) {


	$table->easyCell("$sr", ' align:C; border:1; font-size:12;');
	$table->easyCell("$value3->curse", 'align:C; border:1; font-size:12;');
	$table->easyCell("$value3->qty", 'align:C; border:1; font-size:12;');
	$table->easyCell("$value3->rate", 'align:R; border:1; font-size:12;');
	$table->easyCell("$value3->amount", 'align:R; border:1; font-size:12;');
	$table->printRow();

	$sr = $sr + 1;
}
$table->easyCell("Thanks Visit Again", ' align:C; colspan:2; rowspan:3; border:1; font-size:12;font-style:BU;');
$table->easyCell("Total Amount", ' align:R;  border:TLR; font-size:12;font-style:B;');
$table->easyCell("", 'align:C;border:TLR; font-size:12;');
$table->easyCell("$tot_amt", 'align:R; border:TLR; font-size:12;');
$table->printRow();

$table->easyCell("GST (%) ", ' align:R;  border:TLR; font-size:12;font-style:B;');
$table->easyCell("$gst_per%", 'align:R;border:TLR; font-size:12;');
$table->easyCell("$tot_gst", 'align:R; border:TLR; font-size:12;');
$table->printRow();

$table->easyCell("Grand Total", ' align:R;  border:1; font-size:12;font-style:B;');
$table->easyCell("", 'align:C;border:1; font-size:12;');
$table->easyCell("$g_total", 'align:R; border:1; font-size:12;');
$table->printRow();

$table->easyCell("", ' align:R; colspan:5; font-size:12; paddingY:8;');

$table->printRow();





$table->endTable(0);







$pdf->Output();
