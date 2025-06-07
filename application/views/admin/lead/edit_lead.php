
<style>
  .checked {
    color: orange;
  }
</style>
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
        <div class="breadcrumb-title pe-3">Edit Lead </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>lead-list">Lead List</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit Lead </li>
            </ol>
          </nav>
        </div>

      </div>
      <!--end breadcrumb-->
      <form method="post" action="<?php echo base_url();?>Lead/update_lead"  onsubmit="return validate_edit_lead(this)" enctype="multipart/form-data">

        <input type="hidden" name="lead_id" value="<?php echo $lead_id;?>">
        <input type="hidden" name="op_user_id" value="<?php echo $this->session->userdata('op_user_id');?>">
        <input type="hidden" name="role_id" value="<?php echo $this->session->userdata('user_role');?>">

        <div class="card radius-15">
          <div class="card-body">

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                <!-- Lead Information -->
                <div class=" row">
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="lead_number">Lead ID <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="lead_number" name="lead_number" value="<?php echo $leads[0]['lead_number'];?>" readonly>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="lead_date">Date of Inquiry <span class="text-danger">*</span></label>
                        <input class="form-control" type="date" id="lead_date" name="lead_date" value="<?php echo $leads[0]['lead_date'];?>" required>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                  <div class="row">
                  <div class="col-sm-9">
                    <div class="form-group">
                        <label for="lead_status_id">Lead Mode <span class="text-danger">*</span></label>
                        <select class="form-control" id="lead_mode" name="lead_mode_id" >
                        <?php
                            foreach ($mode_list as $ml) 
                            {
                        ?>
                                <option value="<?php echo $ml['mode_id'];?>"
                                    <?php if($leads[0]['lead_mode_id'] == $ml['mode_id']) 
                                    {echo 'selected';}?>><?php echo $ml['mode_name'];?></option>    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    </div>
                    <div class="col-sm-3">
                        <button type="button"  class="btn btn-primary cat_btn" style="margin-top:20px;" data-toggle="modal" data-target="#ModeModal"><i class="fa fa-plus"></i></button>
                   
                        </div>
                    </div>
                  </div>
                  <!--<div class="col-md-3 mt-3">
                    <div class="form-group">
                        <label for="lead_status_id">Lead Type <span class="text-danger">*</span></label>
                        <select class="form-control" id="lead_type_id" name="lead_type_id" required>
                        <option value="">--- Select Lead Type ---</option>
                        <?php
                            foreach ($lead_type as $leadtype) 
                            {
                        ?>
                                <option value="<?php echo $leadtype['lt_id'];?>"
                                <?php if($leads[0]['lead_type_id'] == $leadtype['lt_id']) {echo 'selected';}?>><?php echo $leadtype['lead_type'];?></option>  
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                  </div>-->
                  <div class="col-md-3 mt-3">
                  <div class="row">
                  <div class="col-sm-9">
                    <div class="form-group">
                        <label for="lead_status_id">Lead Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="lead_status_id" name="lead_status_id" >
                        <option value="">--- Select Lead Status ---</option>
                        <?php
                            foreach ($leadstatus_list as $leadstatus) 
                            {
                        ?>
                            <option value="<?php echo $leadstatus['is_id'];?>"
                            <?php if($leads[0]['lead_status_id'] == $leadstatus['is_id']) {echo 'selected';}?>><?php echo $leadstatus['name'];?></option>  
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                    </div>
                        <div class="col-sm-3">
                        <button type="button"  class="btn btn-primary cat_btn" style="margin-top:20px;" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></button>
                   
                        </div>
                    </div>
                  </div>

                  <div class="col-md-3 mt-3">
                    <div class="row">
                        <div class="col-sm-9">
                        <div class="form-group">
                        <label for="">Assign To <span class="text-danger">*</span></label>
                        <select class="form-control" id="assign_to" name="assign_to" required>
                        <option value="">--- Assign To ---</option>
                        <?php
    $sql = "SELECT * FROM op_user WHERE status = '1'";
    $query = $this->db->query($sql);
    $result = $query->result_array();

    foreach ($result as $val) 
    {
        // Define your logic for selecting the option
        $selected = ($val['op_user_id'] == $leads[0]['assign_to']) ? 'selected' : '';
?>
        <option value="<?php echo $val['op_user_id']; ?>" <?php echo $selected; ?>>
            <?php echo $val['user_name']; ?>
        </option>  
<?php
    }
?>

                        </select>
                      </div>
                        </div>
                    </div>
                </div>
                <!-- Lead Information -->

                <!-- Contact Information -->
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="col-sm-12">
                            <h4>Customer Contact Information</h4>
                        </div>
                        <div class=" row">
                            <div class="col-md-3 mt-3">
                                <div class="form-group">
                                    <label for="phoneNumber">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="<?php echo $leads[0]['contact_phone'];?>" onchange="checkMobileNumber(this.value);" id="phoneNumber" name="contact_phone"  placeholder="Enter phone number">
                                    <span id="err1" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="form-group">
                                    <label for="firstName">Full Name <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control" id="firstName" value="<?php echo $leads[0]['contact_fullname'];?>" name="contact_fullname"  placeholder="Enter full name">
                                    <span id="err2" style="color:red;"></span>
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="form-group">
                                    <label for="email">Email ID </label>
                                    <input type="email" class="form-control" id="email" value="<?php echo $leads[0]['contact_email'];?>" name="contact_email"  placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" value="<?php echo $leads[0]['contact_company'];?>" name="contact_company" placeholder="Enter company name">
                                </div>
                            </div>
                            <div class="col-md-3 mt-3">
                                <div class="form-group">
                                    <label for="jobTitle">Job Title</label>
                                    <input type="text" class="form-control" id="jobTitle" value="<?php echo $leads[0]['contact_jobtitle'];?>" name="contact_jobtitle" placeholder="Enter job title">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Information -->

                <!-- Source Information -->
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="col-sm-12">
                            <h4>Lead Source</h4>
                        </div>
                        <div class=" row">
                            <div class="col-md-4 mt-3" >
                            <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="communication_pref">Lead Source <span class="text-danger">*</span></label>
                                    <select class="form-control" id="lead_source_id" name="lead_source_id" onchange="sourceChange()">
                                        
                                        <?php
                                            foreach ($lead_source as $source) 
                                            {
                                        ?>
                                            <option value="<?php echo $source['source_id'];?>"
                                            <?php if($leads[0]['lead_source_id'] == $source['source_id']) {echo 'selected';}?>><?php echo $source['lead_source'];?></option>  
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <span id="err3" style="color:red;"></span>
                                </div>
                                <div class="col-sm-3">
                        <button type="button"  class="btn btn-primary cat_btn" style="margin-top:20px;" data-toggle="modal" data-target="#LeadSourceModal"><i class="fa fa-plus"></i></button>
                   
                        </div>
                                </div>
                            </div>
                          
                                    <!-- Hidden Div for Partner Details -->
                            <div class="col-md-4 mt-3" id="partner_details_div"  style="display: none;">
                            <div class="row">
                            <div class="col-sm-9">
                           
                                <div class="form-group">
                                    <label for="partner_details">Partner Details</label>
                                    <select class="form-control" id="partner_details" name="partner_id">
                                        <option value="">--- Select Partner Details ---</option>
                                        <?php
                                            foreach ($partner_list as $partner) 
                                            {
                                        ?>
                                            <option value="<?php echo $partner['id'];?>"
                                            <?php if($leads[0]['partner_id'] == $partner['id']) {echo 'selected';}?> ><?php echo $partner['partner_name'];?></option>  
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                        <button type="button"  class="btn btn-primary cat_btn" style="margin-top:20px;" data-toggle="modal" data-target="#PartnerModal"><i class="fa fa-plus"></i></button>
                   
                        </div>
                                </div>
                            </div>
                              
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="communication_pref">Communication Preferences </label>
                                    <select class="form-control" id="communication_pref" name="communication_pref">
                                    <?php
                                            foreach ($communication_list as $comList) 
                                            {
                                                   ?>
                                            <option value="<?php echo $comList['com_id']; ?>"
                                           <?php if($leads[0]['communication_pref'] == $comList['com_id']) {echo 'selected';}?>  ><?php echo $comList['com_name'];?></option>  
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="communication_time">Time to Contact </label>
                                    <input class="form-control" type="time" id="communication_time" value="<?php echo $leads[0]['communication_time'];?>" name="communication_time">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Source Information -->
                  
                <!-- Interest Information -->
                <div class="row">
                    <div class="col-md-12">
                        <br>
                        <div class="col-sm-12">
                            <h4>Requirement</h4>
                        </div>
                        <div class=" row">
                            <div class="col-md-4 mt-3">
                            <div class="row">
                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label for="business_type_id">Requirement Type <span class="text-danger">*</span></label>
                                    <select class="form-control" id="business_type_id" name="business_type_id" >
                                    <option value="">--- Select Requirement Type ---</option>
                                    <?php
                                        foreach ($project_type as $pt) 
                                        {
                                    ?>
                                        <option value="<?php echo $pt['pt_id'];?>"
                                        <?php if($leads[0]['business_type_id'] == $pt['pt_id']) {echo 'selected';}?>><?php echo $pt['project_type'];?></option>  
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                </div>
                                <div class="col-sm-3">
                        <button type="button"  class="btn btn-primary cat_btn" style="margin-top:20px;" data-toggle="modal" data-target="#RequirementModal"><i class="fa fa-plus"></i></button>
                   
                        </div></div>
                                <span id="err4" style="color:red;"></span>
                            </div>
                            
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="possession_expected_period">Possession Expected Period</label>
                                    <input class="form-control" type="text" id="possession_expected_period" value="<?php echo $leads[0]['possession_expected_period']; ?>" name="possession_expected_period">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="budget_range">Budget Range</label>
                                    <input class="form-control" type="text" id="budget_range" value="<?php echo $leads[0]['budget_range']; ?>" name="budget_range">
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <div class="form-group">
                                    <label for="special_requirement">Special Requirements</label>
                                    <textarea class="form-control" id="special_requirement" name="special_requirement"><?php echo $leads[0]['special_requirement']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 mt-3">
                            <div class="form-group">
                                    <label for="special_attachment">Attach File</label>
                                    <input type="file" class="form-control" id="special_attachment" accept="image/*, .pdf" name="special_attachment" />
                                </div>

                                <?php $savedFilename = $leads[0]['special_attachment'] ?? ''; ?>
                                <!-- Hidden input to store the saved filename -->
                                <input type="hidden" name="saved_attachment" value="<?php echo htmlspecialchars($savedFilename); ?>" />
                                <?php if (!empty($savedFilename)): ?>
                                    <span id="err5" style="color: green;">Saved File: <?php echo htmlspecialchars($savedFilename); ?></span>

                                <?php else: ?>
                                    <span id="err5" style="color: red;">No file attached yet.</span>
                                <?php endif; ?>

                                <?php
                                
$extension = strtolower(pathinfo($savedFilename, PATHINFO_EXTENSION));
                                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])) {
    // It's an image
    echo '<img src="' . base_url('uploads/special_attachment/' . $savedFilename) . '" alt="Image" width="50%" height="100px"/>';
} elseif ($extension === 'pdf') {
    // It's a PDF
    echo '<object data="' . base_url('uploads/special_attachment/' . $savedFilename) . '" type="application/pdf" width="100%" height="500px"></object>';
} else {
    echo 'Unsupported file type.';
}
?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Interest Information -->

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary ">Update</button>
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

<div class="modal" id="RequirementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Communication Preference</h5>
                
            </div>
            <div class="modal-body">
               <center><span id="msgreq"></span></center>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName">Requirement Type</label>
                        <input type="text" class="form-control" id="project_type">
                        <span id="reqt_msg"></span>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_requirement">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="ModeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Lead Mode</h5>
                
            </div>
            <div class="modal-body">
               <center><span id="msg2"></span></center>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName">Enter Lead mode</label>
                        <input type="text" class="form-control" id="mode_name">
                        <span id="mode_msg"></span>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_mode">Add</button>
            </div>
        </div>
    </div>
</div>

<!-- status  -->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Lead Status</h5>
                
            </div>
            <div class="modal-body">
               <center><span id="msg"></span></center>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName">Enter Lead Status</label>
                        <input type="text" class="form-control" id="lead_status_name">
                        <span id="lead_msg"></span>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_lds">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="LeadSourceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Lead Source</h5>
                
            </div>
            <div class="modal-body">
               <center><span id="msg1"></span></center>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName">Enter Lead Source</label>
                        <input type="text" class="form-control" id="lead_source">
                        <span id="status_msg"></span>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_ldsource">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="PartnerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Add Partner Detail</h5>
                
            </div>
            <div class="modal-body">
               <center><span id="msg4"></span></center>
                <form enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="inputName">Partner Name</label>
                        <input type="text" class="form-control" id="partner_name">
                        <span id="partner_msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Contact Number</label>
                        <input type="text" class="form-control" id="partner_con">
                        <span id="con_msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Email</label>
                        <input type="text" class="form-control" id="partner_email">
                        <span id="email_msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Company</label>
                        <input type="text" class="form-control" id="partner_company">
                        <span id="company_msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Location</label>
                        <input type="text" class="form-control" id="partner_location">
                        <span id="location_msg"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Address</label>
                        <input type="text" class="form-control" id="partner_address">
                        <span id="address_msg"></span>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_partner">Add</button>
            </div>
        </div>
    </div>
</div>



<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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



</script>


<script type="text/javascript">
  $(document).ready(function() {
    $('.multiselect1').multiselect({
      buttonWidth: '100%',
      enableFiltering: true,
      includeSelectAllOption: true,
      selectAllText: 'Select All',
      enableCaseInsensitiveFiltering: true,
    });
  });

  function validate_edit_lead(ele) {
	//hide_message_box(ele);
	var hasError=0;
	var  phoneNumber = $("#phoneNumber").val();
  var  firstName = $("#firstName").val();
	var lead_source_id = $('#lead_source_id option:selected').val();
   var business_type_id = $('#business_type_id option:selected').val();
   var attachment = $("#special_attachment").val();
 
   
        if( firstName.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#err2').text('Please enter contact person name');
           hasError = 1; } else {
            $('#err2').text(''); // Clear error if valid
        }
       // alert("2");
         // else { changeError(" project_name"); }
		if(lead_source_id.trim()=='') {
       //showError("Please enter project code", "project_code");
       $('#err3').text('Please select lead source');
        hasError = 1; }else {
            $('#err3').text(''); // Clear error if valid
        }
       // alert("3");
        //else { changeError("project_code"); }
    if(business_type_id.trim()=='') 
    { 
      //showError("Please enter project_type_id", "project_type_id"); 
      $('#err4').text('Please select requirement type');
      hasError = 1; } else {
            $('#err4').text(''); // Clear error if valid
        }
    //else { changeError("project_type_id"); }
  //  alert("4");

       if(phoneNumber.trim()=='') 
     { 
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err1').text('Please enter contact person number');
       hasError = 1; }
       else {
            $('#err1').text(''); // Clear error if valid
        }
       // alert("5");

       if(phoneNumber.length !==10) 
     {// alert("hhhh");
       //showError("Please enter project_type_id", "project_type_id"); 
       $('#err1').text('Please enter 10 digit valid contact number');
       hasError = 1; }
       else {
            $('#err1').text(''); // Clear error if valid
        }
      //  alert("6");
       // Validate file attachment
    if (attachment) {
        var fileExtension = attachment.split('.').pop().toLowerCase();
        if (fileExtension === 'exe') {
            $('#err5').text('Executable files are not allowed.');
            hasError = 1;
        } else {
            $('#err5').text(''); // Clear error if valid
        }
    }
    //  alert(hasError);



	if(hasError==1){
		return false;
	}else{
		return true;
	}  
}

$(".add_requirement").click(function(){
  //alert("11");
  var project_type=$('#project_type').val();
      if(project_type=='')
      {
        $('#reqt_msg').text('Requirement type  is required.');
        return false;

      }else{
           $('#reqt_msg').text('');
      }
  
  var form_data = new FormData(); 
      form_data.append('project_type',project_type);
      
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('ajaxRequirement'); ?>",
                     dataType: 'text', 
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,  
                    //cache: false,
                    success: function(response){
                    getRequirementList();
                     //getSubCategory();
                    var res=JSON.parse(response);
                     $('#msgreq').text(res.msg);
                     $('#project_type').val('');
                     setTimeout(function(){ $('#msg3').text(''); }, 3000);
                     $('#RequirementModal').modal('hide');

                    }
                });

    }); 
    
    function  getRequirementList(){
  jQuery.ajax({
        dataType: 'html',
        type: "POST",
        url: "<?php echo base_url();?>get-Requirement-list",
        data: {},
        beforeSend: function(){ },
        success: function(res){
            $("#business_type_id").html(res);
        },
        error:function(error,message){
            console.log(message);
        }
    });
}

$(".add_mode").click(function(){
  //alert("11");
  var mode_name=$('#mode_name').val();
      if(mode_name=='')
      {
        $('#mode_msg').text('Lead Mode  is required.');
        return false;

      }else{
           $('#mode_msg').text('');
      }
  
  var form_data = new FormData(); 
      form_data.append('mode_name',mode_name);
      
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('ajaxLeadMode'); ?>",
                     dataType: 'text', 
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,  
                    //cache: false,
                    success: function(response){
                    getLeadModeList();
                     //getSubCategory();
                    var res=JSON.parse(response);
                     $('#msg2').text(res.msg);
                     $('#mode_name').val('');
                     setTimeout(function(){ $('#msg2').text(''); }, 3000);
                     $('#ModeModal').modal('hide');

                    }
                });

    });
    function getLeadModeList(){
  jQuery.ajax({
        dataType: 'html',
        type: "POST",
        url: "<?php echo base_url();?>get-leadMode-list",
        data: {},
        beforeSend: function(){ },
        success: function(res){
            $("#lead_mode").html(res);
        },
        error:function(error,message){
            console.log(message);
        }
    });
}

