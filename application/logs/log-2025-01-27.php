<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-01-27 04:42:56 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-27 05:13:35 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:13:55 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:21:34 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:22:36 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:34:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:35:50 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:36:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:38:43 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:38:49 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:39:04 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 05:52:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:05:36 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:06:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:07:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:07:13 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:07:50 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:08:24 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:08:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:08:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:09:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:13:22 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:13:58 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:17:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:17:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:18:55 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:19:02 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:19:08 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:19:16 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:22:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:22:26 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:22:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:23:51 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:24:15 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:25:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:27:51 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:28:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:28:28 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:29:27 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:29:36 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:30:09 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:30:26 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:35:10 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 06:35:26 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 07:11:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 07:12:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 07:15:50 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 07:16:11 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 07:16:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 09:07:22 --> 404 Page Not Found: Project-list/MQ==
ERROR - 2025-01-27 09:07:25 --> 404 Page Not Found: Project-list/Mg==
ERROR - 2025-01-27 14:14:21 --> Query error: Unknown column 'jY' in 'where clause' - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
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
     where p.project_status_id=jY
    GROUP BY 
     p.project_id;
ERROR - 2025-01-27 14:17:42 --> Query error: Unknown column 'jY' in 'where clause' - Invalid query: SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
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
     where p.project_status_id=jY
    GROUP BY 
     p.project_id;
