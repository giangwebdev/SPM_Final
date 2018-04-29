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
            $this->_acc_detail[$name] = $value;
    }

    function inputLogin(){
        require_once(SITE_ROOT . "/login.php");
    }

    function homepage(){
        require_once (SITE_ROOT."/template/homepage.php");
    }

    function view_profile(){
        foreach ($this->_acc_detail as $detail){
            require_once(SITE_ROOT . "/template/account_view_profile.php");
        }
    }

    function edit_profile(){
        foreach ($this->_acc_detail as $detail){
            require_once(SITE_ROOT . "/template/account_edit_profile.php");
        }
    }

    function change_password(){
        require_once (SITE_ROOT.'/template/account_change_password.php');
    }

    function reset_password(){
        require_once (SITE_ROOT.'/template/account_reset_password.php');
    }

    function change_password_nologin(){
        require_once (SITE_ROOT.'/template/account_change_pass_nologin.php');
    }
}