<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 3:58 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/account_model.php");

class supervisor_model extends account_model {

        private $__supervisor_id='';
        function __construct()
        {
            parent::connect();
            if ($this->__supervisor_id == null && isset($_SESSION['supervisor_id']) && $_SESSION['supervisor_id'] !=null){
                $this->__supervisor_id = $_SESSION['supervisor_id'];
            }
        }

        function get_my_team(){
                $sql = "select team.* from team, supervisor where team.supervisor_id = supervisor.supervisor_id 
                      and supervisor.supervisor_id = ?";
                $link= parent::get_conn();
                $stmt = mysqli_stmt_init($link);
                if(mysqli_stmt_prepare($stmt,$sql)){
                    mysqli_stmt_bind_param($stmt,"i",$this->__supervisor_id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $data = array();
                    while($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }
                    mysqli_stmt_close($stmt);
                    return $data;
                }

            }

        function add_request($team_id,$request_type, $content, $request_by){
            $sql = "insert into request(team_id, request_type, content, request_by) VALUES (?,?,?,?)";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"issi",$team_id,$request_type, $content, $request_by);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_close($stmt);
                    return true;
                }else{
                    mysqli_stmt_close($stmt);
                    return false;
                }

            }

        }

        function get_request($team_id){
            $sql = "select * from request where team_id =?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$team_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data = array();
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                mysqli_stmt_close($stmt);
                return $data;
            }
        }

        function update_request($request_id,$request_action){
            if($request_action == 1){
                $approve = 1; $reject = 0;
            }else{
                $approve = 0; $reject = 1;
            }
            $sql = "update request set approve_by_supervisor = ? , reject_by_supervisor = ? where request_id= ?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"iii",$approve,$reject, $request_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                return true;
            }
            mysqli_stmt_close($stmt);
            return false;
        }

        function get_team_pending(){
            $sql = "select * from team_pending";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data = array();
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                mysqli_stmt_close($stmt);
                return $data;
            }
        }

        function  get_supervisor_list(){
            $sql = "select * from supervisor";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $data = array();
                while($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row;
                }
                mysqli_stmt_close($stmt);
                return $data;
            }
        }

        function is_supervisor($acc_id){
            $sql = "select supervisor_id from supervisor where acc_id = ?";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"i",$acc_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
                if(isset($row['supervisor_id'])){
                    mysqli_stmt_close($stmt);
                    return true;
                }else{
                    mysqli_stmt_close($stmt);
                    return false;
                }

            }
        }
        function create_team(){

        }

        function add_comment(){

        }

        function delete_comment(){

        }

}