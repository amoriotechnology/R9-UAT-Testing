<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>



<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Trucking</h1>
            <small>Generate New Trucking Invoice</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?>       </a></li>
                <li><a href="#">Trucking</a></li>
                <li class="active">Trucking Invoice</li>
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
<style>
            input {
    border: none;

 }

 .text-right {
    text-align: left; 
}

</style>
<?php    $payment_id=rand(); ?>
        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Create New Trucking Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <form id="insert_trucking"  method="post">         

                        <div class="row">

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-4 col-form-label">Trucking Invoice No.
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-8">
                          
                                        <input type="text" tabindex="3" class="form-control" name="invoice_no" value="<?php if(!empty($voucher_no[0]['voucher'])){
                                $curYear = date('Y'); 
                                $month = date('m');
                                $voucher_no[0]['voucher']=str_replace("T","",$voucher_no[0]['voucher']);
                                $x=explode("-",$voucher_no[0]['voucher']);
                         
                           
                           $vn=$x[1]+1;
                         
                            echo $voucher_n = 'T'. $curYear.$month.'-'.$vn;
                            }else{
                                    $curYear = date('Y'); 
                                $month = date('m');
                             //   echo  "sdf";
                            echo $voucher_n = 'T'. $curYear.$month.'-'.'1';
                            } ?>" readonly />
                               
                            
                                    </div>
                                </div>
                            </div>

                           <!--  <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Exporter
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                               <textarea rows="4" cols="50" name="billing_address" class=" form-control" placeholder='Add Exporter Detail' id=""> </textarea>
                                    </div>
                                
                                </div> 
                            </div> -->

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type=date required tabindex="2" class="form-control " name="invoice_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Bill to
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">


                                            <select name="bill_to" id="bill_to" class="form-control"   required>

                            <<option value="">Select Customer</option>}

                            option

                             <?php foreach ($customer_list as $customer) {?>

                       <option value="<?php echo html_escape($customer->customer_id);?>"><?php echo html_escape($customer->customer_name);?></option>

                             <?php }?>

                           </select>

                           
                                            <!--    <textarea rows="4" cols="50" name="bill_to" class=" form-control" placeholder='Add Exporter Detail' id=""> </textarea> -->
                                    </div>
                                
                                </div> 
                            </div>


                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Trucking Company
                                        <i class="text-danger">*</i>
                                    </label>

                                       <div class="col-sm-7">
                                       <select name="shipment_company" id="supplier_id" class="form-control " required="" tabindex="1"> 
                                        <option value=" "><?php echo display('select_one') ?></option>
                                           <?php  foreach($all_supplier  as $supplier){  ?>
                                            <option value="<?php  echo $supplier['supplier_name']   ?>"><?php  echo $supplier['supplier_name']   ?></option>
                                      <?php   }  ?>
                                        </select>
                                    </div>
                                    <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#add_vendor"><i class="fa fa-user"></i></a>


                            <!--         <div class="col-sm-6">
                                               <textarea rows="4" cols="50" name="shipment_company" class=" form-control" placeholder='Shipment company' id=""> </textarea>
                                    </div>
 -->                                
                                </div> 
                            </div>


                           
                        </div>




                        <div class="row">

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Container / Goods Pick up date
                                        <i class="text-danger">*</i>
                                    </label>
                                       <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="container_pick_up_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                
                                </div> 
                            </div>


                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Delivery date
                                        <i class="text-danger">*</i>
                                    </label>
                                     <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="delivery_date" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                
                                </div> 
                            </div>
                           
                        </div>




                        <div class="row">

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Container Number
                                        <i class="text-danger">*</i>
                                    </label>
                                       <div class="col-sm-8">
                                       
                                        <input type="text" required tabindex="2" class="form-control " name="container_number" value="" />
                                    </div>
                                
                                </div> 
                            </div>

                            <input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Shipment / BL Number
                                        <i class="text-danger">*</i>
                                    </label>
                                     <div class="col-sm-8">
                                      
                                        <input type="text" required tabindex="2" class="form-control" name="shipment_bl_number" value="" id="date"  />
                                    </div>
                                
                                </div> 
                            </div>
                           
                        </div>
                    
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
  
                       
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                        <tr>
                      <td class="hiden" style="width:30%;border:none;">
                         </td>
                
                                <td class="hiden" style="width:200px;padding:5px;background-color:#b4bae4;border:none;font-weight:bold;color:black;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width:70px;text-align:center;padding:5px;" type="text" id="custocurrency_rate"/>&nbsp;<label for="custocurrency"></label></td>
                    <td style="border:none;text-align:right;font-weight:bold;">Tax : 
                                 </td>
                                <td style="width:40%">
                            <select name="tx" id="product_tax" class="form-control" >
                                <option value="Select the Tax" selected>Select the Tax</option>
                              <?php foreach($tax as $tx){?>
  
                                    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
                                <?php } ?> 
                            </select>
                            </td>
                            </tr>
                        </table>
                            <table class="table table-bordered table-hover" id="truckingTable">
                                <thead>
                                     <tr>
                                            <th class="text-center" width="20%">Date<i class="text-danger">*</i></th> 
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Description<i class="text-danger">*</i></th>
                                            <th class="text-center">Rate<i class="text-danger">*</i></th>
                                            <th class="text-center">Pro No / Reference<i class="text-danger">*</i></th>
                                           

                                            <th class="text-center"><?php echo display('total') ?></th>
                                            <th class="text-center"><?php echo display('action') ?></th>
                                        </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr>
                                        <td class="span3 supplier">
                                                
                                            <?php $date = date('Y-m-d'); ?>
                                               <input type="date" required tabindex="2" class="form-control " name="trucking_date[]" value="<?php echo $date; ?>" id="date"  />

                                        </td>

                                       <td class="wt">
                                                <input type="text" name="product_quantity[]" id="cartoon_1" required="" min="0" class="form-control text-right store_cal_1" onkeyup="calculate_store(1);" onchange="calculate_store(1);" placeholder="0.00" value=""  tabindex="6"/>
                                            </td>
                                        
                                            <td class="text-right">
                                                <input type="text" name="description[]" id="" required="" min="0" class="form-control text-right" value=""  tabindex="6"/>
                                            </td>
                                            <td style="width:220px;">
                                            <table border="0" >
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>     <input type="text" name="product_rate[]" required="" onkeyup="calculate_store(1);" onchange="calculate_store(1);" id="product_rate_1" class="product_rate_1" placeholder="0.00" value="" min="0" tabindex="7"/></td>
     </tr>
   </table> 
                                            </td>

                                            <td class="text-right">
                                                <input class="form-control" type="text" name="pro_no[]" id="pro_no" value=""  />
                                            </td>
                                           

                                            <td>                                <table border="0" >
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>    <input class="total_price" type="text" name="total_price[]" id="total_price_1" value="0.00" readonly="readonly" /></td>
     </tr>
   </table> 
   
