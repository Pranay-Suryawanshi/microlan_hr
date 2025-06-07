<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Employee extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->load->Model('model');
		$this->load->Model('dashboard_model');
		$this->load->model('employee_model');
		$this->load->model('payroll_model');
		$this->load->model('leave_model');

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

	function employee_list()
	{

		$strQryuser =
			"   SELECT 
            op_user.op_user_id,
            op_user.user_name,
            op_user.email,
            op_user.contact_no,
            op_user.user_id,
            op_user.status,
            op_user_role.role_name,
            designation.des_name,
            attendance_log.attendance_log_in_time,
            attendance_log.attendance_log_out_time
            FROM op_user
            LEFT JOIN op_user_role ON op_user_role.role_id = op_user.role_id
            LEFT JOIN designation ON designation.id = op_user.designation_id
            LEFT JOIN attendance_log 
            ON attendance_log.attendance_log_emp_id = op_user.op_user_id
            AND DATE(attendance_log.attendance_log_in_time) = CURDATE()  where  op_user_role.role_id = '2' ;
        ";

		$user = $this->model->getSqlData($strQryuser);
		$data['user_list'] = $user;
		$pagename = 'Employee List';
		$data['pagename'] = $pagename;
		$this->model->partialView('admin/employee/employee-list', $data, $pagename);
	}

	function edit_emp($id)
	{
		$user_id = base64_decode($id);

		$data['role_id'] = $this->session->userdata('user_role');
		$data['is_user_type_ho'] = $data['is_ho_user'];
		//$data['user'] = $this->model->getData('op_user', array('op_user_id' => $user_id));

		$data['user'] = $this->model->getSqlData("SELECT op.*, d.*
																from op_user op
																left join designation d on d.id = op.designation_id
                                                                    Where op.op_user_id = '$user_id'");

		$data['permanent_address'] = $this->model->getData('address', array('emp_id' => $user_id, 'type'=>'Permanent'));
		$data['present_address'] = $this->model->getData('address', array('emp_id' => $user_id, 'type'=>'Present'));

		$data['designationlist'] = $this->model->getData('designation');
		$data['permanent'] = $this->employee_model->GetperAddress($user_id);
		$data['present'] = $this->employee_model->GetpreAddress($user_id);
		//$data['education'] = $this->employee_model->GetEducation($user_id);
		$data['education'] = $this->model->getSqlData('SELECT * FROM education Where emp_id = "'.$user_id.'" order by id asc');

		//$data['experience'] = $this->employee_model->GetExperience($user_id);
		$data['experience'] = $this->model->getSqlData('SELECT * FROM emp_experience Where emp_id = "'.$user_id.'" order by id asc');

		//$data['bankinfo'] = $this->employee_model->GetBankInfo($user_id);
		$data['fileinfo'] = $this->employee_model->GetFileInfo($user_id);
		$data['typevalue'] = $this->payroll_model->GetsalaryType();
		$data['leavetypes'] = $this->leave_model->GetleavetypeInfo();
		$data['salaryvalue'] = $this->employee_model->GetsalaryValue($user_id);
		$data['socialmedia'] = $this->employee_model->GetSocialValue($user_id);
		$year = date('Y');
		$data['Leaveinfo'] = $this->employee_model->GetLeaveiNfo($user_id, $year);
		$pagename = 'Edit Employee';
		$data['pagename'] = $pagename;

		$data['user_id'] = $user_id;
		$this->model->partialView('admin/employee/edit-employee', $data, $pagename);
	}

	function update_emp_details()
	{
		$user_array = $_POST;
        $user_array['status'] = '1';
        $uploaddir = './upload/profile/';
        if(!is_dir($uploaddir) )
        {
            mkdir($uploaddir,0777,TRUE);
        }
        
        $filename = rand() . basename($_FILES['profile_photo']['name']);
        $uploadfile = $uploaddir . $filename;
        $email = $user_array['email'];
        $contact_no = $user_array['contact_no'];
       
		if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
			$user_array['profile_photo'] = $filename;
		} else {
			echo "Upload failed";
			$user_array['profile_photo'] = "";
		}
		unset($user_array['c_password']);

		$user_id = $this->model->updateData('op_user', $user_array, array('op_user_id'=>$_POST['op_user_id']));
		$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee data has been updated successfully');

        redirect('employee-list');
	}

	public function Save_Social()
	{

		$id = $this->input->post('id');
		$em_id = $this->input->post('op_user_id');
		$facebook = $this->input->post('facebook');
		$twitter = $this->input->post('twitter');
		$google = $this->input->post('google');
		$skype = $this->input->post('skype');

		$data = array();
		$data = array(
			'emp_id' => $em_id,
			'facebook' => $facebook,
			'twitter' => $twitter,
			'google_plus' => $google,
			'skype_id' => $skype
		);
		if (empty($id)) {
			$success = $this->employee_model->Insert_Media($data);
			//  echo "Successfully Added";
			$this->session->set_flashdata('msg', 'The employee social media details has been added successfully.');
			redirect('employee-list');
		} else {
			$success = $this->employee_model->Update_Media($id, $data);
			//    echo "Successfully Updated";

			$this->session->set_flashdata('success', 'The employee social media details has been updated successfully');
			redirect('employee-list');
			
		}

	}

	function save_emp_address()
	{
		$user_array = $_POST;
        
		$address_data = $this->model->getData('address', array('emp_id' => $_POST['emp_id'], 'type' => $_POST['type']));
		
		if (isset($address_data) && !empty($address_data)) 
		{
			$user_id = $this->model->updateData('address', $user_array, array('emp_id' => $_POST['emp_id']));
			$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee Address has been updated successfully');
		}
		else
		{
			$user_id = $this->model->insertData('address', $user_array);
			$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee Address has been added successfully');
		}
        
        redirect('edit-emp/'.base64_encode($_POST['emp_id']));
	}

	function save_emp_education()
	{
		$user_array = $_POST;
        
		$user_id = $this->model->insertData('education', $user_array);
		$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee Education has been added successfully');
        
        redirect('edit-emp/'.base64_encode($_POST['emp_id']));
	}

	function delete_emp_education()
	{
		$this->model->deleteData('education', array('id'=>$_POST['edt_id'], 'emp_id'=>$_POST['emp_id']));
		$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee Education has been deleted successfully');
        
        redirect('edit-emp/'.base64_encode($_POST['emp_id']));
	}

	function save_emp_experience()
	{
		$user_array = $_POST;
        
		$user_id = $this->model->insertData('emp_experience', $user_array);
		$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee Experience has been added successfully');
        
        redirect('edit-emp/'.base64_encode($_POST['emp_id']));
	}

	function update_emp_bank_details()
	{
		$user_array = $_POST;
        
		$user_id = $this->model->updateData('op_user', $user_array, array('op_user_id'=>$_POST['op_user_id']));
		$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee Bank details has been updated successfully');
        
        redirect('edit-emp/'.base64_encode($_POST['op_user_id']));
	}

	function save_emp_documents()
	{
		$emp_id = $_POST['emp_id'];

		$document_row = $this->input->post('document_row');

		$uploaddir = './upload/profile/employee_documents';

		if(!is_dir($uploaddir) )
		{
			mkdir($uploaddir,0777,TRUE);
		}

		$config['upload_path'] = $uploaddir;
		$config["allowed_types"] = 'jpg|png|jpeg|pdf|mp4|mov|gif';
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$image = '';

		for($i=1;$i<=$document_row;$i++)
		{
			//file_name
			if(!empty($_FILES["file_covering"]["name"][$i])) 
			{
				$newnamee = strtotime(date('Y-m-d h:i:s')) . str_replace(' ', '_', $_FILES["file_covering"]["name"][$i]);
					
				$_FILES['file']['name'] = $newnamee;
				$_FILES["file"]["type"] = $_FILES["file_covering"]["type"][$i];
				$_FILES["file"]["tmp_name"] = $_FILES["file_covering"]["tmp_name"][$i];
				$_FILES["file"]["error"] = $_FILES["file_covering"]["error"][$i];
				$_FILES["file"]["size"] = $_FILES["file_covering"]["size"][$i];

				if ($this->upload->do_upload('file')) {
					$data = $this->upload->data();
					$file3 = str_replace(' ', '_', $newnamee);
					$imgdata['file_covering'] = $file3;
				}
				else{
					$imgdata['file_covering'] = '';
				}
			}
			
			$documentData = array(
				'emp_id' => $emp_id,
				'file_name' => $imgdata['file_covering']
			);

			$this->db->insert('emp_documents', $documentData);
		}
		
		$this->session->set_flashdata('success', '<strong>Well done!</strong> Employee Documents has been added successfully');
        
        redirect('edit-emp/'.base64_encode($_POST['emp_id']));
	}
}