ERROR - 2025-01-27 10:18:27 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 10:19:08 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 10:23:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 10:23:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 10:24:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 15:28:09 --> Query error: Unknown column 'l.created_date' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.created_date >= '2025-01-18' AND l.created_date <= '2025-01-22'
ERROR - 2025-01-27 10:58:15 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 10:58:24 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 15:28:42 --> Query error: Unknown column 'l.created_date' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.created_date >= '2025-01-14' AND l.created_date <= '2025-01-31'
ERROR - 2025-01-27 11:10:10 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:12:02 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:16:12 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:16:55 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:17:25 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:18:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:18:59 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:21:02 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:24:42 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:26:02 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:27:38 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:28:01 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:35:43 --> Severity: error --> Exception: syntax error, unexpected '">' (T_CONSTANT_ENCAPSED_STRING) C:\xampp\htdocs\microlan_hr\application\controllers\Lead.php 274
ERROR - 2025-01-27 11:36:45 --> Severity: error --> Exception: syntax error, unexpected '">' (T_CONSTANT_ENCAPSED_STRING) C:\xampp\htdocs\microlan_hr\application\controllers\Lead.php 274
ERROR - 2025-01-27 11:38:38 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:39:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:39:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:40:35 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:44:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:44:27 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:50:36 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:50:38 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:54:34 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 11:59:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:02:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:27:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:27:41 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:29:24 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:30:26 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:31:22 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:01:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Qualified' at line 6 - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = Pre Qualified 
ERROR - 2025-01-27 12:32:28 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:02:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'Qualified' at line 6 - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = Pre Qualified 
ERROR - 2025-01-27 12:32:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:33:44 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:04:18 --> Query error: Unknown column 'Qualified' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = Qualified  AND l.lead_source_id = 2 
ERROR - 2025-01-27 17:04:29 --> Query error: Unknown column 'Qualified' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = Qualified  AND l.lead_source_id = 1 
ERROR - 2025-01-27 12:34:34 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:35:46 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:38:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:40:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:41:12 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:42:24 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:43:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:46:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:46:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:46:43 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:55:15 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:25:17 --> Query error: Unknown column 'Qualified' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = Qualified 
ERROR - 2025-01-27 12:57:41 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 12:58:10 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:07:02 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:11:44 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:13:53 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:15:23 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:15:27 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:45:35 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = 2 
ERROR - 2025-01-27 17:45:40 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_status_id = 2  AND l.lead_mode = 2 
ERROR - 2025-01-27 13:15:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:16:47 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:47:09 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_status_id = 1  AND l.lead_mode = 2  AND l.lead_source_id = 1 
ERROR - 2025-01-27 17:47:13 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_status_id = 1  AND l.lead_mode = 1  AND l.lead_source_id = 1 
ERROR - 2025-01-27 17:47:14 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_status_id = 1  AND l.lead_mode = 1  AND l.lead_source_id = 1 
ERROR - 2025-01-27 17:47:19 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_status_id = 1  AND l.lead_mode = 3  AND l.lead_source_id = 1 
ERROR - 2025-01-27 17:47:23 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_status_id = 1  AND l.lead_mode = 2  AND l.lead_source_id = 1 
ERROR - 2025-01-27 13:17:32 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:47:36 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = 2 
ERROR - 2025-01-27 17:47:37 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_mode = 2 
ERROR - 2025-01-27 13:18:07 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:48:17 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_added_on >= '2025-01-02' AND l.lead_added_on <= '2025-01-16' AND l.lead_mode = undefined 
ERROR - 2025-01-27 13:18:32 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:48:47 --> Query error: Unknown column 'l.lead_mode' in 'where clause' - Invalid query: SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id WHERE l.lead_added_on >= '2025-01-07' AND l.lead_added_on <= '2025-01-18' AND l.lead_mode = undefined 
ERROR - 2025-01-27 13:20:28 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:21:01 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:21:33 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:22:03 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:22:42 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:23:25 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:24:06 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:27:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:29:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:30:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:33:06 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:42:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:44:35 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:49:09 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 13:49:12 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 14:19:48 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 14:20:12 --> 404 Page Not Found: Project/save_ajax_LeadStatus
ERROR - 2025-01-27 14:23:19 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 14:23:33 --> 404 Page Not Found: Project/save_ajax_LeadStatus
ERROR - 2025-01-27 14:30:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 14:31:10 --> 404 Page Not Found: Project/save_ajax_LeadStatus
ERROR - 2025-01-27 14:32:01 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:02:17 --> Query error: Unknown column 'lead_status_name' in 'field list' - Invalid query: INSERT INTO `lead_status` (`lead_status_name`) VALUES ('Test Data')
ERROR - 2025-01-27 14:40:09 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:10:16 --> Query error: Unknown column 'lead_status_name' in 'field list' - Invalid query: INSERT INTO `lead_status` (`lead_status_name`) VALUES ('Test Data')
ERROR - 2025-01-27 14:42:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 15:04:00 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 15:05:20 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 15:06:03 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:36:16 --> Query error: Unknown column 'status' in 'where clause' - Invalid query: SELECT *
FROM `lead_source`
WHERE `lead_source` = 'Test Source'
AND `status` = '1'
ERROR - 2025-01-27 15:07:11 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 15:08:41 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:39:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:39:35 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:39:48 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-27 17:39:48 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:39:54 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:39:56 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:40:08 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 17:42:26 --> 404 Page Not Found: Vertical/assets
ERROR - 2025-01-27 22:40:17 --> Query error: Unknown column 'source_status' in 'where clause' - Invalid query: SELECT *
FROM `lead_mode_tbl`
WHERE `mode_name` = 'Pre Qualified'
AND `source_status` = '1'
ERROR - 2025-01-27 18:10:24 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:10:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 22:40:50 --> Query error: Unknown column 'source_status' in 'where clause' - Invalid query: SELECT *
FROM `lead_mode_tbl`
WHERE `mode_name` = 'Pre Qualified'
AND `source_status` = '1'
ERROR - 2025-01-27 18:11:15 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:22:31 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:31:16 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:40:45 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:41:57 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:44:30 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:45:20 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:46:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:48:14 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:48:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:49:00 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:50:21 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:53:40 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:54:17 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:55:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:56:52 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 18:57:06 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:02:18 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:03:07 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:03:43 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:04:29 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:07:05 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:07:49 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:09:37 --> 404 Page Not Found: Assets/css
ERROR - 2025-01-27 19:11:29 --> 404 Page Not Found: Assets/css
