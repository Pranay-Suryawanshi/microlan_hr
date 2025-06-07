 
      <!--sidebar-wrapper--> 
      <?php include_once('header.php') ?>
      <style>
        .checked {
          color: orange;
        }
         .save-btn {
            display: none; /* Initially hidden */
        }
        </style>
      <!--end header-->
      <!--page-wrapper-->
      <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
          <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Edit Proposal </div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                      <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                      </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Proposal </li>
                  </ol>
                </nav>
              </div>
             
            </div>
           
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-lg-12 border-right">
                  <form method="post" class="form-validate row g-3" name="proposal_form"  action="<?php echo base_url('update-praposals/'.$res['lp_id'].'/'.$res['lead_id']); ?> " onsubmit="return validate_edit_proposal(this)" enctype="multipart/form-data">

                    <!--<form class="row g-3">-->
                   
                     <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Subject </label>
                          <input type="text" name="subject" value="<?php echo $res['subject']; ?>" class="form-control" id="subject" placeholder="Enter your subject." >
                          <span id="err_subject" style="color:red;"></span>
                        </div>
                      </div>
                      <input type="hidden" name="lead_id" class="form-control" id="lead_id"  value="<?php echo $res['lead_id'] ?>">
                      <input type="hidden" name="old_template_id" class="form-control" id="old_template_id"  value="<?php echo $res['template_id'] ?>">
                      <!--<div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Related </label>
                          <select class="form-control" name="related" id="related"> 
                            <option value="1" selected="">Lead</option>
                            <option value="2">Customer</option>
                          </select>
                        </div>
                      </div>-->
                      <!--<div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Lead </label>
                           <input type="text" name="lead" class="form-control" id=""  value="">
                        </div>
                      </div>-->
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Date</label>
                          <input type="date" class="form-control" name="date" id="date" value="<?php echo $res['date']; ?>">
                        </div>
                      </div>
                        <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Valid Till</label>
                          <input type="date" class="form-control" name="open_till" id="open_till" value="<?php echo $res['open_till']; ?>">
                        </div>
                        <span id="err_opent" style="color:red;"></span>
                      </div>

                       <!--<div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Project  </label>
                           <input type="text" name="lead" class="form-control" id=""  value="">
                        </div>
                      </div>

                       <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Tag  </label>
                           <input type="text" name="lead" class="form-control" id=""  value="">
                        </div>
                      </div>-->

                       <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Attachment  </label>
                           <input type="file" name="attachment" id="attachment" class="form-control" id=""  value="">
                        </div>
                      </div>

                       <div class="col-sm-3 mt-3">
                        <div class="row">
                           <div class="col-sm-9">
                              <div class="form-group">
                                <label for="companyName">Select Template  </label>
                                <select class="form-control" name="template_id" id="template_id"  data-placeholder="Select template">
                                  <option></option>
                                  <?php 
                       foreach($template_list as $key => $val) {?>
                         <option value="<?php echo $val['template_id']; ?>" <?php if(in_array($val['template_id'],explode(',',$res['template_id']))){echo "selected=''"; } ?>><?php echo $val['title']; ?></option>
                       <?php
                      
                                }?>
                                </select>
                              </div>
                              <span id="err_temp" style="color:red;"></span>
                           </div>
                           <div class="col-sm-3">
                             <button class="btn btn-primary" type="button" style="margin-top: 20px" onclick="edit_customer_tempate()"><i class="fa fa-edit"></i></button>
                           </div>
                        </div>
                       
                      </div>


                      <hr>








                       <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Status </label>
                          <select class="form-control" name="pl_status" id="pl_status">
                       <option value="1" <?php if($res['pl_status']==1){echo "selected=''"; } ?>>Draft</option>
                       <option value="2" <?php if($res['pl_status']==2){echo "selected=''"; } ?>>Send</option>
                        <option value="3" <?php if($res['pl_status']==3){echo "selected=''"; } ?>>Open</option>
                       <option value="4" <?php if($res['pl_status']==4){echo "selected=''"; } ?>>Revised</option>
                       <option value="5" <?php if($res['pl_status']==5){echo "selected=''"; } ?>>Declined</option>
                       <option value="6" <?php if($res['pl_status']==6){echo "selected=''"; } ?>>Accepted</option>
                      </select>
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Assigned </label>
                          <select class="form-control" name="assigned" id="assigned">
                        <option></option>
                        <?php 
                       foreach($member_list as $key => $value) {?>
                         <option value="<?php echo $value['op_user_id']; ?>" <?php if($res['assigned']==$value['op_user_id']){echo "selected=''"; } ?>><?php echo $value['user_name']; ?></option>
                       <?php
                      }?>
                      </select>
                        </div>
                      </div>
                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">To(Contact Person)  </label>
                           <input type="text" name="lp_to"  class="form-control" id="lp_to" value="<?php echo $res['lp_to'] ?>">
                        </div>
                      </div>

                      <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Email  </label>
                           <input type="email" name="email" class="form-control" id="email"  value="<?php echo $res['email'] ?>">
                        </div>
                      </div>

                         <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Phone  </label>
                           <input type="number" name="phone" class="form-control" id="phone"  value="<?php echo $res['phone'] ?>">
                        </div>
                      </div>

                      
                        <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">State</label>
                          <select class="form-control" name="state" id="state">
                        <option></option>
                        <?php  if(!empty($states)){
                              foreach ($states as $key => $value) { ?>
                            <option value="<?php echo $value['state_id']; ?>"
                  <?php if($value['state_id']==$res['state']){ echo "selected='selected'"; } ?>><?php echo $value['state_name']; ?></option>
                            <?php } } ?>
                      </select>
                        </div>
                        <span id="err_state" style="color:red;"></span>
                      </div>

                       <div class="col-sm-3 mt-3">
                        <div class="form-group">
                          <label for="companyName">Zip Code  </label>
                           <input type="text" name="zip_code" class="form-control" id="" value="<?php echo $res['zip_code'] ?>">
                        </div>
                      </div>

                      







                      <div class="col-sm-12 mt-3">
                        <div class="form-group">
                           <label for="companyName">Address</label>
                          <textarea class="form-control" id="address" name="address"><?php echo $res['address'] ?></textarea>
                        </div>
                      </div>

                       
                      
                      <!--<div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block">Save  </button>
                  </div>-->
                  </div>
                  
                  
                </div>
              </div>
            </div>



             <div class="card">
            <div class="card-body">
              <div class="row"> 
               <div class="form-group col-sm-4">
                <label for="inputcompany" class="  col-form-label">Add Item</label>
                <select class="form-control" name="add_item" id="add_item1" >
                        <option></option>
                        <?php  if(!empty($service_list)){
                              foreach ($service_list as $key => $val_serv) { ?>
                            <option value="<?php echo $val_serv['product_id']; ?>"><?php echo $val_serv['product_name']; ?></option>
                            <?php } } ?>
                      </select>
                </div>

                 <div class="form-group col-sm-2" style="padding-top: 34px;">
                <label for="inputcompany" class=" col-form-label">Show quantity as</label>
               </div>
               <div class="form-group col-sm-1" style="padding-top: 45px;">
                  <input type="radio" name="show_quantity_as" id="show_quantity_as_q" value="1">
                  <label>Qty</label>
                </div>  

                <div class="form-group col-sm-1" style="padding-top: 45px;">
                  <input type="radio" name="show_quantity_as" id="show_quantity_as" value="2">
                  <label>Hours</label>
                </div>
                <div class="form-group col-sm-2" style="padding-top: 45px;">
                
                  <input type="radio" name="show_quantity_as" id="show_quantity_as" value="3">
                  <label>Qty/Hours</label>
                
              </div>
  </div>
    <div class="row"> 
               <div class="  col-sm-12">
  <div class="card-body mt-3">
    <div class="table-responsive">
    <table class="table table-sm">
      <thead>
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Days</th>
          <th><span id="qty_type">Qty</span></th>
          <th>Rate</th>
          <th>Amount</th>
          <td><i class="fa fa-cog"></i></td>
        </tr>
        <tr>
          <td><textarea id="service_item"></textarea></td>
          <td><textarea id="service_description"></textarea></td>
          <td><input type="text" class="form-control" id="days"></td>
          <!--<td><input type="number" class="form-control" id="service_qty" value="1"></td>-->
          <td><input type="hidden" class="form-control" id="lead_id"  value="<?php echo $res['lead_id']; ?>"><input type="number" class="form-control service_qty1" id="service_qty" value="1"></td>
          <td><input type="number" class="form-control service_qty1" id="service_rate"></td>
          <td><span id="price">0.00</span></td>
          <td><input type="button" id="add_item_save" value="Add" class="btn btn-primary"></td>
        </tr>
      </thead>
      <tbody id="records">
      <?php

