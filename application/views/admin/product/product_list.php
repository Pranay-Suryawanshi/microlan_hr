<!-- header -->
<?php include_once('header.php') ?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
  .checked {
    color: orange;
  }
</style>

<!-- Page Wrapper -->
<div class="page-wrapper">
  <div class="page-content-wrapper">
    <div class="page-content">

      <!-- Breadcrumb -->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Service List</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Service List</li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Flash Message -->
      <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('msg'); ?>
        </div>
      <?php } ?>

      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="font-weight-bold">Service List</h5>
            </div>
            <hr>
            <div class="col-sm-12">
              <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr No.</th>
                      <th>Service Id</th>
                      <th>Service Name</th>
                      <th>Size of Unit</th>
                      <th>Category</th>
                      <th>Unit</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($product_list1)) {
                      foreach ($product_list1 as $k => $product) {
                    ?>
                        <tr>
                          <td>
                            <div class="dropdown">
                              <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                              <div class="dropdown-content">
                                <a href="<?php echo base_url(); ?>edit-product/<?php echo base64_encode($product['product_id']); ?>"
                                   class="btn btn-sm btn-info" style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                                </a>
                              </div>
                            </div>
                          </td>
                          <td><?php echo $k + 1; ?></td>
                          <td><?php echo $product['product_id']; ?></td>
                          <td><?php echo $product['product_name']; ?></td>
                          <td>
                            <?php $pack_size = explode(',', $product['unit_size']); echo $pack_size[0]; ?>
                          </td>
                          <td><?php echo $product['category_id']; ?></td>
                          <td><?php echo $product['unit_name']; ?></td>
                          <td>
                            <?php if ($product['status'] == '0') { ?>
                              <a href='javascript:void(0);' onclick='update_product_status(this,1,"<?php echo $product['product_id']; ?>")'>
                                <span style='color:red;font-weight:700'>DE-ACTIVE</span>
                              </a>
                            <?php } else { ?>
                              <a href='javascript:void(0);' onclick='update_product_status(this,0,"<?php echo $product['product_id']; ?>")'>
                                <span style='color:green;font-weight:700'>ACTIVE</span>
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
                      <th>Sr No.</th>
                      <th>Service Id</th>
                      <th>Service Name</th>
                      <th>Size of Unit</th>
                      <th>Category</th>
                      <th>Unit</th>
                      <th>Status</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div> <!-- End page-content -->
  </div>
</div>

<!-- Overlay & Back To Top -->
<div class="overlay toggle-btn-mobile"></div>
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

<!-- jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Script -->
<script>
  $(document).ready(function() {
    // if (!$.fn.DataTable.isDataTable('#example2')) {
    //   $('#example2').DataTable({
    //     responsive: true,
    //     autoWidth: false,
    //     ordering: true,
    //     paging: true,
    //     searching: true
    //   });
    // }
  });

  function update_product_status(ele, status, product_id) {
    if (confirm("Are you sure, to update the selected service status ?")) {
      var data = { product: { product_id: product_id, status: status } };
      $.ajax({
        dataType: 'json',
        type: "POST",
        url: "<?php echo base_url('product/update_product_active_deactive_status'); ?>",
        data: { 'jsonObj': JSON.stringify(data) },
        cache: false,
        success: function(res) {
          alert(res.msg);
          if (res.status == '1') {
            window.location.reload();
          }
        }
      });
    }
    return false;
  }

  function deleteproduct(id) {
    $.ajax({
      url: '<?php echo base_url(); ?>delete-product',
      type: 'POST',
      data: { "id": id },
      dataType: 'json',
      success: function(data) {
        if (data.error == '0') {
          $('#response_msg').html('<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong>' + data.message + '</div>');
        } else {
          $('#response_msg').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Oops!</strong>' + data.message + '</div>');
        }
        setTimeout(function() {
          location.reload();
        }, 1500);
      }
    });
  }
</script>

<!-- footer -->
<?php include_once('footer.php') ?>
