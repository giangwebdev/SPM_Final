<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/26/2018
 * Time: 8:56 AM
 */

require_once __DIR__ . "./config.php";
require_once(SITE_ROOT . "/models/staff_model.php");
require_once(SITE_ROOT . "/controllers/staff_controller.php");
require_once(SITE_ROOT . "/models/account_model.php");
require_once(SITE_ROOT . "/models/staff_model.php");


if(isset($_POST['_action']) && $_POST['_action']=="delete_account"){
    $staff_model = new staff_model();
    $acc_id = $_POST['acc_id_del'];
    $role_name = $_POST['role_name'];
    if($role_name=="Student"){
        $acc_role=1;
    }elseif ($role_name=="Supervisor"){
        $acc_role=2;
    }elseif ($role_name=="Academic Staff"){
        $acc_role=3;
    }elseif ($role_name=="Administrator"){
        $acc_role=4;
    }elseif ($role_name=="Supervisor Head"){
        $acc_role=5;
    }
    $result1 = $staff_model->delete_account_info($acc_id,$acc_role);
    $result2 = $staff_model->delete_account($acc_id);


}

if(isset($_POST['_action']) && $_POST['_action']=="account_status"){
    $staff_model = new staff_model();
    $status = $_POST['account_status'];
    $acc_id = $_POST['acc_id'];
    $staff_model->change_account_status($acc_id,$status);
}

if(isset($_POST['_action']) && $_POST['_action']=="search_member"){
    if(isset($_POST['term'])){
        $search_term = trim(strip_tags($_POST['term']));
        $account_model = new account_model();
//        $student_model = new student_model();
        $data = array();
        $search_data = $account_model->search_user($search_term);
//        $old_data = json_decode($_POST['old_data']);
//
//        foreach ($search_data as $key => $search){
//            foreach ($old_data as $key2 => $old){
//                if($old == $search['student_id']){
//                    array_splice($search_data,$key,1);
//                }
//            }
//        }

        foreach ($search_data as $search){
           $acc_status = $account_model->account_status($search['acc_id']);
            if($acc_status == 1) {
                 array_push($data, $search['full_name'] . " - " . $search['student_id']);
            }
        }
        echo json_encode($data);
    }
}

