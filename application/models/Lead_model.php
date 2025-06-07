<?php

	class Lead_model extends CI_Model {


	function __consturct(){
	parent::__construct();
	
	}
    
    function get_last_serial_number() {
        $this->db->select('lead_number');
        $this->db->from('lead');
        $this->db->order_by('lead_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row()->lead_number ?? null;
    }
}
?>