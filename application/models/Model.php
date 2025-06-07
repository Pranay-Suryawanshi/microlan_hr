<?php
class Model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}


	public function partialView($page,$data='',$pagename)
	{
    	//$this->db->select('*');
       // $this->db->from('notification');
      //  $query = $this->db->get();
      //  $res['notification']=$query->result_array();
	  	$res['pagename']=$pagename;
		$this->load->view('includes/admin_header',$res);
		$this->load->view($page,$data);
		$this->load->view('includes/admin_footer');
    }


	public function Add_Bug($data){
        $this->db->insert('project_wise_bug',$data);
    }

    public function Update_Bug($id,$data){
		$this->db->where('bug_id', $id);
		$this->db->update('project_wise_bug',$data);         
    }

	public function GetBugValue($id){
        $sql = "SELECT * FROM project_wise_bug WHERE bug_id='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
	}


	function getFilterData($frm_date,$to_date,$lead_id,$is_id){
		// echo $frm_date,$to_date; exit;
		$this->db->select('*,ld.name as ldName,so.name as souce_name,lds.name as lead_status');
	    $this->db->from('lead as ld');
	    $this->db->join('lead_status as lds','ld.lead_status = lds.is_id','left');
	    $this->db->join('op_user as op','op.op_user_id = ld.assigned','left');
	    $this->db->join('source as so','so.source_id = ld.source','left');	    	    
	    if(!empty($frm_date)){
	    	$this->db->where('ld.created_date >= ',$frm_date);
	    }
	    if(!empty($to_date)){
	    	$this->db->where('ld.created_date <= ',$to_date);
	    }
	    if(!empty($lead_id)){
	        $this->db->where('ld.lead_id',$lead_id);
	    }
	    if(!empty($is_id)){
	        $this->db->where('lds.is_id',$is_id);
	    }
	         
	    $query = $this->db->get();
	    //echo $this->db->last_query();
	    return $query->result_array();
	    /*$resData =  $query->result_array();

	    echo "<pre>";
	    print_r($resData); exit;*/

	}










































	
	function getData($tableName, $where_data=array(), $where_in = array()){
        try{
			if (isset($tableName) && isset($where_data)) {
				
				$this->db->trans_start();
				if(!empty($where_data)){
					$this->db->where($where_data);
				}
				if(!empty($where_in)){
					$this->db->where_in($where_in['field'],$where_in['in_array']);
				}
				$query = $this->db->get($tableName);
                               
				$this->db->trans_complete();
				if ($query->num_rows() > 0){
					$rows = $query->result_array();
					return $rows;
				}else{
					return false;
				} 
			}else{
				return false;
			}
		} catch (Exception $e){
			return false;
		}
	}

	function getDataLimit($tableName, $where_data, $limit='', $start=''){
		//echo '<pre>'; print_r($where_data); 
		//echo $tableName.' - '.$limit .' - '. $start;
		try{
			if (isset($tableName) && isset($where_data)) {
				
				$this->db->trans_start();
				$query = $this->db->get_where($tableName, $where_data, $limit, $start);
				
				$this->db->trans_complete();
				if ($query->num_rows() > 0){
					$rows = $query->result_array();
					return $rows;
				}else{
					return false;
				} 
			}else{
				return false;
			}
		} catch (Exception $e){
			return false;
		}
	}

	function get_like_data($tbl,$clm,$keyword) /*$wh_data,*/
	{
		$this->db->select('*');
		$this->db->from($tbl);
		/*$this->db->where($wh_data);*/
		$this->db->like($clm, $keyword);
		return $this->db->get()->result_array();
	}



    function countrecord($tablename)
    {
    	$query = $this->db->get($tablename);
    	$count = $query->num_rows(); 
    	return $count;
    }

    function CountWhereRecord($tableName,$where_data)
    {
    	$query = $this->db->get_where($tableName, $where_data);
    	$count = $query->num_rows(); 
    	return $count;
    }
   	
   	function count_by_query($sql){
   		$query = $this->db->query($sql);
      	$count = $query->num_rows(); 
    	return $count;
   	}

	function insertData($tableName, $array_data){
		try{
			if (isset($tableName) && isset($array_data)) {
				
				$this->db->trans_start();

				$this->db->insert($tableName, $array_data);
				$globals_id = $this->db->insert_id();

				$this->db->trans_complete();

				return $globals_id;

			}else{
				return false;
			}
		} catch (Exception $e){
			return false;
		}
	}

	function getAllData($tableName){
		if (isset($tableName)) {
			
			$this->db->trans_start();	
			$query = $this->db->get($tableName);
			//$query = $this->db->get($tableName);
			$this->db->trans_complete();
			
			if ($query->num_rows() > 0){
				$rows = $query->result_array();
				return $rows;
			}else{
				return false;
			} 
		}else{
			return false;
		}
	}

	
	function selectData($tableName,$fields){
		if (isset($tableName)) {
			
			$this->db->trans_start();	
			$this->db->select($fields);
			$query = $this->db->get($tableName);
			$this->db->trans_complete();
			
			if ($query->num_rows() > 0){
				$rows = $query->result_array();
				return $rows;
			}else{
				return false;
			} 
			
		}else{
			return false;
		}
	}

	function selectDataNotIn($tableName,$selectField,$notInClmName,$notInData)
	{		
		if (isset($tableName)) {
			
			$this->db->trans_start();	
			$this->db->select($selectField);
			$this->db->where_not_in($notInClmName, $notInData);
			$query = $this->db->get($tableName);
			$this->db->trans_complete();
			
			if ($query->num_rows() > 0){
				$rows = $query->result_array();
				return $rows;
			}else{
				return false;
			} 
			
		}else{
			return false;
		}
	}


	function getReportData($tableName, $whereData ){
		//echo $tableName;print_r($whereData);
		if (isset($tableName) && isset($whereData)) {
			
			$del_clm = array('is_deleted' => '-1' ); //-1 : Record not deleted
			$whereData = array_merge($del_clm, $whereData);
			$this->db->trans_start();
			$query = $this->db->get_where($tableName, $whereData);
			$this->db->trans_complete();
			
			if ($query->num_rows() > 0){
				$rows = $query->result_array();
				return $rows;
			}else{
				return false;
			} 
			
		}else{
			return false;
		}
	}
	
	
	function getDataOrderBy($tableName, $whereData, $order_by, $ASC_DESC='ASC'){
		if (isset($tableName) && isset($whereData)) {
			
			$this->db->trans_start();	
			//$query = $this->db->get_where($tableName, $whereData)->order_by($order_by, $ASC_DESC);

			$this->db->from($tableName);
			$this->db->where($whereData);
			$this->db->order_by($order_by, $ASC_DESC);
			$query = $this->db->get(); 
			
			$this->db->trans_complete();
			
			if ($query->num_rows() > 0){
				$rows = $query->result_array();
				return $rows;
			}else{
				return false;
			} 
			
		}else{
			return false;
		}
	}

	function getReportDataWhereNotIn($tableName, $whereData, $whereColumn, $WhereInValues){
		$del_clm = array('is_deleted' => '-1' ); //-1 : Record not deleted
		$whereData = array_merge($del_clm, $whereData);
		
		$this->db->trans_start();	
		
		$this->db->from($tableName);
		$this->db->where($whereData);
		$this->db->where_not_in($whereColumn, $WhereInValues);
		
		$query = $this->db->get(); 
		
		$this->db->trans_complete();
		
		if ($query->num_rows() > 0){
			$rows = $query->result_array();
			return $rows;
		}else{
			return false;
		} 	
	}

	function getDataWhereIn($tableName, $whereData, $whereColumn, $WhereInValues){
		$this->db->trans_start();	
		
		$this->db->from($tableName);
		$this->db->where($whereData);
		$this->db->where_in($whereColumn, $WhereInValues);
		
		$query = $this->db->get(); 
		
		$this->db->trans_complete();
		
		if ($query->num_rows() > 0){
			$rows = $query->result_array();
			return $rows;
		}else{
			return false;
		} 	
	}

	function updateData($tableName, $updateData, $where){
		//echo $tableName;print_r($updateData);print_r($where);exit;
		
		$this->db->trans_start();	
		$query = $this->db->update($tableName, $updateData, $where);
		$this->db->trans_complete();

		$result = $query ? 1 : 0;
		return $result;
	}

	function deleteData($tableName,$whereData){
		if(isset($tableName) && isset($whereData)){
			
			$this->db->trans_start();	
			$this->db->delete($tableName, $whereData); 
			$this->db->trans_complete();

			if($this->db->affected_rows() > 0){ // returns 1 ( == true) if successfuly deleted
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
		
	}

	function getSqlData($sql){
		
       	$query = $this->db->query($sql);
      	$result=$query->result_array();
      	return $result;
	}
        
	
	function tableInsert($tablename,$val)
    {
    	
        $this->db->insert($tablename, $val);
        if($this->db->affected_rows() == 1){
         return True;
            }
        else
        {
         return False;
        }
    }

    function truncate_table($sql){
    	$this->db->from($sql); 
        $this->db->truncate(); 
    }


    function generate_next_id($tablename,$field,$series='req',$length='6'){
    	$query = $this->db->select($field)
    	->from($tablename)
    	->order_by($field,'DESC')
    	->like($field,$series)
    	->limit(1)
    	->get();
    	$data = $query->first_row();

    	if(empty($data)){
    		$zeros = '';
    		for($i=0;$i<$length-1;$i++){
    			$zeros .='0';
    		}
    		return $series.$zeros.'1';
    	}
    	else{
    		$last_id = $data->$field;
    		$number = substr($last_id,strlen($series));
    		$number = (int)$number + 1;
    		$next_id = $series.sprintf('%0'.$length.'s',$number);
    		return $next_id;
    	}
    }

    function generate_next_id2($last_id,$series= ''){
		$number = substr($last_id,strlen($series));
		$number = (int)$number + 1;
		$next_id = $series.sprintf('%06s',$number);
		return $next_id;
    }

    function get_last_id($tablename,$field){
    	$data = $this->db->select($field)
    	->from($tablename)
    	->order_by($field,'DESC')
    	->get()
    	->first_row();
    	return $data->$field;
    }

    function isExist($tablename,$fieldname,$value){
    	$query = $this->db->select('*')
    	->from($tablename)
    	->where($fieldname,$value)
    	->get();
    	$num_rows = $query->num_rows();
    	if($num_rows > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }

    function getValue($tablename,$fieldname,$where =array()){
    	$query = $this->db->select($fieldname)
    	->from($tablename)
    	->where($where)
    	->get();
    	$data = $query->first_row();
    	$data = (array)$data;
    	return isset($data[$fieldname])?$data[$fieldname]:'';
    }

	function getMinMaxDate($date_arr=array()){
		$i= 0;
		foreach ($date_arr as $key => $value) {
		    if ($i == 0)
		    {
		        $data['max_date'] = date('Y-m-d h:i:s', strtotime($date_arr[$key]));
		        $data['min_date'] = date('Y-m-d h:i:s', strtotime($date_arr[$key]));
		        $data['max_date_key'] = $key;
		        $data['min_date_key'] = $key;
		    }
		    else if ($i != 0)
		    {
		        $new_date = date('Y-m-d h:i:s', strtotime($date_arr[$key]));
		        if ($new_date > $data['max_date'])
		        {
		            $data['max_date'] = $new_date;
		            $data['max_date_key'] = $key;
		        }
		        else if ($new_date < $data['min_date'])
		        {
		            $data['min_date'] = $new_date;
		            $data['min_date_key'] = $key;
		        }
		    }
		    $i++;
		}

		return $data;
	}

       
    public function getRecords($table, $fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0,$group_by='') {
        
        $str_sql = '';
        if (is_array($fields)) { /* $fields passed as array */
            $str_sql.=implode(",", $fields);
        } elseif ($fields != "") { /* $fields passed as string */
            $str_sql .= $fields;
        } else {
            $str_sql .= '*';  /* $fields passed blank */
        }
        
        $this->db->select($str_sql, FALSE);
        if (is_array($condition)) { /* $condition passed as array */
            if (count($condition) > 0) {
                foreach ($condition as $field_name => $field_value) {
                    if ($field_name != '' && $field_value != '') {
                        $this->db->where($field_name, $field_value);
                    }
                }
            }
        } else if ($condition != "") { /* $condition passed as string */
            $this->db->where($condition);
        }
        if ($limit != "") {
            $this->db->limit($limit); /* limit is not blank */
        }
        if (is_array($order_by)) {
            $this->db->order_by($order_by[0], $order_by[1]);  /* $order_by is not blank */
        } else if ($order_by != "") {
            $this->db->order_by($order_by);  /* $order_by is not blank */
        }
        if($group_by !=''){
            $this->db->group_by($group_by); 
        }
        $this->db->from($table);  /* getting record from table name passed */
        $query = $this->db->get();
        if ($debug) {
            die($this->db->last_query());
        }
        return $query->result_array();
    }

    /* unction to insert record into the database */
    public function insertRow($insert_data, $table_name) {
        $this->db->insert($table_name, $insert_data);
//        echo $this->db->last_query();die;
        return $this->db->insert_id();
    }


    public function updateRow($table_name, $update_data, $condition) {

        if (is_array($condition)) {
            if (count($condition) > 0) {
                foreach ($condition as $field_name => $field_value) {
                    if ($field_name != '' && $field_value != '' && $field_value != NULL) {
                        $this->db->where($field_name, $field_value);
                    }
                }
            }
        } else if ($condition != "" && $condition != NULL) {
            $this->db->where($condition);
        }
       $is_updated = $this->db->update($table_name, $update_data);
       
       if($is_updated){
            return 'success';
        }else{
            return 'fail';
        }
    }

    public function deleteRows($arr_delete_array, $table_name, $field_name) {
        if (count($arr_delete_array) > 0) {
            foreach ($arr_delete_array as $id) {
                if ($id) {
                    $this->db->where($field_name, $id);
                    $query = $this->db->delete($table_name);
                }
            }
        }

        $error = $this->db->_error_message();
        $error_number = $this->db->_error_number();
        if ($error) {
            $controller = $this->router->fetch_class();
            $method = $this->router->fetch_method();
            $error_details = array(
                'error_name' => $error,
                'error_number' => $error_number,
                'model_name' => 'common_model',
                'model_method_name' => 'deleteRows',
                'controller_name' => $controller,
                'controller_method_name' => $method
            );
            $this->common_model->errorSendEmail($error_details);
            redirect(base_url() . 'page-not-found');
            exit();
        }
    }
    
     public function deleteSingleRecord($id,$table_name,$field_name) {
        if ($id) {
            $this->db->where($field_name, $id);
            $query = $this->db->delete($table_name);
            return $query;
        }
    }

    public function getSingleRow($condition,$table_name,$field_name) {       
        if ($condition) {           
            $this->db->select($field_name);
            $this->db->from($table_name);
            $this->db->where($condition);
            return $this->db->get()->row($field_name);
        }
    }
    
   
    
    //=============================common model End===================================
       
    function gettableData($with_id_session,$branch_id_session){
        $this->db->select('t.*,b.branch_name,b.branch_id');
        $this->db->from('table_setting as t');
        $this->db->join('branch as b', 'b.br_id = t.branch_id','left');
        if($branch_id_session){
            $this->db->where('t.map_with',$with_id_session);
            $this->db->where('t.branch_id',$branch_id_session);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function getfranchisetableData($with_id_session,$branch_id_session){
        $this->db->select('t.*,f.franchise_name as branch_name,f.franchise_sett_id as branch_id');
        $this->db->from('table_setting as t');
        $this->db->join('franchise_setting as f', 'f.franchise_sett_id = t.branch_id','left');
        if($with_id_session){
           $this->db->where('t.map_with',$with_id_session);
            $this->db->where('t.branch_id',$branch_id_session);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_Role_wise_Data($role_id,$user_id)
   {
        $query="SELECT * FROM `announcement_tbl` WHERE role_id LIKE  ('%".$role_id."%') AND user_id Like  ('%".$user_id."%') AND status = '1' ORDER BY announc_id DESC;";
        $result = $this->db->query($query);
        return $result->result_array();
   }

   function getTableWaiter($condition){
        $this->db->select('t.*');
        $this->db->from('table_setting as t');
        $this->db->join('order_data as od', 't.tablesetting_id = od.table_id','left');
        if($condition){
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->result_array();
   }

   function getstates(){

        $response = array();
        
        // Select record
        $this->db->select('*');
        $q = $this->db->get('states');
        $response = $q->result_array();

        return $response;
    }

    function getcity($postData){
        $response = array();
        
        // Select record
        $this->db->select('*');
        $this->db->where('state_id', $postData['city']);
        $q = $this->db->get('cities');
        $response = $q->result_array();

        return $response;
    }
    
    function checkAccess($permission_array){
        
           $return = array();
           $return['data'] = array();
           $return['status'] = false;
           
            if (empty($permission_array)) {   
                return $return;
            }
           $data['role_id'] = $this->session->userdata('user_role'); 
           $condition = array('role_id'=>$data['role_id']);
            $data = $this->model->getData('op_user_role',$condition)[0]; 
            $data['arr_perm'] = unserialize($data['permission']);
            $result = array_intersect($permission_array,$data['arr_perm']);
            
            if (!empty($result)) {   
                $return['data'] = $data;
                $return['status'] = true;
            }
            else{
                 return false;
            }
            return $return;
       }
       
      function getProductBranchFranchWise($map_with_session='',$branch_id_session=''){
//           echo '<pre>';print_R($branch_id_session);die;
        $this->db->select('*');
        $this->db->from('product as p');
        if($map_with_session == 'F'){
            $where = "p.is_all_franchise = '1' or p.is_all_franchise = '0' and (p.franchise_ids IN($branch_id_session))";
        }else if($map_with_session == 'B'){
            $where = "p.is_all_branch = '1' or p.is_all_branch = '0' and (p.branch_ids IN($branch_id_session))";
        }     
            $this->db->where($where);
        $query = $this->db->get();
        
        return $query->result_array();
    }


        public function partial_web_view($page,$data=''){
        $this->load->view('home/includes/header',$data);
        $this->load->view($page,$data);
        $this->load->view('home/includes/footer');
    }


	public function getCalculatedGst($cust_state_code,$company_state_code,$productTotal,$hsncode){
        $gst_data = $this->model->getData('gst_setting',array('hsn_code'=>$hsncode));
       
        if($gst_data[0]['gst_type'] == 'I'){
            if($cust_state_code == $company_state_code){                             
                $sgst = ($productTotal * 100/(100 + $gst_data[0]['IGST'])) * $gst_data[0]['SGST']/100;
                $cgst = ($productTotal * 100/(100 + $gst_data[0]['IGST'])) * $gst_data[0]['CGST']/100;
                $igst = 0;
            }
            else{
                $sgst = 0;
                $cgst = 0;
                $igst = ($productTotal * 100/(100 + $gst_data[0]['IGST'])) * $gst_data[0]['IGST']/100;
            }
        }else if($gst_data[0]['gst_type'] == 'E'){
            if($cust_state_code == $company_state_code){                             
                $sgst = $productTotal * ($gst_data[0]['SGST']/100);
                $cgst = $productTotal * ($gst_data[0]['CGST']/100);
                $igst = 0;
            }
            else{
                $sgst = 0;
                $cgst = 0;
                $igst = $productTotal($gst_data[0]['IGST']/100);
            }
        }else{
            $sgst = 0;
            $cgst = 0;
            $igst = 0;
        }
        $calculatedgst = array(
            'sgst' => number_format($sgst,'2'),
            'cgst' => number_format($cgst,'2'),
            'igst' => number_format($igst,'2'),
            'totalGst' => $sgst + $cgst + $igst,
            'gst_flag' => isset($gst_data[0]['gst_type']) ? $gst_data[0]['gst_type'] : '',
        );
        return $calculatedgst;
    }
   
	function deleteDataProp($tableName, $whereData) {
		if (isset($tableName) && isset($whereData)) {
	
			$this->db->trans_start();	
			$this->db->delete($tableName, $whereData); 
			$this->db->trans_complete();
	
			if ($this->db->affected_rows() > 0) {
				return ['status' => true, 'message' => 'Record deleted successfully.'];
			} else {
				return ['status' => false, 'message' => 'No record found to delete.'];
			}
		} else {
			return ['status' => false, 'message' => 'Invalid parameters provided.'];
		}
	}

	function getFilterquatation($frm_date,$to_date,$lp_id,$status){
		// echo $frm_date,$to_date; exit;
		$this->db->select('*');
	    $this->db->from('lead_praposals as lp');
		    	    
	    if(!empty($frm_date)){
	    	$this->db->where('lp.created_date >= ',$frm_date);
	    }
	    if(!empty($to_date)){
	    	$this->db->where('lp.created_date <= ',$to_date);
	    }
	    if(!empty($lp_id)){
	        $this->db->where('lp.lp_id',$lp_id);
	    }
	    if(!empty($status)){
	        $this->db->where('lp.status',$status);
	    }
	         
	    $query = $this->db->get();
	    //echo $this->db->last_query();
	    return $query->result_array();
	    /*$resData =  $query->result_array();

	    echo "<pre>";
	    print_r($resData); exit;*/

	}


	

    /* function to writer serialize data to file */



}//class ends here	