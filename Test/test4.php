<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 07/05/2018
 * Time: 6:07 SA
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/account_model.php");

class test4 extends account_model {



    function get_last_id(){
        $dob = "00332568";
//        $dob = strtr($dob, '/', '-');
//        $dob = date("Y-m-d", strtotime($dob));
        $sql = "insert into thing(name) values(?)";
        $conn = mysqli_connect('localhost', 'root', '', 'test');
        $stmt = mysqli_stmt_init($conn);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$dob);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }
        mysqli_stmt_close($stmt);
        return false;
    }
}

$test4 = new test4();
$rs = $test4->get_last_id();
var_dump($rs);