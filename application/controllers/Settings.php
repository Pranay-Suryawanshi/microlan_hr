<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings extends CI_Controller {
    function __construct(){
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

    function company_setting()
    {
        // $access_data = array();
        // $access = array();
        // $access[] = 'company_setting';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];
        $pagename = 'Company Setting';

        $data['company_setting'] = $this->model->getData('company_setting',array('comp_sett_id'=>'1'));
        $data['state_list'] = $this->model->getRecords('states', $fields = '*', $condition='', $order_by = 'state_name asc', $limit = '', $debug = 0, $group_by = '');
        $this->model->partialView('admin/settings/company_setting',$data,$pagename);
    }

    function save_company_setting()
    {
        $uploaddir = './uploads/company/';

        if(!is_dir($uploaddir) )
        {
            mkdir($uploaddir,0777,TRUE);
        }

        $postData = $_POST;
        if(!empty($_FILES['company_logo'])){
           
            $filename = rand().basename($_FILES['company_logo']['name']);
            $uploadfile = $uploaddir . $filename;

            if (move_uploaded_file($_FILES['company_logo']['tmp_name'], $uploadfile)) {
//              echo "File is valid, and was successfully uploaded.\n";
              $postData['company_logo'] = $filename;
            } else {
               //echo "Upload failed";
            }
        }
        if(!empty($_FILES['bill_logo'])){
            $filename = rand().basename($_FILES['bill_logo']['name']);
            $uploadfile = $uploaddir . $filename;

            if (move_uploaded_file($_FILES['bill_logo']['tmp_name'], $uploadfile)) {
//              echo "File is valid, and was successfully uploaded.\n";
              $postData['bill_logo'] = $filename;
            } else {
               //echo "Upload failed";
            }
        }

         if(!empty($_FILES['profile_info_file'])){
            $filename = rand().basename($_FILES['profile_info_file']['name']);
            $uploadfile = $uploaddir . $filename;

            if (move_uploaded_file($_FILES['profile_info_file']['tmp_name'], $uploadfile)) {
//              echo "File is valid, and was successfully uploaded.\n";
              $postData['profile_info_file'] = $filename;
            } else {
               //echo "Upload failed";
            }
        }
        $this->model->updateData('company_setting',$postData,array('comp_sett_id'=>'1')); 
        
        $this->session->set_flashdata('msg', 'Company Setting Saved Successfully.');
        $this->session->set_flashdata('class', 'success');

        redirect(base_url().'company-settings');
    }
}
?>