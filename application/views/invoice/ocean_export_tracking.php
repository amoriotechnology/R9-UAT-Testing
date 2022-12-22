<!-- Product Purchase js -->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<!-- Datepicker -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Ocean Export Tracking</h1>
            <small>Generate New Ocean Export Tracking</small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Ocean Export Tracking</a></li>
                <li class="active">Generate New Ocean Export Tracking</li>
            </ol>
        </div>
    </section>


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales - Ocean Export</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
         
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
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
                            <h4>Create New Ocean Export Tracking Invoice</h4>
                        </div>
                    </div>

                    <div class="panel-body">
                    <form id="insert_ocean"  method="post">                   

                        <div class="row">
                           
                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Shipper
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="supplier_id" id="supplier_id" class="form-control " required="" tabindex="1"> 
                                            <option value=" "><?php echo display('select_one') ?></option>
                                            {all_supplier}
                                            <option value="{supplier_id}">{supplier_name}</option>
                                            {/all_supplier}
                                        </select>
                                    </div>
                                  <?php if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-2">


                                     <!--    <a class="btn btn-success" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a> -->



                                          <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#add_vendor"><i class="fa fa-user"></i></a>


                                    </div>
                                <?php }?>
                                </div> 
                            </div>


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="booking_no" class="col-sm-4 col-form-label">Booking No.
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="booking_no" placeholder="Booking or B/L number" id="booking_no" required />
                                    </div>
                                </div>
                            </div>




                            
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="invoice_date" value="<?php echo $date; ?>" id="date"  required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Customer / Consignee <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <div class="form-group row">
                                    <div class="col-sm-6">
                                    <select name="consignee" id="consignee" class="form-control " required="" tabindex="1">
                                            <option value=" "><?php echo display('select_one') ?></option>
                                           <?php
                                           foreach($customer_name as $cus_name)
                                           {
                                           ?>
                                            <option value="<?php echo $cus_name['customer_id']; ?>"><?php echo $cus_name['customer_name']; ?></option>
                                         <?php } ?>
                                        </select>
                                        </div>
                                        <div class="col-sm-2">
                                        <?php if($this->permission1->method('add_customer','create')->access()){ ?>

<a href="<?php echo base_url('Ccustomer') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('add_customer') ?> </a>

<?php }?>
                                      
</div>
</div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
   

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Notify Party
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="notify_party" placeholder="Notify Party" id="notify_party" required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Vessel
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="vessel" name="vessel" placeholder="Vessel" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
   


                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Voyage No.
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="voyage_no" placeholder="Voyage No." id="voyage_no" required/>
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of loading
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_loading" placeholder="Port of loading" id="port_of_loading" required/>
                                    </div>
                                </div>
                            </div>


                          
                        </div>


                          <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of discharge
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_discharge" placeholder="Port of discharge" id="port_of_discharge" required/>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Place of Delivery <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="place_of_delivery" name="place_of_delivery" placeholder="Place of Delivery" rows="1" required></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Container No
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       <textarea class="form-control" tabindex="4" id="container_no" name="container_no" placeholder="Container No" rows="1" required></textarea>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="seal_no" class="col-sm-4 col-form-label">Seal No <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="seal_no" name="seal_no" placeholder="Seal No" rows="1" required></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="Freight forwarder" class="col-sm-4 col-form-label">Freight forwarder
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       <input field class="form-control" tabindex="4" id="Freight forwarder" name="freight_forwarder" placeholder="Freight forwarder" rows="1" required>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                               <label for="adress" class="col-sm-4 col-form-label">Attachements
                                    </label>
                                    
                                    <div class="col-sm-6">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                    
                                    <div class="col-sm-2">
                                    <button type="button" class="btn btn-info m-b-5 m-r-2" data-toggle="modal" data-target="#myModal">
                                    Track Online</button>
                                   
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Estimated time of departure
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="etd" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Estimated Time of Arrival <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="eta" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="particulars" class="col-sm-2 col-form-label">Particulars
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-10">
                                       <textarea class="form-control" tabindex="4" id="particular" name="particulars"  rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
               
                                        
                      
                       
                        
                        
                        
                        
                        
                        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("hide");
            $( "#datepicker-12" ).datepicker();
            $( "#datepicker-12" ).datepicker("hide");
         });
      </script>
   </head>
   
  
     
   
<br>
                       

<div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add_purchase" class="btn btn-primary btn-large" name="add-ocean-Export" value="Save" />
                                                       
                               <a  style="color: #fff;"  id="final_submit" class='final_submit btn btn-primary'>Submit</a>

<a id="download" style="color: #fff;" class='btn btn-primary'>Download</a>  
<a id="email_btn" style="color: #fff;" class='btn btn-primary'>Send Email with Attachment</a> 

                            </div>
                        </div>



                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!--
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

 
      <div class="modal-header">
        <h4 class="modal-title">Online Tracking</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
      Vessel
      <br/>
      container no
      <br/>
      tracking
  </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>-->

