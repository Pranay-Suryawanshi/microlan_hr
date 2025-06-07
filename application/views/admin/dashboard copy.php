<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/bar.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<style>
    #controls {
        text-align: center;
        margin-bottom: 20px;
    }

    #charts {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    #attendanceChart{
        width: 60%;
        min-width: 500px;
        height: 500px;
    }

    #donutChart {
        width: 35%;
        min-width: 300px;
        height: 500px;
    }
</style>

<!--page-wrapper-->
<div class="page-wrapper">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        <div class="page-content">

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card radius-15 bg-light-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <?php
                                $profile_photo = $user_details[0]['profile_photo'];
                                $profile_path = FCPATH . 'uploads/profile/' . $profile_photo;

                                if (empty($profile_photo) || !file_exists($profile_path)) { ?>
                                    <img src="<?php echo base_url('assets/images/user1.jpg'); ?>" width="80" height="80" class="rounded-circle p-1 border bg-white" alt="">
                                <?php } else { ?>
                                    <img src="<?php echo base_url('uploads/profile/' . $profile_photo); ?>" width="80" height="80" class="rounded-circle p-1 border bg-white" alt="">
                                <?php } ?>

                                <div class="">
                                    <h5 class="mb-0 text-primary"><?php echo $user_details[0]['user_name']; ?></h5>
                                    <p class="mb-0 text-secondary"><?php echo $designation[0]['des_name']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-lg-12 d-flex">
                    <div class="card radius-15 w-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <h5 class="mb-0">Total Projects - <?php echo $total_project; ?></h5>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-lg-3">
                                    <div class="card radius-15 border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="">
                                                    <p class="text-secondary mb-0">Not Started</p>
                                                    <h4 class="mb-0 "><?php echo $not_started_project; ?></h4>
                                                </div>
                                            </div>
                                            <div id="chart4" class="ms-auto mt-1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="card radius-15 border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="">
                                                    <p class="text-secondary mb-0">On Hold</p>
                                                    <h4 class="mb-0"><?php echo $on_hold_project; ?></h4>
                                                </div>
                                            </div>
                                            <div id="chart5" class="ms-auto mt-1"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-3">
                                    <div class="card radius-15 border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="">
                                                    <p class="text-secondary mb-0">In Progress</p>
                                                    <h4 class="mb-0"><?php echo $in_progress_project; ?></h4>
                                                </div>
                                            </div>
                                            <div id="chart7" class="ms-auto mt-1"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <div class="card radius-15 border shadow-none mb-0">
                                        <div class="card-body">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="">
                                                    <p class="text-secondary mb-0">Completed</p>
                                                    <h4 class="mb-0"><?php echo $completed_project; ?></h4>
                                                </div>
                                            </div>
                                            <div id="chart6" class="ms-auto mt-1"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 d-flex">
                    <div class="card radius-15 w-100">
                        <div class="card-body">

                            <div class="d-flex align-items-center mb-3">
                                <div>
                                    <h5 class="mb-0">Total Employees - <?php echo $total_employees; ?></h5>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="table-responsive">
                                                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr. No.</th>
                                                                    <th>Employee Name</th>
                                                                    <th>Email Id</th>
                                                                    <th>Contact No</th>
                                                                    <th>Role </th>
                                                                    <th>Designation</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0;
                                                                if (!empty($employees_list)) {
                                                                    foreach ($employees_list as $key => $value) { ?>
                                                                        <tr>
                                                                            <td><?php echo ++$i; ?></td>
                                                                            <td><?php echo $value['user_name']; ?></td>
                                                                            <td><?php echo $value['email']; ?></td>
                                                                            <td><?php echo $value['contact_no']; ?></td>
                                                                            <td><?php echo $value['role_name']; ?></td>
                                                                            <td><?php echo $value['des_name']; ?></td>

                                                                            <td><?php if ($value['status'] == 1) {
                                                                                ?>
                                                                                    <a
                                                                                        style='cursor: pointer;'>
                                                                                        <span style='color:green;font-weight:700'>Active</span>
                                                                                    </a>
                                                                                <?php } else {

                                                                                ?>
                                                                                    <a
                                                                                        style='cursor: pointer;'>
                                                                                        <span style='color:red;font-weight:700'>Deactive</span>
                                                                                    </a>
                                                                                <?php } ?>
                                                                            </td>


                                                                        </tr>
                                                                <?php }
                                                                } ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Sr. No.</th>
                                                                    <th>User Name</th>
                                                                    <th>Email Id</th>
                                                                    <th>Contact No</th>
                                                                    <th>Role </th>
                                                                    <th>Designation</th>
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
                    </div>
                </div>

                <div class="card radius-15 bg-light-primary">
                    <div class="card-body">
                        <div id="controls">
                            <?php
                            $currentYear = date('Y');      // e.g., 2025
                            $currentMonth = 'April'; // date('F');     // e.g., May
                            ?>

                            <label for="yearSelect">Year:</label>
                            <select id="yearSelect">
                                <?php
                                for ($year = 2025; $year >= 2021; $year--) {
                                    $selected = ($year == $currentYear) ? 'selected' : '';
                                    echo "<option value=\"$year\" $selected>$year</option>";
                                }
                                ?>
                            </select>

                            <label for="monthSelect">Month:</label>
                            <select id="monthSelect">
                                <?php
                                $months = [
                                    "January",
                                    "February",
                                    "March",
                                    "April",
                                    "May",
                                    "June",
                                    "July",
                                    "August",
                                    "September",
                                    "October",
                                    "November",
                                    "December"
                                ];
                                foreach ($months as $month) {
                                    $selected = ($month == $currentMonth) ? 'selected' : '';
                                    echo "<option value=\"$month\" $selected>$month</option>";
                                }
                                ?>
                            </select>

                        </div>

                        <div id="charts">
                            <div id="attendanceChart"></div>
                            <div id="donutChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->

        </div>
    </div>
    <!--end page-content-wrapper-->
