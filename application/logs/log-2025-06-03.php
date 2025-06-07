<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-03 07:24:03 --> Query error: Table 'microlan_hr.company_setting' doesn't exist in engine - Invalid query: SELECT *
FROM `company_setting`
ERROR - 2025-06-03 07:24:03 --> Query error: Table 'microlan_hr.company_setting' doesn't exist in engine - Invalid query: SELECT *
FROM `company_setting`
ERROR - 2025-06-03 07:25:40 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 07:25:40 --> Unable to connect to the database
ERROR - 2025-06-03 07:26:53 --> Query error: Table 'microlan_hr.company_setting' doesn't exist in engine - Invalid query: SELECT *
FROM `company_setting`
ERROR - 2025-06-03 07:48:06 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'microlan_hr' D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 07:48:06 --> Unable to connect to the database
ERROR - 2025-06-03 08:22:42 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:22:42 --> Unable to connect to the database
ERROR - 2025-06-03 08:22:45 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:22:45 --> Unable to connect to the database
ERROR - 2025-06-03 08:23:22 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:23:22 --> Unable to connect to the database
ERROR - 2025-06-03 08:23:41 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:23:41 --> Unable to connect to the database
ERROR - 2025-06-03 08:23:42 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'root'@'localhost' (using password: NO) D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:23:42 --> Unable to connect to the database
ERROR - 2025-06-03 08:24:31 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'microlan_hr' D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:24:31 --> Unable to connect to the database
ERROR - 2025-06-03 11:56:00 --> Query error: Unknown column 'a.punch_in_status' in 'field list' - Invalid query: SELECT `e`.`user_name` AS `employee_name`, SUM(CASE WHEN a.punch_in_status = 1 THEN 1 ELSE 0 END) AS attended, SUM(CASE WHEN a.punch_out_status = 1 THEN 1 ELSE 0 END) AS not_attended, SUM(CASE WHEN a.half_day = 1 THEN 1 ELSE 0 END) AS half_day
FROM `op_user` `e`
LEFT JOIN `attendance_log` `a` ON `e`.`op_user_id` = `a`.`attendance_log_emp_id` AND `a`.`attendance_year` = '2025'  AND `a`.`attendance_month` = 'June'
WHERE `e`.`role_id` != 1
GROUP BY `e`.`op_user_id`
ORDER BY `e`.`op_user_id` ASC
ERROR - 2025-06-03 12:07:22 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:07:24 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:08:05 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:08:06 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:08:06 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:08:06 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:08:06 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:08:07 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:12:26 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:12:26 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:12:27 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 12:12:28 --> Query error: Table 'microlan_hr1.op_user' doesn't exist in engine - Invalid query: SELECT *
            FROM op_user 
            WHERE op_user_id = 1
