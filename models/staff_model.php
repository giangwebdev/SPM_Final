<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 12:02 PM
 */

require_once (__DIR__.'/../config.php');
require_once (SITE_ROOT."/models/account_model.php");

class staff_model extends account_model {

    function get_all_account_info(){
        $sql = "select * from account";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
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

    function check_admin($acc_id){
        $sql = "select isadmin from academic_staff where acc_id=?";
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