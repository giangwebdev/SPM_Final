<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/24/2018
 * Time: 3:26 PM
 */

require_once __DIR__."/../config.php";
require_once(SITE_ROOT . "/controllers/student_controller.php");
require_once(SITE_ROOT . "/models/student_model.php");

class student_view{
    function create_request(){
        require_once (SITE_ROOT."/template/teamleader_create_request.php");
    }

    function view_task(){
        $team_id = $_SESSION['team_id'];
        $student= new student_model();
        $task_data = $student->get_task_data($team_id);
        var_dump($task_data);
        require_once (SITE_ROOT."/template/student_view_task.php");
    }

}
