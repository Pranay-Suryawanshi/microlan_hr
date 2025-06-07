<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2024-12-27 00:42:56 --> Query error: Unknown column 'op_user_id' in 'field list' - Invalid query: INSERT INTO `todo` (`op_user_id`, `role_id`, `task_id`, `actual_start_time`, `estimate_date`, `estimate_end_date`, `estimate_start_time`, `estimate_end_time`, `actual_end_time`, `pause_time`, `todo_status`) VALUES ('1', '1', '2', '02:45', '2024-12-28', '2024-12-29', '02:42', '05:42', '03:45', '02:47', 'Progress')
ERROR - 2024-12-27 05:28:00 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2024-12-27 05:28:00 --> Unable to connect to the database
ERROR - 2024-12-27 05:31:49 --> Severity: Warning --> mysqli::real_connect(): (HY000/2002): No connection could be made because the target machine actively refused it.
 C:\xampp\htdocs\microlan_hr\system\database\drivers\mysqli\mysqli_driver.php 211
ERROR - 2024-12-27 05:31:49 --> Unable to connect to the database
ERROR - 2024-12-27 06:21:44 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-27 08:30:10 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-27 09:29:38 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-27 14:01:29 --> Query error: Unknown column 'td.task_id' in 'on clause' - Invalid query: SELECT td.*, t.* FROM todo td
                Left join task t on t.task_id = td.task_id
ERROR - 2024-12-27 14:02:06 --> Query error: Unknown column 'td.task_id' in 'on clause' - Invalid query: SELECT td.*, t.* FROM todo td
                Left join task t on t.task_id = td.task_id
ERROR - 2024-12-27 13:20:29 --> 404 Page Not Found: Vertical/assets
ERROR - 2024-12-27 18:08:34 --> Query error: Unknown column 'c.custid_id' in 'on clause' - Invalid query: SELECT fd.*, p.*, c.* FROM feedback fd
                    Left join project p on p.project_id = fd.project_id
                    Left join customer c on c.custid_id = fd.customer_id
