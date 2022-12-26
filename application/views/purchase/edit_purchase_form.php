<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>



<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>

<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script>

<?php  error_reporting(1); ?>

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
                        <div class="row" style="height: 30px;">
                        <div class="col-sm-6" >
                            <h4><?php echo "New Expenses" ?></h4>
                            </div>  <div class="col-sm-6" >
                            <form id="histroy" method="post" >
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<input type="hidden"  value="<?php echo $purchase_info[0]['payment_id']; ?>" name="payment_id" class="payment_id"/>
<input type="submit" id="payment_history" name="payment_history" class="btn btn-primary" value="Payment_histroy" style="float:right;margin-bottom:30px;"/>
                                            </form>
                                            </div>
                        </div>


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

                            <input type="hidden"  value="<?php echo $purchase_info[0]['payment_id']; ?>"  name="payment_id"/>

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
        </div>
        <div class="row">
                        <div class="form-group row">
                       <label for="ISF NO" class="col-sm-3 col-form-label"  > ISF FIELD</label>
                                 <div class="col-sm-2">
                              <select name="isf_field" class="form-control"  onchange="bank_paymet(this.value)" tabindex="3" style="width150px">
                                              <option value=""selected>Select ISF NO</option>
                                            <option value="1"><?php echo display('NO') ?></option>
                                            <option value="2"><?php echo display('YES') ?></option>
                             </select>
                                  </div>
                    </div>
                     <div class="col-sm-5" id="bank_div">
                         <div class="form-group row">
                            <label for="ISF" class="col-sm-6   col-form-label"   >ISF NO </label>
                               <div class="col-sm-6">
                            <input name="isf_no" class="form-control bankpayment"   value=""  id="bank_id">
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
                      <?php  $d= $total_tax; 
                         $t='';
                         if($d !=='' && !empty($d)){
                            preg_match('#\((.*?)\)#', $d, $match);
                            $t=$match[1];
                          }else{
                            $t=0;
                          }
                        ?>  
                        <div class="table-responsive">
                        <table class="taxtab table table-bordered table-hover">
                        <tr>
                      <td class="hiden" style="width:30%;border:none;">
                         </td>
                
                         <td class="hiden" style="width:200px;padding:5px;background-color: #38469f;border:none;font-weight:bold;color:white;">1 <?php  echo $curn_info_default;  ?>
                                 = <input style="width:50px;text-align:center;color:black;padding:5px;" type="text" id="custocurrency_rate"/>&nbsp;<label for="custocurrency" style="color:white;background-color: #38469f;"></label></td>
                    <td style="border:none;text-align:right;font-weight:bold;">Tax : 
                                 </td>
                                <td style="width:40%">
                                <select name="tx"  id="product_tax" class="form-control" onkeyup="calculate_store({sl});" onchange="calculate_store({sl});">
