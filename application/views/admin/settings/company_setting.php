
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
        
<?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-<?php echo $this->session->flashdata('class'); ?> alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('msg'); ?>
        </div>
      <?php } ?>
      <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } ?>

      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Settings </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url();?>">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Company Setting </li>
            </ol>
          </nav>
        </div>

      </div>
      <!--end breadcrumb-->
        <div class="card ">
        <div class="card-body">
      <form id="basicForm" action="<?php echo base_url();?>save-company-setting" method="post"  enctype="multipart/form-data" class="form-horizontal" onsubmit="return validate_company_setting(event);">
                <div class="card-body">
                  <button type="submit" class="btn btn-info" style="float: right;margin-top: -80px;"> Save </button>
                <div class="row">
                 <div class="col-md-9">
                     <table class="table">
                         <tr>
                             <th scope="row">Company Name<span class="text-danger">*</span> :</th>
                             <td id="cname" class="form-group"><input name="company_name" type="text" id="company_name1" class="form-control" value="<?php echo $company_setting[0]['company_name']; ?>" required>
                             </td>

                         </tr>
                         <tr>
                             <th scope="row">Billing Address<span class="text-danger">*</span> :</th>
                             <td class="form-group"><input name="billing_address" type="text" id="billing_address" class="form-control" value="<?php echo $company_setting[0]['billing_address']; ?>" required>
                             </td>
                         </tr>
                         <tr>
                             <th>GST NO<span class="text-danger">*</span> :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['gst_no']; ?>" name="gst_no" id="gst_no" class="form-control" required></td>
                         </tr>
                         <tr>
                             <th>Select State <span class="text-danger">*</span> :</th>
                             <td class="form-group">
                                 <select  class="form-control" name="state_code" id="state_code" required>
                                     <option value="">Select State</option>
                                     <?php foreach ($state_list as $state) { ?>
                                         <option value="<?php echo $state['state_code']; ?>" <?php if ($company_setting[0]['state_code'] == $state['state_code']) {
                                         $state['state_code'] == '27';
                                         echo "selected";
                                     } ?> ><?php echo $state['state_name']; ?></option> 
                                            <?php
                                        }
                                        ?> 
                                 </select> 
                             </td>
                         </tr>
                         <tr>
                             <th>PAN No.<span class="text-danger">*</span> :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['pan_no']; ?>" required name="pan_no" id="pan_no" class="form-control" style="text-transform:uppercase;"></td>
                         </tr>
                         <tr>
                             <th>Contact No.<span class="text-danger">*</span> :</th>
                             <td class="form-group"><input type="number" value="<?php echo $company_setting[0]['contact']; ?>" required name="contact" id="contact_no" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>Email ID<span class="text-danger">*</span> :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['email']; ?>" required name="email" id="email" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>Bank A/c Name :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['bank_ac_name']; ?>" name="bank_ac_name" id="bank_ac_name" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>Bank A/c No :</th>
                             <td class="form-group"><input type="number" value="<?php echo $company_setting[0]['bank_ac_no']; ?>" name="bank_ac_no" id="bank_ac_no" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>Bank Name :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['bank_name']; ?>" name="bank_name" id="bank_name" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>IFSC No :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['ifsc_no']; ?>" name="ifsc_no" id="ifsc_no" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>Branch :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['branch']; ?>" name="branch" id="branch" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>Is GST :</th>
                             <td class="form-group">
                                 <select class="form-control" id="is_gst" name="is_gst">
                                     <option value="0" <?php if ($company_setting[0]['is_gst'] == '0') {
                                    echo 'selected';
                                } ?> >Disable</option>
                                     <option value="1" <?php if ($company_setting[0]['is_gst'] == '1') {
                                    echo 'selected';
                                } ?> >Enable</option>
                                 </select>
                             </td>
                         </tr>
                            <tr>
                             <th>Watermark :</th>
                             <td class="form-group"><input type="text" value="<?php echo $company_setting[0]['watermark']; ?>" name="watermark" id="watermark" class="form-control"></td>
                         </tr>
                         <tr>
                             <th>Upload Profile Info PDF :</th>
                             <td class="form-group"><input type="file" accept="pdf"  name="profile_info_file" id="branch" class="form-control"><?php echo $company_setting[0]['profile_info_file']; ?></td>
                         </tr>
                     </table>
              </div>
              <div class="col-md-3 text-center" >
                  <div>
                  <b>Company Logo</b> (Click To Edit)
                <?php if (!empty($company_setting[0]['company_logo'])) { ?>
                    <img  class=" preview" id="blah" onclick="selectFile2();" src="<?php echo base_url('uploads/company/' . $company_setting[0]['company_logo']) ?>" alt="Click To Edit" width="200" height="200">
                <?php } else { ?>
                    <img class=" preview" id="blah" onclick="selectFile2();" src="<?php echo base_url(); ?>uploads/logo.png" alt="Click To Edit" width="200" height="200">
                <?php } ?>
                    <!--<input type="file" name="company_logo" id="company_logo" value="<?php echo $company_setting[0]['company_name'];?>" accept=".png,.jpg,.jpeg">-->
                <input type="file" name="company_logo" id="company_logo" style="display: none;" onchange="readURL(this);" class="form-control" accept=".png,.jpg,.jpeg"> 
                
                <?php // if(!empty($company_setting[0]['company_logo'])){ ?>
                    <!--<img src="<?php echo base_url().'uploads/company/'.$company_setting[0]['company_logo'];?>" width="200" height="200">--> 
                <?php // }else{ ?>
                    <!--<img src="<?php echo base_url().'uploads/logo.png';?>" width="200" height="200">--> 
                <?php // } ?>
              </div>
                  <div>
                  <b>Bill Logo</b> (Click To Edit)
                <?php if (!empty($company_setting[0]['bill_logo'])) { ?>
                    <img  class=" preview" id="blahbill" onclick="selectFile();" src="<?php echo base_url('uploads/company/' . $company_setting[0]['bill_logo']) ?>" alt="Click To Edit" width="200" height="200">
                <?php } else { ?>
                    <img class=" preview" id="blahbill" onclick="selectFile();" src="<?php echo base_url(); ?>uploads/logo.png" alt="Click To Edit" width="200" height="200">
                <?php } ?>
                    <!--<input type="file" name="company_logo" id="company_logo" value="<?php echo $company_setting[0]['bill_logo'];?>" accept=".png,.jpg,.jpeg">-->
                <input type="file" name="bill_logo" id="bill_logo" style="display: none;" onchange="readURL2(this);" class="form-control" accept=".png,.jpg,.jpeg"> 
                
              </div>
              </div>
                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
            
            </div>         
            </form>
          </div>
        </div>
    </div>
  </div>
</div>
<!--end page-content-wrapper-->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#blah')
                   .attr('src', e.target.result)
                   .width(200)
                   .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }
    function selectFile2() {
        document.getElementById("company_logo").click();
    }
    
    function readURL2(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#blahbill')
                   .attr('src', e.target.result)
                   .width(200)
                   .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }
    function selectFile() {
        document.getElementById("bill_logo").click();
    }
</script>

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
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script> 
