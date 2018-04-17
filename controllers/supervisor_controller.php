<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 3:57 PM
 */


require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/supervisor_model.php");
require_once (SITE_ROOT."/controllers/account_controller.php");

class supervisor extends account {

    function check_supervisor_head(){
        $staff = new staff_model();
        return $staff->check_admin($this->_acc_id);
    }
}