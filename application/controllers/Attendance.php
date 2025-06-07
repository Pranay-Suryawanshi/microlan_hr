<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Attendance extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->load->Model('model');
		$company_setting = $this->model->getData('company_setting', array());
		$glob['company'] = $company_setting;
		$this->load->vars($glob);
		// if (!$this->is_logged_in()) {
		// 	redirect('alogin');
		// }
	}

	function index()
	{
		$user_id = $this->session->userdata('op_user_id');
		$user_name = $this->session->userdata('user_name');
		$profile_photo = $this->session->userdata('profile_photo');
		$designation_id = $this->session->userdata('designation_id');
		$email = $this->session->userdata('email');
		$contact_no = $this->session->userdata('contact_no');
		$strQry = "SELECT des_name 
           FROM designation 
           WHERE  id = " . $designation_id;

		$data['designation'] = $this->model->getSqlData($strQry);


		$data['user_name'] = $user_name;
		$data['profile_photo'] = $profile_photo;
		$data['email'] = $email;
		$data['contact_no'] = $contact_no;
		$data['user_id'] = $user_id;
		$data['msg'] = '';
		$this->load->view('admin/attendance/punch_in', $data);
	}


	public function punch_in()
	{

		$user_id = $this->input->post('user_id');
		$punch_status = $this->input->post('punch_status');
		$latitude = $this->input->post('latitude');
		$longitude = $this->input->post('longitude');

		if (!$user_id || !$punch_status) {
			echo json_encode(['status' => false, 'message' => 'Invalid data']);
			return;
		}

		$this->load->model('Punch_model');
		$this->load->model('model');

		if ($punch_status === 'in') {
			date_default_timezone_set('Asia/Kolkata');

			// Get current date and time
			$newdata = array(
				
				'is_admin_logged_in' => TRUE,
				'is_punch_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			$success = $this->Punch_model->punch_in($user_id, $latitude, $longitude);
		} else {
			date_default_timezone_set('Asia/Kolkata');

			// Get current date and time
			$currentDateTime = date("Y-m-d H:i:s");
			$array_entity['first_login'] = "";
			$array_entity['logout_time'] = $currentDateTime;
			$this->model->updateData('op_user', $array_entity, array('op_user_id' => $user_id));
			$success = $this->Punch_model->punch_out($user_id);
		}

		echo json_encode([
			'status' => $success,
			'message' => $success ? "Punch $punch_status successful!" : "Failed to punch $punch_status"
		]);
	}

	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_admin_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != TRUE) {
			return FALSE;
		}
		return TRUE;
	}
}