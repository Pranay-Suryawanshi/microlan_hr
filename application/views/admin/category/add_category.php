<!--sidebar-wrapper-->
<?php include_once('header.php') ?>
<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<style>
  .checked {
    color: orange;
  }

  .dropbtn {
    background-color: #3498db;
    color: white;
    padding: 5px;
    font-size: 14px;
    border: none;
    cursor: pointer;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown-content a {
    color: black;
    padding: 6px 8px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
  }
</style>

<!--page-wrapper-->
<div class="page-wrapper">
  <div class="page-content-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Category</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
          </nav>
        </div>
      </div>
      <!--end breadcrumb-->

      <div class="card">
        <div class="card-body">
          <?php if($this->session->flashdata('msg')) { ?>
            <div class="alert alert-<?php echo $this->session->flashdata('class');?> alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $this->session->flashdata('msg'); ?>
            </div>
          <?php } ?>

          <form class="form-horizontal" method="post" action="<?php echo base_url();?>submit-category" onsubmit="return validate_add_category(this);" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12 col-lg-12 border-right">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="companyName">Service Category <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder=" ">
                    <span id="cat_err" style="font-weight: bold;color:red;"></span><br>
                  </div>
                </div>
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <h5 class="font-weight-bold">Category List</h5>
            </div>
            <hr>
            <div class="col-sm-12">
              <div class="table-responsive">
                <table id="category_list" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Sr No.</th>
                      <th>Service Category ID</th>
                      <th>Service Category Name</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; foreach($category_list as $category) { ?>
                      <tr>
                        <td>
                          <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url(); ?>editcat/<?php echo base64_encode($category['category_id']); ?>" class="btn btn-sm btn-info" style="color:white"><i class="fa fa-edit"></i> Edit</a>
                            </div>
                          </div>
                        </td>
                        <td><?php echo ++$i;?></td>
                        <td><?php echo $category['category_id'];?></td>
                        <td><?php echo $category['category_name'];?></td>
                        <td>
                          <?php if($category['status'] =='0'){ ?>
                            <a href='javascript:void(0);' onclick='update_category_status(this,1,"<?php echo $category['category_id'];?>")'>
                              <span style='color:red;font-weight:700'>DE-ACTIVE</span>
                            </a>
                          <?php } else { ?>
                            <a href='javascript:void(0);' onclick='update_category_status(this,0,"<?php echo $category['category_id'];?>")'>
                              <span style='color:green;font-weight:700'>ACTIVE</span>
                            </a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Action</th>
                      <th>Sr No.</th>
                      <th>Service Category ID</th>
                      <th>Service Category Name</th>
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
</div>

<!--start overlay-->
<div class="overlay toggle-btn-mobile"></div>
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Initialize DataTables -->
<script>
  $(document).ready(function() {
    $('#category_list').DataTable({
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true
    });
  });

  function validate_add_category(ele) {
    var hasError = 0;
    var category_name = $("#category_name").val();

    if (category_name.trim() == '') {
      $('#cat_err').text('Please enter category name');
      hasError = 1;
    } else {
      $('#cat_err').text('');
    }

    return hasError == 0;
  }

  function update_category_status(ele, status, category_id) {
    if (confirm("Are you sure, to update the selected category's status ?")) {
      var data = {
        product: {
          category_id: category_id,
          status: status
        }
      };

      $.ajax({
        dataType: 'json',
        type: "POST",
        url: '<?= base_url("category/update_category_active_deactive_status"); ?>',
        data: {'jsonObj': JSON.stringify(data)},
        cache: false,
        success: function(res) {
          alert(res.msg);
          location.reload();
        }
      });
    }
    return false;
  }
</script>

<!--footer-->
<?php include_once('footer.php') ?>
