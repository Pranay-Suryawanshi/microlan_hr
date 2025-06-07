<!--sidebar-wrapper-->
<?php include_once('header.php') ?>

<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Service</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-info" style="padding: 20px">
                <form id="basicForm" action="<?php echo base_url(); ?>update-product" method="post" enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate" onsubmit="return validate_edit_product(this);">
                  <div class="row">
                    <div class="col-sm-4  mt-3">
                      <div class="form-group">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $product_data[0]['product_id'] ?>">
                        <label>Enter Service Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="product_name" id="product_name" value="<?php echo $product_data[0]['product_name']; ?>" class="form-control">
                        <span id="serviceName_msg" style="color:red;"></span>
                      </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>Select Category <span class="text-danger">*</span>
                            </label>
                            <select id="category_id" name="category_id" class="form-control category_id cladd" onchange="getSubCategory(this.value)">

                            </select>
                            <span id="category_msg" style="color:red;"></span>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-top: 22px;">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>Select Sub-Category</label>
                            <select class="form-control" onchange="getChildCategory()" id="subcategory" name="sub_category_id">
                              <option value="">Select Sub Category</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal11" style="margin-top: 22px;">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>Select Child-Category</label>
                            <select class="form-control" id="child_category_id" name="child_category_id">
                              <option value="">Select child category</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal111" style="margin-top: 22px;">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4 mt-3">
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>HSN/SAC Code <span class="text-danger">*</span>
                            </label>
                            <select name="hsn_code" id="hsn_code" class="form-control">
                            </select>
                            <span id="hsnCode_msg" style="color:red;"></span>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal12" style="margin-top: 22px;">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>Select Unit <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" id="product_unit" name="unit_id">
                            </select>
                            <span id="productUnit_msg" style="color:red;"></span>

                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal13" style="margin-top: 22px;">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <?php $row_no = 0; ?>
                    <div class="col-sm-12 mt-3">
                      <div class="table-responsive mt-3">
                      <table class="table table-bordered" id="feature_table">
                        <thead>
                          <tr>
                            <th>Size of Unit</th>
                            <th>MRP</th>
                            <th>Selling Rate</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $product_id = (int) $product_data[0]['product_id'];
                          $sql = "SELECT * FROM `product_details` WHERE `product_id` = $product_id";
                          $query = $this->db->query($sql);
                          $result = $query->result();
                          $count = $query->num_rows();
                          $i = 1;
                          foreach ($result as $row) {
                          ?>
                            <input type="hidden" name="pd_id[<?php echo $i; ?>]" value="<?php echo $row->product_details_id; ?>">
                            <tr class="row_no" id="row_no_<?php echo $i; ?>">
                              <td><input type="text" class="form-control" name="unit_size[<?php echo $i; ?>]" value="<?php echo $row->unit_size; ?>"></td>
                              <td><input type="number" class="form-control" name="mrp_rate[<?php echo $i; ?>]" value="<?php echo $row->mrp_rate; ?>"></td>
                              <td><input type="number" class="form-control" name="sale_price[<?php echo $i; ?>]" value="<?php echo $row->sale_price; ?>"></td>
                              <td><button type="button" class="btn btn-danger" onclick="delete_product_detail(this,<?php echo $product_id; ?>,<?php echo $row->product_details_id; ?>)">
                                <i class="fa fa-trash"></i></button></td>
                            </tr>
                          <?php
                            $i++;
                          }
                          ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="5">
                              <button type="button" class="btn btn-success" onclick="addFeature()">
                                <i class="fa fa-plus"></i>
                              </button>
                            </td>
                          </tr>
                        </tfoot>
                      </table>

                      <!-- Move these inputs here -->
                      <input type="hidden" name="old_row_no" id="old_row_no" value="<?php echo $count; ?>">
                      <input type="hidden" name="row_no" id="row_no" value="<?php echo $row_no; ?>">

                        <span id="tbl_msg" style="color:red;"></span>
                      </div>
                    </div>

                    <div class="col-sm-12  mt-3">
                      <div class="form-group">
                        <label>Upload Product Image</label>
                        <input type="file" class="form-control" name="image_name" id="image_name" accept=".png,.jpg,.jpeg" multiple="">
                      </div>
                      <?php if (!empty($product_data[0]['image_name'])) {
                        $images = explode(',', $product_data[0]['image_name']); // Split images by comma
                        foreach ($images as $image) { ?>
                          <img src="<?php echo base_url(); ?>uploads/products/<?php echo trim($image); ?>" width="100" height="100">
                        <?php }
                      } else { ?>
                        <img src="<?php echo base_url(); ?>uploads/no-image.png" width="100" height="100">
                      <?php } ?>
                      <input type="hidden" name="image_name" value="<?php echo $product_data[0]['image_name'] ?>">

                      <div class="col-sm-12  mt-3">
                        <div class="form-group">
                          <label>Enter Product Description</label>
                          <textarea class="editor" class="form-control" name="description" id="product_description" style="    width: 100%;"><?php echo $product_data[0]['description']; ?></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12  mt-3">
                        <div class="form-group">
                          <label>Enter Product Terms & Conditions</label>
                          <textarea class="editor" class="form-control" name="terms_conditions" id="terms_conditions" style="    width: 100%;"><?php echo $product_data[0]['terms_conditions']; ?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="card-footer mt-3">
                      <button type="submit" class="btn btn-info">Submit</button>
                      <button type="reset" class="btn btn-default">Cancel</button>
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
<!--footer -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Category Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Enter category name</label>
                <input type="text" class="form-control" id="category_name">
                <span id="catname_msg"></span>
              </div>
            </div>

            <!-- <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for=""> Category Image</label>
             <input type="file" class="form-control" id=" " placeholder="" >
            </div>
          </div>-->

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_cat" onclick="add_catgry()">Save</button>
      </div>
    </div>
  </div>