</td>
                                            <td>

                                               

                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>
                                            </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                   
                                        <td style="text-align:right;" colspan="5"><b><?php echo "OverallTotal" ?>:</b></td>
                                        <td style="text-align:left;">
                                        <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>     <input type="text" id="Total" class="text-right" name="total"  readonly="readonly" /></td>
     </tr>
   </table>
                                           </td>
                                    
                                           
                                    </tr>
                                    <tr>
                                   
                                   <td style="text-align:right;" colspan="5"><b>Tax Details :</b></td>
                                   <td style="text-align:left;">
                                   <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>       <input type="text" id="tax_details" class="text-right" value="0.00" name="tax_details"  readonly="readonly" /></td>
     </tr>
   </table>
                               </td>
                               
                                      
                               </tr>
                                    <tr> <td style="text-align:right;" colspan="5"><b><?php echo "Grand Total" ?>:</b></td>
                                    <td>
                                    <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>    <input type="text" id="gtotal"  name="gtotal" onchange=""value="0.00" readonly="readonly" /></td>
     </tr>
   </table></td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item" onClick="addTruckingOrderField('addPurchaseItem')"  tabindex="9" ><i class="fa fa-plus"></i></button>

                                           
                                    </tr>
                                  
                                    <tr>
                                        
                                    
                                    
                                    <td style="text-align:right;"  colspan="5"><b><?php echo "Grand Total" ?>:</b><br/><b>(Preferred Currency)</b></td>
                                    <td>
                                    <table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly id="customer_gtotal"  name="customer_gtotal" class="form-control" required   /></td>
     </tr>
   </table></td>
                                      

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr> 
                                    
                                    <tr id="amt">
                                   
                                            <td style="text-align:right;"  colspan="5"><b><?php echo "Amount Paid" ?>:</b></td>
                                          
                                            <td>
                                            <table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly id="amount_paid"  name="amount_paid" class="form-control" required   /></td>
     </tr>
   </table>
                                        
                                            </td>
                                            </tr> 
                                            <tr id="bal">
                                            <td style="text-align:right;"  colspan="5"><b><?php echo "Balance Amount " ?>:</b></td>
                                            <td>
                                            <table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly id="balance"  name="balance" class="form-control" required   /></td>
     </tr>
   </table>
                                         
                                            </td>
                                            </tr> 
                                            <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                               
                                            <td colspan="6" style="text-align: end;">
                                        <input type="submit" value="Make Payment" class="btn btn-primary btn-large" id="paypls"/>
                                            </td>
                                            </tr>
                                
                                    
                               


                            


                                    <!--     <tr>
                                       
                                        <td class="text-right" colspan="4"><b><?php echo display('discounts') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="discount" class="text-right form-control discount" onkeyup="calculate_store(1)" name="discount" placeholder="0.00" value="" />
                                        </td>
                                        <td> 

                                           </td>
                                    </tr> -->

