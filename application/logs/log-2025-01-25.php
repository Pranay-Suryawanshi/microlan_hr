<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-01-25 07:17:05 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-25 09:35:35 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-25 12:02:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 16:32:55 --> Query error: Column 'marketing_person_id' cannot be null - Invalid query: INSERT INTO `project` (`project_name`, `project_code`, `project_type_id`, `project_status_id`, `project_start_date`, `estimated_completion_date`, `project_client_id`, `project_manager`, `project_developer`, `project_description`, `marketing_person_id`, `customer_name`, `customer_no`, `project_handover_date`) VALUES ('Project4', 'PRO004', '3', '1', '2025-01-29', '2025-02-26', '7', '27', '22,24', 'Dynamic website development project ', NULL, 'Customer1', '9899009878', '2025-03-04')
ERROR - 2025-01-25 12:03:06 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 12:03:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 12:03:20 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 12:04:39 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 12:15:35 --> 404 Page Not Found: Edit-project/2
ERROR - 2025-01-25 12:44:01 --> 404 Page Not Found: Edit-project/2
ERROR - 2025-01-25 17:28:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Where p.project_id =' at line 16 - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
        LEFT JOIN 
         project_type_tbl pt ON pt.pt_id = p.project_type_id
        LEFT JOIN 
        project_status_tbl ps ON ps.ps_id = p.project_status_id
        LEFT JOIN 
        customer c ON c.cust_id = p.project_client_id
        LEFT JOIN 
        op_user op ON op.op_user_id = p.project_manager
        LEFT JOIN 
       op_user op1 ON FIND_IN_SET(op1.op_user_id, p.project_developer)
       LEFT JOIN 
       op_user op2 ON FIND_IN_SET(op2.op_user_id, p.marketing_person_id)
      GROUP BY 
       p.project_id;
        Where p.project_id = 
ERROR - 2025-01-25 17:29:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Where p.project_id = 4' at line 16 - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
        LEFT JOIN 
         project_type_tbl pt ON pt.pt_id = p.project_type_id
        LEFT JOIN 
        project_status_tbl ps ON ps.ps_id = p.project_status_id
        LEFT JOIN 
        customer c ON c.cust_id = p.project_client_id
        LEFT JOIN 
        op_user op ON op.op_user_id = p.project_manager
        LEFT JOIN 
       op_user op1 ON FIND_IN_SET(op1.op_user_id, p.project_developer)
       LEFT JOIN 
       op_user op2 ON FIND_IN_SET(op2.op_user_id, p.marketing_person_id)
      GROUP BY 
       p.project_id;
        Where p.project_id = 4
ERROR - 2025-01-25 17:29:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Where p.project_id = 4' at line 16 - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
        LEFT JOIN 
         project_type_tbl pt ON pt.pt_id = p.project_type_id
        LEFT JOIN 
        project_status_tbl ps ON ps.ps_id = p.project_status_id
        LEFT JOIN 
        customer c ON c.cust_id = p.project_client_id
        LEFT JOIN 
        op_user op ON op.op_user_id = p.project_manager
        LEFT JOIN 
       op_user op1 ON FIND_IN_SET(op1.op_user_id, p.project_developer)
       LEFT JOIN 
       op_user op2 ON FIND_IN_SET(op2.op_user_id, p.marketing_person_id)
      GROUP BY 
       p.project_id;
        Where p.project_id = 4
ERROR - 2025-01-25 17:32:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Where p.project_id = 4' at line 16 - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
        LEFT JOIN 
         project_type_tbl pt ON pt.pt_id = p.project_type_id
        LEFT JOIN 
        project_status_tbl ps ON ps.ps_id = p.project_status_id
        LEFT JOIN 
        customer c ON c.cust_id = p.project_client_id
        LEFT JOIN 
        op_user op ON op.op_user_id = p.project_manager
        LEFT JOIN 
       op_user op1 ON FIND_IN_SET(op1.op_user_id, p.project_developer)
       LEFT JOIN 
       op_user op2 ON FIND_IN_SET(op2.op_user_id, p.marketing_person_id)
      GROUP BY 
       p.project_id;
        Where p.project_id = 4
ERROR - 2025-01-25 13:08:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:10:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:15:49 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:18:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:18:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:20:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:23:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:25:41 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:26:53 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:33:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:36:28 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:36:57 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:37:53 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:40:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:43:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-25 13:43:52 --> 404 Page Not Found: Assets/css
