<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>



<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>



<!-- Add New Purchase Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('manage_purchase') ?></h1>

            <small><?php echo display('add_new_purchase') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('purchase') ?></a></li>

                <li class="active"><?php echo display('manage_purchase') ?></li>

            </ol>

        </div>

    </section>



    <section class="content">

        <!-- Alert Message -->

        <?php

            $message = $this->session->userdata('message');

            if (isset($message)) {

        ?>

        <div class="alert alert-info alert-dismissable">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

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



        <!-- Purchase report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                            <h4><?php echo display('edit_purchase') ?></h4>

                        </div>

                    </div>



                    <div class="panel-body">

                  
                    <form id="insert_purchase"  method="post">  



                        <div class="row">

                            <div class="col-sm-6">

                               <div class="form-group row">

                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Vendor

                                        <i class="text-danger">*</i>

                                    </label>

                                    <div class="col-sm-6">

                                        <select name="supplier_id" id="supplier_id" class="form-control " required=""> 

                                          

                                            {supplier_list}

                                            <option value="{supplier_id}">{supplier_name}</option>

                                            {/supplier_list} 

                                            {supplier_selected}

                                            <option value="{supplier_id}" selected="">{supplier_name}</option>

                                            {/supplier_selected}

                                        </select>

                                    </div>



                                 

                                </div> 

                            </div>



                             <div class="col-sm-6">

                                <div class="form-group row">

                                    <label for="date" class="col-sm-4 col-form-label">Expenses / Bill date

                                        <i class="text-danger">*</i>

                                    </label>

                                    <div class="col-sm-6">

                                        <?php $date = date('Y-m-d'); ?>

                                        <input type="text" tabindex="2" class="form-control datepicker" name="bill_date" value="{purchase_date}" id="date" required />

                                          <input type="hidden" name="purchase_id" value="{purchase_id}">



                                    </div>

                                </div>

                            </div>

                        </div>

                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
 

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="form-group row">

                                    <label for="invoice_no" class="col-sm-4 col-form-label"><?php echo display('invoice_no') ?>

                                        <i class="text-danger">*</i>

                                    </label>

                                    <div class="col-sm-6">

                                        <input type="text" tabindex="3" class="form-control" name="chalan" placeholder="<?php echo display('invoice_no') ?>" id="invoice_no" required  value="{chalan_no}" />

                                    </div>

                                </div>

                            </div>







                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Payment due date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="text" required tabindex="2" class="form-control datepicker" name="payment_due_date" value="<?php echo $date; ?>" id="date1"  />
                                    </div>
                                </div>
                            </div>



                           <!--  <div class="col-sm-6">

                               <div class="form-group row">

                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo display('details') ?>

                                    </label>

                                    <div class="col-sm-6">

                                        <textarea class="form-control" tabindex="4" id="adress" name="purchase_details" placeholder=" <?php echo display('details') ?>" rows="1">{purchase_details}</textarea>

                                    </div>

                                </div> 

                            </div> -->

                        </div>

                            <div class="row">

                              <!--  <div class="col-sm-6">

                               <div class="form-group row">

                                    <label for="adress" class="col-sm-4 col-form-label"><?php echo display('details') ?>

                                    </label>

                                    <div class="col-sm-6">

                                        <textarea class="form-control" tabindex="4" id="adress" name="purchase_details" placeholder=" <?php echo display('details') ?>" rows="1">{purchase_details}</textarea>

                                    </div>

                                </div> 

                            </div> -->

                        



                      <br>

                        <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="purchaseTable">

                                <thead>

                                     <tr>

                                             <th class="text-center" width="20%">Product<i class="text-danger">*</i></th> 
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('rate') ?><i class="text-danger">*</i></th>
                                            <th class="text-center"><?php echo display('total') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>

                                </thead>

                                <tbody id="addPurchaseItem">

                                    {purchase_info}

                                    <tr>

                                        <td class="span3 supplier">

                                           <input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list({sl});" placeholder="<?php echo display('product_name') ?>" id="product_name_{sl}" tabindex="5" value="{product_name}"  >



                                            <input type="hidden" class="autocomplete_hidden_value product_id_{sl}" name="product_id[]" id="SchoolHiddenId" value="{product_id}"/>



                                            <input type="hidden" class="sl" value="{sl}">

                                        </td>



                                       <td class="wt">

                                                <input type="text" id="" value="{description}" name="description[]" class="form-control"/>

                                         </td>

                                        

                                            <td class="text-right">

                                                <input type="text" name="product_quantity[]" id="cartoon_{sl}" class="form-control text-right store_cal_{sl}" onkeyup="calculate_store({sl});" onchange="calculate_store({sl});" placeholder="0.00" value="{quantity}" min="0" tabindex="6"/>
                                                 <select class="form-control">
                                                    <option>Slabs/Sq. ft</option>
                                                </select>

                                            </td>

                                            <td class="test">

                                                <input type="text" name="product_rate[]" onkeyup="calculate_store({sl});" onchange="calculate_store({sl});" id="product_rate_{sl}" class="form-control product_rate_{sl} text-right" placeholder="0.00" value="{rate}" min="0" tabindex="7"/>

                                            </td>

                                           



                                            <td class="text-right">

                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_{sl}" value="{total_amount}" readonly="readonly" />

                                            </td>

                                            <td>



                                               



                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>

                                            </td>

                                    </tr>

                                    {/purchase_info}




                                </tbody>

                                <tfoot>

                                      <tfoot>

                                    <tr>

                                        

                                        <td class="text-right" colspan="4"><b><?php echo display('total') ?>:</b></td>

                                        <td class="text-right">

                                            <input type="text" id="Total" class="text-right form-control" name="total" value="{total}" readonly="readonly" />

                                        </td>

                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addPurchaseOrderField1('addPurchaseItem')"  tabindex="9"/><i class="fa fa-plus"></i></button>



                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>

                                    </tr>

<!--                                         <tr>

                                       

                                        <td class="text-right" colspan="4"><b><?php echo display('discounts') ?>:</b></td>

                                        <td class="text-right">

                                            <input type="text" id="discount" class="text-right form-control discount" onkeyup="calculate_store(1)" name="discount" placeholder="0.00" value="{total_discount}" />

                                        </td>

                                        <td> 



                                           </td>

                                    </tr> -->



<!--                                         <tr>

                                        

                                        <td class="text-right" colspan="4"><b><?php echo display('Overall Total') ?>:</b></td>

                                        <td class="text-right">

                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="{grand_total}" readonly="readonly" />

                                        </td>

                                        <td> </td>

                                    </tr> -->

<!--                                          <tr>

                                        

                                        <td class="text-right" colspan="4"><b><?php echo display('paid_amount') ?>:</b></td>

                                        <td class="text-right">

                                            <input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="{paid_amount}" />

                                        </td>

                                        <td> </td>

                                    </tr> -->

<!--                                     <tr>

                                        <td colspan="2" class="text-right">

                                             <input type="button" id="full_paid_tab" class="btn btn-warning" value="<?php echo display('full_paid') ?>" tabindex="16" onClick="full_paid()"/>

                                        </td>

                                        <td class="text-right" colspan="2"><b><?php echo display('due_amount') ?>:</b></td>

                                        <td class="text-right">

                                            <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="{due_amount}" readonly="readonly" />

                                        </td>

                                        <td></td>

                                    </tr> -->

                                </tfoot>

                                </tfoot>

                            </table>

                        </div>


                        <tr>
                                    <div class="row">

<div class="col-sm-12">
   <div class="form-group row">
        <label for="eta" class="col-sm-2 col-form-label">Remarks / Details
        </label>
        <div class="col-sm-10">
        <textarea class="form-control" rows="4" cols="50" id="eta" name="remark" placeholder="Remarks / Details" >{remarks}</textarea>
        </div>
    </div> 
</div>
</div>


<div class="row">
<div class="col-sm-12">
   <div class="form-group row">
        <label for="adress" class="col-sm-2 col-form-label">Message on Invoice
        </label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="4" cols="50" id="adress" name="message_invoice" placeholder="Message on Invoice" rows="1"></textarea>
        </div>
    </div> 
</div>

                                        
        </tr>

                        <div class="form-group row">

                            <div class="col-sm-6">

                            <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-purchase" value="Save" />
                            <a  style="color: #fff;"  id="final_submit" class='final_submit btn btn-primary'>Submit</a>

<a id="download" style="color: #fff;" class='btn btn-primary'>Download</a>
                            </div>

                        </div>

        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

</form><input type="text" id="invoice_hdn"/> <input type="text" id="invoice_hdn1"/>

<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expenses</h4>
        </div>
        <div class="modal-body" style="font-weight:bold;text-align:center;">
          
          <h4>New  Expenses Updated Succefully</h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
  
<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expenses</h4>
        </div>
        <div class="modal-body" style="font-weight:bold;text-align:center;">
          
          <h4>New  Expenses Updated Succefully</h4>
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
          <div id="myModal3" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
				<p>Your Invoice is not submitted. Would you like to submit or discard
				</p>
				<p class="text-warning">
					<small>If you don't save, your changes will not be saved.</small>
				</p>
			</div>
			<div class="modal-footer">
            <input type="submit" id="ok" class="btn btn-primary pull-left final_submit" onclick="submit_redirect()"  value="Submit"/>
                <button id="btdelete" type="button" class="btn btn-danger pull-left" onclick="discard()">Discard</button>
			</div>
		</div>
	</div>
</div>   
<div class="modal fade" id="exampleModalLong" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expenses</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
       
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

</script>
             
<script type="text/javascript">
    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
 var count = 2;
var limits = 500;
    "use strict";
function addPurchaseOrderField1(divName){

    if (count == limits)  {
        alert("You have reached the limit of adding " + count + " inputs");
    }
    else{
        var newdiv = document.createElement('tr');
        var tabin="product_name_"+count;
         tabindex = count * 4 ,
       newdiv = document.createElement("tr");
        tab1 = tabindex + 1;
        
        tab2 = tabindex + 2;
        tab3 = tabindex + 3;
        tab4 = tabindex + 4;
        tab5 = tabindex + 5;
        tab6 = tab5 + 1;
        tab7 = tab6 +1;
       


        newdiv.innerHTML ='<td class="span3 supplier"><input type="text" name="product_name" class="form-control product_name productSelection" onkeypress="product_pur_or_list('+ count +');" placeholder="Product Name" id="product_name_'+ count +'" tabindex="'+tab1+'" required> <input type="hidden" class="autocomplete_hidden_value product_id_'+ count +'" name="product_id[]" id="SchoolHiddenId"/>  <input type="hidden" class="sl" value="'+ count +'">  </td>  <td class="wt"> <input type="text" id="" class="form-control" name="description[]" /></td><td class="text-right"><input type="text" name="product_quantity[]" tabindex="'+tab2+'"   id="cartoon_'+ count +'" class="form-control text-right store_cal_' + count + '" onkeyup="calculate_store(' + count + ');" onchange="calculate_store(' + count + ');" placeholder="0.00" value="" min="0" required/><select class="form-control"><option value="Slabs">Slabs</option><option value="Square Feet">Slabs/Sq. ft</option></select> </td><td><span class="form-control" style="background-color: #eee;"><?php  echo $currency." "; ?><input type="text" name="product_rate[]" onkeyup="calculate_store('+ count +');" onchange="calculate_store('+ count +');" id="product_rate_'+ count +'" class="product_rate_'+ count +'" placeholder="0.00" value="" min="0"  tabindex="'+tab3+'" required/></span></td><td><span class="form-control" style="background-color: #eee;"><?php  echo $currency." ";  ?><input class="total_price total_price_'+ count +'" type="text" name="total_price[]" id="total_price_'+ count +'" value="0.00" readonly="readonly" /></span> </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button style="text-align: right;" class="btn btn-danger red" type="button"  onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button></td>';
        document.getElementById(divName).appendChild(newdiv);
        document.getElementById(tabin).focus();
        document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
        document.getElementById("add_purchase").setAttribute("tabindex", tab6);
     document.getElementById("add_purchase_another").setAttribute("tabindex", tab7);
       
        count++;

        $("select.form-control:not(.dont-select-me)").select2({
            placeholder: "Select option",
            allowClear: true
        });
    }
}
$( document ).ready(function() {
    $('#final_submit').hide();
$('#download').hide();
                        $('.hiden').css("display","none");

  

$('#Total').on('change textInput input', function (e) {
    calculate();
});

$('#custocurrency_rate').on('change textInput input', function (e) {
    calculate();
});
function calculate(){
  
  var first=$("#Total").val();
var custo_amt=$('#custocurrency_rate').val();
var value=parseInt(first*custo_amt);

var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);  
}
});
$('#supplier_id').on('change', function (e) {
  
  var data = {
      value: $('#supplier_id').val()
   };
  data[csrfName] = csrfHash;
  $.ajax({
      type:'POST',
      data: data,
   
      //dataType tells jQuery to expect JSON response
      dataType:"json",
      url:'<?php echo base_url();?>Cinvoice/getvendor',
      success: function(result, statut) {
          if(result.csrfName){
             //assign the new csrfName/Hash
             csrfName = result.csrfName;
             csrfHash = result.csrfHash;
          }
         // var parsedData = JSON.parse(result);
        //  alert(result[0].p_quantity);
        console.log(result[0]['currency_type']);
     // $("#vendor_gtotal").val(result[0]['currency_type']);
      $("#cus").val(result[0]['currency_type']);
        $("label[for='custocurrency']").html(result[0]['currency_type']);
       console.log('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>');
       $.getJSON('https://open.er-api.com/v6/latest/<?php echo $curn_info_default; ?>', 
function(data) {
 var custo_currency=result[0]['currency_type'];
    var x=data['rates'][custo_currency];
 var Rate =parseFloat(x).toFixed(3);
  console.log(Rate);
  $('.hiden').show();
  $("#custocurrency_rate").val(Rate);
});
      }
  });


});

  
  
  
  
           
 $("#supplier_id").change(function() {
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
       var data = {
         
      
       };
       data[csrfName] = csrfHash;
   
       $.ajax({
           type:'POST',
           data: data, 
          dataType:"json",
         
           url:'<?php echo base_url();?>Cpurchase/product_search_by_supplier',
           success: function(result, statut) {
            console.log(result);
               if(result.csrfName){
                  csrfName = result.csrfName;
                  csrfHash = result.csrfHash;
               }
               console.log(result[0]['label']);
              // $('#name_email').val(result[0]['label']);
              // $('#subject_email').val(result[0]['subject']);
             //  $('#message_email').html(result[0]['message']);
           }
       });
   });
