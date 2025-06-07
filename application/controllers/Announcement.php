<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Announcement extends CI_Controller {

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

  function add_announcement()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Add Announcement';

    $data['project_list'] = $this->model->getData('project',array('project_active_status'=>'1')); 

    $this->model->partialView('admin/announcement/add_announcement', $data,$pagename);
  }

  function save_announcement()
  {
    $postData = $_POST;

    $uploaddir = './uploads/announcement/';

    if(!is_dir($uploaddir) )
    {
        mkdir($uploaddir,0777,TRUE);
    }

    $file = $_FILES["announcement_image"]['tmp_name'];
    list($width, $height) = getimagesize($file);
    // echo $width;
    // echo $height;

    if(!empty($_FILES['announcement_image']))
    {
        $filename = basename($_FILES['announcement_image']['name']);
        $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $filename = rand().basename($this->shorten_string($_FILES['announcement_image']['name'], 5)) . '.' . $extension;
        
        $uploadfile = $uploaddir . $filename;

        if (move_uploaded_file($_FILES['announcement_image']['tmp_name'], $uploadfile)) 
        {
            $postData['announcement_image'] = $filename;
        } else {
            //echo "Upload failed";
        }
    }
    $this->db->insert('announcement',$postData);

    $this->session->set_flashdata('success', '<strong>Well done!</strong> New Announcement added successfully.');

    redirect('announcement');
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
  
  function announcement_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Announcement List';

    $sql = "SELECT * FROM announcement";
    $data['announcement'] = $this->model->getSqlData($sql);

    $this->model->partialView('admin/announcement/announcement_list', $data,$pagename);
  }

  function edit_announcement($aid)
  {
        $announcement_id = base64_decode($aid);
        $user_id = $this->session->userdata('op_user_id');
        $pagename = 'Edit Announcement';

        $sql = "SELECT * FROM announcement
                    Where announcement_id = $announcement_id";
        $data['announcement'] = $this->model->getSqlData($sql);

        $data['announcement_id'] = $announcement_id;

        $this->model->partialView('admin/announcement/edit_announcement', $data,$pagename);
  }

  function update_announcement_status()
  {
    $announcement_id = $_POST['announcement_id'];
    $announcement_status = $_POST['announcement_status'];

    if($announcement_status == '0')
    {
        $status = '1';
    }
    else
    {
        $status = '0';
    }

    $this->db->where('announcement_id', $announcement_id);
    $this->db->update('announcement', array('announcement_status' => $status));

    $this->session->set_flashdata('success', '<strong>Well done!</strong> Announcement status updated successfully.');
    redirect('announcement');
  }

  function update_announcement()
  {
    $announcement_id = $_POST['announcement_id'];
    $updtData = $_POST;

    $postData = $_POST;

    $uploaddir = './uploads/announcement/';

    if(!is_dir($uploaddir) )
    {
        mkdir($uploaddir,0777,TRUE);
    }

    $file = $_FILES["announcement_image"]['tmp_name'];
    list($width, $height) = getimagesize($file);
    // echo $width;
    // echo $height;

    if(!empty($_FILES['announcement_image']))
    {
        $filename = basename($_FILES['announcement_image']['name']);
        $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

        $filename = rand().basename($this->shorten_string($_FILES['announcement_image']['name'], 5)) . '.' . $extension;
        
        $uploadfile = $uploaddir . $filename;

        if (move_uploaded_file($_FILES['announcement_image']['tmp_name'], $uploadfile)) 
        {
            $postData['announcement_image'] = $filename;
        } else {
            //echo "Upload failed";
            $postData['announcement_image'] = $_POST['announcement_image'];
        }
    }
    $this->db->update('announcement', $postData, array('announcement_id'=>$announcement_id));

    $this->session->set_flashdata('success', '<strong>Well done!</strong> Announcement details udated successfully.');

    redirect('announcement');
  }

}