<option value="<?php echo $t;  ?>" selected><?php echo $t;  ?></option>
<?php foreach($all_tax as $tx){?>
  
    <option value="<?php echo $tx['tax_id'].'-'.$tx['tax'].'%';?>">  <?php echo $tx['tax_id'].'-'.$tx['tax'].'%';  ?></option>
<?php } ?>
</select>
</td>
</tr>
</table>
<input type="hidden"  value="<?php echo $purchase_info[0]['payment_id']; ?>" name="payment_id" class="payment_id"/>
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
                                                <select class="form-control" name="slab">
                                                    <option value="Slabs">Slabs</option>
                                                     <option value="Square Feet">Square Feet</option>
                                                </select>

                                            </td>

                                            <td class="test">
                                            <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td> <input type="text" name="product_rate[]" onkeyup="calculate_store({sl});" onchange="calculate_store({sl});" id="product_rate_{sl}" class="form-control product_rate_{sl} text-right" placeholder="0.00" value="{rate}" min="0" tabindex="7"/></td>
     </tr>
   </table>
                                               

                                            </td>

                                           



                                            <td class="text-right">
                                            <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>          <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_{sl}" value="{total_amount}" readonly="readonly" /> </td>
     </tr>
   </table>
                                          

                                            </td>

                                            <td>



                                               



                                                <button  class="btn btn-danger text-right red" type="button" value="<?php echo display('delete')?>" onclick="deleteRow(this)" tabindex="8"><i class="fa fa-close"></i></button>

                                            </td>

                                    </tr>

                                    {/purchase_info}




                                </tbody>

                                <tfoot>
                                <tr>
                                   
                                   <td style="text-align:right;" colspan="4"><b><?php echo display('total') ?>:</b></td>
                                   <td style="text-align:left;">
                                   <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>  <input type="text" id="Total" class="text-right" name="total" value={total} readonly="readonly" /></td>
     </tr>
   </table></td>
                               
                                      
                               </tr>
                               
                                    <tr>
                                   
                                   <td style="text-align:right;" colspan="4"><b>Tax Details :</b></td>
                                   <td style="text-align:left;">
                                   <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>  <input type="text" id="tax_details" class="text-right" value={total_tax} name="tax_details"  readonly="readonly" /></td>
     </tr>
   </table>
                                </td>
                               
                                      
                               </tr>
                               <tr> <td style="text-align:right;" colspan="4"><b><?php echo "Grand Total" ?>:</b></td>
                                    <td>
                                    <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>   <input type="text" id="gtotal"  name="gtotal" onchange=""value="<?php echo $purchase_info[0]['grand_total_amount'];  ?>" readonly="readonly" /></td>
     </tr>
   </table>  </td>
                                        <td> <button type="button" id="add_invoice_item" class="btn btn-info" name="add-invoice-item" onclick="addPurchaseOrderField1('addPurchaseItem');"  tabindex="9" ><i class="fa fa-plus"></i></button>

                                           
                                    </tr>
                                    <tr>
                  
                
                             
                    <td style="border:none;text-align:right;font-weight:bold;" colspan="4"><b><?php echo "Grand Total" ?>:</b><br/><b>(Preferred Currency)</b></td>
                                    <td>
                                    <table border="0">
      <tr>
        <td><?php  echo $currency." ";  ?></td>
        <td>  <input type="text" id="vendor_gtotal"  name="vendor_gtotal" value="<?php echo $purchase_info[0]['gtotal_preferred_currency'];  ?>" readonly="readonly" /></td>
     </tr>
   </table>
                                            </td>
                                      

                                            <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                                    </tr> 
                                    <tr id="amt">
                                   
                                   <td style="text-align:right;"  colspan="4"><b><?php echo "Amount Paid" ?>:</b></td>
                                 
                                   <td>
                                   <table border="0">
      <tr>
      <td class="cus" name="cus"></td>
        <td>    <input type="text" id="amount_paid"  value="<?php echo $purchase_info[0]['paid_amount'];  ?>" name="amount_paid"  readonly="readonly" /> </td>
     </tr>
   </table>   </td>
                                   </tr> 
                                   <tr id="bal">
                                   <td style="text-align:right;"  colspan="4"><b><?php echo "Balance Amount " ?>:</b></td>
                                   <td>
                                   <table border="0">
      <tr>
      <td class="cus" name="cus"></td>
        <td>  <input type="text" id="balance"  name="balance" value="<?php echo $purchase_info[0]['balance'];  ?>" readonly="readonly" />       </td>
     </tr>
   </table> 
                                   </td>
                                   </tr> 
                                  
                                   <tr style="border-right:none;border-left:none;border-bottom:none;border-top:none">
                                      
                                   <td colspan="6" style="text-align: end;">
                               <input type="submit" value="Make Payment" class="btn btn-primary btn-large" id="paypls"/>
                                   </td>
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
                        <div class="col-sm-1"></div>
                            <div class="col-sm-6">

                            <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-purchase" value="Save" />
                            <a  style="color: #fff;"  id="final_submit" class='final_submit btn btn-primary'>Submit</a>

<a id="download" style="color: #fff;" class='btn btn-primary'>Download</a>
                            </div>

                        </div>

        

                    </div>

                </div>
</form>
    <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
            </div>

        </div>



</div>
</div>
    </section>
                                    
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
  <div class="modal fade" id="payment_history_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 1000px;min-width: max-content;margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" id="history_close" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">PAYMENT HISTORY</h4>
        </div>
        <div class="modal-body1">
        <div id="salle_list"></div>
     
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
  <div class="modal fade" id="add_bank_info">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
<select name="currency" class="currency" id="currency2" style="width: 95%;"></select>
<input type="hidden" name="" id="ans" disabled>
</div>
<small id="errorMSG" style="display:none;"></small>
<br><br>
</div>
 </div>

</div>



  </div>



  <div class="modal-footer">

      



      
      <input type="submit" id="addBank"  name="addBank" class="btn btn-primary" value="<?php echo display('save') ?>"/>
     <!--  <input type="submit" class="btn btn-success" value="Submit"> -->

  </div>