$sub_total='0.00';
  if(!empty($invoices_details))
  {


    foreach ($invoices_details as $key => $value) { 

        
      ?>
<tr>
                                       <td><textarea><?php echo $value['product_name']; ?></textarea></td>
                                       <td><textarea><?php echo $value['description']; ?></textarea></td>
                                         <td><input type="number" class="form-control"  value="<?php echo $value['days']; ?>" readonly=""></td>
                                       <td><input type="number" class="form-control"  value="<?php echo $value['qty']; ?>" readonly=""></td>
                                       <td><input type="number" class="form-control" value="<?php echo $value['price']; ?>" readonly=""></td>
                                      
                                       <td><span><?php echo $value['price']*$value['qty']; $sub_total+=$value['price']*$value['qty']; ?></span></td>
                                       <td><a href="javascript:void(0);" onclick="delete_item(<?php echo $value['cart_id']; ?>)">
                                            <i class="fa fa-trash"></i>
                                        </a></td>
                                        
                                       
                                       <td> <input type="hidden" id="invoice_number" name="invoice_number" class="form-control" value="<?php echo $value['session_id']; ?>">  </td> 
                                    </tr>
                                          
                                        <?php  }
                                        }
                                    ?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"></td>
          <td>Sub Total :</td>
          <td colspan="2"><span id="sub_total_amt"><?php echo $sub_total; ?></span><input type="hidden" class="form-control" id="sub_total" name="sub_total" value="<?php echo $sub_total; ?>"></td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td>
            <select class="form-control" id="discount_type_cal" name="discount_type">
              <option>--Discount Type--</option>
              <option value="1" <?php if($res['discount_type']==1){ echo "selected=''";} ?>>Percentage %</option>
              <option value="2" <?php if($res['discount_type']==2){ echo "selected=''";} ?>>Flat</option>
            </select>
          </td>
          <td colspan="2"><input type="number" class="form-control" id="discount_amt"  oninput="calculateDiscount()"></td>
          <td colspan="2"><input type="text" class="form-control" id="discount" name="discount" value="<?php echo $res['discount']; ?>" readonly></td>
        </tr>
        <tr>
          <td colspan="4"></td>
          <td>Adjustment :</td>
          <td colspan="2"><input type="number" class="form-control" id="adjustment" name="adjustment" value="<?php echo $res['adjustment']; ?>" oninput="calculateAdjustment()"></td>
        </tr>
        <tr>
          <td colspan="4"></td>
          <td>GST Amount :</td>
          <td colspan="2"><input type="number" class="form-control" id="totalgstamt" name="totalgst" value="<?php echo $res['totalgst']; ?>" readonly></td>
        </tr>
        <tr>
          <td colspan="4"></td>
          <td>Total Amount :</td>
          <td colspan="2"><input type="number" class="form-control" id="stotal_amount" name="total_amount" readonly value="<?php echo ($sub_total+$res['totalgst']+$res['adjustment'])-$res['discount']; ?>"></td>
        </tr>
      </tfoot>
    </table>
  </div>
  </div>

  <div class="card-footer">
  <input type="hidden" id="calTotal" name="calTotal" value="<?php echo $sub_total; ?>">
    <button type="submit" class="btn btn-info float-right">Update</button>
  </div>
