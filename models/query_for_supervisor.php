<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/26/2018
 * Time: 9:46 AM
 */
$conn = mysqli_connect('localhost', 'root', '', 'spmfu');

function pending_approve_project($projectname_en, $projectname_vi, $approve_by_supervisor,$status){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "insert into project(projectname_en, projectname_vi, projectname_code, is_succeed, approve_by_staff, approve_by_supervisor) 
              values (?,?,?,?,?,?)";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $projectname_code=null;
    $approve_by_staff=null;
    $stmt->bind_param("ssssii",$projectname_en,$projectname_vi,$projectname_code,$status,$approve_by_staff,$approve_by_supervisor );
    $stmt->execute();
    $stmt->close();
    $GLOBALS['conn']->close();
}

function  pending_approve_team($team_name, $supervisor_id, $project_id,$status){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "insert into team(team_name, supervisor_id, project_id, isactive) 
              values (?,?,?,?)";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("siis",$team_name,$supervisor_id,$project_id,$status );
    $stmt->execute();
    $stmt->close();
    $GLOBALS['conn']->close();
}

function  pending_approve_student($acc_id, $full_name, $student_id_code, $phone, $mail, $team_id){
        if ($GLOBALS['conn']->connect_error) {
            die("Connection failed: " . $GLOBALS['conn']->connect_error);
        }
        //prepare and bind
        $sql = "insert into student(acc_id, full_name,student_id_code, gender, dob, profile_picture, phone, email, major, team_id) 
              values (?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $gender =null;
        $dob=null;
        $profile_pic=null;
        $major=null;
        $stmt->bind_param("isssssisssi",$acc_id,$full_name,$student_id_code,$gender,$dob,$profile_pic,$phone,$mail,$major,$team_id);
        $stmt->execute();
        $stmt->close();
        $GLOBALS['conn']->close();
    }

function get_supervisor(){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "select * from supervisor";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $supervisor_list = array();
    while($row = $result->fetch_assoc()){
        $supervisor_list[] = $row;
    }
    return $supervisor_list;
    $stmt->close();
    $GLOBALS['conn']->close();
}

function get_supervisor_by_accid($acc_id){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "select supervisor_id from supervisor where acc_id=?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("i", $acc_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        $data = $row;
    }
    return $data['supervisor_id'];
    $stmt->close();
    $GLOBALS['conn']->close();
}

function is_supervisor_leader_by_acc_id($acc_id){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "select issupervisorleader from supervisor where acc_id=?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("i", $acc_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        $data = $row;
    }
    return $data['issupervisorleader'];
    $stmt->close();
    $GLOBALS['conn']->close();
}

