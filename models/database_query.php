
<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/6/2018
 * Time: 9:33 AM
 */
//
$conn = mysqli_connect('localhost', 'root', '', 'spmfu');

function Login_account(){
    $sql = "select * from accountModel";
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $account_list= array();
    while($row = mysqli_fetch_assoc($query)){
        $account_list[] = $row;
    }
    return $account_list;
}



function get_prev_team_pending_id(){
    $sql = "SELECT team_pending_id FROM student_account_pending ORDER BY acc_pending_id DESC LIMIT 1";
    $query = mysqli_query($GLOBALS['conn'], $sql);
    $team_pending_id = null;
    while($row = mysqli_fetch_assoc($query)){
        $team_pending_id = $row;
    }
    if($team_pending_id == null) {$team_pending_id=0;}
    foreach($team_pending_id as $team_pending){
        return $team_pending[0];
    }

}

function add_pending_acc($team_pending_id,$student_name,$student_id,$phone, $email,
                         $is_teamleader,$capstone_name_vi,$capstone_name_en,$supervisor_id,$note){

    $conn = new mysqli('localhost', 'root', '', 'spmfu');
    $sql= "INSERT INTO student_account_pending(acc_pending_id, team_pending_id, full_name, student_id, phone,email, 
            isteamleader, supervisor_id,  projectname_vi ,  projectname_en ,  note ,  isaccepted ,  accepted_by )
         VALUES (DEFAULT, '".$team_pending_id."', '".$student_name."', '".$student_id."', '".$phone."', '".$email."',
          '".$is_teamleader."', '".$supervisor_id."', '".$capstone_name_vi."', '".$capstone_name_en."', '".$note ."', '0', null )";

    $conn->query($sql);
    $conn->close();
}
    
function check_account_duplicate($account){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "select * from accountModel where username=?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("s", $account);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if(isset($row)) {return true;}
    else {return false;}
    $stmt->close();
    $GLOBALS['conn']->close();
}

function get_pending_acc(){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "select * from student_account_pending where isaccepted=FALSE ";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    return $data;
    $stmt-> close();
    $GLOBALS['conn']->close();
}

function count_pending_team_member($team_id){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "SELECT team_pending_id, COUNT(*) as count_mem from student_account_pending where isaccepted = false and team_pending_id = ? group by team_pending_id";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("i", $team_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        $data = $row;
    }
    return $data['count_mem'];
    $stmt-> close();
    $GLOBALS['conn']->close();
}

function get_project_id($project_name){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = 'select project_id from project where projectname_en=? ';
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("s", $project_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        $data = $row;
    }
    return $data['project_id'];
    $stmt-> close();
    $GLOBALS['conn']->close();
}

function get_team_id($team_name){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "select team_id from team where team_name=? ";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("s", $team_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        $data = $row;
    }
    return $data['team_id'];
    $stmt-> close();
    $GLOBALS['conn']->close();
}