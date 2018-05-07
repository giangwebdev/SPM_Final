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
                    "old_name_en"=> $_POST['old_cpro_name_en'],
                    "old_name_vi"=> $_POST['old_cpro_name_vi'],
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
                $this->view_task();
            }
        }

        function view_task(){
            $team_id = $_SESSION['team_id'];
            $student= new student_model();
            $task_data = $student->get_task_data($team_id);
                $student = new student_view();
                $student->view_task($task_data);
        }

        function delete_task(){
            $task_id = $_POST['task_id'];
            $student = new student_model();
            if($student->delete_task($task_id)){
                $this->view_task();
            }else{
                echo "Error! Cant delete task!";
            }
        }

        function view_request(){
            $student_model = new student_model();
            $request_data = $student_model->get_request();
            $student_view = new student_view();
            $student_view->view_request($request_data);
        }

        function create_team(){
            $student_view = new student_view();
            $student_view->create_team();
            if(isset($_POST['create_team_btn'])){
                $student_list = array();
              for($i=1; $i<=5; $i++){
                  if(isset($_POST["student$i"])){
                      array_push($student_list, $_POST["student$i"]);
                  }
              }
                $project_en = $_POST['cpro_name_en'];
                $project_vi = $_POST['cpro_name_vi'];
                $supervisor = $_POST['supervisor'];
                $note = $_POST['note'];
                $student_model = new student_model();
                $is_teamleader = $_POST['is_teamleader'];
                $last_id = $student_model->get_last_team_pending_id();
                foreach ($student_list as $key => $student){
                    if($is_teamleader == $student){
                        $check_leader = 1;
                    }else{
                        $check_leader = 0;
                    }
                    $student_model->create_team($last_id,$student,$check_leader,$supervisor,$project_en,$project_vi,$note);

                }

                $account = new account();
                $account->homepage();
                echo "<script type=\"text/javascript\">
                        alert('Your creating team request has been sent to head supervisor.'+
                         'Just wait for a few days' +
                         'Head supervisor will check your request soon.');
                       </script>";
            }
        }

        function view_bug(){
            $student_model = new student_model();
            $bug_list = $student_model->get_bug();
            $student_view = new student_view();
            $student_view->view_bug($bug_list);
        }

        function edit_bug(){

        }

        function add_bug(){

        }

        function upload_file($file_name, $file_link){

        }
}