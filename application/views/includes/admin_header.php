<!DOCTYPE html>
<html lang="en">
<?php
$strQry = "SELECT * FROM company_setting WHERE comp_sett_id = '1'";

$company = $this->model->getSqlData($strQry);
$user_id = $this->session->userdata('op_user_id');
$strQryuser = "SELECT * FROM op_user WHERE op_user_id = " . $user_id;
$user = $this->model->getSqlData($strQryuser);

base_url() . 'uploads/company/' . $company[0]['company_logo'];
$sessionUser = $this->session->userdata();
if (empty($sessionUser['user_role'])) {
  redirect('alogin');
}
$role_id = $sessionUser['user_role'];

$condition = array('role_id' => $role_id);
$arr_perms = $this->model->getRecords('op_user_role', $fields = 'permission,role_name,is_ho_user', $condition, $order_by = '', $limit = '', $debug = 0, $group_by = '');
$arr_perm = unserialize($arr_perms[0]['permission']);
//print_r($arr_perm);
if (!empty($arr_perm)) {
  $arr_perm = $arr_perm;
} else {
  $arr_perm = [];
}

// die();
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title><?php echo $pagename; ?></title>
  <!--favicon-->
  <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon-32x32.png" type="image/png" />
  <!-- <link rel="icon" href="<?php echo base_url(); ?>uploads/company/<?php echo $company[0]['company_logo']; ?>" type="image/png" />
  <link rel="icon" href="<?php echo base_url(); ?>uploads/company/<?php echo $company[0]['company_logo']; ?>" type="image/x-icon" /> -->

  <!--plugins-->
  <link href="<?php echo base_url() ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <!--Data Tables -->
  <link href="<?php echo base_url() ?>assets/plugins/datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url() ?>assets/plugins/datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <!--plugins-->
  <link href="<?php echo base_url() ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="<?php echo base_url() ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- loader-->
  <link href="<?php echo base_url() ?>assets/css/pace.min.css" rel="stylesheet" />
  <script src="<?php echo base_url() ?>assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Roboto&display=swap" />
  <!-- Icons CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/icons.css" />
  <!-- App CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/app.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dark-sidebar.css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/dark-theme.css" />
  <!--<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">-->
  <style>
    .dropbtn {

      background-color: transparent;
      color: black;

      font-size: 16px;
      border: none;
    }

    .dropdown {

      position: relative;
      display: inline-block;
    }

    .dropdown-content {

      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      top: 100%;
      /* Position the dropdown above the button */
    }

    .dropdown-content a {

      color: black;
      padding: 5px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {}

    .dropdown:hover .dropdown-content {

      display: block;
    }

    .dropdown:hover .dropbtn {}

    .page-item.active .page-link {
      z-index: 1;
      color: #fff;
      background-color: #28A745;
      border-color: #28A745;
    }

    .logo-icon-2 {
      width: 141px;
      margin-left: 10px;
    }

    .dataTables_length {
      margin-bottom: 10px;
      margin-top: 10px;
    }

    @media only screen and (max-width: 786px) {
      .adv_file {
        width: 300px !important
      }
    }
  </style>
</head>

<body>
  <!-- wrapper -->
  <div class="wrapper">

    <!--sidebar-wrapper-->
    <div class="sidebar-wrapper" data-simplebar="true">
      <div class="sidebar-header">
        <div class="">
          <?php
          $company_logo = $company[0]['company_logo'];
          $profile_path = FCPATH . 'uploads/company/' . $company_logo;

          if (empty($company_logo) || !file_exists($profile_path)) { ?>
            <img src="<?php echo base_url('assets/images/logo.png'); ?>" style="width:170px;height:64px" class="img-fluid" alt="<?php echo $company[0]['company_name']; ?>">
          <?php } else { ?>
            <img src="<?php echo base_url('uploads/company/' . $company_logo); ?>" style="width:170px;height:64px" class="img-fluid" alt="<?php echo $company[0]['company_name']; ?>">
          <?php } ?>
        </div>
        <div>
          <h4 class="logo-text"> </h4>
        </div>
        <a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
        </a>
      </div>

      <!--navigation-->
      <ul class="metismenu" id="menu">
        <li>
          <a href="<?php echo base_url(); ?>admin">
            <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
            </div>
            <div class="menu-title">Dashboard</div>
          </a>
        </li>

        <li class="menu-label">Manage User</li>

        <?php if (
          in_array("add_new_user", $arr_perm) || in_array("edit_user", $arr_perm) || in_array("delete_user", $arr_perm) ||
          in_array("user_list", $arr_perm) ||
          in_array("add_user_role", $arr_perm) || in_array("edit_user_role", $arr_perm) || in_array("delete_user_role", $arr_perm) ||
          in_array("user_role_list", $arr_perm)
        ) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-10"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title">Manage User </div>
            </a>
            <ul>
              <?php if (in_array("user_role_list", $arr_perm)) { ?>
                <li>
                  <a href="<?php echo base_url(); ?>role-list"><i class="bx bx-right-arrow-alt"></i>User Role List</a>
                </li>
              <?php } ?>
              <?php if (in_array("user_list", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>user-list"><i class="bx bx-right-arrow-alt"></i>User List</a>
                </li>
              <?php } ?>

            </ul>
          </li>
        <?php } ?>

        <?php if (
          in_array("add_customer", $arr_perm) || in_array("edit_customer", $arr_perm) || in_array("delete_customer", $arr_perm) ||
          in_array("customer_list", $arr_perm)
        ) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title">Manage Customer</div>
            </a>
            <ul>
              <li> <a href="<?php echo base_url(); ?>customer-list"><i class="bx bx-right-arrow-alt"></i>Customer List</a>
              </li>

            </ul>
          </li>
        <?php } ?>

        <?php if (in_array("employees_list", $arr_perm)) { ?>
          <!-- <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title"> Manage Employee</div>
            </a>
            <ul>
              <li><a href="<?php echo base_url(); ?>employee-list"><i class="bx bx-right-arrow-alt"></i>Employee List</a>
              </li>

            </ul>
          </li> -->
        <?php } ?>

        <?php if (in_array("holiday_list", $arr_perm) || in_array("leave_list", $arr_perm) || in_array("leave_report", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-12"> <i class="bx bx-donate-blood"></i>
              </div>
              <div class="menu-title">Manage Leave</div>
            </a>
            <ul>

              <?php if (in_array("holiday_list", $arr_perm)) { ?>
                <li>
                  <a href="<?php echo base_url(); ?>holiday-list"><i class="bx bx-right-arrow-alt"></i>Holiday</a>
                </li>
              <?php } ?>
              <?php if (in_array("leave_list", $arr_perm)) { ?>
                <li>
                  <a href="<?php echo base_url(); ?>leave-list"><i class="bx bx-right-arrow-alt"></i>Leave Application</a>
                </li>
              <?php } ?>
              <?php if (in_array("leave_report", $arr_perm)) { ?>
                <li>
                  <a href="<?php echo base_url(); ?>leave-report"><i class="bx bx-right-arrow-alt"></i>Leave Report</a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php if (in_array("project_list", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title"> Project</div>
            </a>
            <ul>
              <li><a href="<?php echo base_url(); ?>project-list"><i class="bx bx-right-arrow-alt"></i>Project List</a>
              </li>
            </ul>
          </li>
        <?php } ?>

        <?php if (in_array("bugs_list", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title"> Manage Bug</div>
            </a>
            <ul>
              <li><a href="<?php echo base_url(); ?>bug-list"><i class="bx bx-right-arrow-alt"></i>Bug List</a>
              </li>
            </ul>
          </li>
        <?php } ?>

        <?php if (in_array("task_list", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title"> Task</div>
            </a>
            <ul>
              <li><a href="<?php echo base_url(); ?>task-list"><i class="bx bx-right-arrow-alt"></i>Task List</a>
              </li>

            </ul>
          </li>
        <?php } ?>



        <?php if (in_array("lead_list", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title">Lead</div>
            </a>
            <ul>
              <li> <a href="<?php echo base_url(); ?>lead-list"><i class="bx bx-right-arrow-alt"></i>Lead List</a>
              </li>
              <li> <a href="<?php echo base_url(); ?>qualified-lead"><i class="bx bx-right-arrow-alt"></i>Qualified Lead</a>
              </li>
              <li> <a href="<?php echo base_url(); ?>proposal-sent-lead"><i class="bx bx-right-arrow-alt"></i>Proposal Sent</a>
              </li>
              <li> <a href="<?php echo base_url(); ?>converted-lead"><i class="bx bx-right-arrow-alt"></i>Converted Lead</a>
              </li>
              <li> <a href="<?php echo base_url(); ?>lost-lead"><i class="bx bx-right-arrow-alt"></i>Lost Lead</a>
              </li>
            </ul>
          </li>
        <?php } ?>

        <?php if (in_array("template_list", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title">Template</div>
            </a>
            <ul>
              <li> <a href="<?php echo base_url(); ?>list-template"><i class="bx bx-right-arrow-alt"></i>Template List</a>
              </li>

            </ul>
          </li>
        <?php } ?>

        <?php if (
          in_array("category_list", $arr_perm) || in_array("subcategory_list", $arr_perm) || in_array("childcategory_list", $arr_perm) ||
          in_array("add_category", $arr_perm) || in_array("add_subcategory", $arr_perm) || in_array("add_childcategory", $arr_perm)
        ) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title">Manage Category</div>
            </a>
            <ul>
              <?php if (in_array("category_list", $arr_perm) || in_array("add_category", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>add-category"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
              <?php } ?>
              <?php if (in_array("subcategory_list", $arr_perm) || in_array("add_subcategory", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>add-sub-category"><i class="bx bx-right-arrow-alt"></i>Add Sub Category</a>
                </li>
              <?php } ?>
              <?php if (in_array("childcategory_list", $arr_perm) || in_array("add_childcategory", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>add-child-category"><i class="bx bx-right-arrow-alt"></i>Add Child Category</a>
                </li>
              <?php } ?>

            </ul>
          </li>
        <?php } ?>


        <?php if (
          in_array("add_service", $arr_perm) || in_array("service_list", $arr_perm) || in_array("service_request_list", $arr_perm) ||
          in_array("service_type_list", $arr_perm) || in_array("add_service_type", $arr_perm) || in_array("add_service_category", $arr_perm) || in_array("service_category_list", $arr_perm)
        ) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title">Manage Services</div>
            </a>
            <ul>

              <?php if (in_array("add_service", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>add-product"><i class="bx bx-right-arrow-alt"></i>Add New Service</a>
                </li>
              <?php } ?>

              <?php if (in_array("service_list", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>product-list"><i class="bx bx-right-arrow-alt"></i>Service list</a>
                </li>
              <?php } ?>

              <?php if (in_array("service_request_list", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>service-request-list"><i class="bx bx-right-arrow-alt"></i>Service Request List</a>
                </li>
              <?php } ?>

              <?php if (in_array("add_service_type", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>add-item-type"><i class="bx bx-right-arrow-alt"></i>Add Servies Type</a>
                </li>
              <?php } ?>

              <?php if (in_array("add_service_category", $arr_perm)) { ?>
                <li> <a href="<?php echo base_url(); ?>add-item-category"><i class="bx bx-right-arrow-alt"></i>Add Servies Category</a>
                </li>
              <?php } ?>

            </ul>
          </li>
        <?php } ?>


        <?php if (in_array("todo_list", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title"> To Do</div>
            </a>
            <ul>
              <li><a href="<?php echo base_url(); ?>todo-list"><i class="bx bx-right-arrow-alt"></i>To Do List</a>
              </li>

            </ul>
          </li>
        <?php } ?>

        <?php if (in_array("company_setting_list", $arr_perm) || in_array("email_cc_list", $arr_perm) || in_array("gst_list", $arr_perm)) { ?>
          <li>
            <a class="has-arrow" href="javascript:;">
              <div class="parent-icon icon-color-11"><i class="bx bx-user-circle"></i>
              </div>
              <div class="menu-title">Settings</div>
            </a>
            <ul>
              <?php if (in_array("company_setting_list", $arr_perm)) { ?>
                <li>
                  <a href="<?php echo base_url(); ?>company-settings"><i class="bx bx-right-arrow-alt"></i>Company Settings</a>
                </li>
              <?php } ?>
              <?php if (in_array("email_cc_list", $arr_perm)) { ?>
                <li>
                  <a href="<?php echo base_url(); ?>emailCc-settings"><i class="bx bx-right-arrow-alt"></i>Email Cc Settings</a>
                </li>
              <?php } ?>
              <?php if (in_array("gst_list", $arr_perm)) { ?>
                <li>
                  <a href="<?php echo base_url(); ?>gst-settings"><i class="bx bx-right-arrow-alt"></i>GST Settings</a>
                </li>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>

        <?php if (in_array("announce_list", $arr_perm)) { ?>
          <li>
            <a href="<?php echo base_url(); ?>announcement">
              <div class="parent-icon icon-color-7"><i class="bx bx-help-circle"></i>
              </div>
              <div class="menu-title">Announcements</div>
            </a>
          </li>
        <?php } ?>

        <?php if (in_array("whatsapp_chat", $arr_perm)) { ?>
          <li>
            <a href="<?php echo base_url(); ?>whatsapp" target="_blank">
              <div class="parent-icon icon-color-10"><i class="bx bxl-whatsapp"></i>
              </div>
              <div class="menu-title">Whatsapp</div>
            </a>
          </li>
        <?php } ?>

        <li>
          <a href="<?php echo base_url(); ?>logout">
            <div class="parent-icon icon-color-13"><i class="bx bx-log-out-circle"></i>
            </div>
            <div class="menu-title">Logout</div>
          </a>
        </li>


      </ul>
      <!--end navigation-->
    </div>
    <!--end sidebar-wrapper-->
    <!--header-->
    <header class="top-header">
      <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
          <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
          </a>
        </div>

        <div class="right-topbar ms-auto">
          <ul class="navbar-nav">
            <li class="nav-item search-btn-mobile">
              <a class="nav-link position-relative" href="javascript:;"> <i
                  class="bx bx-search vertical-align-middle"></i>
              </a>
            </li>


            <li class="nav-item dropdown dropdown-user-profile">
              <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                <div class="d-flex user-box align-items-center">
                  <div class="user-info">
                    <p class="user-name mb-0"><?php echo $user[0]['user_name']; ?></p>
                    <!-- <p class="designattion mb-0">Available</p> -->
                  </div>

                  <?php
                  $user_id = $this->session->userdata('op_user_id');

                  $strQryuser = "SELECT *
            FROM op_user 
            WHERE op_user_id = " . $user_id;
                  $user_details = $this->model->getSqlData($strQryuser);

                  $profile_photo = $user_details[0]['profile_photo'];
                  $profile_path = FCPATH . 'uploads/profile/' . $profile_photo;

                  if (empty($profile_photo) || !file_exists($profile_path)) { ?>
                    <img src="<?php echo base_url('assets/images/user1.jpg'); ?>" width="80" height="80" class="user-img" alt="">
                  <?php } else { ?>
                    <img src="<?php echo base_url('uploads/profile/' . $profile_photo); ?>" width="80" height="80" class="user-img" alt="">
                  <?php } ?>

                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="<?php echo base_url(); ?>profile"><i class="bx bx-user"></i><span>Profile</span></a>
                <!-- <a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Settings</span></a> -->
                <a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i class="bx bx-power-off"></i><span>Logout</span></a>
              </div>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <?php //print_r($arr_perm);
    ?>