$(function(){
    $(".add_category").hide();
$("#add_category").click(function() {
    
        $(".add_category").show(300);
   
});
$(".checkbox_toggle2").hide();

$("#purchase_tax").click(function() {
    if($(this).is(":checked")) {
        $(".checkbox_toggle2").show(300);
    } else {
        $(".checkbox_toggle2").hide(200);
    }
});


});

        </script>

<style>
        input {
    border: none;
    background-color: #eee;
 }
textarea:focus, input:focus{
   
    outline: none;
}
 .text-right {
    text-align: left; 
}
</style>
  <script>
      function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      var htmlPreview =
        '<img width="200" src="' + e.target.result + '" />' +
        '<p>' + input.files[0].name + '</p>';
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find('.preview-zone');
      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

      wrapperZone.removeClass('dragover');
      previewZone.removeClass('hidden');
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap('<form>').closest('form').get(0).reset();
  e.unwrap();
}

$(".dropzone").change(function() {
  readFile(this);
});

$('.dropzone-wrapper').on('dragover', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass('dragover');
});

$('.dropzone-wrapper').on('dragleave', function(e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass('dragover');
});

$('.remove-preview').on('click', function() {
  var boxZone = $(this).parents('.preview-zone').find('.box-body');
  var previewZone = $(this).parents('.preview-zone');
  var dropzone = $(this).parents('.form-group').find('.dropzone');
  boxZone.empty();
  previewZone.addClass('hidden');
  reset(dropzone);
});


 CKEDITOR.replace('remarks');
      

      function packing(id)
{
    $('#packing_id').val(id);
    alert('packing linked with your Invoice Please countinue the Invoice');
     $("#packmodal").modal('hide');
     $("#packbutton").hide();
}       

