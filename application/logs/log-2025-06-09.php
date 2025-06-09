<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-09 08:29:49 --> Query error: Unknown column 'leave_types.leave_type_name' in 'field list' - Invalid query: SELECT `emp_leave`.*, `op_user`.`user_name`, `leave_types`.`leave_type_name`
FROM `emp_leave`
LEFT JOIN `op_user` ON `op_user`.`op_user_id` = `emp_leave`.`emp_id`
LEFT JOIN `leave_types` ON `leave_types`.`type_id` = `emp_leave`.`leave_type_id`
WHERE `emp_leave`.`emp_id` = '31'
ORDER BY `emp_leave`.`leave_added_on` DESC
ERROR - 2025-06-09 12:09:33 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-09 12:09:33 --> Unable to connect to the database
ERROR - 2025-06-09 14:56:55 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 D:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2025-06-09 14:56:55 --> Unable to connect to the database
