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
}