ERROR - 2025-06-03 08:44:44 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'microlan_hr1' D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:44:44 --> Unable to connect to the database
ERROR - 2025-06-03 08:44:46 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'microlan_hr1' D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:44:46 --> Unable to connect to the database
ERROR - 2025-06-03 08:44:46 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'microlan_hr1' D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:44:46 --> Unable to connect to the database
ERROR - 2025-06-03 08:44:46 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'microlan_hr1' D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 08:44:46 --> Unable to connect to the database
ERROR - 2025-06-03 12:14:55 --> Query error: Unknown column 'a.punch_in_status' in 'field list' - Invalid query: SELECT `e`.`user_name` AS `employee_name`, SUM(CASE WHEN a.punch_in_status = 1 THEN 1 ELSE 0 END) AS attended, SUM(CASE WHEN a.punch_out_status = 1 THEN 1 ELSE 0 END) AS not_attended, SUM(CASE WHEN a.half_day = 1 THEN 1 ELSE 0 END) AS half_day
FROM `op_user` `e`
LEFT JOIN `attendance_log` `a` ON `e`.`op_user_id` = `a`.`attendance_log_emp_id` AND `a`.`attendance_year` = '2025'  AND `a`.`attendance_month` = 'June'
WHERE `e`.`role_id` != 1
GROUP BY `e`.`op_user_id`
ORDER BY `e`.`op_user_id` ASC
ERROR - 2025-06-03 09:11:09 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:14:01 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:15:06 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 09:15:06 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 09:15:31 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:15:57 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:16:03 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:16:24 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:16:40 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:16:57 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:17:08 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 09:17:08 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 09:19:01 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 09:19:01 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 09:19:25 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:19:39 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:19:53 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:19:55 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:20:19 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:20:36 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:24:37 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:25:19 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:26:06 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:27:19 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:27:45 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:28:53 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:29:14 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:30:34 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:32:06 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:32:35 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:35:58 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:38:51 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:39:50 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:40:43 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:41:42 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 09:41:42 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 09:42:05 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 09:42:05 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 09:43:43 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 09:43:43 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 09:47:33 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:49:01 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:49:10 --> 404 Page Not Found: Uploads/announcement
ERROR - 2025-06-03 09:49:10 --> 404 Page Not Found: Uploads/announcement
ERROR - 2025-06-03 09:49:10 --> 404 Page Not Found: Uploads/announcement
ERROR - 2025-06-03 09:49:15 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:49:15 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:49:15 --> 404 Page Not Found: Gi_DckOUM5apng/index
ERROR - 2025-06-03 09:49:15 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 09:49:52 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:49:52 --> 404 Page Not Found: Gi_DckOUM5apng/index
ERROR - 2025-06-03 09:50:02 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:50:02 --> 404 Page Not Found: Gi_DckOUM5apng/index
ERROR - 2025-06-03 09:50:33 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:50:48 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:55:11 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:55:25 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:55:32 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:55:59 --> 404 Page Not Found: Edit-role/index
ERROR - 2025-06-03 09:58:11 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:58:36 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:58:51 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:59:07 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 09:59:18 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:59:36 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 09:59:52 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:00:44 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:03:50 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:04:37 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 10:04:43 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:05:02 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:08:51 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:22:55 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:25:00 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:26:24 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:27:45 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:37:38 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:38:16 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 10:38:26 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:25:07 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 11:25:07 --> Unable to connect to the database
ERROR - 2025-06-03 11:25:18 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-03 11:25:18 --> Unable to connect to the database
ERROR - 2025-06-03 11:25:39 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:28:41 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:28:53 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:29:03 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:29:30 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:46:07 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:46:32 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 11:46:32 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 11:47:42 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:48:10 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 11:48:49 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 12:14:26 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 12:20:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-03 12:23:55 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 12:27:48 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 12:28:10 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 12:28:16 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:06:28 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:15:56 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:16:07 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:18:52 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:19:07 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:19:44 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:19:44 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:29:48 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:29:48 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:30:03 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:30:03 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:08 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:08 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:09 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:09 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:09 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:09 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:09 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:09 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:10 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:10 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:10 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:10 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:10 --> 404 Page Not Found: Upload/logo.png
ERROR - 2025-06-03 13:35:10 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:40 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:35:40 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:36:32 --> 404 Page Not Found: Assets/images
ERROR - 2025-06-03 13:36:32 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:36:51 --> 404 Page Not Found: %20assets/images
ERROR - 2025-06-03 13:36:51 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:36:51 --> 404 Page Not Found: %20assets/images
ERROR - 2025-06-03 13:36:51 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:39:15 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:34 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:42 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:46 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:47 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:48 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:48 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:55 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:56 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:57 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:39:57 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:40:03 --> 404 Page Not Found: Uploads/logo.png
ERROR - 2025-06-03 13:40:59 --> 404 Page Not Found: Images/logo.png
ERROR - 2025-06-03 13:41:00 --> 404 Page Not Found: Images/logo.png
ERROR - 2025-06-03 13:41:00 --> 404 Page Not Found: Images/logo.png
ERROR - 2025-06-03 13:41:00 --> 404 Page Not Found: Images/logo.png
ERROR - 2025-06-03 13:41:23 --> 404 Page Not Found: Images/logo.png
ERROR - 2025-06-03 13:47:19 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:48:13 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:48:27 --> 404 Page Not Found: Upload/profile
ERROR - 2025-06-03 13:54:13 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:59:00 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 13:59:14 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 14:00:02 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 14:00:12 --> 404 Page Not Found: Uploads/profile
ERROR - 2025-06-03 14:33:31 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 14:45:50 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-03 14:48:07 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-03 14:48:37 --> 404 Page Not Found: Assets/dist
