<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/26/2018
 * Time: 3:09 AM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/account_model.php");

class test_class extends account_model {

    function add($username,$password){
        $role = "5";
        $is_active = "1";
        $sql = "insert into account(username, password, role_id, isactive) values (?,?,?,?)";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"ssii",$username,$password,$role,$is_active);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($result){
                if(mysqli_fetch_assoc($result)) {
                    mysqli_stmt_close($stmt);
                    return true;
                }else{
                    mysqli_stmt_close($stmt);
                    return false;
                }

            }else{
                die(mysqli_error($link));
            }

        }
    }
}


