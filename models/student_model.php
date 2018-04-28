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

    function add_request($team_id,$request_type, $content, $request_by){
        $is_accepted_staff = $is_accepted_spv =0 ;
        $sql = "insert into request(team_id, request_type, content, request_by, is_accepted_by_staff, is_accepted_by_supervisor) VALUES (?,?,?,?,?,?)";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"issiii",$team_id,
                $request_type, $content, $request_by, $is_accepted_staff,$is_accepted_spv);
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
                    VALUES (?,?,?,?,?,?,?,?)";
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

        function get_task_data(){

        }
}