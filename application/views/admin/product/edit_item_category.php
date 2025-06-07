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
         <div class="breadcrumb-title pe-3">Edit Service Category</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Edit Service Category</li>
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
              <form class="form-validate" name="service_category_from" method="post" action="<?php echo base_url();?>product/updateItemCategory"  enctype="multipart/form-data" onsubmit="return validate_edit_item_category(this)">
              
                  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">Service Category*</label>
                     <input type="text" class="form-control" value="<?php echo $item_category_data[0]['item_category_name']; ?>" name="item_category_name" id="item_category_name" placeholder=" " >
                     <input type="hidden" value="<?php echo $item_category_data[0]['item_category_id']; ?>"  name="item_category_id" id="item_category_id" class="form-control">
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
    function validate_edit_item_category(ele) {//alert("11");
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
 
 </script>
 
 <!--End Back To Top Button-->
 <!--footer --> <?php include_once('footer.php') ?>