<!--sidebar-wrapper-->
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
        <div class="breadcrumb-title pe-3">Bug Managment</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Bug Managment</li>
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
                <i class="fa fa-plus"></i> Add New Bug </button>

            </div>
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Bug Status</th>
                      <th>Issue Document</th>
                      <th>Project Name</th>
                      <th>Bug Title</th>
                      <th>Bug Description</th>
                      <th>Bug Assign By</th>
                      <th>Bug Assign To</th>
                      <th>Bug Type</th>
                      <th>Bug Priority Type</th>
                      <th>Bug Instimate End Date</th>
                      <th>Bug Actual Start Date</th>
                      <th>Bug End Start Date</th>
                      <th>Bug Total Time Taken</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($bugreport as $value): ?>
                      <tr>
                        <td>
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="javascript:void(0);" title="Edit"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                data-id="<?php echo $value['bug_id']; ?>" style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                              <br>
                              <?php if ($value['bug_report_status'] != 2) { ?>
                              <a href="javascript:void(0);" title="Update"
                                class="btn btn-sm btn-info waves-effect waves-light holiday1"
                                data-id="<?php echo $value['bug_id']; ?>" style="color:white">
                                <i class="fa fa-edit"></i> Update issue status
                              </a>
                        <?php } ?>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++; ?></td>
                        <td>
                          <?php
                          $status = $value['bug_report_status'];
                          if ($status == 1) {
                            echo "<span class='badge badge-warning'>Pending</span>";
                          } elseif ($status == 2) {
                            echo "<span class='badge badge-success'>Complete</span>";
                          } elseif ($status == 3) {
                            echo "<span class='badge badge-secondary'>Hold</span>";
                          } elseif ($status == 4) {
                            echo "<span class='badge badge-danger'>Reject</span>";
                          }
                          elseif ($status == 5) {
                            echo "<span class='badge badge-warning'>In-Progress</span>";
                          }
                          elseif ($status == 6) {
                            echo "<span class='badge badge-primary'>In-Testing</span>";
                          }
                          ?>
                        </td>
                        <td>
                            <?php if (!empty($value['bug_issue_document'])): ?>
                                <a href="<?php echo base_url('uploads/issues/' . $value['bug_issue_document']); ?>" target="_blank">View</a>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
                        </td>
                        <td><?php echo $value['project_name']; ?></td>
                        <td><?php echo $value['bug_title']; ?></td>
                        <td><?php echo $value['bug_description']; ?></td>
                        <td><?php echo $value['assign_by_user']; ?></td>
                        <td><?php echo $value['assign_to_user']; ?></td>
                        <td>
                          <?php
                          $priority = $value['bug_priority'];
                          if ($priority == 1) {
                            echo "<span class='text-danger'>Critical</span>"; // Red color for Critical
                          } elseif ($priority == 2) {
                            echo "<span class='text-warning'>High</span>"; // Yellow color for High
                          } elseif ($priority == 3) {
                            echo "<span class='text-primary'>Medium</span>"; // Blue color for Medium
                          } elseif ($priority == 4) {
                            echo "<span class='text-success'>Low</span>"; // Green color for Low
                          }
                          ?>
                        </td>

                        <td>
                          <?php
                          $bugType = $value['bug_type'];
                          if ($bugType == 1) {
                            echo "<span class='text-info'>UI</span>"; // Blue color for UI
                          } elseif ($bugType == 2) {
                            echo "<span class='text-dark'>Backend</span>"; // Dark color for Backend
                          } elseif ($bugType == 3) {
                            echo "<span class='text-muted'>Frontend</span>"; // Grey color for Other
                          }elseif ($bugType == 4) {
                            echo "<span class='text-muted'>Other</span>"; // Grey color for Other
                          }
                          ?>
                        </td>

                        <td><?php echo $value['bug_instimate_end_date']; ?></td>
                        <td><?php echo $value['bug_start_date']; ?></td>
                        <td><?php echo $value['bug_end_date']; ?></td>
                        <td>
                          <?php
                          // Check if both start and end dates are available
                          if (!empty($value['bug_start_date']) && !empty($value['bug_end_date'])) {
                            // Convert the dates to DateTime objects
                            $startDate = new DateTime($value['bug_start_date']);
                            $endDate = new DateTime($value['bug_end_date']);

                            // Calculate the difference between the dates
                            $diff = $startDate->diff($endDate);

                            // Display the difference in days
                            echo $diff->days . " day(s)";
                          } else {
                            // If any date is missing, display a placeholder or leave empty
                            echo "N/A";
                          }
                          ?>
                        </td>
                        <!-- This seems repetitive, but left as is -->
                      </tr>
                    <?php endforeach; ?>
                  </tbody>

                  <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Bug Status</th>
                      <th>Project Name</th>
                      <th>Bug Title</th>
                      <th>Bug Description</th>
                      <th>Bug Assign By</th>
                      <th>Bug Assign To</th>
                      <th>Bug Type</th>
                      <th>Bug Priority Type</th>
                      <th>Bug Instimate End Date</th>
                      <th>Bug Actual Start Date</th>
                      <th>Bug End Start Date</th>
                      <th>Bug Total Time Taken</th>
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
  <div class="modal-dialog modal-dialog-centered modal-dialog-lg">
    <form method="post" action="<?php echo base_url(); ?>add-bug" id="bugForm" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Bug</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- Project Name -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="bug_project_id">Project Name<span class="text-danger">*</span></label>
                <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter Holiday Name">
                <select class="form-control" name="bug_project_id" id="bug_project_id">
                  <option value="">Select Project</option>
                  <?php foreach ($project_list as $project) { ?>
                    <option value="<?php echo $project['project_id'] ?>">
                      <?php echo $project['project_name']; ?>
                    </option>
                  <?php } ?>
                </select>
                <small class="text-danger" id="bug_project_idError"></small>
              </div>
            </div>

            <!-- Developer Assignment -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="bug_assign_to_id">Select Developer<span class="text-danger">*</span></label>
                <select class="form-control" name="bug_assign_to_id" id="bug_assign_to_id">
                  <option value="">Select Developer</option>
                  <?php foreach ($emp_list as $emp) { ?>
                    <option value="<?php echo $emp['op_user_id'] ?>">
                      <?php echo $emp['user_name']; ?>
                    </option>
                  <?php } ?>
                </select>
                <small class="text-danger" id="bug_assign_to_idError"></small>
              </div>
            </div>

            <!-- Bug Priority -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="bug_priority">Select Bug Priority<span class="text-danger">*</span></label>
                <select class="form-control" name="bug_priority" id="bug_priority">
                  <option value="">Select Bug Priority</option>
                  <option value="1">Critical</option>
                  <option value="2">High</option>
                  <option value="3">Medium</option>
                  <option value="5">Low</option>
                </select>
                <small class="text-danger" id="bug_priorityError"></small>
              </div>
            </div>

            <!-- Bug Title -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="bug_title">Enter Bug Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="bug_title" name="bug_title">
                <small class="text-danger" id="bug_titleError"></small>
              </div>
            </div>

            <!-- Bug Description -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="bug_description">Enter Bug Description<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="bug_description" name="bug_description">
                <small class="text-danger" id="bug_descriptionError"></small>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="issue_document">Upload Issue Document</label>
                <input type="file" class="form-control" id="issue_document" name="bug_issue_document" accept="jpg,.jpeg,.png">
                <small class="text-danger" id="issue_documentError"></small>
              </div>
            </div>


            <!-- Bug Type -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="bug_type">Select Bug Type<span class="text-danger">*</span></label>
                <select class="form-control" name="bug_type" id="bug_type">
                  <option value="">Select Bug Type</option>
                  <option value="1">UI</option>
                  <option value="2">Backend</option>
                  <option value="3">Frontend</option>
                  <option value="4">Other</option>
                </select>
                <small class="text-danger" id="bug_typeError"></small>
              </div>
            </div>

            <!-- Bug End Date -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="bug_instimate_end_date">Enter Bug End Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="bug_instimate_end_date" name="bug_instimate_end_date">
                <small class="text-danger" id="bug_instimate_end_dateError"></small>
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