</div>
</div>
               </div> 
            
              </div>
          

     
          </div>
        </div>
      </div>
      </form>
      <!--end page-content-wrapper-->
    </div>
    
    <!--end page-wrapper-->
    <!--start overlay-->
    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->
    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top">
      <i class='bx bxs-up-arrow-alt'></i>
    </a>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    

     <script>
        document.addEventListener('DOMContentLoaded', () => {
            const table = document.getElementById('example2');

            table.addEventListener('click', (event) => {
                // Handle Edit Button
                if (event.target.closest('.edit-btn')) {
                    const row = event.target.closest('tr');
                    row.dataset.editing = 'true';
                    const saveBtn = row.querySelector('.save-btn');
                    saveBtn.style.display = 'inline-block'; // Show Save button

                    row.querySelectorAll('td:not(:first-child):not(:nth-child(2))').forEach(cell => {
                        const currentValue = cell.textContent;
                        cell.innerHTML = `<input type="text" value="${currentValue}">`;
                    });
                }

                // Handle Save Button
                if (event.target.closest('.save-btn')) {
                    const row = event.target.closest('tr');
                    row.dataset.editing = 'false';
                    const saveBtn = row.querySelector('.save-btn');
                    saveBtn.style.display = 'none'; // Hide Save button

                    row.querySelectorAll('td:not(:first-child):not(:nth-child(2))').forEach(cell => {
                        const input = cell.querySelector('input');
                        if (input) {
                            cell.textContent = input.value; // Save the value
                        }
                    });
                }
            });
        });
    </script>
