<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model('model');
        $sessionUser = $this->session->userdata();
        if (!$sessionUser['op_user_id']) {
            redirect('/');
        }
    }

    protected function no_cache()
    {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }



    function user_list()
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
            op_user.profile_photo,
            designation.des_name,
            attendance_log.attendance_log_in_time,
            attendance_log.attendance_log_out_time
            FROM op_user
            LEFT JOIN op_user_role ON op_user_role.role_id = op_user.role_id
            LEFT JOIN designation ON designation.id = op_user.designation_id
            LEFT JOIN attendance_log 
            ON attendance_log.attendance_log_emp_id = op_user.op_user_id
            AND DATE(attendance_log.attendance_log_in_time) = CURDATE();
        ";

        $user = $this->model->getSqlData($strQryuser);
        $data['user_list'] = $user;
        $pagename = 'User List';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/user/user-list', $data, $pagename);
    }


    function deactive_user($id)
    {
        $user_id = base64_decode($id);
        $this->model->updateData('op_user', array('status' => '0'), array('op_user_id' => $user_id));
        $this->session->set_flashdata('success', '<strong>Well done!</strong> user status updated successfully.');
        redirect('user-list');

    }
    function active_user($id)
    {
        $user_id = base64_decode($id);
        $this->model->updateData('op_user', array('status' => '1'), array('op_user_id' => $user_id));
        $this->session->set_flashdata('success', '<strong>Well done!</strong> user status updated successfully.');
        redirect('user-list');

    }
    
    function reset_password()
    {

        $password = $_POST['new_password'];
        $op_user_id = $_POST['op_user_id'];
        $this->model->updateData('op_user', array('password' => md5($password)), array('op_user_id' => $op_user_id));

        $this->session->set_flashdata('success', '<strong>Well done!</strong> user password updated successfully.');
        redirect('user-list');
    }


    function add_user()
    {

        $pagename = 'Add User';
        $data['pagename'] = $pagename;
        $data['user_role_list'] = $this->model->getData('op_user_role');
        $data['designationlist'] = $this->model->getData('designation');

        $this->model->partialView('admin/user/add-new-user', $data, $pagename);
    }

    function submitUser()
    {
        $user_array = $_POST;
        $user_array['status'] = '1';
        $user_array['password'] = md5($user_array['password']);
        $uploaddir = './uploads/profile/';
        if(!is_dir($uploaddir) )
        {
            mkdir($uploaddir,0777,TRUE);
        }
        
        $filename = rand() . basename($_FILES['profile_photo']['name']);
        $uploadfile = $uploaddir . $filename;
        $email = $user_array['email'];
        $contact_no = $user_array['contact_no'];
        $user_data = $this->model->getData('op_user', array('email' => $email));
        if (empty($user_data)) {
            $user_data1 = $this->model->getData('op_user', array('contact_no' => $contact_no));
            if (empty($user_data1)) {

                if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $uploadfile)) {
                    echo "File is valid, and was successfully uploaded.\n";
                    $user_array['profile_photo'] = $filename;
                } else {
                    echo "Upload failed";
                    $user_array['profile_photo'] = "";
                }
                unset($user_array['c_password']);

                $user_id = $this->model->insertData('op_user', $user_array);
                $this->session->set_flashdata('success', '<strong>Well done!</strong> The new user has been added successfully');
            } else {
                $this->session->set_flashdata('msg', '<strong>Oh snap!</strong> The contact already exists. Please try again.');

            }
        } else {
            $this->session->set_flashdata('msg', '<strong>Oh snap!</strong> The email address already exists. Please try again.');

        }
        redirect('user-list');

    }

    function edit_user($id)
    {
        $user_id = base64_decode($id);
        $data['role_id'] = $this->session->userdata('user_role');
        $data['is_user_type_ho'] = $data['is_ho_user'];
        $data['user_role_list'] = $this->model->getData('op_user_role');
        $data['user'] = $this->model->getData('op_user', array('op_user_id' => $user_id));
        $data['designationlist'] = $this->model->getData('designation');
        $pagename = 'Edit User';
        $data['pagename'] = $pagename;
       // print_r($data['user'][0]);die;
        $this->model->partialView('admin/user/edit_user', $data,$pagename);
    }


    function updateUser()
    {
        $user_array = $_POST;

        $op_user_id = $user_array['op_user_id'];

        // Fetch existing user data (for old password)
        $user = $this->db->get_where('op_user', ['op_user_id' => $op_user_id])->row();

        $password = $user_array['password'];
        if (!empty($password)) {
            // Hash new password
            $user_array['password'] = md5($user_array['password']);
        } else {
            // Keep old hashed password from DB
            $user_array['password'] = $user->password;
        }

        if ($_FILES['profile_photo']['name'] != '') {
            $uploaddir = './uploads/profile/';
            if(!is_dir($uploaddir) )
            {
                mkdir($uploaddir,0777,TRUE);
            }
            
            $filename = rand() . basename($_FILES['profile_photo']['name']);
            $uploadfile = $uploaddir . $filename;
            if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.\n";
                $user_array['profile_photo'] = $filename;
            } else {
                echo "Upload failed";
                $user_array['profile_photo'] = "";
            }
        }
       
        $this->session->set_userdata(array('designation_id' => $_POST['designation_id']));

        unset($user_array['opuserrole_id']);
      
        $this->model->updateData('op_user', $user_array, array('op_user_id' => $op_user_id));
        $this->session->set_flashdata('success', '<strong>Well done!</strong> user details has been updated successfully.');
        redirect('user-list');
       
    }






    

   









    function map_with()
    {
        $postData = $_POST;
        if ($postData['map_with'] == 'B') {
            $branch = $this->model->getRecords('branch', $fields = '*', $condition = array('status' => '1'), $order_by = 'branch_name asc', $limit = '', $debug = 0, $group_by = '');
            echo json_encode($branch);
        }
        if ($postData['map_with'] == 'F') {
            $franchise = $this->model->getRecords('franchise_setting', $fields = '*', $condition = '', $order_by = 'franchise_name asc', $limit = '', $debug = 0, $group_by = '');
            echo json_encode($franchise);
        }
    }




    function change_flag($id, $flag)
    {
        $user_id = base64_decode($id);
        $this->model->updateData('op_user', array('flag' => $flag), array('op_user_id' => $user_id));
        redirect(base_url() . 'user-list');
    }

    public function delete_user()
    {
        $access_data = array();
        $access = array();
        $access[] = 'delete_user';
        $access_data = $this->model->checkAccess($access);
        if (!$access_data['status']) {
            redirect('/');
        }
        $data = $access_data['data'];
        //         $role_id = $this->session->userdata('user_role');        
//        $condition = array('role_id'=>$role_id);
//        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
//        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
//        if (!in_array("delete_user", $data['arr_perm'])) {          
//             redirect('/');
//        }

        $op_user_id = $_POST['id'];
        if ($op_user_id != '') {
            $table_name = 'op_user';
            $field_name = 'op_user_id';
            $this->model->deleteSingleRecord($op_user_id, $table_name, $field_name);
            $arrToReturn = array('error' => 0, 'message' => "User deleted successfully.");
        } else {
            $arrToReturn = array('error' => 1, 'message' => "Not Deleted.");
        }
        echo json_encode($arrToReturn);

    }

    function update_opuser_status()
    {
        $jsonObj = $_POST['jsonObj'];
        $array_data = json_decode($jsonObj, true);
        $array_entity = $array_data['supplier'];

        if (isset($array_entity) && !empty($array_entity)) {
            $user_id = $array_entity['sup_id'];
            $status = $array_entity['status'];
            $this->model->updateData('op_user', array('status' => $status), array('op_user_id' => $user_id));
            $data['status'] = '1';
            $data['msg'] = 'User status has been updated';
        } else {
            $data['status'] = '0';
            $data['msg'] = 'Invalid credential sent. Please login.';
        }
        echo json_encode($data);
    }

    function myProfile($id)
    {
        $user_id = base64_decode($id);
        $condition = "op_user_id = '" . $user_id . "'";
        $data['personal_info'] = $this->model->getRecords('op_user', $fields = 'op_user_id,user_name,email,contact_no,address,user_id,profile_photo', $condition, $order_by = '', $limit = '', $debug = 0, $group_by = '');
        $this->model->partialView('admin/user/my-profile', $data);
    }

    function updateProfile()
    {
        $user_id = $_POST['op_user_id'];
        $array_entity = $_POST;
        if (isset($array_entity) && !empty($array_entity)) {
            if ($_FILES['profile_photo']['name'] != '') {
                $uploaddir = 'uploads/user_profile/';
                $filename = rand() . basename($_FILES['profile_photo']['name']);
                $uploadfile = $uploaddir . $filename;
                if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $uploadfile)) {
                    //              echo "File is valid, and was successfully uploaded.\n";
                    $array_entity['profile_photo'] = $filename;
                } else {
                    //               echo "Upload failed";
                    $array_entity['profile_photo'] = "";
                }
            }
            $this->model->updateData('op_user', $array_entity, array('op_user_id' => $user_id));
            $data['class'] = 'success';
            $data['msg'] = 'Profile has been updated successfully.';
        } else {
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid Information.';
        }
        $this->session->set_flashdata($data);
        redirect(base_url());
    }

    function checkexistmob_email()
    {
        $jsonObj = $_POST['jsonObj'];
        $array_data = json_decode($jsonObj, true);
        $array_entity = $array_data['product'];

        if (isset($array_entity) && !empty($array_entity)) {

            $email = trim($array_entity['email']);
            $user_id = trim($array_entity['user_id']);
            //             echo '<pre>';print_r($user_id);die;
            if (!empty($user_id)) {
                $strSql = "SELECT email FROM op_user WHERE email='" . $email . "' and op_user_id != '" . $user_id . "'";
            } else {
                $strSql = "SELECT email FROM op_user WHERE email='" . $email . "'";
            }
            $offer_data = $this->model->getSqlData($strSql);
            //            echo '<pre>';print_r($offer_data);die;
            if (!empty($offer_data)) {
                $data['status'] = '0';
                $data['msg'] = 'Email Already Exist.';
            } else {
                $data['status'] = '1';
                $data['msg'] = '';
            }

        }
        echo json_encode($data);
    }

    function checkexistmob()
    {
        $jsonObj = $_POST['jsonObj'];
        $array_data = json_decode($jsonObj, true);
        $array_entity = $array_data['product'];

        if (isset($array_entity) && !empty($array_entity)) {
            $contact_no = trim($array_entity['contact_no']);
            $user_id = trim($array_entity['user_id']);
            //         echo '<pre>';print_r($contact_no);die;
            if (!empty($user_id)) {
                $strSql = "SELECT contact_no FROM op_user WHERE contact_no='" . $contact_no . "' and op_user_id != '" . $user_id . "'";
            } else {
                $strSql = "SELECT contact_no FROM op_user WHERE contact_no='" . $contact_no . "'";
            }
            $offer_data = $this->model->getSqlData($strSql);
            if (!empty($offer_data)) {
                $data['status'] = '0';
                $data['msg'] = 'Contact Number Already Exist.';
            } else {
                $data['status'] = '1';
                $data['msg'] = '';
            }

        }
        echo json_encode($data);
    }


    //End of controller
}







