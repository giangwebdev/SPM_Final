<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/24/2018
 * Time: 3:26 PM
 */

require_once __DIR__."/../config.php";
require_once(SITE_ROOT . "/controllers/staff_controller.php");

class student_view{
    function create_request(){
        require_once (SITE_ROOT."/template/teamleader_create_request.php");
    }

    function view_task(){
        require_once (SITE_ROOT."/template/student_view_task.php");
    }

}
