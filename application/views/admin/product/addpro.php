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
                <form class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-4  mt-3">
                      <div class="form-group">
                        <label>Enter Service Name <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-sm-4 mt-3">
                      <div class="row">
                        <div class="col-sm-9">
                          <div class="form-group">
                            <label>Select Category <span class="text-danger">*</span>
                            </label>
                            <select class="form-control">
                              <option>Select Category</option>
                              <option>LABOR</option>
                            </select>
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
                            <select class="form-control">
                              <option>Select Sub Category</option>
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
                            <label>HSN/SAC Code <span class="text-danger">*</span>
                            </label>
                            <select class="form-control">
                              <option>Select HSN/SAC Code</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal12" style="margin-top: 22px;">
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
                            <select class="form-control">
                              <option>Select Unit</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#exampleModal13" style="margin-top: 22px;">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-12  mt-3">
                      <div class="table-responsive  mt-3">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Type Of Service</th>
                              <th>Service Category</th>
                              <th>Size of Unit</th>
                              <th>MRP</th>
                              <th>Selling Rate</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <select class="form-control">
                                  <option>Select Type Of Service</option>
                                </select>
                              </td>
                              <td>
                                <select class="form-control">
                                  <option>Select Service Category</option>
                                </select>
                              </td>
                              <td>
                                <input type="text" class="form-control">
                              </td>
                              <td>
                                <input type="number" class="form-control">
                              </td>
                              <td>
                                <input type="number" class="form-control">
                              </td>
                              <td>
                                <button type="button" class="btn btn-danger">
                                  <i class="fa fa-minus"></i>
                                </button>
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                              <td>
                                <button type="button" class="btn btn-success">
                                  <i class="fa fa-plus"></i>
                                </button>
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <div class="col-sm-12  mt-3">
                      <div class="form-group">
                        <label>Upload Product Image</label>
                        <input type="file" class="form-control">
                      </div>
                      <div class="col-sm-12  mt-3">
                        <div class="form-group">
                          <label>Enter Product Description</label>
                          <textarea class="editor" class="form-control" style="    width: 100%;"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12  mt-3">
                        <div class="form-group">
                          <label>Enter Product Terms & Conditions</label>
                          <textarea class="editor" class="form-control" style="    width: 100%;"></textarea>
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

<div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Category Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="companyName"> Enter category name</label>
              <input type="text" class="form-control" id=" " placeholder="" >
            </div>
          </div>
          
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for=""> Category Image</label>
             <input type="file" class="form-control" id=" " placeholder="" >
            </div>
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


<div class="modal fade"  id="exampleModal11" tabindex="-1" aria-labelledby="exampleModal11Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sub Category Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="companyName"> Select category</label>
             <select class="form-control">
                 <option>1</option>
             </select>
            </div>
          </div>
          
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="">Enter Sub category</label>
             <input type="text" class="form-control" id=" " placeholder="" >
            </div>
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


<div class="modal fade"  id="exampleModal12" tabindex="-1" aria-labelledby="exampleModal12Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">HSN Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="companyName"> HSN Code</label>
             <input type="text" class="form-control" id=" " placeholder="" >
            </div>
          </div>
          
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="">SGST(%)</label>
             <input type="text" class="form-control" id=" " placeholder="" >
            </div>
          </div>
           <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="">CGST(%)</label>
             <input type="text" class="form-control" id=" " placeholder="" >
            </div>
          </div>
           <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="">IGST(%)</label>
             <input type="text" class="form-control" id=" " placeholder="" >
            </div>
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

<div class="modal fade"  id="exampleModal13" tabindex="-1" aria-labelledby="exampleModal13Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Unit Add</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="companyName"> Unit (i.e. Kg)</label>
             <input type="text" class="form-control" id=" " placeholder="" >
            </div>
          </div>
          
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="">Abbrivation (i.e. Kilogram)</label>
             <input type="text" class="form-control" id=" " placeholder="" >
            </div>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () {
    $(".btn-success").click(function () {
      // Clone the first row inside tbody
      var newRow = $("tbody tr:first").clone();

      // Clear input values
      newRow.find("input").val("");
      newRow.find("select").prop("selectedIndex", 0);

      // Append the cloned row to tbody
      $("tbody").append(newRow);
    });

    // Remove row when clicking the minus button
    $(document).on("click", ".btn-danger", function () {
      if ($("tbody tr").length > 1) {
        $(this).closest("tr").remove();
      }
    });
  });
</script>

<!-- Include Summernote CSS and JS -->


<?php include_once('footer.php') ?>