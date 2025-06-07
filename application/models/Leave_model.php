<?php

	class Leave_model extends CI_Model {


	function __consturct(){
	parent::__construct();
	
	}
    public function Add_HolidayInfo($data){
        $this->db->insert('holiday',$data);
    }

    public function insert_batch($data)
    {
     $this->db->insert_batch('holiday', $data);
    }

    public function get_all_holidays($limit = null)
{
    if ($limit) {
        $this->db->limit($limit);
    }
    return $this->db->order_by('from_date', 'ASC')->get('holiday')->result();
}



    // Add the application of leave with ID no ID
    public function Application_Apply($data){
        $this->db->insert('emp_leave',$data);
    }

    // Add Earn leave with ID no ID
    public function Add_Earn_Leave($data){
        $this->db->insert('earned_leave',$data);
    }

    // Update application with employee ID
    public function Application_Apply_Update($id, $data){
        $this->db->where('emp_leave_id', $id);
        $this->db->update('emp_leave', $data);         
    }

    public function Add_leave_Info($data){
        $this->db->insert('leave_types',$data);
    }
    public function Application_Apply_Approve($data){
        $this->db->insert('assign_leave', $data);
    }
    public function GetAllHoliInfo(){
        $sql = "SELECT * FROM `holiday` ORDER BY `id` DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

   public function GetLeaveInfoByUser($user_id){
    $this->db->select('emp_leave.*, op_user.user_name');
    $this->db->from('emp_leave');
    $this->db->join('op_user','op_user.op_user_id = emp_leave.emp_id','left');
    $this->db->where('emp_id', $user_id);
    $this->db->order_by('emp_leave.leave_added_on', 'DESC'); // 🔄 DESC order by timestamp
    $query = $this->db->get();
    return $query->result();
}


    // public function GetAllLeaveInfo(){
    //     $sql = "SELECT el.*, el.leave_added_on AS added_on, lt.*, op.* 
    //     FROM emp_leave el
    //     LEFT JOIN leave_types lt ON lt.type_id = el.leave_type_id
    //     LEFT JOIN op_user op ON op.op_user_id = el.emp_id 
    //     ORDER BY el.leave_added_on DESC";
    //     $query = $this->db->query($sql);
    //     $result = $query->result();
    //     return $result;
    // }

    
    public function GetAllHoliInfoForCalendar(){
        $sql = "SELECT holiday_name AS `title`, from_date AS `start` FROM `holiday`";
        $query = $this->db->query($sql);
        $result = $query->result();
        return json_encode($result);
    }
    public function GetLeaveValue($id){
        $sql = "SELECT * FROM `holiday` WHERE `id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function GetEarneBalanceByEmCode($id){
        $sql = "SELECT `earned_leave`.*,
        `employee`.`em_id`,CONCAT(`first_name`, ' ', `last_name`) AS emname
        FROM `earned_leave`
        LEFT JOIN `employee` ON `earned_leave`.`em_id`=`employee`.`em_id`
        WHERE `earned_leave`.`em_id`='$id'";        
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function GetLeaveType($id){
        $sql = "SELECT * FROM `leave_types` WHERE `type_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function GetleavetypeInfo(){
        $sql = "SELECT * FROM `leave_types` WHERE `status`='1' ORDER BY `type_id` DESC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result; 
    }
    public function GetleavetypeInfoid($id){
        $sql = "SELECT * FROM `leave_types` WHERE `status`='1' AND `type_id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function GetemassignLeaveType($emid,$id,$year){
        $sql = "SELECT `hour` FROM `assign_leave` WHERE `assign_leave`.`emp_id`='$emid' AND `type_id`='$id' AND `dateyear`='$year'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result;
    }
    public function GetTotalDay($type){
        $sql = "SELECT * FROM `assign_leave` WHERE `assign_leave`.`type_id`='$type'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function GetemLeaveType($id,$year){
        $sql = "SELECT `assign_leave`.*,
        `leave_types`.`name`
        FROM `assign_leave`
        LEFT JOIN `leave_types` ON `assign_leave`.`type_id`=`leave_types`.`type_id`
        WHERE `assign_leave`.`emp_id`='$id' AND `dateyear`='$year'
        ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result; 
    }
    public function GetEmLEaveReport($emid, $day, $year){

        if($emid == "all") {
        $sql = "SELECT `emp_leave`.*,
                (SELECT SUM(`leave_duration`) 
                    FROM emp_leave
                    WHERE  MONTH(start_date) = '$day' AND YEAR(start_date) = '$year') AS `total_duration`,
                    `employee`.`first_name`,`last_name`,`em_code`,
                    `leave_types`.`name`
                FROM `emp_leave`
                    LEFT JOIN `leave_types` ON `emp_leave`.`typeid`=`leave_types`.`type_id`
                    LEFT JOIN `employee` ON `emp_leave`.`em_id`=`employee`.`em_id`
                WHERE MONTH(start_date) = '$day' AND YEAR(start_date) = '$year'";
    } else {

        $sql = "SELECT `emp_leave`.*, (SELECT SUM(`leave_duration`) 
       FROM emp_leave
       WHERE  `emp_leave`.`em_id` = '$emid' AND MONTH(start_date) = '$day' AND YEAR(start_date) = '$year') AS `total_duration`,
        `employee`.`first_name`,`last_name`,`em_code`, 
        `leave_types`.`name`
        FROM `emp_leave`
        LEFT JOIN `leave_types` ON `emp_leave`.`typeid`=`leave_types`.`type_id`
        LEFT JOIN `employee` ON `emp_leave`.`em_id`=`employee`.`em_id`
        WHERE `emp_leave`.`em_id` = '$emid' AND MONTH(start_date) = '$day' AND YEAR(start_date) = '$year'";

/*public function GetEmLEaveReport($emid, $date){

        if($emid == "all") {
            $sql = "SELECT `assign_leave`.*,
        `employee`.`first_name`,`last_name`,
        `leave_types`.`name`
        FROM `assign_leave`
        LEFT JOIN `leave_types` ON `assign_leave`.`type_id`=`leave_types`.`type_id`
        LEFT JOIN `employee` ON `assign_leave`.`emp_id`=`employee`.`em_id`
        WHERE `dateyear`='$date'
        ";
    } else {

        $sql = "SELECT `assign_leave`.*,
        `employee`.`first_name`,`last_name`,
        `leave_types`.`name`
        FROM `assign_leave`
        LEFT JOIN `leave_types` ON `assign_leave`.`type_id`=`leave_types`.`type_id`
        LEFT JOIN `employee` ON `assign_leave`.`emp_id`=`employee`.`em_id`
        WHERE `assign_leave`.`emp_id`='$emid' AND `dateyear`='$date'
        ";
    }

*/
        
    }
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result; 
}
    public function GetLeaveToday($date){
    $sql = "SELECT `emp_leave`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`
      FROM `emp_leave`
      LEFT JOIN `employee` ON `emp_leave`.`em_id`=`employee`.`em_id`
        WHERE `apply_date`='$date'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result; 
    }
    public function GetLeaveApply($id){
        $sql = "SELECT `emp_leave`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`
      FROM `emp_leave`
      LEFT JOIN `employee` ON `emp_leave`.`em_id`=`employee`.`em_id` 
      WHERE `emp_leave`.`id`='$id'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function GetEarnedleaveBalance(){
        $sql = "SELECT `earned_leave`.*, `employee`.`first_name`,`last_name`,`em_code` FROM `earned_leave` LEFT JOIN `employee` ON `earned_leave`.`em_id`=`employee`.`em_id` WHERE `earned_leave`.`hour` > 0 AND `employee`.`status`='ACTIVE'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result; 
    }
    public function emEarnselectByLeave($emid){
        $sql = "SELECT * FROM `earned_leave` WHERE `em_id`='$emid'";
        $query = $this->db->query($sql);
        $result = $query->row();
        return $result; 
    }
    public function GetallApplication($emid){
    $sql = "SELECT `emp_leave`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`,
      `leave_types`.`type_id`,`name`
      FROM `emp_leave`
      LEFT JOIN `employee` ON `emp_leave`.`em_id`=`employee`.`em_id`
      LEFT JOIN `leave_types` ON `emp_leave`.`typeid`=`leave_types`.`type_id`
      WHERE `emp_leave`.`em_id`='$emid'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result; 
    }
    public function AllLeaveAPPlication(){
    $sql = "SELECT op.*, el.*, lt.*
      FROM emp_leave el
      LEFT JOIN op_user op ON `op`.`op_user_id`=`el`.`emp_id`
      LEFT JOIN  leave_types lt ON `lt`.`type_id`=`el`.`leave_type_id`
      WHERE `el`.`leave_status`='Not Approve'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result; 
    }

//     public function AllLeaveAPPlication(){
//     $sql = "SELECT op.*, el.*, lt.*
//             FROM emp_leave el
//             LEFT JOIN op_user op ON op.op_user_id = el.emp_id
//             LEFT JOIN leave_types lt ON lt.type_id = el.leave_type_id
//             WHERE el.leave_status = 'Not Approve'
//             ORDER BY el.leave_added_on DESC";  
//     $query = $this->db->query($sql);
//     return $query->result();
// }

    public function EmLeavesheet($emid){
    $sql = "SELECT `assign_leave`.*,
      `employee`.`em_id`,`first_name`,`last_name`,`em_code`,
      `leave_types`.`type_id`,`name`
      FROM `assign_leave`
      LEFT JOIN `employee` ON `assign_leave`.`emp_id`=`employee`.`em_id`
      LEFT JOIN `leave_types` ON `assign_leave`.`type_id`=`leave_types`.`type_id`
      WHERE `assign_leave`.`emp_id`='$emid'";
        $query=$this->db->query($sql);
		$result = $query->result();
		return $result; 
    }
    public function Update_HolidayInfo($id,$data){
		$this->db->where('id', $id);
		$this->db->update('holiday',$data);         
    }

    public function Update_leave_Info($id,$data){
		$this->db->where('type_id', $id);
		$this->db->update('leave_types',$data);         
    }
    public function Assign_Duration_Update($type,$data){
        $this->db->where('type_id', $type);
        $this->db->update('assign_leave', $data);         
    }
    public function DeletHoliday($id){
        $this->db->delete('holiday',array('id'=> $id));        
    }
    public function DeletType($id){
        $this->db->delete('leave_types',array('type_id'=> $id));        
    }
    public function DeletApply($id){
        $this->db->delete('emp_leave',array('id'=> $id));        
    }




    public function updateAplicationAsResolved($id, $data){
        $this->db->where('id', $id);
        $this->db->update('emp_leave', $data);         
    }  

    public function getLeaveTypeTotal($emid, $type){
        $sql = "SELECT SUM(`hour`) AS 'totalTaken' FROM `assign_leave` WHERE `assign_leave`.`emp_id`='$emid' AND `assign_leave`.`type_id`='$type'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function updateLeaveAssignedInfo($employeeID, $type, $data){
        
        $this->db->where('type_id', $type);
        $this->db->where('emp_id', $employeeID);
        $this->db->update('assign_leave', $data);         
    }

    public function UpdteEarnValue($emid,$data){
        $this->db->where('em_id', $emid);
        $this->db->update('earned_leave', $data);         
    }


    public function insertLeaveAssignedInfo($data){
        $this->db->insert('assign_leave', $data);
    }

    public function determineIfNewLeaveAssign($employeeId, $type){
         $sql = "SELECT * FROM `assign_leave` WHERE `assign_leave`.`emp_id` = '$employeeId' AND `assign_leave`.`type_id` = '$type'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function get_holiday_between_dates($day) {
        $sql = "SELECT * FROM `holiday` WHERE ('$day' = `holiday`.`from_date`) OR ('$day' BETWEEN `holiday`.`from_date` AND `holiday`.`to_date`)";
        $query = $this->db->query($sql);
        return $query->row();
    }
    }
?>    