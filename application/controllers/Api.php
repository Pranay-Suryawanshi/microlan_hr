<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class api extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        error_reporting(0);
        $this->load->Model('model');
        $this->load->Model('api_model');
        $this->load->Model('counter_model');

        $this->load->helper('common_helper');
        //$this->config->load('payg');
        //$this->load->library('payg');
        //$this->merchant_key = $this->config->item('merchant_key');
        //$this->aggregator_id = $this->config->item('aggregator_id');
        //$this->merchant_id = $this->config->item('merchant_id');
        //$this->payg_url = $this->config->item('pay_url');
    }

    function whatsapp_api()
    {
        $sql = "SELECT * from project Where project_active_status = 1";
        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            foreach ($res->result() as $row) {
                $row->project_developer;

                $exploded = explode(",", $row->project_developer);
                $size = count($exploded);

                for ($k = 0; $k < $size; $k++) {
                    if ($exploded[$k] == $op_user_id) {
                        $data['project_list'] = $this->model->getSqlData("SELECT * from project Where project_active_status = 1");
                    } else {
                        $data['project_list'] = $this->model->getSqlData("SELECT * from project Where project_active_status = 1");
                    }
                }
            }
        }

        $data['user_list'] = $this->model->getSqlData("SELECT op.*, op.flag as user_flag, c.*, opr.*
                                                    from op_user op 
                                                    left join company_setting c on c.comp_sett_id = op.company_id
                                                    left join op_user_role opr on opr.role_id = op.role_id");

        $data['message'] = 'User & Project List';
        $data['status'] = '1';
        echo json_encode($data);
        exit();
    }

    function chat_api()
    {
        $type = $this->input->post('type');

        if ($type == 'user') {
            $login_user_id = $this->input->post('login_user_id') ?? 0;
            $user_id = $this->input->post('user_id') ?? 0;

            $chatData =  $this->model->getSqlData("SELECT * FROM user_chat 
                                    WHERE (((user_chat_send_by = '" . $login_user_id . "' AND send_to_user = '" . $user_id . "')
                                        OR 
                                        (send_to_user = '" . $login_user_id . "' AND user_chat_send_by = '" . $user_id . "')))");

            $chat_update = array(
                'user_chat_view' => '1',
            );

            $where_condition = "(
            (user_chat_send_by = '" . $login_user_id . "' AND send_to_user = '" . $user_id . "')
            OR 
            (send_to_user = '" . $login_user_id . "' AND user_chat_send_by = '" . $user_id . "'))";

            // Updating the data with the same condition
            $this->model->updateData('user_chat', $chat_update, $where_condition);

            $response = [
                'success' => 'success',
                'chatData' => $chatData,
            ];

            // Send the JSON response
            $data['chatData'] = $response['chatData'];
            $data['message'] = 'Chat details';
            $data['status'] = '1';
            echo json_encode($data);
            exit();
        } else if ($type == 'project') {
            $project_id = $this->input->post('project_id') ?? 0;

            $chatData =  $this->model->getSqlData("SELECT gm.*, op.* FROM chat_group_msg gm
                                              left join op_user op on op.op_user_id = gm.sender_id
                                                WHERE gm.group_id = '" . $project_id . "'");

            $response = [
                'success' => 'success',
                'chatData' => $chatData,
            ];

            // Send the JSON response
            $data['chatData'] = $response['chatData'];
            $data['message'] = 'Project Chat details';
            $data['status'] = '1';
            echo json_encode($data);
            exit();
        }
    }

    function login()
    {
        error_reporting(0);
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        $data['header_name'] = $headerName;
        $data['headerValue'] = $_SERVER[$headerName];
        $token = "loronkmgeqkdvnqf";
        $email_address = $this->input->get_post('email_address');
        $password = $this->input->get_post('password');
        $fcm_notification = $this->input->get_post('fcm_notification');
        // $data['email_address']=$email_address;
        // $data['password']=$password;
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            // $headerValue = "loronkmgeqkdvnqf";
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                $user_data = $this->model->getData('op_user', array('email' => $email_address, 'password' => md5($password)));

                if (isset($user_data) && !empty($user_data)) {
                    $newdata = array(
                        'op_user_id' => $user_data[0]['op_user_id'],
                        //  'op_user_name'=>$user_data[0]['user_id'],
                        'op_user_name' => $user_data[0]['user_name'],
                        'op_user_role' => $user_data[0]['role_id'],
                        //'is_admin_logged_in'=>TRUE
                    );
                    $this->session->set_userdata($newdata);
                    $this->model->updateData('op_user', array('fcm_notification' => $fcm_notification), array('op_user_id' => $user_data[0]['op_user_id']));
                    $data = array(
                        "res" => array(
                            "user_id" => (string)$user_data[0]['op_user_id'],
                            "name" => $user_data[0]['user_name'],
                            "email_address" => $user_data[0]['email'],
                            "mobile_number" => $user_data[0]['mobile_number'],  // Ensure this field exists in your database
                            "Address" => $user_data[0]['address'] ?? ""        // Default to empty if address is not set
                        ),
                        "status" => "1",
                        "msg" => "You have logged in successfully."
                    );
                } else {
                    $data = array(
                        "status" => "0",
                        "msg" => "The mobile number or password you entered is invalid."
                    );
                }
                // else {
                // 		$data['status'] = '0';
                // 		$data['message'] = 'Required parameters are missing.';
                // 	}
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        }
        echo json_encode($data);
    }


    function update_profile()
    {
        $user_id = $this->input->get_post('user_id');
        $name =  $this->input->get_post('name');
        $email_address =  $this->input->get_post('email_address');
        $address = $this->input->get_post('address');
        $mobile_number = $this->input->get_post('mobile_number');
        $current_pic = $this->input->get_post('profile_image');

        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                if (empty($user_id)) {
                    $errors['status'] = "0";
                    $errors['message'] = "User id is required.";
                    echo json_encode($errors);
                    return false;
                }
                $user_data = $this->model->getData('op_user', array('op_user_id' => $user_id));
                if (isset($user_data) && !empty($user_data)) {
                    $data1 = base64_decode($current_pic);
                    $uploaddir = './upload/profile/';

                    if (!empty($data1)) {
                        $filename = 'image_' . time() . '.png';
                        $uploadfile = $uploaddir . $filename;
                        $file_path = $uploaddir . 'image_' . time() . '.png';

                        // Save the image to the specified path
                        if (file_put_contents($file_path, $data1)) {
                            //echo 'Image saved successfully: ' . $filename;
                            $upi_image = $filename;
                        } else {
                            //echo 'Failed to save image.';
                            $upi_image = '';
                        }
                    } else {
                        //echo 'Failed to save image.';
                        $upi_image = '';
                    }


                    $update_data = array(
                        'user_name' => $name,
                        'contact_no' => $mobile_number,
                        'address' => $address,
                        'email' => $email_address,
                        'profile_photo' => $upi_image
                    );

                    if ($this->model->updateData('op_user', $update_data, array('op_user_id' => $user_id))) {
                        $data['status'] = '1';
                        $data['msg'] = 'Profile  updated successfully.';
                    } else {
                        $data['status'] = '0';
                        $data['msg'] = 'Something went wrong.Please try again.';
                    }
                } else {
                    $data['status'] = '0';
                    $data['msg'] = 'User not found.';
                }
            } else {
                $data['status'] = '0';
                $data['msg'] = 'Un Authorised user token invalid.';
            }
        } else {
            $data['msg'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }

        echo json_encode($data);
    }
    function forgot_password()
    {
        $email_address = $this->input->get_post('email_address');
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));

        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                if (isset($email_address) && !empty($email_address)) {

                    $user_data = $this->model->getData('op_user', array('email' => $email_address));
                    if (isset($user_data) && !empty($user_data)) {
                        $user_id = $user_data[0]['op_user_id'];
                        $otp_code = get_random_number(4);
                        $this->send_forgot_pasword_activation_link($user_id, $email_address, $otp_code);

                        $fp_data = $this->model->getData('db_forgot_password', array('user_id' => $user_id, 'email_address' => trim($email_address)));
                        if (isset($fp_data) && empty($fp_data)) { //no need to insert the record
                            $this->model->insertData('db_forgot_password', array('user_id' => $user_id, 'email_address' => $email_address, 'otp_code' => $otp_code, 'added_date' => date('Y-m-d H:i:s')));
                        }

                        $data['status'] = '1';
                        $data['otp_code'] = $otp_code;
                        $data['msg'] = 'otp send Successfully to your respective email id';
                    } else {
                        $data['status'] = '2';
                        $data['msg'] = 'Oopss. It seems that your email address is not registered with us. Please register your account with us.';
                    }
                } else {
                    $data['status'] = '0';
                    $data['msg'] = 'Invalid form data send.';
                }
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }
        echo json_encode($data);
    }

    function send_forgot_pasword_activation_link($usr_id, $email_address, $otp_code)
    {
        $to      = $email_address;
        $ip_address = $this->input->ip_address();

        $href_link = base_url() . "home/password_recovery?usrid=" . $usr_id . "&hash=" . base64_encode($email_address);

        $subject = 'Reset your Password';
        $message = "A request to reset password was received from your Grid Account - " . $email_address . " from the IP - " . $ip_address . " .<br>";
        $message .= '<br>Use ' . $otp_code . ' this one time opt to reset your password and login.</a>';
        $message .= '<br><br><b>Note:</b> This opt is valid for one time to you and can be used to change your password only once.';

        $message .= '<br><br>Regards,<br>';
        $message .= 'mPower Team<br>';
        $message .= '<a href="' . base_url() . '">mPower<br>';

        // $headers = 'From: DirectFarm.in <support@directfarm.in>' . "\r\n" .
        //     		'Reply-To: support@directfarm.in' . "\r\n" .
        //     		"MIME-Version: 1.0\r\n".
        // 			"Content-Type: text/html; charset=ISO-8859-1\r\n";
        // 			'X-Mailer: PHP/';

        // $retval = mail($to, $subject, $message, $headers);
        $company_setting = $this->model->getData('company_setting')[0];
        sendEmail($company_setting['email'], $to, $subject, $message);
    }

    function reset_password()
    {
        $email_address = $this->input->get_post('email_address');
        $password = $this->input->get_post('confirm_password');
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));

        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                if (isset($email_address) && !empty($email_address)) {

                    $user_data = $this->model->getData('op_user', array('email' => $email_address));
                    if (isset($user_data) && !empty($user_data)) {

                        $user_id = $user_data[0]['op_user_id'];
                        // $this->model->updateData()
                        $this->model->updateData('op_user', array('password' => md5($password)), array('op_user_id' => $user_id));
                        $del = $this->model->deleteData('db_forgot_password', array('user_id' => $user_id));
                        $data['status'] = '1';

                        $data['msg'] = 'password updated Successfully';
                    } else {
                        $data['status'] = '2';
                        $data['msg'] = 'Oopss. It seems that your email address is not registered with us.';
                    }
                } else {
                    $data['status'] = '0';
                    $data['msg'] = 'Invalid form data send.';
                }
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }

        echo json_encode($data);
    }

    function punching()
    {
        $user_id = $this->input->get_post('user_id');
        $latitude = $this->input->get_post('latitude');
        $longitude = $this->input->get_post('longitude');
        $punch_type = $this->input->get_post('punch_status');
        $current_pic = $this->input->get_post('current_pic');
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                if (isset($user_id) && !empty($user_id) && isset($latitude) && !empty($latitude) && isset($longitude) && !empty($longitude) && isset($punch_type) && !empty($punch_type)) {
                    if ($punch_type == '1') {
                        // date_default_timezone_set('Asia/Kolkata');
                        $data1 = base64_decode($current_pic);
                        $uploaddir = './uploads/attendance/';
                        //    if (!is_dir($uploaddir)) {
                        //      mkdir($uploaddir, 0777, TRUE);
                        //     }


                        $punchinTime = date('Y-m-d H:i:s');
                        if (!empty($data1)) {
                            $filename = 'image_' . time() . '.png';
                            $uploadfile = $uploaddir . $filename;
                            $file_path = $uploaddir . 'image_' . time() . '.png';

                            // Save the image to the specified path
                            if (file_put_contents($file_path, $data1)) {
                                //echo 'Image saved successfully: ' . $filename;
                                $upi_image = $filename;
                            } else {
                                //echo 'Failed to save image.';
                                $upi_image = '';
                            }
                        } else {
                            //echo 'Failed to save image.';
                            $upi_image = '';
                        }
                        $insertData = [
                            'attendance_log_emp_id' => $user_id,
                            'attendance_log_in_time' => $punchinTime,
                            'attendance_log_in_latitude' => $latitude,
                            'attendance_log_in_longitude' => $longitude,
                            'emp_punching_image' => $upi_image
                        ];
                        $this->model->insertData('attendance_log', $insertData);

                        $insertData1 = [
                            'user_id' => $user_id,
                            'longitude' => $longitude,
                            'latitude' => $latitude,
                        ];
                        $this->model->insertData('attendance_monitor_log', $insertData1);

                        $data = array(
                            'punch_in_time' => $punchinTime,
                            'punch_out_time' => '',
                            "status" => "1",
                            "msg" => "You have punch in successfully."
                        );
                    }
                    if ($punch_type == '2') {
                        $punchoutTime = date('Y-m-d H:i:s');
                        $currentDate = date('Y-m-d');
                        $query = "SELECT * FROM attendance_log WHERE attendance_log_emp_id = '" . $user_id . "' AND DATE(attendance_log_in_time) = '" . $currentDate . "'";
                        // $attendanceRecord = $this->model->query($query, [$user_id, $currentDate])->fetch();
                        $attendanceRecord = $this->model->getSqlData($query);
                        $data['attendanceRecord'] = $attendanceRecord;
                        $updateData = [

                            'attendance_log_out_time' => $punchoutTime,
                            'attendance_log_out_latitude' => $latitude,
                            'attendance_log_out_longitude' => $longitude
                        ];

                        $this->model->updateData('attendance_log', $updateData, array('attendance_log_id' => $attendanceRecord[0]['attendance_log_id'], 'attendance_log_emp_id' => $user_id));

                        $data = array(
                            'punch_in_time' => $attendanceRecord[0]['attendance_log_in_time'],
                            'punch_out_time' => $punchoutTime,
                            "status" => "1",
                            "msg" => "You have punch out successfully."
                        );
                    }
                } else {
                    $data['status'] = '0';
                    $data['msg'] = 'Invalid form data send.';
                }
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }
        echo json_encode($data);
    }

    function location_notification()
    {
        $user_id = $this->input->get_post('user_id');
        $latitude = $this->input->get_post('latitude');
        $longitude = $this->input->get_post('longitude');

        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                if (isset($user_id) && !empty($user_id) && isset($latitude) && !empty($latitude) && isset($longitude) && !empty($longitude)) {

                    $insertData1 = [
                        'user_id' => $user_id,
                        'longitude' => $longitude,
                        'latitude' => $latitude,
                    ];
                    $this->model->insertData('attendance_monitor_log', $insertData1);

                    $data = array(

                        "status" => "1",
                        "msg" => "Your notification added successfully."
                    );
                } else {
                    $data['status'] = '0';
                    $data['msg'] = 'Invalid form data send.';
                }
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }
        echo json_encode($data);
    }

    function leave_type()
    {
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                $data['leave_array'] = $this->model->getData('leave_types', array('status' => 1));
                $data['message'] = 'Leave type array';
                $data['status'] = '1';
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }

        echo json_encode($data);
    }

    function lead_mode()
    {
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                $data['leadMode_array'] = $this->model->getData('lead_mode_tbl', array('status' => 1));
                $data['message'] = 'Lead mode array';
                $data['status'] = '1';
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }
        echo json_encode($data);
    }

    function lead_status()
    {
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                $data['leadStatus_array'] = $this->model->getData('lead_status', array('status' => 1));
                $data['message'] = 'Lead status array';
                $data['status'] = '1';
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }
        echo json_encode($data);
    }

    function lead_source()
    {
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                $data['leadSource_array'] = $this->model->getData('lead_source', array('source_status' => 1));
                $data['message'] = 'Lead source array';
                $data['status'] = '1';
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }
        echo json_encode($data);
    }

    function requirement_type()
    {
        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                $data['requirementType_array'] = $this->model->getData('project_type_tbl', array('status' => 1));
                $data['message'] = 'Lead source array';
                $data['status'] = '1';
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }
        echo json_encode($data);
    }

    function request_leave()
    {
        $user_id = $this->input->get_post('user_id');
        $description =  $this->input->get_post('description');
        $leave_type =  $this->input->get_post('leave_type');
        $leave_mode = $this->input->get_post('leave_mode');
        $from_date = $this->input->get_post('from_date');
        $to_date = $this->input->get_post('to_date');

        $headerName = 'HTTP_' . str_replace('-', '_', strtoupper('token'));
        if (isset($_SERVER[$headerName])) {
            $headerValue = $_SERVER[$headerName];
            $expectedToken = "loronkmgeqkdvnqf";
            if ($headerValue === $expectedToken) {
                if (isset($user_id) && !empty($user_id) && isset($description) && !empty($description) && isset($leave_type) && !empty($leave_type) && isset($leave_mode) && !empty($leave_mode) && isset($from_date) && !empty($from_date) && isset($to_date) && !empty($to_date)) {
                    $insertArray = [
                        'emp_id' => $user_id,
                        'leave_type_id' => $leave_type,
                        'leave_type' => $leave_mode,

                    ];
                } else {
                    $data['status'] = '0';
                    $data['msg'] = 'Invalid form data send.';
                }
            } else {
                $data['message'] = 'You are not a valid user';
                $data['status'] = '0';
                echo json_encode($data);
                exit();
            }
        } else {
            $data['message'] = 'authantication failed';
            $data['status'] = '0';
            echo json_encode($data);
            exit();
        }

        echo json_encode($data);
    }
}
