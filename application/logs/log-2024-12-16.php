<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-12-16 05:27:53 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2024-12-16 05:27:53 --> Unable to connect to the database
ERROR - 2024-12-16 05:28:33 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 09:59:18 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' - Invalid query: SELECT *
FROM `address`
WHERE `emp_id` = '•æ–+-¦\Z'
AND `type` = 'Permanent'
ERROR - 2024-12-16 11:10:30 --> Query error: Illegal mix of collations (latin1_swedish_ci,IMPLICIT) and (utf8_general_ci,COERCIBLE) for operation '=' - Invalid query: SELECT *
FROM `address`
WHERE `emp_id` = '†‰bu¬¥ŠË'
AND `type` = 'Permanent'
ERROR - 2024-12-16 06:40:57 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 06:46:47 --> 404 Page Not Found: Invoice-listhtml/index
ERROR - 2024-12-16 06:46:51 --> 404 Page Not Found: Contactshtml/index
ERROR - 2024-12-16 06:46:56 --> 404 Page Not Found: Invoice-listhtml/index
ERROR - 2024-12-16 07:06:39 --> 404 Page Not Found: Invoice-listhtml/index
ERROR - 2024-12-16 07:07:09 --> 404 Page Not Found: Leave-list/index
ERROR - 2024-12-16 07:25:57 --> Severity: error --> Exception: Call to a member function emselect() on null C:\xampp\htdocs\microlan_hr\application\controllers\Leave.php 138
ERROR - 2024-12-16 07:26:39 --> Severity: error --> Exception: Call to a member function emselect() on null C:\xampp\htdocs\microlan_hr\application\controllers\Leave.php 138
ERROR - 2024-12-16 07:26:59 --> Query error: Table 'microlan_hr.employee' doesn't exist - Invalid query: SELECT * FROM `employee` WHERE `status`='ACTIVE'
ERROR - 2024-12-16 07:28:37 --> Query error: Table 'microlan_hr.employee' doesn't exist - Invalid query: SELECT `emp_leave`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`,
      `leave_types`.`type_id`,`name`
      FROM `emp_leave`
      LEFT JOIN `employee` ON `emp_leave`.`em_id`=`employee`.`em_id`
      LEFT JOIN `leave_types` ON `emp_leave`.`typeid`=`leave_types`.`type_id`
      WHERE `emp_leave`.`leave_status`='Not Approve'
