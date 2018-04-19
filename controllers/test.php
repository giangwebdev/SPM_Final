<?php
require_once (__DIR__.'/account_controller.php');

$username = "giangtdse03127";
if (!is_bool(strpos($username, "SE"))){
    $short=substr($username, strpos($username,"SE")+strlen("SE"));
    var_dump($short);
}