<!--                                         <tr>
                                        
                                        <td class="text-right" colspan="4"><b><?php echo display('grand_total') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                    <!--      <tr>
                                        
                                        <td class="text-right" colspan="4"><b><?php echo display('paid_amount') ?>:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="paidAmount" class="text-right form-control" onKeyup="invoice_paidamount()" name="paid_amount" value="" />
                                        </td>
                                        <td> </td>
                                    </tr> -->
                                <!--     <tr>
                                        <td colspan="2" class="text-right">
                                             <input type="button" id="full_paid_tab" class="btn btn-warning" value="<?php echo display('full_paid') ?>" tabindex="16" onClick="full_paid()"/>
                                        </td>
                                        <td class="text-right" colspan="2"><b><?php echo display('due_amount') ?>:</b></td>
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
                           
                         

                                    <label for="remarks" class="col-sm-2 col-form-label" style="text-align:right;">Remarks</label>

                                    <div class="col-sm-4">

                                        <textarea rows="4" style="border:1px solid #808080;" cols="50" name="remarks" class=" form-control" placeholder="Remarks" id=""> </textarea>

                                    </div>  </div> 
                        <br/>
                          <div class="row">
                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label" style="text-align:right;">Attachements
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                </div> 
                            </div>
                        </div>



<br>
<div class="form-group row">
                            <div class="col-sm-6">
                               <!--  <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-trucking" value="<?php echo display('submit') ?>" />
                                <input type="submit" value="<?php echo display('submit_and_add_another') ?>" name="add-trucking-another" class="btn btn-large btn-success" id="add_purchase_another" > -->

                                <table>
                                <tr>
                                    <td>
                                        <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id']; ?>">
    
                                        <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-trucking"  value="<?php echo display('Save') ?>" />

                                  
                                            <a  style="color: #fff;"  id="final_submit" class='final_submit btn btn-primary'>Submit</a>

                                              <a id="download" style="color: #fff;" class='btn btn-primary'>Download</a>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td id="btn1_download">
                                        
                                        

                                    </td>
                                  
                                  
                                  
                                    
                                </tr>
                               </table>
                            </div>
                        </div>
                                           </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>