<!-- Purchase Report End -->
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
           <?php echo form_open_multipart('Csupplier/insert_supplier', array('id' => 'insert_supplier')) ?>
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
             <select  style="width: 99px;"  class="form-control" name="service_provider">
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
  </div>
  <div class="form-group row">
          <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Preferred Currency" ?></label>
          <div class="col-sm-6">
          <select name="currency1" class="currency" id="currency1" style="width: 100%;">
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
<div class="modal-footer">
                          <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>
                          <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"  class="btn btn-success" value="Submit">
                      </div>
                      </div>
                  </div>
              </div>
          </div>
          </form>


    <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
        <div class="modal-header" style="">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales - Ocean</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
      
     
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

<script type="text/javascript">
            var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
        $(document).ready(function(){

            $('#final_submit').hide();
$('#download').hide();
$('#email_btn').hide();   
        });
        $('#insert_ocean').submit(function (event) {
    var dataString = {
        dataString : $("#insert_ocean").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cinvoice/insert_ocean_export",
        data:$("#insert_ocean").serialize(),

        success:function (data) {
        console.log(data);
        var split = data.split("/");
        var input_hdn="Ocean Export Created Successfully";
  
  console.log(input_hdn);
  $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
     
           $('#invoice_hdn').val(split[0]);
           $('#invoice_hdn1').val(split[1]);
       }

    });
    event.preventDefault();
});
$('#download').on('click', function (e) {
var link= $('#invoice_hdn').val();
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/ocean_export_tracking_details_data/"+link);
 
    window.setTimeout(function(){
         popout.close();
      
      }, 2500);
      e.preventDefault();

});  
$('#add_purchase').on('click', function (e) {
    
    $('#myModal1').modal('show');
    window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);

$('#final_submit').show();
$('#download').show();
$('#email_btn').show();   
});
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cinvoice/delete_ocean_export/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking No :"+$('#invoice_hdn1').val()+" has been Discarded";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
        var input_hdn="Your Booking List No :"+$('#invoice_hdn1').val()+" has been Created Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
     }

$('#final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking  No :"+$('#invoice_hdn1').val()+" has been Created Successfully";
  
    console.log(input_hdn);
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
}
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
            $("#bodyModal1").html("Add New Vendor Saved Successfully");
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
    </script>
 

    

<!-- script for currency selector -->
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
      templateResult: formatFlags,
      templateSelection: formatCountry,
      maximumInputLength: 3
    });
    info.innerHTML = "Result: "+data.result+"<br>Provider: "+data.provider+"<br>Documentation: "+data.documentation+"<br>Terms of use: "+data.terms_of_use+"<br>Time Last Update UTC: "+data.time_last_update_utc;
    $('#pageLoader').fadeOut();
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
    $('#pageLoader').fadeOut();
  });
  $('.currency').on('select2:select', function (e) {
    let currency1 = select[0].value;
    let currency2 = select[1].value;
    let num1 = num.value;
    convert(currency1, currency2, num1)
  });
}, false);
function display(data){
  const entries = Object.entries(data);
  for (var i = 0; i < entries.length; i++){
    select[0].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
    select[1].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
  }
  if ($('#currency2').find("option[value='CLP']").length) {
    $('#currency2').val('CLP').trigger('change');
    $('#num').val(1);
    let currency1 = select[0].value;
    let currency2 = select[1].value;
    let num1 = num.value;
    convert(currency1, currency2, num1)
  }
}
function formatFlags (country) {
  if (!country.id) {
    return country.text;
  }
  var $countryFlag = $('<span><img src="' + baseFlagsUrl + '/' + country.element.value.toLowerCase() + '.png" class="img-flag" /> ' + country.text + '</span>');
  return $countryFlag;
}
function formatCountry (country) {
  if (!country.id) {
    return country.text;
  }
  var $countryFlag = $('<span><img class="img-flag"/> <span></span></span>');
  $countryFlag.find("span").text(country.text);
  $countryFlag.find("img").attr("src", baseFlagsUrl + "/" + country.element.value.toLowerCase() + ".png");
  return $countryFlag;
}
function convert(currency1, currency2, value){
  fetch(`${currencyApiUrl}/${currency1}`)
    .then((val) => val.json())
    .then((val) => {
    console.log('Converting ' +currency1 + ' to '+currency2);
    var res  = val.rates[currency2] * value
    ans.value = res.toFixed(2);
    err.innerHTML = "";
  }).catch(function(error) {
    err.innerHTML = "Error: " + error;
  });
}
    </script>
<!-- style for currency list   -->
<style>
.img-flag{
  max-height: 11px;
 display: none;
}
    </style>



