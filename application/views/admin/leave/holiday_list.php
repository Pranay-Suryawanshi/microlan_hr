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
        <div class="breadcrumb-title pe-3">Holiday</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Holiday</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 d-flex justify-content-start gap-2 mt-2 ">
              <?php if(!empty($perms) && in_array('add_holiday',$perms)) {?>
              <button type="btn" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleVerticallycenteredModal">
                <i class="fa fa-plus"></i> Add Holiday 
              </button>
              <?php } ?>

              <!-- Bulk Upload Button -->
             <!-- <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bulkUploadModal">
        <i class="fa fa-upload"></i> Bulk Upload
    </button> -->

   

            <?php if (!empty($perms) && in_array('bulk_holiday', $perms)) { ?>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bulkUploadModal">
        <i class="fa fa-upload"></i> Bulk Upload
    </button>
<?php } ?>




            </div>
            
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">

              <?php 
                $show_action = false;
                if (!empty($perms)) {
   
                if (in_array('edit_holiday', $perms) || in_array('delete_holiday', $perms)) {
                  $show_action = true;
                }
              }
?>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <?php if ($show_action) { ?>
                <th>Action</th>
            <?php } ?>
                      <th>Sr. No.</th>
                      <th>Name</th>
                      <th>Start Date</th>
                      <!-- <th>End Date</th> -->
                      <!-- <th>Number of days</th> -->
                      <th>Year </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($holidays as $value): ?>
                      <tr>

                        <?php if($show_action) { ?>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <?php if(!empty($perms) && in_array('edit_holiday',$perms)) { ?>
                            <div class="dropdown-content">
                              
                              <a href="javascript:void(0);" data-bs-toggle="modal"
                                data-bs-target="#editHolidayModal<?php echo $value->id; ?>"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                             
                            </div>
                             <?php }?>
                          </div>
                        </td>
                        <?php }?>
                        
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $value->holiday_name ?></td>
                        <td><?php echo date('jS \of F Y', strtotime($value->from_date)); ?></td>
                        
                        <!-- <td><?php echo $value->number_of_days; ?></td> -->
                        <td><?php echo $value->year; ?></td>


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
                                        <input type="hidden" class="form-control" id="holiday_id" name="holiday_id" value="<?php echo $value->id; ?>">
                                        <input type="text" class="form-control" value="<?php echo $value->holiday_name; ?>" id="editHolidayName" name="holiname" placeholder="Enter Holiday Name" required>
                                        <small class="text-danger" id="holidayNameError"></small>
                                      </div>
                                    </div>
                                    <!-- Start Date -->
                                    <div class="col-sm-12 mt-3">
                                      <div class="form-group">
                                        <label for="startDate">Holiday Start Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" value="<?php echo date('Y-m-d', strtotime($value->from_date)); ?>" id="editStartDate<?php echo $value->id; ?>" name="startdate" required>
                                        <small class="text-danger" id="startDateError"></small>
                                      </div>
                                    </div>
                                    <!-- End Date -->
                                    <!-- <div class="col-sm-12 mt-3">
                                      <div class="form-group">
                                        <label for="endDate">Holiday End Date<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" value="<?php echo $value->to_date; ?>" id="editEndDate<?php echo $value->id; ?>" name="enddate" required>
                                        <small class="text-danger" id="endDateError"></small>
                                      </div>
                                    </div> -->
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
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Name</th>
                      <th>Start Date</th>
                      <!-- <th>End Date</th> -->
                      <!-- <th>Number of days</th> -->
                      <th>Year </th>
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
                <input type="text" class="form-control" id="addHolidayName" name="holiname" placeholder="Enter Holiday Name" required>
                <small class="text-danger" id="holidayNameError"></small>
              </div>
            </div>
            <!-- Start Date -->
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="startDate">Holiday Start Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="addStartDate" name="startdate" required>
                <small class="text-danger" id="startDateError"></small>
              </div>
            </div>
            <!-- End Date -->
            <!-- <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="endDate">Holiday End Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="addEndDate" name="enddate" required>
                <small class="text-danger" id="endDateError"></small>
              </div>
            </div> -->

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



