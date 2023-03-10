<!-- Purchase Payment Ledger Start -->

<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1>Purchase Order Invoice</h1>
	        <small>Purchase Order Invoice</small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#">Purchase Order Invoice</a></li>
	            <li class="active">Purchase Order Invoice</li>
	        </ol>
	    </div>
	</section>


	<!-- Invoice information -->
	<section class="content">

		<!-- Alert Message -->
	    <?php
	        $message = $this->session->userdata('message');
	        if (isset($message)) {
	    ?>
	    <div class="alert alert-info alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
           <div id="msg"></div>
	        <?php echo $message ?>                    
	    </div>
	    <?php 
	        $this->session->unset_userdata('message');
	        }
	        $error_message = $this->session->userdata('error_message');
	        if (isset($error_message)) {
	    ?>
	    <div class="alert alert-danger alert-dismissable">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <?php echo $error_message ?>                    
	    </div>
	    <?php 
	        $this->session->unset_userdata('error_message');
	        }
	    ?>
                
    <div class="container" id="content">
    <?php 

                      
if($invoice_setting[0]['template']==1)
{
?>  <div class="brand-section">
<div class="row">
   
  
  
  <div class="col-sm-4" id='company_info' style="color:white;">
         
  <b> Company name : </b><?php echo $company_info[0]['company_name']; ?><br>
<b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
<b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
<b>   Contact : </b><?php echo $company_info[0]['mobile']; ?><br>
     </div>
     <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $invoice_setting[0]['header']; ?></h3></div>
     <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$invoice_setting[0]['logo']; ?>" style='width: 100%;'>
      
      </div>
</div>
     </div>
<div class="body-section">
<div class="row">
<div class="col-6">
<table id="one" >
<tr><td  class="key">Vendor</td><td style="width:10px;">:</td><td calss="value"><?php echo  $supplier[0]['supplier_name'];  ?></td></tr>
<tr><td  class="key">Purchase Order Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
<tr><td  class="key">Created By</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>
<tr><td  class="key">Shipment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>

</table>

</div>
<div class="col-6">
<table id="two">

<tr><td  class="key">Ship To</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['ship_to']; ?></td></tr>
<tr><td class="key">P.O Number</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['chalan_no'] ; ?></td></tr>
<tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['payment_terms']; ?></td></tr>
<tr><td  class="key">Est.Shipment Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
</table>

</div>
</div>
</div>
<div class="body-section">
<table class="table-bordered">
<thead>
<tr>
<th class="text-center text-white">S.No</th>
 <th class="text-center text-white">Product Name(SKU)</th>
 <th class="text-center text-white">Slabs</th>
 <th class="text-center text-white">Rate</th>
 <th class="text-center text-white">Quantity (Sq.ft)</th>
 <th class="text-center text-white">Unit Cost</th>
 <th class="text-center text-white">Total</th>
</tr>
</thead>
<tbody>
<?php
 if ($order) {
$count=1;
for($i=0;$i<sizeof($order);$i++){ ?>
<tr>
<td style="font-size: 16px;"><?php  echo $count;  ?></td>
  <td style="font-size: 16px;"><?php  echo $order[$i]['product_name'];  ?></td>
  <td style="font-size: 16px;"><?php  echo $order[$i]['slabs']?></td>
 <td style="font-size: 16px;">$<?php  echo $order[$i]['rate']?></td>
<td style="font-size: 16px;"><?php  echo $order[$i]['quantity']?></td>
 <td style="font-size: 16px;"><?php  echo $order[$i]['price']?></td>
  <td style="font-size: 16px;">$<?php  echo $order[$i]['total_amount']?></td>


</tr>
<?php $count++;}}  ?>
<tr>
 <td colspan="6" class="text-right" style="text-align:right;font-weight:bold;">Overall Total:</td>
 <td style="font-size: 16px;">$<?= $invoice[0]['grand_total_amount']; ?></td>
</tr>
<tr>
 <td colspan="6" class="text-right" style="text-align:right;font-weight:bold;">Overall Total(Preferred Currency):</td>
 <td style="font-size: 16px;">$<?= $invoice[0]['grand_total_amount']; ?></td>
</tr>
</tbody>
</table>
<br>
<h4>Remarks</h4><?= $invoice[0]['message_invoice']; ?><br><br><br>

</div>

<?php 

}
elseif($invoice_setting[0]['template']==3)
{
?>

<div class="brand-section">
<div class="row">

<div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$invoice_setting[0]['logo']; ?>" style='width: 100%;'>

</div>
<div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $invoice_setting[0]['header']; ?></h3></div>

</div>
</div> 
<div class="body-section">
<div class="row">
<div class="col-sm-6 "></div>
<div class="col-sm-6 " style="width:50%;">
<table>

<tr>  <td style="100px;font-weight:bold;"> Company name </td><td style="width:10px;">:</td><td> <?php echo $company_info[0]['company_name']; ?></td></tr>
<tr>   <td style="100px;font-weight:bold;"> Address </td><td style="width:10px;">:</td><td> <?php echo $company_info[0]['address']; ?></td></tr>
<tr>   <td style="100px;font-weight:bold;"> Email </td><td style="width:10px;">:</td><td> <?php echo $company_info[0]['email']; ?></td></tr>
<tr>   <td style="100px;font-weight:bold;"> Contact </td><td style="width:10px;">:</td><td> <?php echo  $company_info[0]['mobile']; ?></td></tr>
</tr>        

</table>
</div></div>
<div class="row"> <div class="col-sm-12 ">&nbsp;</div></div>
<div class="row">
<div class="col-6">
<table id="one" >
<tr><td  class="key">Vendor</td><td style="width:10px;">:</td><td calss="value"><?php echo  $supplier[0]['supplier_name'];  ?></td></tr>
<tr><td  class="key">Purchase Order Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
<tr><td  class="key">Created By</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>
<tr><td  class="key">Shipment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>

</table>

</div>
<div class="col-6">
<table id="two">

<tr><td  class="key">Ship To</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['ship_to']; ?></td></tr>
<tr><td class="key">P.O Number</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['chalan_no'] ; ?></td></tr>
<tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['payment_terms']; ?></td></tr>
<tr><td  class="key">Est.Shipment Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
</table>

</div>
</div>
</div>
<div class="body-section">
<table class="table-bordered">
<thead>
<tr>
<th class="text-center text-white">S.No</th>
 <th class="text-center text-white">Product Name(SKU)</th>
 <th class="text-center text-white">Slabs</th>
 <th class="text-center text-white">Rate</th>
 <th class="text-center text-white">Quantity (Sq.ft)</th>
 <th class="text-center text-white">Unit Cost</th>
 <th class="text-center text-white">Total</th>
</tr>
</thead>
<tbody>
<?php
 if ($order) {
$count=1;
for($i=0;$i<sizeof($order);$i++){ ?>
<tr>
<td style="font-size: 16px;"><?php  echo $count;  ?></td>
  <td style="font-size: 16px;"><?php  echo $order[$i]['product_name'];  ?></td>
  <td style="font-size: 16px;"><?php  echo $order[$i]['slabs']?></td>
 <td style="font-size: 16px;">$<?php  echo $order[$i]['rate']?></td>
<td style="font-size: 16px;"><?php  echo $order[$i]['quantity']?></td>
 <td style="font-size: 16px;"><?php  echo $order[$i]['price']?></td>
  <td style="font-size: 16px;">$<?php  echo $order[$i]['total_amount']?></td>


</tr>
<?php $count++;}}  ?>
<tr>
 <td colspan="6" class="text-right" style="text-align:right;font-weight:bold;">Overall Total:</td>
 <td style="font-size: 16px;">$<?= $invoice[0]['grand_total_amount']; ?></td>
</tr>
<tr>
 <td colspan="6" class="text-right" style="text-align:right;font-weight:bold;">Overall Total(Preferred Currency):</td>
 <td style="font-size: 16px;">$<?= $invoice[0]['grand_total_amount']; ?></td>
</tr>
</tbody>
</table>
<br>
<h4>Remarks</h4><?= $invoice[0]['message_invoice']; ?><br><br><br>

</div>





<?php  } 

                      
if($invoice_setting[0]['template']==2)
{
?>    <div class="brand-section">
<div class="row" >

<div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$invoice_setting[0]['logo']; ?>" style='width: 100%;'>

</div>
<div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $invoice_setting[0]['header']; ?></h3></div>
<div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
<b> Company name : </b><?php echo $company_info[0]['company_name']; ?><br>
<b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
<b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
<b>   Contact : </b><?php echo $company_info[0]['mobile']; ?><br>
</div>
</div>
</div>
<div class="body-section">
<div class="row">
<div class="col-6">
<table id="one" >
<tr><td  class="key">Vendor</td><td style="width:10px;">:</td><td calss="value"><?php echo  $supplier[0]['supplier_name'];  ?></td></tr>
<tr><td  class="key">Purchase Order Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
<tr><td  class="key">Created By</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>
<tr><td  class="key">Shipment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>

</table>

</div>
<div class="col-6">
<table id="two">

<tr><td  class="key">Ship To</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['ship_to']; ?></td></tr>
<tr><td class="key">P.O Number</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['chalan_no'] ; ?></td></tr>
<tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['payment_terms']; ?></td></tr>
<tr><td  class="key">Est.Shipment Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
</table>

</div>
</div>
</div>
<div class="body-section">
<table class="table-bordered">
<thead>
<tr>
<th class="text-center text-white">S.No</th>
 <th class="text-center text-white">Product Name(SKU)</th>
 <th class="text-center text-white">Slabs</th>
 <th class="text-center text-white">Rate</th>
 <th class="text-center text-white">Quantity (Sq.ft)</th>
 <th class="text-center text-white">Unit Cost</th>
 <th class="text-center text-white">Total</th>
</tr>
</thead>
<tbody>
<?php
 if ($order) {
$count=1;
for($i=0;$i<sizeof($order);$i++){ ?>
<tr>
<td style="font-size: 16px;"><?php  echo $count;  ?></td>
  <td style="font-size: 16px;"><?php  echo $order[$i]['product_name'];  ?></td>
  <td style="font-size: 16px;"><?php  echo $order[$i]['slabs']?></td>
 <td style="font-size: 16px;">$<?php  echo $order[$i]['rate']?></td>
<td style="font-size: 16px;"><?php  echo $order[$i]['quantity']?></td>
 <td style="font-size: 16px;"><?php  echo $order[$i]['price']?></td>
  <td style="font-size: 16px;">$<?php  echo $order[$i]['total_amount']?></td>


</tr>
<?php $count++;}}  ?>
<tr>
 <td colspan="6" class="text-right" style="text-align:right;font-weight:bold;">Overall Total:</td>
 <td style="font-size: 16px;">$<?= $invoice[0]['grand_total_amount']; ?></td>
</tr>
<tr>
 <td colspan="6" class="text-right" style="text-align:right;font-weight:bold;">Overall Total(Preferred Currency):</td>
 <td style="font-size: 16px;">$<?= $invoice[0]['grand_total_amount']; ?></td>
</tr>
</tbody>
</table>
<br>
<h4>Remarks</h4><?= $invoice[0]['message_invoice']; ?><br><br><br>

</div>

<?php 

}
?>


