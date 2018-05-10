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
            if(!isset($_SESSION['team_id'])){
                $_SESSION['team_id'] = $this->__team_info[0]['team_id'];
            }

        }

        function  get_team_info(){
                $team = new student_model();
                $this->__team_info = $team->get_team_info();
            }

        function create_request(){
            if(isset($_POST['send_button']) && $_POST['send_button'] !=null){
                $student_view = new student_view();
                $student = new student_model();
                $team_id = $_SESSION['team_id'];
                $request_type = "CPN";
                $content = array(
                    "old_name_en"=> $_POST['old_cpro_name_en'],
                    "old_name_vi"=> $_POST['old_cpro_name_vi'],
                    "old_code"=> $_POST['old_code'],
                    "name_en" => $_POST['new_cpro_name_en'],
                    "name_vi" => $_POST['new_cpro_name_vi'],
                    "new_code"=> $_POST['new_code'],
                    "description" => $_POST['description']
                );
                $content = json_encode($content);
                $request_by = $_SESSION['acc_id'];
                if($student->add_request($team_id,$request_type, $content,$request_by)){
                    $student_view->create_request();
                    echo "Request sent!";
                }else{
                    $student_view->create_request();
                    echo "Error sending request!";
                }
            }else{
                $student_view = new student_view();
                $student_view->create_request();
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
            if(isset($_POST['create_task_btn'])){
                $priority = $_POST['priority'];
                $task_name = $_POST['task_name'];
                $description = $_POST['description'];
                $created_by = $_SESSION['acc_id'];
                $assign_by = $_SESSION['acc_id'];
                $assign_to = $_POST['assign_to'];
                $deadline = strtr($_POST['deadline'], '/', '-');
                $deadline = date("Y-m-d", strtotime($deadline));
                $team_id = $_SESSION['team_id'];
                $parent_task_id ="";

                if($_POST['create_task_btn'] == "new_maintask"){
                    $parent_task_id = null;
                }elseif ($_POST['create_task_btn'] == "new_subtask"){
                    $parent_task_id = $_POST['task_id'];
                }
                $start_date = strtr($_POST['start_date'], '/', '-');
                $start_date = date("Y-m-d", strtotime($start_date));

                if($assign_to !=null){
                    $task_status_id = "2";
                }else{
                    $task_status_id = "1";
                }

                $student = new student_model();
                $student->create_new_task($parent_task_id, $team_id, $task_name,
                    $description,$created_by, $assign_by, $assign_to, $start_date,
                    $deadline,$task_status_id,$priority);
                unset($_POST);
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
                    echo "<script type=\"text/javascript\">
                        alert('Your creating team request has been sent to head supervisor.'+
                         'Just wait for a few days' +
                         'Head supervisor will check your request soon.');
                       </script>";
                }

                $account = new account();
                $account->homepage();

            }
        }

        function view_bug(){
            $student_model = new student_model();
            $bug_list = $student_model->get_bug();
            $student_view = new student_view();
            $student_view->view_bug($bug_list);
        }


        function edit_task(){
            if(isset($_POST['edit_task_btn'])){
                $account_model = new  account_model();
                $priority = $_POST['priority'];
                $task_name = $_POST['task_name'];
                $description = $_POST['description'];
                $assign_to = $account_model->get_id_by_name($_POST['assign_to']);
                $deadline = strtr($_POST['deadline'], '/', '-');
                $deadline = date("Y-m-d", strtotime($deadline));
                $task_id = $_POST['task_id'];

                if(isset($_POST['technique_check']) && $_POST['technique_check']=="tech_checked"){
                    $technique_check =1;
                }else{
                    $technique_check =0;
                }
                if(isset($_POST['qa_check'])&& $_POST['qa_check']=="qa_checked"){
                    $qa_check =1;
                }else{
                    $qa_check =0;
                }

                $parent_task_id = $_POST['parent_task_id'];
                if($parent_task_id == "No parent task."){
                    $parent_task_id =null;
                }
                $start_date = strtr($_POST['start_date'], '/', '-');
                $start_date = date("Y-m-d", strtotime($start_date));

                if($assign_to !=null){
                    $task_status_id = "2";
                }else{
                    $task_status_id = "1";
                }
                $student = new student_model();
                $student->edit_task_data($parent_task_id, $task_id, $task_name, $description,
                    $assign_to, $start_date, $deadline,$technique_check,
                    $qa_check, $task_status_id, $priority);

                $this->view_task();
            }
        }

        function edit_bug(){

        }

        function add_bug(){

        }

        function upload_file($file_name, $file_link){

        }
}