<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lead extends CI_Controller {

  function __construct()
  {
      parent::__construct();
      error_reporting(0);
      $this->load->Model('model');
      $this->load->Model('dashboard_model');
      $this->load->Model('lead_model');

      if (!$this->is_logged_in()) {
          redirect('alogin');
      }

      //project
      date_default_timezone_set('Asia/Kolkata');
      $branch_id_session = $this->session->userdata('map_with_id');
  }

  protected function no_cache()
  {
      header('Cache-Control: no-store, no-cache, must-revalidate');
      header('Cache-Control: post-check=0, pre-check=0', false);
      header('Pragma: no-cache');
  }

  function is_logged_in()
  {
      $is_logged_in = $this->session->userdata('is_admin_logged_in');
      if (!isset($is_logged_in) || $is_logged_in != TRUE) {
          return FALSE;
      }
      return TRUE;
  }

  function lead_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Lead List';
    $data['status_list'] =$this->model->getData('lead_status',array('status'=>'1'));
   
    $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
   
    $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*,lmt.*,cp.*, ptt.* FROM lead l
                Left join lead_type lt on lt.lt_id = l.lead_type_id
                Left join lead_status ls on ls.is_id = l.lead_status_id
                Left join lead_source s on s.source_id = l.lead_source_id
                Left join project p on p.project_id = l.project_id
                Left join lead_mode_tbl lmt on lmt.mode_id=l.lead_mode_id
                 Left join communication_tbl cp on cp.com_id=l.communication_pref
                Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id 
                order by lead_id desc"               
               ;
    $data['leads'] = $this->model->getSqlData($sql);
    //print_r($data['leads']); die;
    $this->model->partialView('admin/lead/lead_list', $data,$pagename);
  }

  

  function qualified_lead_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Lead List';
    $data['status_list'] =$this->model->getData('lead_status',array('status'=>'1'));
   
    $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
   
    $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*,lmt.*,cp.*, ptt.* FROM lead l
                Left join lead_type lt on lt.lt_id = l.lead_type_id
                Left join lead_status ls on ls.is_id = l.lead_status_id
                Left join lead_source s on s.source_id = l.lead_source_id
                Left join project p on p.project_id = l.project_id
                Left join lead_mode_tbl lmt on lmt.mode_id=l.lead_mode_id
                 Left join communication_tbl cp on cp.com_id=l.communication_pref
                Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id 
                    Where l.lead_mode_id = '1'
                order by l.lead_id desc";
    $data['qualified_list'] = $this->model->getSqlData($sql);
    //print_r($data['leads']); die;
    $this->model->partialView('admin/lead/qualified_lead', $data,$pagename);
  }

  function proposal_sent_lead_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Lead List';
    $data['status_list'] =$this->model->getData('lead_status',array('status'=>'1'));
   
    $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
   
    $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*,lmt.*,cp.*, ptt.* FROM lead l
                Left join lead_type lt on lt.lt_id = l.lead_type_id
                Left join lead_status ls on ls.is_id = l.lead_status_id
                Left join lead_source s on s.source_id = l.lead_source_id
                Left join project p on p.project_id = l.project_id
                Left join lead_mode_tbl lmt on lmt.mode_id=l.lead_mode_id
                 Left join communication_tbl cp on cp.com_id=l.communication_pref
                Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id 
                    Where l.lead_mode_id = '2'
                order by lead_id desc"               
               ;
    $data['proposalLead_list'] = $this->model->getSqlData($sql);
    //print_r($data['leads']); die;
    $this->model->partialView('admin/lead/proposal_sent_lead', $data,$pagename);
  }

  function converted_lead_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Lead List';
    $data['status_list'] =$this->model->getData('lead_status',array('status'=>'1'));
   
    $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
   
    $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*,lmt.*,cp.*, ptt.* FROM lead l
                Left join lead_type lt on lt.lt_id = l.lead_type_id
                Left join lead_status ls on ls.is_id = l.lead_status_id
                Left join lead_source s on s.source_id = l.lead_source_id
                Left join project p on p.project_id = l.project_id
                Left join lead_mode_tbl lmt on lmt.mode_id=l.lead_mode_id
                 Left join communication_tbl cp on cp.com_id=l.communication_pref
                Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id 
                    Where l.lead_mode_id = '3'
                order by lead_id desc"               
               ;
    $data['converted_list'] = $this->model->getSqlData($sql);
    //print_r($data['leads']); die;
    $this->model->partialView('admin/lead/convert_lead', $data,$pagename);
  }

  function lost_lead_list()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Lead List';
    $data['status_list'] =$this->model->getData('lead_status',array('status'=>'1'));
   
    $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
   
    $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*,lmt.*,cp.*, ptt.* FROM lead l
                Left join lead_type lt on lt.lt_id = l.lead_type_id
                Left join lead_status ls on ls.is_id = l.lead_status_id
                Left join lead_source s on s.source_id = l.lead_source_id
                Left join project p on p.project_id = l.project_id
                Left join lead_mode_tbl lmt on lmt.mode_id=l.lead_mode_id
                 Left join communication_tbl cp on cp.com_id=l.communication_pref
                Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id 
                    Where l.lead_mode_id = '4'
                order by lead_id desc"               
               ;
    $data['lostLead_list'] = $this->model->getSqlData($sql);
    //print_r($data['leads']); die;
    $this->model->partialView('admin/lead/lost_lead', $data,$pagename);
  }

  function add_lead()
  {
    $user_id = $this->session->userdata('op_user_id');
    $pagename = 'Add Lead';

    $data['leadstatus_list'] = $this->model->getData('lead_status',array('status'=>'1')); 
    $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
    $data['lead_type'] = $this->model->getData('lead_type',array()); 
    $data['project_list'] = $this->model->getData('project',array()); 
    $data['project_type'] = $this->model->getData('project_type_tbl',array()); 
    $data['mode_list'] =$this->model->getData('lead_mode_tbl',array('status'=>'1'));
    $data['communication_list'] =$this->model->getData('communication_tbl',array('status'=>'1'));
    $data['partner_list'] =$this->model->getData('partnerdtls_tbl',array('status'=>'1'));

    $last_serial_number = $this->lead_model->get_last_serial_number();

    if ($last_serial_number) {
        $lead_number = $this->increment_serial_number($last_serial_number);
    } else {
        $lead_number = '1'; // Starting point
    }

    $qry = "SELECT * from lead";
    $res = $this->db->query($qry);
    $lead_cnt = $res->num_rows();

    $data['lead_number'] = $lead_number;
    
    $this->model->partialView('admin/lead/add_lead', $data,$pagename);
  }

   private function increment_serial_number($last_serial_number) 
   {
      //$number = intval(substr($last_serial_number, 1));
      $number = $last_serial_number;
      $number++;
      //return 'SN' . str_pad($number, 4, '0', STR_PAD_LEFT);
      return $number;
   }

   function save_lead()
   {
        $storeData = $_POST;
        //echo'<pre>';
       // print_r($storeData); die;
       if (!empty($_FILES['special_attachment']['name']))
        {
                $uploaddir = './uploads/special_attachment/';       
                $filename = basename(@$_FILES['special_attachment']['name']);
                $rawBaseName = pathinfo($filename, PATHINFO_FILENAME );
                $extension = pathinfo($filename, PATHINFO_EXTENSION );               
                $counter = 1;
                while(file_exists($uploaddir.$filename)) {
                    $filename = $rawBaseName . $counter . '.' . $extension;
                    $counter++;
                };
                $uploadfile = $uploaddir . $filename;
                if (move_uploaded_file(@$_FILES['special_attachment']['tmp_name'], $uploadfile)) {
                    //echo "File is valid, and was successfully uploaded.\n";
                    $storeData['special_attachment'] = $filename;
                } else {
                
                    $data['class'] = 'danger';
                    $data['msg'] = 'Upload failed';
                    return false;
                }
        }
        else{
            $storeData['special_attachment']='';
        }
        
        // echo'<pre>';
        // print_r($storeData); die;

        $this->db->insert('lead', $storeData);

        $this->session->set_flashdata('success', '<strong>Well done!</strong> New Lead added successfully.');
        $this->session->set_flashdata('class', 'success');

        redirect('lead-list');
   }

   function walk_in_visit_list()
   {
        $user_id = $this->session->userdata('op_user_id');
        $pagename = 'Walk in Visit Lead List';

        $qry = "SELECT * from lead_type Where lead_type = 'Walk In Visit'";
        $res = $this->db->query($qry);
        if($res->num_rows() > 0)
        {
            foreach($res->result() as $row)
            {
                $lt_id = $row->lt_id;
            }
        }

        $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                    Left join lead_type lt on lt.lt_id = l.lead_type_id
                    Left join lead_status ls on ls.is_id = l.lead_status_id
                    Left join lead_source s on s.source_id = l.lead_source_id
                    Left join project p on p.project_id = l.project_id
                    Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id
                    Where l.lead_type_id = $lt_id";
        $data['leads'] = $this->model->getSqlData($sql);

        $this->model->partialView('admin/lead/walk_in_visit_lead_list', $data,$pagename);
   }

   function visit_list()
   {
        $user_id = $this->session->userdata('op_user_id');
        $pagename = 'Visit Lead List';

        $qry = "SELECT * from lead_type Where lead_type = 'Visit'";
        $res = $this->db->query($qry);
        if($res->num_rows() > 0)
        {
            foreach($res->result() as $row)
            {
                $lt_id = $row->lt_id;
            }
        }

        $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                    Left join lead_type lt on lt.lt_id = l.lead_type_id
                    Left join lead_status ls on ls.is_id = l.lead_status_id
                    Left join lead_source s on s.source_id = l.lead_source_id
                    Left join project p on p.project_id = l.project_id
                    Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id
                    Where l.lead_type_id = $lt_id";
        $data['leads'] = $this->model->getSqlData($sql);

        $this->model->partialView('admin/lead/visit_lead_list', $data,$pagename);
   }

   function edit_lead($lid)
   {
        $lead_id = base64_decode($lid);

        $user_id = $this->session->userdata('op_user_id');
        $pagename = 'Edit Lead';

        $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*, ptt.* FROM lead l
                    Left join lead_type lt on lt.lt_id = l.lead_type_id
                    Left join lead_status ls on ls.is_id = l.lead_status_id
                    Left join lead_source s on s.source_id = l.lead_source_id
                    Left join project p on p.project_id = l.project_id
                    Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id
                    Where l.lead_id = $lead_id";
        $data['leads'] = $this->model->getSqlData($sql);

        $data['leadstatus_list'] = $this->model->getData('lead_status',array('status'=>'1')); 
        $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
        $data['lead_type'] = $this->model->getData('lead_type',array()); 
        $data['project_list'] = $this->model->getData('project',array()); 
        $data['project_type'] = $this->model->getData('project_type_tbl',array()); 
        $data['mode_list'] =$this->model->getData('lead_mode_tbl',array('status'=>'1'));
        $data['communication_list'] =$this->model->getData('communication_tbl',array('status'=>'1'));
        $data['partner_list'] =$this->model->getData('partnerdtls_tbl',array('status'=>'1'));
        
        $data['lead_id'] = $lead_id;

        $this->model->partialView('admin/lead/edit_lead', $data,$pagename);
   }

   function view_lead($lid)
   {
    
        $lead_id = base64_decode($lid);
//echo $lead_id; die;
        $user_id = $this->session->userdata('op_user_id');
        $pagename = 'View Lead';

        $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*,lm.*,cp.*, ptt.*,ptn.*,op.* FROM lead l
                    Left join lead_type lt on lt.lt_id = l.lead_type_id
                    Left join lead_status ls on ls.is_id = l.lead_status_id
                    Left join lead_source s on s.source_id = l.lead_source_id
                    Left join project p on p.project_id = l.project_id
                    Left join lead_mode_tbl lm on lm.mode_id = l.lead_mode_id
                    Left join communication_tbl cp on cp.com_id=l.communication_pref
                    Left join op_user op on op.op_user_id=l.assign_to
                     Left join partnerdtls_tbl ptn on ptn.id=l.partner_id
                    Left join project_type_tbl ptt on ptt.pt_id = l.business_type_id
                    Where l.lead_id = $lead_id";
        $data['leads'] = $this->model->getSqlData($sql);

        $data['leadstatus_list'] = $this->model->getData('lead_status',array('status'=>'1')); 
        $data['lead_source'] = $this->model->getData('lead_source',array('source_status'=>'1')); 
        $data['lead_type'] = $this->model->getData('lead_type',array()); 
        $data['project_list'] = $this->model->getData('project',array()); 
        $data['project_type'] = $this->model->getData('project_type_tbl',array()); 
        $data['mode_list'] =$this->model->getData('lead_mode_tbl',array('status'=>'1'));
        $data['communication_list'] =$this->model->getData('communication_tbl',array('status'=>'1'));
        $data['partner_list'] =$this->model->getData('partnerdtls_tbl',array('status'=>'1'));
      //  $data['note_list'] =$this->model->getData('lead_note',array('note_status'=>'1'));
        $data['task_list'] =$this->model->getSqlData("select * from lead_task where task_status='1' and lead_id='".$lead_id."'");
        $data['lead_remark'] =$this->model->getSqlData("select * from lead_remark where lead_id='".$lead_id."' Order by lr_id desc");
       // $data['reminder_list'] =$this->model->getSqlData("select * from lead_reminder where reminder_status='1' and lead_id='".$lead_id."'");
        $data['lead_id'] = $lead_id;
        $data['member_list'] =$this->model->getData('op_user',array('status'=>'1')); 
        $sql1="select lmt.*,op.* from lead_reminder lmt 
                Left join op_user op on op.op_user_id = lmt.reminder_to
                    Where lmt.lead_id = $lead_id AND lmt.reminder_status='1' ";
        $data['reminder_list'] = $this->model->getSqlData($sql1);

        $sql2="select llog.*,op.* from lead_log llog 
                Left join op_user op on op.op_user_id = llog.user_id
                    Where llog.lead_id = $lead_id  Order by llog.log_id desc";
        $data['log_list'] = $this->model->getSqlData($sql2);

        $sql3="select lnt.*,op.* from lead_note lnt 
                Left join op_user op on op.op_user_id = lnt.op_user_id
                    Where lnt.lead_id = $lead_id  ";
        $data['note_list'] = $this->model->getSqlData($sql3);

        $sql4="select lat.*,op.* from lead_attacment lat 
        Left join op_user op on op.op_user_id = lat.user_id
            Where lat.lead_id = $lead_id AND lat.attachment_status='1'  ";
        $data['attachment_list'] = $this->model->getSqlData($sql4);
        $data['praposals_list'] =$this->model->getSqlData("select * from lead_praposals where lead_id='".$lead_id."'");
       // echo"<pre>"; print_r($data['leads']); die;

        $this->model->partialView('admin/lead/view_lead', $data,$pagename);
   }


    function update_lead()
    {
        $lead_id = $_POST['lead_id'];
        $updtData = $_POST;
       // echo'<pre>';
       // print_r($updtData); die
       
       if (!empty($_FILES['special_attachment']['name']))
       {
            $uploaddir = './uploads/special_attachment/';
            if(!is_dir($uploaddir) )
        {
            mkdir($uploaddir,0777,TRUE);
        }

            $filename = basename(@$_FILES['special_attachment']['name']);
            $rawBaseName = pathinfo($filename, PATHINFO_FILENAME );
            $extension = pathinfo($filename, PATHINFO_EXTENSION );               
            $counter = 1;
            while(file_exists($uploaddir.$filename)) {
                $filename = $rawBaseName . $counter . '.' . $extension;
                $counter++;
            };
            $uploadfile = $uploaddir . $filename;
            if (move_uploaded_file($_FILES['special_attachment']['tmp_name'], $uploadfile)) {
                //echo "File is valid, and was successfully uploaded.\n";
                $updtData['special_attachment'] = $filename;
            } else {
            
                $data['class'] = 'danger';
                $data['msg'] = 'Upload failed';
                return false;
            }
        }
        else{
            $updtData['special_attachment']= $updtData['saved_attachment'];
        }
        unset($updtData['saved_attachment']);

        $this->db->update('lead', $updtData, array('lead_id'=>$lead_id));

        $this->session->set_flashdata('success', '<strong>Well done!</strong> Lead details udated successfully.');
        $this->session->set_flashdata('class', 'success');

        redirect('lead-list');
    }

    function feedback()
    {
        $user_id = $this->session->userdata('op_user_id');
        $pagename = 'Feedback';
        
        $data['customer_list'] = $this->model->getData('customer',array('status'=>'1')); 
        $data['project_list'] = $this->model->getData('project',array('project_active_status'=>'1')); 

        $sql = "SELECT fd.*, p.*, c.* FROM feedback fd
                    Left join project p on p.project_id = fd.project_id
                    Left join customer c on c.cust_id = fd.customer_id";
        $data['feedback'] = $this->model->getSqlData($sql);
                                        
        $this->model->partialView('admin/lead/feedback', $data,$pagename);
    }

    function save_feedback()
    {
        $storeData = $_POST;

        $this->db->insert('feedback', $storeData);
    
        $this->session->set_flashdata('success', '<strong>Well done!</strong> Feedback submitted successfully.');
    
        redirect('feedback');
    }

    function save_lead_remark()
    {
        $storeData = $_POST;

        $this->db->insert('lead_remark', $storeData);
    
        $this->session->set_flashdata('success', '<strong>Well done!</strong> Remark added successfully.');
    
        redirect('view-lead/' . base64_encode($_POST['lead_id']));
    }


    function filter_data(){

        if(!empty($_POST)){
                $frm_date = !empty($_POST['from_date']) ? date('Y-m-d', strtotime($_POST['from_date'])) : '';
                $to_date = !empty($_POST['to_date']) ? date('Y-m-d', strtotime($_POST['to_date'])) : '';
                // $frm_date = isset($_POST['from_date']) ? $_POST['from_date'] : '';
                // $to_date = isset($_POST['to_date']) ? $_POST['to_date'] : '';
                //$lead_id = isset($_POST['lead_id']) ? $_POST['lead_id'] : '';
                $is_id = isset($_POST['is_id']) ? $_POST['is_id'] : '';
               // $lead_mode = isset($_POST['lead_mode']) ? $_POST['lead_mode'] : '';
                $lead_source_id = isset($_POST['lead_source_id']) ? $_POST['lead_source_id'] : '';
               // echo $is_id;
                $sql = "SELECT l.*, lt.*, ls.*, s.*, p.*,cp.*,lmt.*, ptt.* FROM lead l
                LEFT JOIN lead_type lt ON lt.lt_id = l.lead_type_id
                LEFT JOIN lead_status ls ON ls.is_id = l.lead_status_id
                LEFT JOIN lead_source s ON s.source_id = l.lead_source_id
                LEFT JOIN project p ON p.project_id = l.project_id
                Left join lead_mode_tbl lmt on lmt.mode_id=l.lead_mode_id
                 Left join communication_tbl cp on cp.com_id=l.communication_pref
                LEFT JOIN project_type_tbl ptt ON ptt.pt_id = l.business_type_id "
                ;
            
            // Add conditions dynamically
            $conditions = [];
           
            // if (!empty($frm_date) && !empty($to_date)) {
            //     // Add range condition
            //     $conditions[] = "l.lead_added_on BETWEEN '$frm_date' AND '$to_date'";
            // } elseif (!empty($frm_date)) {
            //     // Add only from_date condition
            //     $conditions[] = "l.lead_added_on >= '$frm_date'";
            // } elseif (!empty($to_date)) {
            //     // Add only to_date condition
            //     $conditions[] = "l.lead_added_on <= '$to_date'";
            // }

            if (!empty($frm_date) && !empty($to_date)) {
                $conditions[] = "l.lead_date BETWEEN '$frm_date' AND '$to_date'";
            } elseif (!empty($frm_date)) {
                $conditions[] = "l.lead_date >= '$frm_date'";
            } elseif (!empty($to_date)) {
                $conditions[] = "l.lead_date <= '$to_date'";
            }
            
            if (!empty($is_id)) {
                $conditions[] = "l.lead_status_id = $is_id ";
            }
           
            if (!empty($lead_source_id)) {
                $conditions[] = "l.lead_source_id = $lead_source_id ";
            }
            
            // Append conditions to the SQL query
            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(' AND ', $conditions)."order by l.lead_id desc";
            }
            
            // echo $sql; 
 //print_r($params);

            // Fetch data
            $data['leads'] = $this->model->getSqlData($sql);
            //print_r($data['leads']);
               // $data['list'] = $this->model->getFilterData($frm_date,$to_date,$lead_id,$is_id);
                     //echo '<pre>';print_r($data);exit;
                $htmlContent = "";
                $i = 1;
                foreach ($data['leads'] as $key => $value) {
                    // echo $i."<br>";
                   // $eml = !empty ($value['email_address']) ? $value['email_address'] : $value['email'];
                   // $phn = !empty ($value['phone']) ? $value['phone'] : $value['phone_no'];
                   // $nm = !empty ($value['ldName']) ? $value['ldName'] : $value['user_name'];
                   
                   if(!empty($value['project_id']))
                   {
                   $proj_id = explode(",", $value['project_id']);
                   $pro_names = "";
                   for($i=0; $i<sizeof($proj_id); $i++)
                   {
                       $sql_qry = 'SELECT * from project  
                                       Where project_id = '.$proj_id[$i].'';
                       $res_qry = $this->db->query($sql_qry);

                       foreach($res_qry->result() as $row_project)
                       {
                        $pro_names .= " - " . $row_project->project_name . "<br>";
                       }
                   }
                   }
                    $htmlContent .= "<tr>
                         <td>
                            <div class='dropdown'>
                                <button class='dropbtn'>
                                    <i class='fa fa-ellipsis-v' aria-hidden='true'></i>
                                </button>
                                <div class='dropdown-content'>
                                    <a href='" . base_url() . "edit-lead/" . base64_encode($value['lead_id']) . "' 
                                        class='btn btn-sm btn-info waves-effect waves-light holiday'
                                        style='color:white'>
                                        <i class='fa fa-edit'></i> Edit
                                    </a>
                                </div>
                            </div>
                        </td>
                         <td>".$i."</td>
                         <td>".$value['lead_number']."</td>
                         <td>". date('jS \of F Y', strtotime($value['lead_date']))."</td>
                         <td>".$value['mode_name']."</td>
                         <td>". $value['name']."</td>
                       
                        <td>". $value['contact_fullname']."</td>
                        <td>". $value['contact_email']."</td>
                        <td>". $value['contact_phone']."</td>
                        <td>". $value['project_type']."</td>
                        

                        <td>". $value['possession_expected_period']."</td>
                        <td>".$value['budget_range']."</td>
                        <td>". $value['special_requirement']."</td>
                        <td>". $value['lead_source']."</td>
                        <td>". $value['com_name']."</td>
                        <td>". $value['communication_time'] . "</td>
                        <td>".$value['contact_company']."</td>
                        <td>". $value['contact_jobtitle']."</td>
                          
                    </tr>";
                    $i++;
                }
                  echo $htmlContent;exit;
                //$this->model->partialView('admin/lead/lead_list',$data);
            }
        }

        function save_ajax_LeadStatus(){
          
            $array_entity = $_POST;
            if(isset($array_entity) && !empty($array_entity)){
                $lead_status_name = $array_entity['name'];
                 $res = $this->model->getData('lead_status',array('name'=>$array_entity['name']));
                if(!empty($res)){
                  $data['msg'] = 'Lead status already exist.';
                      echo json_encode($data);
                  return false;
                }
    
                $LeadStatus_data =$this->model->getData("lead_status",array('name'=>$lead_status_name,'status'=>'1'));
                if(isset($LeadStatus_data) && !empty($LeadStatus_data)){
                    $data['class'] = 'danger';
                    $data['msg'] = 'Lead status already exist.';
                }else{
                   
                   // $array_entity['store_id'] = $branch_id_session;
                    $LeadStatus_id = $this->model->insertData('lead_status',$array_entity);
                    if($LeadStatus_id>0){
                        $data['class'] = 'success';
                        $data['msg'] = 'New lead status has been added successfully.';
                    }else{
                        $data['class'] = 'danger';
                        $data['msg'] = 'Something went wrong while submitting lead status.';
                    }
                }
            }else{
                $data['class'] = 'danger';
                $data['msg'] = 'Invalid lead status';
            }
             echo json_encode($data);
           // $this->session->set_flashdata($data);
            //redirect(base_url().'category');
        }

        function getleadStatusList()
    {
       // $branch_id_session = $this->session->userdata('map_with_id');
        $leadStatus_list = $this->model->getData('lead_status');?>
          <option value="" selected="selected" disabled="disabled">Select Lead Status</option>
        <?php

          foreach ($leadStatus_list as $k=>$value) { ?>

          <option value="<?php echo $value['is_id']; ?>"> <?php echo $value['name']; ?></option>
            <!-- <option value="<?php echo $v;?>" data-value="<?php echo $price[$k];?>"><?php echo $v;?></option> -->

        <?php }
 
    } 

    function save_ajax_LeadSource(){
          
        $array_entity = $_POST;
        if(isset($array_entity) && !empty($array_entity)){
            $lead_source = $array_entity['lead_source'];
             $res = $this->model->getData('lead_source',array('lead_source'=>$array_entity['lead_source']));
            if(!empty($res)){
              $data['msg'] = 'Lead source already exist.';
                  echo json_encode($data);
              return false;
            }

            $LeadSource_data =$this->model->getData("lead_source",array('lead_source'=>$lead_source,'source_status'=>'1'));
            if(isset($LeadSource_data) && !empty($LeadSource_data)){
                $data['class'] = 'danger';
                $data['msg'] = 'Lead source already exist.';
            }else{
               
               // $array_entity['store_id'] = $branch_id_session;
                $LeadSource_id = $this->model->insertData('lead_source',$array_entity);
                if($LeadSource_id>0){
                    $data['class'] = 'success';
                    $data['msg'] = 'New lead source has been added successfully.';
                }else{
                    $data['class'] = 'danger';
                    $data['msg'] = 'Something went wrong while submitting lead source.';
                }
            }
        }else{
            $data['class'] = 'danger';
            $data['msg'] = 'Invalid lead source';
        }
         echo json_encode($data);
       // $this->session->set_flashdata($data);
        //redirect(base_url().'category');
    }

    function getleadSourceList()
{
   // $branch_id_session = $this->session->userdata('map_with_id');
    $leadSource_list = $this->model->getData('lead_source');?>
      <option value="" selected="selected" disabled="disabled">Select Lead Source</option>
    <?php

      foreach ($leadSource_list as $k=>$value) { ?>

      <option value="<?php echo $value['source_id']; ?>"> <?php echo $value['lead_source']; ?></option>
        <!-- <option value="<?php echo $v;?>" data-value="<?php echo $price[$k];?>"><?php echo $v;?></option> -->

    <?php }

} 

