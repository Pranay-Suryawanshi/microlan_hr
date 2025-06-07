<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Counter_Model extends CI_Model {
    
    public function getCartTotal($session_id) {
        $this->db->select('SUM(unit_total) as total,SUM(sgst) as sgst,SUM(cgst) as cgst,SUM(igst) as igst,SUM(subtotal) as subtotal,SUM(rowtotal) as rowtotal');
        $this->db->from('cart');
        $this->db->where('session_id',$session_id);
        $query = $this->db->get();
        return $query->result_array();
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
    
    public function getEditCartTotal($order_number) {
        $this->db->select('SUM(unit_total) as total,SUM(sgst) as sgst,SUM(cgst) as cgst,SUM(igst) as igst,SUM(subtotal) as subtotal,SUM(rowtotal) as rowtotal');
        $this->db->from('cart');
        $this->db->where('order_number',$order_number);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getEditOrderTotal($order_number) {
        $this->db->select('SUM(unit_total) as total,SUM(sgst) as sgst,SUM(cgst) as cgst,SUM(igst) as igst,SUM(subtotal) as subtotal,SUM(rowtotal) as rowtotal');
        $this->db->from('order_data_details');
        $this->db->where('order_number',$order_number);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function updateInventoty($op_user_id,$order_app_type,$product_id,$pack_size,$qty,$map_with_session,$branch_id_session){
        $product_type = $this->model->getValue('product','product_type',array('product_id'=>$product_id));
        if($product_type =='S'){
            $recipeproduct=$this->model->getValue('recipe','recipe_id',array('product_id'=>$product_id));
            if(!empty($recipeproduct)){
                $recipePro = $this->model->getData('recipe_products',array('recipe_id'=>$recipeproduct,'ingredient_flag'=>'0'));
                foreach($recipePro as $producs){
                    if($map_with_session == 'F'){
                        $cur_stock = $this->model->getValue('franchise_stock','stock_qty',array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'franchise_id'=>$branch_id_session));
                         if(!empty($cur_stock)){
                            $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                             $totalQty = $qty * $producs['quantity'];
                            if(!empty($cur_stock)){
                                 $stock_qty = $cur_stock - $totalQty;
                            }else{
                                $stock_qty = 0 - $qty;
                            }
                            $this->model->updateData('franchise_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'franchise_id'=>$branch_id_session));
                            $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$producs['product_id'],$producs['pack_size'],$stock_qty,$map_with_session,$branch_id_session);
                            
                            }
                    }else{
                        $cur_stock=$this->model->getValue('branch_stock','stock_qty',array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'branch_id'=>$branch_id_session));
                        if(!empty($cur_stock)){    
                        $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                             $totalQty = $qty * $producs['quantity'];
                            if(!empty($cur_stock)){
                                 $stock_qty = $cur_stock - $totalQty;
                            }else{
                                $stock_qty = 0 - $qty;
                            }
                            $this->model->updateData('branch_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'branch_id'=>$branch_id_session));
                        $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$qty,$map_credit_type='1',$producs['product_id'],$producs['pack_size'],$stock_qty,$map_with_session,$branch_id_session);
                            }
                    }
                }
            }
        }else{
             if($map_with_session == 'F'){                
                $cur_stock=$this->model->getValue('franchise_stock','stock_qty',array('product_id'=>$product_id,'pack_size'=>$pack_size,'franchise_id'=>$branch_id_session));
                 if(!empty($cur_stock)){   
                    $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                            if(!empty($cur_stock)){
                                 $stock_qty = $cur_stock - $qty;
                            }else{
                                $stock_qty = 0 - $qty;
                            }
                    $this->model->updateData('franchise_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$product_id,'pack_size'=>$pack_size,'franchise_id'=>$branch_id_session));
                 $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$product_id,$pack_size,$stock_qty,$map_with_session,$branch_id_session);
                    
                            }
            }else{
             $cur_stock=$this->model->getValue('branch_stock','stock_qty',array('product_id'=>$product_id,'pack_size'=>$pack_size,'branch_id'=>$branch_id_session));
                 if(!empty($cur_stock)){ 
                    $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                        if(!empty($cur_stock)){
                             $stock_qty = $cur_stock - $qty;
                        }else{
                            $stock_qty = 0 - $qty;
                        }
                $this->model->updateData('branch_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$product_id,'pack_size'=>$pack_size,'branch_id'=>$branch_id_session)); 
                $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$product_id,$pack_size,$stock_qty,$map_with_session,$branch_id_session);
                 }
            }
        }
    }
    
    function updateAppGoodsInventoty($op_user_id,$order_app_type,$product_id,$pack_size,$qty,$map_with_session,$branch_id_session){
        $product_type = $this->model->getValue('product','product_type',array('product_id'=>$product_id));
             if($map_with_session == 'F'){                
                $cur_stock=$this->model->getValue('franchise_stock','stock_qty',array('product_id'=>$product_id,'pack_size'=>$pack_size,'franchise_id'=>$branch_id_session));
                 if(!empty($cur_stock)){    
                    $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                            if(!empty($cur_stock)){
                                 $stock_qty = $cur_stock + $qty;
                            }else{
                                $stock_qty = 0 + $qty;
                            }
                    $this->model->updateData('franchise_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$product_id,'pack_size'=>$pack_size,'franchise_id'=>$branch_id_session));
                    $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$product_id,$pack_size,$stock_qty,$map_with_session,$branch_id_session);
                 }
            }else{
             $cur_stock=$this->model->getValue('branch_stock','stock_qty',array('product_id'=>$product_id,'pack_size'=>$pack_size,'branch_id'=>$branch_id_session));
                 if(!empty($cur_stock)){ 
                    $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                        if(!empty($cur_stock)){
                             $stock_qty = $cur_stock + $qty;
                        }else{
                            $stock_qty = 0 + $qty;
                        }
                $this->model->updateData('branch_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$product_id,'pack_size'=>$pack_size,'branch_id'=>$branch_id_session));   
                $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$product_id,$pack_size,$stock_qty,$map_with_session,$branch_id_session);
                 }
            }
    }
    
    function updateAppRecipeInventoty($op_user_id,$order_app_type,$product_id,$pack_size,$qty,$map_with_session,$branch_id_session){
        $product_type = $this->model->getValue('product','product_type',array('product_id'=>$product_id));
        if($product_type =='S'){
            $recipeproduct=$this->model->getValue('recipe','recipe_id',array('product_id'=>$product_id));
            if(!empty($recipeproduct)){
                $recipePro = $this->model->getData('recipe_products',array('recipe_id'=>$recipeproduct,'ingredient_flag'=>'0'));
                foreach($recipePro as $producs){
                    if($map_with_session == 'F'){
                        $cur_stock = $this->model->getValue('franchise_stock','stock_qty',array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'franchise_id'=>$branch_id_session));
                         if(!empty($cur_stock)){
                            $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                             $totalQty = $qty * $producs['quantity'];
                            if(!empty($cur_stock)){
                                 $stock_qty = $cur_stock + $totalQty;
                            }else{
                                $stock_qty = 0 + $qty;
                            }
                            $this->model->updateData('franchise_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'franchise_id'=>$branch_id_session));
                            $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$producs['product_id'],$producs['pack_size'],$stock_qty,$map_with_session,$branch_id_session);
                         }
                    }else{
                        $cur_stock=$this->model->getValue('branch_stock','stock_qty',array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'branch_id'=>$branch_id_session));
                        if(!empty($cur_stock)){    
                        $cur_stock = isset($cur_stock) ? $cur_stock : '0';
                             $totalQty = $qty * $producs['quantity'];
                            if(!empty($cur_stock)){
                                 $stock_qty = $cur_stock + $totalQty;
                            }else{
                                $stock_qty = 0 + $qty;
                            }
                            $this->model->updateData('branch_stock',array('stock_qty'=>$stock_qty),array('product_id'=>$producs['product_id'],'pack_size'=>$producs['pack_size'],'branch_id'=>$branch_id_session));
                            $this->updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$producs['product_id'],$producs['pack_size'],$stock_qty,$map_with_session,$branch_id_session);
                        }
                    }
                }
            }
        }
    }
    
