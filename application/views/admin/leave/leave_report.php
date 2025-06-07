<!--sidebar-wrapper-->
<style type="text/css"></style>
<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-danger alert-dismissible">
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
        <div class="breadcrumb-title pe-3">Leave</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Leave Report</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
            <div class="col-sm-12">

                <form method="post" action="<?php echo base_url();?>filter-leave-report" class="form-material row">
                    
                    <div class="form-group col-md-3">
                        <label>From date <span class="text-danger">*</span></label>
                        <?php 
                            if(empty($from_date))
                            {
                        ?>
                                <input type="date" name="from_date" id="from_date" class="form-control mydatetimepicker mt-2" placeholder="from" required>
                        <?php
                            }
                            else
                            {
                        ?>
                                <input type="date" name="from_date" id="from_date" value="<?php echo $from_date;?>" class="form-control mydatetimepicker mt-2" placeholder="from" required>
                        <?php
                            }
                        ?>
                        
                    </div>

                    <div class="form-group col-md-3">
                        <label>To date <span class="text-danger">*</span></label>
                        <?php 
                            if(empty($to_date))
                            {
                        ?>
                                <input type="date" name="to_date" id="to_date" class="form-control mydatetimepicker mt-2" placeholder="from" required>
                        <?php
                            }
                            else
                            {
                        ?>
                                <input type="date" name="to_date" id="to_date" value="<?php echo $to_date;?>" class="form-control mydatetimepicker mt-2" placeholder="from" required>
                        <?php
                            }
                        ?>
                        
                    </div>

                    <div class="form-group col-md-3">
                        <label>Select Employee <span class="text-danger">*</span></label>
                        <?php 
                            if(empty($emp_id))
                            {
                        ?>
                                <select class="select2 form-control custom-select col-md-8 mt-2" data-placeholder="Choose a Category" 
                                    tabindex="1" id="emp_id" name="emp_id" required>
                                    <option value="">--- Select Employee ---</option>
                                    <option value="all">All Employee</option>
                                    <?php foreach($employee as $value): ?>
                                    <option value="<?php echo $value->op_user_id; ?>">
                                        <?php echo $value->user_name; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                        <?php
                            }
                            else
                            {
                        ?>
                                <select class="select2 form-control custom-select col-md-8 mt-2" data-placeholder="Choose a Category" 
                                    tabindex="1" id="emp_id" name="emp_id" required>
                                    <option value="">--- Select Employee ---</option>
                                    <option value="0" <?php if($emp_id == 0) {echo 'selected';}?>>All Employee</option>
                                    <?php foreach($employee as $value): ?>
                                    <option value="<?php echo $value->op_user_id; ?>"
                                    <?php if($emp_id == $value->op_user_id) {echo 'selected';}?>>
                                        <?php echo $value->user_name; ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                        <?php   
                            }
                        ?>
                        
                    </div>
                    <div class="col-md-3 form-group" style="margin-top:20px;">
                        <input type="submit" class="btn btn-success mt-2" value="Submit" name="submit" id="BtnSubmit">
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-sm-12 mt-5">
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Employee Name</th>
                            <th>Leave Type</th>
                            <th>Leave Date</th>
                            <th>Reason</th>
                            <th>Leave Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($leave_report as $value): ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $value['user_name'] ?></td>
                                <td><?php echo $value['leave_type'] ?></td>
                                <td><?php echo date('jS \of F Y', strtotime($value['start_date'])); ?></td>
                                <td><?php echo $value['leave_reason'] ?></td>
                                <td>
                                  <?php
                                  if ($value['leave_status'] == 'Not Approve') {
                                  ?>
                                    <b style="color:orange;"><?php echo $value['leave_status']; ?></b>
                                  <?php
                                  } else if ($value['leave_status'] == 'Approve') {
                                  ?>
                                    <b style="color:green;"><?php echo $value['leave_status']; ?></b>
                                  <?php
                                  } else if ($value['leave_status'] == 'Rejected') {
                                  ?>
                                    <b style="color:red;"><?php echo $value['leave_status']; ?></b>
                                    <p>Reason : <?php echo $value['reject_reason']; ?></p>
                                  <?php
                                  }
                                  ?>
                                </td>

                                <div class="modal fade" id="editHolidayModal<?php echo $value->id; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <form method="post" action="<?php echo base_url(); ?>update-holiday" id="holidayForm" enctype="multipart/form-data">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Holiday</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                            <!-- Holiday Name -->
                                            <div class="col-sm-12 mt-3">
                                                <div class="form-group">
                                                <label for="holidayName">Holiday Name<span class="text-danger">*</span></label>
                                                <input type="hidden" class="form-control" id="holiday_id" name="holiday_id" value="<?php echo $value->id;?>">
                                                <input type="text" class="form-control" value="<?php echo $value->holiday_name;?>" id="holidayName" name="holiname" placeholder="Enter Holiday Name">
                                                <small class="text-danger" id="holidayNameError"></small>
                                                </div>
                                            </div>
                                            <!-- Start Date -->
                                            <div class="col-sm-12 mt-3">
                                                <div class="form-group">
                                                <label for="startDate">Holiday Start Date<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" value="<?php echo $value->from_date;?>" id="startDate" name="startdate">
                                                <small class="text-danger" id="startDateError"></small>
                                                </div>
                                            </div>
                                            <!-- End Date -->
                                            <div class="col-sm-12 mt-3">
                                                <div class="form-group">
                                                <label for="endDate">Holiday End Date<span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" value="<?php echo $value->to_date;?>" id="endDate" name="enddate">
                                                <small class="text-danger" id="endDateError"></small>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="saveButton">Update</button>
                                        </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Employee Name</th>
                            <th>Leave Type</th>
                            <th>Leave Date</th>
                            <th>Reason</th>
                            <th>Leave Status</th>
                        </tr>
                    </tfoot>
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    </div>
  </div>
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
<!--End Back To Top Button-->
<!--footer -->
<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="post" action="<?php echo base_url(); ?>add-holiday" id="holidayForm" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Holiday</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- Holiday Name -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="holidayName">Holiday Name<span class="text-danger">*</span></label>
                <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter Holiday Name">
                <input type="text" class="form-control" id="holidayName" name="holiname" placeholder="Enter Holiday Name">
                <small class="text-danger" id="holidayNameError"></small>
              </div>
            </div>
            <!-- Start Date -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="startDate">Holiday Start Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="startDate" name="startdate">
                <small class="text-danger" id="startDateError"></small>
              </div>
            </div>
            <!-- End Date -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="endDate">Holiday End Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="endDate" name="enddate">
                <small class="text-danger" id="endDateError"></small>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="saveButton">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- validate add holiday form -->
