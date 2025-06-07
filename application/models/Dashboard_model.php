<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{

    public function get_attendance_by_year_month($year, $month)
    {
        // $this->db->select('e.user_name as employee_name, a.punch_in_status as attended, a.punch_out_status as not_attended, a.half_day as half_day');
        // $this->db->from('op_user e');
        // $this->db->join('attendance_log a', 'e.op_user_id = a.attendance_log_emp_id');
        // $this->db->where('a.attendance_year', $year);
        // $this->db->where('a.attendance_month', $month);
        // $this->db->where_not_in('e.role_id', 1);
        // $this->db->order_by('e.op_user_id', 'ASC');

        $this->db->select('
    e.user_name AS employee_name,
    SUM(CASE WHEN a.punch_in_status = 1 THEN 1 ELSE 0 END) AS attended,
    SUM(CASE WHEN a.punch_out_status = 1 THEN 1 ELSE 0 END) AS not_attended,
    SUM(CASE WHEN a.half_day = 1 THEN 1 ELSE 0 END) AS half_day
');
        $this->db->from('op_user e');
        $this->db->join(
            'attendance_log a',
            'e.op_user_id = a.attendance_log_emp_id 
    AND a.attendance_year = ' . $this->db->escape($year) . ' 
    AND a.attendance_month = ' . $this->db->escape($month),
            'left'
        );
        $this->db->where('e.role_id !=', 1); // Exclude admins
        $this->db->group_by('e.op_user_id'); // ✅ GROUP BY employee
        $this->db->order_by('e.op_user_id', 'ASC');

        $query = $this->db->get();
        // print_r($this->db->last_query());
        // die();

        $employees = [];
        $attended = [];
        $notAttended = [];
        $today = [];

        // Loop through query results and map the data for each employee
        foreach ($query->result() as $row) {
            // Check if the employee already exists in the array, if not, add them
            if (!in_array($row->employee_name, $employees)) {
                $employees[] = $row->employee_name;
                $attended[] = (int) $row->attended;
                $notAttended[] = (int) $row->not_attended;
                $today[] = (int) $row->half_day; // Assuming 'half_day' corresponds to the 'today' field in the chart
            }
        }

        // Return the processed data
        return [
            'employees' => $employees,
            'attended' => $attended,
            'notAttended' => $notAttended,
            'today' => $today
        ];
    }


    function total_employees()
    {
        $this->db->select('COUNT(*) as total_employees');
        $this->db->from('op_user');
        $this->db->where_not_in('role_id', '1');
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_employees;
    }

    function total_project()
    {
        $this->db->select('COUNT(*) as total_project');
        $this->db->from('project');
        $query = $this->db->get();
        $result = $query->row();
        return $result->total_project;
    }

    function not_started_project()
    {
        $this->db->select('COUNT(*) as not_started_project');
        $this->db->from('project');
        $this->db->where('work_status', '1');
        $query = $this->db->get();
        $result = $query->row();
        return $result->not_started_project;
    }

    function on_hold_project()
    {
        $this->db->select('COUNT(*) as on_hold_project');
        $this->db->from('project');
        $this->db->where('work_status', '3');
        $query = $this->db->get();
        $result = $query->row();
        return $result->on_hold_project;
    }

    function in_progress_project()
    {
        $this->db->select('COUNT(*) as in_progress_project');
        $this->db->from('project');
        $this->db->where('work_status', '2');
        $query = $this->db->get();
        $result = $query->row();
        return $result->in_progress_project;
    }

    function completed_project()
    {
        $this->db->select('COUNT(*) as completed_project');
        $this->db->from('project');
        $this->db->where('work_status', '5');
        $query = $this->db->get();
        $result = $query->row();
        return $result->completed_project;
    }

    public function getRolesList()
    {
        $this->db->select('*');
        $this->db->from('op_user_role');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getOrderStatusCount($map_with, $map_with_id, $from_date, $foodstatus)
    {
        $this->db->select('count(food_status) as pending_order');
        $this->db->from('order_data');
        if ($map_with != '') {
            $this->db->where('map_with', $map_with);
            $this->db->where('branch_id', $map_with_id);
        }
        $this->db->where('food_status', $foodstatus);
        $this->db->where('date(order_date_time)', $from_date);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTodaysEarning($map_with, $map_with_id, $from_date)
    {
        $this->db->select('ROUND(SUM(total_amount),2) as total');
        $this->db->from('order_data');
        if ($map_with) {
            $this->db->where('map_with', $map_with);
            $this->db->where('branch_id', $map_with_id);
            $this->db->where('date(order_date_time)', $from_date);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalTable($map_with, $map_with_id)
    {
        $this->db->select('count(tablesetting_id) as total_table');
        $this->db->from('table_setting');
        if ($map_with) {
            $this->db->where('map_with', $map_with);
            $this->db->where('branch_id', $map_with_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTableStatus($map_with, $map_with_id, $from_date, $flag)
    {
        $this->db->select('count(table_id) as accupied_table');
        $this->db->from('order_data');
        if ($map_with) {
            $this->db->where('map_with', $map_with);
            $this->db->where('branch_id', $map_with_id);
            $this->db->where('date(order_date_time)', $from_date);
            $this->db->where('flag', $flag);
            //               $this->db->group_by('table_id');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getEmpSaleProduct($opuser)
    {
        $this->db->select('SUM(odd.qty) as sp_quantity,SUM(odd.`unit_total`) as sp_total');
        $this->db->from('order_data as od');
        $this->db->join('order_data_details as odd', 'od.order_id = odd.order_id', 'left');
        if ($opuser) {
            $this->db->where('odd.listed_in_super_deal', '1');
            $this->db->where('od.user_id', $opuser);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalBills($opuser, $from_date)
    {
        $this->db->select('count(order_id) as no_of_bills,sum(`total_amount`) as bill_value');
        $this->db->from('order_data');
        if ($opuser) {
            $this->db->where('delivered_by', $opuser);
            $this->db->where('date(order_date_time)', $from_date);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAnnouncement()
    {
        $this->db->select('LEFT(announcement_title, 15) as announcement_title,`announc_id`');
        $this->db->from('announcement_tbl');
        $this->db->where('status', '1');
        $this->db->order_by('announc_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getUsersDashboard($map_with_session, $branch_id_session, $user_id)
    {
        $roles_data = $this->model->getData('op_user_role', array('is_ho_user' => '0'));
        $arr_perm = array();
        foreach ($roles_data as $roledata) {
            //            $arr_perm = unserialize($roledata['permission']);
            //            if(!empty($arr_perm)){
            //                if (in_array("add_bod", $arr_perm)) {
            $role_ids[] = $roledata['role_id'];
            //                } 
            //            }
        }
        $this->db->select('op_user_id,user_name');
        $this->db->from('op_user');
        $this->db->where('map_with', $map_with_session);
        $this->db->where('map_with_id', $branch_id_session);
        //        $where = '(map_with_id IN("'.$branch_id_session.'"))';
        //        $this->db->where($where);
        $this->db->where('op_user_id !=', $user_id);
        $this->db->where_in('role_id', $role_ids);
        $query = $this->db->get();
        return $query->result_array();
    }


    //End of Model
}
