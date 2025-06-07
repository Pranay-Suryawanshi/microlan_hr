<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
   
class Api_Model extends CI_Model {

    
    function getKotData($condition){
        $this->db->select('*');
        $this->db->from('order_data as od');
        $this->db->join('order_data_details as odd', 'od.order_id = odd.order_id');
        if($condition){
            $this->db->where($condition);
        }
        $this->db->group_by('od.order_id');
        $this->db->order_by('odd.order_detail_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getKotDatails($condition){
        $this->db->select('od.*,odd.*,odd.remark');
        $this->db->from('order_data_details as odd');
        $this->db->join('order_data as od', 'odd.order_id = od.order_id');
        if($condition){
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->result_array();          
    }
          
}
