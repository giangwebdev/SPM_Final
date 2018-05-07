<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/18/2018
 * Time: 11:06 AM
 */

require_once (__DIR__.'/../config.php');
require_once (SITE_ROOT."/models/account_model.php");

class student_model extends account_model{

    function get_team_info(){
            $sql = "select team.* from team,student where team.team_id = student.team_id and student.acc_id=?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$this->_acc_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data = array();
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                mysqli_stmt_close($stmt);
                return $data;
            }
    }

    function get_team_info_by_id($acc_id){
        $sql = "select team.* from team,student where team.team_id = student.team_id and student.acc_id=?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$acc_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            mysqli_stmt_close($stmt);
            return $data;
        }
    }

    function add_request($team_id,$request_type, $content, $request_by){
        $approve_by_staff=$approve_by_supervisor=$reject_by_staff=$reject_by_supervisor = 0;
        $sql = "insert into request(team_id, request_type, content, request_by,approve_by_staff,approve_by_supervisor,reject_by_staff,reject_by_supervisor) VALUES (?,?,?,?)";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"issiiiii",$team_id,
                $request_type, $content, $request_by, $approve_by_staff,$approve_by_supervisor,$reject_by_staff,$reject_by_supervisor);
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                return true;
            }else{
                mysqli_stmt_close($stmt);
                return false;
            }

        }

    }


    function get_team_member($team_id){
        $sql = "select acc_id, full_name from team, student
                    where team.team_id = student.team_id and team.team_id = ?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$team_id);
            mysqli_stmt_execute($stmt);
            $data = array();
            $result = mysqli_stmt_get_result($stmt);
            if($result){
                while ($row = mysqli_fetch_assoc($result)){
                    $data = $row;
                }
                mysqli_stmt_close($stmt);
                return $data;
            }else{
                die(mysqli_error($link));
            }
        }
    }

        function get_team_id($acc_id){
            $sql = "select team_id from account, student where account.acc_id = student.acc_id and account.acc_id = ?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$acc_id);
                mysqli_stmt_execute($stmt);
                $data ="";
                $result = mysqli_stmt_get_result($stmt);
                if($result){
                    while ($row = mysqli_fetch_assoc($result)){
                        $data = $row;
                    }
                    mysqli_stmt_close($stmt);
                    return $data;
                }else{
                    die(mysqli_error($link));
                }
            }
        }

        function create_new_task($parent_task_id, $team_id, $task_name, $description,$created_by, $assign_by, $assign_to, $start_date, $deadline,$task_status_id,$priority){
            $technique_check = $qa_check = 0;
            $sql = "insert into task(parent_task_id, team_id, task_name, description,created_by, assign_by, assign_to,
                      start_date, deadline, technique_check, qa_check, task_status_id, priority) 
                    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"iissiiissiiis",$parent_task_id, $team_id, $task_name, $description,
                $created_by, $assign_by, $assign_to, $start_date, $deadline, $technique_check, $qa_check, $task_status_id, $priority);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_close($stmt);
                    return true;
                }else{
                    die(mysqli_error($link));
                }
            }
        }

        function get_task_data($team_id){
                $sql=  "select * from task WHERE team_id=?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$team_id);
                mysqli_stmt_execute($stmt);
                $data = array();
                $result = mysqli_stmt_get_result($stmt);
                if($result){
                    while ($row = mysqli_fetch_assoc($result)){
                        $data[] = $row;
                    }
                    mysqli_stmt_close($stmt);
                    return $data;
                }else{
                    die(mysqli_error($link));
                }
            }
        }

        function get_team_name_by_team_id($team_id){
            $sql = "select team_name from team where team_id=?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$team_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data = "";
                while($row = mysqli_fetch_assoc($result)) {
                    $data = $row['team_name'];
                }
                mysqli_stmt_close($stmt);
                return $data;
            }
        }


        function edit_task_data($parent_task_id, $team_id, $task_name, $description,
                               $created_by, $assign_by, $assign_to, $start_date, $deadline, $technique_check, $qa_check, $task_status_id, $priority){


        }

        function delete_task($task_id){
            $sql = "delete from task where task_id =?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$task_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                return true;
            }
            mysqli_stmt_close($stmt);
            return false;
        }

    function get_request(){
        $sql = "select * from request where request_by =?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$this->_acc_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            mysqli_stmt_close($stmt);
            return $data;
        }
        }

        function get_last_team_pending_id(){
            $sql = "select max(team_pending_id) from team_pending ";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_execute($stmt);
                $data="";
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)) {
                    $data = $row;
                }
                mysqli_stmt_close($stmt);
                return $data;
            }
            return false;
        }

        function create_team($team_pending_id, $acc_id, $isteamleader, $supervisor_id,
                                              $projectname_vi, $projectname_en, $note){
            $sql = "insert into team_pending(team_pending_id, acc_id, isteamleader, supervisor_id,
                                              projectname_vi, projectname_en, note)
                    VALUES (?,?,?,?,?,?,?)";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"iiiisss",$team_pending_id, $acc_id, $isteamleader, $supervisor_id,
                                                                                                 $projectname_vi, $projectname_en, $note);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_close($stmt);
                    return true;
                }else{
                    return false;
                }
            }

            return false;
        }
        function has_team($acc_id){
            $sql = "select team_id from student where acc_id = ?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$acc_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)) {
                    mysqli_stmt_close($stmt);
                    return true;
                }
                mysqli_stmt_close($stmt);
                return false;
            }
        }

        function get_capstone_name(){
            $sql = "select projectname_en, projectname_vi from project, team WHERE  team.project_id= project.project_id and team_id = ?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$_SESSION['team_id']);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data=array();
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                mysqli_stmt_close($stmt);
                return $data;
            }
        }
        function get_bug(){

        }

        function edit_bug(){

        }

        function add_bug(){

        }

        function upload_file($file_name, $file_link){

        }

        function get_file($task_id){

        }

        function add_comment(){

        }

        function delete_comment(){

        }

}