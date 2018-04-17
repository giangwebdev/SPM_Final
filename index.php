<?php
/**
 * created by phpstorm.
 * user: kevin flynn
 * date: 3/6/2018
 * time: 9:34 am
 */
ob_start();
session_start();
require_once __DIR__."/./config.php";


if(!isset($_GET['action']) || !isset($_GET['controller']) || $_GET['action'] ==null || $_GET['controller'] == null) {
    require_once(SITE_ROOT . '/views/account_view.php');
    $site = new Login();
    $site->inputLogin();
}else{
    $action = $_GET['action'];
    $controller = $_GET['controller'];
    require_once(SITE_ROOT . "/controllers/".$controller."_controller.php");
    $controller = new $controller();
    $controller->$action();
}




