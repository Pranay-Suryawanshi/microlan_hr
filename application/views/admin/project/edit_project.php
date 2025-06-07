
<style>
  .checked {
    color: orange;
  }
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.min.css" rel="stylesheet">

<script>
  function restrictToNumbers(event) {
      const input = event.target;
      const value = input.value;
      input.value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  }
</script>

<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Project </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit Project </li>
            </ol>
          </nav>
        </div>

      </div>
      
      <!--end breadcrumb-->
      <form method="post" name="project_from" action="<?php echo base_url('update-project'); ?>" onsubmit="return validate_edit_project(this)" enctype="multipart/form-data">

        <input type="hidden" name="op_user_id" value="<?php echo $this->session->userdata('op_user_id');?>">
        <input type="hidden" name="role_id" value="<?php echo $this->session->userdata('user_role');?>">
                            
        <div class="card radius-15">
          <div class="card-body">

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_data[0]['project_id']?>" >
                <div class=" row">
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                        <label for="inputcompany">Project Name <span class="text-danger">*</span></label>
                        <input type="text" name="project_name" class="form-control" id="project_name" value="<?php echo $project_data[0]['project_name']?>"
                            placeholder="Enter Project Name" readonly>
                            <span id="err1" style="color:red;"></span>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                        <label for="inputcompany"> Project ID/Code </label>
                        <input type="text" name="project_code" class="form-control" id="project_code"
                        value="<?php echo $project_data[0]['project_code']?>" readonly      placeholder="Enter Project ID/Code">
                        <span id="err2" style="color:red;"></span> 
                      </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="project_type_id">Project Type <span class="text-danger"> *</span></label>
                            <select name="project_type_id" class="form-control" id="project_type_id" >
                            <option value="">--- Select Project Type ---</option>
                            <?php
                            foreach ($project_type as $pt) 
                            {
                            ?>
                                    <option value="<?php echo $pt['pt_id'];?>"
                                    <?php if($project_data[0]['project_type_id'] == $pt['pt_id']) 
                                    {echo 'selected';}?>><?php echo $pt['project_type'];?></option>  
                            <?php
                                }
                            ?>
                            
                            </select>
                            <span id="err3" style="color:red;"></span>
                        </div>
                    </div>
                  
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                           
                            <label for="project_type_id">Project Status <span class="text-danger"> *</span></label>
                            <select name="project_status_id" class="form-control" id="project_status_id" >
                            <option value="">--- Select Project Status ---</option>
                            <?php
                                foreach ($project_status as $ps) 
                                {
                            ?>
                                <option value="<?php echo $ps['ps_id'];?>"
                                    <?php if($project_data[0]['project_status_id'] == $ps['ps_id']) 
                                    {echo 'selected';}?>><?php echo $ps['project_status_type'];?></option>
                                
                            <?php
                                }
                            ?>
                            </select>
                            <span id="err5" style="color:red;"></span> 
                        </div>
                    </div>
                    
                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="project_start_date">Start Date <span class="text-danger"> *</span></label>
                            <input type="date" name="project_start_date" class="form-control" value="<?php echo $project_data[0]['project_start_date'];?>"  id="project_start_date">
                            <span id="err6" style="color:red;"></span> 
                          </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                            <label for="estimated_completion_date">Estimated Completion Date  <span class="text-danger"> *</span></label>
                            <input type="date" name="estimated_completion_date" class="form-control" id="estimated_completion_date" value="<?php echo $project_data[0]['estimated_completion_date'];?>">
                            <span id="err7" style="color:red;"></span> 
                          </div>
                    </div>
                    

                  

                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Project Manager <span class="text-danger"> *</span></label>
                      <select name="project_manager" class="form-control" id="project_manager" >
                        <option value="">--- Select Project Manager ---</option>
                        <?php
                            foreach ($superadmin as $admin) 
                            {
                        ?>
                            <option value="<?php echo $admin['op_user_id'];?>" <?php if($project_data[0]['project_manager']==$admin['op_user_id']){echo'selected';}?>><?php echo $admin['user_name'];?></option>  
                        <?php
                            }
                        ?>
                        </select>
                        <span id="err8" style="color:red;"></span> 
                    </div>
                  </div>
                  
                  <div class="col-md-3 mt-3">
                        <div class="form-group">
                        <label for="inputcompany"> Marketing Person </label>
                        <select name="marketing_person" class="form-control" id="marketing_person" >
                        <option value="">--- Select Marketing Person ---</option>
                        <?php
                            foreach ($marketing_employee as $mrkt) 
                            {
                        ?>
                            <option value="<?php echo $mrkt['op_user_id'];?>"
                            <?php if($project_data[0]['marketing_person_id']==$mrkt['op_user_id']){echo'selected';}?>>
                                <?php echo $mrkt['user_name'];?></option>  
                        <?php
                            }
                        ?>
                        </select>
                        </div>
                    </div>               
                  

                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Project Client <span class="text-danger"> *</span></label>
                      <select name="project_client_id" class="form-control" id="project_client_id" >
                        <option value="">--- Select Project Client ---</option>
                        <?php
                            foreach ($customers as $customer) 
                            {
                        ?>
                            <option value="<?php echo $customer['cust_id'];?>" 
                            <?php if($customer['cust_id']==$project_data[0]['project_client_id']){echo 'selected';}?>>
                                <?php echo $customer['company'];?> - <?php echo $customer['contact_person'];?></option>  
                        <?php
                            }
                        ?>
                        </select>
                        <span id="err9" style="color:red;"></span> 
                    </div>
                  </div>

                  <div class="col-md-3 mt-3">
                        <div class="form-group">
                        <label for="inputcompany">Contact Person Name  <span class="text-danger"> *</span></label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" value="<?php echo $project_data[0]['customer_name'];?>"
                            placeholder="Enter Customer Name" >
                            <span id="err4" style="color:red;"></span>
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                        <label for="inputcompany"> Contact Person Number <span class="text-danger"> *</span> </label>
                        <input type="number" name="customer_no" class="form-control" id="customer_no" value="<?php echo $project_data[0]['customer_no'];?>"
                            placeholder="Enter Customer Contact Number" >
                            <span id="err10" style="color:red;"></span> 
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                        <div class="form-group">
                        <label for="inputcompany"> Project Handover Date </label>
                        <input type="date" name="project_handover_date" class="form-control" value="<?php echo $project_data[0]['project_handover_date'];?>"  id="project_handover_date">
                        </div>
                    </div>

                    <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Project Developer <span class="text-danger"> *</span></label>
                      <select name="project_developer[]" class="form-control" class="multiselect" multiple="multiple" id="project_developer" >
                        <option value="">--- Select Project Developer ---</option>
                        <?php
                            // Convert comma-separated IDs to an array
                            $selected_developers = explode(',', $project_data[0]['project_developer']);

                            foreach ($employee as $emp) {
                            ?>
                                <option value="<?php echo $emp['op_user_id']; ?>"
                                <?php 
                                // Check if the current op_user_id is in the array of selected developers
                                if (in_array($emp['op_user_id'], $selected_developers)) {
                                    echo 'selected';
                                }
                                ?>>
                                    <?php echo $emp['user_name']; ?>
                                    </option>
                                    <?php
                                    }
                                    ?>

                        </select>
                        <span id="err11" style="color:red;"></span> 
                    </div>
                  </div>

                  <!-- <style>
                    /* Style for the custom select box */
                    .select-wrapper {
                        width: 200px;
                        margin: 50px;
                    }

                    select {
                        display: none;
                    }

                    .select-box {
                        width: 100%;
                        padding: 10px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        background-color: #fff;
                        cursor: pointer;
                    }

                    .options {
                        display: none;
                        position: absolute;
                        background-color: white;
                        border: 1px solid #ccc;
                        width: 177px;
                        z-index: 10;
                        max-height: 150px;
                        overflow-y: auto;
                    }

                    .options label {
                        display: block;
                        padding: 5px;
                    }

                    .options label:hover {
                        background-color: #f0f0f0;
                    }

                    .options input {
                        margin-right: 10px;
                    }
                  </style>

                  <div class="select-wrapper">
                      <div class="select-box">Select options</div>
                      <div class="options">
                          <label><input type="checkbox" value="Option 1"> Option 1</label>
                          <label><input type="checkbox" value="Option 2"> Option 2</label>
                          <label><input type="checkbox" value="Option 3"> Option 3</label>
                          <label><input type="checkbox" value="Option 4"> Option 4</label>
                      </div>
                  </div>

                  <script>
                    // Toggle the visibility of the options when clicking the select box
                    const selectBox = document.querySelector('.select-box');
                    const options = document.querySelector('.options');

                    selectBox.addEventListener('click', function() {
                        options.style.display = options.style.display === 'block' ? 'none' : 'block';
                    });

                    // Update the text of the select box based on the selected options
                    const checkboxes = document.querySelectorAll('.options input[type="checkbox"]');

                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            const selectedOptions = [];
                            checkboxes.forEach(cb => {
                                if (cb.checked) {
                                    selectedOptions.push(cb.value);
                                }
                            });
                            selectBox.textContent = selectedOptions.length > 0 ? selectedOptions.join(', ') : 'Select options';
                        });
                    });

                    // Close the dropdown if clicking outside of it
                    document.addEventListener('click', function(event) {
                        if (!selectBox.contains(event.target) && !options.contains(event.target)) {
                            options.style.display = 'none';
                        }
                    });
                  </script> -->

                  
                    <div class="col-sm-9 mt-3">
                    <div class="form-group">
                        <label for="project_description">Project Description</label>
                        <textarea name="project_description" class="form-control" id="project_description" rows="3" placeholder="Project Description"><?php echo $project_data[0]['project_description']; ?></textarea>
                    </div>
                    </div>

                  <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary ">Submit</button>
                  </div>
                </div>
                <!-- /.card-body -->

              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end page-content-wrapper-->
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS (optional, depends on your design) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include Bootstrap Multiselect JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js"></script>
<!-- Include jQuery Validation Plugin -->
<!-- Include jQuery Validation Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<!-- Initialize Multiselect -->
<script>
  $(document).ready(function() {
    $('.multiselect').multiselect({
      nonSelectedText: 'Select options',
      enableFiltering: true,
      buttonWidth: '100%',
      includeSelectAllOption: true,
      selectAllText: 'Select All'
    });
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
 document.addEventListener('DOMContentLoaded', function () {
        // Attach the submit handler to the form
        const form = document.getElementById('frmadminlogin');
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent form submission initially
            if (validate_customer()) {
                form.submit(); // Submit the form if valid
            }
        });

        // Validate function
        function validate_customer() {


            let isValid = true;



            // Check for empty fields and display error if necessary
            ['company', 'email', 'phone'].forEach(function (field) {
                let inputElement = document.getElementById(field);
                let errorElement = document.getElementById(field + '_error');

                if (inputElement.value.trim() === '') {
                    errorElement.style.display = 'block';  // Show error message if field is empty
                    isValid = false;
                } else {
                    errorElement.style.display = 'none';   // Hide error message if field is filled
                }
            });
           
           
         

            // Enable submit button only if all fields are valid
            //   document.getElementById('submitBtn').disabled = !isValid;

            return isValid;
        }

        // Event listener to validate fields on input
        document.querySelectorAll('input, select').forEach(function (element) {
            element.addEventListener('input', validate_customer);
        });
    });

  $("#state").change(function () {
    var state_id = $('#state').val();
    //$('#bill_state').val(state_id);
    var form_data = new FormData();
    form_data.append('state_id', state_id);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('customer/get_city'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function (response) {
        $('#city').html(response);

      }
    });

  });



  $("#bill_state").change(function () {
    var state_id = $('#bill_state').val();
    var form_data = new FormData();
    form_data.append('state_id', state_id);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('customer/get_city'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function (response) {
        $('#bill_city').html(response);

      }
    });

  });
  $("#shipping_state").change(function () {
    var state_id = $('#shipping_state').val();
    var form_data = new FormData();
    form_data.append('state_id', state_id);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('customer/get_city'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function (response) {
        $('#shipping_city').html(response);
      }
    });

  });