<script>
  function edit_customer_tempate()
  {
     var template_id= $('#template_id').val();
     var lead_id= $('#lead_id').val();
     var old_template_id= $('#old_template_id').val();
      var lead='<?php echo $this->uri->segment(2); ?>';

      if(template_id=='')
     {
      alert('Plase select the template');
      return false;
     }

    

    // window.open("<?php echo base_url('edit-template/')?>"+template_id+'&lead='+lead, '_blank');
     var newTab= window.open("<?php echo base_url('edit-template/')?>"+template_id+'?lead_id='+lead_id+'&otemplate_id='+old_template_id+'&lead='+lead, '_blank');
      //window.location.href = "<?php echo base_url('edit-template/')?>"+template_id+'?cust_id='+customer;

      // Check if the tab is closed and refocus on the main page
    var checkTabClosed = setInterval(function() {
        if (newTab.closed) {
            clearInterval(checkTabClosed);
            window.focus(); // Refocus on the original page
        }
    }, 1000);
  }

  
    document.addEventListener("DOMContentLoaded", function() {
        let dateInput = document.getElementById("date");
        let openTillInput = document.getElementById("open_till");

        // Function to set Open Till date 10 days after selected Date
        function updateOpenTillDate() {
            let selectedDate = new Date(dateInput.value);
            selectedDate.setDate(selectedDate.getDate() + 10); // Add 10 days
            open_till.value = selectedDate.toISOString().split('T')[0];
        }

        // Run on page load (default behavior)
        updateOpenTillDate();

        // Update Open Till date when Date is changed
        dateInput.addEventListener("change", updateOpenTillDate);
    });

    $(function () {
    $('input[name="show_quantity_as"]:radio').change(function () {
      qty_typ=$("input[name='show_quantity_as']:checked").val();
      if(qty_typ==2)
      {
        $('#qty_type').text('Hours');
      }else if(qty_typ==3)
      {
         $('#qty_type').text('Qty/Hours');
      }else{
        $('#qty_type').text('Qty');
      }
    });
});
  $("#show_quantity_as_q").prop("checked", true);

  // function edit_customer_tempate()
  // {
  //    var template_id= $('#template_id').val();
  //    var customer= $('#customer').val();
  //     var lead='<?php echo $this->uri->segment(2); ?>';
  //     if(template_id=='')
  //    {
  //     alert('Plase select the template');
  //     return false;
  //    }
  //     window.open("<?php echo base_url('edit-template/')?>"+template_id+'?cust_id='+customer+'&lead='+lead, '_blank');
  //     //window.location.href = "<?php echo base_url('edit-template/')?>"+template_id+'?cust_id='+customer;
  // }


  //$('.select2').select2()

  $(document).ready(function() {
   // console.log(typeof jQuery);
  $("#add_item1").change(function(){//alert("11");
  var serv_id=$('#add_item1').val();
 
  var form_data = new FormData(); 
      form_data.append('serv_id',serv_id);
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('lead/get_item'); ?>",
                     dataType: 'text', 
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,  
                    //cache: false,
                    success: function(data){
                        var res =JSON.parse(data);
                
                    $('#service_item').text(res.product_name);
                    $('#service_description').html(res.description);
                    $('#service_rate').val(res.price);
                    if(res.price!='')
                    {
                      $('#price').text(res.price);
                    }
                   
                    }
                });

    });

    $(document).on("input change", "#service_qty, #service_rate", function() {
       // alert("Function Called!"); // Debugging
        calculatePrice();
    });

    $("#add_item_save").click(function(){ //alert("11");

      let formData = {
            serv_id: $("#add_item1").val(), 
            days: $("#days").val(),
            qty: $("#service_qty").val(),
            price: $("#service_rate").val(),
          //  total_price: $("#price").val() * $("#service_qty").val(),
            custid: '',
            //pro_id: $("#pro_id").val(),
            invoice_number: $("#invoice_number").val(),
            state_code: $("#state").val(),
            service_description: $("#service_description").val()
        };

        // AJAX request to PHP function
        $.ajax({
            url: "<?php echo base_url('lead/add_item'); ?>", // Replace with your actual URL
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                if (response.success==1) {
                   // alert("Item added successfully!");
                    get_item_cart();
                } else {
                    alert("Failed to add item!");
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", error);
            }
        });
    });


  });
  related=$('#related').val();
  if(related==2)
      {
        $('.customer').show();
        $('.lead').hide();
      }else{
          $('.lead').show();
          $('.customer').hide();
      }
 //$('.customer').hide();
  $("#related").change(function () {
        var related = this.value;
      if(related==2)
      {
        $('.customer').show();
        $('.lead').hide();
      }else{
          $('.lead').show();
          $('.customer').hide();
      }
  });

 // var dateformat = 'dd/mm/yyyy';
  //$('.hasDatepicker').datepicker({
  //format: dateformat,
  //autoclose: true
