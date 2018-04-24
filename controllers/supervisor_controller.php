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
                $request_type = "meeting";
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

}