//   //$(function() {
//     $(document).ready(function () {
//   // Initialize form validation on the registration form.
//   // It has the name attribute "registration"
//    $("form[name='project_from']").validate({
 

//     // Specify validation rules
//     rules: {
//           project_name: "required",
//           project_code: "required",
//           project_type_id: "required",
//           project_status_id: "required",
//           project_client_id: "required",
//           customer_name: "required",
//           customer_no: {
//             required: true,
//             minlength: 10,
//             maxlength: 10,
//             digits: true,
//           },
//           project_developer: "required",
//           project_manager: "required",
//           estimated_completion_date: "required",
//           project_start_date: "required",
//         },
//         // Specify validation error messages
//         messages: {
//           project_name: "Please enter project name",
//           project_code: "Please enter project code/id",
//           project_client_id: "Please select project client",
//           customer_name: "Please enter contact person name",
//           project_type_id: "Please select project type",
//           project_status_id: "Please select project status",
//           project_developer: "Please select project developer",
//           project_manager: "Please select project manager",
//           customer_no: {
//             required: "Please enter phone number",
//             minlength: "Your phone number must be 10 digits",
//             maxlength: "Your phone number must be 10 digits",
//             digits: "Your phone number must contain only digits",
//           },
//           estimated_completion_date: "Please enter estimated completion date",
//           project_start_date: "Please select the start date",
//         },
//         // Handle form submission
//         submitHandler: function (form) {
//           form.submit();
//         },
//   });
// });

