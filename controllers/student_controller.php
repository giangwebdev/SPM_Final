<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/18/2018
 * Time: 10:56 AM
 */


require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/student_model.php");
require_once (SITE_ROOT."/views/student_view.php");
require_once (SITE_ROOT."/controllers/account_controller.php");

class student extends account{
        private  $__team_info = array();

        function  __construct()
        {
            parent::__construct();
            $student = new student_model();
            $this->__team_info = $student->get_team_info();
            $_SESSION['team_id'] = $this->__team_info[0]['team_id'];
        }

        function  get_team_info(){
                $team = new student_model();
                $this->__team_info = $team->get_team_info();
            }

        function create_request(){
            $student_view = new student_view();
            $student_view->create_request();
            if(isset($_POST['send_button']) && $_POST['send_button'] !=null){
                $student = new student_model();
                $student->get_team_info();
                $team_id = $_SESSION['team_id'];
                $request_type = "change_project_name";
                $content = array(
                    "name_en" => $_POST['new_cpro_name_en'],
                    "name_vi" => $_POST['new_cpro_name_vi'],
                    "description" => $_POST['description']
                );
                $content = json_encode($content);
                $request_by = $_SESSION['acc_id'];
                if($student->add_request($team_id,$request_type, $content,$request_by)){
                    echo "Request sent!";
                }else{
                    echo "Error sending request!";
                }
            }
        }


        function create_team(){

        }

        function create_default_task(){
            $team_id = $_SESSION['team_id'];
            $parent_task_id = null;
            $description = "";
            $created_by = "System";
            $assign_by = $assign_to = $deadline = null;
            $task_status_id = "2";
            $priority = "High";
            $start_date = getdate();
            $task_name = array(
                "default task 1" => "Report 1",
                "default task 2" => "Report 2",
                "default task 3" => "Report 3",
                "default task 4" => "Report 4",
                "default task 5" => "Report 5",
                "default task 6" => "Report 6"
            );
            $student = new student_model();
            foreach ($task_name as $key => $value){
                $student->create_new_task($parent_task_id, $team_id, $task_name,
                    $description,$created_by, $assign_by, $assign_to, $start_date,
                    $deadline,$task_status_id,$priority);
            }
        }

        function create_task(){
            if(isset($_POST['task_type'])&& $_POST['task_type'] != null){
                $priority = $_POST['priority'];
                $task_name = $_POST['task_name'];
                $description = $_POST['description'];
                $created_by = $_SESSION['acc_id'];
                $assign_by = $_POST['assign_by'];
                $assign_to = $_POST['assign_to'];
                $deadline = $_POST['deadline'];
                $team_id = $_SESSION['team_id'];
                $parent_task_id ="";

                if($_POST['create_task_btn'] == "new_maintask"){
                    $parent_task_id = null;
                }elseif ($_POST['create_task_btn'] == "new_subtask"){
                    $parent_task_id = $_POST['task_id'];
                }
                $start_date = getdate();
                if($assign_to !=null){
                    $task_status_id = "2";
                }else{
                    $task_status_id = "1";
                }

                $student = new student_model();
                $student->create_new_task($parent_task_id, $team_id, $task_name,
                    $description,$created_by, $assign_by, $assign_to, $start_date,
                    $deadline,$task_status_id,$priority);
                $student_view = new student_view();
                $student_view->view_task();
            }
        }

        function view_task(){
                $student = new student_view();
                $student->view_task();
        }

}