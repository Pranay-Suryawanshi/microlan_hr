<?php
// phpinfo();
?>
<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Leave extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model('model');
        $this->load->model('employee_model');
        $this->load->model('leave_model');
        $sessionUser = $this->session->userdata();
        if (!$sessionUser['op_user_id']) {
            redirect('/');
        }
    }


    function holiday_list()
    {
        $data['holidays'] = $this->leave_model->GetAllHoliInfo();
        $pagename = 'Holiday List';
        $data['pagename'] = $pagename;

        $role_id = $this->session->userdata('user_role');
//         echo '<pre>';
// print_r($this->session->userdata());
// exit; 
        $condition = array('role_id' => $role_id);
        $role_data = $this->model->getRecords('op_user_role', '*', $condition);
        $perms = unserialize($role_data[0]['permission']);

        $data['perms'] = $perms;

        $this->model->partialView('admin/leave/holiday_list', $data, $pagename);
    }


    public function add_holiday()
    {

        $id = $this->input->post('id');
        $name = $this->input->post('holiname');
        $sdate = $this->input->post('startdate');
        $edate = $this->input->post('enddate');
        if (empty($edate)) {
            $nofdate = '1';
            //die($nofdate);
        } else {
            $date1 = new DateTime($sdate, new DateTimeZone('Asia/Kolkata'));
            $date2 = new DateTime($edate, new DateTimeZone('Asia/Kolkata'));
            $diff = date_diff($date1, $date2);
            $nofdate = $diff->format("%a");
            if ($nofdate == 0) {
                $nofdate = 1;
            }
            //die($nofdate);     
        }
        $month = date('M', strtotime($sdate));
        $year = date('Y', strtotime($sdate)); //date('m-Y', strtotime($sdate));

        $data = array();
        $data = array(
            'holiday_name' => $name,
            'from_date' => $sdate,
            'to_date' => $edate,
            'number_of_days' => $nofdate,
            'month' => $month,
            'year' => $year
        );
        if (empty($id)) {
            $success = $this->leave_model->Add_HolidayInfo($data);

            $this->session->set_flashdata('success', 'The Holiday details has been added successfully');
            redirect('holiday-list');
        } else {
            $success = $this->leave_model->Update_HolidayInfo($id, $data);
            $this->session->set_flashdata('success', 'The Holiday  details has been updated successfully');
            redirect('holiday-list');
        }
    }

    function import_excel()
    {
    //      echo "<pre>";
    // print_r($_FILES);
    // exit;

        // Excel file allowed mime types
        $file_mimes = [
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-excel'
        ];

        if (isset($_FILES['file']['name']) && in_array($_FILES['file']['type'], $file_mimes)) {
            $filePath = $_FILES['file']['tmp_name'];

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

                //echo "<pre>";
                //print_r($sheetData);
                //exit;

            $data = [];

            // Row loop (start from row 2 if row 1 is header)
            for ($i = 0; $i < count($sheetData); $i++) {    
                $name = trim($sheetData[$i][0]);
                $sdate = trim($sheetData[$i][1]);

                if (empty($name) || empty($sdate)) {
                    continue;
                }

                $month = date('M', strtotime($sdate));
                $year = date('Y', strtotime($sdate));

                $data[] = [
                    'holiday_name'     => $name,
                    'from_date'        => $sdate,
                    'month'            =>$month,
                    'year'             =>$year, 
                ];
            }

            // echo "<pre>";
            // print_r($data);
            // exit;

            if (!empty($data)) {
                $this->leave_model->insert_batch($data); // insert_batch() method tuzya model madhe asayla hava
                $this->session->set_flashdata('success', 'Bulk holidays uploaded successfully.');
            } else {
                $this->session->set_flashdata('error', 'No valid data found.');
            }
        } else {
            $this->session->set_flashdata('error', 'Please upload a valid Excel file.');
        }

        redirect('holiday-list');
    }

  public function export_holidays_excel()
{

     

    // IMPORTANT: Clean any previous output
    ob_clean(); 
    ob_start();

    // Fetch data
    $holidays = $this->leave_model->get_all_holidays();

    // Create Spreadsheet
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Header
    $sheet->setCellValue('A1', 'Holiday Name');
    $sheet->setCellValue('B1', 'Date');
    $sheet->setCellValue('C1', 'Month');
    $sheet->setCellValue('D1', 'Year');

    // Data rows
    $row = 2;
    foreach ($holidays as $holiday) {
        $sheet->setCellValue('A' . $row, $holiday->holiday_name);
        $sheet->setCellValue('B' . $row, date('Y-m-d', strtotime($holiday->from_date)));
        $sheet->setCellValue('C' . $row, $holiday->month);
        $sheet->setCellValue('D' . $row, $holiday->year);
        $row++;
    }

    // Set headers BEFORE sending anything
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Holiday.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}

    


    function update_holiday()
    {
        $holiday_id = $this->input->post('holiday_id');
        $name = $this->input->post('holiname');
        $sdate = $this->input->post('startdate');
        $edate = $this->input->post('enddate');
        if (empty($edate)) {
            $nofdate = '1';
            //die($nofdate);
        } else {
            $date1 = new DateTime($sdate, new DateTimeZone('Asia/Kolkata'));
            $date2 = new DateTime($edate, new DateTimeZone('Asia/Kolkata'));
            $diff = date_diff($date1, $date2);
            $nofdate = $diff->format("%a");
            if ($nofdate == 0) {
                $nofdate = 1;
            }
            //die($nofdate);     
        }
        $month = date('M', strtotime($sdate));
        $year = date('Y', strtotime($sdate)); //date('m-Y', strtotime($sdate));

        $data = array();
        $data = array(
            'holiday_name' => $name,
            'from_date' => $sdate,
            'to_date' => $edate,
            'number_of_days' => $nofdate,
            'month' => $month,
            'year' => $year
        );
        if (empty($holiday_id)) {
            $success = $this->leave_model->Add_HolidayInfo($data);

            $this->session->set_flashdata('success', 'The Holiday details has been added successfully');
            redirect('holiday-list');
        } else {
            $success = $this->leave_model->Update_HolidayInfo($holiday_id, $data);
            $this->session->set_flashdata('success', 'The Holiday  details has been updated successfully');
            redirect('holiday-list');
        }
    }

    function statuscustomer($id, $status)
    {
        $this->model->updateData('customer', array('status' => $status), array('cust_id' => $id));

        $this->session->set_flashdata('success', '<strong>Well done!</strong> customer status updated successfully.');

        redirect('customer-list');
    }

    public function get_holiday_details()
    {
        if ($this->session->userdata('is_admin_logged_in') != False) {
            $id                   = $this->input->get('id');
            $data['holidayvalue'] = $this->leave_model->GetLeaveValue($id);
            echo json_encode($data);
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function leave_list()
    {
        $data['employee']    = $this->employee_model->emselect(); // gets active employee details
        $data['leavetypes']  = $this->leave_model->GetleavetypeInfo();
        $data['application'] = $this->leave_model->AllLeaveAPPlication();

        // $data['leaves'] = $this->leave_model->GetAllLeaveInfo();
        $user_id = $this->session->userdata('op_user_id');
        $data['leaves'] = $this->leave_model->GetLeaveInfoByUser($user_id);

        $role_id = $this->session->userdata('user_role');
        $data['role_id'] = $role_id;
    
        $pagename = 'Leave List';
        $data['pagename'] = $pagename;
        $this->model->partialView('admin/leave/leave_list', $data, $pagename);
    }

    function submit_leave_application()
    {
        if ($this->session->userdata('is_admin_logged_in') != False) {
            $emp_id         = $this->input->post('emp_id');
            $leave_type_id       = $this->input->post('leave_type_id');
            $apply_date    = date('Y-m-d');
            $appstartdate = $this->input->post('start_date');
            $appenddate   = $this->input->post('end_date');
            $hourAmount   = $this->input->post('hour_length');
            $reason       = $this->input->post('leave_reason');
            $type         = $this->input->post('leave_duration');
            // $duration     = $this->input->post('duration');

            if ($type == 'Hourly') {
                $duration = $hourAmount;
            } else if ($type == 'Full Day') {
                $duration = 8;
            } else {
                $formattedStart = new DateTime($appstartdate);
                $formattedEnd = new DateTime($appenddate);

                $duration = $formattedStart->diff($formattedEnd)->format("%d");
                $duration = $duration * 8;
            }


            $data = array();
            $data = array(
                'emp_id' => $emp_id,
                'leave_type_id' => $leave_type_id,
                'apply_date' => $apply_date,
                'start_date' => $appstartdate,
                'end_date' => $appenddate,
                'leave_reason' => $reason,
                'leave_type' => $type,
                'hour_length' => $duration,
                'leave_status' => 'Not Approve'
            );

            // print_r($data);
            // die();

            $success = $this->leave_model->Application_Apply($data);
            $this->session->set_flashdata('msg', 'New Leave application added successfully.');
            redirect(base_url() . 'leave-list');
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function update_leave_application()
    {
        if ($this->session->userdata('is_admin_logged_in') != False) {
            $emp_leave_id         = $this->input->post('emp_leave_id');
            $emp_id         = $this->input->post('emp_id');
            $leave_type_id       = $this->input->post('leave_type_id');
            $apply_date    = date('Y-m-d');
            $appstartdate = $this->input->post('start_date');
            $appenddate   = $this->input->post('end_date');
            $hourAmount   = $this->input->post('hour_length');
            $reason       = $this->input->post('leave_reason');
            $type         = $this->input->post('editleave_duration');
            $leave_status = $this->input->post('leave_status');
            // $duration     = $this->input->post('duration');

            if ($type == 'Hourly') {
                $duration = $hourAmount;
            } else if ($type == 'Full Day') {
                $duration = 8;
            } else {
                $formattedStart = new DateTime($appstartdate);
                $formattedEnd = new DateTime($appenddate);

                $duration = $formattedStart->diff($formattedEnd)->format("%d");
                $duration = $duration * 8;
            }


            $data = array();
            $data = array(
                'emp_id' => $emp_id,
                'leave_type_id' => $leave_type_id,
                'apply_date' => $apply_date,
                'start_date' => $appstartdate,
                'end_date' => $appenddate,
                'leave_reason' => $reason,
                'leave_type' => $type,
                'hour_length' => $duration,
                'leave_status' => $leave_status
            );

            $success = $this->leave_model->Application_Apply_Update($emp_leave_id, $data);
            $this->session->set_flashdata('msg', 'Leave application details updated successfully.');
            redirect(base_url() . 'leave-list');
        } else {
            redirect(base_url(), 'refresh');
        }
    }

    function approve_leave_application()
    {
        $this->model->updateData('emp_leave', array('leave_status' => 'Approved'), array('emp_leave_id' => $_POST['emp_leave_id']));
        
        // print_r($_POST); exit;

        $this->session->set_flashdata('success', '<strong>Well done!</strong> leave application status updated successfully.');

        redirect('leave-list');
    }

    function reject_leave_application()
    {
        $reject_reason = $this->input->post('reject_reason');

        $this->model->updateData('emp_leave', array('leave_status' => 'Rejected', 'reject_reason' => $reject_reason), array('emp_leave_id' => $_POST['emp_leave_id']));

        $this->session->set_flashdata('success', '<strong>Well done!</strong> leave application status updated successfully.');

        redirect('leave-list');
    }

    function leave_report()
    {
        $data['employee']  = $this->employee_model->emselect(); // gets active employee details
        $data['leavetypes']  = $this->leave_model->GetleavetypeInfo();

        $pagename = 'Leave Report';
        $data['pagename'] = $pagename;

        $data['report_date'] = '';
        $data['emp_id'] = '';

        $this->model->partialView('admin/leave/leave_report', $data, $pagename);
    }

    function filter_leave_report()
    {
        $pagename = 'Leave Report';
        $data['pagename'] = $pagename;

        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('to_date');
        $emp_id = $this->input->post('emp_id');

        $data['employee']  = $this->employee_model->emselect(); // gets active employee details
        $data['leavetypes']  = $this->leave_model->GetleavetypeInfo();

        // print_r($data);
        // die();

        if ($emp_id == 0) {
            $data['leave_report'] = $this->model->getSqlData("SELECT el.*, op.*, lt.*
                                                                from emp_leave el
                                                                left join op_user op on op.op_user_id = el.emp_id
                                                                left join leave_types lt on lt.type_id = el.leave_type_id
                                                                Where el.apply_date >= '$from_date' AND el.apply_date <= '$to_date' 
                                                                    ORDER BY el.emp_leave_id ASC");
        } else {
            $data['leave_report'] = $this->model->getSqlData("SELECT el.*, op.*, lt.*
                                                                from emp_leave el
                                                                left join op_user op on op.op_user_id = el.emp_id
                                                                left join leave_types lt on lt.type_id = el.leave_type_id
                                                                Where el.emp_id = '$emp_id' AND el.apply_date >= '$from_date' AND el.apply_date <= '$to_date' 
                                                                    ORDER BY el.emp_leave_id ASC");
        }

        // echo "SELECT el.*, op.*, lt.*
        //                                                         from emp_leave el
        //                                                         left join op_user op on op.op_user_id = el.emp_id
        //                                                         left join leave_types lt on lt.type_id = el.leave_type_id
        //                                                         Where el.emp_id = '$emp_id' AND el.apply_date >= '$from_date' AND el.apply_date <= '$to_date' 
        //                                                             ORDER BY el.emp_leave_id ASC";

        //         echo "SELECT 
        //   el.emp_leave_id, el.start_date, el.end_date, el.leave_reason, 
        //   el.leave_type_id, el.emp_id, el.leave_status,
        //   lt.name AS leave_type_name, 
        //   op.user_name AS employee_name
        // FROM emp_leave el
        // LEFT JOIN op_user op ON op.op_user_id = el.emp_id
        // LEFT JOIN leave_types lt ON lt.type_id = el.leave_type_id
        // WHERE el.emp_id = '22'
        //   AND el.apply_date >= '2024-01-20'
        //   AND el.apply_date <= '2025-05-30'
        // ORDER BY el.emp_leave_id DESC";
        // die();

        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;
        $data['emp_id'] = $emp_id;

        $this->model->partialView('admin/leave/leave_report', $data, $pagename);
    }

    function process_form()
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        // Basic validation (in case JavaScript is bypassed)
        $errors = [];

        if (empty($name)) {
            $errors[] = 'Name is required';
        }

        if (empty($email)) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        if (empty($message)) {
            $errors[] = 'Message is required';
        }

        // Return success or error
        if (empty($errors)) {
            // Normally you would process the data here (store in a DB, etc.)
            echo 'Form submitted successfully!';
        } else {
            echo implode(', ', $errors);
        }
    }
}
