<!--sidebar-wrapper-->
<style type="text/css"></style>
<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success alert-dismissible">
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
        <div class="breadcrumb-title pe-3">Leave Application</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Leave Application</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <button type="btn" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addLeaveModal">
                <i class="fa fa-plus"></i> Add Leave Application 
              </button>
            </div>
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Emp Name</th>
                      <th>Leave Type</th>
                      <th>Apply Date</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Duration</th>
                      <th>Reason</th>
                      <th>Admin Reason</th>
                      <th>Leave Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <?php $k = 1;
                    foreach ($leaves as $value): ?>
                      <tr>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#editLeaveModal<?php echo $value->emp_leave_id; ?>"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                              <?php
                              if ($value->leave_status == 'Not Approve') {
                              ?>
                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                  data-bs-target="#approveLeave<?php echo $value->emp_leave_id; ?>"
                                  class="btn btn-sm waves-effect waves-light holiday"
                                  style="color:green">
                                  <i class="fa fa-check"></i> Approved
                                </a>
                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                  data-bs-target="#rejectLeave<?php echo $value->emp_leave_id; ?>"
                                  class="btn btn-sm waves-effect waves-light holiday"
                                  style="color:red">
                                  <i class="fa fa-times"></i> Reject
                                </a>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $k++ ?></td>
                        <td><?php echo $value->user_name ?></td>
                        <td>
                          <?php echo $value->leave_type_id ? $value->name: "N/A";  ?>
                        </td>
                        <!-- <td><?php
                            if ($value->leave_type == 'Hourly') {
                              echo $value->leave_type . ' - ' . $value->hour_length . ' Hours';
                            } else if ($value->leave_type == 'Full Day') {
                              echo $value->leave_type . ' - ' . date('d-m-Y', strtotime($value->start_date));
                            } else {
                              echo $value->leave_type . ' - ' . date('d-m-Y', strtotime($value->start_date)) . ' to ' . date('d-m-Y', strtotime($value->end_date)) . ' Days';
                            } ?>
                        </td> -->
                        <td><?php echo date('jS \of F Y', strtotime($value->apply_date)); ?></td>
                        <td><?php if (!empty($value->start_date)) {
                              echo date('jS \of F Y', strtotime($value->start_date));
                            } ?>
                        </td>
                        <td><?php if (!empty($value->end_date)) {
                              echo date('jS \of F Y', strtotime($value->end_date));
                            } else {
                              echo '-';
                            } ?>
                        </td>
                        <td><?php
                            if ($value->leave_type == 'Hourly') {
                              echo $value->leave_type . ' - ' . $value->hour_length . ' Hours';
                            } else if ($value->leave_type == 'Full Day') {
                              echo $value->leave_type . ' - ' . date('d-m-Y', strtotime($value->start_date));
                            } else {
                              echo $value->leave_type . ' - ' . date('d-m-Y', strtotime($value->start_date)) . ' to ' . date('d-m-Y', strtotime($value->end_date)) . ' Days';
                            } ?>
                        </td>
                        <!-- <td>
                          <?php
                            if ($value->leave_type == 'Hourly') {
                              echo $value->hour_length . ' Hours';
                            } else if ($value->leave_type == 'Full Day') {
                              echo '-';
                            } else {
                              echo '-';
                            } 
                          ?>
                        </td> -->
                        <td><?php echo $value->leave_reason ?></td>
                        <td><p><?php echo $value->reject_reason; ?></p></td>
                        <td>
                          <?php
                          if ($value->leave_status == 'Not Approve') {
                          ?>
                            <b style="color:orange;"><?php echo $value->leave_status; ?></b>
                          <?php
                          } else if ($value->leave_status == 'Approved') {
                          ?>
                            <b style="color:green;"><?php echo $value->leave_status; ?></b>
                          <?php
                          } else if ($value->leave_status == 'Rejected') {
                          ?>
                            <b style="color:red;"><?php echo $value->leave_status; ?></b>
                           
                          <?php
                          }
                          ?>
                        </td>
                      </tr>

                      <!-- Update Leave modal -->
                      <div class="modal fade" id="editLeaveModal<?php echo $value->emp_leave_id; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-lg">
                          <form method="post" action="<?php echo base_url(); ?>update-leave-application" enctype="multipart/form-data">
                            <input type="hidden" name="emp_leave_id" value="<?php echo $value->emp_leave_id; ?>" />
                            <input type="hidden" name="leave_status" value="<?php echo $value->leave_status; ?>" />
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Edit Leave Application</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                               <?php 
                                $logged_in_user_name = $this->session->userdata('user_name');
                                $logged_in_user_id = $this->session->userdata('op_user_id');


                                ?>

                                <div class="col-sm-12 mt-3">
                                  <div class="form-group">
                                    <label>Employee <span class="text-danger">*</span></label>

                                    <?php if($role_id == 1): ?>

                                    <select class="form-control custom-select selectedEmployeeID" name="emp_id" required>
                                      <option value="">Select Here..</option>
                                      
                                      <?php foreach ($employee as $val): ?>
                                        <option value="<?php echo $val->op_user_id ?>" <?php echo ($val->op_user_id == $value->emp_id) ? 'selected' : ''; ?>>
                                          <?php echo $val->user_name ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                    <?php else: ?>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($logged_in_user_name); ?>" readonly>
                                    <input type="hidden" name="emp_id" value="<?php echo htmlspecialchars($logged_in_user_id); ?>">
                                    
                                    <?php endif; ?>

                                  </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                  <div class="form-group">
                                    <label>Leave Type <span class="text-danger">*</span></label>
                                    <select class="form-control custom-select assignleave" name="leave_type_id" required>
                                      <option value="">Select Here..</option>
                                      <?php foreach ($leavetypes as $val): ?>
                                        <option value="<?php echo $val->type_id ?>" <?php echo ($val->type_id == $value->leave_type_id) ? 'selected' : ''; ?>>
                                          <?php echo $val->name ?>
                                        </option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>

                                <?php $leave_id = $value->emp_leave_id; ?>
                                <div class="form-group mt-3">
                                  <label>Leave Duration <span class="text-danger">*</span></label><br>
                                  <input type="radio" name="editleave_duration" class="durationRadio" data-leave-id="<?= $leave_id ?>" id="hourly<?= $leave_id ?>" value="Hourly" <?= ($value->leave_type == 'Hourly') ? 'checked' : '' ?>>
                                  <label for="hourly<?= $leave_id ?>">Hourly</label>

                                  <input type="radio" name="editleave_duration" class="durationRadio" data-leave-id="<?= $leave_id ?>" id="fullday<?= $leave_id ?>" value="Full Day" <?= ($value->leave_type == 'Full Day') ? 'checked' : '' ?>>
                                  <label for="fullday<?= $leave_id ?>">Full Day</label>

                                  <input type="radio" name="editleave_duration" class="durationRadio" data-leave-id="<?= $leave_id ?>" id="more<?= $leave_id ?>" value="More than One day" <?= ($value->leave_type == 'More than One day') ? 'checked' : '' ?>>
                                  <label for="more<?= $leave_id ?>">More than One Day</label>
                                </div>

                                <div class="col-sm-12 mt-3">
                                  <div class="form-group" id="hourlyFix<?= $leave_id ?>" style="display:none">
                                    <label class="control-label">Date <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" value="<?php echo $value->start_date; ?>" class="form-control">
                                  </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                  <div class="form-group" id="enddate<?= $leave_id ?>" style="display:none">
                                    <label class="control-label">End Date <span class="text-danger">*</span></label>
                                    <input type="date" name="end_date" value="<?php echo $value->end_date; ?>" class="form-control">
                                  </div>
                                </div>

                                <div class="col-sm-12 mt-3">
                                  <div class="form-group" id="hourAmount<?= $leave_id ?>" style="display:none">
                                    <label>Hour Length <span class="text-danger">*</span></label>
                                    <select class="form-control" name="hour_length">
                                      <option value="">Select Hour</option>
                                      <?php for ($i = 1; $i <= 8; $i++): ?>
                                        <option value="<?= $i ?>" <?= ($value->hour_length == $i) ? 'selected' : '' ?>><?= $i ?> hour<?= $i > 1 ? 's' : '' ?></option>
                                      <?php endfor; ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label class="control-label" id="hourAmount<?= $leave_id ?>" >Date <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" value="<?php echo $value->start_date ?>" class="form-control" id="startdateHourly">
                                  </div>

                                </div>
                                

                                <div class="col-sm-12 mt-3">
                                  <div class="form-group">
                                    <label>Reason <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="leave_reason" required><?php echo $value->leave_reason; ?></textarea>
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>


                      <!-- Approve Leave -->
                      <div class="modal fade" id="approveLeave<?php echo $value->emp_leave_id; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <form method="post" action="<?php echo base_url(); ?>approve-leave-application" id="holidayForm" enctype="multipart/form-data">
                            <input type="hidden" name="emp_leave_id" value="<?php echo $value->emp_leave_id; ?>" />
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Approve Leave Application</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group">
                                  <label class="control-label">Are you sure you want to approve this leave application?</label>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="saveButton">Approved Leave</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                      <!-- Reject Leave -->
                      <div class="modal fade" id="rejectLeave<?php echo $value->emp_leave_id; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <form method="post" action="<?php echo base_url(); ?>reject-leave-application" id="holidayForm" enctype="multipart/form-data">
                            <input type="hidden" name="emp_leave_id" value="<?php echo $value->emp_leave_id; ?>" />
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Reject Leave Application</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group">
                                  <label class="control-label">Are you sure you want to reject this leave application?</label>
                                </div>
                                <div class="col-sm-12 mt-3">
                                  <div class="form-group">
                                    <label class="control-label">Reject Reason <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="reject_reason" id="message-text1" required><?php echo $value->reject_reason; ?></textarea>
                                  </div>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" id="saveButton">Reject Leave</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>

                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Emp Name</th>
                      <th>Leave Type</th>
                      <th>Apply Date</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Duration</th>
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
<div class="modal fade" id="addLeaveModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg">
    <form method="post" action="<?php echo base_url(); ?>submit-leave-application" id="leaveapply" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Leave Application</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <?php 
          $logged_in_user_name = $this->session->userdata('user_name');
          $logged_in_user_id = $this->session->userdata('op_user_id');
          ?>

          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label>Employee <span class="text-danger">*</span></label>

              <!-- Only Show Dropdown SuperAdmin -->
               
             <?php if ($role_id == 1 ): ?>
  
              <select class="form-control custom-select selectedEmployeeID" name="emp_id" required>
                <option value="">Select Here..</option>
                
                <?php foreach ($employee as $val): ?>
                  
                <option value="<?php echo $val->op_user_id ?>" <?php echo ($val->op_user_id == $value->emp_id) ? 'selected' : ''; ?>>
                  <?php echo $val->user_name ?>
                </option>
                <?php endforeach; ?>
              </select>
              <?php else: ?>
  
              <input type="text" class="form-control" value="<?php echo htmlspecialchars($logged_in_user_name); ?>" readonly>
              <input type="hidden" name="emp_id" value="<?php echo htmlspecialchars($logged_in_user_id); ?>">
              <?php endif; ?>

            </div>
          </div>

          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label>Leave Type <span class="text-danger">*</span></label>
              <select class="form-control custom-select assignleave" tabindex="1" name="leave_type_id" id="leave_type_id" required>
                <option value="">Select Here..</option>
                <?php foreach ($leavetypes as $value): ?>

                  <option value="<?php echo $value->type_id ?>"><?php echo $value->name ?></option>

                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label class="control-label">Leave Duration <span class="text-danger">*</span></label><br>
              <input name="leave_duration" type="radio" id="radio_1" class="duration" value="Hourly" required>
              <label for="radio_1">Hourly</label>
              <input name="leave_duration" type="radio" id="radio_2" class="type" value="Full Day">
              <label for="radio_2">Full Day</label>
              <input name="leave_duration" type="radio" class="with-gap duration" id="radio_3" value="More than One day" required>
              <label for="radio_3">More than One Day</label>
            </div>
          </div>
          <div class="col-sm-12 mt-3" id="hourlyFix" style="display:none">
            <div class="form-group">
              <label class="control-label">Date <span class="text-danger">*</span></label>
              <input type="date" name="start_date" min="<?= date('Y-m-d'); ?>" class="form-control mydatetimepickerFull" id="recipient-name1">
            </div>
          </div>
          <div class="col-sm-12 mt-3" id="enddate" style="display:none">
            <div class="form-group">
              <label class="control-label">End Date <span class="text-danger">*</span></label>
              <input type="date" name="end_date" min="<?= date('Y-m-d'); ?>" class="form-control mydatetimepickerFull" id="recipient-name1">
            </div>
          </div>
          <div class="col-sm-12 mt-3" id="hour_length" style="display:none">
            <div class="form-group">
              <label>Hour Length <span class="text-danger">*</span></label>
              <select id="hourAmountVal" class=" form-control custom-select" tabindex="1" name="hour_length">
                <option value="">Select Hour</option>
                <option value="1">One hour</option>
                <option value="2">Two hour</option>
                <option value="3">Three hour</option>
                <option value="4">Four hour</option>
                <option value="5">Five hour</option>
                <option value="6">Six hour</option>
                <option value="7">Seven hour</option>
                <option value="8">Eight hour</option>
              </select>

              <!-- <div class="form-group">
                <label class="control-label">Date <span class="text-danger">*</span></label>
                <input type="date" name="start_date" min="<?= date('Y-m-d'); ?>" class="form-control" id="startdateHourly">
              </div> -->
              
            </div>
                 
              
          
          </div>
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label class="control-label">Reason <span class="text-danger">*</span></label>
              <textarea class="form-control" name="leave_reason" id="message-text1" required></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" class="form-control" id="recipient-name1" required>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- validate add holiday form -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    // Trigger on change of radio buttons with class 'duration'
    $('input[name="leave_duration"]').on('change', function() {
      var value = $(this).val();

      // First, hide all relevant sections and remove required
      $('#hourlyFix').hide();
      $('#enddate').hide();
      $('#hour_length').hide();

      $('input[name="start_date"]').prop('required', false);
      $('input[name="end_date"]').prop('required', false);
      $('select[name="hour_length"]').prop('required', false);

      // Show relevant sections and set required as needed
      if (value === 'Hourly') {
        $('#hourlyFix').show();
        $('#hour_length').show();
        // $('input[name="start_date"]').prop('required', true);
        // $('select[name="hour_length"]').prop('required', true);
      } else if (value === 'Full Day') {
        $('#hourlyFix').show();
        // $('input[name="start_date"]').prop('required', true);Q
      } else if (value === 'More than One day') {
        $('#hourlyFix').show();
        $('#enddate').show();
        // $('input[name="start_date"]').prop('required', true);
        // $('input[name="end_date"]').prop('required', true);
      }
    });

    // When modal is opened, trigger change event if a radio is selected
    $('#addLeaveModal').on('shown.bs.modal', function() {
      $('input[name="leave_duration"]:checked').trigger('change');
    });
  });