</div>
</section>
</div>
<!-- Purchase ledger End  -->
<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="">
      
          <h4 class="modal-title">Expenses - Purchase Order</h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4>Purchase Order Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>
       
        <style>
.modal-header {
    text-align-last: center;

    padding: 9px 15px;
    border-bottom: 1px solid #eee;
    background-color: #1c2350;
    color: #fff;
}
.key{
    text-align:left;
font-weight:bold;

}
.value{
    text-align:left;
}
#one,#two{
float:left;
width:100%;
}
body{
    background-color: #fcf8f8; 
    margin: 0;
    padding: 0;
}
h1,h2,h3,h4,h5,h6{
    margin: 0;
    padding: 0;
}
p{
    margin: 0;
    padding: 0;
}
.heading_name{
    font-weight: bold;
}
.container{
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
}
.brand-section{
   background-color: #5961b3;
   padding: 10px 40px;
}
.logo{
    width: 50%;
}

.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-6{
    width: 50%;
    flex: 0 0 auto;
   
}
.text-white{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 16px;
    border: 1px solid gray;
    
}
.heading{
    font-size: 20px;
    margin-bottom: 08px;
}
.sub-heading{
    color: #262626;
    margin-bottom: 05px;
}
table{
   
    background-color: #fff;
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    border: 1px solid #111;
    background-color: #5961b3;
   
}
.table-bordered td{
    text-align:center;
}
table td {
    vertical-align: middle !important;
  
    word-wrap: break-word;
}
th{
    text-align:center;
    color:white;
}
table th, table td {
    padding-top: 08px;
    padding-bottom: 08px;
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6 !important;
}
.text-right{
    text-align: right;
}
.w-20{
    width: 20%;
}
.float-right{
    float: right;
}
@media only screen and (max-width: 600px) {
    
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  width: 100%;
  height: 100vh;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
}

