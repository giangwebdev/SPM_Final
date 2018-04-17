<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/14/2018
 * Time: 2:47 PM
 */
require_once __DIR__."/../config.php";
require_once SITE_ROOT . "/models/DB_Driver.php";

class account_model extends DB_Driver
{
    // Tên Table
    protected $_table_name = 'account';
    protected $_acc_id='';
    private $user_name='';
    private $password='';
    private $role='';
    private  $account_status='';
    // Hàm Khởi Tạo
    function __construct() {
        if($this->_acc_id == null ){
            $this->_acc_id= $_SESSION['acc_id'];
        }
        parent::connect();
    }

    // Hàm ngắt kết nối
    function __destruct() {
        parent::disconnect();
    }


    //Check account
    function get_account_info($username,$password){
        $sql = "select * from ".$this->_table_name ." where username= ? and password= ?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"ss",$username,$password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $data = array();
            while($row = mysqli_fetch_assoc($result)) {
            $data = $row;
            }
            mysqli_stmt_close($stmt);
            return $data;
        }

    }

    function change_password($new_password){
        $sql = "update ". $this->_table_name ." set password = ? where acc_id= ?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"si",$new_password,$this->_acc_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }
        return false;
    }

    function edit_profile($acc_id,$info){

    }


}