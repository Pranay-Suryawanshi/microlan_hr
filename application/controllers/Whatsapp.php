<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Whatsapp extends CI_Controller {

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

  function whatsapp()
  {
    $op_user_id = $this->session->userdata('op_user_id');
    $pagename = 'Add Announcement';

    // $data['group_list'] = $this->model->getSqlData("SELECT cg.* from chat_groups cg
    //                                                   left join chat_group_users cu on cu.group_id = cg.group_id
    //                                                     Where cu.user_id IN ($op_user_id)");

    // $sql = "SELECT * from project Where project_active_status = 1";
    // $res = $this->db->query($sql);
    // if($res->num_rows() > 0)
    // {
    //     foreach($res->result() as $val)
    //     {
    //         $emp_id = $val->project_developer;
    //     }
    // }

    // // echo $emp_id;
    // $array = explode(",", $emp_id);
    // print_r($array);
    // die();

    // Where op_user_id IN ($op_user_id)
    

    $sql = "SELECT * from project Where project_active_status = 1";
    $res = $this->db->query($sql);
    if($res->num_rows() > 0)
    {
      foreach($res->result() as $row)
      {
          $row->project_developer;

          $exploded = explode(",", $row->project_developer);
          $size = count($exploded);

          for($k=0; $k<$size; $k++)
          {
            // echo 'project_developer-'.$exploded[$k];
            // echo "<br>";
            // echo 'op_user_id-'.$op_user_id;

            if($exploded[$k] == $op_user_id)
            {
              $data['project_list'] = $this->model->getSqlData("SELECT * from project Where project_active_status = 1");
            }
            else
            {
              $data['project_list'] = $this->model->getSqlData("SELECT * from project Where project_active_status = 1");
              // $data['project_list'] = $this->model->getSqlData("SELECT * from project Where op_user_id IN ($op_user_id) AND project_active_status = 1");
            }
          }
      }
    }

    $data['user_list'] = $this->model->getSqlData("SELECT op.*, op.flag as user_flag, c.*, opr.*
                                                    from op_user op 
                                                    left join company_setting c on c.comp_sett_id = op.company_id
                                                    left join op_user_role opr on opr.role_id = op.role_id
                                                      where op.op_user_id NOT IN ($op_user_id)");

    $this->load->view('admin/whatsapp/whatsapp_chat', $data,$pagename);
  }

  function chat_view()
  {
    $op_user_id = $this->session->userdata('op_user_id');
    $user_role = $this->session->userdata('user_role');
    
    // $data['group_list'] = $this->model->getSqlData("SELECT cg.* from chat_groups cg
    //                                                   left join chat_group_users cu on cu.group_id = cg.group_id
    //                                                     Where cu.user_id IN ($op_user_id)");

    $data['user_list'] = $this->model->getSqlData("SELECT op.*, c.*, opr.* from op_user op 
                                                    left join company_setting c on c.comp_sett_id = op.company_id
                                                    left join op_user_role opr on opr.role_id = op.role_id
                                                      where op.op_user_id NOT IN ($op_user_id)");

    // $chat_plan_ids = $this->model->getSqlData("SELECT op.*, c.* from op_user op 
    //                                                 left join company_setting c on c.comp_sett_id = op.company_id
    //                                                   where op.op_user_id NOT IN ($op_user_id)");

    // $cust_details = [];
    // $checker_details = [];
    // foreach ($chat_plan_ids as $chat_plan_detail) {

    //   $chat_user_detail = $this->model->getSqlData("
    //         SELECT mapping_user.mapping_plan_id ,
    //         mapping_plan.audit_status ,
    //         mapping_plan.plan_id ,
    //         organisationname.organisation, 
    //         organisationname.op_user_id as schoolId, 
    //         subscription.subscription_name
    //         FROM mapping_user
    //         JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
    //         JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
    //         JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
    //         WHERE mapping_user.mapping_plan_id =  " . $chat_plan_detail['mapping_plan_id'] . "
    //         and mapping_plan.audit_status <  '3'
    //   ");

    //   if(!empty($chat_user_detail)) 
    //   {
    //     array_push($cust_details, $chat_user_detail[0]);
    //   }


    //   $mapping_checker_detail = $this->model->getSqlData("
    //         SELECT mapping_user.mapping_plan_id ,
    //         mapping_plan.plan_id ,
    //         mapping_plan.audit_status ,
    //         organisationname.organisation, 
    //         organisationname.op_user_id as schoolId, 

    //         checkername.user_name, 
    //         checkername.op_user_id as ChekerId, 


    //         subscription.subscription_name
    //         FROM mapping_user
    //         JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
    //         JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
    //         JOIN op_user as  checkername  ON checkername.op_user_id = mapping_user.op_user_id
    //         JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
    //         WHERE mapping_user.mapping_plan_id =  " . $mapping_plan_detail['mapping_plan_id'] . "
    //         and mapping_user.role = 'c'
    //         and mapping_plan.audit_status <  '3'
    //         ");
    //   if (!empty($mapping_checker_detail)) {
    //     array_push($checker_details, $mapping_checker_detail[0]);
    //   }

    //   // print_r($mapping_user_detail);
    //   // die;
    // }

    // $data['user_list'] = $cust_details;
    // $data['checker_details'] = $checker_details;


    $this->load->view('admin/chat/chat_view', $data);
  }

  function group_chat()
  {
    $this->load->view('admin/chat/create_group');
  }

  function create_group()
  {
    $op_user_id = $this->session->userdata('op_user_id');
    $group_name = $this->input->post('group_name');
    $group_description = $this->input->post('group_description');

    $uploaddir = './uploads/group_profile';

    if(!is_dir($uploaddir) )
    {
        mkdir($uploaddir,0777,TRUE);
    }

    $config['upload_path'] = $uploaddir;
    $config["allowed_types"] = 'jpg|png|jpeg';
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $image = '';
    
    if (!empty($_FILES["group_image"]["name"])) {
        $newnamee = strtotime(date('Y-m-d h:i:s')) . str_replace(' ', '_', $_FILES["group_image"]["name"]);
        
        $_FILES['file']['name'] = $newnamee;
        $_FILES["file"]["type"] = $_FILES["group_image"]["type"];
        $_FILES["file"]["tmp_name"] = $_FILES["group_image"]["tmp_name"];
        $_FILES["file"]["error"] = $_FILES["group_image"]["error"];
        $_FILES["file"]["size"] = $_FILES["group_image"]["size"];

        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            $file3 = str_replace(' ', '_', $_FILES["file"]["name"]);
            $imgdata['group_image'] = $file3;
        }
        else{
            $imgdata['group_image'] = '';
        }
    }
    
    $storeData1 = array(
      'group_name' => $group_name,
      'group_created_by' => $op_user_id,
      'group_description' => $group_description,
      'group_image' => $imgdata['group_image']
    );
    
    $this->db->insert('chat_groups', $storeData1);
    $group_id = $this->db->insert_id();

    // Collect the selected interests
    $op_users = $this->input->post('op_users');

    foreach ($op_users as $users) 
    {
        $user_id = htmlspecialchars($users);

        $storeData2 = array(
          'group_id' => $group_id,
          'user_id' => $user_id
        );
        $this->db->insert('chat_group_users', $storeData2);
    }

    $this->session->set_flashdata('message', 'Success');

    redirect('chat');
  }

  function update_group()
  {
      $group_id = $this->input->post('group_id');

      $op_user_id = $this->session->userdata('op_user_id');
      $group_name = $this->input->post('group_name');
      $group_description = $this->input->post('group_description');
      
      $uploaddir = './uploads/group_profile';

      if(!is_dir($uploaddir) )
      {
          mkdir($uploaddir,0777,TRUE);
      }

      $config['upload_path'] = $uploaddir;
      $config["allowed_types"] = 'jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      $image = '';
      
      if (!empty($_FILES["group_image"]["name"])) {
          $newnamee = str_replace(['(', ')', '_', ' ', '+', '-'], '', $_FILES["group_image"]["name"]);
          //echo $n = str_replace(' ', '', $newnamee);
          //die();
          $_FILES['file']['name'] = $newnamee;
          $_FILES["file"]["type"] = $_FILES["group_image"]["type"];
          $_FILES["file"]["tmp_name"] = $_FILES["group_image"]["tmp_name"];
          $_FILES["file"]["error"] = $_FILES["group_image"]["error"];
          $_FILES["file"]["size"] = $_FILES["group_image"]["size"];

          if ($this->upload->do_upload('file')) {
              $data = $this->upload->data();
              $file3 = str_replace(['(', ')', '_', ' ', '+', '-'], '', $_FILES["group_image"]["name"]);
              $imgdata['group_image'] = $file3;
          }
          else{
              $imgdata['group_image'] = '';
          }
      }
      else{
        $imgdata['group_image'] = $this->input->post('group_image');
      }

      $updtData1 = array(
        'group_name' => $group_name,
        'group_created_by' => $op_user_id,
        'group_description' => $group_description,
        'group_image' => $imgdata['group_image']
      );
      
      $this->db->update('chat_groups', $updtData1, array('group_id'=>$group_id));
      
      // Collect the selected interests
      $op_users = $this->input->post('op_users');
  
      foreach ($op_users as $users) 
      {
          $user_id = htmlspecialchars($users);
  
          $sql = "SELECT * from chat_group_users Where user_id IN ('$user_id')";
          $res = $this->db->query($sql);

          if($res->num_rows() == 0)
          {
              $updtData2 = array(
                'group_id' => $group_id,
                'user_id' => $user_id
              );
              $this->db->insert('chat_group_users', $updtData2);
          }
      }
      
      $this->session->set_flashdata('message', 'UpdateSuccess');
      redirect('chat');
  }

  private function shorten_string($string, $length) 
  {
      $str = str_replace(str_split('\\/:*?"<>|+-%'), '', $string);
      $new_str = str_replace(str_split(' '), '', $str);

      if (strlen($new_str) > $length) {
          // Truncate string and add ellipsis
          return substr($new_str, 0, $length) . '';
      }
      return $new_str;
  } 

  public function send_chat()
  {
    $msgType = $this->input->post('msgType');

    if($msgType == "Group")
    {
      $groupId = $this->input->post('groupId');
      $op_user_id = $this->session->userdata('op_user_id');
      $MessageInput = $this->input->post('MessageInput');

      $currentDateTime = date('Y-m-d H:i:s');
      $storeData = array(
        'group_id' => $groupId,
        'sender_id' => $op_user_id,
        'message' => $MessageInput,
        'chat_added_date' => $currentDateTime
      );
  
      $status = $this->model->insertData('chat_group_msg', $storeData);

      if ($status == true) 
      {
        // $this->session->set_flashdata('msg', 'Update Sucessfully');
        $chatData = $this->model->getSqlData("SELECT gm.*, op.* FROM chat_group_msg gm
                                              left join op_user op on op.op_user_id = gm.sender_id
                                                WHERE gm.group_id = '" . $groupId . "'");
  
        $response = [
          'success' => 'success',
          'chatData' => $chatData,
        ];
  
        // Change the response type here
        header('Content-Type: application/json');
        echo json_encode($response);
      } 
      else 
      {
        // Change the response type here
        header('Content-Type: application/json');
        echo json_encode($array);
      }  
    }
    else if($msgType == "Single")
    {
      $opuserId = $this->input->post('opuserId');
      $MessageInput = $this->input->post('MessageInput');
  
      $op_user_id = $this->session->userdata('op_user_id');
      $user_role = $this->session->userdata('user_role');
  
      $currentDateTime = date('Y-m-d H:i:s');
      $storeData = array(
        'user_chat_mapping_plan_id' => '',
        'user_chat_message' => $MessageInput,
        'user_chat_send_by' => $op_user_id,
        'send_to_user' => $opuserId,
        'user_chat_role' => $user_role,
        'user_chat_added_date' => $currentDateTime
      );
  
      $status = $this->model->insertData('user_chat', $storeData);
  
      if ($status == true) 
      {
        // $this->session->set_flashdata('msg', 'Update Sucessfully');
        $chatData = $this->model->getSqlData("SELECT * FROM user_chat 
                                                WHERE (
                                                  (user_chat_send_by = '" . $opuserId . "' AND 
                                                    send_to_user = '" . $op_user_id . "')
                                                  OR 
                                                  (send_to_user = '" . $opuserId . "' AND 
                                                    user_chat_send_by = '" . $op_user_id . "'))");
  
        $response = [
          'success' => 'success',
          'chatData' => $chatData,
        ];
  
        // Change the response type here
        header('Content-Type: application/json');
        echo json_encode($response);
      } 
      else 
      {
        $this->session->set_flashdata('danger', 'Something wrong');
        $array = [
          'error' => true,
          'edit_error' => "Try Again",
        ];
  
        // Change the response type here
        header('Content-Type: application/json');
        echo json_encode($array);
      }  
    }

  }

  public function get_chat()
  {
    $opuserId = $this->input->post('opuserId');
   
    $op_user_id = $this->session->userdata('op_user_id');
    $user_role = $this->session->userdata('user_role');

    // Assuming the query method returns an array of data
    // $ChatReport = $this->model->getSqlData("Select * from user_chat where send_to_user = '" . $opuserId . "'");

    // if(!empty($ChatReport)) 
    // {
      // Assuming $this->DriverReportModel->view() returns the data
      $chatData =  $this->model->getSqlData("SELECT * FROM user_chat 
                                    WHERE (((user_chat_send_by = '" . $opuserId . "' AND send_to_user = '" . $op_user_id . "')
                                        OR 
                                        (send_to_user = '" . $opuserId . "' AND user_chat_send_by = '" . $op_user_id . "')))");

      $chat_update = array(
        'user_chat_view' => '1',
      );

      if($op_user_id == $opuserId)
      {
        
      }
      
      $where_condition = "(
        (user_chat_send_by = '" . $opuserId . "' AND send_to_user = '" . $op_user_id . "')
        OR 
        (send_to_user = '" . $opuserId . "' AND user_chat_send_by = '" . $op_user_id . "'))";

      // Updating the data with the same condition
      $this->model->updateData('user_chat', $chat_update, $where_condition);

      $response = [
        'success' => 'success',
        'chatData' => $chatData,
      ];
    // } 
    // else {
    //   $response = ['success' => 'error', 'message' => 'Driver report not found'];
    // }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function get_project_chat()
  {
      $groupId = $this->input->post('groupId');
   
      // Assuming $this->DriverReportModel->view() returns the data
      $chatData =  $this->model->getSqlData("SELECT gm.*, op.* FROM chat_group_msg gm
                                              left join op_user op on op.op_user_id = gm.sender_id
                                                WHERE gm.group_id = '" . $groupId . "'");

      $response = [
        'success' => 'success',
        'chatData' => $chatData,
      ];
    
      // Send the JSON response
      header('Content-Type: application/json');
      echo json_encode($response);
  }







  function ChatView_8_3_24()
  {
    $sessionUser = $this->session->userdata();
    $op_user_id = $sessionUser['op_user_id'];
    $user_role = $sessionUser['user_role'];
    $access_data = array();
    $access = array();
    $access[] = 'customer_list';
    $access_data = $this->model->checkAccess($access);
    if (!$access_data['status']) {
      redirect('/');
    }
    $data = $access_data['data'];

    $mapping_plan_ids = $this->model->getSqlData("
    SELECT mapping_user.mapping_plan_id  from mapping_user where op_user_id =  " . $op_user_id . "
     
      ");

    $cust_details = [];
    $checker_details = [];
    $auditor_details = [];
    if ($user_role == "4") {
      foreach ($mapping_plan_ids as $mapping_plan_detail) {

        $mapping_user_detail = $this->model->getSqlData("
              SELECT mapping_user.mapping_plan_id ,
              mapping_plan.audit_status ,
              mapping_plan.plan_id ,
              organisationname.organisation, 
              organisationname.op_user_id as schoolId, 
              subscription.subscription_name
              FROM mapping_user
              JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
              JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
              JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
              WHERE mapping_user.mapping_plan_id =  " . $mapping_plan_detail['mapping_plan_id'] . "
              and mapping_plan.audit_status <  '3'
              
              ");
        if (!empty($mapping_user_detail)) {
          array_push($cust_details, $mapping_user_detail[0]);
        }


        $mapping_checker_detail = $this->model->getSqlData("
              SELECT mapping_user.mapping_plan_id ,
              mapping_plan.plan_id ,
              mapping_plan.audit_status ,
              organisationname.organisation, 
              organisationname.op_user_id as schoolId, 

              checkername.user_name, 
              checkername.op_user_id as ChekerId, 


              subscription.subscription_name
              FROM mapping_user
              JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
              JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
              JOIN op_user as  checkername  ON checkername.op_user_id = mapping_user.op_user_id
              JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
              WHERE mapping_user.mapping_plan_id =  " . $mapping_plan_detail['mapping_plan_id'] . "
              and mapping_user.role = 'c'
              and mapping_plan.audit_status <  '3'
              ");
        if (!empty($mapping_checker_detail)) {
          array_push($checker_details, $mapping_checker_detail[0]);
        }

        // print_r($mapping_user_detail);
        // die;
      }

      $data['user_list'] = $cust_details;
      $data['checker_details'] = $checker_details;
    } else  if ($user_role == "5") {
      foreach ($mapping_plan_ids as $mapping_plan_detail) {

        $mapping_checker_detail = $this->model->getSqlData("
            SELECT mapping_user.mapping_plan_id ,
            mapping_plan.plan_id ,
            mapping_plan.audit_status ,
            organisationname.organisation, 
            organisationname.op_user_id as schoolId, 

            checkername.user_name, 
            checkername.op_user_id as ChekerId, 


            subscription.subscription_name
            FROM mapping_user
            JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
            JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
            JOIN op_user as  checkername  ON checkername.op_user_id = mapping_user.op_user_id
            JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
            WHERE mapping_user.mapping_plan_id =  " . $mapping_plan_detail['mapping_plan_id'] . "
            and mapping_user.role = 'a'
            and mapping_plan.audit_status <  '3'
            
            ");
        if (!empty($mapping_checker_detail)) {
          array_push($auditor_details, $mapping_checker_detail[0]);
        }

        // print_r($mapping_user_detail);
        // die;
      }

      $data['auditor_details'] = $auditor_details;
      //  print_r($auditor_details);die;
    } else  if ($user_role == "1") {
      $mapping_plan_ids = $this->model->getSqlData("
      SELECT mapping_user.mapping_plan_id  from mapping_user 
        ");
      foreach ($mapping_plan_ids as $mapping_plan_detail) {

        $mapping_user_detail = $this->model->getSqlData("
            SELECT mapping_user.mapping_plan_id ,
            mapping_plan.plan_id ,
            mapping_plan.audit_status ,
            organisationname.organisation, 
            organisationname.op_user_id as schoolId, 
            subscription.subscription_name
            FROM mapping_user
            JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
            JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
            JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
            WHERE mapping_user.mapping_plan_id =  " . $mapping_plan_detail['mapping_plan_id'] . "
            and mapping_plan.audit_status <  '3'
            
      ");
        if (!empty($mapping_user_detail)) {
          array_push($cust_details, $mapping_user_detail[0]);
        }


        $mapping_checker_detail = $this->model->getSqlData("
              SELECT mapping_user.mapping_plan_id ,
              mapping_plan.plan_id ,
              organisationname.organisation, 
              organisationname.op_user_id as schoolId, 
              mapping_plan.audit_status ,
              checkername.user_name, 
              checkername.op_user_id as ChekerId, 


              subscription.subscription_name
              FROM mapping_user
              JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
              JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
              JOIN op_user as  checkername  ON checkername.op_user_id = mapping_user.op_user_id
              JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
              WHERE mapping_user.mapping_plan_id =  " . $mapping_plan_detail['mapping_plan_id'] . "
              and mapping_user.role = 'c'
              and mapping_plan.audit_status <  '3'
              
              ");

        if (!empty($mapping_checker_detail)) {
          array_push($checker_details, $mapping_checker_detail[0]);
        }


        $mapping_checker_detail = $this->model->getSqlData("
              SELECT mapping_user.mapping_plan_id ,
              mapping_plan.plan_id ,
              organisationname.organisation, 
              organisationname.op_user_id as schoolId, 
              mapping_plan.audit_status ,
              checkername.user_name, 
              checkername.op_user_id as ChekerId, 


              subscription.subscription_name
              FROM mapping_user
              JOIN mapping_plan ON mapping_plan.mapping_plan_id = mapping_user.mapping_plan_id
              JOIN op_user as  organisationname  ON organisationname.op_user_id = mapping_plan.op_user_id
              JOIN op_user as  checkername  ON checkername.op_user_id = mapping_user.op_user_id
              JOIN subscription ON subscription.subscription_id = mapping_plan.plan_id 
              WHERE mapping_user.mapping_plan_id =  " . $mapping_plan_detail['mapping_plan_id'] . "
              and mapping_user.role = 'a'
              and mapping_plan.audit_status <  '3'
              
              ");

        if (!empty($mapping_checker_detail)) {
          array_push($auditor_details, $mapping_checker_detail[0]);
        }


        // print_r($mapping_user_detail);
        // die;
      }

      $data['user_list'] = $cust_details;
      $data['checker_details'] = $checker_details;
      $data['auditor_details'] = $auditor_details;
    }
    $data['user_role'] = $user_role;
    // $data['user_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition = '', $order_by = 'role_name asc', $limit = '', $debug = 0, $group_by = '');
    // echo "<pre> user_list : ";print_r( $data['auditor_details'] );die;
    $data['op_user_id'] = "sfgs";
    $this->load->view('admin/customer/school_chat', $data);
  }


  public function get_chat_school()
  {
    $mapping_plan_id = $this->input->post('mapping_plan_id');
    $schoolId = $this->input->post('schoolId');
    $sessionUser = $this->session->userdata();
    $op_user_id = $sessionUser['op_user_id'];

    //  $trip_id = $this->input->post('trip_id');

    // Assuming the query method returns an array of data
    $DriverReport = $this->model->getSqlData("select * from subscription_chat where subscription_chat_mapping_plan_id = '" . $mapping_plan_id . "'");
    $Auditor_name = $this->model->getSqlData("select * from mapping_user where mapping_plan_id = '" . $mapping_plan_id . "'");
    $user_role = $this->session->userdata('user_role');
    if ($user_role == 1) {
      $chat_update = array(
        'subscription_chat_admin_view' => '1',

      );
      $this->model->updateData('subscription_chat', $chat_update, array('subscription_chat_mapping_plan_id' => $mapping_plan_id));
    }

    if (!empty($DriverReport)) {


      // Assuming $this->DriverReportModel->view() returns the data
      $chatData = $this->model->getSqlData("
      SELECT subscription_chat.*,op_user.user_name,op_user.organisation FROM subscription_chat 
      join op_user on op_user.op_user_id  = subscription_chat.subscription_chat_send_by
      WHERE subscription_chat.subscription_chat_mapping_plan_id = '" . $mapping_plan_id . "'
  
      ");

      $response = [
        'success' => 'success',
        'chatData' => $chatData,
      ];
    } else {
      $response = ['success' => 'error', 'message' => 'Driver report not found'];
    }

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
  }

  public function send_chat_admin()
  {
    // $message = $this->input->post('message');
    // $mapping_plan_id = $this->input->post('driver_id');
    $sessionUser = $this->session->userdata();
    $op_user_id = $sessionUser['op_user_id'];
    $mapping_plan_id = $this->input->post('mapping_plan_id');
    $schoolId = $this->input->post('schoolId');
    $MessageInput = $this->input->post('MessageInput');

    $op_user_id = $this->session->userdata('op_user_id');

    $currentDateTime = date('Y-m-d H:i:s');
    $UpdateData = array(
      'subscription_chat_mapping_plan_id' => $mapping_plan_id,
      'subscription_chat_message' => $MessageInput,
      'subscription_chat_send_by' => $op_user_id,
      'send_to_user' => $schoolId,
      'subscription_chat_role' => "4",
      'subscription_chat_added_date' => $currentDateTime


    );

    $status = $this->model->insertData('subscription_chat', $UpdateData);

    if ($status == true) {
      // $this->session->set_flashdata('msg', 'Update Sucessfully');
      $chatData =  $this->model->getSqlData("
      SELECT subscription_chat.*,op_user.user_name,op_user.organisation FROM subscription_chat 
      join op_user on op_user.op_user_id  = subscription_chat.subscription_chat_send_by
      WHERE subscription_chat.subscription_chat_mapping_plan_id = '" . $mapping_plan_id . "'
  
      ");



      $response = [
        'success' => 'success',
        'chatData' => $chatData,
      ];

      // Change the response type here
      header('Content-Type: application/json');
      echo json_encode($response);
    } else {
      $this->session->set_flashdata('danger', 'Something wrong');
      $array = [
        'error' => true,
        'edit_error' => "Try Again",
      ];

      // Change the response type here
      header('Content-Type: application/json');
      echo json_encode($array);
    }
  }

}