//});


  jQuery(document).ready(function($) {

    $("#customer").on('change', function() {
    var customer = $(this).val();
    var form_data = new FormData(); 
      form_data.append('customer',customer);
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('lead/get_customer_details'); ?>",
                      dataType: 'text', 
                      cache: false,
                      contentType: false,
                      processData: false,
                      data:form_data,  
                    //cache: false,
                    success: function(data){
                    var res =JSON.parse(data);
                    $('#state').val(res.state);
                    $('#zip_code').val(res.zip_code);
                    $('#email').val(res.email);
                    $('#phone').val(res.phone);
                    $('#address').text(res.address);
                    var state_id = res.state;
                    var form_data = new FormData(); 
                        form_data.append('state_id',state_id);
                    jQuery.ajax({

                          type: "POST",
                                      url: "<?php echo base_url('admin/get_city'); ?>",
                                       dataType: 'text', 
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        data: form_data,  
                      
                          success: function(res){
                              $("#city").html(res);
                          },
                          error:function(error,message){
                              console.log(message);
                          }
                        });
                  
                    }
                });
    });
});

function calculatePrice() {
        let qty = parseInt($("#service_qty").val()) || 0;
        let rate = parseInt($("#service_rate").val()) || 0;
        let total = qty * rate;
        $("#price").text(total); // Display with 2 decimal places
    }

    // Trigger calculation when quantity or rate changes
    // function get_item_cart() {
    //   alert("111");
    //   let formData = {
            
    //         invoice_number: $("#invoice_number").val(),
           
    //     };

    //     // AJAX request to PHP function
    //     $.ajax({
    //         url: "<?php echo base_url('lead/get_item_cart'); ?>", // Replace with your actual URL
    //         type: "POST",
    //         data: formData,
    //         dataType: "json",
    //         success: function(response) {
    //             if (response.success) {
    //               let cartItems = response.data;
    //             let total = 0, totalgst = 0, sub_total = 0;
    //             let recordsHtml = "";

    //             $.each(cartItems, function(index, value) {
    //                 let amount = value.price * value.qty;
    //                 total += value.rowtotal;
    //                 totalgst += value.total_gst;
    //                 sub_total += value.subtotal;

    //                 recordsHtml += `
    //                     <tr>
    //                         <td><textarea>${value.product_name}</textarea></td>
    //                         <td><textarea>${value.description}</textarea></td>
    //                         <td><input type="text" class="form-control" readonly value="${value.days}"></td>
    //                         <td><input type="number" class="form-control" readonly value="${value.qty}"></td>
    //                         <td><input type="number" class="form-control" readonly value="${value.price}"></td>
    //                         <td><span class="total_amount">${amount}</span></td>
    //                         <td>
    //                             <a href="javascript:void(0);" onclick="delete_item('${value.cart_id}');">
    //                                 <i class="far fa-trash-alt"></i>
    //                             </a>
    //                         </td>
    //                     </tr>
    //                 `;
    //             });

    //             // Append records to table body
    //             $("#records").html(recordsHtml);

    //             // Update totals in hidden fields and visible spans
    //             $("#sub_total").val(sub_total);
    //             $("#sub_total_amt").text(sub_total.toFixed(2));

    //             $("#stotal_amount").val(total);
    //             $("#total_amount").val(total);

    //             $("#totalgstamt").val(totalgst);
    //             $("#totalgst").val(totalgst);
    //         } else {
    //             $("#records").html("<tr><td colspan='7'>No items in cart</td></tr>");
    //         }
    //                // alert("Item added successfully!");
    //                // get_item_cart();
    //             } else {
    //                 alert("Failed to add item!");
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.log("AJAX Error:", error);
    //         }
    //     });
    // }

