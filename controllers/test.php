<?php
require_once (__DIR__.'/account_controller.php');

$new = new account();
echo $new->auto_gen_password();
