<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/18/2018
 * Time: 10:56 AM
 */


require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/student_model.php");
require_once (SITE_ROOT."/controllers/account_controller.php");

class student extends account{
        private $__team_info = array();

        function get_team_info(){
            $team = new student_model();
            $this->__team_info = $team->get_team_info();
        }
}