ERROR - 2024-12-16 07:44:01 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 07:44:05 --> Query error: Unknown table 'microlan_hr.lt' - Invalid query: SELECT op.*, el.*, lt.*
      FROM emp_leave el
      LEFT JOIN op_user op ON `op`.`op_user_id`=`el`.`emp_id`
      LEFT JOIN `leave_types` ON `emp_leave`.`typeid`=`leave_types`.`type_id`
      WHERE `emp_leave`.`leave_status`='Not Approve'
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 303
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 334
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 355
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 365
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 366
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 367
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 368
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 426
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\drivers\Session_files_driver.php 109
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 110
ERROR - 2024-12-16 07:44:50 --> Severity: Warning --> session_start(): Cannot start session when headers already sent C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 137
ERROR - 2024-12-16 07:45:35 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 303
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> session_set_cookie_params(): Cannot change session cookie parameters when headers already sent C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 334
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 355
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 365
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 366
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 367
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 368
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 426
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> ini_set(): Headers already sent. You cannot change the session module's ini settings at this time C:\xampp\htdocs\microlan_hr\system\libraries\Session\drivers\Session_files_driver.php 109
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> session_set_save_handler(): Cannot change save handler when headers already sent C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 110
ERROR - 2024-12-16 07:45:40 --> Severity: Warning --> session_start(): Cannot start session when headers already sent C:\xampp\htdocs\microlan_hr\system\libraries\Session\Session.php 137
ERROR - 2024-12-16 07:45:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'ON `emp_leave`.`typeid`=`leave_types`.`type_id`
      WHERE `emp_leave`.`leav...' at line 4 - Invalid query: SELECT op.*, el.*, lt.*
      FROM emp_leave el
      LEFT JOIN op_user op ON `op`.`op_user_id`=`el`.`emp_id`
      LEFT JOIN  ON `emp_leave`.`typeid`=`leave_types`.`type_id`
      WHERE `emp_leave`.`leave_status`='Not Approve'
ERROR - 2024-12-16 08:24:21 --> Query error: Unknown column 'id' in 'where clause' - Invalid query: UPDATE `emp_leave` SET `emp_id` = '25', `leave_type_id` = '2', `apply_date` = '2024-12-16', `start_date` = '2024-12-18', `end_date` = '', `leave_reason` = 'Ear Pain', `leave_type` = '2', `leave_duration` = 8, `leave_status` = 'Not Approve'
WHERE `id` = '1'
ERROR - 2024-12-16 08:34:46 --> 404 Page Not Found: Contactshtml/index
ERROR - 2024-12-16 10:48:28 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 10:51:36 --> 404 Page Not Found: Admin_assets/dist
ERROR - 2024-12-16 15:24:18 --> Query error: Unknown column 'project_status' in 'where clause' - Invalid query: SELECT * from project Where project_status = 1 
                            and op_user_id = 22 and role_id = 2
ERROR - 2024-12-16 15:27:48 --> Query error: Unknown column 'project_status' in 'where clause' - Invalid query: SELECT * from project Where project_status = 1 
                            and op_user_id = 22 and role_id = 2
ERROR - 2024-12-16 15:55:32 --> Query error: Unknown column 'bill_street' in 'field list' - Invalid query: INSERT INTO `project` (`project_name`, `project_code`, `project_type_id`, `project_status_id`, `project_start_date`, `estimated_completion_date`, `project_client_name`, `project_client_contact`, `project_description`, `bill_street`, `bill_country`, `bill_state`, `bill_zip_code`, `shipping_street`, `shipping_country`, `shipping_state`, `shipping_zip_code`) VALUES ('dev crm', '123', '1', '2', '2024-12-16', '2024-12-28', 'Navin', '2233223223', '', '', '', 'Select State', '', '', '', 'Select State', '')
ERROR - 2024-12-16 15:56:20 --> Query error: Unknown column 'bill_street' in 'field list' - Invalid query: INSERT INTO `project` (`project_name`, `project_code`, `project_type_id`, `project_status_id`, `project_start_date`, `estimated_completion_date`, `project_client_name`, `project_client_contact`, `project_description`, `bill_street`, `bill_country`, `bill_state`, `bill_zip_code`, `shipping_street`, `shipping_country`, `shipping_state`, `shipping_zip_code`) VALUES ('dev crm', '123', '1', '2', '2024-12-16', '2024-12-28', 'Navin', '2233223223', '', '', '', 'Select State', '', '', '', 'Select State', '')
ERROR - 2024-12-16 12:44:49 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 12:51:34 --> 404 Page Not Found: Contactshtml/index
ERROR - 2024-12-16 13:58:42 --> 404 Page Not Found: Lead-listphp/index
ERROR - 2024-12-16 14:57:46 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2024-12-16 14:57:46 --> Unable to connect to the database
ERROR - 2024-12-16 14:58:00 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 16:33:14 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2024-12-16 16:33:14 --> Unable to connect to the database
ERROR - 2024-12-16 16:33:24 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-16 16:34:38 --> 404 Page Not Found: Assets/css
ERROR - 2024-12-16 16:35:30 --> 404 Page Not Found: Assets/css
ERROR - 2024-12-16 16:36:09 --> 404 Page Not Found: Assets/css
ERROR - 2024-12-16 21:29:07 --> Query error: Unknown column 'id' in 'field list' - Invalid query: INSERT INTO `task` (`project_id`, `emp_id`, `task_title`, `start_date`, `end_date`, `task_description`, `task_priority`, `development_status`, `id`) VALUES ('2', '25', 'Admin Panel', '2024-12-18', '2024-12-28', 'Admin all modules', 'High', 'Pending', '')
ERROR - 2024-12-16 21:29:36 --> Query error: Unknown column 'id' in 'field list' - Invalid query: INSERT INTO `task` (`project_id`, `emp_id`, `task_title`, `start_date`, `end_date`, `task_description`, `task_priority`, `development_status`, `id`) VALUES ('2', '25', 'Admin Panel', '2024-12-18', '2024-12-28', 'Admin all modules', 'High', 'Pending', '')
ERROR - 2024-12-16 21:57:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 2 - Invalid query: SELECT * from op_user
                    Where op_user_id = 
ERROR - 2024-12-16 22:01:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 2 - Invalid query: SELECT * from op_user
                    Where op_user_id = 
ERROR - 2024-12-16 17:49:38 --> 404 Page Not Found: Lead-listphp/index
ERROR - 2024-12-16 17:55:51 --> 404 Page Not Found: Loginhtml/index