function save_ajax_LeadMode(){
          
    $array_entity = $_POST;
    if(isset($array_entity) && !empty($array_entity)){
        $mode_name = $array_entity['mode_name'];
         $res = $this->model->getData('lead_mode_tbl',array('mode_name'=>$array_entity['mode_name']));
        if(!empty($res)){
          $data['msg'] = 'Lead mode already exist.';
              echo json_encode($data);
          return false;
        }

        $LeadMode_data =$this->model->getData("lead_mode_tbl",array('mode_name'=>$mode_name,'status'=>'1'));
        if(isset($LeadMode_data) && !empty($LeadMode_data)){
            $data['class'] = 'danger';
            $data['msg'] = 'Lead Mode already exist.';
        }else{
           
           // $array_entity['store_id'] = $branch_id_session;
            $LeadMode_id = $this->model->insertData('lead_mode_tbl',$array_entity);
            if($LeadMode_id>0){
                $data['class'] = 'success';
                $data['msg'] = 'New lead mode has been added successfully.';
            }else{
                $data['class'] = 'danger';
                $data['msg'] = 'Something went wrong while submitting lead source.';
            }
        }
    }else{
        $data['class'] = 'danger';
        $data['msg'] = 'Invalid lead source';
    }
     echo json_encode($data);
   // $this->session->set_flashdata($data);
    //redirect(base_url().'category');
}

function getleadModeList()
{
// $branch_id_session = $this->session->userdata('map_with_id');
$leadMode_list = $this->model->getData('lead_mode_tbl');?>
 
<?php

  foreach ($leadMode_list as $k=>$value) { ?>

  <option value="<?php echo $value['mode_id']; ?>"> <?php echo $value['mode_name']; ?></option>
    <!-- <option value="<?php echo $v;?>" data-value="<?php echo $price[$k];?>"><?php echo $v;?></option> -->

<?php }

} 

function save_ajax_ComPre(){
          
    $array_entity = $_POST;
    if(isset($array_entity) && !empty($array_entity)){
        $com_name = $array_entity['com_name'];
         $res = $this->model->getData('communication_tbl',array('com_name'=>$array_entity['com_name']));
        if(!empty($res)){
          $data['msg'] = 'Communication preference already exist.';
              echo json_encode($data);
          return false;
        }

        $ComPre_data =$this->model->getData("communication_tbl",array('com_name'=>$com_name,'status'=>'1'));
        if(isset($ComPre_data) && !empty($ComPre_data)){
            $data['class'] = 'danger';
            $data['msg'] = 'Communication preference already exist.';
        }else{
           
           // $array_entity['store_id'] = $branch_id_session;
            $ComPre_id = $this->model->insertData('communication_tbl',$array_entity);
            if($ComPre_id>0){
                $data['class'] = 'success';
                $data['msg'] = 'New communication preference has been added successfully.';
            }else{
                $data['class'] = 'danger';
                $data['msg'] = 'Something went wrong while submitting communication preference.';
            }
        }
    }else{
        $data['class'] = 'danger';
        $data['msg'] = 'Invalid lead source';
    }
     echo json_encode($data);
   // $this->session->set_flashdata($data);
    //redirect(base_url().'category');
}

function getComPreList()
{
// $branch_id_session = $this->session->userdata('map_with_id');
$com_list = $this->model->getData('communication_tbl');?>
 
<?php

  foreach ($com_list as $k=>$value) { ?>

  <option value="<?php echo $value['com_id']; ?>"> <?php echo $value['com_name']; ?></option>
    <!-- <option value="<?php echo $v;?>" data-value="<?php echo $price[$k];?>"><?php echo $v;?></option> -->

<?php }

}

function save_ajax_Partner(){
          
    $array_entity = $_POST;
   // print_r($array_entity); die;
    if(isset($array_entity) && !empty($array_entity)){
        $partner_name = $array_entity['partner_name'];
        $contact_no = $array_entity['partner_name'];

         $res = $this->model->getData('partnerdtls_tbl',array('partner_name'=>$array_entity['partner_name']));
        if(!empty($res)){
          $data['msg'] = 'Partner name  already exist.';
              echo json_encode($data);
          return false;
        }

        $Partner_data =$this->model->getData("Partnerdtls_tbl",array('partner_name'=>$partner_name,'status'=>'1'));
        if(isset($Partner_data) && !empty($Partner_data)){
            $data['class'] = 'danger';
            $data['msg'] = 'Partner name already exist.';
        }else{
           
           // $array_entity['store_id'] = $branch_id_session;
            $Partner_id = $this->model->insertData('partnerdtls_tbl',$array_entity);
            if($Partner_id>0){
                $data['class'] = 'success';
                $data['msg'] = 'New partner details has been added successfully.';
            }else{
                $data['class'] = 'danger';
                $data['msg'] = 'Something went wrong while submitting partner details.';
            }
        }
    }else{
        $data['class'] = 'danger';
        $data['msg'] = 'Invalid partner details';
    }
     echo json_encode($data);
   // $this->session->set_flashdata($data);
    //redirect(base_url().'category');
}

function getPartnerList()
{
// $branch_id_session = $this->session->userdata('map_with_id');
$partner_list = $this->model->getData('partnerdtls_tbl');?>
  <option value="" selected="selected" disabled="disabled">--- Select Partner Details ---</option>
<?php

  foreach ($partner_list as $k=>$value) { ?>

  <option value="<?php echo $value['id']; ?>"> <?php echo $value['partner_name']; ?></option>
    <!-- <option value="<?php echo $v;?>" data-value="<?php echo $price[$k];?>"><?php echo $v;?></option> -->

<?php }

}