</script>

<script>
  $(document).ready(function () {
    $('.durationRadio').on('change', function () {
      var leaveId = $(this).data('leave-id');
      var value = $(this).val();
      var $modal = $('#editLeaveModal' + leaveId);

      // Hide all duration-related sections
      $modal.find('#hourlyFix' + leaveId).hide();
      $modal.find('#enddate' + leaveId).hide();
      $modal.find('#hourAmount' + leaveId).hide();

      // Remove all required attributes first
      $modal.find('input[name="start_date"]').prop('required', false);
      $modal.find('input[name="end_date"]').prop('required', false);
      $modal.find('select[name="hour_length"]').prop('required', false);

      // Show relevant sections based on selected duration
      if (value === 'Hourly') {
        $modal.find('#hourlyFix' + leaveId).hide();
        $modal.find('#hourAmount' + leaveId).show();
        // $modal.find('input[name="start_date"]').prop('required', true);
        $modal.find('select[name="hour_length"]').prop('required', true);
      } else if (value === 'Full Day') {
        $modal.find('#hourlyFix' + leaveId).show();
        $modal.find('input[name="start_date"]').prop('required', true);
      } else if (value === 'More than One day') {
        $modal.find('#hourlyFix' + leaveId).show();
        $modal.find('#enddate' + leaveId).show();
        $modal.find('input[name="start_date"]').prop('required', true);
        $modal.find('input[name="end_date"]').prop('required', true);
      }
    });

    // Trigger default display when modal opens
    $('.modal').on('shown.bs.modal', function () {
      $(this).find('.durationRadio:checked').trigger('change');
    });
  });
