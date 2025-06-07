<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-12-17 05:42:51 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2024-12-17 05:42:51 --> Unable to connect to the database
ERROR - 2024-12-17 05:42:55 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2024-12-17 05:42:55 --> Unable to connect to the database
ERROR - 2024-12-17 05:55:19 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-17 05:55:25 --> 404 Page Not Found: Lead-listphp/index
ERROR - 2024-12-17 06:35:24 --> 404 Page Not Found: Lead-listphp/index
ERROR - 2024-12-17 06:36:20 --> 404 Page Not Found: List-templatephp/index
ERROR - 2024-12-17 06:39:54 --> 404 Page Not Found: Lead-listphp/index
ERROR - 2024-12-17 06:39:56 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-17 06:40:18 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-17 06:40:20 --> Severity: error --> Exception: syntax error, unexpected '?>', expecting function (T_FUNCTION) or const (T_CONST) C:\xampp\htdocs\microlan_hr\application\controllers\Lead.php 59
ERROR - 2024-12-17 06:42:11 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-17 11:20:11 --> Query error: Table 'microlan_hr.lead_status' doesn't exist - Invalid query: SELECT *
FROM `lead_status`
WHERE `status` = '1'
ERROR - 2024-12-17 11:20:11 --> Query error: Table 'microlan_hr.lead_status' doesn't exist - Invalid query: SELECT *
FROM `lead_status`
WHERE `status` = '1'
ERROR - 2024-12-17 11:27:35 --> Query error: Table 'microlan_hr.lead_source' doesn't exist - Invalid query: SELECT *
FROM `lead_source`
WHERE `source_status` = '1'
ERROR - 2024-12-17 11:28:25 --> Severity: error --> Exception: Call to a member function get_last_serial_number() on null C:\xampp\htdocs\microlan_hr\application\controllers\Lead.php 64
ERROR - 2024-12-17 11:50:40 --> Query error: Table 'microlan_hr.property_type' doesn't exist - Invalid query: SELECT *
FROM `property_type`
WHERE `pt_status` = '1'
ERROR - 2024-12-17 12:10:49 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `lead` (`op_user_id`, `role_id`, `lead_number`, `lead_date`, `lead_mode`, `lead_type_id`, `lead_status_id`, `contact_phone`, `contact_fullname`, `contact_email`, `contact_company`, `contact_jobtitle`, `lead_source_id`, `communication_pref`, `communication_time`, `business_type_id`, `project_id`, `possession_expected_period`, `budget_range`, `special_requirement`, `bill_street`, `bill_country`, `bill_state`, `bill_zip_code`, `shipping_street`, `shipping_country`, `shipping_state`, `shipping_zip_code`) VALUES ('1', '1', '1', '2024-12-17', 'Pre Qualified', '1', '1', '9737940696', 'krutika patel', 'pk@gmail.com', 'C-706, Akshar Estonia, plot 41, sector 47, Opp Dronagiri Railway Station', '', '1', 'WhatsApp', '12:10', '1', Array, '11 days', '25000', 'hello', '', '', 'Select State', '', '', '', 'Select State', '')
ERROR - 2024-12-17 12:24:40 --> Query error: Table 'microlan_hr.leads' doesn't exist - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM leads l
                Left join lead_type lt on p.lt_id = l.lead_type_id
                Left join lead_status ls on ls.is_id = l.lead_status_id
                Left join lead_source s on s.source_id = l.lead_source_id
                Left join project p on p.project_id = l.project_id
                Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id
ERROR - 2024-12-17 12:26:22 --> Query error: Unknown column 'p.lt_id' in 'on clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                Left join lead_type lt on p.lt_id = l.lead_type_id
                Left join lead_status ls on ls.is_id = l.lead_status_id
                Left join lead_source s on s.source_id = l.lead_source_id
                Left join project p on p.project_id = l.project_id
                Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id
ERROR - 2024-12-17 08:11:24 --> 404 Page Not Found: Walk-in-visit/index
ERROR - 2024-12-17 12:53:20 --> Severity: error --> Exception: syntax error, unexpected end of file C:\xampp\htdocs\microlan_hr\application\views\admin\lead\edit_lead.php 343
ERROR - 2024-12-17 08:32:05 --> 404 Page Not Found: Contactshtml/index
ERROR - 2024-12-17 09:23:50 --> Severity: error --> Exception: Call to a member function input() on null C:\xampp\htdocs\microlan_hr\application\controllers\Leave.php 285
ERROR - 2024-12-17 09:50:30 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:51:05 --> Severity: error --> Exception: Call to undefined method Model::Add_Bug() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 94
ERROR - 2024-12-17 09:52:01 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:52:55 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:53:10 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:53:37 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:53:45 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:53:51 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:54:44 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:55:51 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 09:55:55 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 10:03:17 --> Severity: error --> Exception: Call to undefined method Model::GetBugValue() C:\xampp\htdocs\microlan_hr\application\controllers\Bug.php 120
ERROR - 2024-12-17 10:22:25 --> 404 Page Not Found: Loginhtml/index
ERROR - 2024-12-17 12:11:27 --> 404 Page Not Found: Settings/company_settings
ERROR - 2024-12-17 16:41:36 --> Severity: error --> Exception: Too few arguments to function Model::partialView(), 2 passed in C:\xampp\htdocs\microlan_hr\application\controllers\Settings.php on line 47 and exactly 3 expected C:\xampp\htdocs\microlan_hr\application\models\Model.php 9
ERROR - 2024-12-17 12:14:06 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:14:07 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:14:56 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:14:57 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:15:09 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:15:10 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:33:11 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:35:21 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:35:49 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2024-12-17 12:36:00 --> 404 Page Not Found: Uploads/380568018images.jpg
ERROR - 2024-12-17 12:36:00 --> 404 Page Not Found: Upload/380568018images.jpg
ERROR - 2024-12-17 12:36:00 --> 404 Page Not Found: Uploads/1999384565download.jpg
ERROR - 2024-12-17 12:36:00 --> 404 Page Not Found: Upload/380568018images.jpg
ERROR - 2024-12-17 12:37:05 --> 404 Page Not Found: Upload/380568018images.jpg
ERROR - 2024-12-17 12:37:05 --> 404 Page Not Found: Uploads/1999384565download.jpg
ERROR - 2024-12-17 12:37:05 --> 404 Page Not Found: Uploads/1999384565download.jpg
ERROR - 2024-12-17 12:37:05 --> 404 Page Not Found: Upload/380568018images.jpg
ERROR - 2024-12-17 12:37:28 --> 404 Page Not Found: Upload/380568018images.jpg
ERROR - 2024-12-17 12:42:38 --> 404 Page Not Found: Upload/380568018images.jpg
