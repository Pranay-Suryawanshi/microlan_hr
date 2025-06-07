
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
        <div class="breadcrumb-title pe-3">Employee List</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Employee List</li>
            </ol>
          </nav>
        </div>
       
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>User Name</th>
                      <th>Email Id</th>
                      <th>Contact No</th>

                      <th>Role </th>
                      <th>User ID</th>
                      <th>Designation</th>
                      <th>Status</th>
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
                                <a href="<?php echo base_url() . 'edit-emp/' . base64_encode($value['op_user_id']) ?>"
                                  style=" background-color: #007bff;color:white">
                                  <i class="fa fa-edit"></i> Edit </a>
                              </div>
                            </div>
                          </td>
                          <td><?php echo ++$i; ?></td>
                          <td><?php echo $value['user_name']; ?></td>
                          <td><?php echo $value['email']; ?></td>
                          <td><?php echo $value['contact_no']; ?></td>
                          <td><?php echo $value['role_name']; ?></td>
                          <td><?php echo $value['user_id']; ?></td>
                          <td><?php echo $value['des_name']; ?></td>
                         
                          <td><?php if ($value['status'] == 1) {
                            ?>
                              <a 
                                style='cursor: pointer;'>
                                <span style='color:green;font-weight:700'>Active</span>
                              </a>
                            <?php } else {

                            ?>
                              <a 
                                style='cursor: pointer;'>
                                <span style='color:red;font-weight:700'>Deactive</span>
                              </a>
                            <?php } ?>
                          </td>
                         

                        </tr>
                      <?php }
                    } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>User Name</th>
                      <th>Email Id</th>
                      <th>Contact No</th>

                      <th>Role </th>
                      <th>User ID</th>
                      <th>Designation</th>
                      <th>Status</th>
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