</script>



<script>
  // $(document).ready(function () {
  //   $('.durationRadio').on('change', function () {
  //     var leaveId = $(this).data('leave-id');
  //     var value = $(this).val();

  //     // Hide all first
  //     $('.hourlySection' + leaveId).hide();
  //     $('.endSection' + leaveId).hide();
  //     $('.hourLength' + leaveId).hide();

  //     // Show according to selected value

  //     if (value === 'Hourly') {
  //       $('#enddate' + leaveId).hide();
  //       $('#hourlyFix' + leaveId).hide();
  //       $('#hourAmount' + leaveId).show();
  //       $('select[name="hour_length"]').prop('required', true);
  //     } else if (value === 'Full Day') {
  //       $('#enddate' + leaveId).hide();
  //       $('#hourAmount' + leaveId).hide();
  //       $('#hourlyFix' + leaveId).show();
  //       // $('#hourlyFix').text('Date');
  //       $('input[name="start_date"]').prop('required', true);
  //     } else if (value === 'More than One day') {
  //       $('#hourlyFix' + leaveId).show();
  //       $('#enddate' + leaveId).show();
  //       $('#hourAmount' + leaveId).hide();
  //       $('input[name="start_date"]').prop('required', true);
  //       $('input[name="end_date"]').prop('required', true);
  //     }
  //   });

  //   // Trigger change on modal open to set fields
  //   $('.modal').on('shown.bs.modal', function () {
  //     $(this).find('.durationRadio:checked').trigger('change');
  //   });
  // });
