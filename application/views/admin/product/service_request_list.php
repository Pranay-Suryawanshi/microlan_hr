 <!--sidebar-wrapper--> <?php include_once('header.php') ?> <style>
   .checked {
     color: orange;
   }

    
 </style>
 <!--end header-->
 <!--page-wrapper-->
 <div class="page-wrapper">
   <!--page-content-wrapper-->
   <div class="page-content-wrapper">
     <div class="page-content">
       <!--breadcrumb-->
       <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Service Request List</div>
         <div class="ps-3"> 
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Service Request List</li>
             </ol> 
           </nav>
         </div>
         
       </div>
       <!--end breadcrumb-->
       
       <div class="card">
         <div class="card-body">
         <?php if($this->session->flashdata('msg')) {?>
            <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php echo $this->session->flashdata('msg'); ?></div>
            <?php }?>
           <div class="row">
             <div class="col-sm-12">
               <h5 class="font-weight-bold">Service Request List</h5>
             </div>
             <hr>
             <div class="col-sm-12">
               <div class="table-responsive">
                   <table id="example2" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                     <tr> 
                         <th>Action</th>
                         <th>Sr No.</th> 
                        <th>Customer Name</th>
                        <th>Society Name</th>
                        <th>Subject</th>
                        <th>Details</th>
                        <th>Created Date</th> 
                     </tr>
                   </thead>
                   <tbody>
                   <?php if(!empty($product_list1)){
                    foreach ($product_list1 as $k=> $product) { 
                      //echo '<pre>';print_r($product); die;
                        ?>
                        <tr>
                        <td>
                            <select class="form-control" id="status<?php echo $product['sr_id'];?>" onchange='update_service_status("<?php echo $product['sr_id'];?>")'>
                                 <option value="3"  <?php if($product['status'] =='3'){ echo ""; }?>></option>
                                <option value="0"  <?php if($product['status'] =='0'){ echo "selected=''"; }?>>Pending</option>
                                 <option value="1"  <?php if($product['status'] =='1'){  echo "selected=''"; }?>>Accepted</option>
                                  <option value="2"  <?php if($product['status'] =='2'){  echo "selected=''"; }?>>Rejected</option>
                                  
                            </select>
                               
                            </td>
                            <td><?php echo $k+1; ?></td>                            
                          
                            <td><?php echo $product['user_name']; ?></td>
                            <td><?php echo $product['society_name']; ?></td>
                            <td><?php echo $product['subject']; ?></td>
                            <td><?php echo $product['details']; ?></td>
                            <td><?php echo $product['created_date']; ?></td>
                            
                       
                                                       
                        </tr> 
                    <?php } } ?>
                   </tbody>
                   <tfoot>
                     <tr>
                        <th>Action</th>
                         <th>Sr No.</th> 
                        <th>Customer Name</th>
                        <th>Society Name</th>
                        <th>Subject</th>
                        <th>Details</th>
                        <th>Created Date</th>  
                     </tr>
                   </tfoot>
                 </table>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!--end page-content-wrapper-->
 </div>
 <!--end page-wrapper-->
 <!--start overlay-->
 <div class="overlay toggle-btn-mobile"></div>
 <!--end overlay-->
 <!--Start Back To Top Button-->
 <a href="javaScript:;" class="back-to-top">
   <i class='bx bxs-up-arrow-alt'></i>
 </a>
 <script>
    function update_service_status(sr_id){
    
    if(confirm("Are you sure, to update the selected service request status ?")){
        var data = {};
        data.service = {};
        data.service.sr_id = sr_id;
        data.service.status = $('#status'+sr_id).val();
        
        var q = JSON.stringify(data);

        jQuery.ajax({
            dataType: 'json',
            type: "POST",
            url: jsBaseUrl+"product/update_service_req_status",
            data: {'jsonObj' : q},
            cache: false,
            beforeSend: function(){
                //jQuery(".btn-quirk").text('Submiting.. Please wait.').prop('disabled', true);
            },
            success: function(res){
                //jQuery(".btn-quirk").text('Submit').prop('disabled', false);
                if(res.status=='1'){
                    window.location.reload();
                }else{ // Failed
                    alert(res.msg);
                }
            }
        });
    }

return false;
}
 </script>
 <!--End Back To Top Button-->
 <!--footer --> <?php include_once('footer.php') ?>