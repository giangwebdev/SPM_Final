<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");



class account_view{

    protected $_acc_detail = array();

    function __construct()
    {


    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    function __set($name, $value)
    {
        if($this->_acc_detail == null && !isset($this->_acc_detail) && isset($current_account_detail) && $current_account_detail != null){
            $this->_acc_detail[$name] = $value;
        }
    }

    function inputLogin(){
        require_once(SITE_ROOT . "/login.php");
    }

    function homepage($role){
        if($role== 1){
            require_once (SITE_ROOT.'/template/home_student.php');
        }
        if($role== 2){
            require_once (SITE_ROOT.'/template/home_supervisor.php');
        }
        if($role== 3){
            require_once (SITE_ROOT.'/template/home_staff.php');
        }
    }

    function view_profile(){
        var_dump($this->_acc_detail);
        foreach ($this->_acc_detail as $detail){
            require_once (SITE_ROOT."/template/view_profile.php");
        }
    }
}