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
        <div class="breadcrumb-title pe-3">Lost Lead</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Lost Lead</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <!-- <div class="col-sm-12">
              <a href="add-lead" class="btn btn-primary">
                <i class="fa fa-plus"></i> Add New Lead </a>
             
            </div> -->

            <form action="" method="POST" id="idForm">
                            <div class="row">
                                <div class="col-sm-2 mr10 ft">
                                    <div class="form-group">
                                        <label>From Date</label>
                                        <input type="date" name="from_date" id="from_date" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-2 mr10 ft">
                                    <div class="form-group">
                                        <label>To Date</label>
                                        <input type="date" name="to_date" id="to_date" value="" class="form-control">
                                    </div>
                                </div>

                                <!--<div class="col-sm-2 mr10 ft" id="select_M"> 
                                <label>Name</label> 
                                <select class="form-control" id="lead_id" name="lead_id">
                                    <option value=""></option>
                                     <?php 
                                    foreach($list as $key => $value) {?>
                                <option value="<?php echo $value['lead_id']; ?>"><?php echo $value['name']; ?></option>
                                 <?php
                                  }?>
                                 </select>

                                </div>-->
                                <!-- <div class="col-sm-2 mr10 ft" id="name_list"> 
                                <label>Lead Status</label> 
                                <select class="form-control" id="is_id" name="is_id">
                                    <option value=""></option>
                                    <?php 
                                foreach($status_list as $key => $value) {?>
                                 <option value="<?php echo $value['is_id'];?>"><?php echo $value['name'];?></option>
                                 <?php
                                     }?>

                                </select>
                                </div> -->
                                <!--<div class="col-sm-2 mr10 ft" id="name_list"> 
                                <label>Lead Mode</label> 
                                
                                <select class="form-control" id="lead_mode" name="lead_mode" required>
                                <option value=""></option>
                                    <option value="1">Pre Qualified</option>
                                    <option value="2">Qualified</option>
                                    <option value="3">Not Qualified</option>
                                    
                                </select>
                                </div>-->
                                <div class="col-sm-2 mr10 ft" id="name_list"> 
                                <label>Lead Source</label> 
                                <select class="form-control" id="lead_source_id" name="lead_source_id">
                                <option value=""></option>
                                        <?php
                                            foreach ($lead_source as $source) 
                                            {
                                        ?>
                                            <option value="<?php echo $source['source_id'];?>"><?php echo $source['lead_source'];?></option>  
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2 mr10 ft">
                                    <div class="form-group">
                                        <label>Filter</label> <br>
                                      <input type="button" class="btn btn-primary input-sm" id="btnfilter" value="Filter">
                                    </div>
                                </div>
                            </div>
                        </form>

            <div class="col-sm-12 mt-5">
              <div class="table-responsive">
                <table id="ld_list" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                        <tr>
                        <!-- <th>Action</th> -->
                        <th>Sr. No.</th>
                        <th>Lead No.</th>
                        <th>Lead Date</th>
                        <th>Lead Mode</th>
                       <!-- <th>Lead Type</th>-->
                        <th>Lead Status</th>
                       <!-- <th>Follow Up Date</th>-->
                        <th>Customer Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Requirement Type</th>
                        <!--<th>Project Name</th>-->
                        <th>Possession Expected Period</th>
                        <th>Budget Range</th>
                        <th>Special Requirements</th>
                        <th>Lead Source</th>
                        <th>Communication Preferences</th>
                        <th>Time to Contact</th>
                        <th>Company</th>
                        <th>Job Title</th>
                    </tr>
                  </thead>
                  <tbody id="records">
                    <?php $i = 1;
                    foreach ($lostLead_list as $value): ?>
                      <tr>

                      <!-- <td class="">
                          <div class="dropdown">
                            <button class="dropbtn">
                              <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-content">
                              <a href="<?php echo base_url();?>edit-lead/<?php echo base64_encode($value['lead_id']);?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-edit"></i> Edit
                              </a>
                              <a href="<?php echo base_url();?>view-lead/<?php echo base64_encode($value['lead_id']);?>" 
                                  class="btn btn-sm btn-info waves-effect waves-light holiday"
                                  style="color:white">
                                  <i class="fa fa-eye"></i> View
                              </a>
                            </div>
                          </div>
                        </td> -->
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $value['lead_number'];?></td>
                        <td><?php echo date('jS \of F Y', strtotime($value['lead_date']));?></td>
                        <td><?php echo $value['mode_name'];?></td>
                       
                        <td><?php echo $value['name'];?></td>
                       <!-- <td><?php echo $value['lead_next_followup'];?></td>-->
                        <td><?php echo $value['contact_fullname'];?></td>
                        <td><?php echo $value['contact_email'];?></td>
                        <td><?php echo $value['contact_phone'];?></td>
                        <td><?php echo $value['project_type'];?></td>
                       <!-- <td>
                            <?php
                                if(!empty($value['project_id']))
                                {
                                $proj_id = explode(",", $value['project_id']);

                                for($i=0; $i<sizeof($proj_id); $i++)
                                {
                                    $sql_qry = 'SELECT * from project  
                                                    Where project_id = '.$proj_id[$i].'';
                                    $res_qry = $this->db->query($sql_qry);

                                    foreach($res_qry->result() as $row_project)
                                    {
                                        echo ' - ';
                                        echo $row_project->project_name;
                                        echo '<br>';
                                    }
                                }
                                }
                            ?>
                        </td>-->
                        <td><?php echo $value['possession_expected_period'];?></td>
                        <td><?php echo $value['budget_range'];?></td>
                        <td><?php echo $value['special_requirement'];?></td>
                        <td><?php echo $value['lead_source'];?></td>
                        <td><?php echo $value['com_name'];?></td>
                        <td><?php echo $value['communication_time'];?></td>
                        <td><?php echo $value['contact_company'];?></td>
                        <td><?php echo $value['contact_jobtitle'];?></td>
                        
                        
                        <!-- Update Leave modal -->
                        <div class="modal fade" id="editLeaveModal<?php echo $value->emp_leave_id; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <form method="post" action="<?php echo base_url(); ?>update-leave-application" id="holidayForm" enctype="multipart/form-data">
                              <input type="hidden" name="emp_leave_id" value="<?php echo $value->emp_leave_id; ?>" />
                              <input type="hidden" name="leave_status" value="<?php echo $value->leave_status; ?>" />
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Edit Leave Application</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="form-group">
                                      <label>Employee</label>
                                      <select class=" form-control custom-select selectedEmployeeID"  tabindex="1" name="emp_id" required>
                                          <option value="">Select Here..</option>
                                          <?php foreach($employee as $val): ?>
                                          <option value="<?php echo $val->op_user_id ?>"
                                          <?php if($val->op_user_id == $value->emp_id){echo 'selected';}?>><?php echo $val->user_name?></option>
                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <label>Leave Type</label>
                                      <select class="form-control custom-select assignleave"  tabindex="1" name="leave_type_id" id="leave_type_id" required>
                                          <option value="">Select Here..</option>
                                          <?php foreach($leavetypes as $val): ?>

                                          <option value="<?php echo $val->type_id ?>"
                                          <?php if($val->type_id == $value->leave_type_id){echo 'selected';}?>><?php echo $val->name ?></option>

                                          <?php endforeach; ?>
                                      </select>
                                  </div>
                                  <!-- <div class="form-group">
                                      <span style="color:red" id="total"></span>
                                      <div class="span pull-right">
                                          <button class="btn btn-info fetchLeaveTotal">Fetch Total Leave</button>
                                      </div>
                                      <br>
                                  </div> -->
                                <!--  <div class="form-group">
                                      <label class="control-label">Leave Duration</label><br>
                                      <input name="leave_type" type="radio" id="radio_1" data-value="Half" class="duration" value="Half Day" <?php if($value->leave_type == 'Half Day'){echo 'checked';}?>>
                                      <label for="radio_1">Hourly</label>
                                      <input name="leave_type" type="radio" id="radio_2" data-value="Full" class="type" value="Full Day" <?php if($value->leave_type == 'Full Day'){echo 'checked';}?>>
                                      <label for="radio_2">Full Day</label>
                                      <input name="leave_type" type="radio" class="with-gap duration" id="radio_3" data-value="More" value="More than One day" <?php if($value->leave_type == 'More than One day'){echo 'checked';}?>>
                                      <label for="radio_3">Above a Day</label>
                                  </div>
                                  <div class="form-group">
                                      <label class="control-label" id="hourlyFix">Date</label>
                                      <input type="date" name="start_date" value="<?php echo $value->start_date;?>" class="form-control mydatetimepickerFull" id="recipient-name1" required>
                                  </div>
                                  <div class="form-group" id="enddate" style="display:none">
                                      <label class="control-label">End Date</label>
                                      <input type="date" name="end_date" value="<?php echo $value->end_date;?>" class="form-control mydatetimepickerFull" id="recipient-name1">
                                  </div>

                                  <div class="form-group" id="hourAmount">
                                      <label>Length</label>
                                      <select id="hourAmountVal" class=" form-control custom-select" tabindex="1" name="leave_duration" required>
                                          <option value="">Select Hour</option>
                                          <option value="1" <?php if($value->leave_duration == '1'){echo 'selected';}?>>One hour</option>
                                          <option value="2" <?php if($value->leave_duration == '2'){echo 'selected';}?>>Two hour</option>
                                          <option value="3" <?php if($value->leave_duration == '3'){echo 'selected';}?>>Three hour</option>
                                          <option value="4" <?php if($value->leave_duration == '4'){echo 'selected';}?>>Four hour</option>
                                          <option value="5" <?php if($value->leave_duration == '5'){echo 'selected';}?>>Five hour</option>
                                          <option value="6" <?php if($value->leave_duration == '6'){echo 'selected';}?>>Six hour</option>
                                          <option value="7" <?php if($value->leave_duration == '7'){echo 'selected';}?>>Seven hour</option>
                                          <option value="8" <?php if($value->leave_duration == '8'){echo 'selected';}?>>Eight hour</option>
                                      </select>
                                  </div>

                                  <!--  <div class="form-group" >
                                      <label class="control-label">Duration</label>
                                      <input type="number" name="duration" class="form-control" id="leaveDuration">
                                  </div> --> 
                                <!--  <div class="form-group">
                                      <label class="control-label">Reason</label>
                                      <textarea class="form-control" name="leave_reason" id="message-text1"><?php echo $value->leave_reason;?></textarea>                                                
                                  </div>
                                                                                  
                              </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" id="saveButton">Update</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>

                        <!-- Approve Leave -->
                       <!-- <div class="modal fade" id="approveLeave<?php echo $value->emp_leave_id; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <form method="post" action="<?php echo base_url(); ?>approve-leave-application" id="holidayForm" enctype="multipart/form-data">
                              <input type="hidden" name="emp_leave_id" value="<?php echo $value->emp_leave_id; ?>" />
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Approve Leave Application</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  
                                  <div class="form-group">
                                      <label class="control-label">Are you sure you want to approve this leave application?</label>
                                  </div>
                                                                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success" id="saveButton">Approve Leave</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>

                        <!-- Reject Leave -->
                       <!-- <div class="modal fade" id="rejectLeave<?php echo $value->emp_leave_id; ?>" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <form method="post" action="<?php echo base_url(); ?>reject-leave-application" id="holidayForm" enctype="multipart/form-data">
                              <input type="hidden" name="emp_leave_id" value="<?php echo $value->emp_leave_id; ?>" />
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Reject Leave Application</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  
                                  <div class="form-group">
                                      <label class="control-label">Are you sure you want to reject this leave application?</label>
                                  </div>
                                                                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger" id="saveButton">Reject Leave</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </tr>-->
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <!-- <th>Action</th> -->
                        <th>Sr. No.</th>
                        <th>Lead No.</th>
                        <th>Lead Date</th>
                        <th>Lead Mode</th>
                        <!--<th>Lead Type</th>-->
                        <th>Lead Status</th>
                        <!--<th>Follow Up Date</th>-->
                        <th>Customer Name</th>
                        <th>Email Address</th>
                        <th>Phone Number</th>
                        <th>Requirement Type</th>
                       <!-- <th>Project Name</th>-->
                        <th>Possession Expected Period</th>
                        <th>Budget Range</th>
                        <th>Special Requirements</th>
                        <th>Lead Source</th>
                        <th>Communication Preferences</th>
                        <th>Time to Contact</th>
                        <th>Company</th>
                        <th>Job Title</th>
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
//var is_id=$('#is_id').val();
//var lead_mode=$('#lead_mode').val();
var lead_source_id=$('#lead_source_id').val();
//alert(is_id);

if(from_date=='' && to_date=='' &&  lead_source_id=='' )
{
  alert('Please Select any of this.');
  return false;
}
//$('#ld_list').DataTable().destroy();
 
var form_data = new FormData(); 
    form_data.append('from_date',from_date);
    form_data.append('to_date',to_date);
   // form_data.append('is_id',is_id);
    //form_data.append('lead_mode',lead_mode);
    form_data.append('lead_source_id',lead_source_id);
    $.ajax({
                  type: "POST",
                  url: "<?php echo base_url('lead/filter_lost_data'); ?>",
                   dataType: 'html', 
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,  
                  //cache: false,
                  success: function(data){
                     // console.log(data);
                 // $('#ld_list').DataTable().destroy();
                 $('#records').html();
                  $('#records').html(data);
                  $('#ld_list').DataTable();
                 
                  }
              });

  });
</script>
