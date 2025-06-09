<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-06-07 08:55:06 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-07 08:59:25 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-07 11:38:06 --> Severity: error --> Exception: Call to undefined method Leave_model::AllLeaveAPPlication() D:\xampp\htdocs\microlan_hr\application\controllers\Leave.php 266
ERROR - 2025-06-07 11:53:04 --> 404 Page Not Found: Assets/dist
ERROR - 2025-06-07 12:57:16 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 13:00:20 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 13:23:16 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 13:28:43 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 13:31:00 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 13:46:42 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 13:46:53 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 13:46:57 --> The upload path does not appear to be valid.
ERROR - 2025-06-07 14:35:22 --> Query error: Unknown column 'project_wise_bug.id' in 'order clause' - Invalid query: SELECT 
    project_wise_bug.*, 
    project.project_name, 
    user_assign.user_name AS assign_by_user, 
    user_to.user_name AS assign_to_user
    FROM 
    project_wise_bug 
  left  JOIN 
    project 
    ON project.project_id = project_wise_bug.bug_project_id
   left JOIN 
    op_user AS user_assign 
    ON user_assign.op_user_id = project_wise_bug.bug_assign_by_id
   left JOIN 
    op_user AS user_to 
    ON  user_to.op_user_id = project_wise_bug.bug_assign_to_id ORDER BY project_wise_bug.id DESC
ERROR - 2025-06-07 14:36:09 --> Query error: Unknown column 'project_wise_bug.id' in 'order clause' - Invalid query: SELECT 
    project_wise_bug.*, 
    project.project_name, 
    user_assign.user_name AS assign_by_user, 
    user_to.user_name AS assign_to_user
FROM 
    project_wise_bug 
LEFT JOIN 
    project ON project.project_id = project_wise_bug.bug_project_id
LEFT JOIN 
    op_user AS user_assign ON user_assign.op_user_id = project_wise_bug.bug_assign_by_id
LEFT JOIN 
    op_user AS user_to ON user_to.op_user_id = project_wise_bug.bug_assign_to_id
ORDER BY project_wise_bug.id DESC
ERROR - 2025-06-07 14:36:10 --> Query error: Unknown column 'project_wise_bug.id' in 'order clause' - Invalid query: SELECT 
    project_wise_bug.*, 
    project.project_name, 
    user_assign.user_name AS assign_by_user, 
    user_to.user_name AS assign_to_user
FROM 
    project_wise_bug 
LEFT JOIN 
    project ON project.project_id = project_wise_bug.bug_project_id
LEFT JOIN 
    op_user AS user_assign ON user_assign.op_user_id = project_wise_bug.bug_assign_by_id
LEFT JOIN 
    op_user AS user_to ON user_to.op_user_id = project_wise_bug.bug_assign_to_id
ORDER BY project_wise_bug.id DESC
ERROR - 2025-06-07 14:36:10 --> Query error: Unknown column 'project_wise_bug.id' in 'order clause' - Invalid query: SELECT 
    project_wise_bug.*, 
    project.project_name, 
    user_assign.user_name AS assign_by_user, 
    user_to.user_name AS assign_to_user
FROM 
    project_wise_bug 
LEFT JOIN 
    project ON project.project_id = project_wise_bug.bug_project_id
LEFT JOIN 
    op_user AS user_assign ON user_assign.op_user_id = project_wise_bug.bug_assign_by_id
LEFT JOIN 
    op_user AS user_to ON user_to.op_user_id = project_wise_bug.bug_assign_to_id
ORDER BY project_wise_bug.id DESC
