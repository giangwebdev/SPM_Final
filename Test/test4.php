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
        $sql = "select max(acc_id) from account ";
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
    }
}

$test4 = new test4();
$rs = $test4->get_last_id();
var_dump($rs);