<form id="insert_supplier"  method="post">
<div class="modal fade modal-success" id="add_vendor" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <a href="#" class="close" data-dismiss="modal">&times;</a>
            <h3 class="modal-title">Add New Vendor</h3>
        </div>
        <div class="modal-body">
            <div id="customeMessage" class="alert hide"></div>
             <!-- <?php// echo form_open_multipart('Csupplier/insert_supplier', array('id' => 'insert_supplier')) ?> -->
    <div class="panel-body">
        <div class="col-sm-6">
        <div class="form-group row">
            <label for="supplier_name" class="col-sm-4 col-form-label">Vendor Name<i class="text-danger">*</i></label>
            <div class="col-sm-8">
                <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Vendor Name"  required="" tabindex="1">
            </div>
        </div>
        <div class="form-group row">
            <label for="mobile" class="col-sm-4 col-form-label">Vendor Mobile<i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Vendor Mobile"  min="0" tabindex="2">
            </div>
        </div>
            <div class="form-group row">
            <label for="phone" class="col-sm-4 col-form-label"><?php echo display('phone') ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="phone" id="phone" type="number" placeholder="<?php echo display('phone') ?>"  min="0" tabindex="2">
            </div>
        </div>
         <div class="form-group row">
            <label for="email" class="col-sm-4 col-form-label"><?php echo display('email') ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="email" id="email" type="email" placeholder="<?php echo display('email') ?>"   tabindex="2">
            </div>
        </div>
         <div class="form-group row">
            <label for="emailaddress" class="col-sm-4 col-form-label"><?php echo display('email').' '.display('address'); ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="<?php echo display('email').' '.display('address') ?>"  >
            </div>
        </div>
          <div class="form-group row">
            <label for="contact" class="col-sm-4 col-form-label"><?php echo display('contact'); ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="contact" id="contact" type="text" placeholder="<?php echo display('contact') ?>"  >
            </div>
        </div>
        <div class="form-group row">
            <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
            </div>
        </div>
              <div class="form-group-row">
        <label for="" class="col-sm-4 col-form-label">Service Provider</label>
            <div class="col-sm-8">
               <select class="form-control" name="service_provider">
                <option value="1">Yes</option>
                <option value="0" selected>No</option>
               </select>
            </div>
    </div>
    </div>
    <div class="col-sm-6">
    <div class="form-group row">
            <label for="state" class="col-sm-4 col-form-label"><?php echo display('state'); ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="state" id="state" type="text" placeholder="<?php echo display('state') ?>"  >
            </div>
        </div>
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
         <div class="form-group row">
            <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="zip" id="zip" type="text" placeholder="<?php echo display('zip') ?>"  >
            </div>
        </div>
         <div class="form-group row">
            <label for="country" class="col-sm-4 col-form-label"><?php echo display('country') ?> <i class="text-danger"></i></label>
            <div class="col-sm-8">
                <input class="form-control" name="country" id="country" type="text" placeholder="<?php echo display('country') ?>"  >
            </div>
        </div>
        <div class="form-group row">
            <label for="address " class="col-sm-4 col-form-label"><?php echo display('supplier_address') ?></label>
            <div class="col-sm-8">
                <textarea class="form-control" name="address" id="address " rows="2" placeholder="<?php echo display('supplier_address') ?>" ></textarea>
            </div>
        </div>
         <div class="form-group row">
            <label for="address2 " class="col-sm-4 col-form-label"><?php echo display('address') ?>2</label>
            <div class="col-sm-8">
                <textarea class="form-control" name="address2" id="address2" rows="2" placeholder="<?php echo display('supplier_address') ?>2" ></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
            <div class="col-sm-8">
                <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo display('previous_balance') ?></label>
            <div class="col-sm-8">
                <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="<?php echo display('previous_balance') ?>" tabindex="5">
            </div>
        </div>
        <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Preferred Currency" ?></label>
                            <div class="col-sm-8">
                            <select name="currency1" class="currency" id="currency" style="width: 100%;">
                            <option id="im" value="select preferred currency">select preferred currency</option>
                            </select>
                              <input type="hidden" name="" id="num" >
                            <div class="right_box" style="display:none;">
                              <select name="currency" class="currency" id="currency2" style="width: 95%;"></select>
                              <input type="hidden" name="" id="ans" disabled>
                            </div>
                          <small id="errorMSG" style="display:none;"></small>
<br><br>
</div>
    </div>
        </div>
    </div>
    </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
            <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"  class="btn btn-success" value="Submit">
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
                                           </form>




    

     



      
            <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expenses - Trucking</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
          <h4</h4>
     
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
					<small>If you don't submit, your changes will not be saved.</small>
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
          <h4 class="modal-title">Expenses - Trucking</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
       
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>

</div><!-- /.modal -->
<div class="modal fade" id="payment_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD PAYMENT</h4>
        </div>
        <div class="modal-body">
          
   
<form id="add_payment_info"  method="post" >  
            <div class="row">


<div class="form-group row">

        <label for="date" style="text-align:end;" class="col-sm-3 col-form-label">Payment Date <i class="text-danger">*</i></label>

        <div class="col-sm-5">

            <input class=" form-control" type="date"  name="payment_date" id="payment_date" required value="<?php echo html_escape($date); ?>" tabindex="4" />

        </div>

    </div>
<input type="hidden" id="cutomer_name" name="cutomer_name"/>
<input type="hidden"  value="<?php echo $payment_id; ?>"  name="payment_id"/>
 <div class="form-group row">

        <label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Reference No<i class="text-danger">*</i></label>

        <div class="col-sm-5">
        <input class=" form-control" type="text"  name="ref_no" id="ref_no" required   />
</div>
 </div> 
    <div class="form-group row">
      <label for="bank" style="text-align:end;" class="col-sm-3 col-form-label">Select Bank:<i class="text-danger">*</i></label>
      <a data-toggle="modal" href="#add_bank_info" class="btn btn-primary">Add Bank</a>
      <div class="col-sm-5">
  <select name="bank" id="bank"  class="form-control bankpayment" >

