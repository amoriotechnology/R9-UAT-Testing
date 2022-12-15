<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/packing.js" type="text/javascript"></script>


<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Packing List</h1>
            <small>Generate New Packing List Invoice</small>
            <ol class="breadcrumb">
            <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Packing List</a></li>
                <li class="active">Packing List Invoice</li>
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
                            <h4>Create New Packing List Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <form id="insert_purchase"  method="post">               

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Packing List No.
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="invoice_no" value="<?php if(!empty($voucher_no[0]['voucher'])){
                                $curYear = date('Y'); 
                                $month = date('m');
                               $vn = substr($voucher_no[0]['voucher'],9)+1;
                               echo $voucher_n = 'PL'. $curYear.$month.'-'.$vn;
                             }else{
                                    $curYear = date('Y'); 
                                $month = date('m');
                               echo $voucher_n = 'PL'. $curYear.$month.'-'.'1';
                             } ?>" readonly />
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="invoice_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Gross Weight
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                        <input type="text" tabindex="3" class="form-control" name="gross_weight" placeholder="Gross Weight" id="invoice_no" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Container No
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="text" tabindex="3" class="form-control" name="container_no" placeholder="Container No" id="invoice_no" />
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

           <!--      <div>
                          <button type="button" class="btn btn-primary"  id="service_quotation_div">Create Crate</button>  
                        </div> -->

<!-- 
                        <button type="button" class="btn btn-info" name="add-invoice-item"  onClick="addCrate('quotation_service1')"  tabindex="9"/><i class="fa fa-plus"></i> Add another crate</button> -->

        <br>



            <div class="crate_wrap" style="
    border: 1px solid #ddd;
    padding: 6px;
    margin: 5px;
">



              <div class="table-responsive" id="quotation_service1">
                        <table class="table table-bordered table-hover" id="packingListTable">

                             <thead>
                                     <tr>
                                          
                                           <th class="text-center" width="15%">Product<i class="text-danger">*</i></th> 


                                           <th class="text-center" width="15%">Description<i class="text-danger">*</i></th>


                                           <th class="text-center" width="15%">Thickness<i class="text-danger">*</i></th>

                                          
                                         
                                        </tr>
                                </thead>

                                <tbody id="">
                                    <tr>
                                        

                                        <td class="span3 supplier">
                                           <input type="text" name="product_name" required class="form-control product_name productSelection" onkeypress="product_pur_or_list_by_company(1);" placeholder="<?php echo display('product_name') ?>" id="product_name_1" tabindex="5" >

                                            <input type="hidden" class="autocomplete_hidden_value product_id_1" name="product_id" id="SchoolHiddenId"/>

                                            <input type="hidden" class="sl" value="1">

                                        <!--     <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#product_info"><i class="ti-plus m-r-2"></i></a> -->

                                        </td>


                                        <td class="span3 supplier">
                                           <input type="text" name="description" required class="form-control" placeholder="<?php echo display('description') ?>"  tabindex="5" >

                                        </td>


                                          <td class="span3 supplier">
                                           <input type="text" name="thickness" required class="form-control" placeholder="Thickness"  tabindex="5" >

                                        </td>

                                    </tr>

                                </tbody>

                            </table>
                        </div>





                        <div class="table-responsive" id="quotation_service1">
                        <table class="table table-bordered table-hover" id="packingListTable">


                                <thead>
                                     <tr>
                                          <th class="text-center" width="10%">Serial No<i class="text-danger">*</i></th> 
                                          
                                          
                                            <th class="text-center">SLAB NO</th>
                                            <th class="text-center">Net Measurement (Inches)<i class="text-danger">*</i></th>
                                         <!--    <th class="text-center" id="th_Measurements1" >Set Measurements<i class="text-danger">*</i></th> -->
                                            <th class="text-center"  style="width:200px;">Area (Sq. Ft)<i class="text-danger">*</i></th>
                                       
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr class="addPurchaseItem">
                                         <td class="wt">
                                                <input type="text" id="serial_number[]" name="serial_number[]" value="1" class="form-control text-right" placeholder="" />
                                         </td>

                                       <td class="wt">
                                                <input type="text" name="slab_no[]" id="available_quantity_1" class="form-control text-right stock_ctn_1" placeholder="0.00" />
                                       </td>
                                        
