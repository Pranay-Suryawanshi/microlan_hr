<style type="text/css"></style>

<script>
  function restrictToNumbers(event) {
      const input = event.target;
      const value = input.value;
      input.value = value.replace(/[^0-9]/g, ''); // Remove non-numeric characters
  }
</script>

<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Employee</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit Employee</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <!--    <div class="btn-group"><a href="add-new-template.php"><button type="button" class="btn btn-primary">Add New Template</button></a></div> -->
        </div>
      </div>

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

      <div class="card ">
        <div class="card-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true"> Personal Info </a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                aria-controls="profile" aria-selected="false">Address</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                aria-controls="contact" aria-selected="false">Education</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="key-point-tab" data-bs-toggle="tab" href="#key-point" role="tab"
                aria-controls="key-point" aria-selected="false">Experience</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="commercial-tab" data-bs-toggle="tab" href="#commercial" role="tab"
                aria-controls="commercial" aria-selected="false">Bank Account</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="term-and-condtion-tab" data-bs-toggle="tab" href="#term-and-condtion" role="tab"
                aria-controls="term-and-condtion" aria-selected="false">Document</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="attachment-tab" data-bs-toggle="tab" href="#attachment" role="tab"
                aria-controls="attachment" aria-selected="false">Salary</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="signature-tab" data-bs-toggle="tab" href="#signature" role="tab"
                aria-controls="signature" aria-selected="false">Leave</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="social-media-tab" data-bs-toggle="tab" href="#social-media" role="tab"
                aria-controls="social-media" aria-selected="false"> Social Media</a>
            </li>
          </ul>
          <div class="tab-content p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <!--breadcrumb-->

                <!--end breadcrumb-->
                <div class="user-profile-page">
                  <div class="card radius-15">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 col-lg-7 border-right">
                          <div class="d-md-flex align-items-center">
                            <div class="mb-md-0 mb-3">
                              <?php
                                if(empty($user[0]['profile_photo']))
                                {
                              ?>
                                  <img src="<?php echo base_url();?>assets/images/user.png" class="rounded-circle shadow" width="130"
                                    height="130" alt="" />
                              <?php
                                }
                                else
                                {
                              ?>
                                  <img src="<?php echo base_url();?>upload/profile/<?php echo $user[0]['profile_photo'];?>" class="rounded-circle shadow" width="130"
                                    height="130" alt="" />
                              <?php
                                }
                              ?>
                            </div>
                            <div class="ms-md-4 flex-grow-1">
                              <div class="d-flex align-items-center mb-1">
                                <h4 class="mb-0"><?php echo $user[0]['user_name'];?></h4>
                              </div>

                              <?php
                                if(empty($user[0]['des_name']))
                                {
                              ?>
                                  <p class="mb-0 text-muted">-</p>
                              <?php
                                }
                                else
                                {
                              ?>
                                  <p class="mb-0 text-muted"><?php echo $user[0]['des_name'];?></p>
                              <?php
                                }
                              ?>
                              
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-5">
                          <table class="table table-sm table-borderless mt-md-0 mt-3">
                            <tbody>
                              <tr>
                                <th>Email address:</th>
                                <td>
                                  <?php
                                    if(empty($user[0]['email']))
                                    {
                                  ?>
                                      -
                                  <?php
                                    }
                                    else
                                    {
                                  ?>
                                      <?php echo $user[0]['email'];?>
                                  <?php
                                    }
                                  ?>
                                </td>
                              </tr>
                              <tr>
                                <th>Phone</th>
                                <td>
                                  <?php
                                    if(empty($user[0]['contact_no']))
                                    {
                                  ?>
                                      -
                                  <?php
                                    }
                                    else
                                    {
                                  ?>
                                      <?php echo $user[0]['contact_no'];?>
                                  <?php
                                    }
                                  ?>
                                </td>
                              </tr>

                              <tr>
                                <th>Years experience:</th>
                                <td>
                                  <!-- <?php
                                    if(empty($user[0]['contact_no']))
                                    {
                                  ?>
                                      -
                                  <?php
                                    }
                                    else
                                    {
                                  ?>
                                      <?php echo $user[0]['contact_no'];?>
                                  <?php
                                    }
                                  ?> -->
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="mb-3 mb-lg-0">
                            <a class="btn btn-circle btn-secondary" href="javascript:void(0);"><i
                                class="fa fa-facebook"></i></a>
                            <a class="btn btn-circle btn-secondary" href="javascript:void(0);"><i
                                class="fa fa-twitter"></i></a>
                            <a class="btn btn-circle btn-secondary" href="javascript:void(0);"><i
                                class="fa fa-skype"></i></a>
                            <a class="btn btn-circle btn-secondary" href="javascript:void(0);"><i
                                class="fa fa-google"></i></a>
                          </div>
                        </div>
                      </div>
                      <!--end row-->
                      <div class="row mt-5">
                        <div class="col-sm-12">
                          <div class="card shadow-none border mb-0 radius-15">
                            <div class="card-body">
                            <form class="row"  action="<?php echo base_url();?>update-emp-details" method="post"
                              enctype="multipart/form-data" novalidate="novalidate" >
                              <div class="row">

                                <input type="hidden" class="form-control" id="op_user_id" name="op_user_id" value="<?php echo $user_id;?>">

                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                    <label for="addressLine1">Employee PIN <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="emp_pin" name="emp_pin" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Employee Name <span class="text-danger">*</span</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user[0]['user_name']?>" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Blood Group</label>
                                    <input type="text" class="form-control" id="blood" name="blood" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Gender <span class="text-danger">*</span</label>
                                    <input type="text" class="form-control" id="gender" name="gender" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Date Of Birth <span class="text-danger">*</span</label>
                                    <input type="date" class="form-control" name="dob" id="dob" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Contact Number <span class="text-danger">*</span</label>
                                    <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $user[0]['contact_no'];?>" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                  <label for="role_id">User Designation</label><span class="text-danger">*</span>
                                  <select class="form-control" name="designation_id" id="designation_id">
                                      <option value="">Select Designation</option>
                                      <?php foreach ($designationlist as $designation) { ?>
                                              <option value="<?php echo $designation['id'] ?>"
                                                  <?php if($designation['id'] == $user[0]['designation_id']) {echo "selected";}?>>
                                                  <?php echo $designation['des_name']; ?></option>
                                          <?php } ?>
                                  </select>
                                  </div>
                                </div>
                                <div class="col-sm-3 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Date Of Joining <span class="text-danger">*</span</label>
                                    <input type="date" class="form-control" id="joindate" name="joindate" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Contract End Date</label>
                                    <input type="date" class="form-control" id="leavedate" name="leavedate" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Email <span class="text-danger">*</span</label>
                                    <input type="email" class="form-control" id="name" name="email" value="<?php echo $user[0]['email'];?>" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-4 mt-3">
                                  <div class="form-group">
                                    <label for="companyName">Profile Image</label>
                                    <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*" placeholder=" " required>
                                  </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                  <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>














            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="card-info">

                    <div class="card-body">

                        <div class="col-sm-12">
                          <h5 class="card-title">Permanent Contact Information </h5>
                        </div>
                        
                        <form action="<?php echo base_url();?>save-emp-address" method="POST">
                          <input type="hidden" name="emp_id" value="<?php echo $user_id;?>" />
                          <input type="hidden" name="type" value="Permanent" />
                          <div class="row">
                            <div class="col-sm-12 mt-3">
                              <div class="form-group">
                                <label for="addressLine1">Address</label>
                                <textarea class="form-control" name="address"><?php if(!empty($permanent_address[0]['address'])){echo $permanent_address[0]['address'];}?></textarea>
                              </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                              <div class="form-group">
                                <label for="companyName">City</label>
                                <input type="text" class="form-control" name="city" id="city" value="<?php if(!empty($permanent_address[0]['city'])){echo $permanent_address[0]['city'];}?>" required>
                              </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                              <div class="form-group">
                                <label for="companyName">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="<?php if(!empty($permanent_address[0]['country'])){echo $permanent_address[0]['country'];}?>" required>
                              </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                              <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                          </div>
                        </form>

                        <br>
                        <hr>

                        <div class="col-sm-12">
                          <h5 class="card-title">Present Contact Information </h5>
                        </div>

                        <form action="<?php echo base_url();?>save-emp-address" method="POST">
                          <input type="hidden" name="emp_id" value="<?php echo $user_id;?>" />
                          <input type="hidden" name="type" value="Present" />
                          <div class="row">
                            <div class="col-sm-12 mt-3">
                                <div class="form-group">
                                  <label for="addressLine1">Address</label>
                                  <textarea class="form-control" name="address"><?php if(!empty($present_address[0]['address'])){echo $present_address[0]['address'];}?></textarea>
                                </div>
                              </div>
                              <div class="col-sm-6 mt-3">
                                <div class="form-group">
                                  <label for="companyName">City</label>
                                  <input type="text" class="form-control" name="city" id="city" value="<?php if(!empty($present_address[0]['city'])){echo $present_address[0]['city'];}?>" required>
                                </div>
                              </div>
                              <div class="col-sm-6 mt-3">
                                <div class="form-group">
                                  <label for="companyName">Country</label>
                                  <input type="text" class="form-control" id="country" name="country" value="<?php if(!empty($present_address[0]['country'])){echo $present_address[0]['country'];}?>" required>
                                </div>
                              </div>
                              <div class="col-sm-12 mt-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                              </div>
                          </div>
                        </form>

                    </div>
                    
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>





            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="row">

                <div class="col-sm-12">
                  <div class="table-responsive ">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID </th>
                          <th>Degree name</th>
                          <th>Institute </th>
                          <th>Result </th>
                          <th>year</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID </th>
                          <th>Degree name</th>
                          <th>Institute </th>
                          <th>Result </th>
                          <th>year</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php
                          if(!empty($education))
                          {
                            $k=1;
                            foreach($education as $val)
                            {
                        ?>
                              <tr>
                                <td><?php echo $k++;?></td>
                                <td><?php echo $val['degree_name'];?></td>
                                <td><?php echo $val['institute'];?></td>
                                <td><?php echo $val['result'];?></td>
                                <td><?php echo $val['year'];?>  </td>
                                <td class="jsgrid-align-center ">
                                  <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light education"
                                    data-id="22">
                                    <i class="fa fa-edit"></i> Edit
                                  </a>
                                  <a href="javascript:void(0);" data-toggle="modal" 
                                    data-target="#deleteEducation<?php echo $val['id'];?>" class="btn btn-sm btn-danger waves-effect waves-light">
                                      <i class="fa fa-trash"></i> Delete
                                  </a>
                                </td>
                              </tr>

                              <!-- Delete Education Status Modal -->
                              <div id="deleteEducation<?php echo $val['id'];?>" class="modal fade">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Delete Employee Education</h5>
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                      <form action="<?php echo base_url();?>delete-emp-education" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="edt_id" value="<?php echo $val['id'];?>" />
                                        <input type="hidden" name="emp_id" value="<?php echo $user_id;?>" />

                                        <div class="modal-body">
                                            <h5>Are you sure, You want to update this Franchise?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-secondary add_time_sheet">Update Franchise Status</a>
                                        </div>
                                      </form>
                                  </div>
                                </div>
                              </div>
                        <?php
                            }
                          }
                        ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                <form action="<?php echo base_url();?>save-emp-education" method="POST">
                  <div class="row">
                  <input type="hidden" name="emp_id" value="<?php echo $user_id;?>" />
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Degree Name</label>
                            <input type="text" class="form-control" id="degree_name" name="degree_name" placeholder=" " required>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Institute Name</label>
                            <input type="text" class="form-control" id="institute" name="institute" placeholder=" " required>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Result</label>
                            <input type="text" class="form-control" id="result" name="result" placeholder=" " required>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Passing Year</label>
                            <input type="text" class="form-control" id="year" name="year" oninput="restrictToNumbers(event)" maxlength="4" placeholder=" " required>
                          </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                          <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>






            <div class="tab-pane fade" id="key-point" role="tabpanel" aria-labelledby="key-point-tab">
              <div class="row">

                <div class="col-sm-12">
                  <div class="table-responsive ">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                      cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>ID </th>
                          <th>Company name</th>
                          <th>Position </th>
                          <th>Work Duration </th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID </th>
                          <th>Company name</th>
                          <th>Position </th>
                          <th>Work Duration </th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody>
                      <?php
                          if(!empty($experience))
                          {
                            $k=1;
                            foreach($experience as $val)
                            {
                        ?>
                              <tr>
                                <td><?php echo $k++;?></td>
                                <td><?php echo $val['exp_company'];?></td>
                                <td><?php echo $val['exp_com_position'];?></td>
                                <td><?php echo $val['exp_com_address'];?></td>
                                <td><?php echo $val['exp_workduration'];?></td>
                                <td class="jsgrid-align-center ">
                                  <a href="#" title="Edit" class="btn btn-sm btn-info waves-effect waves-light experience"
                                    data-id="21">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <a href="#" title="Delete" class="btn btn-sm btn-info waves-effect waves-light deletexp"
                                    data-id="21">
                                    <i class="fa fa-trash"></i>
                                  </a>
                                </td>
                              </tr>
                        <?php
                            }
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <form action="<?php echo base_url();?>save-emp-experience" method="POST">
                    <div class="row">
                    <input type="hidden" name="emp_id" value="<?php echo $user_id;?>" />
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="companyName">Company Name</label>
                          <input type="text" class="form-control" id="exp_company" name="exp_company" placeholder=" " required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="companyName">Position</label>
                          <input type="text" class="form-control" id="exp_com_position" name="exp_com_position" placeholder=" " required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="companyName">Address</label>
                          <input type="text" class="form-control" id="exp_com_address" name="exp_com_address" placeholder=" " required>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-group">
                          <label for="companyName">Working Duration</label>
                          <input type="text" class="form-control" id="exp_workduration" name="exp_workduration" placeholder=" " required>
                        </div>
                      </div>

                      <div class="col-sm-12 mt-3">
                        <button class="btn btn-primary" type="submit">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="card-info">

                    <!-- form start -->
                    <div class="card-body">
                      <form action="<?php echo base_url();?>update-emp-bank-details" method="POST">
                        <input type="hidden" name="op_user_id" value="<?php echo $user_id;?>" />
                        <div class="row">
                          <div class="col-sm-4 mt-3">
                            <div class="form-group">
                              <label for="companyName">Bank Holder Name</label>
                              <input type="text" class="form-control" id="account_name" name="account_name" value="<?php if(!empty($user[0]['account_name'])){echo $user[0]['account_name'];}?>" placeholder=" " required>
                            </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                            <div class="form-group">
                              <label for="companyName">Bank Name</label>
                              <input type="text" class="form-control" id="bank_name" name="bank_name" value="<?php if(!empty($user[0]['bank_name'])){echo $user[0]['bank_name'];}?>" placeholder=" " required>
                            </div>
                          </div>
                          <div class="col-sm-4 mt-3">
                            <div class="form-group">
                              <label for="companyName">Branch Name</label>
                              <input type="text" class="form-control" id="branch_name" name="branch_name" value="<?php if(!empty($user[0]['branch_name'])){echo $user[0]['branch_name'];}?>" placeholder=" " required>
                            </div>
                          </div>
                          <div class="col-sm-6 mt-3">
                            <div class="form-group">
                              <label for="companyName">Bank Account Number</label>
                              <input type="text" class="form-control" id="account_no" name="account_no" value="<?php if(!empty($user[0]['account_no'])){echo $user[0]['account_no'];}?>" placeholder=" " required>
                            </div>
                          </div>
                          <div class="col-sm-6 mt-3">
                            <div class="form-group">
                              <label for="companyName">Bank Account Type</label>
                              <input type="text" class="form-control" id="account_type" name="account_type" value="<?php if(!empty($user[0]['account_type'])){echo $user[0]['account_type'];}?>" placeholder=" " required>
                            </div>
                          </div>

                          <div class="col-sm-12 mt-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                          </div>


                        </div>
                      </form>
                    </div>
                   
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>





            <div class="tab-pane fade" id="term-and-condtion" role="tabpanel" aria-labelledby="term-and-condtion-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="  card-info">

                    <div class="card-body">
                        <form action="<?php echo base_url();?>save-emp-documents" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="emp_id" value="<?php echo $user_id;?>" />
                          <input type="hidden" name="document_row" id="document_row" value="1" />
                          <div class="row">

                            <div class="col-md-12 attachment_div" style="margin-top: 20px">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="feature_table_covering">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>File</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>1</td>
                                      <td>
                                        <input type="file" name="file_covering[1]" class="form-control" id="covering" accept="image/*, application/pdf">
                                      </td>
                                      <td>
                                        <!-- <div class="form-group">
                                          <button type="button" class="btn btn-danger" onclick="removeBannerCovering(0)">
                                            <i class="fa fa-minus"></i>
                                          </button>
                                        </div> -->
                                      </td>
                                    </tr>
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                      <td colspan="4">
                                        <div class="form-group">
                                          <button type="button" class="btn btn-success" onclick="addFeatureCovering()">
                                            <i class="fa fa-plus"></i>
                                          </button>
                                        </div>
                                      </td>
                                    </tr>
                                  </tfoot>
                                </table>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-sm-12 mt-3">
                            <button class="btn btn-primary" type="submit">Save</button>
                          </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <!--    <div class="card-footer"><button type="submit" class="btn btn-info float-right">Submit</button></div> -->
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>
            </div>




            <div class="tab-pane fade" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
              <div class="row">
                <h5 class="card-title">Basic Slary</h5>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Salary Type</label>
                    <select class="form-control " required="">
                      <option value="4"> Hourly </option>
                      <option value="3"> hhfgf </option>
                      <option value="1"> Hourly </option>
                      <option value="4"> Hourly </option>
                      <option value="2"> Monthly </option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Total Salary</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Basic</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">House Rent</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Medical</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Conveyance</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-12 mt-3">
                  <h5>Deduction</h5>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Bima</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Tax</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Provident Fund</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4 mt-3">
                  <div class="form-group">
                    <label for="companyName">Others</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>


                <div class="col-sm-12 mt-3">
                  <button type="submit" class="btn btn-primary btn-block">Add Salary</button>
                </div>
              </div>
            </div>



            <div class="tab-pane fade" id="signature" role="tabpanel" aria-labelledby="signature-tab">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="companyName">Leave Type</label>
                    <select class="form-control">
                      <option value="">Select Here...</option>
                      <option value="9"> Leave without Pay </option>
                      <option value="8"> Optional Leave </option>
                      <option value="7"> Public Holiday </option>
                      <option value="5"> Earned leave </option>
                      <option value="4"> Paternal Leave </option>
                      <option value="3"> Maternity Leave </option>
                      <option value="2"> Sick Leave </option>
                      <option value="1"> Casual Leave </option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="companyName">Day</label>
                    <input type="text" class="form-control" id="name" placeholder=" " required>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="companyName">Year</label>
                    <select class="form-control">
                      <option value="">Select Here...</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12 mt-3">
                  <h5 class="card-title"> Leave/2024</h5>
                  <table class="display nowrap table table-hover table-striped table-bordered" width="50%">
                    <thead>
                      <tr class="m-t-50">
                        <th>Type</th>
                        <th>Dayout/Day</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Public Holiday</td>
                        <td>0/1111 </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-12 mt-3">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>
            </div>


            <div class="tab-pane fade" id="social-media" role="tabpanel" aria-labelledby="social-media-tab">
              <!-- <form class="row" id="socialMediaForm" action="<?php echo base_url(); ?>add-emp-social-media"
                method="post" enctype="multipart/form-data"> -->
              <form class="row" action="<?php echo base_url(); ?>add-emp-social-media" method="post"
                enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="facebook">Facebook </label>
                      <input type="text" class="form-control" id="facebook" name="facebook" 
                      value="<?php if (!empty($socialmedia->facebook)) echo $socialmedia->facebook ?>"
                          placeholder="www.facebook.com">
                        <input type="hidden" name="op_user_id" value="<?php echo $user[0]['op_user_id'] ?>">
                      <input type="hidden" name="id" value="<?php if (!empty($socialmedia->id))
                        echo $socialmedia->id ?>">
                        <small class="text-danger" id="facebookError"></small>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter"
                        value="<?php if (!empty($socialmedia->twitter)) echo $socialmedia->twitter ?>"
                        placeholder="www.twitter.com"
                        >
                        <small class="text-danger" id="twitterError"></small>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="google">Google +</label>
                        <input type="text" class="form-control" id="google" name="google" 
                        value="<?php if (!empty($socialmedia->google_plus)) echo $socialmedia->google_plus ?>"
                        placeholder="www.google.com">
                        <small class="text-danger" id="googleError"></small>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="skype">Skype</label>
                        <input type="text" class="form-control" id="skype" name="skype" 
                        value="<?php if (!empty($socialmedia->skype_id)) echo $socialmedia->skype_id ?>"
                        placeholder="www.skype.com">
                        <small class="text-danger" id="skypeError"></small>
                      </div>
                    </div>

                    <div class="col-sm-12 mt-3">
                      <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                  </div>
                </form>
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
  <script type="text/javascript">
      // $("#document_row").val(1);
    function addFeatureCovering() {
      var row_no = $('.row_no_covering').length + 2;
      // alert(row_no);
      var tr = '<tr class="row_no_covering" id="row_no_covering_' + row_no + '">' +
        '<td>' + row_no + '</td>' +
        '<td>' +
        ' <input type="file" class="form-control" name="file_covering[' + row_no + ']"  id="task_file" accept="image/*, application/pdf">' +
        '</td>' + '<td>' + '<div class="form-group">' + '<button type="button" class="btn btn-danger" onclick="removeBannerCovering(' + row_no + ')"><i class="fa fa-minus"></i></button>' +
        '</div>' +
        '</td>' +
        '</tr>';
      $('#feature_table_covering tbody').append(tr);
      $("#document_row").val(row_no);
      row_no++;
    }

    function removeBannerCovering(row_no) {
      $("#row_no_covering_" + row_no).remove();
    }
  </script>
  <script>
    document.getElementById("socialMediaForm").addEventListener("submit", function (e) {
      // Clear previous errors
      document.querySelectorAll("small.text-danger").forEach(error => error.textContent = "");

      let isValid = true;

      // Validate Facebook
      const facebook = document.getElementById("facebook").value.trim();
      if (!facebook) {
        document.getElementById("facebookError").textContent = "Facebook field cannot be empty.";
        isValid = false;
      }

      // Validate Twitter
      const twitter = document.getElementById("twitter").value.trim();
      if (!twitter) {
        document.getElementById("twitterError").textContent = "Twitter field cannot be empty.";
        isValid = false;
      }

      // Validate Google+
      const google = document.getElementById("google").value.trim();
      if (!google) {
        document.getElementById("googleError").textContent = "Google+ field cannot be empty.";
        isValid = false;
      }

      // Validate Skype
      const skype = document.getElementById("skype").value.trim();
      if (!skype) {
        document.getElementById("skypeError").textContent = "Skype field cannot be empty.";
        isValid = false;
      }

      // Prevent form submission if validation fails
      if (!isValid) {
        e.preventDefault();
      }
    });
  </script>