function submittask($id)
    {  
        $postData = $_POST; 
        //echo($id); 
        //echo base64_decode($id); die;
        $op_user_id=$this->session->userdata('op_user_id');
        $lead_id=base64_decode($id);
        $postData['user_id'] =$op_user_id;
        $postData['lead_id'] =base64_decode($id);
      
            if (!empty($_FILES['task_file']['name'][0])) {
                $uploaddir = './uploads/lead/task/';
                $uploadedFiles = [];
            
                foreach ($_FILES['task_file']['name'] as $key => $name) {
                    $filename = basename($name);
                    $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
            
                    // Generate a unique filename to avoid overwriting
                    $counter = 1;
                    while (file_exists($uploaddir . $filename)) {
                        $filename = $rawBaseName . $counter . '.' . $extension;
                        $counter++;
                    }
            
                    $uploadfile = $uploaddir . $filename;
            
                    // Move the uploaded file
                    if (move_uploaded_file($_FILES['task_file']['tmp_name'][$key], $uploadfile)) {
                        $uploadedFiles[] = $filename; // Add the filename to the uploadedFiles array
                    } else {
                        $data['class'] = 'danger';
                        $data['msg'] = 'One or more uploads failed.';
                        return false;
                    }
                }
            
                // Store the uploaded file names as a comma-separated string
                $postData['task_file'] = implode(',', $uploadedFiles);
            } else {
                $postData['task_file'] = ''; // No files uploaded
            }
            $this->db->insert('lead_task', $postData);

            $inserted_id = $this->db->insert_id(); 
            // echo $inserted_id; die;
 
            $logArray=[
             'lead_id'=>$lead_id,
             'activity_id'=>'1',
             'user_id'=>$op_user_id,
             'affected_id'=>$inserted_id,
             'action_id'=>'1',
             
            ];
 
            $this->db->insert('lead_log', $logArray);

            $this->session->set_flashdata('msg', 'Task Lead Details Saved Successfully.');
            redirect('view-lead/'.$id);
       // }else{
            // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
            // redirect('view-lead/'.$id);
        //}
    }

    public function getTaskDetails()
{
    $task_id = $this->input->post('task_id');
//echo $task_id; die;
    if ($task_id) {
        $task =$this->model->getData('lead_task',array('task_id'=>$task_id));
       // $this->db->where('task_id', $task_id);
       // $task = $this->db->get('tasks')->row_array();
//print_r($task);
        if ($task) {
           // $task['task_file'] = !empty($task['task_file']) ? explode(',', $task['task_file']) : [];
            //print_r($task); die;
            echo json_encode(['success' => true, 'data' => $task]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Task not found.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid task ID.']);
    }
}

// function updatetask($id)
//     {  
//         $updateData = $_POST; 
//       //  echo($id); 
//        // echo base64_decode($id); die;
//        //$tid=$_POST['task_id'];
//     //    echo $tid;
//      //  die;
//      $op_user_id=$this->session->userdata('op_user_id');
//         $lead_id=base64_decode($id);
//         $updateData['user_id'] =$op_user_id;
//         $updateData['lead_id'] =base64_decode($id);
       
       
//             if (!empty($_FILES['task_file']['name'][0])) {
//                 $uploaddir = './uploads/lead/task/';
//                 $uploadedFiles = [];
            
//                 foreach ($_FILES['task_file']['name'] as $key => $name) {
//                 //if (isset($_FILES['task_file']) && is_array($_FILES['task_file']['name']) && count($_FILES['task_file']['name']) > 0 && $_FILES['task_file']['name'][0] !== '') {
//                    // echo"file found"; die;
//                     $filename = basename($name);
//                     $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
//                     $extension = pathinfo($filename, PATHINFO_EXTENSION);
            
//                     // Generate a unique filename to avoid overwriting
//                     $counter = 1;
//                     while (file_exists($uploaddir . $filename)) {
//                         $filename = $rawBaseName . $counter . '.' . $extension;
//                         $counter++;
//                     }
            
//                     $uploadfile = $uploaddir . $filename;
            
//                     // Move the uploaded file
//                     if (move_uploaded_file($_FILES['task_file']['tmp_name'][$key], $uploadfile)) {
//                         $uploadedFiles[] = $filename; // Add the filename to the uploadedFiles array
//                     } else {
//                         $data['class'] = 'danger';
//                         $data['msg'] = 'One or more uploads failed.';
//                         return false;
//                     }
//                 }
            
//                 // Store the uploaded file names as a comma-separated string
//                 $updateData['task_file'] = implode(',', $uploadedFiles);
//                 if (!empty($updateData['saved_attachment'])) {
//                     $updateData['task_file'] .= ',' . $updateData['saved_attachment']; // Append to existing files
//                 }
//                 // echo"file";
//                 // print_r($updateData['task_file']);
//                 // print_r($uploadedFiles); die;
                

//             } else {
//                // echo"file not found";
//                 $updateData['task_file'] = $updateData['saved_attachment'] ;// No files uploaded
//             }
            
//           //  die;
//             //$this->db->insert('lead_task', $postData);
          
//         unset($updateData['saved_attachment']);
//        // echo '<pre>'; print_r($updateData);die;
            
//          $this->model->updateData('lead_task',$updateData,array('task_id'=>$_POST['task_id']));
            
//         // $inserted_id = $this->db->insert_id(); 
//          //echo $inserted_id; die;

//          $logArray=[
//           'lead_id'=>$lead_id,
//           'activity_id'=>'1',
//           'user_id'=>$op_user_id,
//           'affected_id'=>$_POST['task_id'],
//           'action_id'=>'2',
          
//          ];
//          $this->db->insert('lead_log', $logArray);
//             $this->session->set_flashdata('msg', 'Task Lead Details Saved Successfully.');
//             redirect('view-lead/'.$id);
//        // }else{
//             // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
//             // redirect('view-lead/'.$id);
//         //}
//     }

function updatetask($id)
{  
    $updateData = $_POST; 
    $op_user_id = $this->session->userdata('op_user_id');
    $lead_id = base64_decode($id);
    $updateData['user_id'] = $op_user_id;
    $updateData['lead_id'] = $lead_id;

    $updateData['start_date'] = date('Y-m-d H:i:s', strtotime($updateData['start_date']));
    $updateData['due_date'] = date('Y-m-d H:i:s', strtotime($updateData['due_date']));


    // Fetch the existing record before update
    $existingRecord = $this->model->getData('lead_task', array('task_id' => $_POST['task_id']));
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
        $this->session->set_flashdata('msg', 'Task not found.');
        redirect('view-lead/'.$id);
        return;
    }

    $changes = [];

    // Debug existing data
    //echo "<pre>Existing Record: "; print_r($existingRecord); echo "</pre>";
    //echo "<pre>Update Data: "; print_r($updateData); echo "</pre>";

    // File upload handling
    if (!empty($_FILES['task_file']['name'][0])) {
        $uploaddir = './uploads/lead/task/';

        if(!is_dir($uploaddir) )
        {
            mkdir($uploaddir,0777,TRUE);
        }

        $uploadedFiles = [];
    
        foreach ($_FILES['task_file']['name'] as $key => $name) {
            $filename = basename($name);
            $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            // Generate a unique filename to avoid overwriting
            $counter = 1;
            while (file_exists($uploaddir . $filename)) {
                $filename = $rawBaseName . $counter . '.' . $extension;
                $counter++;
            }

            $uploadfile = $uploaddir . $filename;

            // Move the uploaded file
            if (move_uploaded_file($_FILES['task_file']['tmp_name'][$key], $uploadfile)) {
                $uploadedFiles[] = $filename;
            } else {
                echo "Upload failed!";
                return false;
            }
        }

        // Store uploaded files
        $updateData['task_file'] = implode(',', $uploadedFiles);
        if (!empty($updateData['saved_attachment'])) {
            $updateData['task_file'] .= ',' . $updateData['saved_attachment'];
        }
    } else {
        $updateData['task_file'] = $updateData['saved_attachment'];
    }

    unset($updateData['saved_attachment']);

    // Compare fields
    foreach ($updateData as $key => $newValue) {
        if (isset($existingRecord->$key)) {
            $oldValue = trim(strval($existingRecord->$key));
            $newValue = trim(strval($newValue));

            // Debug field comparison
           //echo "Checking: $key → Old: [$oldValue], New: [$newValue] <br>";

            if ($oldValue != $newValue) {
                $changes[] = [
                    'field' => $key,
                    'old_value' => $oldValue,
                    'new_value' => $newValue
                ];
            }
        }
    }

    if (!empty($changes)) {
        $details = json_encode($changes);
    } else {
        $details = 'No changes made';
    }

   // echo "<pre>Changes: "; print_r($details); die;

    // Update the record
    $this->model->updateData('lead_task', $updateData, array('task_id' => $_POST['task_id']));

    // Log the update action
    $logArray = [
        'lead_id' => $lead_id,
        'activity_id' => '1',
        'user_id' => $op_user_id,
        'affected_id' => $_POST['task_id'],
        'action_id' => '2',
        'details' => $details
    ];
    $this->db->insert('lead_log', $logArray);

    $this->session->set_flashdata('msg', 'Task Lead Details Updated Successfully.');
    redirect('view-lead/'.$id);
}


// function updatetask($id)
// {  
//     $updateData = $_POST; 
//     $op_user_id = $this->session->userdata('op_user_id');
//     $lead_id = base64_decode($id);
//     $updateData['user_id'] = $op_user_id;
//     $updateData['lead_id'] = $lead_id;
    
//     // Fetch existing record
//     $existingData = $this->model->getData('lead_task', array('task_id' => $_POST['task_id']));
    
//     if (!$existingData) {
//         $this->session->set_flashdata('msg', 'Task not found.');
//         redirect('view-lead/'.$id);
//         return;
//     }
    
//     // Convert existing data to array
//     $existingData = (array) $existingData;
// print_r($existingData);
//     // Track changes
//     $changes = [];
    
//     foreach ($updateData as $key => $newValue) {
//         $oldValue = isset($existingData[$key]) ? $existingData[$key] : null;
        
//         if ($oldValue != $newValue) {
//             $changes[$key] = [
//                 'old' => $oldValue,
//                 'new' => $newValue
//             ];
//         }
//     }
//     echo"<pre>"; print_r($changes); die;
//     // Handle file uploads
//     if (!empty($_FILES['task_file']['name'][0])) {
//         $uploaddir = './uploads/lead/task/';
//         $uploadedFiles = [];

//         foreach ($_FILES['task_file']['name'] as $key => $name) {
//             $filename = basename($name);
//             $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
//             $extension = pathinfo($filename, PATHINFO_EXTENSION);

//             // Generate a unique filename to avoid overwriting
//             $counter = 1;
//             while (file_exists($uploaddir . $filename)) {
//                 $filename = $rawBaseName . $counter . '.' . $extension;
//                 $counter++;
//             }

//             $uploadfile = $uploaddir . $filename;

//             // Move the uploaded file
//             if (move_uploaded_file($_FILES['task_file']['tmp_name'][$key], $uploadfile)) {
//                 $uploadedFiles[] = $filename;
//             } else {
//                 $data['class'] = 'danger';
//                 $data['msg'] = 'One or more uploads failed.';
//                 return false;
//             }
//         }

//         // Store uploaded files and track changes
//         $newFileValue = implode(',', $uploadedFiles);
//         if (!empty($updateData['saved_attachment'])) {
//             $newFileValue .= ',' . $updateData['saved_attachment']; 
//         }

//         // Check if file field changed
//         if ($existingData['task_file'] !== $newFileValue) {
//             $changes['task_file'] = [
//                 'old' => $existingData['task_file'],
//                 'new' => $newFileValue
//             ];
//         }

//         $updateData['task_file'] = $newFileValue;
//     } else {
//         $updateData['task_file'] = $updateData['saved_attachment'];
//     }

//     unset($updateData['saved_attachment']);

//     // Save only if there are changes
//     if (!empty($changes)) {
//         $this->model->updateData('lead_task', $updateData, array('task_id' => $_POST['task_id']));

//         // Save changes in lead_log
//         $logArray = [
//             'lead_id' => $lead_id,
//             'activity_id' => '1',
//             'user_id' => $op_user_id,
//             'affected_id' => $_POST['task_id'],
//             'action_id' => '2',
//             'details' => json_encode($changes)  // Store changes as JSON
//         ];
//         $this->db->insert('lead_log', $logArray);

//         $this->session->set_flashdata('msg', 'Task Lead Details Updated Successfully.');
//     } else {
//         $this->session->set_flashdata('msg', 'No changes detected.');
//     }

//     redirect('view-lead/'.$id);
// }


    function delete_task()
    {
        
            $op_user_id=$this->session->userdata('op_user_id');
          // echo $_POST['lead_id']; die;
             $del = $this->model->updateData('lead_task',array('task_status'=>'0'),array('task_id'=>$_POST['task_id']));
             $logArray=[
                'lead_id'=>$_POST['lead_id'],
                'activity_id'=>'1',
                'user_id'=>$op_user_id,
                'affected_id'=>$_POST['task_id'],
                'action_id'=>'3',
                
               ];
               $this->db->insert('lead_log', $logArray);
             if(!empty($del))
              {          
                $this->session->set_flashdata('msg', 'Lead Task Daleted Successfully.');          
                }else{
                        $this->session->set_flashdata('msg', 'Lead Task Delete Failed.');
                 }
    }

    function submitreminder($id)
    {  
        $send_email_reminder = isset($_POST['send_email_reminder']) ? 'on' : 'off';
        $op_user_id=$this->session->userdata('op_user_id');
        $lead_id =base64_decode($id);

            $saveData = [
                'lead_id'=>$lead_id,
                'reminder_date' => $_POST['reminder_date'],
                'reminder_to' => $_POST['reminder_to'],
                'reminder_description' => $_POST['reminder_description'],
                'send_email_reminder' => $send_email_reminder,
                'user_id'=>$op_user_id
            ];
      
            $this->db->insert('lead_reminder', $saveData);

            $inserted_id = $this->db->insert_id(); 
            
            // echo $inserted_id; die;

            // echo $_POST['reminder_to'];
            // die();

            $sql = "SELECT * from op_user WHERE op_user_id = '".$_POST['reminder_to']."'";
            $result = $this->db->query($sql);
            $user_id = $result->row()->op_user_id;
            $user_email = $result->row()->email;
            $user_name = $result->row()->user_name;

            $from = 'krutika.patel@microlan.in';
            $to = $user_email;
            
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject('Lead Reminder');
            
            // $this->email->message('Hi '.$user_name.',<br>This is a reminder for your task.');
            // $this->email->send();

            $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);

        $this->email->message("<!DOCTYPE html>
                                <html>
                                    <head>
                                    <style>
                                        body {
                                            font-family: Arial, sans-serif;
                                            margin: 0;
                                            padding: 0;
                                            background-color: #f8f9fa;
                                        }
                                        .email-container {
                                            max-width: 600px;
                                            margin: 20px auto;
                                            border: 1px solid #ddd;
                                            border-radius: 8px;
                                            overflow: hidden;
                                            padding: 30px;
                                        }
                                        p {
                                            margin: 0; /* Removes space between paragraphs */
                                            line-height: 1.5; /* Adjust line-height to reduce space between lines */
                                        }
                                    </style>
                                    </head>
                                    <body>
                                        <div class='email-container'>
                                            <div class='content watermark-container'>
                                                <p>Dear ${user_name},</p>
                                                <p>This is a reminder for your task : ${$_POST['reminder_description']}</p>
                                                <br>
                                                <p style='text-align: left; line-height: 1.5;'>Regards,
                                                    <br>
                                                    MAA Group</p>
                                            </div>
                                        </div>
                                    </body>
                                </html>");


            if ($this->email->send()) {
                $data['message'] = 'Email sent successfully';
                $data['code'] = '1';
            } else {
                $data['message'] = 'Email sending failed';
                $data['code'] = '0';
            }
            echo json_encode($data);
 
            $logArray=[
             'lead_id'=>$lead_id,
             'activity_id'=>'3',
             'user_id'=>$op_user_id,
             'affected_id'=>$inserted_id,
             'action_id'=>'1',
             
            ];
            $this->db->insert('lead_log', $logArray);
            $this->session->set_flashdata('msg', 'Lead Reminder Details Saved Successfully.');
            redirect('view-lead/'.$id);
       // }else{
            // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
            // redirect('view-lead/'.$id);
        //}
    }

    public function getReminderDetails()
{
    $reminder_id = $this->input->post('reminder_id');
//echo $task_id; die;
    if ($reminder_id) {
        $reminder =$this->model->getData('lead_reminder',array('reminder_id'=>$reminder_id));
       
        if ($reminder) {
           // $task['task_file'] = !empty($task['task_file']) ? explode(',', $task['task_file']) : [];
            //print_r($task); die;
            echo json_encode(['success' => true, 'data' => $reminder]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Reminder not found.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid reminder ID.']);
    }
}

function updatereminder($id)
    {  
        $updateData = $_POST; 
        $op_user_id=$this->session->userdata('op_user_id');
        $lead_id=base64_decode($id);
       // $updateData['user_id'] =$op_user_id;
        $updateData['lead_id'] =base64_decode($id);
       $updateData['updated_date']=date('Y-m-d H:i:s');
       $updateData['user_id']=$op_user_id;

       $updateData['reminder_date'] = date('Y-m-d H:i:s', strtotime($updateData['reminder_date']));


    // Fetch the existing record before update
    $existingRecord = $this->model->getData('lead_reminder', array('reminder_id' => $_POST['reminder_id']));
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
        $this->session->set_flashdata('msg', 'Reminder not found.');
        redirect('view-lead/'.$id);
        return;
    }

    $changes = [];

       // Compare fields
    foreach ($updateData as $key => $newValue) {
        if (isset($existingRecord->$key)) {
            $oldValue = trim(strval($existingRecord->$key));
            $newValue = trim(strval($newValue));

            // Debug field comparison
           //echo "Checking: $key → Old: [$oldValue], New: [$newValue] <br>";

            if ($oldValue != $newValue) {
                $changes[] = [
                    'field' => $key,
                    'old_value' => $oldValue,
                    'new_value' => $newValue
                ];
            }
        }
    }

    if (!empty($changes)) {
        $details = json_encode($changes);
    } else {
        $details = 'No changes made';
    }

         $this->model->updateData('lead_reminder',$updateData,array('reminder_id'=>$_POST['reminder_id']));
         $logArray=[
            'lead_id'=>$lead_id,
            'activity_id'=>'3',
            'user_id'=>$op_user_id,
            'affected_id'=>$_POST['reminder_id'],
            'action_id'=>'2',
            'details' => $details
            
           ];
           $this->db->insert('lead_log', $logArray);
            $this->session->set_flashdata('msg', 'Reminder Details Saved Successfully.');
            redirect('view-lead/'.$id);
       // }else{
            // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
            // redirect('view-lead/'.$id);
        //}
    }
    
    function delete_reminder()
    {
        $updateData = [
            'reminder_status' => '0',
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $op_user_id=$this->session->userdata('op_user_id');
        
             $del = $this->model->updateData('lead_reminder',$updateData,array('reminder_id'=>$_POST['reminder_id']));
             $logArray=[
                'lead_id'=>$_POST['lead_id'],
                'activity_id'=>'3',
                'user_id'=>$op_user_id,
                'affected_id'=>$_POST['reminder_id'],
                'action_id'=>'3',
                
               ];
               $this->db->insert('lead_log', $logArray);

             if(!empty($del))
              {          
                $this->session->set_flashdata('msg', 'Lead Reminder Daleted Successfully.');          
                }else{
                        $this->session->set_flashdata('msg', 'Lead Reminder Delete Failed.');
                 }
                 redirect('view-lead/'. base64_encode($_POST['lead_id']));
    }

    function submitnote($id)
    {  
        $touch_lead = isset($_POST['touch_lead']) ? 'on' : 'off';
        $contacted_lead = isset($_POST['contacted_lead']) ? 'on' : 'off';
        $op_user_id=$this->session->userdata('op_user_id');
        $lead_id =base64_decode($id);
        // Now include this in the data you save to the database
            $saveData = [
                'lead_id'=>$lead_id,
                'note_msg' => $_POST['note_msg'],
               
                'touch_lead' =>  $touch_lead,
                'contacted_lead' => $contacted_lead,
                'op_user_id'=>$op_user_id
            ];
      
            // echo'<pre>';
            // print_r($saveData); die;
            $this->db->insert('lead_note', $saveData);
            $inserted_id = $this->db->insert_id(); 
           // echo $inserted_id; die;

           $logArray=[
            'lead_id'=>$lead_id,
            'activity_id'=>'4',
            'user_id'=>$op_user_id,
            'affected_id'=>$inserted_id,
            'action_id'=>'1',
            
           ];

           $this->db->insert('lead_log', $logArray);

            $this->session->set_flashdata('msg', 'Lead Note Saved Successfully.');
            redirect('view-lead/'.$id);
       // }else{
            // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
            // redirect('view-lead/'.$id);
        //}
    }

    function submitattachment($id)
    {  
        $postData = $_POST; 
        //echo($id); 
        
        //echo base64_decode($id); die;
        $op_user_id=$this->session->userdata('op_user_id');
        $lead_id=base64_decode($id);
        $postData['user_id'] =$op_user_id;
        $postData['lead_id'] =base64_decode($id);
        $saveData=[
            'user_id'=>$op_user_id,
            'lead_id'=> $lead_id,
        ];
      
            if (!empty($_FILES['file_covering']['name'][0])) {
    $uploaddir = './uploads/lead/attachment/';

    if (!is_dir($uploaddir)) {
        mkdir($uploaddir, 0777, true);
    }

    $uploadedFiles = [];

    foreach ($_FILES['file_covering']['name'] as $key => $name) {
        if ($_FILES['file_covering']['error'][$key] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['file_covering']['tmp_name'][$key];
            $originalName = basename($name);
            $extension = pathinfo($originalName, PATHINFO_EXTENSION);
            $uniqueName = uniqid('attach_', true) . '.' . $extension;
            $uploadFile = $uploaddir . $uniqueName;

            if (move_uploaded_file($tmpName, $uploadFile)) {
                $uploadedFiles[] = $uniqueName;
            } else {
                $data['class'] = 'danger';
                $data['msg'] = 'One or more uploads failed.';
                return false;
            }
        }
    }

    $saveData['attachment_files'] = implode(',', $uploadedFiles);
} else {
    $saveData['attachment_files'] = '';
}

            $this->db->insert('lead_attacment', $saveData);

            $inserted_id = $this->db->insert_id(); 
            // echo $inserted_id; die;
 
            $logArray=[
             'lead_id'=>$lead_id,
             'activity_id'=>'2',
             'user_id'=>$op_user_id,
             'affected_id'=>$inserted_id,
             'action_id'=>'1',
             
            ];
 
            $this->db->insert('lead_log', $logArray);

            $this->session->set_flashdata('msg', 'Task Attachments Saved Successfully.');
            redirect('view-lead/'.$id);
       // }else{
            // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
            // redirect('view-lead/'.$id);
        //}
    }

    public function get_random_number($length) {
        return str_pad(mt_rand(0, 999999), $length, '0', STR_PAD_LEFT);
    }

    function add_lead_praposals($id){
        //echo $id;die;
        $id=base64_decode($id);
        //echo $id; die;
       // $data['ivn_no']='IVN'.get_random_number(6);
       $data['ivn_no'] = 'IVN' . $this->get_random_number(6);
       $data['member_list'] =$this->model->getData('op_user',array('status'=>'1')); 
       $data['customer_list'] =$this->model->getData('customer',array('status'=>'1'));
        $data['project_list'] =$this->model->getSqlData("select project_id,project_name from project ");
        //print_r($data['project_list']); die;
       $data['res'] = $this->model->getData('lead',array('lead_id'=>$id))[0];
        $data['states']  =$this->model->getSqlData("select * from states group by state_name order by state_name asc"); 
       $data['service_list'] =$this->model->getData('product',array('status'=>'1'));
       $data['customer_list'] =$this->model->getSqlData("select cust_id,company from customer where status=1");
       $data['template_list'] =$this->model->getSqlData("select template_id,title from template where status=1 AND deleted_status=1");
       $data['custom_template_list'] =$this->model->getSqlData("select template_id,title from template_custom where lead_id='".$id."'");
        $res_as =$this->model->getSqlData("select user_name as assigned from op_user where op_user_id='".$data['res']['assigned']."'");
       if(!empty($res_as))
          {
                  $data['res']['assigned']=$res_as[0]['assigned'];
           }else{
                   $data['res']['assigned']='';
            }   

       

          $res_city =$this->model->getSqlData("select city_name from cities where city_id='".$data['res']['city']."'");
       if(!empty($res_city))
          {
                  $data['res']['city']=$res_city[0]['city_name'];
           }else{
                   $data['res']['city']='';
            }  
            $pagename="Add Proposal"; 
            $this->model->partialView('admin/lead/add_proposal', $data,$pagename);
//$this->model->partialView('admin/lead/add_praposal',$data);
   }

   public function getAttachmentDetails()
{
    $attachment_id = $this->input->post('attachment_id');
//echo $task_id; die;
    if ($attachment_id) {
        $attFiles =$this->model->getData('lead_attacment',array('attachment_id'=>$attachment_id));
       // $this->db->where('task_id', $task_id);
       // $task = $this->db->get('tasks')->row_array();
//print_r($task);
        if ($attFiles) {
           // $task['task_file'] = !empty($task['task_file']) ? explode(',', $task['task_file']) : [];
            //print_r($task); die;
            echo json_encode(['success' => true, 'data' => $attFiles]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Attachment not found.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid attachment ID.']);
    }
}

function updateattachment($id)
    {  
        $updateData = $_POST; 
        //echo'<pre>'; print_r($updateData); die;
      //  echo($id); 
       // echo base64_decode($id); die;
       //$tid=$_POST['task_id'];
    //    echo $tid;
     //  die;
     $op_user_id=$this->session->userdata('op_user_id');
        $lead_id=base64_decode($id);
        $updateData['user_id'] =$op_user_id;
        $updateData['lead_id'] =base64_decode($id);

        // Fetch the existing record before update
    $existingRecord = $this->model->getData('lead_attacment', array('attachment_id' => $_POST['attachment_id']));
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
        $this->session->set_flashdata('msg', 'Reminder not found.');
        redirect('view-lead/'.$id);
        return;
    }

    $changes = [];

      
       
       
            if (!empty($_FILES['file_covering']['name'][0])) {
                $uploaddir = './uploads/lead/task/';
                $uploadedFiles = [];
            
                foreach ($_FILES['file_covering']['name'] as $key => $name) {
                //if (isset($_FILES['task_file']) && is_array($_FILES['task_file']['name']) && count($_FILES['task_file']['name']) > 0 && $_FILES['task_file']['name'][0] !== '') {
                   // echo"file found"; die;
                    $filename = basename($name);
                    $rawBaseName = pathinfo($filename, PATHINFO_FILENAME);
                    $extension = pathinfo($filename, PATHINFO_EXTENSION);
            
                    // Generate a unique filename to avoid overwriting
                    $counter = 1;
                    while (file_exists($uploaddir . $filename)) {
                        $filename = $rawBaseName . $counter . '.' . $extension;
                        $counter++;
                    }
            
                    $uploadfile = $uploaddir . $filename;
            
                    // Move the uploaded file
                    if (move_uploaded_file($_FILES['file_covering']['tmp_name'][$key], $uploadfile)) {
                        $uploadedFiles[] = $filename; // Add the filename to the uploadedFiles array
                    } else {
                        $data['class'] = 'danger';
                        $data['msg'] = 'One or more uploads failed.';
                        return false;
                    }
                }
            
                // Store the uploaded file names as a comma-separated string
                $updateData['attachment_files'] = implode(',', $uploadedFiles);
                if (!empty($updateData['saved_file_attachment'])) {
                    $updateData['attachment_files'] .= ',' . $updateData['saved_file_attachment']; // Append to existing files
                }
                // echo"file";
                // print_r($updateData['task_file']);
                // print_r($uploadedFiles); die;
                

            } else {
               // echo"file not found";
                $updateData['attachment_files'] = $updateData['saved_file_attachment'] ;// No files uploaded
            }

           
        unset($updateData['saved_file_attachment']);
       // echo '<pre>'; print_r($updateData);die;

        // Compare fields
    foreach ($updateData as $key => $newValue) {
        if (isset($existingRecord->$key)) {
            $oldValue = trim(strval($existingRecord->$key));
            $newValue = trim(strval($newValue));

            // Debug field comparison
           //echo "Checking: $key → Old: [$oldValue], New: [$newValue] <br>";

            if ($oldValue != $newValue) {
                $changes[] = [
                    'field' => $key,
                    'old_value' => $oldValue,
                    'new_value' => $newValue
                ];
            }
        }
    }

    if (!empty($changes)) {
        $details = json_encode($changes);
    } else {
        $details = 'No changes made';
    }

            
         $this->model->updateData('lead_attacment',$updateData,array('attachment_id'=>$_POST['attachment_id']));
            
        // $inserted_id = $this->db->insert_id(); 
         //echo $inserted_id; die;

         $logArray=[
          'lead_id'=>$lead_id,
          'activity_id'=>'2',
          'user_id'=>$op_user_id,
          'affected_id'=>$_POST['attachment_id'],
          'action_id'=>'2',
          'details'=>$details,
          
         ];
         $this->db->insert('lead_log', $logArray);
            $this->session->set_flashdata('msg', 'Task Lead Details Saved Successfully.');
            $this->session->set_flashdata('class', 'success');
            redirect('view-lead/'.$id);
       // }else{
            // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
            // redirect('view-lead/'.$id);
        //}
    }
    function delete_attachment()
    {
        $op_user_id=$this->session->userdata('op_user_id');
        // echo $_POST['lead_id']; die;
        $del = $this->model->updateData('lead_attacment',array('attachment_status'=>'0'),array('attachment_id'=>$_POST['attachment_id']));
        if(!empty($del))
        {      
            $logArray=[
                'lead_id'=>$_POST['lead_id'],
                'activity_id'=>'2',
                'user_id'=>$op_user_id,
                'affected_id'=>$_POST['attachment_id'],
                'action_id'=>'3',
                ];
            $this->db->insert('lead_log', $logArray);
                    
            $this->session->set_flashdata('msg', 'Lead Attachment Daleted Successfully.');   
            $this->session->set_flashdata('class', 'success');       
        }
        else
        {
            $this->session->set_flashdata('msg', 'Lead Attachment Delete Failed.');
            $this->session->set_flashdata('class', 'danger');
        }
        redirect('view-lead/'. base64_encode($_POST['lead_id']));
    }

    public function getNoteDetails()
{
    $note_id = $this->input->post('note_id');
//echo $note_id; die;
    if ($note_id) {
        $note =$this->model->getData('lead_note',array('note_id'=>$note_id));
       
        if ($note) {
           // $task['task_file'] = !empty($task['task_file']) ? explode(',', $task['task_file']) : [];
            //print_r($task); die;
            echo json_encode(['success' => true, 'data' => $note]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Note not found.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid note ID.']);
    }
}

function updatenote($id)
    {  
        $updateData = $_POST; 
        $op_user_id=$this->session->userdata('op_user_id');
        $lead_id=base64_decode($id);
       // $updateData['user_id'] =$op_user_id;
        $updateData['lead_id'] =base64_decode($id);
       $updateData['updated_at']=date('Y-m-d H:i:s');
       $updateData['op_user_id']=$op_user_id;

       //$updateData['reminder_date'] = date('Y-m-d H:i:s', strtotime($updateData['reminder_date']));


    // Fetch the existing record before update
    $existingRecord = $this->model->getData('lead_note', array('note_id' => $_POST['note_id']));
    $existingRecord = !empty($existingRecord) ? (is_array($existingRecord) ? (object)$existingRecord[0] : $existingRecord) : null;

    if (!$existingRecord) {
        $this->session->set_flashdata('msg', 'Reminder not found.');
        redirect('view-lead/'.$id);
        return;
    }

    $changes = [];

       // Compare fields
    foreach ($updateData as $key => $newValue) {
        if (isset($existingRecord->$key)) {
            $oldValue = trim(strval($existingRecord->$key));
            $newValue = trim(strval($newValue));

            // Debug field comparison
           //echo "Checking: $key → Old: [$oldValue], New: [$newValue] <br>";

            if ($oldValue != $newValue) {
                $changes[] = [
                    'field' => $key,
                    'old_value' => $oldValue,
                    'new_value' => $newValue
                ];
            }
        }
    }

    if (!empty($changes)) {
        $details = json_encode($changes);
    } else {
        $details = 'No changes made';
    }

         $this->model->updateData('lead_note',$updateData,array('note_id'=>$_POST['note_id']));
         $logArray=[
            'lead_id'=>$lead_id,
            'activity_id'=>'4',
            'user_id'=>$op_user_id,
            'affected_id'=>$_POST['note_id'],
            'action_id'=>'2',
            'details' => $details
            
           ];
           $this->db->insert('lead_log', $logArray);
            $this->session->set_flashdata('msg', 'Lead Note Saved Successfully.');
            redirect('view-lead/'.$id);
       // }else{
            // $this->session->set_flashdata('msg', 'Task Lead Add Failed.');
            // redirect('view-lead/'.$id);
        //}
    }

    function get_item()
    {
            $res_p =$this->model->getSqlData("select product_name,description,price from product where product_id='".$_POST['serv_id']."'")[0];
            echo json_encode($res_p);
    }


//Template functions begain

function template_list()
{ 
    // $data['list'] =$this->model->getData('template',array('deleted_status'=>'1'));

    $where = array('deleted_status'=>'1');
    $this->db->where($where);
    $this->db->order_by('template_id', 'DESC'); // hardcoded
    $query = $this->db->get('template');
    $data['list'] = $query->result_array();

    if($data['list'])
    {
       foreach ($data['list'] as $key => $val) {
             $res_pro =$this->model->getSqlData("select image_name from template_image where template_id='".$val['template_id']."'");
            if(!empty($res_pro))
                {
                       $data['list'][$key]['image_name']=$res_pro;
                       
                }else{
                        $data['list'][$key]['image_name']='';
                     
                 } 
        }
    }
    $pagename="Template List";
   
    $this->model->partialView('admin/template/list_template',$data,$pagename);
}

function add_template()
    {
        $pagename="Add Template";
        $this->model->partialView('admin/template/add_template','',$pagename);
    }

    function edittemplate($id){

        $lead_id = $this->input->get('lead_id');
        $lead_proposal_id=$this->input->get('lead');
        $template_id=$id;
        $old_template_id=$this->input->get('otemplate_id');
        // $checkArr=[
        //     'lead_id'=>$lead_id,
        //     'lead_proposal_id'=>$lead_proposal_id,
        //     'template_id'=>$template_id,
        //     'old_template_id'=>$old_template_id
        // ];
        // echo"<pre>"; print_r($checkArr);die;
        //$lead_id=base64_decode($lead_id);
       
       //cho $lead_id; echo"<br>"; echo $lead_proposal_id; echo"template_id"; echo $id; die;
        
       $isExsist=$this->model->getSqlData("select * from template_custom where template_id='".$id."' and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");
       //echo"<pre>"; print_r($isExsist);
       if(!empty($isExsist))
       { //echo"exsist";die;
        
        $data['res'] = $this->model->getSqlData("select * from template_custom where template_id='".$id."' and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'")[0];

        $data['attchment_file'] =$this->model->getSqlData("select temp_cf_id,image_name,file_type from template_attchment_file_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");
        $data['commercial_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_commercial_file_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");

        $data['covering_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_covering_file_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");

        $data['key_point_file'] =$this->model->getSqlData("select temp_kpf_id,image_name from template_key_point_file_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");

         $data['over_view_project_file'] =$this->model->getSqlData("select temp_ovpf_id,image_name from template_over_view_project_file_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");

        $data['term_and_condition_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_term_and_condition_file_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");
        $data['signature_file'] =$this->model->getSqlData("select sig_id,signature_file from template_signature_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");
        $data['stamp_file'] =$this->model->getSqlData("select stp_id,stamp_file from template_stamp_custom where template_id='".$data['res']['template_id']."'  and lead_id='".$lead_id."' and lead_proposal_id='". $lead_proposal_id."'");
      
       }
       else{
       // echo"not exsist";die;
        $data['res'] = $this->model->getData('template',array('template_id'=>$id))[0];

        $data['attchment_file'] =$this->model->getSqlData("select temp_cf_id,image_name,file_type from template_attchment_file where template_id='".$data['res']['template_id']."'");
        $data['commercial_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_commercial_file where template_id='".$data['res']['template_id']."'");

        $data['covering_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_covering_file where template_id='".$data['res']['template_id']."'");

        $data['key_point_file'] =$this->model->getSqlData("select temp_kpf_id,image_name from template_key_point_file where template_id='".$data['res']['template_id']."'");

         $data['over_view_project_file'] =$this->model->getSqlData("select temp_ovpf_id,image_name from template_over_view_project_file where template_id='".$data['res']['template_id']."'");

        $data['term_and_condition_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_term_and_condition_file where template_id='".$data['res']['template_id']."'");
       }
        $pagename='edit template';
        $this->model->partialView('admin/template/edit_template',$data,$pagename);
    }

    function updatetemplate($id){
        $postData = $_POST;
       // echo"<pre>"; print_r($postData); die;
         unset($postData['file_type']); 
        $this->model->updateData('template',$postData,array('template_id'=>$id)); 
         /*========================[ file covering ]==========================*/ 
           if(!empty($_FILES['file_covering']['name']))
        {
            foreach ($_FILES['file_covering']['name'] as $key => $value) {
                $fvalue=$_FILES['file_covering']['name'][$key];
                $uploaddir = 'uploads/template/';
                $filename = rand().basename($fvalue);
                $uploadfile = $uploaddir.$filename;
                 $ext = pathinfo($filename, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_covering']['tmp_name'][$key],$uploadfile)) {
                 $image_name= $filename;
                 $this->model->insertData('template_covering_file',array('template_id'=>$id,'image_name'=>$image_name));
                  } 
           } 
        }  

        /*========================[ file over view project ]==========================*/  
           if(!empty($_FILES['file_over_view_project']['name']))
        {
            foreach ($_FILES['file_over_view_project']['name'] as $key_ovp => $value) {
                $fvalue_ovp=$_FILES['file_over_view_project']['name'][$key_ovp];
                $uploaddir = 'uploads/template/';
                $filename_ovp = rand().basename($fvalue_ovp);
                $uploadfile_ovp = $uploaddir.$filename_ovp;
                 $ext = pathinfo($filename_ovp, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_over_view_project']['tmp_name'][$key_ovp],$uploadfile_ovp)) {
                 $image_name_ovp= $filename_ovp;
                 $this->model->insertData('template_over_view_project_file',array('template_id'=>$id,'image_name'=>$image_name_ovp)); 
                 }
           } 
        }  

        /*========================[ file key point ]==========================*/ 
           if(!empty($_FILES['file_key_point']['name']))
        {
            foreach ($_FILES['file_key_point']['name'] as $key_kp => $value) {
                $fvalue_kp=$_FILES['file_key_point']['name'][$key_kp];
                $uploaddir = 'uploads/template/';
                $filename_kp = rand().basename($fvalue_kp);
                $uploadfile_kp = $uploaddir.$filename_kp;
                 $ext = pathinfo($filename_kp, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_key_point']['tmp_name'][$key_kp],$uploadfile_kp)) {
                 $image_name_kp= $filename_kp;
                 $this->model->insertData('template_key_point_file',array('template_id'=>$id,'image_name'=>$image_name_kp)); 
                  }
           } 
        }

        /*========================[ file commercial ]==========================*/ 
           if(!empty($_FILES['file_commercial']['name']))
        {
            foreach ($_FILES['file_commercial']['name'] as $key_c => $value) {
                $fvalue_c=$_FILES['file_commercial']['name'][$key_c];
                $uploaddir = 'uploads/template/';
                $filename_c = rand().basename($fvalue_c);
                $uploadfile_c = $uploaddir.$filename_c;
                 $ext = pathinfo($filename_c, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_commercial']['tmp_name'][$key_c],$uploadfile_c)) {
                 $image_name_c= $filename_c;
                 $this->model->insertData('template_commercial_file',array('template_id'=>$id,'image_name'=>$image_name_c)); 
                  }
           } 
        }
      
        /*========================[ file term and condition ]==========================*/ 
           if(!empty($_FILES['file_term_and_condition']['name']))
        {
            foreach ($_FILES['file_term_and_condition']['name'] as $key_tc => $value) {
                $fvalue_tc=$_FILES['file_term_and_condition']['name'][$key_tc];
                $uploaddir = 'uploads/template/';
                $filename_tc = rand().basename($fvalue_tc);
                $uploadfile_tc = $uploaddir.$filename_tc;
                 $ext = pathinfo($filename_tc, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_term_and_condition']['tmp_name'][$key_tc],$uploadfile_tc)) {
                 $image_name_tc= $filename_tc;
                 $this->model->insertData('template_term_and_condition_file',array('template_id'=>$id,'image_name'=>$image_name_tc)); 
                  }
           } 
        }

        /*========================[ file attchment ]==========================*/ 
           if(!empty($_FILES['file_attchment']['name']))
        {
            foreach ($_FILES['file_attchment']['name'] as $key_af => $value_af) {
                $fvalue_af=$_FILES['file_attchment']['name'][$key_af];
                $uploaddir = 'uploads/template/';
                $filename_af = rand().basename($fvalue_af);
                $uploadfile_af = $uploaddir.$filename_af;
                 $ext = pathinfo($filename_af, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_attchment']['tmp_name'][$key_af],$uploadfile_af)) {
                 $image_name_af= $filename_af;
                 if(isset($_POST['file_type']))
                 {
                    $file_type=$_POST['file_type'][$key_af];
                  }else{
                    $file_type='';
                  }
               
                 $this->model->insertData('template_attchment_file',array('template_id'=>$id,'image_name'=>$image_name_af,'file_type'=>$file_type)); 
                 }
           } 
        }    
        $this->session->set_flashdata('msg', 'Template Details Update Successfully.');
        redirect('list-template');
    }

    function add_item()
    {
        $postData = $_POST; 
        $Data['session_id'] = $_POST['invoice_number'];
        $Data['product_id'] = $_POST['serv_id'];
        $Data['qty'] = $_POST['qty'];
        $Data['days'] = $_POST['days'];
        $Data['unit_total'] = $_POST['price']*$_POST['qty'];
        $Data['price'] = $_POST['price'];
        $cust_state_code=$_POST['state_code'];
        //print_r($_POST); die;
        // $map_with_session = $this->session->userdata('map_with');
        // $branch_id_session = $this->session->userdata('map_with_id');
        //$company_state_code =$array_data['state']['company_state_code'];
        
        //  if($map_with_session == 'F'){
        //     $is_gst = $this->model->getValue('franchise_setting','is_gst',array('franchise_sett_id'=>$branch_id_session));    
        // }else{
        //     //$is_gst = $this->model->getValue('company_setting','is_gst',array('comp_sett_id'=>'1'));
            $company_res= $this->model->getData('company_setting',array('comp_sett_id'=>'1'))[0]; 
            $is_gst=$company_res['is_gst'];
             $company_state_code=$company_res['state_code'];  
        // }

        //print_r($is_gst); die;
      
                        $product_data = $this->model->getData('product',array('product_id'=>$_POST['serv_id']));
                        //$price=explode(',',$product_data[0]['price_range']);
                       
                        $productTotal = $Data['qty'] * $Data['price'];
                        $is_product_already = $this->model->getData('cart',array('session_id'=>$Data['session_id'],'product_id'=>$_POST['serv_id'])); 
                        
                        $sgst = '0';
                        $cgst = '0';
                        $igst = '0';
                        $totalgst = '0';
                        $subTotal = $productTotal;
                        $rowTotal = $productTotal;
                        if(isset($is_product_already) && empty($is_product_already)){
                            
                            if($is_gst== '1'){
                            $calculatedGst = $this->model->getCalculatedGst($cust_state_code,$company_state_code,$productTotal,$product_data[0]['hsn_code']);
                               
                                $sgst = $calculatedGst['sgst'];
                                $cgst = $calculatedGst['cgst'];
                                $igst = $calculatedGst['igst'];
                                $totalgst = $calculatedGst['totalGst'];
                                    if(!empty($calculatedGst['gst_flag'])){
                                        if($calculatedGst['gst_flag'] == 'I'){
                                             $subTotal = $productTotal - $totalgst;
                                             $rowTotal = $productTotal;
                                        }else{ 
                                            $subTotal = $productTotal;
                                            $rowTotal = $productTotal + $totalgst;
                                        }
                            }}
                            else{
                                $sgst = 0;
                                $cgst = 0;
                                $igst = 0;
                            }
                            
                            $array_data = array();
                            $array_data['session_id']= $Data['session_id'];
                            $array_data['product_id']= $_POST['serv_id'];
                            $array_data['product_name']= strtoupper($product_data[0]['product_name']);
                            $array_data['price']= $Data['price'];
                            $array_data['qty']= $Data['qty'];
                              $array_data['days']=$Data['days'];
                            $array_data['unit_total']= $productTotal;
                            $array_data['category_id']= $product_data[0]['category_id'];
                            $array_data['subcategory_id']= $product_data[0]['sub_category_id'];                           
                            $array_data['pack_size'] = $product_data[0]['unit_size'];
                            $array_data['table_id']= '0';     
                            $array_data['sgst'] = $sgst;
                            $array_data['cgst'] = $cgst;
                            $array_data['igst'] = $igst;
                            $array_data['description'] = $_POST['service_description'];
                            $array_data['total_gst'] = $totalgst;
                            $array_data['listed_in_super_deal'] = $product_data[0]['listed_in_super_deal'];
                            $array_data['is_addon_product'] = $product_data[0]['is_addon_product'];
                            $array_data['subtotal'] = $subTotal;
                            $array_data['rowtotal'] = $rowTotal;
                           // $array_data['user_id']=$_POST['custid'];
                            $this->model->insertData('cart',$array_data);
                        }else{
                            
                            if($is_gst == '1'){
                                $calculatedGst = $this->model->getCalculatedGst($cust_state_code,$company_state_code,$productTotal,$product_data[0]['hsn_code']);
                                $sgst = $calculatedGst['sgst'];
                                $cgst = $calculatedGst['cgst'];
                                $igst = $calculatedGst['igst'];
                                $totalgst = $calculatedGst['totalGst'];
                                    if(!empty($calculatedGst['gst_flag'])){
                                        if($calculatedGst['gst_flag'] == 'I'){
                                             $subTotal = $productTotal - $totalgst;
                                             $rowTotal = $productTotal;
                                        }else{ 
                                            $subTotal = $productTotal;
                                            $rowTotal = $productTotal + $totalgst;
                                        }
                            }}
                            else{
                                $sgst = 0;
                                $cgst = 0;
                                $igst = 0;
                            }
                            
                            $updateArray = array(
                                'qty'=>$Data['qty'],
                                'days'=>$Data['days'],
                                'unit_total'=>$productTotal,
                                'sgst'=>$sgst,
                                'cgst'=>$cgst,
                                'igst'=>$igst,
                                'total_gst' => $totalgst,
                                'subtotal' => $subTotal,
                                'rowtotal' => $rowTotal

                            );
                        $this->model->updateData('cart',$updateArray,array('session_id'=>$Data['session_id'],'product_id'=>$_POST['serv_id']));
                        }

                        $arrToReturn = array('success' => 1, 'message' => "success.");
        
        echo json_encode($arrToReturn);
        //print_r($postData); die;
        //$this->model->insertData('cart',$Data);   
    }

    function get_item_cart()
    {
        $res_cart = $this->model->getSqlData("select * from cart where session_id='" . $_POST['invoice_number'] . "'");
    
        $data = [];
        
        if (!empty($res_cart)) {
            $total = 0;
            $totalgst = 0;
            $sub_total = 0;
            $cart_items = [];
    
            foreach ($res_cart as $key => $value) {
                // Fetch product details
                $res_service = $this->model->getSqlData("select product_name,description,price_range from product where product_id='" . $value['product_id'] . "'");
    
                $product_name = isset($res_service[0]['product_name']) ? $res_service[0]['product_name'] : '';
                $description = isset($value['description']) ? $value['description'] : '';
                $days = isset($value['days']) ? $value['days'] : 0;
                $qty = isset($value['qty']) ? $value['qty'] : 0;
                $price = isset($value['price']) ? $value['price'] : 0;
                $rowtotal = isset($value['rowtotal']) ? $value['rowtotal'] : 0;
    
                $cart_items[] = [
                    'cart_id' => $value['cart_id'],
                    'product_name' => $product_name,
                    'description' => $description,
                    'days' => $days,
                    'qty' => $qty,
                    'price' => $price,
                    'amount' => $price * $qty
                ];
    
                $total += $rowtotal;
                $totalgst += $value['total_gst'];
                $sub_total += $value['subtotal'];
            }
    
            // Add cart items and totals to the response data
            $data['cart_items'] = $cart_items;
            $data['sub_total_amount'] = $sub_total;
            $data['total_amount'] = $total;
            $data['totalgst'] = $totalgst;
        }
    
        // Send the response as JSON
        echo json_encode($data);
    }
    
    

    function updatetemplateCustom($id){
        $postData = $_POST;
      // echo"<pre>";print_r($postData);die;
        $leadID=$postData['lead_id'];
        $tid=$postData['old_template_id'];

       // echo $id; echo"<br>"; echo $leadID; die;
       $existingFileNamesC = $_POST['existing_file_key_point'] ?? [];  // Existing files from the form
        unset($postData['existing_file_key_point']);
        $existingFileNamesA = $_POST['existing_file_attachment'] ?? [];  // Existing files from the form
        unset($postData['existing_file_attachment']);
        $existingTC = $_POST['existing_file_tc'] ?? [];  // Existing files from the form
        unset($postData['existing_file_tc']);
        $existingCom = $_POST['existing_file_comercial'] ?? [];  // Existing files from the form
       // print_r($existingCom);
        unset($postData['existing_file_comercial']);
        $existingOV = $_POST['existing_file_ov'] ?? [];  // Existing files from the form
        unset($postData['existing_file_ov']);
        $existingCov = $_POST['existing_file_cov'] ?? [];  // Existing files from the form
        unset($postData['existing_file_cov']);
        $existingSign = $_POST['existing_signature_file'] ?? [];  // Existing files from the form
        unset($postData['existing_signature_file']);
        $existingStamp = $_POST['existing_stamp_file'] ?? [];  // Existing files from the form
        unset($postData['existing_stamp_file']);

        $msg='';
       
        $postData['template_id']=$id;
        if($tid=='')
        {
            $tid=0;
        }
       // echo"<pre>"; print_r($postData); die;

         unset($postData['file_type']); 
         //unset($postData['old_template_id']);
         $sql = "SELECT * FROM template_custom WHERE template_id='".$id."' AND lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";

      // Display the full SQL query (for debugging)

        $isExsist = $this->model->getSqlData($sql)[0];
      //  echo $sql; print_r($isExsist);die; 
        // echo"<pre>"; print_r($isExsist); 
         if(!empty($isExsist))
         {
           // echo"exsist";
           // $postData['template_id']=$isExsist['templated_id'];
            $postData['old_template_id']=$id;
           // echo"<pre>"; print_r($postData); die;
           $cid= $this->model->updateData('template_custom',$postData,array('template_id'=>$tid,'lead_id'=>$leadID,'lead_proposal_id'=>$postData['lead_proposal_id'])); 
         }
         else
         {
           // echo"new entry";
           // $postData['template_id']=$id;
            $postData['old_template_id']=$id;
          //  echo"<pre>"; print_r($postData); die;
            $cid=$this->model->insertData('template_custom',$postData);
         }
        if(!empty($cid))
        {
            /*========================[ file covering ]==========================*/ 
            // if(!empty($_FILES['file_covering']['name']))
            // {
            //     foreach ($_FILES['file_covering']['name'] as $key => $value) {
            //         $fvalue=$_FILES['file_covering']['name'][$key];
            //         $uploaddir = 'uploads/template/';
            //         $filename = rand().basename($fvalue);
            //         $uploadfile = $uploaddir.$filename;
            //         $ext = pathinfo($filename, PATHINFO_EXTENSION); 
            //     if(move_uploaded_file($_FILES['file_covering']['tmp_name'][$key],$uploadfile)) {
            //         $image_name= $filename;
            //         $this->model->insertData('template_covering_file_custom',array('template_id'=>$id,'lead_id'=>$leadID,'image_name'=>$image_name));
            //         } 
            // } 
            // }  

            if (!empty($_FILES['file_covering']['name'])) {//echo"milaaa";
      
                $uploadedFileNames = [];  // To track newly uploaded file names
                $q1="select * from template_covering_file_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
                $existingCovFiles = $this->model->getSqlData($q1);
                //$existingCovFiles = $this->model->getData('template_covering_file_custom', array('template_id' => $id));
               // echo"exsist1"; echo"<pre>"; print_r($existingOVFiles);
                $existingCovFileNames = array_column($existingCovFiles, 'image_name');  // Extract just the file names
        
                
                foreach ($_FILES['file_covering']['name'] as $key => $fileName) {
                    // Check if a new file is uploaded
                    if (!empty($fileName)) {
                        $uploaddir = 'uploads/template/';
                        $newFileName = rand() . basename($fileName);  // Generate unique file name
                        $uploadfile = $uploaddir . $newFileName;
            
                        if (move_uploaded_file($_FILES['file_covering']['tmp_name'][$key], $uploadfile)) {
                            // Save the new file name in the database
                            $this->model->insertData('template_covering_file_custom', [
                                'template_id' => $id,
                                'image_name'  => $fileName,
                                'lead_id'=>$leadID,
                                'lead_proposal_id'=>$postData['lead_proposal_id']
                            ]);
            
                            $uploadedFileNames[] = $fileName;  // Track uploaded file
                        }
                    } else {
                        // No new file uploaded, use the existing one
                        $uploadedFileNames[] =  $existingCov[$key] ?? '';  // Keep the existing file name
                    }
                }
            //     echo"exist tc"; echo"<pre/>"; print_r($existingOV);
            //    echo"upload"; echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingOVFileNames);die;
            //     // Delete files that are in the database but not in the new upload
                $filesToDelete = array_diff($existingCovFileNames, $uploadedFileNames);
            
                foreach ($filesToDelete as $fileToDelete) {
                    // Delete from database
                    $this->model->deleteData('template_covering_file_custom', array('template_id' => $id,'lead_id' => $leadID, 'image_name' => $fileToDelete));
                    
                    // Optionally delete the physical file
                    $filePath = 'uploads/template/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
           
        

            /*========================[ file over view project ]==========================*/  
            // if(!empty($_FILES['file_over_view_project']['name']))
            // {
            //     foreach ($_FILES['file_over_view_project']['name'] as $key_ovp => $value) {
            //         $fvalue_ovp=$_FILES['file_over_view_project']['name'][$key_ovp];
            //         $uploaddir = 'uploads/template/';
            //         $filename_ovp = rand().basename($fvalue_ovp);
            //         $uploadfile_ovp = $uploaddir.$filename_ovp;
            //         $ext = pathinfo($filename_ovp, PATHINFO_EXTENSION); 
            //     if(move_uploaded_file($_FILES['file_over_view_project']['tmp_name'][$key_ovp],$uploadfile_ovp)) {
            //         $image_name_ovp= $filename_ovp;
            //         $this->model->insertData('template_over_view_project_file_custom',array('template_id'=>$id,'lead_id'=>$leadID,'image_name'=>$image_name_ovp)); 
            //         }
            // } 
            // }  

            if (!empty($_FILES['file_overview_project']['name'])) {
      
                $uploadedFileNames = [];  // To track newly uploaded file names
                $q2="select * from template_over_view_project_file_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
                $existingOVFiles = $this->model->getSqlData($q2);
                // $existingOVFiles = $this->model->getData('template_over_view_project_file_custom', array('template_id' => $id));
               // echo"exsist1"; echo"<pre>"; print_r($existingOVFiles);
                $existingOVFileNames = array_column($existingOVFiles, 'image_name');  // Extract just the file names
        
                
                foreach ($_FILES['file_overview_project']['name'] as $key => $fileName) {
                    // Check if a new file is uploaded
                    if (!empty($fileName)) {
                        $uploaddir = 'uploads/template/';
                        $newFileName = rand() . basename($fileName);  // Generate unique file name
                        $uploadfile = $uploaddir . $newFileName;
            
                        if (move_uploaded_file($_FILES['file_overview_project']['tmp_name'][$key], $uploadfile)) {
                            // Save the new file name in the database
                            $this->model->insertData('template_over_view_project_file_custom', [
                                'template_id' => $id,
                                'image_name'  => $fileName,
                                'lead_id'=>$leadID,
                                'lead_proposal_id'=>$postData['lead_proposal_id']
                            ]);
            
                            $uploadedFileNames[] = $fileName;  // Track uploaded file
                        }
                    } else {
                        // No new file uploaded, use the existing one
                        $uploadedFileNames[] =  $existingOV[$key] ?? '';  // Keep the existing file name
                    }
                }
            //     echo"exist tc"; echo"<pre/>"; print_r($existingOV);
            //    echo"upload"; echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingOVFileNames);die;
            //     // Delete files that are in the database but not in the new upload
                $filesToDelete = array_diff($existingOVFileNames, $uploadedFileNames);
            
                foreach ($filesToDelete as $fileToDelete) {
                    // Delete from database
                    $this->model->deleteData('template_over_view_project_file_custom', array('template_id' => $id,'lead_id'=>$leadID, 'image_name' => $fileToDelete));
                    
                    // Optionally delete the physical file
                    $filePath = 'uploads/template/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
           

            /*========================[ file key point ]==========================*/ 
            // if(!empty($_FILES['file_key_point']['name']))
            // {
            //     foreach ($_FILES['file_key_point']['name'] as $key_kp => $value) {
            //         $fvalue_kp=$_FILES['file_key_point']['name'][$key_kp];
            //         $uploaddir = 'uploads/template/';
            //         $filename_kp = rand().basename($fvalue_kp);
            //         $uploadfile_kp = $uploaddir.$filename_kp;
            //         $ext = pathinfo($filename_kp, PATHINFO_EXTENSION); 
            //     if(move_uploaded_file($_FILES['file_key_point']['tmp_name'][$key_kp],$uploadfile_kp)) {
            //         $image_name_kp= $filename_kp;
            //         $this->model->insertData('template_key_point_file_custom',array('template_id'=>$id,'lead_id'=>$leadID,'image_name'=>$image_name_kp)); 
            //         }
            // } 
            // }

            if (!empty($_FILES['file_key_point']['name'])) {
                $uploadedFileNames = [];  // To track newly uploaded file names
                $q3="select * from template_key_point_file_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
                $existingFiles = $this->model->getSqlData($q3);
              //  $existingFiles = $this->model->getData('template_key_point_file_custom', array('template_id' => $id));
                
                $existingFileNames = array_column($existingFiles, 'image_name');  // Extract just the file names
        
                
                foreach ($_FILES['file_key_point']['name'] as $key => $fileName) {
                    // Check if a new file is uploaded
                    if (!empty($fileName)) {
                        $uploaddir = 'uploads/template/';
                        $newFileName = rand() . basename($fileName);  // Generate unique file name
                        $uploadfile = $uploaddir . $newFileName;
            
                        if (move_uploaded_file($_FILES['file_key_point']['tmp_name'][$key], $uploadfile)) {
                            // Save the new file name in the database
                            $this->model->insertData('template_key_point_file_custom', [
                                'template_id' => $id,
                                'image_name'  => $fileName,
                                'lead_id'=>$leadID,
                                'lead_proposal_id'=>$postData['lead_proposal_id']
                            ]);
            
                            $uploadedFileNames[] = $fileName;  // Track uploaded file
                        }
                    } else {
                        // No new file uploaded, use the existing one
                        $uploadedFileNames[] = $existingFileNamesC[$key] ?? '';  // Keep the existing file name
                    }
                }
               
            
                // Delete files that are in the database but not in the new upload
                $filesToDelete = array_diff($existingFileNames, $uploadedFileNames);
            
                foreach ($filesToDelete as $fileToDelete) {
                    // Delete from database
                    $this->model->deleteData('template_key_point_file_custom', array('template_id' => $id,'lead_id'=>$leadID, 'image_name' => $fileToDelete));
                    
                    // Optionally delete the physical file
                    $filePath = 'uploads/template/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }


            /*========================[ file commercial ]==========================*/ 
            // if(!empty($_FILES['file_commercial']['name']))
            // {
            //     foreach ($_FILES['file_commercial']['name'] as $key_c => $value) {
            //         $fvalue_c=$_FILES['file_commercial']['name'][$key_c];
            //         $uploaddir = 'uploads/template/';
            //         $filename_c = rand().basename($fvalue_c);
            //         $uploadfile_c = $uploaddir.$filename_c;
            //         $ext = pathinfo($filename_c, PATHINFO_EXTENSION); 
            //     if(move_uploaded_file($_FILES['file_commercial']['tmp_name'][$key_c],$uploadfile_c)) {
            //         $image_name_c= $filename_c;
            //         $this->model->insertData('template_commercial_file_custom',array('template_id'=>$id,'lead_id'=>$leadID,'image_name'=>$image_name_c)); 
            //         }
            // } 
            // }

            if (!empty($_FILES['file_commercial']['name'])) {
      
                $uploadedFileNames = [];  // To track newly uploaded file names
                $q4="select * from template_commercial_file_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
                $existingComFiles = $this->model->getSqlData($q4);
              //  $existingComFiles = $this->model->getData('template_commercial_file_custom', array('template_id' => $id));
               // echo"exsist1"; echo"<pre>"; print_r($existingComFiles);
                $existingComFileNames = array_column($existingComFiles, 'image_name');  // Extract just the file names
        
                
                foreach ($_FILES['file_commercial']['name'] as $key => $fileName) {
                    // Check if a new file is uploaded
                    if (!empty($fileName)) {
                        $uploaddir = 'uploads/template/';
                        $newFileName = rand() . basename($fileName);  // Generate unique file name
                        $uploadfile = $uploaddir . $newFileName;
            
                        if (move_uploaded_file($_FILES['file_commercial']['tmp_name'][$key], $uploadfile)) {
                            // Save the new file name in the database
                            $this->model->insertData('template_commercial_file_custom', [
                                'template_id' => $id,
                                'image_name'  => $fileName,
                                'lead_id'=>$leadID,
                                'lead_proposal_id'=>$postData['lead_proposal_id']
                            ]);
            
                            $uploadedFileNames[] = $fileName;  // Track uploaded file
                        }
                    } else {
                        // No new file uploaded, use the existing one
                        $uploadedFileNames[] =  $existingCom[$key] ?? '';  // Keep the existing file name
                    }
                }
            //     echo"exist tc"; echo"<pre/>"; print_r($existingCom);
            //    echo"upload"; echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingComFileNames);die;
            //     // Delete files that are in the database but not in the new upload
                $filesToDelete = array_diff($existingComFileNames, $uploadedFileNames);
            
                foreach ($filesToDelete as $fileToDelete) {
                    // Delete from database
                    $this->model->deleteData('template_commercial_file_custom', array('template_id' => $id,'lead_id'=>$leadID, 'image_name' => $fileToDelete));
                    
                    // Optionally delete the physical file
                    $filePath = 'uploads/template/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }
           

        
            /*========================[ file term and condition ]==========================*/ 
            // if(!empty($_FILES['file_term_and_condition']['name']))
            // {
            //     foreach ($_FILES['file_term_and_condition']['name'] as $key_tc => $value) {
            //         $fvalue_tc=$_FILES['file_term_and_condition']['name'][$key_tc];
            //         $uploaddir = 'uploads/template/';
            //         $filename_tc = rand().basename($fvalue_tc);
            //         $uploadfile_tc = $uploaddir.$filename_tc;
            //         $ext = pathinfo($filename_tc, PATHINFO_EXTENSION); 
            //     if(move_uploaded_file($_FILES['file_term_and_condition']['tmp_name'][$key_tc],$uploadfile_tc)) {
            //         $image_name_tc= $filename_tc;
            //         $this->model->insertData('template_term_and_condition_file_custom',array('template_id'=>$id,'lead_id'=>$leadID,'image_name'=>$image_name_tc)); 
            //         }
            // } 
            // }

            if (!empty($_FILES['file_term_condition']['name'])) {
      
                $uploadedFileNames = [];  // To track newly uploaded file names
                $q5="select * from template_term_and_condition_file_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
                $existingTCFiles = $this->model->getSqlData($q5);
               // $existingTCFiles = $this->model->getData('template_term_and_condition_file_custom', array('template_id' => $id));
                
                $existingTCFileNames = array_column($existingTCFiles, 'image_name');  // Extract just the file names
        
                
                foreach ($_FILES['file_term_condition']['name'] as $key => $fileName) {
                    // Check if a new file is uploaded
                    if (!empty($fileName)) {
                        $uploaddir = 'uploads/template/';
                        $newFileName = rand() . basename($fileName);  // Generate unique file name
                        $uploadfile = $uploaddir . $newFileName;
            
                        if (move_uploaded_file($_FILES['file_term_condition']['tmp_name'][$key], $uploadfile)) {
                            // Save the new file name in the database
                            $this->model->insertData('template_term_and_condition_file_custom', [
                                'template_id' => $id,
                                'image_name'  => $fileName,
                                'lead_id'=>$leadID,
                                'lead_proposal_id'=>$postData['lead_proposal_id']
                            ]);
            
                            $uploadedFileNames[] = $fileName;  // Track uploaded file
                        }
                    } else {
                        // No new file uploaded, use the existing one
                        $uploadedFileNames[] =  $existingTC[$key] ?? '';  // Keep the existing file name
                    }
                }
            //     echo"exist tc"; echo"<pre/>";print_r($existinfTC);
            //    echo"upload";echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingTCFileNames);die;
                // Delete files that are in the database but not in the new upload
                $filesToDelete = array_diff($existingTCFileNames, $uploadedFileNames);
            
                foreach ($filesToDelete as $fileToDelete) {
                    // Delete from database
                    $this->model->deleteData('template_term_and_condition_file_custom', array('template_id' => $id,'lead_id'=>$leadID, 'image_name' => $fileToDelete));
                    
                    // Optionally delete the physical file
                    $filePath = 'uploads/template/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

            /*========================[ file attchment ]==========================*/ 
            // if(!empty($_FILES['file_attchment']['name']))
            // {
            //     foreach ($_FILES['file_attchment']['name'] as $key_af => $value_af) {
            //         $fvalue_af=$_FILES['file_attchment']['name'][$key_af];
            //         $uploaddir = 'uploads/template/';
            //         $filename_af = rand().basename($fvalue_af);
            //         $uploadfile_af = $uploaddir.$filename_af;
            //         $ext = pathinfo($filename_af, PATHINFO_EXTENSION); 
            //     if(move_uploaded_file($_FILES['file_attchment']['tmp_name'][$key_af],$uploadfile_af)) {
            //         $image_name_af= $filename_af;
            //         if(isset($_POST['file_type']))
            //         {
            //             $file_type=$_POST['file_type'][$key_af];
            //         }else{
            //             $file_type='';
            //         }
                
            //         $this->model->insertData('template_attchment_file_custom ',array('template_id'=>$id,'lead_id'=>$leadID,'image_name'=>$image_name_af,'file_type'=>$file_type)); 
            //         }
            // } 
            // }   
            
            if (!empty($_FILES['file_attachment']['name'])) {
      
                $uploadedFileNames = [];  // To track newly uploaded file names
                $q6="select * from template_attchment_file_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
                $existingAFiles = $this->model->getSqlData($q6);
               // $existingAFiles = $this->model->getData('template_attchment_file_custom', array('template_id' => $id));
                
                $existingAFileNames = array_column($existingAFiles, 'image_name');  // Extract just the file names
        
                
                foreach ($_FILES['file_attachment']['name'] as $key => $fileName) {
                    // Check if a new file is uploaded
                    if (!empty($fileName)) {
                        $uploaddir = 'uploads/template/';
                        $newFileName = rand() . basename($fileName);  // Generate unique file name
                        $uploadfile = $uploaddir . $newFileName;
            
                        if (move_uploaded_file($_FILES['file_attachment']['tmp_name'][$key], $uploadfile)) {
                            // Save the new file name in the database
                            $this->model->insertData('template_attchment_file_custom', [
                                'template_id' => $id,
                                'image_name'  => $fileName,
                                'lead_id'=>$leadID,
                                'lead_proposal_id'=>$postData['lead_proposal_id']

                            ]);
            
                            $uploadedFileNames[] = $fileName;  // Track uploaded file
                        }
                    } else {
                        // No new file uploaded, use the existing one
                        $uploadedFileNames[] = $existingFileNamesA[$key] ?? '';  // Keep the existing file name
                    }
                }
               
                // Delete files that are in the database but not in the new upload
                $filesToDelete = array_diff($existingAFileNames, $uploadedFileNames);
            
                foreach ($filesToDelete as $fileToDelete) {
                    // Delete from database
                    $this->model->deleteData('template_attchment_file_custom', array('template_id' => $id,'lead_id'=>$leadID, 'image_name' => $fileToDelete));
                    
                    // Optionally delete the physical file
                    $filePath = 'uploads/template/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

             /*========================[ signature attchment ]==========================*/ 

            
             if (!empty($_FILES['signature_file']['name'])) {
    
                $uploadedFileNames = [];  // To track newly uploaded file names
                $q7="select * from template_signature_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
                $existingAFiles = $this->model->getSqlData($q7);
               
                $existingAFileNames = array_column($existingAFiles, 'signature_file');  // Extract just the file names
      
                
               
                    $fileName=$_FILES['signature_file']['name'];
                   
                    if (!empty($fileName)) { 
                        $uploaddir = 'uploads/template/';
                        $newFileName = rand() . basename($fileName);  // Generate unique file name
                        $uploadfile = $uploaddir . $newFileName;
            
                        if (move_uploaded_file($_FILES['signature_file']['tmp_name'], $uploadfile)) {
                            // Save the new file name in the database
                          
                            $this->model->insertData('template_signature_custom', [
                                'template_id' => $id,
                                'signature_file'  => $fileName,
                                'lead_id'=>$leadID,
                                'lead_proposal_id'=>$postData['lead_proposal_id']

                            ]);
            
                            $uploadedFileNames[] = $fileName;  // Track uploaded file
                        }
                    } else {
                        // No new file uploaded, use the existing one
                        $uploadedFileNames[] =  $existingSign?? '';  // Keep the existing file name
                    }
               // }
               
                // Delete files that are in the database but not in the new upload
                $filesToDelete = array_diff($existingAFileNames, $uploadedFileNames);
            
                foreach ($filesToDelete as $fileToDelete) {
                    // Delete from database
                    $this->model->deleteData('template_signature_custom', array('template_id' => $id,'lead_id'=>$leadID, 'signature_file' => $fileToDelete));
                    
                    // Optionally delete the physical file
                    $filePath = 'uploads/template/' . $fileToDelete;
                    if (file_exists($filePath)) {
                        unlink($filePath);
                    }
                }
            }

    

            /*========================[ stamp attchment ]==========================*/ 
           // echo"<pre>"; print_r($_FILES['stamp_file']);die;
           if (!empty($_FILES['stamp_file']['name'])) {
   
            $uploadedFileNames = [];  // To track newly uploaded file names
            $q7="select * from template_stamp_custom where template_id='".$id."' and lead_id='".$leadID."' and lead_proposal_id='".$postData['lead_proposal_id']."'";
            $existingAFiles = $this->model->getSqlData($q7);
           
            $existingAFileNames = array_column($existingAFiles, 'stamp_file');  // Extract just the file names
  
            
           
                $fileName=$_FILES['stamp_file']['name'];
               
                if (!empty($fileName)) { 
                    $uploaddir = 'uploads/template/';
                    $newFileName = rand() . basename($fileName);  // Generate unique file name
                    $uploadfile = $uploaddir . $newFileName;
        
                    if (move_uploaded_file($_FILES['stamp_file']['tmp_name'], $uploadfile)) {
                        // Save the new file name in the database
                    
                        $this->model->insertData('template_stamp_custom', [
                            'template_id' => $id,
                            'stamp_file'  => $fileName,
                            'lead_id'=>$leadID,
                            'lead_proposal_id'=>$postData['lead_proposal_id']

                        ]);
        
                        $uploadedFileNames[] = $fileName;  // Track uploaded file
                    }
                } else {
                    // No new file uploaded, use the existing one
                    $uploadedFileNames[] =  $existingStamp?? '';  // Keep the existing file name
                }
           // }
           
            // Delete files that are in the database but not in the new upload
            $filesToDelete = array_diff($existingAFileNames, $uploadedFileNames);
        
            foreach ($filesToDelete as $fileToDelete) {
                // Delete from database
                $this->model->deleteData('template_stamp_custom', array('template_id' => $id,'lead_id'=>$leadID, 'stamp_file' => $fileToDelete));
                
                // Optionally delete the physical file
                $filePath = 'uploads/template/' . $fileToDelete;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }
       // die;
            
            $msg='Template Details Updated Saved Successfully.';
            $this->session->set_flashdata('msg', 'Template Details Updated Saved Successfully.');
        }
        else
        {
            $msg='Template Details Updated Failed.';
            $this->session->set_flashdata('msg', 'Template Details Updated Failed.');
        }

        echo "<script>
         alert('$msg'); // Show the message in an alert box
            window.close();
            if (window.opener) {
                window.opener.focus();
            }
          </script>";
    //exit;
         
       // redirect('update-template-proposal');

        }

        function save_lead_praposals($id)
    {
        $postData = $_POST; 
     //   echo $id;echo "deencode";echo base64_decode($id);die;

        $postData['lead_id'] = $id; 
        $id_encode=base64_encode($id);
        //echo 
        unset($postData['lead_proposal_id']);
        unset($postData['calTotal']);

    // //    $sql="select * from template_custom where lead_id='".$postData['id']."' and template_id='".$postData['template_id']."'";
    // //     $tempDtl=$this->model->getSqlData($sql);
    //     $temDtl =$this->model->getSqlData("select * from template_custom where lead_id='".$postData['lead_id']."' and template_id='".$postData['template_id']."'");
    //   // echo"<pre>"; print_r($tempDtl);
    //        if(!empty($temDtl))
    //        {
    //        // echo"find ddata";
    //         $postData['custom_template_id']=$temDtl[0]['t_id'];
    //        }
    //        else
    //        {
    //         $postData['custom_template_id']='';
    //        }
    //      //  echo "<pre>"; print_r($temDtl); print_r($postData); die;
    //    // if($this->model->insertData('lead_praposals',$postData))


        $this->db->insert('lead_praposals', $postData);

        $inserted_id = $this->db->insert_id(); 

        $cust_template=$this->model->getSqlData("select * from template where template_id='".$postData['template_id']."'")[0];
        $cust_template['lead_proposal_id']=$inserted_id;
        $cust_template['lead_id']=$id;
        $cust_template['created_date'] = date('Y-m-d H:i:s');
       
        $this->db->insert('template_custom', $cust_template);

        $cust_inserted_id = $this->db->insert_id(); 

        $cust_covering=$this->model->getData('template_covering_file',array('template_id'=>$postData['template_id']));
        if(!empty($cust_covering))
        {
            foreach ($cust_covering as $covering) {
                // Prepare data for insertion into 'filecovering_custom'
                $filecoveringData = [
                    'template_id'      => $covering['template_id'],
                    'lead_id'=>$postData['lead_id'],
                    'lead_proposal_id'=>$inserted_id,
                    'image_name'        => $covering['image_name'],
                     'created_date'     => date('Y-m-d H:i:s'), 
                ];
        
                // Insert into 'filecovering_custom' table
                $this->model->insertData('template_covering_file_custom', $filecoveringData);
            }
        }

        $cust_overview=$this->model->getData('template_over_view_project_file',array('template_id'=>$postData['template_id']));
        if(!empty($cust_overview))
        {
            foreach ($cust_overview as $overview) {
                // Prepare data for insertion into 'filecovering_custom'
                $filecoveringData = [
                    'template_id'      => $overview['template_id'],
                    'lead_id'=>$postData['lead_id'],
                    'lead_proposal_id'=>$inserted_id,
                    'image_name'        => $overview['image_name'],
                     'created_date'     => date('Y-m-d H:i:s'), 
                ];
        
                // Insert into 'filecovering_custom' table
                $this->model->insertData('template_over_view_project_file_custom', $filecoveringData);
            }
        }

        $cust_keypoint=$this->model->getData('template_key_point_file',array('template_id'=>$postData['template_id']));
        if(!empty( $cust_keypoint))
        {
            foreach ($cust_keypoint as $kp) {
                // Prepare data for insertion into 'filecovering_custom'
                $filecoveringData = [
                    'template_id'      => $kp['template_id'],
                    'lead_id'=>$postData['lead_id'],
                    'lead_proposal_id'=>$inserted_id,
                    'image_name'        => $kp['image_name'],
                     'created_date'     => date('Y-m-d H:i:s'), 
                ];
        
                // Insert into 'filecovering_custom' table
                $this->model->insertData('template_key_point_file_custom', $filecoveringData);
            }
        }

        $cust_commercial=$this->model->getData('template_commercial_file',array('template_id'=>$postData['template_id']));
        if(!empty($cust_commercial))
        {
            foreach ($cust_commercial as $comm) {
                // Prepare data for insertion into 'filecovering_custom'
                $filecoveringData = [
                    'template_id'      => $comm['template_id'],
                    'lead_id'=>$postData['lead_id'],
                    'lead_proposal_id'=>$inserted_id,
                    'image_name'        => $comm['image_name'],
                     'created_date'     => date('Y-m-d H:i:s'), 
                ];
        
                // Insert into 'filecovering_custom' table
                $this->model->insertData('template_commercial_file_custom', $filecoveringData);
            }
        }

        $cust_tandc=$this->model->getData('template_term_and_condition_file',array('template_id'=>$postData['template_id']));
        if(!empty($cust_commercial))
        {
            foreach ($cust_tandc as $tc) {
                // Prepare data for insertion into 'filecovering_custom'
                $filecoveringData = [
                    'template_id'      => $tc['template_id'],
                    'lead_id'=>$postData['lead_id'],
                    'lead_proposal_id'=>$inserted_id,
                    'image_name'        => $tc['image_name'],
                     'created_date'     => date('Y-m-d H:i:s'), 
                ];
        
                // Insert into 'filecovering_custom' table
                $this->model->insertData('template_term_and_condition_file_custom', $filecoveringData);
            }
        }

        $cust_attachment=$this->model->getData('template_attchment_file',array('template_id'=>$postData['template_id']));
        if(!empty($cust_commercial))
        {
            foreach ($cust_attachment as $att) {
                // Prepare data for insertion into 'filecovering_custom'
                $filecoveringData = [
                    'template_id'      => $att['template_id'],
                    'lead_id'=>$postData['lead_id'],
                    'lead_proposal_id'=>$inserted_id,
                    'image_name'        => $att['image_name'],
                     'created_date'     => date('Y-m-d H:i:s'), 
                ];
        
                // Insert into 'filecovering_custom' table
                $this->model->insertData('template_attchment_file_custom', $filecoveringData);
            }
        }
        
        
        // echo $inserted_id; die;
        $op_user_id=$this->session->userdata('op_user_id');
        $logArray=[
         'lead_id'=>$postData['lead_id'],
         'activity_id'=>'5',
         'user_id'=>$op_user_id,
         'affected_id'=>$inserted_id,
         'action_id'=>'1',
         
        ];

        $this->db->insert('lead_log', $logArray);
        if(!empty($inserted_id))
        {
        $this->session->set_flashdata('msg', 'Lead Praposals Saved Successfully.');
      //  redirect('view-lead/'.$id);
        }else{
             $this->session->set_flashdata('msg', 'Lead Praposals Add Failed.');
       
      // redirect(base_url('view-lead/'.base64_encode($id)));
        }
        redirect('view-lead/'.$id_encode);
    }

    function edit_praposals($id){

        $data['member_list'] =$this->model->getData('op_user',array('status'=>'1')); 
        $data['customer_list'] =$this->model->getData('customer',array('status'=>'1'));
        $data['project_list'] =$this->model->getSqlData("select project_id,project_name from project");
        $data['res'] = $this->model->getData('lead_praposals',array('lp_id'=>$id))[0];
      // echo"<pre>"; print_r($data['res']); die;
       $data['states']  =$this->model->getSqlData("select * from states group by state_name order by state_name asc"); 
        $data['template_list'] =$this->model->getSqlData("select template_id,title from template where status=1");
        $data['service_list'] =$this->model->getData('product',array('status'=>'1'));
     // print_r($data['res']['related']); die;
        if($data['res']['related']==2)
        {
        $res_cust =$this->model->getSqlData("select company as customer_name from customer where cust_id='".$data['res']['lead']."'");
        if(!empty($res_cust))
            {
                   $data['res']['customer_name']=$res_cust[0]['customer_name'];
            }else{
                    $data['res']['customer_name']='';
             }
        }else{
              $res_lead =$this->model->getSqlData("select contact_fullname as customer_name from lead where lead_id='".$data['res']['lead_d']."'");
        if(!empty($res_lead))
            {
                  $data['res']['lead']=$res_lead[0]['customer_name'];
            }else{
                  $data['res']['lead']='';
             }
        }
        $data['leadDtl'] =$this->model->getSqlData("select * from lead where lead_id='".$data['res']['lead_d']."'")[0];
        $data['invoices_details'] = $this->model->getData('cart',array('session_id'=>$data['res']['invoice_number']));    
        //if(!empty($data['invoices_details']))
      //  {
           // foreach ($data['invoices_details'] as $key => $val) {
                 //$res_pro =$this->model->getSqlData("select product_name,description from product where product_id='".$val['product_id']."'");
               // if(!empty($res_pro))
                  //  {
                         //  $data['invoices_details'][$key]['product_name']=$res_pro[0]['product_name'];
                         //   $data['invoices_details'][$key]['description']=$res_pro[0]['description'];
                   // }else{
                          //  $data['invoices_details'][$key]['product_name']='';
                            // $data['invoices_details'][$key]['description']='';
                   //  } 
           // }
       // }
        //echo "<pre>";
        //print_r($data['res']); die;
        $pagename="Edit Proposal";
        $this->model->partialView('admin/lead/edit_lead_praposals',$data,$pagename);
    }

    function update_praposals($id,$lead_id)
    {
        $op_user_id=$this->session->userdata('op_user_id');
        $postData = $_POST; 
        $id_encode=base64_encode($lead_id);
        unset($postData['lead_name']);
        unset($postData['old_template_id']);
        unset($postData['calTotal']);
        //print_r($postData); die;
        //$postData['attachment']=implode(',',$_POST['attachment']);  
        $id=$this->model->updateData('lead_praposals',$postData,array('lp_id'=>$id));      
        if($id)
        {
        $this->session->set_flashdata('msg', 'Lead Praposals Updated Successfully.');
        $logArray = [
            'lead_id' => $lead_id,
            'activity_id' => '5',
            'user_id' => $op_user_id,
            'affected_id' => $id,
            'action_id' => '2',
           
        ];
        $this->db->insert('lead_log', $logArray);
       // redirect('view-lead/'.$lead_id);
        }else{
             $this->session->set_flashdata('msg', 'Lead Praposals Add Failed.');
        //redirect('view-lead/'.$lead_id);
        }
        redirect('view-lead/'.$id_encode);
    }

    function delete_praposal()
{
    $dtl=$this->model->getSqlData("select * from lead_praposals where lp_id='".$_POST['lp_id']."'")[0];

       $del = $this->model->deleteData('lead_praposals',array('lp_id'=>$_POST['lp_id']));
       $del1 = $this->model->deleteData('cart',array('session_id'=>$dtl['invoice_number']));
       
                $this->session->set_flashdata('msg', 'Lead Praposals Daleted Successfully.'); 
} 

// public function delete_item_cart() {
//     $cart_id = $this->input->post('cart_id');

//     // Check if the item exists before deletion (optional)
//     $this->db->where('cart_id', $cart_id);
//     $query = $this->db->get('cart');

//     if ($query->num_rows() > 0) {
//         // Delete the item
//         $this->db->where('cart_id', $cart_id);
//         $this->db->delete('cart');

//         // Fetch updated totals after deletion
//         $invoice_number = $query->row()->invoice_number;  // Assuming you have invoice_number linked
//         $updated_items = $this->db->get_where('cart', ['session_id' => $invoice_number])->result();

//         $sub_total_amount = 0;
//         $total_gst = 0;
//         $total_amount = 0;

//         foreach ($updated_items as $item) {
//             $sub_total_amount += $item->amount;
//             $total_gst += $item->gst_amount;  // Assuming you have a gst_amount column
//         }

//         $total_amount = $sub_total_amount + $total_gst;

//         echo json_encode([
//             'success' => true,
//             'sub_total_amount' => $sub_total_amount,
//             'totalgst' => $total_gst,
//             'total_amount' => $total_amount
//         ]);
//     } else {
//         echo json_encode(['success' => false, 'message' => 'Item not found.']);
//     }
// }

public function delete_item_cart() {
    // Get cart_id from POST data
    $cart_id = $this->input->post('cart_id');

    $cartDtl=$this->model->getData("cart",array('cart_id'=>$cart_id));
    //echo"<pre>"; print_r($cartDtl); die;
    $invoice_number=$cartDtl[0]['session_id'];
     $this->model->deleteData('cart',array('cart_id'=>$cart_id));
    // Check if the item exists in the cart
    $AvlCartDtl=$this->model->getData("cart",array('session_id'=>$invoice_number));
    $sub_total_amount = 0;
    $total_gst = 0;
    $total_amount = 0;
    //echo"<pre>"; print_r($AvlCartDtl);
    if(!empty($AvlCartDtl))
    {
        foreach ($AvlCartDtl as $item) {
            $sub_total_amount += $item['subtotal'];  // Assuming 'amount' holds the product price
            $total_gst += $item['total_gst'];     // Assuming 'gst_amount' holds the GST value for the product
        }
    
   // echo $sub_total_amount;
   // echo $total_gst;
        // Total amount includes both sub total and GST
        $total_amount = $sub_total_amount + $total_gst;
//echo $total_amount;
        // Return the updated totals and success status as JSON
        echo json_encode([
            'success' => true,
            'sub_total_amount' => number_format($sub_total_amount, 2),
            'totalgst' => number_format($total_gst, 2),
            'total_amount' => number_format($total_amount, 2),
            'cart_items' => $AvlCartDtl // Return the updated cart items to refresh the frontend table
        ]);
    } else {
        // Item not found, return an error message
        echo json_encode(['success' => false, 'message' => 'Item not found.']);
    }
}

function status_template($id,$status){
    $this->model->updateData('template',array('status'=>$status),array('template_id'=>$id)); 
    $this->session->set_flashdata('msg', 'Template Status Update Successfully.');
    redirect('list-template');
}

function editMastertemplate($id){
    $id=base64_decode($id);
     // echo $id;die;  
    $data['res'] = $this->model->getData('template',array('template_id'=>$id))[0];

    $data['attchment_file'] =$this->model->getSqlData("select temp_cf_id,image_name,file_type from template_attchment_file where template_id='".$data['res']['template_id']."'");
    $data['commercial_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_commercial_file where template_id='".$data['res']['template_id']."'");

    $data['covering_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_covering_file where template_id='".$data['res']['template_id']."'");

    $data['key_point_file'] =$this->model->getSqlData("select temp_kpf_id,image_name from template_key_point_file where template_id='".$data['res']['template_id']."'");

     $data['over_view_project_file'] =$this->model->getSqlData("select temp_ovpf_id,image_name from template_over_view_project_file where template_id='".$data['res']['template_id']."'");

    $data['term_and_condition_file'] =$this->model->getSqlData("select temp_cf_id,image_name from template_term_and_condition_file where template_id='".$data['res']['template_id']."'");
    $data['signature_file'] =$this->model->getSqlData("select sig_id,signature_file from template_signature where template_id='".$data['res']['template_id']."'  ");
        $data['stamp_file'] =$this->model->getSqlData("select stp_id,stamp_file from template_stamp where template_id='".$data['res']['template_id']."' ");
      
$pagename="edit template";
    $this->model->partialView('admin/template/edit_master_template',$data,$pagename);
}

function updateMastertemplate($id){
    $postData = $_POST;
     unset($postData['file_type']); 
     $existingFileNamesC = $_POST['existing_file_key_point'] ?? [];  // Existing files from the form
        unset($postData['existing_file_key_point']);
        $existingFileNamesA = $_POST['existing_file_attachment'] ?? [];  // Existing files from the form
        unset($postData['existing_file_attachment']);
        $existingTC = $_POST['existing_file_tc'] ?? [];  // Existing files from the form
        unset($postData['existing_file_tc']);
        $existingCom = $_POST['existing_file_comercial'] ?? [];  // Existing files from the form
       // print_r($existingCom);
        unset($postData['existing_file_comercial']);
        $existingOV = $_POST['existing_file_ov'] ?? [];  // Existing files from the form
        unset($postData['existing_file_ov']);
        $existingCov = $_POST['existing_file_cov'] ?? [];  // Existing files from the form
        unset($postData['existing_file_cov']);
        $existingSign = $_POST['existing_signature_file'] ?? [];  // Existing files from the form
        unset($postData['existing_signature_file']);
        $existingStamp = $_POST['existing_stamp_file'] ?? [];  // Existing files from the form
        unset($postData['existing_stamp_file']);

    $this->model->updateData('template',$postData,array('template_id'=>$id)); 
     /*========================[ file covering ]==========================*/ 
    //    if(!empty($_FILES['file_covering']['name']))
    // {//echo"file found in covering";
    //     foreach ($_FILES['file_covering']['name'] as $key => $value) {
    //         $fvalue=$_FILES['file_covering']['name'][$key];
    //         $uploaddir = 'uploads/template/';
    //         $filename = rand().basename($fvalue);
    //         $uploadfile = $uploaddir.$filename;
    //          $ext = pathinfo($filename, PATHINFO_EXTENSION); 
    //       if(move_uploaded_file($_FILES['file_covering']['tmp_name'][$key],$uploadfile)) {
    //          $image_name= $filename;
    //          $this->model->insertData('template_covering_file',array('template_id'=>$id,'image_name'=>$image_name));
    //           } 
    //    } 
    // }  

    if (!empty($_FILES['file_covering']['name'])) {
      
        $uploadedFileNames = [];  // To track newly uploaded file names
        $existingCovFiles = $this->model->getData('template_covering_file', array('template_id' => $id));
       // echo"exsist1"; echo"<pre>"; print_r($existingOVFiles);
        $existingCovFileNames = array_column($existingCovFiles, 'image_name');  // Extract just the file names

        
        foreach ($_FILES['file_covering']['name'] as $key => $fileName) {
            // Check if a new file is uploaded
            if (!empty($fileName)) {
                $uploaddir = 'uploads/template/';
                $newFileName = rand() . basename($fileName);  // Generate unique file name
                $uploadfile = $uploaddir . $newFileName;
    
                if (move_uploaded_file($_FILES['file_covering']['tmp_name'][$key], $uploadfile)) {
                    // Save the new file name in the database
                    $this->model->insertData('template_covering_file', [
                        'template_id' => $id,
                        'image_name'  => $fileName
                    ]);
    
                    $uploadedFileNames[] = $fileName;  // Track uploaded file
                }
            } else {
                // No new file uploaded, use the existing one
                $uploadedFileNames[] =  $existingCov[$key] ?? '';  // Keep the existing file name
            }
        }
    //     echo"exist tc"; echo"<pre/>"; print_r($existingOV);
    //    echo"upload"; echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingOVFileNames);die;
    //     // Delete files that are in the database but not in the new upload
        $filesToDelete = array_diff($existingCovFileNames, $uploadedFileNames);
    
        foreach ($filesToDelete as $fileToDelete) {
            // Delete from database
            $this->model->deleteData('template_covering_file', array('template_id' => $id, 'image_name' => $fileToDelete));
            
            // Optionally delete the physical file
            $filePath = 'uploads/template/' . $fileToDelete;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
   

    /*========================[ file over view project ]==========================*/  
    //    if(!empty($_FILES['file_over_view_project']['name']))
    // {//echo"file found in overview";
    //     foreach ($_FILES['file_over_view_project']['name'] as $key_ovp => $value) {
    //         $fvalue_ovp=$_FILES['file_over_view_project']['name'][$key_ovp];
    //         $uploaddir = 'uploads/template/';
    //         $filename_ovp = rand().basename($fvalue_ovp);
    //         $uploadfile_ovp = $uploaddir.$filename_ovp;
    //          $ext = pathinfo($filename_ovp, PATHINFO_EXTENSION); 
    //       if(move_uploaded_file($_FILES['file_over_view_project']['tmp_name'][$key_ovp],$uploadfile_ovp)) {
    //          $image_name_ovp= $filename_ovp;
    //          $this->model->insertData('template_over_view_project_file',array('template_id'=>$id,'image_name'=>$image_name_ovp)); 
    //          }
    //    } 
    // }  

    if (!empty($_FILES['file_overview_project']['name'])) {
      
        $uploadedFileNames = [];  // To track newly uploaded file names
        $existingOVFiles = $this->model->getData('template_over_view_project_file', array('template_id' => $id));
       // echo"exsist1"; echo"<pre>"; print_r($existingOVFiles);
        $existingOVFileNames = array_column($existingOVFiles, 'image_name');  // Extract just the file names

        
        foreach ($_FILES['file_overview_project']['name'] as $key => $fileName) {
            // Check if a new file is uploaded
            if (!empty($fileName)) {
                $uploaddir = 'uploads/template/';
                $newFileName = rand() . basename($fileName);  // Generate unique file name
                $uploadfile = $uploaddir . $newFileName;
    
                if (move_uploaded_file($_FILES['file_overview_project']['tmp_name'][$key], $uploadfile)) {
                    // Save the new file name in the database
                    $this->model->insertData('template_over_view_project_file', [
                        'template_id' => $id,
                        'image_name'  => $fileName
                    ]);
    
                    $uploadedFileNames[] = $fileName;  // Track uploaded file
                }
            } else {
                // No new file uploaded, use the existing one
                $uploadedFileNames[] =  $existingOV[$key] ?? '';  // Keep the existing file name
            }
        }
    //     echo"exist tc"; echo"<pre/>"; print_r($existingOV);
    //    echo"upload"; echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingOVFileNames);die;
    //     // Delete files that are in the database but not in the new upload
        $filesToDelete = array_diff($existingOVFileNames, $uploadedFileNames);
    
        foreach ($filesToDelete as $fileToDelete) {
            // Delete from database
            $this->model->deleteData('template_over_view_project_file', array('template_id' => $id, 'image_name' => $fileToDelete));
            
            // Optionally delete the physical file
            $filePath = 'uploads/template/' . $fileToDelete;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
   

    /*========================[ file key point ]==========================*/ 
    //    if(!empty($_FILES['file_key_point']['name']))
    // {
    //    // echo"file found in keypoint";
    //     foreach ($_FILES['file_key_point']['name'] as $key_kp => $value) {
    //         $fvalue_kp=$_FILES['file_key_point']['name'][$key_kp];
    //         $uploaddir = 'uploads/template/';
    //         $filename_kp = rand().basename($fvalue_kp);
    //         $uploadfile_kp = $uploaddir.$filename_kp;
    //          $ext = pathinfo($filename_kp, PATHINFO_EXTENSION); 
    //       if(move_uploaded_file($_FILES['file_key_point']['tmp_name'][$key_kp],$uploadfile_kp)) {
    //          $image_name_kp= $filename_kp;
    //          $this->model->insertData('template_key_point_file',array('template_id'=>$id,'image_name'=>$image_name_kp)); 
    //           }
    //    } 
    // }

    if (!empty($_FILES['file_key_point']['name'])) {
        $uploadedFileNames = [];  // To track newly uploaded file names
        $existingFiles = $this->model->getData('template_key_point_file', array('template_id' => $id));
        
        $existingFileNames = array_column($existingFiles, 'image_name');  // Extract just the file names

        
        foreach ($_FILES['file_key_point']['name'] as $key => $fileName) {
            // Check if a new file is uploaded
            if (!empty($fileName)) {
                $uploaddir = 'uploads/template/';
                $newFileName = rand() . basename($fileName);  // Generate unique file name
                $uploadfile = $uploaddir . $newFileName;
    
                if (move_uploaded_file($_FILES['file_key_point']['tmp_name'][$key], $uploadfile)) {
                    // Save the new file name in the database
                    $this->model->insertData('template_key_point_file', [
                        'template_id' => $id,
                        'image_name'  => $fileName
                    ]);
    
                    $uploadedFileNames[] = $fileName;  // Track uploaded file
                }
            } else {
                // No new file uploaded, use the existing one
                $uploadedFileNames[] = $existingFileNamesC[$key] ?? '';  // Keep the existing file name
            }
        }
       
    
        // Delete files that are in the database but not in the new upload
        $filesToDelete = array_diff($existingFileNames, $uploadedFileNames);
    
        foreach ($filesToDelete as $fileToDelete) {
            // Delete from database
            $this->model->deleteData('template_key_point_file', array('template_id' => $id, 'image_name' => $fileToDelete));
            
            // Optionally delete the physical file
            $filePath = 'uploads/template/' . $fileToDelete;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
    

    /*========================[ file commercial ]==========================*/ 
    //    if(!empty($_FILES['file_commercial']['name']))
    // {
    //     //echo"file found in commercial";
    //     foreach ($_FILES['file_commercial']['name'] as $key_c => $value) {
    //         $fvalue_c=$_FILES['file_commercial']['name'][$key_c];
    //         $uploaddir = 'uploads/template/';
    //         $filename_c = rand().basename($fvalue_c);
    //         $uploadfile_c = $uploaddir.$filename_c;
    //          $ext = pathinfo($filename_c, PATHINFO_EXTENSION); 
    //       if(move_uploaded_file($_FILES['file_commercial']['tmp_name'][$key_c],$uploadfile_c)) {
    //          $image_name_c= $filename_c;
    //          $this->model->insertData('template_commercial_file',array('template_id'=>$id,'image_name'=>$image_name_c)); 
    //           }
    //    } 
    // }

    if (!empty($_FILES['file_commercial']['name'])) {
      
        $uploadedFileNames = [];  // To track newly uploaded file names
        $existingComFiles = $this->model->getData('template_commercial_file', array('template_id' => $id));
       // echo"exsist1"; echo"<pre>"; print_r($existingComFiles);
        $existingComFileNames = array_column($existingComFiles, 'image_name');  // Extract just the file names

        
        foreach ($_FILES['file_commercial']['name'] as $key => $fileName) {
            // Check if a new file is uploaded
            if (!empty($fileName)) {
                $uploaddir = 'uploads/template/';
                $newFileName = rand() . basename($fileName);  // Generate unique file name
                $uploadfile = $uploaddir . $newFileName;
    
                if (move_uploaded_file($_FILES['file_commercial']['tmp_name'][$key], $uploadfile)) {
                    // Save the new file name in the database
                    $this->model->insertData('template_commercial_file', [
                        'template_id' => $id,
                        'image_name'  => $fileName
                    ]);
    
                    $uploadedFileNames[] = $fileName;  // Track uploaded file
                }
            } else {
                // No new file uploaded, use the existing one
                $uploadedFileNames[] =  $existingCom[$key] ?? '';  // Keep the existing file name
            }
        }
    //     echo"exist tc"; echo"<pre/>"; print_r($existingCom);
    //    echo"upload"; echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingComFileNames);die;
    //     // Delete files that are in the database but not in the new upload
        $filesToDelete = array_diff($existingComFileNames, $uploadedFileNames);
    
        foreach ($filesToDelete as $fileToDelete) {
            // Delete from database
            $this->model->deleteData('template_commercial_file', array('template_id' => $id, 'image_name' => $fileToDelete));
            
            // Optionally delete the physical file
            $filePath = 'uploads/template/' . $fileToDelete;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
   
  
    /*========================[ file term and condition ]==========================*/ 
    //    if(!empty($_FILES['file_term_and_condition']['name']))
    // {
    //     //echo"file found in t and c";
    //     foreach ($_FILES['file_term_and_condition']['name'] as $key_tc => $value) {
    //         $fvalue_tc=$_FILES['file_term_and_condition']['name'][$key_tc];
    //         $uploaddir = 'uploads/template/';
    //         $filename_tc = rand().basename($fvalue_tc);
    //         $uploadfile_tc = $uploaddir.$filename_tc;
    //          $ext = pathinfo($filename_tc, PATHINFO_EXTENSION); 
    //       if(move_uploaded_file($_FILES['file_term_and_condition']['tmp_name'][$key_tc],$uploadfile_tc)) {
    //          $image_name_tc= $filename_tc;
    //          $this->model->insertData('template_term_and_condition_file',array('template_id'=>$id,'image_name'=>$image_name_tc)); 
    //           }
    //    } 
    // }

    if (!empty($_FILES['file_term_condition']['name'])) {
      
        $uploadedFileNames = [];  // To track newly uploaded file names
        $existingTCFiles = $this->model->getData('template_term_and_condition_file', array('template_id' => $id));
        
        $existingTCFileNames = array_column($existingTCFiles, 'image_name');  // Extract just the file names

        
        foreach ($_FILES['file_term_condition']['name'] as $key => $fileName) {
            // Check if a new file is uploaded
            if (!empty($fileName)) {
                $uploaddir = 'uploads/template/';
                $newFileName = rand() . basename($fileName);  // Generate unique file name
                $uploadfile = $uploaddir . $newFileName;
    
                if (move_uploaded_file($_FILES['file_term_condition']['tmp_name'][$key], $uploadfile)) {
                    // Save the new file name in the database
                    $this->model->insertData('template_term_and_condition_file', [
                        'template_id' => $id,
                        'image_name'  => $fileName
                    ]);
    
                    $uploadedFileNames[] = $fileName;  // Track uploaded file
                }
            } else {
                // No new file uploaded, use the existing one
                $uploadedFileNames[] =  $existingTC[$key] ?? '';  // Keep the existing file name
            }
        }
    //     echo"exist tc"; echo"<pre/>";print_r($existinfTC);
    //    echo"upload";echo"<pre>"; print_r($uploadedFileNames); echo"exist";echo"<pre>";print_r($existingTCFileNames);die;
        // Delete files that are in the database but not in the new upload
        $filesToDelete = array_diff($existingTCFileNames, $uploadedFileNames);
    
        foreach ($filesToDelete as $fileToDelete) {
            // Delete from database
            $this->model->deleteData('template_term_and_condition_file', array('template_id' => $id, 'image_name' => $fileToDelete));
            
            // Optionally delete the physical file
            $filePath = 'uploads/template/' . $fileToDelete;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
   

    /*========================[ file attchment ]==========================*/ 
      // if(!empty($_FILES['file_attchment']['name']))
    // {
    //   //  echo"file found in attachment";
    //     foreach ($_FILES['file_attchment']['name'] as $key_af => $value_af) {
    //         $fvalue_af=$_FILES['file_attchment']['name'][$key_af];
    //         $uploaddir = 'uploads/template/';
    //         $filename_af = rand().basename($fvalue_af);
    //         $uploadfile_af = $uploaddir.$filename_af;
    //          $ext = pathinfo($filename_af, PATHINFO_EXTENSION); 
    //       if(move_uploaded_file($_FILES['file_attchment']['tmp_name'][$key_af],$uploadfile_af)) {
    //          $image_name_af= $filename_af;
    //          if(isset($_POST['file_type']))
    //          {
    //             $file_type=$_POST['file_type'][$key_af];
    //           }else{
    //             $file_type='';
    //           }
           
    //          $this->model->insertData('template_attchment_file',array('template_id'=>$id,'image_name'=>$image_name_af,'file_type'=>$file_type)); 
    //          }
    //    } 
    // }  
    
    if (!empty($_FILES['file_attachment']['name'])) {
      
        $uploadedFileNames = [];  // To track newly uploaded file names
        $existingAFiles = $this->model->getData('template_attchment_file', array('template_id' => $id));
        
        $existingAFileNames = array_column($existingAFiles, 'image_name');  // Extract just the file names

        
        foreach ($_FILES['file_attachment']['name'] as $key => $fileName) {
            // Check if a new file is uploaded
            if (!empty($fileName)) {
                $uploaddir = 'uploads/template/';
                $newFileName = rand() . basename($fileName);  // Generate unique file name
                $uploadfile = $uploaddir . $newFileName;
    
                if (move_uploaded_file($_FILES['file_attachment']['tmp_name'][$key], $uploadfile)) {
                    // Save the new file name in the database
                    $this->model->insertData('template_attchment_file', [
                        'template_id' => $id,
                        'image_name'  => $fileName
                    ]);
    
                    $uploadedFileNames[] = $fileName;  // Track uploaded file
                }
            } else {
                // No new file uploaded, use the existing one
                $uploadedFileNames[] = $existingFileNamesA[$key] ?? '';  // Keep the existing file name
            }
        }
       
        // Delete files that are in the database but not in the new upload
        $filesToDelete = array_diff($existingAFileNames, $uploadedFileNames);
    
        foreach ($filesToDelete as $fileToDelete) {
            // Delete from database
            $this->model->deleteData('template_attchment_file', array('template_id' => $id, 'image_name' => $fileToDelete));
            
            // Optionally delete the physical file
            $filePath = 'uploads/template/' . $fileToDelete;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }
   
      /*========================[ signature attchment ]==========================*/ 

            
      if (!empty($_FILES['signature_file']['name'])) {
    
        $uploadedFileNames = [];  // To track newly uploaded file names
        $q7="select * from template_signature where template_id='".$id."'";
        $existingAFiles = $this->model->getSqlData($q7);
       
        $existingAFileNames = array_column($existingAFiles, 'signature_file');  // Extract just the file names

        
       
            $fileName=$_FILES['signature_file']['name'];
           
            if (!empty($fileName)) { 
                $uploaddir = 'uploads/template/';
                $newFileName = rand() . basename($fileName);  // Generate unique file name
                $uploadfile = $uploaddir . $newFileName;
    
                if (move_uploaded_file($_FILES['signature_file']['tmp_name'], $uploadfile)) {
                    // Save the new file name in the database
                  
                    $this->model->insertData('template_signature', [
                        'template_id' => $id,
                        'signature_file'  => $fileName,
                       

                    ]);
    
                    $uploadedFileNames[] = $fileName;  // Track uploaded file
                }
            } else {
                // No new file uploaded, use the existing one
                $uploadedFileNames[] =  $existingSign?? '';  // Keep the existing file name
            }
       // }
       
        // Delete files that are in the database but not in the new upload
        $filesToDelete = array_diff($existingAFileNames, $uploadedFileNames);
    
        foreach ($filesToDelete as $fileToDelete) {
            // Delete from database
            $this->model->deleteData('template_signature', array('template_id' => $id, 'signature_file' => $fileToDelete));
            
            // Optionally delete the physical file
            $filePath = 'uploads/template/' . $fileToDelete;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }



    /*========================[ stamp attchment ]==========================*/ 
   // echo"<pre>"; print_r($_FILES['stamp_file']);die;
   if (!empty($_FILES['stamp_file']['name'])) {

    $uploadedFileNames = [];  // To track newly uploaded file names
    $q7="select * from template_stamp where template_id='".$id."' ";
    $existingAFiles = $this->model->getSqlData($q7);
   
    $existingAFileNames = array_column($existingAFiles, 'stamp_file');  // Extract just the file names

    
   
        $fileName=$_FILES['stamp_file']['name'];
       
        if (!empty($fileName)) { 
            $uploaddir = 'uploads/template/';
            $newFileName = rand() . basename($fileName);  // Generate unique file name
            $uploadfile = $uploaddir . $newFileName;

            if (move_uploaded_file($_FILES['stamp_file']['tmp_name'], $uploadfile)) {
                // Save the new file name in the database
            
                $this->model->insertData('template_stamp', [
                    'template_id' => $id,
                    'stamp_file'  => $fileName,
                   

                ]);

                $uploadedFileNames[] = $fileName;  // Track uploaded file
            }
        } else {
            // No new file uploaded, use the existing one
            $uploadedFileNames[] =  $existingStamp?? '';  // Keep the existing file name
        }
   // }
   
    // Delete files that are in the database but not in the new upload
    $filesToDelete = array_diff($existingAFileNames, $uploadedFileNames);

    foreach ($filesToDelete as $fileToDelete) {
        // Delete from database
        $this->model->deleteData('template_stamp', array('template_id' => $id, 'stamp_file' => $fileToDelete));
        
        // Optionally delete the physical file
        $filePath = 'uploads/template/' . $fileToDelete;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
    $this->session->set_flashdata('msg', 'Template Details Update Successfully.');
    redirect('list-template');
}

function submittemplate()
    {
       $postData = $_POST;
       unset($postData['file_type']);
       $id=$this->model->insertData('template',$postData);
        if($id)
        {

        /*========================[ file covering ]==========================*/ 
           if(!empty($_FILES['file_covering']['name']))
        {
            foreach ($_FILES['file_covering']['name'] as $key => $value) {
                $fvalue=$_FILES['file_covering']['name'][$key];
                $uploaddir = 'uploads/template/';
                $filename = rand().basename($fvalue);
                $uploadfile = $uploaddir.$filename;
                 $ext = pathinfo($filename, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_covering']['tmp_name'][$key],$uploadfile)) {
                 $image_name= $filename;
                 $this->model->insertData('template_covering_file',array('template_id'=>$id,'image_name'=>$image_name));
                  } 
           } 
        }  

        /*========================[ file over view project ]==========================*/  
           if(!empty($_FILES['file_over_view_project']['name']))
        {
            foreach ($_FILES['file_over_view_project']['name'] as $key_ovp => $value) {
                $fvalue_ovp=$_FILES['file_over_view_project']['name'][$key_ovp];
                $uploaddir = 'uploads/template/';
                $filename_ovp = rand().basename($fvalue_ovp);
                $uploadfile_ovp = $uploaddir.$filename_ovp;
                 $ext = pathinfo($filename_ovp, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_over_view_project']['tmp_name'][$key_ovp],$uploadfile_ovp)) {
                 $image_name_ovp= $filename_ovp;
                 $this->model->insertData('template_over_view_project_file',array('template_id'=>$id,'image_name'=>$image_name_ovp)); 
                 }
           } 
        }  

        /*========================[ file key point ]==========================*/ 
           if(!empty($_FILES['file_key_point']['name']))
        {
            foreach ($_FILES['file_key_point']['name'] as $key_kp => $value) {
                $fvalue_kp=$_FILES['file_key_point']['name'][$key_kp];
                $uploaddir = 'uploads/template/';
                $filename_kp = rand().basename($fvalue_kp);
                $uploadfile_kp = $uploaddir.$filename_kp;
                 $ext = pathinfo($filename_kp, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_key_point']['tmp_name'][$key_kp],$uploadfile_kp)) {
                 $image_name_kp= $filename_kp;
                 $this->model->insertData('template_key_point_file',array('template_id'=>$id,'image_name'=>$image_name_kp)); 
                  }
           } 
        }

        /*========================[ file commercial ]==========================*/ 
           if(!empty($_FILES['file_commercial']['name']))
        {
            foreach ($_FILES['file_commercial']['name'] as $key_c => $value) {
                $fvalue_c=$_FILES['file_commercial']['name'][$key_c];
                $uploaddir = 'uploads/template/';
                $filename_c = rand().basename($fvalue_c);
                $uploadfile_c = $uploaddir.$filename_c;
                 $ext = pathinfo($filename_c, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_commercial']['tmp_name'][$key_c],$uploadfile_c)) {
                 $image_name_c= $filename_c;
                 $this->model->insertData('template_commercial_file',array('template_id'=>$id,'image_name'=>$image_name_c)); 
                  }
           } 
        }
      
        /*========================[ file term and condition ]==========================*/ 
           if(!empty($_FILES['file_term_and_condition']['name']))
        {
            foreach ($_FILES['file_term_and_condition']['name'] as $key_tc => $value) {
                $fvalue_tc=$_FILES['file_term_and_condition']['name'][$key_tc];
                $uploaddir = 'uploads/template/';
                $filename_tc = rand().basename($fvalue_tc);
                $uploadfile_tc = $uploaddir.$filename_tc;
                 $ext = pathinfo($filename_tc, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_term_and_condition']['tmp_name'][$key_tc],$uploadfile_tc)) {
                 $image_name_tc= $filename_tc;
                 $this->model->insertData('template_term_and_condition_file',array('template_id'=>$id,'image_name'=>$image_name_tc)); 
                  }
           } 
        }

        /*========================[ file attchment ]==========================*/ 
           if(!empty($_FILES['file_attchment']['name']))
        {
            foreach ($_FILES['file_attchment']['name'] as $key_af => $value_af) {
                $fvalue_af=$_FILES['file_attchment']['name'][$key_af];
                $uploaddir = 'uploads/template/';
                $filename_af = rand().basename($fvalue_af);
                $uploadfile_af = $uploaddir.$filename_af;
                 $ext = pathinfo($filename_af, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['file_attchment']['tmp_name'][$key_af],$uploadfile_af)) {
                 $image_name_af= $filename_af;
                 if(isset($_POST['file_type']))
                 {
                    $file_type=$_POST['file_type'][$key_af];
                  }else{
                    $file_type='';
                  }
               
                 $this->model->insertData('template_attchment_file ',array('template_id'=>$id,'image_name'=>$image_name_af,'file_type'=>$file_type)); 
                 }
           } 
        } 

        /*========================[ file signature ]==========================*/ 
        if(!empty($_FILES['signature_file']['name']))
        {
            //foreach ($_FILES['file_attchment']['name'] as $key_af => $value_af) {
                $fvalue_sf=$_FILES['signature_file']['name'];
                $uploaddir = 'uploads/template/';
                $filename_sf = rand().basename($fvalue_sf);
                $uploadfile_sf = $uploaddir.$filename_sf;
                 $ext = pathinfo($filename_sf, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['signature_file']['tmp_name'],$uploadfile_sf)) {
                 $image_name_sf= $filename_sf;
                 if(isset($_POST['file_type']))
                 {
                    $file_type=$_POST['file_type'];
                  }else{
                    $file_type='';
                  }
               
                 $this->model->insertData('template_signature ',array('template_id'=>$id,'signature_file'=>$image_name_sf)); 
                 }
          // } 
        } 
        
        /*========================[ file stamp ]==========================*/ 
        if(!empty($_FILES['stamp_file']['name']))
        {
          //  foreach ($_FILES['file_attchment']['name'] as $key_af => $value_af) {
                $fvalue_snf=$_FILES['stamp_file']['name'];
                $uploaddir = 'uploads/template/';
                $filename_snf = rand().basename($fvalue_snf);
                $uploadfile_snf = $uploaddir.$filename_snf;
                 $ext = pathinfo($filename_snf, PATHINFO_EXTENSION); 
              if(move_uploaded_file($_FILES['stamp_file']['tmp_name'],$uploadfile_snf)) {
                 $image_name_snf= $filename_snf;
                 if(isset($_POST['file_type']))
                 {
                    $file_type=$_POST['file_type'];
                  }else{
                    $file_type='';
                  }
               
                 $this->model->insertData('template_stamp ',array('template_id'=>$id,'stamp_file'=>$image_name_snf)); 
                 }
          // } 
        } 
           
        $this->session->set_flashdata('msg', 'Template Details Saved Successfully.');
        redirect('list-template');
        }else{
             $this->session->set_flashdata('msg', 'Template Add Failed.');
        redirect('add-template');
        }
    }

    function quotationfilter_data(){

        if(!empty($_POST)){
                $frm_date = isset($_POST['from_date']) ? $_POST['from_date'] : '';
                $to_date = isset($_POST['to_date']) ? $_POST['to_date'] : '';
                $lp_id = isset($_POST['lp_id']) ? $_POST['lp_id'] : '';
               // $status=$_POST['status'];
                $status = isset($_POST['status']) ? $_POST['status'] : '';
    //echo $status;
               // $data['praposals_list'] = $this->model->getFilterquatation($frm_date,$to_date,$lp_id,$status);
                //echo '<pre>';print_r($data);exit;

                $sql = "SELECT * FROM lead_praposals WHERE 1=1";

                // Apply from_date filter
                if (!empty($frm_date) && empty($to_date)) {
                    $sql .= " AND DATE(created_date) = '" . $this->db->escape_str($frm_date) . "'";
                }

                // Apply to_date filter
                if (empty($frm_date) && !empty($to_date)) {
                    $sql .= " AND DATE(created_date) = '" . $this->db->escape_str($to_date) . "'";
                }

                // Apply date range filter if both dates are present
                if (!empty($frm_date) && !empty($to_date)) {
                    $sql .= " AND DATE(created_date) BETWEEN '" . $this->db->escape_str($frm_date) . "' AND '" . $this->db->escape_str($to_date) . "'";
                }

                // Apply lp_id filter
                if (!empty($lp_id)) {
                    $sql .= " AND lp_id = '" . $this->db->escape_str($lp_id) . "'";
                }

               

                // // Apply status filter
                // if (!empty($status)) { echo"insidestatus";
                //     $sql .= " AND status = '" . $status . "'";
                // }

                // Optional: Order by date descending
                $sql .= " ORDER BY created_date DESC";
//echo $sql;die;
                // Execute the query through the model
                $data['praposals_list'] = $this->model->getSqlData($sql);

                $htmlContent = "";
                $i = 1; // Initialize the counter if not already initialized
foreach ($data['praposals_list'] as $key => $value) {
    $status = !empty($value['status']) ? 'Active' : 'Deactive';  // Added quotes around 'Active' and 'Deactive'

    $htmlContent .= "<tr>
        <td class=''>
            <div class='dropdown'>
                <button class='dropbtn'>
                    <i class='fa fa-ellipsis-v' aria-hidden='true'></i>
                </button>
                <div class='dropdown-content'>
                    <a href='" . base_url('edit-praposals/' . $value['lp_id']) . "' 
                       class='btn btn-sm btn-info waves-effect waves-light holiday'
                       style='color:white'>
                        <i class='fa fa-edit'></i> Edit
                    </a>
                    <a href='#' onclick='praposalFunctionDelete(" . $value['lp_id'] . ")'
                       class='btn btn-sm btn-info waves-effect waves-light holiday'
                       style='color:white'>
                        <i class='fa fa-trash'></i> Delete
                    </a>
                    <a href='" . base_url('view-praposals/' . $value['lp_id']) . "' 
                       class='btn btn-sm btn-info waves-effect waves-light holiday'
                       style='color:white'>
                        <i class='fa fa-eye'></i> View
                    </a>
                </div>
            </div>
        </td>
        <td>" . $i . "</td>
        <td>" . htmlspecialchars($value['subject']) . "</td>
        <td>" . htmlspecialchars($value['total_amount']) . "</td>
        <td>" . htmlspecialchars($value['date']) . "</td>
        <td>" . htmlspecialchars($value['open_till']) . "</td>
        <td>" . htmlspecialchars($value['tags']) . "</td>
        <td>" . htmlspecialchars($value['created_date']) . "</td>
        <td>" . $status . "</td>
    </tr>";
    $i++;
}
                    echo $htmlContent;exit;
            }
        }


        function save_ajax_Requirement(){
          
            $array_entity = $_POST;
            if(isset($array_entity) && !empty($array_entity)){
                $project_type = $array_entity['project_type'];
                 $res = $this->model->getData('project_type_tbl',array('project_type'=>$array_entity['project_type']));
                if(!empty($res)){
                  $data['msg'] = 'Requirement type already exist.';
                      echo json_encode($data);
                  return false;
                }
        
                $ReqPre_data =$this->model->getData("project_type_tbl",array('project_type'=>$project_type,'status'=>'1'));
                if(isset($ReqPre_data) && !empty($ReqPre_data)){
                    $data['class'] = 'danger';
                    $data['msg'] = 'Requirement type already exist.';
                }else{
                   
                   // $array_entity['store_id'] = $branch_id_session;
                    $ReqPre_id = $this->model->insertData('project_type_tbl',$array_entity);
                    if($ReqPre_id>0){
                        $data['class'] = 'success';
                        $data['msg'] = 'New requirement type has been added successfully.';
                    }else{
                        $data['class'] = 'danger';
                        $data['msg'] = 'Something went wrong while submitting requirement type.';
                    }
                }
            }else{
                $data['class'] = 'danger';
                $data['msg'] = 'Invalid lead source';
            }
             echo json_encode($data);
           // $this->session->set_flashdata($data);
            //redirect(base_url().'category');
        }

        function getRequirementlist()
{
// $branch_id_session = $this->session->userdata('map_with_id');
$req_list = $this->model->getData('project_type_tbl');?>
 
<?php

  foreach ($req_list as $k=>$value) { ?>

  <option value="<?php echo $value['pt_id ']; ?>"> <?php echo $value['project_type']; ?></option>
    <!-- <option value="<?php echo $v;?>" data-value="<?php echo $price[$k];?>"><?php echo $v;?></option> -->

<?php }

}

public function update_Leadstatus()
{
    $lead_id = $this->input->post('lead_id');
    $lead_status_id = $this->input->post('lead_status_id');

    if (!empty($lead_id) && !empty($lead_status_id)) {
        $update_data = array('lead_status_id' => $lead_status_id);
        $this->db->where('lead_id', $lead_id);
        $update = $this->db->update('lead', $update_data);

        if ($update) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    } else {
        echo json_encode(['status' => 'error']);
    }
}


public function update_Leadmode()
{
    $lead_id = $this->input->post('lead_id');
    $lead_mode_id = $this->input->post('lead_mode_id');

    if (!empty($lead_id) && !empty($lead_mode_id)) {
        $update_data = array('lead_mode_id' => $lead_mode_id);
        $this->db->where('lead_id', $lead_id);
        $update = $this->db->update('lead', $update_data);

        if ($update) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    } else {
        echo json_encode(['status' => 'error']);
    }
}

function view_praposals($id,$lead_id){
    //echo $id;die;

    //$data['member_list'] =$this->model->getData('op_user',array('status'=>'1')); 
    //$data['customer_list'] =$this->model->getData('customer',array('status'=>'1'));
    $data['res'] = $this->model->getData('lead_praposals',array('lp_id'=>$id))[0];

    //$data['states'] = $this->model->getData('states');
    // if(isset($data['res']['related']) && $data['res']['related']==2)
    //   {

        if(!empty($data['res']['lead']))
        {
            $res_cust =$this->model->getSqlData("select company as customer_name from customer where cust_id='".$data['res']['lead']."'");
            if(!empty($res_cust))
            {

              $data['res']['customer_name']=$res_cust[0]['customer_name'];
            }else{
             $data['res']['customer_name']=$data['res']['lead'];
            }
        }else{
          $data['res']['customer_name']=$data['res']['lead'];
        }
      
    //   }else{
    //     $data['res']['customer_name']=$data['res']['lead'];
    //   }
     // echo "<pre>";
      //print_r($data); die;
   
    $data['template'] =$this->model->getSqlData("select * from template_custom where template_id='". $data['res']['template_id']."' and lead_id='".$lead_id."'");

    if(!empty($data['template']))
    {
       $data['template'][0]['template_attchment_file'] = $res_cust =$this->model->getSqlData("select file_type,image_name from template_attchment_file where template_id='".$data['res']['template_id']."'");

        $data['template'][0]['template_commercial_file'] = $res_cust =$this->model->getSqlData("select image_name from template_commercial_file  where template_id='".$data['res']['template_id']."'");

         $data['template'][0]['template_covering_file '] = $res_cust =$this->model->getSqlData("select image_name from template_covering_file  where template_id='".$data['res']['template_id']."'");

          $data['template'][0]['template_key_point_file'] = $res_cust =$this->model->getSqlData("select image_name from template_key_point_file where template_id='".$data['res']['template_id']."'");

           $data['template'][0]['template_over_view_project_file'] = $res_cust =$this->model->getSqlData("select image_name from template_over_view_project_file where template_id='".$data['res']['template_id']."'");


            $data['template'][0]['template_term_and_condition_file'] = $res_cust =$this->model->getSqlData("select image_name from template_term_and_condition_file where template_id='".$data['res']['template_id']."'");
    }
    $data['service_list'] =$this->model->getData('product',array('status'=>'1'));

    $data['invoices_details'] = $this->model->getData('cart',array('session_id'=>$data['res']['invoice_number']));    
    if(!empty($data['invoices_details']))
    {
        foreach ($data['invoices_details'] as $key => $val) {
             $res_pro =$this->model->getSqlData("select product_name,description from product where product_id='".$val['product_id']."'");
            if(!empty($res_pro))
                {
                       $data['invoices_details'][$key]['product_name']=$res_pro[0]['product_name'];
                        $data['invoices_details'][$key]['description']=$res_pro[0]['description'];
                }else{
                        $data['invoices_details'][$key]['product_name']='';
                         $data['invoices_details'][$key]['description']='';
                 } 
        }
    }
 $pagename="View Proposal";
    $this->model->partialView('admin/lead/view_lead_praposals',$data,$pagename);
} 


 //----------------------------end----------------------------//   
}


?>

