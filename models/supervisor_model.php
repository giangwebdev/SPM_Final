<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/16/2018
 * Time: 3:58 PM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/DB_Driver.php");

class supervisor_model extends DB_Driver {

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
            $is_accepted_staff = $is_accepted_spv =0 ;
            $sql = "insert into request(team_id, request_type, content, request_by, is_accepted_by_staff, is_accepted_by_supervisor) VALUES (?,?,?,?,?,?)";
            $link= parent::get_conn();
            $stmt = mysqli_stmt_init($link);
            if(mysqli_stmt_prepare($stmt,$sql)){
                mysqli_stmt_bind_param($stmt,"issiii",$team_id,
                    $request_type, $content, $request_by, $is_accepted_staff,$is_accepted_spv);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_close($stmt);
                    return true;
                }else{
                    mysqli_stmt_close($stmt);
                    return false;
                }

            }

        }

        

        function get_request(){

        }
}