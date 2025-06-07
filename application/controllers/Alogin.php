<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Alogin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->load->Model('model');
		$this->load->helper('url');
		$company_setting = $this->model->getData('company_setting', array());
		$glob['company'] = $company_setting;
		$this->load->vars($glob);
		// if($this->is_logged_in()){ 
		//     redirect('admin');
		// }
	}

	function index()
	{
		$data['status'] = '';
		$data['msg'] = '';
		$this->load->view('admin/login', $data);
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_admin_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != TRUE) {
			return FALSE;
		}
		return TRUE;
	}

	function validate_login()
	{
		$array_entity = $_POST;
		$user_id = $array_entity['user_id'];
		$password = $array_entity['password'];
		$user_data = $this->model->getData('op_user', array('user_id' => $user_id, 'password' => md5($password), 'status' => '1'));
		$currentDate = date('Y-m-d');
		$condition1 = "DATE(added_date) = '" . $currentDate . "' and user_id_fk= '" . $user_id . "' and handover_flag ='0'";
		//	print_r($user_data);die;
		if (isset($user_data) && !empty($user_data)) {

			$strQry = "SELECT attendance_log_in_time, attendance_log_out_time 
           FROM attendance_log 
           WHERE DATE(attendance_log_in_time) = CURDATE() 
           AND attendance_log_emp_id = " . $user_data[0]['op_user_id'];

			$punchin = $this->model->getSqlData($strQry);
			//	print_r($user_data); die;
			if (empty($punchin) && $user_data[0]['role_id'] != "1") {
				$newdata = array(
					'op_user_id' => $user_data[0]['op_user_id'],
					'user_id' => $user_data[0]['user_id'],
					'user_name' => $user_data[0]['user_name'],
					'user_role' => $user_data[0]['role_id'],
					'company_id' => $user_data[0]['company_id'],
					'email' => $user_data[0]['email'],
					'contact_no' => $user_data[0]['contact_no'],
					'designation_id' => $user_data[0]['designation_id'],
					'profile_photo' => $user_data[0]['profile_photo'],
					'first_login' => $user_data[0]['first_login'],
					'is_punch_in' => false
				);
				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('success', '<strong>Well done!</strong> You have logged in successfully. Please wait while we are redirecting you on punch in page..');
				redirect('punch-in');
			} else {
				$newdata = array(
					'op_user_id' => $user_data[0]['op_user_id'],
					'user_id' => $user_data[0]['user_id'],
					'user_name' => $user_data[0]['user_name'],
					'user_role' => $user_data[0]['role_id'],
					'company_id' => $user_data[0]['company_id'],
					'email' => $user_data[0]['email'],
					'contact_no' => $user_data[0]['contact_no'],
					'designation_id' => $user_data[0]['designation_id'],
					'profile_photo' => $user_data[0]['profile_photo'],
					'first_login' => $user_data[0]['first_login'],
					'is_admin_logged_in' => TRUE,
					'is_punch_in' => TRUE
				);
				$this->session->set_userdata($newdata);
				$this->session->set_flashdata('success', '<strong>Well done!</strong> You have logged in successfully. Please wait while we are redirecting you on dashboard.');
				redirect('admin');
			}
		} else {
			$this->session->set_flashdata('msg', '<strong>Oh snap!</strong> The email address or password you entered is incorrect. Please try again.');

			redirect('alogin');
		}
	}

	function logout()
	{
		$user_id = $this->session->userdata('op_user_id');
        $this->session->set_userdata(array('is_admin_logged_in' => FALSE));
        date_default_timezone_set('Asia/Kolkata');      
        $date=date("Y/m/d h:i:s");
            
        $this->model->updateData('op_user',array('logout_time'=>$date),array('op_user_id'=>$user_id));
        // check login id before destroy nd then update..        
        $this->session->sess_destroy();
        redirect(base_url());
	}
}