//     function get_item_cart() {
//     let invoiceNumber = $("#invoice_number").val(); // Get the invoice number

//     $.ajax({
//         url: "<?php echo base_url('lead/get_item_cart'); ?>",
//         type: "POST",
//         data: { invoice_number: invoiceNumber },
//         dataType: "json",
//         success: function(response) {
//             if (response.success ) {
//                 let cartItems = response.data;
//                 let total = 0, totalgst = 0, sub_total = 0;
//                 let recordsHtml = "";

//                 $.each(cartItems, function(index, value) {
//                     let amount = value.price * value.qty;
//                     total += value.rowtotal;
//                     totalgst += value.total_gst;
//                     sub_total += value.subtotal;

//                     recordsHtml += `
//                         <tr>
//                             <td><textarea>${value.product_name}</textarea></td>
//                             <td><textarea>${value.description}</textarea></td>
//                             <td><input type="text" class="form-control" readonly value="${value.days}"></td>
//                             <td><input type="number" class="form-control" readonly value="${value.qty}"></td>
//                             <td><input type="number" class="form-control" readonly value="${value.price}"></td>
//                             <td><span class="total_amount">${amount}</span></td>
//                             <td>
//                                 <a href="javascript:void(0);" onclick="delete_item('${value.cart_id}');">
//                                     <i class="far fa-trash-alt"></i>
//                                 </a>
//                             </td>
//                         </tr>
//                     `;
//                 });

