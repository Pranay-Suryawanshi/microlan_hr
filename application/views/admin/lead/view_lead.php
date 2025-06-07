<!--sidebar-wrapper-->
<?php include_once('header.php') ?>
<style type="text/css">
  .direct-chat-messages {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    height: 250px;
    overflow: auto;
    padding: 10px;
  }

  .direct-chat-msg {
    margin-bottom: 10px;
  }

  .direct-chat-msg,
  .direct-chat-text {
    display: block;
  }

  .direct-chat-infos {
    display: block;
    font-size: .875rem;
    margin-bottom: 2px;
  }

  .direct-chat-timestamp {
    color: #697582;
  }

  .float-right {
    float: right !important;
  }

  .clearfix::after {
    display: block;
    clear: both;
    content: "";
  }

  .direct-chat-img {
    border-radius: 50%;
    float: left;
    height: 40px;
    width: 40px;
  }

  img {
    vertical-align: middle;
    border-style: none;
  }

  .direct-chat-text {
    border-radius: .3rem;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
  }

  .direct-chat-msg,
  .direct-chat-text {
    display: block;
  }

  .direct-chat-text::before {
    border-width: 6px;
    margin-top: -6px;
  }

  .direct-chat-text::after,
  .direct-chat-text::before {
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
  }

  .direct-chat-text::after {
    border-width: 5px;
    margin-top: -5px;
  }

  .direct-chat-text::after,
  .direct-chat-text::before {
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
  }

  .direct-chat-msg {
    margin-bottom: 10px;
  }

  .direct-chat-msg,
  .direct-chat-text {
    display: block;
  }

  .direct-chat-infos {
    display: block;
    font-size: .875rem;
    margin-bottom: 2px;
  }

  .direct-chat-timestamp {
    color: #697582;
  }

  .float-left {
    float: left !important;
  }

  .right .direct-chat-img {
    float: right;
  }

  .direct-chat-img {
    border-radius: 50%;
    float: left;
    height: 40px;
    width: 40px;
  }

  img {
    vertical-align: middle;
    border-style: none;
  }

  .direct-chat-primary .right>.direct-chat-text {
    background: #007bff;
    border-color: #007bff;
    color: #fff;
  }

  .right .direct-chat-text {
    margin-left: 0;
    margin-right: 50px;
  }

  .direct-chat-text {
    border-radius: .3rem;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
  }
