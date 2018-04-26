<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/26/2018
 * Time: 8:56 AM
 */

require_once __DIR__ . "./config.php";
require_once(SITE_ROOT . "/models/student_model.php");
require_once(SITE_ROOT . "/views/student_view.php");
require_once(SITE_ROOT . "/controllers/account_controller.php");
require_once(SITE_ROOT . "/Test/test_class.php");

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $new = new test_class();
    echo $new->add($name, $password);
    echo $email;
}