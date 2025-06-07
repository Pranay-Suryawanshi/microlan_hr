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
         <div class="breadcrumb-title pe-3">Add Child Category</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Add Child Category</li>
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
             <form class="form-horizontal row g-3" method="post" action="<?php echo base_url(); ?>submitchildcategory" onsubmit="return validate_new_child_category(this);">

                  <div class="col-sm-4">
                   <div class="form-group">
                     <label for="companyName">Select category <span class="text-danger">*</span></label>
                     <select class="form-control" id="category_id" name="category_id" onchange="getSubCategory()">
                     <option value="">Select category</option>
                                        <?php if (isset($category_data) && !empty($category_data)) {
                                            foreach ($category_data as $category_key => $category_value) {
                                                ?>
                                                <option value="<?php echo $category_value['category_id']; ?>"><?php echo $category_value['category_name']; ?></option>
                                            <?php }
                                        }
                                        ?>
                     </select>
                     <span id="cat_err" style="font-weight: bold;color:red;"></span><br>
                   </div>
                  
                 </div>
                 <div class="col-sm-4">
                   <div class="form-group">
                     <label for="companyName">Select Sub category <span class="text-danger">*</span></label>
                     <select class="form-control"  id="sub_category_id" name="sub_category_id">
                       <option value="">Select</option>
                     </select>
                     <span id="sub_err" style="font-weight: bold;color:red;"></span><br>
                   </div>
                   
                 </div>
                 <div class="col-sm-4">
                   <div class="form-group">
                     <label for="companyName">Enter Child category <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="child_category_name" id="child_category_name" placeholder=" " >
                     <span id="child_err" style="font-weight: bold;color:red;"></span><br>
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
       <div class="card">
         <div class="card-body">
           <div class="row">
             <div class="col-sm-12">
               <h5 class="font-weight-bold">Child Category List</h5>
             </div>
             <hr>
             <div class="col-sm-12">
               <div class="table-responsive">
                  <table id="example" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                     <tr> 
                        <th>Action</th>
                        <th>Sr No.</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                      <th>Child Category</th>
                       <th>Status</th> 
                     </tr>
                   </thead>
                   <tbody>
                   <?php $i = 0; if(!empty($child_category_list)){
                                            foreach ($child_category_list as $category) { ?>
                     <tr>
                     <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url() ?>editchildcategory/<?php echo base64_encode($category['child_category_id']); ?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                              <a onclick="return confirm('Are you sure want to delete child category ?')" href='<?php echo base_url() . "category/delete_child_category?child_category_id=" . $category['child_category_id'] ?>' 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-trash"></i> Delete
                              </a>
                            </div>
                          </div>
                        </td>
                      
                       <td><?php echo ++$i; ?></td>
                       <td><?php echo $category['category_name']; ?></td>                                                
                         <td><?php echo $category['sub_category_name']; ?></td>
                         <td><?php echo $category['child_category_name']; ?></td>
                         <td>
                                <?php if($category['status'] ==='0'){ ?>
                                    <a href='javascript:void(0);' onclick='update_child_category_status(this,1,"<?php echo $category['child_category_id'];?>")'><span style='color:red;font-weight:700'>DE-ACTIVE</span></a>
                                <?php }?>
                                <?php if($category['status'] ==='1'){ ?>
                                    <a href='javascript:void(0);' onclick='update_child_category_status(this,0,"<?php echo $category['child_category_id'];?>")'><span style='color:green;font-weight:700'>ACTIVE</span></a>
                                <?php }?>

                            </td>                    
                            
 
                     </tr>
                     <?php }} ?>
                   </tbody>
                   <tfoot>
                     <tr>
                       <th>Action</th>
                        <th>Sr No.</th>
                        <th>Category Name</th>
                        <th>Sub Category Name</th>
                        <th>Child Category</th>
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
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>

    function getSubCategory(){
        var category_id = $('#category_id').val();

        var postData = {
            'category_id' : category_id
        }

        $.post('<?php echo base_url('category/getSubCategory')?>',postData,function(data){
            var subcats = $.parseJSON(data);
            $('#sub_category_id').html('');

            var html = '<option value="">Select Sub Category</option>';
            $.each(subcats,function(i,val){
                html += '<option value="'+val.sub_category_id+'">'+val.sub_category_name+'</option>';
            })
            $('#sub_category_id').html(html);
        })
    }

    function validate_new_child_category(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	var  category_id = $("#category_id option:selected").val();
   
    var  sub_category_id = $("#sub_category_id option:selected").val();
    var  child_category_name = $("#child_category_name").val();
        
        if( category_id.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#cat_err').text('Please select category name');
           hasError = 1; } else {
            $('#cat_err').text(''); // Clear error if valid
        }
        if( sub_category_id.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#sub_err').text('Please select sub category name');
           hasError = 1; } else {
            $('#sub_err').text(''); // Clear error if valid
        }
        if( child_category_name.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#child_err').text('Please enter child category name');
           hasError = 1; } else {
            $('#child_err').text(''); // Clear error if valid
        }
        
	if(hasError==1){
		return false;
	}else{
		return true;
	}  
}

function update_child_category_status(ele,status,category_id){
	
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