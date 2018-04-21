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
    function check_account($username,$password){
        $sql = "select acc_id from account where username= ? and ( password= ? or password_temp=?)";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"sss",$username,$password, $password);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_fetch_assoc($result)) {
                mysqli_stmt_close($stmt);
                return true;
            }else{
                mysqli_stmt_close($stmt);
                return false;
            }
        }
    }



    function get_account_info($username){
        $sql = "select acc_id,username,role_id,isactive,time_created from account where username= ?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"s",$username);
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
        }elseif ($this->_role_id == "2" || $this->_role_id == "5"){
            $this->__table = "supervisor";
        }elseif ($this->_role_id == "3" || $this->_role_id == "4"){
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

    function get_profile_by_id($acc_id,$role_id){
        if($role_id == "1" ){
            $this->__table = "student";
        }elseif ($role_id == "2" || $role_id == "5"){
            $this->__table = "supervisor";
        }elseif ($role_id == "3" || $role_id == "4"){
            $this->__table = "staff";
        }
        $sql = "select * from ". $this->__table ." where acc_id= ?";

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

    function edit_profile($phone,$link_profile){
        $avatar ="";
        if($this->_role_id == "1" ){
            $this->__table = "student";
        }elseif ($this->_role_id == "2" || $this->_role_id == "5"){
            $this->__table = "supervisor";
        }elseif ($this->_role_id == "3" || $this->_role_id == "4"){
            $this->__table = "staff";
        }
        if(isset($link_profile) && $link_profile !=null){
            $avatar = ", profile_picture=?";
        }
        $sql = "update ".$this->__table. "set phone=?".$avatar ."  where acc_id=?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            if(isset($link_profile) && $link_profile !=null){
                mysqli_stmt_bind_param($stmt,"isi",$phone,$link_profile ,$this->_acc_id);
            }else{
                mysqli_stmt_bind_param($stmt,"ii",$phone ,$this->_acc_id);
            }
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }
        return false;
    }

    function insert_profile($acc_id,$student_id, $email,$role_id){
        $full_name = $gender = $phone = $major = $dob = $campus = $team_id = $profile_picture =null;
        $is_teamleader = $isdaleader = $isdevleader = $isdocleader = $istestleader = 0;
        $sql = "insert into";
        if($role_id == "1" ){
            $this->__table = "student";
            $sql.= " ".$this->__table. " values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        }elseif ($role_id == "2"|| $role_id == "5"){
            $this->__table = "supervisor";
            $sql.= " ".$this->__table. " values (?,?,?,?,?,?,?)";
        }elseif ($role_id == "3" || $role_id == "4"){
            $this->__table = "staff";
            $sql.= " ".$this->__table. " values (?,?,?,?,?,?)";
        }
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            if($role_id == "1" ){
                mysqli_stmt_bind_param($stmt,"sisssisssisiiiii",$student_id,$acc_id,$full_name, $gender ,$dob, $phone, $email, $major, $campus, $team_id,
                    $profile_picture, $is_teamleader,$isdocleader,$isdaleader, $isdevleader, $istestleader);
            }elseif ($role_id == "2"){
                mysqli_stmt_bind_param($stmt,"ississsi",$acc_id,$full_name, $gender ,$phone, $email, $major, $profile_picture);
            }elseif ($role_id == "3"){
                mysqli_stmt_bind_param($stmt,"ississi",$acc_id,$full_name, $gender ,$phone, $email, $profile_picture);
            }
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }
        return false;
    }

}