<!-- Bulk Upload Modal -->
<div class="modal fade" id="bulkUploadModal" tabindex="-1" aria-labelledby="bulkUploadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <form method="post" action="<?= base_url('export-holidays')  ?>" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="bulkUploadModalLabel">Upload Excel File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label for="formFile" class="form-label">Choose Excel file (.xls or .xlsx)</label>
            <input class="form-control" type="file" name="file" id="formFile" required>
          </div>
        </div>

        <a href="<?= base_url('export-holidays') ?>" class="btn btn-info">
          <i class="fa fa-download"></i> Download Holiday List (Excel)
        </a>


        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Upload</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Add Holiday Modal: Set min date
  const addModal = document.getElementById('exampleVerticallycenteredModal');
  addModal.addEventListener('shown.bs.modal', function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('addStartDate').setAttribute('min', today);
    document.getElementById('addEndDate').setAttribute('min', today);

    addStartDate.addEventListener('change', function () {
      if (addStartDate.value) {
        const selectedStart = new Date(addStartDate.value);
        selectedStart.setDate(selectedStart.getDate() + 1); // optional: disable the same day
        const minEndDate = selectedStart.toISOString().split('T')[0];
        addEndDate.value = ""; // clear old value
        addEndDate.setAttribute('min', minEndDate);
      }
    });
    
  });



  // Validate Add Holiday Form
  document.getElementById("addHolidayForm").addEventListener("submit", function (e) {
    let isValid = true;
    const name = document.getElementById("addHolidayName").value.trim();
    const start = document.getElementById("addStartDate").value;
    const end = document.getElementById("addEndDate").value;

    document.getElementById("addHolidayNameError").textContent = "";
    document.getElementById("addStartDateError").textContent = "";
    document.getElementById("addEndDateError").textContent = "";

    if (!name) {
      document.getElementById("addHolidayNameError").textContent = "Required.";
      isValid = false;
    }

    if (!start) {
      document.getElementById("addStartDateError").textContent = "Required.";
      isValid = false;
    }

    if (!end) {
      document.getElementById("addEndDateError").textContent = "Required.";
      isValid = false;
    }

    if (start && end && new Date(start) > new Date(end)) {
      document.getElementById("addEndDateError").textContent = "End Date must be after Start Date.";
      isValid = false;
    }

    if (!isValid) e.preventDefault();
  });

  // Loop through each edit modal and apply min-date logic
  <?php foreach ($holidays as $value): ?>
  var editModal<?= $value->id ?> = document.getElementById('editHolidayModal<?= $value->id ?>');
  editModal<?= $value->id ?>.addEventListener('shown.bs.modal', function () {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('editStartDate<?= $value->id ?>').setAttribute('min', today);
    document.getElementById('editEndDate<?= $value->id ?>').setAttribute('min', today);
  });
  <?php endforeach; ?>
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const today = new Date().toISOString().split('T')[0];

  <?php foreach ($holidays as $value): ?>
    const editStartDate<?= $value->id ?> = document.getElementById('editStartDate<?= $value->id ?>');
    const editEndDate<?= $value->id ?> = document.getElementById('editEndDate<?= $value->id ?>');

    if (editStartDate<?= $value->id ?> && editEndDate<?= $value->id ?>) {
      // Set today's date as the minimum for both fields
      editStartDate<?= $value->id ?>.setAttribute('min', today);
      editEndDate<?= $value->id ?>.setAttribute('min', today);

      editStartDate<?= $value->id ?>.addEventListener('change', function () {
        if (editStartDate<?= $value->id ?>.value) {
          const selected = new Date(editStartDate<?= $value->id ?>.value);
          selected.setDate(selected.getDate() + 1); // disable same-day if needed
          const minEnd = selected.toISOString().split('T')[0];
          editEndDate<?= $value->id ?>.value = "";
          editEndDate<?= $value->id ?>.setAttribute('min', minEnd);
        }
      });
    }
  <?php endforeach; ?>
});
</script>


<!-- validate add holiday form -->
<script>
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