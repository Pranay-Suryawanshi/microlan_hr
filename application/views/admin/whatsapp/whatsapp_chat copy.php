<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Microlan HR - Chat</title>
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url()?>assets/images/icons/fav.png">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <link href="<?php echo base_url();?>assets/bootstrap.css" rel="stylesheet" />
    <!-- <link href="<?php echo base_url();?>assets/css/bootstrap1.css" rel="stylesheet" /> -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        /* General Styling */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100%;
        }

        .background-green_adv {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Main Container */
        .main-container_adv {
            height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* Left Sidebar */
        .left-container_adv {
            background-color: white;
            border-right: 1px solid #ddd;
            overflow-y: auto;
            max-width: 30%;
            width: 100%; /* Set full width */
        }

         /* Toggle Button */
        #toggleSidebar {
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1000;
            display: none; /* Hidden by default, shown in mobile view */
        }


        .user-img img {
            width: 40px;
            border-radius: 50%;
        }

        .notif-box,
        .search-container,
        .contact-list {
            padding: 10px;
        }

        .contact-box {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }

        .contact-box img {
            width: 50px;
            border-radius: 50%;
        }

        .contact-details {
            margin-left: 10px;
            flex-grow: 1;
        }

        .contact-box.active {
            background-color: #e6f7ff;
        }

        /* Right Container */
        .right-container {
            flex-grow: 2;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            background-size: cover; /* Cover the entire area */
            background-position: center; /* Center the background image */
             background-image: url("gi_DckOUM5a.png");
        }

        .header {
            padding: 20px;
            background-color: #F0F2F5;
            border-bottom: 1px solid #ddd;
        }

        .message-container {
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
            background-color:  rgba(229, 221, 213, 0.8); /* Slightly transparent to show background */
            background-image: url("gi_DckOUM5a.png");
        }

        .message-box {
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 10px;
            max-width: 60%;
        }

        .my-message {
            background-color: #dcf8c6;
            margin-left: auto;
        }

        .friend-message {
            background-color: #fff;
        }

        /* Bottom Input */
        .input-container {
            padding: 10px;
            background-color: #ededed;
            display: flex;
            align-items: center;
            border-top: 1px solid #ddd;
        }

        .input-container input {
            flex-grow: 1;
            border: none;
            padding: 10px;
            border-radius: 20px;
            margin: 0 10px;
            outline: none;
            background-color: #fff;
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .left-container_adv {
                display: none; /* Hide the sidebar */
                position: absolute;
                top: 0;
                left: 0;
                 max-width: 100%;
                height: 100%; /* Full height */
                width: 300px; /* Fixed width for sidebar */
                z-index: 999; /* Above other elements */
                border-right: 1px solid #ddd;
            }

            #toggleSidebar {
                padding: 17px;  
                display: block; /* Show toggle button */
            }

            .right-container {
                width: 100%; /* Full width */
            }
        }

        @media (max-width: 480px) {
            .contact-box img {
                width: 40px;
            }

            .message-box {
                max-width: 80%;
            }
        }

        p {
            margin-top: 0;
            margin-bottom: 0;
        }

        .adv_right {
            float: right;
        }

        .adv_color {
            text-align: center;
            width: 20px;
            height: 20px;
            border-radius: 10px;
            color: white;
            background-color: #25D366;
            font-size: 13px;
        }

        .border_active_green {
            border: 3px solid #25D366;
        }

        .border_deactive_red {
            border: 3px solid red;
        }

        .adv_days {
            margin-bottom: 10px;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .adv_day {
            box-shadow: 0px 1px 1px 1px gray;
            background-color: white;
            box-sizing: border-box;
            display: inline-block;
            flex: none;
            max-width: 100% !important;
            padding: 5px 12px 6px 12px;
            font-size: 12.5px;
            line-height: 16px;
            color: var(--system-message-text);
            text-align: center;
            border-radius: 10px;
        }
    </style>

    <style>
        main {
            height: calc(100% - 50px);
            width: calc(100% - 100px);
            overflow: hidden;
            border-radius: 10px;
            color: black;
            display: grid;
            font-family: Roboto;
            grid-template-columns: 60px calc(30% - 30px) calc(70% - 30px);
            place-items: center;
        }

        .sideNav1 {
            display: flex;

            backdrop-filter: blur(55px);
            list-style: none;
            flex-direction: column;
            font-size: 1.5rem;
            box-shadow: var(--box-shadow);

            border-radius: 10px;
            align-items: center;
            padding: 0px;
            width: calc(100% - 10px);
            gap: 5px;
            padding: 10px 0px;
            justify-content: center;
            height: fit-content;
            border: 1px solid #ffffff21;
        }



        .sideNav1 li {
            padding: 13px 0px;
            border-radius: 5px;
            cursor: pointer;
            transition-duration: 0.27s;
            margin: 0px;
            width: calc(100% - 10px);
            font-size: 1.3rem;
            display: flex;
            justify-content: center;
        }

        .sideNav1 li:hover,
        .sideNav1 li.active {
            color: #00f5d4;
            background-color: #EEF4F6;
        }

        .sideNav2 {
            background-color: white;
            height: 100%;
            /* box-shadow: var(--box-shadow); */
            backdrop-filter: blur(55px);
            /* border-radius: 10px; */
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
            overflow: auto;
            border: 1px solid #ffffff21;
        }

        .SideNavhead {
            display: flex;
            align-items: center;
            padding: 20px;
            padding-bottom: 0px;
        }

        .SideNavhead h2 {
            /* color: #00f5d4; */
            color: black;
            font-size: 1.8rem;
            margin-right: auto;

        }

        .SideNavhead i {
            padding: 15px;
            cursor: pointer;
            font-size: larger;

            border-radius: 5px;
        }

        .SideNavhead i:hover {
            background-color: #9090903a;
        }

        section {
            /* box-shadow: var(--box-shadow); */
            width: 100%;

            border-radius: 10px;
            border-top-left-radius: 0px;
            border-bottom-left-radius: 0px;
            height: 100%;
            backdrop-filter: blur(55px);
            display: flex;
            flex-direction: column;
            border: 1px solid #ffffff21;

            overflow: auto;
        }

        .group {
            display: grid;
            grid-template-columns: 55px calc(100% - 55px);
            grid-template-rows: repeat(2, 30px);
            width: calc(100% - 20px);
            /* margin: 10px;
            padding: 10px; */
            list-style-type: none;
            border-radius: 5px;
            user-select: none;
            cursor: pointer;
        }

        .avatar {
            grid-row: 1/span 2;
            background-color: white;
            border-radius: 50%;
            height: 90%;
            width: 100%;
            display: flex;
            padding: 6px;
        }

        .avatar1 {
            grid-row: 1/span 2;
            /* background-color: white; */
            border-radius: 50%;
            height: 60%;
            /* width: 60%; */
            display: flex;
            padding: 6px;
        }


        .GroupDescrp {
            width: 100%;
            padding: 5px 10px;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }

        .GroupName {
            text-transform: uppercase;
            font-weight: 300;

            margin-top: 7px;
            font-size: 14px;
            padding: 5px 10px;
        }

        .group:hover {
            background-color: #ffffff21;
        }

        .avatar img {
            height: 100%;
            width: 100%;
            margin: auto;
        }

        .ChatHead {
            display: flex;
            align-items: center;
            background-color: #F0F2F5;
            border-bottom: 1px solid #ddd;
        }

        .ChatHead .group:hover {
            background-color: transparent;
        }

        .ChatHead .group {
            width: 100%;
            display: flex;
            align-items: center;
        }

        .ChatHead .group .GroupName {
            font-size: 14px;
            color: black;
            padding-left: 20px;
        }

        .ChatHead .group .avatar {
            padding: 5px;
            height: 40px;
            width: 40px;
        }

        .callGroup {
            margin-left: auto;
            padding: 10px;
            font-size: 1rem;
        }

        .callGroup i {
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .callGroup i:hover {
            background-color: #9090903a;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #e9e9e948;
        }

        ::-webkit-scrollbar-thumb {
            background: #e9e9e962;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #e9e9e9c8;
        }

        .MessageContainer {
            flex: 1;
        }

        #MessageForm {
            padding: 10px;
            display: flex;
            width: 100%;
        }

        #MessageForm input {
            padding: 10px;
            flex: 1;
            border-radius: 10px;
            border: none;

            background-color: #ebebebc6;
        }

        #MessageForm button {
            padding: 10px 15px;
            border: none;
            background-color: #00a8979e;
            color: white;
            cursor: pointer;

            border-radius: 10px;

            margin: 0px 5px;
            font-size: 1.2rem
        }

        #MessageForm input:focus {
            outline: none;
            border: 1px solid #00f5d4;
        }

        #MessageFormAdmin {
            padding: 10px;
            display: flex;
            width: 100%;
        }

        #MessageFormAdmin input {
            padding: 10px;
            flex: 1;
            border-radius: 10px;
            border: none;

            background-color: #ebebebc6;
        }

        #MessageFormAdmin button {
            padding: 10px 15px;
            border: none;
            background-color: #00a8979e;
            color: white;
            cursor: pointer;

            border-radius: 10px;

            margin: 0px 5px;
            font-size: 1.2rem
        }

        #MessageFormAdmin input:focus {
            outline: none;
            border: 1px solid #00f5d4;
        }

        .MessageContainer {
            display: flex;
            height: 100%;
            width: 100%;
            padding: 10px;
            flex-direction: column;
            overflow: auto;
            background-color: rgba(229, 221, 213, 0.8);
        }

        .MessageContainer span {
            margin-bottom: auto;
        }

        .message {
            display: flex;
            padding: 10px 15px;
            width: fit-content;
            flex-direction: column;
            border-radius: 5px;
            margin: 5px;
            position: relative;
        }

        .you {
            background-color: #dee2e6;
            color: #000000;
            text-align: left;
        }

        .message i {
            color: #00f5d4
        }

        .messageDetails {
            font-size: 0.7rem;
            display: flex;
            justify-content: flex-end;
            width: 100%;
            text-align: right;
            align-items: center;
            padding: 2px 0px;


        }

        .messageContent {
            font-size: 0.9rem;
        }

        .messageDetails .messageTime {
            margin-left: auto;
            padding-right: 5px;
            font-weight: 300;
            color: black;
        }

        .you .messageDetails .messageTime {
            color: rgb(38, 38, 38);
        }

        .you i {
            color: #036666
        }

        .me {
            margin-left: auto;
            background-color: #77aaaa;
            color: white;
            text-align: right;
        }

        .messageSeperator {
            margin: 10px auto;
            padding: 8px 15px;
            border-radius: 20px;
            width: fit-content;
            background-color: #036666;
        }

        .close {
            float: right;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            filter: alpha(opacity=20);
            opacity: 0.2;
        }

        .close:focus,
        .close:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            filter: alpha(opacity=50);
            opacity: 0.5;
        }

        button.close {
            padding: 0;
            cursor: pointer;
            background: 0 0;
            border: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        .modal-open {
            overflow: hidden;
        }

        .modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1050;
            display: none;
            overflow: hidden;
            -webkit-overflow-scrolling: touch;
            outline: 0;
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -25%);
            -ms-transform: translate(0, -25%);
            -o-transform: translate(0, -25%);
            transform: translate(0, -25%);
            -webkit-transition: -webkit-transform 0.3s ease-out;
            -o-transition: -o-transform 0.3s ease-out;
            transition: -webkit-transform 0.3s ease-out;
            transition: transform 0.3s ease-out;
            transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out,
                -o-transform 0.3s ease-out;
        }

        .modal.in .modal-dialog {
            -webkit-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }

        .modal-open .modal {
            overflow-x: hidden;
            overflow-y: auto;
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 10px;
        }

        .modal-content {
            position: relative;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #999;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 6px;
            -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
            outline: 0;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1040;
            background-color: #000;
        }

        .modal-backdrop.fade {
            filter: alpha(opacity=0);
            opacity: 0;
        }

        .modal-backdrop.in {
            filter: alpha(opacity=50);
            opacity: 0.5;
        }

        .modal-header {
            padding: 15px;
            border-bottom: 1px solid #e5e5e5;
        }

        .modal-header .close {
            margin-top: -2px;
        }

        .modal-title {
            margin: 0;
            line-height: 1.42857143;
        }

        .modal-body {
            position: relative;
            padding: 30px;
        }

        .modal-footer {
            padding: 15px;
            text-align: right;
            border-top: 1px solid #e5e5e5;
        }

        .modal-footer .btn+.btn {
            margin-bottom: 0;
            margin-left: 5px;
        }

        .modal-footer .btn-group .btn+.btn {
            margin-left: -1px;
        }

        .modal-footer .btn-block+.btn-block {
            margin-left: 0;
        }

        .modal-scrollbar-measure {
            position: absolute;
            top: -9999px;
            width: 50px;
            height: 50px;
            overflow: scroll;
        }

        @media (min-width: 768px) {
            .modal-dialog {
                width: 600px;
                margin: 30px auto;
            }

            .modal-content {
                -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            }

            .modal-sm {
                width: 300px;
            }
        }

        @media (min-width: 992px) {
            .modal-lg {
                width: 900px;
            }
        }
    </style>

    <style>
        .user-list {
            list-style-type: none;
            padding: 0;
        }
        .user-item {
            align-items: center;
            margin: 10px 0;
        }
        .status-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
            margin-left: -19px;
            margin-top: 8px;
        }
        .online {
            background-color: green;
        }
        .offline {
            background-color: red;
        }
    </style>

    <style>

        /* Button used to open the chat form - fixed at the bottom of the page */
        .open-button {
        background-color: #555;
        color: white;
        padding: 10px 10px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        /* bottom: 23px; */
        right: 10px;
        top: 10px;
        width: 130px;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
        }

        /* Add styles to the form container */
        .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
        }

        /* Full-width textarea */
        .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 200px;
        }

        /* When the textarea gets focus, do something */
        .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Set a style for the submit/send button */
        .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom:10px;
        opacity: 0.8;
        }

        /* Add a red background color to the cancel button */
        .form-container .cancel {
        background-color: red;
        }

        /* Add some hover effects to buttons */
        .form-container .btn:hover, .open-button:hover {
        opacity: 1;
        }
    </style>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            margin: auto;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        .contacts {
            border: 1px solid #ddd;
            border-radius: 4px;
            max-height: 320px;
            overflow-y: auto;
            padding: 10px;
            margin-bottom: 20px;
        }
        .contact {
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }
        .contact:hover {
            background-color: #f0f0f0;
        }
        .btn {
            background-color: #25D366; /* WhatsApp green color */
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .btn1 {
            /* background-color: #25D366; */
            /* color: white; */
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            /* width: 100%; */
            font-size: 18px;
        }
    </style>

</head>

<script>
    $(document).ready(function() {
        //alert('<?php echo $this->session->flashdata('message')?>');
    });
</script>

<?php
        $msgstr = $this->session->flashdata('message');
       
        if($msgstr == 'Success')
        {
?>
            <script type="text/javascript">  
                $(document).ready(function(){
                    $('#successModal').fadeIn();
                    setTimeout(function(){
                        $('#successModal').fadeOut();
                    }, 3000);
                });
            </script>
<?php
        }
        else if($msgstr == 'UpdateSuccess')
        {
?>
            <script type="text/javascript">  
                $(document).ready(function(){
                    $('#updatesuccessModal').fadeIn();
                    setTimeout(function(){
                        $('#updatesuccessModal').fadeOut();
                    }, 3000);
                });
            </script>
<?php
        }
?>

<!-- Success Modal -->
<div class="modal fade" id="successModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="background: radial-gradient(farthest-corner at 50% 0%, 
                #2C7865 0%, #2C7865 100%);">
                <div id="mainWrap">
                            <div class="row">
                                <div class="col-sm-13">
                                    <div id="xlogin" style="text-align: center; color: white;">

                                        <div class="form-group formNotice">
                                            <div class="col-xs-12">
                                                <p class="text-center" style="color: white;">
                                                    Group Created.
                                                </p>
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
<!-- Success Modal -->

<!-- Update Success Modal -->
<div class="modal fade" id="updatesuccessModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body" style="background: radial-gradient(farthest-corner at 50% 0%, 
                #2C7865 0%, #2C7865 100%);">
                <div id="mainWrap">
                            <div class="row">
                                <div class="col-sm-13">
                                    <div id="xlogin" style="text-align: center; color: white;">

                                        <div class="form-group formNotice">
                                            <div class="col-xs-12">
                                                <p class="text-center" style="color: white;">
                                                    Group Updated.
                                                </p>
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
<!-- Update Success Modal -->

<body>
    
    <?php if($this->session->flashdata('msg')) {?>
      <div class="alert alert-<?php echo $this->session->flashdata('class'); ?> alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <?php echo $this->session->flashdata('msg'); ?>
      </div>
    <?php }?>

    <div class="background-green_adv"></div>

    <div class="container-fluid main-container_adv">
        <!-- Toggle Button for Mobile View -->
        <button id="toggleSidebar" class="btn1 btn-default"> <i class="fa fa-bars"></i></button>
        
        <!-- Left Sidebar -->
        <div class="left-container_adv d-md-block col-md-4" id="leftside">
            <div class="header d-flex justify-content-between align-items-center" style="background-color: white">
                <?php
                    $op_user_id = $this->session->userdata('op_user_id');
                    $sql_user = "SELECT op.*, opr.* from op_user op 
                                    left join op_user_role opr on opr.role_id = op.role_id
                                    Where op_user_id = '$op_user_id'";
                    $res_user = $this->db->query($sql_user);
                    foreach($res_user->result() as $val)
                    {
                        $username = $val->user_name;
                        $rolename = $val->role_name;

                        if(!empty($val->profile_photo))
                        {
                            $profile = base_url() . 'upload/profile/' . $val->profile_photo;
                        }
                        else
                        {
                            $profile = base_url() . 'assets/images/user1.jpg';
                        }
                    }
                ?>
                <div class="user-img">
                    <img src="<?php echo $profile; ?>" alt="User Image" style="width: 50px; border-radius: 50%; height: 50px;" />
                    &nbsp; <?php echo $username; ?> (<?php echo $rolename;?>)
                </div>
                <!-- <div class="nav-icons">
                    <ul class="list-unstyled d-flex">
                        <li class="mx-2">
                            <i class="fa-solid fa-users" data-toggle="modal" data-target="#groupModal"></i>
                        </li>
                    </ul>
                </div> -->
            </div>

            <!-- Search -->
            <div class="search-container d-flex align-items-center bg-light border-bottom">
                <i class="fa-solid fa-magnifying-glass me-2"></i>
                <input type="text" oninput="filterList()" class="form-control searchInput" placeholder="Search or start new messenger" />
                <i class="fa-sharp fa-solid fa-bars-filter ms-2"></i>
            </div>

            <!-- Contact List -->
            <ul id="groupList" class="contact-list">
            <?php 
                    if (!empty($project_list)) 
                    {
                        foreach($project_list as $groups)
                        {
                            $groups['project_developer'];
                            $exploded = explode(",", $groups['project_developer']);
                            $size = count($exploded);

                            // Initialize an empty array to store results
                            $results = [];
                            $results1 = [];

                            for($k=0; $k<$size; $k++)
                            {
                                //echo $exploded[$k];
                                $sql = "SELECT * from op_user Where op_user_id = '$exploded[$k]'";
                                $res = $this->db->query($sql);
                                
                                foreach($res->result() as $index => $members)
                                {
                                    $member_name = $members->user_name;
                                    $member_id = $members->op_user_id;

                                    $results[] = $member_name;
                                    $results1[] = $member_id;
                                }
                            }
                            // print_r($results);

                            $op_id = $this->session->userdata('op_user_id');

                            if(!empty($groups['group_image']))
                            {
                                $profile = base_url() . 'uploads/group_profile/' . $groups['group_image'];
                            }
                            else
                            {
                                $profile = base_url() . 'assets/images/user1.jpg';
                            }

                            date_default_timezone_set('Asia/Kolkata');
                                
                            $sql1 = "SELECT * from chat_group_msg
                                        where group_id = '$gid' order by group_msg_id desc limit 1";
                            $res1 = $this->db->query($sql1);
                            foreach($res1->result() as $value)
                            {
                                if(!empty($value->chat_added_date))
                                {
                                    $chatdate = date('h:i A', strtotime($value->chat_added_date));
                                }
                                else
                                {
                                    $chatdate = date('h:i A');
                                }
                            }

                ?>
                        <li class="contact-box" onclick="handleGroupClick('<?php echo $groups['project_id']; ?>', 
                            '<?php echo $groups['project_name']; ?>', '<?php echo implode(', ', $results);?>'
                            , '<?php echo implode(', ', $results1);?>', '<?php echo $groups['project_added_on']; ?>'
                            , '<?php echo $profile; ?>')">
                            <img src="<?php echo $profile;?>" alt="Contact Image" class="border_active_green" />
                            <div class="contact-details">
                                <p class="GroupName">Project - <?php echo $groups['project_name']; ?></p>
                            </div>
                        </li>
                <?php
                        }
                    }
                ?>
                <?php
                    if (!empty($user_list)) 
                    {
                        foreach ($user_list as $key => $user) 
                        {
                            $sender_id = $user['op_user_id'];
                            $op_user_id = $this->session->userdata('op_user_id');

                            $sql = "SELECT * from user_chat Where user_chat_send_by = $sender_id and send_to_user = $op_user_id and user_chat_view = 0";
                            $res = $this->db->query($sql);
                            $cnt_res = $res->num_rows();
                            
                            if($cnt_res > 0)
                            {
                                if($user['user_flag'] == 1)
                                {
                                    if(!empty($user['profile_photo']))
                                    {
                                        $profile = base_url() . 'upload/profile/' . $user['profile_photo'];
                                    }
                                    else
                                    {
                                        $profile = base_url() . 'assets/images/user1.jpg';
                                    }

                                    date_default_timezone_set('Asia/Kolkata');
                                    
                                    $uid = $user['op_user_id'];

                                    $sql2 = "SELECT * from user_chat
                                                where send_to_user = $uid order by user_chat_id desc limit 1";
                                    $res2 = $this->db->query($sql2);
                                    foreach($res2->result() as $value2)
                                    {
                                        if(!empty($value2->user_chat_added_date))
                                        {
                                            $chatdate = date('h:i A', strtotime($value2->user_chat_added_date));
                                        }
                                        else
                                        {
                                            $chatdate = date('h:i A');
                                        }
                                    }
                ?>
                                    <li style="display:none;" class="contact-box" onclick="handleClick1('<?php echo $user['company_name']; ?>', 
                                        '<?php echo $user['user_name']; ?>' , '<?php echo $user['op_user_id']; ?>' 
                                        , '<?php echo $user['mapping_plan_id']; ?>', '<?php echo $user['audit_status']; ?>', '<?php echo $user['role_name']; ?>'
                                        , '<?php echo $profile?>')">
                                        <img src="<?php echo $profile;?>" alt="Contact Image" class="border_active_green" />
                                        <div class="contact-details">
                                            <h6><?php echo $user['role_name']; ?> <span class="text-muted adv_right">
                                                <?php echo $chatdate;?></span></h6>
                                            <p class="GroupName"><?php echo $user['user_name']; ?> </p>
                                        </div>
                                    </li>
                <?php
                                }
                                else
                                {
                                    if(!empty($user['profile_photo']))
                                    {
                                        $profile = base_url() . 'upload/profile/' . $user['profile_photo'];
                                    }
                                    else
                                    {
                                        $profile = base_url() . 'assets/images/user1.jpg';
                                    }

                                    date_default_timezone_set('Asia/Kolkata');
                                    
                                    $uid = $user['op_user_id'];

                                    $sql2 = "SELECT * from user_chat
                                                where send_to_user = $uid order by user_chat_id desc limit 1";
                                    $res2 = $this->db->query($sql2);
                                    foreach($res2->result() as $value2)
                                    {
                                        if(!empty($value2->user_chat_added_date))
                                        {
                                            $chatdate = date('h:i A', strtotime($value2->user_chat_added_date));
                                        }
                                        else
                                        {
                                            $chatdate = date('h:i A');
                                        }
                                    }
                ?>
                                    <li class="contact-box" onclick="handleClick1('<?php echo $user['company_name']; ?>', 
                                        '<?php echo $user['user_name']; ?>' , '<?php echo $user['op_user_id']; ?>' 
                                        , '<?php echo $user['mapping_plan_id']; ?>', '<?php echo $user['audit_status']; ?>', '<?php echo $user['role_name']; ?>'
                                        , '<?php echo $profile?>')">
                                        <img src="<?php echo $profile;?>" alt="Contact Image" class="border_deactive_red" />
                                        <div class="contact-details">
                                            <h6><?php echo $user['role_name']; ?> <span class="text-muted adv_right"><?php echo $chatdate;?></span></h6>
                                            <p class="GroupName"><?php echo $user['user_name']; ?> </p>
                                            <!-- <span class="adv_color adv_right">3</span> -->
                                        </div>
                                    </li>
                <?php
                                }
                            }
                            else
                            {
                                if($user['user_flag'] == 1)
                                {
                                    if(!empty($user['profile_photo']))
                                    {
                                        $profile = base_url() . 'upload/profile/' . $user['profile_photo'];
                                    }
                                    else
                                    {
                                        $profile = base_url() . 'assets/images/user1.jpg';
                                    }

                                    date_default_timezone_set('Asia/Kolkata');
                                    
                                    $uid = $user['op_user_id'];

                                    $sql2 = "SELECT * from user_chat
                                                where send_to_user = $uid order by user_chat_id desc limit 1";
                                    $res2 = $this->db->query($sql2);
                                    foreach($res2->result() as $value2)
                                    {
                                        if(!empty($value2->user_chat_added_date))
                                        {
                                            $chatdate = date('h:i A', strtotime($value2->user_chat_added_date));
                                        }
                                        else
                                        {
                                            $chatdate = date('h:i A');
                                        }
                                    }
                ?>
                                    <li style="display:none;" class="contact-box" onclick="handleClick('<?php echo $user['company_name']; ?>', 
                                        '<?php echo $user['user_name']; ?>' , '<?php echo $user['op_user_id']; ?>' 
                                        , '<?php echo $user['mapping_plan_id']; ?>', '<?php echo $user['audit_status']; ?>', '<?php echo $user['role_name']; ?>'
                                        , '<?php echo $profile?>')">
                                        <img src="<?php echo $profile;?>" alt="Contact Image" class="border_active_green" />
                                        <div class="contact-details">
                                            <h6><?php echo $user['role_name']; ?> <span class="text-muted adv_right"><?php echo $chatdate;?></span></h6>
                                            <p class="GroupName"><?php echo $user['user_name']; ?> </p>
                                            <!-- <span class="adv_color adv_right">3</span> -->
                                        </div>
                                    </li>
                <?php
                                }
                                else
                                {
                                    echo 'else';
                                    if(!empty($user['profile_photo']))
                                    {
                                        $profile = base_url() . 'upload/profile/' . $user['profile_photo'];
                                    }
                                    else
                                    {
                                        $profile = base_url() . 'assets/images/user1.jpg';
                                    }

                                    date_default_timezone_set('Asia/Kolkata');
                                    
                                    $uid = $user['op_user_id'];

                                    $sql2 = "SELECT * from user_chat
                                                where send_to_user = $uid order by user_chat_id desc limit 1";
                                    $res2 = $this->db->query($sql2);
                                    foreach($res2->result() as $value2)
                                    {
                                        if(!empty($value2->user_chat_added_date))
                                        {
                                            $chatdate = date('h:i A', strtotime($value2->user_chat_added_date));
                                        }
                                        else
                                        {
                                            $chatdate = date('h:i A');
                                        }
                                    }
                                    
                ?>
                                    <li style="display:none;" class="contact-box" onclick="handleClick('<?php echo $user['company_name']; ?>', 
                                        '<?php echo $user['user_name']; ?>' , '<?php echo $user['op_user_id']; ?>' 
                                        , '<?php echo $user['mapping_plan_id']; ?>', '<?php echo $user['audit_status']; ?>', '<?php echo $user['role_name']; ?>'
                                        , '<?php echo $profile?>')">
                                        <img src="<?php echo $profile;?>" alt="Contact Image" class="border_deactive_red" />
                                        <div class="contact-details">
                                            <h6><?php echo $user['role_name']; ?> 
                                            <span class="text-muted adv_right"><?php echo $chatdate;?></span></h6>
                                            <p class="GroupName"><?php echo $user['user_name']; ?> </p>
                                            <!-- <span class="adv_color adv_right">3</span> -->
                                        </div>
                                    </li>
                <?php
                                }
                            }
                        }
                    }
                ?>
            
            </ul>

        </div>

        <!-- Right Container (Messenger) -->
        <div class="right-container col-md-8">
            <div class="ChatHead">
                <li class="group">
                    <input type="hidden" id="profile" value="<?php echo base_url(); ?>assets/images/user1.jpg" />
                    
                    <div class="avatar1">
                        <img id="MainChatImg" style="height: 58px; width: 60px; border-radius: 50%;" 
                            src="<?php echo base_url(); ?>assets/images/user1.jpg" alt="">
                    </div>
                    
                    <div class="avatar1">
                        <img id="MainGroupImg" style="height: 58px; width: 60px; border-radius: 50%; display:none;" 
                            src="<?php echo base_url(); ?>assets/images/user1.jpg" alt="">
                    </div>
                    
                    <p class="GroupName" id="GroupChat" data-toggle="modal" data-target="#updategroupModal"></p>
                    
                    <p class="GroupName" id="MainChat"></p> <!-- This will be on the second line -->
                    
                    <!-- <p class="GroupName" id="MainChat1"></p> -->
                </li>

                <!-- <div class="callGroup">
                    <i class="fa fa-phone"></i>
                    <i class="fa fa-video-camera"></i>
                </div> -->
            </div>

            <div class="MessageContainer"></div>

            <form id="MessageForm">
                <input type="text" id="MessageInput" name="MessageInput" placeholder="Message" required>
                <input type="hidden" id="opuserId" name="opuserId">
                <input type="hidden" id="groupMembersId" name="groupMembersId">
                <input type="hidden" id="groupId" name="groupId">
                <input type="hidden" id="msgType" name="msgType">
                <input type="hidden" id="mapping_plan_id" name="mapping_plan_id">
                <button class="Send"><i class="fa fa-paper-plane"></i></button>
            </form>
        </div>
        
    </div>

    <!-- Create Group Modal -->
    <div id="groupModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Group</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url();?>Whatsapp/create_group" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <input type="text" placeholder="Group Name" name="group_name" id="groupName" required>
                        </div>
                        
                        <div class="input-group">
                            <input type="text" placeholder="Group Description" name="group_description" id="groupDescription">
                        </div>
                        
                        <div class="input-group">
                            <input type="file" placeholder="Group Image" name="group_image" id="groupImage">
                        </div>

                        <input type="hidden" name="op_users[]" value="<?php echo $this->session->userdata('op_user_id');?>" />
                        <div class="contacts" id="contactList">
                            <?php
                                if (!empty($user_list)) 
                                {
                                    foreach ($user_list as $key => $user) 
                                    { 
                            ?>
                                        <div class="contact"><input type="checkbox" name="op_users[]" value="<?php echo $user['op_user_id'];?>"> 
                                            <?php echo $user['user_name'];?> - <?php echo $user['role_name'];?>
                                        </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>

                        <button type="submit" class="btn" id="createGroupBtn">Create Group</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Update Group Modal -->
    <?php 
        if (!empty($group_list)) 
        {
            foreach($group_list as $groups)
            {
                $gid = $groups['group_id'];

    ?>
                <div id="updategroupModal<?php echo $gid;?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" onclick="closeModal(<?php echo $gid;?>);" id="updatemodal" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Group</h4>
                                <?php
                                    // echo "SELECT gm.*, gu.* FROM chat_groups gm
                                    //                                     left join chat_group_users gu on gu.group_id = gm.group_id
                                    //                                     WHERE gm.group_id = '" . $gid . "'";

                                    $selectedValues = $this->model->getSqlData("SELECT gm.*, gu.* FROM chat_groups gm
                                                                        left join chat_group_users gu on gu.group_id = gm.group_id
                                                                        WHERE gm.group_id = '" . $gid . "'");
                                ?>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url();?>Whatsapp/update_group" method="post" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="group_id" value="<?php echo $gid;?>" />
                                    <div class="input-group">
                                        <input type="text" placeholder="Group Name" name="group_name" value="<?php echo $groups['group_name'];?>" id="groupName" required>
                                    </div>
                                    
                                    <div class="input-group">
                                        <input type="text" placeholder="Group Description" name="group_description" value="<?php echo $groups['group_description'];?>" id="groupDescription">
                                    </div>
                                    
                                    <div class="input-group">
                                        <input type="file" placeholder="Group Image" name="group_image" id="groupImage">
                                        <input type="hidden" placeholder="Group Image" name="group_image" value="<?php echo $groups['group_image'];?>" id="groupImage">
                                        <?php
                                            if(!empty($groups['group_image']))
                                            {
                                                $profile = base_url() . 'uploads/group_profile/' . $groups['group_image'];
                                            }
                                            else
                                            {
                                                $profile = base_url() . 'assets/images/user1.jpg';
                                            }
                                        ?>
                                        <img src="<?php echo $profile; ?>" alt="">
                                    </div>
                                    
                                    <input type="hidden" name="op_users[]" value="<?php echo $this->session->userdata('op_user_id');?>" />
                                    <div class="contacts" id="contactList">
                                        <?php
                                            if (!empty($user_list)) 
                                            {
                                                foreach ($user_list as $key => $user) 
                                                { 
                                                    //echo $selectedValues;
                                                    // Check if the checkbox should be checked
                                                    // if (in_array($user['op_user_id'], array_column($selectedValues, 'user_id'))) {
                                                    //     echo 'checked';
                                                    // }
                                        ?>
                                                        <div class="contact">
                                                            <input type="checkbox" name="op_users[]" 
                                                                value="<?php echo $user['op_user_id'];?>"
                                                                <?php  if (in_array($user['op_user_id'], array_column($selectedValues, 'user_id'))) {
                                                                    echo 'checked';
                                                                }?>> 
                                                            <?php echo $user['user_name'];?> - <?php echo $user['role_name'];?>
                                                        </div>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </div>

                                    <button type="submit" class="btn" id="updateGroupBtn">Update Group</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
    <?php
            }
        }
    ?>

    <!-- Update Image Modal -->
    <?php
        if (!empty($user_list)) 
        {
            foreach ($user_list as $key => $user) 
            { 
                $user_id = $user['op_user_id'];
    ?>
                <div id="updateImageModal<?php echo $user_id;?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" onclick="closeModal(<?php echo $user_id;?>);" id="updatemodal" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Update Image</h4>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url();?>Whatsapp/update_user_image" method="post" enctype="multipart/form-data">
                                    
                                    <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
                                    
                                    <div class="input-group">
                                        <input type="file" placeholder="Image" name="profile_photo" id="userImage">
                                        <input type="hidden" placeholder="Image" name="profile_photo" value="<?php echo $user['profile_photo'];?>" id="groupImage">
                                        <?php
                                            if(!empty($user['profile_photo']))
                                            {
                                                $profile = base_url() . 'upload/profile/' . $user['profile_photo'];
                                            }
                                            else
                                            {
                                                $profile = base_url() . 'assets/images/user1.jpg';
                                            }
                                        ?>
                                        <img src="<?php echo $profile; ?>" alt="" style="width: 50%;">
                                    </div>
                                    
                                    <button type="submit" class="btn" id="updateImageBtn">Update Image</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
    <?php
            }
        }
    ?>

    <script>
        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#MessageForm').submit(function(e) {
                //alert('hi');
                e.preventDefault();

                // console.log(formData);
                var opuserId = document.getElementById('opuserId').value;
                var groupId = document.getElementById('groupId').value;
                var msgType = document.getElementById('msgType').value;
                var mapping_plan_id = document.getElementById('mapping_plan_id').value;

                var MessageInput = document.getElementById('MessageInput').value;

                const requestData = {
                    opuserId: opuserId,
                    groupId: groupId,
                    msgType: msgType,
                    MessageInput: MessageInput,
                    mapping_plan_id: mapping_plan_id
                };
                document.getElementById("MessageInput").value = "";
                console.log(requestData);

                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url(); ?>Whatsapp/send_chat",
                    data: requestData,
                    success: function(response) {
                        //console.log(response);
                        //alert(response);
                        if (response.success === 'success') {
                            // Assuming updateChatMessages is a function defined elsewhere
                            if(msgType == "Group")
                            {
                                updateGroupMessages(response.chatData);
                            }
                            else
                            {
                                updateChatMessages(response.chatData);
                            }
                        } else {
                            if (response.edit_error !== "") {
                                $('#edit_error').html(response.edit_error);
                                $('#term_condition_title_edit').css('border-color', 'red');
                            } else {
                                $('#edit_error').html('');
                                $('#term_condition_title_edit').css('border-color', '');
                            }
                        }
                    },
                    error: function(response) {
                        console.error(response);
                        // Handle the error
                        // ...
                    }
                });

            });
        });
    </script>

    <script>
        function closeModal(groupId)
        {
            //document.getElementById('updategroupModal'+groupId).style.display = 'none';
            $('#updategroupModal'+groupId).modal('hide');
        }

        function handleGroupClick(groupId, groupName, groupMembers, groupMembersId, groupCreatedBy, groupImage)
        {
            // alert(groupMembers);
            document.getElementById('leftside').style.display = 'none';

            $(".MessageContainer").empty();

            document.getElementById("opuserId").value = groupCreatedBy
            document.getElementById("groupId").value = groupId
            document.getElementById("groupMembersId").value = groupMembersId
            document.getElementById("msgType").value = "Group";
            document.getElementById("GroupChat").innerHTML = groupName;
            document.getElementById('MainGroupImg').style.display = 'block';
            document.getElementById("MainGroupImg").src = groupImage;
            document.getElementById('MainChatImg').style.display = 'none';
            
            // document.getElementById("MainChat1").innerHTML = "";

            document.getElementById("MainChat").innerHTML = " -   " + groupMembers;

            var element = document.getElementById('GroupChat');
            element.setAttribute('data-target', 'updategroupModal'+groupId);
            //alert('Data target updated to:', element.getAttribute('data-target'));

            // // Show the modal (basic example, you might want to implement a better modal display)
            // document.getElementById('updategroupModal'+groupId).style.display = 'block';
            
            element.onclick = function() {
               //document.getElementById('updategroupModal'+groupId).style.display = 'block';
                $('#updategroupModal'+groupId).modal('show');
            };

            const requestData = {
                groupId: groupId
            };
            console.log(requestData);

            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>Whatsapp/get_project_chat",
                data: requestData,
                success: function(response) {
                    console.log(response);
                    if (response.success == 'success') {
                        //alert(response.chatData);
                        updateGroupMessages(response.chatData);
                        // Use the function to update chat messages

                        // Show the modal or perform other actions if needed
                        // $("#response-driver-report-modal").modal('show');
                    } else {
                        $(".MessageContainer").empty();
                        // Handle error case
                        // $("#response-driver-report-modal").modal('show');
                    }
                },
                error: function(response) {
                    // Handle error
                    console.error(response);
                }
            });
        }

        function updateGroupMessages(chatData) {
            //alert(chatData);
            // Clear existing messages
            $(".MessageContainer").empty();
            let messageCount = 0;

            // Loop through chatData array and append messages
            chatData.forEach(function(message) {

                messageCount++;
                // alert(messageCount);

                var messageHtml = '';
                //alert(message);
                var opuserId = document.getElementById('opuserId').value;
                // alert(opuserId);

                var tripNumber = chatData.length > 0 ? chatData[0].trip_number : '';

                // Set the trip_number as the card title
                $(".card-title").text("Group Chat");

                if (messageCount % 2 === 0) {
                    messageHtml += '<div class="message-box friend-message">';
                    messageHtml += '<p class="messageContent" style="font-size: 1rem; font-weight: 600;">' + message.user_name + '</p>';
                    messageHtml += '<p class="messageContent">' + message.message + '</p>';
                    messageHtml += '<div class="messageDetails">';
                    messageHtml += '<div class="messageTime">' + message.chat_added_date + '</div>';
                    messageHtml += ' <i class="fa fa-check"></i>';
                    messageHtml += '</div>';
                    messageHtml += '</div>';  // Right-aligned for even messages
                } else {
                    messageHtml += '<div class="message-box my-message">';
                    messageHtml += '<p class="messageContent" style="font-size: 1rem; font-weight: 600;">' + message.user_name + '</p>';
                    messageHtml += '<p class="messageContent">' + message.message + '</p>';
                    messageHtml += '<div class="messageDetails">';
                    messageHtml += '<div class="messageTime">' + message.chat_added_date + '</div>';
                    messageHtml += ' <i class="fa fa-check"></i>';
                    messageHtml += '</div>';
                    messageHtml += '</div>';   // Left-aligned for odd messages
                }

                // Append the message to the direct-chat-messages container
                $(".MessageContainer").append(messageHtml);
                if (message.trip_status === '1') {
                    $(".card-footer").hide();
                } else {
                    $(".card-footer").show();
                }
            });
        }

    </script>

    <script>
        function filterList() {
            var input, filter, ul, li, p, i, txtValue;
            input = document.querySelector('.searchInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("groupList");
            li = ul.getElementsByTagName('li');
            for (i = 0; i < li.length; i++) {
                p = li[i].getElementsByTagName("p")[0];
                txtValue = p.textContent || p.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>

    <script>
        // Toggle Sidebar Functionality
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            const sidebar = document.querySelector('.left-container_adv');
            sidebar.style.display = sidebar.style.display === 'block' ? 'none' : 'block';
        });
    </script>


</body>
</html>