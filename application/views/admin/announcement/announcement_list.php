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
        <div class="breadcrumb-title pe-3">Announcement</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Announcement</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <a href="<?php echo base_url();?>add-announcement" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add Announcement </a>
             
            </div>
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Status</th>
                      <th>Announcement</th>
                      <th>Image</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($announcement as $value): ?>
                      <tr>

                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url();?>edit-announcement/<?php echo base64_encode($value['announcement_id']);?>" class="btn btn-sm btn-info waves-effect waves-light"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++ ?></td>
                        <td>
                            <?php
                              if ($value['announcement_status'] == '0') {
                              ?>
                                  <a href="javascript:void(0);" data-bs-toggle="modal"
                                    data-bs-target="#announcementstatusModal<?php echo $value['announcement_id']; ?>"
                                    class="btn btn-sm waves-effect waves-light holiday"
                                    style="color:red"> DeActive
                                  </a>
                              <?php
                              }
                              else
                              {
                            ?>
                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                  data-bs-target="#announcementstatusModal<?php echo $value['announcement_id']; ?>"
                                  class="btn btn-sm waves-effect waves-light holiday"
                                  style="color:green"> Active
                                </a>
                            <?php
                              }
                              ?>
                        </td>
                        <td><?php echo $value['announcement_description'] ?></td>
                        <td>
                          <img src="<?php echo base_url();?>uploads/announcement/<?php echo $value['announcement_image']; ?>" height="100px"/>
                        </td>
                        
                      </tr>

                      <!-- Status Modal -->
                      <div class="modal fade" id="announcementstatusModal<?php echo $value['announcement_id']; ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <form method="post" action="<?php echo base_url(); ?>Announcement/update_announcement_status" id="holidayForm" enctype="multipart/form-data">
                            <input type="hidden" name="announcement_id" value="<?php echo $value['announcement_id']; ?>" />
                            <input type="hidden" name="announcement_status" value="<?php echo $value['announcement_status']; ?>" />
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Update Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <div class="form-group">
                                  <label class="control-label">Are you sure you want to this status?</label>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
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
                      <th>Status</th>
                      <th>Announcement</th>
                      <th>Image</th>
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