</script>

<script>
  // Wait for the modal to be fully shown
  $(document).ready(function() {
    $('#addLeaveModal').on('shown.bs.modal', function() {
      handleLeaveDurationChange(); // Run function when modal is shown

      // Listen for radio button change events
      $('input[name="leave_duration"]').on('change', function() {
        handleLeaveDurationChange(); // Run function on radio button change
      });

      // Function to handle showing/hiding elements based on selected leave duration
      function handleLeaveDurationChange() {
        const selectedValue = $('input[name="leave_duration"]:checked').val();
        console.log("Selected:", selectedValue); // For debugging

        if (selectedValue === 'Hourly') {
          $('#enddate').hide();
          $('#hourlyFix').hide();
          $('#hour_length').show();
        } else if (selectedValue === 'Full Day') {
          $('#enddate').hide();
          $('#hour_length').hide();
          $('#hourlyFix').show();
          // $('#hourlyFix').text('Date');
        } else if (selectedValue === 'More than One day') {
          $('#hourlyFix').show();
          $('#enddate').show();
          $('#hour_length').hide();
        }
      }
    });

    // Handle behavior when the modal is hidden (reset things if needed)
    // $('#addLeaveModal').on('hidden.bs.modal', function () {
    //   // Optional: Reset form and hide elements on modal close
    //   $('#enddate').hide();
    //   $('#hour_length').hide();
    //   $('#hourlyFix').show();
    //   $('#hourlyFix').text('Date');
    // });
  });
