<?php defined('BASEPATH') or exit('No direct script access allowed');

$config = array(
    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => 'smtp.googlemail.com',
    'smtp_port' => 465,
    'smtp_crypto' => 'ssl',
    'smtp_timeout' => "400",
    // 'smtp_user' => 'noreplay.maagroup@gmail.com',
    // 'smtp_pass' => 'ixkx ervm dlgi fbad', //'Hire@7800', // less secure password 
    'smtp_user' => 'krutika.patel@microlan.in',
    'smtp_pass' => 'M!crolan@123', // less secure password 
    'validate' => true,
    'charset' => 'utf-8',
    'mailtype' => "html",
    'crlf' => "\r\n",
    'newline' => "\r\n"
);

// noreplay.maagroup@gmail.com
// NoReplay@Maa


//$this->load->config('email');
//         $this->load->library('email');

//         $subject = 'Test - Test';
//         $this->email->from('test@gmail.com', 'Test - Test');
//         $this->email->to("vaibhavi.more@microlan.in");
//         $this->email->subject($subject);
//         $this->email->message("Test");
//         $this->email->set_header('Reply-To', 'immigration@maclareen.com');
//         $this->email->set_mailtype("html");

//         // Attempt to send the email
//         if ($this->email->send()) {
//             echo 'Email sent successfully.';
//         } else {
//             echo 'Error sending email: ' . $this->email->print_debugger();
//         }
// die;