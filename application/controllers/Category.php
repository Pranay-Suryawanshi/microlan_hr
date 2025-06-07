<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Controller {
    function __construct(){
        parent::__construct();
           error_reporting(0);
        //$this->load->library('Excel');
        $this->load->Model('model');
       error_reporting(0);
               $sessionUser = $this->session->userdata();
        if (!$sessionUser['op_user_id']) {
            redirect('/');
        }
    }
    
    protected function no_cache(){
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0',false);
        header('Pragma: no-cache');
    }

       function checkAccess1($page_name){
           $return = array();
           $return['data'] = array();
           $return['status'] = false;
           $data['role_id'] = $this->session->userdata('user_role'); 
           $condition = array('role_id'=>$data['role_id']);
           
            $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = ''); 
            $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
            $permission_array = explode(',', $page_name);
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
     function add_category()
     {
        //   $access_data = array();
    //     $access = array();
    //     $access[] = 'add_new_category';
    //     $access_data = $this->model->checkAccess($access);
    //     if(!$access_data['status']){
    //         redirect('/');
    //     }
    //     $data = $access_data['data'];
        $pagename="Add Category";
        $data['category_list'] = $this->model->getData("category",array('delete_status'=>'1'));
        $this->model->partialView('admin/category/add_category',$data,$pagename);
    }
    function add_sub_category()
    {   
        // $access_data = array();
        // $access = array();
        // $access[] = 'add_new_sub_category';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];

        $data['category_data'] = $this->model->getData('category',array('status'=>'1'));

        $sql="select sc.*,c.category_name from subcategory sc left join category c on c.category_id=sc.category_id where sc.delete_status='1'";
        $data['subcategory_list']=$this->model->getSqlData($sql);
      
          //$data['subcategory_list'] = $this->model->getData('subcategory',array('delete_status'=>'1'));
       // echo"<pre>";print_r($data['subcategory_list']);die;
          $pagename="Add Sub Category";
        $this->model->partialView('admin/category/add_sub_category',$data,$pagename);
    }
    function add_child_category()
    {   
        // $access_data = array();
        // $access = array();
        // $access[] = 'add_new_child_category';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];


        $data['category_data'] = $this->model->getData('category',array('status'=>'1'));
        $data['child_category_list'] = $this->model->getAllData('childcategory');
        foreach ($data['child_category_list'] as $key => $value) {
        $data['child_category_list'][$key]['category_name'] = $this->model->getValue('category','category_name',array('category_id'=>$value['category_id']));
        $data['child_category_list'][$key]['sub_category_name'] = $this->model->getValue('subcategory','sub_category_name',array('sub_category_id'=>$value['sub_category_id']));
        }

        $pagename="Add Child Category";
        $this->model->partialView('admin/category/add_child_category',$data,$pagename);
    }
    
     function save_new_category(){
        $array_entity = $_POST;
        if(isset($array_entity) && !empty($array_entity)){
            $category_name = $array_entity['category_name'];
            $category_data =$this->model->getData("category",array('category_name'=>$category_name,'status'=>'1'));
            if(isset($category_data) && !empty($category_data)){
                $data['class'] = 'danger';
                $data['msg'] = 'Category already exist.';
            }else{
               
                $category_id = $this->model->insertData('category',$array_entity);
                if($category_id>0){
                    $data['class'] = 'success';
                    $data['msg'] = 'New category has been added successfully.';
                }else{
                    $data['class'] = 'danger';
                    $data['msg'] = 'Something went wrong while submitting category.';
                }
            }
        }else{
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid product category';
        }
        $this->session->set_flashdata($data);
        redirect(base_url().'add-category');
    }
    function save_sub_category(){
        $array_entity = $_POST;
        if(isset($array_entity) && !empty($array_entity)){
            $sub_category_name = $array_entity['sub_category_name'];
            $sub_category_data =$this->model->getData("subcategory",array('sub_category_name'=>$sub_category_name,'status'=>'1','delete_status'=>'1'));
            if(isset($sub_category_data) && !empty($sub_category_data)){
                $data['class'] = 'danger';
                $data['msg'] = 'sub_category_name already exist.';
            }else{                
                $sub_category_id = $this->model->insertData('subcategory',$array_entity);
                if($sub_category_id>0){
                    $data['class'] = 'success';
                    $data['msg'] = 'sub category has been added successfully.';
                }else{
                    $data['class'] = 'danger';
                    $data['msg'] = 'Something went wrong while submitting category.'; 
                }
            }
        }else{
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid product sub_category';
        } 
        $this->session->set_flashdata($data);
        redirect(base_url().'add-sub-category');
    }

    function save_child_category(){
       $array_entity = $_POST;
        if(isset($array_entity) && !empty($array_entity)){
            $child_category_name = $array_entity['child_category_name'];
            $child_category_data =$this->model->getData("childcategory",array('child_category_name'=>$child_category_name,'status'=>'1'));
            if(isset($child_category_data) && !empty($child_category_data)){
                $data['class'] = 'danger';
                $data['msg'] = 'Child Category Name already exist.';
            }else{               
                $child_category_id = $this->model->insertData('childcategory',$_POST);
                if($child_category_id>0){
                    $data['class'] = 'success';
                    $data['msg'] = 'Child Category added Successfully.';
                }else{
                    $data['class'] = 'danger';
                    $data['msg'] = 'Something went wrong while submitting category.'; 
                }
            }
        }else{
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid product sub_category';
        }
        $this->session->set_flashdata($data);
        redirect(base_url().'childcategory');
    }
    
     function editCategory($id){
         $access_data = array();
        $access = array();
        $access[] = 'edit_category';
        $access_data = $this->model->checkAccess($access);
        if(!$access_data['status']){
            redirect('/');
        }
        $data = $access_data['data'];

        $category_id = base64_decode($id);
        $data['category_data'] = $this->model->getData('category',array('category_id'=>$category_id));
        $pagename="Edit Category";
        $this->model->partialView('admin/category/edit_category',$data,$pagename);
    }
    function edit_subcategory($id){
        // $access_data = array();
        // $access = array();
        // $access[] = 'edit_sub_category';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];

        $subcategory_id = base64_decode($id);
        $data['category_data'] = $this->model->getData('category',array('status'=>'1'));
        $data['subcategory_data'] = $this->model->getData('subcategory',array('sub_category_id'=>$subcategory_id));
        $pagename="Edit Sub Category";
        $this->model->partialView('admin/category/edit_subcategory',$data,$pagename);
    }

    function edit_child_category($id){
        $child_category_id = base64_decode($id);
        $data['category_data'] = $this->model->getData('category',array('status'=>'1'));
        $data['childcategory'] = $this->model->getData('childcategory',array('child_category_id'=>$child_category_id))[0];
       $pagename="Edit Child Category";
        $this->model->partialView('admin/category/edit_child_category',$data,$pagename);
    }
    
     function update_category(){
        $array_entity = $_POST;
        if(isset($array_entity) && !empty($array_entity)){
            $category_id = $array_entity['category_id'];
            $category_name = $array_entity['category_name'];
           
        $this->model->updateData('category',$array_entity,array('category_id'=>$category_id));    
        $data['class'] = 'success';
        $data['msg'] = 'Category has been updated successfully.';
        
        }else{
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid category id.';
        }
        $this->session->set_flashdata($data);
        redirect(base_url().'add-category');
    }
    
     function update_sub_category(){
        $array_entity = $_POST;
        if(isset($array_entity) && !empty($array_entity)){
            $sub_category_id = $array_entity['sub_category_id'];
            $category_id = $array_entity['category_id'];
            $sub_category_name = $array_entity['sub_category_name'];
            $this->model->updateData('subcategory',array('category_id'=>$category_id,'sub_category_name'=>$sub_category_name),array('sub_category_id'=>$sub_category_id));    
            $data['class'] = 'success';
            $data['msg'] = 'Sub category has been updated successfully.';
        }else{
            $data['class'] = 'danger';         
            $data['msg'] = 'Invalid sub category';
        }
         $this->session->set_flashdata($data);
         redirect(base_url().'add-sub-category');
    }

    function update_child_category(){
        $this->model->updateData('childcategory',$_POST,array('child_category_id'=>$_POST['child_category_id']));        
        $this->session->set_flashdata(array('class'=>'success','msg'=>'Child category has been updated successfully'));
        redirect(base_url().'childcategory');
    }
    
    function delete_category(){
        $access_data = array();
        $access = array();
        $access[] = 'delete_category';
        $access_data = $this->model->checkAccess($access);
        if(!$access_data['status']){
            redirect('/');
        }
        $data = $access_data['data'];

         $category_id = $this->input->get_post('category_id');
//         $sub_category_id = $this->input->get_post('category_id');
        if(!empty($category_id)){
            
            $this->model->updateData('category',array('delete_status'=>'0'),array('category_id'=>$category_id));    
            $this->session->set_flashdata(array('class'=>'success','msg'=>'Category has been deactivated successfully.'));
        }else{
            $this->session->set_flashdata(array('class'=>'success','msg'=>'Invalid Category'));
        }
        redirect(base_url().'category');
    }
    
    function delete_sub_category(){
        // $access_data = array();
        // $access = array();
        // $access[] = 'delete_sub_category';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];

        $sub_category_id = $this->input->get_post('sub_category_id');
        if(isset($sub_category_id) && !empty($sub_category_id)){
            $this->model->updateData('subcategory',array('delete_status'=>'0'),array('sub_category_id'=>$sub_category_id));    
            $this->session->set_flashdata(array('class'=>'success','msg'=>'Sub category has been deactivated successfully.'));
        }else{
            $this->session->set_flashdata(array('class'=>'success','msg'=>'Invalid sub category'));
        }
        redirect(base_url().'add-sub-category');
    }

    function delete_child_category(){
        $child_category_id = $this->input->get_post('child_category_id');
        $this->model->deleteData('childcategory',array('child_category_id'=>$child_category_id));
        $this->session->set_flashdata(array('class'=>'success','msg'=>'Child Category deleted Successfully'));
        redirect(base_url().'childcategory');
    }

 
    
    
    function update_child_category_active_deactive_status(){
        $jsonObj = $_POST['jsonObj']; 
        $array_data = json_decode($jsonObj,true); 
        $array_entity = $array_data['product'];

        if(isset($array_entity) && !empty($array_entity)){
            $sub_category_id = $array_entity['child_category_id'];
            $stock_status = $array_entity['status'];
            $this->model->updateData('childcategory',array('status'=>$stock_status),array('child_category_id'=>$sub_category_id));
            $data['status'] = '1';
            $data['msg'] = 'Category status has been updated';
        }else{
            $data['status'] = '0';
            $data['msg'] = 'Your session has been expired';
        }
        echo json_encode($data);
    }
    function update_sub_category_active_deactive_status(){
        $jsonObj = $_POST['jsonObj']; 
        $array_data = json_decode($jsonObj,true); 
        $array_entity = $array_data['product'];
//print_r($array_entity);die;
        if(isset($array_entity) && !empty($array_entity)){
            $sub_category_id = $array_entity['sub_category_id'];
            $stock_status = $array_entity['status'];
           // echo $stock_status; echo $sub_category_id;die;
            $this->model->updateData('subcategory',array('status'=>$stock_status),array('sub_category_id'=>$sub_category_id));
            $data['status'] = '1';
            $data['msg'] = 'Sub category status has been updated';
        }else{
            $data['status'] = '0';
            $data['msg'] = 'Your session has been expired';
        }
        echo json_encode($data);
    }
    
    function getSubCategory(){
        $postData = $_POST;
        $sub_category_list = $this->model->getData('subcategory',array('status'=>'1'));

        $sub_cats = array();
        if(!empty($sub_category_list)){
        foreach ($sub_category_list as $key => $value) {
            if($postData['category_id'] == $value['category_id']){
                $sub_cats[] = $value;
            }
        }
        }
        echo json_encode($sub_cats);
    }   
    
     function getChildCategory(){
        $postData = $_POST;
        $child_category_list = $this->model->getData('childcategory',array('status'=>'1'));

        $child_cats = array();
        foreach ($child_category_list as $key => $value) {
            if($postData['sub_category_id'] == $value['sub_category_id']){
                $child_cats[] = $value;
            }
        }
        echo json_encode($child_cats);
    }
    function save_ajax_category(){
       // $branch_id_session = $this->session->userdata('map_with_id');
        $array_entity = $_POST;
        if(isset($array_entity) && !empty($array_entity)){
            $category_name = $array_entity['category_name'];
             $res = $this->model->getData('category',array('category_name'=>$array_entity['category_name']));
            if(!empty($res)){
              $data['msg'] = 'Category already exist.';
                  echo json_encode($data);
              return false;
            }

            $category_data =$this->model->getData("category",array('category_name'=>$category_name,'status'=>'1'));
            if(isset($category_data) && !empty($category_data)){
                $data['class'] = 'danger';
                $data['msg'] = 'Category already exist.';
            }else{
               
               // $array_entity['store_id'] = $branch_id_session;
                $category_id = $this->model->insertData('category',$array_entity);
                if($category_id>0){
                    $data['class'] = 'success';
                    $data['msg'] = 'New category has been added successfully.';
                }else{
                    $data['class'] = 'danger';
                    $data['msg'] = 'Something went wrong while submitting category.';
                }
            }
        }else{
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid product category';
        }
         echo json_encode($data);
       // $this->session->set_flashdata($data);
        //redirect(base_url().'category');
    }
    function save_ajax_subcategory()
   {
       // $branch_id_session = $this->session->userdata('map_with_id');
        $array_entity = $_POST;
     
               // $array_entity['store_id'] = $branch_id_session;
                $category_id = $this->model->insertData('subcategory',$array_entity);
                if($category_id){
                    $data['class'] = 'success';
                    $data['msg'] = 'New sub category has been added successfully.';
                }else{
                    $data['class'] = 'danger';
                    $data['msg'] = 'Something went wrong while submitting category.';
                }
            
       
         echo json_encode($data);
       // $this->session->set_flashdata($data);
        //redirect(base_url().'category');
    }

    function update_category_active_deactive_status(){
        $jsonObj = $_POST['jsonObj']; 
        $array_data = json_decode($jsonObj,true); 
        $array_entity = $array_data['product'];

        if(isset($array_entity) && !empty($array_entity)){
            $sub_category_id = $array_entity['category_id'];
            $stock_status = $array_entity['status'];
            $this->model->updateData('category',array('status'=>$stock_status),array('category_id'=>$sub_category_id));
            $data['status'] = '1';
            $data['msg'] = 'Category status has been updated';
        }else{
            $data['status'] = '0';
            $data['msg'] = 'Your session has been expired';
        }
        echo json_encode($data);
    }

    function save_ajax_childcategory()
   {
       // $branch_id_session = $this->session->userdata('map_with_id');
        $array_entity = $_POST;
     
               // $array_entity['store_id'] = $branch_id_session;
                $category_id = $this->model->insertData('childcategory',$array_entity);
                if($category_id){
                    $data['class'] = 'success';
                    $data['msg'] = 'New child category has been added successfully.';
                }else{
                    $data['class'] = 'danger';
                    $data['msg'] = 'Something went wrong while submitting category.';
                }
            
       
         echo json_encode($data);
       // $this->session->set_flashdata($data);
        //redirect(base_url().'category');
    }
 
    //End Of Controller
    }




  


