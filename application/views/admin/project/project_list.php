<!--sidebar-wrapper-->
<style type="text/css"></style>
<style>
  @keyframes blinker {
    50% {
      opacity: 0.6;
    }
  }
   table.dataTable thead > tr > th.sorting_asc, table.dataTable thead > tr > th.sorting_desc, table.dataTable thead > tr > th.sorting, table.dataTable thead > tr > td.sorting_asc, table.dataTable thead > tr > td.sorting_desc, table.dataTable thead > tr > td.sorting {
    color: black;
    padding-right: 30px;
}

</style>

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
        <div class="breadcrumb-title pe-3">Project</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Project</li>
            </ol>
          </nav>
        </div>
      </div>

    <div class="col-md-12" style="padding-top: 15px">
        <div class="row">

          <div class="col-sm-2">
            <div class="card " style="background-color: #A1A1A1">
              <div class="card-body">
                <a href="<?php echo base_url();?>project-list">
                  <h5 class="card-title" style="color: white;">
                    <?php //echo count($projects);
                   echo isset($total_projects) ? $total_projects : 0; ?>
                  </h5><br>
                  <h6 style="color: white;">Total</h6>  
                </a>
              </div>
            </div>
          </div>
          <?php
            $op_user_id = $this->session->userdata('op_user_id');
            $role_id = $this->session->userdata('user_role');
            
            if(!empty($project_status))
            {
              foreach($project_status as $ps)
              {
                  $sql = 'SELECT * from project Where project_status_id = "'.$ps['ps_id'].'"';
                  $res_query = $this->db->query($sql);
                  $row = $res_query->result();
                  $cnt = $res_query->num_rows();
          ?>
                  <div class="col-sm-2">
                    <div class="card " style="background-color: #A1A1A1">
                      <div class="card-body">
                        <a href="<?php echo base_url();?>project-list/<?php echo base64_encode($ps['ps_id']);?>">
                          <h5 class="card-title" style="color: white;">
                            <?php echo $cnt;?>
                          </h5><br>
                          <h6 style="color: white;"><?php echo $ps['project_status_type'];?></h6>  
                        </a>
                      </div>
                    </div>
                  </div>
          <?php
              }
            }
          ?>
          
          <div class="col-sm-3">
            <div>
              <a href="<?php echo base_url(); ?>add-project" class="btn btn-success btn-quirk btn-wide mr5 btn-block" style="height: 97px; line-height: 5; animation: blinker 1s linear infinite;">Add New Project</a>
            </div>
          </div> 

        </div>
    </div>

      <div class="card mt-2">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <!-- <th>Action</th> -->
                      <th>Sr. No.</th>
                      <th>Action</th>
                      <th>Project Name</th>
                      <th>Project ID/Code</th>
                      <th>Project Type</th>
                      <th>Project Status</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Project Handover Date</th>
                      <th>Marketing Person</th>
                      <th>Project Client</th>
                      <th>Contact Person Name</th>
                      <th>Contact Person Number</th>
                      <th>Project Manager</th>
                      <th>Development Team</th> 
                      <th>Project Description</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($projects as $value): ?>
                      <tr>

                        <!-- <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="javascript:void(0);" data-bs-toggle="modal"
                              data-bs-target="#editHolidayModal<?php echo $value['project_id']; ?>"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                            </div>
                          </div>
                        </td> -->
                        <td><?php echo $i++ ?></td>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url();?>edit-project/<?php echo base64_encode($value['project_id']);?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                              <a href="<?php echo base_url();?>view-project/<?php echo base64_encode($value['project_id']);?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-eye"></i> View
                              </a>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $value['project_name'] ?></td>
                        <td><?php echo $value['project_code'] ?></td>
                        <td><?php echo $value['project_type'] ?></td>
                        <td><?php echo $value['project_status_type'] ?></td>
                        <td><?php echo date('jS \of F Y', strtotime($value['project_start_date'])); ?></td>
                        <td><?php if (!empty($value['estimated_completion_date'])) {
                          echo date('jS \of F Y', strtotime($value['estimated_completion_date']));
                        } ?>
                        </td>
                        <td><?php if($value['project_handover_date']=='0000-00-00')
                        {
                        }
                        else
                        {
                          echo date('jS \of F Y', strtotime($value['project_handover_date']));} ?></td>
                          <td><?php echo $value['marketing_person'] ?></td>
                        <td><?php echo $value['company'] ?></td>
                        <td><?php echo $value['customer_name'] ?></td>
                        <td><?php echo $value['customer_no'] ?></td>
                        <td><?php echo $value['user_name'] ?></td>
                        <td><?php echo $value['developer_names'] ?></td> 
                        <td><?php echo $value['project_description'] ?></td>

                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <!-- <th>Action</th> -->
                      <th>Sr. No.</th>
                      <th>Action</th>
                      <th>Project Name</th>
                      <th>Project ID/Code</th>
                      <th>Project Type</th>
                      <th>Project Status</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Project Handover Date</th>
                      <th>Marketimg Person</th>
                      <th>Project Client</th>
                      <th>Contact Person Name</th>
                      <th>Contact Person Number</th>
                      <th>Project Manager</th>
                       <th>Development Team</th> 
                      <th>Project Description</th>
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
<!--<div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
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
           <!-- <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="holidayName">Holiday Name<span class="text-danger">*</span></label>
                <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter Holiday Name">
                <input type="text" class="form-control" id="holidayName" name="holiname" placeholder="Enter Holiday Name">
                <small class="text-danger" id="holidayNameError"></small>
              </div>
            </div>
            <!-- Start Date -->
           <!-- <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="startDate">Holiday Start Date<span class="text-danger">*</span></label>
                <input type="date" class="form-control" id="startDate" name="startdate">
                <small class="text-danger" id="startDateError"></small>
              </div>
            </div>
            <!-- End Date -->
            <!--<div class="col-sm-12 mt-3">
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
  // $(document).ready(function () {
  //   $(".holiday").click(function (e) {
  //     e.preventDefault(); // Prevent default click behavior
  //     var iid = $(this).attr('data-id');
  //     $('#holidayForm').trigger("reset");
  //     $('#exampleVerticallycenteredModal').modal('show');
  //     $.ajax({
  //       url: '<?php echo base_url();?>Leave/get_holiday_details?id=' + iid,
  //       method: 'GET',
  //       dataType: 'json',
  //     }).done(function (response) {
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