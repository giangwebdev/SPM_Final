<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/20/2018
 * Time: 1:16 PM
 */
include_once('../models/database_query.php');
include_once('../models/query_for_supervisor.php');
include_once('../models/query_for_staff.php');
session_start();
if(!isset($_SESSION['acc_id']) || $_SESSION['role_id'] != "2" ){
    echo '<script type="text/javascript">
           window.location = "../index.php";
          </script>';

}
$acc_id = $_SESSION['acc_id'];
if(is_supervisor_leader_by_acc_id($acc_id) == false){
    echo '<script type="text/javascript">
           alert("You have no permission to access this function.");
           window.location = "../template/home_supervisor.php";
          </script>';
}
if(isset($_POST['submit'])) {

$student_id = $_POST['student_id'];
$student_name = $_POST['student_name'];
$student_team_pending_id= $_POST['student_team_pending_id'];
$student_phone = $_POST['student_phone'];
$student_mail = $_POST['student_mail'];
$student_isteamleader = $_POST['student_isteamleader'];
$student_project_en = $_POST['student_project_en'];
$student_project_vi = $_POST['student_project_vi'];
$chosen_supervisor = $_POST['supervisor'];

//default password
$pass = "123";

//create_account($student_team_pending_id,$student_mail,$pass,"1","1");


//$current_supervisor_id = get_supervisor_by_accid($acc_id);
//pending_approve_project($student_project_en,$student_project_vi,$current_supervisor_id,"0");
//$project_id = get_project_id($student_project_en);
$team_name = $student_project_en;
//pending_approve_team($team_name, $chosen_supervisor, $project_id,"1");

$student_acc_id = get_account_id($student_mail);
$team_id = get_team_id($team_name);
pending_approve_student($student_acc_id,$student_name,$student_id, $student_phone, $student_mail, $team_id);
    echo '<script type="text/javascript">
           //alert("Success!");
//           window.location = "../views/home_supervisor.php";
          </script>';
}else{
    $role_id = $_SESSION['role_id'];
    $role_now="";
    if($role_id == 1 ){
        $role_now = "student";
    }else if ($role_id == 2){
        $role_now ="supervisor";
    }else if($role_id == 3){
        $role_now = "staff";
    }
    echo '<script type="text/javascript">
           alert("You have no permission to access this function.");
           window.location = "../views/home_' .$role_now .'.php";
          </script>';
}
