<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 4/26/2018
 * Time: 3:09 AM
 */

require_once __DIR__."/../config.php";
require_once (SITE_ROOT."/models/account_model.php");
require_once (SITE_ROOT."/models/student_model.php");

class test_class {

    function test(){
        $search_term = trim(strip_tags("se"));
        $account_model = new account_model();
        $student_model = new student_model();
        $data =$data_splice= array();
        $search_data = $account_model->search_user($search_term);
        var_dump($search_data);
        echo "<br> <br>";

        $old_data = array("SE04178");
                foreach ($search_data as $key => $search){
                    foreach ($old_data as $key2 => $old){
                        if($old == $search['student_id']){
                           $data_splice = array_splice($search_data,$key,1);
                        }
                    }
                }


        foreach ($search_data as $search){
            $acc_status = $account_model->account_status($search['acc_id']);
            var_dump($acc_status);
            echo "<br> <br>";
            if(!$student_model->has_team($search['acc_id']) && $acc_status == 1) {
                    array_push($data, $search['full_name'] . " - " . $search['student_id']);

            }
        }
        echo json_encode($data);
        echo "<br> <br>";
        echo json_encode($data_splice);
    }

}

$test_class = new test_class();
$test_class->test();