$(".add_lds").click(function(){
  
  var lead_name=$('#lead_status_name').val();
      if(lead_name=='')
      {
        $('#lead_msg').text('Lead Status  is required.');
        return false;

      }else{
           $('#lead_msg').text('');
      }
  
  var form_data = new FormData(); 
      form_data.append('name',lead_name);
      
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('ajaxLeadStatus'); ?>",
                     dataType: 'text', 
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,  
                    //cache: false,
                    success: function(response){
                    getLeadStatusList();
                     //getSubCategory();
                    var res=JSON.parse(response);
                     $('#msg').text(res.msg);
                     $('#lead_status_name').val('');
                     setTimeout(function(){ $('#msg').text(''); }, 3000);
                     $('#myModal').modal('hide');

                    }
                });

    });

    function getLeadStatusList(){
  jQuery.ajax({
        dataType: 'html',
        type: "POST",
        url: "<?php echo base_url();?>get-leadStatus-list",
        data: {},
        beforeSend: function(){ },
        success: function(res){
            $("#lead_status_id").html(res);
        },
        error:function(error,message){
            console.log(message);
        }
    });
}

$(".add_ldsource").click(function(){
  //alert("11");
  var lead_source=$('#lead_source').val();
      if(lead_source=='')
      {
        $('#lead_msg').text('Lead Source  is required.');
        return false;

      }else{
           $('#lead_msg').text('');
      }
  
  var form_data = new FormData(); 
      form_data.append('lead_source',lead_source);
      
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('ajaxLeadSource'); ?>",
                     dataType: 'text', 
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,  
                    //cache: false,
                    success: function(response){
                    getLeadSourceList();
                     //getSubCategory();
                    var res=JSON.parse(response);
                     $('#msg1').text(res.msg);
                     $('#lead_source').val('');
                     setTimeout(function(){ $('#msg1').text(''); }, 3000);
                     $('#LeadSourceModal').modal('hide');

                    }
                });

    });

    function getLeadSourceList(){
  jQuery.ajax({
        dataType: 'html',
        type: "POST",
        url: "<?php echo base_url();?>get-leadSource-list",
        data: {},
        beforeSend: function(){ },
        success: function(res){
            $("#lead_source_id").html(res);
        },
        error:function(error,message){
            console.log(message);
        }
    });
}

