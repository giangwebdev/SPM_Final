<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/12/2018
 * Time: 9:12 AM
 */
include_once('../models/database_query.php');


if(isset($_POST['submit'])) {
    $is_teamleader =  $_POST['is_teamleader'];
    $student_list[] = array();
    for($i=1; $i<=5 ;$i++){
        if(!empty($_POST['full_name'.$i])){
            $is_TL= null;
            if($is_teamleader == 'student'.$i){
                $is_TL=1;
            }else{
                $is_TL=0;
            }
            $student_[$i] = array($_POST['full_name'.$i], $_POST['student_id'.$i], $_POST['phone'.$i], $_POST['email'.$i],$is_TL);
            array_push($student_list,$student_[$i]);

        }
    }
    $capstone_name_en = $_POST['cp_name_en'];
    $capstone_name_vi = $_POST['cp_name_vi'];

    $supervisor = $_POST['supervisor'];
    $note = $_POST['note'];

    $team_pending_id = get_prev_team_pending_id() +1;
    $supervisor_id = null;
    $supervisor_list = get_supervisor();

    foreach($supervisor_list as $supervisor_detail){
        if(isset($supervisor_detail['full_name']) && $supervisor_detail['full_name'] == $supervisor){
            $supervisor_id = $supervisor_detail['supervisor_id'];
            break;
        }
    }

    foreach($student_list as $student){
        if(!empty($student)){
            add_pending_acc("$team_pending_id","$student[0]","$student[1]", "$student[2]",
                "$student[3]","$student[4]","$capstone_name_vi" ,"$capstone_name_en",
                "$supervisor_id","$note");

        }
    }
}

