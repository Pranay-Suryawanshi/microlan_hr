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
        <div class="alert alert-<?php echo $this->session->flashdata('class') ?> alert-dismissible">
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
        <div class="breadcrumb-title pe-3">Customer List</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Customer List</li>
            </ol>
          </nav>
        </div>
        <!--  <div class="ms-auto">
          <div class="btn-group">
            <a href="<?php echo base_url(); ?>add-customer"> <button type="button" class="btn btn-primary">Add New Customer</button> </a>

          </div>
        </div> -->
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="btn-group" style="float: right">
                <a href="<?php echo base_url(); ?>add-customer"> <button type="button" class="btn btn-primary">Add New Customer</button> </a>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Company Name</th>
                      <th>Contact Person</th>
                      <th>GSTN Number</th>
                      <th>Phone</th>
                      <th>City </th>
                      <th>State</th>
                      <th>Website</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if (!empty($customer_list)) {
                      $i = 1;
                      foreach ($customer_list as $key => $value) { ?>
                        <tr>

                          
                          <td class="">
                            <div class="dropdown">
                              <button class="dropbtn">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </button>
                              <div class="dropdown-content">
                                <a href="<?php echo base_url() . 'edit-customer/' . base64_encode($value['cust_id']) ?>"
                                  style=" background-color: #007bff;color:white">
                                  <i class="fa fa-edit"></i> Edit </a>
                              </div>
                            </div>
                          </td>
                          
                          <td><?php echo $i++; ?></td>

                          <td><?php echo $value['company']; ?></td>
                          <td><?php echo $value['contact_person']; ?></td>
                          <td><?php echo $value['vat_number']; ?></td>
                          <td><?php echo $value['phone']; ?></td>
                          <td><?php echo $value['city']; ?></td>
                          <td><?php echo $value['state']; ?></td>
                          <td><?php echo $value['website']; ?></td>
                          <td><?php if ($value['status'] == 1) {
                                $status = 0;
                              ?>
                              <a onclick="showCustomModal('<?php echo base_url('status-customer/' . $value['cust_id'] . '/' . $status); ?>', 'Deactive')"
                                style='cursor: pointer;'>
                                <span style='color:green;font-weight:700'>Active</span>
                              </a>
                            <?php } else {
                                $status = 1;
                            ?>
                              <a onclick="showCustomModal('<?php echo base_url('status-customer/' . $value['cust_id'] . '/' . $status); ?>', 'Active')"
                                style='cursor: pointer;'>
                                <span style='color:red;font-weight:700'>Deactive</span>
                              </a>
                            <?php } ?>
                          </td>



                        </tr>
                    <?php }
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>Sr. No.</th>
                      <th>Company Name</th>
                      <th>Contact Person</th>
                      <th>GSTN Number</th>
                      <th>Phone</th>
                      <th>City </th>
                      <th>State</th>
                      <th>Website</th>
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