// function showError(msg, id){
// 	if($("#"+id).closest(".form-group").hasClass("has-error")){
// 		$("#"+id).closest(".form-group").find("label.error").html("<label class='error'>"+ msg +"</label>");
// 	}else{
// 		$("#"+id).closest(".form-group").addClass("has-error");
// 		$( "<label class='error'>"+ msg +"</label>" ).appendTo( $("#"+id).closest(".form-group") );
// 	}
// }

// function changeError(id){
// 	$("#"+id).closest(".form-group").removeClass("has-error");
// 	$("#"+id).closest(".form-group").find("label.error").remove();
// }

function validate_edit_project(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	var  project_name = $("#project_name").val();
  var  project_code = $("#project_code").val();
	var project_type_id = $('#project_type_id option:selected').val();
   var project_status_id = $('#project_status_id option:selected').val();
  var project_manager = $('#project_manager option:selected').val();
   var project_client_id = $('#project_client_id option:selected').val();
   	var customer_name = $("#customer_name").val();
   var customer_no = $("#customer_no").val();
    var project_developer = $("#project_developer option:selected").length;
    var startDate = $("#project_start_date").val();
    var endDate = $("#estimated_completion_date").val();
    //alert(startDate);
   // alert(project_developer);
  //alert("12");
 // alert(project_name);
//	var subcategory = jQuery('#subcategory').val();
	//var people = $('#people').val();
	//var qty = $('#qty').val();
	//alert(project_devrloper);
        
        if( project_name.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#err1').text('Please enter project name');
           hasError = 1; } 
         // else { changeError(" project_name"); }
		if(project_code.trim()=='') {
       //showError("Please enter project code", "project_code");
       $('#err2').text('Please enter project code');
        hasError = 1; }
        //else { changeError("project_code"); }
    if(project_type_id.trim()=='') 
    { 
      //showError("Please enter project_type_id", "project_type_id"); 
      $('#err3').text('Please select project type');
      hasError = 1; } 
    //else { changeError("project_type_id"); }
    if(customer_name.trim()=='') 
    { 
      //showError("Please enter customer_name", "customer_name"); 
      $('#err4').text('Please enter contact person name');
      hasError = 1; }

       if(project_status_id.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err5').text('Please select project status');
       hasError = 1; } 

         
       if(startDate.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err6').text('Please enter project start date');
       hasError = 1; } 

       if(endDate.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err7').text('Please enter project estimated end date');
       hasError = 1; }
	
       if(project_manager.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err8').text('Please select project manager');
       hasError = 1; }

       if(project_client_id.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err9').text('Please select project client');
       hasError = 1; }

       if(customer_no.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err10').text('Please enter contact person number');
       hasError = 1; }

       if(customer_no.length !==10) 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err10').text('Please enter 10 digit  number');
       hasError = 1; }

       if(project_developer=== 0) 
    { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err11').text('Please select project developer');
       hasError = 1; }



	if(hasError==1){
		return false;
	}else{
		return true;
	}  
}

document.addEventListener("DOMContentLoaded", function() {
    var startDate = document.getElementById("project_start_date").value;
    var estimatedDate = document.getElementById("estimated_completion_date");

    if (startDate) {
        // If Start Date is already selected, set the min attribute for Estimated Completion Date
        estimatedDate.setAttribute("min", startDate);
    }
    
    // Add change event listener to update min date on future changes
    document.getElementById("project_start_date").addEventListener("change", function() {
        var startDate = document.getElementById("project_start_date").value;
        if (startDate) {
            estimatedDate.setAttribute("min", startDate);
        } else {
            estimatedDate.removeAttribute("min");
        }
    });
});

</script>