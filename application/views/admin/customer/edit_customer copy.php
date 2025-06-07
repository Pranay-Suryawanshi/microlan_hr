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
        <div class="breadcrumb-title pe-3">Edit Customer Details</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit Customer Details </li>
            </ol>
          </nav>
        </div>

      </div>
      <!--end breadcrumb-->
      <form method="post" class="form-validate" name="customer_from"
        action="<?php echo base_url('update-customer/' . $res['cust_id']); ?>" id="frmadminlogin" enctype="multipart/form-data" onsubmit="return validate_customer(this);">

        <div class="card radius-15">
          <div class="card-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation"> <a class="nav-link active" id="home-tab" data-bs-toggle="tab"
                  href="#home" role="tab" aria-controls="home" aria-selected="true">Customer Details</a>
              </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="profile-tab" data-bs-toggle="tab"
                  href="#profile" role="tab" aria-controls="profile" aria-selected="false">Billing Address</a>
              </li>
              <li class="nav-item" role="presentation"> <a class="nav-link" id="contact-tab" data-bs-toggle="tab"
                  href="#contact" role="tab" aria-controls="contact" aria-selected="false">Shipping Address</a>
              </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class=" row">
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Company <span class="text-danger">*</span></label>

                      <input type="text" name="company" class="form-control" id="company" value="<?php echo $res['company']; ?>"
                        placeholder="Enter your company name.">
                      <span id="company_error" style="color: red; display: none;">Company name is
                        required.</span>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany"> Contact Person </label>

                      <input type="text" name="contact_person" class="form-control" id="contact_person" value="<?php echo $res['contact_person']; ?>"
                        placeholder="Enter the contact person name">
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Email <span class="text-danger">*</span></label>

                      <input type="email" name="email" class="form-control" id="email" value="<?php echo $res['email']; ?>" placeholder="Enter your email">
                      <span id="email_error" style="color: red; display: none;">Email id is
                        required.</span>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Phone <span class="text-danger">*</span></label>

                      <input type="text" name="phone" oninput="restrictToNumbers(event)" maxlength="10" class="form-control" id="phone" value="<?php echo $res['phone']; ?>"
                        placeholder="Enter your phone number.">
                      <span id="phone_error" style="color: red; display: none;">Phone number is
                        required.</span>
                    </div>
                  </div>
                  <div class="col-md-12 mt-3">
                    <div class="form-group">
                      <label for="inputaddress">Address</label>

                      <textarea name="address" id="address" class="form-control"><?php echo $res['address']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Country</label>

                      <input type="text" name="country" class="form-control" id="country" value="<?php echo $res['country']; ?>"
                        placeholder="Enter your country name.">
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">State</label>

                      <select class="form-control select2" name="state_code" id="state">
                        <option>Select State</option>
                        <?php if (!empty($cust_states)) {
                          foreach ($cust_states as $key => $value) { ?>
                            <option value="<?php echo $value['state_id']; ?>" <?php if ($value['state_id'] == $res['state_code']) {
                                                                                echo "selected=''";
                                                                              } ?>>
                              <?php echo strtoupper($value['state_name']); ?>
                            </option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">City</label>

                      <select class="form-control select2" name="city" id="city">
                      </select>
                      <!--  <input type="text" name="city" class="form-control" id="city" placeholder="Enter your city name."> -->
                    </div>
                  </div>


                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Zip Code</label>

                      <input type="text" name="zip_code" class="form-control" id="zip_code" value="<?php echo $res['zip_code']; ?>"
                        placeholder="Enter your  zip code.">
                    </div>
                  </div>


                  <div class="col-md-4 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Website</label>

                      <input type="text" name="website" class="form-control" id="website" value="<?php echo $res['website']; ?>"
                        placeholder="Enter your website name.">
                    </div>
                  </div>


                  <div class="col-md-4 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">Currency</label>

                      <!--  <input type="text" name="currency" class="form-control" id="currency" placeholder="Enter your currency name." > -->
                      <select class="form-control">
                        <option value="INR" <?php if ($value['state_id'] == 'INR') {
                                              echo "selected=''";
                                            } ?>>INR</option>
                        <option value="USD" <?php if ($value['state_id'] == 'USD') {
                                              echo "selected=''";
                                            } ?>>USD</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 mt-3">
                    <div class="form-group">
                      <label for="inputcompany">GSTN Number</label>
                      <!-- #endregion -->
                      <input type="text" name="vat_number" class="form-control" id="vat_number" value="<?php echo $res['vat_number']; ?>"
                        placeholder="Enter your gstn number">
                    </div>

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="row">
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="bill_street">Street</label>
                      <input type="text" name="bill_street" class="form-control" id="bill_street" placeholder="" value="<?php echo $res['bill_street']; ?>">
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="bill_state">State</label>
                      <select class="form-control select2" name="bill_state" id="bill_state">
                        <option>Select State</option>
                        <?php if (!empty($bill_states)) {
                          foreach ($bill_states as $key => $value) { ?>
                            <option value="<?php echo $value['state_id']; ?>" <?php if ($value['state_id'] == $res['bill_state']) {
                                                                                echo "selected=''";
                                                                              } ?>>
                              <?php echo strtoupper($value['state_name']); ?>
                            </option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="bill_city">City</label>
                      <select class="form-control select2" name="bill_city" id="bill_city">

                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="bill_zip_code">Zip Code</label>
                      <input type="text" name="bill_zip_code" class="form-control" id="bill_zip_code" placeholder="" value="<?php echo $res['bill_zip_code']; ?>">
                    </div>
                  </div>
                  <div class="col-md-3 mt-3">
                    <div class="form-group">
                      <label for="bill_country">Country</label>
                      <input type="text" name="bill_country" class="form-control" id="bill_country" placeholder="" readonly value="India">
                    </div>
                  </div>
                </div>

              </div>

              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                  <div class="col-md-12 mt-3">
                    <!-- <div class="form-group">
                              <label for="same_as_copy">Same as address</label>
                              <input type="checkbox" name="shipping_same_as_address" id="same_as_copy">
                            </div> -->
                  </div>
                  <div class="col-md-6  mt-3">
                    <div class="form-group">
                      <label for="shipping_street">Street</label>
                      <input type="text" name="shipping_street" class="form-control" id="shipping_street" value="<?php echo $res['shipping_street']; ?>"
                        placeholder="">
                    </div>
                  </div>
                  <div class="col-md-6  mt-3">
                    <div class="form-group">
                      <label for="shipping_state">State</label>
                      <select class="form-control select2" name="shipping_state" id="shipping_state">
                        <option>Select State</option>
                        <?php if (!empty($ship_states)) {
                          foreach ($ship_states as $key => $value) { ?>
                            <option value="<?php echo $value['state_id']; ?>" <?php if ($value['state_id'] == $res['shipping_state']) {
                                                                                echo "selected=''";
                                                                              } ?>>
                              <?php echo strtoupper($value['state_name']); ?>
                            </option>
                        <?php }
                        } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6  mt-3">
                    <div class="form-group">
                      <label for="shipping_city">City</label>
                      <select class="form-control select2" name="shipping_city" id="shipping_city">

                      </select>
                    </div>
                  </div>
                  <div class="col-md-6  mt-3">
                    <div class="form-group">
                      <label for="shipping_zip_code">Zip Code</label>
                      <input type="text" name="shipping_zip_code" class="form-control" id="shipping_zip_code" value="<?php echo $res['shipping_zip_code']; ?>"
                        placeholder="">
                    </div>
                  </div>
                  <div class="col-md-6  mt-3">
                    <div class="form-group">
                      <label for="shipping_country">Country</label>
                      <input type="text" class="form-control" name="shipping_country" id="shipping_country" value="<?php echo $res['shipping_country']; ?>"
                        placeholder="">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12 mt-3">
          <button type="submit" class="btn btn-primary ">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--end page-content-wrapper-->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // $('#state').empty(); // Clear before appending

    // $('#bill_state').empty().append('<option>Select State</option>');

    var selectedState = "<?php echo isset($res['state_code']) ? $res['state_code'] : ''; ?>";
    var selectedCity = "<?php echo isset($res['city']) ? $res['city'] : ''; ?>";

    console.log("State: " + selectedState + " | City: " + selectedCity);

    if (selectedState) {
      $.ajax({
        url: "<?php echo base_url('customer/get_city'); ?>",
        method: "POST",
        data: {
          state_id: selectedState
        },
        dataType: "json",
        success: function(response) {
          console.log("City response:", response);
          // alert('Success loading cities');

          $('#city').empty().append('<option value="">Select City</option>');

          $.each(response, function(index, city) {
            var isSelected = (city.city_id == selectedCity) ? 'selected' : '';
            $('#city').append('<option value="' + city.city_id + '" ' + isSelected + '>' + city.city_name + '</option>');
          });

          $('#city').trigger('change');
        },
        error: function(xhr, status, error) {
          console.log("AJAX error:", xhr.responseText);
          // alert("AJAX error occurred");
        }
      });
    }

    var selectedBillState = "<?php echo isset($res['bill_state']) ? $res['bill_state'] : ''; ?>";
    var selectedBillCity = "<?php echo isset($res['bill_city']) ? $res['bill_city'] : ''; ?>";

    console.log("State: " + selectedBillState + " | City: " + selectedBillCity);

    if (selectedState) {
      $.ajax({
        url: "<?php echo base_url('customer/get_city'); ?>",
        method: "POST",
        data: {
          state_id: selectedBillState
        },
        dataType: "json",
        success: function(response) {
          console.log("City response:", response);
          // alert('Success loading cities');

          $('#bill_city').empty().append('<option value="">Select City</option>');

          $.each(response, function(index, city) {
            var isSelected = (city.city_id == selectedBillCity) ? 'selected' : '';
            $('#bill_city').append('<option value="' + city.city_id + '" ' + isSelected + '>' + city.city_name + '</option>');
          });

          $('#bill_city').trigger('change');
        },
        error: function(xhr, status, error) {
          console.log("AJAX error:", xhr.responseText);
          // alert("AJAX error occurred");
        }
      });
    }

    var selectedShipState = "<?php echo isset($res['shipping_state']) ? $res['shipping_state'] : ''; ?>";
    var selectedShipCity = "<?php echo isset($res['shipping_city']) ? $res['shipping_city'] : ''; ?>";

    console.log("State: " + selectedShipState + " | City: " + selectedShipCity);

    if (selectedState) {
      $.ajax({
        url: "<?php echo base_url('customer/get_city'); ?>",
        method: "POST",
        data: {
          state_id: selectedShipState
        },
        dataType: "json",
        success: function(response) {
          console.log("City response:", response);
          // alert('Success loading cities');

          $('#shipping_city').empty().append('<option value="">Select City</option>');

          $.each(response, function(index, city) {
            var isSelected = (city.city_id == selectedShipCity) ? 'selected' : '';
            $('#shipping_city').append('<option value="' + city.city_id + '" ' + isSelected + '>' + city.city_name + '</option>');
          });

          $('#shipping_city').trigger('change');
        },
        error: function(xhr, status, error) {
          console.log("AJAX error:", xhr.responseText);
          // alert("AJAX error occurred");
        }
      });
    }
  });
</script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Attach the submit handler to the form
    const form = document.getElementById('frmadminlogin');
    form.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission initially
      if (validate_customer()) {
        form.submit(); // Submit the form if valid
      }
    });

    // Validate function
    function validate_customer() {


      let isValid = true;



      // Check for empty fields and display error if necessary
      ['company', 'email', 'phone'].forEach(function(field) {
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
      element.addEventListener('input', validate_customer);
    });
  });

  $("#state").change(function() {
    var state_id = $('#state').val();
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
      success: function(response) {
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
    dataType: 'json', // <-- must be JSON to parse correctly
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function (response) {
      $('#bill_city').empty().append('<option value="">Select City</option>');
      $.each(response, function (index, city) {
        $('#bill_city').append(
          '<option value="' + city.city_id + '">' + city.city_name + '</option>'
        );
      });
    },
    error: function (xhr, status, error) {
      console.error('AJAX Error:', error);
    }
  });
});


  $("#shipping_state").change(function() {
  var state_id = $('#bill_state').val();
  var form_data = new FormData();
  form_data.append('state_id', state_id);

  $.ajax({
    type: "POST",
    url: "<?php echo base_url('customer/get_city'); ?>",
    dataType: 'json', // <-- must be JSON to parse correctly
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
    success: function (response) {
      $('#shipping_city').empty().append('<option value="">Select City</option>');
      $.each(response, function (index, city) {
        $('#shipping_city').append(
          '<option value="' + city.city_id + '">' + city.city_name + '</option>'
        );
      });
    },
    error: function (xhr, status, error) {
      console.error('AJAX Error:', error);
    }
  });
});
</script>