</div>

<div class="modal fade" id="exampleModal11" tabindex="-1" aria-labelledby="exampleModal11Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sub Category Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="sub_msg"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Select category</label>
                <select class="form-control select2" id="category_id" name="category_id">
                  <option value="">Select category</option>
                  <?php if (isset($categpry_list) && !empty($categpry_list)) {
                    foreach ($categpry_list as $category_key => $category_value) { ?>
                      <option value="<?php echo $category_value['category_id']; ?>"><?php echo $category_value['category_name']; ?></option>
                  <?php }
                  } ?>
                </select>
                <span id="selectcatname_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="">Enter Sub category</label>
                <input type="text" class="form-control" name="sub_category_name" id="sub_category_name" placeholder="">
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_subcat" onclick="add_subcatgry()">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal111" tabindex="-1" aria-labelledby="exampleModal111Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Child Category Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="child_msg1"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Select category</label>
                <select class="form-control select2" id="categoryId" name="category_id" onchange="get_SubCategory(this.value)">
                  <option value="">Select category</option>
                  <?php if (isset($categpry_list) && !empty($categpry_list)) {
                    foreach ($categpry_list as $category_key => $category_value) { ?>
                      <option value="<?php echo $category_value['category_id']; ?>"><?php echo $category_value['category_name']; ?></option>
                  <?php }
                  } ?>
                </select>
                <span id="selectcatname_msg1" style="color:red;"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Select Sub category</label>
                <select class="form-control select2" id="sub_categoryId" name="sub_category_id">

                </select>
                <span id="selectsubcatname_msg1" style="color:red;"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="">Enter Child category</label>
                <input type="text" class="form-control" name="child_category_name" id="child_category_name1" placeholder="">
              </div>
              <span id="selectchildcatname_msg1" style="color:red;"></span>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_subcat" onclick="add_childcatgry()">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal12" tabindex="-1" aria-labelledby="exampleModal12Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">HSN Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg_hsn"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> HSN Code</label>
                <input type="text" class="form-control" id="hsn_code_m" placeholder="">
                <span id="hsn_code_m_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="">SGST(%)</label>
                <input type="text" class="form-control" id="sgst" placeholder="">
                <span id="sgst_msg"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="">CGST(%)</label>
                <input type="text" class="form-control" id="cgst" placeholder="">
                <span id="cgst_msg"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="">IGST(%)</label>
                <input type="text" class="form-control" id="igst" placeholder="">
                <span id="igst_msg"></span>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_hsn_code" onclick="add_hsnCode()">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal13" tabindex="-1" aria-labelledby="exampleModal13Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Unit Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg_unit"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Unit (i.e. Kg)</label>
                <input type="text" class="form-control" id="unit" placeholder="">
                <span id="unit_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="">Abbrivation (i.e. Kilogram)</label>
                <input type="text" class="form-control" id="abbrivation" placeholder="">
                <span id="abbrivation_msg"></span>
              </div>
            </div>

          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_unit" onclick="addUnit()">Save</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {
    $('#addFeatureBtn').off('click').on('click', function() {
        addFeature();
    });
});