.modal .content {
  position: relative;
  padding: 10px;
 
  border-radius: 8px;
  background-color: #fff;
  box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
  transform: scale(0);
  transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.modal .close {
  position: absolute;
  top: 5px;
  right: 5px;
  width: 30px;
  height: 30px;
  cursor: pointer;
  border-radius: 8px;
  background-color: #7080af;
  clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
}

.modal.open {
    background-color:#38469f;
  opacity: 1;
  visibility: visible;
}
.modal.open .content {
  transform: scale(1);
}
.content-wrapper.blur {
  filter: blur(5px);
}
.content{
    min-height:0px;
}
</style> 


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>


$(document).ready(function () {

var pdf = new jsPDF('p','pt','a4');
const invoice = document.getElementById("content");
console.log(invoice);
console.log(window);
var pageWidth = 8.5;
var margin=0.5;
var opt = {
lineHeight : 1.2,
margin : 0.2,
maxLineWidth : pageWidth - margin *1,
filename: 'invoice'+'.pdf',
allowTaint: true,

html2canvas: { scale: 3 },
jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
};
html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
var totalPages = pdf.internal.getNumberOfPages();
for (var i = 1; i <= totalPages; i++) {
pdf.setPage(i);
pdf.setFontSize(10);
pdf.setTextColor(150);

}
}).save();
});
window.setTimeout(function(){
   
   window.location ="<?php  echo base_url(); ?>Cpurchase/manage_purchase_order";

	 }, 2000);
  
  $( '.modal' ).addClass( 'open' );

if ( $( '.modal' ).hasClass( 'open' ) ) {
 $( '.container' ).addClass( 'blur' );
} 
$( '.close' ).click(function() {
 $( '.modal' ).removeClass( 'open' );
 $( '.cont' ).removeClass( 'blur' );
});

</script> 