<option value="Axis Bank Ltd.">Axis Bank Ltd.</option>
<option value="Bandhan Bank Ltd.">Bandhan Bank Ltd.</option>
<option value="Bank of Baroda">Bank of Baroda</option>
<option value="Bank of India">Bank of India</option>
<option value="Bank of Maharashtra">Bank of Maharashtra</option>
<option value="Canara Bank">Canara Bank</option>
<option value="Central Bank of India">Central Bank of India</option>
<option value="City Union Bank Ltd.">City Union Bank Ltd.</option>
<option value="CSB Bank Ltd.">CSB Bank Ltd.</option>
<option value="DCB Bank Ltd.">DCB Bank Ltd.</option>
<option value="Dhanlaxmi Bank Ltd.">Dhanlaxmi Bank Ltd.</option>
<option value="Federal Bank Ltd.">Federal Bank Ltd.</option>
<option value="HDFC Bank Ltd">HDFC Bank Ltd</option>
<option value="ICICI Bank Ltd.">ICICI Bank Ltd.</option>
<option value="IDBI Bank Ltd.">IDBI Bank Ltd.</option>
<option value="IDFC First Bank Ltd.">IDFC First Bank Ltd.</option>
<option value="Indian Bank">Indian Bank</option>
<option value="Indian Overseas Bank">Indian Overseas Bank</option>
<option value="Induslnd Bank Ltd">Induslnd Bank Ltd</option>
<option value="Jammu & Kashmir Bank Ltd.">Jammu & Kashmir Bank Ltd.</option>
<option value="Karnataka Bank Ltd.">Karnataka Bank Ltd.</option>
<option value="Karur Vysya Bank Ltd.">Karur Vysya Bank Ltd.</option>
<option value="Kotak Mahindra Bank Ltd">Kotak Mahindra Bank Ltd</option>
<option value="Nainital Bank Ltd.">Nainital Bank Ltd.</option>
<option value="Punjab & Sind Bank">Punjab & Sind Bank</option>
<option value="Punjab National Bank">Punjab National Bank</option>
<option value="RBL Bank Ltd.">RBL Bank Ltd.</option>
<option value="South Indian Bank Ltd.">South Indian Bank Ltd.</option>
<option value="State Bank of India">State Bank of India</option>
<option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>
<option value="UCO Bank">UCO Bank</option>
<option value="Union Bank of India">Union Bank of India</option>
<option value="YES Bank Ltd.">YES Bank Ltd.</option>
<?php foreach($bank_name as $b){ ?>
  <option value="<?=$b['bank_name']; ?>"><?=$b['bank_name']; ?></option>
<?php } ?>
</select>
</div>
      </div>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
      <input class=" form-control" type="hidden"  readonly name="customer_name_modal" id="customer_name_modal" required   />    
      <div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Amount to be paid : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_to_pay" id="amount_to_pay" class="form-control" required   /></td>
     </tr>
   </table>


</div>
</div> 
      <div class="form-group row" style="display:none;">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Amount Received : </label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  readonly name="amount_received" id="amount_received" class="form-control"required   /></td>
     </tr>
   </table>



</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Balance : </label>

<div class="col-sm-5">

<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"  style="border:none;" readonly name="balance_modal" id="balance_modal" class="form-control" required  /></td>
     </tr>
   </table>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Payment Amount: <i class="text-danger">*</i></label>

<div class="col-sm-5">
<table border="0">
      <tr>
        <td class="cus" name="cus"></td>
        <td><input  type="text"   name="payment" id="payment_from_modal" class="form-control"required   /></td>
     </tr>
   </table>


</div>
</div>

<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Additional Information : </label>

<div class="col-sm-5">
<input class=" form-control" type="text"  name="details" id="details"/>
</div>
</div> 
<div class="form-group row">

<label for="billing_address" style="text-align:end;" class="col-sm-3 col-form-label">Attachement : </label>

<div class="col-sm-5">
<input class=" form-control" type="file"  name="attachement" id="attachement" />
</div>
</div> 
  </div>   </div>
     <div class="modal-footer">
     <div class="col-sm-8"></div>
     <div class="col-sm-2"></div>
     <div class="col-sm-2">
     <input class=" form-control pull-left btn btn-primary" type="submit"  name="submit_pay" id="submit_pay"   required   />
</div>
     </div>
   </div>
   </form>
 </div>
</div>
<div class="modal fade" id="add_bank_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="myModal5" aria-hidden="true">×</button>
                	<h4 class="modal-title">ADD BANK</h4>

            </div>
            <div class="container"></div>
            <div class="modal-body">  <div id="customeMessage" class="alert hide"></div>


<form id="add_bank"  method="post">  
<div class="panel-body">

