 
      <!--sidebar-wrapper--> 
      <style>
        .checked {
          color: orange;
        }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .star-rating {
            direction: rtl;
            display: inline-block;
        }
        .star-rating input {
            display: none;
        }
        .star-rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
        }
        .star-rating input:checked ~ label {
            color: gold;
        }
        .star-rating input:hover ~ label,
        .star-rating input:checked + label:hover {
            color: gold;
        }
        .feedback-form {
            width: 300px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .feedback-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>

      <!--end header-->
      <!--page-wrapper-->
      <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
          <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">Feedback</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item">
                      <a href="javascript:;">
                        <i class="bx bx-home-alt"></i>
                      </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                  </ol>
                </nav>
              </div>
             <!--  <div class="ms-auto">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary">Settings</button>
                  <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                    <span class="visually-hidden">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                    <a class="dropdown-item" href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="javascript:;">Separated link</a>
                  </div>
                </div>
              </div> -->
            </div>
            <!--end breadcrumb-->
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-lg-12 border-right">
                    <form class="row g-3" action="<?php echo base_url();?>save-feedback" method="POST">

                     <div class="col-sm-3">
                        <div class="form-group">
                          <label for="companyName">Select Customer</label>
                          <select class="form-control" id="customer_id" name="customer_id" required>
                            <option value="">--- Select Customer ---</option>
                            <?php
                                foreach ($customer_list as $customer) 
                                {
                            ?>
                                <option value="<?php echo $customer['cust_id'];?>"><?php echo $customer['company'];?></option>  
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                      </div>
                       
                      <div class="col-md-3 mt-3"> 
                        <div class="form-group">
                            <label for="project_id">Select Project <span class="text-danger">*</span></label>
                            <select class="form-control" id="project_id" name="project_id" required>
                            <option value="">--- Select Project ---</option>
                            <?php
                                foreach ($project_list as $project) 
                                {
                            ?>
                                <option value="<?php echo $project['project_id'];?>"><?php echo $project['project_name'];?></option>  
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                      </div>
                     
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label for="addressLine1">Feedback</label>
                          <textarea class="form-control" name="feedback"></textarea>
                        </div>
                      </div>
                       
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="city">Rating</label>
                          <!-- <div class="star-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div> -->

                          <div class="star-rating">
                              <input type="radio" name="rating" value="5" id="star5"><label for="star5">&#9733;</label>
                              <input type="radio" name="rating" value="4" id="star4"><label for="star4">&#9733;</label>
                              <input type="radio" name="rating" value="3" id="star3"><label for="star3">&#9733;</label>
                              <input type="radio" name="rating" value="2" id="star2"><label for="star2">&#9733;</label>
                              <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
                          </div>
                        </div>
                      </div>
                       
                      <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                  </div>
                  </div>
                  
                  </form>
                </div>
              </div>
            </div>


            <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Customer</th>
                      <th>Project</th>
                      <th>Feedback</th>
                      <th>Rating</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($feedback as $value): ?>
                      <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $value['company'] ?></td>
                        <td><?php echo $value['project_name'] ?></td>
                        <td><?php echo $value['feedback']; ?></td>
                        <td>
                            <?php
                              if($value['rating'] == 5)
                              {
                            ?>
                                <div class="star-rating">
                                    <input type="radio" name="rating" value="5" id="star5" checked><label for="star5">&#9733;</label>
                                    <input type="radio" name="rating" value="4" id="star4" checked><label for="star4">&#9733;</label>
                                    <input type="radio" name="rating" value="3" id="star3" checked><label for="star3">&#9733;</label>
                                    <input type="radio" name="rating" value="2" id="star2" checked><label for="star2">&#9733;</label>
                                    <input type="radio" name="rating" value="1" id="star1" checked><label for="star1">&#9733;</label>
                                </div>
                            <?php
                              }
                              else if($value['rating'] == 4)
                              {
                            ?>
                                <div class="star-rating">
                                    <input type="radio" name="rating" value="5" id="star5" checked><label for="star5">&#9733;</label>
                                    <input type="radio" name="rating" value="4" id="star4" checked><label for="star4">&#9733;</label>
                                    <input type="radio" name="rating" value="3" id="star3" checked><label for="star3">&#9733;</label>
                                    <input type="radio" name="rating" value="2" id="star2" checked><label for="star2">&#9733;</label>
                                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
                                </div>
                            <?php
                              }
                              else if($value['rating'] == 3)
                              {
                            ?>
                                <div class="star-rating">
                                    <input type="radio" name="rating" value="5" id="star5" checked><label for="star5">&#9733;</label>
                                    <input type="radio" name="rating" value="4" id="star4" checked><label for="star4">&#9733;</label>
                                    <input type="radio" name="rating" value="3" id="star3" checked><label for="star3">&#9733;</label>
                                    <input type="radio" name="rating" value="2" id="star2"><label for="star2">&#9733;</label>
                                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
                                </div>
                            <?php
                              }
                              else if($value['rating'] == 2)
                              {
                            ?>
                                <div class="star-rating">
                                    <input type="radio" name="rating" value="5" id="star5" checked><label for="star5">&#9733;</label>
                                    <input type="radio" name="rating" value="4" id="star4" checked><label for="star4">&#9733;</label>
                                    <input type="radio" name="rating" value="3" id="star3"><label for="star3">&#9733;</label>
                                    <input type="radio" name="rating" value="2" id="star2"><label for="star2">&#9733;</label>
                                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
                                </div>
                            <?php
                              }
                              else if($value['rating'] == 1)
                              {
                            ?>
                                <div class="star-rating">
                                    <input type="radio" name="rating" value="5" id="star5" checked><label for="star5">&#9733;</label>
                                    <input type="radio" name="rating" value="4" id="star4"><label for="star4">&#9733;</label>
                                    <input type="radio" name="rating" value="3" id="star3"><label for="star3">&#9733;</label>
                                    <input type="radio" name="rating" value="2" id="star2"><label for="star2">&#9733;</label>
                                    <input type="radio" name="rating" value="1" id="star1"><label for="star1">&#9733;</label>
                                </div>
                            <?php
                              }
                            ?>
                            
                        </td>
                        <td></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Sr. No.</th>
                      <th>Customer</th>
                      <th>Project</th>
                      <th>Feedback</th>
                      <th>Rating</th>
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