function addFeature() {
    var row_no = parseInt($('#row_no').val());
    // alert(row_no);
    row_no++;

    var tr = '<tr class="row_no" id="row_no_' + row_no + '">' +
        '<td><input type="text" class="form-control" name="new_unit_size[' + row_no + ']"></td>' +
        '<td><input type="number" class="form-control" name="new_mrp_rate[' + row_no + ']"></td>' +
        '<td><input type="number" class="form-control" name="new_sale_price[' + row_no + ']"></td>' +
        '<td><button type="button" class="btn btn-danger" onclick="removeBanner(' + row_no + ')"><i class="fa fa-minus"></i></button></td>' +
        '</tr>';

    $('#feature_table tbody').append(tr);
    $('#row_no').val(row_no);
}


function removeBanner(row_no) {
    $("#row_no_" + row_no).remove();
}

</script>

<script>
  function delete_product_detail(ele, product_id, pd_id) {

    if (confirm("Are you sure, you want to delete this detail ?")) {
      var data = {};
      data.product = {};
      data.product.product_id = product_id;
      data.product.pd_id = pd_id;

      var q = JSON.stringify(data);

      $.ajax({
        dataType: 'json',
        type: "POST",
        url: "<?php echo base_url('Product/delete_product_detail'); ?>",
        data: {
          'jsonObj': q
        },
        cache: false,
        beforeSend: function() {
          //jQuery(".btn-quirk").text('Submiting.. Please wait.').prop('disabled', true);
        },
        success: function(res) {
          //jQuery(".btn-quirk").text('Submit').prop('disabled', false);
          if (res.status == '1') {
            alert(res.msg);
          } else { // Failed
            alert(res.msg);
          }
          location.reload();
        }
      });
    }

    return false;
  }

  $(document).ready(function() {

    getEditCategoryList();
    getEditSubCategoryList();
    getEditChildCategoryList();
    getEditHsnList();
    getEditUnitList();
    // $('#product_category,#subcategory,#product_type').select2();
    // Summernote
    $('#product_description,#terms_conditions').summernote({
      height: 50
    });
    //
    $('#expiry_date').datepicker({
      dateFormat: 'dd-mm-yy'
    });
  });

  function add_catgry() { //alert("11");
    var category_name = $('#category_name').val();
    if (category_name == '') {
      $('#catname_msg').text('Category name is required.');
      return false;

    } else {
      $('#catname_msg').text('');
    }

    var form_data = new FormData();
    form_data.append('category_name', category_name);

    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ajaxcategory'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function(response) {
        getCategoryList();
        getSubCategory();
        var res = JSON.parse(response);
        $('#msg').text(res.msg);
        $('#category_name').val('');
        setTimeout(function() {
          $('#msg').text('');
        }, 3000);
        $('#myModal').modal('hide');

      }
    });

  }

  // $(".add_subcat").click(function(){
  function add_subcatgry() {
    var category_id = $('#category_id').val();
    var sub_category_name = $('#sub_category_name').val();
    if (sub_category_name == '') {
      $('#sub_category_name').text('Sub Category name is required.');
      return false;

    } else {
      $('#subcatname_msg').text('');
    }
    var category_id = $('#category_id').val();
    if (category_id == '') {
      $('#selectcatname_msg').text('Category name is required.');
      return false;

    } else {
      $('#subcatname_msg').text('');
    }
    var form_data = new FormData();
    form_data.append('sub_category_name', sub_category_name);
    form_data.append('category_id', category_id);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ajaxsubcategory'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function(response) {
        console.log('subcst', response);
        getSubCategory();
        var res = JSON.parse(response);
        $('#sub_msg').text(res.msg);
        $('#subcategory_name').val('');
        setTimeout(function() {
          $('#sub_msg').text('');
        }, 3000);
        $('#subCategoryModal').modal('hide');

      }
    });
  }

  function add_hsnCode() {

    var hsn_code_m = $('#hsn_code_m').val();
    var sgst = $('#sgst').val();
    var cgst = $('#cgst').val();
    var igst = $('#igst').val();
    if (hsn_code_m == '') {
      $('#hsn_code_m_msg').text('HSN code is required.');
      return false;
    } else {

      $('#hsn_code_m_msg').text('');
    }
    if (sgst == '') {
      $('#sgst_msg').text('SGST is required.');
      return false;
    } else {

      $('#sgst_msg').text('');
    }
    if (cgst == '') {
      $('#cgst_msg').text('CGST is required.');
      return false;
    } else {

      $('#cgst_msg').text('');
    }
    if (igst == '') {
      $('#igst_msg').text('IGST is required.');
      return false;
    } else {

      $('#igst_msg').text('');
    }
    var form_data = new FormData();
    form_data.append('hsn_code', hsn_code_m);
    form_data.append('sgst', sgst);
    form_data.append('cgst', cgst);
    form_data.append('igst', igst);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ajaxhsn'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function(response) {
        getHsnList();
        var res = JSON.parse(response);
        $('#msg_hsn').text(res.msg);
        $('#hsn_code_m').val('');
        setTimeout(function() {
          $('#msg_hsn').text('');
        }, 3000);
        $('#myModalHSN').modal('hide');
      }
    });


  }

  function addUnit() {

    var unit = $('#unit').val();
    if (unit == '') {
      $('#unit_msg').text('Unit (i.e kg) is required.');
      return false;

    } else {
      $('#unit_msg').text('');
    }
    var abbrivation = $('#abbrivation').val();
    if (abbrivation == '') {
      $('#abbrivation_msg').text('Unit (i.e kilogram) is required.');
      return false;

    } else {
      $('#abbrivation_msg').text('');
    }
    var form_data = new FormData();
    form_data.append('unit_name', unit);
    form_data.append('abbrivation', abbrivation);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ajaxunit'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function(response) {
        getUnitList();
        var res = JSON.parse(response);
        $('#msg_unit').text(res.msg);
        $('#unit').val('');
        $('#abbrivation').val('');
        setTimeout(function() {
          $('#msg_unit').text('');
        }, 3000);
        $('#myModalUnit').modal('hide');
      }
    });

  }

  function getSubCategory() {
    var category_id = $('#category_id').val();

    var postData = {
      'category_id': category_id
    }

    $.post('<?php echo base_url('category/getSubCategory') ?>', postData, function(data) {
      var subcats = $.parseJSON(data);
      $('#select2-subcategory-container').html('Select Sub Category');
      $('#subcategory').html('');

      var html = '<option value="">Select Sub Category</option>';
      $.each(subcats, function(i, val) {
        html += '<option value="' + val.sub_category_id + '">' + val.sub_category_name + '</option>';
      })
      $('#subcategory').html(html);
    })

  }

  function getChildCategory() {
    var sub_category_id = $('#subcategory').val();
    var postData = {
      'sub_category_id': sub_category_id
    }

    $.post('<?php echo base_url('category/getChildCategory') ?>', postData, function(data) {
      var childcats = $.parseJSON(data);
      $('#select2-child_category_id-container').html('Select');
      $('#child_category_id').html('');

      var html = '<option value="">Select Child Category</option>';
      $.each(childcats, function(i, val) {
        html += '<option value="' + val.child_category_id + '">' + val.child_category_name + '</option>';
      })
      $('#child_category_id').html(html);
    })

  }

  function getCategoryList() {
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-category-list",
      data: {},
      beforeSend: function() {},
      success: function(res) {

        $("#category_id").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function getHsnList() {
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-hsn-list",
      data: {},
      beforeSend: function() {},
      success: function(res) {
        $("#hsn_code").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function getUnitList() {
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-unit-list",
      data: {},
      beforeSend: function() {},
      success: function(res) {
        $("#product_unit").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function getAddonList() {
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-addon-list",
      data: {},
      beforeSend: function() {},
      success: function(res) {
        $("#map_addon").html(res);
        $("#map_addon").multiselect('reload');
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function validate_edit_product(ele) {
    //hide_message_box(ele);

    var hasError = 0;
    var product_name = $("#product_name").val();
    //var product_type = $("#product_type").val();
    var product_category = $("#category_id option:selected").val();
    //var pack_size = $('#pack_size').val();
    //var sale_price = $('#sale_price').val();
    var hsn_code = $('#hsn_code option:selected').val();
    //var product_unit = $('#product_unit option:selected').val(); 

    if (product_name.trim() == '') { //alert("serice");
      $('#serviceName_msg').text('Please enter service name');
      hasError = 1;
    } else { //alert("ttt");
      $('#serviceName_msg').text(''); // Clear error if valid
    }

    if (product_category.trim() == '') { //alert("category");
      $('#category_msg').text('Please select category');
      hasError = 1;
    } else {
      $('#category_msg').text(''); // Clear error if valid
    }
    // alert("1");
    if (hsn_code.trim() == '') { //alert("hsn");
      $('#hsnCode_msg').text('Please select hsn code');
      hasError = 1;
    } else {
      $('#hsnCode_msg').text(''); // Clear error if valid
    }

    var rowCount = $('#feature_table tbody tr').length;
    var rowFilled = false; // Flag to check if at least one row is filled

    // $('#feature_table tbody tr').each(function () {
    //     var itemType = $(this).find('select[name^="item_type"]').val();
    //     var itemCategory = $(this).find('select[name^="item_category"]').val();
    //     var unitSize = $(this).find('input[name^="unit_size"]').val();
    //     var priceRange = $(this).find('input[name^="price_range"]').val();
    //     var avgRate = $(this).find('input[name^="avg_rate"]').val();

    //     // Check if at least one of the fields in a row is filled
    //     if (itemType || itemCategory || unitSize || priceRange || avgRate) {
    //         rowFilled = true;
    //         return false; // Exit the loop if one row is filled
    //     }
    // });

    // if (!rowFilled) {
    //     $('#tbl_msg').text('Please fill at least one row in the table');
    //     hasError = 1;
    // } else {
    //     $('#tbl_msg').text(''); // Clear error if at least one row is filled
    // }

    $('#feature_table tbody tr').each(function() {
      var rowError = 0; // Row-specific error flag

      var itemType = $(this).find('select[name^="item_type"]').val();
      var itemCategory = $(this).find('select[name^="item_category"]').val();
      var unitSize = $(this).find('input[name^="unit_size"]').val();
      var priceRange = $(this).find('input[name^="price_range"]').val();
      var avgRate = $(this).find('input[name^="avg_rate"]').val();

      // Validate each field in the row
      if (!itemType) {
        $(this).find('select[name^="item_type"]').next('.error_msg').remove();
        $(this).find('select[name^="item_type"]').after('<span class="error_msg text-danger">Required</span>');
        rowError = 1;
      } else {
        $(this).find('select[name^="item_type"]').next('.error_msg').remove();
      }

      if (!itemCategory) {
        $(this).find('select[name^="item_category"]').next('.error_msg').remove();
        $(this).find('select[name^="item_category"]').after('<span class="error_msg text-danger">Required</span>');
        rowError = 1;
      } else {
        $(this).find('select[name^="item_category"]').next('.error_msg').remove();
      }

      if (!unitSize.trim()) {
        $(this).find('input[name^="unit_size"]').next('.error_msg').remove();
        $(this).find('input[name^="unit_size"]').after('<span class="error_msg text-danger">Required</span>');
        rowError = 1;
      } else {
        $(this).find('input[name^="unit_size"]').next('.error_msg').remove();
      }

      if (!priceRange.trim()) {
        $(this).find('input[name^="price_range"]').next('.error_msg').remove();
        $(this).find('input[name^="price_range"]').after('<span class="error_msg text-danger">Required</span>');
        rowError = 1;
      } else {
        $(this).find('input[name^="price_range"]').next('.error_msg').remove();
      }

      if (!avgRate.trim()) {
        $(this).find('input[name^="avg_rate"]').next('.error_msg').remove();
        $(this).find('input[name^="avg_rate"]').after('<span class="error_msg text-danger">Required</span>');
        rowError = 1;
      } else {
        $(this).find('input[name^="avg_rate"]').next('.error_msg').remove();
      }

      // If at least one row is correctly filled, allow submission
      if (!rowError) {
        rowFilled = true;
      }
    });

    // Validate if at least one row is filled
    if (!rowFilled) {
      $('#tbl_msg').text('Please fill at least one complete row in the table');
      hasError = 1;
    } else {
      $('#tbl_msg').text('');
    }


    if (hasError == 1) { //alert("eror");
      return false;
    } else { //alert("no error");
      return true;
    }
  }

  /*--------------------------category------------------------*/
  if ($('input#category_id').length > 0) {
    $('input#category_id').typeahead({
      displayText: function(item) {
        return item.cat_name
      },
      afterSelect: function(item) {
        this.$element[0].value = item.cat_name;
        $("input#field-category_id").val(item.cat_id);
      },
      source: function(request, process) {
        $.ajax({
          url: "<?php echo base_url('ajax_cate'); ?>",
          data: {
            request: request
          },
          dataType: "json",
          type: "POST",
          success: function(data) {
            process(data)
          }
        })
      }
    });
  }

  /*--------------------------hsn------------------------*/
  if ($('input#hsn_code').length > 0) {
    $('input#hsn_code').typeahead({
      displayText: function(item) {
        return item.hsn_code
      },
      afterSelect: function(item) {
        this.$element[0].value = item.hsn_code;
        $("input#field-hsn_code").val(item.hsn_id);
      },
      source: function(request, process) {
        $.ajax({
          url: "<?php echo base_url('ajax_hsn'); ?>",
          data: {
            request: request
          },
          dataType: "json",
          type: "POST",
          success: function(data) {
            process(data)
          }
        })
      }
    });
  }

  /*--------------------------unit------------------------*/
  if ($('input#unit_id').length > 0) {
    $('input#unit_id').typeahead({
      displayText: function(item) {
        return item.unit_name
      },
      afterSelect: function(item) {
        this.$element[0].value = item.unit_name;
        $("input#field-unit_id").val(item.unit_id);
      },
      source: function(request, process) {
        $.ajax({
          url: "<?php echo base_url('ajax_unit'); ?>",
          data: {
            request: request
          },
          dataType: "json",
          type: "POST",
          success: function(data) {
            process(data)
          }
        })
      }
    });
  }

  function getEditCategoryList() {
    var product_id = $("#product_id").val();
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-edit-category-list",
      data: {
        product_id: product_id
      },
      beforeSend: function() {},
      success: function(res) {
        $("#category_id").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function getEditSubCategoryList() {
    var product_id = $("#product_id").val();
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-edit-subcategory-list",
      data: {
        product_id: product_id
      },
      beforeSend: function() {},
      success: function(res) {
        $("#subcategory").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function getEditChildCategoryList() {
    var product_id = $("#product_id").val();
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-edit-childcategory-list",
      data: {
        product_id: product_id
      },
      beforeSend: function() {},
      success: function(res) {
        $("#child_category_id").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function getEditHsnList() {
    var product_id = $("#product_id").val();
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-edit-hsn-list",
      data: {
        product_id: product_id
      },
      beforeSend: function() {},
      success: function(res) {
        $("#hsn_code").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });
  }

  function getEditUnitList() {
    var product_id = $("#product_id").val();
    jQuery.ajax({
      dataType: 'html',
      type: "POST",
      url: "<?php echo base_url(); ?>get-edit-unit-list",
      data: {
        product_id: product_id
      },
      beforeSend: function() {},
      success: function(res) {
        $("#product_unit").html(res);
      },
      error: function(error, message) {
        console.log(message);
      }
    });


  }

  function add_childcatgry() {

    var category_id = $('#categoryId').val();
    var sub_category_id = $('#sub_categoryId').val();
    var child_category_name = $('#child_category_name1').val();


    if (category_id == '') {
      $('#selectcatname_msg1').text('Category name is required.');

      return false;

    } else {
      $('#selectcatname_msg1').text('');
    }

    if (sub_category_id == '') {
      $('#selectsubcatname_msg1').text('Sub Category name is required.');
      return false;

    } else {
      $('#seelectsubcatname_msg1').text('');
    }

    if (child_category_name == '') {
      $('#selectchildcatname_msg1').text('Child Category name is required.');
      return false;

    } else {
      $('#selectchildcatname_msg1').text('');
    }


    var form_data = new FormData();
    form_data.append('child_category_name', child_category_name);
    form_data.append('category_id', category_id);
    form_data.append('sub_category_id', sub_category_id);
    $.ajax({
      type: "POST",
      url: "<?php echo base_url('ajaxchildcategory'); ?>",
      dataType: 'text',
      cache: false,
      contentType: false,
      processData: false,
      data: form_data,
      //cache: false,
      success: function(response) {
        console.log('subcst', response);
        getChildCategory();
        var res = JSON.parse(response);
        $('#child_msg1').text(res.msg);
        $('#child_category_name1').val('');
        setTimeout(function() {
          $('#child_msg1').text('');
        }, 3000);
        //  $('#exampleModal111').modal('hide');

      }
    });
  }

  function get_SubCategory(cat_id) {
    var category_id = cat_id;
    // alert(category_id);

    var postData = {
      'category_id': category_id
    }

    $.post('<?php echo base_url('category/getSubCategory') ?>', postData, function(data) {
      var subcats = $.parseJSON(data);
      $('#select2-subcategory-container').html('Select Sub Category');
      $('#sub_categoryId').html('');

      var html = '<option value="">Select Sub Category</option>';
      $.each(subcats, function(i, val) {
        html += '<option value="' + val.sub_category_id + '">' + val.sub_category_name + '</option>';
      })
      $('#sub_categoryId').html(html);
    })

  }
</script>

<!-- Include Summernote CSS and JS -->
<?php include_once('footer.php') ?>