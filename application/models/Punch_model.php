<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Punch_model extends CI_Model {

    public function punch_in($user_id, $latitude, $longitude) {
        $data = [
            'attendance_log_emp_id' => $user_id,
            'attendance_log_in_time' => date('Y-m-d H:i:s'),
            'attendance_log_in_latitude' => $latitude,
            'attendance_log_in_longitude' => $longitude
        ];
        return $this->db->insert('attendance_log', $data);
    }

    public function punch_out($user_id) {
        $this->db->select('punch_in_time');
        $this->db->where('user_id', $user_id);
        $this->db->where('punch_out_time IS NULL', null, false);
        $log = $this->db->get('punch_log')->row();

        if (!$log) return false;

        $punch_in_time = new DateTime($log->punch_in_time);
        $punch_out_time = new DateTime();
        $working_hours = $punch_in_time->diff($punch_out_time)->format('%h:%i:%s');

        $data = [
            'punch_out_time' => $punch_out_time->format('Y-m-d H:i:s'),
            'working_hours' => $working_hours
        ];

        $this->db->where('user_id', $user_id);
        $this->db->where('punch_out_time IS NULL', null, false);
        return $this->db->update('punch_log', $data);
    }
}