</div>
<!--end page-wrapper-->
<!--start overlay-->
<div class="overlay toggle-btn-mobile"></div>
<!--end overlay-->

<script>
   function renderCharts(employees, attended, notAttended, half_day, year, month) {
    // Convert month name to month number
    const getMonthNumber = (monthName) => {
        return new Date(`${monthName} 1, 2000`).getMonth() + 1;
    };

    // Get all days in the month as strings
    const getDaysInMonth = (month, year) => {
        const date = new Date(year, month, 0); // month is 1-based
        const daysInMonth = date.getDate();
        const dates = [];
        for (let i = 1; i <= daysInMonth; i++) {
            dates.push(`Day ${i}`); // Label as "Day 1", "Day 2", etc.
        }
        return dates;
    };

    const monthNumber = getMonthNumber(month);
    const daysInMonth = getDaysInMonth(monthNumber, year);

    // Pad data arrays to ensure they have an entry for each day
    const padSeries = (data) => {
        const padded = [];
        for (let i = 0; i < daysInMonth.length; i++) {
            padded.push(data[i] !== undefined ? data[i] : 0);
        }
        return padded;
    };

    const paddedAttended = padSeries(attended);
    const paddedNotAttended = padSeries(notAttended);
    const paddedHalfDay = padSeries(half_day);

    // Render column chart with all date labels on X-axis
    Highcharts.chart('attendanceChart', {
        chart: {
            type: 'column'
        },
        title: {
            text: `Employee Attendance - ${month} ${year}`
        },
        xAxis: {
            categories: daysInMonth,
            title: {
                text: 'Date'
            },
            labels: {
                step: 1, // Show all date labels (no skipping)
                rotation: -45 // Optional: Rotate to fit better
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Employees'
            }
        },
        tooltip: {
            shared: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [
            {
                name: 'Present',
                data: paddedAttended,
                color: '#28a745'
            },
            {
                name: 'Absent',
                data: paddedNotAttended,
                color: '#dc3545'
            },
            {
                name: 'Half Day',
                data: paddedHalfDay,
                color: '#ffc107'
            }
        ]
    });

    // Render donut chart
    const totalAttended = paddedAttended.reduce((a, b) => a + b, 0);
    const totalNotAttended = paddedNotAttended.reduce((a, b) => a + b, 0);
    const totalHalfDay = paddedHalfDay.reduce((a, b) => a + b, 0);

    Highcharts.chart('donutChart', {
        chart: {
            type: 'pie'
        },
        title: {
            text: `Attendance Overview - ${month} ${year}`
        },
        plotOptions: {
            pie: {
                innerSize: '60%',
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y}'
                }
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>'
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [
                { name: 'Present', y: totalAttended, color: '#28a745' },
                { name: 'Absent', y: totalNotAttended, color: '#dc3545' },
                { name: 'Half Day', y: totalHalfDay, color: '#ffc107' }
            ]
        }]
    });
}



    function updateCharts() {
        const year = document.getElementById('yearSelect').value;
        const month = document.getElementById('monthSelect').value;

        fetch(`<?= base_url('Admin/get_attendance_data') ?>?year=${year}&month=${month}`)
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                    return;
                }

                renderCharts(
                    data.employees,
                    data.attended,
                    data.notAttended,
                    data.half_day,
                    year,
                    month
                );
            })
            .catch(err => {
                console.error('Error fetching chart data:', err);
                alert('Failed to load attendance data 1.');
            });
    }

    // Attach change event listeners
    document.getElementById('yearSelect').addEventListener('change', updateCharts);
    document.getElementById('monthSelect').addEventListener('change', updateCharts);

    // Initial chart load
    updateCharts();
</script>

<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->