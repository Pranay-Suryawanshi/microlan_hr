<style type="text/css"></style>
<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url(); ?>">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <form class="row g-3" id="frmadminlogin" novalidate="true" method="post"
                                action="<?php echo base_url(); ?>update-user" onsubmit="return validate_user(this);"
                                enctype="multipart/form-data">

                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="form-group col-md-4 mt-3 text-center">
                                        <?php if (empty($user_details[0]['profile_photo'])) { ?>
                                            <img src="<?php echo base_url(); ?>assets/images/user1.jpg"
                                                id="imagePreview" style="width: 125px; border-radius: 50%; height: 125px"
                                                onclick="document.getElementById('fileInput').click();">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $user_details[0]['profile_photo']; ?>"
                                                id="imagePreview" style="width: 125px; border-radius: 50%; height: 125px"
                                                onclick="document.getElementById('fileInput').click();">
                                        <?php } ?>
                                        <input type="file" id="fileInput" name="profile_photo" accept=".jpg,.png,.jpeg"
                                            style="display:none;" onchange="previewImage(event)">
                                    </div>

                                    <div class="col-sm-4"></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="user_name">Enter Name</label><span
                                                class="text-danger">*</span>
                                            <input name="user_name" type="text" id="user_name" value="<?php echo $user_details[0]['user_name']; ?>" class="form-control"
                                                autocomplete="off">
                                            <input name="op_user_id" type="hidden" id="op_user_id" value="<?php echo $user_details[0]['op_user_id']; ?>" class="form-control"
                                                autocomplete="off">
                                            <span id="user_name_error" style="color: red; display: none;">User name is
                                                required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="email">Enter Email ID</label><span class="text-danger">*</span>
                                            <input name="email" type="text" id="email" value="<?php echo $user_details[0]['email']; ?>" class="form-control"
                                                autocomplete="off">
                                            <span id="email_error" style="color: red; display: none;">Email id is
                                                required.</span>
                                            <span id="valid_email_error" style="color: red; display: none;">Enter valid
                                                email id.</span>

                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label><span
                                                class="text-danger">*</span>
                                            <input name="contact_no" type="text" oninput="restrictToNumbers(event)" maxlength="10" value="<?php echo $user_details[0]['contact_no']; ?>" id="contact_no" class="form-control"
                                                min="10" autocomplete="off">
                                            <span id="contact_no_error" style="color: red; display: none;">Contact
                                                number is equired.</span>
                                            <span id="valid_number_error" style="color: red; display: none;">Enter valid
                                                contact number.</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="aadhar_no">Enter Aadhar Number</label>
                                            <input name="aadhar_no" oninput="restrictToNumbers(event)" maxlength="12" type="text" value="<?php echo $user_details[0]['aadhar_no']; ?>" id="aadhar_no" class="form-control"
                                                autocomplete="off">
                                            <small>Format: 123456789012</small>
                                            <span id="adhaar_error" style="color: red; display: none;">Invalid Adhaar Number</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="pan_no">Enter PAN Number</label>
                                            <input name="pan_no" type="text" maxlength="10" value="<?php echo $user_details[0]['pan_no']; ?>" id="pan_no" class="form-control"
                                                autocomplete="off" style="text-transform:uppercase;">
                                            <small>Format: AAAAA9999A</small>
                                            <span id="pan_error" style="color: red; display: none;">Invalid PAN Number</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="role_id">User Role</label><span class="text-danger">*</span>
                                            <select class="form-control" name="role_id" id="role_id">
                                                <option value="">Select Role</option>
                                                <?php foreach ($user_details_role_list as $user_details_role) { ?>
                                                    <option value="<?php echo $user_details_role['role_id'] ?>" <?php if ($user_details[0]['role_id'] == $user_details_role['role_id']) {
                                                                                                            echo "selected";
                                                                                                        } ?>
                                                        data-value="<?php echo $user_details_role['is_ho_user']; ?>">
                                                        <?php echo $user_details_role['role_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span id="role_id_error" style="color: red; display: none;">User role is
                                                required.</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="user_id">Enter User ID</label><span class="text-danger">*</span>
                                            <input name="user_id" type="text" value="<?php echo $user_details[0]['user_id']; ?>" id="user_id" class="form-control"
                                                autocomplete="off">
                                            <span id="user_id_error" style="color: red; display: none;">User id is
                                                required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="password">Enter Password <?php //echo $user_details[0]['password']; ?></label><span
                                                class="text-danger">*</span>
                                            <input name="password" type="password" id="password" class="form-control" value="<?php //echo $user_details[0]['password']; ?>"
                                                autocomplete="off">
                                            <span id="password_error" style="color: red; display: none;">Password is
                                                required.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label for="role_id">User Designation</label><span class="text-danger">*</span>
                                            <select class="form-control" name="designation_id" id="designation_id">
                                                <option value="">Select Designation</option>
                                                <?php foreach ($designationlist as $designation) { ?>
                                                    <option value="<?php echo $designation['id'] ?>" <?php if ($user_details[0]['designation_id'] == $designation['id']) {
                                                                                                            echo "selected";
                                                                                                        } ?>>
                                                        <?php echo $designation['des_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            <span id="designation_id_error" style="color: red; display: none;">User
                                                designation is
                                                required.</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea class="form-control rounded-0" id="address" rows="3"
                                            name="address"> <?php echo $user_details[0]['address']; ?></textarea>
                                    </div>
                                </div>


                                <h5 class="mt-3">Bank Details</h5>
                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control" value="<?php echo $user_details[0]['account_name']; ?>" name="account_name"
                                                id="account_name" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input type="number" class="form-control" value="<?php echo $user_details[0]['account_no']; ?>" name="account_no" id="account_no"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input type="text" name="bank_name" value="<?php echo $user_details[0]['bank_name']; ?>" id="bank_name" class="form-control"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Branch Name</label>
                                            <input type="text" class="form-control" value="<?php echo $user_details[0]['branch_name']; ?>" name="branch_name" id="branch_name"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>IFSC Code</label>
                                            <input type="text" class="form-control" value="<?php echo $user_details[0]['ifsc_code']; ?>" name="ifsc_code" id="ifsc_code"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label>Swift Code</label>
                                            <input type="text" name="swift_code" value="<?php echo $user_details[0]['swift_code']; ?>" id="swift_code" class="form-control"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <button type="submit" class="btn btn-primary" id="submitBtn">Update Profile</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--end page-content-wrapper-->
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

<script>
    document.getElementById('aadhar_no').addEventListener('change', function() {
        let aadhaarNumber = this.value.trim();

        if (/^\d{12}$/.test(aadhaarNumber)) {
            // Mask first 8 digits
            // this.value = aadhaarNumber.slice(0, 8).replace(/\d/g, 'X') + aadhaarNumber.slice(-4);
            $("#adhaar_error").hide();
        } else {
            // this.value = 'Invalid Aadhaar Number';
            $("#adhaar_error").show();
        }
    });

    document.getElementById('pan_no').addEventListener('change', function() {
        let panNumber = this.value.trim().toUpperCase();

        if (/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/.test(panNumber)) {
            // Mask first 6 characters
            // this.value = panNumber.slice(0, 6).replace(/[A-Z0-9]/g, 'X') + panNumber.slice(-4);
            $("#pan_error").hide();
        } else {
            // this.value = 'Invalid PAN Number';
            $("#pan_error").show();
        }
    });
</script>

<script>
    function restrictToNumbers(event) {
        const input = event.target;
        const value = input.value;
        input.value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach the submit handler to the form
        const form = document.getElementById('frmadminlogin');
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission initially
            if (validate_user()) {
                form.submit(); // Submit the form if valid
            }
        });

        // Validate function
        function validate_user() {


            let isValid = true;



            // Check for empty fields and display error if necessary
            ['user_name', 'email', 'contact_no', 'role_id', 'designation_id', 'user_id'].forEach(function(field) {
                let inputElement = document.getElementById(field);
                let errorElement = document.getElementById(field + '_error');

                if (inputElement.value.trim() === '') {
                    errorElement.style.display = 'block'; // Show error message if field is empty
                    isValid = false;
                } else {
                    errorElement.style.display = 'none'; // Hide error message if field is filled
                }
            });




            // Enable submit button only if all fields are valid
            //   document.getElementById('submitBtn').disabled = !isValid;

            return isValid;
        }

        // Event listener to validate fields on input
        document.querySelectorAll('input, select').forEach(function(element) {
            element.addEventListener('input', validate_user);
        });
    });

    function previewImage(event) {
        var reader = new FileReader();
        var file = event.target.files[0];
        reader.onload = function(e) {
            // Set the image preview to the selected file
            document.getElementById('imagePreview').src = e.target.result;
        }
        reader.readAsDataURL(file);
        // Set the image preview to the selected file

    }

    function isValidEmailAddress(emailAddress) {
        // Regular expression for validating email address
        var pattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return pattern.test(emailAddress);
    }
</script>