<script>
  document.getElementById("holidayForm").addEventListener("submit", function (e) {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll("small.text-danger").forEach(error => (error.textContent = ""));

    // Validate Holiday Name
    const holidayName = document.getElementById("holidayName").value.trim();
    if (!holidayName) {
      document.getElementById("holidayNameError").textContent = "Holiday Name is required.";
      isValid = false;
    }

    // Validate Start Date
    const startDate = document.getElementById("startDate").value;
    if (!startDate) {
      document.getElementById("startDateError").textContent = "Start Date is required.";
      isValid = false;
    }

    // Validate End Date
    const endDate = document.getElementById("endDate").value;
    if (!endDate) {
      document.getElementById("endDateError").textContent = "End Date is required.";
      isValid = false;
    }

    // Validate Date Logic (Start Date < End Date)
    if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
      document.getElementById("endDateError").textContent = "End Date must be after Start Date.";
      isValid = false;
    }

    // Prevent Form Submission if Invalid
    if (!isValid) {
      e.preventDefault();
    }
  });
</script>

<!-- on edit button click  -->

<script type="text/javascript">
  $(document).ready(function () {
    $(".holiday").click(function (e) {
      e.preventDefault(); // Prevent default click behavior
      var iid = $(this).attr('data-id');
      $('#holidayForm').trigger("reset");
      $('#exampleVerticallycenteredModal').modal('show');
      $.ajax({
        url: '<?php echo base_url();?>Leave/get_holiday_details?id=' + iid,
        method: 'GET',
        dataType: 'json',
      }).done(function (response) {
        console.log(response);
        // Populate the form fields with the data returned from the server
        $('#holidayForm').find('[name="id"]').val(response.holidayvalue.id);
        $('#holidayForm').find('[name="holiname"]').val(response.holidayvalue.holiday_name);
        $('#holidayForm').find('[name="startdate"]').val(response.holidayvalue.from_date);
        $('#holidayForm').find('[name="enddate"]').val(response.holidayvalue.to_date);
      });
    });
  });
</script>