<div id="updateIssueModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Issue Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateForm">
          <input type="hidden" name="id" />
          <div class="form-group">
            <label for="bug_title">Bug Title</label>
            <input type="text" class="form-control" name="bug_title" readonly />
          </div>
          <div class="form-group">
            <label for="bug_description">Description</label>
            <textarea class="form-control" name="bug_description" readonly></textarea>
          </div>
          <div class="form-group">
            <label for="bug_start_date">Start Date</label>
            <input type="date" class="form-control" name="bug_start_date" />
          </div>
          <div class="form-group">
            <label for="bug_end_date">End Date</label>
            <input type="date" class="form-control" name="bug_end_date" />
          </div>
          <div id="dateConflictMessage" class="alert alert-warning" style="display:none;">
            The start and end dates are already set for this bug.
          </div>
          <div class="form-group">
            <label for="bug_status">Status</label>
            <select class="form-control" name="bug_status">
              <option value="1">Pending</option>
              <option value="5">In-progress</option>
              <option value="6">In-Testing</option>
              <option value="2">Complete</option>
              <option value="3">Hold</option>
              <option value="4">Reject</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveStatus">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<!-- validate add holiday form -->
<script>
  document.getElementById("bugForm").addEventListener("submit", function (e) {
    let isValid = true;

    // Clear previous error messages
    document.querySelectorAll("small.text-danger").forEach(error => (error.textContent = ""));

    // Validate Project
    const bugProjectId = document.getElementById("bug_project_id").value.trim();
    if (!bugProjectId) {
      document.getElementById("bug_project_idError").textContent = "Project is required.";
      isValid = false;
    }

    // Validate Developer Assignment
    const bugAssignToId = document.getElementById("bug_assign_to_id").value.trim();
    if (!bugAssignToId) {
      document.getElementById("bug_assign_to_idError").textContent = "Developer is required.";
      isValid = false;
    }

    // Validate Bug Priority
    const bugPriority = document.getElementById("bug_priority").value.trim();
    if (!bugPriority) {
      document.getElementById("bug_priorityError").textContent = "Priority is required.";
      isValid = false;
    }

    // Validate Bug Title
    const bugTitle = document.getElementById("bug_title").value.trim();
    if (!bugTitle) {
      document.getElementById("bug_titleError").textContent = "Bug title is required.";
      isValid = false;
    }

    // Validate Bug Description
    const bugDescription = document.getElementById("bug_description").value.trim();
    if (!bugDescription) {
      document.getElementById("bug_descriptionError").textContent = "Description is required.";
      isValid = false;
    }

    // Validate Bug Type
    const bugType = document.getElementById("bug_type").value.trim();
    if (!bugType) {
      document.getElementById("bug_typeError").textContent = "Bug type is required.";
      isValid = false;
    }

    // Validate Bug End Date
    const bugEndDate = document.getElementById("bug_instimate_end_date").value.trim();
    if (!bugEndDate) {
      document.getElementById("bug_instimate_end_dateError").textContent = "End date is required.";
      isValid = false;
    }

    // Prevent Form Submission if Invalid
    if (!isValid) {
      e.preventDefault();
    }
  });

