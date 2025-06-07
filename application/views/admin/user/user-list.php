<style type="text/css">
  .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }

  .modal-content {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 50%;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
    transform: scale(0.9);
    animation: showModal 0.3s forwards;
  }

  .modal-actions {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    gap: 10px;
  }

  .btn-confirm {
    background: green;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-weight: bold;
  }

  .btn-cancel {
    background: red;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    font-weight: bold;
  }

  @keyframes showModal {
    to {
      transform: scale(1);
    }
  }
</style>
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
        <div class="breadcrumb-title pe-3"><?php echo $pagename; ?></div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><?php echo $pagename; ?></li>
            </ol>
          </nav>
        </div>
        <!--  <div class="ms-auto">
          <div class="btn-group">
            <a href="<?php echo base_url(); ?>add-user"> <button type="button" class="btn btn-primary">Add New User</button> </a>

          </div>
        </div> -->
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="btn-group" style="float: right">
                <a href="<?php echo base_url(); ?>add-user"> <button type="button" class="btn btn-primary">Add New User</button> </a>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>User Profile</th>
                      <th>User Name</th>
                      <th>Email Id</th>
                      <th>Contact No</th>
                      <th>Role </th>
                      <th>User ID</th>
                      <th>Designation</th>
                      <th>Punch In Time</th>
                      <th>Punch Out Time</th>
                      <th>Workign Hour</th>
                      <th>Status</th>
                      <th>Reset Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 0;
                    if (!empty($user_list)) {
                      foreach ($user_list as $key => $value) { ?>
                        <tr>
                          <td class="">
                            <div class="dropdown">
                              <button class="dropbtn">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </button>
                              <div class="dropdown-content">
                                <a href="<?php echo base_url() . 'edit-user/' . base64_encode($value['op_user_id']) ?>"
                                  style=" background-color: #007bff;color:white">
                                  <i class="fa fa-edit"></i> Edit </a>
                              </div>
                            </div>
                          </td>
                          <td><?php echo ++$i; ?></td>
                          <td>
                            <?php if (empty($value['profile_photo'])) { ?>
                              <img src="<?php echo base_url(); ?>assets/images/gallery/02.jpg"
                                id="imagePreview" style="width: 105px; border-radius: 20%; height: 105px">
                            <?php } else { ?>
                              <img src="<?php echo base_url(); ?>uploads/profile/<?php echo $value['profile_photo']; ?>"
                                id="imagePreview" style="width: 105px; border-radius: 20%; height: 105px">
                            <?php } ?>
                          </td>
                          <td><?php echo $value['user_name']; ?></td>
                          <td><?php echo $value['email']; ?></td>
                          <td><?php echo $value['contact_no']; ?></td>
                          <td><?php echo $value['role_name']; ?></td>
                          <td><?php echo $value['user_id']; ?></td>
                          <td><?php echo $value['des_name']; ?></td>
                          <td><?php echo $value['attendance_log_in_time']; ?></td>
                          <td><?php echo $value['attendance_log_out_time']; ?></td>
                          <td><?php echo $value['attendance_log_out_time']; ?></td>
                          <td><?php if ($value['status'] == 1) {
                              ?>
                              <a onclick="showCustomModal('<?php echo base_url() . 'deactive-user/' . base64_encode($value['op_user_id']) ?>', 'Deactive')"
                                style='cursor: pointer;'>
                                <span style='color:green;font-weight:700'>Active</span>
                              </a>
                            <?php } else {

                            ?>
                              <a onclick="showCustomModal('<?php echo base_url() . 'active-user/' . base64_encode($value['op_user_id']) ?>', 'Active')"
                                style='cursor: pointer;'>
                                <span style='color:red;font-weight:700'>Deactive</span>
                              </a>
                            <?php } ?>
                          </td>
                          <td>
                            <span>
                              <a data-toggle="tooltip" title="Reset password"
                                onclick="resetpassworduser('<?php echo $value['op_user_id']; ?>')"
                                style="cursor: pointer; color: blue; text-decoration: underline;">
                                <i class="fa fa-key"></i>
                              </a>
                            </span>
                          </td>

                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>User Profile</th>
                      <th>User Name</th>
                      <th>Email Id</th>
                      <th>Contact No</th>
                      <th>Role </th>
                      <th>User ID</th>
                      <th>Designation</th>
                      <th>Punch In Time</th>
                      <th>Punch Out Time</th>
                      <th>Workign Hour</th>
                      <th>Status</th>
                      <th>Reset Password</th>
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
<!-- Custom Modal -->
<div id="customModal" class="modal">
  <div class="modal-content">
    <h3>Confirmation</h3>
    <p id="modalMessage"></p>
    <div class="modal-actions">
      <button onclick="proceedAction()" class="btn-confirm">Yes</button>
      <button onclick="closeModal()" class="btn-cancel">No</button>
    </div>
  </div>
</div>
<!-- Custom Popup Modal for password -->
<div id="resetPasswordModal"
  style="display:none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 1000;">
  <div
    style="background: #fff; padding: 20px; border-radius: 8px; text-align: center; box-shadow: 0px 4px 10px rgba(0,0,0,0.3);">
    <h3>Reset Password</h3>
    <form id="resetPasswordForm" method="POST" action="<?php echo base_url(); ?>reset-password">
      <input type="hidden" id="op_user_id" name="op_user_id">
      <div style="margin-bottom: 15px;">
        <label for="new_password" style="display: block; margin-bottom: 5px;">Enter New Password:</label>
        <input type="password" id="new_password" name="new_password"
          style="padding: 8px; width: 100%; border: 1px solid #ccc; border-radius: 4px;">
        <span id="error_message" style="color: red; font-size: 12px; display: none;">Please enter a new password.</span>
      </div>
      <div style="display: flex; justify-content: space-between;">
        <button type="button" onclick="validateForm()"
          style="background-color: green; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Submit</button>
        <button type="button" onclick="closeModal()"
          style="background-color: red; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">Cancel</button>
      </div>
    </form>
  </div>
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
<script>
  function showCustomModal(actionUrl, status) {
    // Set the modal message
    document.getElementById('modalMessage').innerText = `Are you sure you want to change the status to ${status}?`;

    // Attach the URL to a global variable
    window.actionUrl = actionUrl;

    // Show the modal
    document.getElementById('customModal').style.display = 'flex';
  }

  function proceedAction() {
    // Redirect to the action URL
    if (window.actionUrl) {
      window.location.href = window.actionUrl;
    }
  }

  function closeModal() {
    // Hide the modal
    document.getElementById('customModal').style.display = 'none';
  }
</script>
<script>
  function resetpassworduser(opUserId) {
    // Set the hidden field with the user ID
    document.getElementById('op_user_id').value = opUserId;

    // Show the modal
    document.getElementById('resetPasswordModal').style.display = 'flex';
  }

  function closeModal() {
    // Hide the modal
    document.getElementById('resetPasswordModal').style.display = 'none';

    // Clear the error message
    document.getElementById('error_message').style.display = 'none';
    document.getElementById('new_password').value = '';
  }

  function validateForm() {
    const newPassword = document.getElementById('new_password').value;

    // Check if the password field is empty
    if (!newPassword.trim()) {
      document.getElementById('error_message').style.display = 'block';
    } else {
      // Hide the error message
      document.getElementById('error_message').style.display = 'none';

      // Submit the form
      document.getElementById('resetPasswordForm').submit();
    }
  }
</script>