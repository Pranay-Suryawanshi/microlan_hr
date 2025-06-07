<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Task extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      error_reporting(0);
      $this->load->Model('model');
      $this->load->Model('dashboard_model');

      if (!$this->is_logged_in()) {
          redirect('alogin');
      }

      //project
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

  function task_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Task List';

    $sql = "SELECT t.*, p.*, op.* FROM task t
                Left join project p on p.project_id = t.project_id
                Left join op_user op on op.op_user_id = t.emp_id";
    $data['tasks'] = $this->model->getSqlData($sql);

    $strQry = "SELECT * FROM project Where project_active_status = '1'";
    $data['projects'] = $this->model->getSqlData($strQry);

    $strQry1 = "SELECT * FROM op_user Where role_id = '2' and status = '1'";
    $data['employee'] = $this->model->getSqlData($strQry1);
    
    $this->model->partialView('admin/task/task_list', $data,$pagename);
  }

  function save_task()
  {
    // $op_user_id = $this->session->userdata('op_user_id');
    // $role_id = $this->session->userdata('user_role');

    $storedata = $_POST;

    $this->db->insert('task', $storedata);

    $this->session->set_flashdata('success', '<strong>Well done!</strong> Project Task added successfully.');

    redirect('task-list');
  }

  function get_assigned_developer()
  {
      $project_id = $_POST['project_id'];

      $project_data = $this->model->getData('project', array('project_id' => $project_id));
      $emp_id = $project_data[0]['project_developer'];

      // Use explode() to split the string into an array
      $array = explode(",", $emp_id);

      // Print the resulting array
      // print_r($array);

      echo '<option value="">--- Select Developer ---</option>';
      for($i=0; $i<count($array); $i++)
      {
        //echo $array[$i];

        $sql = "SELECT * from op_user
                    Where op_user_id = $array[$i]";
        $res = $this->db->query($sql);

        if(!empty($res))
        {
            // echo '<option value="">--- Select Developer ---</option>';
            foreach($res->result() as $value)
            {
                echo "<option value='{$value->op_user_id}'>{$value->user_name}</option>";
            }
        }
        else {
            echo '<option value="">No Sub Category found</option>';
        }
      }
      
  }

  function update_task()
  {
    $task_id = $_POST['task_id'];

    $storedata = $_POST;

    $this->db->update('task', $storedata, array('task_id'=>$task_id));

    $this->session->set_flashdata('success', '<strong>Well done!</strong> Project Task updated successfully.');

    redirect('task-list');
  }
}