<?php
/**
 * created by phpstorm.
 * user: kevin flynn
 * date: 3/6/2018
 * time: 9:34 am
 */
ob_start();
ini_set('session.cache_limiter','public');
session_cache_limiter(false);
session_start();
session_regenerate_id(true);
require_once __DIR__."/./config.php";

    if(!isset($_GET['action']) || !isset($_GET['controller']) || $_GET['action'] ==null || $_GET['controller'] == null) {
        require_once(SITE_ROOT . '/controllers/account_controller.php');
        $site = new account();
        $site->checkLogin();
    }else{
        $action = $_GET['action'];
        $controller = $_GET['controller'];
        require_once(SITE_ROOT . "/controllers/".$controller."_controller.php");
        $controller = new $controller();
        $controller->$action();
    }