//                 // Append records to table body
//                 $("#records").html(recordsHtml);

//                 // Update totals in hidden fields and visible spans
//                 $("#sub_total").val(sub_total);
//                 $("#sub_total_amt").text(sub_total.toFixed(2));

//                 $("#stotal_amount").val(total);
//                 $("#total_amount").val(total);

//                 $("#totalgstamt").val(totalgst);
//                 $("#totalgst").val(totalgst);
//             } else {
//                 $("#records").html("<tr><td colspan='7'>No items in cart</td></tr>");
//             }
//         }
       
//     });
// }

function get_item_cart() {
    let invoiceNumber = $("#invoice_number").val(); // Get the invoice number

    $.ajax({
        url: "<?php echo base_url('lead/get_item_cart'); ?>",
        type: "POST",
        data: { invoice_number: invoiceNumber },
        dataType: "json",  // Change dataType to 'json' since we are returning JSON
        success: function(response) {
            if (response.cart_items && response.cart_items.length > 0) {//alert("record got");
                // Empty current records before appending
                $("#records").empty();

                // Append new rows to the table
                response.cart_items.forEach(function(item) {
                    $("#records").append(`
                        <tr>
                            <td><textarea>${item.product_name}</textarea></td>
                            <td><textarea>${item.description}</textarea></td>
                            <td><input type="text" class="form-control" readonly="" value="${item.days}"></td>
                            <td><input type="number" class="form-control" value="${item.qty}" readonly=""></td>
                            <td><input type="number" class="form-control" value="${item.price}" readonly=""></td>
                            <td><span class="total_amount">${item.amount}</span></td>
                            <td><a href="javascript:void(0);" onclick="delete_item('${item.cart_id}');"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    `);
                });

                // Update total, subtotal, and GST fields
                $("#sub_total_amt").text(response.sub_total_amount.toFixed(2));
                $("#sub_total").val(response.sub_total_amount);

                $("#total_amount").val(response.total_amount.toFixed(2));
                $("#stotal_amount").val(response.total_amount.toFixed(2));
                $("#calTotal").val(response.sub_total_amount.toFixed(2));

                $("#totalgstamt").val(response.totalgst.toFixed(2));
                $("#totalgst").val(response.totalgst.toFixed(2));
                let discountAmt = parseFloat($("#discount_amt").val()) || 0;
                if (discountAmt > 0) {
                    calculateDiscount();
                }

            } else {
                alert("No items in the cart.");
            }
        },
        error: function(xhr, status, error) {
            console.log("AJAX Error:", error);
        }
    });
}

function validate_edit_proposal(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	var  subject = $("#subject").val();
  var  open_till = $("#open_till").val();
	var state = $('#state option:selected').val();
   var template_id = $('#template_id option:selected').val();
   
 
        
        if( subject.trim()=='') { 
        
         $('#err_subject').text('Please enter subject');
           hasError = 1; } else {
            $('#err_subject').text(''); // Clear error if valid
        }
         
		if(open_till.trim()=='') {
       
       $('#err_opent').text('Please select open till date');
        hasError = 1; }else {
            $('#err_opent').text(''); // Clear error if valid
        }
      
    if(state.trim()=='') 
    { 
      
      $('#err_state').text('Please select state');
      hasError = 1; } else {
            $('#err_state').text(''); // Clear error if valid
        }
   
   

       if(template_id.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err_temp').text('Please select any one template');
       hasError = 1; }
       else {
            $('#err_temp').text(''); // Clear error if valid
        }

       
	if(hasError==1){
		return false;
	}else{
		return true;
	}  
}


