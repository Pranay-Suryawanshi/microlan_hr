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
         <div class="breadcrumb-title pe-3">GST Setting</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">GST Setting</li>
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
                            <form id="basicForm" action="<?php echo base_url();?>savegst-type" method="post"  enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate" onsubmit="return validate_gst_setting(this);">
             
           <div class="row">
             <div class="col-sm-12 col-lg-12 border-right">
               
                  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">GST Setting*</label>
                     <select class="form-control" id="gst_type" name="gst_type" >
                     <option value="">Select Gst Type</option>
                     <option value="I" <?php if($gst_settings[0]['gst_type'] =='I'){ echo 'selected';} ?>>Including</option>
                     <option value="E" <?php if($gst_settings[0]['gst_type'] =='E'){ echo 'selected';} ?>>Excluding</option>
                     </select> <span id="gst_err" style="font-weight: bold;color:red;"></span><br>
                   </div>
                   <div class="form-group"> 
                                                    <p><b>NOTE:</b> It will reflect on your GST Calculation.</p>
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
               <h5 class="font-weight-bold">Gst Setting List</h5>
             </div>
             <hr>
             <div class="col-sm-12">
               <div class="table-responsive">

                 <table id="example2" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                     <tr> 
                     <th>Action</th>
                     <th>SR NO</th>
                     <th>HSN/SAC</th>
                      <th>Description</th>
                      <th>CGST</th>
                     <th>SGST</th>
                     <th>IGST</th>
                     
                     </tr>
                   </thead>
                   <tbody>
                   <?php $i=0;foreach($gst_settings as $value){?>
                        <tr>
                        <td class="" id="view_set<?php echo $value['gst_set_id'];?>">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a onclick="edit_gst_setting('<?php echo $value['gst_set_id']?>')" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>

                              <a  onclick="delete_gst_setting(this,'<?php echo $value['gst_set_id']?>')" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-trash"></i> Delete
                              </a>
                             
                            </div>
                          </div>
                        </td>
                            <td><?php echo ++$key;?></td>
                            <td><?php echo strtoupper($value['hsn_code']);?></td>
                            <td><?php echo $value['description'];?></td>
                            <td><?php echo $value['CGST'];?></td>
                            <td><?php echo $value['SGST'];?></td>
			        		<td><?php echo $value['IGST'] ;?></td>
                            <td>

                                <?php if($category['status'] =='0'){?>
                                    <a href='javascript:void(0);' onclick='update_category_status(this,1,"<?php echo $category['category_id'];?>")'> <span style='color:red;font-weight:700'>DE-ACTIVE</span></a>
                                <?php }?>
                                <?php if($category['status'] =='1'){?>
                                    <a href='javascript:void(0);' onclick='update_category_status(this,0,"<?php echo $category['category_id'];?>")'> <span style='color:green;font-weight:700'>ACTIVE</span></a>
                                <?php }?>
                            </td>
                            <td>
                                <?php if (in_array("edit_category", $arr_perm)) { ?>

                                <span><a href="<?php echo base_url(); ?>editcat/<?php echo base64_encode($category['category_id']); ?>"><i class='fa fa-edit'></i></a></span>
                                <!--<span><a onclick='delete_category(this,"<?php echo $category['category_id']; ?>")'><i class='fa fa-trash'></i></a></span>-->
                                <?php } ?>
                                  <?php if (in_array("delete_category", $arr_perm)) { ?>

                                 <span><a onclick="return confirm('Are you sure want to deactivate?')" href='<?php echo base_url()."category/delete_category?category_id=".$category['category_id']?>'><i class='fa fa-trash'></i></a></span>
                               <?php } ?>
                            </td>
                        </tr>
                        <tr style="display: none;" id="edit_set<?php echo $value['gst_set_id'];?>">
			        							<form id="basicForm" action="<?php echo base_url();?>save-gst" method="post"  enctype="multipart/form-data" class="form-horizontal" novalidate="novalidate" >
				        							<?php $gst_setting = $value;?>
                                                    <td>
				        								<button type="submit"><i class="fa fa-save"></i></button>
				        							</td>
				        							<td></td><input type="hidden" value="<?php echo $gst_setting['gst_set_id']?>" name="gst_set_id" id="gst_set_id">
				        							<td><input type="hidden" value="<?php echo $gst_setting['hsn_code']?>" name="hsn_code" ><?php echo $value['hsn_code'];?> </td>
				        							<td><input type="hidden" value="<?php echo $gst_setting['description']?>" name="description" ><?php echo $value['description'];?></td>
				        							<td><input type="text" value="<?php echo $gst_setting['CGST']?>" name="CGST" id="CGST2" class="form-control"></td>
				        							<td><input type="text" value="<?php echo $gst_setting['SGST']?>" name="SGST" id="SGST2" class="form-control"></td>
				        							<td><input type="text" value="<?php echo $gst_setting['IGST']?>" name="IGST" id="IGST2" class="form-control"></td>
				        							
				        						</form>
			        						</tr>
                    <?php }?>
                   </tbody>
                   <tfoot>
                     <tr>
                      <<th>Action</th>
                      <th>SR NO</th>
                     <th>HSN/SAC</th>
                      <th>Description</th>
                      <th>CGST</th>
                     <th>SGST</th>
                     <th>IGST</th>
                     
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
 
 <!--End Back To Top Button-->
 <script>


function validate_gst_setting(ele){
	//alert();
    alert("111");
	//hide_message_box(ele);
	var hasError=0;
	var gst_type = $("#gst_type").val();

    if( gst_type.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#gst_err').text('Please select GST type');
           hasError = 1; } else {
            $('#gst_err').text(''); // Clear error if valid
        }
        
	
	if(hasError==1){
		return false;
	}else{
		if(confirm("Are you sure wanted to change gst type?")){
			/*alert('hi');*/
			return true;
		}else{
			return false;
		}
	}
}


function update_category_status(ele,status,category_id){
	
	if(confirm("Are you sure, to update the selected category's status ?")){
		var data = {};
		data.product = {};
		data.product.category_id = category_id;
		data.product.status = status;
		
		var q = JSON.stringify(data);

		$.ajax({
			dataType: 'json',
			type: "POST",
			url: '<?= base_url("category/update_category_active_deactive_status"); ?>',
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
<script>
    function edit_gst_setting(id){
		$('#view_set'+id).hide();
		$('#edit_set'+id).show();
//		getSubCategory2();
	}

</script>
 <!--footer --> <?php include_once('footer.php') ?>
 