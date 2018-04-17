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
    private $__table='';
    protected $_acc_id='';
    private $user_name='';
    private $password='';
    protected $_role_id='';
    private  $account_status='';
    // Hàm Khởi Tạo
    function __construct() {
        if($this->_acc_id == null && isset($_SESSION['acc_id']) && $_SESSION['acc_id'] != null){
            $this->_acc_id = $_SESSION['acc_id'];
            $this->_role_id = $_SESSION['role_id'];
        }
        parent::connect();
    }

    // Hàm ngắt kết nối
    function __destruct() {
        parent::disconnect();
    }


    //Check account
    function get_account_info($username,$password){
        $sql = "select acc_id,username,role_id,isactive,time_created from account where username= ? and password= ?";
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
        $sql = "update account set password = ? where acc_id= ?";
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

    function get_profile(){
        if($this->_role_id == "1" ){
            $this->__table = "student";
        }elseif ($this->_role_id == "2"){
            $this->__table = "supervisor";
        }elseif ($this->_role_id == "3"){
            $this->__table = "staff";
        }
        $sql = "select * from ". $this->__table ." where acc_id= ?";

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

    function edit_profile($info){
        $sql = "update ";
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


}
