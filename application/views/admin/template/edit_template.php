<!--sidebar-wrapper--> <?php include_once('header.php') ?> <style type="text/css"></style>
<!--end header-->
<!--page-wrapper-->

<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Template</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Edit Template</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <!--    <div class="btn-group"><a href="add-new-template.php"><button type="button" class="btn btn-primary">Add New Template</button></a></div> -->
        </div>
      </div>
      <div class="card ">
        <div class="card-body">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Template</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Covering Letter</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Project Over View</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="key-point-tab" data-bs-toggle="tab" href="#key-point" role="tab" aria-controls="key-point" aria-selected="false">Key Module</a>
            </li>
            <!-- <li class="nav-item" role="presentation">
              <a class="nav-link" id="commercial-tab" data-bs-toggle="tab" href="#commercial" role="tab" aria-controls="commercial" aria-selected="false">Commercial</a>
            </li> -->
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="term-and-condtion-tab" data-bs-toggle="tab" href="#term-and-condtion" role="tab" aria-controls="term-and-condtion" aria-selected="false">Terms & Conditions</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="attachment-tab" data-bs-toggle="tab" href="#attachment" role="tab" aria-controls="attachment" aria-selected="false">Attchment</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="signature-tab" data-bs-toggle="tab" href="#signature" role="tab" aria-controls="signature" aria-selected="false">Signature</a>
            </li>
          </ul>
          <form  method="post" action="<?php echo base_url('update-template-custom/'.$res['template_id']);?>" onsubmit="return validate_edit_template(this)" enctype="multipart/form-data">
          <div class="tab-content p-3" id="myTabContent">
          
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="companyName">Title</label>
                    <input type="hidden" name="lead_id" class="form-control" id="lead_id"  value="<?php echo @$_GET['lead_id'] ?>">
                    <input type="hidden" name="lead_proposal_id" class="form-control" id="lead"  value="<?php echo @$_GET['lead'] ?>">
                    <input type="hidden" name="old_template_id" class="form-control" id="old_template_id"  value="<?php echo @$_GET['otemplate_id'] ?>">
                    <input type="text" class="form-control" id="title1" name="title" value="<?php echo $res['title'] ?>" placeholder=" " >
                  </div>
                  <span id="ttl_err" style="color:red;"></span>
                </div>
                <div class="col-sm-12 mt-3">
                  <div class="form-group">
                    <label for="addressLine1">Description</label>
                    <textarea class="editor form-control" name="description" id="description"><?php echo $res['description'] ?></textarea>
                  </div>
                </div>
                 
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="  card-info">
                    <div class="card-header">
                      <h5 class="card-title">Covering </h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Title</label>
                            <input type="text" class="form-control" name="title_covering"  value="<?php echo $res['title_covering'] ?>" id="title" placeholder=" " >
                          </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <div class="form-group">
                            <label for="addressLine1">Description</label>
                            <textarea class="editor form-control" name="description_covering" id="description"><?php echo $res['description_covering'] ?></textarea>
                          </div>
                        </div>
                       <div class="col-md-12 attachment_div" style="margin-top: 20px">
                        <div class="table-responsive">
                          <table class="table table-bordered" id="feature_table_covering">
                            <thead>
                              <tr>
                                <th class="text-center">Attachment</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="covering-body" id="file_covering_body">
                             
                            <?php if(!empty($covering_file)){ 
                                            foreach ($covering_file as $key_c => $value_c) {
                                             
                                       ?>
                              <tr id="row_no_covering_<?php echo $key_c; ?>">
                                <td>
                                  <input type="file" name="file_covering[]" class="form-control file-covering" id="covering_<?php echo $key_c; ?>">
                                  <?php echo $value_c['image_name']; ?>
                                  <input type="hidden" name="existing_file_cov[]" value="<?php echo $value_c['image_name']; ?>">
                                </td>
                                <td>
                                  <div class="form-group">
                                   
                                    <button type="button" class="btn btn-danger" onclick="removecover(<?php echo $key_c; ?>)">
                                      <i class="fa fa-minus"></i>
                                    </button>
                                  </div>
                                </td>
                              </tr>
                              <?php } } ?>
                            </tbody>
                            <tfoot>
                              <tr>
                              <td colspan="4">
                                  <div class="form-group">
                                    <button type="button" class="btn btn-success" onclick="addcover()">
                                      <i class="fa fa-plus"></i>
                                    </button>
                                  </div>
                                </td>
                              </tr>
                            </tfoot>
                          </table>
                          <span id="tbc_err" style="color:red;"></span>
                        </div>
                      </div>
                      <script>
                          let coverCount = 1;  // Updated variable name

                          function addcover() {
                            coverCount++;  // Increment the corrected variable
                            const tableBody = document.getElementById('file_covering_body');
                            
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                              <td>
                                <input type="file" name="file_covering[]" class="form-control" id="covering_${coverCount}">
                              </td>
                              <td>
                                <div class="form-group">
                                  <button type="button" class="btn btn-danger" onclick="removecover(${coverCount})">
                                    <i class="fa fa-minus"></i>
                                  </button>
                                </div>
                              </td>
                            `;
                            tableBody.appendChild(newRow);
                          }

                          function removecover(id) {//alert("11");
                           // alert(id);
                            const rowToRemove = document.getElementById(`covering_${id}`).closest('tr');
                            rowToRemove.remove();
                          }
                        </script>


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
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="  card-info">
                    <div class="card-header">
                      <h5 class="card-title">Over View Project </h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Title</label>
                            <input type="text" class="form-control" name="title_over_view_project"  value="<?php echo $res['title_over_view_project'] ?>" id="title" placeholder=" " >
                          </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <div class="form-group">
                            <label for="addressLine1">Description </label>
                            <textarea class="editor form-control"  name="description_over_view_project" id="description">
                                <?php echo $res['description_over_view_project'] ?></textarea>
                          </div>
                        </div>
                       <div class="col-md-12 overview_project_div" style="margin-top: 20px">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="file_overview_project_table">
                              <thead>
                                <tr >
                                  <th class="text-center">Overview Project</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody id="overview_project_body">
                              <?php if(!empty($over_view_project_file)){ 
                                              foreach ($over_view_project_file as $key_ovp => $value_ovp) 
                                              {
                                                ?>
                                <tr id="row_no_ovp_<?php echo $key_ovp; ?>">
                                  <td>
                                    <input type="file" name="file_overview_project[]" class="form-control" id="file_over_view_project_<?php echo $key_ovp; ?>">
                                    <?php echo $value_ovp['image_name']; ?>
                                    <input type="hidden" name="existing_file_ov[]" value="<?php echo $value_ovp['image_name']; ?>">
                                </td>
                                  <td>
                                    <div class="form-group">
                                      <button type="button" class="btn btn-danger" onclick="removeoverviewproject(<?php echo $key_ovp; ?>)">
                                        <i class="fa fa-minus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                                <?php } } ?>  
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td colspan="4">
                                    <div class="form-group">
                                      <button type="button" class="btn btn-success" onclick="addoverviewproject()">
                                        <i class="fa fa-plus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                            <span id="tbo_err" style="color:red;"></span>
                          </div>
                        </div>

                        <script>
                          let overviewProjectCount = 1;  // Updated variable name

                          function addoverviewproject() {
                            overviewProjectCount++;  // Increment the corrected variable
                            const tableBody = document.getElementById('overview_project_body');
                            
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                              <td>
                                <input type="file" name="file_overview_project[]" class="form-control" id="file_over_view_project_${overviewProjectCount}">
                              </td>
                              <td>
                                <div class="form-group">
                                  <button type="button" class="btn btn-danger" onclick="removeoverviewproject(${overviewProjectCount})">
                                    <i class="fa fa-minus"></i>
                                  </button>
                                </div>
                              </td>
                            `;
                            tableBody.appendChild(newRow);
                          }

                          function removeoverviewproject(id) {
                            const rowToRemove = document.getElementById(`file_over_view_project_${id}`).closest('tr');
                            rowToRemove.remove();
                          }
                        </script>

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
            <div class="tab-pane fade" id="key-point" role="tabpanel" aria-labelledby="key-point-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="  card-info">
                    <div class="card-header">
                      <h5 class="card-title">Key Point </h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Title</label>
                            <input type="text" class="form-control" name="title_key_point" value="<?php echo $res['title_key_point'] ?>" id="title" placeholder=" ">
                          </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <div class="form-group">
                            <label for="addressLine1">Description</label>
                            <textarea class="editor form-control" name="description_key_point" id="description"><?php echo $res['description_key_point'] ?></textarea>
                          </div>
                        </div>
                        <div class="col-md-12 key_point_div" style="margin-top: 20px">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="file_key_point_table">
                            <?php $row_no = 1; ?>
                              <thead>
                                <tr>
                                  <th class="text-center">Key Point</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody id="key_point_body">
                              <?php if(!empty($key_point_file)){ 
                                            foreach ($key_point_file as $key_kp => $value_kp) {
                                             
                                       ?>
                                <tr id="row_no_key_point_<?php echo $key_kp; ?>">
                                  <td>
                                    <input type="file" name="file_key_point[]" class="form-control" id="file_input_<?php echo $key_kp; ?>">
                                    <?php echo $value_kp['image_name']; ?>
                                    <input type="hidden" name="existing_file_key_point[]" value="<?php echo $value_kp['image_name']; ?>">
                                  </td>
                                  <td>
                                    <div class="form-group">
                                      <button type="button" class="btn btn-danger" onclick="removekeypoint(<?php echo $key_kp; ?>)">
                                        <i class="fa fa-minus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                                <?php } } ?> 
                              </tbody>
                              <tfoot>
                                <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                      <button type="button" class="btn btn-success" onclick="addkeypoint()">
                                        <i class="fa fa-plus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                            <span id="tbk_err" style="color:red;"></span>
                          </div>
                        </div>

                        <script>
                          let keyPointCount = 1;  // Updated variable name

                          function addkeypoint() {
                            keyPointCount++;  // Increment the corrected variable
                            const tableBody = document.getElementById('key_point_body');
                            
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                              <td>
                                <input type="file" name="file_key_point[]" class="form-control" id="file_input_${keyPointCount}">
                              </td>
                              <td>
                                <div class="form-group">
                                  <button type="button" class="btn btn-danger" onclick="removekeypoint(${keyPointCount})">
                                    <i class="fa fa-minus"></i>
                                  </button>
                                </div>
                              </td>
                            `;
                            tableBody.appendChild(newRow);
                          }

                          function removekeypoint(id) {
                           // alert(id);
                            const rowToRemove = document.getElementById(`file_input_${id}`).closest('tr');
                            rowToRemove.remove();
                          }
                        </script>


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
            <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="  card-info">
                    <div class="card-header">
                      <h5 class="card-title">Commercial </h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Title</label>
                            <input type="text" class="form-control"  name="title_commercial" value="<?php echo $res['title_commercial'] ?>" id="title" placeholder=" " >
                          </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <div class="form-group">
                            <label for="addressLine1">Description</label>
                            <textarea class="editor form-control" name="description_commercial"id="description"><?php echo $res['description_commercial'] ?></textarea>
                          </div>
                        </div>
                       <div class="col-md-12 commercial_div" style="margin-top: 20px">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="feature_table_commercial">
                            <?php $row_no = 1; ?>
                              <thead>
                                <tr>
                                  <th class="text-center">Commercial</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody id="commercial_body">
                              <?php if(!empty($commercial_file)){ 
                                            foreach ($commercial_file as $key_cr => $value_cr) {
                                             
                                       ?>
                                <tr id="row_no_commercial_<?php echo $key_cr; ?>">
                                  <td>
                                    <input type="file" name="file_commercial[]" class="form-control" id="commercial_<?php echo $key_cr; ?>">
                                    <?php echo $value_cr['image_name']; ?>
                                    <input type="hidden" name="existing_file_comercial[]" value="<?php echo $value_cr['image_name']; ?>">
                                  </td>
                                  <td>
                                    <div class="form-group">
                                      <button type="button" class="btn btn-danger" onclick="removecommercial(<?php echo $key_cr; ?>)">
                                        <i class="fa fa-minus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                                <?php } } ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                      <button type="button" class="btn btn-success" onclick="addcommercial()">
                                        <i class="fa fa-plus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                        <script>
                          let commercialCount = 1;  // Updated variable name

                          function addcommercial() {
                            commercialCount++;  // Increment the corrected variable
                            const tableBody = document.getElementById('commercial_body');
                            
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                              <td>
                                <input type="file" name="file_commercial[]" class="form-control" id="commercial_${commercialCount}">
                              </td>
                              <td>
                                <div class="form-group">
                                  <button type="button" class="btn btn-danger" onclick="removecommercial(${commercialCount})">
                                    <i class="fa fa-minus"></i>
                                  </button>
                                </div>
                              </td>
                            `;
                            tableBody.appendChild(newRow);
                          }

                          function removecommercial(id) {
                            const rowToRemove = document.getElementById(`commercial_${id}`).closest('tr');
                            rowToRemove.remove();
                          }
                        </script>

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
            <div class="tab-pane fade" id="term-and-condtion" role="tabpanel" aria-labelledby="term-and-condtion-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="  card-info">
                    <div class="card-header">
                      <h5 class="card-title">Term And Condition </h5>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label for="companyName">Title</label>
                            <input type="text" class="form-control" name="title_term_and_condtion" placeholder=" " value="<?php echo $res['title_term_and_condtion'] ?>" id="title">
                          </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <div class="form-group">
                            <label for="addressLine1">Description</label>
                            <textarea class="editor form-control" name="description_term_and_condtion" id="description"><?php echo $res['description_term_and_condtion'] ?></textarea>
                          </div>
                        </div>
                       <div class="col-md-12 term_condition_div" style="margin-top: 20px">
                          <div class="table-responsive">
                            <table class="table table-bordered" id="feature_term_condition_table">
                            <?php $row_no = 1; ?>
                              <thead>
                                <tr>
                                  <th class="text-center">Term and Condition</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody id="term_condition_body">
                              <?php if(!empty($term_and_condition_file)){ 
                                            foreach ($term_and_condition_file as $key_tc => $value_tc) {
                                             
                                       ?>
                                <tr class="row_no_term_and_condition" id="row_no_term_and_condition_<?php echo $key_tc; ?>">
                                  <td >
                                    <input type="file" name="file_term_condition[]" class="form-control"  id="term_and_condition_<?php echo $key_tc; ?>">
                                    <?php echo $value_tc['image_name']; ?>
                                    <input type="hidden" name="existing_file_tc[]" value="<?php echo $value_tc['image_name']; ?>">
                                  </td>
                                  <td>
                                    <div class="form-group">
                                      <button type="button" class="btn btn-danger" onclick="removetermcondition(<?php echo $key_tc; ?>)">
                                        <i class="fa fa-minus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                                <?php } } ?> 
                              </tbody>
                              <tfoot>
                                <tr>
                                <td colspan="4">
                                    <div class="form-group">
                                      <button type="button" class="btn btn-success" onclick="addtermcondition()">
                                        <i class="fa fa-plus"></i>
                                      </button>
                                    </div>
                                  </td>
                                </tr>
                              </tfoot>
                            </table>
                            <span id="tbtc_err" style="color:red;"></span>
                          </div>
                        </div>

                        <script>
                          let termConditionCount = 1;  // Updated variable name

                          function addtermcondition() {
                            termConditionCount++;  // Increment the corrected variable
                            const tableBody = document.getElementById('term_condition_body');
                            
                            const newRow = document.createElement('tr');
                            newRow.innerHTML = `
                              <td>
                                <input type="file" name="file_term_condition[]" class="form-control" id="term_and_condition_${termConditionCount}">
                              </td>
                              <td>
                                <div class="form-group">
                                  <button type="button" class="btn btn-danger" onclick="removetermcondition(${termConditionCount})">
                                    <i class="fa fa-minus"></i>
                                  </button>
                                </div>
                              </td>
                            `;
                            tableBody.appendChild(newRow);
                          }

                          function removetermcondition(id) {
                            const rowToRemove = document.getElementById(`term_and_condition_${id}`).closest('tr');
                            rowToRemove.remove();
                          }
                        </script>

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
            <div class="tab-pane fade" id="attachment" role="tabpanel" aria-labelledby="attachment-tab">
              <div class="row">
                <div class="col-md-12 attachment_div" style="margin-top: 20px">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="feature_attachment_table">
                    <?php $row_no = 1; ?>
                      <thead>
                        <tr>
                          <th class="text-center">Attachment</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="attachment_body">
                      <?php if(!empty($attchment_file)){ 
                                            foreach ($attchment_file as $key_a => $value_a) {
                                             
                                       ?>
                        <tr class="row_no_attchment" id="row_no_attchment_<?php echo $key_a; ?>">
                          <td>
                            <input type="file" name="file_attachment[]" class="form-control" id="attachment_<?php echo $key_a; ?>">
                            <?php echo $value_a['image_name']; ?>
                            <input type="hidden" name="existing_file_attachment[]" value="<?php echo $value_a['image_name']; ?>">
                          </td>
                          <td>
                            <div class="form-group">
                              <button type="button" class="btn btn-danger" onclick="removeattachment(<?php echo $key_a; ?>)">
                                <i class="fa fa-minus"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <?php } } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                        <td colspan="4">
                            <div class="form-group">
                              <button type="button" class="btn btn-success" onclick="addattachment()">
                                <i class="fa fa-plus"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                    <span id="tbat_err" style="color:red;"></span>
                  </div>
                </div>

                <script>
                  let attachmentCount = 1;  // Corrected variable name

                  function addattachment() {
                    attachmentCount++;  // Increment the corrected variable
                    const tableBody = document.getElementById('attachment_body');
                    
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                      <td>
                        <input type="file" name="file_attachment[]" class="form-control" id="attachment_${attachmentCount}">
                      </td>
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

                  function removeattachment(id) {//alert(id);
                    const rowToRemove = document.getElementById(`attachment_${id}`).closest('tr');
                    rowToRemove.remove();
                  }
                </script>



              </div>
            </div>
            <div class="tab-pane fade" id="signature" role="tabpanel" aria-labelledby="signature-tab">
              <div class="row">
                
                <div class="col-sm-12 mt-3">
                  <div class="form-group">
                    <label for="addressLine1">Signature</label>
                    <!-- <textarea class="editor form-control" name="signature"  id="signature_id" ><?php echo $res['signature'] ?></textarea> -->
                    <div class="table-responsive">
                      
                    <table class="table table-bordered" >
                      
                      <tbody >
                      <?php if(!empty($signature_file)){ 
                                            foreach ($signature_file as $key_a => $value_s) {
                                             
                                       ?>
                        <tr  >
                        <td>Signature: </td>
                        
                          <td>
                            <input type="file" name="signature_file" class="form-control" id="signature_attach_<?php echo $key_a; ?>">
                            <?php echo $value_s['signature_file']; ?>
                            <input type="hidden" name="existing_signature_file" value="<?php echo $value_s['signature_file']; ?>">
                          </td>
                         
                            
                        </tr>
                        <?php }}
                        if(!empty($stamp_file)){ 
                          foreach ($stamp_file as $key_f => $value_f) {
                        ?>
                        <tr>
                          <td>Stamp: </td>
                          <td>
                            <input type="file" name="stamp_file" class="form-control" id="stamp_attach_<?php echo $key_f; ?>">
                            <?php echo $value_f['stamp_file']; ?>
                            <input type="hidden" name="existing_stamp_file" value="<?php echo $value_f['stamp_file']; ?>">
                          </td>
                         
                          
                        </tr>
                        <?php } } 
                        else{
                          ?>
                        <tr>
                          <td>Signature: </td>
                          <td>
                            <input type="file" name="signature_file" class="form-control" id="signature_attach"  >
                          </td>
                         
                          
                        </tr>
                        <tr>
                          <td>Stamp: </td>
                          <td>
                            <input type="file" name="stamp_file" class="form-control" id="stamp_attach">
                          </td>
                         
                          
                        </tr>
                        <?php } ?>
                      </tbody>
                      
                    </table>
                    <span id="tbsg_err" style="color:red;"></span>
                    <span id="tbstp_err" style="color:red;"></span>
                  </div>
                  </div>
                </div>
             
              </div>
            </div>
          </div>
             <div class="col-sm-12 mt-3">
                  <button type="submit" class="btn btn-primary btn-block">Update</button>
                </div>
        </div>
      </div>
      
    </div>
  </div>
                </form>
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
<!-- <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/nl.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>-->
       <script type="text/javascript">
    $(function () {
    // Summernote
    $('#description,#description_covering,#description_over_view_project,#description_key_point,#description_commercial,#description_term_and_condtion,#signature_id').summernote()
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })

    
</script>

<script>
  function validate_edit_template(form) {

    var title1=$('#title1').val();
    var covering_fileInputs = document.querySelectorAll('input[name="file_covering[]"]');
    var overview_fileInputs = document.querySelectorAll('input[name="file_over_view_project[]"]');
    var keypoint_fileInputs = document.querySelectorAll('input[name="file_key_point[]"]');
    var tandc_fileInputs = document.querySelectorAll('input[name="file_term_and_condition[]"]');
    var attach_fileInputs = document.querySelectorAll('input[name="file_attchment[]"]');
    var sign_fileInputs = document.querySelectorAll('input[name="signature_file"]');
    var stamp_fileInputs = document.querySelectorAll('input[name="stamp_file"]');
    var sign1 = $("#signature_attach").val();
    var stamp1 = $("#stamp_attacht").val();
  
    hasError=0;
   // alert("2");
    if(title1.trim()=='') 
    { 
      $("#ttl_err").text("Please enter the title of the template");
     
      hasError = 1; } 
      else {
            $('#ttl_err').text(''); // Clear error if valid
        }
       // alert("3");
    // Loop through file inputs to check if any file is selected
    covering_fileInputs.forEach(function(input) {
        if (input.files.length > 0) {
          //  hasFile = true;
            // Check each selected file
            for (var i = 0; i < input.files.length; i++) {
                var fileName = input.files[i].name.toLowerCase();
                if (fileName.endsWith('.exe')) {
                   // invalidFile = true;
                    $("#tbc_err").text("Executable (.exe) files are not allowed.");
                    hasError=1;
                    break; // Stop checking further if an invalid file is found
                }
            }
        }
    });

   // alert("4");

    overview_fileInputs.forEach(function(input) {
        if (input.files.length > 0) {
           // hasFile = true;
            // Check each selected file
            for (var i = 0; i < input.files.length; i++) {
                var fileName = input.files[i].name.toLowerCase();
                if (fileName.endsWith('.exe')) {
                   // invalidFile = true;
                    $("#tbo_err").text("Executable (.exe) files are not allowed.");
                    hasError=1;
                    break; // Stop checking further if an invalid file is found
                }
            }
        }
    });

   // alert("5");

    keypoint_fileInputs.forEach(function(input) {
        if (input.files.length > 0) {
           // hasFile = true;
            // Check each selected file
            for (var i = 0; i < input.files.length; i++) {
                var fileName = input.files[i].name.toLowerCase();
                if (fileName.endsWith('.exe')) {
                   // invalidFile = true;
                    $("#tbk_err").text("Executable (.exe) files are not allowed.");
                    hasError=1;
                    break; // Stop checking further if an invalid file is found
                }
            }
        }
    });

    //alert("6");

    keypoint_fileInputs.forEach(function(input) {
        if (input.files.length > 0) {
           // hasFile = true;
            // Check each selected file
            for (var i = 0; i < input.files.length; i++) {
                var fileName = input.files[i].name.toLowerCase();
                if (fileName.endsWith('.exe')) {
                   // invalidFile = true;
                    $("#tbk_err").text("Executable (.exe) files are not allowed.");
                    hasError=1;
                    break; // Stop checking further if an invalid file is found
                }
            }
        }
    });

    //alert("7");
    tandc_fileInputs.forEach(function(input) {
        if (input.files.length > 0) {
           // hasFile = true;
            // Check each selected file
            for (var i = 0; i < input.files.length; i++) {
                var fileName = input.files[i].name.toLowerCase();
                if (fileName.endsWith('.exe')) {
                   // invalidFile = true;
                    $("#tbtc_err").text("Executable (.exe) files are not allowed.");
                    hasError=1;
                    break; // Stop checking further if an invalid file is found
                }
            }
        }
    });

   // alert("8");
    attach_fileInputs.forEach(function(input) {
        if (input.files.length > 0) {
           // hasFile = true;
            // Check each selected file
            for (var i = 0; i < input.files.length; i++) {
                var fileName = input.files[i].name.toLowerCase();
                if (fileName.endsWith('.exe')) {
                   // invalidFile = true;
                    $("#tbat_err").text("Executable (.exe) files are not allowed.");
                    hasError=1;
                    break; // Stop checking further if an invalid file is found
                }
            }
        }
    });

   
   
    if (sign1) {
        var fileExtension = sign1.split('.').pop().toLowerCase();
        if (fileExtension === 'exe') {
            $('#tbsg_err').text('Executable files are not allowed.');
            hasError = 1;
        } else {
            $('#tbsg').text(''); // Clear error if valid
        }
    }

    if (stamp1) {
        var fileExtension = stamp1.split('.').pop().toLowerCase();
        if (fileExtension === 'exe') {
            $('#tbstp_err').text('Executable files are not allowed.');
            hasError = 1;
        } else {
            $('#tbstp').text(''); // Clear error if valid
        }
    }

    

   

    if(hasError==1)
    {
    
      return false;
    }
    else
    {
  //alert("tttt");
      return true;
    }
}

</script>
<!--footer --> <?php include_once('footer.php') ?>