function sourceChange() { //alert("11");
        // Get the dropdown element
    var dropdown = document.getElementById("lead_source_id");
    
    // Get the selected option text
    var selectedOption = dropdown.options[dropdown.selectedIndex].text;
   //alert(selectedOption);
    
    // Check if "Partner" is selected
    if (selectedOption === "Partner") {
        // Show the hidden div
        document.getElementById("partner_details_div").style.display = "block";
    } else {
        // Hide the hidden div
        document.getElementById("partner_details_div").style.display = "none";
    }
}
 
document.addEventListener("DOMContentLoaded", function () {
    // Run sourceChange when the page loads (to handle pre-selected partner)
   // sourceChange();

    // Attach event listener to dropdown
    var dropdown = document.getElementById("lead_source_id");
    var partnerDiv = document.getElementById("partner_details_div");

    if (!dropdown || !partnerDiv) {
        console.error("Dropdown or Partner Details Div not found.");
        return;
    }

    var selectedOption = dropdown.options[dropdown.selectedIndex]?.text;

    // Show the div if "Partner" is selected or if a partner is already chosen
    if (selectedOption === "Partner" || partnerDiv.style.display === "block") {
        partnerDiv.style.display = "block";
    } else {
        partnerDiv.style.display = "none";
    }
    
});

