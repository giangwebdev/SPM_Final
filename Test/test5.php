<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 5/9/2018
 * Time: 10:38 PM
 */
require_once __DIR__."/../config.php";
require_once SITE_ROOT . "/models/account_model.php";
require_once(SITE_ROOT . '/views/account_view.php');

$account= new account_model();
$user_detail = $account->get_profile_by_id(12,1);
var_dump($user_detail);