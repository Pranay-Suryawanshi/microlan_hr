 <style>
   .checked {
     color: orange;
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
         <div class="breadcrumb-title pe-3">Add Role</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Add Role</li>
             </ol>
           </nav>
         </div>
       </div>
       <!--end breadcrumb-->

       <form method="post" action="<?php echo base_url('submit-role'); ?>" id="frmEditRole" name="frmEditRole" enctype="multipart/form-data">
         <div class="card">
           <div class="card-body">
             <div class="row">

               <div class="col-lg-3" style="margin-bottom: 20px">
                 <label>Role Name <span class="text-danger">*</span>
                 </label>
                 <input type="text" class="form-control" name="role_name" id="role_name" required="">

               </div>
               <div class="col-md-9" style=" "> &nbsp; <br>
                 <a onclick="javascript:checkAll('frmEditRole', true);" href="javascript:void(0);" class="btn btn-success mb-2" id="chkall">
                   <i class="fa fa-check-square-o"></i> Check All </a>
                 <a onclick="javascript:checkAll('frmEditRole', false);" href="javascript:void(0);" class="btn btn-primary mb-2" id="unchkall">
                   <i class="fa fa-square-o"></i> Uncheck All </a>
                 <button type="submit" class="btn btn-success mb-2" id="save">Submit</button>
               </div>
             </div>

             <hr>

             <!-- flashdata -->
             <?php
              if ($this->session->flashdata('msg')) {
              ?>
               <div class="alert alert-success alert-dismissible">
                 <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                 <?php echo $this->session->flashdata('msg'); ?>
               </div>
             <?php
              }
              ?>
             <!-- flashdata -->

             <div class="row">
               <div class="col-md-3">
                 <h4> <input type="checkbox" style="transform: scale(1.5);" id="userc"> Users</h4>
                 <!-- <input type="checkbox" class="" name="" value=""> -->
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="u" value="add_new_user"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="u" value="edit_user"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="u" value="delete_user"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="u" value="user_list"> View Users </label>
                 </div>
               </div>
               <div class="col-md-3">
                 <h4> <input type="checkbox" style="transform: scale(1.5);" id="ur"> User Roles</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="urr" value="add_user_role"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="urr" value="edit_user_role"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="urr" value="delete_user_role"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="urr" value="user_role_list"> View User Roles </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4> <input type="checkbox" style="transform: scale(1.5);" id="cust"> Customer</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="custlst" value="add_customer"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="custlst" value="edit_customer"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="custlst" value="delete_customer"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="custlst" value="customer_list"> View Customers </label>
                 </div>
               </div>

               <!-- <div class="col-md-3">
                 <h4> <input type="checkbox" style="transform: scale(1.5);" id="emp"> Employees</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="emplst" value="add_employees"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="emplst" value="edit_employees"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="emplst" value="delete_employees"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="emplst" value="employees_list"> View Employees </label>
                 </div>
               </div> -->

             </div>
             <hr>

             <div class="row">
               
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="sr"> Manage Holiday</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ser" value="add_holiday"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ser" value="edit_holiday"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ser" value="delete_holiday"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ser" value="holiday_list"> View Holiday List </label>
                 </div>
                  <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ser" value="bulk_holiday"> Bulk Holiday</label>
                 </div>
                 
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="bm"> Manage Leave</h4>
                
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="book" value="add_leave"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="book" value="edit_leave"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="book" value="delete_leave"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="book" value="leave_list"> View Leave List </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="book" value="leave_report"> Leave Report </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="car"> Project</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="project" value="add_project"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="project" value="edit_project"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="project" value="delete_project"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="project" value="project_list"> View Project List </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="project" value="project_view"> View Project </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="dm"> Manage Bugs</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="dri" value="add_bugs"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="dri" value="edit_bugs"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="dri" value="delete_bugs"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="dri" value="bugs_list"> View Bugs List </label>
                 </div>
               </div>

             </div>
             <hr>

             <div class="row">
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="dh"> Manage Tasks</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="doh" value="add_task"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="doh" value="edit_task"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="doh" value="delete_task"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="doh" value="task_list"> View Tasks List </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="rc"> Manage Lead</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="rcj" value="add_lead"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="rcj" value="edit_lead"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="rcj" value="delete_lead"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="rcj" value="lead_list"> View Lead List </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="rcj" value="lead_view"> View Lead </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="tm"> Templates</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="tc" value="add_template"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="tc" value="edit_template"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="tc" value="template_list"> View Templates </label>
                 </div>
               </div>
             </div>
             <hr>
             
             <div class="row">
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="wm"> Category</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="wal" value="add_category"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="wal" value="edit_category"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="wal" value="delete_category"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="wal" value="category_list"> View Category </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="cli"> Sub Category</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ct" value="add_subcategory"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ct" value="edit_subcategory"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ct" value="delete_subcategory"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ct" value="subcategory_list"> View Sub Category </label>
                 </div>
               </div>

                <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="home"> Child Category</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="hc" value="add_childcategory"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="hc" value="edit_childcategory"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="hc" value="delete_childcategory"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="hc" value="childcategory_list"> View Child Category </label>
                 </div>
               </div>

             </div>
             <hr>

             <div class="row">
              
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="advs"> Services</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="adv" value="add_service"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="adv" value="edit_service"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="adv" value="delete_service"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="adv" value="service_list"> View Services List </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="adv" value="service_request_list"> View Service Request List </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="cride"> Service Type</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="cr" value="add_service_type"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="cr" value="edit_service_type"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="cr" value="delete_service_type"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="cr" value="service_type_list"> View Service Type </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="bl"> Service Category</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="blog" value="add_service_category"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="blog" value="edit_service_category"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="cr" value="delete_service_category"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="blog" value="service_category_list"> View Service Category </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="au"> ToDo</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="about" value="add_todo"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="about" value="edit_todo"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="cr" value="delete_todo"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="about" value="todo_list"> View ToDo </label>
                 </div>
               </div>
             </div>
             <hr>
             <h4>Settings</h4>
             <div class="row">
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="cs"> Company Setting</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="com" value="edit_company_setting"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="com" value="company_setting_list"> View Company Setting </label>
                 </div>
               </div>
              
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="ba"> Email CC Setting</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ban" value="add_email_cc"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ban" value="edit_email_cc"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ban" value="delete_email_cc"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ban" value="email_cc_list"> View Email CC Setting </label>
                 </div>
               </div>
               
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="lo"> GST Setting</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="loc" value="add_gst"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="loc" value="edit_gst"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="loc" value="delete_gst"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="loc" value="gst_list"> View GST Setting </label>
                 </div>
               </div>
               
             </div>

             <hr>
             
             <div class="row">
               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="vreg"> Announcements</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="reg" value="add_announce"> Add </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="reg" value="edit_announce"> Edit </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="reg" value="delete_announce"> Delete </label>
                 </div>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="reg" value="announce_list"> View Announcements </label>
                 </div>
               </div>

               <div class="col-md-3">
                 <h4><input type="checkbox" style="transform: scale(1.5);" id="vrate"> Whatsapp</h4>
                 <div class="checkbox">
                   <label>
                     <input type="checkbox" class="checkbox" name="permss[]" id="ratechart" value="whatsapp_chat"> Whatsapp Chat </label>
                 </div>
               </div>
             </div>

           </div>
         </div>
     </div>
   </div>
 </div>
 <input type="hidden" name="permissions" id="permissions" />

 </form>
 <!--end page-content-wrapper-->
 </div>
 <!-- Include jQuery -->

 <!--<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>-->

 <!-- Include jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

 <!-- Include jQuery Validation Plugin -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

 <script>
   $(document).ready(function() {
     $("form").submit(function(e) {
       // Prevent the form from submitting immediately
       e.preventDefault();

       // Collect selected checkboxes' values
       var selectedPermissions = [];
       $("input[name='permss[]']:checked").each(function() {
         selectedPermissions.push($(this).val());
       });

       // Serialize the array to match the format required
       var serializedPermissions = serializePermissions(selectedPermissions);

       // Add the serialized value to a hidden input field to submit it with the form
       $("#permissions").val(serializedPermissions);

       // Submit the form
       this.submit();
     });

     // Function to serialize the permissions array to the desired format
     function serializePermissions(permissions) {
       var serialized = 'a:' + permissions.length + ':{';
       for (var i = 0; i < permissions.length; i++) {
         serialized += 'i:' + i + ';s:' + permissions[i].length + ':"' + permissions[i] + '";';
       }
       serialized += '}';
       return serialized;
     }


   });
 </script>
 <script type="text/javascript" language="javascript">
   // <![CDATA[
   function checkAll(formname, checktoggle) {

     var checkboxes = new Array();
     checkboxes = document[formname].getElementsByTagName('input');

     for (var i = 0; i < checkboxes.length; i++) {
       if (checkboxes[i].type == 'checkbox') {
         checkboxes[i].checked = checktoggle;
       }
     }
   }
 </script>


 <script>
   $(document).ready(function() {
     // Check All
     $("#chkall").click(function() {
       $("input[type='checkbox']").prop('checked', true);
     });

     // Uncheck All
     $("#unchkall").click(function() {
       $("input[type='checkbox']").prop('checked', false);
     });
   });
 </script>

 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/dist/js/admin.js"></script>

 <script type="text/javascript">
   function checkAll(formname, checktoggle) {
     var checkboxes = new Array();
     checkboxes = document[formname].getElementsByTagName('input');

     for (var i = 0; i < checkboxes.length; i++) {
       if (checkboxes[i].type == 'checkbox') {
         checkboxes[i].checked = checktoggle;
       }
     }
   }
 </script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#userc").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='u']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#userc").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='u']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#cm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='cat']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#cm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='cat']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#stg").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='stage']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#stg").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='stage']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#ur").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='urr']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#ur").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='urr']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#om").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='org']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#om").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='org']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#Of").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='Off']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#Of").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='Off']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#sr").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ser']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#sr").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ser']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#bm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='book']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#bm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='book']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#car").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='project']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#car").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='project']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#dm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='dri']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#dm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='dri']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#wm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='wal']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#wm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='wal']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#cs").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='com']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#cs").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='com']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#bl").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='blog']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#bl").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='blog']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#fl").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='foo']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#fl").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='foo']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#cust").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='custlst']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#cust").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='custlst']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#emp").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='emplst']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#emp").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='emplst']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#ba").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ban']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#ba").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ban']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#sb").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='sub']").prop('checked', !isChecked);
     });

     $("#sb").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='sub']").prop('checked', isChecked);
     });

   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#ky").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='key']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#ky").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='key']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#lo").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='loc']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#lo").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='loc']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#sl").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='subl']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#sl").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='subl']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#dh").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='doh']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#dh").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='doh']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#rc").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='rcj']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#rc").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='rcj']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#tm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='tc']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#tm").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='tc']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#cli").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ct']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#cli").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ct']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#home").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='hc']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#home").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='hc']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#advs").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='adv']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#advs").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='adv']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#cride").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='cr']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#cride").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='cr']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#au").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='about']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#au").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='about']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#vreg").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='reg']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#vreg").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='reg']").prop('checked', isChecked);
     });
   });
 </script>

 <script>
   $(document).ready(function() {
     // Check All
     $("#vrate").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ratechart']").prop('checked', !isChecked);
     });

     // Uncheck All
     $("#vrate").click(function() {
       var isChecked = $(this).prop('checked');
       $("input[type='checkbox'][id='ratechart']").prop('checked', isChecked);
     });
   });
 </script>