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
        <div class="breadcrumb-title pe-3">Task</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Task</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <button type="btn" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleVerticallycenteredModal">
                <i class="fa fa-plus"></i> Add Task </button>

            </div>
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Project Name</th>
                      <th>Assign To</th>
                      <th>Task Title</th>
                      <th>Task Start Date</th>
                      <th>Task End Date</th>
                      <th>Task Details</th>
                      <th>Task Priority</th>
                      <th>Development Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($tasks as $value): ?>
                      <tr>

                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#editTaskModal<?php echo $value['task_id']; ?>"
                                class="btn btn-sm btn-info waves-effect waves-light"
                                style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $value['project_name'] ?></td>
                        <td><?php echo $value['user_name'] ?></td>
                        <td><?php echo $value['task_title'] ?></td>
                        <td><?php if (!empty($value['start_date'])) {
                              echo date('jS \of F Y', strtotime($value['start_date']));
                            } ?>
                        </td>
                        <td><?php if (!empty($value['end_date'])) {
                              echo date('jS \of F Y', strtotime($value['end_date']));
                            } ?>
                        </td>
                        <td><?php echo isset($value['task_description']) ? $value['task_description'] : '-'; ?></td>
                        <td><?php echo $value['task_priority']; ?></td>
                        <td><?php echo $value['task_status']; ?></td>

                      </tr>
                      
                        <!-- Update Task modal -->
                        <div class="modal fade" id="editTaskModal<?php echo $value['task_id']; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <form method="post" action="<?php echo base_url(); ?>update-task" id="holidayForm" enctype="multipart/form-data">
                              <input type="hidden" name="task_id" value="<?php echo $value['task_id']; ?>" />
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Edit Task</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                  <div class="form-group mb-2">
                                    <label>Project <span class="text-danger">*</span></label>
                                    <select class=" form-control custom-select selectedEmployeeID" tabindex="1" id="project_id" name="project_id" required>
                                      <option value="">Select Project</option>
                                      <?php foreach ($projects as $val): ?>
                                        <option value="<?php echo $val['project_id'] ?>"
                                          <?php if ($val['project_id'] == $value['project_id']) {
                                            echo 'selected';
                                          } ?>><?php echo $val['project_name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                  <script>
                                    $(document).ready(function() {
                                      var project_id = $("#project_id").val();
                                      var emp_id = '<?php echo $value['emp_id']; ?>';
                                      // alert(project_id);
                                      if (project_id) {
                                        $.ajax({
                                          url: '<?php echo base_url(); ?>get-assigned-developer',
                                          type: 'POST',
                                          data: {
                                            project_id: project_id,
                                            emp_id: emp_id
                                          },
                                          success: function(response) {
                                            // alert(response);
                                            $('#emp_id').html(response); // Update the city dropdown

                                            // Match and set the selected option
                                            $('#emp_id option').each(function() {
                                              console.log("Option value:", $(this).val(), "| Target:", emp_id);
                                              if ($(this).val() == emp_id) {
                                                $(this).prop('selected', true);
                                              }
                                            });
                                          }
                                        });
                                      } else {
                                        $('#emp_id').html('<option value="">Select Developer</option>'); // Reset city dropdown
                                      }

                                      // Event listener for when a state is selected
                                      $('#project_id').change(function() {
                                        var project_id = $(this).val();
                                        //alert(project_id);
                                        if (project_id) {
                                          $.ajax({
                                            url: '<?php echo base_url(); ?>get-assigned-developer',
                                            type: 'POST',
                                            data: {
                                              project_id: project_id
                                            },
                                            success: function(response) {
                                              // alert(response);
                                              $('#emp_id').html(response); // Update the city dropdown
                                            }
                                          });
                                        } else {
                                          $('#emp_id').html('<option value="">Select Developer</option>'); // Reset city dropdown
                                        }
                                      });
                                    });
                                  </script>
                                  <div class="form-group mb-2">
                                    <label for="inputcompany">Assign To <span class="text-danger">*</span></label>
                                    <select name="emp_id" class="form-control" id="emp_id" required>
                                      <option value="">--- Select Developer ---</option>
                                    </select>
                                  </div>

                                  <div class="form-group mb-2">
                                    <label class="control-label" id="hourlyFix">Task Title <span class="text-danger">*</span></label>
                                    <input type="text" name="task_title" value="<?php echo $value['task_title']; ?>" class="form-control mydatetimepickerFull" id="recipient-name1" required>
                                  </div>

                                  <div class="form-group mb-2" id="enddate">
                                    <label class="control-label">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" value="<?php echo $value['start_date']; ?>" class="form-control mydatetimepickerFull" id="recipient-name1" required>
                                  </div>

                                  <div class="form-group mb-2" id="enddate">
                                    <label class="control-label">End Date <span class="text-danger">*</span></label>
                                    <input type="date" name="end_date" value="<?php echo $value['end_date']; ?>" class="form-control mydatetimepickerFull" id="recipient-name1" required>
                                  </div>

                                  <div class="form-group mb-2">
                                    <label class="control-label">Details</label>
                                    <textarea class="form-control" name="task_description" id="message-text1"><?php echo $value['task_description']; ?></textarea>
                                  </div>

                                  <div class="form-group mb-2">
    <label class="control-label">Priority <span class="text-danger">*</span></label><br>

    <input name="task_priority" required type="radio" id="radio_1" class="duration" value="1" 
        <?php if ($value['task_priority'] == '1') echo "checked"; ?>>
    <label for="radio_1">Low</label>

    <input name="task_priority" required type="radio" id="radio_2" class="type" value="2" 
        <?php if ($value['task_priority'] == '2') echo "checked"; ?>>
    <label for="radio_2">Medium</label>

    <input name="task_priority" required type="radio" class="with-gap duration" id="radio_3" value="3" 
        <?php if ($value['task_priority'] == '3') echo "checked"; ?>>
    <label for="radio_3">High</label>

    <input name="task_priority" required type="radio" class="with-gap duration" id="radio_4" value="4" 
        <?php if ($value['task_priority'] == '4') echo "checked"; ?>>
    <label for="radio_4">Urgent</label>
</div>


                                  <div class="form-group mb-2" style="    overflow-x: overlay;">
                                    <label class="control-label">Status <span class="text-danger">*</span></label><br>
                                    <input name="task_status" type="radio" id="radio_5" required class="duration" value="1" <?php if ($value['task_status'] == '1') {
                                                                                                                                    echo "checked";
                                                                                                                                  } ?>>
                                    <label for="radio_1">Pending</label>
                                    <input name="task_status" type="radio" id="radio_6" required class="type" value="2" <?php if ($value['task_status'] == '2') {
                                                                                                                                  echo "checked";
                                                                                                                                } ?>>
                                    <label for="radio_2">Progress</label>
                                    <input name="task_status" type="radio" class="with-gap duration" required id="radio_7" value="3" <?php if ($value['task_status'] == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                              } ?>>
                                    <label for="radio_3">In Testing</label>
                                    <input name="task_status" type="radio" class="with-gap duration" required id="radio_8" value="4" <?php if ($value['task_status'] == '4') {
                                                                                                                                              echo "checked";
                                                                                                                                            } ?>>
                                    <label for="radio_3">On Hold</label>
                                    <input name="task_status" type="radio" class="with-gap duration" required id="radio_9" value="5" <?php if ($value['task_status'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                              } ?>>
                                    <label for="radio_3">Completed</label>
                                  </div>
                                </div>
                                <div class="modal-footer">

                                  <button type="submit" class="btn btn-primary" id="saveButton">Update</button>
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
                      <th>Project Name</th>
                      <th>Assign To</th>
                      <th>Task Title</th>
                      <th>Task Start Date</th>
                      <th>Task End Date</th>
                      <th>Task Details</th>
                      <th>Task Priority</th>
                      <th>Development Status</th>
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
  <div class="modal-dialog modal-dialog-lg">
    <form method="post" action="<?php echo base_url(); ?>save-task" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group mb-2">
            <label>Project <span class="text-danger">*</span></label>
            <select class=" form-control custom-select selectedEmployeeID" tabindex="1" id="projectid" name="project_id" required>
              <option value="">Select Project</option>
              <?php foreach ($projects as $value): ?>
                <option value="<?php echo $value['project_id'] ?>"><?php echo $value['project_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
            $(document).ready(function() {
              $('#projectid').change(function() {
                var project_id = $(this).val();
                // alert(project_id);
                if (project_id) {
                  $.ajax({
                    url: '<?= base_url("Task/get_assigned_developer") ?>',
                    type: 'POST',
                    data: {
                      project_id: project_id
                    },
                    success: function(response) {
                      // alert(response);
                      $('#empid').html(response); // Populate developer dropdown
                    },
                    error: function(xhr, status, error) {
                      console.error("AJAX Error:", status, error);
                      console.log("Response:", xhr.responseText);
                    }
                  });
                } else {
                  $('#empid').html('<option value="">Select Developer</option>');
                }
              });
            });
          </script>
          <div class="form-group mb-2">
            <label for="inputcompany">Assign To <span class="text-danger">*</span></label>
            <select name="emp_id" class="form-control" id="empid" required>
              <option value="">--- Select Developer ---</option>
            </select>
          </div>
          <!-- <div class="form-group">
                <span style="color:red" id="total"></span>
                <div class="span pull-right">
                    <button class="btn btn-info fetchLeaveTotal">Fetch Total Leave</button>
                </div>
                <br>
            </div> -->

          <div class="form-group mb-2">
            <label class="control-label" id="hourlyFix">Task Title <span class="text-danger">*</span></label>
            <input type="text" name="task_title" class="form-control mydatetimepickerFull" id="recipient-name1" required>
          </div>

          <div class="form-group mb-2" id="enddate">
            <label class="control-label">Start Date <span class="text-danger">*</span></label>
            <input type="date" name="start_date" class="form-control mydatetimepickerFull" id="addStartDate" required>
          </div>

          <div class="form-group mb-2" id="enddate">
            <label class="control-label">End Date <span class="text-danger">*</span></label>
            <input type="date" name="end_date" class="form-control mydatetimepickerFull" id="addEndDate" required>
          </div>

          <div class="form-group mb-2">
            <label class="control-label">Details</label>
            <textarea class="form-control" name="task_description" id="message-text1"></textarea>
          </div>

          <div class="form-group mb-2">
            <label class="control-label">Priority <span class="text-danger">*</span></label><br>
            <input name="task_priority" type="radio" id="radio_1" class="duration" value="Low" required>
            <label for="radio_1">Low</label>
            <input name="task_priority" type="radio" id="radio_2" class="type" value="Medium" required>
            <label for="radio_2">Medium</label>
            <input name="task_priority" type="radio" class="with-gap duration" id="radio_3" value="High" required>
            <label for="radio_3">High</label>
            <input name="task_priority" type="radio" class="with-gap duration" id="radio_4" value="Urgent" required>
            <label for="radio_3">Urgent</label>
          </div>

          <div class="form-group mb-2">
            <label class="control-label">Status <span class="text-danger">*</span></label><br>
            <input name="task_status" type="radio" id="radio_5" class="duration" value="Pending" required>
            <label for="radio_1">Pending</label>
            <input name="task_status" type="radio" id="radio_6" class="type" value="Progress" required>
            <label for="radio_2">Progress</label>
            <input name="task_status" type="radio" class="with-gap duration" id="radio_7" value="In Testing" required>
            <label for="radio_3">In Testing</label>
            <input name="task_status" type="radio" class="with-gap duration" id="radio_8" value="On Hold" required>
            <label for="radio_3">On Hold</label>
            <input name="task_status" type="radio" class="with-gap duration" id="radio_9" value="Completed" required>
            <label for="radio_3">Completed</label>
          </div>
        </div>

        <div class="modal-footer">
          <input type="hidden" name="created_by" class="form-control" value="<?php echo $this->session->userdata('op_user_id'); ?>">

          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- validate add holiday form -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add Holiday Modal: Set min date
    const addModal = document.getElementById('exampleVerticallycenteredModal');
    addModal.addEventListener('shown.bs.modal', function() {
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('addStartDate').setAttribute('min', today);
      document.getElementById('addEndDate').setAttribute('min', today);

      addStartDate.addEventListener('change', function() {
        if (addStartDate.value) {
          const selectedStart = new Date(addStartDate.value);
          selectedStart.setDate(selectedStart.getDate() + 1); // optional: disable the same day
          const minEndDate = selectedStart.toISOString().split('T')[0];
          addEndDate.value = ""; // clear old value
          addEndDate.setAttribute('min', minEndDate);
        }
      });

    });
  });


  document.getElementById("holidayForm").addEventListener("submit", function(e) {
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
  $(document).ready(function() {
    $(".holiday").click(function(e) {
      e.preventDefault(); // Prevent default click behavior
      var iid = $(this).attr('data-id');
      $('#holidayForm').trigger("reset");
      $('#exampleVerticallycenteredModal').modal('show');
      $.ajax({
        url: '<?php echo base_url(); ?>Leave/get_holiday_details?id=' + iid,
        method: 'GET',
        dataType: 'json',
      }).done(function(response) {
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