// function sourceChange() {
//     // Get the dropdown and div elements
//     var dropdown = document.getElementById("lead_source_id");
//     var partnerDiv = document.getElementById("partner_details_div");

//     if (!dropdown || !partnerDiv) {
//         console.error("Dropdown or Partner Details Div not found.");
//         return;
//     }

//     var selectedOption = dropdown.options[dropdown.selectedIndex]?.text;

//     // Show the div if "Partner" is selected or if a partner is already chosen
//     if (selectedOption === "Partner" || partnerDiv.style.display === "block") {
//         partnerDiv.style.display = "block";
//     } else {
//         partnerDiv.style.display = "none";
//     }
// }

$(".add_partner").click(function(){
  //alert("11");
  var partner_name=$('#partner_name').val();
  var partner_con=$('#partner_con').val();
  var partner_email=$('#partner_email').val();
  var partner_company=$('#partner_company').val();
  var partner_location=$('#partner_location').val();    
  var partner_address=$('#partner_address').val();
      if(partner_name=='')
      {
        $('#partner_msg').text('Partner name  is required.');
        return false;

      }else{
           $('#partner_msg').text('');
      }

      if(partner_con=='')
      {
        $('#con_msg').text('Partner contact  is required.');
        return false;

      }else{
           $('#con_msg').text('');
      }
  
  var form_data = new FormData(); 
      form_data.append('partner_name',partner_name);
      form_data.append('contact_no',partner_con);
      form_data.append('email',partner_email);
      form_data.append('company',partner_company);
      form_data.append('location',partner_location);
      form_data.append('address',partner_address);
      
      $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('ajaxPartner'); ?>",
                     dataType: 'text', 
                      cache: false,
                      contentType: false,
                      processData: false,
                      data: form_data,  
                    //cache: false,
                    success: function(response){
                    getPartner();
                     //getSubCategory();
                    var res=JSON.parse(response);
                     $('#msg4').text(res.msg);
                     $('#partner_name').val('');
                     $('#partner_con').val('');
                     $('#partner_email').val('');
                     $('#partner_company').val('');
                     $('#partner_location').val('');
                     $('#partner_address').val('');
                    // $('#PartnerModal').modal('hide');
                     setTimeout(function(){ $('#msg4').text(''); }, 3000);
                     $('#PartnerModal').modal('hide');

                    }
                });

    });

    function getPartner(){
  jQuery.ajax({
        dataType: 'html',
        type: "POST",
        url: "<?php echo base_url();?>get-Partner-list",
        data: {},
        beforeSend: function(){ },
        success: function(res){
            $("#partner_details").html(res);
        },
        error:function(error,message){
            console.log(message);
        }
    });
}

</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 