<input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">

  <div class="form-group row">

      <label for="bank_name" class="col-sm-4 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>

      </div>

  </div>



  <div class="form-group row">

      <label for="ac_name" class="col-sm-4 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>

      </div>

  </div>

  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                      

  <div class="form-group row">

      <label for="ac_no" class="col-sm-4 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="ac_no" id="ac_no" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>

      </div>

  </div>



  <div class="form-group row">

      <label for="branch" class="col-sm-4 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>

      <div class="col-sm-6">

          <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>

      </div>

  </div>

  <div class="form-group row">
  <label for="shipping_line" class="col-sm-4 col-form-label">Country
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-6">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="Select the Country"  name="country" id="country" style="width:100%"></select>
                                 
                                    </div>

</div>
<div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label>
            <div class="col-sm-6">
            <select name="currency1" class="currency" id="currency1" style="width: 100%;">
            <option id="im" value="select currency">Select Currency</option>
    </select>
<input type="hidden" name="" id="num" >
<div class="right_box" style="display:none;">
<select name="currency1" class="currency" id="currency2" style="width: 95%;"></select>
<input type="hidden" name="" id="ans" disabled>
</div>
<small id="errorMSG" style="display:none;"></small>
<br><br>
</div>
 </div>

</div>



  </div>



  <div class="modal-footer">

      

      <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

      
      <input type="submit" id="addBank"  name="addBank" value="<?php echo display('save') ?>"/>
     <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>

</form>
  </div>
  </div>
  </div>                

  <input type="text" id="invoice_hdn"/> <input type="text" id="invoice_hdn1"/>
  <!-- Payment script -->