function calculateDiscount() {
  var discountType = document.getElementById('discount_type_cal').value;
  var discountAmt = parseFloat(document.getElementById('discount_amt').value) || 0;
  var adjustmentAmt = parseFloat(document.getElementById('adjustment').value) || 0 ;
  var totalAmount = parseFloat(document.getElementById('calTotal').value);  // Replace this with your actual total amount
  var discountedTotal = 0;
  var disAmount=0;
 

  if (discountType == "1") { 
    disAmount = (discountAmt / 100) * totalAmount; // Percentage Discount
    discountedTotal = totalAmount - disAmount;
  } else if (discountType == "2") { 
    disAmount=discountAmt; // Flat Discount
    discountedTotal = totalAmount - discountAmt;
  } else {
    discountedTotal = totalAmount;  // No discount selected
  }
 
  discountedTotal += adjustmentAmt;

// Ensure discountedTotal doesn't go below zero
discountedTotal = Math.max(discountedTotal, 0);

  // Display the discounted total in the discount input field
  document.getElementById('discount').value = disAmount.toFixed(2);
  document.getElementById('stotal_amount').value = discountedTotal.toFixed(2);
 // document.getElementById('disTotalh').value = discountedTotal.toFixed(2);

}

function calculateAdjustment() {
  
  var adjustmentAmt = parseFloat(document.getElementById('adjustment').value)||0;
  var discountAvl = parseFloat(document.getElementById('discount').value)||0;
  var totalAmount = parseFloat(document.getElementById('calTotal').value);  // Replace this with your actual total amount
 
 var  adjustmentTotal=adjustmentAmt+totalAmount;
 var finalAmount=adjustmentTotal-discountAvl
  
  
    document.getElementById('stotal_amount').value = (adjustmentTotal-discountAvl).toFixed(2);
  
  
  
 

}

function delete_item(cart_id) {
    if (confirm('Are you sure you want to delete this item?')) {
        $.ajax({
            url: "<?php echo base_url('lead/delete_item_cart'); ?>",
            type: "POST",
            data: { cart_id: cart_id },
            success: function(response) {
                let data = JSON.parse(response);
//console.log('data found',data);
                if (data.success) {
                    // Clear existing cart items
                    $("#records").empty();
                    let updated_sub_total = 0;
                    let updated_total_gst = 0;
                    let updated_total_amount = 0;

                    // Append updated items to the table
                    data.cart_items.forEach(function(item) {
                      updated_sub_total += parseFloat(item.amount);  // Convert amount to number for calculation
                        updated_total_gst += parseFloat(item.gst_amount);  // Convert GST to number
                        updated_total_amount = updated_sub_total + updated_total_gst;  // Calculate total amount
                        $("#records").append(`
                            <tr>
                                <td><textarea>${item.product_name}</textarea></td>
                                <td><textarea>${item.description}</textarea></td>
                                <td><input type="text" class="form-control" readonly value="${item.days}"></td>
                                <td><input type="number" class="form-control" readonly value="${item.qty}"></td>
                                <td><input type="number" class="form-control" readonly value="${item.price}"></td>
                                <td><span class="total_amount">${item.rowtotal}</span></td>
                                <td>
                                    <a href="javascript:void(0);" onclick="delete_item('${item.cart_id}');">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        `);
                    });

                    // Update total, subtotal, and GST fields
                    $("#sub_total_amt").text(data.sub_total_amount);
                    $("#stotal_amount").val(data.total_amount);
                    $("#totalgstamt").val(data.totalgst);
                    $("#calTotal").val(data.sub_total_amount);

                } 
                else {
                //  alert("11");
                  $("#records").empty();
                  $("#sub_total_amt").text('');
                    $("#stotal_amount").val('');
                    $("#totalgstamt").val('');
                }
            },
            error: function() {
                alert('Failed to delete item. Please try again.');
            }
        });
    }
}


</script>
    <!--End Back To Top Button-->
    <!--footer -->
    <?php include_once('footer.php') ?>