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
         <div class="breadcrumb-title pe-3">Add Service Category</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Add Service Category</li>
             </ol>
           </nav>
         </div>
      
       </div>
       <!--end breadcrumb-->
       <div class="card">

         <div class="card-body">
           <div class="row">
             <div class="col-sm-12 col-lg-12 border-right">
               <?php if($this->session->flashdata('msg')) {?>
                                <div class="alert alert-<?php echo $this->session->flashdata('class');?> alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <?php }?>
              <form class="form-validate" name="service_category_from" method="post" action="<?php echo base_url();?>submit-item-category"  enctype="multipart/form-data" onsubmit="return validate_add_item_category(this)">
              
                  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">Service Category*</label>
                     <input type="text" class="form-control" name="item_category_name" id="item_category_name" placeholder=" " >
                   </div>
                   <span id="err2" style="color:red;"></span>
                 </div>
                <br>
                 <div class="col-sm-12">
                   <button type="submit" class="btn btn-primary btn-block">Submit</button>
                 </div>
             </div>
             </form>
           </div>
         </div>
       </div>
       <div class="card">
         <div class="card-body">
           <div class="row">
             <div class="col-sm-12">
               <h5 class="font-weight-bold">Service Category List</h5>
             </div>
             <hr>
             <div class="col-sm-12">
               <div class="table-responsive">
                 <table id="example2" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                     <tr> 
                        <th>Action</th>
                        <th>Sr No.</th>
                        <th>  Service Category ID</th>
                        <th>Service Category Name</th> 
                        <th>Status</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php $i=0;if(!empty($item_category_list)){
                    foreach($item_category_list as $ins){?>
                        <tr>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url(); ?>edit-item-category/<?php echo base64_encode($ins['item_category_id']); ?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                              <!-- <a href="<?php echo base_url('delete-item-category/'.$ins['item_category_id']); ?>" onclick="return confirm('Are you sure delete service category ?')" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-trash"></i> Delete
                              </a> -->
                            </div>
                          </div>
                        </td>
                            <td><?php echo ++$i;?></td>
                            <td><?php echo $ins['item_category_id'];?></td>
                            <td><?php echo $ins['item_category_name'];?></td>
                            <td>
                                <?php if($ins['status'] =='0'){?>
                                    <a href='javascript:void(0);' onclick='update_category_status(this,1,"<?php echo  $ins['item_category_id'];?>")'><span style='color:red;font-weight:700'>DE-ACTIVE</span></a>
                                <?php }?>
                                <?php if($ins['status'] =='1'){?>
                                    <a  href='javascript:void(0);' onclick='update_category_status(this,0,"<?php echo  $ins['item_category_id'];?>")'><span style='color:green;font-weight:700'>ACTIVE</span></a>
                                <?php }?>
                            </td>
                            
                         
                        </tr>
                    <?php } }?>
                   </tbody>
                   <tfoot>
                     <tr>
                      <th>Action</th>
                        <th>Sr No.</th>
                        <th>  Service Category ID</th>
                        <th>Service Category Name</th> 
                        <th>Status</th>
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
    function validate_add_item_category(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	var item_category_name = $("#item_category_name").val();
          
        if( item_category_name.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#err2').text('Please enter service category');
           hasError = 1; } else {
            $('#err2').text(''); // Clear error if valid
        }
        

	if(hasError==1){
		return false;
	}else{
		return true;
	}  
}
 
function update_category_status(ele,status,item_category_id){//alert("11");
	
  if(confirm("Are you sure, to update the selected service category status ?")){
      var data = {};
      data.service = {};
      data.service.item_category_id = item_category_id;
      data.service.status = status;
      
      var q = JSON.stringify(data);

      $.ajax({
          dataType: 'json',
          type: "POST",
          url: "<?php echo base_url('product/update_itemCategory_active_deactive_status'); ?>",
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