<!--                                             <td class="text-right">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="11" value=""  tabindex="6"/>
                                            </td> -->
                                           <!--  <td>




                                        <select name="measurments" id="Measurments" class="form-control " required="" tabindex="1">
                                            <option value="cm">Cms</option>
                                            <option value="in">Inches</option>
                                            <option value="Cm-in">Cms to inches</option>
                                        </select>
                                            </td> -->
                                          <!--   <td class="text-right" id="th_Measurements">
                                                <input type="text" id="height" name="height[]"class="form-control text-right store_cal_1"placeholder="Height"/>
                                                <input type="text" id="width" name="width[]"class="form-control text-right store_cal_1"placeholder="Width"/>
                                                <input type="text" id="thickness" name="thickness[]"class="form-control text-right store_cal_1"placeholder="Thickness"/>
                                            </td> -->


                                           

                                            <td class="text-right" style="display: flex;">
                                                <input type="text" name="width[]" id="cartoon_1"  class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="Width" value=""  tabindex="6" style="width: 50%;"/>

                                                 <input type="text" name="height[]" id="product_rate_1"  class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="Height" value=""  tabindex="6" style="width: 50%;"/>


                                            </td>


                                            
                                           

                                            <td class="text-right">
                                                <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" />
                                            </td>
                                            
                                            <td>
                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>
                                            </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        
                                        <td class="text-right" colspan="3"><b><?php echo display('total') ?>:</b></td>

                                        <td class="text-right">
                                            <input type="text" id="Total" class="text-right form-control" name="total" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item"  onClick="addpackingList('addPurchaseItem')"  tabindex="9"/><i class="fa fa-plus"></i></button>
                                             <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">
                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr>
                                       

                                       <!--  <tr>
                                        
                                        <td class="text-right" colspan="7"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                       <!--   <tr>
                                        
                                        <td class="text-right" colspan="7"><b><?php echo display('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                    <!-- <tr>
                                        <td colspan="2" class="text-right">
                                             <input type="button" id="full_paid_tab" class="btn btn-warning" value="<?php echo display('full_paid') ?>" tabindex="16" onClick="full_paid()"/>
                                        </td>
                                        <td class="text-right" colspan="5"><b><?php echo display('due_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="text-right form-control" name="due_amount" value="0.00" readonly="readonly" />
                                        </td>
                                        <td></td>
                                    </tr> -->


                                  
                                     

                                   
                                </tfoot>
                            </table>
                        </div>

                    </div>

                        


                           <div class="row">
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Remarks
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" rows="4" cols="50" id="adress" name="remarks" placeholder="Remarks" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>


                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Attachements
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                </div> 
                            </div>
                        </div>

<div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-packing-list" value="Save" />
                                <a  style="color: #fff;"  id="final_submit" class='final_submit btn btn-primary'>Submit</a>
                       

<a id="download" style="color: #fff;" class='btn btn-primary'>Download</a>
                   
                            </div>
                        </div>
                        </form>  <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expenses - PackingList</h4>
        </div>
        <div class="modal-body" style="font-weight:bold;text-align:center;">
          
          <h4>PackingList Created Successfully</h4>
     
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
				<p>Your Packing List is not submitted. Would you like to submit or discard
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
          <h4 class="modal-title">Expenses - PackingList</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
       
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>






    <script type="text/javascript">
        var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
        $(document).ready(function(){
            $('#final_submit').hide();
$('#download').hide();

       //    $('#myModal1').modal('show');
       //    hide();
        });
    </script>


<script type="text/javascript">

let s1=0;

    $('#Measurments'+s1).change(function(){

    let measure1 = $("#Measurments"+s1).val();
    let height1 , weight1 , thickness1;
    $("#thickness"+s1).keyup(function(){
        height1 = $("#height"+s1).val();
        console.log(height1);
        weight1 = $("#weight"+s1).val();
          console.log(weight1);
        thickness1 = $("#thickness"+s1).val();
          console.log(thickness1);
        let calcu1 = height1*weight1*thickness1;
        calcu1 = calcu1+measure1;
        $("#area"+s1).val(calcu1);
    });   
  }); 

   

  $("#service_quotation_div").click(function () {

         $("#quotation_service").toggle(1500,"easeOutQuint",function(){

          });

  }); 


$(document).ready(function(){
    $("#th_Measurements").hide();
    $("#th_Measurements1").hide();
    $("#Measurments").change(function(){
    $("#th_Measurements").show();
    $("#th_Measurements1").show();
    let measure = $('#Measurments').val();
    let height , weight , thickness;
    $("#thickness").keyup(function(){
        height = $("#height").val();
        console.log(height);
        width = $("#width").val();
        console.log(width);
        thickness = $("#thickness").val();
        console.log(thickness);
        let calcu = height*width*thickness;
        calcu = calcu+measure;
        $("#area").val(calcu);
    });

          
  });

  
});

$('#insert_purchase').submit(function (event) {
    var dataString = {
        dataString : $("#insert_purchase").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_packing_list",
        data:$("#insert_purchase").serialize(),

        success:function (data) {
        console.log(data);
   
            var split = data.split("/");
            $('#invoice_hdn1').val(split[0]);
         
     
            $('#invoice_hdn').val(split[1]);
            $("#myModal1").find('.modal-body').text('Packing List Created Successfully');
            $('#final_submit').show();
$('#download').show();
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
$("#bodyModal1").html("");
 },3000);


       }

    });

    event.preventDefault();
});
$('#download').on('click', function (e) {

 var popout = window.open("<?php  echo base_url(); ?>Cpurchase/packing_list_details_data/"+$('#invoice_hdn1').val());
 
    window.setTimeout(function(){
         popout.close();
        
      }, 3000);
      e.preventDefault();

});  
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cpurchase/delete_packing/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Packing List No :"+$('#invoice_hdn').val()+" has been Discarded";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_packing_list";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
        var input_hdn="Your Packing List No :"+$('#invoice_hdn').val()+" has been saved Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_packing_list";
      }, 2000);
     }
$('.final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Packing List No :"+$('#invoice_hdn').val()+" has been saved Successfully";
  
    console.log(input_hdn);
    $("#myModal1").find('.modal-body').text(input_hdn);
   // $("#bodyModal1").html(input_hdn);
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cpurchase/manage_packing_list";
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