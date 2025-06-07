<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Project extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->Model('model');
    $this->load->Model('dashboard_model');
    $this->load->library('session');

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
    $this->model->partialView('admin/dashboard', $data, $pagename);
  }

  function add_project()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Add Project';

    $strQry = "SELECT * FROM project_type_tbl";
    $data['project_type'] = $this->model->getSqlData($strQry);

    $strQry1 = "SELECT * FROM project_status_tbl";
    $data['project_status'] = $this->model->getSqlData($strQry1);

    $strQry2 = "SELECT * FROM customer";
    $data['customers'] = $this->model->getSqlData($strQry2);

    $strQry3 = "SELECT * FROM op_user Where role_id = '1' and status = '1'";
    $data['superadmin'] = $this->model->getSqlData($strQry3);

    $strQry4 = "SELECT * FROM op_user Where role_id = '2' and status = '1'";
    $data['employee'] = $this->model->getSqlData($strQry4);

    $strQry5 = "SELECT * FROM op_user Where role_id = '24' and status = '1'";
    $data['marketing_employee'] = $this->model->getSqlData($strQry5);

    $this->model->partialView('admin/project/add_project', $data, $pagename);
  }

  function project_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Project List';
    $status = $this->uri->segment(2);

    if (!empty($status)) {
      $decoded_status = base64_decode($status); // Decode the status
      $sql = "SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
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
     where p.project_status_id=$decoded_status
    GROUP BY 
     p.project_id;";
      $data['projects'] = $this->model->getSqlData($sql);

      $strQry2 = "SELECT COUNT(*) AS total_count FROM project";
      $result = $this->model->getSqlData($strQry2);

      // Assuming getSqlData returns an array of results

      $data['total_projects'] = $result[0]['total_count'];

      //die;

      //print_r($data['projects']);
      $strQry1 = "SELECT * FROM project_status_tbl";
      $data['project_status'] = $this->model->getSqlData($strQry1);
      //print_r($data); die;
      $this->model->partialView('admin/project/project_list', $data, $pagename);
    } else {

      /*$sql = "SELECT p.*, pt.*, ps.*, c.*, op.* FROM project p 
                Left join project_type_tbl pt on pt.pt_id = p.project_type_id
                Left join project_status_tbl ps on ps.ps_id = p.project_status_id
                Left join customer c on c.cust_id = p.project_client_id
                Left join op_user op on op.op_user_id = p.project_manager";*/

      $sql = "SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
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
           p.project_id;";
      $data['projects'] = $this->model->getSqlData($sql);
      //print_r($data['projects']);
      $strQry1 = "SELECT * FROM project_status_tbl";
      $data['project_status'] = $this->model->getSqlData($strQry1);
      $strQry2 = "SELECT COUNT(*) AS total_count FROM project";
      $result = $this->model->getSqlData($strQry2);

      // Assuming getSqlData returns an array of results

      //$data['total_projects'] = $result[0]['total_count'];
      $data['total_projects'] = isset($result[0]['total_count']) ? $result[0]['total_count'] : 0;
      //print_r($data); die;
      $this->model->partialView('admin/project/project_list', $data, $pagename);
    }
  }

  function save_project()
  {
    // $op_user_id = $this->session->userdata('op_user_id');
    // $role_id = $this->session->userdata('user_role');

    $storedata = array(
      'project_name' => $this->input->post('project_name'),
      'project_code' => $this->input->post('project_code'),
      'project_type_id' => $this->input->post('project_type_id'),
      'project_status_id' => $this->input->post('project_status_id'),
      'project_start_date' => $this->input->post('project_start_date'),
      'hours' => $this->input->post('hours'),
      'estimated_completion_date' => $this->input->post('estimated_completion_date'),
      'project_client_id' => $this->input->post('project_client_id'),
      'project_manager' => $this->input->post('project_manager'),
      'project_developer' => implode(',', $_POST['project_developer']),
      'project_description' => $this->input->post('project_description'),
      'marketing_person_id' => $this->input->post('marketing_person'),
      'customer_name' => $this->input->post('customer_name'),
      'customer_no' => $this->input->post('customer_no'),
      'project_handover_date' => $this->input->post('project_handover_date'),
    );
    // Implode the array to store it as a string in the database
    // $storedata = implode(',', $_POST['project_developer']);

    $this->db->insert('project', $storedata);

    $this->session->set_flashdata('success', '<strong>Well done!</strong> New Project added successfully.');

    redirect('project-list');
  }

  function edit_project($lid)
  {
    $project_id = base64_decode($lid);

    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Edit Project';

    /*$sql = "SELECT  p.*,pt.*,ps.*, c.*, op.*,  GROUP_CONCAT(DISTINCT op1.user_name) AS developer_names, GROUP_CONCAT(DISTINCT op2.user_name) AS marketing_person  FROM  project p
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
       Where p.project_id = $project_id
      GROUP BY 
       p.project_id;
        ";*/

    $data['project_data'] = $this->model->getData('project', array('project_id' => $project_id));
    //$data['project'] = $this->model->getSqlData($sql);
    //echo '<pre>';
    // print_r($data['project_data']);die;
    // $data['leadstatus_list'] = $this->model->getData('lead_status',array('status'=>'1')); 
    // $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
    /// $data['lead_type'] = $this->model->getData('lead_type',array()); 
    $data['project_list'] = $this->model->getData('project', array());
    $data['project_type'] = $this->model->getData('project_type_tbl', array());
    $strQry1 = "SELECT * FROM project_status_tbl";
    $data['project_status'] = $this->model->getSqlData($strQry1);

    $strQry2 = "SELECT * FROM customer";
    $data['customers'] = $this->model->getSqlData($strQry2);

    $strQry3 = "SELECT * FROM op_user Where role_id = '1' and status = '1'";
    $data['superadmin'] = $this->model->getSqlData($strQry3);

    $strQry4 = "SELECT * FROM op_user Where role_id = '2' and status = '1'";
    $data['employee'] = $this->model->getSqlData($strQry4);

    $strQry5 = "SELECT * FROM op_user Where role_id = '24' and status = '1'";
    $data['marketing_employee'] = $this->model->getSqlData($strQry5);


    $data['project_id'] = $project_id;

    $this->model->partialView('admin/project/edit_project', $data, $pagename);
  }

  function update_project()
  {
    $project_id = $_POST['project_id'];
    // $updtData = $_POST;
    // echo $project_id; die;
    $project_dev = implode(',', $_POST['project_developer']);
    $updateData = array(
      'project_name' => $this->input->post('project_name'),
      'project_code' => $this->input->post('project_code'),
      'project_type_id' => $this->input->post('project_type_id'),
      'project_status_id' => $this->input->post('project_status_id'),
      'project_start_date' => $this->input->post('project_start_date'),
      'estimated_completion_date' => $this->input->post('estimated_completion_date'),
      'project_client_id' => $this->input->post('project_client_id'),
      'project_manager' => $this->input->post('project_manager'),
      'project_developer' => implode(',', $_POST['project_developer']),
      'project_description' => $this->input->post('project_description'),
      'marketing_person_id' => $this->input->post('marketing_person'),
      'customer_name' => $this->input->post('customer_name'),
      'customer_no' => $this->input->post('customer_no'),
      'project_handover_date' => $this->input->post('project_handover_date'),
    );

    // echo '<pre>'; print_r($updateData); die;
    // $this->model->updateData('project',$updateData,array('project_id'=>$project_id));
    $this->db->update('project', $updateData, array('project_id' => $project_id));

    $this->session->set_flashdata('success', '<strong>Well done!</strong> Project details udated successfully.');

    redirect('project-list');
  }

  function viewproject($id)
  {
    $id = base64_decode($id);
    // echo base64_decode($id); die;
    //$data['task_timer1'] = $this->model->gettaskTimer($id);
    //$data['task_timer'] = $this->model->getData('task_timer_count',array('flag'=>0,'project_id'=>$id));
    $data['task_timer'] = $this->model->getData('project_task_report', array('project_id' => $id));
    $data['work_status'] = $this->model->getData('task_work_status', array('status' => 1));
    $data['task_list'] = $this->model->getData('task', array('status' => '1'));
    $data['member_list'] = $this->model->getData('op_user', array('status' => '1'));
    $data['customer_list'] = $this->model->getData('customer', array('status' => '1'));
    $data['res'] = $this->model->getData('project', array('project_id' => $id))[0];

    $data['no_started'] = $this->model->getSqlData("select count(*) as no_started from project where work_status='1' and project_id='" . $id . "'")[0];
    $data['in_progress'] = $this->model->getSqlData("select count(*) as in_progress from project where work_status='2' and project_id='" . $id . "'")[0];
    $data['on_hold'] = $this->model->getSqlData("select count(*) as on_hold from project where work_status='3' and project_id='" . $id . "'")[0];
    $data['cancelled'] = $this->model->getSqlData("select count(*) as cancelled from project where work_status='4' and project_id='" . $id . "'")[0];
    $data['finished'] = $this->model->getSqlData("select count(*) as finished from project where work_status='5' and project_id='" . $id . "'")[0];

    $task_status = $this->uri->segment(3);
    if (!empty($task_status)) {
      $where = 'and task_status="' . $task_status . '"';
    } else {
      $where = '';
    }
    $data['task_list'] = $this->model->getSqlData("select * from task where status='1' and project_id='" . $id . "' $where order by task_id desc");
    //echo $this->db->last_query(); die;
    $data['task_no_started'] = $this->model->getSqlData("select count(*) as no_started from task where task_status='1' and project_id='" . $id . "'")[0];
    $data['task_in_progress'] = $this->model->getSqlData("select count(*) as in_progress from task where task_status='2' and project_id='" . $id . "'")[0];
    $data['task_testing'] = $this->model->getSqlData("select count(*) as testing from task where task_status='3' and project_id='" . $id . "'")[0];
    $data['task_awaiting_feedback'] = $this->model->getSqlData("select count(*) as awaiting_feedback from task where task_status='4' and project_id='" . $id . "'")[0];
    $data['task_complete'] = $this->model->getSqlData("select count(*) as complete from task where task_status='5' and project_id='" . $id . "'")[0];

    if (!empty($data['task_list'])) {
      foreach ($data['task_list'] as $key_img => $val_img) {
        $res_img = $this->model->getSqlData("select file_type,image_name,task_img_id from task_image where task_id='" . $val_img['task_id'] . "'");
        if (!empty($res_img)) {
          $data['task_list'][$key_img]['task_image'] = $res_img;
        } else {
          $data['task_list'][$key_img]['task_image'] = array();
        }
      }
    }
    //echo "<pre>";
    //print_r($data['task_list']); die;


    $data['project_discussion'] = $this->model->getSqlData("select * from project_discussion where status='1' and project_id='" . $id . "'");
    $data['project_activity'] = $this->model->getSqlData("select * from project_activity where project_id='" . $id . "'");
    if (!empty($data['project_activity'])) {
      foreach ($data['project_activity'] as $key => $value) {
        $res_op_user = $this->model->getSqlData("select user_name from op_user where op_user_id='" . $value['created_by'] . "'");

        if (!empty($res_op_user)) {
          $data['project_activity'][$key]['created_by'] = $res_op_user[0]['user_name'];
        } else {
          $data['project_activity'][$key]['created_by'] = '';
        }
      }
    }

    $data['time_sheet_list'] = $this->model->getSqlData("select * from project_time_sheet where project_id='" . $id . "'");
    if (!empty($data['time_sheet_list'])) {
      foreach ($data['time_sheet_list'] as $keyts => $val_tsl) {
        $res_ts = $this->model->getSqlData("select subject from task where task_id='" . $val_tsl['task'] . "'");
        if (!empty($res_ts)) {
          $data['time_sheet_list'][$keyts]['task'] = $res_ts[0]['subject'];
        } else {
          $data['time_sheet_list'][$keyts]['task'] = '';
        }

        $res_member = $this->model->getSqlData("select user_name from op_user where op_user_id='" . $val_tsl['member'] . "'");
        if (!empty($res_member)) {
          $data['time_sheet_list'][$keyts]['member'] = $res_member[0]['user_name'];
        } else {
          $data['time_sheet_list'][$keyts]['member'] = '';
        }
      }
    }

    $data['milestone_list'] = $this->model->getSqlData("select * from project_milestones where project_id='" . $id . "' ORDER BY `order` ASC");
    // $data['files_list'] =$this->model->getSqlData("select * from project_files where project_id='".$id."'");
    $data['unit_membert'] = $this->model->getSqlData("select * from unit_member where project_id='" . $id . "'");
    $data['member_list'] = $this->model->getSqlData("select * from unit_member where project_id='" . $id . "'");
    $data['audit_report'] = $this->model->getSqlData("select * from customer_audit_report where project_id='" . $id . "'");

    $data['invoices'] = $this->model->getSqlData("select * from project_invoice where project_id='" . $id . "'");

    if (!empty($data['audit_report'])) {
      foreach ($data['audit_report'] as $keyc => $val_cust) {
        $res_cust = $this->model->getSqlData("select owner_name from unit_member where unitm_id='" . $val_cust['unit_member_id'] . "' AND  cust_id='" . $val_cust['cust_id'] . "'");
        if (!empty($res_cust)) {
          $data['audit_report'][$keyc]['owner_name'] = $res_cust[0]['owner_name'];
        } else {
          $data['audit_report'][$keyc]['owner_name'] = '';
        }
      }
    }

    // print_r($data['audit_report']); die;
    $res_cust = $this->model->getSqlData("select company as customer_name from customer where cust_id='" . $data['res']['cust_id'] . "'");
    if (!empty($res_cust)) {
      $data['res']['customer_name'] = $res_cust[0]['customer_name'];
    } else {
      $data['res']['customer_name'] = '';
    }

    if (!empty($data['res']['members'])) {
      $res_member = $this->model->getSqlData("select user_name as member_name,profile_photo from op_user where op_user_id IN(" . $data['res']['members'] . ")");

      if (!empty($res_member)) {
        $data['res']['members'] = $res_member;
      } else {
        $data['res']['members'] = '';
      }
    }
    $data['states'] = $this->model->getData('states');

    $data['pending_task'] = $this->model->getSqlData("select count(*) as pending_task from task where status='1' and project_id='" . $id . "' AND task_status !=5")[0];
    $data['task_no_started_graph'] = $this->model->getSqlData("select count(*) as no_started from task where task_status='1' and project_id='" . $id . "'")[0];
    $data['task_in_progress_graph'] = $this->model->getSqlData("select count(*) as in_progress from task where task_status='2' and project_id='" . $id . "'")[0];
    $data['task_testing_graph'] = $this->model->getSqlData("select count(*) as testing from task where task_status='3' and project_id='" . $id . "'")[0];
    $data['task_awaiting_feedback_graph'] = $this->model->getSqlData("select count(*) as awaiting_feedback from task where task_status='4' and project_id='" . $id . "'")[0];
    $data['task_complete_graph'] = $this->model->getSqlData("select count(*) as complete from task where task_status='5' and project_id='" . $id . "'")[0];
    /*-------------------------graph data-------------------------------*/
    $arr_d = array();
    $arr_c = array();
    $arr_t = array();
    $arr_i = array();
    $arr_ns = array();
    date_default_timezone_set('Asia/Kolkata');
    $current_date = date('Y-m-d', strtotime("this week"));;
    $end_date = date("Y-m-d", strtotime("this sunday"));
    $res_task_nos = $this->model->getSqlData("select count(*) as total_task,created_date as date from task where created_date <='" . $end_date . "' AND created_date >='" . $current_date . "' AND task_status ='1' GROUP BY created_date");

    $res_task_ip = $this->model->getSqlData("select count(*) as total_task,updated_date as date from task where updated_date <='" . $end_date . "' AND updated_date >='" . $current_date . "' AND task_status ='2' GROUP BY updated_date");
    $res_task_t = $this->model->getSqlData("select count(*) as total_task,updated_date as date from task where updated_date <='" . $end_date . "' AND updated_date >='" . $current_date . "' AND task_status='3' GROUP BY updated_date");
    $res_task_c = $this->model->getSqlData("select count(*) as total_task,updated_date as date from task where updated_date <='" . $end_date . "' AND updated_date >='" . $current_date . "' AND task_status ='5' GROUP BY updated_date");

    for ($i = 0; $i < 7; $i++) {
      $arr_d[] = date('d-m-Y', strtotime($current_date . '+' . $i . ' day'));
      if (!empty($res_task_c)) {
        if (isset($res_task_c[$i]['total_task'])) {

          $arr_c[] = $res_task_c[$i]['total_task'];
        } else {
          $arr_c[] = "0";
        }
      } else {
        $arr_c[] = "0";
      }

      if (!empty($res_task_t)) {
        if (isset($res_task_t[$i]['total_task'])) {

          $arr_t[] = $res_task_t[$i]['total_task'];
        } else {
          $arr_t[] = "0";
        }
      } else {
        $arr_t[] = "0";
      }

      if (!empty($res_task_ip)) {
        if (isset($res_task_ip[$i]['total_task'])) {

          $arr_i[] = $res_task_ip[$i]['total_task'];
        } else {
          $arr_i[] = "0";
        }
      } else {
        $arr_i[] = "0";
      }

      if (!empty($res_task_nos)) {
        if (isset($res_task_nos[$i]['total_task'])) {

          $arr_ns[] = $res_task_nos[$i]['total_task'];
        } else {
          $arr_ns[] = "0";
        }
      } else {
        $arr_ns[] = "0";
      }
    }


    $data['task_graph_date'] = json_encode($arr_d);
    $data['complete_task'] = json_encode($arr_c);
    $data['inprogress_task'] = json_encode($arr_i);
    $data['testing_task'] = json_encode($arr_t);
    $data['notstarted_task'] = json_encode($arr_ns);
    /*-----------------------------------------------------------------*/

    $note_query = ("select * from project_note where project_id='" . $id . "'");

    $data['project_note'] = $this->model->getSqlData($note_query);
    $log_query = "select pl.*,op.* from project_log pl 
        Left join op_user op on op.op_user_id = pl.user_id
        where pl.project_id='" . $id . "' order by pl.log_id desc";

    $data['log_list'] = $this->model->getSqlData($log_query);

    $file_query = "select pf.*,op.* from project_files pf 
          Left join op_user op on op.op_user_id = pf.user_id
          where pf.project_id='" . $id . "'";

    $data['files_list'] = $this->model->getSqlData($file_query);

    $fetchTaskD = ("select * from task where project_id='" . $id . "'")[0];

    $mapsql = "SELECT task_status, DATE(updated_date) as task_date, COUNT(*) as task_count 
           FROM task 
           WHERE project_id = '$id'
           GROUP BY task_status, task_date 
            ORDER BY task_date DESC";



    $data['mapForTable'] = $this->model->getSqlData($mapsql);


    $projects = $this->db->select('p.*, 
        pm.user_name as project_manager_name, pm.email as project_manager_email, pm.contact_no as project_manager_contactNo,pm.profile_photo as project_manager_profilePhoto, 
        mp.user_name as marketing_person_name, mp.email as marketing_person_email, mp.contact_no as marketing_person_contactNo,mp.profile_photo as marketing_person_profilePhoto')
      ->from('project as p')
      ->join('op_user as pm', 'pm.op_user_id = p.project_manager', 'left')
      ->join('op_user as mp', 'mp.op_user_id = p.marketing_person_id', 'left')
      ->where('p.project_id', $id)  // Fixed syntax error here
      ->get()
      ->result();

    foreach ($projects as &$project) {
      if (!empty($project->project_developer)) {
        $developerIds = explode(',', $project->project_developer);
        $project->developers = $this->db->where_in('op_user_id', $developerIds)
          ->get('op_user')
          ->result();
      } else {
        $project->developers = [];
      }
    }

    $data['projects'] = $projects;

    // echo"<pre>"; print_r($data['projects']);die;

    $pagename = "View Project";
    $this->model->partialView('admin/project/view_project', $data, $pagename);
  }

  function save_note()
  {

    $postData['project_id'] = $_POST['pro_id'];
    $postData['note'] = $_POST['note'];

    $op_user_id = $this->session->userdata('op_user_id');
    $this->db->insert('project_note', $postData);
    $inserted_id = $this->db->insert_id();

    $logArray = [
      'project_id' => $postData['project_id'],
      'activity_id' => '6',
      'user_id' => $op_user_id,
      'affected_id' => $inserted_id,
      'action_id' => '1',

    ];

    $this->db->insert('project_log', $logArray);
    $this->session->set_flashdata('msg', 'Project note Saved Successfully..');
    // redirect('view-project/'.$id);  




  }

  public function getNoteDetails()
  {
    $note_id = $this->input->post('note_id');
    //echo $note_id; die;
    if ($note_id) {
      $note = $this->model->getData('project_note', array('note_id' => $note_id));

      if ($note) {
        // $task['task_file'] = !empty($task['task_file']) ? explode(',', $task['task_file']) : [];
        //print_r($task); die;
        echo json_encode(['success' => true, 'data' => $note]);
      } else {
        echo json_encode(['success' => false, 'message' => 'Note not found.']);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'Invalid note ID.']);
    }
  }

  function update_note()
  {
    $note_id = isset($_POST['note_id']) ? $_POST['note_id'] : null;
    $note_content = isset($_POST['note']) ? $_POST['note'] : '';
    $project_id = isset($_POST['pro_id']) ? $_POST['pro_id'] : '';
    //  $postData['note_id'] = $_POST['pro_id'];
    // $postData['note'] = $_POST['note'];

    $op_user_id = $this->session->userdata('op_user_id');
    $updateData = [
      'note' => $note_content,
      'project_id' => $project_id,
      'updated_date' => date('Y-m-d H:i:s') // Update timestamp
    ];

    $existingRecord = $this->model->getData('project_note', array('note_id' => $note_id));
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
      $this->session->set_flashdata('msg', 'Note not found.');
      //  redirect('view-lead/'.$id);
      return;
    }

    $changes = [];

    // Compare fields
    foreach ($updateData as $key => $newValue) {
      if (isset($existingRecord->$key)) {
        $oldValue = trim(strval($existingRecord->$key));
        $newValue = trim(strval($newValue));

        // Debug field comparison
        //echo "Checking: $key → Old: [$oldValue], New: [$newValue] <br>";

        if ($oldValue != $newValue) {
          $changes[] = [
            'field' => $key,
            'old_value' => $oldValue,
            'new_value' => $newValue
          ];
        }
      }
    }

    if (!empty($changes)) {
      $details = json_encode($changes);
    } else {
      $details = 'No changes made';
    }


    $this->db->where('note_id', $note_id);
    $this->db->update('project_note', $updateData);

    $logArray = [
      'project_id' => $project_id,
      'activity_id' => '6',
      'user_id' => $op_user_id,
      'affected_id' => $note_id,
      'action_id' => '2',
      'details' => $details

    ];

    $this->db->insert('project_log', $logArray);
    $this->session->set_flashdata('msg', 'Project note Updated Successfully.');
    $this->session->set_flashdata('class', 'success');

    // redirect('view-project/'.$id);  




  }

  function save_discussion()
  {
    $op_user_id = $this->session->userdata('op_user_id');

    $this->db->insert('project_discussion', $_POST);

    $inserted_id = $this->db->insert_id();
    // echo $inserted_id; die;

    $logArray = [
      'project_id' => $_POST['project_id'],
      'activity_id' => '5',
      'user_id' => $op_user_id,
      'affected_id' => $inserted_id,
      'action_id' => '1',
    ];
    $this->db->insert('project_log', $logArray);

    $this->session->set_flashdata('msg', 'Project Discussion Details Saved Successfully.');
    $this->session->set_flashdata('class', 'success');

    // redirect('view-project/' . base64_encode($_POST['project_id']));
  }

  function delete_discussion()
  {
    $updateData = [
      'status' => '0',
      'updated_date' => date('Y-m-d H:i:s')
    ];
    $op_user_id = $this->session->userdata('op_user_id');

    $del = $this->model->updateData('project_discussion', $updateData, array('pd_id' => $_POST['d_id']));
    $logArray = [
      'project_id' => $_POST['project_id'],
      'activity_id' => '5',
      'user_id' => $op_user_id,
      'affected_id' => $_POST['d_id'],
      'action_id' => '3',

    ];
    $this->db->insert('project_log', $logArray);

    if (!empty($del)) {
      $this->session->set_flashdata('msg', 'Project Discussion Deleted Successfully.');
      $this->session->set_flashdata('class', 'success');
    } else {
      $this->session->set_flashdata('msg', 'Project Discussion Delete Failed.');
      $this->session->set_flashdata('class', 'danger');
    }


    //  $del = $this->model->deleteData('project_discussion',array('pd_id'=>$_POST['d_id']));

    //     $this->session->set_flashdata('msg', 'Project Discussion Deleted Successfully.');          

  }

  public function getDiscussionDetails()
  {
    $discussion_id = $this->input->post('discussion_id');
    //  echo $discussion_id; die;
    if ($discussion_id) {
      $discussion = $this->model->getData('project_discussion', array('pd_id' => $discussion_id));

      if ($discussion) {
        // $task['task_file'] = !empty($task['task_file']) ? explode(',', $task['task_file']) : [];
        //print_r($task); die;
        echo json_encode(['success' => true, 'data' =>  $discussion]);
      } else {
        echo json_encode(['success' => false, 'message' => 'Discussion Id  not found.']);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'Invalid discussion ID.']);
    }
  }

  function updateDiscussion()
  {

    $updateData = $_POST;
    $op_user_id = $this->session->userdata('op_user_id');

    $updateData['updated_date'] = date('Y-m-d H:i:s');

    // Fetch the existing record before update
    // echo"<pre>"; print_r($updateData);
    $existingRecord = $this->model->getData('project_discussion', array('pd_id' => $_POST['pd_id']));
    // echo"<pre>"; print_r($existingRecord);
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
      $this->session->set_flashdata('msg', 'Discussion not found.');
      //  redirect('view-lead/'.$id);
      return;
    }

    $changes = [];

    // Compare fields
    foreach ($updateData as $key => $newValue) {
      if (isset($existingRecord->$key)) {
        $oldValue = trim(strval($existingRecord->$key));
        $newValue = trim(strval($newValue));

        if ($oldValue != $newValue) {
          $changes[] = [
            'field' => $key,
            'old_value' => $oldValue,
            'new_value' => $newValue
          ];
        }
      }
    }

    if (!empty($changes)) {
      $details = json_encode($changes);
    } else {
      $details = 'No changes made';
    }
    
    $this->model->updateData('project_discussion', $updateData, array('pd_id' => $_POST['pd_id']));
    $logArray = [
      'project_id' => $_POST['project_id'],
      'activity_id' => '5',
      'user_id' => $op_user_id,
      'affected_id' => $_POST['pd_id'],
      'action_id' => '2',
      'details' => $details

    ];
    $this->db->insert('project_log', $logArray);
    $this->session->set_flashdata('msg', 'Discussion Details Updated Successfully.');
    $this->session->set_flashdata('class', 'success');

    //  redirect('view-project/'. base64_encode($_POST['project_id']));

    // }else{
    // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
    // redirect('view-lead/'.$id);
    //}
  }

  function submitfiles($id)
  {
    $op_user_id = $this->session->userdata('op_user_id');
    $project_id = base64_decode($id);
    
    if (!empty($_FILES['file_covering']['name'][0])) {
  foreach ($_FILES['file_covering']['name'] as $key => $value) {
    $original_name = $_FILES['file_covering']['name'][$key];
    $tmp_name = $_FILES['file_covering']['tmp_name'][$key];
    $file_type = $_FILES['file_covering']['type'][$key];

    $uploaddir = 'uploads/project/';
    if (!is_dir($uploaddir)) {
      mkdir($uploaddir, 0777, true);
    }

    $ext = pathinfo($original_name, PATHINFO_EXTENSION);
    $filename = uniqid() . '.' . strtolower($ext);
    $uploadfile = $uploaddir . $filename;

    if (move_uploaded_file($tmp_name, $uploadfile)) {
      $saveData = [
        'project_id' => $project_id,
        'file_name' => $filename,
        'file_type' => $file_type,
        'user_id' => $op_user_id
      ];
      $this->db->insert('project_files', $saveData);

      $inserted_id = $this->db->insert_id();

      $logArray = [
        'project_id' => $project_id,
        'activity_id' => '4',
        'user_id' => $op_user_id,
        'affected_id' => $inserted_id,
        'action_id' => '1',
      ];
      $this->db->insert('project_log', $logArray);
    }
  }
}

    $this->session->set_flashdata('msg', 'Files Saved Successfully.');
    $this->session->set_flashdata('class', 'success');

    redirect('view-project/' . $id);
  }

  function delete_files()
  {
    $op_user_id = $this->session->userdata('op_user_id');
    $del = $this->model->deleteData('project_files', array('pf_id' => $_POST['file_id']));
    $logArray = [
      'project_id' => $_POST['pro_id'],
      'activity_id' => '4',
      'user_id' => $op_user_id,
      'affected_id' => $_POST['file_id'],
      'action_id' => '3',

    ];

    // print_r($logArray);

    $this->db->insert('project_log', $logArray);

    $this->session->set_flashdata('msg', 'Project File Deleted Successfully.');
    $this->session->set_flashdata('class', 'success');

    redirect('view-project/' . base64_encode($_POST['pro_id']));
  }

  function add_milestones()
  {
    $postData['milestones_name'] = $_POST['mil_name'];
    $postData['due_date'] = $_POST['due_date'];
    $postData['show_description_to_customer'] = $_POST['show_description_to_customer'];
    $postData['description'] = $_POST['description'];
    $postData['order'] = $_POST['order'];
    $postData['project_id'] = $_POST['pro_id'];

    $op_user_id = $this->session->userdata('op_user_id');
    $this->db->insert('project_milestones', $postData);

    $inserted_id = $this->db->insert_id();

    $logArray = [
      'project_id' => $postData['project_id'],
      'activity_id' => '3',
      'user_id' => $op_user_id,
      'affected_id' => $inserted_id,
      'action_id' => '1',

    ];
    $this->db->insert('project_log', $logArray);

    $this->session->set_flashdata('msg', 'Project Milestones Added Successfully.');
    $this->session->set_flashdata('class', 'success');
    
    // redirect('view-project/' . base64_encode($postData['project_id']));
  }

  function delete_milestone()
  {
    $op_user_id = $this->session->userdata('op_user_id');

    $del = $this->model->deleteData('project_milestones', array('pm_id' => $_POST['m_id']));
    $logArray = [
      'project_id' => $_POST['pro_id'],
      'activity_id' => '3',
      'user_id' => $op_user_id,
      'affected_id' => $_POST['m_id'],
      'action_id' => '3',

    ];
    $this->db->insert('project_log', $logArray);

    $this->session->set_flashdata('msg', 'Project Milestones Deleted Successfully.');
    $this->session->set_flashdata('class', 'success');

    // if (!empty($del)) {
      
    // } else {
    //   $this->session->set_flashdata('msg', 'Project Milestones Delete Failed.');
    //   $this->session->set_flashdata('class', 'danger');
    // }

    // redirect('view-project/' . base64_encode($_POST['pro_id']));
  }

  function get_milestone()
  {
    date_default_timezone_set('Asia/Kolkata');
    $res = $this->model->getSqlData("select * from project_milestones where pm_id ='" . $_POST['m_id'] . "' AND project_id ='" . $_POST['pro_id'] . "'")[0];
    $res['due_date'] = date('d/m/Y', strtotime($res['due_date']));
    echo json_encode($res);
  }


  function save_milestones()
  {
    $postData['milestones_name'] = $_POST['mil_name'];
    $postData['due_date'] = $_POST['due_date'];
    $postData['show_description_to_customer'] = $_POST['show_description_to_customer'];
    $postData['order'] = $_POST['order'];
    $postData['description'] = $_POST['description'];
    $postData['project_id'] = $_POST['project_id'];
    $postData['due_date'] = date('Y-m-d H:i:s', strtotime($postData['due_date']));
    $op_user_id = $this->session->userdata('op_user_id');

    // Fetch the existing record before update
    $existingRecord = $this->model->getData('project_milestones', array('pm_id' => $_POST['e_m_id']));
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
      $this->session->set_flashdata('msg', 'Milestone not found.');
      //redirect('view-lead/'.$id);
      return;
    }

    $changes = [];

    // Compare fields
    foreach ($postData as $key => $newValue) {
      if (isset($existingRecord->$key)) {
        $oldValue = trim(strval($existingRecord->$key));
        $newValue = trim(strval($newValue));

        // Debug field comparison
        //echo "Checking: $key → Old: [$oldValue], New: [$newValue] <br>";

        if ($oldValue != $newValue) {
          $changes[] = [
            'field' => $key,
            'old_value' => $oldValue,
            'new_value' => $newValue
          ];
        }
      }
    }

    if (!empty($changes)) {
      $details = json_encode($changes);
    } else {
      $details = 'No changes made';
    }

    $this->model->updateData('project_milestones', $postData, array('project_id' => $_POST['project_id'], 'pm_id' => $_POST['e_m_id']));
    
    $logArray = [
      'project_id' => $postData['project_id'],
      'activity_id' => '3',
      'user_id' => $op_user_id,
      'affected_id' => $_POST['e_m_id'],
      'action_id' => '2',
      'details' => $details
    ];
    $this->db->insert('project_log', $logArray);

    $this->session->set_flashdata('msg', 'Project Milestones Update Successfully.');
    $this->session->set_flashdata('class', 'success');

    // redirect('view-project/' . base64_encode($_POST['project_id']));
  }

  function update_project_milestone()
  {
    $postData['milestones_name'] = $_POST['milestones_name'];
    $postData['due_date'] = $_POST['due_date'];
    $postData['show_description_to_customer'] = $_POST['show_description_to_customer'];
    $postData['order'] = $_POST['order'];
    $postData['description'] = $_POST['description'];
    $postData['project_id'] = $_POST['project_id'];
    $postData['due_date'] = date('Y-m-d H:i:s', strtotime($postData['due_date']));

    $this->model->updateData('project_milestones', $postData, array('project_id' => $_POST['project_id'], 'pm_id' => $_POST['pm_id']));

    $this->session->set_flashdata('msg', 'Project Milestones Update Successfully.');
    $this->session->set_flashdata('class', 'success');

    redirect('view-project/' . base64_encode($postData['project_id']));
  }

  function submittask($id)
  {
    $postData = $_POST;
    $op_user_id = $this->session->userdata('op_user_id');
    $postData['created_by'] = $op_user_id;
    unset($postData['file_type']);
    unset($postData['task_file']);
    $postData['project_id'] = base64_decode($id);
    $task_id = $this->model->insertData('task', $postData);
    if ($task_id) {

      //print_r($_FILES); die;

      if (!empty($_FILES['file_covering']['name'])) {
        foreach ($_FILES['file_covering']['name'] as $key => $value) {

          $fvalue = $_FILES['file_covering']['name'][$key];
          $uploaddir = 'uploads/project/task/';
          $filename = rand() . basename($fvalue);
          $uploadfile = $uploaddir . $filename;
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if (move_uploaded_file($_FILES['file_covering']['tmp_name'][$key], $uploadfile)) {
            $imgData['image_name'] = $filename;
            $imgData['file_type'] =  $_FILES['file_covering']['type'][$key];

            $imgData['task_id'] = $task_id;
            $this->model->insertData('task_image', $imgData);
          }
        }
      }
      $time_sheet['task'] = $task_id;
      $time_sheet['project_id'] = $id;
      $time_sheet['start_time'] = $postData['start_date'];
      $time_sheet['end_time'] = $postData['due_date'];
      $time_sheet['member'] = $this->session->userdata('op_user_id');

      $this->model->insertData('project_time_sheet', $time_sheet);

      $this->session->set_flashdata('msg', 'Task Details Saved Successfully.');
      $this->session->set_flashdata('class', 'success');
      redirect('view-project/' . $id);
    } else {
      $this->session->set_flashdata('msg', 'Task Add Failed.');
      $this->session->set_flashdata('class', 'danger');
      redirect('view-project/' . $id);
    }
  }

  public function getTaskDetails()
  {
    $task_id = $this->input->post('task_id');

    if ($task_id) {
      $task = $this->model->getData('task', array('task_id' => $task_id));

      if ($task) {
        $task_images = $this->model->getData('task_image', array('task_id' => $task_id));

        echo json_encode(['success' => true, 'data' => $task, 'task_images' => $task_images]);
      } else {
        echo json_encode(['success' => false, 'message' => 'Task not found.']);
      }
    } else {
      echo json_encode(['success' => false, 'message' => 'Invalid task ID.']);
    }
  }

  function updatetask($id)
  {
    $updateData = $_POST;
    $op_user_id = $this->session->userdata('op_user_id');
    $project_id = base64_decode($id);
    $updateData['created_by'] = $op_user_id;
    $updateData['project_id'] = $project_id;

    $updateData['start_date'] = date($updateData['start_date']);
    $updateData['end_date'] = date($updateData['end_date']);
    // $existingCov = $_POST['filerecd'] ?? [];  // Existing files from the form

    $existingCov = $_POST['filercrd'] ?? [];
    // print_r($existingCov1);
    unset($updateData['filercrd']);
    // Fetch the existing record before updating
    $existingRecord = $this->model->getData('task', array('task_id' => $_POST['task_id']));
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
      $this->session->set_flashdata('msg', 'Task not found.');
      $this->session->set_flashdata('class', 'danger');
      redirect('view-lead/' . $id);
      return;
    }

    $changes = [];


    if (!empty($_FILES['file_covering_edit']['name'])) {

      $uploadedFileNames = [];  // To track newly uploaded file names
      $existingCovFiles = $this->model->getData('task_image', array('task_id' => $_POST['task_id']));

      $existingCovFileNames = array_column($existingCovFiles, 'image_name');

      //  echo"exist in database"; echo"<pre>"; print_r($existingCovFileNames);
      //  echo"file name blank";echo"<pre>"; print_r($existingCov);
      foreach ($_FILES['file_covering_edit']['name'] as $key => $fileName) {

        if (!empty($fileName)) {
          // echo"file name found";

          $uploaddir = 'uploads/project/task/';
          $newFileName = rand() . '_' . basename($fileName);
          $uploadfile = $uploaddir . $newFileName;

          if (move_uploaded_file($_FILES['file_covering_edit']['tmp_name'][$key], $uploadfile)) {
            // echo"check move";
            // Insert the new file record into the database
            $this->model->insertData('task_image', [
              'task_id' => $_POST['task_id'],
              'image_name' => $newFileName,
              'file_type' => $_FILES['file_covering_edit']['type'][$key]
            ]);

            $uploadedFileNames[] = $newFileName; // Track uploaded file
          }
        } else {
          //echo"file name not foud";
          $uploadedFileNames[] =  $existingCov[$key] ?? '';
        }
      }
      // Log newly added files
      if (!empty($uploadedFileNames)) {
        $changes[] = [
          'field' => 'Uploaded Files',
          'old_value' => '',
          'new_value' => implode(', ', array_filter($uploadedFileNames))
        ];
      }
    }

    $filesToDelete = array_diff($existingCovFileNames, $uploadedFileNames);

    foreach ($filesToDelete as $fileToDelete) {
      // Delete from database
      $this->model->deleteData('task_image', array('task_id' => $_POST['task_id'], 'image_name' => $fileToDelete));

      // Delete from the server
      $filePath = 'uploads/project/task/' . $fileToDelete;
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    // Log deleted files
    if (!empty($filesToDelete)) {
      $changes[] = [
        'field' => 'Deleted Files',
        'old_value' => implode(', ', $filesToDelete),
        'new_value' => ''
      ];
    }


    // Compare fields to log changes
    foreach ($updateData as $key => $newValue) {
      if (isset($existingRecord->$key)) {
        $oldValue = trim(strval($existingRecord->$key));
        $newValue = trim(strval($newValue));

        if ($oldValue != $newValue) {
          $changes[] = [
            'field' => $key,
            'old_value' => $oldValue,
            'new_value' => $newValue
          ];
        }
      }
    }

    $details = !empty($changes) ? json_encode($changes) : 'No changes made';

    // Update the task record
    $this->model->updateData('task', $updateData, array('task_id' => $_POST['task_id']));

    // Log the update action
    $logArray = [
      'project_id' => $project_id,
      'activity_id' => '1',
      'user_id' => $op_user_id,
      'affected_id' => $_POST['task_id'],
      'action_id' => '2',
      'details' => $details
    ];
    $this->db->insert('project_log', $logArray);

    $this->session->set_flashdata('msg', 'Task Details Updated Successfully.');
      $this->session->set_flashdata('class', 'success');
    redirect('view-project/' . $id);
  }

  function delete_task()
  {
    $op_user_id = $this->session->userdata('op_user_id');

    $del = $this->model->deleteData('task', array('task_id' => $_POST['task_id']));
    $logArray = [
      'project_id' => $_POST['pro_id'],
      'activity_id' => '1',
      'user_id' => $op_user_id,
      'affected_id' => $_POST['task_id'],
      'action_id' => '3',

    ];
    $this->db->insert('project_log', $logArray);
    if (!empty($del)) {
      $this->session->set_flashdata('msg', 'Project Task Deleted Successfully.');
    } else {
      $this->session->set_flashdata('msg', 'Project Task Delete Failed.');
    }
  }


  function download_db_docs($task_id)
  {
    $task_id = $task_id;
    $task = $this->model->getData('task_image', ['task_id' => $task_id]);
    //print_r($task); die;
    $files = [];
    $dir = './uploadss/project/task/';
    if (!empty($task)) {
      foreach ($task as $key => $val) {
        $files[] =  $dir . $val['image_name'];
      }
    }


    $zip = new ZipArchive();
    $zip_name = 'task_docs.zip';

    if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE) {
      foreach ($files as $value) {
        $zip->addFile($value, basename($value));
      }
      $zip->close();
      $this->downloadFile2($zip_name);
      unlink($zip_name);
    }
  }

  function downloadFile2($file_url)
  {
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
    readfile($file_url);
  }

  function task_status_change()
  {
    //print_r($_POST); die;
    $this->model->updateData('task', array('task_status' => $_POST['status'], 'updated_date' => date("Y-m-d")), array('project_id' => $_POST['pro_id'], 'task_id' => $_POST['task_id']));
    $this->session->set_flashdata('msg', 'Task Status Update Successfully.');
  }

  function start_timer()
  {
    if (!empty($_POST)) {
      $project_id = $_POST['project_id'];

      $data['project_id'] = isset($_POST['project_id']) ? $_POST['project_id'] : '';
      $data['task_id'] = isset($_POST['task_id']) ? $_POST['task_id'] : '';
      $data['role_id'] = $this->session->userdata('user_role');
      $data['op_user_id'] = $this->session->userdata('op_user_id');
      date_default_timezone_set('Asia/Kolkata');
      $data['start_time'] = date('Y-m-d H:i:s');
      $data['flag'] = 1;
      $data['spend_hours'] = 0;

      $recordP = $this->model->getSqlData("select * from project_task_report where task_id='" . $_POST['task_id'] . "' and project_id='" . $_POST['project_id'] . "'");
      if (!empty($recordP)) {
        $project_task_id = $recordP[0]['ptr_id'];
      } else {
        $insert1 = [
          'project_id' => $_POST['project_id'],
          'task_id' => $_POST['task_id'],
          'user_id' => $this->session->userdata('op_user_id'),
          'project_task_status' => '1',
          'start_date' => date('Y-m-d'),
        ];
        $project_task_id = $this->model->insertData('project_task_report', $insert1);
      }
      //$task_id=$this->model->insertData('task_timer_count',$data);
      $insertData = [
        'project_id' => $project_id,
        'task_id' => $data['task_id'],
        'user_id' => $data['op_user_id'],
        'timer_status' => 1,
        'start_start_time' => date('Y-m-d H:i:s'),

      ];

      $taskRecord = $this->model->getSqlData("select * from task where task_id='" . $_POST['task_id'] . "' and project_id='" . $_POST['project_id'] . "'");
      if (!empty($taskRecord)) {
        if ($taskRecord[0]['task_status'] == 1) {
          $this->model->updateData('task', array('task_status' => 2, 'updated_date' => date("Y-m-d"), 'timer_status'=>'Start'), array('project_id' => $_POST['project_id'], 'task_id' => $_POST['task_id']));
        }
      }
      $task_log_id = $this->model->insertData('project_task_log', $insertData);

      // $data_time['stop_list'] =$this->model->getData('task_timer_count',$data);

      $response = array(
        'project_task_id' => $project_task_id,
        'task_log_id' => $task_log_id
      );
      echo json_encode($response);
      exit;
    }
  }

  function update_timer()
  {
    if (!empty($_POST)) 
    {
        $project_id = $_POST['project_id'];
        $task_id = $_POST['task_id'];
        $elapsed_seconds = $_POST['elapsed_seconds'];

        $this->model->updateData('task', array('task_timer' => $elapsed_seconds, 'updated_date' => date("Y-m-d")), 
              array('project_id' => $project_id, 'task_id' => $task_id));
        $response = array(
          'project_task_id' => $project_id,
          'task_log_id' => $task_id
        );
        echo json_encode($response);
        exit;
    }
  }

  function hold_timer()
  {
    if (!empty($_POST)) {
      $task_log_id = isset($_POST['task_log_id']) ? $_POST['task_log_id'] : '';
      $project_task_id = isset($_POST['project_task_id']) ? $_POST['project_task_id'] : '';
      $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
      $task_id = isset($_POST['task_id']) ? $_POST['task_id'] : '';
      $role_id = $this->session->userdata('user_role');
      $op_user_id = $this->session->userdata('op_user_id');
      date_default_timezone_set('Asia/Kolkata');
      $data['hold_time'] = date('Y-m-d H:i:s');
      $data_time = $this->model->getData('project_task_log', array('log_id' => $_POST['task_log_id']));
      // echo $project_task_id;    echo $_POST['task_log_id']; echo '<pre>';print_r($data_time);
      $start_time = new DateTime($data_time[0]['start_start_time']); // Convert to DateTime object
      $hold_time = new DateTime($data['hold_time']); // Convert to DateTime object

      $this->model->updateData('task', array('updated_date' => date("Y-m-d"), 'timer_status'=>'Pause'), 
      array('project_id' => $project_id, 'task_id' => $task_id));

      // Calculate the difference
      $interval = $start_time->diff($hold_time);

      // Convert days into hours and add to total hours
      $total_hours = ($interval->d * 24) + $interval->h; // Convert days to hours and add
      $total_minutes = $interval->i;
      $total_seconds = $interval->s;


      // Format the output
      $time_duration = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);


      $insertData = [
        'project_id' => $project_id,
        'task_id' => $_POST['task_id'],
        'user_id' => $op_user_id,
        'timer_status' => 2,
        'start_hold_time' => date('Y-m-d H:i:s'),

      ];

      $updateRecoord = [
        'time_duration' => $time_duration,
        'stop_start_time' => date('Y-m-d H:i:s'),

      ];
      $totalTimeSpend = '';
      $spndHours = '';
      $task_log_id = $this->model->insertData('project_task_log', $insertData);
      $this->model->updateData('project_task_log', $updateRecoord, array('log_id' => $_POST['task_log_id']));
      $recordP = $this->model->getSqlData("select * from project_task_report where task_id='" . $_POST['task_id'] . "' and project_id='" . $_POST['project_id'] . "'");
      if (!empty($recordP)) {
        if ($recordP[0]['spend_hour'] !== '') {
          list($hours, $minutes, $seconds) = explode(":", $recordP[0]['spend_hour']);
          $existingSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;

          // Convert new time_duration to seconds
          list($newHours, $newMinutes, $newSeconds) = explode(":", $time_duration);
          $newTotalSeconds = ($newHours * 3600) + ($newMinutes * 60) + $newSeconds;

          // Add both time durations
          $totalSeconds = $existingSeconds + $newTotalSeconds;

          // Convert total seconds back to HH:MM:SS format
          $totalTimeSpend = sprintf(
            "%02d:%02d:%02d",
            floor($totalSeconds / 3600),
            floor(($totalSeconds % 3600) / 60),
            $totalSeconds % 60
          );
        } else {
          $totalTimeSpend = $time_duration;
        }
      }
      $upData = [
        'spend_hour' => $totalTimeSpend,
      ];
      $this->model->updateData('project_task_report', $upData, array('ptr_id' => $project_task_id));

      $response = array(
        'project_task_id' => $project_task_id,
        'task_log_id' => $task_log_id
      );
      echo json_encode($response);
      exit;
    }
  }
  function restart_timer()
  {
    if (!empty($_POST)) {
      $log_id = isset($_POST['task_log_id']) ? $_POST['task_log_id'] : '';
      $project_task_id = isset($_POST['project_task_id']) ? $_POST['project_task_id'] : '';
      $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
      $task_id = isset($_POST['task_id']) ? $_POST['task_id'] : '';
      $role_id = $this->session->userdata('user_role');
      $op_user_id = $this->session->userdata('op_user_id');
      date_default_timezone_set('Asia/Kolkata');
      $data['resume_time'] = date('Y-m-d H:i:s');

      
      $data_timer = $this->model->getData('task', array('project_id' => $project_id, 'task_id' => $task_id));

      $this->model->updateData('task', array('updated_date' => date("Y-m-d"), 'timer_status'=>'Restart'), 
      array('project_id' => $project_id, 'task_id' => $task_id));

      $data_time = $this->model->getData('project_task_log', array('log_id' => $_POST['task_log_id']));
      //   echo $_POST['task_log_id']; echo '<pre>';print_r($data_time);
      $hold_time = new DateTime($data_time[0]['start_hold_time']); // Convert to DateTime object
      $resume_time = new DateTime($data['resume_time']); // Convert to DateTime object

      // Calculate the difference
      $interval = $hold_time->diff($resume_time);

      // Convert days into hours and add to total hours
      $total_hours = ($interval->d * 24) + $interval->h; // Convert days to hours and add
      $total_minutes = $interval->i;
      $total_seconds = $interval->s;


      // Format the output
      $time_duration = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);


      $insertData = [
        'project_id' => $project_id,
        'task_id' => $_POST['task_id'],
        'user_id' => $op_user_id,
        'timer_status' => 4,
        'start_start_time' => date('Y-m-d H:i:s'),

      ];

      $updateRecoord = [
        'time_duration' => $time_duration,
        'stop_hold_time' => date('Y-m-d H:i:s'),


      ];

      $task_log_id = $this->model->insertData('project_task_log', $insertData);
      $this->model->updateData('project_task_log', $updateRecoord, array('log_id' => $_POST['task_log_id']));


      $response = array(
        'project_task_id' => $project_task_id,
        'task_log_id' => $task_log_id,
        'elapsed_seconds' => $data_timer[0]['task_timer']
      );
      echo json_encode($response);
      exit;
    }
  }

  //         function stop_timer(){


  //           if(!empty($_POST)){
  //             $log_id = isset($_POST['task_log_id']) ? $_POST['task_log_id'] : '';
  //             $project_task_id = isset($_POST['project_task_id']) ? $_POST['project_task_id'] : '';
  //             $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
  //             $task_id = isset($_POST['task_id']) ? $_POST['task_id'] : '';
  //             $role_id = $this->session->userdata('user_role');
  //             $op_user_id = $this->session->userdata('op_user_id');
  //             date_default_timezone_set('Asia/Kolkata');
  //             $data['stop_time'] = date('Y-m-d H:i:s');
  //             $stop_time = new DateTime($data['stop_time']);

  //             $data_time =$this->model->getData('project_task_log',array('log_id'=>$_POST['task_log_id']));
  //           // echo"my array found"; print_r($data_time);
  //             if($data_time[0]['start_start_time'] !== '0000-00-00 00:00:00')
  //           // if($data_time[0]['timer_status']==1 || $data_time[0]['timer_status']==4)
  //             {
  //                // echo"check";
  //                 $start_time = new DateTime($data_time[0]['start_start_time']); // Convert to DateTime object


  //               // Calculate the difference
  //               $interval = $stop_time->diff($start_time);

  //               // Convert days into hours and add to total hours
  //               $total_hours = ($interval->d * 24) + $interval->h; // Convert days to hours and add
  //               $total_minutes = $interval->i;
  //               $total_seconds = $interval->s;


  //               // Format the output
  //               $time_duration = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);

  //               if($_POST['task_status'] == 5)
  //               {

  //                   $insertData=[
  //                     'project_id'=>$project_id,
  //                     'task_id'=>$_POST['task_id'],
  //                     'user_id'=>$op_user_id,
  //                     'timer_status'=>3,
  //                     'start_stop_time'=>date('Y-m-d H:i:s'),
  //                     'project_status'=>2

  //                   ];

  //                   $updateRecoord=[
  //                     'time_duration'=>$time_duration,
  //                     'stop_start_time'=>date('Y-m-d H:i:s'),

  //                   ];

  //                   $task_log_id= $this->model->insertData('project_task_log',$insertData);
  //                   $this->model->updateData('project_task_log',$updateRecoord,array('log_id'=>$_POST['task_log_id']));
  //                   $this->model->updateData('task',array('task_status'=>'5','updated_date'=>date("Y-m-d")),array('project_id'=>$_POST['project_id'],'task_id'=>$_POST['task_id'])); 

  //                   $recordDtl=$this->model->getSqlData("select * from project_task_log where task_id='".$_POST['task_id']."' and project_id='".$_POST['project_id']."' and timer_status IN (1, 4) ");
  //                  echo"<pre>"; print_r($recordDtl);
  //                   $totalSeconds = 0;
  //                     $totalSpendSeconds = 0;
  //                     foreach ($recordDtl as $record) {
  //                         if (!empty($record['time_duration'])) { 
  //                             list($hours, $minutes, $seconds) = explode(":", $record['time_duration']);
  //                             $totalSeconds += ($hours * 3600) + ($minutes * 60) + $seconds;
  //                         }
  //                     }

  //                     // Convert total seconds back to HH:MM:SS format
  //                     $totalTime = sprintf('%02d:%02d:%02d', 
  //                         floor($totalSeconds / 3600), 
  //                         floor(($totalSeconds % 3600) / 60), 
  //                         $totalSeconds % 60
  //                     );

  //                       $data_time1 =$this->model->getData('project_task_log',array('log_id'=>$_POST['task_log_id']));
  //                       list($hours, $minutes, $seconds) = explode(":", $data_time1[0]['time_duration']);
  //                       $totalSeconds1 += ($hours * 3600) + ($minutes * 60) + $seconds;

  //                       $data_time2=$this->model->getData('project_task_report',array('ptr_id'=>$_POST['project_task_id']));
  //                       print_r($data_time2);
  //                       list($hours, $minutes, $seconds) = explode(":", $data_time2[0]['spend_hour']);
  //                       $totalSeconds2 += ($hours * 3600) + ($minutes * 60) + $seconds;

  //                       $finalSeconds=$totalSeconds1+$totalSeconds2;

  //                       // Convert total seconds back to HH:MM:SS format
  //                       $totalSpensTime = sprintf('%02d:%02d:%02d', 
  //                           floor($finalSeconds / 3600), 
  //                           floor(($finalSeconds % 3600) / 60), 
  //                           $finalSeconds % 60
  //                       );

  //                       $updateFinal=[
  //                         'complete_hours'=>$totalTime,
  //                         'project_task_status'=>2,
  //                         'spend_hour'=>$totalSpensTime
  //                       ];

  //                       $this->model->updateData("project_task_report",$updateFinal,array('ptr_id'=>$_POST['project_task_id']));

  //               }
  //              else
  //              {

  //               //echo"after start in progress";

  //               $start_time = new DateTime($data_time[0]['start_start_time']); // Convert to DateTime object


  //              // Calculate the difference
  //              $interval = $stop_time->diff($start_time);

  //              // Convert days into hours and add to total hours
  //              $total_hours = ($interval->d * 24) + $interval->h; // Convert days to hours and add
  //              $total_minutes = $interval->i;
  //              $total_seconds = $interval->s;


  //              // Format the output
  //              $time_duration = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);
  // echo $time_duration;
  //                   $insertData=[
  //                     'project_id'=>$project_id,
  //                     'task_id'=>$_POST['task_id'],
  //                     'user_id'=>$op_user_id,
  //                     'timer_status'=>3,
  //                     'start_stop_time'=>date('Y-m-d H:i:s'),

  //                   ];

  //                   $updateRecoord=[
  //                     'time_duration'=>$time_duration,
  //                     'stop_start_time'=>date('Y-m-d H:i:s'),

  //                   ];

  //                   $task_log_id= $this->model->insertData('project_task_log',$insertData);
  //                   $this->model->updateData('project_task_log',$updateRecoord,array('log_id'=>$_POST['task_log_id']));

  //                   $recordP=$this->model->getSqlData("select * from project_task_report where task_id='".$_POST['task_id']."' and project_id='".$_POST['project_id']."'");
  //                   if(!empty($recordP)){
  //                     if($recordP[0]['spend_hour'] !== ''){
  //                       list($hours, $minutes, $seconds) = explode(":", $recordP[0]['spend_hour']);
  //                        $existingSeconds = ($hours * 3600) + ($minutes * 60) + $seconds;

  //                        // Convert new time_duration to seconds
  //                         list($newHours, $newMinutes, $newSeconds) = explode(":", $time_duration);
  //                         $newTotalSeconds = ($newHours * 3600) + ($newMinutes * 60) + $newSeconds;

  //                         // Add both time durations
  //                         $totalSeconds = $existingSeconds + $newTotalSeconds;

  //                         // Convert total seconds back to HH:MM:SS format
  //                         $totalTimeSpend = sprintf("%02d:%02d:%02d", 
  //                             floor($totalSeconds / 3600), 
  //                             floor(($totalSeconds % 3600) / 60), 
  //                             $totalSeconds % 60
  //                         );



  //                     }
  //                     else
  //                     {
  //                       $totalTimeSpend = $time_duration;
  //                     }

  //                   }
  //                   $upData=[
  //                     'spend_hour'=>$totalTimeSpend,
  //                   ];
  //                   $this->model->updateData('project_task_report',$upData,array('ptr_id'=>$project_task_id));


  //              }




  //             }
  //             else{

  //               $hold_time = new DateTime($data_time[0]['start_hold_time']); // Convert to DateTime object


  //              // Calculate the difference
  //              $interval = $stop_time->diff($hold_time);

  //              // Convert days into hours and add to total hours
  //              $total_hours = ($interval->d * 24) + $interval->h; // Convert days to hours and add
  //              $total_minutes = $interval->i;
  //              $total_seconds = $interval->s;


  //              // Format the output
  //              $time_duration = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);
  //               $insertData=[
  //                 'project_id'=>$project_id,
  //                 'task_id'=>$_POST['task_id'],
  //                 'user_id'=>$op_user_id,
  //                 'timer_status'=>3,
  //                 'start_stop_time'=>date('Y-m-d H:i:s'),

  //               ];

  //               $updateRecoord=[
  //                 'time_duration'=>$time_duration,
  //                 'stop_hold_time'=>date('Y-m-d H:i:s'),

  //               ];

  //               $task_log_id= $this->model->insertData('project_task_log',$insertData);
  //               $this->model->updateData('project_task_log',$updateRecoord,array('log_id'=>$_POST['task_log_id']));

  //             }


  //                 $response = array(
  //                   'project_task_id' => $project_task_id,
  //                   'task_log_id' => $task_log_id
  //               );
  //               echo json_encode($response); exit;

  //           }
  //         }

  function stop_timer()
  {

    $log_id = isset($_POST['task_log_id']) ? $_POST['task_log_id'] : '';
    $project_task_id = isset($_POST['project_task_id']) ? $_POST['project_task_id'] : '';
    $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
    $task_id = isset($_POST['task_id']) ? $_POST['task_id'] : '';
    $stopReason = isset($_POST['stopReason']) ? $_POST['stopReason'] : '';
    $role_id = $this->session->userdata('user_role');
    $op_user_id = $this->session->userdata('op_user_id');
    date_default_timezone_set('Asia/Kolkata');
    $data['stop_time'] = date('Y-m-d H:i:s');
    $stop_time = new DateTime($data['stop_time']);

    $data_time = $this->model->getData('project_task_log', array('log_id' => $_POST['task_log_id']));


    if ($data_time[0]['timer_status'] == 1 || $data_time[0]['timer_status'] == 4) {

      $start_time = new DateTime($data_time[0]['start_start_time']); // Convert to DateTime object


      // Calculate the difference
      $interval = $stop_time->diff($start_time);

      // Convert days into hours and add to total hours
      $total_hours = ($interval->d * 24) + $interval->h; // Convert days to hours and add
      $total_minutes = $interval->i;
      $total_seconds = $interval->s;


      // Format the output
      $time_duration = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);

      if ($_POST['task_status'] == 5) {

        $insertData = [
          'project_id' => $project_id,
          'task_id' => $_POST['task_id'],
          'user_id' => $op_user_id,
          'timer_status' => 3,
          'start_stop_time' => date('Y-m-d H:i:s'),
          'project_status' => 2,
          'stop_reason' => $stopReason
        ];

        $updateRecoord = [
          'time_duration' => $time_duration,
          'stop_start_time' => date('Y-m-d H:i:s'),

        ];

        $task_log_id = $this->model->insertData('project_task_log', $insertData);
        $this->model->updateData('project_task_log', $updateRecoord, array('log_id' => $_POST['task_log_id']));
        $this->model->updateData('task', array('task_status' => '5', 'updated_date' => date("Y-m-d")), array('project_id' => $_POST['project_id'], 'task_id' => $_POST['task_id']));

        $recordDtl = $this->model->getSqlData("select * from project_task_log where task_id='" . $_POST['task_id'] . "' and project_id='" . $_POST['project_id'] . "' and timer_status IN (1, 4) ");

        $totalSeconds = 0;
        $totalSpendSeconds = 0;
        foreach ($recordDtl as $record) {
          if (!empty($record['time_duration'])) {
            list($hours, $minutes, $seconds) = explode(":", $record['time_duration']);
            $totalSeconds += ($hours * 3600) + ($minutes * 60) + $seconds;
          }
        }

        // Convert total seconds back to HH:MM:SS format
        $totalTime = sprintf(
          '%02d:%02d:%02d',
          floor($totalSeconds / 3600),
          floor(($totalSeconds % 3600) / 60),
          $totalSeconds % 60
        );

        $data_time1 = $this->model->getData('project_task_log', array('log_id' => $_POST['task_log_id']));
        list($hours, $minutes, $seconds) = explode(":", $data_time1[0]['time_duration']);
        $totalSeconds1 += ($hours * 3600) + ($minutes * 60) + $seconds;

        $data_time2 = $this->model->getData('project_task_report', array('ptr_id' => $_POST['project_task_id']));

        list($hours, $minutes, $seconds) = explode(":", $data_time2[0]['spend_hour']);
        $totalSeconds2 += ($hours * 3600) + ($minutes * 60) + $seconds;

        $finalSeconds = $totalSeconds1 + $totalSeconds2;

        // Convert total seconds back to HH:MM:SS format
        $totalSpensTime = sprintf(
          '%02d:%02d:%02d',
          floor($finalSeconds / 3600),
          floor(($finalSeconds % 3600) / 60),
          $finalSeconds % 60
        );

        $updateFinal = [
          'complete_hours' => $totalTime,
          'project_task_status' => $_POST['task_status'],
          'spend_hour' => $totalSpensTime
        ];

        $this->model->updateData("project_task_report", $updateFinal, array('ptr_id' => $_POST['project_task_id']));
      } else {

        $updateRecoord = [
          'time_duration' => $time_duration,
          'stop_start_time' => date('Y-m-d H:i:s'),

        ];

        $insertData = [
          'project_id' => $project_id,
          'task_id' => $_POST['task_id'],
          'user_id' => $op_user_id,
          'timer_status' => 3,
          'start_stop_time' => date('Y-m-d H:i:s'),
          'stop_reason' => $stopReason
        ];



        $this->model->updateData('project_task_log', $updateRecoord, array('log_id' => $_POST['task_log_id']));
        $task_log_id = $this->model->insertData('project_task_log', $insertData);

        $this->model->updateData('task', array('task_status' => $_POST['task_status']), array('project_id' => $_POST['project_id'], 'task_id' => $_POST['task_id']));

        $data_time1 = $this->model->getData('project_task_log', array('log_id' => $_POST['task_log_id']));
        list($hours, $minutes, $seconds) = explode(":", $data_time1[0]['time_duration']);
        $totalSeconds1 += ($hours * 3600) + ($minutes * 60) + $seconds;

        $data_time2 = $this->model->getData('project_task_report', array('ptr_id' => $_POST['project_task_id']));

        list($hours, $minutes, $seconds) = explode(":", $data_time2[0]['spend_hour']);
        $totalSeconds2 += ($hours * 3600) + ($minutes * 60) + $seconds;

        $finalSeconds = $totalSeconds1 + $totalSeconds2;

        // Convert total seconds back to HH:MM:SS format
        $totalSpensTime = sprintf(
          '%02d:%02d:%02d',
          floor($finalSeconds / 3600),
          floor(($finalSeconds % 3600) / 60),
          $finalSeconds % 60
        );

        $updateFinal = [

          'project_task_status' => $_POST['task_status'],
          'spend_hour' => $totalSpensTime
        ];

        $this->model->updateData("project_task_report", $updateFinal, array('ptr_id' => $_POST['project_task_id']));
      }
    } else {

      $hold_time = new DateTime($data_time[0]['start_hold_time']); // Convert to DateTime object


      // Calculate the difference
      $interval = $stop_time->diff($hold_time);

      // Convert days into hours and add to total hours
      $total_hours = ($interval->d * 24) + $interval->h; // Convert days to hours and add
      $total_minutes = $interval->i;
      $total_seconds = $interval->s;


      // Format the output
      $time_duration = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);
      if ($_POST['task_status'] == 5) {

        $updateRecoord = [
          'time_duration' => $time_duration,
          'stop_hold_time' => date('Y-m-d H:i:s'),

        ];

        $insertData = [
          'project_id' => $project_id,
          'task_id' => $_POST['task_id'],
          'user_id' => $op_user_id,
          'timer_status' => 3,
          'start_stop_time' => date('Y-m-d H:i:s'),
          'stop_reason' => $stopReason
        ];


        $this->model->updateData('project_task_log', $updateRecoord, array('log_id' => $_POST['task_log_id']));
        $task_log_id = $this->model->insertData('project_task_log', $insertData);

        $this->model->updateData('task', array('task_status' => '5', 'updated_date' => date("Y-m-d")), array('project_id' => $_POST['project_id'], 'task_id' => $_POST['task_id']));

        $recordDtl = $this->model->getSqlData("select * from project_task_log where task_id='" . $_POST['task_id'] . "' and project_id='" . $_POST['project_id'] . "' and timer_status IN (1, 4) ");
        // echo"<pre>"; print_r($recordDtl);
        $totalSeconds = 0;
        $totalSpendSeconds = 0;
        foreach ($recordDtl as $record) {
          if (!empty($record['time_duration'])) {
            list($hours, $minutes, $seconds) = explode(":", $record['time_duration']);
            $totalSeconds += ($hours * 3600) + ($minutes * 60) + $seconds;
          }
        }

        // Convert total seconds back to HH:MM:SS format
        $totalTime = sprintf(
          '%02d:%02d:%02d',
          floor($totalSeconds / 3600),
          floor(($totalSeconds % 3600) / 60),
          $totalSeconds % 60
        );


        $updateFinal = [
          'complete_hours' => $totalTime,
          'project_task_status' => $_POST['task_status'],

        ];

        $this->model->updateData("project_task_report", $updateFinal, array('ptr_id' => $_POST['project_task_id']));
      } else {

        $updateRecoord = [
          'time_duration' => $time_duration,
          'stop_hold_time' => date('Y-m-d H:i:s'),

        ];

        $insertData = [
          'project_id' => $project_id,
          'task_id' => $_POST['task_id'],
          'user_id' => $op_user_id,
          'timer_status' => 3,
          'start_stop_time' => date('Y-m-d H:i:s'),
          'stop_reason' => $stopReason
        ];


        $this->model->updateData('project_task_log', $updateRecoord, array('log_id' => $_POST['task_log_id']));
        $task_log_id = $this->model->insertData('project_task_log', $insertData);
        $this->model->updateData('task', array('task_status' => $_POST['task_status']), array('project_id' => $_POST['project_id'], 'task_id' => $_POST['task_id']));
      }

      $response = array(
        'project_task_id' => $project_task_id,
        'task_log_id' => $task_log_id
      );
      echo json_encode($response);
      exit;
    }
  }


  function fetch_task_log()
  {
    if (isset($_POST['task_id'])) {
      $task_id = $_POST['task_id'];

      $query = "SELECT prt.*, op.* FROM project_task_log prt
    left join op_user op on op.op_user_id = prt.user_id
    WHERE task_id ='" . $_POST['task_id'] . "' and project_id='" . $_POST['project_id'] . "' ";

      $result = $this->model->getSqlData($query);

      // Generate table rows dynamically
      if (count($result) > 0) {
        foreach ($result as $row) {
          $timer_status = '';
          $stTime = '';
          $spTime = '';
          if ($row['timer_status'] == 1) {
            $timer_status = 'Work Start';
            $stTime = $row['start_start_time'];
            $spTime = $row['stop_start_time'];
          } elseif ($row['timer_status'] == 2) {
            $timer_status = 'Hold';
            $stTime = $row['start_hold_time'];
            $spTime = $row['stop_hold_time'];
          } elseif ($row['timer_status'] == 3) {
            $timer_status = 'Stop';
            $stTime = $row['start_stop_time'];
            $spTime = $row['stop_stop_time'];
          } elseif ($row['timer_status'] == 4) {
            $timer_status = 'Restart';
            $stTime = $row['start_start_time'];
            $spTime = $row['stop_start_time'];
          }


          echo "<tr>
                  <td>{$row['user_name']}</td>
                  <td>$timer_status</td>
                  <td>{$row['time_duration']}</td>
                  <td>$stTime</td>
                  <td>$spTime</td>
                  <td>{$row['stop_reason']}</td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='4'>No logs found.</td></tr>";
      }
    }
  }

  //  function check_user_val()
  //  {
  //   $task_log_id = isset($_POST['task_log_id']) ? $_POST['task_log_id'] : '';
  //   $op_user_id = $this->session->userdata('op_user_id');

  //   $checkVal=$this->model->getData('project_task_log',array('log_id'=>$task_log_id,'user_id'=>$op_user_id));
  //   if(!empty($checkVal))
  //   {
  //     $response = array(
  //       'status_check' => '1'
  //   );
  //   echo json_encode($response); exit;
  //   }
  //   else
  //   {
  //     $response = array(
  //       'status_check' => '0'
  //   );
  //   echo json_encode($response); exit;
  //   }
  //  } 

  function check_user_val()
  {
    $task_log_id = isset($_POST['task_log_id']) ? $_POST['task_log_id'] : '';
    $op_user_id = $this->session->userdata('op_user_id');

    $checkVal = $this->model->getData('project_task_log', array('log_id' => $task_log_id, 'user_id' => $op_user_id));

    $response = array(
      'status_check' => !empty($checkVal) ? '1' : '0'
    );

    echo json_encode($response);
  }
}
