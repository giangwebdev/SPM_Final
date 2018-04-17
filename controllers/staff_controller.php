<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 12:31 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/staff_model.php");
require_once (SITE_ROOT."/controllers/account_controller.php");

class staff extends account {

    private $__acc_list = array();

    function display_all_account_info(){
            $acc_info = new staff_model();
            $this->__acc_list = $acc_info->get_all_account_info();
            require_once (SITE_ROOT.'/views/staff_view.php');
            $acc_view = new staff_view();
            $acc_view->view_account($this->__acc_list);
    }

    function check_admin(){
        $staff = new staff_model();
        return $staff->check_admin($this->_acc_id);
    }
}