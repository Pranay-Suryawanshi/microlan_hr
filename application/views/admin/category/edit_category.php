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
         <div class="breadcrumb-title pe-3">Edit Category</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
             </ol>
           </nav>
         </div>
      
       </div>
       <!--end breadcrumb-->
       <div class="card">
         <div class="card-body">
         <?php if($this->session->flashdata('msg')) {?>
                                <div class="alert alert-<?php echo $this->session->flashdata('class');?> alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <?php }?>
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>update-category" onsubmit="return validate_add_category(this);" enctype="multipart/form-data">
             
           <div class="row">
             <div class="col-sm-12 col-lg-12 border-right">
               
                  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">Service Category <span class="text-danger">*</span></label>
                     <input type="text" name="category_name" id="category_name" class="form-control" value="<?php echo $category_data[0]['category_name'];?>"  >
                     <span id="cat_err" style="font-weight: bold;color:red;"></span><br>
                     <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_data[0]['category_id'];?>">
                   </div>
                 </div>
                
                 <div class="col-sm-12">
                   <button type="submit" class="btn btn-primary btn-block">Submit</button>
                 </div>
             </div>
             </form>
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
 
 <!--End Back To Top Button-->
 <script>

function validate_add_category(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	var  category_name = $("#category_name").val();

 
        
        if( category_name.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#cat_err').text('Please enter category name');
           hasError = 1; } else {
            $('#cat_err').text(''); // Clear error if valid
        }
        
	if(hasError==1){
		return false;
	}else{
		return true;
	}  
}

</script>