<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 12:31 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/staff_model.php");
require_once (SITE_ROOT."/controllers/account_controller.php");
require_once (SITE_ROOT."/vendor/autoload.php");
require_once (SITE_ROOT."/views/staff_view.php");
require_once (SITE_ROOT."/controllers/MyReadFilter.php");
class staff extends account {

    private $__acc_list = array();

    function display_all_account_info(){
            $acc_info = new staff_model();
            $this->__acc_list = $acc_info->get_all_account_info();
            $acc_view = new staff_view();
            $acc_view->view_account($this->__acc_list);
    }

    function create_account(){
        $staff_view =  new staff_view();
        $staff_view->create_account();
        if(isset($_POST['email']) && $_POST['email'] !=null ){
            $staff =new staff_model();
            $email = $_POST['email'];
            $username = substr($email, 0, strpos($email, "@"));
            $password = $this->auto_gen_password();
            $role_id = $_POST['role'];
            $check = $staff->create_account($username,$password,$role_id);
            $acc = new account_model();
            $acc_id = $acc->get_acc_id($username);
            $student_id = substr($username, 0, strpos($username, "SE"));
            if($check == true){
                $acc->insert_profile($acc_id, $student_id,$email, $role_id);
                echo "Create account successful.";
            }else{
                echo "Failed to create new account.";
            }
        }

    }

    function admin_edit_profile(){
        if(isset($_POST['acc_id'])){
            $acc_id = $_POST['acc_id'];
            $acc_role = $_POST['acc_role'];
            $acc_model = new account_model();
            $acc_detail=$acc_model->get_profile_by_id($acc_id,$acc_role);
            $staff_view = new staff_view();
            $staff_view->admin_edit_profile($acc_detail,$acc_role);
        }
    }

