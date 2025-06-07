<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Alogin';
$route['alogin'] = 'Alogin';
$route['logout'] = 'Alogin/logout';
$route['checkvalidlogin'] = 'Alogin/validate_login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Attendance Controller

$route['admin'] = 'Admin';
$route['profile'] = 'Admin/profile';
$route['punch-in'] = 'Attendance';


// User Controller
$route['add-user'] = 'User/add_user'; 
$route['submit-user'] = 'User/submitUser';
$route['update-user'] = 'User/updateUser';
$route['user-list'] = 'User/user_list';
$route['edit-user/(:any)'] = 'User/edit_user/$1';
$route['deactive-user/(:any)'] = 'User/deactive_user/$1';
$route['active-user/(:any)'] = 'User/active_user/$1';
$route['reset-password'] = 'User/reset_password';


// Role Controller
$route['add-role'] = 'Roles/addRoles';
$route['submit-role'] = 'Roles/ajaxAddRoles';
$route['role-list'] = 'Roles/listRoles';
$route['edit-role/(:any)'] = 'Roles/rolesEdit/$1';
$route['update-role'] = 'Roles/rolesupdate';



// Customer Controller

$route['add-customer'] = 'Customer/add_customer';
$route['customer-list'] = 'Customer/customer_list';
$route['addcustomer'] = 'Customer/submitcustomer';
$route['update-customer/(:any)'] = 'Customer/updatecustomer/$1';
$route['edit-customer/(:any)'] = 'Customer/editcustomer/$1';
$route['status-customer/(:any)/(:any)'] = 'Customer/statuscustomer/$1/$2';
$route['get-customer'] = 'Admin/get_customer_list_by_name';


// Employee Controller
$route['employee-list'] = 'Employee/employee_list';
$route['edit-emp/(:any)'] = 'Employee/edit_emp/$1';
$route['add-emp-social-media'] = 'Employee/Save_Social';
$route['update-emp-details'] = 'Employee/update_emp_details';
$route['save-emp-address'] = 'Employee/save_emp_address';
$route['save-emp-education'] = 'Employee/save_emp_education';
$route['delete-emp-education'] = 'Employee/delete_emp_education';
$route['save-emp-experience'] = 'Employee/save_emp_experience';
$route['update-emp-bank-details'] = 'Employee/update_emp_bank_details';
$route['save-emp-documents'] = 'Employee/save_emp_documents';

// Leave Controller   
$route['holiday-list'] = 'Leave/holiday_list'; 
$route['add-holiday'] = 'Leave/add_holiday'; 
$route['update-holiday'] = 'Leave/update_holiday'; 
$route['leave-list'] = 'Leave/leave_list'; 
$route['submit-leave-application'] = 'Leave/submit_leave_application';
$route['update-leave-application'] = 'Leave/update_leave_application';
$route['approve-leave-application'] = 'Leave/approve_leave_application';
$route['reject-leave-application'] = 'Leave/reject_leave_application';
$route['leave-report'] = 'Leave/leave_report';
$route['filter-leave-report'] = 'Leave/filter_leave_report';
$route['bug-list'] = 'Bug/bug_list'; 
$route['add-bug'] = 'Bug/add_bug';
$route['import_excel'] = 'Leave/import_excel';
$route['export-holidays'] = 'Leave/export_holidays_excel';

//Project Controller
$route['project-list'] = 'Project/project_list';
$route['project-list/(:any)'] = 'Project/project_list/$1';
$route['add-project'] = 'Project/add_project';
$route['save-project'] = 'Project/save_project';
$route['edit-project/(:any)'] = 'Project/edit_project/$1';
$route['update-project'] = 'Project/update_project';
$route['view-project/(:any)'] = 'Project/viewproject/$1';
$route['update-project-milestone'] = 'Project/update_project_milestone';


//Task Controller
$route['task-list'] = 'Task/task_list';
$route['save-task'] = 'Task/save_task';
$route['get-assigned-developer'] = 'Task/get_assigned_developer';
$route['update-task'] = 'Task/update_task';

//Lead Controller
$route['lead-list'] = 'Lead/lead_list';
$route['qualified-lead'] = 'Lead/qualified_lead_list';
$route['proposal-sent-lead'] = 'Lead/proposal_sent_lead_list';
$route['converted-lead'] = 'Lead/converted_lead_list';
$route['lost-lead'] = 'Lead/lost_lead_list';
$route['add-lead'] = 'Lead/add_lead';
$route['save-lead'] = 'Lead/save_lead';
$route['walk-in-visit'] = 'Lead/walk_in_visit_list';
$route['visit-list'] = 'Lead/visit_list';
$route['edit-lead/(:any)'] = 'Lead/edit_lead/$1';
$route['view-lead/(:any)'] = 'Lead/view_lead/$1';
$route['update-lead'] = 'Lead/update_lead';
$route['feedback'] = 'Lead/feedback';
$route['save-feedback'] = 'Lead/save_feedback';
$route['ajaxLeadStatus'] = 'Lead/save_ajax_LeadStatus';
$route['get-leadStatus-list'] = 'Lead/getleadStatusList';
$route['ajaxLeadSource'] = 'Lead/save_ajax_LeadSource';
$route['get-leadSource-list'] = 'Lead/getleadSourceList';
$route['ajaxLeadMode'] = 'Lead/save_ajax_LeadMode';
$route['get-leadMode-list'] = 'Lead/getleadModeList';
$route['ajaxComPre'] = 'Lead/save_ajax_ComPre';
$route['get-ComPre-list'] = 'Lead/getComPreList';
$route['ajaxPartner'] = 'Lead/save_ajax_Partner';
$route['get-Partner-list'] = 'Lead/getPartnerList';
$route['lead-praposals/(:any)'] = 'Lead/add_lead_praposals/$1';
$route['save-praposals/(:any)'] = 'Lead/save_lead_praposals/$1';
$route['edit-praposals/(:any)'] = 'Lead/edit_praposals/$1';
$route['update-praposals/(:any)/(:any)'] = 'Lead/update_praposals/$1/$2';
$route['ajaxRequirement'] = 'Lead/save_ajax_Requirement';
$route['get-Requirement-list'] = 'Lead/getRequirementlist';
//$route['view-praposals/(:any)'] = 'Lead/view_praposals/$1';
$route['view-praposals/(:any)/(:any)'] = 'Lead/view_praposals/$1/$2';


