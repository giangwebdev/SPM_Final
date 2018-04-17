<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 3:58 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/account_model.php");

class supervisor_model extends account_model{

    function check_supervisor_head($acc_id){
        $sql = "select issupervisorleader from supervisor where acc_id=?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$acc_id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                return true;
            }
            mysqli_stmt_close($stmt);
            return false;
        }
    }
}