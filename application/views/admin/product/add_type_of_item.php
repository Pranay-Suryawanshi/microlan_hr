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
         <div class="breadcrumb-title pe-3">Add Service Type</div>
         <div class="ps-3">
           <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item">
                 <a href="javascript:;">
                   <i class="bx bx-home-alt"></i>
                 </a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Add Service Type</li>
             </ol>
           </nav>
         </div>
         <!--  <div class="ms-auto"><div class="btn-group"><button type="button" class="btn btn-primary">Settings</button><button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"><span class="visually-hidden">Toggle Dropdown</span></button><div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a class="dropdown-item" href="javascript:;">Action</a><a class="dropdown-item" href="javascript:;">Another action</a><a class="dropdown-item" href="javascript:;">Something else here</a><div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;">Separated link</a></div></div></div> -->
       </div>
       <!--end breadcrumb-->
       <div class="card">
       <?php if($this->session->flashdata('msg')) {?>
                                <div class="alert alert-<?php echo $this->session->flashdata('class');?> alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                </div>
                            <?php }?>
              <form class="form-validate" name="type_of_service_from" method="post" action="<?php echo base_url();?>submit-item-type"  enctype="multipart/form-data" onsubmit="return validate_add_item_type(this)">
              
         <div class="card-body">
           <div class="row">
             <div class="col-sm-12 col-lg-12 border-right">
               <form class="row g-3">
                  <div class="col-sm-6">
                   <div class="form-group">
                     <label for="companyName">Service Type*</label>
                     <input type="text" class="form-control" name="item_type_name" id="item_type_name" placeholder=" " >

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
               <h5 class="font-weight-bold">Service Type List</h5>
             </div>
             <hr>
             <div class="col-sm-12">
               <div class="table-responsive">
                 <table id="example2" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                     <tr> 
                        <th>Action</th>
                        <th>Sr No.</th>
                        <th>Service Type ID</th>
                        <th>Service Type Name</th>
                     </tr>
                   </thead>
                   <tbody>
                   <?php $i=0;if(!empty($item_type_list)){
                    foreach($item_type_list as $ins){?>
                        <tr>
                        <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url(); ?>edit-item-type/<?php echo base64_encode($ins['item_type_id']); ?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                              <a href="<?php echo base_url('delete-item-type/'.$ins['item_type_id']); ?>" onclick="return confirm('Are you sure delete service type ?')" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-trash"></i> Delete
                              </a>
                            </div>
                          </div>
                        </td>
                            <td><?php echo ++$i;?></td>
                            <td><?php echo $ins['item_type_id'];?></td>
                            <td><?php echo $ins['item_type_name'];?></td>
                            
                         
                        </tr>
                    <?php } }?>
                   </tbody>
                   <tfoot>
                     <tr>
                        <th>Action</th>
                        <th>Sr No.</th>
                        <th>Service Type ID</th>
                        <th>Service Type Name</th>
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
    function validate_add_item_type(ele) {//alert("11");
	//hide_message_box(ele);
	var hasError=0;
	var item_type_name = $("#item_type_name").val();
          
        if( item_type_name.trim()=='') { 
         // showError("Please enter  project name", " project_name");
         $('#err2').text('Please enter service type');
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