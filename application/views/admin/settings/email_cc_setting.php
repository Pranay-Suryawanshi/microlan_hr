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
         <div class="breadcrumb-title pe-3">Add Email Cc </div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Add  Email Cc</li>
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
            <form class="form-horizontal" method="post" action="<?php echo base_url();?>submit-emailCc" onsubmit="return validate_add_emailCc(this);" enctype="multipart/form-data">
             
           <div class="row">
             <div class="col-sm-12 col-lg-12 border-right">
               
                  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">Select Members*</label>
                     <select name="user_id[]" class="form-control" class="multiselect" multiple="multiple" id="user_id" >
                        <option value="">--- Select Email Cc Member ---</option>
                        <?php
                            foreach ($user_list as $emp) 
                            {
                        ?>
                            <option value="<?php echo $emp['op_user_id'];?>"><?php echo $emp['user_name'];?></option>  
                        <?php
                            }
                        ?>
                        </select>
                     <span id="email_cc_err" style="font-weight: bold;color:red;"></span><br>
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
               <h5 class="font-weight-bold">Service Category List</h5>
             </div>
             <hr>
             <div class="col-sm-12">
               <div class="table-responsive">
                 <table id="example2" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                     <tr> 
                        <!-- <th>Action</th> -->
                        <th>Sr No.</th>
                        <th> Member Name</th>
                        <th>Email Id </th> 
                        <th>Status</th>
                     </tr>
                   </thead>
                   <tbody>
                   
                   <?php $i=0;foreach($email_setting as $set){?>
                        <tr>
                        <!-- <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url(); ?>editcat/<?php echo base64_encode($set['email_cc_id']); ?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                             
                            </div>
                          </div>
                        </td> -->
                            <td><?php echo ++$i;?></td>
                            <td><?php echo $set['user_name'];?></td>
                            <td><?php echo $set['email'];?></td>
                            <td>
                                
                                <?php if($set['status'] =='0'){?>
                                    <a href='javascript:void(0);' onclick='update_emailCc_status(this,1,"<?php echo $set['email_cc_id'];?>")'>DE-ACTIVE</a>
                                <?php }?>
                                <?php if($set['status'] =='1'){?>
                                    <a href='javascript:void(0);' onclick='update_emailCc_status(this,0,"<?php echo $set['email_cc_id'];?>")'>ACTIVE</a>
                                <?php }?>
                            </td>
                            
                        </tr>
                    <?php }?>
                   </tbody>
                   <tfoot>
                     <tr>
                     <!-- <th>Action</th> -->
                        <th>Sr No.</th>
                        <th> Member Name</th>
                        <th>Email Id </th> 
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
 
 <!--End Back To Top Button-->
 <script>

function validate_add_emailCc(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	if ($("#user_id").val() == null || $("#user_id").val().length === 0) {
        $("#email_cc_err").text("Please select at least one member.");
        hasError = 1;
    } else {
        $("#email_cc_err").text(""); // Clear error if valid
    }

    if (hasError == 1) {
        return false;
    } else {
        return true;
    }
}

function update_emailCc_status(ele,status,email_cc_id){
	
	if(confirm("Are you sure, to update the selected member cc email status ?")){
		var data = {};
		data.product = {};
		data.product.email_cc_id = email_cc_id;
		data.product.status = status;
		
		var q = JSON.stringify(data);

		$.ajax({
			dataType: 'json',
			type: "POST",
			url: '<?= base_url("settings/update_emailCc_active_deactive_status"); ?>',
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
 <!--footer --> <?php include_once('footer.php') ?>
 