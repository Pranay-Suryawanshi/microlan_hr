<!--sidebar-wrapper-->
<style type="text/css"></style>
<!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">
      <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('msg'); ?>
        </div>
      <?php } ?>
      <?php if ($this->session->flashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('success'); ?>
        </div>
      <?php } ?>
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Template</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Template List</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <a href="add-template" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Template </a>
             
            </div>

            
            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="ld_list" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                        <tr>
                        <th>Action</th>
                        <th >Sr. No.</th>
                                    <th >Title</th>
                                    <th >Description</th>
                                    <!-- <th>File</th> -->
                                    <th >Created date</th>
                                    <th >Status </th>
                    </tr>
                  </thead>
                  <tbody id="records">
                    <?php $i = 1;
                    foreach ($list as $key=> $value): ?>
                      <tr>

                      <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url();?>edit-master-template/<?php echo base64_encode($value['template_id']);?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                              <!--<a href="<?php echo base_url();?>view-lead/<?php echo base64_encode($value['template_id']);?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-eye"></i> View
                              </a>-->
                            </div>
                          </div>
                        </td>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $value['title'];?></td>
                        <td><?php echo $value['description']; ?></td>
                       <!--  <td><?php if($value['image_name']){
                                foreach ($value['image_name'] as $ke => $val) { ?><img  width="50" height="50" src="<?php echo  base_url('uploads/template/'.$val['image_name']); ?>"><?php } } ?></td> -->
                                     <td><?php echo $value['created_date']; ?></td>
                                   <td>
                                          <?php if($value['status']==1){$status=0;}else{ $status=1; } ?>
                                            <a onclick="return confirm('Are you sure want to chanage status ?')" href="<?php echo base_url('status-template/'.$value['template_id'].'/'.$status); ?>"><?php if($value['status']==1){echo " <span style='color:green;font-weight:700'>Active</span>";}else{ echo " <span style='color:red;font-weight:700'>Deactive</span>"; } ?></a>
                                   </td>
                        
                        
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Action</th>
                    <th >Sr. No.</th>
                                    <th >Title</th>
                                    <th >Description</th>
                                    <!-- <th>File</th> -->
                                    <th >Created date</th>
                                    <th >Status </th>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $("#btnfilter").click(function(){

//alert("11");
var from_date=$('#from_date').val();
var to_date=$('#to_date').val();
var is_id=$('#is_id').val();
//var lead_mode=$('#lead_mode').val();
var lead_source_id=$('#lead_source_id').val();
//alert(is_id);

if(from_date=='' && to_date=='' &&  is_id=='' && lead_source_id=='' )
{
  alert('Please Select any of this.');
  return false;
}
//$('#ld_list').DataTable().destroy();
 
var form_data = new FormData(); 
    form_data.append('from_date',from_date);
    form_data.append('to_date',to_date);
    form_data.append('is_id',is_id);
    //form_data.append('lead_mode',lead_mode);
    form_data.append('lead_source_id',lead_source_id);
    $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('lead/filter_data'); ?>",
                   dataType: 'html', 
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,  
                  //cache: false,
                  success: function(data){
                     // console.log(data);
                  $('#ld_list').DataTable().destroy();
                  $('#records').html(data);
                  $('#ld_list').DataTable();
                 
                  }
              });

  });
</script>