//    function updatehistoryInventoty($product_id,$pack_size,$qty,$map_with_session,$branch_id_session,$type,$insert_id){
    function updatehistoryInventoty($op_user_id,$order_app_type,$credit_debit='1',$map_credit_type='1',$qty,$product_id,$pack_size,$stock_qty,$map_with_session,$branch_id_session){
         date_default_timezone_set('Asia/Kolkata');
        $product_type = $this->model->getValue('product','product_type',array('product_id'=>$product_id));
             if($qty){ 
//                $marcos_series1 = $this->model->getSqlData("select max(marcos_invoice) as marcos_invoice from inventory_history where `seller_id`='".$product_id."'");
//                $marcos_series = isset($marcos_series1[0]['marcos_invoice']) ? $marcos_series1[0]['marcos_invoice'] : '1';
//                $cur_stock=$this->model->getValue('inventory_history','stock_qty',array('product_id'=>$product_id,'pack_size'=>$pack_size,'franchise_id'=>$branch_id_session));
//                 if(!empty($cur_stock)){    
//                    $cur_stock = isset($cur_stock) ? $cur_stock : '0';
////                            if(!empty($cur_stock == '0')){
////                                 $stock_qty = $cur_stock + $qty;
////                            }else{
////                                $stock_qty = 0 + $qty;
//                            }
                            $insert_data = array(
                                'order_row_id'=>'1',
                                'map_credit_type'=>$map_credit_type, // Order or purchase
                                'product_id'=>$product_id,
                                'pack_size'=>$pack_size,
                                'qty'=>$qty,
                                'current_balance'=>$stock_qty,
                                'last_balance'=>'0',
                                'trans_type'=>$credit_debit, //Debit
                                'updated_by'=>$op_user_id,
                                'map_with'=>$map_with_session,
                                'branch_id'=>$branch_id_session,
                                'order_app_type'=>$order_app_type,
                                'updated_at'=>date('Y-m-d H:i:s'),
                                
                            );
                            
                            $this->model->insertData('inventory_history',$insert_data);
                }
    }
    function getItemTypeData($ids){
        $this->db->select("*");
        $this->db->from('item_type');
        $this->db->where_in('item_type_id', $ids,FALSE);
        // $this->db->get('item_type');
         $query = $this->db->get();
        return $query->result_array();
    }
    function getItemCategoryData($ids){
        $this->db->select("*");
        $this->db->from('item_category');
        $this->db->where_in('item_category_id', $ids,FALSE);
        // $this->db->get('item_type');
         $query = $this->db->get();
        return $query->result_array();
    }
    
    //End Of COntroller
    
}