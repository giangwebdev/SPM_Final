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
    $staff_model->delete_account_info($acc_id,$acc_role);
    $staff_model->delete_account($acc_id);

}

if(isset($_POST['_action']) && $_POST['_action']=="account_status"){
    $staff_model = new staff_model();
    $status = $_POST['account_status'];
    $acc_id = $_POST['acc_id'];
    $staff_model->change_account_status($acc_id,$status);
}