<script>
         $('#payment_from_modal').on('input',function(e){

var payment=parseInt($('#payment_from_modal').val());
var amount_to_pay=parseInt($('#amount_to_pay').val());
console.log(payment+"/"+amount_to_pay);
console.log(parseInt(amount_to_pay)-parseInt(payment));
var value=parseInt(amount_to_pay)-parseInt(payment);
$('#balance_modal').val(value);
if (isNaN(value)) {
 $('#balance_modal').val("0");
  }
});
     $('#bank_id').change(function(){
       localStorage.setItem("selected_bank_name",$('#bank_id').val());

     });
    $(document).ready(function(){
   
   $('#amt').hide();
   $('#bal').hide();
       });
   $('#paypls').on('click', function (e) {
   $('#amount_to_pay').val($('#customer_gtotal').val());
       $('#payment_modal').modal('show');
     e.preventDefault();
   
   });
   
   $('#add_payment_info').submit(function (event) {
      
          
      var dataString = {
          dataString : $("#add_payment_info").serialize()
      
     };
     dataString[csrfName] = csrfHash;
    
      $.ajax({
          type:"POST",
          dataType:"json",
          url:"<?php echo base_url(); ?>Cinvoice/add_payment_info",
          data:$("#add_payment_info").serialize(),
   
          success:function (data) {
           console.log(data);
           $('#amount_paid').val($('#payment_from_modal').val());
       $('#balance').val($('#balance_modal').val());
       $('#amt').show();
   $('#bal').show();
       $('#payment_modal').modal('hide');
       $("#bodyModal1").html("Payment Successfully Completed");
          $('#myModal1').modal('show');
       
       window.setTimeout(function(){
           $('#myModal1').modal('hide');
   },2500);
   
   
         
         }
   
      });
      event.preventDefault();
   });
       $('#add_bank').submit(function (event) {
      
          
      var dataString = {
          dataString : $("#add_bank").serialize()
      
     };
     dataString[csrfName] = csrfHash;
    
      $.ajax({
          type:"POST",
          dataType:"json",
          url:"<?php echo base_url(); ?>Csettings/add_new_bank",
          data:$("#add_bank").serialize(),
   
          success: function (data) {
           $.each(data, function (i, item) {
              
               result = '<option value=' + data[i].bank_name + '>' + data[i].bank_name + '</option>';
           });
         
           $('.bankpayment').selectmenu(); 
           $('.bankpayment').append(result).selectmenu('refresh',true);
          $("#bodyModal1").html("Bank Added Successfully");
          $('#myModal3').modal('hide');
          $('#add_bank_info').modal('hide');
           $('#myModal1').modal('show');
          window.setTimeout(function(){
         
           $('#myModal5').modal('hide');
           $('#myModal1').modal('hide');
       
        }, 2000);
        
         }
   
      });
      event.preventDefault();
   });
   
     $(document).ready(function () {
         $('#bank').selectize({
             sortField: 'text'
         });
     });

   $(document).ready(function () {
   
   $('#openBtn').click(function () {
       $('#payment_modal').modal({
           show: true
       })
   });
   
       $(document).on('show.bs.modal', '.modal', function (event) {
           var zIndex = 1040 + (10 * $('.modal:visible').length);
           $(this).css('z-index', zIndex);
           setTimeout(function() {
               $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
           }, 0);
       });
   
   
   });
   $('#insert_supplier').submit(function (event) {
    var dataString = {
        dataString : $("#insert_supplier").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Csupplier/insert_supplier",
        data:$("#insert_supplier").serialize(),
        success:function (data) {
            $("#bodyModal1").html("Add Vendor Sucessfully");
        $('#myModal1').modal('show');
        $('#add_vendor').modal('hide');
        window.setTimeout(function(){
       $('#myModal1').modal('hide');
     }, 2000);
        console.log(data);
  console.log(input_hdn);
        }
    });
    event.preventDefault();
});
   $(document).ready(function(){

$('#product_tax').on('change', function (e) {
    var first=$("#Total").val();
var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
var answer = parseInt((percent / 100) * first);
console.log("Answer : "+answer);
var gtotal = parseInt(first + answer);
console.log("gtotal :" +gtotal);
var final_g= $('#final_gtotal').val();


var amt=parseInt(answer)+parseInt(first);
var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
var custo_amt=$('#custocurrency_rate').val(); 
console.log("numhere :"+num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
calculate();
});
});
$( document ).ready(function() {
                    $('.hiden').css("display","none");



$('#custocurrency_rate').on('change textInput input', function (e) {
calculate();
});

$('.common_qnt').on('change textInput input', function (e) {
calculate();
});

});
$('#product_tax').on('change', function (e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
    var total=$('#Total').val();
var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
 var answer = (percent / 100) * parseInt(total);
$('#final_gtotal').val(answer);
   $('#hdn').val(valueSelected);
   console.log("taxi :"+valueSelected);
  $('#tax_details').val(answer +" ( "+tax+" )");
   calculate();
});
var arr=[];

function total_amt(id){

    var sum=0;
  
var total='total_price_'+id;

var quantity='cartoon_'+id;
var amount = 'product_rate_'+ id;
var grand=$('#gtotal').val();
var quan=$('#'+quantity).val();
var amt=$('#'+amount).val();
var result=parseInt(quan) * parseInt(amt);
result = isNaN(result) ? 0 : result;
arr.push(result);
$('#'+total).val(result);

gt();
}
function gt(){
    var sum=0;
    $('.total_price').each(function() {
    sum += parseFloat($(this).val());
});
$('#Total').val(sum);
var final_g= $('#final_gtotal').val();
if(final_g !=''){
var first=$("#Total").val();
    var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
var answer=0;
  var answer =(parseInt(percent) / 100) * parseInt(first);
   console.log(answer);
   $('#tax_details').val(answer +" ( "+tax+" )");

  var gtotal = parseInt(first + answer);
  console.log(gtotal);
var amt=parseInt(answer)+parseInt(first);
 var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt)
 var custo_amt=$('#custocurrency_rate').val();
 $("#gtotal").val(num);  
 console.log(num +"-"+custo_amt);
 var value=parseInt(num*custo_amt);
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);
}  
}
function calculate(){
  
  var first=$("#Total").val();
  var tax= $('#product_tax').val();
var field = tax.split('-');

var percent = field[1];
var answer=0;
var answer = parseInt((percent / 100) * first);
var gtotal = parseInt(first + answer);
console.log(gtotal);
var final_g= $('#final_gtotal').val();


var amt=parseInt(final_g)+parseInt(first);
var num = isNaN(parseInt(amt)) ? 0 : parseInt(amt);
$("#gtotal").val(num);  
var custo_amt=$('#custocurrency_rate').val();

console.log(num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#customer_gtotal').val(custo_final);  
}


    </script>


<script type="text/javascript">
   // $('.select2-selection__arrow').click(function(){
    //    alert(3);
  //  });
  var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
    var count = 2;
    var limits = 500;
    "use strict";
    function addTruckingOrderField(divName){
        if (count == limits)  {
        alert("You have reached the limit of adding " + count + " inputs");
    }
    else{
        var newdiv = document.createElement('tr');
        var tabin="cartoon_"+count;
         tabindex = count * 4 ,
       newdiv = document.createElement("tr");
        tab1 = tabindex + 1;
        
        tab2 = tabindex + 2;
        tab3 = tabindex + 3;
        tab4 = tabindex + 4;
        tab5 = tabindex + 5;
        tab6 = tab5 + 1;
        tab7 = tab6 +1;
        newdiv.innerHTML ='<td class="span3 supplier"><input type="date" name="trucking_date[]" required="" class="form-control" tabindex="'+tab1+'" > <input type="hidden" class="autocomplete_hidden_value product_id_'+ count +'" name="product_id[]" id="SchoolHiddenId"/>  <input type="hidden" class="sl" value="'+ count +'">  </td> <td class="text-right"><input type="text" name="product_quantity[]" tabindex="'+tab2+'" required  id="cartoon_'+ count +'" class="form-control text-right store_cal_' + count + '" onkeyup="total_amt(' + count + ');"  placeholder="0.00" value="" min="0"/></td><td class="text-right"><input class="form-control" type="text" name="description[]" id="pro_no" value=""  /></td><td> <table border="0"> <tr> <td><?php  echo $currency." ";  ?></td><td>   <input type="text" name="product_rate[]" required="" onkeyup="total_amt(' + count + ');"  id="product_rate_'+ count +'" class="product_rate_'+ count +'" placeholder="0.00" value="" min="0" tabindex="7"/></td>  </tr> </table> </td><td class="text-right"><input class="form-control" type="text" name="pro_no[]" id="pro_no" value=""  /></td><td> <table border="0"> <tr><td><?php  echo $currency." ";  ?></td><td><input class="total_price" type="text" name="total_price[]" id="total_price_'+ count +'" value="0.00" readonly="readonly" /></td> </tr></table>  </td><td> <input type="hidden" id="total_discount_1" class="" /><input type="hidden" id="all_discount_1" class="total_discount" /><button style="text-align: right;" class="btn btn-danger red" type="button"  onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button></td>';
     
      

  document.getElementById(divName).appendChild(newdiv);
        document.getElementById(tabin).focus();
        document.getElementById("add_invoice_item").setAttribute("tabindex", tab5);
        document.getElementById("add_purchase").setAttribute("tabindex", tab6);
  
       
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
      url:'<?php echo base_url();?>Cinvoice/getvendorbyname',
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
      $(".cus").html(result[0]['currency_type']);
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
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cpurchase/delete_trucking/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been Discared";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Ccpurchase/manage_trucking";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been saved Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#exampleModalLong').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Ccpurchase/manage_trucking";
      }, 2000);
     }

