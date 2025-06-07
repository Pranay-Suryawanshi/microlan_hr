<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-01-24 06:25:47 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-24 06:28:21 --> 404 Page Not Found: Gi_DckOUM5apng/index
ERROR - 2025-01-24 06:28:22 --> 404 Page Not Found: Assets/images
ERROR - 2025-01-24 06:34:51 --> 404 Page Not Found: Project-list/Mg==
ERROR - 2025-01-24 06:38:57 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-24 06:49:13 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-24 07:08:20 --> 404 Page Not Found: Project-list/MQ==
ERROR - 2025-01-24 07:08:24 --> 404 Page Not Found: Project-list/all
ERROR - 2025-01-24 07:32:33 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 12:02:38 --> Query error: Table 'microlan_hr.dev' doesn't exist - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(dev.op_user_name) AS developer_names FROM  project p
            LEFT JOIN 
             project_type_tbl pt ON pt.pt_id = p.project_type_id
            LEFT JOIN 
            project_status_tbl ps ON ps.ps_id = p.project_status_id
            LEFT JOIN 
            customer c ON c.cust_id = p.project_client_id
            LEFT JOIN 
            op_user op ON op.op_user_id = p.project_manager
            LEFT JOIN 
           dev ON FIND_IN_SET(dev.op_user_id, p.project_developer_id)
          GROUP BY 
           p.project_id;
ERROR - 2025-01-24 12:02:42 --> Query error: Table 'microlan_hr.dev' doesn't exist - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(dev.op_user_name) AS developer_names FROM  project p
            LEFT JOIN 
             project_type_tbl pt ON pt.pt_id = p.project_type_id
            LEFT JOIN 
            project_status_tbl ps ON ps.ps_id = p.project_status_id
            LEFT JOIN 
            customer c ON c.cust_id = p.project_client_id
            LEFT JOIN 
            op_user op ON op.op_user_id = p.project_manager
            LEFT JOIN 
           dev ON FIND_IN_SET(dev.op_user_id, p.project_developer_id)
          GROUP BY 
           p.project_id;
ERROR - 2025-01-24 12:05:13 --> Query error: Table 'microlan_hr.dev' doesn't exist - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(op_user.user_name) AS developer_names FROM  project p
            LEFT JOIN 
             project_type_tbl pt ON pt.pt_id = p.project_type_id
            LEFT JOIN 
            project_status_tbl ps ON ps.ps_id = p.project_status_id
            LEFT JOIN 
            customer c ON c.cust_id = p.project_client_id
            LEFT JOIN 
            op_user op ON op.op_user_id = p.project_manager
            LEFT JOIN 
           dev ON FIND_IN_SET(op.op_user_id, p.project_developer)
          GROUP BY 
           p.project_id;
ERROR - 2025-01-24 07:35:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 12:06:11 --> Query error: Table 'microlan_hr.dev' doesn't exist - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(op_user.user_name) AS developer_names FROM  project p
            LEFT JOIN 
             project_type_tbl pt ON pt.pt_id = p.project_type_id
            LEFT JOIN 
            project_status_tbl ps ON ps.ps_id = p.project_status_id
            LEFT JOIN 
            customer c ON c.cust_id = p.project_client_id
            LEFT JOIN 
            op_user op ON op.op_user_id = p.project_manager
            LEFT JOIN 
           dev ON FIND_IN_SET(op.op_user_id, p.project_developer)
          GROUP BY 
           p.project_id;
ERROR - 2025-01-24 12:07:21 --> Query error: Unknown column 'op_user.user_name' in 'field list' - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(op_user.user_name) AS developer_names FROM  project p
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
          GROUP BY 
           p.project_id;
ERROR - 2025-01-24 07:38:38 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 07:40:00 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:02:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:03:00 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:03:07 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:13:15 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:20:11 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:20:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:20:36 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:20:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:20:50 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:21:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:25:04 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:26:22 --> 404 Page Not Found: Add-role/index
ERROR - 2025-01-24 08:26:51 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:29:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:29:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:29:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:30:06 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:30:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:32:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:32:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:37:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:40:09 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:40:35 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:46:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:46:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:48:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:48:46 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:52:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:52:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:52:36 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:52:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:52:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 08:53:15 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:02:58 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:03:10 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:06:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:06:27 --> Query error: Column 'is_ho_user' cannot be null - Invalid query: INSERT INTO `op_user_role` (`role_name`, `is_ho_user`, `permission`) VALUES ('Test role', NULL, '')
ERROR - 2025-01-24 09:06:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:06:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:06:49 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:07:34 --> Query error: Column 'is_ho_user' cannot be null - Invalid query: INSERT INTO `op_user_role` (`role_name`, `is_ho_user`, `permission`) VALUES ('Test Role', NULL, 'a:3:{i:0;s:9:\"user_list\";i:1;s:14:\"user_role_list\";i:2;s:13:\"employee_list\";}')
ERROR - 2025-01-24 09:07:35 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:08:39 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:08:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:16:03 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:16:38 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:19:22 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:19:41 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:21:51 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:22:59 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:23:03 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:23:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:24:50 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:25:13 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:27:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:28:06 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:32:46 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:33:42 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:35:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:36:08 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:36:50 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:40:25 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:40:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:41:39 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:46:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:47:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:51:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:52:15 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:53:01 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:57:53 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 09:58:27 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:12:11 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:12:34 --> Query error: Unknown column 'permissions' in 'field list' - Invalid query: INSERT INTO `op_user_role` (`role_name`, `permissions`) VALUES ('Test Role', NULL)
ERROR - 2025-01-24 10:12:34 --> Query error: Unknown column 'permissions' in 'field list' - Invalid query: INSERT INTO `op_user_role` (`role_name`, `permissions`) VALUES ('Test Role', NULL)
ERROR - 2025-01-24 10:13:27 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:13:34 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:13:38 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:14:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:15:03 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:15:08 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:19:10 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:19:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:19:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:19:43 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:26:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:26:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:26:43 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 10:28:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:14:08 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:17:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:17:07 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:18:22 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:18:28 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:19:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:19:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:20:35 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:20:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:31:48 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:31:57 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:32:11 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:32:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:32:34 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:32:46 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:34:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:34:36 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:34:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:36:42 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:36:44 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:38:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:38:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:38:59 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:39:41 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:46:10 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:46:11 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:46:34 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:47:12 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:47:16 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:48:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:48:58 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:49:44 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:49:56 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:50:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:50:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 11:50:44 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 12:58:21 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-24 13:01:13 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 13:02:27 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 13:07:20 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-24 15:12:39 --> 404 Page Not Found: Gi_DckOUM5apng/index
