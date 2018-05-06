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



    function create_account($username,$password,$role){
        $is_active = "1";
        $sql = "insert into account(acc_id,username, password, role_id, isactive) values (NULL,?,?,?,?)";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"ssii",$username,$password,$role,$is_active);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return mysqli_insert_id($link);
        }
    }

    function add_student($student_id,$acc_id, $full_name , $gender ,$dob , $phone, $email, $major, $campus, $profile_picture){
        $sql = "insert into student(student_id, acc_id, full_name, gender, dob, phone, email, major, campus, profile_picture) 
              VALUES (?,?,?,?,?,?,?,?,?,?)";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"sisssissss",$student_id, $acc_id, $full_name, $gender, $dob, $phone, $email, $major, $campus, $profile_picture);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($result){
                mysqli_stmt_close($stmt);
                return true;
            }else{
                mysqli_stmt_close($stmt);
               // die(mysqli_error($link));
            }
        }
    }

    function delete_account($acc_id){
        $sql = "delete from account where acc_id =?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$acc_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }else{
            return false;
    }
    }

    /**
     * @param $acc_id
     * @param $role_id
     * @return bool
     */
    function delete_account_info($acc_id, $role_id){
        $sql = "delete from";
        if($role_id == "1" ){
            $sql .= " student where acc_id = ?";
        }elseif ($role_id == "2"|| $role_id == "5"){
            $sql .= " supervisor where acc_id = ?";
        }elseif ($role_id == "3" || $role_id == "4"){
            $sql .= " staff where acc_id = ?";
        }
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$acc_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }else{
            return false;
        }
    }

    function change_account_status($acc_id,$status){
        $sql = "update account set isactive = ? where acc_id= ?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            mysqli_stmt_bind_param($stmt,"ii",$status,$acc_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }
        mysqli_stmt_close($stmt);
        return false;
    }

    function update_account_info($student_id , $full_name, $gender, $dob, $phone , $email, $major, $campus , $acc_id,$role_id){
        $sql="";
        if($role_id == "1" ){
            $sql = "update student 
                    set student_id = ?, full_name= ? , gender = ? , dob = ? , phone = ?,
                        email = ? , major = ? , campus = ? ";
        }elseif ($role_id == "2" || $role_id == "5"){
            $sql = "update supervisor 
                    set full_name = ? , gender =  ? , phone = ? , email = ? , major = ? ";
        }elseif ($role_id == "3" || $role_id == "4"){
            $sql = "update staff 
                    set full_name = ? , gender = ? , phone = ? , email = ? ";
        }
        $sql .= "where acc_id = ?";
        $link= parent::get_conn();
        $stmt = mysqli_stmt_init($link);
        if(mysqli_stmt_prepare($stmt,$sql)){
            if($role_id == "1" ){
                mysqli_stmt_bind_param($stmt,"ssssssssi",$student_id , $full_name, $gender, $dob,
                                                                    $phone , $email, $major, $campus , $acc_id);
            }elseif ($role_id == "2" || $role_id == "5"){
                mysqli_stmt_bind_param($stmt,"ssssssi",$full_name, $gender, $dob, $phone , $email, $major, $acc_id);
            }elseif ($role_id == "3" || $role_id == "4"){
                mysqli_stmt_bind_param($stmt,"sssssi",$full_name, $gender, $dob, $phone , $email, $acc_id);
            }

            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            return true;
        }
        return false;
    }
}