$('#insert_trucking').submit(function (event) {
   
       
    var dataString = {
        dataString : $("#insert_trucking").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cpurchase/insert_trucking",
        data:$("#insert_trucking").serialize(),

        success:function (data) {
        console.log(data);
        $("#bodyModal1").html("Trucking Invoice Created Successfully");
        $('#myModal1').modal('show');
        $('#final_submit').show();
$('#download').show();
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);

            var split = data.split("/");
            $('#invoice_hdn1').val(split[0]);
         
     
         $('#invoice_hdn').val(split[1]);
       }

    });
    event.preventDefault();
});
$('#download').on('click', function (e) {
var link=localStorage.getItem("truck");
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Ccpurchase/trucking_details_data/"+$('#invoice_hdn1').val());
 
    window.setTimeout(function(){
         popout.close();
   
      }, 3000);
      e.preventDefault();

});  


$('.final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Invoice No :"+$('#invoice_hdn').val()+" has been saved Successfully";
  
    console.log(input_hdn);
 
        $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Ccpurchase/manage_trucking";
      }, 2000);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
};
 
</script>


<style>
 #btn1_download{
display:none;
 }
     #btn1_email{
        display:none;
     }
    </style>

<style>
    .ui-selectmenu-text{
        display:none;
    }
   </style>

<script>
const select = document.querySelectorAll(".currency");
const btn = document.getElementById("btn");
const num = document.getElementById("num");
const ans = document.getElementById("ans");
const err = document.getElementById("errorMSG");
const info = document.getElementById("info");
const baseFlagsUrl = "https://wise.com/public-resources/assets/flags/rectangle";
const currencyApiUrl = "https://open.er-api.com/v6/latest";

document.addEventListener('DOMContentLoaded', function(){ 
  fetch(currencyApiUrl)
    .then((data) => data.json())
    .then((data) => {
    err.innerHTML = "";
    display(data.rates);
    $('.currency').select2({
      width: 'resolve',
  
      maximumInputLength: 3
    });
    info.innerHTML = "Result: "+data.result+"<br>Provider: "+data.provider+"<br>Documentation: "+data.documentation+"<br>Terms of use: "+data.terms_of_use+"<br>Time Last Update UTC: "+data.time_last_update_utc;
    $('#pageLoader').fadeOut();
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
    $('#pageLoader').fadeOut();
  });
function display(data){
  const entries = Object.entries(data);
  for (var i = 0; i < entries.length; i++){
    select[0].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
    select[1].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
  }
  
}
});

    </script>


