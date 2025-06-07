<!--sidebar-wrapper-->
<style type="text/css"></style>

<style type="text/css">
  .badge-warning {
    background-color: #ffc107;
  }

  .badge-success {
    background-color: #28a745;
  }

  .badge-secondary {
    background-color: #6c757d;
  }

  .badge-danger {
    background-color: #dc3545;
  }

  .badge-primary {
    background-color:rgb(26, 66, 197);
  }
</style>
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
        <div class="breadcrumb-title pe-3">ToDo</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">ToDo</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <a href="<?php echo base_url();?>add-todo" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add ToDo </a>
             
            </div>
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Status</th>
                      <th>Project</th>
                      <th>Description</th>
                      <th>Estimated Date</th>
                      <th>Estimated End Date</th>
                      <th>Estimated Start Time</th>
                      <th>Estimated End Time</th>
                      <th>Actual Start Time</th>
                      <th>Actual End Time</th>
                      <th>Pause Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($todo as $value): 
                      $sql = "SELECT * from project Where project_id = '$value[project_id]'";
                      $query = $this->db->query($sql);
                      $row = $query->row_array();
                      $project_name = $row['project_name'];
                    ?>
                      <tr>

                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url();?>edit-todo/<?php echo base64_encode($value['todo_id']);?>" class="btn btn-sm btn-info waves-effect waves-light"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++ ?></td>
                        <td>
                          <?php
                          $status = $value['todo_status'];
                          if ($status == 'Pending') {
                            echo "<span class='badge badge-warning'>Pending</span>";
                          } elseif ($status == 'Completed') {
                            echo "<span class='badge badge-success'>Completed</span>";
                          } elseif ($status == 'Almost Done') {
                            echo "<span class='badge badge-secondary'>Almost Done</span>";
                          } elseif ($status == 'On Hold') {
                            echo "<span class='badge badge-danger'>On Hold</span>";
                          }
                          elseif ($status == 'In Progress') {
                            echo "<span class='badge badge-warning'>In Progress</span>";
                          }
                          elseif ($status == 'Waiting for Client Reply') {
                            echo "<span class='badge badge-primary'>Waiting for Client Reply</span>";
                          }
                          elseif ($status == 'In Testing') {
                            echo "<span class='badge badge-primary'>In Testing</span>";
                          }
                          ?>
                        </td>
                        <td><?php echo $project_name ?? '-'; ?></td>
                        <td><?php echo $value['todo_description'] ?></td>
                        <td><?php if (!empty($value['estimate_date'])) {
                          echo date('jS \of F Y', strtotime($value['estimate_date']));
                        } ?>
                        </td>
                        <td><?php if (!empty($value['estimate_end_date'])) {
                          echo date('jS \of F Y', strtotime($value['estimate_end_date']));
                        } ?>
                        </td>
                        <td><?php echo $value['estimate_start_time']; ?></td>
                        <td><?php echo $value['estimate_end_time']; ?></td>
                        <td><?php echo $value['actual_start_time']; ?></td>
                        <td><?php echo $value['actual_end_time']; ?></td>
                        <td><?php echo $value['pause_time']; ?></td>
                        
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Status</th>
                      <th>Task</th>
                      <th>Description</th>
                      <th>Estimated Date</th>
                      <th>Estimated End Date</th>
                      <th>Estimated Start Time</th>
                      <th>Estimated End Time</th>
                      <th>Actual Start Time</th>
                      <th>Actual End Time</th>
                      <th>Pause Time</th>
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
            <div class="form-group">
                <label>Project</label>
                <select class=" form-control custom-select selectedEmployeeID" tabindex="1" id="project_id" name="project_id" required>
                    <option value="">Select Project</option>
                    <?php foreach($projects as $value): ?>
                    <option value="<?php echo $value['project_id'] ?>"><?php echo $value['project_name']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
              $(document).ready(function(){
                  // Event listener for when a state is selected
                  $('#project_id').change(function(){
                      var project_id = $(this).val();
                      //alert(project_id);
                      if (project_id) {
                          $.ajax({
                              url: '<?php echo base_url();?>get-assigned-developer',
                              type: 'POST',
                              data: {project_id: project_id},
                              success: function(response) {
                                // alert(response);
                                $('#emp_id').html(response);  // Update the city dropdown
                              }
                          });
                      } else {
                          $('#emp_id').html('<option value="">Select Developer</option>');  // Reset city dropdown
                      }
                  });
              });
            </script>
            <div class="form-group">
                <label for="inputcompany">Assign To</label>
                <select name="emp_id" class="form-control" id="emp_id" required>
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
            
            <div class="form-group">
                <label class="control-label" id="hourlyFix">Task Title</label>
                <input type="text" name="task_title" class="form-control mydatetimepickerFull" id="recipient-name1" required>
            </div>

            <div class="form-group" id="enddate">
                <label class="control-label">Start Date</label>
                <input type="date" name="start_date" class="form-control mydatetimepickerFull" id="recipient-name1">
            </div>

            <div class="form-group" id="enddate">
                <label class="control-label">End Date</label>
                <input type="date" name="end_date" class="form-control mydatetimepickerFull" id="recipient-name1">
            </div>

            <div class="form-group">
                <label class="control-label">Details</label>
                <textarea class="form-control" name="task_description" id="message-text1"></textarea>                                                
            </div>
                    
            <div class="form-group">
                <label class="control-label">Priority</label><br>
                <input name="task_priority" type="radio" id="radio_1" class="duration" value="Low">
                <label for="radio_1">Low</label>
                <input name="task_priority" type="radio" id="radio_2" class="type" value="Medium">
                <label for="radio_2">Medium</label>
                <input name="task_priority" type="radio" class="with-gap duration" id="radio_3" value="High">
                <label for="radio_3">High</label>
                <input name="task_priority" type="radio" class="with-gap duration" id="radio_4" value="Urgent">
                <label for="radio_3">Urgent</label>
            </div>

            <div class="form-group">
                <label class="control-label">Status</label><br>
                <input name="development_status" type="radio" id="radio_5" class="duration" value="Pending" checked="">
                <label for="radio_1">Pending</label>
                <input name="development_status" type="radio" id="radio_6" class="type" value="Progress">
                <label for="radio_2">Progress</label>
                <input name="development_status" type="radio" class="with-gap duration" id="radio_7" value="In Testing">
                <label for="radio_3">In Testing</label>
                <input name="development_status" type="radio" class="with-gap duration" id="radio_8" value="On Hold">
                <label for="radio_3">On Hold</label>
                <input name="development_status" type="radio" class="with-gap duration" id="radio_9" value="Completed">
                <label for="radio_3">Completed</label>
            </div>
        </div>

        <div class="modal-footer">
            <input type="hidden" name="created_by" class="form-control" value="<?php echo $this->session->userdata('op_user_id');?>"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
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