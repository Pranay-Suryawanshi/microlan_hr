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
         <div class="breadcrumb-title pe-3">Edit Sub Category</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
             </ol>
           </nav>
         </div>
         
       </div>
       <!--end breadcrumb-->
       <div class="card">
         <div class="card-body">
           <div class="row">
           <?php if ($this->session->flashdata('msg')) { ?>
                        <div class="alert alert-<?php echo $this->session->flashdata('class'); ?> alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>
                    <?php } ?>
             <div class="col-sm-12 col-lg-12 border-right">
             <form class="form-horizontal row g-3" method="post" action="<?php echo base_url('update-subcategory');?>" onsubmit="return validate_edit_sub_category(this);">
                  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">Select category <span class="text-danger">*</span></label>
                     <select class="form-control" id="category_id" name="category_id" >
                     <option value="">Select category</option>
                     <?php if (isset($category_data) && !empty($category_data)) {
                                foreach ($category_data as $category_key => $c_value) {
                                    ?>
                                    <option value="<?php echo $c_value['category_id']; ?>" <?php if ($c_value['category_id'] == $subcategory_data[0]['category_id']) {
                                echo "selected";
                            } ?> ><?php echo $c_value['category_name']; ?>
                                    </option>
                        <?php }
                    }
                    ?>
                     </select>
                     <span id="cat_err" style="font-weight: bold;color:red;"></span><br>
                   </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">Enter Sub category <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder=" " value="<?php echo $subcategory_data[0]['sub_category_name'] ?>" >
                     <input type="hidden" name="sub_category_id" id="sub_category_id" value="<?php echo $subcategory_data[0]['sub_category_id']; ?>" >
                   </div>
                   <span id="sub_err" style="font-weight: bold;color:red;"></span><br>
                 </div>
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
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>

    
    function validate_edit_sub_category(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	var  category_id = $("#category_id option:selected").val();
   
    var  sub_category_name = $("#sub_category_name").val();
        
        if( category_id.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#cat_err').text('Please select category name');
           hasError = 1; } else {
            $('#cat_err').text(''); // Clear error if valid
        }
        if( sub_category_name.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#sub_err').text('Please enter sub category name');
           hasError = 1; } else {
            $('#sub_err').text(''); // Clear error if valid
        }
       
        
	if(hasError==1){
		return false;
	}else{
		return true;
	}  
}

function update_sub_category_status(ele,status,category_id){
	
	if(confirm("Are you sure, to update the selected child category's status ?")){
		var data = {};
		data.product = {};
		data.product.child_category_id = category_id;
		data.product.status = status;
		
		var q = JSON.stringify(data);

		$.ajax({
			dataType: 'json',
			type: "POST",
			url: "<?php echo base_url('category/update_child_category_active_deactive_status'); ?>",
			data: {'jsonObj' : q},
			cache: false,
			beforeSend: function(){
				//jQuery(".btn-quirk").text('Submiting.. Please wait.').prop('disabled', true);
			},
			success: function(res){
				//jQuery(".btn-quirk").text('Submit').prop('disabled', false);
				if(res.status=='1'){
	          		alert(res.msg);
	          	}else{ // Failed
	          		alert(res.msg);
	          	}

	          	location.reload();
	      	}
			});
	}

	return false;
}
</script>
 
 <!--End Back To Top Button-->
 <!--footer --> <?php include_once('footer.php') ?>