</form>
  </div>
  </div>
  </div>                
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
<?php foreach($bank_list as $b){ ?>
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
<style>
    .td{
    width: 200px;
    text-align-last: end;
    border-right: hidden;
}
        input {
    border: none;

 }

 .text-right {
    text-align: left; 
}
</style>      
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
   // calculate();
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

        $(document).ready(function() {
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


$('#productname').on('change', function() {
    var val=$('#productname').val();
  $('#productid').val(val);
});

      $(document).ready(function(){
   // $('#payment_modal').modal("show");
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
$('#vendor_gtotal').val(custo_final);  
calculate();
var first=$("#Total").val();
var custo_amt=$('#custocurrency_rate').val();
var valuee=first*custo_amt;
console.log(first+"/"+custo_amt);
$("#gtotal").val(first*custo_amt);
var custo_final = isNaN(parseInt(valuee)) ? 0 : parseInt(valuee)
$('#vendor_gtotal').val(custo_final);  
var paid=$('#amount_paid').val();
$('#balance').val(custo_final-paid);
});
});
$( document ).ready(function() {
    $('#vendor_gtotal').on('change textInput input', function (e) {
        var vendor=$('#vendor_gtotal').val();
        var paid=$('#amount_paid').val();
        var b=parseInt(vendor-paid);
    calculate();
});
$('#custocurrency_rate').on('change textInput input', function (e) {
    var first=$("#Total").val();
var custo_amt=$('#custocurrency_rate').val();
var valuee=parseInt(first*custo_amt);
console.log(first+"/"+custo_amt);
$("#gtotal").val(first*custo_amt);
    var total=$('#Total').val();
var tax= $('#product_tax').val();

var field = tax.split('-');

var percent = field[1];
percent=percent.replace("%","");
 var answer = (percent / 100) * parseInt(total);
$('#final_gtotal').val(answer); 
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
 
   var first=$("#Total").val();
var custo_amt=$('#custocurrency_rate').val();
var valuee=first*custo_amt;
console.log(first+"/"+custo_amt);
$("#gtotal").val(first*custo_amt);
var custo_final = isNaN(parseInt(valuee)) ? 0 : parseInt(valuee)
$('#vendor_gtotal').val(custo_final);  
var paid=$('#amount_paid').val();
$('#balance').val(custo_final-paid);
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
 localStorage.setItem("customer_grand_amount_sale",num);

 var value=parseInt(num*custo_amt);
 var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);
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
localStorage.setItem("customer_grand_amount_sale",num);

var custo_amt=$('#custocurrency_rate').val();

console.log(num +"-"+custo_amt);
var value=parseInt(num*custo_amt);
var custo_final = isNaN(parseInt(value)) ? 0 : parseInt(value)
$('#vendor_gtotal').val(custo_final);  
}


function payment_info(){
   
  var data = {
       gtotal:$('#vendor_gtotal').val(),
       customer_name:$('#customer_name').val()
  
    };
    data[csrfName] = csrfHash;

    $.ajax({
        type:'POST',
        data: data, 
     dataType:"json",
        url:'<?php echo base_url();?>Cinvoice/get_payment_info',
        success: function(result, statut) {
           
          $("#amount_paid").val(result[0]['amt_paid']);
          $("#balance").val(result[0]['balance']);
            console.log(result);
        }
    });
}
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

   $('#paypls').on('click', function (e) {
   $('#amount_to_pay').val($('#balance').val());
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
           $('#myModal1').modal('show');
           $('#add_bank_info').modal('hide');
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

$( document ).ready(function() {
    $('#final_submit').hide();
$('#download').hide();
                      

$('#vendor_gtotal').on('change textInput input', function (e) {
   var v_g_t=$('#vendor_gtotal').val();
   var amount_paid =$("#amount_paid").val();
   var bal= parseInt(v_g_t) - Number(amount_paid);
   console.log("Bal :");
   $('#balance').val(bal);
});

$('#Total').on('change textInput input', function (e) {
    var total=$('#Total').val();
   var tax_details =$("#tax_details").val();
   var bal= parseInt(total) + Number(tax_details);
   $('#gtotal').val(bal);
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
$('#payment_history').click(function (event) {
   
       
   var dataString = {
       dataString : $("#histroy").serialize()
   
  };
  dataString[csrfName] = csrfHash;
 
   $.ajax({
       type:"POST",
       dataType:"json",
       url:"<?php echo base_url(); ?>Cinvoice/payment_history",
       data:$("#histroy").serialize(),

       success:function (data) {
        var gt=$('#vendor_gtotal').val();
        var amtpd=data.amt_paid;
        console.log(gt+"^"+amtpd);
        var bal= parseFloat($('#vendor_gtotal').val()) - Number(data.amt_paid);
var total= "<table class='table table-striped table-bordered'><tr><td rowspan='2' style='vertical-align: middle;text-align-last: center;'><b>Grand Total :  <?php  echo $currency;  ?>"+$('#vendor_gtotal').val()+"<b></td><td class='td' style='border-right: hidden;'><b>Total Amount Paid :<b></td><td><?php  echo $currency;  ?>"+data.amt_paid+"</td></tr></tr><td class='td' style='border-right: hidden;'><b>Balance :<b></td><td><?php  echo $currency;  ?>"+bal +"</td></tr></table>"
        var table_header = "<table class='table table-striped table-bordered'><thead style='FONT-WEIGHT:BOLD;'><tr><td>S.NO</td><td>Payment Date</td><td>Reference.NO</td><td>Bank Name</td><td>Amount Paid</td><td>Balance</td><td>Details</td></tr></thead><tbody>";
                   var table_footer = "</tbody></table>";
                var html ="";
var count=1;
               data.payment_get.forEach(function(element) {
              
              html += "<tr><td>"+count +"</td><td>"+element.payment_date+"</td><td>"+element.reference_no+"</td><td>"+element.bank_name+"</td><td><?php  echo $currency;  ?>"+element.amt_paid+"</td><td><?php  echo $currency;  ?>"+element.balance+"</td><td>"+element.details+"</td></tr>";
         count++;
            });



                var all = total+table_header +html+ table_footer;

               

                $('#salle_list').html(all);
                            $('#payment_history_modal').modal('show');
      
       
      
      }

   });
   event.preventDefault();
});

$( "#balance" ).on('change', function(){
   var bl=$(this).val();
   console.log("bl : "+bl);
   if(bl<=0){
    $('#paypls').hide();
   }
});
    </script>
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


