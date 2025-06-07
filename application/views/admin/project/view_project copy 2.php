<!--sidebar-wrapper-->
<?php include_once('header.php') ?>

<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Summernote CSS & JS for Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>


<style>
  .toggle-div {
    display: none;
    margin-top: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    background-color: #f9f9f9;
  }
</style><!--end header-->
<!--page-wrapper-->
<div class="page-wrapper">
  <!--page-content-wrapper-->
  <div class="page-content-wrapper">
    <div class="page-content">


      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Project Overview</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
              <li class="breadcrumb-item">
                <a href="javascript:;">
                  <i class="bx bx-home-alt"></i>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Project Overview</li>
            </ol>
          </nav>
        </div>
        <div class="ms-auto">
          <!--    <div class="btn-group"><a href="add-new-template.php"><button type="button" class="btn btn-primary">Add New Template</button></a></div> -->
        </div>
      </div>

      <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-<?php echo $this->session->flashdata('class'); ?> alert-dismissible">
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

      <div class="card ">
        <div class="card-body">
          <div class="overflow-auto">
            <ul class="nav nav-tabs flex-nowrap d-flex" id="myTab" role="tablist" style="white-space: nowrap; overflow-x: auto;">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Project Overview</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Task</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="milestones-tab" data-bs-toggle="tab" href="#milestones" role="tab" aria-controls="milestones" aria-selected="false">Milestones</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="commercial-tab" data-bs-toggle="tab" href="#commercial" role="tab" aria-controls="commercial" aria-selected="false">Files</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="term-and-condtion-tab" data-bs-toggle="tab" href="#term-and-condtion" role="tab" aria-controls="term-and-condtion" aria-selected="false">Discussion</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="notes-tab" data-bs-toggle="tab" href="#notes" role="tab" aria-controls="notes" aria-selected="false">Notes</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="logs-tab" data-bs-toggle="tab" href="#logs" role="tab" aria-controls="logs" aria-selected="false">Activity</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="transaction-tab" data-bs-toggle="tab" href="#transaction" role="tab" aria-controls="transaction" aria-selected="false">Transaction History</a>
              </li>
            </ul>
          </div>

          <div class="tab-content p-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <!--breadcrumb-->
                <!--end breadcrumb-->
                <div class="user-profile-page">

                  <!--end row-->
                  <div class="row mt-5">
                    <div class="col-sm-12">
                      <div class="  shadow-none   mb-0 radius-15">

                        <div class="row">
                          <div class="col-sm-7 mt-3">
                            <div class="row">
                              <div class="col-sm-12 card radius-15 border shadow-none" style="padding: 10px">
                                <div class="table-responsive ">
                                  <table id="example23" class="display nowrap table table-hover   table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                      <tr>
                                        <th>Customer</th>
                                        <th> <?php foreach ($customer_list as $key => $value) {
                                                if ($value['cust_id'] == $res['project_client_id'])
                                                  echo $value['company'];
                                              } ?></th>

                                      </tr>
                                      </tr>
                                    </thead>

                                    <tbody>
                                      <tr>
                                        <td>Status </td>
                                        <td><?php if ($res['work_status'] == 1) {
                                              echo "Not Started";
                                            } else if ($res['work_status'] == 2) {
                                              echo "In Progress";
                                            } else if ($res['work_status'] == 3) {
                                              echo "On Hold";
                                            } else if ($res['work_status'] == 4) {
                                              echo "Cancelled";
                                            } else {
                                              echo "Finished";
                                            } ?> </td>
                                      </tr>
                                      <!--  <tr>
                                            <td>Date Created  </td>
                                            <td> 12-04-2022 </td> 
                                          </tr> -->
                                      <tr>
                                        <td>Date Created</td>
                                        <td> <?php echo date('d-m-Y', strtotime($res['project_added_on'])); ?>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td> Start Date </td>
                                        <td> <?php echo date('d-m-Y', strtotime($res['project_start_date'])); ?> </td>
                                      </tr>
                                      <tr>
                                        <td>Deadline </td>
                                        <td> <?php echo  date('d-m-Y', strtotime($res['estimated_completion_date'])); ?></td>
                                      </tr>
                                      <tr>
                                        <td style="color:#007bff;">Total Time </td>
                                        <td style="color:#007bff;"> <?php echo $res['hours'] . "\r" . 'Hours'; ?> </td>
                                      </tr>
                                      <?php

                                      $spHour = 0;
                                      foreach ($task_timer as $tt) {
                                        // Convert spend_hour from hh:mm:ss to seconds
                                        list($hours, $minutes, $seconds) = explode(':', $tt['spend_hour']);
                                        $total_seconds = ($hours * 3600) + ($minutes * 60) + $seconds;

                                        // Add to the running total of spend time in seconds
                                        $spHour += $total_seconds;

                                        // Convert total seconds back to hh:mm:ss format
                                        $hours = floor($spHour / 3600);
                                        $minutes = floor(($spHour % 3600) / 60);
                                        $seconds = $spHour % 60;

                                        // Format the result as hh:mm:ss
                                        $total_spend_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);

                                        // Convert total spend time to hh:mm:ss format
                                        $spent_hours = floor($spHour / 3600);
                                        $spent_minutes = floor(($spHour % 3600) / 60);
                                        $spent_seconds = $spHour % 60;
                                        $total_spend_time = sprintf("%02d:%02d:%02d", $spent_hours, $spent_minutes, $spent_seconds);

                                        // Convert total time to seconds
                                        list($total_hours, $total_minutes, $total_seconds) = explode(':', $res['hours']);
                                        $total_time_in_seconds = ($total_hours * 3600) + ($total_minutes * 60) + $total_seconds;

                                        // Calculate remaining time by subtracting spend time from total time
                                        $remaining_time_in_seconds = $total_time_in_seconds - $spHour;
                                        $remaining_hours = floor($remaining_time_in_seconds / 3600);
                                        $remaining_minutes = floor(($remaining_time_in_seconds % 3600) / 60);
                                        $remaining_seconds = $remaining_time_in_seconds % 60;

                                        // Format remaining time as hh:mm:ss
                                        $remaining_time = sprintf("%02d:%02d:%02d", $remaining_hours, $remaining_minutes, $remaining_seconds);

                                        if ($total_time_in_seconds > 0) {
                                          $time_spend_percentage = ($spHour / $total_time_in_seconds) * 100;
                                          $time_spend_percentage = round($time_spend_percentage, 2); // Rounded to 2 decimal places
                                        } else {
                                          $time_spend_percentage = 0;
                                        }

                                        if ($total_time_in_seconds > 0) {
                                          $remaining_percentage = ($remaining_seconds / $total_time_in_seconds) * 100;
                                          $remaining_percentage = round($remaining_percentage, 2);
                                        } else {
                                          $remaining_percentage = 0;
                                        }
                                      }
                                      ?>
                                      <tr>
                                        <td style="color:#40d140;">Spend Time </td>
                                        <td style="color:#40d140;"><?php echo $total_spend_time . "\r" . 'Hours'; ?> </td>
                                      </tr>

                                      <tr>
                                        <td style="color:red;">Remaning Time </td>
                                        <td style="color:red;"> <?php echo $remaining_time; ?></td>
                                      </tr>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                              <!-- <div class="col-sm-12">
                                       <h5>Tages - </h5>
                                       <p>--</p>
                                     </div> -->
                              <div class="col-sm-12">
                                <h5>Description - </h5>
                                <p><?php echo $res['project_description']; ?></p>
                              </div>

                              <div class="col-sm-12">
                                <h5>Members - </h5>
                                <div class="card radius-15 border shadow-none">
                                  <div class="card-body">
                                    <!-- <div class="d-flex align-items-center">
                                              <h5 class="mb-0">New Users</h5>
                                              <p class="mb-0 ms-auto"><i class="bx bx-dots-horizontal-rounded float-right font-24"></i>
                                              </p>
                                            </div>
                                            <div class="d-flex align-items-center mt-3 gap-2">
                                              <img src="assets/images/avatars/avatar-1.png" width="45" height="45" class="rounded-circle" alt="">
                                              <div class="flex-grow-1">
                                                <p class="font-weight-bold mb-0">Neil Wagner</p>
                                                <p class="text-secondary mb-0">Total Logged Time: 00:00</p>
                                              </div>
                                              <a href="javascript:;" class="btn btn-sm btn-light-primary px-4 radius-10"><i class="fa fa-trash"></i></a>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center gap-2">
                                              <img src="assets/images/avatars/avatar-2.png" width="45" height="45" class="rounded-circle" alt="">
                                              <div class="flex-grow-1">
                                                <p class="font-weight-bold mb-0">Sampoll Dinga</p>
                                                <p class="text-secondary mb-0">Total Logged Time: 00:00</p>
                                              </div> <a href="javascript:;" class="btn btn-sm btn-light-primary px-4 radius-10"><i class="fa fa-trash"></i></a>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center gap-2">
                                              <img src="assets/images/avatars/avatar-3.png" width="45" height="45" class="rounded-circle" alt="">
                                              <div class="flex-grow-1">
                                                <p class="font-weight-bold mb-0">Loona Ting</p>
                                                <p class="text-secondary mb-0">Total Logged Time: 00:00</p>
                                              </div> <a href="javascript:;" class="btn btn-sm btn-light-primary px-4 radius-10"><i class="fa fa-trash"></i></a>
                                            </div>
                                            <hr>
                                            <div class="d-flex align-items-center gap-2">
                                              <img src="assets/images/avatars/avatar-4.png" width="45" height="45" class="rounded-circle" alt="">
                                              <div class="flex-grow-1">
                                                <p class="font-weight-bold mb-0">Lee Jong</p>
                                                <p class="text-secondary mb-0">Total Logged Time: 00:00</p>
                                              </div> <a href="javascript:;" class="btn btn-sm btn-light-primary px-4 radius-10"><i class="fa fa-trash"></i></a>
                                            </div> -->
                                    <div class="d-flex align-items-center">
                                      <h5 class="mb-0">Team Members</h5>
                                      <p class="mb-0 ms-auto">
                                        <!-- <i class="bx bx-dots-horizontal-rounded float-right font-24"></i> -->
                                      </p>
                                    </div>

                                    <?php if (!empty($projects)): ?>
                                      <?php foreach ($projects as $project): ?>

                                        <!-- Project Manager -->
                                        <?php if (!empty($project->project_manager_name)): ?>
                                          <div class="d-flex align-items-center mt-3 gap-2">
                                            <!-- <img src="assets/images/avatars/avatar-1.png" width="45" height="45" class="rounded-circle" alt="">-->
                                            <?php if (empty($project->project_manager_profilePhoto)) { ?>
                                              <img src="<?php echo base_url(); ?>upload/profile/profile.png" class="user-img" alt="user avatar">
                                            <?php } else { ?>
                                              <img src="<?php echo base_url(); ?>upload/profile/<?php echo $project->project_manager_profilePhoto; ?>" class="user-img" alt="user avatar">
                                            <?php } ?>
                                            <div class="flex-grow-1">
                                              <p class="font-weight-bold mb-0"><?php echo $project->project_manager_name; ?> (Project Manager)</p>
                                              <p class="text-secondary mb-0"><?php echo $project->project_manager_contactNo; ?></p>
                                            </div>
                                          </div>
                                          <hr>
                                        <?php endif; ?>

                                        <!-- Marketing Person -->
                                        <?php if (!empty($project->marketing_person_name)): ?>
                                          <div class="d-flex align-items-center gap-2">
                                            <!-- <img src="assets/images/avatars/avatar-2.png" width="45" height="45" class="rounded-circle" alt=""> -->
                                            <?php if (empty($project->marketing_person_profilePhoto)) { ?>
                                              <img src="<?php echo base_url(); ?>upload/profile/profile.png" class="user-img" alt="user avatar">
                                            <?php } else { ?>
                                              <img src="<?php echo base_url(); ?>upload/profile/<?php echo $project->marketing_person_profilePhoto; ?>" class="user-img" alt="user avatar">
                                            <?php } ?>
                                            <div class="flex-grow-1">
                                              <p class="font-weight-bold mb-0"><?php echo $project->marketing_person_name; ?> (Marketing)</p>
                                              <p class="text-secondary mb-0"><?php echo $project->marketing_person_contactNo; ?></p>
                                            </div>
                                          </div>
                                          <hr>
                                        <?php endif; ?>

                                        <!-- Developers -->
                                        <?php if (!empty($project->developers)): ?>
                                          <?php foreach ($project->developers as $developer): ?>
                                            <div class="d-flex align-items-center gap-2">
                                              <!-- <img src="assets/images/avatars/avatar-3.png" width="45" height="45" class="rounded-circle" alt=""> -->
                                              <?php if (empty($developer->profile_photo)) { ?>
                                                <img src="<?php echo base_url(); ?>upload/profile/profile.png" class="user-img" alt="user avatar">
                                              <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>upload/profile/<?php echo $developer->profile_photo ?>" class="user-img" alt="user avatar">
                                              <?php } ?>
                                              <div class="flex-grow-1">
                                                <p class="font-weight-bold mb-0"><?php echo $developer->user_name; ?> (Developer)</p>
                                                <p class="text-secondary mb-0"><?php echo $developer->contact_no; ?></p>
                                              </div>
                                            </div>
                                            <hr>
                                          <?php endforeach; ?>
                                        <?php endif; ?>

                                      <?php endforeach; ?>
                                    <?php else: ?>
                                      <p class="text-secondary">No project members found.</p>
                                    <?php endif; ?>

                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-5 mt-3">

                            <?php

                            $total_tasks = $task_complete['complete'] + $pending_task['pending_task']; // total number of tasks
                            $completed_tasks = $task_complete['complete']; // completed tasks
                            $pending_tasks = $pending_task['pending_task']; // pending tasks
                            $total_hours = $res['hours'];

                            // Calculate hours, minutes, and seconds
                            $hours = floor($total_hours); // Full hours
                            $minutes = floor(($total_hours - $hours) * 60); // Minutes
                            $seconds = round((($total_hours - $hours) * 60 - $minutes) * 60); // Seconds

                            // Format the time as HH:MM:SS
                            $formatted_time = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
                            $total_estimated_hours =  $formatted_time; // total estimated hours for all tasks
                            $completed_hours = $total_spend_time; // total hours spent on completed tasks
                            $remaining_hours = $remaining_time;; // remaining estimated hours

                            $processnew1 = 0;
                            if (!empty($pending_task_new)) {

                              $processnew1 = ($pending_task_new * $complete) / 100;
                            }

                            // Calculate task progress
                            $task_progress_percentage = ($completed_tasks / $total_tasks) * 100; // Task completion progress
                            $remaining_task_percentage = ($pending_tasks / $total_tasks) * 100; // Pending task percentage

                            // Final progress can include time consideration based on the estimated hours
                            $final_progress = ($completed_hours / $total_estimated_hours) * 100; // Calculate progress based on hours

                            // Prepare data for the chart
                            $chart_data = [
                              'taskProgress' => $task_progress_percentage, // Task progress (based on tasks)
                              'timeProgress' => $final_progress, // Time progress (based on hours)
                              'remainingTime' => $remaining_hours, // Remaining time in hours
                            ];

                            ?>
                            <div class="card radius-15 border shadow-none" style="padding: 10px">
                              <h5>Project Progress</h5>
                              <div id="progressChart" style="width: 100%; height: 350px; margin: auto; "></div>
                            </div>

                            <div class="card radius-15 border shadow-none" style="padding: 10px">
                              <div class="progress-wrapper mb-4">
                                <p class="mb-1">Open Tasks <span class="float-end"><?php
                                                                                    $totTasks = $task_complete['complete'] + $pending_task['pending_task'];
                                                                                    if ($totTasks > 0) {
                                                                                      $pendingPercentage = ($pending_task['pending_task'] / $totTasks) * 100;
                                                                                      echo round($pendingPercentage, 2) . '%';
                                                                                    } else {
                                                                                      echo '0%';
                                                                                    }
                                                                                    ?></span>
                                </p>
                                <!-- <div class="progress radius-15" style="height:5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 45%"></div>
                                      </div> -->
                                <div class="progress radius-15" style="height:5px;">
                                  <div class="progress-bar" role="progressbar"
                                    style="width: <?php echo round($pendingPercentage, 2); ?>%;"
                                    aria-valuenow="<?php echo round($pendingPercentage, 2); ?>"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                  </div>
                                </div>
                              </div>
                              <div class="progress-wrapper mb-4">
                                <p class="mb-1">Days Left <span class="float-end"><?php
                                                                                  $today = new DateTime();
                                                                                  $dldate = new DateTime($res['estimated_completion_date']);

                                                                                  // Start date (you can set it dynamically or hardcode it)
                                                                                  $start_date = new DateTime($res['project_start_date']); // Assuming $res['start_date'] exists

                                                                                  // Total duration of the project in days
                                                                                  $total_duration_days = $start_date->diff($dldate)->days;

                                                                                  // Calculate progress percentage
                                                                                  $progress_percentage = 0;
                                                                                  if ($today <= $dldate && $total_duration_days > 0) {
                                                                                    $elapsed_days = $today->diff($start_date)->days;
                                                                                    $progress_percentage = min(100, ($elapsed_days / $total_duration_days) * 100);
                                                                                  }

                                                                                  $remaining_days = $dldate->diff($today)->days;

                                                                                  if ($remaining_days < 0) {
                                                                                    $remaining_days_text = "Deadline passed";
                                                                                  } elseif ($remaining_days == 0) {
                                                                                    $remaining_days_text = "Deadline today";
                                                                                  } else {
                                                                                    $remaining_days_text = "$remaining_days days left";
                                                                                  }

                                                                                  echo $remaining_days_text; ?></span>
                                </p>
                                <div class="progress radius-15" style="height:5px;">
                                  <!-- <div class="progress-bar  bg-voilet" role="progressbar" style="width: 55%"></div> -->
                                  <div class="progress-bar <?php echo ($progress_percentage < 70) ? 'bg-voilet' : (($progress_percentage < 99) ? 'bg-warning' : 'bg-danger'); ?>"
                                    role="progressbar"
                                    style="width: <?php echo $progress_percentage; ?>%"
                                    aria-valuenow="<?php echo $progress_percentage; ?>"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                  </div>
                                </div>

                              </div>

                            </div>

                            <?php
                            // Initialize task data array
                            $taskData = [];
                            $dates = [];

                            // Organize data
                            foreach ($mapForTable as $row) {
                              $date = $row['task_date'];
                              $status = $row['task_status'];
                              $count = (int) $row['task_count'];

                              // Collect all unique dates
                              if (!in_array($date, $dates)) {
                                $dates[] = $date;
                              }

                              // Assign task count to respective status
                              $taskData[$status][$date] = $count;
                            }

                            // Ensure all statuses exist for all dates (fill missing data with 0)
                            $statuses = [1, 2, 3, 4, 5];
                            foreach ($statuses as $status) {
                              foreach ($dates as $date) {
                                if (!isset($taskData[$status][$date])) {
                                  $taskData[$status][$date] = 0;
                                }
                              }
                            }

                            // Encode data for JavaScript
                            $chartCategories = json_encode(array_values($dates));
                            $notStartedData = json_encode(array_values($taskData[1] ?? []));
                            $inProgressData = json_encode(array_values($taskData[2] ?? []));
                            $testingData = json_encode(array_values($taskData[3] ?? []));
                            $awaitingData = json_encode(array_values($taskData[4] ?? []));
                            $completedData = json_encode(array_values($taskData[5] ?? []));
                            ?>


                            <div class="card radius-15 border shadow-none" style="padding: 10px">
                              <div class="row">
                                <div class="col-12 col-lg-12">
                                  <div id="container" style="width: 100%; height: 300px; margin: auto;"></div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="  card-info">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal"> New Task </button>

                        </div>
                        <div class="col-sm-3 mt-3">
                          <input type="hidden" name="project_id" id="project_id" value="<?php echo $res['project_id']; ?>">
                          <!--<div class="form-group">
                          
                          
                           <select class="form-control" id="task_id" name="task_id">
                                <option value=""></option>
                               <option value="1">OFFERS ARE NOT GETTING LIVE </option>
                               <option value="9">new paid task</option>
                               <option value="17">test</option>
                           </select>
                          </div>-->
                        </div>
                        <!--<div class="col-sm-3 mt-3">
                          <button class="btn btn-primary" type="button">Filter</button>
                        </div>-->
                      </div>
                      <div class="row mt-3">
                        <div class="col-12 col-lg-2">
                          <div class="card radius-15">
                            <div class="card-body text-center">

                              <h4 class="mb-0 font-weight-bold mt-3">
                                <?php if (!empty($task_no_started)) {
                                  echo $task_no_started['no_started'];
                                } else {
                                  echo "0";
                                } ?>
                              </h4>
                              <p class="mb-0">Not Started</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-3">
                          <div class="card radius-15">
                            <div class="card-body text-center">

                              <h4 class="mb-0 font-weight-bold mt-3">
                                <?php if (!empty($task_in_progress)) {
                                  echo $task_in_progress['in_progress'];
                                } else {
                                  echo "0";
                                } ?>
                              </h4>
                              <p class="mb-0">In Progress </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-2">
                          <div class="card radius-15">
                            <div class="card-body text-center">

                              <h4 class="mb-0 font-weight-bold mt-3">
                                <?php if (!empty($task_testing)) {
                                  echo $task_testing['testing'];
                                } else {
                                  echo "0";
                                } ?>
                              </h4>
                              <p class="mb-0">Testing</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-3">
                          <div class="card radius-15">
                            <div class="card-body text-center">

                              <h4 class="mb-0 font-weight-bold mt-3">
                                <?php if (!empty($task_awaiting_feedback)) {
                                  echo $task_awaiting_feedback['awaiting_feedback'];
                                } else {
                                  echo "0";
                                } ?>
                              </h4>
                              <p class="mb-0">Awaiting Feedback</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-lg-2">
                          <div class="card radius-15">
                            <div class="card-body text-center">

                              <h4 class="mb-0 font-weight-bold mt-3">
                                <?php if (!empty($task_complete)) {
                                  echo $task_complete['complete'];
                                } else {
                                  echo "0";
                                } ?>
                              </h4>
                              <p class="mb-0">Complete</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-sm-12">
                          <div class="table-responsive ">
                            <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                              <thead>
                                <tr>

                                  <th>Action</th>
                                  <th>Sr. No.</th>
                                  <th>Task Name</th>
                                  <th>Work Action</th>
                                  <th>Status</th>
                                  <th>Start Date</th>
                                  <th>Due Date</th>
                                  <!--  <th>Assigned To </th> -->
                                  <th>Spend Time</th>
                                  <th>Estimated Hour</th>
                                  <th>Priority</th>
                                  <th>Details Log</th>

                                </tr>
                              </thead>
                              <tfoot>
                                <tr>

                                  <th>Action</th>
                                  <th>Sr. No.</th>
                                  <th>Task Name</th>
                                  <th>Work Action</th>
                                  <th>Status</th>
                                  <th>Start Date</th>
                                  <th>Due Date</th>
                                  <!--  <th>Assigned To </th> -->
                                  <th>Spend Time</th>
                                  <th>Estimated Hour</th>
                                  <th>Priority</th>
                                  <th>Details Log</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                <?php if (!empty($task_list)) {
                                  $i = 1;
                                  foreach ($task_list as $key_a => $value_tk) { ?>
                                    <tr data-task-id="<?php echo $value_tk['task_id']; ?>">
                                      <td class="">
                                        <div class="dropdown">
                                          <button class="dropbtn">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                          </button>
                                          <div class="dropdown-content">
                                            <a href="javascript:void(0);" onclick="taskFunctionEdit('<?php echo $value_tk['task_id']; ?>')"
                                              class="btn btn-sm btn-info waves-effect waves-light holiday"
                                              style="color:white">
                                              <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="javascript:void(0);" onclick="taskFunctionDelete('<?php echo $value_tk['task_id']; ?>')"
                                              class="btn btn-sm btn-info waves-effect waves-light holiday"
                                              style="color:white">
                                              <i class="fa fa-trash"></i> Delete
                                            </a>
                                            <a href="<?php echo base_url(); ?>project/download_db_docs/<?php echo $value_tk['task_id']; ?>"
                                              class="btn btn-sm btn-info waves-effect waves-light holiday"
                                              style="color:white">
                                              <i class="fa fa-download"></i> Download
                                            </a>
                                            <!--  <a href="javascript:void(0);" onclick="task_timer_count('<?php echo $value_tk['task_id']; ?>')"
                                            class="btn btn-sm btn-info waves-effect waves-light holiday"
                                            style="color:white">
                                            <i class="fa fa-eye"></i> View
                                        </a>-->

                                          </div>
                                        </div>

                                      </td>
                                      <td><?php echo $i++; ?></td>
                                      <td><?php echo $value_tk['task_title']; ?></td>
                                      <td>
                                        <?php
                                        if ($value_tk['task_status'] == '2' || $value_tk['task_status'] == '1') {
                                        ?>
                                          <div>
                                            <?php
                                            if (!empty($value_tk['task_timer'])) {
                                              if ($value_tk['timer_status'] == 'Start') {
                                            ?>
                                                <input type="button" class="btn btn-success input-sm restart_time" id="restart_time" style="display: none;" value="Resume" onclick="restartTime('<?php echo $value_tk['task_id']; ?>')">
                                                <input type="button" class="btn btn-success input-sm stop_time" id="stop_time" style="background-color: red;" onclick="stopTime('<?php echo $value_tk['task_id']; ?>')" value="Stop">
                                                <input type="button" class="btn btn-success input-sm hold_time" id="hold_time" style="background-color: orange;" onclick="holdTime('<?php echo $value_tk['task_id']; ?>')" value="Pause">
                                                <br>
                                                <span id="time"><?php echo $value_tk['task_timer']; ?></span>
                                              <?php
                                              } 
                                              else if ($value_tk['timer_status'] == 'Restart') {
                                            ?>
                                                <input type="button" class="btn btn-success input-sm restart_time" id="restart_time" style="display: none;" value="Resume" onclick="restartTime('<?php echo $value_tk['task_id']; ?>')">
                                                <input type="button" class="btn btn-success input-sm stop_time" id="stop_time" style="background-color: red;" onclick="stopTime('<?php echo $value_tk['task_id']; ?>')" value="Stop">
                                                <input type="button" class="btn btn-success input-sm hold_time" id="hold_time" style="background-color: orange;" onclick="holdTime('<?php echo $value_tk['task_id']; ?>')" value="Pause">
                                                <br>
                                                <span id="time"><?php echo $value_tk['task_timer']; ?></span>
                                              <?php
                                              } else {
                                              ?>
                                                <input type="button" class="btn btn-success input-sm restart_time" id="restart_time" style="" value="Resume" onclick="restartTime('<?php echo $value_tk['task_id']; ?>')">
                                                <input type="button" class="btn btn-success input-sm stop_time" id="stop_time" style="background-color: red;" onclick="stopTime('<?php echo $value_tk['task_id']; ?>')" value="Stop">
                                                <input type="button" class="btn btn-success input-sm hold_time" id="hold_time" style="background-color: orange;display: none;" onclick="holdTime('<?php echo $value_tk['task_id']; ?>')" value="Pause">
                                                <br>
                                                <span id="time"><?php echo $value_tk['task_timer']; ?></span>
                                              <?php
                                              }
                                            } else {
                                              ?>
                                              <input type="button" class="btn btn-success input-sm start_time" id="start_time" value="Start Work" onclick="startTime('<?php echo $value_tk['task_id']; ?>')">
                                              <input type="button" class="btn btn-success input-sm restart_time" id="restart_time" style="display: none;" value="Resume" onclick="restartTime('<?php echo $value_tk['task_id']; ?>')">
                                              <input type="button" class="btn btn-success input-sm stop_time" id="stop_time" style="background-color: red;display: none;" onclick="stopTime('<?php echo $value_tk['task_id']; ?>')" value="Stop">
                                              <input type="button" class="btn btn-success input-sm hold_time" id="hold_time" style="background-color: orange;display: none;" onclick="holdTime('<?php echo $value_tk['task_id']; ?>')" value="Pause">
                                              <br>
                                              <span id="time"></span>
                                            <?php
                                            }
                                            ?>

                                          </div>
                                        <?php } else {
                                          echo "Complete";
                                        } ?>
                                      </td>

                                      <!-- <td>  <select class="form-control" onchange="work_status(this.value,'<?php echo $value_tk['task_id']; ?>')" name="task_status">
                                      <?php
                                      foreach ($work_status as $k => $val) {
                                      ?>
                                      <option value="<?php echo $val['tws_id']; ?>" <?php if ($value_tk['task_status'] == $val['tws_id']) {
                                                                                      echo 'selected=""';
                                                                                    } ?>> <?php echo $val['name']; ?></option>
                                    <?php } ?>
                                     </select></td> -->
                                      <td>
                                        <?php
                                        foreach ($work_status as $val) {
                                          if ($value_tk['task_status'] == $val['tws_id']) {
                                            echo $val['name']; // Display only the matching status name
                                            break;
                                          }
                                        }
                                        ?>
                                      </td>
                                      <td><?php echo $value_tk['start_date']; ?></td>
                                      <td><?php echo $value_tk['end_date']; ?></td>
                                      <!-- <td> <?php
                                                /*echo "<pre>"; print_r($task_timer); exit;*/
                                                $sum = 0;
                                                $newarr = array();
                                                foreach ($task_timer as $key => $value) {

                                                  $hourdiff = round((strtotime($value['end_time']) - strtotime($value['start_time'])) / 3600, 2);
                                                  $sum += $hourdiff;

                                                  if (array_key_exists($value['task_id'], $newarr)) {

                                                    $newarr[$value['task_id']] = $newarr[$value['task_id']] + $hourdiff;
                                                  } else {
                                                    $newarr[$value['task_id']] = $hourdiff;
                                                  }
                                                }

                                                if (strpos($newarr[$value_tk['task_id']], "0.") !== false) {

                                                  $Minuts = $newarr[$value_tk['task_id']] * 60;

                                                  echo $Minuts . "\r" . 'Minutes';
                                                } else {

                                                  echo $newarr[$value_tk['task_id']] . "\r" . 'Hours';
                                                }



                                                ?></td> -->
                                      <!-- <td>
                             <?php
                                    $spend_hour = 0;
                                    $estimated_hour = $value_tk['estimated_days'];

                                    foreach ($task_timer as $key => $value) {
                                      if ($value_tk['task_id'] == $value['task_id']) {
                                        $spend_hour = $value['spend_hour'];
                                        echo $value['spend_hour'] . ' Hrs'; // Display only the matching status name
                                        break;
                                      }
                                    }
                                    // Avoid division by zero
                                    $percentage = ($estimated_hour > 0) ? ($spend_hour / $estimated_hour) * 100 : 0;

                                    // Determine the color class based on percentage
                                    $colorClass = "text-success"; // Default green
                                    if ($percentage >= 95) {
                                      $colorClass = "text-danger"; // Red
                                    } elseif ($percentage >= 75) {
                                      $colorClass = "text-warning"; // Orange
                                    } elseif ($percentage >= 50) {
                                      $colorClass = "text-yellow"; // Yellow
                                    }
                              ?>
                                        <span class="<?php echo $colorClass; ?>">
                                          <?php echo $spend_hour . ' Hrs'; ?>
                                      </span>
                                                              </td> -->

                                      <td style="background-color: 
                                      <?php
                                      $spend_hour = 0;
                                      $estimated_hour = $value_tk['estimated_days'];

                                      foreach ($task_timer as $value) {
                                        if ($value_tk['task_id'] == $value['task_id']) {
                                          $spend_hour = $value['spend_hour']; // Get spend hour
                                          break;
                                        }
                                      }

                                      // Avoid division by zero
                                      $percentage = ($estimated_hour > 0) ? ($spend_hour / $estimated_hour) * 100 : 0;

                                      // Determine the background color based on percentage
                                      if ($percentage >= 95) {
                                        echo "red";  // 🔴 More than 95% - Red
                                      } elseif ($percentage >= 75) {
                                        echo "orange";  // 🟠 Between 75% - 95% - Orange
                                      } elseif ($percentage >= 50) {
                                        echo "yellow";  // 🟡 Between 50% - 75% - Yellow
                                      } else {
                                        echo "#99ff99";  // 🟢 Less than 50% - Green
                                      }
                                      ?>; padding: 10px; text-align: center;">
                                        <?php echo $spend_hour . ' Hrs'; ?>
                                      </td>
                                      <td><?php echo $value_tk['estimated_days'] . ' Hrs'; ?></td>
                                      <td><?php if ($value_tk['task_priority'] == 1) {
                                            echo "Low";
                                          } else if ($value_tk['task_priority'] == 2) {
                                            echo "Medium";
                                          } else if ($value_tk['task_priority'] == 3) {
                                            echo "High";
                                          } else if ($value_tk['task_priority'] == 4) {
                                            echo "Urgent";
                                          } ?></td>
                                      <td>
                                        <button class="btn btn-info btn-sm view-details"
                                          data-task-id="<?php echo $value_tk['task_id']; ?>"
                                          data-project-id="<?php echo $value_tk['project_id']; ?>">
                                          <i class="fa fa-eye"></i> View Details
                                        </button>
                                      </td>

                                    </tr>
                                <?php  }
                                } ?>

                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <!--    <div class="card-footer"><button type="submit" class="btn btn-info float-right">Submit</button></div> -->
                    <!-- /.card-footer -->
                  </div>
                  <!-- /.card -->
                </div>


              </div>
            </div>

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">New Timesheet</button>
                </div>
                <div class="col-sm-12 mt-3">
                  <div class="table-responsive ">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Action</th>
                          <th>MemberMember</th>
                          <th>Task</th>
                          <th>Time Sheet Tags </th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <!--  <th>Assigned To </th> -->
                          <th>Note</th>
                          <th>Time(H) </th>

                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Action</th>
                          <th>MemberMember</th>
                          <th>Task</th>
                          <th>Time Sheet Tags </th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <!--  <th>Assigned To </th> -->
                          <th>Note</th>
                          <th>Time(H) </th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td class="">
                            <div class="dropdown">
                              <button class="dropbtn">
                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                              </button>
                              <div class="dropdown-content">
                                <a href="#" style=" background-color: #007bff;color:white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  <i class="fa fa-edit"></i> Edit </a>
                                <a href="#" style=" background-color: red;color:white">
                                  <i class="fa fa-trash"></i> Delete </a>
                              </div>
                            </div>
                          </td>
                          <td>Superadmin IT </td>
                          <td>OFFERS ARE NOT GETTING LIVE </td>
                          <td>TDS</td>
                          <td>2022-04-25 15:22:00 </td>
                          <!--   <td></td> -->
                          <td>2022-04-30 15:23:00 </td>
                          <td>-</td>
                          <td>120</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Time sheet</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group col-sm-12">
                          <label for="subject" class="col-form-label"> Tags <span class="text-danger">*</span></label>
                          <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter the subject" value="Sample Subject">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="start_date" class="col-form-label">Start Time <span class="text-danger">*</span></label>
                          <input type="time" name=" " class="form-control" id=" " value="2025-01-28">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="due_date" class="  col-form-label">End Time <span class="text-danger">*</span></label>
                          <input type="time" name=" " class="form-control" id=" " value="2025-02-10">
                        </div>


                        <div class="form-group col-sm-12">
                          <label for="tags" class="col-form-label">Task </label>
                          <input type="text" name=" " class="form-control" id="tags" placeholder=" " value=" ">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="tags" class="col-form-label">Member </label>
                          <input type="text" name=" " class="form-control" id="tags" placeholder=" " value=" ">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="task_description" class="col-sm-4 col-form-label">Note</label>
                          <div class="col-sm-12">
                            <textarea id="task_description" name="task_description" class="form-control" placeholder="Enter task description">Sample task description goes here.</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Add</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="milestones" role="tabpanel" aria-labelledby="milestones-tab">
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#milestonesModal">New Milestones</button>

                </div>

                <div class="col-sm-12 mt-3">
                  <div class="table-responsive ">
                    <table id="example2" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Action</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Order</th>
                          <th>Due Date</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Action</th>
                          <th>Sr. No.</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Order</th>
                          <th>Due Date</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php if (!empty($milestone_list)) {
                          $i = 1;
                          foreach ($milestone_list as $key_m => $value_m) { ?>
                            <tr>
                              <td class="">
                                <div class="dropdown">
                                  <button class="dropbtn">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                  </button>
                                  <div class="dropdown-content">
                                    <a href="javascript:void(0);" data-bs-toggle="modal"
                                      data-bs-target="#editMileStoneModal<?php echo $value_m['pm_id']; ?>"
                                      class="btn btn-sm btn-info waves-effect waves-light holiday"
                                      style="color:white">
                                      <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <!-- <a href="javascript:void(0);" onclick="milestoneFunctionGet('<?php echo $value_m['pm_id']; ?>')"
                                      class="btn btn-sm btn-info waves-effect waves-light holiday"
                                      style="color:white">
                                      <i class="fa fa-edit"></i> Edit
                                    </a> -->
                                    <a href="javascript:void(0);" onclick="milestoneFunctionDelete('<?php echo $value_m['pm_id']; ?>')"
                                      class="btn btn-sm btn-info waves-effect waves-light holiday"
                                      style="color:white">
                                      <i class="fa fa-trash"></i> Delete
                                    </a>
                                  </div>
                                </div>
                              </td>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value_m['milestones_name']; ?></td>
                              <td><?php echo $value_m['description']; ?></td>
                              <td><?php echo $value_m['order']; ?></td>
                              <td><?php echo $value_m['due_date']; ?></td>

                            </tr>

                            <!-- Update Milestone modal -->
                            <div class="modal fade" id="editMileStoneModal<?php echo $value_m['pm_id']; ?>" tabindex="-1" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-lg">
                                <form method="post" action="<?php echo base_url(); ?>Project/update_project_milestone" enctype="multipart/form-data">
                                  <input type="hidden" name="pm_id" value="<?php echo $value_m['pm_id']; ?>" />
                                  <input type="hidden" name="project_id" value="<?php echo $value_m['project_id']; ?>" />
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Edit Milestone</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                      <div class="row">
                                        <div class="col-sm-12 mt-3">
                                          <div class="form-group">
                                            <label for="companyName"> Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="mil_name" name="milestones_name" value="<?php echo $value_m['milestones_name']; ?>" placeholder="" required>
                                            <span style="color:red;" id="mil_name_msg"></span>
                                          </div>
                                        </div>

                                        <div class="col-sm-12 mt-3">
                                          <div class="form-group">
                                            <label for="companyName"> Due Date <span class="text-danger">*</span></label>
                                            <input type="datetime-local" class="form-control" id="m_due_date" name="due_date" value="<?php echo $value_m['due_date']; ?>" placeholder="" required>
                                            <span style="color:red;" id="due_date_msg"></span>
                                          </div>
                                        </div>

                                        <div class="col-sm-12 mt-3">
                                          <div class="form-group">
                                            <label for=""> Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" id="mile_description" name="description" required><?php echo $value_m['description']; ?></textarea>
                                            <span style="color:red;" id="description_msg"></span>
                                          </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                          <label class="checkbox-inline">
                                            <input type="checkbox" value="on" id="show_description_to_customer" <?php if ($value_m['show_description_to_customer'] == 'on') {
                                                                                                                  echo 'checked';
                                                                                                                } ?>> Show description to customer </label>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                          <div class="form-group">
                                            <label for="companyName">Order <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="order" name="order" placeholder="" value="<?php echo $value_m['order']; ?>" required>
                                            <span id="order_msg"></span>
                                          </div>
                                        </div>
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
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="commercial" role="tabpanel" aria-labelledby="commercial-tab">
              <div class="row">
                <div class="col-md-12 attachment_div" style="margin-top: 20px">
                  <form method="post" name="add_task_from" class="form-validate" action="<?php echo base_url('project/submitfiles/' . $this->uri->segment(2)); ?>" onsubmit="return validate_add_attachment(this)" enctype="multipart/form-data">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="feature_table_covering">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>File ype</th>
                            <th>Image Preview</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="file_covering_body">
                          <tr>
                            <td> 1 </td>
                            <td>
                              <input type="file" onchange="previewImage(event)" name="file_covering[]" class="form-control adv_file" id="covering_1" accept=".png, .jpg, .jpeg, .pdf">
                            </td>
                            <td>
                              <img
                                id="imagePreview" style="width: 125px; border-radius: 20%; height: 125px"
                                onclick="document.getElementById('fileInput').click();">
                            </td>
                            <td>
                              <div class="form-group">
                                <button type="button" class="btn btn-danger" onclick="removecover(1)">
                                  <i class="fa fa-minus"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="4">
                              <div class="form-group">
                                <button type="button" class="btn btn-primary" onclick="addcover()">
                                  <i class="fa fa-plus"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                      <span id="att_err1" style="color:red;"></span>
                    </div>
                </div>
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>

                <script>
                  function previewImage(event) {
                    var reader = new FileReader();
                    var file = event.target.files[0];
                    reader.onload = function(e) {
                      // Set the image preview to the selected file
                      document.getElementById('imagePreview').src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                    // Set the image preview to the selected file

                  }

                  let coverCount = 1; // Updated variable name

                  function addcover() {
                    coverCount++; // Increment the corrected variable
                    const tableBody = document.getElementById('file_covering_body');

                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                             <td>${coverCount}</td>  <!-- ID column -->
        
                                  <td>
                                      <input type="file" onchange="previewImage1(event, ${coverCount})" name="file_covering[]" class="form-control" id="covering_${coverCount}" accept=".png, .jpg, .jpeg, .pdf">
                                  </td>
                                  
                                  <td> 
                                  <img
                                id="imagePreview1${coverCount}" style="width: 125px; border-radius: 20%; height: 125px"
                                onclick="document.getElementById('fileInput').click();">
                                  </td>
                                  
                                  <td>
                                      <div class="form-group">
                                          <button type="button" class="btn btn-danger" onclick="removecover(${coverCount})">
                                              <i class="fa fa-minus"></i>
                                          </button>
                                      </div>
                                  </td>
                              `;
                    tableBody.appendChild(newRow);
                  }

                  function previewImage1(event, id) {
                    var reader = new FileReader();
                    var file = event.target.files[0];
                    reader.onload = function(e) {
                      // Set the image preview to the selected file
                      document.getElementById('imagePreview1' + id).src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                    // Set the image preview to the selected file

                  }

                  function removecover(id) {
                    const rowToRemove = document.getElementById(`covering_${id}`).closest('tr');
                    rowToRemove.remove();
                  }
                </script>
              </div>
              <div class="row mt-3">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table id="example" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                      <thead class="table-white">
                        <tr>
                          <th>Action</th>
                          <th>S. No.</th>
                          <th>File Name</th>
                          <th>File Type</th>
                          <!-- <th>Last Activity</th>
                          <th>Total Comments</th> -->
                          <th>Uploaded By</th>
                          <th>Date Uploaded</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($files_list)) {
                          $i = 1;
                          foreach ($files_list as $key_f => $value_f) { ?>
                            <tr>
                              <td class="">
                                <div class="dropdown">
                                  <button class="dropbtn">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                  </button>
                                  <div class="dropdown-content">

                                    <a href="javascript:void(0);" onclick="fileFunctionDelete('<?php echo $value_f['pf_id']; ?>')"
                                      class="btn btn-sm btn-info waves-effect waves-light holiday"
                                      style="color:white">
                                      <i class="fa fa-trash"></i> Delete
                                    </a>
                                  </div>
                                </div>
                              </td>
                              <td><?php echo $i++; ?></td>
                              <td><img width="100px" height="80px" src="<?php echo base_url('uploads/project/' . $value_f['file_name']); ?>"></td>
                              <td><?php echo $value_f['file_type']; ?></td>
                              <td><?php echo $value_f['user_name'];; ?></td>
                              <td><?php echo $value_f['created_date']; ?></td>

                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="term-and-condtion" role="tabpanel" aria-labelledby="term-and-condtion-tab">
              <div class="row">
                <div class="col-sm-12">
                  <button type="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#discussionModal">Create Discussion </button>
                </div>
                <div class="col-sm-12 mt-3">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%" id="discussion_list">
                      <thead>
                        <tr>
                          <th>Action</th>
                          <th>S. No.</th>
                          <th>Subject </th>
                          <th>Description</th>
                          <th>Visible To Customer </th>
                        </tr>
                      </thead>
                      <tbody id="">
                        <?php if (!empty($project_discussion)) {
                          $i = 1;
                          foreach ($project_discussion as $key_dis => $value_dis) { ?>
                            <tr>
                              <td class="">
                                <div class="dropdown">
                                  <button class="dropbtn">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                  </button>
                                  <div class="dropdown-content">
                                    <a href="javascript:void(0);" onclick="discussionFunctionEdit('<?php echo $value_dis['pd_id']; ?>')"
                                      class="btn btn-sm btn-info waves-effect waves-light holiday"
                                      style="color:white">
                                      <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <a href="javascript:void(0);" onclick="discussionFunctionDelete('<?php echo $value_dis['pd_id']; ?>')"
                                      class="btn btn-sm btn-info waves-effect waves-light holiday"
                                      style="color:white">
                                      <i class="fa fa-trash"></i> Delete
                                    </a>
                                  </div>
                                </div>
                              </td>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value_dis['subject']; ?></td>
                              <!--  <td><?php //echo 'No Activity'; 
                                        ?></td> -->
                              <td><?php echo $value_dis['description']; ?></td>
                              <td><?php if ($value_dis['visible_to_customer'] == 'on') {
                                    echo "Visible";
                                  } else {
                                    echo "Not Visible";
                                  } ?></td>

                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
              <div class="row">

                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12 mt-3">
                      <div class="form-group">
                        <label for="addressLine1">Notes </label>
                        <textarea class="editor form-control" id="summernote"></textarea>
                        <span id="err_note" style="color:red;"></span>
                      </div>
                    </div>

                    <div class="col-sm-12 mt-3">
                      <button type="btn" class="btn btn-primary" id="save_note" onclick="addNote()">Save</button>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12 mt-5">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="notes_list">
                      <thead class="table-white">
                        <tr>
                          <th>Action</th>
                          <th>S.No.</th>
                          <th>Note</th>
                          <th>Created Date </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php $s_no = 1;
                        if (!empty($project_note)) {
                          foreach ($project_note as $key_pn => $val_pn) { ?>
                            <tr>
                              <td class="">
                                <div class="dropdown">
                                  <button class="dropbtn">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                  </button>
                                  <div class="dropdown-content">
                                    <a href="javascript:void(0);" onclick="noteFunctionEdit('<?php echo $val_pn['note_id']; ?>')"
                                      class="btn btn-sm btn-info waves-effect waves-light holiday"
                                      style="color:white">
                                      <i class="fa fa-edit"></i> Edit
                                    </a>

                                  </div>
                                </div>
                              <td><?php echo $s_no++; ?></td>
                              <td><?php echo $val_pn['note']; ?>

                                <!-- <textarea class="editor form-control" id="summernote"></textarea> -->
                              </td>
                              <td><?php echo $val_pn['created_date']; ?></td>

                            </tr>

                          <?php  }
                        } else { ?>
                          <tr>
                            <td colspan="6" style="text-align:center;">No Record Found</td>
                          </tr>
                        <?php } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
              <div class="row">
                <!-- <div class="col-sm-12">
                  <button type="btn" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transactionModal">Create Discussion </button>
                </div> -->
                <div class="col-sm-12 mt-3">
                  <div class="table-responsive">
                    <table class="table table-bordered nomargin" id="transaction_list">
                      <thead>
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Date</th>
                          <th scope="col">Description</th>
                          <th scope="col">Invoice / Receipt No. </th>
                          <th scope="col">Debit</th>
                          <th scope="col">Credit</th>
                          <th scope="col">Balance</th>
                        </tr>
                      </thead>
                      <tbody id="">
                        <tr>
                          <td>1</td>
                          <td>2025-01-30</td>
                          <td>Purchase of goods</td>
                          <td>TXN12345</td>
                          <td>5000</td>
                          <td>0</td>
                          <td>5000</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>2025-01-29</td>
                          <td>Payment received</td>
                          <td>TXN12346</td>
                          <td>0</td>
                          <td>3000</td>
                          <td>2000</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="logs" role="tabpanel" aria-labelledby="logs-tab">
              <div class="row">
                <!-- <h5 class="card-title">Logs</h5> -->
                <!-- <div class="col-sm-12"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">New Task</button></div> -->
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="activity_list">
                      <thead class="table-white">
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>User</th>
                          <th>Activity Done ON</th>
                          <th>Action</th>
                          <th>Activity ID</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($log_list)) {
                          $dtlID = 1;
                          foreach ($log_list as $key_a => $value_l) { ?>
                            <tr>
                              <td><?php echo ++$key_a; ?></td>
                              <td><?php echo $value_l['created_date']; ?></td>
                              <td><?php echo $value_l['user_name']; ?></td>
                              <td><?php
                                  $activities = [1 => "Task", 2 => "Time Sheet", 3 => "Milestone", 4 => "Files", 5 => "Discussion", 6 => 'Notes'];
                                  echo $activities[$value_l['activity_id']] ?? 'Unknown';
                                  ?></td>
                              <td><?php
                                  $actions = [1 => "Add", 2 => "Edit/Update", 3 => "Delete"];
                                  echo $actions[$value_l['action_id']] ?? 'Unknown';
                                  ?></td>
                              <td><?php
                                  $activity_labels = [1 => "Task ID", 2 => "Time Sheet ID", 3 => "Milestone ID", 4 => "Files ID", 5 => "Discussion ID", 6 => 'Notes'];
                                  echo ($activity_labels[$value_l['activity_id']] ?? 'ID') . ":- " . $value_l['affected_id'];
                                  ?></td>

                              <td>
                                <?php
                                if (!empty($value_l['details'])) {
                                  $details_id = 'detailsModal' . $i; ?>

                                  <!-- View Details Button -->
                                  <button type="button" class="btn btn-primary btn-sm view-details-btn" data-target="#<?php echo $details_id; ?>">
                                    View Details
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="<?php echo $details_id; ?>" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel<?php echo $i; ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="detailsModalLabel<?php echo $i; ?>">Change Details</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="table-responsive">
                                            <?php
                                            $details = json_decode($value_l['details'], true);
                                            if (is_array($details)) { ?>

                                              <table class="table table-bordered ">
                                                <thead>
                                                  <tr>
                                                    <th>Field</th>
                                                    <th>Old Data</th>
                                                    <th>New Data</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php foreach ($details as $change) { ?>
                                                    <tr>
                                                      <td><?php echo htmlspecialchars($change['field']); ?></td>
                                                      <td><?php echo htmlspecialchars($change['old_value']); ?></td>
                                                      <td><?php echo htmlspecialchars($change['new_value']); ?></td>
                                                    </tr>
                                                  <?php } ?>
                                                </tbody>
                                              </table>
                                            <?php } else {
                                              echo "No details available.";
                                            } ?>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <?php } else {
                                  echo "No details available.";
                                } ?>
                              </td>
                            </tr>
                        <?php }
                        } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>#</th>
                          <th>Date</th>
                          <th>User</th>
                          <th>Activity Done ON</th>
                          <th>Action</th>
                          <th>Activity ID</th>
                          <th>Details</th>
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

<div class="modal fade" id="discussionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Discussion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Subject <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="discussion_subject" placeholder="" required>
                <span style="color:red;" id="discussion_subject_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for=""> Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="discuss_description" required></textarea>
                <span style="color:red;" id="description_msg"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <label class="checkbox-inline">
                <input type="checkbox" value="on" id="visible_to_customer"> Visible to Customer </label>
            </div>
          </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_discussion" onclick="saveDiscussion()">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editdiscussionModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Edit Discussion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Subject</label>
                <input type="text" class="form-control" id="edit_discussion_subject" name="subject" placeholder="">
                <input type="hidden" name="pd_id" class="form-control" id="edit_discussion_id">
                <span style="color:red;" id="edit_discussion_subject_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for=""> Description</label>
                <textarea class="form-control" id="edit_discuss_description" name="description"></textarea>
                <span style="color:red;" id="edit_description_msg"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <label class="checkbox-inline">
                <input type="checkbox" value="on" id="edit_visible_to_customer" name="visible_to_customer"> Visible to Customer </label>
            </div>
          </div>
      </div>
      <!-- </form> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="updateDiscussion()">Update</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="milestonesModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Milestone</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="mil_name" placeholder="" required>
                <span style="color:red;" id="mil_name_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Due Date <span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control" id="m_due_date" placeholder="" required>
                <span style="color:red;" id="due_date_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for=""> Description <span class="text-danger">*</span></label>
                <textarea class="form-control" id="mile_description" required></textarea>
                <span style="color:red;" id="description_msg"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <label class="checkbox-inline">
                <input type="checkbox" value="on" id="show_description_to_customer"> Show description to customer </label>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName">Order <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="order" placeholder="" required>
                <span id="order_msg"></span>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="add_milestones()">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="editmilestonesModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Milestone</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Name<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="e_mil_name" placeholder="">
                <span style="color:red;" id="e_mil_name_msg"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Due Date<span class="text-danger">*</span></label>
                <input type="datetime-local" class="form-control" id="e_due_date" placeholder="">
                <span id="e_due_date_msg" style="color:red;"></span>
              </div>
            </div>

            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for=""> Description<span class="text-danger">*</span></label>
                <textarea class="form-control" id="e_description"></textarea>
                <span style="color:red;" id="e_description_msg"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <label class="checkbox-inline">
                <input type="checkbox" value="on" id="e_show_description_to_customer">
                Show description to customer </label>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName">Order* </label>
                <input type="text" class="form-control" id="e_order" placeholder="">
                <input type="hidden" id="e_m_id">
                <span id="e_order_msg"></span>
              </div>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="save_milestones()">Add</button>
      </div>
    </div>
  </div>
</div>



<!-- 
<div class="modal fade" data-bs-toggle="modal" data-bs-target="#openModal" >
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Discussion</h5>
        <span id="closeModal" class="close">&times;</span>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="companyName">Name </label>
              <input type="text" class="form-control" id="name" placeholder="" required>
            </div>
          </div>
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for="contactPerson">Due date </label>
               <input type="date" class="form-control" id="name" placeholder="" required>
            </div>
          </div>
          <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for=""> Description</label>
              <textarea class="form-control"></textarea>
            </div>
          </div>
          <div class="col-sm-12 mt-3">
            <label class="checkbox-inline">
              <input type="checkbox" value=""> Show description to customer </label>
          </div>

           <div class="col-sm-12 mt-3">
            <div class="form-group">
              <label for=""> Order </label>
              <input type="text" class="form-control" id="name" placeholder="" required>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="deleteButton">Delete</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div> -->







<script>
  // Get elements
  const modal = document.getElementById("myModal");
  const openModalBtn = document.getElementById("openModal");
  const closeModalBtn = document.getElementById("closeModal");
  const deleteButton = document.getElementById("deleteButton");

  // Open modal
  openModalBtn.addEventListener("click", () => {
    modal.classList.add("show");
  });

  // Close modal
  closeModalBtn.addEventListener("click", () => {
    modal.classList.remove("show");
  });

  // Delete action and close modal
  deleteButton.addEventListener("click", () => {
    alert("Item deleted!"); // Replace with actual delete logic
    modal.classList.remove("show");
  });

  // Close the modal when clicking outside the content
  window.addEventListener("click", (e) => {
    if (e.target === modal) {
      modal.classList.remove("show");
    }
  });
</script>
<div class="modal fade" id="taskModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form method="post" name="add_task_from" class="form-validate" action="<?php echo base_url('project/submittask/' . $this->uri->segment(2)); ?>" onsubmit="return validate_add_task(this)" enctype="multipart/form-data">
          <div class="form-group col-sm-12 mb-3">
            <label class="col-form-label" style="float: right;">
              <a href="javascript:void(0)" class="attachment" id="attachment-link">Attachment</a>
            </label>
          </div>

          <div id="attachmentDiv" class="toggle-div mt-5" style="display:none;">
            <div class="row">
              <div class="col-md-12 attachment_div" style="margin-top: 20px">
                <div class="table-responsive">
                  <table class="table table-bordered" id="add_attachment">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>File ype</th>
                        <th> Image Preview</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> 1 </td>
                        <td>
                          <input type="file" name="file_covering[]" class="form-control" id="covering">
                        </td>
                        <td> Image
                          <!-- <img src=""> -->
                        </td>
                        <td>
                          <div class="form-group">
                            <button type="button" class="btn btn-danger" onclick="removeBannerCovering(0)">
                              <i class="fa fa-minus"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4">
                          <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="add_attachement_sheet()">
                              <i class="fa fa-plus"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                  <span id="sp_err" style="color: red;"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label for="subject" class="col-form-label">Subject <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="task_title" id="tsubject" placeholder="Enter the subject">
            <span id="subject_err" style="color:red;"></span>
          </div>
          <div class="form-group col-sm-12">
            <label for="start_date" class="col-form-label">Start Date <span class="text-danger">*</span></label>
            <input type="date" name="start_date" class="form-control" id="addStartDate" placeholder="Enter the start date" value="<?php echo date('Y-m-d'); ?>">
            <span id="stdt_err" style="color:red;"></span>
          </div>
          <div class="form-group col-sm-12">
            <label for="due_date" class="col-form-label">Due Date <span class="text-danger">*</span></label>
            <input type="date" name="end_date" class="form-control" id="addEndDate" placeholder="Enter the due date">
            <span id="dudt_err" style="color:red;"></span>
          </div>

          <div class="form-group col-sm-12">
            <label for="due_date" class="col-form-label">Estimated Hours <span class="text-danger">*</span></label>
            <input type="number" name="estimated_days" class="form-control" id="estimated_days" placeholder="Enter estimated hours for the task">
            <span id="esthr_err" style="color:red;"></span>
          </div>

          <div class="form-group col-sm-12">
            <label for="priority" class="col-form-label">Priority <span class="text-danger">*</span></label>
            <select class="form-control" id="priority" name="task_priority">
              <option value=""></option>
              <option value="1">Low</option>
              <option value="2">Medium</option>
              <option value="3">High</option>
              <option value="4">Urgent</option>
            </select>
            <span id="priority_err" style="color:red;"></span>
          </div>
          <!-- <div class="form-group col-sm-12">
            <label for="repeat_every" class="col-form-label">Repeat every<span class="text-danger">*</span></label>
            <select class="form-control" name="repeat_every" id="repeat_every">
              <option value="9">Every Day</option>
              <option value="1">Week</option>
              <option value="2">2 Weeks</option>
              <option value="3">1 Month</option>
              <option value="4">2 Months</option>
              <option value="5">3 Months</option>
              <option value="6">6 Month</option>
              <option value="7">1 Year</option>
              <option value="8">Custom</option>
              <option value="10" selected>1 Time</option>
            </select>
          </div> -->
          <div class="form-group col-sm-12">
            <label for="related_to" class="col-form-label">Related To <span class="text-danger">*</span></label>
            <input type="text" name="related_to" class="form-control" id="related_to" placeholder="Enter the due date" value="Project" readonly>
            <!-- <select class="form-control" name="related_to" id="related_to">
                        <option value="1">Project</option>
                        <option value="2" selected>Invoice</option>
                        <option value="3">Customer</option>
                    </select> -->
          </div>
          <div class="form-group col-sm-12">
            <label for="tags" class="col-form-label">Milestone</label>
            <select class="form-control" id="milestone_id" name="milestone_id">
              <option value=""></option>
              <?php if (!empty($milestone_list)) {
                $i = 1;
                foreach ($milestone_list as $key_m => $value_m) { ?>
                  <option value="<?php echo $value_m['pm_id'] ?>"><?php echo $value_m['milestones_name'] ?></option>
              <?php }
              } ?>
            </select>
          </div>
          <div class="form-group col-sm-12">
            <label for="task_description" class="col-sm-4 col-form-label">Task Description</label>
            <div class="col-sm-12">
              <textarea id="task_description" name="task_description" class="form-control" placeholder="Enter task description">Sample task description goes here.</textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save </button>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add Holiday Modal: Set min date
    const addModal = document.getElementById('taskModal');
    addModal.addEventListener('shown.bs.modal', function() {
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('addStartDate').setAttribute('min', today);
      document.getElementById('addEndDate').setAttribute('min', today);

      addStartDate.addEventListener('change', function() {
        if (addStartDate.value) {
          const selectedStart = new Date(addStartDate.value);
          selectedStart.setDate(selectedStart.getDate() + 1); // optional: disable the same day
          const minEndDate = selectedStart.toISOString().split('T')[0];
          addEndDate.value = ""; // clear old value
          addEndDate.setAttribute('min', minEndDate);
        }
      });

    });
  });

  document.getElementById('attachment-link').addEventListener('click', function() {
    const div = document.getElementById('attachmentDiv');
    div.style.display = div.style.display === 'none' || div.style.display === '' ? 'block' : 'none';
  });
</script>

<div class="modal fade" id="edittaskModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

        <form method="post" name="edit_task_from" class="form-validate" action="<?php echo base_url('project/updatetask/' . $this->uri->segment(2)); ?>" onsubmit="return validate_edit_task(this)" enctype="multipart/form-data">
          <div class="form-group col-sm-12 mb-3">
            <label class="col-form-label" style="float: right;">
              <a href="javascript:void(0)" class="attachment" id="edit_attachment-link">Attachment</a>
            </label>
          </div>

          <div id="edit_attachmentDiv" class="toggle-div mt-5" style="display:none;">
            <div class="row">
              <div class="col-md-12 attachment_div" style="margin-top: 20px">
                <div class="table-responsive">
                  <table class="table table-bordered" id="edit_attachment">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>File ype</th>
                        <th> Image Preview</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td> 1 </td>
                        <td>
                          <input type="file" name="file_covering_edit[]" class="form-control" id="edit_covering">

                        </td>
                        <td> Image
                          <!-- <img src=""> -->
                        </td>
                        <td>
                          <div class="form-group">
                            <button type="button" class="btn btn-danger" onclick="edit_removeBannerCovering(0)">
                              <i class="fa fa-minus"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="4">
                          <div class="form-group">
                            <button type="button" class="btn btn-primary" onclick="edit_add_attachement_sheet()">
                              <i class="fa fa-plus"></i>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                  <span id="edit_sp_err" style="color: red;"></span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group col-sm-12">
            <label for="subject" class="col-form-label">Subject <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="task_title" id="edit_subject" placeholder="Enter the subject">
            <span id="edit_subject_err" style="color:red;"></span>
            <input type="hidden" name="task_id" class="form-control" id="edit_task_id">
          </div>
          <div class="form-group col-sm-12">
            <label for="start_date" class="col-form-label">Start Date <span class="text-danger">*</span></label>
            <input type="date" name="start_date" class="form-control" id="edit_start_date" placeholder="Enter the start date" value="<?php echo date('Y-m-d'); ?>">
            <span id="edit_stdt_err" style="color:red;"></span>
          </div>
          <div class="form-group col-sm-12">
            <label for="due_date" class="col-form-label">Due Date <span class="text-danger">*</span></label>
            <input type="date" name="end_date" class="form-control" id="edit_due_date" placeholder="Enter the due date">
            <span id="edit_dudt_err" style="color:red;"></span>
          </div>

          <div class="form-group col-sm-12">
            <label for="due_date" class="col-form-label">Estimated Hours <span class="text-danger">*</span></label>
            <input type="number" name="estimated_days" class="form-control" id="edit_estimated_days" placeholder="Enter estimated hours for the task">
            <span id="edit_esthr_err" style="color:red;"></span>
          </div>

          <div class="form-group col-sm-12">
            <label for="priority" class="col-form-label">Priority <span class="text-danger">*</span></label>
            <select class="form-control" id="edit_priority" name="task_priority">
              <option value=""></option>
              <option value="1">Low</option>
              <option value="2">Medium</option>
              <option value="3">High</option>
              <option value="4">Urgent</option>
            </select>
            <span id="edit_priority_err" style="color:red;"></span>
          </div>
          <!-- <div class="form-group col-sm-12">
            <label for="repeat_every" class="col-form-label">Repeat every<span class="text-danger">*</span></label>
            <select class="form-control" name="repeat_every" id="edit_repeat_every">
              <option value="9">Every Day</option>
              <option value="1">Week</option>
              <option value="2">2 Weeks</option>
              <option value="3">1 Month</option>
              <option value="4">2 Months</option>
              <option value="5">3 Months</option>
              <option value="6">6 Month</option>
              <option value="7">1 Year</option>
              <option value="8">Custom</option>
              <option value="10" selected>1 Time</option>
            </select>
          </div> -->
          <div class="form-group col-sm-12">
            <label for="related_to" class="col-form-label">Related To <span class="text-danger">*</span></label>
            <input type="text" name="related_to" class="form-control" id="edit_related_to" placeholder="Enter the due date" value="Project" readonly>
            <!-- <select class="form-control" name="related_to" id="related_to">
                        <option value="1">Project</option>
                        <option value="2" selected>Invoice</option>
                        <option value="3">Customer</option>
                    </select> -->
          </div>
          <div class="form-group col-sm-12">
            <label for="tags" class="col-form-label">Milestone</label>
            <select class="form-control" id="edit_milestone_id" name="milestone_id">
              <option value=""></option>
              <?php if (!empty($milestone_list)) {
                $i = 1;
                foreach ($milestone_list as $key_m => $value_m) { ?>
                  <option value="<?php echo $value_m['pm_id'] ?>"><?php echo $value_m['milestones_name'] ?></option>
              <?php }
              } ?>
            </select>
          </div>
          <div class="form-group col-sm-12">
            <label for="task_description" class="col-sm-4 col-form-label">Task Description</label>
            <div class="col-sm-12">
              <textarea id="edit_task_description" name="task_description" class="form-control" placeholder="Enter task description">Sample task description goes here.</textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Upadte </button>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
  document.getElementById('edit_attachment-link').addEventListener('click', function() {
    const div = document.getElementById('edit_attachmentDiv');
    div.style.display = div.style.display === 'none' || div.style.display === '' ? 'block' : 'none';
  });
</script>

<div class="modal fade" id="editnoteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskModalLabel">Edit Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- <form  method="post" name="edit_note_from" class="form-validate" action="<?php echo base_url('project/updatenote/' . $this->uri->segment(2)); ?>" onsubmit="return validate_edit_note(this)" enctype="multipart/form-data"> -->
      <div class="  card-info">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="addressLine1">Notes</label>
                <!-- <textarea class="form-control" id="edit_note_msg" name="note"></textarea> -->
                <textarea id="edit_note_msg" name="note"></textarea>
              </div>
              <label id="edit_note_err" style="color:red;"></label>
            </div>
            <input type="hidden" id="edit_note_id" name="note_id">
            <!-- <div class="col-sm-12 mt-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" value="on" id="touch_lead" name="touch_lead" > I got in touch with this lead </label>
                        </div>
                        <div class="col-sm-12 mt-3">
                          <label class="checkbox-inline">
                            <input type="checkbox" value="on" id="contacted_lead" name="contacted_lead"> I have not contacted this lead </label>
                        </div>-->
            <div class="col-sm-12 mt-3">
              <button type="submit" class="btn btn-primary" onclick="updateNote()">Update</button>
            </div>
          </div>
        </div>
      </div>

      <!-- </form> -->
    </div>
  </div>


</div>

<!-- Task Details Modal -->
<div id="taskDetailsModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Task Details</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Work Status</th>
                <th>Time Duration</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Stop Reason</th>
              </tr>
            </thead>
            <tbody id="taskLogBody">
              <!-- Data will be injected here -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<!--   <div class="modal fade" id="milestonesModal" tabindex="-1" aria-labelledby="milestonesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="milestones">Add New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="form-group col-sm-12 mb-3">
                    <label class="col-form-label" style="float: right;">
                        <a href="javascript:void(0)" class="attachment" id="attachment-link">Attachment</a>
                    </label>
                </div>

                <div id="attachmentDiv" class="toggle-div mt-5" style="display:none;">
                    <input type="file" class="form-control" name="">
                </div>

                <div class="form-group col-sm-12">
                    <label for="subject" class="col-form-label">Subject <span class="text-danger">*</span></label>
                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter the subject" value="Sample Subject">
                </div>
                <div class="form-group col-sm-12">
                    <label for="start_date" class="col-form-label">Start Date <span class="text-danger">*</span></label>
                    <input type="text" name="start_date" class="form-control" id="start_date" placeholder="Enter the start date" value="2025-01-28">
                </div>
                <div class="form-group col-sm-12">
                    <label for="due_date" class="col-form-label">Due Date <span class="text-danger">*</span></label>
                    <input type="text" name="due_date" class="form-control" id="due_date" placeholder="Enter the due date" value="2025-02-10">
                </div>
                <div class="form-group col-sm-12">
                    <label for="priority" class="col-form-label">Priority <span class="text-danger">*</span></label>
                    <select class="form-control" name="priority" id="priority">
                        <option value="1">Low</option>
                        <option value="2" selected>Medium</option>
                        <option value="3">High</option>
                        <option value="4">Urgent</option>
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label for="repeat_every" class="col-form-label">Repeat every<span class="text-danger">*</span></label>
                    <select class="form-control" name="repeat_every" id="repeat_every">
                        <option value="1">Week</option>
                        <option value="2" selected>2 Weeks</option>
                        <option value="3">1 Month</option>
                        <option value="4">2 Months</option>
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label for="related_to" class="col-form-label">Related To <span class="text-danger">*</span></label>
                    <select class="form-control" name="related_to" id="related_to">
                        <option value="1">Project</option>
                        <option value="2" selected>Invoice</option>
                        <option value="3">Customer</option>
                    </select>
                </div>
                <div class="form-group col-sm-12">
                    <label for="tags" class="col-form-label">Tags</label>
                    <input type="text" name="tags" class="form-control" id="tags" placeholder="Add tags" value="Sample, Tags">
                </div>
                <div class="form-group col-sm-12">
                    <label for="task_description" class="col-sm-4 col-form-label">Task Description</label>
                    <div class="col-sm-12">
                        <textarea id="task_description" name="task_description" class="form-control" placeholder="Enter task description">Sample task description goes here.</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="taskstatusModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Task Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <center><span id="msg"></span></center>
        <form enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Task Status <span class="text-danger">*</span></label>
                <select class="form-control" id="task_status_t" required>
                  <?php
                  foreach ($work_status as $k => $val) {
                  ?>
                    <option value="<?php echo $val['tws_id']; ?>" <?php if ($value_tk['task_status'] == $val['tws_id']) {
                                                                    echo 'selected=""';
                                                                  } ?>> <?php echo $val['name']; ?></option>
                  <?php } ?>
                </select>
                <span style="color:red;" id="task_status_tm"></span>
              </div>
            </div>
            <div class="col-sm-12 mt-3">
              <div class="form-group">
                <label for="companyName"> Reason <span class="text-danger">*</span></label>
                <input type="text" name="stopReason" id="stopReason" class="form-control" required>
                <span style="color:red;" id="stopReason_msg"></span>
              </div>
            </div>
            <input type="hidden" id="tm_task_id">
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="save_discussion" onclick="stop_task_timer()">Update</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="valErrorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Error Message</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <center><span id="valErrorModalMessage" style="color:red;"></span></center>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      $(document).ready(function() {
        alert('<?php echo $value_tk['timer_status']; ?>');

        if('<?php echo $value_tk['timer_status']; ?>' == 'Start' || '<?php echo $value_tk['timer_status']; ?>' == 'Restart') {
          const storedTimer = localStorage.getItem('active_timer');
          if (storedTimer) {
              const timerData = JSON.parse(storedTimer);

              // Locate the correct row
              const row = $("tr[data-task-id='" + timerData.task_id + "']");
              const display = row.find('#time');

              // Resume the timer from the previously stored start time
              startTimer(display[0], timerData.task_id, timerData.project_id);
              row.find("#start_time").hide();
              row.find("#stop_time").show();
              row.find("#hold_time").show();
          }
        }
        
      });
    </script>


    <script>
      document.addEventListener("DOMContentLoaded", function() {
        let timeProgress = parseFloat(<?php echo json_encode($time_spend_percentage); ?>);
        let remainingValue = parseFloat(<?php echo json_encode($remaining_percentage); ?>);

        // alert("Time Progress: " + timeProgress + "\nRemaining: " + remainingValue);

        Highcharts.chart('progressChart', {
          chart: {
            type: 'pie',
            events: {
              render() {
                let chart = this;

                if (!chart.customText) {
                  chart.customText = chart.renderer.text(
                    `${Math.round(timeProgress)}%`,
                    chart.plotLeft + chart.plotWidth / 2,
                    chart.plotTop + chart.plotHeight / 2
                  ).css({
                    fontSize: '24px',
                    fontWeight: 'bold',
                    color: 'black',
                    textAlign: 'center'
                  }).attr({
                    align: 'center'
                  }).add();
                } else {
                  chart.customText.attr({
                    text: `${Math.round(timeProgress)}%`
                  });
                }
              }
            }
          },
          title: {
            text: ''
          },
          tooltip: {
            enabled: false
          },
          plotOptions: {
            pie: {
              innerSize: '70%',
              dataLabels: {
                enabled: false
              }
            }
          },
          series: [{
            name: 'Progress',
            data: [{
                y: timeProgress,
                color: '#28a745'
              },
              {
                y: remainingValue,
                color: '#e0e0e0'
              }
            ]
          }]
        });
      });
    </script>


    <script>
      // let timeProgress = parseFloat(<?php echo json_encode($chart_data['timeProgress']); ?>); // Safely encode
      // let remainingValue = 100 - timeProgress;

      // alert("Time Progress: " + timeProgress + "\nRemaining: " + remainingValue);

      // Highcharts.chart('progressChart', {
      //   chart: {
      //     type: 'pie',
      //     events: {
      //       render() {
      //         let chart = this;

      //         if (!chart.customText) {
      //           chart.customText = chart.renderer.text(
      //             `${Math.round(timeProgress)}%`,
      //             chart.plotLeft + chart.plotWidth / 2,
      //             chart.plotTop + chart.plotHeight / 2
      //           ).css({
      //             fontSize: '24px',
      //             fontWeight: 'bold',
      //             color: 'black',
      //             textAlign: 'center'
      //           }).attr({
      //             align: 'center'
      //           }).add();
      //         } else {
      //           chart.customText.attr({
      //             text: `${Math.round(timeProgress)}%`
      //           });
      //         }
      //       }
      //     }
      //   },
      //   title: {
      //     text: ''
      //   },
      //   tooltip: {
      //     enabled: false
      //   },
      //   plotOptions: {
      //     pie: {
      //       innerSize: '70%',
      //       dataLabels: {
      //         enabled: false
      //       }
      //     }
      //   },
      //   series: [{
      //     name: 'Progress',
      //     data: [{
      //         y: timeProgress,
      //         color: '#28a745'
      //       },
      //       {
      //         y: Math.round(remainingValue),
      //         color: '#e0e0e0'
      //       }
      //     ]
      //   }]
      // });
    </script>

    <script>
      Highcharts.chart('container1', {
        chart: {
          type: 'column'
        },
        title: {
          text: ''
        },
        xAxis: {
          categories: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5'],
          title: {
            text: 'Days'
          }
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Number of Tasks'
          },
          stackLabels: {
            enabled: true
          }
        },
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        },
        plotOptions: {
          column: {
            stacking: 'normal',
            dataLabels: {
              enabled: true
            }
          }
        },
        series: [{
          name: 'Not Started',
          data: [5, 3, 4, 7, 2],
          color: '#d9534f'
        }, {
          name: 'In Progress',
          data: [2, 2, 3, 2, 1],
          color: '#f0ad4e'
        }, {
          name: 'Testing',
          data: [3, 4, 4, 2, 5],
          color: '#5bc0de'
        }, {
          name: 'Completed',
          data: [7, 8, 6, 5, 9],
          color: '#5cb85c'
        }]
      });
    </script>

    <script>
      Highcharts.chart('container', {
        chart: {
          type: 'column'
        },
        title: {
          text: 'Daily Task Progress'
        },
        xAxis: {
          categories: <?php echo $chartCategories; ?>, // Dynamic dates
          title: {
            text: 'Days'
          }
        },
        yAxis: {
          min: 0,
          title: {
            text: 'Number of Tasks'
          },
          stackLabels: {
            enabled: true,
            style: {
              fontWeight: 'bold',
              color: 'black'
            },
            formatter: function() {
              return this.total; // Show total tasks per day
            }
          }
        },
        legend: {
          align: 'center',
          verticalAlign: 'bottom',
          layout: 'horizontal'
        },
        plotOptions: {
          column: {
            stacking: 'normal',
            dataLabels: {
              enabled: true
            }
          }
        },
        series: [{
            name: 'Not Started',
            data: <?php echo $notStartedData; ?>,
            color: '#d9534f'
          },
          {
            name: 'In Progress',
            data: <?php echo $inProgressData; ?>,
            color: '#f0ad4e'
          },
          {
            name: 'Testing',
            data: <?php echo $testingData; ?>,
            color: '#5bc0de'
          },
          {
            name: 'Awaiting',
            data: <?php echo $awaitingData; ?>,
            color: '#337ab7'
          },
          {
            name: 'Completed',
            data: <?php echo $completedData; ?>,
            color: '#5cb85c'
          }
        ]
      });
    </script>

    <script>
      var editModal = document.getElementById('editnoteModal');
      editModal.addEventListener('shown.bs.modal', function() {
        if (!$('#edit_note_msg').hasClass('summernote-initialized')) {
          $('#edit_note_msg').summernote({
            height: 150,
            placeholder: 'Write your note here...'
          }).addClass('summernote-initialized');
        }
      });

      editModal.addEventListener('hidden.bs.modal', function() {
        $('#edit_note_msg').summernote('destroy').removeClass('summernote-initialized');
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('#discussion_list, #notes_list, #activity_list, #transaction_list').DataTable({
          "paging": true,
          "searching": true,
          "ordering": true,
          "info": true
        });
      });

      function add_attachement_sheet() {
        var table = document.getElementById("add_attachment").getElementsByTagName('tbody')[0];

        var row = table.insertRow(table.rows.length); // Create a new row

        var cell1 = row.insertCell(0); // ID
        cell1.innerHTML = table.rows.length; // Auto-increment ID

        var cell2 = row.insertCell(1); // File type input
        cell2.innerHTML = `<input type="file" name="file_covering[]" class="form-control" id="covering">`;

        var cell3 = row.insertCell(2); // Image preview
        cell3.innerHTML = 'Image';

        var cell4 = row.insertCell(3); // Remove button
        cell4.innerHTML = `<div class="form-group">
                        <button type="button" class="btn btn-danger" onclick="removeBannerCovering(${table.rows.length - 1})">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>`;

      }

      function removeBannerCovering(rowIndex) {
        var table = document.getElementById("add_attachment").getElementsByTagName('tbody')[0];
        table.deleteRow(rowIndex);
      }

      function edit_add_attachement_sheet() {
        var table = document.getElementById("edit_attachment").getElementsByTagName('tbody')[0];

        var row = table.insertRow(table.rows.length); // Create a new row

        var cell1 = row.insertCell(0); // ID
        cell1.innerHTML = table.rows.length; // Auto-increment ID

        var cell2 = row.insertCell(1); // File type input
        cell2.innerHTML = `<input type="file" name="file_covering_edit[]" class="form-control" id="edit_covering">`;

        var cell3 = row.insertCell(2); // Image preview
        cell3.innerHTML = 'Image';

        var cell4 = row.insertCell(3); // Remove button
        cell4.innerHTML = `<div class="form-group">
                        <button type="button" class="btn btn-danger" onclick="edit_removeBannerCovering(${table.rows.length - 1})">
                          <i class="fa fa-minus"></i>
                        </button>
                      </div>`;

      }

      function edit_removeBannerCovering(rowIndex) {
        var table = document.getElementById("edit_attachment").getElementsByTagName('tbody')[0];
        table.deleteRow(rowIndex);
      }

      function addNote() {
        //$("#save_note").click(function () { alert("111");
        var summernote = $('#summernote').val();
        // alert(summernote);
        if ($.trim(summernote) == '') {
          $('#err_note').text('Note is required.');
          return false;
        } else {
          $('#err_note').text('');
        }
        // alert("111");
        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        // alert(pro_id);
        var form_data = new FormData();
        form_data.append('note', summernote);
        form_data.append('pro_id', pro_id);
        $.ajax({

          type: "POST",
          url: "<?php echo base_url('project/save_note'); ?>",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,

          success: function(res) {

            location.reload();

          },
          error: function(error, message) {
            console.log(message);
          }
        });
        //});
      }

      function noteFunctionEdit(note_id) { //alert("11");
        //  alert(note_id);
        $.ajax({
          url: '<?= base_url("project/getNoteDetails"); ?>', // Replace with the correct endpoint
          type: 'POST',
          data: {
            note_id: note_id
          },
          dataType: 'json',
          success: function(response) {
            console.log('response found', response);

            if (response.success) {
              var taskData = response.data[0]; // Accessing the first object in the data array
              // console.log('record fund',taskData);
              $('#edit_note_id').val(taskData.note_id);
              $('#edit_note_msg').val(taskData.note);

              $('#editnoteModal').modal('show');
            } else {
              alert(response.message); // Show an error message if something goes wrong
            }
          },
          error: function() {
            alert('Error fetching task details.');
          },
        });
      }

      function updateNote() {

        var edit_note = $('#edit_note_msg').val();
        var note_id = $('#edit_note_id').val();
        // alert(summernote);
        if (edit_note == '') {
          $('#edit_note_err').text('Note is required.');
          return false;
        } else {
          $('#edit_note_err').text('');
        }
        // alert("111");
        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        // alert(pro_id);
        var form_data = new FormData();
        form_data.append('note', edit_note);
        form_data.append('note_id', note_id);
        form_data.append('pro_id', pro_id);
        $.ajax({

          type: "POST",
          url: "<?php echo base_url('project/update_note'); ?>",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,

          success: function(res) {

            location.reload();

          },
          error: function(error, message) {
            console.log(message);
          }
        });

      }

      $('.view-details-btn').on('click', function() { //alert("11");
        var targetModal = $(this).data('target'); // Get the modal ID from data-target
        $(targetModal).modal('show'); // Manually show the modal
      });

      // Close modal manually when clicking close buttons
      $('.modal').on('click', '.close, .btn-secondary', function() {
        $(this).closest('.modal').modal('hide');
      });

      function discussionFunctionDelete(id) {
        var result = confirm("Are you sure you want to delete discussion ?");
        if (result) {

          var d_id = id;
          // alert(d_id);
          var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
          $("#overlay").fadeIn(300);
          var form_data = new FormData();
          form_data.append('d_id', d_id);
          form_data.append('project_id', pro_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('project/delete_discussion'); ?>",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            //cache: false,
            success: function(response) {
              setTimeout(function() {
                location.reload();
              }, 1000);
            }
          });
        }
      }

      function saveDiscussion() {
        var subject = $("#discussion_subject").val(); //$('#summernote').html();
        if (subject == '') {
          $('#discussion_subject_msg').text('Subject is required.');
          return false;
        } else {
          $('#discussion_subject_msg').text('');
        }
        var description = $("#discuss_description").val();
        var visible_to_customer = $("#visible_to_customer").is(':checked') ? 'on' : 'off';
        //var visible_to_customer = $("#visible_to_customer").val();
        //alert(visible_to_customer);
        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';

        var form_data = new FormData();
        form_data.append('subject', subject);
        form_data.append('description', description);
        form_data.append('visible_to_customer', visible_to_customer);
        form_data.append('project_id', pro_id);
        //  alert("111");
        $.ajax({

          type: "POST",
          url: "<?php echo base_url('project/save_discussion'); ?>",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,

          success: function(res) {
            console.log(res);
            location.reload();
          },
          error: function(error, message) {
            console.log(message);
          }
        });
      }

      function discussionFunctionEdit(discussion_id) { //alert("11");
        // Make an AJAX request to fetch the task details
        // alert(discussion_id);
        $.ajax({
          url: '<?= base_url("project/getDiscussionDetails"); ?>', // Replace with the correct endpoint
          type: 'POST',
          data: {
            discussion_id: discussion_id
          },
          dataType: 'json',
          success: function(response) {
            console.log('response found', response);

            if (response.success) {
              var discussionData = response.data[0]; // Accessing the first object in the data array
              // console.log('record fund',taskData);
              $('#edit_discussion_id').val(discussionData.pd_id);
              $('#edit_discussion_subject').val(discussionData.subject);
              $('#edit_discuss_description').val(discussionData.description);

              if (discussionData.visible_to_customer === 'on') {
                $('#edit_visible_to_customer').prop('checked', true);
              } else {
                $('#edit_visible_to_customer').prop('checked', false);
              }


              $('#editdiscussionModal').modal('show');
            } else {
              alert(response.message); // Show an error message if something goes wrong
            }
          },
          error: function() {
            alert('Error fetching task details.');
          },
        });
      }

      function updateDiscussion() {
        // alert("1111");
        var subject = $("#edit_discussion_subject").val(); //$('#summernote').html();
        if (subject == '') {
          $('#edit_discussion_subject_msg').text('Subject is required.');
          return false;
        } else {
          $('#edit_discussion_subject_msg').text('');
        }
        var pd_id = $("#edit_discussion_id").val();
        var description = $("#edit_discuss_description").val();
        var visible_to_customer = $("#edit_visible_to_customer").is(':checked') ? 'on' : 'off';
        //var visible_to_customer = $("#visible_to_customer").val();
        //alert(visible_to_customer);
        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';

        var form_data = new FormData();
        form_data.append('subject', subject);
        form_data.append('description', description);
        form_data.append('visible_to_customer', visible_to_customer);
        form_data.append('project_id', pro_id);
        form_data.append('pd_id', pd_id);
        // alert("111");
        $.ajax({

          type: "POST",
          url: "<?php echo base_url('project/updateDiscussion'); ?>",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,

          success: function(res) {
            console.log(res);
            location.reload();
          },
          error: function(error, message) {
            console.log(message);
          }
        });
      }

      function fileFunctionDelete(id) {
        var result = confirm("Are you sure want to delete file ?");
        if (result) {

          var file_id = id;
          var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
          var form_data = new FormData();
          form_data.append('file_id', file_id);
          form_data.append('pro_id', pro_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('project/delete_files'); ?>",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            //cache: false,
            success: function(response) {
              setTimeout(function() {
                location.reload();
              }, 3000);

            }
          });
        }
      }

      function add_milestones() {
        var mil_name = $('#mil_name').val();
        if (mil_name == '') {
          $('#mil_name_msg').text('Name is required.');
          return false;

        } else {
          $('#mil_name_msg').text('');
        }
        var due_date = $('#m_due_date').val();
        if (due_date == '') {
          $('#due_date_msg').text('Due date is required.');
          return false;

        } else {
          $('#due_date_msg').text('');
        }
        var description = $('#mile_description').val();
        if (description == '') {
          $('#description_msg').text('Description is required.');
          return false;

        } else {
          $('#description_msg').text('');
        }

        var order = $('#order').val();
        if (order == '') {
          $('#order_msg').text('Order number is required.');
          return false;
        } else {
          $('#order_msg').text('');
        }
        //var show_description_to_customer=$('#show_description_to_customer').val(); 
        var show_description_to_customer = $('#show_description_to_customer').is(':checked') ? 'on' : 'off';

        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        var form_data = new FormData();
        form_data.append('mil_name', mil_name);
        form_data.append('due_date', due_date);
        form_data.append('description', description);
        form_data.append('show_description_to_customer', show_description_to_customer);
        form_data.append('order', order);
        form_data.append('pro_id', pro_id);
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/add_milestones'); ?>",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          //cache: false,
          success: function(response) {
            location.reload();
          }
        });

      }

      function milestoneFunctionDelete(id) {
        var result = confirm("Are you sure want to delete milestone ?");
        if (result) {

          var m_id = id;
          var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
          $("#overlay").fadeIn(300);
          var form_data = new FormData();
          form_data.append('m_id', m_id);
          form_data.append('pro_id', pro_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('project/delete_milestone'); ?>",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            //cache: false,
            success: function(response) {
              setTimeout(function() {
                location.reload();
              }, 1000);

            }
          });
        }
      }

      function milestoneFunctionGet(id) {
        var m_id = id;
        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        var form_data = new FormData();
        form_data.append('m_id', m_id);
        form_data.append('pro_id', pro_id);
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/get_milestone'); ?>",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          //cache: false,
          success: function(data) {
            var res = JSON.parse(data);
            console.log(res.due_date);
            $('#e_m_id').val(res.pm_id);
            var dueDate = new Date(res.due_date);
            var formattedDate = dueDate.toISOString().slice(0, 16); // 'YYYY-MM-DDTHH:MM'
            $('#e_due_date').val(formattedDate); // Use the formatted date
            $('#e_mil_name').val(res.milestones_name);
            $('#e_description').val(res.description);

            if (res.show_description_to_customer === 'on') {
              $('#e_show_description_to_customer').prop('checked', true);
            } else {
              $('#e_show_description_to_customer').prop('checked', false);
            }

            $('#e_order').val(res.order);
            $('#editmilestonesModal').modal('show');
          }
        });

      }

      function save_milestones() {
        var mil_name = $('#e_mil_name').val();
        if (mil_name == '') {
          $('#e_mil_name_msg').text('Name is required.');
          return false;

        } else {
          $('#e_mil_name_msg').text('');
        }

        var due_date = $('#e_due_date').val();
        if (due_date == '') {
          $('#e_due_date_msg').text('Due date is required.');
          return false;
        } else {
          $('#e_due_date_msg').text('');
        }

        var description = $('#e_description').val();
        if (description == '') {
          $('#e_description_msg').text('Description is required.');
          return false;
        } else {
          $('#e_description_msg').text('');
        }

        var show_description_to_customer = $('#e_show_description_to_customer').is(':checked') ? 'on' : 'off';

        var order = $('#e_order').val();
        if (order == '') {
          $('#e_order_msg').text('Order number is required.');
          return false;
        } else {
          $('#e_order_msg').text('');
        }
        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        var e_m_id = $('#e_m_id').val();

        var form_data = new FormData();
        form_data.append('mil_name', mil_name);
        form_data.append('due_date', due_date);
        form_data.append('description', description);
        form_data.append('show_description_to_customer', show_description_to_customer);
        form_data.append('order', order);
        form_data.append('project_id', pro_id);
        form_data.append('e_m_id', e_m_id);
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/save_milestones'); ?>",
          dataType: 'text',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          //cache: false,
          success: function(response) {
            setTimeout(function() {
              location.reload();
            }, 3000);
          }
        });
      }

      function validate_add_task(ele) { //alert("11");
        //hide_message_box(ele);
        var hasError = 0;
        var subject = $("#tsubject").val();
        var start_date = $("#start_date").val();
        var due_date = $('#due_date').val();
        var est_hr = $('#estimated_days').val();
        var priority = $("#priority").val();
        //  var fileInput = $("#covering");
        //  var files = fileInput.files;
        // alert(subject);

        if (subject.trim() == '') {
          // showError("Please enter  project name", " project_name");
          $('#subject_err').text('Please enter subject');
          hasError = 1;
        } else {
          $('#subject_err').text(''); // Clear error if valid
        }

        if (start_date.trim() == '') {
          //showError("Please enter project code", "project_code");
          $('#stdt_err').text('Please select start_date');
          hasError = 1;
        } else {
          $('#stdt_err').text(''); // Clear error if valid
        }
        // alert("3");
        //else { changeError("project_code"); }
        if (due_date.trim() == '') {
          //showError("Please enter project_type_id", "project_type_id"); 
          $('#dudt_err').text('Please select due date');
          hasError = 1;
        } else {
          $('#dudt_err').text(''); // Clear error if valid
        }


        if (priority.trim() == '') {
          //showError("Please enter project_type_id", "project_type_id"); 
          $('#priority_err').text('Please select priority');
          hasError = 1;
        } else {
          $('#priority_err').text(''); // Clear error if valid
        }

        if (est_hr.trim() == '') {
          //showError("Please enter project_type_id", "project_type_id"); 
          $('#esthr_err').text('Please enter estimated hours');
          hasError = 1;
        } else {
          $('#esthr_err').text(''); // Clear error if valid
        }
        // alert("22");
        // var errorMessage = ''; // Initialize an empty error message

        // // Loop through the files to check their extensions
        // for (var i = 0; i < files.length; i++) {
        //     var fileName = files[i].name;
        //     var fileExtension = fileName.split('.').pop().toLowerCase(); // Get the file extension in lowercase

        //     // Check if the file extension is .exe
        //     if (fileExtension === 'exe') {
        //         errorMessage = 'Error: .exe files are not allowed.';
        //         break; // Exit loop once we find a .exe file
        //     }
        // }

        // Get all file inputs inside #add_attachment table
        var fileInputs = $("#add_attachment").find('input[type="file"]');
        var fileNames = [];
        var errorMessage = "";

        fileInputs.each(function() {
          if (this.files.length > 0) {
            for (var i = 0; i < this.files.length; i++) {
              var fileName = this.files[i].name;
              var fileExtension = fileName.split('.').pop().toLowerCase(); // Get file extension

              // Check if the file is .exe
              if (fileExtension === 'exe') {
                errorMessage = 'Error: .exe files are not allowed.';
                break; // Stop checking further
              }

              // fileNames.push(fileName);
            }
          }
        });

        if (errorMessage) {
          $('#sp_err').text('.exe file not allowed');
          hasError = 1;
        } else {
          $('#sp_err').text(''); // Clear error if valid
        }


        if (hasError == 1) {
          return false;
        } else {
          return true;
        }
      }

      function taskFunctionEdit(task_id) {
        // Make an AJAX request to fetch the task details
        $.ajax({
          url: '<?= base_url("project/getTaskDetails"); ?>',
          type: 'POST',
          data: {
            task_id: task_id
          },
          dataType: 'json',
          success: function(response) {
            console.log('response found', response);

            if (response.success) {
              var taskData = response.data[0];
              var taskImages = response.task_images; // Assuming task_images is an array of images

              // Populate task details
              $('#edit_task_id').val(taskData.task_id);
              $('#edit_subject').val(taskData.task_title);
              $('#edit_start_date').val(taskData.start_date);
              $('#edit_due_date').val(taskData.end_date);
              $('#edit_priority').val(taskData.task_priority);
              $('#edit_related_to').val(taskData.related_to);
              $('#edit_repeat_every').val(taskData.repeat_every);
              $('#edit_milestone').val(taskData.milestone);
              $('#edit_estimated_days').val(taskData.estimated_days);
              $('#edit_task_description').val(taskData.task_description);

              // document.addEventListener('DOMContentLoaded', function () {
              //   // Add Holiday Modal: Set min date
              //   const addModal = document.getElementById('edit_start');
              //   addModal.addEventListener('shown.bs.modal', function () {
              //     const today = taskData.start_date //new Date().toISOString().split('T')[0];
              //     document.getElementById('edit_start_date').setAttribute('min', today);
              //     document.getElementById('edit_due_date').setAttribute('min', today);

              //     edit_start_date.addEventListener('change', function () {
              //       if (edit_start_date.value) {
              //         const selectedStart = new Date(edit_start_date.value);
              //         selectedStart.setDate(selectedStart.getDate() + 1); // optional: disable the same day
              //         const minEndDate = selectedStart.toISOString().split('T')[0];
              //         edit_due_date.value = ""; // clear old value
              //         edit_due_date.setAttribute('min', minEndDate);
              //       }
              //     });

              //   });
              // });

              // Populate attachment table
              var attachmentHtml = '';
              if (taskImages.length > 0) {
                console.log(taskImages);
                $.each(taskImages, function(index, image) {
                  attachmentHtml += `<tr>
                                  <td>${index + 1}</td>
                                  <td>
                                      <input type="file" name="file_covering_edit[]" class="form-control" id="edit_covering_${index}">
                                      <span>${image.image_name}</span>
                                      <input type="hidden" id="filerecd_${index}" name="filercrd[]" class="form-control" value="${image.image_name}" readonly>
                                     
                                  </td>
                                  <td>
                                      <!-- Add a manual path to the file name -->
                                      <img src="<?= base_url('uploads/project/task') . ${image . image_name} ?>" width="50" height="50">
                                  </td>
                                  <td>
                                      <div class="form-group">
                                          <button type="button" class="btn btn-danger" onclick="edit_removeBannerCovering(${index})">
                                              <i class="fa fa-minus"></i>
                                          </button>
                                      </div>
                                  </td>
                              </tr>`;
                  // Set the value of the input field with id "filerecd"

                });
              }
              $('#edit_attachment tbody').html(attachmentHtml);

              // Show edit task modal
              $('#edittaskModal').modal('show');
            } else {
              alert(response.message);
            }
          },
          error: function() {
            alert('Error fetching task details.');
          },
        });
      }

      function validate_edit_task(ele) { //alert("11");
        //hide_message_box(ele);
        var hasError = 0;
        var subject = $("#edit_subject").val();
        var start_date = $("#edit_start_date").val();
        var due_date = $('#edit_due_date').val();
        var est_hr = $('#edit_estimated_days').val();
        var priority = $("#edit_priority").val();


        if (subject.trim() == '') {
          // showError("Please enter  project name", " project_name");
          $('#edit_subject_err').text('Please enter subject');
          hasError = 1;
        } else {
          $('#edit_subject_err').text(''); // Clear error if valid
        }

        if (start_date.trim() == '') {
          //showError("Please enter project code", "project_code");
          $('#edit_stdt_err').text('Please select start_date');
          hasError = 1;
        } else {
          $('#edit_stdt_err').text(''); // Clear error if valid
        }

        //else { changeError("project_code"); }
        if (due_date.trim() == '') {
          //showError("Please enter project_type_id", "project_type_id"); 
          $('#edit_dudt_err').text('Please select due date');
          hasError = 1;
        } else {
          $('#edit_dudt_err').text(''); // Clear error if valid
        }


        if (priority.trim() == '') {
          //showError("Please enter project_type_id", "project_type_id"); 
          $('#edit_priority_err').text('Please select priority');
          hasError = 1;
        } else {
          $('#edit_priority_err').text(''); // Clear error if valid
        }

        if (est_hr.trim() == '') {
          //showError("Please enter project_type_id", "project_type_id"); 
          $('#edit_esthr_err').text('Please enter estimated hours');
          hasError = 1;
        } else {
          $('#edit_esthr_err').text(''); // Clear error if valid
        }


        // Get all file inputs inside #add_attachment table
        var fileInputs = $("#edit_attachment").find('input[type="file"]');
        var fileNames = [];
        var errorMessage = "";

        fileInputs.each(function() {
          if (this.files.length > 0) {
            for (var i = 0; i < this.files.length; i++) {
              var fileName = this.files[i].name;
              var fileExtension = fileName.split('.').pop().toLowerCase(); // Get file extension

              // Check if the file is .exe
              if (fileExtension === 'exe') {
                errorMessage = 'Error: .exe files are not allowed.';
                break; // Stop checking further
              }

              // fileNames.push(fileName);
            }
          }
        });

        if (errorMessage) {
          $('#edit_sp_err').text('.exe file not allowed');
          hasError = 1;
        } else {
          $('#edit_sp_err').text(''); // Clear error if valid
        }


        if (hasError == 1) {
          return false;
        } else {
          return true;
        }
      }

      function taskFunctionDelete(id) {
        var result = confirm("Are you sure want to delete task ?");
        if (result) {


          var task_id = id;
          var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
          $("#overlay").fadeIn(300);
          var form_data = new FormData();
          form_data.append('task_id', task_id);
          form_data.append('pro_id', pro_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('project/delete_task'); ?>",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            //cache: false,
            success: function(response) {
              setTimeout(function() {
                location.reload();
              }, 3000);

            }
          });
        }
      }

      function work_status(status, id) {
        var result = confirm("Are you sure you want to changes task status ?");
        if (result) {
          var task_id = id;
          var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
          $("#overlay").fadeIn(300);
          var form_data = new FormData();
          form_data.append('task_id', task_id);
          form_data.append('status', status);
          form_data.append('pro_id', pro_id);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('project/task_status_change'); ?>",
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            //cache: false,
            success: function(response) {
              setTimeout(function() {
                location.reload();
              }, 3000);

            }
          });
        }
      }

      // $("#start_time").click(function(){alert("11");
      function startTime(task_id) {

        var row = $(event.target).closest('tr'); // Get the current row
        var display = row.find('#time'); // Find the timer span in this row

        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        var form_data = new FormData();
        form_data.append('task_id', task_id);
        form_data.append('project_id', pro_id);

        const startTimestamp = new Date().getTime(); // Save the current time (in ms)

        // Save timer info to localStorage
        const timerInfo = {
            task_id: task_id,
            project_id: pro_id,
            start_time: startTimestamp
        };
        localStorage.setItem('active_timer', JSON.stringify(timerInfo));
        
        // Start the timer from 00:01
        startTimer(display[0], task_id, pro_id);

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/start_timer'); ?>",
          dataType: 'html',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          //cache: false,
          success: function(data) {
            console.log(data);
            // $("#start_time").css('display', 'none');
            // $("#stop_time").css('display', 'block');

            row.find("#start_time").hide();
            row.find("#stop_time").show();
            row.find("#hold_time").show();

            var testObject = {
              data
            };

            // Put the object into storage
            localStorage.setItem('testObject', JSON.stringify(testObject));

            //  // Retrieve the object from storage
            const storedTestObject = JSON.parse(localStorage.getItem('testObject'));
            console.log('local storage', storedTestObject);
          }

        });

      }

      function holdTime(task_id) {

        var task_timerId = JSON.parse(localStorage.getItem('testObject'));
        var task_data = JSON.parse(task_timerId.data); // Parse the nested JSON string
        var task_log_id = task_data.task_log_id; // Now it's an object
        var project_task_id = task_data.project_task_id;

        var row = $(event.target).closest('tr'); // Get the current row
        var display = row.find('#time'); // Find the timer span in this row
        var fiveMinutes = 60 * 0.1;

        startTimer(fiveMinutes, display[0]);

        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        var form_data = new FormData();
        form_data.append('task_id', task_id);
        form_data.append('project_id', pro_id);
        form_data.append('task_log_id', task_log_id);
        form_data.append('project_task_id', project_task_id);

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/hold_timer'); ?>",
          dataType: 'html',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          //cache: false,
          success: function(data) {
            console.log(data);
            // $("#start_time").css('display', 'none');
            // $("#stop_time").css('display', 'block');
            row.find("#restart_time").show();
            row.find("#stop_time").show();
            row.find("#hold_time").hide();
            var testObject = {
              data
            };

            // Put the object into storage
            localStorage.setItem('testObject', JSON.stringify(testObject));

            // Retrieve the object from storage


          }


        });

      }

      function restartTime(task_id) {
        var task_timerId = JSON.parse(localStorage.getItem('testObject'));
        var task_data = JSON.parse(task_timerId.data);
        var task_log_id = task_data.task_log_id;
        var project_task_id = task_data.project_task_id;

        var row = $(event.target).closest('tr');
        var display = row.find('#time');
        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';

        var form_data = new FormData();
        form_data.append('task_id', task_id);
        form_data.append('project_id', pro_id);
        form_data.append('task_log_id', task_log_id);
        form_data.append('project_task_id', project_task_id);

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/restart_timer'); ?>",
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          success: function(response) {
            console.log(response);

            // Convert "HH:MM:SS" to total seconds
            var elapsed = response.elapsed_seconds; // e.g. "00:01:43"
            var parts = elapsed.split(":");
            var seconds = (+parts[0]) * 3600 + (+parts[1]) * 60 + (+parts[2]);

            startTimerFromElapsed(display[0], task_id, pro_id, seconds);

            row.find("#restart_time").hide();
            row.find("#stop_time").show();
            row.find("#hold_time").show();

            localStorage.setItem('testObject', JSON.stringify({
              data: JSON.stringify(response)
            }));
          }
        });
      }

      // var timerInterval; // Declare this globally if not already

      // function startTimer(display, task_id, pro_id) {
      //   if (timerInterval) {
      //     clearInterval(timerInterval); // Clear any existing interval before starting a new one
      //   }

      //   var timer = 1; // Start from 1 second

      //   timerInterval = setInterval(function() {
      //     var hours = Math.floor(timer / 3600);
      //     var minutes = Math.floor((timer % 3600) / 60);
      //     var seconds = timer % 60;

      //     // Format as HH:MM:SS
      //     var formattedTime =
      //       (hours < 10 ? "0" + hours : hours) + ":" +
      //       (minutes < 10 ? "0" + minutes : minutes) + ":" +
      //       (seconds < 10 ? "0" + seconds : seconds);

      //     display.textContent = formattedTime;
      //     // alert(formattedTime);

      //     // Send AJAX request every second to update timer
      //     $.ajax({
      //       type: "POST",
      //       url: "<?php echo base_url('project/update_timer'); ?>",
      //       data: {
      //         task_id: task_id,
      //         project_id: pro_id,
      //         elapsed_seconds: formattedTime
      //       },
      //       success: function(res) {
      //         // Optional: handle server response
      //         console.log("Timer updated to:", formattedTime);
      //       }
      //     });

      //     timer++;
      //   }, 1000);
      // }

      let timerInterval; // Make sure this is defined in a scope accessible to both start and stop

function startTimer(display, task_id, pro_id) {
    if (timerInterval) {
        clearInterval(timerInterval);
    }

    // Get start time from localStorage
    const storedTimer = JSON.parse(localStorage.getItem('active_timer'));
    const startTimestamp = storedTimer?.start_time;

    timerInterval = setInterval(function () {
        const now = new Date().getTime();
        const elapsed = Math.floor((now - startTimestamp) / 1000); // in seconds

        const hours = Math.floor(elapsed / 3600);
        const minutes = Math.floor((elapsed % 3600) / 60);
        const seconds = elapsed % 60;

        const formattedTime =
            (hours < 10 ? "0" + hours : hours) + ":" +
            (minutes < 10 ? "0" + minutes : minutes) + ":" +
            (seconds < 10 ? "0" + seconds : seconds);

        display.textContent = formattedTime;

        // Send AJAX request to update timer on server
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('project/update_timer'); ?>",
            data: {
                task_id: task_id,
                project_id: pro_id,
                elapsed_seconds: formattedTime
            },
            success: function (res) {
                console.log("Timer updated to:", formattedTime);
            }
        });

    }, 1000);
}


      function startTimerFromElapsed(display, task_id, pro_id, elapsedSeconds) {
        if (timerInterval) clearInterval(timerInterval);

        var timer = elapsedSeconds;

        timerInterval = setInterval(function() {
          var hrs = Math.floor(timer / 3600);
          var mins = Math.floor((timer % 3600) / 60);
          var secs = timer % 60;

          var formattedTime =
            (hrs < 10 ? "0" + hrs : hrs) + ":" +
            (mins < 10 ? "0" + mins : mins) + ":" +
            (secs < 10 ? "0" + secs : secs);

          display.textContent = formattedTime;

          // Optional: send update to DB every 30 seconds
          $.post("<?php echo base_url('project/update_timer'); ?>", {
            task_id: task_id,
            project_id: pro_id,
            elapsed_seconds: formattedTime
          });

          if (timer % 30 === 0) {
            // $.post("<?php echo base_url('project/update_timer'); ?>", {
            //     task_id: task_id,
            //     project_id: pro_id,
            //     elapsed_seconds: formattedTime
            // });
          }

          timer++;
        }, 1000);
      }

      function stopTime(task_id) {
        //alert(task_id);
        $('#tm_task_id').val(task_id);
        var task_timerId = JSON.parse(localStorage.getItem('testObject'));
        var task_data = JSON.parse(task_timerId.data); // Parse the nested JSON string
        var task_log_id = task_data.task_log_id; // Now it's an object
        // var project_task_id=task_data.project_task_id;
        var form_data = new FormData();

        form_data.append('task_log_id', task_log_id);


        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/check_user_val'); ?>",
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          //cache: false,
          success: function(data) {
            console.log(data);
            if (parseInt(data.status_check) === 1) { // Convert to number
              //  alert("Access Granted: Task Stopped");
              $('#taskstatusModal').modal('show');
            } else {
              // alert("Access Denied");
              $('#valErrorModal').modal('show');
              $('#valErrorModalMessage').text("You are not having access to stop this task.");
            }
          }


        });



      }

      function stop_task_timer() {
        //console.log('local storage',storedTestObject);
        var task_timerId = JSON.parse(localStorage.getItem('testObject'));
        var task_data = JSON.parse(task_timerId.data); // Parse the nested JSON string
        var task_log_id = task_data.task_log_id; // Now it's an object
        var project_task_id = task_data.project_task_id;
        //alert(task_log_id);
        //alert(project_task_id);
        var task_id = $('#tm_task_id').val();
        var task_status = $('#task_status_t').val();
        var stopReason = $('#stopReason').val();
        if (stopReason.trim() == '') {
          $('#stopReason_msg').text('Please enter the reason');
          return false;
        } else {
          $('#stopReason_msg').text('');
        }

        var row = $('tr[data-task-id="' + task_id + '"]');

        var pro_id = '<?php echo base64_decode($this->uri->segment(2)); ?>';
        var form_data = new FormData();
        form_data.append('task_id', task_id);
        form_data.append('project_id', pro_id);
        form_data.append('task_log_id', task_log_id);
        form_data.append('project_task_id', project_task_id);
        form_data.append('task_status', task_status);
        form_data.append('stopReason', stopReason);

        $.ajax({
          type: "POST",
          url: "<?php echo base_url('project/stop_timer'); ?>",
          dataType: 'html',
          cache: false,
          contentType: false,
          processData: false,
          data: form_data,
          //cache: false,
          success: function(data) {
            console.log(data);

            // Select row using a task_id attribute
            // var row = $("tr[data-task-id='" + task_id + "']");
            // alert(row);
            // Show and hide respective buttons
            row.find(".start_time").show();
            row.find(".stop_time").hide();
            row.find(".hold_time").hide();
            row.find(".restart_time").hide();
            row.find("#time").text("00:00").hide();

            $('#taskstatusModal').modal('hide');
            var testObject = {
              data
            };

            // Put the object into storage
            localStorage.setItem('testObject', JSON.stringify(testObject));

            // Retrieve the object from storage
            window.location.reload();

          }


        });
      }

      $(".view-details").on("click", function() {
        var taskId = $(this).data("task-id");
        var projectId = $(this).data("project-id");
        //alert(taskId);alert(projectId);
        // Clear previous data
        $("#taskLogBody").html('<tr><td colspan="4">Loading...</td></tr>');

        // Fetch task log details via AJAX
        $.ajax({
          url: "<?php echo base_url('project/fetch_task_log'); ?>",
          // url: "fetch_task_log.php", // Ensure this PHP file exists
          type: "POST",
          data: {
            task_id: taskId,
            project_id: projectId
          },
          success: function(response) {
            $("#taskLogBody").html(response); // Update modal body with data
            $("#taskDetailsModal").modal("show"); // Show modal
          }
        });
      });

      function validate_add_attachment(form) {
        var fileInputs = document.querySelectorAll('input[name="file_covering[]"]');
        var hasFile = false;
        var invalidFile = false;

        // Loop through file inputs to check if any file is selected
        fileInputs.forEach(function(input) {
          if (input.files.length > 0) {
            hasFile = true;
            // Check each selected file
            for (var i = 0; i < input.files.length; i++) {
              var fileName = input.files[i].name.toLowerCase();
              if (fileName.endsWith('.exe')) {
                invalidFile = true;
                break; // Stop checking further if an invalid file is found
              }
            }
          }
        });

        if (invalidFile) {
          $("#att_err1").text("Executable (.exe) files are not allowed.");
          return false; // Prevent form submission
        }

        if (!hasFile) {
          $("#att_err1").text("Please add at least one attachment before submitting.");
          return false; // Prevent form submission
        }

        $("#att_err1").text(''); // Clear any previous error messages
        return true; // Allow form submission if valid
      }
    </script>

    <!--footer -->
    <?php include_once('footer.php') ?>