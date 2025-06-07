<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller{
    function __construct(){
        parent::__construct();
        error_reporting(0);
        $this->load->model('model');
        $this->load->model('Roles_model');    
        $sessionUser = $this->session->userdata();
        if (!$sessionUser['op_user_id']) {
            redirect('/');
        }       
    }



    function listRoles() {
        $data['arr_role'] = $this->Roles_model->getRolesList();
        $pagename = 'Role List';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/roles/user_role_list',$data,$pagename);
    }
    

    public function rolesEdit($id) {

       /* $access_data = array();
        $access = array();
        $access[] = 'edit_user_role';
        $access_data = $this->model->checkAccess($access);
        if(!$access_data['status']){
            redirect('/');
        }
        $data = $access_data['data'];          
        $condition = array('role_id' => base64_decode($id));
        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');
        $data['perms'] = unserialize($data['arr_role'][0]['permission']);
        $pagename = 'Edit Role';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/roles/edit-roles',$data,$pagename);*/
                
        $condition = array('role_id' => base64_decode($id));
        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');
      
        $data['perms'] =  unserialize($data['arr_role'][0]['permission']);  /* ['add_holiday', 'edit_holiday', 'bulk_holiday'];*/
            
//         echo '<pre>';
// print_r($data['perms']);
// echo '</pre>';
// exit;

        $pagename = 'Edit Role';
        $data['pagename'] = $pagename;  
        $this->model->partialView('admin/roles/edit-role',$data,$pagename);
    }


    function addRoles() {
        $access_data = array();
        $access = array();
        $access[] = 'add_user_role';
        $access_data = $this->model->checkAccess($access);
        if(!$access_data['status']){
            redirect('/');
        }
        $data = $access_data['data'];
        $this->model->partialView('admin/roles/add-role','','');
    }

    
    
     public function ajaxAddRoles() {
         // Get the serialized permissions data
        $permissions = $this->input->post('permissions');

            // Now, save it to the 'permissions' column of the 'op_user_role' table
            $data = array(
                'role_name' => $this->input->post('role_name'),
                 'permission' => $permissions,
            );
            $last_id=  $this->model->insertData('op_user_role',$data);
                //$this->db->insert('op_user_role', $data);

               // $this->model->partialView('admin/roles/add-role','','');
        $this->session->set_flashdata('success', '<strong>Well done!</strong> user role data has been added successfully.');
               redirect('role-list');

     }
    
public function rolesupdate() {
    $permissions = $this->input->post('permss'); // ✅ This must include bulk_holiday

    $update = array(
        'permission' => serialize($permissions)
    );

    // print_r($permissions); die;

    $condition = array('role_id' => $_POST['id']);
    $this->model->updateRow('op_user_role', $update, $condition);
    
    redirect('role-list');
}



//    public function rolesupdate(){     
    
//        $permissions = $this->input->post('permss');
//     //   print_r($permissions);die;
//          $update = array( 
               
//             'permission' => serialize($permissions)
//          );
//          $table_name = 'op_user_role';
//          $condition = array('role_id'=>$_POST['id']);
       
//         $this->model->updateRow($table_name,$update,$condition);
//         $this->session->set_flashdata('success', '<strong>Well done!</strong> user role data has been updated successfully.');
//          redirect('role-list');
         
//    }    

//     public function rolesdelete() {
//         $role_id = $_POST['id'];
//         if($role_id !=''){
//             $table_name = 'roles';
//             $field_name = 'eid';
//             $this->model->deleteSingleRecord($role_id, $table_name, $field_name);
//             $arrToReturn = array('error' => 0, 'message' => "Role deleted successfully.");
//         } else {
//             $arrToReturn = array('error' => 1, 'message' => "Not Deleted.");
//         }
//         echo json_encode($arrToReturn);
    
//     }
    
    // End Of Controller
}