<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 12:40 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT.'/controllers/staff_controller.php');
require_once (SITE_ROOT."/controllers/supervisor_controller.php");
require_once (SITE_ROOT."/controllers/account_controller.php");

class staff_view{
    function view_account($acc_list){
        require_once(SITE_ROOT . '/template/admin_view_account.php');
    }

    function create_account(){
        require_once (SITE_ROOT.'/template/admin_create_account.php');
    }
}