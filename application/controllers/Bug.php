<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Bug extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model('model');
        $this->load->model('leave_model');
        $sessionUser = $this->session->userdata();
        if (!$sessionUser['op_user_id']) {
            redirect('/');
        }
    }


    function bug_list()
    {
        $strQry = "SELECT 
    project_wise_bug.*, 
    project.project_name, 
    user_assign.user_name AS assign_by_user, 
    user_to.user_name AS assign_to_user
    FROM 
    project_wise_bug 
  left  JOIN 
    project 
    ON project.project_id = project_wise_bug.bug_project_id
   left JOIN 
    op_user AS user_assign 
    ON user_assign.op_user_id = project_wise_bug.bug_assign_by_id
   left JOIN 
    op_user AS user_to 
    ON  user_to.op_user_id = project_wise_bug.bug_assign_to_id;

       ";

         $bugreport = $this->model->getSqlData($strQry);
        // print_r($bugreport);die;
        $data['bugreport'] = $bugreport;

      
        $data['project_list'] = $this->model->getSqlData("SELECT project_id,project_name from project");
        $data['emp_list'] = $this->model->getSqlData("SELECT op_user_id,user_name from op_user where role_id = '2' ");
        $pagename = 'Bug List';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/bug/bug_list', $data, $pagename);
    }
    public function add_bug()
    {
        // Retrieve all form data
        $form_data = $this->input->post();
        $user_id = $this->session->userdata('op_user_id');
    
        // Optionally, you can retrieve individual fields like this:
        $id = $form_data['id']; // Hidden field ID
        $bug_project_id = $form_data['bug_project_id']; // Project ID
        $bug_assign_to_id = $form_data['bug_assign_to_id']; // Developer ID
        $bug_priority = $form_data['bug_priority']; // Bug Priority
        $bug_title = $form_data['bug_title']; // Bug Title
        $bug_description = $form_data['bug_description']; // Bug Description
        $bug_type = $form_data['bug_type']; // Bug Type
        $bug_instimate_end_date = $form_data['bug_instimate_end_date']; // Bug Estimated End Date
    
        // Validate or process the data
        // Example: checking if the required fields are empty
        if (empty($bug_project_id) || empty($bug_assign_to_id) || empty($bug_priority) || empty($bug_title) || empty($bug_description) || empty($bug_type)) {
            // Handle the error (e.g., set error message or return)
            $this->session->set_flashdata('error', 'Please fill in all required fields.');
            redirect('add-bug');
        }
    
        // Processing the date
        if (!empty($bug_instimate_end_date)) {
            $date1 = new DateTime($bug_instimate_end_date, new DateTimeZone('Asia/Kolkata'));
            // You can do additional date validation here
        }
    
        // If the ID is empty, insert the new bug
        if (empty($id)) {
            $data = array(
                'bug_project_id' => $bug_project_id,
                'bug_assign_to_id' => $bug_assign_to_id,
                'bug_priority' => $bug_priority,
                'bug_assign_by_id' => $user_id,
                'bug_title' => $bug_title,
                'bug_description' => $bug_description,
                'bug_type' => $bug_type,
                'bug_instimate_end_date' => $bug_instimate_end_date,
            );
    
            // Insert data into the database (assuming a model function called Add_Bug)
            $this->db->insert('project_wise_bug', $data);
            $this->session->set_flashdata('success', 'The Bug has been added successfully.');
        } else {
            // Update the bug if ID is present
            $data = array(
                'bug_project_id' => $bug_project_id,
                'bug_assign_to_id' => $bug_assign_to_id,
                'bug_priority' => $bug_priority,
                'bug_title' => $bug_title,
                'bug_description' => $bug_description,
                'bug_type' => $bug_type,
                'bug_instimate_end_date' => $bug_instimate_end_date,
            );
            
            // Update the bug details (assuming a model function called Update_Bug)
            $this->model->Update_Bug($id, $data);
            $this->session->set_flashdata('success', 'The Bug details have been updated successfully.');
        }
    
        // Redirect to the bug list page or any other page
        redirect('bug-list');
    }
    public function get_bug_details()
    {
        if ($this->session->userdata('is_admin_logged_in') != False) {
            $id = $this->input->get('id');
            $data['holidayvalue'] = $this->model->GetBugValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

     // Method to update bug status, start date, and end date
     public function update_bug_status() {
        // Get the data from the form (POST request)
        $bug_id = $this->input->post('id');
        $bug_title = $this->input->post('bug_title');
        $bug_description = $this->input->post('bug_description');
        $bug_priority = $this->input->post('bug_priority');
        $bug_type = $this->input->post('bug_type');
        $bug_start_date = $this->input->post('bug_start_date');
        $bug_end_date = $this->input->post('bug_end_date');
        $bug_status = $this->input->post('bug_status');

        // Prepare the data to be updated
        $update_data = [
            'bug_start_date' => $bug_start_date,
            'bug_end_date' => $bug_end_date,
            'bug_report_status' => $bug_status
        ];

        // Call the model function to update the bug status
       
        $update_status = $this->model->Update_Bug($bug_id, $update_data);

        if ($update_status) {
            // Return a success response
            echo json_encode(['success' => true, 'message' => 'Bug status updated successfully!']);
        } else {
            // Return an error response
            echo json_encode(['success' => true, 'message' => 'Failed to update bug status.']);
        }
    }
  

}