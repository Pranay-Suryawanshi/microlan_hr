<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Todo extends CI_Controller {

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

  function add_todo()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Add ToDo';

    $data['project_list'] = $this->model->getData('project',array('project_active_status'=>'1')); 

    $this->model->partialView('admin/todo/add_todo', $data,$pagename);
  }

  function save_todo()
  {
    $storeData = $_POST;

    $this->db->insert('todo', $storeData);

    $this->session->set_flashdata('success', '<strong>Well done!</strong> New ToDo added successfully.');

    redirect('todo-list');
  }

  function todo_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'ToDo List';

    $sql = "SELECT td.*, p.* FROM todo td
                Left join project p on p.project_id = td.project_id";
    $data['todo'] = $this->model->getSqlData($sql);

    $this->model->partialView('admin/todo/todo_list', $data,$pagename);
  }

  function edit_todo($tdid)
  {
        $todo_id = base64_decode($tdid);
        $user_id = $this->session->userdata('op_user_id');
        $pagename = 'Edit ToDo';

        $sql = "SELECT td.*, p.* FROM todo td
                    Left join project p on p.project_id = td.project_id
                        Where td.todo_id = $todo_id";
        $data['todos'] = $this->model->getSqlData($sql);

        $data['project_list'] = $this->model->getData('project',array('project_active_status'=>'1')); 
        
        $data['todo_id'] = $todo_id;

        $this->model->partialView('admin/todo/edit_todo', $data,$pagename);
  }

  function update_todo()
  {
    $todo_id = $_POST['todo_id'];
    $updtData = $_POST;

    $this->db->update('todo', $updtData, array('todo_id'=>$todo_id));

    $this->session->set_flashdata('success', '<strong>Well done!</strong> ToDo details udated successfully.');

    redirect('todo-list');
  }

}