</script>

<!-- Add this to just before closing </body> for jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<script type="text/javascript">
  $(document).ready(function () {
    $(".holiday").click(function (e) {
      e.preventDefault(); // Prevent default click behavior
      var iid = $(this).attr('data-id');
      $('#bugForm').trigger("reset");
      $('#exampleVerticallycenteredModal').modal('show');

      $.ajax({
        url: '<?php echo base_url(); ?>Bug/get_bug_details?id=' + iid,
        method: 'GET',
        dataType: 'json',
      }).done(function (response) {
        // Check the structure of the response and access the data correctly
        if (response && response.holidayvalue) {
          var bugDetails = response.holidayvalue; // Assuming the object is in holidayvalue

          // Populate the form fields with the data returned from the server
          $('#bugForm').find('[name="id"]').val(bugDetails.bug_id);
          $('#bugForm').find('[name="bug_title"]').val(bugDetails.bug_title);
          $('#bugForm').find('[name="bug_description"]').val(bugDetails.bug_description);
          $('#bugForm').find('[name="bug_priority"]').val(bugDetails.bug_priority);
          $('#bugForm').find('[name="bug_type"]').val(bugDetails.bug_type);
          $('#bugForm').find('[name="bug_instimate_end_date"]').val(bugDetails.bug_instimate_end_date);
          $('#bugForm').find('[name="bug_assign_to_id"]').val(bugDetails.bug_assign_to_id);
          $('#bugForm').find('[name="bug_project_id"]').val(bugDetails.bug_project_id);
        } else {
          alert('No bug details found.');
        }
      }).fail(function () {
        alert('Error fetching bug details.');
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    // For opening the update issue status modal
    $(".holiday1").click(function (e) {
      e.preventDefault(); // Prevent default click behavior
      var iid = $(this).attr('data-id');
      
      $('#bugForm').trigger("reset");
      $('#updateIssueModal').modal('show'); // Show the new modal for updating issue status
      
      $.ajax({
        url: '<?php echo base_url(); ?>Bug/get_bug_details?id=' + iid,
        method: 'GET',  
        dataType: 'json',
      }).done(function (response) {
        if (response && response.holidayvalue) {
          var bugDetails = response.holidayvalue;

          // Populate the fields for the status, start date, and end date
          $('#updateForm').find('[name="id"]').val(bugDetails.bug_id);
          $('#updateForm').find('[name="bug_title"]').val(bugDetails.bug_title);
          $('#updateForm').find('[name="bug_description"]').val(bugDetails.bug_description);
          $('#updateForm').find('[name="bug_priority"]').val(bugDetails.bug_priority);
          $('#updateForm').find('[name="bug_type"]').val(bugDetails.bug_type);
          $('#updateForm').find('[name="bug_instimate_end_date"]').val(bugDetails.bug_instimate_end_date);
          $('#updateForm').find('[name="bug_start_date"]').val(bugDetails.bug_start_date);
          $('#updateForm').find('[name="bug_end_date"]').val(bugDetails.bug_end_date);

          // Check if the start and end dates are already set
          if (bugDetails.bug_start_date && bugDetails.bug_end_date) {
            $('#dateConflictMessage').show(); // Show a message if the dates are already taken
          } else {
            $('#dateConflictMessage').hide(); // Hide the message if no dates are set
          }
        } else {
          alert('No bug details found.');
        }
      }).fail(function() {
        alert('Error fetching bug details.');
      });
    });
  });

  $('#saveStatus').click(function () {
  var formData = $('#updateForm').serialize(); // Get all form data
  
  $.ajax({
    url: '<?php echo base_url(); ?>Bug/update_bug_status', // Update URL
    method: 'POST',
    data: formData,
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        alert('Bug status updated successfully!');
        $('#updateIssueModal').modal('hide');
        location.reload();
        // Optionally, refresh the table or update the status in the UI
      } else {
        alert('Error updating bug status.');
      }
    },
    error: function() {
      alert('An error occurred while updating the bug status.');
    }
  });
});

</script>
