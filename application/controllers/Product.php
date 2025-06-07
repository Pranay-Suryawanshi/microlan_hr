<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model('model');
        // $this->load->library('phpqrcode/qrlib');
        // $this->load->helper('common_helper');       
        $sessionUser = $this->session->userdata();
        if (!$sessionUser['op_user_id']) {
            redirect('/');
        }
    }
    function add_new_product()
    {
        // $access_data = array();
        // $access = array();
        // $access[] = 'add_new_product';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("add_new_product", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        // $branch_id_session = $this->session->userdata('map_with_id');
        // $map_with_session = $this->session->userdata('map_with');
        $data['role_id'] = $this->session->userdata('user_role');
        $data['status'] = '';
        $data['msg'] = '';
        $data['menu'] = 'product';
        if ($data['is_ho_user'] == '1') {
            $data['addon_list'] = $this->model->getData('product', array('is_addon_product' => '1'));
        }

        //  $data['instructions_list'] = $this->model->getData('instructions');
        // $data['branch_list'] = $this->model->getData('branch');
        // $data['franchise_list'] = $this->model->getData('franchise_setting');

        $data['category_data'] = $this->model->getData('category', array('status' => '1'));
        $data['sub_category_list'] = $this->model->getData('subcategory', array('status' => '1'));
        $data['unit_list'] = $this->model->getData('product_unit');
        $data['hsn_code_list'] = $this->model->getData('gst_setting');
        $data['item_type_list'] = $this->model->getData('item_type');
        $data['item_category'] = $this->model->getData('item_category');
        $pagename = "add service";
        $this->model->partialView('admin/product/add_new_product', $data, service);
    }

    function submit_product()
    {
        $role = $this->session->userdata('user_role');

        // if(!empty($_POST['item_type'])){
        //     $_POST['item_type'] = implode(',',$_POST['item_type']);
        // }else{
        //     $_POST['item_type'] = '1';
        // }
        // if(!empty($_POST['item_category'])){
        //     $_POST['item_category'] = implode(',',$_POST['item_category']);
        // }else{
        //     $_POST['item_category'] = '1';
        // }

        // if(!empty($_POST['price_range'])){
        //     $_POST['price_range'] = implode(',',$_POST['price_range']);
        // }else{
        //     $_POST['price_range'] = '0';
        // }
        // if(!empty($_POST['avg_rate'])){
        //     $_POST['avg_rate'] = implode(',',$_POST['avg_rate']);
        // }else{
        //     $_POST['avg_rate'] = '0';
        // }

        // if (!empty($_POST['unit_size'])) {
        //     if (is_array($_POST['unit_size'])) {
        //         $_POST['unit_size'] = implode(',', $_POST['unit_size']);
        //     }
        // } else {
        //     $_POST['unit_size'] = '0';
        // }

        $_POST['mrp_rate_old'] = '';
        $_POST['sale_price_old'] = '';
        $_POST['unit_size_old'] = '';
        
        $_POST['status'] = '1';
        $_POST['stock_status'] = '1';

        // $product_array = $_POST;

        $product_array['row_no'] = $_POST['row_no'];
        $product_array['product_name'] = $_POST['product_name'];
        $product_array['category_id'] = $_POST['category_id'];
        $product_array['hsn_code'] = $_POST['hsn_code'];
        $product_array['unit_id'] = $_POST['unit_id'];
        $product_array['description'] = $_POST['description'];
        $product_array['terms_conditions'] = $_POST['terms_conditions'];

        if (!empty($product_array['sub_category_id'])) {
            $product_array['sub_category_id'] = $_POST['sub_category_id'];
        } else {
            $product_array['sub_category_id'] = '0';
        }
        if (!empty($product_array['child_category_id'])) {
            $product_array['child_category_id'] = $_POST['child_category_id'];
        } else {
            $product_array['child_category_id'] = '0';
        }

        $product_image = array();
        if (isset($_FILES['image_name']) && !empty($_FILES['image_name'])) {
            foreach ($_FILES['image_name']['name'] as $key => $value) {

                $uploaddir = './uploads/products/';
                $filename = basename($value);
                $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $counter = 1;
                while (file_exists($uploaddir . $filename)) {
                    $filename = $rawBaseName . $counter . '.' . $extension;
                    $counter++;
                };
                $uploadfile = $uploaddir . $filename;
                if (move_uploaded_file($_FILES['image_name']['tmp_name'][$key], $uploadfile)) {
                    $product_image[] = $filename;
                }
            }
        }

        if (!empty($product_image)) {
            $product_array['image_name'] = implode(',', $product_image);
        }

        $product_id = $this->model->insertData('product', $product_array);

        $unit_count = $_POST['row_no'];
        $unit_array = array();

        for ($i = 1; $i <= $unit_count; $i++) 
        {
            // echo $i . ' - ' . $_POST['unit_size'][$i];
            // echo '<br>';
            // $_POST['unit_size'][$i];

            if(!empty($_POST['unit_size'][$i]))
            {
                $unit_array['product_id'] = $product_id;
                $unit_array['unit_size'] = $_POST['unit_size'][$i];
                $unit_array['mrp_rate'] = $_POST['mrp_rate'][$i];
                $unit_array['sale_price'] = $_POST['sale_price'][$i];

                $this->model->insertData('product_details', $unit_array);
            }
        }

        $this->session->set_flashdata('msg', 'The new product has been uploaded successfully.');
        redirect('product-list');
    }

    function product_list()
    {
        // $access_data = array();
        // $access = array();
        // $access[] = 'product_list';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("product_list", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        // $branch_id_session = $this->session->userdata('map_with_id');
        // $map_with_session = $this->session->userdata('map_with');
        $role_id = $this->session->userdata('user_role');
        // if($data['is_ho_user'] == '1'){
        //     $data['product_list'] = $this->model->getData('product');
        // }else{
        //         $data['product_list'] = $this->model->getProductBranchFranchWise($map_with_session,$branch_id_session);
        // }
        // $data['product_list'] = $this->model->getData('product');
        $data['product_list'] = $this->model->getSqlData('select * from product order by product_id DESC');
        $data['categpry_list'] = $this->model->getData('category');
        $data['sub_category_list'] = $this->model->getData('subcategory');

        $pack_wise_product_data = array();
        if (!empty($data['product_list'])) {
            foreach ($data['product_list']  as $key => $value) {
                if (!empty($value['pack_size'])) {
                    $packs = explode(',', $value['pack_size']);
                    $price = explode(',', $value['price']);
                    $vendor_sku = explode(',', $value['vendor_sku']);
                    $sku2 = explode(',', $value['sku2']);
                    foreach ($packs as $key1 => $value1) {
                        $value['pack_size'] = $value1;
                        $value['price'] = isset($price[$key1]) ? $price[$key1] : '';
                        $value['vendor_sku'] = isset($vendor_sku[$key1]) ? $vendor_sku[$key1] : '';
                        $value['sku2'] = isset($sku2[$key1]) ? $sku2[$key1] : '';
                        $pack_wise_product_data[] = $value;
                    }
                } else {
                    $pack_wise_product_data[] = $value;
                }
            }
        }
        if (!empty($pack_wise_product_data)) {
            foreach ($pack_wise_product_data as $key => $value) {
                $category_data = $this->model->getData('category', array('category_id' => $value['category_id']));
                $unit_name = $this->model->getValue('product_unit', 'unit_name', array('unit_id' => $value['unit_id']));
                $sub_category_data = $this->model->getData('subcategory', array('sub_category_id' => $value['sub_category_id']));
                $stock_status = '';
                $nestedData[] = array(
                    'product_id' => $value['product_id'],
                    'product_name' => strtoupper($value['product_name']),
                    'image_name' => $value['image_name'],
                    'product_type' => $value['product_type'],
                    'unit_name' => $unit_name,
                    'category_id' => strtoupper(isset($category_data[0]['category_name']) ? $category_data[0]['category_name'] : ''),
                    'sub_category_id' => strtoupper(isset($sub_category_data[0]['sub_category_name']) ? $sub_category_data[0]['sub_category_name'] : ''),
                    'pack_size' => $value['pack_size'],
                    'vendor_sku' => $value['vendor_sku'],
                    'unit_size' => $value['unit_size'],
                    'sku2' => $value['sku2'],
                    'price' => $value['price'],
                    'price_range' => $value['price_range'],
                    'status' => $value['status'],
                    'stock_status' => $value['stock_status'],
                );
            }
        }
        if (!empty($nestedData)) {
            $data['product_list1'] = $nestedData;
        }
        $pagename = "service list";
        $this->model->partialView('admin/product/product_list', $data, $pagename);
    }

    function product_managment()
    {
        $role_id = $this->session->userdata('user_role');
        $condition = array('role_id' => $role_id);
        $arr_perm = $this->model->getRecords('op_user_role', $fields = 'permission', $condition, $order_by = '', $limit = '', $debug = 0, $group_by = '');
        $data['arr_perm'] = unserialize($arr_perm[0]['permission']);
        $this->model->partialView('admin/product/product_managment', $data);
    }

    function edit_product($id)
    {
        // $access_data = array();
        // $access = array();
        // $access[] = 'edit_product';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("edit_product", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        $product_id = base64_decode($id);
        $data['role_id'] = $this->session->userdata('user_role');
        //         $branch_id_session = $this->session->userdata('map_with_id');
        //         $map_with_session = $this->session->userdata('map_with');
        // //        if($data['role_id'] == '1'){
        //         $data['addon_list'] = $this->model->getData('product',array('is_addon_product'=>'1'));
        // //        }       

        $data['product_data'] = $this->model->getData('product', array('product_id' => $product_id));
        // echo "<pre>";print_r($data);die;
        // $data['instructions_list'] = $this->model->getData('instructions');
        // $data['branch_list'] = $this->model->getData('branch');
        // $data['franchise_list'] = $this->model->getData('franchise_setting');
        $data['hsn_code_list'] = $this->model->getData('gst_setting');
        $data['category_data'] = $this->model->getData('category', array('status' => '1'));
        $data['sub_category_list'] = $this->model->getData('subcategory');
        $data['child_category_list'] = $this->model->getData('childcategory');
        $data['unit_list'] = $this->model->getData('product_unit');
        $data['item_type_list'] = $this->model->getData('item_type');
        $data['item_category1'] = $this->model->getData('item_category');
        $pagename = "edit service";
        $this->model->partialView('admin/product/edit_product', $data, $pagename);
    }

    function delete_product_detail()
    {
        $jsonObj = $_POST['jsonObj']; 
        $array_data = json_decode($jsonObj,true); 
        $array_entity = $array_data['product'];

        if(isset($array_entity) && !empty($array_entity)){
            $product_id = $array_entity['product_id'];
            $pd_id = $array_entity['pd_id'];

            $this->model->deleteData('product_details',array('product_details_id'=>$pd_id, 'product_id'=>$product_id));
            $data['status'] = '1'; 
            $data['msg'] = 'Detail has been deleted';
        }else{
            $data['status'] = '0';
            $data['msg'] = 'Your session has been expired';
        }
        echo json_encode($data);
    }

    public function delete_product()
    {
        // $access_data = array();
        // $access = array();
        // $access[] = 'delete_product';
        // $access_data = $this->model->checkAccess($access);
        // if(!$access_data['status']){
        //     redirect('/');
        // }
        // $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("delete_product", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        $product_id = $_POST['id'];
        if ($product_id != '') {

            $this->model->updateData('product', array('status' => '0'), array('product_id' => $product_id));
            $arrToReturn = array('error' => 0, 'message' => "Product deleted successfully.");
        } else {
            $arrToReturn = array('error' => 1, 'message' => "Not Deleted.");
        }
        echo json_encode($arrToReturn);
    }

    function update_product()
    {
        $role = $this->session->userdata('user_role');

        // if (!empty($_POST['map_addon'])) {
        //     $_POST['map_addon'] = implode(',', $_POST['map_addon']);
        // } else {
        //     $_POST['map_addon'] = '0';
        // }
        // if (!empty($_POST['map_instruction'])) {
        //     $_POST['map_instruction'] = implode(',', $_POST['map_instruction']);
        // } else {
        //     $_POST['map_instruction'] = '0';
        // }

        // if ($role == '1') {
        //     if (!empty($_POST['branch_ids'])) {
        //         $_POST['branch_ids'] = implode(',', $_POST['branch_ids']);
        //     } else {
        //         $_POST['branch_ids'] = '';
        //     }
        //     if (!empty($_POST['franchise_ids'])) {
        //         $_POST['franchise_ids'] = implode(',', $_POST['franchise_ids']);
        //     } else {
        //         $_POST['franchise_ids'] = '0';
        //     }
        // } else {
        // }
        // if (!empty($_POST['unit_size'])) {
        //     $_POST['unit_size'] = implode(',', $_POST['unit_size']);
        // } else {
        //     $_POST['unit_size'] = '1';
        // }
        // if (!empty($_POST['item_type'])) {
        //     $_POST['item_type'] = implode(',', $_POST['item_type']);
        // } else {
        //     $_POST['item_type'] = '1';
        // }
        // if (!empty($_POST['item_category'])) {
        //     $_POST['item_category'] = implode(',', $_POST['item_category']);
        // } else {
        //     $_POST['item_category'] = '1';
        // }
        // if (!empty($_POST['gender'])) {
        //     $_POST['gender'] = implode(',', $_POST['gender']);
        // } else {
        //     $_POST['gender'] = '1';
        // }
        // if (!empty($_POST['price_range'])) {
        //     $_POST['price_range'] = implode(',', $_POST['price_range']);
        // } else {
        //     $_POST['price_range'] = '0';
        // }
        // if (!empty($_POST['avg_rate'])) {
        //     $_POST['avg_rate'] = implode(',', $_POST['avg_rate']);
        // } else {
        //     $_POST['avg_rate'] = '0';
        // }

        // $product_array = $_POST;
        // //echo"file name"; print_r($_FILES);
        // if(!empty($_FILES['image_name']['name'])){ 
        //     $uploaddir = './uploads/products/';
        //     $filename = basename($_FILES['image_name']['name']);
        //     $rawBaseName = pathinfo($filename, PATHINFO_FILENAME );
        //     $extension = pathinfo($filename, PATHINFO_EXTENSION );

        //     $counter = 1;
        //     while(file_exists($uploaddir.$filename)) {
        //         $filename = $rawBaseName . $counter . '.' . $extension;
        //         $counter++;
        //     };
        //     $uploadfile = $uploaddir . $filename;

        //     if (move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadfile)) {
        //         echo "File is valid, and was successfully uploaded.\n";
        //         if($_POST['image_name'] != ''){
        //             unlink($uploaddir.$_POST['image_name']);
        //         }
        //         // if (!empty($_POST['image_name']) && file_exists($uploaddir . $_POST['image_name'])) {
        //         //     unlink($uploaddir . $_POST['image_name']);
        //         // }
        //       $product_array['image_name'] = $filename;
        //     } else {
        //        echo "Upload failed";
        //        $product_array['image_name'] = "";
        //     }
        // }else{

        // } //print_r($product_array);die;
        //  echo"file name"; print_r($_FILES);

        $_POST['mrp_rate_old'] = '';
        $_POST['sale_price_old'] = '';
        $_POST['unit_size_old'] = '';
        
        $_POST['status'] = '1';
        $_POST['stock_status'] = '1';

        // $product_array = $_POST;

        $product_array['row_no'] = $_POST['row_no'];
        $product_array['product_name'] = $_POST['product_name'];
        $product_array['category_id'] = $_POST['category_id'];
        $product_array['hsn_code'] = $_POST['hsn_code'];
        $product_array['unit_id'] = $_POST['unit_id'];
        $product_array['description'] = $_POST['description'];
        $product_array['terms_conditions'] = $_POST['terms_conditions'];

        // $product_array = $_POST;
        $product_image = array();

        if (isset($_FILES['image_name']) && !empty($_FILES['image_name'])) {
            // foreach ($_FILES['image_name']['name'] as $key => $value) {

                $uploaddir = './uploads/products/';

                if(!file_exists($uploaddir)){
                    mkdir($uploaddir, 0777, true);
                }

                $filename = basename($_FILES['image_name']['name']);
                $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $counter = 1;
                while (file_exists($uploaddir . $filename)) {
                    $filename = $rawBaseName . $counter . '.' . $extension;
                    $counter++;
                };
                $uploadfile = $uploaddir . $filename;
                //[$key]
                if (move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadfile)) {
                    // $product_image[] = $filename;
                    echo $product_image = $filename;
                }
            // }
        }
        

        if (!empty($product_image)) {
            // $product_array['image_name'] = implode(',', $product_image);
            $product_array['image_name'] = $product_image;
        }

        if (!empty($_POST['sub_category_id'])) {
            $product_array['sub_category_id'] = $_POST['sub_category_id'];
        } else {
            $product_array['sub_category_id'] = '0';
        }
        if (!empty($_POST['child_category_id'])) {
            $product_array['child_category_id'] = $_POST['child_category_id'];
        } else {
            $product_array['child_category_id'] = '0';
        }
        $product_id = $_POST['product_id'];
        unset($product_array['rowNo']);
        unset($product_array['product_id']);
        unset($product_array['map_addon']);
        unset($product_array['map_instruction']);
        $this->model->updateData('product', $product_array, array('product_id' => $product_id));

        $old_row_no = $_POST['old_row_no'];
        $unit_count = $_POST['row_no'];

        $unit_array1 = array();
        for ($i = 1; $i <= $old_row_no; $i++) 
        {
            $pd_id = $_POST['pd_id'][$i];
            if(!empty($_POST['unit_size'][$i]))
            {
                $unit_array1['product_id'] = $product_id;
                $unit_array1['unit_size'] = $_POST['unit_size'][$i];
                $unit_array1['mrp_rate'] = $_POST['mrp_rate'][$i];
                $unit_array1['sale_price'] = $_POST['sale_price'][$i];

                $this->model->updateData('product_details', $unit_array1, array('product_details_id' => $pd_id, 'product_id' => $product_id));
            }
        }

        $unit_array = array();
        for ($k = 1; $k <= $unit_count; $k++) 
        {
            if(!empty($_POST['new_unit_size'][$i]))
            {
                $unit_array['product_id'] = $product_id;
                $unit_array['unit_size'] = $_POST['new_unit_size'][$k];
                $unit_array['mrp_rate'] = $_POST['new_mrp_rate'][$k];
                $unit_array['sale_price'] = $_POST['new_sale_price'][$k];

                $this->model->insertData('product_details', $unit_array);
            }
        }
        
        $this->session->set_flashdata('msg', 'The service details has been updated successfully.');
        redirect('product-list');
    }

    function download_product_list()
    {

        // output headers so that the file is downloaded rather than displayed
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=product.csv');
        // create a file pointer connected to the output stream
        $output = fopen('php://output', 'w');
        // output the column headings
        fputcsv($output, array('Sr No', 'Product Id', 'Product Name', 'Product Type', 'Product Type Name', 'Manufacturer Name', 'Brand Name', 'Vendor Name', 'Pack Size', 'Category Id', 'Category Name', 'Sub Category Id', 'Subcategory Name', 'GST', 'super deal', 'Unit Id', 'Unit Name', 'Selling cost', 'Barcode_no', 'Sku2', 'Stock Qty', 'Hsn Code', 'Stock Status'));

        // fetch the data
        //        $product_data = $this->model->getDataOrderBy('product',array(),'product_name','ASC');
        $product_data = $this->model->getData('product', array('is_addon_product' => '0'));

        $pack_wise_product_data = array();
        foreach ($product_data as $key => $value) {
            $value['sgst'] = 0;
            $value['cgst'] = 0;
            $value['barcode_no'] = '';

            if (!empty($value['pack_size'])) {
                $packs = explode(',', $value['pack_size']);
                $prices = explode(',', $value['price']);
                // $mrps = explode(',', $value['mrp']);
                $gst_data = $this->model->getData('gst_setting', array('category_id' => $value['category_id'], 'sub_category_id' => $value['sub_category_id']))[0];
                $vendor_skus = explode(',', $value['vendor_sku']);
                $custom_skus = explode(',', $value['sku2']);
                foreach ($packs as $key1 => $value1) {
                    $value['pack_size'] = $value1;
                    if (isset($prices[$key1])) {
                        $value['price'] = $prices[$key1];
                        if (isset($gst_data['SGST'])) {
                            $value['sgst'] = $value['price'] * ($gst_data['SGST'] / 100);
                        }
                        if (isset($gst_data['CGST'])) {
                            $value['cgst'] = $value['price'] * ($gst_data['CGST'] / 100);
                        }
                    }
                    if (isset($vendor_skus[$key1]) && !empty($vendor_skus[$key1])) {
                        $value['barcode_no'] = $vendor_skus[$key1];
                    } elseif (isset($custom_skus[$key1]) && !empty($custom_skus[$key1])) {
                        $value['barcode_no'] = $custom_skus[$key1];
                    }
                    $pack_wise_product_data[] = $value;
                }
            } else {
                $pack_wise_product_data[] = $value;
            }
        }

        // loop over the rows, outputting them
        if (isset($pack_wise_product_data) && !empty($pack_wise_product_data)) {
            foreach ($pack_wise_product_data as $key => $row) {
                $cat_data = $this->model->getData('category', array('category_id' => $row['category_id']));
                $sub_cat_data = $this->model->getData('subcategory', array('sub_category_id' => $row['sub_category_id']));
                $unit_data = $this->model->getData('product_unit', array('unit_id' => $row['unit_id']));

                $stock_status_value = ($row['stock_status'] == '1') ? '1' : '2';

                $stock_status = ($row['stock_status'] == '1') ? 'IN STOCK' : 'OUT OF STOCK';
                $product_status = ($row['status'] == '1') ? 'ACTIVE' : 'DE-ACTIVATED';

                switch ($row['product_type']) {
                    case 'R':
                        $product_type = 'Raw Material';
                        break;
                    case 'F':
                        $product_type = 'Finished Goods';
                        break;
                    case 'S':
                        $product_type = 'Recipe Product';
                        break;
                    case 'B':
                        $product_type = 'Raw and Finished';
                        break;
                }
                echo $product_type;

                $prows = array(
                    ++$key,
                    $row['product_id'],
                    strtoupper($row['product_name']),
                    $row['product_type'],
                    $product_type,
                    $row['manufacturer_name'],
                    $row['brand_name'],
                    $row['vendor_name'],
                    $row['pack_size'],
                    $cat_data[0]['category_id'],
                    strtoupper($cat_data[0]['category_name']),
                    $sub_cat_data[0]['sub_category_id'],
                    strtoupper($sub_cat_data[0]['sub_category_name']),
                    $row['gst'],
                    // $row['cgst'],
                    $row['listed_in_super_deal'],
                    $row['unit_id'],
                    strtoupper($unit_data[0]['unit_name']),
                    // $row['mrp'],
                    $row['price'],
                    $row['barcode_no'],
                    $row['sku2'],
                    $row['stock_qty'],
                    $row['hsn_code'],
                    $row['status'],

                );
                fputcsv($output, $prows);
            }
        }
    }


    function upload_product_list()
    {
        error_reporting(0);
        $msg = '0';
        $file = (isset($_FILES['product_excel']['tmp_name']) && $_FILES['product_excel']['tmp_name'] != '') ? $_FILES['product_excel']['tmp_name'] : '';
        $arr_data = array();

        if (file_exists($file)) {
            //read file from path
            $objPHPExcel = PHPExcel_IOFactory::load($file);
            //get only the Cell Collection
            $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
            //extract to a PHP readable array format
            foreach ($cell_collection as $cell) {
                $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
                $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
                $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getCalculatedValue();
                //header will/should be in row 1 only. of course this can be modified to suit your need.
                if ($row > 1) {
                    $arr_data[$row][$column] = $data_value;
                }
            }
            //            echo '<pre>count11'; print_r($arr_data);

            if (isset($arr_data) && !empty($arr_data)) {

                $finalArrData = [];
                foreach ($arr_data as $arr_datapack) {
                    //                     echo '<pre>if'; print_r($arr_datapack);
                    if (!findKey($finalArrData, $arr_datapack['B'])) {
                        $finalArrData[$arr_datapack['B']] = $arr_datapack;
                        //                        echo '<pre>3';print_r($finalArrData[$arr_datapack['B']]);
                    } else {
                        $finalArrData[$arr_datapack['B']]['I'] =  $finalArrData[$arr_datapack['B']]['I'] . ',' . $arr_datapack['I'];
                        $finalArrData[$arr_datapack['B']]['R'] =  $finalArrData[$arr_datapack['B']]['R'] . ',' . $arr_datapack['R'];
                        $finalArrData[$arr_datapack['B']]['S'] =  $finalArrData[$arr_datapack['B']]['S'] . ',' . $arr_datapack['S'];
                        $finalArrData[$arr_datapack['B']]['T'] =  $finalArrData[$arr_datapack['B']]['I'] . ',' . $arr_datapack['T'];
                    }
                }
                $tempData = array();
                $arr_data = $finalArrData;
                foreach ($arr_data as $key => $value) {
                    if (!empty($value['B'])) {

                        $product_id = $value['B'];
                    } else {
                        $product_id = 0;
                    }
                    $isProductExist = $this->model->getData('product', array('product_id' => $product_id));

                    if (!empty($isProductExist)) {
                        $update_data = array(
                            'product_id' => $value['B'],
                            'product_name' => $value['C'],
                            'product_type' => (isset($value['D']) && $value['D'] != '') ? $value['D'] : '',
                            //                            'company_name'=>(isset($value['E']) && $value['E']!='') ? $value['E'] : '',
                            'manufacturer_name' => (isset($value['F']) && $value['F'] != '') ? $value['F'] : '',
                            'brand_name' => (isset($value['G']) && $value['G'] != '') ? $value['G'] : '',
                            'vendor_name' => (isset($value['H']) && $value['H'] != '') ? $value['H'] : '',
                            'pack_size' => (isset($value['I']) && $value['I'] != '') ? $value['I'] : $isProductExist[0]['pack_size'],
                            'category_id' => (isset($value['J']) && $value['J'] != '') ? $value['J'] : '0',
                            'sub_category_id' => (isset($value['L']) && $value['L'] != '') ? $value['L'] : '0',
                            'gst' => (isset($value['N']) && $value['N'] != '') ? $value['N'] : '',
                            'listed_in_super_deal' => (isset($value['O']) && $value['O'] != '') ? $value['O'] : '0',
                            'unit_id' => (isset($value['P']) && $value['P'] != '') ? $value['P'] : '',
                            'price' => (isset($value['R']) && $value['R'] != '') ? $value['R'] : '',
                            'vendor_sku' => (isset($value['S']) && $value['S'] != '') ? $value['S'] : '',
                            'sku2' => (isset($value['T']) && $value['T'] != '') ? $value['T'] : '',
                            'stock_qty' => (isset($value['U']) && $value['U'] != '') ? $value['U'] : '',
                            'hsn_code' => (isset($value['V']) && $value['V'] != '') ? $value['V'] : '',
                            'stock_status' => (isset($value['W']) && $value['W'] == '1') ? '1' : '0',
                        );
                        $this->model->updateData('product', $update_data, array('product_id' => $value['B']));
                    } else {
                        $insert_data = array(
                            'product_name' => $value['C'],
                            'product_type' => (isset($value['D']) && $value['D'] != '') ? $value['D'] : '',
                            //                            'company_name'=>(isset($value['E']) && $value['E']!='') ? $value['E'] : '',
                            'manufacturer_name' => (isset($value['F']) && $value['F'] != '') ? $value['F'] : '',
                            'brand_name' => (isset($value['G']) && $value['G'] != '') ? $value['G'] : '',
                            'vendor_name' => (isset($value['H']) && $value['H'] != '') ? $value['H'] : '',
                            'pack_size' => (isset($value['I']) && $value['I'] != '') ? $value['I'] : '',
                            'category_id' => (isset($value['J']) && $value['J'] != '') ? $value['J'] : '',
                            'sub_category_id' => (isset($value['L']) && $value['L'] != '') ? $value['L'] : '',
                            'gst' => (isset($value['N']) && $value['N'] != '') ? $value['N'] : '',
                            'listed_in_super_deal' => (isset($value['O']) && $value['O'] != '') ? $value['O'] : '',
                            'unit_id' => (isset($value['P']) && $value['P'] != '') ? $value['P'] : '',
                            'price' => (isset($value['R']) && $value['R'] != '') ? $value['R'] : '',
                            'vendor_sku' => (isset($value['S']) && $value['S'] != '') ? $value['S'] : '',
                            'sku2' => (isset($value['T']) && $value['T'] != '') ? $value['T'] : '',
                            'stock_qty' => (isset($value['U']) && $value['U'] != '') ? $value['U'] : '',
                            'hsn_code' => (isset($value['V']) && $value['V'] != '') ? $value['V'] : '',
                            'stock_status' => (isset($value['W']) && $value['W'] == '1') ? '1' : '0',
                        );
                        $this->model->insertData('product', $insert_data);
                    }
                }
            }
        }
        redirect(base_url() . 'product-list');
    }

    function findKey($array, $keySearch)
    {
        foreach ($array as $key => $item) {
            if ($key == $keySearch) {
                return 1;
            } else {
                if (isset($array[$key]))
                    findKey($array[$key], $keySearch);
            }
        }
        return 0;
    }

    function new_addon()
    {
        $access_data = array();
        $access = array();
        $access[] = 'new_addon';
        $access_data = $this->model->checkAccess($access);
        if (!$access_data['status']) {
            redirect('/');
        }
        $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("new_addon", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        $data['role_id'] = $this->session->userdata('user_role');
        $data['branch_list'] = $this->model->getData('branch');
        $data['franchise_list'] = $this->model->getData('franchise_setting');
        $data['categpry_list'] = $this->model->getData('category', array('status' => '1'));
        $this->model->partialView('admin/product/new_addon', $data);
    }

    function addon_list()
    {
        $access_data = array();
        $access = array();
        $access[] = 'addon_list';
        $access_data = $this->model->checkAccess($access);
        if (!$access_data['status']) {
            redirect('/');
        }
        $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("addon_list", $data['arr_perm'])) {          
        //             redirect('/');
        //        }

        $role_id = $this->session->userdata('user_role');
        $condition = array('role_id' => $role_id);
        $arr_perm = $this->model->getRecords('op_user_role', $fields = 'permission', $condition, $order_by = '', $limit = '', $debug = 0, $group_by = '');
        $data['arr_perm'] = unserialize($arr_perm[0]['permission']);
        $branch_id_session = $this->session->userdata('map_with_id');
        $map_with_session = $this->session->userdata('map_with');
        $role = $this->session->userdata('user_role');
        $requestData = $_REQUEST;
        if ($role == '1') {
            $sql = "select * from product where is_addon_product ='1'";
        } else {
            if ($map_with_session == 'B') {
                $sql = "select * from product where is_addon_product ='1' and find_in_set($branch_id_session,branch_ids)";
            } else {
                $sql = "select * from product where is_addon_product ='1' and find_in_set($branch_id_session,franchise_ids)";
            }
        }
        $data['addon_list'] = $this->model->getSqlData($sql);
        $this->model->partialView('admin/product/addon-list', $data);
    }

    function edit_addon($id)
    {
        $access_data = array();
        $access = array();
        $access[] = 'edit_addon';
        $access_data = $this->model->checkAccess($access);
        if (!$access_data['status']) {
            redirect('/');
        }
        $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("edit_addon", $data['arr_perm'])) {          
        //             redirect('/');
        //        }  
        $addon_id = base64_decode($id);
        $data['role_id'] = $this->session->userdata('user_role');
        $data['branch_list'] = $this->model->getData('branch');
        $data['franchise_list'] = $this->model->getData('franchise_setting');
        $data['categpry_list'] = $this->model->getData('category', array('status' => '1'));
        $data['arr_addon'] = $this->model->getData('product', array('product_id' => $addon_id));
        $this->model->partialView('admin/product/edit_addon', $data);
    }

    function update_addon()
    {
        $role = $this->session->userdata('user_role');
        if ($role == '1') {
            if (!empty($_POST['branch_ids'])) {
                $_POST['branch_ids'] = implode(',', $_POST['branch_ids']);
            } else {
                $_POST['branch_ids'] = '';
            }
            if (!empty($_POST['franchise_ids'])) {
                $_POST['franchise_ids'] = implode(',', $_POST['franchise_ids']);
            } else {
                $_POST['franchise_ids'] = '0';
            }
        } else {
        }
        $array_entity = $_POST;
        if (isset($array_entity) && !empty($array_entity)) {
            $addon_id = $array_entity['product_id'];
            $addon_name = $array_entity['product_name'];
            $uploaddir = './products/';
            if ($_FILES['image_name']['name'] != '') {
                $filename = basename($_FILES['image_name']['name']);
                $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $counter = 1;
                while (file_exists($uploaddir . $filename)) {
                    $filename = $rawBaseName . $counter . '.' . $extension;
                    $counter++;
                };
                $uploadfile = $uploaddir . $filename;

                if (move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadfile)) {
                    echo "File is valid, and was successfully uploaded.\n";
                    if ($array_entity['image_name'] != '') {
                        unlink($uploaddir . $array_entity['image_name']);
                    }
                    $array_entity['image_name'] = $filename;
                } else {
                    echo "Upload failed";
                }
            }

            $this->model->updateData('product', $array_entity, array('product_id' => $addon_id));
            $data['class'] = 'success';
            $data['msg'] = 'Addon has been updated successfully.';
        } else {
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid addon id.';
        }
        $this->session->set_flashdata($data);
        redirect(base_url() . 'listaddon');
    }

    function submit_addon()
    {
        $branch_id_session = $this->session->userdata('map_with_id');
        $map_with_session = $this->session->userdata('map_with');
        $role = $this->session->userdata('user_role');

        if ($role == '1') {
            if (!empty($_POST['branch_ids'])) {
                $_POST['branch_ids'] = implode(',', $_POST['branch_ids']);
            } else {
                $_POST['branch_ids'] = '';
            }
            if (!empty($_POST['franchise_ids'])) {
                $_POST['franchise_ids'] = implode(',', $_POST['franchise_ids']);
            } else {
                $_POST['franchise_ids'] = '0';
            }
        } else {
            if ($map_with_session == 'B') {
                $_POST['branch_ids'] = $branch_id_session;
            } else {
                $_POST['franchise_ids'] = $branch_id_session;
            }
        }

        $_POST['status'] = '1';
        $_POST['is_addon_product'] = '1';
        $_POST['pack_size'] = '1';
        $_POST['unit_id'] = '4';
        $_POST['listed_in_super_deal'] = '0';

        $product_array = $_POST;
        if (isset($_FILES['image_name']) && !empty($_FILES['image_name'])) {
            $uploaddir = './products/';
            $filename = basename($_FILES['image_name']['name']);
            $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $counter = 1;
            while (file_exists($uploaddir . $filename)) {
                $filename = $rawBaseName . $counter . '.' . $extension;
                $counter++;
            };
            $uploadfile = $uploaddir . $filename;

            if (move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadfile)) {
                echo "File is valid, and was successfully uploaded.\n";
                if (isset($product_array['image_name'])) {
                    if ($product_array['image_name'] != '') {
                        unlink($uploaddir . $product_array['image_name']);
                    }
                }

                $product_array['image_name'] = $filename;
            } else {
                echo "Upload failed";
                $product_array['image_name'] = "";
            }
        }
        //        echo '<pre>';print_R($product_array);die;
        $product_id = $this->model->insertData('product', $product_array);
        $this->session->set_flashdata('class', 'success');
        $this->session->set_flashdata('msg', 'The new product has been uploaded successfully.');
        redirect(base_url() . 'listaddon');
    }

    function delete_addon()
    {
        $access_data = array();
        $access = array();
        $access[] = 'delete_addon';
        $access_data = $this->model->checkAccess($access);
        if (!$access_data['status']) {
            redirect('/');
        }
        $data = $access_data['data'];
        //        $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("delete_addon", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        $addon_id = $_POST['id'];
        if ($addon_id) {
            $this->model->deleteData('product', array('product_id' => $addon_id));
            $arrToReturn = array('error' => 0, 'message' => "Addon deleted successfully.");
        } else {
            $arrToReturn = array('error' => 1, 'message' => "Not Deleted.");
        }
        echo json_encode($arrToReturn);
    }

    function delete_instruction()
    {
        $access_data = array();
        $access = array();
        $access[] = 'delete_instruction';
        $access_data = $this->model->checkAccess($access);
        if (!$access_data['status']) {
            redirect('/');
        }
        $data = $access_data['data'];
        //         $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("delete_instruction", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        $ins_id = $_POST['ins_id'];
        if ($ins_id) {
            $this->model->deleteData('instructions', array('ins_id' => $ins_id));
            $arrToReturn = array('error' => 0, 'message' => "Instruction deleted successfully.");
        } else {
            $arrToReturn = array('error' => 1, 'message' => "Not Deleted.");
        }
        echo json_encode($arrToReturn);
    }

    function new_instruction()
    {
        $access_data = array();
        $access = array();
        $access[] = 'new_instruction';
        $access_data = $this->model->checkAccess($access);
        if (!$access_data['status']) {
            redirect('/');
        }
        $data = $access_data['data'];
        //         $role_id = $this->session->userdata('user_role');        
        //        $condition = array('role_id'=>$role_id);
        //        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');      
        //        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        //        if (!in_array("new_instruction", $data['arr_perm'])) {          
        //             redirect('/');
        //        }
        $data['instruction_list'] = $this->model->getData("instructions");
        $this->model->partialView('admin/product/add-instruction', $data);
    }


    function save_instruction()
    {
        $_POST['status'] = '1';
        $product_array = $_POST;
        $product_id = $this->model->insertData('instructions', $product_array);
        $this->session->set_flashdata('class', 'success');
        $this->session->set_flashdata('msg', 'The new instructions has added successfully.');
        redirect(base_url() . 'add-instruction');
    }

    function edit_instruction($id)
    {
        $role_id = $this->session->userdata('user_role');
        $condition = array('role_id' => $role_id);
        $data['arr_role'] = $this->model->getRecords('op_user_role', $fields = '*', $condition, $order_by = 'role_id ASC', $limit = '', $debug = 0, $group_by = '');
        $data['arr_perm'] = unserialize($data['arr_role'][0]['permission']);
        if (!in_array("edit_instruction", $data['arr_perm'])) {
            redirect('/');
        }
        $addon_id = base64_decode($id);
        $data['arr_instructions'] = $this->model->getData('instructions', array('ins_id' => $addon_id));
        $this->model->partialView('admin/product/edit_instruction', $data);
    }

    function update_instruction()
    {
        $array_entity = $_POST;
        if (isset($array_entity) && !empty($array_entity)) {
            $ins_id = $array_entity['ins_id'];
            $ins_text = $array_entity['ins_text'];
            $uploaddir = './products/';
            if ($_FILES['image_name']['name'] != '') {
                $filename = basename($_FILES['image_name']['name']);
                $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                $counter = 1;
                while (file_exists($uploaddir . $filename)) {
                    $filename = $rawBaseName . $counter . '.' . $extension;
                    $counter++;
                };
                $uploadfile = $uploaddir . $filename;

                if (move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadfile)) {
                    echo "File is valid, and was successfully uploaded.\n";
                    if ($array_entity['image_name'] != '') {
                        unlink($uploaddir . $array_entity['image_name']);
                    }
                    $array_entity['image_name'] = $filename;
                } else {
                    echo "Upload failed";
                }
            }

            $this->model->updateData('instructions', $array_entity, array('ins_id' => $ins_id));
            $data['class'] = 'success';
            $data['msg'] = 'Instruction has been updated successfully.';
        } else {
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid addon id.';
        }
        $this->session->set_flashdata($data);
        redirect(base_url() . 'add-instruction');
    }

    function update_product_active_deactive_status()
    {
        $jsonObj = $_POST['jsonObj'];
        $array_data = json_decode($jsonObj, true);
        $array_entity = $array_data['product'];

        if (isset($array_entity) && !empty($array_entity)) {
            $product_id = $array_entity['product_id'];
            $status = $array_entity['status'];

            $this->model->updateData('product', array('status' => $status), array('product_id' => $product_id));

            $data['status'] = '1';
            $data['msg'] = 'Service status has been updated';
        } else {
            $data['status'] = '0';
            $data['msg'] = 'Fail to update service';
        }
        echo json_encode($data);
    }

    function update_product_status()
    {
        $jsonObj = $_POST['jsonObj'];
        $array_data = json_decode($jsonObj, true);
        $array_entity = $array_data['product'];

        if (isset($array_entity) && !empty($array_entity)) {
            $product_id = $array_entity['product_id'];
            $stock_status = $array_entity['stock_status'];

            $this->model->updateData('product', array('stock_status' => $stock_status), array('product_id' => $product_id));

            $data['status'] = '1';
            $data['msg'] = 'Product stock status has been updated';
        } else {
            $data['status'] = '0';
            $data['msg'] = 'Your session has been expired';
        }
        echo json_encode($data);
    }
    function save_ajax_hsn()
    {
        //  $branch_id_session = $this->session->userdata('map_with_id');
        // $data['store_id'] = $branch_id_session;
        $data['hsn_code'] = $this->input->post('hsn_code');
        $data['sgst'] = $this->input->post('sgst');
        $data['cgst'] = $this->input->post('cgst');
        $data['igst'] = $this->input->post('igst');
        $res = $this->model->getData('gst_setting', array('hsn_code' => $data['hsn_code']));
        if (!empty($res)) {
            $msg['msg'] = 'HSN code already exist.';
            echo json_encode($msg);
            return false;
        }
        $id = $this->model->insertData('gst_setting', $data);
        if ($id) {

            $msg['msg'] = 'HSN code add successfully.';
        } else {

            $msg['msg'] = 'HSN code not add.';
        }
        echo json_encode($msg);
    }

    function save_ajax_unit()
    {
        $branch_id_session = $this->session->userdata('map_with_id');
        $data = $this->input->post();
        // $data['store_id'] = $branch_id_session;
        $res = $this->model->getData('product_unit', array('unit_name' => $data['unit_name']));
        if (!empty($res)) {
            $msg['msg'] = 'Unit already exist.';
            echo json_encode($msg);
            return false;
        }
        $id = $this->model->insertData('product_unit ', $data);
        if ($id) {

            $msg['msg'] = 'Unit add successfully.';
        } else {

            $msg['msg'] = 'Unit not add.';
        }
        echo json_encode($msg);
    }

    function save_ajax_addon_mp_old()
    {
        $data = $this->input->post();
        $id = $this->model->insertData('addon', $data);
        if ($id) {

            $data['msg'] = 'Addon add successfully.';
        } else {

            $data['msg'] = 'Addon not add.';
        }
        echo json_encode($data);
    }

    function save_ajax_addon_mp()
    {
        $branch_id_session = $this->session->userdata('map_with_id');
        $map_with_session = $this->session->userdata('map_with');
        $role = $this->session->userdata('user_role');
        $_POST['status'] = '1';
        $_POST['is_addon_product'] = '1';
        $_POST['pack_size'] = '1';
        $_POST['unit_id'] = '4';
        $_POST['listed_in_super_deal'] = '0';
        $res = $this->model->getData('product', array('product_name' => $_POST['product_name'], 'is_addon_product' => '1'));

        if (!empty($res)) {
            $msg['msg'] = 'Addon data already exist.';
            echo json_encode($msg);
            return false;
        }
        $product_array = $_POST;
        if (isset($_FILES['image_name']) && !empty($_FILES['image_name'])) {
            $uploaddir = './products/';
            $filename = basename($_FILES['image_name']['name']);
            $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $counter = 1;
            while (file_exists($uploaddir . $filename)) {
                $filename = $rawBaseName . $counter . '.' . $extension;
                $counter++;
            };
            $uploadfile = $uploaddir . $filename;

            if (move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadfile)) {

                if (isset($product_array['image_name'])) {
                    if ($product_array['image_name'] != '') {
                        unlink($uploaddir . $product_array['image_name']);
                    }
                }

                $product_array['image_name'] = $filename;
            } else {

                $product_array['image_name'] = "";
            }
        }
        $product_array['franchise_ids'] = $branch_id_session;
        $product_id = $this->model->insertData('product', $product_array);
        if (!empty($product_id)) {
            $msg['msg'] = 'The new product has been uploaded successfully.';
            echo json_encode($msg);
        }
    }
    function getCategoryList()
    {
        // $branch_id_session = $this->session->userdata('map_with_id');
        $categpry_list = $this->model->getData('category'); ?>
        <option value="" selected="selected" disabled="disabled">Select Category</option>
        <?php

        foreach ($categpry_list as $k => $value) { ?>

            <option value="<?php echo $value['category_id']; ?>"> <?php echo $value['category_name']; ?></option>
            <!-- <option value="<?php echo $v; ?>" data-value="<?php echo $price[$k]; ?>"><?php echo $v; ?></option> -->

        <?php }
    }
    function getHsnList()
    {
        $branch_id_session = $this->session->userdata('map_with_id');
        $hsn_code_list = $this->model->getData('gst_setting'); ?>
        <option value="" selected="selected" disabled="disabled">Select HSN/SAC Code</option>
        <?php

        foreach ($hsn_code_list as $k => $value) { ?>

            <option value="<?php echo $value['hsn_code'] ?>"><?php echo $value['hsn_code'] ?></option>
            <!-- <option value="<?php echo $v; ?>" data-value="<?php echo $price[$k]; ?>"><?php echo $v; ?></option> -->

        <?php }
    }
    function getUnitList()
    {
        $branch_id_session = $this->session->userdata('map_with_id');
        $unit_list = $this->model->getData('product_unit'); ?>
        <option value="" selected="selected" disabled="disabled">Select Unit</option>
        <?php
        foreach ($unit_list as $k => $value) { ?>
            <option value="<?php echo $value['unit_id']; ?>"> <?php echo $value['unit_name']; ?></option>
        <?php }
    }

    function save_ajax_mp_inst()
    {
        $branch_id_session = $this->session->userdata('map_with_id');
        $data = $this->input->post();
        $data['store_id'] = $branch_id_session;
        $res = $this->model->getData('instructions', array('is_addon_product' => $data['ins_text']));
        if (!empty($res)) {
            $data['msg'] = 'Instructions already exist.';
        }

        $id = $this->model->insertData('instructions', $data);
        if ($id) {

            $data['msg'] = 'Instructions add successfully.';
        } else {

            $data['msg'] = 'Instructions not add.';
        }
        echo json_encode($data);
    }
    /*------------------------get category-----------------------*/
    function ajax_category()
    {
        $name = $this->input->post('request');
        $res = $this->db->select('*')->from('category')->where("category_name LIKE '%$name%'")->get()->result_array();
        // echo $this->db->last_query(); die;
        $arr = array();
        foreach ($res as $key => $value) {
            //$arr[]=$value->name;
            $arr[] = array(
                'cat_name' => $value['category_name'],
                'cat_id' => $value['category_id']
            );
        }
        echo json_encode($arr);
    }

    /*------------------------get HSN Code-----------------------*/
    function ajax_hsn_codes()
    {
        $name = $this->input->post('request');
        $res = $this->db->select('*')->from('gst_setting')->where("hsn_code LIKE '%$name%'")->get()->result_array();
        //echo $this->db->last_query(); die;
        $arr = array();
        foreach ($res as $key => $value) {
            //$arr[]=$value->name;
            $arr[] = array(
                'hsn_id' => $value['gst_set_id'],
                'hsn_code' => $value['hsn_code']
            );
        }
        echo json_encode($arr);
    }

    /*------------------------get Unit-----------------------*/
    function ajax_unit()
    {
        $name = $this->input->post('request');
        $res = $this->db->select('*')->from('product_unit')->where("unit_name LIKE '%$name%'")->get()->result_array();
        // echo $this->db->last_query(); die;
        $arr = array();
        foreach ($res as $key => $value) {
            //$arr[]=$value->name;
            $arr[] = array(
                'unit_id' => $value['unit_id'],
                'unit_name' => $value['unit_name']
            );
        }
        echo json_encode($arr);
    }
    function getEditCategoryList()
    {
        $product_id = $_POST['product_id'];
        $product_data = $this->model->getData('product', array('product_id' => $product_id));
        $branch_id_session = $this->session->userdata('map_with_id');
        $categpry_list = $this->model->getData('category', array('status' => '1'));
        ?>
        <option value="" selected="selected" disabled="disabled">Select Category</option>
        <?php

        foreach ($categpry_list as $key => $value) { ?>
            <option value="<?php echo $value['category_id']; ?>" <?php if ($product_data[0]['category_id'] == $value['category_id']) {
                                                                        echo 'selected';
                                                                    } ?>> <?php echo $value['category_name']; ?></option>


        <?php }
    }
    function getEditSubCategoryList()
    {
        // echo "<pre>";print_r($_POST);die;
        $product_id = $_POST['product_id'];
        $product_data = $this->model->getData('product', array('product_id' => $product_id));
        $branch_id_session = $this->session->userdata('map_with_id');
        $categpry_list = $this->model->getData('subcategory', array('status' => '1'));
        ?>
        <option value="" selected="selected" disabled="disabled">Select Sub Category</option>
        <?php

        foreach ($categpry_list as $key => $value) { ?>
            <option value="<?php echo $value['sub_category_id']; ?>" <?php if ($product_data[0]['sub_category_id'] == $value['sub_category_id']) {
                                                                            echo 'selected';
                                                                        } ?>> <?php echo $value['sub_category_name']; ?></option>


        <?php }
    }
    function getEditChildCategoryList()
    {
        // echo "<pre>";print_r($_POST);die;
        $product_id = $_POST['product_id'];
        $product_data = $this->model->getData('product', array('product_id' => $product_id));
        $branch_id_session = $this->session->userdata('map_with_id');
        $categpry_list = $this->model->getData('childcategory', array('status' => '1'));
        ?>
        <option value="" selected="selected" disabled="disabled">Select Child Category</option>
        <?php

        foreach ($categpry_list as $key => $value) { ?>
            <option value="<?php echo $value['child_category_id']; ?>" <?php if ($product_data[0]['child_category_id'] == $value['child_category_id']) {
                                                                            echo 'selected';
                                                                        } ?>> <?php echo $value['child_category_name']; ?></option>


        <?php }
    }

    function getEditHsnList()
    {
        $product_id = $_POST['product_id'];
        $product_data = $this->model->getData('product', array('product_id' => $product_id));
        $branch_id_session = $this->session->userdata('map_with_id');
        $hsn_code_list = $this->model->getData('gst_setting'); ?>
        ?>
        <option value="" selected="selected" disabled="disabled">Select HSN code</option>
        <?php

        foreach ($hsn_code_list as $key => $value) { ?>
            <option value="<?php echo $value['hsn_code']; ?>" <?php if ($product_data[0]['hsn_code'] == $value['hsn_code']) {
                                                                    echo 'selected';
                                                                } ?>> <?php echo $value['hsn_code']; ?></option>

        <?php }
    }
    function getEditUnitList()
    {
        $product_id = $_POST['product_id'];
        $product_data = $this->model->getData('product', array('product_id' => $product_id));
        $branch_id_session = $this->session->userdata('map_with_id');
        $unit_list = $this->model->getData('product_unit');
        ?>
        <option value="" selected="selected" disabled="disabled">Select Unit</option>
        <?php

        foreach ($unit_list as $key => $value) { ?>
            <option value="<?php echo $value['unit_id']; ?>" <?php if ($product_data[0]['unit_id'] == $value['unit_id']) {
                                                                    echo "selected";
                                                                } ?>> <?php echo $value['unit_name']; ?></option>


<?php }
    }
    function addTypeOfItem()
    {
        $data['item_type_list'] = $this->model->getData('item_type');

        $data['item_type_list'] = $this->model->getSqlData('SELECT * FROM item_type ORDER BY added_on DESC');

        $pagename = "add item";
        $this->model->partialView('admin/product/add_type_of_item', $data, $pagename);
    }
    function submitItemType()
    {
        // $_POST['status'] = '1';
        $product_array = $_POST;
        $product_id = $this->model->insertData('item_type', $product_array);
        // echo $this->db->last_query();die;
        $this->session->set_flashdata('class', 'success');
        $this->session->set_flashdata('msg', 'The new item type has added successfully.');
        redirect(base_url() . 'add-item-type');
    }
    function editItemType($id)
    {
        $item_type_id = base64_decode($id);
        $data['item_type_data'] = $this->model->getData('item_type', array('item_type_id' => $item_type_id));
        // echo "<pre>";print_r($data);die;
        $pagename = "edit item";
        $this->model->partialView('admin/product/edit_item_type', $data, $pagename);
    }
    function delete_item_type($item_type_id)
    {
        $item_type_id = $item_type_id;
        if ($item_type_id) {
            $this->model->deleteData('item_type', array('item_type_id' => $item_type_id));
            $this->session->set_flashdata('class', 'success');
            $this->session->set_flashdata('msg', 'Service type deleted successfully.');
            redirect('add-item-type');
        } else {

            $this->session->set_flashdata('class', 'success');
            $this->session->set_flashdata('msg', 'Not Deleted..');
            redirect('add-item-type');
        }
    }
    function updateItemType()
    {
        $array_entity = $_POST;
        // echo "<pre>";print_r($_POST);die;
        if (isset($array_entity) && !empty($array_entity)) {
            $item_type_id = $array_entity['item_type_id'];
            $item_type_name = $array_entity['item_type_name'];

            $this->model->updateData('item_type', $array_entity, array('item_type_id' => $item_type_id));
            $data['class'] = 'success';
            $data['msg'] = 'Item type has been updated successfully.';
        } else {
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid addon id.';
        }
        $this->session->set_flashdata($data);
        redirect(base_url() . 'add-item-type');
    }
    function addItemCategory()
    {
        //$data['item_category_list'] = $this->model->getData('item_category');
        $data['item_category_list'] = $this->model->getSqlData('SELECT * FROM item_category ORDER BY added_on DESC');

        $pagename = "service type category";
        $this->model->partialView('admin/product/add_item_category', $data, $pagename);
    }
    function submitItemCategory()
    {
        $product_array = $_POST;
        $product_id = $this->model->insertData('item_category', $product_array);
        // echo $this->db->last_query();die;
        $this->session->set_flashdata('class', 'success');
        $this->session->set_flashdata('msg', 'The new service category has added successfully.');
        redirect(base_url() . 'add-item-category');
    }
    function editItemCategory($id)
    {
        $item_category_id = base64_decode($id);
        $data['item_category_data'] = $this->model->getData('item_category', array('item_category_id' => $item_category_id));
        // echo "<pre>";print_r($data);die;
        $pagename = "edit service category";
        $this->model->partialView('admin/product/edit_item_category', $data, $pagename);
    }
    function updateItemCategory()
    {
        $array_entity = $_POST;
        // echo "<pre>";print_r($_POST);die;
        if (isset($array_entity) && !empty($array_entity)) {
            $item_category_id = $array_entity['item_category_id'];
            $item_category_name = $array_entity['item_category_name'];

            $this->model->updateData('item_category', $array_entity, array('item_category_id' => $item_category_id));
            $data['class'] = 'success';
            $data['msg'] = 'Service category has been updated successfully.';
        } else {
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid addon id.';
        }
        $this->session->set_flashdata($data);
        redirect(base_url() . 'add-item-category');
    }
    function delete_item_category($item_category_id)
    {
        $item_category_id = $item_category_id;
        if ($item_category_id) {
            $this->model->deleteData('item_category', array('item_category_id' => $item_category_id));
            $this->session->set_flashdata('class', 'success');
            $this->session->set_flashdata('msg', 'Service category deleted successfully.');
            redirect('add-item-category');
        } else {

            $this->session->set_flashdata('class', 'success');
            $this->session->set_flashdata('msg', 'Not Deleted..');
            redirect('add-item-category');
        }
    }
    function service_request_list()
    {
        $data['product_list1'] = $this->model->getData('service_request');



        if (!empty($data['product_list1'])) {
            foreach ($data['product_list1'] as $key => $value) {
                $res_assu = $this->model->getSqlData("select product_id,product_name,image_name,pack_size,price_range from product where product_id='" . $value['service_id'] . "'");

                if (!empty($res_assu)) {

                    $data['product_list1'][$key]['product_id'] = $res_assu[0]['product_id'];
                    $data['product_list1'][$key]['product_name'] = $res_assu[0]['product_name'];
                    $data['product_list1'][$key]['image_name'] = $res_assu[0]['image_name'];
                    $data['product_list1'][$key]['pack_size'] = $res_assu[0]['pack_size'];
                    $data['product_list1'][$key]['price_range'] = $res_assu[0]['price_range'];
                } else {
                    $data['product_list1'][$key]['product_id'] = '';
                    $data['product_list1'][$key]['product_name'] = '';
                    $data['product_list1'][$key]['image_name'] = '';
                    $data['product_list1'][$key]['pack_size'] = '';
                    $data['product_list1'][$key]['price_range'] = '';
                }

                $res_s = $this->model->getSqlData("select subject_name from request_subject where re_id='" . $value['subject'] . "'");

                if (!empty($res_s)) {

                    $data['product_list1'][$key]['subject'] = $res_s[0]['subject_name'];
                } else {
                    $data['product_list1'][$key]['subject'] = '';
                }
            }
        }
        $pagename = "Service Request List";

        // print_r($data['product_list1']); die;      
        $this->model->partialView('admin/product/service_request_list', $data, $pagename);
    }


    function update_service_req_status()
    {
        $jsonObj = $_POST['jsonObj'];
        $array_data = json_decode($jsonObj, true);
        $array_entity = $array_data['service'];

        if (isset($array_entity) && !empty($array_entity)) {
            $sr_id = $array_entity['sr_id'];
            $status = $array_entity['status'];

            $this->model->updateData('service_request', array('status' => $status), array('sr_id' => $sr_id));

            $data['status'] = '1';
            $data['msg'] = 'Service request status has been updated';
        } else {
            $data['status'] = '0';
            $data['msg'] = 'Fail to update service request';
        }
        echo json_encode($data);
    }

    function update_itemCategory_active_deactive_status()
    {
        $jsonObj = $_POST['jsonObj'];
        $array_data = json_decode($jsonObj, true);
        $array_entity = $array_data['service'];

        if (isset($array_entity) && !empty($array_entity)) {
            $item_category_id = $array_entity['item_category_id'];
            $status = $array_entity['status'];

            $this->model->updateData('item_category', array('status' => $status), array('item_category_id' => $item_category_id));

            $data['status'] = '1';
            $data['msg'] = 'Service category status has been updated';
        } else {
            $data['status'] = '0';
            $data['msg'] = 'Fail to update product';
        }
        echo json_encode($data);
    }



    //ALTER TABLE `customer_classing` ADD `class_1` FLOAT(10,2) NULL DEFAULT '0' AFTER `customer_classing_name`;
    //-------------------------------------------------------------------------------------------------------------
}
