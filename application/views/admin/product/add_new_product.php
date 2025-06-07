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
        <div class="breadcrumb-title pe-3">Add New Service</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add New Service</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-info" style="padding: 20px">
                <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>submit-product" onsubmit="return validate_add_product(this)" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-4  mt-3">
                      <div class="form-group">
                        <label>Enter Service Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" name="product_name" id="product_name" class="form-control">
                        <span id="serviceName_msg" style="color:red;"></span>
                      </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>Select Category <span class="text-danger">*</span>
                            </label>
                            <select id="category_id" name="category_id" class="form-control" onchange="getSubCategory()">
                            <option value="">Select Category</option>
                            <?php if (isset($category_data) && !empty($category_data)) {
                    foreach ($category_data as $category_key => $category_value) {
                  ?>
                      <option value="<?php echo $category_value['category_id']; ?>"><?php echo $category_value['category_name']; ?></option>
                  <?php }
                  }
                  ?>
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
                              <option value="">Select subcategory</option>
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
                    <?php $row_no = 1; ?>
                    <input type="hidden" name="row_no" id="row_no" value="<?php echo $row_no; ?>">

                    <div class="col-sm-12  mt-3">
                      <div class="table-responsive  mt-3">
                        <table class="table table-bordered" id="feature_table">
                          <thead>
                            <tr>
                              <!-- <th>Type Of Service</th>
                              <th>Service Category</th> -->
                              <th>Size of Unit</th>
                              <th>MRP</th>
                              <th>Selling Rate</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="row_no" id="row_no_0">
                              <!-- <td>
                              <select class="form-control" id="item_type" name="item_type[0]">
                                                    <option value="">Select Type Of service</option>
                                                    <?php foreach ($item_type_list as $key => $value) { ?>
                                                        <option value="<?php echo $value['item_type_id']; ?>"> <?php echo $value['item_type_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                              </td>
                              <td>
                              <!-- <select class="form-control" id="item_category" name="item_category[0]">
                                                    <option value="" selected disabled>Select Service Category</option>
                                                    <option value="R">Regular</option>
                                                    <option value="H">Heavy</option>
                                                </select> -->

                              <!-- <select class="form-control" id="item_category" name="item_category[0]">
                                                    <option value="">Select Type Of service</option>
                                                    <?php foreach ($item_category as $key => $value) { ?>
                                                        <option value="<?php echo $value['item_category_id']; ?>"> <?php echo $value['item_category_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                              </td> -->
                              <td>
                                <input type="text" class="form-control" name="unit_size[1]" id="unit_size">
                              </td>
                              <td>
                                <input type="number" class="form-control" name="mrp_rate[1]" id="sale_price">
                              </td>
                              <td>
                                <input type="number" class="form-control" name="sale_price[1]" id="sale_price">
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger" onclick="removeBanner(0)">
                                  <i class="fa fa-minus"></i>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                              <td>
                                <button type="button" class="btn btn-success" onclick="addFeature()">
                                  <i class="fa fa-plus"></i>
                                </button>
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                        <span id="tbl_msg" style="color:red;"></span>
                      </div>
                      <script>
                        function addFeature() {
                          var row_no = parseInt($('#row_no').val()) + 1;
                          // alert(row_no);
                          var tr = '<tr class="row_no" id="row_no_' + row_no + '">' +

                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="text" class="form-control" name="unit_size[' + row_no + ']" id="unit_size">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" class="form-control" name="mrp_rate[' + row_no + ']" id="price_range">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<input type="number" class="form-control" name="sale_price[' + row_no + ']" id="avg_rate">' +
                            '</div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group">' +
                            '<button type="button" class="btn btn-danger" onclick="removeBanner(' + row_no + ')"><i class="fa fa-minus"></i></button>' +
                            '</div>' +
                            '</td>' +
                            '</tr>';
                          $('#feature_table tbody').append(tr);
                          row_no++;
                          $('#row_no').val(row_no);
                        }

                        function removeBanner(row_no) {

                          $("#row_no_" + row_no).remove();
                        }
                      </script>
                    </div>
                    <div class="col-sm-12  mt-3">
                      <div class="form-group">
                        <label>Upload Service Image</label>
                        <input type="file" class="form-control" name="image_name[]" id="image_name" accept=".png,.jpg,.jpeg" multiple="">
                      </div>
                      <div class="col-sm-12  mt-3">
                        <div class="form-group">
                          <label>Enter Service Description</label>
                          <textarea class="editor" class="form-control" name="description" id="product_description" style="    width: 100%;"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12  mt-3">
                        <div class="form-group">
                          <label>Enter Service Terms & Conditions</label>
                          <textarea class="editor" class="form-control" name="terms_conditions" id="terms_conditions" style="    width: 100%;"></textarea>
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
                  <?php if (isset($category_data) && !empty($category_data)) {
                    foreach ($category_data as $category_key => $category_value) {
                  ?>
                      <option value="<?php echo $category_value['category_id']; ?>"><?php echo $category_value['category_name']; ?></option>
                  <?php }
                  }
                  ?>
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

    // getCategoryList();
    getSubCategory();
    getHsnList();
    getUnitList();
    getChildCategory();
    // $('#product_category,#subcategory,#product_type').select2();
    // Summernote
    $('#product_description,#terms_conditions').summernote({
      height: 50
    });
    //
    $('#expiry_date').datepicker({
      dateFormat: 'dd-mm-yy'
    });

    //  $(".add_cat").click(function(){alert("11");

    // });

    $(".add_childcat").click(function() {

      var category_id = $('#category_id1').val();
      var sub_category_id = $('#sub_category_id').val();
      var child_category_name = $('#child_category_name').val();
      if (sub_category_name == '') {
        $('#sub_category_name').text('Sub Category name is required.');
        return false;
      }

      var form_data = new FormData();
      form_data.append('sub_category_id', sub_category_id);
      form_data.append('child_category_name', child_category_name);
      form_data.append('category_id', category_id);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('ajaxchildcategory1'); ?>",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        //cache: false,
        success: function(response) {
          var res = JSON.parse(response);
          // $('#msg').text(res.msg);
          // $('#subcategory_name').val('');
          setTimeout(function() {
            $('#msg').text('');
          }, 3000);
          $('#childCategoryModal').modal('hide');
          getChildCategoryList();
        }

      });

    });

  });

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

  function getChildCategory() {
    var sub_category_id = $('#subcategory').val();
    var postData = {
      'sub_category_id': sub_category_id
    }

    $.post('<?php echo base_url('category/getChildCategory') ?>', postData, function(data) {
      var childcats = $.parseJSON(data);
      $('#select2-child_category_id-container').html('Select');
      $('#child_category_id').html('');

      var html = '<option value="">Select</option>';
      $.each(childcats, function(i, val) {
        html += '<option value="' + val.child_category_id + '">' + val.child_category_name + '</option>';
      })
      $('#child_category_id').html(html);
    })

  }



  function getCategoryList() {
    $.ajax({
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
    $.ajax({
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
    $.ajax({
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
    $.ajax({
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


  //     $(".btn-success").click(function () {
  //       // Clone the first row inside tbody
  //       var newRow = $("tbody tr:first").clone();

  //       // Clear input values
  //       newRow.find("input").val("");
  //       newRow.find("select").prop("selectedIndex", 0);

  //       // Append the cloned row to tbody
  //       $("tbody").append(newRow);
  //     });

  //     // Remove row when clicking the minus button
  //     $(document).on("click", ".btn-danger", function () {
  //       if ($("tbody tr").length > 1) {
  //         $(this).closest("tr").remove();
  //       }
  //     });
  //   });

  function validate_add_product(ele) {
    //hide_message_box(ele);

    var hasError = 0;
    var product_name = $("#product_name").val();
    //var product_type = $("#product_type").val();
    var product_category = $("#category_id option:selected").val();
    //var pack_size = $('#pack_size').val();
    //var sale_price = $('#sale_price').val();
    var hsn_code = $('#hsn_code option:selected').val();
    var product_unit = $('#product_unit option:selected').val();

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

    if (product_unit.trim() == '') { //alert("hsn");
      $('#productUnit_msg').text('Please select unit');
      hasError = 1;
    } else {
      $('#productUnit_msg').text(''); // Clear error if valid
    }

    var rowCount = $('#feature_table tbody tr').length;
    var rowFilled = false; // Flag to check if at least one row is filled

    $('#feature_table tbody tr').each(function() 
    {
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

    // alert(rowError);

    // Validate if at least one row is filled
    // if (!rowFilled) {
    //   $('#tbl_msg').show();
    //   $('#tbl_msg').text('Please fill at least one complete row in the table');
    //   hasError = 1;
    // } else {
    //   $('#tbl_msg').hide();
    //   $('#tbl_msg').text('');
    // }

    if (hasError == 1) { //alert("eror");
      return false;
    } else { //alert("no error");
      return true;
    }
  }

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


  // });


  // function add_catgry()
  // {
  //   alert("11");
  // }
</script>

<!-- Include Summernote CSS and JS -->


<?php include_once('footer.php') ?>