    function admin_edit_profile_change(){
        if(isset($_POST['edit']) && isset($_POST['acc_id'])){
            $acc_id = $_POST['acc_id'];
            $acc_role = $_POST['acc_role'];
            $student_id = $_POST['student_id'];
            $full_name = $_POST['full_name'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $major = $_POST['major'];
            $campus= $_POST['campus'];
            $staff_model = new staff_model();
            $result = $staff_model->update_account_info($student_id , $full_name, $gender, $dob, $phone , $email, $major, $campus , $acc_id,$acc_role);
            if($result == true){
                $acc_model = new account_model();
                $acc_detail=$acc_model->get_profile_by_id($acc_id,$acc_role);
                $staff_view = new staff_view();
                $staff_view->admin_edit_profile($acc_detail,$acc_role);
            }else{
                echo "Can't edit account info!";
            }
        }
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Reader\Exception
     */
    function add_student_list(){
        $staff = new staff_view();
        $result = array();
    if(isset($_FILES['filename']) && isset($_POST['upload'])){
        if ($_FILES['filename']['error'] > 0){
            echo "Error! Nothing to upload"."<br>";
            echo "<button type='button' onclick='window.location=\"./index.php?action=add_student_list&controller=staff\"' style='margin: 0 auto;'>Back</button>";
        }else{
            move_uploaded_file($_FILES['filename']['tmp_name'], './upload/' . $_FILES['filename']['name']);

            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');

            $reader->setReadDataOnly(TRUE);
            $filterSubset = new MyReadFilter();
            $reader->setReadFilter($filterSubset);
            $spreadsheet = $reader->load("./upload/" . $_FILES['filename']['name']);
            $worksheet = $spreadsheet->getActiveSheet();
            $_SESSION['student_list'] = "./upload/" . $_FILES['filename']['name'];
            $staff->add_student_list($worksheet);
        }

        }elseif(isset($_POST['add_btn']) && isset($_SESSION['student_list'])){
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $filterSubset = new MyReadFilter();
        $reader->setReadFilter($filterSubset);
        $spreadsheet = $reader->load($_SESSION['student_list']);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = [];
        foreach ($worksheet->getRowIterator() AS $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
            $cells = [];
            foreach ($cellIterator as $cell) {
                    $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
        }
        $rows = array_map('array_filter', $rows);
        $rows = array_filter($rows);
        $staff_model = new staff_model();
               foreach ( $rows as $row){
                       $username = strtolower(rtrim($row[5],"@fpt.edu.vn"));
                       $password = $this->auto_gen_password();
                       $role = "1";
                       $account_model = new account_model();
                       if($account_model->check_username($username) == false){
                           $acc_id_student = $staff_model->create_account($username, $password, $role);
                           $student_id = $row[0];
                           $full_name = $row[1];
                           $dob=$row[2];
                           $dob = strtr($dob, '/', '-');
                           $dob = date("Y-m-d", strtotime($dob));
                           $gender =$row[3];
                           $phone =$row[4];
                           $email=$row[5];
                           $major= $row[6];
                           $campus = "FU-HL";
                           $profile_picture = "https://www.fancyhands.com/images/default-avatar-250x250.png";
                           $staff_model->add_student($student_id,$acc_id_student, $full_name , $gender ,$dob , $phone, $email, $major, $campus, $profile_picture);
                           array_push($row,"success");
                           $msg ='
                            <html>
                            <head>
                              <title>Auto email from SPMFU</title>
                            </head>
                            <body>
                              <p>Hello,'. $full_name .'</p>
                              <p>Your account is <span style="color: #0000FF; font-size: medium;">'. $username .'</span></p>  
                              <p>Your password is <span style="color: #0000FF; font-size: medium;">'. $password .'</span></p>              
                              <p>You can use this account to access to SPMFU System right now to register your team and supervisor.</p>
                              <h3>Remember: Don\'t give password to anyone. This will lead you losing sensitive data when doing capstone project</h3>
                              <p>'.date("Y-m-d h:i:sa").'</p>
                            </body>
                            </html>
                            ';
                           $this->sendMail($email,$msg);
                       }else{
                           array_push($row,"failed");
                       }
                array_push($result,$row);

        }
        unset($_SESSION['student_list']);

        $staff->add_student_result($result);
    }

        else{
        $staff->add_student();
    }

    }

    function view_request(){
        $staff_model = new staff_model();
        $request_data = $staff_model->get_all_request();
        $staff_view =  new staff_view();
        $staff_view->view_request($request_data);
    }
    function update_request(){
        $staff_model = new staff_model();
        $account_model = new account_model();

        if(isset($_POST['Approve'])){
            $room_number = "";
            $slot = "";
            $date = $new_name_en = "";
            $new_name_vi = "";
            $new_code ="";
            $content=array();
            $request_id = $_POST['request_id'];
            $request_type= $_POST['Approve'];
            $team = $_POST['team'];
            $team_id= $account_model->get_team_id_by_name($team);
            $description = $_POST['description'];
            $staff_id = $_SESSION['acc_id'];
            if($_POST['Approve'] == "CPN"){
                $new_name_en = $_POST['new_name_en'];
                $new_name_vi = $_POST['new_name_vi'];
                $old_name_en = $_POST['old_name_en'];
                $old_name_vi = $_POST['old_name_vi'];
                $new_code = $_POST['new_code'];
                $old_code = $_POST['old_code'];
                $content = array(
                    "old_name_en" => $old_name_en,
                    "old_name_vi" => $old_name_vi,
                    "old_code" => $old_code,
                    "new_name_en" => $new_name_en,
                    "new_name_vi" => $new_name_vi,
                    "new_code" => $new_code,
                    "description" => $description
                );

            }

            if($_POST['Approve']== "BMR"){
                $room_number = $_POST['room_number'];
                $slot = $_POST['slot'];
                $date = $_POST['date'];
                $content = array(
                  "slot" => $slot,
                    "date" => $date,
                    "room" =>$room_number,
                    "description" => $description
                );
            }
            $content = json_encode($content);
            $request_action = $_POST['approve_action'];
            if($request_action == 1){
                $staff_model->update_request($request_id,$content,$request_action,$staff_id);
                if($request_type == "CPN"){
                    $staff_model->change_project_name($team_id, $new_name_en, $new_name_vi, $new_code);
                }elseif ($request_type == "BMR"){
                    $staff_model->book_room($team_id,$room_number,$slot,$date,$staff_id);
                }
            }if($request_action == 0){
                $staff_model->update_request($request_id,$content,$request_action,$staff_id);
            }

            $this->view_request();
        }
    }



}