//ToDo Controller
$route['todo-list'] = 'Todo/todo_list';
$route['add-todo'] = 'Todo/add_todo';
$route['save-todo'] = 'Todo/save_todo';
$route['edit-todo/(:any)'] = 'Todo/edit_todo/$1';
$route['update-todo'] = 'Todo/update_todo';

//Announcement Controller
$route['announcement'] = 'Announcement/announcement_list';
$route['add-announcement'] = 'Announcement/add_announcement';
$route['save-announcement'] = 'Announcement/save_announcement';
$route['edit-announcement/(:any)'] = 'Announcement/edit_announcement/$1';
$route['update-announcement'] = 'Announcement/update_announcement';

//Whatsapp Controller
$route['whatsapp'] = 'Whatsapp/whatsapp';

//Setting Controller
$route['company-settings'] = 'Settings/company_setting';
$route['save-company-setting'] = 'Settings/save_company_setting';


$route['process_form'] = 'Leave/process_form';

//Category Controller
$route['add-category'] = 'Category/add_category';
$route['add-sub-category'] = 'Category/add_sub_category';
$route['add-child-category'] = 'Category/add_child_category';
$route['submit-category'] = 'Category/save_new_category';
$route['editcat/(:any)'] = 'Category/editCategory/$1';
$route['update-category'] = 'Category/update_category';
$route['submitchildcategory'] = 'Category/save_child_category';
$route['childcategory'] = 'Category/add_child_category';
$route['editchildcategory/(:any)'] = 'Category/edit_child_category/$1';
$route['editsubcategory/(:any)'] = 'Category/edit_subcategory/$1';
$route['update-child-category'] = 'Category/update_child_category';
$route['submitsubcategory'] = 'Category/save_sub_category';
$route['editsubcat/(:any)'] = 'Category/edit_subcategory/$1';
$route['update-subcategory'] = 'Category/update_sub_category';
$route['ajaxcategory'] = 'Category/save_ajax_category';
$route['ajaxsubcategory'] = 'Category/save_ajax_subcategory';
$route['ajaxhsn'] = 'Product/save_ajax_hsn';
$route['ajaxunit'] = 'Product/save_ajax_unit';
$route['ajaxchildcategory'] = 'Category/save_ajax_childcategory';

//Template Controller
$route['add-template'] = 'Lead/add_template';
$route['list-template'] = 'Lead/template_list';
$route['addtemplate'] = 'Lead/submittemplate';
$route['edit-template/(:any)'] = 'Lead/edittemplate/$1';
$route['edit-master-template/(:any)'] = 'Lead/editMastertemplate/$1';
$route['update-template/(:any)'] = 'Lead/updatetemplate/$1';
$route['update-template-custom/(:any)'] = 'Lead/updatetemplateCustom/$1';
$route['delete-template/(:any)/(:any)'] = 'Lead/deletetemplate/$1/$2';
$route['customer-update-template/(:any)'] = 'Lead/updatecustomertemplate/$1';
$route['service-request-list'] = 'Product/service_request_list';
$route['status-template/(:any)/(:any)'] = 'Lead/status_template/$1/$2';
$route['update-master-template/(:any)'] = 'Lead/updateMastertemplate/$1';


//Product Controller

$route['add-product'] = 'Product/add_new_product';
$route['get-category-list'] = 'Product/getCategoryList';
$route['get-hsn-list'] = 'Product/getHsnList';
$route['get-unit-list'] = 'Product/getUnitList';
$route['submit-product'] = 'Product/submit_product';
$route['product-list'] = 'Product/product_list';
$route['delete-product'] = 'Product/delete_product';
$route['edit-product/(:any)'] = 'Product/edit_product/$1';
$route['get-edit-category-list'] = 'Product/getEditCategoryList';
$route['get-edit-subcategory-list'] = 'Product/getEditSubCategoryList';
$route['get-edit-childcategory-list'] = 'Product/getEditChildCategoryList';
$route['get-edit-hsn-list'] = 'Product/getEditHsnList';
$route['get-edit-unit-list'] = 'Product/getEditUnitList';
$route['update-product'] = 'Product/update_product';
$route['add-item-type'] = 'Product/addTypeOfItem';
$route['delete-item-type/(:any)'] = 'Product/delete_item_type/$1';
$route['edit-item-type/(:any)'] = 'Product/editItemType/$1';
$route['submit-item-type']= 'Product/submitItemType';
$route['add-item-category'] = 'Product/addItemCategory';
$route['submit-item-category']= 'Product/submitItemCategory';
$route['delete-item-category/(:any)'] = 'Product/delete_item_category/$1';
$route['edit-item-category/(:any)'] = 'Product/editItemCategory/$1';


