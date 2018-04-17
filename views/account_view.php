<?php
require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/controllers/account_controller.php");



class Login{
    function inputLogin(){
        require_once(SITE_ROOT . "/login.php");
    }

    function Homepage($role){
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

}