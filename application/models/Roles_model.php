<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Roles_Model extends CI_Model {

    public function getRolesList() {
        $this->db->select('*');
        $this->db->from('op_user_role');
//        $this->db->where('role_id !=','1');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getRolesAdd() {
        $this->db->select('*');
        $this->db->from('op_user_role');       
        $query = $this->db->get();
        return $query->result_array();
    }
        
}
