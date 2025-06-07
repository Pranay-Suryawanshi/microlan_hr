<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model('model');
        $this->load->Model('dashboard_model');

        if (!$this->is_logged_in()) {
            redirect('alogin');
        }
        date_default_timezone_set('Asia/Kolkata');
        $branch_id_session = $this->session->userdata('map_with_id');
    }

    protected function no_cache()
    {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }

    function is_logged_in()
    {
        $is_logged_in = $this->session->userdata('is_admin_logged_in');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {
            return FALSE;
        }
        return TRUE;
    }

    function logout()
    {
        $user_id = $this->session->userdata('op_user_id');
        $this->session->set_userdata(array('is_admin_logged_in' => FALSE));
        date_default_timezone_set('Asia/Kolkata');
        $date = date("Y/m/d h:i:s");

        $this->model->updateData('op_user', array('logout_time' => $date), array('op_user_id' => $user_id));
        // check login id before destroy nd then update..        
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function index()
    {
        $user_id = $this->session->userdata('op_user_id');
        $designation_id = $this->session->userdata('designation_id');

        $strQryuser = "SELECT *
            FROM op_user 
            WHERE op_user_id = " . $user_id;
        $data['user_details'] = $this->model->getSqlData($strQryuser);
        $data['user_id'] = $user_id;
        $data['msg'] = '';
        
        $pagename = 'Dashboard';

        $strQry = "SELECT des_name 
           FROM designation 
           WHERE  id = " . $designation_id;

        $data['designation'] = $this->model->getSqlData($strQry);

        $data['total_employees'] = $this->dashboard_model->total_employees();
        $strQryemp = "SELECT op.*, ur.role_name, des.des_name
            FROM op_user op
            left join op_user_role ur on ur.role_id = op.role_id
            left join designation des on des.id = op.designation_id
            WHERE op.role_id NOT IN ('1')";
        $data['employees_list'] = $this->model->getSqlData($strQryemp);

        $data['total_project'] = $this->dashboard_model->total_project();

        $data['not_started_project'] = $this->dashboard_model->not_started_project();
        $data['on_hold_project'] = $this->dashboard_model->on_hold_project();
        $data['in_progress_project'] = $this->dashboard_model->in_progress_project();
        $data['completed_project'] = $this->dashboard_model->completed_project();

        $this->model->partialView('admin/dashboard', $data,$pagename);
    }

    function profile()
    {
         $user_id = $this->session->userdata('op_user_id');
        $designation_id = $this->session->userdata('designation_id');
        $strQryuser = "SELECT *
            FROM op_user 
            WHERE op_user_id = " . $user_id;
        $data['user_details'] = $this->model->getSqlData($strQryuser);
        $data['user_details_role_list'] = $this->model->getData('op_user_role');
        $data['designationlist'] = $this->model->getData('designation');
        $data['user_id'] = $user_id;
        $data['msg'] = '';
        $pagename = 'Profile';

        $this->model->partialView('admin/profile', $data,$pagename);
    }

    function get_attendance_data()
    {
        $year = $this->input->get('year');
        $month = $this->input->get('month');

        // Validate inputs (optional)
        if (!$year || !$month) {
            echo json_encode(['error' => 'Invalid year or month']);
            return;
        }

        $data = $this->dashboard_model->get_attendance_by_year_month($year, $month);

        echo json_encode($data);
    }

}