$('#insert_purchase').submit(function (event) {
    var dataString = {
        dataString : $("#insert_purchase").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_purchase",
        data:$("#insert_purchase").serialize(),

        success:function (data) {
        console.log(data);
   
            var split = data.split("/");
            $('#invoice_hdn1').val(split[0]);
         console.log(split[0]+"---"+split[1]);
     
            $('#invoice_hdn').val(split[1]);
            $("#myModal1").find('.modal-body').text('Expense Invoice Updated Successfully');
            $('#final_submit').show();
$('#download').show();
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
$("#bodyModal1").html("");
 },2500);


       }

    });
    event.preventDefault();
});
$('#download').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/purchase_details_data/"+$('#invoice_hdn1').val());
 
    window.setTimeout(function(){
         popout.close();
        
      }, 1500);
      e.preventDefault();

});  

function discard(){
   $.get(
    "<?php echo base_url(); ?>Cpurchase/deletepurchase/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Discarded";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
        var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been saved Successfully";
  
    console.log(input_hdn);
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2000);
     }
$('.final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No : "+$('#invoice_hdn').val()+" has been saved Successfully";
  
    console.log(input_hdn);
    $("#myModal1").find('.modal-body').text(input_hdn);
   // $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_purchase";
      }, 2500);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
}
  </script>

  <script type="text/javascript">
  //  $(window).on('load', function() {
    //    $('#alert').modal('show');
 //   });
</script>

    
    
    <script>
$('#productname').on('change', function() {
    var val=$('#productname').val();
  $('#productid').val(val);
});
    </script>