</style>
<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">

  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <?php if ($this->session->flashdata('msg')) { ?>
      <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <?php echo $this->session->flashdata('msg'); ?>
      </div>
    <?php } ?>
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">View Lead </div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">View Lead</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <!--    <div class="btn-group"><a href="add-new-template.php"><button type="button" class="btn btn-primary">Add New Template</button></a></div> -->
        </div>
      </div>
      <div class="card ">
        <div class="card-body">
          <div class="overflow-auto">
            <ul class="nav nav-tabs flex-nowrap d-flex" id="myTab" role="tablist" style="white-space: nowrap; overflow-x: auto;">
              <!-- <ul class="nav nav-tabs" id="myTab" role="tablist"> -->
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"> Profile</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Quotation</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Tasks</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="key-point-tab" data-bs-toggle="tab" href="#key-point" role="tab" aria-controls="key-point" aria-selected="false">Attachment</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="commercial-tab" data-bs-toggle="tab" href="#commercial" role="tab" aria-controls="commercial" aria-selected="false">Reminder</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="term-and-condtion-tab" data-bs-toggle="tab" href="#note_link" role="tab" aria-controls="term-and-condtion" aria-selected="false">Notes</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="attachment-tab" data-bs-toggle="tab" href="#attachment" role="tab" aria-controls="attachment" aria-selected="false">Activity</a>
              </li>
            </ul>
          </div>
          <div class="tab-content p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <!--breadcrumb-->
                <!--end breadcrumb-->
                <div class="user-profile-page">
                  <div class="card radius-15">
                    <div class="card-body">





                      <div class="row">
                        <div class="col-md-12">
                          <div class=" ">
                            <div class="  box-profile">
                              <div class="row">
                                <div class="col-sm-6" style="border-right: 1px solid lightgray">
                                  <div class="row">
                                    <div class="col-sm-4">
                                      <div class="text-center">
                                        <img class="profile-user-img img-fluid" src="https://demodevcrm.microlanpos.com/uploads/user.png" alt="User profile picture" style="width: 100%">
                                      </div>
                                    </div>
                                    <div class="col-sm-8">
                                      <h3 class="profile-username"><?php echo $leads[0]['contact_fullname']; ?></h3>
                                      <p class="text-muted" style="margin-bottom: 0px"><?php echo $leads[0]['contact_email']; ?></p>
                                      <a href="callto:<?php echo $leads[0]['contact_phone']; ?>">
                                        <button class="btn btn-primary btn-sm mt-2" data-toggle="tooltip" title="1234567890"><?php echo $leads[0]['contact_phone']; ?> </button>
                                      </a>

                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <p><strong>Company Name</strong>: <b><?php echo $leads[0]['contact_company']; ?></b></p>
                                  <p><strong>Lead Id</strong>: <span><?php echo $leads[0]['lead_id']; ?></span></p>
                                  <p><strong>Lead Mode</strong>: <span style="color:blue; cursor:pointer" data-bs-toggle="modal" data-bs-target="#leadModeModal"><?php echo $leads[0]['mode_name']; ?></span></p>
                                  <p><strong>Lead Status</strong>: <span style="color:blue; cursor:pointer" data-bs-toggle="modal" data-bs-target="#leadStatusModal"><?php echo $leads[0]['name']; ?></span></p>
                                  <p><strong>Lead Source</strong>: <span><?php echo $leads[0]['lead_source']; ?></span></p>
                                  <?php
                                  if ($leads[0]['lead_source'] == 'Partner') { ?>
                                    <p><strong>Partner Name</strong>: <span><?php echo $leads[0]['partner_name']; ?></span></p>
                                  <?php }
                                  ?>

                                  <!-- <p><strong>Project Manager</strong>: <span>Michael Smith</span></p>
                                      <p><strong>Site Visit Status</strong>: <span style="color:green; font-weight:600;"  >Visited</span></p> -->
                                  <p><strong>Inquire Date</strong>: <span><?php echo $leads[0]['lead_date']; ?></span></p>
                                  <!-- <p><strong>Site Visit Comment</strong>: <span>Client was satisfied with the tour.</span></p> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                          <div class=" " style="padding: 10px">
                            <!-- <div class="card-header p-2">
                                  <h5>
                                    <span>Last Contact: March 10, 2025</span> | 
                                    <span style="color:green;">Updated: March 20, 2025</span> | 
                                    <span><a href="#FollowUpModal" data-toggle="modal" data-target="#FollowUpModal">Next FollowUp</a></span> | 
                                    <span style="float: right;"><a href="#"  >Site Schedule</a></span>
                                  </h5>
                                </div>-->
                            <div class="row mt-3">
                              <div class="col-sm-6">
                                <p><strong>Communication Preference:</strong> <span><?php echo $leads[0]['com_name']; ?></span></p>
                                <hr>

                                <p><strong>Requirement Type:</strong> <span><?php echo $leads[0]['project_type']; ?></span></p>
                                <hr>
                                <p><strong>Assigned to:</strong> <span><?php echo $leads[0]['user_name']; ?></span></p>
                                <hr>
                              </div>
                              <div class="col-sm-6">
                                <p><strong>Contact Time:</strong> <span><?php echo $leads[0]['communication_time']; ?></span></p>
                                <hr>
                                <p><strong>Expacted Period:</strong> <span><?php echo $leads[0]['possession_expected_period']; ?> days</span></p>
                                <hr>

                                <!-- <p><strong>FollowUp Remark:</strong> <span>Client requested pricing details.</span></p> -->
                              </div>
                            </div>
                          </div>
                        </div>

                        <style>
                          .chat-container {
                            width: 400px;
                            max-height: 400px;
                          }

                          .message {
                            padding: 8px;
                            margin: 5px 0;
                            max-width: 50%;
                            border-radius: 10px;
                          }

                          .left {
                            background-color: #f1f0f0;
                            text-align: left;
                            float: left;
                            clear: both;
                          }

                          .right {
                            background-color: #d1e7dd;
                            text-align: right;
                            float: right;
                            clear: both;
                          }
                        </style>

                        <div class="col-sm-5">
                          <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                              <h6 class="card-title">Add Remark</h6>
                            </div>
                            <div class="card-footer">
                              <form action="<?php echo base_url(); ?>Lead/save_lead_remark" method="post">

                                <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $leads[0]['lead_id']; ?>" />
                                <input type="hidden" name="added_by" id="added_by" value="<?php echo $this->session->userdata('op_user_id'); ?>" />
                                <div class="input-group">
                                  <input type="text" name="remark" id="remark" placeholder="Type Remark ..." class="form-control">
                                  <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 0px;" id="submit_remark">Submit</button>
                                  </span>
                                </div>
                              </form>
                            </div>
                            <div class="card-body" id="remarks_panel">
                              <div class="direct-chat-messages" id="remarks_messages">

                                <?php
                                if (!empty($lead_remark)) {
                                  foreach ($lead_remark as $index => $remark) {

                                    $sql = "SELECT * from op_user Where op_user_id = '" . $remark['added_by'] . "'";
                                    $query = $this->db->query($sql);
                                    $result = $query->result_array();
                                    $user_name = $result[0]['user_name'];

                                    if ($index % 2 == 0) {
                                ?>
                                      <div class="chat-container">
                                        <div class="message right">
                                          <b><?= htmlspecialchars($remark['remark']) ?></b>
                                          <br>
                                          <small>Added by : <?= htmlspecialchars($user_name) ?></small>
                                          <br>
                                          <small>Date/Time : <?= date('jS \of F Y h:i A', strtotime($remark['added_on'])) ?></small>
                                        </div>
                                      </div>

                                    <?php
                                    } else {
                                    ?>
                                      <div class="chat-container">
                                        <div class="message left">
                                        <b><?= htmlspecialchars($remark['remark']) ?></b>
                                          <br>
                                          <small>Added by : <?= htmlspecialchars($user_name) ?></small>
                                          <br>
                                          <small>Date/Time : <?= date('jS \of F Y h:i A', strtotime($remark['added_on'])) ?></small>
                                        </div>
                                      </div>
                                <?php
                                    }
                                  }
                                }
                                ?>

                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-7"></div>
                      </div>










                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

              <div class="row">
                <div class="card-body">
                  <a href="<?php echo base_url('lead-praposals/' . $this->uri->segment(2)); ?>" class="btn btn-success btn-quirk btn-wide mr5" style="float: left;margin-bottom: 29px;">New Quotation</a>
                </div>
                <form action="" method="POST" id="idForm">
                  <div class="col-md-12">

                    <!-- Horizontal Form -->
                    <div class="  card-info">
                      <div class="card-body">

                        <div class="row">
                          <div class="col-sm-3 mt-3">
                            <div class="form-group">
                              <label for="companyName">From Date</label>
                              <input type="date" class="form-control" name="from_date" id="from_date" placeholder=" " required>
                            </div>
                          </div>
                          <div class="col-sm-3 mt-3">
                            <div class="form-group">
                              <label for="companyName">To Date</label>
                              <input type="date" class="form-control" name="to_date" id="to_date" placeholder=" " required>
                            </div>
                          </div>
                          <div class="col-sm-3 mt-3">
                            <div class="form-group">
                              <label for="companyName">Subject</label>
                              <select class="form-control" id="lp_id" name="lp_id">
                                <!-- <option value=""></option>
                              <option value="1">New RT</option>
                              <option value="2">New Praposals Design</option>
                              <option value="3">New Praposals test</option>
                              <option value="4">Toll Management</option>
                              <option value="5">test</option> -->
                                <option value=""></option>
                                <?php
                                foreach ($praposals_list as $key => $value) { ?>
                                  <option value="<?php echo $value['lp_id']; ?>"><?php echo $value['subject']; ?></option>
                                <?php
                                } ?>
                              </select>
                            </div>
                          </div>
                          <!--<div class="col-sm-3 mt-3">
                          <div class="form-group">
                            <label for="companyName">Status</label>
                            <select class="form-control" id="status" name="status">
                              <option value=""></option>
                              <option value="1">Active</option>
                              <option value="0">Deactive</option>
                            </select>
                          </div>
                        </div>-->
                          <span id="err_msg" style="color:red;"></span>
                          <div class="col-sm-12 mt-3">
                            <button class="btn btn-primary" type="button" id="btnfilter">Filter</button>
                          </div>
                        </div>

                </form>
                <div class="row mt-5">
                  <div class="col-sm-12">
                    <div class="table-responsive ">
                      <table id="quotation_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                          <tr>
                            <th>Action</th>
                            <th>S.No.</th>
                            <th>Subject</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Open Till</th>
                            <th>Tags</th>
                            <th>Date Created</th>
                            <th>Status</th>

                          </tr>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Action</th>
                            <th>S.No.</th>
                            <th>Subject</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Open Till</th>
                            <th>Tags</th>
                            <th>Date Created</th>
                            <th>Status</th>

                          </tr>
                        </tfoot>
                        <tbody id="quotation_records">
                          <?php if (!empty($praposals_list)) {
                            $i = 1;
                            foreach ($praposals_list as $key_p => $value_p) { ?>
                              <tr>
                                <td class="">
                                  <div class="dropdown">
                                    <button class="dropbtn">
                                      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-content">
                                      <a href="<?php echo base_url('edit-praposals/' . $value_p['lp_id']) ?>"
                                        class="btn btn-sm btn-info waves-effect waves-light holiday"
                                        style="color:white">
                                        <i class="fa fa-edit"></i> Edit
                                      </a>
                                      <a href="" onclick="praposalFunctionDelete('<?php echo $value_p['lp_id']; ?>')"
                                        class="btn btn-sm btn-info waves-effect waves-light holiday"
                                        style="color:white">
                                        <i class="fa fa-trash"></i> Delete
                                      </a>
                                      <a href="<?php echo base_url('view-praposals/' . $value_p['lp_id'] . '/' . $value_p['lead_id']) ?>"
                                        class="btn btn-sm btn-info waves-effect waves-light holiday"
                                        style="color:white">
                                        <i class="fa fa-eye"></i> View Proposal
                                      </a>

                                    </div>
                                  </div>
                                </td>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $value_p['subject']; ?></td>
                                <td><?php echo $value_p['total_amount']; ?></td>
                                <td><?php echo $value_p['date']; ?></td>
                                <td><?php echo $value_p['open_till']; ?></td>
                                <td><?php echo $value_p['tags']; ?></td>
                                <td><?php echo $value_p['created_date']; ?></td>
                                <td><?php if ($value_p['status'] == 1) {
                                      echo "<span style='color:green;font-weight:700'>Active</span>";
                                    } else {
                                      echo "<span style='color:red;font-weight:700'>Deactive</span>";
                                    } ?></td>

                              </tr>
                          <?php }
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <!--    <div class="card-footer"><button type="submit" class="btn btn-info float-right">Submit</button></div> -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
          <div class="col-sm-12">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">New Task</button>
          </div>
          <div class="col-sm-12 mt-3">
            <div class="table-responsive ">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Sr. No.</th>
                    <th>Task Name</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <th>Priority</th>
                    <th>Attached File</th>
                    <!--  <th>Assigned To </th> -->

                    <!-- <th>Description</th>-->

                  </tr>
                </thead>
                <tbody id="">
                  <?php if (!empty($task_list)) {
                    $i = 1;
                    foreach ($task_list as $key_a => $value_tk) { ?>
                      <tr>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="javascript:void(0);" onclick="taskFunctionEdit('<?php echo $value_tk['task_id']; ?>')"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                              <a href="javascript:void(0);" onclick="taskFunctionDelete('<?php echo $value_tk['task_id']; ?>')"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value_tk['subject']; ?></td>

                        <td><?php if ($value_tk['task_status'] == 1) {
                              echo "Not Started";
                            } else {
                              echo "Started";
                            }
                            ?></td>
                        <td><?php echo $value_tk['start_date']; ?></td>
                        <td><?php echo $value_tk['due_date']; ?></td>
                        <td><?php echo $value_tk['priority']; ?></td>
                        <!--  <td><?php echo $value_tk['task_description	']; ?></td>-->
                        <td>
  <?php
  $savedFilenames = $value_tk['task_file'] ?? '';
  $filenames = array_map('trim', explode(',', $savedFilenames));

  foreach ($filenames as $filename) {
      if (empty($filename)) continue;

      $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
      $fileUrl = base_url('uploads/lead/task/' . $filename);

      if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'])) {
          echo '<div style="margin:5px 0;"><img src="' . $fileUrl . '" alt="Image" style="width:50%;" /></div>';
      } elseif ($extension === 'pdf') {
          echo '<div style="margin:5px 0;"><object data="' . $fileUrl . '" type="application/pdf" width="100%" height="500px"></object></div>';
      } else {
          echo '<div>Unsupported file type: ' . htmlspecialchars($filename) . '</div>';
      }
  }
  ?>
</td>

                      </tr>
                  <?php }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Action</th>
                    <th>Sr. No.</th>

                    <th>Task Name</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>Due Date</th>
                    <!--  <th>Assigned To </th> -->

                    <th>Priority</th>
                    <!-- <th>Description</th>-->
                  </tr>
                </tfoot>

              </table>
            </div>
          </div>
        </div>
        <div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Add New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" name="add_task_from" class="form-validate" action="<?php echo base_url('lead/submittask/' . $this->uri->segment(2)); ?>" onsubmit="return validate_add_task(this)" enctype="multipart/form-data">

                <div class="modal-body">

                  <div class="form-group col-sm-12">
                    <label for="subject" class="col-form-label"> Subject <span class="text-danger">*</label>
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter the subject" required>
                        <span id=" subject_err" style="color:red;"></span>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="start_date" class="col-form-label">Start Date <span class="text-danger">*</label>
                    <input type="datetime-local" name="start_date" class="form-control" id="start_date" required placeholder="Enter the start date">
                    <span id="stdt_err" style="color:red;"></span>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="due_date" class="  col-form-label">Due Date <span class="text-danger">*</label>
                    <input type="datetime-local" name="due_date" class="form-control" id="due_date" required placeholder="Enter the due date">
                    <span id="dudt_err" style="color:red;"></span>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="priority" class=" col-form-label">Priority <span class="text-danger">*</label>
                    <select class="form-control" name="priority" id="priority" required>
                      <option value="">Priority</option>
                      <option value="low">Low</option>
                      <option value="medium">Medium</option>
                      <option value="high">High</option>
                      <option value="urgent">Urgent</option>
                    </select>
                    <span id="priority_err" style="color:red;"></span>
                  </div>

                  <div class="form-group col-sm-12">
                    <label for="task_description" class="col-sm-4 col-form-label">Task Description</label>
                    <div class="col-sm-12">
                      <textarea id="task_description" name="task_description" class="form-control" placeholder="Enter task description"></textarea>
                    </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="task_description" class="col-sm-4 col-form-label">Attachment</label>
                    <div class="col-sm-12">
                      <input type="file" name="task_file[]" id="special_attachment1" multiple>
                    </div>
                    <span id="sp_err" style="color: red;"></span>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
          </div>
        </div>


        <div class="modal fade" id="edittaskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="taskModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form method="post" name="edit_task_from" class="form-validate" action="<?php echo base_url('lead/updatetask/' . $this->uri->segment(2)); ?>" onsubmit="return validate_edit_task(this)" enctype="multipart/form-data">

                <div class="modal-body">
                  <input type="hidden" name="task_id" class="form-control" id="edit_task_id">
                  <div class="form-group col-sm-12">
                    <label for="subject" class="col-form-label"> Subject <span class="text-danger">*</label>
                    <input type="text" name="subject" class="form-control" id="edit_subject" placeholder="Enter the subject">
                    <span id="esubject_err" style="color:red;"></span>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="start_date" class="col-form-label">Start Date <span class="text-danger">*</label>
                    <input type="datetime-local" name="start_date" class="form-control" id="edit_start_date" placeholder="Enter the start date">
                    <span id="estdt_err" style="color:red;"></span>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="due_date" class="  col-form-label">Due Date <span class="text-danger">*</label>
                    <input type="datetime-local" name="due_date" class="form-control" id="edit_due_date" placeholder="Enter the due date">
                    <span id="edudt_err" style="color:red;"></span>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="priority" class=" col-form-label">Priority <span class="text-danger">*</label>
                    <select class="form-control" name="priority" id="edit_priority">
                      <option value=""></option>
                      <option value="low">Low</option>
                      <option value="medium">Medium</option>
                      <option value="high">High</option>
                      <option value="urgent">Urgent</option>
                    </select>
                    <span id="epriority_err" style="color:red;"></span>
                  </div>

                  <div class="form-group col-sm-12">
                    <label for="task_description" class="col-sm-4 col-form-label">Task Description</label>
                    <div class="col-sm-12">
                      <textarea id="edit_task_description" name="task_description" class="form-control" placeholder="Enter task description">Sample task description goes here.</textarea>
                    </div>
                  </div>
                  <div class="form-group col-sm-12">
                    <label for="task_description" class="col-sm-4 col-form-label">Attachment</label>
                    <div class="col-sm-12">
                      <input type="file" name="task_file[]" id="special_attachment" multiple />
                    </div>
                    <input type="hidden" name="saved_attachment" id="saved_attachment" />
                    <span id="err5" style="color: green;"></span>
                    <span id="err6" style="color: red;"></span>
                  </div>

                  <div class="form-group col-sm-12" id="saved_attachments_container">
                    <label for="task_description" class="col-sm-4 col-form-label">Saved Attachments:</label>
                    <div class="col-sm-12">
                      <ul id="saved_attachments_list"></ul>
                    </div>
                  </div>
                </div>



                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
          </div>
        </div>


      </div>

      <div class="modal fade" id="editattachmentModal" tabindex="-1" aria-labelledby="attachmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="taskModalLabel">Edit Attachment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="edit_task_from" class="form-validate" action="<?php echo base_url('lead/updateattachment/' . $this->uri->segment(2)); ?>" onsubmit="return validate_edit_attachment(this)" enctype="multipart/form-data">

              <div class="modal-body">
                <div class="col-md-12 attachment_div" style="margin-top: 20px">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="add_attachment">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>File</th>
                          <!-- <th>Image Preview</th> -->
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> 1 </td>
                          <td>
                            <input type="file" name="edit_file_covering[]" accept="image/*, application/pdf" class="form-control" id="covering">
                          </td>
                          <!-- <td> -->
                            <!-- <img
                              id="imagePreview" style="width: 125px; border-radius: 20%; height: 125px"> -->
                          <!-- </td> -->
                          <td>
                            <div class="form-group">
                              <button type="button" class="btn btn-danger" onclick="removeBannerCovering(0)">
                                <i class="fa fa-minus"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="4">
                            <div class="form-group">
                              <button type="button" class="btn btn-primary" onclick="add_attachement_sheet()">
                                <i class="fa fa-plus"></i>
                              </button>
                            </div>
                          </td>
                        </tr>

                      </tfoot>

                    </table>
                    <span id="edit_att_err1" style="color:red;"></span>



                    <div class="form-group col-sm-12" id="saved_file_attachments_container">
                      <label for="task_description" class="col-sm-4 col-form-label">Saved Attachments:</label>
                      <div class="col-sm-12">
                        <ul id="saved_file_attachments_list"></ul>
                      </div>
                    </div>

                    <span id="edit_att_err" style="color:red;"></span>
                    <input type="hidden" name="saved_file_attachment" id="saved_file_attachment" />
                    <input type="hidden" name="attachment_id" id="edit_attachment_id">
                  </div>
                </div>
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>


              </div>
            </form>
          </div>
        </div>


      </div>

      <div class="tab-pane fade" id="key-point" role="tabpanel" aria-labelledby="key-point-tab">
        <div class="row">
          <form method="post" name="add_task_from" class="form-validate" action="<?php echo base_url('lead/submitattachment/' . $this->uri->segment(2)); ?>" onsubmit="return validate_add_attachment(this)" enctype="multipart/form-data">
            <div class="col-md-12 attachment_div" style="margin-top: 20px">
              <div class="table-responsive">
                <table class="table table-bordered" id="add_attachment">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>File</th>
                      <th> Image Preview</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="attachment_body">
                    <tr>
                      <td> 1 </td>
                      <td>
                        <input type="file" onchange="previewImage(event)" name="file_covering[]" accept="image/*, application/pdf" class="form-control" id="covering_1">
                      </td>
                          <td>
                            <img
                              id="imagePreview" style="width: 125px; border-radius: 20%; height: 125px">
                          </td>
                      <td>
                        <div class="form-group">
                          <button type="button" class="btn btn-danger" onclick="removeattachment(1)">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="4">
                        <div class="form-group">
                          <button type="button" class="btn btn-primary" onclick="addattachment()">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </td>
                    </tr>

                  </tfoot>

                </table>
                <span id="att_err1" style="color:red;"></span>
              </div>
            </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>

        <script>
          let attachmentCount = 1; // Corrected variable name

          function addattachment() {
            attachmentCount++; // Increment the corrected variable
            const tableBody = document.getElementById('attachment_body');

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                    <td>${attachmentCount}</td>
                      <td>
                        <input type="file" name="file_covering[]" class="form-control" id="covering_${attachmentCount}" accept="image/*, application/pdf">
                      </td>
                      <td>Image</td>
                      <td>
                        <div class="form-group">
                          <button type="button" class="btn btn-danger" onclick="removeattachment(${attachmentCount})">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </td>
                    `;
            tableBody.appendChild(newRow);
          }

          function removeattachment(id) {
            const rowToRemove = document.getElementById(`covering_${id}`).closest('tr');
            rowToRemove.remove();
          }
        </script>


        <!-- /.card-body -->
        <div class="row col-md-12">
          <div class="card-body" style="overflow-x: auto;">
            <table class="table table-bordered nomargin" id="user_list">
              <thead>
                <tr>
                  <th>Action</th>
                  <th>Sr. No.</th>
                  <th>File</th>
                  <th>Uploaded By</th>
                  <th>Date Uploaded</th>

                </tr>
              </thead>
              <tbody id="">
                <?php if (!empty($attachment_list)) {
                  $i = 1;
                  foreach ($attachment_list as $key_f => $value_at) { ?>
                    <tr>
                      <?php $files = explode(',', $value_at['attachment_files']); ?>
                      <td class="">
                        <div class="dropdown">
                          <button class="dropbtn">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                          </button>
                          <div class="dropdown-content">
                            <a href="javascript:void(0);" onclick="filesFunctionEdit('<?php echo $value_at['attachment_id']; ?>')"
                              class="btn btn-sm btn-info waves-effect waves-light holiday"
                              style="color:white">
                              <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="javascript:void(0);" onclick="filesFunctionDelete('<?php echo $value_at['attachment_id']; ?>')"
                              class="btn btn-sm btn-info waves-effect waves-light holiday"
                              style="color:white">
                              <i class="fa fa-trash"></i> Delete
                            </a>
                          </div>
                        </div>
                      </td>
                      <td><?php echo $i++; ?></td>
                      <td><?php foreach ($files as $file) { 
                          // echo $file;

                          $file_name = $file;
                          $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

                          if($file_extension == 'jpg' || $file_extension == 'jpeg' || $file_extension == 'png' || $file_extension == 'gif' || $file_extension == 'bmp' || $file_extension == 'webp'){
                            
                        ?>
                          <img width="50px" height="50px" src="<?php echo base_url('uploads/lead/attachment/' . $file); ?>">
                        <?php } 
                        else
                        {
                        ?>
 <object class="pdf" 
                                                  data="<?php echo base_url();?>uploads/lead/attachment/<?php echo $file;?>" width="300" height="300">
                                              </object>
                        <?php
                        }
                        }
                        ?>
                      </td>

                      <td><?php echo $value_at['user_name']; ?></td>
                      <td><?php echo $value_at['created_date']; ?></td>

                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
        <div class="row">
          <div class="col-sm-12">
            <button type="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ReminderModal"> Add New Reminder </button>
          </div>
          <div class="col-sm-12 mt-3">
            <div class="table-responsive ">
              <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="user_list">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Sr. No.</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Remind</th>
                    <th>Is Notifiey ?</th>
                  </tr>
                </thead>
                <tbody id="">
                  <?php if (!empty($reminder_list)) {
                    $i = 1;
                    foreach ($reminder_list as $key_r => $value_r) { ?>
                      <tr>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="javascript:void(0);" onclick="reminderFunctionEdit('<?php echo $value_r['reminder_id']; ?>')"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                              <a href="javascript:void(0);" onclick="reminderFunctionDelete('<?php echo $value_r['reminder_id']; ?>')"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value_r['reminder_description']; ?></td>
                        <td><?php echo $value_r['reminder_date']; ?></td>
                        <td><?php echo $value_r['user_name']; ?></td>
                        <td><?php if ($value_r['send_email_reminder'] == 'on') {
                              echo "Yes";
                            } else {
                              echo "No";
                            } ?></td>

                      </tr>
                  <?php }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Action</th>
                    <th>Sr. No.</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Remind</th>
                    <th>Is Notifiey ?</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editnoteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="taskModalLabel">Edit Note</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" name="edit_note_from" class="form-validate" action="<?php echo base_url('lead/updatenote/' . $this->uri->segment(2)); ?>" onsubmit="return validate_edit_note(this)" enctype="multipart/form-data">
              <div class="  card-info">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 mt-3">
                      <div class="form-group">
                        <label for="addressLine1">Notes</label>
                        <textarea class="form-control" id="edit_note_msg" name="note_msg"></textarea>
                      </div>
                      <label id="edit_note_err" style="color:red;"></label>
                    </div>
                    <input type="hidden" id="edit_note_id" name="note_id">
                    <!-- <div class="col-sm-12 mt-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" value="on" id="touch_lead" name="touch_lead" > I got in touch with this lead </label>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" value="on" id="contacted_lead" name="contacted_lead"> I have not contacted this lead </label>
                        </div>-->
                    <div class="col-sm-12 mt-3">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>


      </div>

      <div class="tab-pane fade" id="note_link" role="tabpanel" aria-labelledby="term-and-condtion-tab">
        <div class="row">
          <div class="col-md-12">
            <!-- Horizontal Form -->

            <form method="post" name="add_note_from" class="form-validate" action="<?php echo base_url('lead/submitnote/' . $this->uri->segment(2)); ?>" onsubmit="return validate_add_note(this)" enctype="multipart/form-data">
              <div class="  card-info">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 mt-3">
                      <div class="form-group">
                        <label for="addressLine1">Notes</label>
                        <textarea class="editor form-control" id="note_msg" name="note_msg"></textarea>
                      </div>
                      <label id="note_err" style="color:red;"></label>
                    </div>
                    <!-- <div class="col-sm-12 mt-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" value="on" id="touch_lead" name="touch_lead" > I got in touch with this lead </label>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" value="on" id="contacted_lead" name="contacted_lead"> I have not contacted this lead </label>
                        </div>-->
                    <div class="col-sm-12 mt-3">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <!-- /.card -->
          </div>
          <div class="col-sm-12 mt-3">
            <div class="table-responsive ">
              <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Sr. No.</th>
                    <th>Note Message</th>
                    <th>Added By</th>
                    <th>Status</th>
                    <th>Added Date</th>


                  </tr>
                </thead>
                <tbody id="">
                  <?php if (!empty($note_list)) {
                    $i = 1;
                    foreach ($note_list as $key_a => $value_n) { ?>
                      <tr>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="javascript:void(0);" onclick="noteFunctionEdit('<?php echo $value_n['note_id']; ?>')"
                                class="btn btn-sm btn-info waves-effect waves-light holiday"
                                style="color:white">
                                <i class="fa fa-edit"></i> Edit
                              </a>

                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value_n['note_msg']; ?></td>

                        <td><?php echo $value_n['user_name']; ?></td>
                        <td><?php
                            if ($value_n['note_status'] == '1') {
                              echo "Active";
                            } else {
                              echo "De-Avtive";
                            } ?></td>
                        <td><?php echo $value_n['created_at']; ?></td>


                      </tr>
                  <?php }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Action</th>
                    <th>Sr. No.</th>
                    <th>Note Message</th>
                    <th>Added By</th>
                    <th>Status</th>
                    <th>Added Date</th>
                  </tr>
                </tfoot>

              </table>
            </div>
          </div>
        </div>
      </div>








      <div class="tab-pane fade" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
        <div class="row">
          <!-- <h5 class="card-title">Logs</h5> -->
          <!-- <div class="col-sm-12"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">New Task</button></div> -->
          <div class="col-sm-12">
            <div class="table-responsive">
              <table class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="table-white">
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Activity Done ON</th>
                    <th>Action</th>
                    <th>Activity ID</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($log_list)) {
                    $dtlID = 1;
                    foreach ($log_list as $key_a => $value_l) { ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $value_l['created_date']; ?></td>
                        <td><?php echo $value_l['user_name']; ?></td>
                        <td><?php
                            $activities = [1 => "Task", 2 => "Attachment", 3 => "Reminder", 4 => "Notes", 5 => "Quotation"];
                            echo $activities[$value_l['activity_id']] ?? 'Unknown';
                            ?></td>
                        <td><?php
                            $actions = [1 => "Add", 2 => "Edit/Update", 3 => "Delete"];
                            echo $actions[$value_l['action_id']] ?? 'Unknown';
                            ?></td>
                        <td><?php
                            $activity_labels = [1 => "Task ID", 2 => "Attachment ID", 3 => "Reminder ID", 4 => "Note ID", 5 => "Quotation ID"];
                            echo ($activity_labels[$value_l['activity_id']] ?? 'ID') . ":- " . $value_l['affected_id'];
                            ?></td>

                        <td>
                          <?php
                          if (!empty($value_l['details'])) {
                            $details_id = 'detailsModal' . $i; ?>

                            <!-- View Details Button -->
                            <button type="button" class="btn btn-primary btn-sm view-details-btn" data-target="#<?php echo $details_id; ?>">
                              View Details
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="<?php echo $details_id; ?>" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel<?php echo $i; ?>" aria-hidden="true">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="detailsModalLabel<?php echo $i; ?>">Change Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <?php
                                    $details = json_decode($value_l['details'], true);
                                    if (is_array($details)) { ?>
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Field</th>
                                            <th>Old Data</th>
                                            <th>New Data</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($details as $change) { ?>
                                            <tr>
                                              <td><?php echo htmlspecialchars($change['field']); ?></td>
                                              <td><?php echo htmlspecialchars($change['old_value']); ?></td>
                                              <td><?php echo htmlspecialchars($change['new_value']); ?></td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                      </table>
                                    <?php } else {
                                      echo "No details available.";
                                    } ?>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php } else {
                            echo "No details available.";
                          } ?>
                        </td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Activity Done ON</th>
                    <th>Action</th>
                    <th>Activity ID</th>
                    <th>Details</th>
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


<div class="modal fade" id="ReminderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="post" name="add_reminder_from" class="form-validate" action="<?php echo base_url('lead/submitreminder/' . $this->uri->segment(2)); ?>" onsubmit="return validate_add_reminder(this)" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Add lead reminder</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Date To Be Notified <span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control" id="reminder_date" name="reminder_date" placeholder="">
              </div>
              <span id="set_reminder_date_msg" style="color: red;"></span>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="contactPerson">Set reminder to <span class="text-danger">*</span></label>
                <select class="form-control" id="set_reminder_to" name="reminder_to">
                  <option value=""></option>
                  <?php
                  foreach ($member_list as $key => $value) { ?>
                    <option value="<?php echo $value['op_user_id']; ?>"><?php echo $value['user_name']; ?></option>
                  <?php
                  } ?>
                </select>

              </div>
              <span id="set_reminder_to_msg" style="color: red;"></span>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for=""> Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="reminder_description" name="reminder_description"></textarea>
                <span id="description_msg " style="color: red;"></span>
                <label id="errlb" style="color: red;"></label>
              </div>

            </div>
            <div class="col-sm-12 mt-3">
              <label class="checkbox-inline">
                <input type="checkbox" value="on" checked id="send_email_reminder" name="send_email_reminder">
                Send also an email for this reminder </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary add_reminder">Add Reminder</button>
        </div>
    </div>
    </form>
  </div>
</div>

<div class="modal fade" id="EditReminderModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="post" name="edit_reminder_from" class="form-validate" action="<?php echo base_url('lead/updatereminder/' . $this->uri->segment(2)); ?>" onsubmit="return validate_edit_reminder(this)" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title">Edit lead reminder</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="hidden" name="reminder_id" class="form-control" id="edit_reminder_id">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Date To Be Notified <span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control" id="edit_reminder_date" name="reminder_date" placeholder="" required>
              </div>
              <span id="e_set_reminder_date_msg" style="color: red;"></span>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="contactPerson">Set reminder to <span class="text-danger">*</span></label>
                <select class="form-control" id="edit_set_reminder_to" name="reminder_to" required>
                  <option value=""></option>
                  <?php
                  foreach ($member_list as $key => $value) { ?>
                    <option value="<?php echo $value['op_user_id']; ?>"><?php echo $value['user_name']; ?></option>
                  <?php
                  } ?>
                </select>

              </div>
              <span id="e_set_reminder_to_msg" style="color: red;"></span>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for=""> Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="edit_reminder_description" name="reminder_description" required></textarea>
                <span id="description_msg " style="color: red;"></span>
                <label id="e_errlb" style="color: red;"></label>
              </div>

            </div>
            <div class="col-sm-12 mt-3">
              <label class="checkbox-inline">
                <input type="checkbox" value="on" id="esend_email_reminder" name="send_email_reminder">
                Send also an email for this reminder </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary update_reminder">Save Reminder</button>
        </div>
    </div>
    </form>
  </div>
</div>


<div class="modal fade" id="new_task" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add lead reminder</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="companyName"> Date To Be Notified <span class="text-danger">*</label>
              <input type="date" class="form-control" id="name" placeholder="" required>
            </div>
          </div>
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="contactPerson">Set reminder to <span class="text-danger">*</label>
              <select class="form-control">
                <option>1</option>
                <option>2</option>
              </select>
            </div>
          </div>
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for=""> Description</label>
              <textarea class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-12 mt-3">
            <label class="checkbox-inline">
              <input type="checkbox" value=""> Send also an email for this reminder </label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="leadStatusModal" tabindex="-1" aria-labelledby="leadStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="leadStatusLabel">Update Lead Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
              <label class="form-label" for="lead_status">Select Lead Status</label>
              <select class="form-control" name="lead_status_id" id="lead_status_id">

                <?php
                foreach ($leadstatus_list as $status) {
                  $selected = ($leads[0]['lead_status_id'] == $status['is_id']) ? 'selected' : '';
                ?>
                  <option value="<?php echo $status['is_id']; ?>" <?php echo $selected; ?>>
                    <?php echo $status['name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="updateLeadStatusBtn">Update Lead Status</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="leadModeModal" tabindex="-1" aria-labelledby="leadModeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="leadStatusLabel">Update Lead Mode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
              <label class="form-label" for="lead_status">Select Lead Mode</label>
              <select class="form-control" name="lead_mode_id" id="lead_mode_id">

                <?php
                foreach ($mode_list as $mode) {
                  $selected = ($leads[0]['lead_mode_id'] == $mode['mode_id']) ? 'selected' : '';
                ?>
                  <option value="<?php echo $mode['mode_id']; ?>" <?php echo $selected; ?>>
                    <?php echo $mode['mode_name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="updateLeadModeBtn">Update Lead Status</button>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  var editModal = document.getElementById('editnoteModal');
  editModal.addEventListener('shown.bs.modal', function () {
    if (!$('#edit_note_msg').hasClass('summernote-initialized')) {
      $('#edit_note_msg').summernote({
        height: 150,
        placeholder: 'Write your note here...'
      }).addClass('summernote-initialized');
    }
  });

  editModal.addEventListener('hidden.bs.modal', function () {
    $('#edit_note_msg').summernote('destroy').removeClass('summernote-initialized');
  });
</script>
<script>
  function validate_add_task(ele) { //alert("11");
    //hide_message_box(ele);
    var hasError = 0;
    var subject = $("#subject").val();
    var start_date = $("#start_date").val();
    var due_date = $('#due_date').val();

    var priority = $("#priority").val();
    var fileInput = $("#special_attachment1")[0];
    var files = fileInput.files;


    if (subject.trim() == '') {
      // showError("Please enter  project name", " project_name");
      $('#subject_err').text('Please enter subject');
      hasError = 1;
    } else {
      $('#subject_err').text(''); // Clear error if valid
    }

    if (start_date.trim() == '') {
      //showError("Please enter project code", "project_code");
      $('#stdt_err').text('Please select start_date');
      hasError = 1;
    } else {
      $('#stdt_err').text(''); // Clear error if valid
    }
    // alert("3");
    //else { changeError("project_code"); }
    if (due_date.trim() == '') {
      //showError("Please enter project_type_id", "project_type_id"); 
      $('#dudt_err').text('Please select due date');
      hasError = 1;
    } else {
      $('#dudt_err').text(''); // Clear error if valid
    }


    if (priority.trim() == '') {
      //showError("Please enter project_type_id", "project_type_id"); 
      $('#priority_err').text('Please select priority');
      hasError = 1;
    } else {
      $('#priority_err').text(''); // Clear error if valid
    }
    // alert("22");
    var errorMessage = ''; // Initialize an empty error message

    // Loop through the files to check their extensions
    for (var i = 0; i < files.length; i++) {
      var fileName = files[i].name;
      var fileExtension = fileName.split('.').pop().toLowerCase(); // Get the file extension in lowercase

      // Check if the file extension is .exe
      if (fileExtension === 'exe') {
        errorMessage = 'Error: .exe files are not allowed.';
        break; // Exit loop once we find a .exe file
      }
    }

    if (errorMessage) {
      $('#sp_err').text('.exe file not allowed');
      hasError = 1;
    } else {
      $('#sp_err').text(''); // Clear error if valid
    }


    if (hasError == 1) {
      return false;
    } else {
      return true;
    }
  }

  function taskFunctionEdit(task_id) { //alert("11");
    // Make an AJAX request to fetch the task details
    //alert(task_id);
    $.ajax({
      url: '<?= base_url("lead/getTaskDetails"); ?>', // Replace with the correct endpoint
      type: 'POST',
      data: {
        task_id: task_id
      },
      dataType: 'json',
      success: function(response) {
        console.log('response found', response);

        if (response.success) {
          var taskData = response.data[0]; // Accessing the first object in the data array
          // console.log('record fund',taskData);
          $('#edit_task_id').val(taskData.task_id);
          $('#edit_subject').val(taskData.subject);
          $('#edit_start_date').val(taskData.start_date);
          $('#edit_due_date').val(taskData.due_date);
          $('#edit_priority').val(taskData.priority);
          $('#edit_task_description').val(taskData.task_description);
          $("#saved_attachment").val(taskData.task_file);
          if (!taskData.task_file || taskData.task_file.trim() === '') {
            $('#err6').text('No file attached yet.');
          }

          let savedAttachments = taskData.task_file ? taskData.task_file.split(',') : [];

          let attachmentsHtml = '';
          if (savedAttachments.length > 0) {
            savedAttachments.forEach((file) => {
              attachmentsHtml += `
                    <li>${file} 
                        <button type="button" class="remove-attachment" data-file="${file}" data-taskid="${taskData.task_id}">
                            ❌ 
                        </button>
                    </li>`;
            });
          } else {
            attachmentsHtml = '<li>No attachments available.</li>';
          }

          $('#saved_attachments_list').html(attachmentsHtml);

          $('#edittaskModal').modal('show');
        } else {
          alert(response.message); // Show an error message if something goes wrong
        }
      },
      error: function() {
        alert('Error fetching task details.');
      },
    });
  }

  function validate_edit_task(ele) { //alert("11");
    //hide_message_box(ele);
    var hasError = 0;
    var subject = $("#edit_subject").val();
    var start_date = $("#edit_start_date").val();
    var due_date = $('#edit_due_date').val();

    var priority = $("#edit_priority").val();
    var fileInput = $("#special_attachment")[0];
    var files = fileInput.files;


    if (subject.trim() == '') {
      // showError("Please enter  project name", " project_name");
      $('#esubject_err').text('Please enter subject');
      hasError = 1;
    } else {
      $('#esubject_err').text(''); // Clear error if valid
    }

    if (start_date.trim() == '') {
      //showError("Please enter project code", "project_code");
      $('#estdt_err').text('Please select start_date');
      hasError = 1;
    } else {
      $('#estdt_err').text(''); // Clear error if valid
    }
    // alert("3");
    //else { changeError("project_code"); }
    if (due_date.trim() == '') {
      //showError("Please enter project_type_id", "project_type_id"); 
      $('#edudt_err').text('Please select due date');
      hasError = 1;
    } else {
      $('#edudt_err').text(''); // Clear error if valid
    }


    if (priority.trim() == '') {
      //showError("Please enter project_type_id", "project_type_id"); 
      $('#epriority_err').text('Please select priority');
      hasError = 1;
    } else {
      $('#epriority_err').text(''); // Clear error if valid
    }

    var errorMessage = ''; // Initialize an empty error message

    // Loop through the files to check their extensions
    for (var i = 0; i < files.length; i++) {
      var fileName = files[i].name;
      var fileExtension = fileName.split('.').pop().toLowerCase(); // Get the file extension in lowercase

      // Check if the file extension is .exe
      if (fileExtension === 'exe') {
        errorMessage = 'Error: .exe files are not allowed.';
        break; // Exit loop once we find a .exe file
      }
    }

    if (errorMessage) {
      $('#err6').text('.exe file not allowed');
      hasError = 1;
    } else {
      $('#err6').text(''); // Clear error if valid
    }


    if (hasError == 1) {
      return false;
    } else {
      return true;
    }
  }

  $(document).on('click', '.remove-attachment', function() { //alert("11");
    let fileName = $(this).data('file');
    let taskId = $(this).data('taskid');
    let listItem = $(this).closest('li');

    if (confirm(`Are you sure you want to delete ${fileName}?`)) {
      // Remove the file name from the hidden field (saved_attachment)
      var savedAttachments = $('#saved_attachment').val().split(','); // Get current saved attachments
      var updatedAttachments = savedAttachments.filter(function(file) {
        return file !== fileName; // Remove the clicked file
      });
      $('#saved_attachment').val(updatedAttachments.join(','));

      // Remove the file from the displayed list in the modal
      listItem.remove();

      // Optionally update any error message or text
      if (updatedAttachments.length === 0) {
        $('#err6').text('No file attached yet.');
      }
    }
  });

  function taskFunctionDelete(id) {
    var result = confirm("Are you sure want to delete task ?");
    if (result) {

      var task_id = id;
      var lead_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
      //alert(lead_id);
      $("#overlay").fadeIn(300);
      var form_data = new FormData();
      form_data.append('task_id', task_id);
      form_data.append('lead_id', lead_id);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('lead/delete_task'); ?>",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        //cache: false,
        success: function(response) {
          setTimeout(function() {
            location.reload();
          }, 1000);

        }
      });
    }
  }

  $("#add_lead_files").on('click', function() {
    var file = document.getElementById("lead_files").files[0];
    var lead_id = '<?php echo $this->uri->segment(2); ?>';
    $("#overlay").fadeIn(300);
    var form_data = new FormData();
    form_data.append('file', file);
    form_data.append('lead_id', lead_id);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('lead/add_files'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      cache: false,
      success: function(response) {
        setTimeout(function() {
          location.reload();
        }, 5000);

      }
    });

  });

  function validate_add_reminder(ele) { //alert("11");
    //hide_message_box(ele);
    var hasError = 0;
    var reminder_date = $("#reminder_date").val();
    var set_reminder_to = $("#set_reminder_to").val();
    var reminder_description = $('#reminder_description').val().trim();;
    // alert(reminder_description);
    if (reminder_date.trim() == '') {
      // showError("Please enter  project name", " project_name");
      $('#set_reminder_date_msg').text('Please enter reminder date');
      hasError = 1;
    } else {
      $('#set_reminder_date_msg').text(''); // Clear error if valid
    }

    if (set_reminder_to.trim() == '') {
      //showError("Please enter project code", "project_code");
      $('#set_reminder_to_msg').text('Please select name');
      hasError = 1;
    } else {
      $('#set_reminder_to_msg').text(''); // Clear error if valid
    }
    // alert("3");
    //else { changeError("project_code"); }
    if (reminder_description == '') {
      $("#errlb").text("Please enter the reminder description");
      //showError("Please enter project_type_id", "project_type_id"); 
      // $('#description_msg').text('Please enter the reminder description');
      hasError = 1;
    } else {
      $('#errlb').text(''); // Clear error if valid
    }

    if (hasError == 1) {
      return false;
    } else {
      return true;
    }
  }

  function validate_edit_reminder(ele) { //alert("11");
    //hide_message_box(ele);
    var hasError = 0;
    var reminder_date = $("#edit_reminder_date").val();
    var set_reminder_to = $("#edit_set_reminder_to").val();
    var reminder_description = $('#edit_reminder_description').val().trim();;
    // alert(reminder_description);
    if (reminder_date.trim() == '') {
      // showError("Please enter  project name", " project_name");
      $('#e_set_reminder_date_msg').text('Please enter reminder date');
      hasError = 1;
    } else {
      $('#e_set_reminder_date_msg').text(''); // Clear error if valid
    }

    if (set_reminder_to.trim() == '') {
      //showError("Please enter project code", "project_code");
      $('#e_set_reminder_to_msg').text('Please select name');
      hasError = 1;
    } else {
      $('#e_set_reminder_to_msg').text(''); // Clear error if valid
    }
    // alert("3");
    //else { changeError("project_code"); }
    if (reminder_description == '') {
      $("#e_errlb").text("Please enter the reminder description");
      //showError("Please enter project_type_id", "project_type_id"); 
      // $('#description_msg').text('Please enter the reminder description');
      hasError = 1;
    } else {
      $('#e_errlb').text(''); // Clear error if valid
    }

    if (hasError == 1) {
      return false;
    } else {
      return true;
    }
  }

  function reminderFunctionEdit(reminder_id) { //alert("11");
    // Make an AJAX request to fetch the task details
    // alert(reminder_id);
    $.ajax({
      url: '<?= base_url("lead/getReminderDetails"); ?>', // Replace with the correct endpoint
      type: 'POST',
      data: {
        reminder_id: reminder_id
      },
      dataType: 'json',
      success: function(response) {
        console.log('response found', response);

        if (response.success) {
          var reminderData = response.data[0]; // Accessing the first object in the data array
          // console.log('record fund',taskData);
          $('#edit_reminder_id').val(reminderData.reminder_id);
          $('#edit_reminder_date').val(reminderData.reminder_date);
          $('#edit_set_reminder_to').val(reminderData.reminder_to);
          $('#edit_reminder_description').val(reminderData.reminder_description);
          if (reminderData.send_email_reminder === 'on') {
            $('#esend_email_reminder').prop('checked', true);
          } else {
            $('#esend_email_reminder').prop('checked', false);
          }


          $('#EditReminderModal').modal('show');
        } else {
          alert(response.message); // Show an error message if something goes wrong
        }
      },
      error: function() {
        alert('Error fetching task details.');
      },
    });
  }

  function reminderFunctionDelete(id) {
    var result = confirm("Are you sure want to delete reminder ?");
    if (result) {

      var reminder_id = id;
      var lead_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
      $("#overlay").fadeIn(300);
      var form_data = new FormData();
      form_data.append('reminder_id', reminder_id);
      form_data.append('lead_id', lead_id);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('lead/delete_reminder'); ?>",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        //cache: false,
        success: function(response) {
          setTimeout(function() {
            location.reload();
          }, 1000);

        }
      });
    }
  }

  function validate_add_note(ele) { //alert("11");
    //hide_message_box(ele);
    var hasError = 0;
    var note_msg = $("#note_msg").val();



    if (note_msg == '') {
      $("#note_err").text("Please enter the note");

      hasError = 1;
    } else {
      $('#note_error').text(''); // Clear error if valid
    }

    if (hasError == 1) {
      return false;
    } else {
      return true;
    }
  }

  function validate_edit_note(ele) { //alert("11");
    //hide_message_box(ele);
    var hasError = 0;
    var note_msg = $("#edit_note_msg").val();



    if (note_msg == '') {
      $("#edit_note_err").text("Please enter the note");

      hasError = 1;
    } else {
      $('#edit_note_error').text(''); // Clear error if valid
    }

    if (hasError == 1) {
      return false;
    } else {
      return true;
    }
  }

  // function validate_add_attachment(form) {
  //     var fileInputs = document.querySelectorAll('input[name="file_covering[]"]');

  //     var hasFile = false;

  //     // Loop through file inputs to check if any file is selected
  //     fileInputs.forEach(function(input) {
  //         if (input.files.length > 0) {
  //             hasFile = true;
  //         }
  //     });

  //     if (!hasFile) {
  //       $("#att_err").text("Please add at least one attachment before submitting.");
  //         return false; // Prevent form submission
  //     }
  //     else{
  //       $("#att_err").text('');
  //       return true; // Allow form submission if at least one file is selected
  //     }

  // }

  // function validate_add_attachment(form) {alert("111");
  //     var fileInputs = document.querySelectorAll('input[name="file_covering[]"]');
  //     var hasFile = false;
  //     var invalidFile = false;

  //     // Loop through file inputs to check if any file is selected
  //     fileInputs.forEach(function(input) {
  //         if (input.files.length > 0) {
  //             hasFile = true;
  //             // Loop through selected files
  //             Array.from(input.files).forEach(function(file) {
  //                 var fileName = file.name.toLowerCase();
  //                 if (fileName.endsWith('.exe')) {
  //                     invalidFile = true;
  //                 }
  //             });
  //         }
  //     });

  //     if (!hasFile) {
  //         $("#att_err").text("Please add at least one attachment before submitting.");
  //         return false; // Prevent form submission
  //     } else if (invalidFile) {
  //         $("#att_err").text("Executable (.exe) files are not allowed.");
  //         return false; // Prevent form submission
  //     } else {
  //         $("#att_err").text('');
  //         return true; // Allow form submission if valid
  //     }
  // }

  function validate_add_attachment(form) {
    var fileInputs = document.querySelectorAll('input[name="file_covering[]"]');
    var hasFile = false;
    var invalidFile = false;

    // Loop through file inputs to check if any file is selected
    fileInputs.forEach(function(input) {
      if (input.files.length > 0) {
        hasFile = true;
        // Check each selected file
        for (var i = 0; i < input.files.length; i++) {
          var fileName = input.files[i].name.toLowerCase();
          if (fileName.endsWith('.exe')) {
            invalidFile = true;
            break; // Stop checking further if an invalid file is found
          }
        }
      }
    });

    if (invalidFile) {
      $("#att_err1").text("Executable (.exe) files are not allowed.");
      return false; // Prevent form submission
    }

    if (!hasFile) {
      $("#att_err1").text("Please add at least one attachment before submitting.");
      return false; // Prevent form submission
    }

    $("#att_err1").text(''); // Clear any previous error messages
    return true; // Allow form submission if valid
  }

  function validate_edit_attachment(form) {
    var fileInputs = document.querySelectorAll('input[name="edit_file_covering[]"]');
    var hasFile = false;
    var invalidFile = false;

    // Loop through file inputs to check if any file is selected
    fileInputs.forEach(function(input) {
      if (input.files.length > 0) {
        hasFile = true;
        // Check each selected file
        for (var i = 0; i < input.files.length; i++) {
          var fileName = input.files[i].name.toLowerCase();
          if (fileName.endsWith('.exe')) {
            invalidFile = true;
            break; // Stop checking further if an invalid file is found
          }
        }
      }
    });

    if (invalidFile) {
      $("#edit_att_err1").text("Executable (.exe) files are not allowed.");
      return false; // Prevent form submission
    }

    if (!hasFile) {
      $("#edit_att_err1").text("Please add at least one attachment before submitting.");
      return false; // Prevent form submission
    }

    $("#edit_att_err1").text(''); // Clear any previous error messages
    return true; // Allow form submission if valid
  }


  function filesFunctionEdit(attachment_id) { //alert("11");
    // Make an AJAX request to fetch the task details
    //alert(task_id);
    $.ajax({
      url: '<?= base_url("lead/getAttachmentDetails"); ?>', // Replace with the correct endpoint
      type: 'POST',
      data: {
        attachment_id: attachment_id
      },
      dataType: 'json',
      success: function(response) {
        console.log('response found', response);

        if (response.success) {
          var taskData = response.data[0]; // Accessing the first object in the data array
          // console.log('record fund',taskData);
          $('#edit_attachment_id').val(taskData.attachment_id);

          $("#saved_file_attachment").val(taskData.attachment_files);
          if (!taskData.attachment_files || taskData.attachment_files.trim() === '') {
            $('#att_err').text('No file attached yet.');
          }

          let savedAttachments = taskData.attachment_files ? taskData.attachment_files.split(',') : [];

          let attachmentsHtml = '';
          if (savedAttachments.length > 0) {
            savedAttachments.forEach((file) => {
              attachmentsHtml += `
                    <li>
                        <img src="<?php echo base_url('uploads/lead/attachment/') ?>${file}" style="width:20%;" class="pdf-icon" />
                       
                    </li>`;
            });
          } else {
            attachmentsHtml = '<li>No attachments available.</li>';
          }

          $('#saved_file_attachments_list').html(attachmentsHtml);

          $('#editattachmentModal').modal('show');
        } else {
          alert(response.message); // Show an error message if something goes wrong
        }
      },
      error: function() {
        alert('Error fetching task details.');
      },
    });
  }

  // <button type="button" class="remove_file_attachment" data-file="${file}" data-taskid="${taskData.attachment_id}">
  //                           ❌ 
  //                       </button>
  
  $(document).on('click', '.remove_file_attachment', function() { //alert("11");
    let fileName = $(this).data('file');
    let taskattachmentId = $(this).data('taskid');
    let listItem = $(this).closest('li');

    // var form_data = new FormData();
    // form_data.append('reminder_id', taskattachmentId);
    // form_data.append('lead_id', lead_id);
    
    if (confirm(`Are you sure you want to delete ${fileName}?`)) {
      // Remove the file name from the hidden field (saved_attachment)
      var savedAttachments = $('#saved_file_attachment').val().split(','); // Get current saved attachments
      var updatedAttachments = savedAttachments.filter(function(file) {
        return file !== fileName; // Remove the clicked file
      });
      $('#saved_file_attachment').val(updatedAttachments.join(','));

      // Remove the file from the displayed list in the modal
      listItem.remove();

      // $.ajax({
      //   type: "POST",
      //   url: "<?php echo base_url('Lead/delete_attachment'); ?>",
      //   dataType: 'text',
      //   cache: false,
      //   contentType: false,
      //   processData: false,
      //   data: form_data,
      //   //cache: false,
      //   success: function(response) {
      //     setTimeout(function() {
      //       location.reload();
      //     }, 1000);

      //   }
      // });

      // Optionally update any error message or text
      if (updatedAttachments.length === 0) {
        $('#att_err').text('No file attached yet.');
      }
    }
  });

  function filesFunctionDelete(id) {
    var result = confirm("Are you sure want to delete attachment ?");
    if (result) {

      var attachment_id = id;
      var lead_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
      //alert(lead_id);
      $("#overlay").fadeIn(300);
      var form_data = new FormData();
      form_data.append('attachment_id', attachment_id);
      form_data.append('lead_id', lead_id);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('lead/delete_attachment'); ?>",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        //cache: false,
        success: function(response) {
          setTimeout(function() {
            location.reload();
          }, 1000);

        }
      });
    }
  }

  function noteFunctionEdit(note_id) { //alert("11");
    // $('#editnoteModal').modal('show');
    // Make an AJAX request to fetch the task details
    // alert(note_id);
    $.ajax({
      url: '<?= base_url("lead/getNoteDetails"); ?>', // Replace with the correct endpoint
      type: 'POST',
      data: {
        note_id: note_id
      },
      dataType: 'json',
      success: function(response) {
        console.log('response found', response);

        if (response.success) {
          var taskData = response.data[0]; // Accessing the first object in the data array
          // console.log('record fund',taskData);
          // alert(taskData.note_msg);

          $('#edit_note_id').val(taskData.note_id);
          $('#edit_note_msg').val(taskData.note_msg);

          $('#editnoteModal').modal('show');
        } else {
          alert(response.message); // Show an error message if something goes wrong
        }
      },
      error: function() {
        alert('Error fetching task details.');
      },
    });
  }

  $('#updateLeadStatusBtn').click(function() {
    var lead_id = <?php echo $leads[0]['lead_id']; ?>; // Get lead ID dynamically
    var lead_status_id = $('#lead_status_id').val(); // Get selected status
    //alert("111"); alert(lead_id); alert(lead_status_id);
    $.ajax({
      url: "<?php echo base_url('lead/update_Leadstatus'); ?>", // Update this to your actual endpoint
      type: "POST",
      data: {
        lead_id: lead_id,
        lead_status_id: lead_status_id
      },
      success: function(response) {
        var data = JSON.parse(response);
        if (data.status === "success") {
          alert("Lead status updated successfully!");

          // Update status text on page without reloading
          $('span[data-bs-target="#leadStatusModal"]').text($("#lead_status_id option:selected").text());

          // Close the modal
          $('#leadStatusModal').modal('hide');
          // Fix modal not closing properly
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        } else {
          alert("Error updating status. Try again!");
        }
      },
      error: function() {
        alert("Something went wrong!");
      }
    });
  });

  $('#updateLeadModeBtn').click(function() {
    var lead_id = <?php echo $leads[0]['lead_id']; ?>; // Get lead ID dynamically
    var lead_mode_id = $('#lead_mode_id').val(); // Get selected status
    //alert("111"); alert(lead_id); alert(lead_status_id);
    $.ajax({
      url: "<?php echo base_url('lead/update_Leadmode'); ?>", // Update this to your actual endpoint
      type: "POST",
      data: {
        lead_id: lead_id,
        lead_mode_id: lead_mode_id
      },
      success: function(response) {
        var data = JSON.parse(response);
        if (data.status === "success") {
          alert("Lead mode updated successfully!");

          // Update status text on page without reloading
          $('span[data-bs-target="#leadModeModal"]').text($("#lead_mode_id option:selected").text());

          // Close the modal
          $('#leadModeModal').modal('hide');
          // Fix modal not closing properly
          $('.modal-backdrop').remove();
          $('body').removeClass('modal-open');
        } else {
          alert("Error updating mode. Try again!");
        }
      },
      error: function() {
        alert("Something went wrong!");
      }
    });
  });
</script>


<script type="text/javascript">
  function add_attachement_sheet() {

    var table = document.getElementById("add_attachment").getElementsByTagName('tbody')[0];

    var row = table.insertRow(table.rows.length); // Create a new row

    var cell1 = row.insertCell(0); // ID
    cell1.innerHTML = table.rows.length; // Auto-increment ID

    var cell2 = row.insertCell(1); // File type input
    cell2.innerHTML = `<input type="file" onchange="previewImage1(event, ${coverCount})" accept="image/*, application/pdf" name="file_covering[]" class="form-control" id="covering">`;

    var cell3 = row.insertCell(2); // Image preview
    cell3.innerHTML = '<img id="imagePreview1${coverCount}" style="width: 125px; border-radius: 20%; height: 125px">';

    var cell4 = row.insertCell(3); // Remove button
    cell4.innerHTML = `<div class="form-group">
                        <button type="button" class="btn btn-danger" onclick="removeBannerCovering(${table.rows.length - 1})">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>`;

  }

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
                  function previewImage1(event, id) {
                    var reader = new FileReader();
                    var file = event.target.files[0];
                    reader.onload = function(e) {
                      // Set the image preview to the selected file
                      document.getElementById('imagePreview1' + id).src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                    // Set the image preview to the selected file

                  }

  function removeBannerCovering(rowIndex) {
    var table = document.getElementById("add_attachment").getElementsByTagName('tbody')[0];
    table.deleteRow(rowIndex);
  }

  function praposalFunctionDelete(id) {
    var result = confirm("Are you sure want to delete proposal ?");
    if (result) {
      var lp_id = id;
      var lead_id = '<?php echo $this->uri->segment(2); ?>';
      $("#overlay").fadeIn(300);
      var form_data = new FormData();
      form_data.append('lp_id', lp_id);
      form_data.append('lead_id', lead_id);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('lead/delete_praposal'); ?>",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        //cache: false,
        success: function(response) {
          setTimeout(function() {
            location.reload();
          }, 1000);

        }
      });
    }
  }

  $('.view-details-btn').on('click', function() { //alert("11");
    var targetModal = $(this).data('target'); // Get the modal ID from data-target
    $(targetModal).modal('show'); // Manually show the modal
  });

  // Close modal manually when clicking close buttons
  $('.modal').on('click', '.close, .btn-secondary', function() {
    $(this).closest('.modal').modal('hide');
  });

  $("#btnfilter").click(function() {


    var from_date = $('#from_date').val();
    var to_date = $('#to_date').val();
    var lp_id = $('#lp_id').val();
    //var status=$('#status').val();
    //alert(from_date); alert(to_date);
    if (from_date == '' && to_date == '' && lp_id == '') {

      // alert('Please Select any of this.');
      $('#err_msg').text('Please enter atlest any of this');
      return false;
    } else {
      $('#err_mag').text('');
    }


    var form_data = new FormData();
    form_data.append('from_date', from_date);
    form_data.append('to_date', to_date);
    form_data.append('lp_id', lp_id);
    // form_data.append('status',status);
    //  alert(form_data);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('lead/quotationfilter_data'); ?>",
      dataType: 'html',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function(data) {
        console.log(data);
        //  $('#quotation_list').DataTable().destroy();
        $('#quotation_records').html(data);
        // $('#quotation_list').DataTable();

      }
    });

  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    let startDateInput = document.getElementById("start_date");
    let dueDateInput = document.getElementById("due_date");

    function updateDueDateMin() {
      let selectedStartDate = startDateInput.value;

      if (selectedStartDate) {
        // Set min attribute of due date to start date
        dueDateInput.min = selectedStartDate;

        // Reset due date if it's before the start date
        if (dueDateInput.value < dueDateInput.min) {
          dueDateInput.value = dueDateInput.min;
        }
      }
    }

    // Initialize min value when page loads
    updateDueDateMin();

    // Update min value when start date changes
    startDateInput.addEventListener("change", updateDueDateMin);
  });


  // function loadRemarks() {
  //     $.ajax({
  //        // url: "fetch_remarks.php",
  //         url: "<?php echo base_url('lead/fetch_remarks'); ?>",
  //         method: "GET",
  //         success: function (data) {
  //             $("#remarks_panel").html(data);
  //         }
  //     });
  // }

  function loadRemarks() {
    var lead_id = $("#lead_id").val();
    $.ajax({
      url: "<?php echo base_url('lead/fetch_remarks'); ?>", // Backend URL for fetching remarks
      method: "POST",
      data: {
        lead_id: lead_id
      },
      success: function(data) {
        // Insert the fetched remarks into the 'remarks_messages' div
        $("#remarks_messages").html(data);
      },
      error: function(xhr, status, error) {
        // Handle any errors (optional)
        console.error("Error fetching remarks:", error);
      }
    });
  }

  $("#submit_remark").click(function() {
    var lead_id = $("#lead_id").val();

    var remark = $("#remark").val();
    //alert(lead_id); alert(remark);
    if (remark.trim() === "") {
      alert("Please enter a remark");
      return;
    }

    $.ajax({
      //url: "save_remark.php",
      url: "<?php echo base_url('lead/save_remark'); ?>",
      method: "POST",
      data: {
        lead_id: lead_id,
        remark: remark
      },
      success: function(response) {
        console.log('response', response);
        $("#remark").val("");
        loadRemarks();
      }
    });
  });

  loadRemarks();
  setInterval(loadRemarks, 60000); // Refresh every 5 seconds
</script>




<!--footer --> <?php include_once('footer.php') ?>