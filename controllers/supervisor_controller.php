<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 3:57 PM
 */


require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/supervisor_model.php");
require_once (SITE_ROOT."/views/supervisor_view.php");
require_once (SITE_ROOT."/controllers/account_controller.php");
require_once (SITE_ROOT."/models/account_model.php");

class supervisor extends account {

//        private $__supervisor_id = '';
        function __construct()
        {
            parent::__construct();
                $account = new account_model();
                $supervisor_data = $account->get_profile();
                $_SESSION['supervisor_id'] = $supervisor_data[0]['supervisor_id'];
        }

    function create_meeting_request(){
            $super_view = new supervisor_view();
            $super_view->create_meeting_request();
            if(isset($_POST['send_button']) && $_POST['send_button'] !=null){
                $account = new supervisor_model();
                $team_id = $_POST['team'];  
                $request_type = "BMR";
                $content = array(
                    "slot" => $_POST['slot'],
                    "date" => $_POST['date'],
                    "room" => null,
                    "description" => $_POST['description']
                );
                $content = json_encode($content);
                $request_by = $_SESSION['acc_id'];
                if($account->add_request($team_id,$request_type, $content,$request_by)){
                    echo "Request sent!";
                }else{
                    echo "Error sending request!";
                }
            }
        }

    function view_request(){
            $team_id_array = array();
            $request_data = array();
            $super_model = new supervisor_model();
            $team_data = $super_model->get_my_team();
            foreach ( $team_data as $team){
                array_push($team_id_array, $team['team_id']);
            }
            foreach ($team_id_array as $key => $value){
                $request_data_get = $super_model->get_request($value);
                foreach ($request_data_get as $data){
                    array_push($request_data, $data);
                }

            }
            $super_view = new supervisor_view();
            $super_view->view_request($request_data);
    }

    function update_request(){
            if(isset($_POST['approve_btn'])){
                $request_id = $_POST['request_id'];
                $request_action = $_POST['request_action'];
                $super_model = new supervisor_model();
                if($super_model->update_request($request_id,$request_action)){
                    $this->view_request();
                }

            }


    }

    function view_task(){
        $team_id = $_GET['team_id'];
        $student= new student_model();
        $task_data = $student->get_task_data($team_id);
        $student = new student_view();
        $student->view_task($task_data);
}

    function comment(){

    }

    function manage_team_pending(){
            $super_model = new supervisor_model();
            $team_pending_data = $super_model->get_team_pending();
            $super_view = new supervisor_view();
            $super_view->manage_team_pending($team_pending_data);
    }
}