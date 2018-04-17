<?php
/**
 * Created by PhpStorm.
 * User: Kevin Flynn
 * Date: 3/26/2018
 * Time: 9:55 AM
 */

$conn = mysqli_connect('localhost', 'root', '', 'spmfu');

function create_account($acc_pending_id, $user, $password, $role, $status){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = "insert into accountModel(acc_pending_id, username, password, role_id, isactive) 
              values (?,?,?,?,?)";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("issis",$acc_pending_id, $user, $password, $role,$status);
    $stmt->execute();
    $stmt->close();
    $GLOBALS['conn']->close();
}

function get_account_id($user){
    if ($GLOBALS['conn']->connect_error) {
        die("Connection failed: " . $GLOBALS['conn']->connect_error);
    }
    //prepare and bind
    $sql = 'select acc_id from accountModel where username = ?';
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param("s",$user );
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    while($row = $result->fetch_assoc()){
        $data = $row;
    }
    return $data['acc_id'];
    $stmt->close();
    $GLOBALS['conn']->close();
    
}