</script>

<script>
  // document.getElementById("holidayForm").addEventListener("submit", function(e) {
  //   let isValid = true;

  //   // Clear previous error messages
  //   document.querySelectorAll("small.text-danger").forEach(error => (error.textContent = ""));

  //   // Validate Holiday Name
  //   const holidayName = document.getElementById("holidayName").value.trim();
  //   if (!holidayName) {
  //     document.getElementById("holidayNameError").textContent = "Holiday Name is required.";
  //     isValid = false;
  //   }

  //   // Validate Start Date
  //   const startDate = document.getElementById("startDate").value;
  //   if (!startDate) {
  //     document.getElementById("startDateError").textContent = "Start Date is required.";
  //     isValid = false;
  //   }

  //   // Validate End Date
  //   const endDate = document.getElementById("endDate").value;
  //   if (!endDate) {
  //     document.getElementById("endDateError").textContent = "End Date is required.";
  //     isValid = false;
  //   }

  //   // Validate Date Logic (Start Date < End Date)
  //   if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
  //     document.getElementById("endDateError").textContent = "End Date must be after Start Date.";
  //     isValid = false;
  //   }

  //   // Prevent Form Submission if Invalid
  //   if (!isValid) {
  //     e.preventDefault();
  //   }
  // });
</script>

<!-- on edit button click  -->
<script type="text/javascript">
  // $(document).ready(function() {
  //   $(".holiday").click(function(e) {
  //     e.preventDefault(); // Prevent default click behavior
  //     var iid = $(this).attr('data-id');
  //     $('#holidayForm').trigger("reset");
  //     $('#addLeaveModal').modal('show');
  //     $.ajax({
  //       url: '<?php echo base_url(); ?>Leave/get_holiday_details?id=' + iid,
  //       method: 'GET',
  //       dataType: 'json',
  //     }).done(function(response) {
  //       console.log(response);
  //       // Populate the form fields with the data returned from the server
  //       $('#holidayForm').find('[name="id"]').val(response.holidayvalue.id);
  //       $('#holidayForm').find('[name="holiname"]').val(response.holidayvalue.holiday_name);
  //       $('#holidayForm').find('[name="startdate"]').val(response.holidayvalue.from_date);
  //       $('#holidayForm').find('[name="enddate"]').val(response.holidayvalue.to_date);
  //     });
  //   });
  // });
</script>