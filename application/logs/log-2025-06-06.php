<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-06 07:37:18 --> Severity: error --> Exception: Call to undefined method Leave_model::GetLeaveInfoByUser() D:\xampp\htdocs\microlan_hr\application\controllers\Leave.php 270
ERROR - 2025-06-06 07:41:48 --> Query error: Table 'microlan_hr.leave_list' doesn't exist - Invalid query: SELECT *
FROM `leave_list`
WHERE `emp_id` = '31'
ERROR - 2025-06-06 07:42:05 --> Query error: Table 'microlan_hr.leave_table' doesn't exist - Invalid query: SELECT *
FROM `leave_table`
WHERE `emp_id` = '31'
ERROR - 2025-06-06 08:43:05 --> Query error: Unknown column 'emp_leave.id' in 'order clause' - Invalid query: SELECT `emp_leave`.*, `op_user`.`user_name`
FROM `emp_leave`
LEFT JOIN `op_user` ON `op_user`.`op_user_id` = `emp_leave`.`emp_id`
WHERE `emp_id` = '31'
ORDER BY `emp_leave`.`id` DESC
ERROR - 2025-06-06 08:55:59 --> Query error: Unknown column 'emp_leave.id' in 'order clause' - Invalid query: SELECT `emp_leave`.*, `op_user`.`user_name`
FROM `emp_leave`
LEFT JOIN `op_user` ON `op_user`.`op_user_id` = `emp_leave`.`emp_id`
WHERE `emp_id` = '31'
ORDER BY `emp_leave`.`id` DESC
ERROR - 2025-06-06 09:01:17 --> Query error: Unknown column 'emp_leave.leave_id' in 'order clause' - Invalid query: SELECT `emp_leave`.*, `op_user`.`user_name`
FROM `emp_leave`
LEFT JOIN `op_user` ON `op_user`.`op_user_id` = `emp_leave`.`emp_id`
WHERE `emp_leave`.`emp_id` = '31'
ORDER BY `emp_leave`.`leave_id` DESC
ERROR - 2025-06-06 09:06:35 --> Severity: error --> Exception: Call to undefined method Leave_model::GetLeaveInfoByUser() D:\xampp\htdocs\microlan_hr\application\controllers\Leave.php 270
ERROR - 2025-06-06 12:32:09 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-06 12:41:11 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-06 12:43:59 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-06 12:44:13 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-06 13:03:54 --> Severity: error --> Exception: Call to undefined method Leave_model::AllLeaveAPPlication() D:\xampp\htdocs\microlan_hr\application\controllers\Leave.php 266
ERROR - 2025-06-06 13:36:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-06-06 14:29:19 --> 404 Page Not Found: Assets/css
